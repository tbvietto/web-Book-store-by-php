<?php

include_once __DIR__ . "/../../../system/librarys/helper.php";
include_once __DIR__ . "/../../../system/librarys/database.php";

function getDetailBook ($table, $id) {
    $sql = db_create_sql('SELECT * from ' . $table . ' where  b_id = ' . $id);
    $result = db_get_row($sql);
    return $result;
}