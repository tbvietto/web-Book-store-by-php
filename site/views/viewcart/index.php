<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookStore</title>
    <link rel="icon" href="http://www.fatturaelettronica-pa.com/wp-content/uploads/2016/03/1458932949_book.png">
</head>

<style>
    .inputQuantity {
        width: 90%;
        height: 40px;
        padding: 22px;
        text-align: center;
        font-size: 20px;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

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
    <?php
    if(!isset($_SESSION['status']))
    {
        echo '<div style="width: 100%; text-align: center; clear: both; padding: 25px; font-size: 20px; color: red;">Please Login!</div>';
    }
    else
    {
        $tot = 0;
        if(isset($_SESSION['cart']))
        {
            foreach($_SESSION['cart'] as $id=>$x)
            {
                $tot = $tot + ($x['qty']*$x['rate']);
            }
        }

        if ($tot == 0)
        {
            include "NoCart.php";
        }
        else
        {
            echo '<form action="/../BookStore/site/models/viewcart/process_cart.php" method="POST">
            <table style="font-size: 20px; text-align: center">
                <col width="5%">
                <col width="45%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <tr>
                    <td>NO.</td>
                    <td>Product</td>
                    <td>Quantity</td>
                    <td>Rate</td>
                    <td>Price</td>
                    <td>Delete</td>
                </tr>';
                    $i = 1;
                    if(isset($_SESSION['cart']))
                    {
                        foreach($_SESSION['cart'] as $id=>$x)
                        {
                            echo '<tr>
                                    <Td> '.$i.'
                                    <td> '.$x['nm'].'
                                    <td> <input style="text-align: center" type="text" size="2" value="'.$x['qty'].'" name="'.$id.'">
                                    <td> '.$x['rate'].'
                                    <td> '.($x['qty']*$x['rate']).'
                                    <td> <a href="/../BookStore/site/models/viewcart/process_cart.php?id='.$id.'">Delete</a>
                                </tr>';
                            $i++;
                        }
                    }
                echo '<tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td><?php echo $tot; ?></td>
                    <td></td>
                </tr>
                </table>

                <div style="text-align: center; margin-top: 20px">
                    <input type="submit" value="Update" style="width: 100px; height: 30px;">
                    <a href="/../BookStore/site/views/viewcart/checkout.php">CONFIRM & PROCEED<a/>
                </div>
            </form>';
        }
    }
    ?>
</div>

<!--FOOTER-->
<?php
include_once __DIR__ . "/../../widgets/footer.php";
?>

</body>
</html>