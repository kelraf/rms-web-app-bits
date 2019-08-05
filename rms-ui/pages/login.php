<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom/forms.css">
</head>

<body class="bg-primary">

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">

                    <?php 
                        session_start();
                        if(isset($_SESSION["message"])) {

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
                <form action="../../rms-api/api/users-api/login.php" method="post" class="register">

                    <div class="reg-header">
                        <h4>Login</h4>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Enter Your Email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-custom btn-50">Login</button>
                        <!-- <a class="btn btn-primary btn-custom btn-50 text-white" href="./dashboard.php">Login</a> -->
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