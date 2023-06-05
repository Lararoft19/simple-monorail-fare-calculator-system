<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title>Search</title>
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


        /* Center the image and text */
      .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        font-family: Arial, sans-serif;
      }

      .gif {
        width: 100px;
        height: 100px;
      }
        
    </style>
</head>
<body>

<div class="header-container" style="text-align: center;">
    <h3 style="margin: 0 auto;">KL Monorail Online Fare Calculator </h3>
    
</div>
    <div class="background-image"></div>
    <div class="container">
    <h1>Search Purchase Details</h1>
    <img src="search.gif" alt="searchgif"  class="gif">
    <h2>Enter 12-digit ID:</h2>
        <form action="" method="post">
            <input type="text" name="inputtext" pattern="[0-9]{12}" autocomplete="off" required/>
            <input type="submit" name="searchid" value="Search ID"/>
        </form>

        <form method="POST" action="calculate.php">
            <input type="submit" value="Back">
        </form>

        <form method="POST" action="passenger_info.html">
             <input type="submit" value="Sign Out">
        </form>

    <?php
    if (isset($_POST['searchid'])){//check if form was submitted
        $input = $_POST['inputtext']; //get input text
        $message = "<p>You searched for: " . $input . "</p>";
    }
    ?>

        <?php
        if(isset($message)){
            echo $message . "<br><br>";
            //Creating database connection
            $conn = new mysqli("localhost", "root", "", "monorail_passenger");
            
            //Checking connection
            if(!$conn) {
                die("Could not connect. " . mysqli_connect_error());
            }

            //Creating the sql command
            $sql = "SELECT * FROM ticket WHERE passenger_id = '$input'
            ORDER BY datetime DESC";

            if($result = $conn->query($sql)){
                if($result->num_rows>0){
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>From</th>";
                    echo "<th>To</th>";
                    echo "<th>Pax</th>";
                    echo "<th>Ticket Type</th>";
                    echo "<th>Discount Category</th>";
                    echo "<th>Total Fare</th>";
                    echo "<th>Date&Time</th>";
                    echo "</tr>";

                    while ($row = $result->fetch_array()){
                        echo "<tr>";
                        echo "<td>" . $row['passenger_id'] . "</td>";
                        echo "<td>". $row['passenger_name'] . "</td>";
                        echo "<td>". $row['from_station'] . "</td>";
                        echo "<td>" . $row['to_station'] . "</td>";
                        echo "<td>" . $row['num_tokens'] . "</td>";
                        echo "<td>" . $row['tix_type'] . "</td>";
                        echo "<td>" . $row['discount_cat'] . "</td>";
                        echo "<td>" . $row['total_fare'] . "</td>";
                        echo "<td>" . $row['datetime'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";

                    //Free result set
                    $result->free();
                } else {
                    echo "No record matching your query is found.";
                }

            }
                //Close connection
                $conn->close();
                }
                ?>
  </div>              
</form>
</body>
</html>
        
























<!--@Lararoft19(GitHub) Copyright (c) [2023] [thiraziz]-->