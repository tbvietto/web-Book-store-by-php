<?php

include_once __DIR__ . "/../../../system/librarys/helper.php";
include_once __DIR__ . "/../../../system/librarys/database.php";

function getTotalRecordsSearch ($search) {
    $query = "select * from book where b_nm like '%$search%'";
    $sql = db_create_sql($query);
    $result = db_get_list($sql);
    return count($result);
}

function setPagingSearch ($search, $total_records, $current_page, $limit) {
    $link = create_link(base_url('site/controllers'), array(
        'm' => 'search',
        'a' => 'search_result',
        'pageSearch' => '{pageSearch}'
    ));
    $paging = paging($link, $total_records, $current_page, $limit);
    $query = "select * from book where b_nm like '%$search%' LIMIT {$paging['start']}, {$paging['limit']}";
    $sql = db_create_sql($query);
    $users = db_get_list($sql);
    return $users;
}