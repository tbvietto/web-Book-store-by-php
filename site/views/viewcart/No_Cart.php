<?php ?>
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
<!--ViewCart-->
<div style="float: right; margin-top: 30px; margin-bottom: 100px; background-color: white; width: 75%; margin-right: 25px">
   <?php include "NoCart.php"; ?>
</div>

<!--FOOTER-->
<?php
include_once __DIR__ . "/../../widgets/footer.php";
?>

</body>
</html>