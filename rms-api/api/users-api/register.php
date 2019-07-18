<?php 

    require_once "../../database.php";

    // print_r($_POST);
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];
    $phoneNo = $_POST["phoneNo"];
    $email = $_POST["email"];
    $nationalId = $_POST["nationalId"];

    $done = mysqli_query($conn, 
                        "INSERT INTO users (firstName, lastName, gender, phoneNo, email, nationalId)
                            VALUES('$firstName', '$lastName', '$gender','$nationalId', $phoneNo, '$email')"
                        );

    if($done) {
        echo "Success";
    } else {
        echo "Error";
    }

    

?>