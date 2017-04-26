<?php

include_once __DIR__ . "/../../../system/librarys/database.php";
include_once __DIR__ . "/../../../admin/models/categories/category.php";

if(!empty($_POST))
{
    $msg_missing_info = '';

    if(empty($_POST['subcat']) || empty($_POST['parent']))
    {
        $msg_missing_info = "Xin hãy điền đủ thông tin!";
    }

    if(!empty($msg_missing_info))
    {
        header('location: /../BookStore/admin/controllers/categories/index.php?msg_missing_info_add_sub_cat=' . $msg_missing_info);
    }
    else
    {
        $parent_name = $_POST['parent'];
        $subcat = $_POST['subcat'];

        $parent = getParentId($parent_name);

        $data = array(
            'parent_id' => $parent['cat_id'],
            'subcat_nm' => $subcat
        );

        db_insert('subcat', $data);

        header('location: /../BookStore/admin/controllers/categories/index.php?msg_success_add_sub_cat=' . 'Thêm thành công!');
    }
}
else
{
    header('location: /../BookStore/index.php');
}