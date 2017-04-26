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
<body style="background-color: #F2F2F2;">

<!--HEADER-->
<?php
include_once __DIR__ . "/../../../admin/widgets/header.php";
?>

<div style="font-size: 50px; margin-top: 250px; text-align: center; vertical-align: middle; height: 500px; color: green">
    WELLCOME TO ADMIN
</div>

<!--FOOTER-->
<?php
include_once __DIR__ . "/../../../admin/widgets/footer.php";
?>

</body>
</html>