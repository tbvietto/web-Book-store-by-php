<?php

include_once __DIR__ . "/../../../system/librarys/helper.php";
include_once __DIR__ . "/../../../system/librarys/database.php";

function getPageTotalsBookList ($cat) {
    $query = "select * from book where b_subcat = '$cat'";
    $sql = db_create_sql($query);
    $result = db_get_list($sql);
    return count($result);
}

function setPagingBookList ($cat, $total_records, $current_page, $limit) {
    $link = create_link(base_url('site/controllers'), array(
        'm' => 'booklist',
        'a' => 'index',
        'pageBookList' => '{pageBookList}'
    ));
    $paging = paging($link, $total_records, $current_page, $limit);
    $query = "select * from book where b_subcat = '$cat' LIMIT {$paging['start']}, {$paging['limit']}";
    $sql = db_create_sql($query);
    $users = db_get_list($sql);
    return $users;
}