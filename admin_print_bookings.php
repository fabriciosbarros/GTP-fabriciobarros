
<!DOCTYPE html>
<html>
<head>
    <title>Ger's Garage</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body onload="window.print();return false;">
<?php

include "config.php";

// PRIVATE PAGE


//needs to be at the start of every page where you will use $_SESSION
session_start();

$login_cookie = $_SESSION['name'];
$login_email = $_SESSION['email'];
$startdate=$_SESSION['startdate'];
$enddate=$_SESSION['enddate'];

if (!isset($_SESSION["loggedIn"]) && !$_SESSION["loggedIn"] == 1)
{
    //throw you off the page if not logged in
    header("Location:index.php");
}
//Ref: https://www.tutorialspoint.com/sqlite/sqlite_php.htm
//Ref: http://php.net/manual/en/sqlite3stmt.execute.php
//Ref: http://www.sqlitetutorial.net/sqlite-php/

//$query = "SELECT * FROM slots INNER JOIN slot_times ON slots.slot_time_ref = slot_times.slot_time_id INNER JOIN appointments on slots.slot_appointment_id = appointments.appointment_id INNER JOIN services ON appointments.service_id = services.service_id INNER JOIN users ON appointments.customer_id = users.user_id INNER JOIN vehicles ON users.vehicle_id = vehicles.vehicle_id INNER JOIN vehicle_makes ON vehicles.vehicle_make = vehicle_makes.vehicle_make_id WHERE slot_date BETWEEN '$startdate' AND '$enddate' ORDER BY slots.slot_date,slots.slot_time_ref";


$sql ="SELECT * FROM slots 
INNER JOIN slot_times ON slots.slot_time_ref = slot_times.slot_time_id 
INNER JOIN appointments ON slots.slot_appointment_id = appointments.appointment_id
INNER JOIN services ON appointments.service_id = services.service_id 
INNER JOIN users ON appointments.customer_id = users.user_id 
INNER JOIN vehicles ON users.vehicle_id = vehicles.vehicle_id 
INNER JOIN vehicle_makes ON vehicles.vehicle_make = vehicle_makes.vehicle_make_id 
WHERE slot_date BETWEEN '$startdate' AND '$enddate'";

$results2 = mysqli_query($con,$sql);


$sd=date("d-m-y", strtotime($startdate));
$ed=date("d-m-y", strtotime($enddate));
echo '<div class="container">';   
echo '<br><br><h2>LIST OF BOOKINGS</h2><br>
Initial date: <b>'.$sd.'</b><br>End date: <b>'.$ed.'</b><br><br>';
           echo '<table class="table table-bordered table-hover table-responsive" border="1" id="dbtable">
           <thead class="thead-light">
           <tr>
                    <th scope="col" width="10%"><p align="center">Date</th>
                    <th scope="col" width="10%"><p align="center">Slot Time</th>
                    <th scope="col" width="10%"><p align="center">Appointment ID</th>
                    <th scope="col" width="20%"><p align="center">Customer Name</th>
                    <th scope="col" width="10%"><p align="center">Car Model</th>
                    <th scope="col" width="20%"><p align="center">Service</th>
                </tr>
                </thead>
                <tbody>';
           
            while($row = mysqli_fetch_array($results2))
           {
               $dateformat = date("d-m-y", strtotime($row['slot_date'])); 
                echo '<tr style="height:100px"><td align="center" style="vertical-align: middle;">'
                  .$dateformat
                  ."</td><td align='center' style='vertical-align: middle;'>"
                  .$row["slot_time"]
                  ."</td><td align='center' style='vertical-align: middle;'>"
                  .$row["appointment_id"]
                  ."</td><td align='center' style='vertical-align: middle;'>"
                  .$row["user_first_name"]
                  ."&nbsp"
                  .$row["user_last_name"]
                  ."</td><td align='center' style='vertical-align: middle;'>"
                  .$row["vehicle_make_name"]
                  ."&nbsp"
                  .$row["vehicle_model"]
                  ."</td><td align='center' style='vertical-align: middle;'>"
                  .$row["service_name"]
                  .'</td></tr>';
                  
           }
           
           echo "</tbody></table>";
           echo "<div><br><br>";

       
         
       // to debug     
       // echo json_encode($theData);
          
$db->close();

?>

</body>
</html>