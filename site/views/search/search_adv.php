<?php session_start(); ?>
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
        width: 90%;
        height: 40px;
        padding: 22px;
        font-size: 20px;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    table {
        width:100%;
        height: 30px;
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
<!--HomePage-->
<div style="float: right; margin-top: 30px; margin-bottom: 100px; width: 75%; margin-right: 25px">

    <div style="background-color: white; padding: 10px; margin-bottom: 15px; text-align: center; font-size: 20px; color: green;">-- Advanced Search --</div>

    <div style="background-color: white;">

        <div style="padding: 20px 20px 20px 40px; font-size: 20px; color: blue">Please enter something into the fields below to start a search</div>

        <form action="/../BookStore/site/controllers/search/search_detail.php">
            <table style="font-size: 20px; text-align: center;">
                <col width="33%">
                <col width="33%">
                <col width="34%">
                <tr>
                    <td>Keyword</td>
                    <td>Author</td>
                    <td>ISBN</td>
                </tr>
                <tr>
                    <td><input type="text" class="input" name="s"></td>
                    <td><input type="text" class="input" name="searchAuthor"></td>
                    <td><input type="text" class="input" name="searchISBN"></td>
                </tr>
                <tr>
                    <td>Publisher</td>
                    <td>Language</td>
                    <td>Price range</td>
                </tr>
                <tr>
                    <td><input type="text" class="input" name="searchPublisher"></td>
                    <td><input type="text" class="input" name="searchLang"></td>
                    <td>
                        <select class="form-control" name="price" id="filterPrice" style=" width: 90%; height: 40px; display: inline-block;">
                            <option value="" label="All" selected="selected">All</option>
                            <option value="low" label="Under $20">Under $20</option>
                            <option value="med" label="$20 to $40">$20 to $40</option>
                            <option value="high" label="$40 +">$40 +</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Availability</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <select class="form-control" name="ava" id="filterAvailability" style=" width: 90%; height: 40px; display: inline-block;">
                            <option value="" label="All" selected="selected">All</option>
                            <option value="Available" label="Available">Available</option>
                            <option value="Unavailable" label="Unavailable">Unavailable</option>
                        </select>
                    </td>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary btn-lg">Search</button>
                    </td>
                </tr>
            </table>
        </form>

        <div style="height: 50px"></div>

    </div>

</div>

<!--FOOTER-->
<?php
include_once __DIR__ . "/../../widgets/footer.php";
?>

</body>
</html>