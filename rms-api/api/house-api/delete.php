<?php

    require_once "../../database.php";

    $id = $_GET["house_id"];

    // $done = mysqli_query($conn, "DELETE FROM apartments WHERE id='$id'");
    $done = mysqli_query($conn, "DELETE FROM houses WHERE id='$id'");
            
    if($done) {
        header("Location: ../../../rms-ui/pages/dashboard.php");
    } else {
        echo "Error";
    }

?>