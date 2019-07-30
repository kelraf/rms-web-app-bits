<?php 

    require_once "../../database.php";
    session_start();

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phoneNo = $_POST["phoneNo"];
    $user_id = $_SESSION["user_id"]; 

    // $sql = mysqli_query($conn, "UPDATE users SET firstName = '$firstName', lastName = '$lastName', gender = '$gender', phoneNo = '$phoneNo', email = '$email' WHERE id= '$user_id'");
    $sql = mysqli_query($conn, "INSERT INTO tenants(firstName, lastName, gender, phoneNo, email, landlordId) VALUES('$firstName','$lastName','$gender','$phoneNo','$email', '$user_id')");

    if($sql) {
        $_SESSION["message"] = "Successfully Updated";
        header("Location: ../../../rms-ui/pages/users.php");
    } else {
        echo "Error".mysqli_error($conn);
    }



?>