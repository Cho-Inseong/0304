<?php
include("./config/dbconnect.php");
session_start();

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
    case 'sign_up':
        $pages = './pages/sign_up.php';
        break;
    case 'sign_in':
        $pages = './pages/sign_in.php';
        break;
    case 'logout':
        $pages = './pages/logout.php';
        break;
    case 'mypage':
        $pages = './pages/mypage.php';
        break;
    case 'holiday':
        $pages = './pages/holiday.php';
        break;
    case 'overlap':
        $pages = './api/overlap.php';
        break;
    case 'managertmddls':
        $pages = './api/managertmddls.php';
        break;
    case 'reservation1':
        $pages = './api/reservation.php';
        break;
    case 'holidaydesignation':
        $pages = './api/holidaydesignation.php';
        break;
    default:
        echo "어딜 들어와 시발롬아 뒤질라고";
        break;
}
include($pages);
