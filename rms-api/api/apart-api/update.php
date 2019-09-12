<?php

require_once "../../database.php";

$apartmentName = $_POST["apartmentName"];
$apartmentLocation = $_POST["apartmentLocation"];
$apart_id = $_POST["apart_id"];

// print_r($_POST);

$done = mysqli_query($conn, "UPDATE apartments SET apartmentName='$apartmentName', apartmentLocation='$apartmentLocation' WHERE id= '$apart_id'");

if ($done) {
    header("Location: ../../../rms-ui/pages/dashboard.php");
} else {
    header("Location: ../../../rms-ui/pages/apartment_form.php");
}
