<?php

include_once __DIR__ . "/../../../system/librarys/helper.php";
include_once __DIR__ . "/../../../system/librarys/database.php";

function getRequest ($u_id) {
    $query = "select * from request where u_id = $u_id";
    $sql = db_create_sql($query);
    $result = db_get_list($sql);
    return $result;
}