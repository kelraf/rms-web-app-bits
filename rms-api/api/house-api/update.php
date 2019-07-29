<?php

    require_once "../../database.php";

    $houseType = $_POST["houseType"];
    $status = $_POST["status"];
    $rent = $_POST["rent"];
    $houseId = $_POST["house_id"];

    $apartmentId = $_POST["apart_id"];

    $done = mysqli_query($conn, "UPDATE houses SET houseType='$houseType', status='$status', rent='$rent' WHERE id='$houseId'");

    if ($done) {

        header("Location: ../../../rms-ui/pages/houses.php");

    } else {
        echo "Error".mysqli_error($conn);
        header("Location: ../../../rms-ui/pages/house_form.php");
    }
