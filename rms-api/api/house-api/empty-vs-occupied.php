<?php

    require_once "../../database.php";
    session_start();
    $session = $_SESSION;
    // $user_id = $_SESSION["user_id"];

    // $query_two = mysqli_query($conn, "SELECT * FROM houses WHERE landlordId='$user_id'");
    // $house_count = 0;
    // $empty = 0;
    // $occupied = 0;
    // while ($house = mysqli_fetch_array($query_two)) {
    //     $house_count++;
    //     if ($house["status"] == "notOccupied") {
    //         $empty++;
    //     } else {
    //         $occupied++;
    //     }
    // }

    // $data = [];
    // $data["empty"] = $empty;
    // $data["occupied"] =$occupied;

    // echo json_encode($session);
     print_r($session);