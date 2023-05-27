<?php
$cache = time();
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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RGNG966SBS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-RGNG966SBS');
    </script>
</head>
<body>
<main>
    <header>
        <h1>Dul and Nouk White</h1>
        <h2>Orgânico 2023</h2>
    </header>
    <div></div>
    <footer>
        <a  href="https://www.facebook.com/dulandnoukwhite">
            <ion-icon name="logo-facebook"></ion-icon>
        </a>
        <a href="https://www.instagram.com/dulandnoukwhiteband/">
            <ion-icon name="logo-instagram"></ion-icon>
        </a>
        <a href="https://www.youtube.com/c/DulNNoukWhite">
            <ion-icon name="logo-youtube"></ion-icon>
        </a>
    </footer>
</main>
<div>
    <i class="fa-solid fa-cart-shopping"></i>
</div>
<script src="js/store.js?<?php echo $cache; ?>"></script>
<script src="node_modules/accounting/accounting.min.js"></script>
<script src="node_modules/store2/dist/store2.min.js"></script>
<script src="node_modules/@fortawesome/fontawesome-free/js/fontawesome.min.js"></script>
<script src="node_modules/mustache/mustache.min.js"></script>
<script src="node_modules/@jvitela/mustache-wax/dist/mustache-wax.min.js"></script>
</body>
</html>