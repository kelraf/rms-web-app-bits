<?php

    require_once "../../database.php";

    $id = $_GET["user_id"];

    $done = mysqli_query($conn, "DELETE FROM tenants WHERE id='$id'");
    // $done_two = mysqli_query($conn, "DELETE FROM houses WHERE apartmentId='$id'");
            
    if($done) {
        header("Location: ../../../rms-ui/pages/users.php");
    } else {
        echo "Error";
    }

?>