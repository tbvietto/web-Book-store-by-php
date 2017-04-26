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
            <col width="15%">
            <col width="15%">
            <col width="15%">
            <col width="20%">
            <col width="10%">
            <col width="20%">
            <tr>
                <td style="text-align: center">No</td>
                <td>Người Dùng</td>
                <td>Tên Sách</td>
                <td>Tác Giả</td>
                <td>Thông Tin Khác</td>
                <td>Trạng Thái</td>
                <td>Chỉnh Sửa Trạng Thái</td>
            </tr>
            <?php


            $count = 1;
            foreach ($request as $value) {
                echo "<tr>
                        <td style='text-align: center'>" . $count . "</td>
                        <td>" . getUserName($value['u_id'])['u_unm'] . "</td>
                        <td>" . $value['re_bnm'] . "</td>
                        <td>" . $value['re_bau'] . "</td>
                        <td>" . $value['re_oth'] . "</td>
                        <td>" . $value['re_stt'] . "</td>
                        <td>
                            <form action='/../BookStore/admin/controllers/checkrequests/index.php?com=com' method=\"POST\">
                                <input type='submit' class='btn btn-primary custom' name='" . $value['re_id']. "' value='Processing' style='font-size: 14px; width:100%; margin-bottom: 10px'>
                                <input type='submit' class='btn btn-primary' name='" . $value['re_id'] . "' value='Founded' style='font-size: 14px; width:100%;'>";

                                if(isset($_POST[''.$value['re_id'].''])){
                                    if ($_POST[''.$value['re_id'].''] == 'Processing') {
                                        $query = "update request set re_stt = 'Processing' where re_id = " . $value['re_id'];
                                        mysqli_query($conn,$query) or die("Can't Connect to Query...");

                                        $sql12 = db_create_sql("select * from book where b_nm = " . $value['re_bnm']);
                                        $result = mysqli_query($conn, $sql12);
                                        if ($result) {
                                            $query1 = "update request set bid = " . $result['b_id'] . " where re_id = " . $value['re_id'];
                                            mysqli_query($conn,$query1) or die("Can't Connect to Query...");
                                        }
                                    } else if ($_POST[''.$value['re_id'].''] == 'Founded') {
                                        $query = "update request set re_stt = 'Founded' where re_id = " . $value['re_id'];
                                        mysqli_query($conn,$query) or die("Can't Connect to Query...");

                                        $sql12 = db_create_sql("select * from book where b_nm = " . $value['re_bnm']);
                                        $result = mysqli_query($conn, $sql12);
                                        if ($result) {
                                            $query1 = "update request set bid = " . $result['b_id'] . " where re_id = " . $value['re_id'];
                                            mysqli_query($conn,$query1) or die("Can't Connect to Query...");

                                            $query2="update book set b_stt = 'Available' where b_id = " . $result['b_id'];
                                            mysqli_query($conn,$query2) or die("Can't Connect to Query...");
                                        }
                                    }
                                }

                        echo "</form>
                        </td>
                    </tr>";
                $count++;
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