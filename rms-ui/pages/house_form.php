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
    <title>Add House</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom/forms.css">
</head>

<body class="bg-primary">

    <!-- Back Button -->
    <a href="apartment_profile.php?id=<?php echo $_GET["apart_id"] ?>" class="back-arrow-btn mb-5">
        <i class="fa fa-arrow-left fa-2x"></i>
    </a>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="../../rms-api/api/house-api/create.php" method="post" class="register">

                    <div class="reg-header">
                        <h4>Add House</h4>
                    </div>

                    <div class="form-group">
                        <label for="houseType">House Type</label>
                        <select name="houseType" id="" class="form-control">
                            <option value="">Choose House Type</option>
                            <option value="bedsitter">BedSitter</option>
                            <option value="1">One Bedroom</option>
                            <option value="2">Two Bedroom</option>
                            <option value="3">Three Bedroom</option>
                            <option value="4">Four Bedroom</option>
                            <option value="5">Five Bedroom</option>
                            <option value="6">Six Bedroom</option>
                            <option value="7">Seven Bedroom</option>
                            <option value="8">Eight Bedroom</option>
                            <option value="9">Nine Bedroom</option>
                            <option value="10">Ten Bedroom</option>
                        </select>
                    </div>

                    <div class="form-check form-check-inline pt-2 pb-2">
                        <input type="radio" class="form-check-input" value="occupied" name="status">
                        <label for="occupied" class="form-check-label">Occupied</label>
                    </div>

                    <div class="form-check form-check-inline pt-2 pb-2">
                        <input type="radio" class="form-check-input" checked value="notOccupied" name="status">
                        <label for="notOccupied" class="form-check-label">Not Occupied</label>
                    </div>

                    <div class="form-group">
                        <label for="houseRent">House Rent</label>
                        <input type="number" class="form-control" name="rent" placeholder="Enter House Rent">
                        <input type="hidden" name="apart_id" value="<?php echo $_GET["apart_id"] ?>" />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-custom btn-50">Add It</button>
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