<?php
    require_once "../header.php";

    if (!empty($dbh)){
        if (!empty($_POST)){
            if (validateDetails()){
                $stmt = $dbh->prepare("SELECT username, email, fullname, password FROM users WHERE email = :email");
                $stmt->execute(["email"=>$_POST["email"]]);

                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!empty($user)){

                    $hashedPassword = $user["password"];

                    if (password_verify($_POST['password'], $hashedPassword)){ // Compare the password provided and the stored hash
                        $_SESSION["user"] = ["id"=>$user["id"], "username"=>$user["username"], "fullname"=>$user["fullname"], "email"=>$user["email"]];
                        header("Location: ../../index.php");          
                    }
                    else {
                        unset($_POST['password']);
                        header("Location: ../../auth/login.php?" . http_build_query(["message"=>"Email or password is incorrect"]) . "&" . http_build_query($_POST));                        
                    }
                }
                else {
                    unset($_POST['password']);
                    header("Location: ../../auth/login.php?" . http_build_query(["message"=>"Email or password is incorrect"]) . "&" . http_build_query($_POST));
                }
            }
        }
    }

    function validateDetails(){
        if (empty($_POST['email'])) return false;
        if (empty($_POST['password'])) return false;

        return true;
    }