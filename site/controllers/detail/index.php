<?php
include_once __DIR__ . "/../../models/detail/index.php";
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

$book = getDetailBook ('book', $id);
include_once __DIR__ . "/../../views/detail/index.php";