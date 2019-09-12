<?php 

    require_once "../../database.php";
    require_once "user_infor_validate.php";

    session_start();

    if(isset($_POST)) {

        $gender = $_POST["gender"];
        $user_id = $_SESSION["user_id"];

        // Sanitize The Names
        $firstName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
        $lastName = filter_var($_POST["lastName"], FILTER_SANITIZE_STRING);
        $phoneNo = filter_var($_POST["phoneNo"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);

        $vdata = User::validate($firstName, $lastName, $phoneNo, $email, $conn, false, null, "tenants");

        if(!$vdata["bool"]) {
            $_SESSION["message"] = $vdata["message"];
            header("Location: ../../../rms-ui/pages/add_tenant.php");
        } else {

            // $sql = mysqli_query($conn, "UPDATE users SET firstName = '$firstName', lastName = '$lastName', gender = '$gender', phoneNo = '$phoneNo', email = '$email' WHERE id= '$user_id'");
            $sql = mysqli_query($conn, "INSERT INTO tenants(firstName, lastName, gender, phoneNo, email, landlordId) VALUES('$firstName','$lastName','$gender','$phoneNo','$email', '$user_id')");

            if($sql) {
                // $_SESSION["message"] = $vdata["message"];
                header("Location: ../../../rms-ui/pages/users.php");
            } else {
                echo "Error".mysqli_error($conn);
            }

        }

        
    }

   



?>