<?php 

    require_once "../../database.php";
    require_once "user_infor_validate.php";

    if($_POST) {
        session_start();

        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $phoneNo = $_POST["phoneNo"];
        $user_id = $_POST["user_id"]; 

        $vdata = User::validate($firstName, $lastName, $phoneNo, $email, $conn, true, $user_id, "users");

        if(!$vdata["bool"]) {
            // print_r($vdata);
            $_SESSION["message"] = $vdata["message"];
            header("Location: ../../../rms-ui/pages/user_update.php?user_id=".$user_id);
        } else {

            $sql = mysqli_query($conn, "UPDATE users SET firstName = '$firstName', lastName = '$lastName', gender = '$gender', phoneNo = '$phoneNo', email = '$email' WHERE id= '$user_id'");
            if($sql) {

                $_SESSION["message"] = "Successfully Updated";
                header("Location: ../../../rms-ui/pages/dashboard.php");
            } else {
                echo "Error".mysqli_error($conn);
            }  
            // print_r($vdata);
        }

        

    }
    



?>