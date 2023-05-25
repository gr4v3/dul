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
$post = json_decode(file_get_contents('php://input'), true);

$itemList = new ItemList();

foreach($post['checkout'] as $checkoutItem) {
    $item = new Item();
    $item->setName('T-Shirt Branca com tamanho ' . $checkoutItem['size'])
        ->setCurrency('EUR')
        ->setQuantity($checkoutItem['amount'])
        ->setSku($checkoutItem['sku']) // Similar to `item_number` in Classic API
        ->setPrice($checkoutItem['unit']);
    $itemList->addItem($item);
}

$amount = new Amount();
$amount->setCurrency('EUR')->setTotal($post['total']);

$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Payment description")
    ->setInvoiceNumber(uniqid());


$baseUrl = 'https://dev.dulandnoukwhite.com/store.php';
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("$baseUrl?success=true")
    ->setCancelUrl("$baseUrl?success=false");

$payerInfo = new PayerInfo();
$payerInfo->setPayerId($post['customer']['uuid']);
$payerInfo->setCountryCode('PT');

$payer = new Payer();
$payer->setPayerInfo($payerInfo);
$payer->setPaymentMethod('paypal');

$payment = new Payment();
$payment->setIntent("sale")
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));

$apiContext = new ApiContext(new OAuthTokenCredential('AXn3JuDHMcJ0rv2Xb67pV71yBQLc4FgSy_gn89IKi7kzsNamO_u7jc3wAaoGO4HgxEJgQ33vK7E8cJ0M', 'EP5P5v4wNSubIu-3FE1ABI_quZZVcxX5zrl8bbQe9QTPuRGasKzhpMAPL06dQVyCb-gnxlYRf43dg9e1'));
$apiContext->setConfig([
    'mode' => 'sandbox'
]);
$payment->create($apiContext);
die($payment->getApprovalLink());