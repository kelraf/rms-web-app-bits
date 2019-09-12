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
    <title>Register</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom/forms.css">
</head>

<body class="bg-primary">

    <?php

    include "../../rms-api/database.php";
    $user_id = $_GET["user_id"];
    include "../../rms-api/database.php";
    $result = mysqli_query($conn, "SELECT * FROM tenants WHERE id='$user_id'");
    $user = mysqli_fetch_array($result);

    ?>

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">

                <?php
                if (isset($_SESSION["message"])) {

                    ?>
                    <div class="flash-error">
                        <?php
                        echo $_SESSION["message"];
                        $_SESSION["message"] = null;
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-12 bg-primary">
                <form action="../../rms-api/api/users-api/update_tenant.php" method="post" class="register">

                    <div class="reg-header">
                        <h4>Update</h4>
                    </div>

                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" value="<?php echo $user["firstName"] ?>" placeholder="Enter Your First Name" name="firstName">
                    </div>

                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" value="<?php echo $user["lastName"] ?>" name="lastName" placeholder="Enter Your Last Name">
                    </div>

                    <div class="form-check form-check-inline pt-2 pb-2">
                        <input type="radio" class="form-check-input update" value="male" name="gender" checked>
                        <label for="male" class="form-check-label">Male</label>
                    </div>

                    <div class="form-check form-check-inline pt-2 pb-2">
                        <input type="radio" class="form-check-input update" value="female" name="gender">
                        <input type="hidden" class="form-check-input update" value="<?php echo $user_id ?>" name="user_id">
                        <label for="female" class="form-check-label">Female</label>
                    </div>

                    <div class="form-check form-check-inline pt-2 pb-2">
                        <input type="radio" class="form-check-input update" value="other" name="gender">
                        <label for="other" class="form-check-label">Other</label>
                    </div>

                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="number" class="form-control" value="<?php echo $user["phoneNo"] ?>" placeholder="Enter Your Phone Number" name="phoneNo">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" value="<?php echo $user["email"] ?>" placeholder="Enter Your Email" name="email">
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
    <script src="../js/custom/user_update.js"></script>

    <script>
        let gender = "<?php echo $user["gender"] ?>";
    </script>
</body>

</html>