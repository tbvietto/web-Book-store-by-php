<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="http://d3ogvdx946i4sr.cloudfront.net/assets/v2.3.1/css/common.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!--nav bar-->
<div class="user-nav-wrap">
    <div class="user-nav">
        <ul class="left-nav nav mobile-nav-content" data-order="1">
            <li>
                <a href="/../BookStore/admin/controllers/home/index.php" class="home-icon-link">
                    <i class="icon-home"></i>
                    <span class="show-on-mobile">Home</span>
                </a>
            </li>
            <li>
                <a href="/../BookStore/admin/controllers/categories/index.php" class="home-icon-link">
                    Categories
                </a>
            </li>
            <li>
                <a href="/../BookStore/admin/controllers/books/index.php">
                    Books
                </a>
            </li>
            <li>
                <a href="/../BookStore/admin/controllers/checkrequests/index.php">
                    Check Requests
                </a>
            </li>
            <li>
                <a href="/../BookStore/admin/controllers/checkorders/index.php">
                    Check Orders
                </a>
            </li>
        </ul>

        <ul class="right-nav mobile-nav-content" data-order="3">
            <li>
                <?php
                if(isset($_SESSION['status']))
                {
                    echo '<li><a href="/../BookStore/site/controllers/signup/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>';
                }
                else
                {
                    echo '<li><a href="/../BookStore/site/controllers/signup/register.php"><i class="fa fa-user-o" aria-hidden="true"></i>Register</a></li>';
                }
                ?>
            </li>
        </ul>
    </div>
</div>

</body>
</html>