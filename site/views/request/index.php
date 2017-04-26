<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookStore</title>
    <link rel="icon" href="http://www.fatturaelettronica-pa.com/wp-content/uploads/2016/03/1458932949_book.png">
</head>
<style>
    .inputInfo {
        width: 100%;
        height: 25px;
        padding: 22px;
        text-align: left;
        font-size: 20px;
        display: inline-block;
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
<!--ViewCart-->
<div style="float: right; margin-top: 30px; margin-bottom: 100px; background-color: white; width: 75%; margin-right: 25px; padding: 20px">
    <?php
    if(!isset($_SESSION['status']))
    {
        echo '<div style="width: 100%; text-align: center; clear: both; padding: 25px; font-size: 20px; color: red;">Please Login!</div>';
    }
    else
    {
        echo '<div style="margin-left: 10px; font-size: 20px">
                Your Request
            </div>
            
            <table style="font-size: 20px; margin-top: 15px; border: 1px solid black; margin-bottom: 20px">
                <col width="5%">
                <col width="15%">
                <col width="15%">
                <col width="40%">
                <col width="25%">
                <tr>
                    <td style="border: 1px solid black; text-align: center">No</td>
                    <td style="border: 1px solid black;">Tên Sách</td>
                    <td style="border: 1px solid black;">Tác Giả</td>
                    <td style="border: 1px solid black;">Thông Tin Khác</td>
                    <td style="border: 1px solid black;">Trạng Thái</td>
                </tr>';

                if (count($request) != 0)
                {
                    $count = 1;
                    foreach ($request as $value) {
                        echo '
                            <tr>
                                <td style="border: 1px solid black; text-align: center">' . $count . '</td>
                                <td style="border: 1px solid black;">' . $value['re_bnm'] . '</td>
                                <td style="border: 1px solid black;">' . $value['re_bau'] . '</td>
                                <td style="border: 1px solid black;">' . $value['re_oth'] . '</td>
                                <td style="border: 1px solid black;">';
                        if ($value['re_stt'] == "Processing") {
                            echo "Chúng tôi đang tìm kiếm và sẽ báo lại cho bạn sớm nhất có thể";
                        }
                        if ($value['re_stt'] == "Founded") {
                            if ($value['bid'] != NULL) {
                                echo 'Bạn có thể đặt sách <a href="/../BookStore/site/controllers/detail/index.php?id=' . $value['bid'] . '">tại đây</a>';
                            } else {
                                echo "Chưa đưa sách lên giá";
                            }
                        }
                        if ($value['re_stt'] == "Waiting") {
                            echo 'Admin chưa kiểm tra';
                        }
                        echo '</td>
                            </tr>
                        ';
                        $count++;
                    }
                }
                else
                {
                    echo '
                        <table style="font-size: 20px; margin-bottom: 20px; margin-top: -20px">
                            <col width="100%">
                            <tr>
                                <td style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black; text-align: center; color: blue;">
                                    Không Có Request!
                                </td>
                            </tr>
                        </table>
                    ';
                }

            echo '</table>';

        echo '<div style="background-color: #F2F2F2; height: 15px; margin-left: -20px; margin-right: -20px"></div>';
        echo '
            <form action="/../BookStore/site/models/request/process_request.php" method="POST">
                <div style="font-size: 20px; color: red; margin-top: 20px; margin-left: 10px">' . $msg_missing_info . '</div>
                <table style="font-size: 20px; margin-top: 15px">
                    <col width="50%">
                    <col width="50%">
                    <tr>
                        <td>Book Title <span style="color: red;"> *</span> : <span style="color: red;">' . $msg_title_number . '</span></td>
                        <td>Author <span style="color: red;"> *</span> : <span style="color: red;">' . $msg_author_number . '</span></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="inputInfo" name="title"></td>
                        <td><input type="text" class="inputInfo" name="author"></td>
                    </tr>
                </table>
                
                <table style="font-size: 20px;">
                    <col width="100%">
                    <tr>
                        <td>Other Informations :</td>
                    </tr>
                    <tr>
                        <td>
                            <textarea rows="2" name="other" style="width: 100%; padding: 22px;"></textarea>
                        </td>
                    </tr>
                </table>
                
                <input type="submit" name="btn" value="Send Request" style="width: 150px; margin-top: 15px; margin-left: 10px; height: 30px; margin-bottom: 20px">
                </form>
            ';
    }
    ?>
</div>

<!--FOOTER-->
<?php
include_once __DIR__ . "/../../widgets/footer.php";
?>

</body>
</html>