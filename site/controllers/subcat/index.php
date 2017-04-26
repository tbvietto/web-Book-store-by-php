<?php
include_once __DIR__ . "/../../models/subcat/index.php";

//subcat
$total_records = getPageTotalsSubCat($_GET['cat_nm']);
$current_page = input_get('pageSub');
$limit = 10;
$total_page = ceil($total_records / $limit);
$subcat_book = setPagingSubCat($_GET['cat_nm'], $total_records, $current_page, $limit);

include_once __DIR__ . "/../../views/subcat/index.php";