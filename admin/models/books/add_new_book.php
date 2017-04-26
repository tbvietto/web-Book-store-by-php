<?php
include_once __DIR__ . "/../../../system/librarys/database.php";

if(!empty($_POST))
{
    $msg_missing_info = '';
    $msg_price_number = '';
    $msg_page_number = '';

    if(empty($_POST['name']) || empty($_POST['author']) || empty($_POST['cat']) || empty($_POST['lang']) || empty($_POST['description']) || empty($_POST['publisher'])|| empty($_POST['ava']) || empty($_POST['isbn']) || empty($_POST['pages']) || empty($_POST['price']))
    {
        $msg_missing_info = "Xin hãy nhập đầy đủ thông tin!";
    }

    if(!(is_numeric($_POST['price'])))
    {
        $msg_price_number = "Price must be in float format";
    }

    if(!(is_numeric($_POST['pages'])))
    {
        $msg_page_number = "Page must be in numeric format";
    }

    if(!empty($msg_missing_info) || !empty($msg_price_number) || !empty($msg_page_number))
    {
        header('location: /../BookStore/admin/views/books/add_new_book.php?msg_missing_info=' . $msg_missing_info . '&msg_price_number=' . $msg_price_number . '&msg_page_number=' . $msg_page_number);
    }
    else
    {
        move_uploaded_file($_FILES['img']['tmp_name'],"../upload_image/".$_FILES['img']['name']);
        $b_img = "upload_image/".$_FILES['img']['name'];

        $b_nm = $_POST['name'];
        $b_cat = $_POST['cat'];
        $b_desc = $_POST['description'];
        $b_au = $_POST['author'];
        $b_publisher = $_POST['publisher'];
        $b_isbn = $_POST['isbn'];
        $b_pages = $_POST['pages'];
        $b_price = $_POST['price'];
        $b_lang = $_POST['lang'];
        $b_stt = $_POST['ava'];

        $sqlallbook = db_create_sql('SELECT * from book');
        $result = db_get_list($sqlallbook);
        $count = count($result);

        $data = array(
            'b_id' => $count+1,
            'b_nm' => $b_nm,
            'b_subcat' => $b_cat,
            'b_desc' => $b_desc,
            'b_author' => $b_au,
            'b_publisher' => $b_publisher,
            'b_isbn' => $b_isbn,
            'b_page' => $b_pages,
            'b_price' => $b_price,
            'b_img' => $b_img,
            'b_lang' => $b_lang,
            'b_stt' => $b_stt,
        );

        db_insert('book', $data);

        header('location: /../BookStore/admin/controllers/books/index.php?msg_success=' . 'Thêm thành công!');
    }
}
else
{
    header('location: /../BookStore/index.php');
}

