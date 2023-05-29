<?php

use Dotenv\Exception\InvalidEncodingException;
use Dotenv\Exception\InvalidFileException;
use Dotenv\Exception\InvalidPathException;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

$cache = time();
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__  . '/../');
try {
    $dotenv->load();
    $apiContext = new ApiContext(new OAuthTokenCredential($_ENV['PAYPAL_CLIENT_ID'], $_ENV['PAYPAL_CLIENT_SECRET']));
    $apiContext->setConfig([
        'mode' => 'sandbox'
    ]);
} catch (InvalidEncodingException|InvalidFileException|InvalidPathException $e) {
}