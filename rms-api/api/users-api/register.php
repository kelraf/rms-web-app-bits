<?php 

    require_once "../../database.php";

    $email = $_POST["email"];
    $passw = $_POST["password"];
    $conf_passw = $_POST["confirm_password"];

    $role = "landlord"; 

    $done = mysqli_query($conn, 
                        "INSERT INTO users (email, confirmPassw, passw, role)
                            VALUES('$email', '$passw', '$conf_passw', '$role')"
                        );

    if($done) {
        
        header("Location: ../../../rms-ui/pages/login.php");
    } else {
        echo "Error";
    }


?>