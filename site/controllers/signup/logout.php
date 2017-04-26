<?php
    session_start();
    $_SESSION = array();
    header("location: /../BookStore/site/controllers/home/index.php");