<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>House</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome-free-5.9.0-web/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom/house_profile.css">
</head>
<body class="bg-primary" onload="apartmentsProfile();">

    <!-- Back Button -->
    <a href="./apartments.php" class="back-arrow-btn">
        <i class="fa fa-arrow-left fa-2x"></i>
    </a>

    <div class="container main-cont pt-2 pb-2">
        <div class="row">

            <!-- About House Col -->
            <div class="col-md-4">

                <!-- Header -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4>Apartment Information</h4>
                    </div>
                </div>

                <!-- House Information -->
                <div class="row">
                    <div class="col-5 pt-2 pb-2">Apartment Name</div>
                    <div class="col-7 pt-2 pb-2">The Name</div>
                </div>

                <div class="row">
                    <div class="col-5 pt-2 pb-2">Apartment Location</div>
                    <div class="col-7 pt-2 pb-2">House</div>
                </div>

                <!-- Edit User Details row -->
                <div class="row pt-2 pb-2">
                    <div class="col-12  p-0">
                        <div class="edit-btn">
                            <button class="btn">Add House</button>
                        </div>
                    </div>
                </div>

                <!-- Edit User Details row -->
                <div class="row pt-2 pb-2">
                    <div class="col-12  p-0">
                        <div class="edit-btn">
                            <button class="btn">Edit</button>
                        </div>
                    </div>
                </div>

                <!-- Edit User Details row -->
                <div class="row pt-2 pb-2">
                    <div class="col-12  p-0">
                        <div class="edit-btn">
                            <button class="btn">Delete</button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- House Icon and images -->
            <div class="col-md-4 p-0">               

                <div class="container-fluid">

                    <!-- House Image -->
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <div class="house-image">
                                <canvas id="apartments"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- House Icon -->
                    <div class="row">
                        <div class="col-12 p-0">

                            <!-- House Icon -->
                            <div class="house-icon bg-primary pb-2">
                                <i class="fa fa-home pt-1 pb-1 fa-5x"></i>

                                 <!-- Edit User Details row -->
                                 <div class="edit-btn">
                                     <a href="./houses.php" class="btn">Houses</a>
                                 </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <!-- About The Apartment The House Belongs To -->
            <div class="col-md-4">

                <!-- Header -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4>More Information</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5 pt-2 pb-2">Total Houses</div>
                    <div class="col-7 pt-2 pb-2">The Number</div>
                </div>

                
                <div class="row">
                    <div class="col-5 pt-2 pb-2">Occupied Houses</div>
                    <div class="col-7 pt-2 pb-2">The Number</div>
                </div>

                <div class="row">
                    <div class="col-5 pt-2 pb-2">Unoccupied Houses</div>
                    <div class="col-7 pt-2 pb-2">The Number</div>
                </div>

                <div class="row">
                    <div class="col-5 pt-2 pb-2">Owner Name</div>
                    <div class="col-7 pt-2 pb-2">The Name</div>
                </div>

                <div class="row">
                    <div class="col-5 pt-2 pb-2">Payment</div>
                    <div class="col-7 pt-2 pb-2">Kshs 122000</div>
                </div>

                <div class="row">
                    <div class="col-5 pt-2 pb-2">Outstanding Payment</div>
                    <div class="col-7 pt-2 pb-2">Kshs 10000</div>
                </div>

            </div>
        </div>
    </div>





    <script src="../js/custom/custom-libraries/jquery.js"></script>
    <script src="../js/custom/custom-libraries/datatables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="../js/custom/custom-libraries/popper.js"></script>
    <script src="../js/custom/custom-libraries/chart.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom/apartment-profile.js"></script>
</body>
</html>