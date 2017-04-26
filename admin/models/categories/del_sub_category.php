<?php

include_once __DIR__ . "/../../../system/librarys/database.php";

if(!empty($_POST))
{
    $msg_missing_info = '';

    if(empty($_POST['subcatnm']))
    {
        $msg_missing_info = "Xin hãy chọn category!";
    }

    if(!empty($msg_missing_info))
    {
        header('location: /../BookStore/admin/controllers/categories/index.php?msg_missing_info_del_sub_cat=' . $msg_missing_info);
    }
    else
    {
        $cat_id = $_POST['subcatnm'];

        $sql_subcat = db_create_sql('delete from subcat {where}', array(
            'subcat_id' => $cat_id
        ));
        db_execute($sql_subcat);

        $sql_book = db_create_sql('delete from book {where}', array(
            'b_subcat' => $cat_id
        ));
        db_execute($sql_book);

        header('location: /../BookStore/admin/controllers/categories/index.php?msg_success_del_sub_cat=' . 'Xóa thành công!');
    }
}
else
{
    header('location: /../BookStore/index.php');
}

