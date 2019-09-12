<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    $_SESSION["message"] = "Authentication Required Please Login";
    header("location: login.php");
}

$user_id = $_SESSION["user_id"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apartment Houses</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../css/custom/custome-libraries/datatables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome-free-5.9.0-web/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom/tables.css">
</head>

<body class="bg-primary text-white">

    <!-- Back Button -->
    <a href="./apartment_profile.php?id=<?php echo $_GET["apart_id"] ?>" class="back-arrow-btn">
        <i class="fa fa-arrow-left fa-2x"></i>
    </a>

    <div class="container">
        <div class="row pt-4 pb-4">
            <div class="col-md-6">
                <h4>Apartment Houses</h4>
            </div>
            <div class="col-md-6">
                <h1></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-hover " id="users">

                    <thead class="text-white">
                        <tr>
                            <td>House Type</td>
                            <td>Status</td>
                            <td>Rent</td>
                            <!-- <td>Apartment Location</td> -->
                            <td></td>
                        </tr>
                    </thead>

                    <tbody class="bg-primary" id="table-body">

                        <?php

                        include "../../rms-api/database.php";
                        $apart_id = $_GET["apart_id"];
                        $results = mysqli_query($conn, "SELECT * FROM houses WHERE apartmentId='$apart_id'");

                        while ($row = mysqli_fetch_array($results)) {
                            if ($row["houseType"] != "bedsitter") {
                                $num = $row["houseType"];
                                $row["houseType"] = $num . " Bedroom";
                            }
                            ?>

                            <tr id="table-row" class="g-primary">
                                <td><?php echo $row["houseType"] ?></td>
                                <td><?php echo $row["status"] ?></td>
                                <td><span class="pr-1">Kshs</span><?php echo $row["rent"] ?></td>
                                <!-- <td><?php echo $row["houseType"] ?></td> -->
                                <td class="p-0">
                                    <a href="./house_profile.php?house_id=<?php echo $row["id"] ?>" class="btn mt-1 mb-1" id="table-btn">More</a>
                                </td>

                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <script src="../js/custom/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="../js/custom/custom-libraries/datatables.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom/users_datatable.js"></script>
</body>

</html>