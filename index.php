<?php

if(!isset($_SESSION)){
    session_start();
}

define("IN_SITE", true);

$controller = isset($_GET['controller']) ? $_GET['controller'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';

if (empty($controller) || empty($action)){
    $controller = 'home';
    $action = 'index';
}

$path = 'site/controllers/'. $controller . '/' . $action . '.php';

if (file_exists($path)) {
    include_once ($path);
}
else {
    include_once ('404.php');
}