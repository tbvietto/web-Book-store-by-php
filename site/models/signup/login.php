<?php

include_once __DIR__ . "/../../../system/librarys/helper.php";
include_once __DIR__ . "/../../../system/librarys/database.php";

function getUserInfo ($username) {
    $user = db_get_row(db_create_sql('SELECT * FROM user {where}', array(
        'u_unm' => $username
    )));

    return $user;
}