<?php session_start();

include_once __DIR__ . "/../../models/signup/login.php";

if (isset($_POST))
{
    $msg = "";
    $error_no_user = "";
    $error_pass_incorrect = "";
    $error_invalid_user = "";
    $error_incorrect_pass = "";

    if(empty($_POST['usernm']))
    {
        $error_no_user = "No Such User";
    }

    if(empty($_POST['pwd']))
    {
        $error_pass_incorrect = "Password Incorrect";
    }

    if(!empty($error_no_user) && !empty($error_pass_incorrect))
    {
        header('location: /../BookStore/index.php?error_user=' . $error_no_user . '&error_pass=' . $error_pass_incorrect);
    }
    else
    {
        $unm = $_POST['usernm'];

        $users = getUserInfo($unm);

        if($users)
        {
            $pass = $_POST['pwd'];
            if(md5($pass)== $users['u_pwd'])
            {
                $_SESSION = array();
                $_SESSION['unm'] = $users['u_unm'];
                $_SESSION['uid'] = $users['u_pwd']; //TODO
                $_SESSION['id'] = $users['u_id'];
                $_SESSION['status'] = true;

                if($_SESSION['unm'] != "admin")
                {
                    header('location: /../BookStore/index.php');
                }
                else
                {
                    header('location: /../BookStore/admin/controllers/home/index.php');
                }
            }
            else
            {
                $error_incorrect_pass = "Incorrect password!";
                header('location: /../BookStore/index.php?error_incorrect_pass=' . $error_incorrect_pass);
            }
        }
        else
        {
            $error_invalid_user = "Invalid username!";
            header('location: /../BookStore/index.php?error_invalid_user=' . $error_invalid_user);
        }
    }
}
else
{
    header('location: /../BookStore/index.php');
}