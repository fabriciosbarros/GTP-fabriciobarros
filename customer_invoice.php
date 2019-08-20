<!DOCTYPE html>


<?php

include "config.php";

$menuActive_bookings = "active";
define("MY_INC_CODE", 888);
define("APPLICATION_PATH", "app");
define("VIEW_PATH", APPLICATION_PATH . "/view");
define("MODEL_PATH", APPLICATION_PATH . "/model");
include (APPLICATION_PATH . "/inc/config.inc.php");

// PRIVATE PAGE

//needs to be at the start of every page where you will use $_SESSION
session_start();

$login_cookie = $_SESSION['name'];
$email = $_SESSION["email"];
$ap_id=$_GET["ap_id"];

if (!isset($_SESSION["loggedIn"]) && !$_SESSION["loggedIn"] == 1)
{
    //throw you off the page if not logged in
    header("Location:index.php");
}


?>

<html lang="en">
    
<head>

<?php include (VIEW_PATH . "/head.php"); ?>

</head>

<body>
        
<!-- HEADER ------------------------------------------------>
        
<?php 
    echo "<header>";
    include (VIEW_PATH . "/private/navigation.php"); 
    echo "</header>";
    
    include (APPLICATION_PATH . "/inc/db.inc.php");
?>
        
<!-- MAIN CONTENT ------------------------------------------>
<br><br>
<main class="margin-top-6">    
<div class="container-fluid">
    
<!-- .................................................... -->      
<section id="review">
    
<!-- ROW 0 -->
<div class="row">
<div class="col-sm-12"> 
    
</div><!-- column -->  
</div><!-- row -->
<!-- END ROW 1 --> 

<!-- ROW 1 -->
<div class="card card-container-fluid py-2 px-2">
<div class="row">
<div class="col">

<h1>Welcome to Ger's Garage</h4><br>
<h2>YOUR PERSONAL INFORMATION:</h2><br>
    
<?php include ("userinfo.php"); ?>

</div><!-- column -->
</div>
<div class="row">
<div class="col">
<hr>
<!-- THE PAGE TITLE IS INSIDE THE PAGE-->

<?php 

 $query = "SELECT * FROM appointments 
 INNER JOIN services ON appointments.service_id=services.service_id 
 INNER JOIN slots ON appointments.appointment_id=slots.slot_appointment_id
 INNER JOIN vehicles ON appointments.ap_vehicle_id=vehicles.vehicle_id
 INNER JOIN vehicle_types ON vehicles.vehicle_type=vehicle_types.type_id
 INNER JOIN vehicle_makes ON vehicles.vehicle_make=vehicle_makes.vehicle_make_id
 INNER JOIN vehicle_engines ON appointments.ap_vehicle_engine=vehicle_engines.vehicle_engine_id   
 WHERE appointment_id='".$ap_id."'";
 
 $query2 = "SELECT * FROM appointments 
 INNER JOIN slots ON appointments.appointment_id=slots.slot_appointment_id 
 INNER JOIN services ON appointments.service_id=services.service_id 
 INNER JOIN invoices ON appointments.invoice_id=invoices.invoice_id 
 INNER JOIN parts_n_invoice ON invoices.invoice_id=parts_n_invoice.invoice_id 
 INNER JOIN parts_n_products ON parts_n_invoice.item_id=parts_n_products.item_id
 WHERE appointments.appointment_id='".$ap_id."'";
 $results = mysqli_query($con,$query);
 $row = mysqli_fetch_array($results);
 $results2 = mysqli_query($con,$query2);
 $row2 = mysqli_fetch_array($results2);


 $orig=$row['slot_date'];
 $datenew=date("d-m-y", strtotime($orig));
 $newserviceprice = number_format($row['service_price'],2);
 echo "<h1>SERVICE DETAIL</h1>
 <br>
 <h4>Appointment ID: ".$row['appointment_id']
 ."<h4>Appointment Date: ".$datenew;
 echo '<br><br>
 <h2>Vehicle booked in this invoice: </h2>
           <br>
           <table class="table table-bordered table-hover table-responsive" id="dbtable">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Make</th>
                    <th scope="col"> Model</th>
                    <th scope="col"> License</th>
                    <th scope="col"> Engine</th>
                </tr>
                </thead>
                <tbody>';

                echo "<tr><td>" 
                  .$row['type_name']
                  ."</td><td>"
                  .$row['vehicle_make_name']
                  ."</td><td>"
                  .$row['vehicle_model']
                  ."</td><td>"
                  .$row['ap_vehicle_license']
                  ."</td><td>"
                  .$row['engine_name']
                  ."</td></tr>";
           
           echo "</tbody></table>";
           echo "<br><br><b>Service Booked: </b>
 <br><br>";
      echo '<table class="table table-bordered table-hover table-responsive" id="dbtable">
      <thead class="thead-light">
      <tr>
          <th scope="col">Service</th>
          <th scope="col">Price</th>
      </tr>
      </thead>
      <tbody>';
      echo "<tr><td>" 
        .$row['service_name']
        ."</td><td>€"
        .$newserviceprice
        ."</td></tr>";
        echo "</tbody></table><br>";

 echo "<br>
<b>Additionals: </b><br><br>";
echo '<table class="table table-bordered table-hover table-responsive" id="dbtable">
<thead class="thead-light">
<tr>
   <th scope="col">Part or Product</th>
   <th scope="col">Unit price</th>
   <th scope="col">Quantity</th>
   <th scope="col">Total Price</th>
</tr>
</thead>
<tbody>';

$totalservice = 0;
if(mysqli_num_rows($results2) == ""){
  echo "<tr><td>There's no additional items for this booking</td><td></td><td></td><td></td></tr>";
}else{
while($row2 = mysqli_fetch_array($results2)){
  $service = number_format(($row2['item_price']*$row2['items_quantity']),2);
  $newprice = number_format($row2['item_price'],2);
  echo "<tr><td>" 
  .$row2['item_name']
  ."</td><td>€"
  .$newprice
  ."</td><td>"
  .$row2['items_quantity']
  ."</td><td>€"
  .$service
  ."</td></tr>";
  $totalservices=$totalservices+$service;
}
}
echo "</tbody></table><br>";
$totaldue=number_format(($totalservices+$row['service_price']),2);
echo '<hr><div><h1>Total: €'.$totaldue.'</h1>';
echo '<div><p align="right"><a href="list_bookings.php" class="btn btn-secondary cancel" style="font-size: medium;">CANCEL</a>&nbsp;&nbsp<button class="btn btn-primary save" href="#" onclick="window.print();return false;" style="font-size: medium;">PRINT&nbsp;&nbsp;<span class="glyphicon glyphicon-list-alt"></span></button></p></div>';

?>
<?php include (VIEW_PATH . "/foot.php"); ?>
</body>
</html>


    