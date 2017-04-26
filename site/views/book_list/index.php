<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookStore</title>

    <link href="/../BookStore/assets/css/home.css" rel="stylesheet" type="text/css"/>
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

    <!--SubCategories-->
    <div style="background-color: white; padding: 10px; margin-bottom: 15px; text-align: center; font-size: 20px; color: green;">-- <?php echo $_GET['subcatnm']; ?> --</div>

    <div style="background-color: white;">

        <?php
        foreach ($book_list as $value) {
            echo '<div>
                <div class="cardBook">
                    <div class="card">
                        <a href="/../BookStore/site/controllers/detail/index.php?id=' . $value['b_id'] . '"><img class="img" style="width: 100%; height: 250px; background-color: blue" src="/../BookStore/' . $value["b_img"] . '"></a>
                        <div style="height: 120px">
                            <div style="margin-top: 8px; font-size: 16px; line-height: 1.5em; height: 3em; overflow: hidden;">' . $value['b_nm'] . '</div>
                            <div style="margin-top: 8px; font-size: 16px; color: #9E9E9E">' . $value['b_pbd'] . '</div>
                            <div style="margin-top: 8px; font-size: 16px; color: red">' . $value['b_price'] . '$</div>
                        </div>
                        <div style="border: 1px solid black; padding: 5px; text-align: center; border-radius: 4px">
                            <a href="/../BookStore/site/models/viewcart/process_cart.php?nm='.$value['b_nm'].'&rate='.$value['b_price'].'" style="font-size: 16px;">Thêm Vào Giỏ Hàng</a>
                        </div>
                    </div>
                </div>
            </div>';
        }
        ?>

        <div style="text-align: center; padding: 15px; clear: both">
            <?php
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="index.php?pageBookList='.($current_page-1).'&subcatnm=' . $_GET['subcatnm'] . '&subcatid=' . $_GET['subcatid'] . '">Prev</a> | ';
            }
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="index.php?pageBookList='.$i.'&subcatnm=' . $_GET['subcatnm'] . '&subcatid=' . $_GET['subcatid'] . '">'.$i.'</a> | ';
                }
            }
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="index.php?pageBookList='.($current_page+1).'&subcatnm=' . $_GET['subcatnm'] . '&subcatid=' . $_GET['subcatid'] . '">Next</a>';
            }
            ?>
        </div>

    </div>
    <!--SubCategories-->

</div>

<!--FOOTER-->
<?php
include_once __DIR__ . "/../../widgets/footer.php";
?>

</body>
</html>