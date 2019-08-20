
<!DOCTYPE html>
<html>
<head>
    <title>Ger's Garage</title>
    <!-- Bootstrap CDN -->
</head>
<body>
<?php

include "config.php";


// PRIVATE PAGE


//needs to be at the start of every page where you will use $_SESSION
session_start();

$login_cookie = $_SESSION['name'];
$login_email = $_SESSION['email'];

if (!isset($_SESSION["loggedIn"]) && !$_SESSION["loggedIn"] == 1)
{
    //throw you off the page if not logged in
    header("Location:index.php");
}

if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
} else {
  $pageno = 1;
}

$no_of_records_per_page = 5;
$offset = ($pageno-1) * $no_of_records_per_page; 


$total_pages_sql = "SELECT COUNT(*) FROM appointments 
INNER JOIN users ON appointments.customer_id=users.user_id 
INNER JOIN slots ON appointments.appointment_id=slots.slot_appointment_id 
INNER JOIN slot_times ON slots.slot_time_ref=slot_times.slot_time_id
INNER JOIN services ON appointments.service_id=services.service_id
INNER JOIN invoices ON appointments.invoice_id=invoices.invoice_id 
WHERE users.user_email = '".$login_email."'";

$result = mysqli_query($con,$total_pages_sql);
$numrows = mysqli_num_rows($result);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

if($total_rows == 0){
    echo '<h4>You have no bookings at the moment.';
}else{

$sql ="SELECT * FROM appointments 
INNER JOIN users ON appointments.customer_id=users.user_id 
INNER JOIN slots ON appointments.appointment_id=slots.slot_appointment_id 
INNER JOIN slot_times ON slots.slot_time_ref=slot_times.slot_time_id
INNER JOIN services ON appointments.service_id=services.service_id
INNER JOIN invoices ON appointments.invoice_id=invoices.invoice_id 
WHERE users.user_email = '".$login_email."' ORDER BY slots.slot_date DESC LIMIT ".$offset.",".$no_of_records_per_page;
$res_data = mysqli_query($con,$sql);
  echo '<table class="table table-bordered table-hover table-responsive" id="dbtable">
  <thead class="thead-light">
  <tr>
                    <th scope="col"><p align="center">Date</th>
                    <th scope="col"><p align="center">Time</th>
                    <th scope="col"><p align="center">Service</th>
                    <th scope="col"><p align="center">Appointment ID</p></th>
                    <th scope="col"><p align="center">Details</p></th>
                </tr>
                </thead>
                <tbody>';

                while($row = mysqli_fetch_array($res_data)){
                  $orig=$row['slot_date'];
                  $datenew=date("d-m-y", strtotime($orig));
                  echo "<tr><td>"
                      .$datenew
                      ."</td><td>"
                      .$row['slot_time']
                      ."</td><td>"
                      .$row['service_name']
                      ."</td><td>"
                      .$row['appointment_id']
                      ."</td><td  align='center'>
                      <a href='customer_invoice.php?ap_id=".$row['appointment_id']."'><span class='glyphicon glyphicon-list-alt'></span></a></td></tr>";
}

               echo "</tbody></table><br>";
               echo "<p class = 'details'>* <b>Major Repairs</b> uses <b>2 slot times</b> to book.</p>";
              
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
</body>
</html>