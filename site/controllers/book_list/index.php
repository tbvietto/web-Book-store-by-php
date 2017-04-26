<?php
include_once __DIR__ . "/../../models/book_list/index.php";

//booklist
$total_records = getPageTotalsBookList($_GET['subcatid']);
$current_page = input_get('pageBookList');
$limit = 10;
$total_page = ceil($total_records / $limit);
$book_list = setPagingBookList($_GET['subcatid'], $total_records, $current_page, $limit);

include_once __DIR__ . "/../../views/book_list/index.php";