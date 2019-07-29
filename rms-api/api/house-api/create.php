<?php

    require_once "../../database.php";

    $houseType = $_POST["houseType"];
    $status = $_POST["status"];
    $rent = $_POST["rent"];

    $landlordId = 1;
    $apartmentId = $_POST["apart_id"];

    $done = mysqli_query(
        $conn,
        "INSERT INTO houses (houseType, apartmentId, landlordId, status, rent)
         VALUES('$houseType', '$apartmentId', '$landlordId', '$status', '$rent')"
    );

    if ($done) {

        // // Update The Number of The Houses in the apartment With The Given Id

        // // Get The Number of Houses
        // $sql = mysqli_query($conn, "SELECT numberHouses FROM apartments WHERE id = $apartmentId");
        // $num_of_houses = mysqli_fetch_array($sql)["numberHouses"] + 1;

        // // Update The apartment number
        // $query = mysqli_query($conn, "UPDATE apartments SET numberHouses = $num_of_houses WHERE id=$apartmentId");

        // if($query) {

        //     header("Location: ../../../rms-ui/pages/dashboard.php");
        // } else {
        //     echo "Error" . mysqli_error($conn);
        // }

        header("Location: ../../../rms-ui/pages/houses.php");
    } else {
        echo "Error".mysqli_error($conn);
        // header("Location: ../../../rms-ui/pages/house_form.php");
    }

?>