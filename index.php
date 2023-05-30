<?php

require __DIR__ . '/vendor/autoload.php';
$render = new Mustache_Engine(array('entity_flags' => ENT_QUOTES));

$params = parse_url($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$trimmed = ltrim($params['path'], '/');
$template = 'landing';
$lang = 'pt';
try {
    if (strlen($trimmed) > 0) {
        $path_exploded = explode('/', $trimmed);
        $counter = count($path_exploded);
        if ($counter === 1 && in_array($path_exploded[0], ['pt', 'fr', 'en'])) {
            $lang = $path_exploded[0];
        } else if ($counter === 1 && in_array($path_exploded[0], ['landing', 'store'])) {
            $template = $path_exploded[0];
        } else if ($counter === 2 && in_array($path_exploded[0], ['pt', 'fr', 'en']) && in_array($path_exploded[1], ['landing', 'store'])) {
            [$lang, $template] = $path_exploded;
        }
    }
    die($render->render(file_get_contents("views/$template.tmpl"), [
        'lang' => $lang,
        'cache' => time(),
        'header' => $render->render(file_get_contents("views/$lang/header.tmpl"), ['cache' => time()]),
        'article' => $render->render(file_get_contents("views/$lang/$template.tmpl"), ['cache' => time()]),
    ]));
} catch (\RuntimeException $e) {

}

