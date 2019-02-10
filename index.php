<?php 
    require_once "./util/header.php";    
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Authentication</title>

        <!-- CSS -->
        <link rel="stylesheet" href="./styles/global.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
        crossorigin="anonymous">
    </head>

    <body>
        <?php require_once "./components/nav/nav.html"; ?>

        <main>
            <div class="container top-buffer rounded">
                <div class="jumbotron text-center">
                    <h1 class="display-2"> Home Page </h1>
                </div>

                <div class="top-buffer card text-center">
                    <?= empty($_SESSION["user"]) ? "<h3>You are not logged in!</h3>" : "<h3>You are logged in!</h3>" ?>
                </div>
            </div>
        </main>
    </body>
</html>