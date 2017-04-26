<?php

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
        border: 1px solid black;
        width:100%;
        height: 30px;
        table-layout: fixed;
    }

    table td {
        border: 1px solid black;
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

    <div class="post">
        <div class="entry">

            <div style="background-color: white; padding: 10px; margin-bottom: 15px; text-align: center; font-size: 20px; color: blue; margin-top: 15px">Your orders</div>

            <?php
            if(isset($_POST['Submit'])){
                echo "<h2 style='background-color: white;color:red; font-size:25px;padding-bottom:50px'>Completed!</h2>";
            }
            ?>

            <table style="font-size: 20px; text-align: center">
                <col width="5%">
                <col width="20%">
                <col width="12%">
                <col width="12%">
                <col width="12%">
                <col width="15%">
                <col width="8%">
                <col width="8%">
                <tr>
                    <td>NO.</td>
                    <td>Name</td>
                    <td>Ward/Village</td>
                    <td>Town/District</td>
                    <td>City</td>
                    <td>Address</td>
                    <td>Phone</td>
                    <td>Status</td>
                </tr>
            <?php
            $count=1;
            foreach ($result as $value) {
                echo '<tr>
                    <td>' . $value['id'] . '</td>
                    <td>' . $value['name'] . '</td>
                    <td>' . $value['ward'] . '</td>
                    <td>' . $value['town'] . '</td>
                    <td>' . $value['city'] . '</td>
                    <td>' . $value['address'] . '</td>
                    <td>' . $value['phone'] . '</td>
                    <td>' . $value['stt'] . '</td>
                </tr>';
                $count++;
            }
            echo '</table>';
            ?>
        </div>

    </div>

</div>

</div>

<!--FOOTER-->
<?php
include_once __DIR__ . "/../../widgets/footer.php";
?>

</body>
</html>