<?php

require __DIR__ . '/vendor/autoload.php';
$render = new Mustache_Engine(array('entity_flags' => ENT_QUOTES));

$params = parse_url($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$trimmed = ltrim($params['path'], '/');
$template = 'landing';
$lang = 'pt';

if (strlen($trimmed) > 0) {
    $path_exploded = explode('/', $trimmed);
    switch (count($path_exploded)) {
        case 1:
            $lang = $path_exploded[0];
            break;
        case 2:
            $lang = $path_exploded[0];
            $template = $path_exploded[1];
    }
}

die($render->render(file_get_contents("views/$template.tmpl"), [
    'lang' => $lang,
    'cache' => time(),
    'header' => file_get_contents("views/$lang/header.tmpl"),
    'article' => file_get_contents("views/$lang/$template.tmpl"),
]));
