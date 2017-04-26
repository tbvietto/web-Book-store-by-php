<?php
include_once __DIR__ . "/../../models/search/search_result.php";

//search result
$total_records = getTotalRecordsSearch($_GET['s']);
$current_page = input_get('pageSearch');
$limit = 10;
$total_page = ceil($total_records / $limit);
$search = setPagingSearch($_GET['s'], $total_records, $current_page, $limit);

include_once __DIR__ . "/../../views/search/search_result.php";