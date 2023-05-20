<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="manifest" href="/manifest.json">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Dul N'Nouk White</title>
    <meta name="description" content="Dul and Nouk White are a Madeiran alternative rock band with a repertoire consisting mostly of original themes that visit very different musical genres, such as rock, fado, blues, pop, jazz and world music.">
    <meta name="keywords" content="dul organic orgânico music madeira rock pop portugal">
    <meta name="author" content="dul and nouk white">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <article>
        <h1>dul and nouk white</h1>
        <h2 class="muted">
            <img class="record" src="img/vynil1.png" alt="Dul N'Nouk White | Orgânico"/>
            <img class="click" src="img/click.gif" alt="Dul N'Nouk White"/>
        </h2>
        <p>
            Dul and Nouk White are a Madeiran alternative rock band with a repertoire consisting of original themes that visit very different musical genres, such as rock, fado, blues, pop, jazz and world music. However, the clothing involved in this eclectic repertoire makes the band add some sound characteristics that give rise to their peculiar compositions, which, live, become authentic Journeys.
        </p>
        <p>
            [ <i>" DUL's music is a unique experience through themes that suggest various types of feelings. They visit joy and intervention, with themes such as “March of the People Sangra” and “Fun&Farra”, it strongly embraces the intensity of a tribal journey, with themes such as “Bird on a String”, and recollect themselves in introspection about love, in themes such as “About a Boy” and “Amor Epithelial.” Towards the end of this eclectic emotional journey, they also give the taste a small dose of nostalgia that hides, innocently, behind very specific interpretations of themes such as “Gaivota”, by Amália Rodrigues, and “O Prelúdio Para a Laurindinha”, a theme that combines the interpretation of the well-known theme " Laurindinha” by António Mourão, with a prelude created by the band itself. "</i> ] — (in press)</p>
        <div class="flags">
            <a href="/pt">pt</a>
            <span>|</span>
            <a href="/fr">fr</a>
        </div>
    </article>
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
<script type="text/javascript">

    let triggerSound = function() {
        return new Promise(function(resolve) {
            let audio = document.querySelector('audio');
            if (audio.paused) {
                audio.play().then(function() {
                    dataLayer.push({'event': 'select_item'});
                    resolve();
                });
            } else {
                audio.pause();
                audio.paused = true;
                dataLayer.push({'event': 'select_item'});
                resolve();
            }

        }).then(function() {
            document.querySelector('section.permission').classList.toggle('muted');
        })
    }
    document.querySelector( 'section.permission' ).addEventListener( 'click', function() {
        triggerSound();
    });
    document.querySelector( 'h2' ).addEventListener( 'click', function() {
        triggerSound().then(function() {
            document.querySelector('h2').classList.toggle('muted');
        });
    });
</script>
</body>
</html>