<?php

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

$cache = time();
require __DIR__ . '/../vendor/autoload.php';

try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__  . '/../');
    $dotenv->load();

    $apiContext = new ApiContext(new OAuthTokenCredential($_ENV['PAYPAL_CLIENT_ID'], $_ENV['PAYPAL_CLIENT_SECRET']));
    $apiContext->setConfig([
        'mode' => 'sandbox'
    ]);
    $paymentId = $_GET['paymentId'];
    $payment = Payment::get($paymentId, $apiContext);

    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);

    $execution->addTransaction(current($payment->transactions));
    $result = $payment->execute($execution, $apiContext);

    $name = $payment->payer->payer_info->first_name . ' ' . $payment->payer->payer_info->last_name;
    $m = new Mustache_Engine(array('entity_flags' => ENT_QUOTES));

    //dump("Executed Payment", "Payment", $payment->getId(), $execution, $result);
    echo $m->render(file_get_contents('../views/success/' . $_GET['lang'] . '.tmpl'), array('customer' => $name));
} catch (Exception $exception) {
    dump($exception);
}
