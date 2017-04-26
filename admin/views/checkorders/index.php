<?php
if(!isset($_SESSION)){
    session_start();
}

include_once __DIR__ . "/../../../system/librarys/database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookStore</title>

    <link href="/../BookStore/assets/css/home.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" href="http://www.fatturaelettronica-pa.com/wp-content/uploads/2016/03/1458932949_book.png">
</head>
<style>
    table {
        border: 1px solid black;
        width:100%;
        height: 20px;
        table-layout: fixed;
    }

    table td {
        border: 1px solid black;
        padding: 8px;
    }
</style>
<body style="background-color: #F2F2F2;">

<!--HEADER-->
<?php
include_once __DIR__ . "/../../../admin/widgets/header.php";
?>

<!--BODY-->
<div style="margin: 40px auto; width: 90%;">

    <div style="background-color: white; padding: 20px; text-align: left; font-size: 20px;">

        <span style="color: blue; margin-left: 15px"><?php if (isset($_GET['com'])) echo 'Hoàn Thành' ?></span>

    </div>

    <div style="background-color: white; padding: 20px; text-align: left; font-size: 20px;">

        <table style="font-size: 20px; text-align: left">
            <col width="5%">
            <col width="14%">
            <col width="15%">
            <col width="15%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="20%">
            <tr>
                <td style="text-align: center">Order No</td>
                <td>Name</td>
                <td>Ward/ Village</td>
                <td>Town/District</td>
                <td>City</td>
                <td>Address</td>
                <td>Phone</td>
                <td>Change status</td>
            </tr>
            <?php

            foreach ($orders as $value) {
                echo "<tr>
                        <td style='text-align: center'>" . $value['id'] . "</td>
                        <td>" . $value['name'] . "</td>
                        <td>" . $value['ward'] . "</td>
                        <td>" . $value['town'] . "</td>
                        <td>" . $value['city'] . "</td>
                        <td>" . $value['address'] . "</td>
                        <td>" . $value['phone'] . "</td>
                        <td>
                            <form action='/../BookStore/admin/controllers/checkorders/index.php?com=com' method='POST'>
                            <input type='submit' class='btn btn-primary custom' name='" . $value['id'] . "' value='Shipping' style='font-size: 14px; width:100%; margin-bottom: 10px'>
                            <input type='submit' class='btn btn-primary' name='" . $value['id'] . "' value='Waiting' style='font-size: 14px; width:100%;'>
                            </form>";
                            if(isset($_POST['' . $value['id'] . ''])){
                                $id = $value['id'];
                                $stt = $_POST['' . $value['id'] . ''];
                                $query='update orders set stt = "' . $stt . '" where id = ' . $id;
                                mysqli_query($conn,$query) or die("Can't Connect to Query...");
                            }
                        echo "</td>
                    </tr>";
            }
            ?>
        </table>

    </div>

</div>

<!--FOOTER-->
<?php
include_once __DIR__ . "/../../../admin/widgets/footer.php";
?>

</body>
</html>