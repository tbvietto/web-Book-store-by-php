<?php
include_once __DIR__ . "/../../../admin/models/books/index.php";

$book = getAllBooks();

include_once __DIR__ . "/../../../admin/views/books/index.php";