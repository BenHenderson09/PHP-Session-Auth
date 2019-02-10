<?php
    require_once "../general/header.php";

    // Handle a post request to create a new account if present
    $details;

    if (!empty($dbh)){
        if (!empty($_POST)){

            $details = array("username" => empty($_POST["username"]) ? null : $_POST["username"],
                            "email" => empty($_POST["email"]) ? null : $_POST["email"],
                            "fullname" => empty($_POST["fullname"]) ? null : $_POST["fullname"],
                            "password" => empty($_POST["password"]) ? null : $_POST["password"],
                            "password_resubmit" => empty($_POST["password_resubmit"]) ? null : $_POST["password_resubmit"],                   
            );

            if (validateDetails($details)){
                if (unique($details, $dbh)){
                    register($details, $dbh);
                }
                else {
                    // Send back with the message that the user already exists
                    $serverMsg = "This user already exists";

                    unset($details['password']);
                    unset($details['password_resubmit']);

                    header('Location: ../../auth/register.php?message=This user already exists&' . http_build_query($details));
                }
            }
        }
    }

    function validateDetails($details){

        $validationMsgs = array();

        // Check for whitespace
        foreach ($details as $key => $val){
            if ($val != trim($val)){
                $validationMsgs[$key . "_msg"] = ucfirst($key) . " contains leading or trailing whitespace";
            }
        }

        // Username constraints
        if (empty($details["username"])){
            $validationMsgs["username_msg"] = "Username is required";
        }
        else {
            if (strlen($details["username"]) > 40) $validationMsgs["username_msg"] = "Username must be between 5 and 40 characters"; 
            if (strlen($details["username"]) < 5)  $validationMsgs["username_msg"] = "Username must be between 5 and 40 characters";  
        }

        // Email constraints
        if (empty($details["email"])){
            $validationMsgs["email_msg"] = "Email is required";
        }
        else {
            if (strlen($details["email"]) > 40)    $validationMsgs["email_msg"] = "Email must be between 5 and 40 characters";
            if (strlen($details["email"]) < 5)     $validationMsgs["email_msg"] = "Email must be between 5 and 40 characters";
            if (!filter_var($details["email"], FILTER_VALIDATE_EMAIL)) $validationMsgs["email_msg"] = "Invalid email";
        }

        // Fullname constraints
        if (empty($details["fullname"])){
           $validationMsgs["fullname_msg"] = "Fullname is required"; 
        }
        else {
            if (strlen($details["fullname"]) > 60) $validationMsgs["fullname_msg"] = "Fullname must be between 2 and 60 characters"; 
            if (strlen($details["fullname"]) < 2)  $validationMsgs["fullname_msg"] = "Fullname must be between 2 and 60 characters";
        }

        // Password constraints
        if (empty($details["password"])){
            $validationMsgs["password_msg"] = "Password is required";
        }
        else {
            if (strlen($details["password"]) > 40) $validationMsgs["password_msg"] = "Password must be between 2 and 60 characters"; 
            if (strlen($details["password"]) < 5)  $validationMsgs["password_msg"] = "Password must be between 2 and 60 characters";
            if (!preg_match("/\d/", $details["password"])) $validationMsgs["password_msg"] = "Password must include both letters and numbers";
            if (!preg_match("/[a-z]/i", $details["password"])) $validationMsgs["password_msg"] = "Password must include both letters and numbers";
        }

        // Password resubmit constraints
        if (empty($details["password_resubmit"])){
            $validationMsgs["password_resubmit_msg"] = "Password resubmit is required";
        }
        else {
            if ($details["password_resubmit"] != $details["password"]) $validationMsgs["password_resubmit_msg"] = "Passwords don't match"; 
        }

        // If the constraints are not met
        if(sizeof($validationMsgs) > 0){
            $queryString = "?" . http_build_query($validationMsgs);
        
            // Remove sensitive info for sending back user details
            unset($details["password"]);
            unset($details["password_resubmit"]);

            $queryString = $queryString . "&" . http_build_query($details);

            header("Location: ../../auth/register.php" . $queryString);
            return false;
        }

        return true;
    }

    function unique($details, $dbh){
        $stmt = $dbh->prepare("SELECT user_id FROM users WHERE username = :username OR email = :email");
        $stmt->execute(["username"=>$details["username"], "email"=>$details["email"]]);

        if (!empty($stmt->fetch(PDO::FETCH_ASSOC))){ // If a user exists with the username or email provided
            return false;
        }

        return true;
    }

    function register($details, $dbh){

        try {
            $stmt = $dbh->prepare("INSERT INTO users VALUES(:username , :email , :fullname , :password , NULL)");

            $stmt->execute([
                            "username"=>$details["username"],
                            "email"=>$details["email"],
                            "fullname"=>$details["fullname"],
                            "password"=>password_hash($details["password"], PASSWORD_DEFAULT)
            ]);

            header("Location: ../../auth/login.php");        
        }
        catch (PDOException $e){
            exit("A database error occurred when creating a new account: " . $e);
        }

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
?>