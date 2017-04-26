<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookStore</title>

    <link href="/../BookStore/assets/css/detail.css" rel="stylesheet" type="text/css"/>
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
<div style="float: right; background-color: white; margin-top: 30px; margin-bottom: 100px; width: 75%; margin-right: 25px; padding: 15px;">

    <?php
        echo '
            <div style="float: left">
                <div><img src="/../BookStore/' . $book['b_img'] . '"></div>
                <div style="text-align: center; margin-top: 25px; margin-bottom: 30px">
                    <a href="/../BookStore/' . $book['b_img'] . '"><img src="/../BookStore/assets/images/zoom.gif"></a>
                </div>
            </div>
            <div style="float: right; width: 68%;">
                <div style="color: black; font-size: 30px; margin-top:18px"><b>' . $book['b_nm'] . '</b></div>
                <div style="color: black; font-size: 17px; margin-top:12px"><i>By (author) : ' . $book['b_author'] . '</i></div>
                <div style="color: red; font-size: 20px; margin-top: 12px">Price : ' . $book['b_price'] . '$</div>
                <div style="color: black; font-size: 15px; margin-top: 15px; margin-bottom: 40px">' . $book['b_desc'] . '</div>
            </div>
            ';
    ?>

    <div style="color: black; font-size: 20px; clear: both;">
        <div style="background-color: #F2F2F2; height: 35px; margin: -15px"></div>
        <div style="margin-top: 30px; margin-bottom: 20px; text-align: center; font-size: 25px">Chi tiết sản phẩm</div>
        <table style="font-size: 20px; text-align: center">
            <col width="15%">
            <col width="30%">
            <col width="15%">
            <col width="25%">
            <col width="15%">
            <tr>
                <td>Pages</td>
                <td>Publisher</td>
                <td>Language</td>
                <td>ISBN</td>
                <td>Availability</td>
            </tr>
            <tr>
                <?php
                    echo '
                        <td>' . $book['b_page'] . '</td>
                        <td>' . $book['b_publisher'] . '</td>
                        <td>' . $book['b_lang'] . '</td>
                        <td>' . $book['b_isbn'] . '</td>
                        <td style="color: red">' . $book['b_stt'] . '</td>
                    ';
                ?>
            </tr>
        </table>
    </div>
</div>


<!--FOOTER-->
<?php
include_once __DIR__ . "/../../widgets/footer.php";
?>

</body>
</html>