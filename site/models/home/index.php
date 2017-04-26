<?php

include_once __DIR__ . "/../../../system/librarys/helper.php";
include_once __DIR__ . "/../../../system/librarys/database.php";

function getPageTotals ($key) {
    $sql = db_create_sql('SELECT count(b_id) as counter from ' . $key . ' {where}');
    $result = db_get_row($sql);
    return $result['counter'];
}

function getPageTotalsNew ($key) {
    $sql = db_create_sql('SELECT count(b_id) as counter from ' . $key . ' where  b_pbd like "%2016"');
    $result = db_get_row($sql);
    return $result['counter'];
}

function setPaging ($total_records, $current_page, $limit) {
    $link = create_link(base_url('site/controllers'), array(
        'm' => 'home',
        'a' => 'index',
        'page' => '{page}'
    ));
    $paging = paging($link, $total_records, $current_page, $limit);
    $sql = db_create_sql("SELECT * FROM book {where} LIMIT {$paging['start']}, {$paging['limit']}");
    $users = db_get_list($sql);
    return $users;
}

function setPagingNew ($total_records, $current_page, $limit) {
    $link = create_link(base_url('site/controllers'), array(
        'm' => 'home',
        'a' => 'index',
        'pageNew' => '{pageNew}'
    ));
    $paging = paging($link, $total_records, $current_page, $limit);
    $sql = db_create_sql("SELECT * FROM book where b_pbd like '%2016' LIMIT {$paging['start']}, {$paging['limit']}");
    $users = db_get_list($sql);
    return $users;
}