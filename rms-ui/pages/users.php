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
    <title>Tenants</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../css/custom/custome-libraries/datatables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome-free-5.9.0-web/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom/tables.css">
</head>

<body class="bg-primary text-white">
    <?php
    // session_start();
    if (isset($_SESSION["message"])) {
        echo $_SESSION["message"];
        $_SESSION["message"] = null;
    }

    ?>

    <!-- Back Button -->
    <a href="./dashboard.php" class="back-arrow-btn">
        <i class="fa fa-arrow-left fa-2x"></i>
    </a>

    <div class="container-fluid">
        <div class="row pt-4 pb-4">
            <div class="col-md-6">
                <h4>My Tenants</h4>
            </div>
            <div class="col-md-6">
                <h1></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-hover " id="users">

                    <thead>
                        <tr>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Gender</td>
                            <td>Phone Number</td>
                            <td>Email</td>
                            <td>Registration Date</td>
                            <td>Status</td>
                            <td>Update</td>
                            <td>Delete</td>
                        </tr>
                    </thead>

                    <tbody class="bg-primary" id="table-body">

                        <?php

                        include "../../rms-api/database.php";
                        $user_id = $_SESSION["user_id"];

                        $result = mysqli_query($conn, "SELECT * FROM tenants WHERE landlordId='$user_id'");

                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr id="table-row" class="g-primary">
                                <td><?php echo $row["firstName"] ?></td>
                                <td><?php echo $row["lastName"] ?></td>
                                <td><?php echo $row["gender"] ?></td>
                                <td><?php echo $row["phoneNo"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                                <td><?php echo $row["registrationData"] ?></td>
                                <td class="p-0">
                                    <?php
                                    $tenant_id = $row["id"];
                                    $sql = mysqli_query($conn, "SELECT * FROM houses WHERE tenantId='$tenant_id'");
                                    $house = mysqli_fetch_array($sql);
                                    if ($house) {
                                        $house_id = $house["id"];
                                        ?>
                                        <a href="../../rms-api/api/house-api/remove_tenant.php?house_id=<?php echo $house_id ?>" class="btn m-1" id="table-btn">Remove</a>
                                    <?php
                                    } else {
                                        if (isset($_GET["house_id"])) {
                                            $house_id = $_GET["house_id"];
                                            ?>
                                            <a href="../../rms-api/api/house-api/place_tenant.php?user_id=<?php echo $row["id"] ?>&house_id=<?php echo $house_id ?>"" class=" btn m-1" id="table-btn">Place</a>
                                        <?php } else { ?>
                                            <a href="houses.php?user_id=<?php echo $row["id"] ?>"" class=" btn m-1" id="table-btn">Place</a>
                                        <?php
                                        }
                                    }
                                    ?>
                                </td>
                                <td class="p-0">
                                    <a href="tenant_update.php?user_id=<?php echo $row["id"] ?>" class="btn m-1" id="table-btn">Update</a>
                                </td>
                                <td class="p-0">
                                    <a href="../../rms-api/api/users-api/del_tenant.php?user_id=<?php echo $row["id"] ?>" class="btn m-1" id="table-btn">Delete</a>
                                </td>
                            </tr>

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