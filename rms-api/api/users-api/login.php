<?php 

    require_once "../../database.php";
    session_start();

    $email = $_POST["email"];
    $passw = $_POST["password"];

    $result = mysqli_query($conn, "SELECT email, passw, role, id FROM users WHERE email='$email'");
    $user = mysqli_fetch_array($result);

    if($user) {
        if(!password_verify($passw, $user["passw"])) {
            $_SESSION["message"] = "Invalid Password";
            header("Location: ../../../rms-ui/pages/login.php");
        } else {
             if($user["role"] == "admin") {
                $_SESSION["user_id"] = $user["id"];
                header("Location: ../../../rms-ui/pages/dashboard-admin.php");
             } elseif($user["role"] == "landlord") {
                $_SESSION["user_id"] = $user["id"];
                header("Location: ../../../rms-ui/pages/dashboard.php");
             } else {
                $_SESSION["message"] = "User login Error Please Login Again".$user["role"];
                header("Location: ../../../rms-ui/pages/login.php");
             }
        }
        
    } else {
        $_SESSION["message"] = "Invalid Email";
        header("Location: ../../../rms-ui/pages/login.php");
    }