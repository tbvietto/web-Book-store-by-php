<?php
include_once __DIR__ . "/../../../admin/models/categories/category.php";

$category = getCategory();
$msg_missing_info = '';
if (isset($_GET['msg_missing_info'])) {
    $msg_missing_info = $_GET['msg_missing_info'];
}
$msg_missing_info_del_cat = '';
if (isset($_GET['msg_missing_info_del_cat'])) {
    $msg_missing_info_del_cat = $_GET['msg_missing_info_del_cat'];
}
$msg_missing_info_add_sub_cat = '';
if (isset($_GET['msg_missing_info_add_sub_cat'])) {
    $msg_missing_info_add_sub_cat = $_GET['msg_missing_info_add_sub_cat'];
}
$msg_missing_info_del_sub_cat = '';
if (isset($_GET['msg_missing_info_del_sub_cat'])) {
    $msg_missing_info_add_sub_cat = $_GET['msg_missing_info_del_sub_cat'];
}

$msg_success = '';
if (isset($_GET['msg_success'])) {
    $msg_success = $_GET['msg_success'];
}
$msg_success_del_cat = '';
if (isset($_GET['msg_success_del_cat'])) {
    $msg_success_del_cat = $_GET['msg_success_del_cat'];
}
$msg_success_add_sub_cat = '';
if (isset($_GET['msg_success_add_sub_cat'])) {
    $msg_success_add_sub_cat = $_GET['msg_success_add_sub_cat'];
}
$msg_success_del_sub_cat = '';
if (isset($_GET['msg_success_del_sub_cat'])) {
    $msg_success_del_sub_cat = $_GET['msg_success_del_sub_cat'];
}

include_once __DIR__ . "/../../../admin/views/categories/index.php";