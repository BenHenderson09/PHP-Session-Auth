<?php
    require_once "../util/general/header.php";
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Authentication: Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="../styles/auth.css">
        <link rel="stylesheet" href="../styles/global.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
        crossorigin="anonymous">
    </head>

    <body>
        <main>
            <div class="holder">
                <div class="box">
                    <div class="content top-buffer">

                    <h1 class="header">Login</h1><hr>

                    <img src="../assets/default-user-image.png" class="profile-img">

                        <div class="user-form">
                            <form id="login-form" method="post" action="../util/services/login_service.php">

                                <div class = "message credentials form-item" <?= empty($_GET['message']) ? 'hidden' : '';?>>
                                        <h4> <?= $_GET['message'] ?> </h4>
                                </div>

                                <div class="form-item">
                                    <input <?= !empty($_GET['email']) ? "value=" . $_GET['email'] : "" ?> 
                                    type="text" class="form-control" name="email" placeholder="Email">
                                </div>

                                <div class="form-item">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>

                                <input class="submit-btn" type="submit">
                                <a href="../auth/register.php">Register</a> | <a href="../index.php">Home</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>

