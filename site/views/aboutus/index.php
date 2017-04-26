<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookStore</title>
    <link rel="icon" href="http://www.fatturaelettronica-pa.com/wp-content/uploads/2016/03/1458932949_book.png">
</head>
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
<div style="float: right; margin-top: 30px; margin-bottom: 100px; width: 75%; margin-right: 25px">

    <div style="background-color: white; padding: 30px;">

        <div style="font-size: 20px;">Vũ Thu Hiền (Nhóm Trưởng)</div>
        <ul>
            <li><div style="font-size: 15px; margin-left: 20px">MSSV : 20132567</div>
        </ul>

        <div style="font-size: 20px; margin-top: 30px">Bùi Đăng Minh</div>
        <ul>
            <li>
                <div style="font-size: 15px; margin-left: 20px">MSSV : 20132567</div>
            </li>
        </ul>

        <div style="font-size: 20px; margin-top: 30px">Phạm Đình Chiến</div>
        <ul>
            <li>
                <div style="font-size: 15px; margin-left: 20px">MSSV : 20130401</div>
            </li>
        </ul>

        <div style="font-size: 20px; margin-top: 30px">Thái Bá Việt</div>
        <ul>
            <li>
                <div style="font-size: 15px; margin-left: 20px">MSSV : 20134594</div>
            </li>
        </ul>

        <div style="font-size: 20px; margin-top: 30px">Trần Hữu Ngọc</div>
        <ul>
            <li>
                <div style="font-size: 15px; margin-left: 20px">MSSV : 2013</div>
            </li>
        </ul>
    </div>

</div>

<!--FOOTER-->
<?php
include_once __DIR__ . "/../../widgets/footer.php";
?>

</body>
</html>