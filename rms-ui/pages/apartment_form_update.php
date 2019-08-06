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
    <title>Apartment Update</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom/forms.css">
</head>

<body class="bg-primary">

    <!-- Back Button -->
    <a href="apartment_profile.php?id=<?php echo $_GET["apart_id"] ?>" class="back-arrow-btn mb-5">
        <i class="fa fa-arrow-left fa-2x"></i>
    </a>

    <?php

    $apart_id = $_GET['apart_id'];

    include "../../rms-api/database.php";
    $results = mysqli_query($conn, "SELECT apartmentName, apartmentLocation FROM apartments WHERE id='$apart_id'");
    $apart = mysqli_fetch_array($results);

    ?>

    <div class="container">
        <div class="row">
            <div class="col-12 bg-primary">
                <form action="../../rms-api/api/apart-api/update.php" method="post" class="register">

                    <div class="reg-header">
                        <h4>Update Apartment</h4>
                    </div>

                    <div class="form-group  pt-2 pb-2">
                        <label for="apartmentName">Apartment Name</label>
                        <input type="text" class="form-control" placeholder="Enter Apartment Name" value="<?php echo $apart["apartmentName"] ?>" name="apartmentName">
                    </div>

                    <div class="form-group pt-2 pb-2">
                        <label for="apartmentLocation">Apartment Location</label>
                        <input type="hidden" value="<?php echo $apart_id  ?>" name="apart_id" />
                        <input type="text" class="form-control" name="apartmentLocation" value="<?php echo $apart["apartmentLocation"] ?>" placeholder="Enter Your Apartment Location">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-custom btn-50">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script src="../js/custom/custom-libraries/jquery.js"></script>

    <!-- <script src="../js/custom/custom-libraries/popper.js"></script> -->

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom/landlord.js"></script>
</body>

</html>