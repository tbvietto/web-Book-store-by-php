<?php
if(!isset($_SESSION)){
    session_start();
}
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

        <a href="/../BookStore/admin/views/books/add_new_book.php">Thêm Sách Mới
        <?php
        $msg_success = '';
        if (isset($_GET['msg_success'])) {
            $msg_success = $_GET['msg_success'];
        }
        ?>
        </a>
        <span style="color: blue; margin-left: 15px"><?php echo $msg_success; ?></span>

    </div>

    <div style="background-color: white; padding: 20px; text-align: left; font-size: 20px;">

        <table style="font-size: 20px; text-align: left">
            <col width="5%">
            <col width="25%">
            <col width="25%">
            <col width="20%">
            <col width="10%">
            <col width="10%">
            <col width="5%">
            <tr>
                <td>No</td>
                <td>Tên Sách</td>
                <td>Nhà Xuất Bản</td>
                <td>ISBN</td>
                <td>Giá Tiền</td>
                <td>Hình Ảnh</td>
                <td>Xóa</td>
            </tr>
            <?php
                $count = 1;
                foreach ($book as $value) {
                    echo "<tr>
                            <td style='text-align: center'>" . $count . "</td>
                            <td>" . $value['b_nm'] . "</td>
                            <td>" . $value['b_publisher'] . "</td>
                            <td>" . $value['b_isbn'] . "</td>
                            <td>" . $value['b_price'] . "$</td>
                            <td><img src='/../BookStore/" . $value['b_img'] . "'></td>
                            <td style='text-align: center;'><img src='/../BookStore/assets/images/delete.png' style='width: 15px'></td>
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