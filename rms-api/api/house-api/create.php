<?php

    require_once "../../database.php";

    $houseType = $_POST["houseType"];
    $status = $_POST["status"];
    $rent = $_POST["rent"];

    $landlordId = 1;
    $apartmentId = 2;

    $done = mysqli_query(
        $conn,
        "INSERT INTO houses (houseType, apartmentId, landlordId, status, rent)
         VALUES('$houseType', '$apartmentId', '$landlordId', '$status', '$rent')"
    );

    if ($done) {
        echo "Success";
    } else {
        echo "Error";
    }

    print_r($_POST);


?>