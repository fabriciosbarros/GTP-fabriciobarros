

<?php

include "config.php";
// PRIVATE PAGE
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

$menuActive_newbooking= "active";
define("MY_INC_CODE", 888);
define("APPLICATION_PATH", "app");
define("VIEW_PATH", APPLICATION_PATH . "/view");
define("MODEL_PATH", APPLICATION_PATH . "/model");
include (APPLICATION_PATH . "/inc/config.inc.php");

$userid=$_POST['user_id'];
$servicetemp=$_POST['service'];
$timetemp=$_POST['optradio2'];
$dateslot=$_POST['date'];
$comment=$_POST['comment'];
$enter=$_POST['enter'];
$vehicle_id=$_POST['vehicle_id'];
$vehicle_license=$_POST['vehicle_license'];
$vehicle_engine=$_POST['vehicle_engine'];


if($servicetemp == "radio_btn_1"){
  $service=1;
}else if($servicetemp == "radio_btn_2"){
  $service=2;
}else if($servicetemp == "radio_btn_3"){
  $service=3;
}else if($servicetemp == "radio_btn_4"){
  $service=4;
}

if($timetemp == "radio_time_1"){
  $timeslot=1;
}else if($timetemp == "radio_time_2"){
  $timeslot=2;
}else if($timetemp == "radio_time_3"){
  $timeslot=3;
}else if($timetemp == "radio_time_4"){
  $timeslot=4;
}else if($timetemp == "radio_time_5"){
  $timeslot=5;
}else if($timetemp == "radio_time_6"){
  $timeslot=6;
}

$query = "INSERT INTO appointments (customer_id, ap_vehicle_id, ap_vehicle_license, ap_vehicle_engine, service_id, appointment_comment, appointment_status) VALUES ('$userid','$vehicle_id','$vehicle_license','$vehicle_engine','$service','$comment','1')";


//needs to be at the start of every page where you will use $_SESSION
session_start();

$login_cookie = $_SESSION['name'];
$login_email = $_SESSION['email'];

if (!isset($_SESSION["loggedIn"]) && !$_SESSION["loggedIn"] == 1)
{
    //throw you off the page if not logged in
    header("Location:index.php");
}

defined('MY_INC_CODE') or die('Access to this file is restricted');

try {
  require_once 'pdo_connect.php';
} catch (Exception $e) {
  $error = $e->getMessage();
}
if (isset($error)) {
  echo "<p>$error</p>";
}   



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Ger's Garage &dash; Registration Confirmation</title>
  <?php include (VIEW_PATH . "/head.php"); ?>

  
</head>
<body>
<?php
  if (isset($enter)) 
  
  {    
          if($userid == "" || $service == "" || $timeslot == "" || $dateslot == "")
          {
            echo 'User ID: '.$userid;
            echo 'Service: '.$service;
            echo 'Time Slot: '.$timeslot;
            echo 'Date Slot: '.$dateslot;

              //header('Location: errorfinal.php');
            }else{
                if ($con->query($query) === TRUE) {
                    $last_id = $con->insert_id;
                    $query2 = "INSERT INTO slots (slot_appointment_id, slot_date, slot_time_ref) VALUES ('$last_id','$dateslot','$timeslot')";
                    if ($con->query($query2) === TRUE){
                        $query3 = "INSERT INTO invoices (appointment_id, service_id) VALUES ('$last_id','$service')";
                        if($con->query($query3) === TRUE){
                          $last_id_invoice = $con->insert_id;
                          $query4 = "UPDATE appointments SET invoice_id =".$last_id_invoice." WHERE appointment_id =".$last_id; 
                          if($con->query($query4) === TRUE){
                            header('Location: success.php');
                          }else{
                              echo "Error: " . $query4 . "<br>" . $con->error;
                          }
                        }else {
                          echo "Error: " . $query3 . "<br>" . $con->error;
                      }
                      }else {
                        echo "Error: " . $query2 . "<br>" . $con->error;
                      }
                  }else {
                      echo "Error: " . $query . "<br>" . $con->error;
                  }
              }
              
    }
  
  ?>

<?php include (VIEW_PATH . "/foot.php"); ?>
  

</body>
</html>