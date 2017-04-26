<?php

include_once __DIR__ . "/../../../system/librarys/database.php";

if(!empty($_POST))
{
    $msg_missing_info = '';

    if(empty($_POST['cat']))
    {
        $msg_missing_info = "Xin hãy điền đủ thông tin!";
    }

    if(!empty($msg_missing_info))
    {
        header('location: /../BookStore/admin/controllers/categories/index.php?msg_missing_info=' . $msg_missing_info);
    }
    else
    {
        $cat = $_POST['cat'];

        $data = array(
            'cat_nm' => $cat
        );

        db_insert('category', $data);

        header('location: /../BookStore/admin/controllers/categories/index.php?msg_success=' . 'Thêm thành công!');
    }
}
else
{
    header('location: /../BookStore/index.php');
}

