<?php 

    $conn = mysqli_connect("localhost", "root", "", "rental_managment_system");

    if(mysqli_connect_errno()) {
        echo "Error: ".mysqli_connect_error();
    } else {
        // echo "Successfully Connected";
    }

?>