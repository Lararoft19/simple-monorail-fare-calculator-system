<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title>Fare Calculator</title>
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
        font-size: 35px;
        margin: 0 auto;
        text-align: center;
        }

        .gif {
        height: 80px;
        width: 80px;
        
        }

        h2 {
			font-family: Arial, sans-serif;
		}

        table, th ,td{
            font-family: Arial, sans-serif;
            border-collapse:collapse;
            border:1px solid;
            table-layout: fixed;
            width:5%;
            font-size: 11px;
        }
        table {
            margin: 0 auto;

        }
        th, td{
            border: 1px solid;
            padding: 4px;
            text-align: center;
        }

        th{
            height:90px;
            width: 90px;
            transform: rotate(-90deg);
			vertical-align: center;
            text-align:center;
        }

        .button-container {
            text-align: center;
        }

        .button-container form {
            display: inline-block;
            margin: 5px;
        }
    </style>
    
</head>
<body>
<div class="header-container" style="text-align: center;">
    <h3 style="margin: 0 auto;">KL Monorail Online Fare Calculator </h3>
    <img src="train1.gif" alt="Train GIF" class="gif">
</div>

<div class="background-image"></div>

<form action="fare.php" method="post">

<?php

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
     
     $ticketType = isset($_POST['selecttype']) ? 
     $_POST['selecttype'] : '';


     $discounts = array(
        "Adult (Normal fare)",
        "Senior Citizen (25% discount)",
        "Disabled (40% discount)",
        "Student (30% discount)"
     );

     echo "<table>";
     echo "<tr>";
     echo "<th>From/To</th>";
     for ($col = 0; $col <11; $col++) {
        echo "<th>". $to[$col]. "</th>";
     }
     echo "</tr>";
     
     for ($row = 0; $row <11; $row++) {
        echo "<tr>";
        echo "<td>" . $from[$row]. "</td>";
        for ($col = 0;$col <11;$col++) {
        echo "<td>".number_format($fares[$row][$col],2). "</td>";
     }
     echo"</tr>";
     }
     echo"</table>";
?>

<form method="get" action="fare.php">
      
<br>
<h2>KL Monorail Fare Details</h2>
<?php

//Select depart location
echo "From: ";
echo "<select name='selectfrom' required>";
echo "<option value=''>Select from...</option>";

for($row = 0; $row <11;$row++) {
    echo "<option value='$row'>" . $from[$row] . "</option>";
}
echo "</select>";
echo "</br><br>";

// Select destination location
echo "To: ";
echo "<select name='selectto' required>";
echo "<option value=''>Select to...</option>";
for($col = 0; $col <11;$col++){
    echo "<option value='$col'>". $to[$col]. "</option>";
}
echo"</select>";
echo "</br><br>";

//number of token to be purchased
echo "<label for='num_tokens'>Number of Token:</label>";
echo "<input type='number' name='num_tokens' id='num_tokens' min='1' value='1'>";
echo "<br><br>";

// select ticket type radio button
echo "Ticket Type: ";
echo '<input type="radio" name="selecttype" value="One-way" id="oneway"';
if ($ticketType === 'One-way') {
    echo ' checked';
}
echo '>';
echo '<label for="oneway">One-way  </label>';


echo '<input type="radio" name="selecttype" value="Return" id="return"';
if ($ticketType === 'Return') {
    echo ' checked';
}
echo '>';
echo '<label for="return">Return</label>';
echo "</br><br>";

// Select discount category
echo "Discount: ";
echo "<select name='selectdiscount' required>";
echo "<option value=''>Select discount...</option>";
for($row = 0; $row <4;$row++){
    echo "<option value='$row'>". $discounts[$row]. "</option>";
}
echo"</select>";
?>
<br><br>

<!-- submit button-->
<input type="submit"value="Submit"/>
</form>

<div class="button-container">
<!--search the database when clicking the search button-->
<form method="POST" action="ticket_details.php">
        <input type="submit" value="Search">
    </form>

    <!-- sign out button, head to login page-->
    <form method="POST" action="passenger_info.html">
        <input type="submit" value="Sign Out">
    </form>

    </div>
</body>
</html>






































<!--@Lararoft19(GitHub) Copyright (c) [2023] [thiraziz]-->