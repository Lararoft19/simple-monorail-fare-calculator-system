<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
  <head>
    <title>Login</title>
    <style>
        .container{
            font-family: Arial, sans-serif;
        }

    </style>
  </head>
  <body>
  <div class="container">
     <h2>Insert Passenger Info to Database</h2>

     <?php
     
     session_start();
     //Creating database connection
     $conn = new mysqli("localhost", "root", "", "monorail_passenger");
     
     //Checking connection
     if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      
      $passengerid = $_POST["passengerid"];
      $passengername = $_POST["passengername"];

      //insert into passenger table
      $sql = "INSERT INTO passenger
      (passenger_id, passenger_name)VALUES
      ('$passengerid', '$passengername')";

        //to link to fare.php file
        $_SESSION['passengerid'] = $passengerid;
        $_SESSION['passengername'] = $passengername;
  
      
      // Execute the query and check for errors
    if ($conn->query($sql) === true) {
        echo "Details Recorded Successfully!";
    } else {
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }


    // Close the connection
    $conn->close();

    //will direct to fare calculator page
    header("Location: calculate.php");
    exit();
      ?>
  </div>  
  </body>
</html>









































<!--@Lararoft19(GitHub) Copyright (c) [2023] [thiraziz]-->