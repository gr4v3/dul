<?php

use Dotenv\Exception\InvalidEncodingException;
use Dotenv\Exception\InvalidFileException;
use Dotenv\Exception\InvalidPathException;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

error_reporting(E_ALL ^ E_DEPRECATED);
/**
 * AdMedia
 * User: Fábio Menezes
 * Date: 31/05/2023
 * Description:
 */

require __DIR__ . '/../vendor/autoload.php';


try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    $post = json_decode(file_get_contents('php://input'), true, 512, JSON_THROW_ON_ERROR);
    $paymentId = $post['paymentId'];
    $payerId = $post['PayerID'];

    $resource = json_decode(file_get_contents('pending/' . $paymentId . '.json'), false, 512, JSON_THROW_ON_ERROR);

    $apiContext = new ApiContext(new OAuthTokenCredential($_ENV['PAYPAL_CLIENT_ID'], $_ENV['PAYPAL_CLIENT_SECRET']));
    $apiContext->setConfig([
        'mode' => 'live'
    ]);

    $execution = new PaymentExecution();
    $execution->setPayerId($payerId);

    foreach($resource->transactions as $item) {
        $amount = new Amount();
        $amount->setCurrency($item->amount->currency)->setTotal($item->amount->total);

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $execution->addTransaction($transaction);
    }

    $payment = Payment::get($paymentId, $apiContext);
    $result = $payment->execute($execution, $apiContext);

    $result = Payment::get($paymentId, $apiContext);
    file_put_contents('finish/' . $paymentId . '.json', $result->toJSON());

} catch (InvalidEncodingException|InvalidFileException|InvalidPathException|JsonException $e) {
}