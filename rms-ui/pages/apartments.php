
<?php
    session_start();

    if(!isset($_SESSION["user_id"])) {
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
    <title>Apartments</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../css/custom/custome-libraries/datatables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome-free-5.9.0-web/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom/tables.css">
</head>

<body class="bg-primary text-white">

    <!-- Back Button -->
    <a href="./dashboard.php" class="back-arrow-btn">
        <i class="fa fa-arrow-left fa-2x"></i>
    </a>

    <div class="container-fluid">
        <div class="row pt-4 pb-4">
            <div class="col-md-6">
                <h4>My Apartments</h4>
            </div>
            <div class="col-md-6">
                <h1></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-hover text-white" id="users">

                    <thead>
                        <tr class="text-white">
                            <td>Apartment Name</td>
                            <td>Apartment Location</td>
                            <td>Number of Houses</td>
                            <td>Houses With Tenants</td>
                            <td>Houses Without Tenants</td>
                            <td>View</td>
                        </tr>
                    </thead>

                    <tbody class="bg-primary" id="table-body">
 
                        <?php  
                                                   
                            include "../../rms-api/database.php";

                            $results = mysqli_query($conn, "SELECT * FROM apartments WHERE landlordId='$user_id'");
                            
                            while($data = mysqli_fetch_array($results)) {

                                $apart_id = $data["id"];

                                $query = mysqli_query($conn, "SELECT * FROM houses WHERE apartmentId='$apart_id'");

                                $house_count = 0;
                                $empty = 0;
                                $occupied = 0;
                                while ($house = mysqli_fetch_array($query)) {
                                    $house_count++;
                                    if ($house["status"] == "notOccupied") {
                                        $empty++;
                                    } else {
                                        $occupied++;
                                    }
                                }

                                ?>
                                
                                <tr id="table-row" class="table-row pt-3">
                                    <td><?php echo $data["apartmentName"] ?></td>
                                    <td><?php echo $data["apartmentLocation"] ?></td>
                                    <td><?php echo $house_count; ?></td>
                                    <td><?php echo $empty; ?></td>
                                    <td><?php echo $occupied; ?></td>
                                    <td class="p-0">
                                        <a href="./apartment_profile.php?id=<?php echo $data["id"] ?>"" class="btn mt-1 mb-1" id="table-btn">More</a>
                                    </td>
                                </tr>
                                
                            <?php } ?>
                        
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <script src="../js/custom/custom-libraries/jquery.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>
    <script src="../js/custom/custom-libraries/datatables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="../js/custom/custom-libraries/popper.js"></script>
    <script src="../js/custom/custom-libraries/chart.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom/users_datatable.js"></script>
</body>

</html>