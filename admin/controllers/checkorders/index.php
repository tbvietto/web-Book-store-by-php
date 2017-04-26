<?php
include_once __DIR__ . "/../../../admin/models/checkorders/index.php";

$orders = getAllOrders();

include_once __DIR__ . "/../../../admin/views/checkorders/index.php";