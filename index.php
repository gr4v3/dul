<?php
$cache = time();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <link rel="manifest" href="/manifest.json">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Dul N'Nouk White</title>
    <meta name="description" content="Dul and Nouk White are a Madeiran alternative rock band with a repertoire consisting mostly of original themes that visit very different musical genres, such as rock, fado, blues, pop, jazz and world music.">
    <meta name="keywords" content="dul organic orgânico music madeira rock pop portugal">
    <meta name="author" content="dul and nouk white">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link  rel="stylesheet" href="/css/index.css"/>
    <link  rel="stylesheet" href="/node_modules/flag-icons/css/flag-icons.min.css"/>
    <link rel="icon" type="image/jpg" href="img/favicon.jpg" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RGNG966SBS"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-RGNG966SBS');
    </script>
</head>
<body>
<main>
    <header>
        <img src="img/fundo5.jpg" alt="Dul N'Nouk White"/>
    </header>
    <div class="article"></div>
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
<audio preload="metadata" loop>
    <source src="/mp3/test6.mp3" type="audio/mpeg">
</audio>
<section class="permission muted">
    <ion-icon name="volume-mute-outline"></ion-icon>
    <ion-icon name="volume-off-outline"></ion-icon>
</section>
<script src="node_modules/store2/dist/store2.min.js"></script>
<script type="text/javascript" src="js/index.js?<?php echo $cache; ?>"></script>
</body>
</html>