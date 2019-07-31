<?php
    require_once "../../database.php";
    if(isset($_GET["house_id"])) {
        session_start();
        $house_id = $_GET["house_id"];
        $status = "notOccupied";
        $sql = mysqli_query($conn, "UPDATE houses SET status= '$status', tenantId = null WHERE id='$house_id'");

        if($sql) {
            $_SESSION["message"] = "Successfully Remove Tenant";
            header("Location: ../../../rms-ui/pages/users.php");
        } else {
            $_SESSION["message"] = "Unable to Remove Tenant";
            header("Location: ../../../rms-ui/pages/users.php");
        }
    }