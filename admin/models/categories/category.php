<?php

include_once __DIR__ . "/../../../system/librarys/helper.php";
include_once __DIR__ . "/../../../system/librarys/database.php";

function getCategory () {
    $sql = db_create_sql('select * from category');
    $result = db_get_list($sql);
    return $result;
}

function getSubCategory ($cat_id) {
    $sql = db_create_sql("select * from subcat where parent_id = '$cat_id'");
    $result = db_get_list($sql);
    return $result;
}

function getParentId ($parent) {
    $sql = db_create_sql("select * from category where cat_nm = '$parent'");
    $result = db_get_row($sql);
    return $result;
}