<?php

include_once __DIR__ . "/../../../system/librarys/helper.php";
include_once __DIR__ . "/../../../system/librarys/database.php";

function getAllBooks () {
    $sql = db_create_sql('SELECT * from book');
    $result = db_get_list($sql);
    return $result;
}