<?php

include_once __DIR__ . "/../../../system/librarys/helper.php";
include_once __DIR__ . "/../../../system/librarys/database.php";

function getPageTotalsSubCat ($cat) {
    $query = "select * from book, category, subcat where book.b_subcat= subcat.subcat_id AND subcat.parent_id = category.cat_id AND cat_nm like '%$cat%'";
    $sql = db_create_sql($query);
    $result = db_get_list($sql);
    return count($result);
}

function setPagingSubCat ($cat, $total_records, $current_page, $limit) {
    $link = create_link(base_url('site/controllers'), array(
        'm' => 'subcat',
        'a' => 'index',
        'pageSub' => '{pageSub}'
    ));
    $paging = paging($link, $total_records, $current_page, $limit);
    $query = "select * from book, category, subcat where book.b_subcat= subcat.subcat_id AND subcat.parent_id = category.cat_id AND cat_nm like '%$cat%' LIMIT {$paging['start']}, {$paging['limit']}";
    $sql = db_create_sql($query);
    $users = db_get_list($sql);
    return $users;
}