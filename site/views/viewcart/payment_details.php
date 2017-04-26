<?php session_start();

include_once __DIR__ . "/../../../system/librarys/database.php";
$id = $_SESSION['id'];
$sql = db_create_sql('SELECT * from orders where u_id = ' . $id);
$result = db_get_list($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookStore</title>
    <link rel="icon" href="http://www.fatturaelettronica-pa.com/wp-content/uploads/2016/03/1458932949_book.png">
</head>
<style>
    table {
        width:100%;
        height: 20px;
        table-layout: fixed;
    }

    table td {
        padding: 10px;
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
<!--ViewCart-->
<div style="float: right; margin-top: 30px; margin-bottom: 100px; background-color: white; width: 75%; margin-right: 25px">

    <div style="background-color: white; padding: 10px; margin-bottom: 15px; text-align: center; font-size: 20px; color: blue; margin-top: 15px">Payment options</div>

    <div>
        <form action="payment_details.php" method="POST">
            <table>
                <col width="25%">
                <col width="25%">
                <col width="25%">
                <col width="25%">
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="btn btn-primary" name="submit" value="Payment by bank account" style="font-size: 14px; width: 100%">
                    </td>
                    <td>
                        <input type="submit" class="btn btn-primary" name="submit" value="Cash On Delivery" style="font-size: 14px; width: 100%">
                    </td>
                    <td></td>
                </tr>
            </table>
        </form>

        <?php

            if(isset($_POST['submit'])){
                $mt = $_POST['submit'];

                $query="update orders set method = '$mt' where id = '$id'";

                mysqli_query($conn,$query) or die("Can't Connect to Query...");

            }

            echo '<br><h1 style="text-align: center">Success! Chúng tôi sẽ liên lạc với bạn ngay khi có thể!</h1>';
        ?>
    </div>

</div>

<!--FOOTER-->
<?php
include_once __DIR__ . "/../../widgets/footer.php";
?>

</body>
</html>