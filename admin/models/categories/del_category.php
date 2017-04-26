<?php

include_once __DIR__ . "/../../../system/librarys/database.php";

if(!empty($_POST))
{
    $msg_missing_info = '';

    if(empty($_POST['del']))
    {
        $msg_missing_info = "Xin hãy chọn category!";
    }

    if(!empty($msg_missing_info))
    {
        header('location: /../BookStore/admin/controllers/categories/index.php?msg_missing_info_del_cat=' . $msg_missing_info);
    }
    else
    {
        $delcat = $_POST['del'];

        $sql = db_create_sql('delete from category {where}', array(
            'cat_nm' => $delcat
        ));
        db_execute($sql);

        header('location: /../BookStore/admin/controllers/categories/index.php?msg_success_del_cat=' . 'Xóa thành công!');
    }
}
else
{
    header('location: /../BookStore/index.php');
}

