<?php
include_once __DIR__ . "/../../models/search/search_detail.php";

//search detail
$total_records = getTotalRecordsSearchDetail($_GET['s'], $_GET['searchAuthor'], $_GET['searchISBN'], $_GET['searchPublisher'], $_GET['searchLang'], $_GET['price'], $_GET['ava']);
$current_page = input_get('pageDetail');
$limit = 10;
$total_page = ceil($total_records / $limit);
$search = setPagingSearchDetail($_GET['s'], $_GET['searchAuthor'], $_GET['searchISBN'], $_GET['searchPublisher'], $_GET['searchLang'], $_GET['price'], $_GET['ava'], $total_records, $current_page, $limit);

include_once __DIR__ . "/../../views/search/search_detail.php";