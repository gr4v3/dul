<?php
require __DIR__ . '/vendor/autoload.php';
$cache = time();
$lang = 'fr';
$render = new Mustache_Engine(array('entity_flags' => ENT_QUOTES));
?>
<!DOCTYPE html>
<html lang="<?php echo $lang ?>">
<?php
echo $render->render(file_get_contents("views/$lang/header.tmpl"), ['cache' => $cache]);
?>
<body>
<main>
    <header>
        <img src="img/fundo5.jpg" alt="Dul N'Nouk White"/>
    </header>
    <?php
    echo $render->render(file_get_contents("views/$lang/landing.tmpl"), ['cache' => $cache]);
    echo $render->render(file_get_contents("views/$lang/footer.tmpl"), ['cache' => $cache]);
    ?>
</main>
<script src="node_modules/store2/dist/store2.min.js"></script>
<script type="text/javascript" src="js/index.js?<?php echo $cache; ?>"></script>
</body>
</html>