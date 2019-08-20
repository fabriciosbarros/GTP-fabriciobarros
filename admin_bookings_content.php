
<!DOCTYPE html>
<html>
<head>
    <title>Ger's Garage</title>
    <?php include (VIEW_PATH . "/head.php"); ?>
</head>
<body>
<?php

include "config.php";

$menuActive_home = "active";
define("MY_INC_CODE", 888);
define("APPLICATION_PATH", "app");
define("VIEW_PATH", APPLICATION_PATH . "/view");
define("MODEL_PATH", APPLICATION_PATH . "/model");
include (APPLICATION_PATH . "/inc/config.inc.php");

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


echo "<header>";
include (VIEW_PATH . "/private/navigation_adm.php"); 
echo "</header>";


if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
  } else {
    $pageno = 1;
  }

$no_of_records_per_page = 5;
$offset = ($pageno-1) * $no_of_records_per_page; 

  $total_pages_sql = "SELECT COUNT(*) FROM slots 
  INNER JOIN slot_times ON slots.slot_time_ref = slot_times.slot_time_id 
  INNER JOIN appointments on slots.slot_appointment_id = appointments.appointment_id 
  INNER JOIN services ON appointments.service_id = services.service_id 
  INNER JOIN users ON appointments.customer_id = users.user_id 
  INNER JOIN vehicles ON appointments.ap_vehicle_id = vehicles.vehicle_id 
  INNER JOIN vehicle_makes ON vehicles.vehicle_make = vehicle_makes.vehicle_make_id 
  WHERE slot_date BETWEEN '$startdate' AND '$enddate'";

$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);


if($total_rows == 0){
    echo '<h4>You have no bookings for the dates chosen.';
    echo "<div align='right'><button class='btn btn-primary save' onclick=\"window.location.href = 'home.php';\"  style=\"font-size: medium; height: 33.5px; width: 120px;\">BACK</button></div>";
}else{

$sql ="SELECT * FROM slots 
INNER JOIN slot_times ON slots.slot_time_ref = slot_times.slot_time_id 
INNER JOIN appointments ON slots.slot_appointment_id = appointments.appointment_id
INNER JOIN services ON appointments.service_id = services.service_id 
INNER JOIN users ON appointments.customer_id = users.user_id 
INNER JOIN vehicles ON appointments.ap_vehicle_id = vehicles.vehicle_id 
INNER JOIN vehicle_makes ON vehicles.vehicle_make = vehicle_makes.vehicle_make_id 
WHERE slot_date BETWEEN '$startdate' AND '$enddate' LIMIT ".$offset.",".$no_of_records_per_page;

$res_data = mysqli_query($con,$sql);

$sd=date("d-m-y", strtotime($startdate));
$ed=date("d-m-y", strtotime($enddate));
   echo '<br><br><h2>Showing bookings from <b>'.$sd.'</b> to <b>'.$ed.'</b>:</h2><br>';
   echo '<div class="row><p align="right"><a href="home.php" class="btn btn-secondary cancel" style="font-size: medium; height: 33.5px; width: 120px;">CANCEL</a>&nbsp;&nbsp<button class="btn btn-primary save" onclick="window.open(\'admin_print_bookings.php\')" style="font-size: medium;">PRINT&nbsp;&nbsp;<span class="glyphicon glyphicon-list-alt"></span></button></p></div>';
           echo '<table class="table table-bordered table-hover table-responsive" id="dbtable">
           <thead class="thead-light">
           <tr>
                    <th scope="col" width="10%"><p align="center">Date</th>
                    <th scope="col" width="10%"><p align="center">Slot Time</th>
                    <th scope="col" width="10%"><p align="center">Appointment ID</th>
                    <th scope="col" width="20%"><p align="center">Customer Name</th>
                    <th scope="col" width="10%"><p align="center">Car Model</th>
                    <th scope="col" width="20%"><p align="center">Service</th>
                    <th scope="col" width="20%"><p align="center">Action </th>
                </tr>
                </thead>
                <tbody>';
           
            while($row = mysqli_fetch_array($res_data))
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
                  .'</td>
                  <td align="center" style="vertical-align: middle;"><form action="admin_edit_main.php"  method="POST" style="border: 0px;">
                  <input type="hidden" name="ap_id" value ="'.$row["appointment_id"].'" />
                  <button type="submit" class="btn btn-primary save" value="enter" id="enter" name="enter">EDIT &nbsp<span class="glyphicon glyphicon-edit"></span></button></div>
                  </td></tr></form>';
                  
           }
           
           echo "</tbody></table>";
           
          
$db->close();

echo '<ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class='; if($pageno <= 1){ echo '"disabled"'; }; echo '>
            <a href="'; if($pageno <= 1){ echo '#'; } else { echo '?pageno='.($pageno - 1); }; echo '">Prev</a>
        </li>
        <li class='; if($pageno >= $total_pages){ echo '"disabled"'; } echo '>
            <a href="'; if($pageno >= $total_pages){ echo '#'; } else { echo '?pageno='.($pageno + 1); }; echo '">Next</a>
        </li>
        <li><a href="?pageno='; echo $total_pages; echo '">Last</a></li>
    </ul>';
        }
?>
<?php include (VIEW_PATH . "/foot.php"); ?>
</body>
</html>