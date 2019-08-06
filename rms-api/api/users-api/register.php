<?php 

    require_once "../../database.php";
    require_once "user_infor_validate.php";

    if(isset($_POST)) {
        
        session_start();
        // Collect Data From The Form
        $email = $_POST["email"];
        $passw = $_POST["password"];
        $conf_passw = $_POST["confirm_password"];
        $role = "landlord";

        $mail = User::vEmail($email, $conn, true);
        $password = User::vPassword($passw, $conf_passw);

        if(!$mail["bool"]) {
            $_SESSION["message"] = $mail["message"];
            header("Location: ../../../rms-ui/pages/register.php");
        } elseif ($mail["bool"] and $mail["exists"]) {
            $_SESSION["message"] = $mail["message"];
            header("Location: ../../../rms-ui/pages/register.php");
        } elseif(!$password["bool"]) {
            $_SESSION["message"] = $password["message"];
            header("Location: ../../../rms-ui/pages/register.php");
        } else {
            
            $passwor = $password["passwords"]["passw"];
            $confirm_passw = $password["passwords"]["confirmPassw"];

            $done = mysqli_query($conn, 
                            "INSERT INTO users (email, passw, confirmPassw, role)
                                VALUES('$email', '$passwor', '$confirm_passw', '$role')"
                            );


            if($done) {
                header("Location: ../../../rms-ui/pages/login.php");
            } else {
                echo "Error";
            }
        }

        
    }
    


?>