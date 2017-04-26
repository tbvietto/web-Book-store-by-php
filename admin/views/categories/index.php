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
    .input {
        width: 100%;
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
<div style="margin: 40px auto; width: 80%;">

    <div style="background-color: white; padding: 20px; text-align: center; font-size: 20px;">

        <table style="font-size: 20px; text-align: left">
            <col width="50%">
            <col width="50%">
            <tr>
                <td>Category
                    <span style="color: red; margin-left: 15px"><?php echo $msg_missing_info; ?></span>
                    <span style="color: blue; margin-left: 15px"><?php echo $msg_success; ?></span>
                </td>
                <td>Delete Category
                    <span style="color: red; margin-left: 15px"><?php echo $msg_missing_info_del_cat; ?></span>
                    <span style="color: blue; margin-left: 15px"><?php echo $msg_success_del_cat; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <form action='/../BookStore/admin/models/categories/add_category.php' method='POST'>
                        <table style="font-size: 20px; text-align: left">
                            <col width="70%">
                            <col width="30%">
                            <tr>
                                <td>
                                    <input type="text" class="input" name="cat">
                                </td>
                                <td>
                                    <input type="submit" value="Add" style="width: 70%; height: 37px;">
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
                <td>
                    <form action='/../BookStore/admin/models/categories/del_category.php' method='POST'>
                        <table style="font-size: 20px; text-align: left">
                            <col width="70%">
                            <col width="30%">
                            <tr>
                                <td>
                                    <select  name="del">
                                        <?php
                                            foreach ($category as $value) {
                                                echo '<option>' . $value['cat_nm'];
                                            }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="submit" value="Delete" style="width: 70%; height: 37px;">
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>

        <div style="background-color: white; height: 30px;"></div>

        <div style="background-color: #F2F2F2; height: 50px; margin-left: -30px; margin-right: -30px"></div>

        <div style="background-color: white; height: 20px;"></div>

        <table style="font-size: 20px; text-align: left">
            <col width="50%">
            <col width="50%">
            <tr>
                <td>Sub-Category
                    <span style="color: red; margin-left: 15px"><?php echo $msg_missing_info_add_sub_cat; ?></span>
                    <span style="color: blue; margin-left: 15px"><?php echo $msg_success_add_sub_cat; ?></span>
                </td>
                <td>Delete Sub-Category
                    <span style="color: red; margin-left: 15px"><?php echo $msg_missing_info_del_sub_cat; ?></span>
                    <span style="color: blue; margin-left: 15px"><?php echo $msg_success_del_sub_cat; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <!--Sub-Category-->
                    <form action='/../BookStore/admin/models/categories/add_sub_category.php' method='POST'>
                        <table style="font-size: 20px; text-align: left">
                            <col width="70%">
                            <col width="30%">
                            <tr>
                                <td>
                                    <div style="font-size: 16px"><u>PARENT CATEGORY</u></div>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="font-size: 20px; text-align: left; margin-left: -10px">
                                        <col width="70%">
                                        <col width="30%">
                                        <tr>
                                            <td>
                                                <select  name="parent">
                                                    <?php
                                                    foreach ($category as $value) {
                                                        echo '<option>' . $value['cat_nm'];
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="font-size: 16px"><u>SUB-CATEGORY</u></div>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="input" name= 'subcat'>
                                </td>
                                <td>
                                    <input type="submit" value="Add" style="width: 70%; height: 37px;">
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
                <td>
                    <form action='/../BookStore/admin/models/categories/del_sub_category.php' method='POST'>
                        <table style="font-size: 20px; text-align: left; margin-top: -100px">
                            <col width="70%">
                            <col width="30%">
                            <tr>
                                <td>
                                    <select  name="subcatnm">
                                        <?php
                                            foreach ($category as $value) {
                                                echo "<option disabled>" . $value['cat_nm'];

                                                $sub_cat = getSubCategory($value['cat_id']);
                                                foreach ($sub_cat as $valueSub) {
                                                    echo '<option value="' . $valueSub['subcat_id'] . '"> -> ' . $valueSub['subcat_nm'];
                                                }
                                            }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="submit" value="Delete" style="width: 70%; height: 37px;">
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>

        <div style="background-color: white; height: 10px;"></div>

    </div>

</div>

<!--FOOTER-->
<?php
include_once __DIR__ . "/../../../admin/widgets/footer.php";
?>

</body>
</html>