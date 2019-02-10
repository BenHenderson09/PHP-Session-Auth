<?php
    /**
    * This file is used to ensure that the user is logged in to an account
    */

    if (!empty($_SESSION['user'])){
        header("Location: ../index.php");
        exit();
    }
