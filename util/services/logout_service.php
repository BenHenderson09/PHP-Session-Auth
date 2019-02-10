<?php
    require_once "../general/header.php";

    if (!empty($_SESSION["user"])){
        unset($_SESSION["user"]);
        header("Location: ../../index.php?" . http_build_query(["message"=>"Logout Successful!", "success"=>"1"]));
    }
    else{
        header("Location: ../../index.php?" . 
        http_build_query(["message"=>"You must already be logged in to log out!", "success"=>"0"]));
    }
    