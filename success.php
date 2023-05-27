<?php

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

$cache = time();
require __DIR__ . '/vendor/autoload.php';

try {
    $apiContext = new ApiContext(new OAuthTokenCredential('AXn3JuDHMcJ0rv2Xb67pV71yBQLc4FgSy_gn89IKi7kzsNamO_u7jc3wAaoGO4HgxEJgQ33vK7E8cJ0M', 'EP5P5v4wNSubIu-3FE1ABI_quZZVcxX5zrl8bbQe9QTPuRGasKzhpMAPL06dQVyCb-gnxlYRf43dg9e1'));
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
    echo $m->render(file_get_contents('views/success/' . $payment->payer->payer_info->country_code . '.tmpl'), array('customer' => $name));
} catch (Exception $exception) {
    dump($exception);
}
