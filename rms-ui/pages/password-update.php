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
    <title>Edit Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom/forms.css">
</head>

<body class="bg-primary">

    <!-- Back Button -->
    <a href="./user_profile.php" class="back-arrow-btn">
        <i class="fa fa-arrow-left fa-2x"></i>
    </a>

    <div class="container">
        <div class="row">
            <div class="col-12 bg-primary">
                <form action="../../rms-api/api/users-api/password-update.php?user_id=<?php echo $_GET["user_id"] ?>" method="post" class="register">

                    <div class="reg-header">
                        <h4>Update Password</h4>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Confirm Your Password" name="confirm_password">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
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