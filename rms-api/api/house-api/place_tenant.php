<?php
    require_once "../../database.php";
    if(isset($_GET)) {
        $user_id = $_GET["user_id"];
        $house_id = $_GET["house_id"];
        $status = "occupied";

        $sql = mysqli_query($conn, "UPDATE houses SET tenantId = '$user_id', status = '$status' WHERE id = '$house_id'");

        if($sql) {
            header("Location: ../../../rms-ui/pages/houses.php");
        } else {
            header("Location: ../../../rms-ui/pages/houses.php");
        }

}