<?php

include_once __DIR__ . "/../../../system/librarys/helper.php";
include_once __DIR__ . "/../../../system/librarys/database.php";

function getTotalRecordsSearchDetail ($search, $searchAuthor, $searchISBN, $searchPublisher, $searchLang, $price, $ava) {
    switch ($price) {
        case '' :
            $query="select * from book where b_nm like '%$search%' AND b_stt like '%$ava%' AND b_lang like '%$searchLang%' AND b_author like '%$searchAuthor%' AND b_publisher like '%$searchPublisher%' AND b_isbn like '%$searchISBN%'";
            break;

        case 'low' :
            $query="select * from book where b_nm like '%$search%' AND b_stt like '%$ava%' AND b_lang like '%$searchLang%' AND b_author like '%$searchAuthor%' AND b_publisher like '%$searchPublisher%' AND b_isbn like '%$searchISBN%' AND b_price < 20";
            break;

        case 'med' :
            $query="select * from book where b_nm like '%$search%' AND b_stt like '%$ava%' AND b_lang like '%$searchLang%' AND b_author like '%$searchAuthor%' AND b_publisher like '%$searchPublisher%' AND b_isbn like '%$searchISBN%' AND b_price > 20 AND b_price < 40 ";
            break;

        case 'high' :
            $query="select * from book where b_nm like '%$search%' AND b_stt like '%$ava%' AND b_lang like '%$searchLang%' AND b_author like '%$searchAuthor%' AND b_publisher like '%$searchPublisher%' AND b_isbn like '%$searchISBN%' AND b_price > 40";
            break;
    }
    $sql = db_create_sql($query);
    $result = db_get_list($sql);
    return count($result);
}

function setPagingSearchDetail ($search, $searchAuthor, $searchISBN, $searchPublisher, $searchLang, $price, $ava, $total_records, $current_page, $limit) {
    $link = create_link(base_url('site/controllers'), array(
        'm' => 'search',
        'a' => 'search_detail',
        'pageDetail' => '{pageDetail}'
    ));
    $paging = paging($link, $total_records, $current_page, $limit);
    switch ($price) {
        case '' :
            $query="select * from book where b_nm like '%$search%' AND b_stt like '%$ava%' AND b_lang like '%$searchLang%' AND b_author like '%$searchAuthor%' AND b_publisher like '%$searchPublisher%' AND b_isbn like '%$searchISBN%' LIMIT {$paging['start']}, {$paging['limit']}";
            break;

        case 'low' :
            $query="select * from book where b_nm like '%$search%' AND b_stt like '%$ava%' AND b_lang like '%$searchLang%' AND b_author like '%$searchAuthor%' AND b_publisher like '%$searchPublisher%' AND b_isbn like '%$searchISBN%' AND b_price < 20 LIMIT {$paging['start']}, {$paging['limit']}";
            break;

        case 'med' :
            $query="select * from book where b_nm like '%$search%' AND b_stt like '%$ava%' AND b_lang like '%$searchLang%' AND b_author like '%$searchAuthor%' AND b_publisher like '%$searchPublisher%' AND b_isbn like '%$searchISBN%' AND b_price > 20 AND b_price < 40 LIMIT {$paging['start']}, {$paging['limit']}";
            break;

        case 'high' :
            $query="select * from book where b_nm like '%$search%' AND b_stt like '%$ava%' AND b_lang like '%$searchLang%' AND b_author like '%$searchAuthor%' AND b_publisher like '%$searchPublisher%' AND b_isbn like '%$searchISBN%' AND b_price > 40 LIMIT {$paging['start']}, {$paging['limit']}";
    }
    $sql = db_create_sql($query);
    $result = db_get_list($sql);
    return $result;
}