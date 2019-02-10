<?php
    require_once "../util/header.php";
?>

<!DOCTYPE HTML>
<html>
    <head> 
        <title>Authentication: Register</title>

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
                    <h1 class="header">Registration</h1><hr>

                    <img src="../assets/default-user-image.png" class="profile-img">

                        <div class="user-form">
                            <form id="register-form" method="post" action="../util/services/register_service.php">
                                <div class = "message credentials form-item" <?= empty($_GET['message']) ? 'hidden' : '';?>>
                                    <h4> <?= $_GET['message'] ?> </h4>
                                </div>

                                <div class="form-item">
                                    <input type="text" <?= !empty($_GET['username']) ? "value=\"{$_GET['username']}\"": "" ?>
                                    class="form-control" name="username" id="username_input" placeholder="Username">

                                    <div class="credentials" id="username_credentials" <?= empty($_GET['username_msg']) ? 'hidden':'';?>>
                                        <hr>
                                        <p id="username_message" class="validation_message"><?= htmlspecialchars($_GET['username_msg']) ?></p>
                                    </div>
                                </div>

                                <div class="form-item">
                                    <input type="text" <?= !empty($_GET['email']) ? "value=\"{$_GET['email']}\"": "" ?>
                                    class="form-control" name="email" id="email_input" placeholder="Email" >

                                    <div class="credentials" id="email_credentials" <?= empty($_GET['email_msg']) ? 'hidden':'';?>>
                                        <hr>
                                        <p id="email_message" class="validation_message"><?= htmlspecialchars($_GET['email_msg']) ?></p>
                                    </div>
                                </div>

                                <div class="form-item">
                                    <input type="text" <?= !empty($_GET['fullname']) ? "value=\"{$_GET['fullname']}\"": "" ?>
                                    class="form-control" name="fullname" id="fullname_input" placeholder="Fullname">

                                    <div class="credentials" id="fullname_credentials" <?= empty($_GET['fullname_msg']) ? 'hidden':'';?>>
                                        <hr>
                                        <p id="fullname_message" class="validation_message"><?= htmlspecialchars($_GET['fullname_msg']) ?></p>
                                    </div>
                                </div>

                                <div class="form-item">
                                    <input type="password" class="form-control" name="password" id="password_input" placeholder="Password">

                                    <div class="credentials" id="password_credentials" <?= empty($_GET['password_msg']) ? 'hidden':'';?>>
                                        <hr>
                                        <p id="password_message" class="validation_message"><?= htmlspecialchars($_GET['password_msg']) ?></p>
                                    </div>
                                </div>

                                <div class="form-item">                                
                                    <input type="password" class="form-control" name="password_resubmit" id="password_resubmit_input" placeholder="Retype password">

                                    <div class="credentials" id="password_resubmit_credentials" <?= empty($_GET['password_resubmit_msg']) ? 'hidden':'';?>>
                                        <hr>
                                        <p id="password_resubmit_message" class="validation_message"><?= htmlspecialchars($_GET['password_resubmit_msg']) ?></p>
                                    </div>
                                </div>

                                <input class="submit-btn" type="submit" id="submit_btn">
                                <a href="./login.php">Login</a> | <a href="../index.php">Home</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>

