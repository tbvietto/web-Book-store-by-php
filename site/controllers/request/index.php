<?php session_start();
include_once __DIR__ . "/../../models/request/index.php";

$request = '';
if(isset($_SESSION['id'])) {
    $request = getRequest($_SESSION['id']);
}

$msg_missing_info = '';
$msg_title_number = '';
$msg_author_number = '';
if (isset($_GET['msg_missing_info'])) {
    $msg_missing_info = $_GET['msg_missing_info'];
}
if (isset($_GET['msg_title_number'])) {
    $msg_title_number = $_GET['msg_title_number'];
}
if (isset($_GET['msg_author_number'])) {
    $msg_author_number = $_GET['msg_author_number'];
}

include_once __DIR__ . "/../../views/request/index.php";