<?php

include_once __DIR__ . "/../../../system/librarys/helper.php";
include_once __DIR__ . "/../../../system/librarys/database.php";

function getAllRequest () {
    $sql = db_create_sql('SELECT * from request');
    $result = db_get_list($sql);
    return $result;
}

function getUserName ($id) {
    $sql = db_create_sql('SELECT * from user where u_id = ' . $id);
    $result = db_get_row($sql);
    return $result;
}