<?php
    include_once __DIR__ . "/../../models/home/index.php";
//allbook
    $total_records = getPageTotals('book');
    $current_page = input_get('page');
    $limit = 10;
    $total_page = ceil($total_records / $limit);
    $users = setPaging($total_records, $current_page, $limit);

//newbook
    $total_records_new = getPageTotalsNew('book');
    $current_page_new = input_get('pageNew');
    $limit_new = 10;
    $total_page_new = ceil($total_records_new / $limit_new);
    $new_book = setPagingNew($total_records_new, $current_page_new, $limit_new);
    include_once __DIR__ . "/../../views/home/index.php";