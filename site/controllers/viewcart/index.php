<?php session_start();

include_once __DIR__ . "/../../models/viewcart/index.php";

$cart = getAllCart ();

include_once __DIR__ . "/../../views/viewcart/index.php";