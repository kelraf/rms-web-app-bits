<?php 

    require_once "../../database.php";

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phoneNo = $_POST["phoneNo"];
    $user_id = $_POST["user_id"]; 

    $sql = mysqli_query($conn, "UPDATE tenants SET firstName = '$firstName', lastName = '$lastName', gender = '$gender', phoneNo = '$phoneNo', email = '$email' WHERE id= '$user_id'");

    if($sql) {
        header("Location: ../../../rms-ui/pages/users.php");
    } else {
        echo "Error".mysqli_error($conn);
    }



?>