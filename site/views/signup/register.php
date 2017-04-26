<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookStore</title>
    <link rel="icon" href="http://www.fatturaelettronica-pa.com/wp-content/uploads/2016/03/1458932949_book.png">
</head>
<style>
    .inputInfo {
        width: 50%;
        height: 40px;
        padding: 10px;
        font-size: 18px;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        margin-top: 13px;
        padding-left: 15px;
    }
</style>
<body style="background-color: #F2F2F2;">

<!--HEADER-->
<?php
include_once __DIR__ . "/../../widgets/header.php";
?>

<!--BODY-->
<!--SideBar-->
<?php
include_once __DIR__ . "/../../widgets/sidebar.php";
?>
<!--HomePage-->
<div style="float: right; background-color: white; margin-top: 30px; margin-bottom: 100px; width: 75%; margin-right: 25px; padding: 30px;">

    <?php
    if(isset($_GET['error']))
    {
        echo '<div style="color: red; font-size:18px; margin-bottom: 20px; padding: 20px">' . $_GET['error'] . '</div>';
    }
    if(isset($_GET['ok']))
    {
        echo '<div style="color: blue; font-size:18px; margin-bottom: 20px; padding: 20px">You Are Successfully Registered !</div>';
    }
    ?>

    <div style="float: left">
        <div style="color: black; margin-top: 13px; font-size: 22px; height: 40px; text-align: right">Họ Tên <span style="color: red">*</span> :</div>
        <div style="color: black; margin-top: 13px; font-size: 22px; height: 40px; text-align: right">Tên đăng nhập <span style="color: red">*</span> :</div>
        <div style="color: black; margin-top: 13px; font-size: 22px; height: 40px; text-align: right">Mật khẩu <span style="color: red">*</span> :</div>
        <div style="color: black; margin-top: 13px; font-size: 22px; height: 40px; text-align: right">Xác nhận mật khẩu <span style="color: red">*</span> :</div>
        <div style="color: black; margin-top: 13px; font-size: 22px; height: 40px; text-align: right">Giới tính :</div>
        <div style="color: black; margin-top: 13px; font-size: 22px; height: 40px; text-align: right">E-mail <span style="color: red">*</span> :</div>
        <div style="color: black; margin-top: 13px; font-size: 22px; height: 40px; text-align: right">Số điện thoại :</div>
        <div style="color: black; margin-top: 13px; font-size: 22px; height: 40px; text-align: right">Thành Phố :</div>
    </div>

    <div style="float: right; width: 75%;">
        <form action="/../BookStore/site/models/signup/process_register.php" method="POST">
            <input type="text" class="inputInfo" maxlength="30" name="fnm">
            <input type="text" class="inputInfo" maxlength="30" name="unm">
            <input type="password" class="inputInfo" placeholder="6 -> 30 Ký tự" maxlength="30" name="pwd">
            <input type="password" class="inputInfo" maxlength="30" name="cpwd">
            <div style="height: 40px; margin-top: 20px; font-size: 18px">
                <input type="checkbox" value="Male" name="gender"><Label style="margin-left: 10px; margin-right: 20px">Nam</Label>
                <input type="checkbox" value="Female" name="gender"><Label style="margin-left: 10px">Nữ</Label>
            </div>
            <input type="text" class="inputInfo" style="margin-top: 2px" maxlength="30" name="mail">
            <input type="text" class="inputInfo" maxlength="30" name="contact">
            <input type="text" class="inputInfo" maxlength="30" name="city">
            <input type="submit" style="width: 50%; height: 40px; font-size: 18px; margin-top: 13px;" value="OK">
        </form>
    </div>

</div>

<!--FOOTER-->
<?php
include_once __DIR__ . "/../../widgets/footer.php";
?>

</body>
</html>