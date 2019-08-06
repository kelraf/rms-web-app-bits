<?php 

    require_once "../../database.php";
    require_once "user_infor_validate.php";

    if(isset($_POST)) {
        session_start();

        $id = $_SESSION["user_id"];

        $current = $_POST["current"];
        $passw = $_POST["password"];
        $conf_passw = $_POST["confirm_password"];

        $vpasswords = User::vPassword($passw, $conf_passw, $conn, $current, $id, true);

        if(!$vpasswords["bool"]) {
            $_SESSION["message"] = $vpasswords["message"];
            header("Location: ../../../rms-ui/pages/password-update.php");
        } else {

            $password = $vpasswords["passwords"]["passw"];
            $conf_password = $vpasswords["passwords"]["confirmPassw"];

            $done = mysqli_query($conn, "UPDATE users SET confirmPassw='$conf_password', passw='$password' WHERE id='$id'");
                
            if($done) {
                $_SESSION["message"] = $vpasswords["message"];
                header("Location: ../../../rms-ui/pages/user_profile.php");
            } else {
                echo "Error";
            }
        }


        

    }

    

?>