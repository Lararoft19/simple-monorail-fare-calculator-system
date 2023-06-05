

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title>Total Fare</title>
    <style>

        .background-image {
        background-image: url("train-ticket.png");
        background-size: cover; 
        background-position: center center;
        background-repeat: no-repeat;
        opacity: 0.2; 
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: -1;
        }

        .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        }

        h3 {
        font-family: Arial, sans-serif;
        font-size: 40px;
        margin: 0 auto;
        text-align: center;
        }

        .gif {
        height: 130px;
        width: 130px;
        
        }

        h2 {
			font-family: Arial, sans-serif;
		}

        .container{
        font-family: Arial, sans-serif;

        }

        .button-container {
            text-align: center;
        }

        .button-container form {
            display: inline-block;
            margin: 5px;
        }

        </style>
<body>

<div class="header-container" style="text-align: center;">
    <h3 style="margin: 0 auto;">KL Monorail Online Fare Calculator </h3>
    
</div>

<div class="background-image"></div>

<div class="container" style="text-align: center;">
<img src="train3.png" alt="Train logo" class="gif">
<?php
session_start();

    //Creating database connection
    $conn = new mysqli("localhost", "root", "", "monorail_passenger");

    //Checking connection
    if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }   
   
     $from = array("KL Sentral", "Tun Sambanthan", "Maharajalela", 
     "Hang Tuah", "Imbi", "Bukit Bintang", "Raja Chulan", "Bukit Nanas", 
     "Medan Tuanku", "Chow Kit", "Titiwangsa");
    $to = array("KL Sentral", "Tun Sambanthan", "Maharajalela", 
        "Hang Tuah", "Imbi", "Bukit Bintang", "Raja Chulan", "Bukit Nanas", 
        "Medan Tuanku", "Chow Kit", "Titiwangsa");
    $fares = array
        (
            array(0.00, 1.20, 1.60, 1.60, 1.60, 2.10, 2.10, 2.10, 2.50, 2.50, 2.50),
            array(1.20, 0.00, 1.20, 1.60, 1.60, 1.60, 2.10, 2.10, 2.10, 2.50, 2.50),
            array(1.60, 1.20, 0.00, 1.20, 1.20, 1.60, 1.60, 1.60, 2.10, 2.10, 2.50),
            array(1.60, 1.60, 1.20, 0.00, 1.20, 1.20, 1.20, 1.60, 1.60, 2.10, 2.10),
            array(1.60, 1.60, 1.20, 1.20, 0.00, 1.20, 1.20, 1.60, 1.60, 1.60, 2.10),
            array(2.10, 1.60, 1.60, 1.20, 1.20, 0.00, 1.20, 1.20, 1.60, 1.60, 2.10),
            array(2.10, 2.10, 1.60, 1.20, 1.20, 1.20, 0.00, 1.20, 1.20, 1.60, 1.60),
            array(2.10, 2.10, 1.60, 1.60, 1.60, 1.20, 1.20, 0.00, 1.20, 1.20, 1.60),
            array(2.50, 2.10, 2.10, 1.60, 1.60, 1.60, 1.20, 1.20, 0.00, 1.20, 1.60),
            array(2.50, 2.50, 2.10, 2.10, 1.60, 1.60, 1.60, 1.20, 1.20, 0.00, 1.20),
            array(2.50, 2.50, 2.50, 2.10, 2.10, 2.10, 1.60, 1.60, 1.20, 1.20, 0.00)
        );

     $discounts = array(
        "Adult (Normal fare)",
        "Senior Citizen (25% discount)",
        "Disabled (40% discount)",
        "Student (30% discount)"
     );


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$fromindex = $_POST["selectfrom"];
		$toindex = $_POST["selectto"];
		$typeindex = $_POST["selecttype"];
        $num_token = $_POST["num_tokens"];
		$discountindex = $_POST["selectdiscount"];

        //retrieve id and name from the insert_details.php file
        $passengerid = $_SESSION['passengerid'];
        $passengername = $_SESSION['passengername'];

        // Calculate the fare based on the distance between the stations
		$fare = $fares[$fromindex][$toindex]; //get the base fare

        switch ($discountindex) {
            case 1: // Senior Citizen
                $fare *= 0.75; // 25% discount
                break;
            case 2: // Disabled
                $fare *= 0.6; // 40% discount
                break;
            case 3: // Student
                $fare *= 0.7; // 30% discount
                break;
            default:
                break;
        }
    
        $total = $fare*$num_token;

        //Adjust total fare for return tix
        if ($typeindex == "Return") {
            $total *= 2;
        }

        //insert data into table ticket
        $sql_ticket = "INSERT INTO ticket
        (passenger_id, passenger_name, from_station, to_station, num_tokens, 
        tix_type, discount_cat, total_fare, datetime)
        VALUES ('$passengerid', '$passengername', '$from[$fromindex]', '$to[$toindex]', '$num_token', '$typeindex', 
        '$discounts[$discountindex]', '$total', NOW())";

            // Execute the query and check for errors
    if ($conn->query($sql_ticket) === true) {
        echo "<br>Details Recorded Successfully!";
    } else {
        echo "ERROR: Could not able to execute $sql_ticket. " . $conn->error;
    }

    // Close the connection
    $conn->close();

        ?>
    <br>    
    <h2>KL Monorail Total Fare Summary</h2>  <!-- display purchased summary-->

    <?php
    date_default_timezone_set('Asia/Kuala_Lumpur'); //set default time zone to KL, 24 hrs format

    echo "<p> ID: " . $passengerid . "</p>";       
    echo "<p> Name: " . $passengername . "</p>";         
    echo "<p> From: " . $from[$fromindex] . "</p>";
    echo "<p> To: " . $to[$toindex] . "</p>";
    echo "<p> Number of Token(s): " . $num_token . "</p>";
    echo "<p> Ticket Type: " . $typeindex . "</p>";
    echo "<p> Discount category: " . $discounts[$discountindex] . "</p>";
    echo "<p> The total fare is: RM " . number_format($total, 2) . "</p>";
    echo "<p> Date and Time: " . date('d-m-Y H:i:s') .  "</p>";    
}  
    ?>

<div class="button-container">
    <form method="POST" action="calculate.php">
        <input type="submit" value="Back">
    </form>

    <form method="POST" action="ticket_details.php">
        <input type="submit" value="Search">
    </form>

    <form method="POST" action="passenger_info.html">
        <input type="submit" value="Sign Out">
    </form>
</div>

</body>
</html>
























<!--@Lararoft19(GitHub) Copyright (c) [2023] [thiraziz]-->