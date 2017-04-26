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
    .input {
        width: 70%;
        height: 20px;
        padding: 17px;
        text-align: left;
        font-size: 20px;
        display: inline-block;
        border: 1px solid #ccc;
    }

    select {
        height: 37px;
    }

    table {
        width:100%;
        height: 20px;
        table-layout: fixed;
    }

    table td {
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

    <div style="background-color: white; padding-top: 50px; padding-bottom: 50px; padding-left: 100px; padding-right: 100px; text-align: left; font-size: 20px;">

        <form action='/../BookStore/admin/models/books/add_new_book.php' method='POST' enctype="multipart/form-data">

            <div style="color: red">
                <?php
                $msg_missing_info = '';
                if (isset($_GET['msg_missing_info'])) {
                    $msg_missing_info = $_GET['msg_missing_info'];
                }
                $msg_price_number = '';
                if (isset($_GET['msg_price_number'])) {
                    $msg_price_number = $_GET['msg_price_number'];
                }
                $msg_page_number = '';
                if (isset($_GET['msg_page_number'])) {
                    $msg_page_number = $_GET['msg_page_number'];
                }

                echo $msg_missing_info;
                ?>
            </div>

            <table style="font-size: 20px; text-align: left">
                <col width="50%">
                <col width="50%">
                <tr>
                    <td>Tên Sách</td>
                    <td>Tác Giả</td>
                </tr>
                <tr>
                    <td><input type="text" class="input" name='name'></td>
                    <td><input type="text" class="input" name='author'></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>Nhà Xuất Bản</td>
                </tr>
                <tr>
                    <td>
                        <select  name="cat" style="width:70%;">
                            <?php
                                $sql = db_create_sql('select * from category');
                                $category = db_get_list($sql);
                                foreach ($category as $value) {
                                    echo "<option disabled>" . $value['cat_nm'];
                                    $sql_sub = db_create_sql("select * from subcat where parent_id = " . $value['cat_id']);
                                    $sub_cat = db_get_list($sql_sub);
                                    foreach ($sub_cat as $valueSub) {
                                        echo '<option value="' . $valueSub['subcat_id'] . '"> -> ' . $valueSub['subcat_nm'];
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="text" class="input" name='publisher'></td>
                </tr>
                <tr>
                    <td>Ngôn Ngữ</td>
                    <td>ISBN</td>
                </tr>
                <tr>
                    <td><input type="text" class="input" name='lang'></td>
                    <td><input type="text" class="input" name='isbn'></td>
                </tr>
                <tr>
                    <td>Số Trang</td>
                    <td>Giá Tiền</td>
                </tr>
                <tr>
                    <td><input type="text" class="input" name='pages'></td>
                    <td><input type="text" class="input" name='price'></td>
                </tr>
                <tr>
                    <td>
                        <span style="color: red; margin-left: 15px"><?php echo $msg_page_number; ?></span>
                    </td>
                    <td>
                        <span style="color: red; margin-left: 15px"><?php echo $msg_price_number; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Trạng Thái</td>
                    <td>Tải Ảnh</td>
                </tr>
                <tr>
                    <td>
                        <select name='ava'>
                            <option value="Available" label="Available">Available</option>
                            <option value="Unavailable" label="Unavailable">Unavailable</option>
                        </select>
                    </td>
                    <td><input type="file" style="height: 37px" name='img'></td>
                </tr>
            </table>

            <div style="margin-left: 10px; margin-top: 10px">
                <div>Miêu Tả</div>
                <textarea style="margin-top: 10px; width: 100%" name='description'></textarea>
                <input type="submit" value="Thêm sách" style="margin-top: 20px;">
            </div>

        </form>

    </div>

</div>

<!--FOOTER-->
<?php
include_once __DIR__ . "/../../../admin/widgets/footer.php";
?>

</body>
</html>