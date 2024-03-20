<?php

$request = $_SERVER['REQUEST_URI'];
$path = explode("?", $request);
$path[1] = isset($path[1]) ? $path[1] : null;
$resource = explode("/", $path[0]);

$pages = "";
switch ($resource[1]) {
    case '':
        $pages = './pages/index.php';
        break;
    case 'information':
        $pages = './pages/sub01.php';
        break;
    case 'statistics':
        $pages = './pages/sub02.php';
        break;
    case 'reservation':
        $pages = './pages/sub03.php';
        break;
    case 'goods':
        $pages = './pages/sub04.php';
        break;
    case 'login':
        $pages = './pages/login.php';
        break;
    default:
        echo "어딜 들어와 시발롬아 뒤질라고";
        break;
}
include($pages);
?>
