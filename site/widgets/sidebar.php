<?php
include_once __DIR__ . "/../../system/librarys/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="/../BookStore/assets/css/sidebar.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="sidebar">
    <ul>
        <!--LOGIN-->

        <?php
            if(!isset($_SESSION['status']))
            {
                echo '<li>';
                echo '<form action="/../BookStore/site/models/signup/process_login.php" method="POST">
                    <h2 style="margin-left: -15px"><i class="fa fa-sign-in" aria-hidden="true"></i> LogIn</h2>
                      
                    <b>Username:</b>
                    <input type="text" name="usernm" style="width=200px; margin-top: 10px; margin-bottom: 20px">';
                    if(isset($_GET['error_user']))
                    {
                        echo '<div style="color: red; font-size:18px; margin-bottom: 20px; margin-top: -10px">' . $_GET['error_user'] . '</div>';
                    }
                    if(isset($_GET['error_invalid_user']))
                    {
                        echo '<div style="color: red; font-size:18px; margin-bottom: 20px; margin-top: -10px">' . $_GET['error_invalid_user'] . '</div>';
                    }

                echo '<b>Password:</b>
                    <input type="password" name="pwd" style="width: 200px; margin-top: 10px; margin-bottom: 20px">';
                    if(isset($_GET['error_pass']))
                    {
                        echo '<div style="color: red; font-size:18px; margin-bottom: 20px; margin-top: -10px">' . $_GET['error_pass'] . '</div>';
                    }
                    if(isset($_GET['error_incorrect_pass']))
                    {
                        echo '<div style="color: red; font-size:18px; margin-bottom: 20px; margin-top: -10px">' . $_GET['error_incorrect_pass'] . '</div>';
                    }

                echo '<input style="width: 200px; margin-top: 10px" type="submit" id="x" value="Login" />
                    </form>';
                echo '</li>';
            }
        ?>

        <!--SUBCAT-->
        <?php
            if(isset($_GET['cat_nm'])){
                echo "<li>
                    <h2 style='margin-left: -15px'>Sub Categories</h2>
                    <ul>";
                        $data = db_get_list('select * from subcat where parent_id = ' . $_GET['cat']);
                        foreach ($data as $value) {
                            echo "<li>
                                    <img id='greendot' src='/../BookStore/assets/images/greendot.jpg'>
                                    <a style='color: #4F00FF' href='/../BookStore/site/controllers/book_list/index.php?subcatid=" . $value['subcat_id'] . "&subcatnm=" . $value['subcat_nm']. "'>"
                                        . $value['subcat_nm']."
                                    </a>
                                    </li>";
                        }
                    echo "</ul>
                </li>";
            }
        ?>

        <!--CATEGORIES-->
        <li>
            <h2 style="margin-left: -15px">Categories</h2>
            <ul>
                <?php
                    $data = db_get_list('select * from category');
                    foreach ($data as $value) {
                        echo '<li>
                            <img id="greendot" src="/../BookStore/assets/images/greendot.jpg"">
                            <a style="color: #4F00FF" href="/../BookStore/site/controllers/subcat/index.php?cat=' . $value['cat_id'].'&cat_nm=' . $value["cat_nm"].'">'
                                . $value["cat_nm"].'
                            </a>
                            </li>';
                    }
                ?>
            </ul>
        </li>

    </ul>
</div>

</body>
</html>