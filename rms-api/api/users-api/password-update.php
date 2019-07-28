<?php 

    require_once "../../database.php";

    $passw = $_POST["password"];
    $conf_passw = $_POST["confirm_password"];

    $id = $_GET["user_id"];

    $done = mysqli_query($conn, "UPDATE users SET confirmPassw='$conf_passw', passw='$passw' WHERE id='$id'");
            
    if($done) {
        header("Location: ../../../rms-ui/pages/user_profile.php");
    } else {
        echo "Error";
    }

?>