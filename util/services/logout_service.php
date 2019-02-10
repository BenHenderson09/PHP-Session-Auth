<?php
    require_once "../header.php";

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_SESSION["user"])){
        unset($_SESSION["user"]);
        header("Location: ../../index.php");
    }
    else{
        header("Location: ../../index.php");
    }
    