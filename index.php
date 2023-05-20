<?php
$cache = time();
$params = parse_url($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$index = ltrim($params['path'], '/') . '.php';
if (is_file($index)) {
    die(file_get_contents($index));
}
die(file_get_contents('pt.php'));
?>