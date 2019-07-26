<?php 

    require_once "../../database.php";

    $email = $_POST["email"];
    $passw = $_POST["password"];

    // print_r($_POST);

    // $done = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    // $user = mysqli_fetch_array($done);

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_array($result);

    if($user) {
        session_start();
        $_SESSION["user_id"] = $user["id"];
        // print_r($_SESSION);
        header("Location: ../../../rms-ui/pages/dashboard.php");
    } else {
        echo "Error".'mysqli_error($conn)';
    }
