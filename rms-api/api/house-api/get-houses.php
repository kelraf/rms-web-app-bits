
<?php 

    $conn = mysqli_connect("localhost", "root", "", "rental_managment_system");

    if(mysqli_connect_errno()) {
        echo "Error: ".mysqli_connect_error();
    } else {
        echo "Successfully Connected";
    }

    session_start();
    $user_id = $_SESSION["user_id"];

    $results = mysqli_query($conn, "SELECT * FROM houses WHERE landlordId='$user_id'");
    
    $data = []; 

    while($row = mysqli_fetch_array($results)) {

        

        if($row["houseType"] != "bedsitter") {

            $num = $row["houseType"];

            $row["houseType"] = $num. " Bedroom"; 
            array_push($data, $row);

        } else {
            array_push($data, $row);
        }
        
    }

    // print_r($data);

?>