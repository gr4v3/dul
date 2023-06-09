<?php
error_reporting(E_ALL ^ E_DEPRECATED);
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\PayerInfo;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

require __DIR__ . '/../vendor/autoload.php';
try {

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    $post = json_decode(file_get_contents('php://input'), true, 512, JSON_THROW_ON_ERROR);
    $itemList = new ItemList();

    foreach($post['checkout'] as $checkoutItem) {
        $item = new Item();
        $item->setName('T-Shirt Branca com tamanho ' . $checkoutItem['size'])
            ->setCurrency('EUR')
            ->setQuantity($checkoutItem['amount'])
            ->setSku($checkoutItem['sku']) // Similar to `item_number` in Classic API
            ->setPrice((int) $checkoutItem['unit']);
        $itemList->addItem($item);
    }

    $amount = new Amount();
    $amount->setCurrency('EUR')->setTotal((int) $post['total']);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("Payment description")
        ->setInvoiceNumber(uniqid('DUL', true));

    $redirectUrls = new RedirectUrls();

    $lang = $post['customer']['lang'];
    $host = $post['customer']['host'];

    $redirectUrls->setReturnUrl($host . '/' . $lang . '/store?payment=success')
        ->setCancelUrl($host . '/' . $lang . '/store?payment=failure');

    $payerInfo = new PayerInfo();
    $payerInfo->setPayerId($post['customer']['uuid']);
    $payerInfo->setCountryCode($post['customer']['lang']);

    $payer = new Payer();
    $payer->setPayerInfo($payerInfo);
    $payer->setPaymentMethod('paypal');

    $payment = new Payment();
    $payment->setIntent("sale")
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));

    $apiContext = new ApiContext(new OAuthTokenCredential($_ENV['PAYPAL_CLIENT_ID'], $_ENV['PAYPAL_CLIENT_SECRET']));
    $apiContext->setConfig([
        'mode' => 'live'
    ]);
    $payment->create($apiContext);
    $payment_content = $payment->toArray();
    $payment_content['request'] = $post;

    file_put_contents('pending/' . $payment->getId() . '.json', json_encode($payment_content, JSON_THROW_ON_ERROR));
    die($payment->getApprovalLink());
} catch (JsonException|InvalidArgumentException $e) {
    dump($e);
}

