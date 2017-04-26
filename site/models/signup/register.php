<?php

include_once __DIR__ . "/../../../system/librarys/helper.php";
include_once __DIR__ . "/../../../system/librarys/database.php";

function insertUser ($id, $fullname, $username, $password, $gender, $email, $contact, $city) {
    $data = array(
        'u_id' => $id,
        'u_fnm' => $fullname,
        'u_unm' => $username,
        'u_pwd' => $password,
        'u_gender'  => $gender,
        'u_email' => $email,
        'u_contact' => $contact,
        'u_city' => $city,
    );

    return db_insert('user', $data);
}