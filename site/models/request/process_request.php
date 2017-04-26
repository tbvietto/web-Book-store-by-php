<?php  session_start();

include_once __DIR__ . "/../../../system/librarys/database.php";

if(!empty($_POST))
{
    $msg_missing_info = '';
    $msg_title_number = '';
    $msg_author_number = '';

    if(empty($_POST['title']) || empty($_POST['author']))
    {
        $msg_missing_info = "Xin hãy điền đủ thông tin!";
    }


    if(is_numeric($_POST['title']))
    {
        $msg_title_number = "Title must be in string format!";
    }

    if(is_numeric($_POST['author']))
    {
        $msg_author_number = "Author's name must be in string format!";
    }


    if(!empty($msg_missing_info) || !empty($msg_title_number) || !empty($msg_author_number))
    {
        header("location: /../Bookstore/site/controllers/request/index.php?msg_missing_info=" . $msg_missing_info . "&msg_title_number=" . $msg_title_number . "&msg_author_number=" . $msg_author_number);
    }
    else
    {
        $data = array(
            'u_id' => $_SESSION['id'],
            're_bnm' => $_POST['title'],
            're_bau' => $_POST['author'],
            're_oth'  => $_POST['other'],
            're_stt' => 'Waiting'
        );

        db_insert('request', $data);

        header("location: /../Bookstore/site/controllers/request/index.php");

    }
}
else
{
    header("location: /../BookStore/index.php");
}
?>