<?php

    require_once "../../database.php";

    $id = $_GET["apart_id"];

    $done = mysqli_query($conn, "DELETE FROM apartments WHERE id='$id'");
    $done_two = mysqli_query($conn, "DELETE FROM houses WHERE apartmentId='$id'");
            
    if($done and $done_two) {
        header("Location: ../../../rms-ui/pages/dashboard.php");
    } else {
        echo "Error";
    }

?>