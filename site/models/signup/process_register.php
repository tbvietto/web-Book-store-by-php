<?php

include_once __DIR__ . "/../../models/signup/register.php";

if (isset($_POST))
{
    $msg = "";

    if(empty($_POST['fnm']) || empty($_POST['unm']) || empty($_POST['pwd']) || empty($_POST['cpwd']) || empty($_POST['mail']))
    {
        $msg .= "Please Full Fill All Requirement!";
    }

    if($_POST['pwd'] != $_POST['cpwd'])
    {
        $msg .= "Please Enter your Password Again!";
    }

    if(preg_match("^[a-z0-9_]+[a-z0-9_.]*@[a-z0-9_-]+[a-z0-9_.-]*\.[a-z]{2,5}$",$_POST['mail']))
    {
        $msg .= "Please Enter Your Valid Email Address!";
    }

    if(strlen($_POST['pwd'])>30 || strlen($_POST['pwd'])<6)
    {
        $msg.="Please Enter Your Password In Limited Format!";
    }

    if(is_numeric($_POST['fnm']))
    {
        $msg.="Name Must Be In String Format!";
    }
    if($msg != "")
    {
        header("location: /../Bookstore/site/controllers/signup/register.php?error=".$msg);
    }
    else
    {
        $fullname = $_POST['fnm'];
        $username = $_POST['unm'];
        $password = md5($_POST['pwd']);
        $gender = $_POST['gender'];
        $email = $_POST['mail'];
        $contact = $_POST['contact'];
        $city = $_POST['city'];

        $sqluser = db_create_sql('SELECT * from user');
        $result = db_get_list($sqluser);
        $count = count($result);

        if (insertUser($count+1, $fullname, $username, $password, $gender, $email, $contact, $city)) {
            echo 'success!';
            header("location: /../Bookstore/site/controllers/signup/register.php?ok=1");
        } else {
            echo 'false';
        }
    }
}
else
{
    header('location: /../Bookstore/index.php');
}