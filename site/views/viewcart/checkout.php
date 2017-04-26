<?php
session_start();
extract($_POST);
extract($_SESSION);

include_once __DIR__ . "/../../../system/librarys/database.php";
$uid = $_SESSION['id'];
if(isset($submit))
{
    $query = "insert into orders(name,address,town,city,ward,phone,u_id) values('$name','$address','$pc','$city','$state','$phone','$uid')";

    $data = array(
        'name' => $name,
        'address' => $address,
        'town' => $pc,
        'city' => $city,
        'ward' => $state,
        'phone' => $phone,
        'u_id' => $uid,
    );

    db_insert('orders', $data);

    header('location: /../BookStore/site/views/viewcart/payment_details.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookStore</title>
    <link rel="icon" href="http://www.fatturaelettronica-pa.com/wp-content/uploads/2016/03/1458932949_book.png">
</head>
<style>
    .inputInfo {
        width: 70%;
        height: 45px;
        padding: 10px;
        font-size: 18px;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        padding-left: 15px;
    }

    table {
        width:100%;
        height: 20px;
        table-layout: fixed;
    }

    table td {
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

    <div style="background-color: white; padding: 10px; margin-bottom: 15px; text-align: center; font-size: 20px; color: blue; margin-top: 15px">Shipping details</div>

    <div  class="form" style="margin-top: 20px; padding: 30px">

        <form id="contactform" method="post">

            <table style="font-size: 20px; text-align: left">
                <col width="50%">
                <col width="50%">
                <tr>
                    <td>
                        <div class="contact"><label for="name">Full name</label></div>
                    </td>
                    <td>
                        <div class="contact"><label for="email">Detail address</label></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="inputInfo" id="name" name="name" placeholder="First and last name" required="" tabindex="1" type="text">
                    </td>
                    <td>
                        <textarea style="width: 100%; height: 40px;" id="address" name="address" placeholder="Hamlet, Alley, Lane, Quarter, ..." required="" cols="55" row="10"type="email"> </textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="contact"><label for="state">Ward/ Village</label></div>
                    </td>
                    <td>
                        <div class="contact"><label for="username">Town/ District</label></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="inputInfo" type="text" id="state" name="state" required="" placeholder="">
                    </td>
                    <td>
                        <input class="inputInfo" id="pc" name="pc" required="" tabindex="2" type="text">
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="contact"><label for="city">Province/ City</label></div>
                    </td>
                    <td>
                        <div class="contact"><label for="phone">Mobile phone</label></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="inputInfo" type="text" id="city" name="city" required="" placeholder="">
                    </td>
                    <td>
                        <input class="inputInfo" id="phone" name="phone" placeholder="phone number" required="" type="text"> <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input style="width: 50%; margin-top: 10px; height: 40px;" class="buttom" name="submit" id="submit" tabindex="5" value="Confirm & Proceed" type="submit">
                    </td>
                    <td></td>
                </tr>
            </table>

        </form>
    </div>

</div>

<!--FOOTER-->
<?php
include_once __DIR__ . "/../../widgets/footer.php";
?>

</body>
</html>