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
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome-free-5.9.0-web/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom/user_profile.css">
</head>

<body class="bg-primary">

    <?php

    // session_start();
    // $user_id = $_SESSION["user_id"];

    include "../../rms-api/database.php";
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
    $user = mysqli_fetch_array($result);

    $query = mysqli_query($conn, "SELECT * FROM apartments WHERE landlordId='$user_id'");
    $apart_count = 0;
    while ($apartment = mysqli_fetch_array($query)) {
        $apart_count++;
    }


    $query_two = mysqli_query($conn, "SELECT * FROM houses WHERE landlordId='$user_id'");

    $house_count = 0;
    $empty = 0;
    $occupied = 0;
    while ($house = mysqli_fetch_array($query_two)) {
        $house_count++;
        if ($house["status"] == "notOccupied") {
            $empty++;
        } else {
            $occupied++;
        }
    }

    $query_three = mysqli_query($conn, "SELECT * FROM tenants WHERE landlordId='$user_id'");

    $tenant_count = 0;
    while ($tenant = mysqli_fetch_array($query_three)) {
        $tenant_count++;
    }
    // echo $tenant_count

    ?>

    <!-- Back Button -->
    <a href="./dashboard.php" class="back-arrow-btn">
        <i class="fa fa-arrow-left fa-2x"></i>
    </a>

    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-md-3">

                <!-- Image Row -->
                <div class="row">
                    <div class="col-md-12">

                        <!-- Image Container -->
                        <div class="image-cont">
                            <img class="img-fluid" src="../images/profile-image.jpg" alt="Profile Image" />
                        </div>
                    </div>
                </div>

                <!-- Names row -->
                <div class="row mt-3 mb-3 pt-2 pb-2 text-center g-danger">
                    <div class="col-6"><?php echo $user["firstName"] ?></div>
                    <div class="col-6"><?php echo $user["lastName"] ?></div>
                </div>

                <!-- Edit Names row -->
                <div class="row">
                    <div class="col-12  p-0">
                        <div class="edit-btn">
                            <a href="./user_update.php?user_id=<?php echo $user["id"] ?>" class="btn">Edit Infor</a>
                        </div>
                    </div>
                </div>

                <!-- Gender Row -->
                <div class="row mt-3 bb mb-3">
                    <div class="col-5">Gender</div>
                    <div class="col-7"><?php echo $user["gender"] ?></div>
                </div>

                <!-- Phone Number -->
                <div class="row mt-3 bb mb-3">
                    <div class="col-5">Phone No</div>
                    <div class="col-7"><?php echo $user["phoneNo"] ?></div>
                </div>

                <!-- Email -->
                <div class="row mt-3 bb mb-3">
                    <div class="col-5">Email</div>
                    <div class="col-7"><?php echo $user["email"] ?></div>
                </div>

                <!-- Registration Date -->
                <div class="row mt-3 bb mb-3">
                    <div class="col-5">Registration Date</div>
                    <div class="col-7"><?php echo $user["registrationData"] ?></div>
                </div>

                <!-- Edit User Details row -->
                <div class="row">
                    <div class="col-12  p-0">
                        <div class="edit-btn">
                            <a href="./password-update.php?user_id=<?php echo $user["id"] ?>" class="btn">Edit Passwords</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-9 g-danger">
                <div class="row text-center">

                    <div class="col-3 p-0 items g-success">
                        <div class="icon">
                            <i class="fa fa-building pt-1 pb-1 fa-5x"></i>
                        </div>
                        <div class="name">Apartments</div>
                        <div class="number"><?php echo $apart_count ?></div>
                    </div>

                    <div class="col-3 p-0 items g-success">
                        <div class="icon">
                            <i class="fa fa-home pt-1 pb-1 fa-5x"></i>
                        </div>
                        <div class="name">Houses</div>
                        <div class="number"><?php echo $house_count ?></div>
                    </div>

                    <div class="col-3 p-0 items g-success">
                        <div class="icon">
                            <i class="fa fa-users pt-1 pb-1 fa-5x"></i>
                        </div>
                        <div class="name">Tenants</div>
                        <div class="number"><?php echo $tenant_count ?></div>
                    </div>

                    <div class="col-3 p-0 items g-success">
                        <div class="icon">
                            <i class="fa fa-money pt-1 pb-1 fa-5x"></i>
                        </div>
                        <div class="name">Payment</div>
                        <div class="number">Kshs 100000</div>
                    </div>

                    <div class="col-3 p-0 items g-success">
                        <div class="icon">
                            <i class="fa fa-money pt-1 pb-1 fa-5x"></i>
                        </div>
                        <div class="name">OutStanding Payment</div>
                        <div class="number">Kshs 100000</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>