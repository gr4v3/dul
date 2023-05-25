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


    $payment->payer->payer_info->billing_address;

    dump("Executed Payment", "Payment", $payment->getId(), $execution, $result);
} catch (Exception $exception) {
    dump($exception);
}


?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <link rel="manifest" href="manifest.json">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Dul N'Nouk White</title>
    <meta name="description"
          content="Os Dul and Nouk White são uma banda de rock alternativo madeirense com um repertório constituído, maioritariamente, por temas originais que visitam géneros musicais bastante distintos como o rock, o fado, o blues, o pop, o jazz e a música do mundo.">
    <meta name="keywords" content="dul organic orgânico music madeira rock pop portugal">
    <meta name="author" content="dul and nouk white">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/store.css?<?php echo $cache; ?>"/>
    <link rel="icon" type="image/jpg" href="img/favicon.jpg"/>
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css"/>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>
<main>
    <header>
        <h1>Dul and Nouk White</h1>
        <h2>Orgânico 2023</h2>
    </header>
    <article>

        <p>Dear [T-Shirt Buyer's Name],</p>

        <p>We wanted to take a moment to express our sincere appreciation for your recent purchase of our music band
            t-shirt. Your support as a fan means everything to us, and we are truly grateful for your decision to wear
            our merchandise.
        </p>
        <p>We understand that receiving your t-shirt promptly is important to you, and we want to assure you that we are
            working diligently to fulfill and deliver your order as soon as possible. Our team is committed to ensuring
            a seamless and efficient shipping process, so you can proudly wear your band t-shirt without delay.
        </p>
        <p>Please rest assured that we have taken note of your shipping address, and we will make every effort to
            dispatch your t-shirt promptly. We value your patience and understanding as we work to get your order to you
            swiftly.
        </p>
        <p>Once again, we want to express our deepest gratitude for your support. Your purchase not only helps us
            financially but also motivates us to continue creating and sharing our music with the world. We can't wait
            for you to receive your t-shirt and join us in proudly representing our band.
        </p>
        <p>If you have any further questions or concerns regarding your order, please feel free to reach out to our
            customer support team. We are here to assist you in any way we can.
        </p>

        <p>Thank you once again for being an incredible fan and for supporting our musical journey.
        </p>
        <p>Rock on!</p>

        <p>Dul and Nouk White</p>
    </article>
</main>

<script src="node_modules/accounting/accounting.min.js"></script>
<script src="node_modules/store2/dist/store2.min.js"></script>
<script src="node_modules/@fortawesome/fontawesome-free/js/fontawesome.min.js"></script>
<script src="node_modules/mustache/mustache.min.js"></script>
<script src="node_modules/@jvitela/mustache-wax/dist/mustache-wax.min.js"></script>
</body>
</html>