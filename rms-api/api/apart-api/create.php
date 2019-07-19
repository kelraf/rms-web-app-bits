<?php 

    require_once "../../database.php";

    $apartmentName = $_POST["apartmentName"];
    $apartmentLocation = $_POST["apartmentLocation"];
    $landlordId = 1;

    $done = mysqli_query($conn, 
                        "INSERT INTO apartments (apartmentName, apartmentLocation, landlordId)
                            VALUES('$apartmentName', '$apartmentLocation', '$landlordId')"
                        );

    if($done) {
        echo "Success";
    } else {
        echo "Error";
    }