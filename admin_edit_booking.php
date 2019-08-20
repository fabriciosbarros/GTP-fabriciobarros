
<!DOCTYPE html>
<?php

include "config.php";
// PRIVATE PAGE


//needs to be at the start of every page where you will use $_SESSION
session_start();

$login_cookie = $_SESSION['name'];
$login_email = $_SESSION['email'];
$ap_id_booking = $_SESSION['ap_id_booking'];

if($ap_id_booking == ""){
    $ap_id=$_POST['ap_id'];
}else{
    $ap_id=$ap_id_booking;
    $_SESSION['ap_id_booking']="";
}


if (!isset($_SESSION["loggedIn"]) && !$_SESSION["loggedIn"] == 1)
{
    //throw you off the page if not logged in
    header("Location:index.php");
}

?>
<html lang="en">
    
<head>


</head>

<body>
    <?php

//MODAL FOR EDIT BOOKING

echo            
'<div id="modal1" class="modal">
  
  <form class="modal-content animate" action="change_status.php" method="POST">
  <div class="modal-header">
  <span class="close" data-dismiss="modal">&times;</span>
  <h4 class="modal-title">Change Booking Status</h4>
</div>

<div class="modal-body">
      <label for="name"><b>Change to: </b></label><br>';
          ///////// Getting the data from Mysql table for first list box//////////
    $quer2="SELECT DISTINCT status_name,status_id FROM appointments_statuses order by status_name"; 
    ///////////// End of query for first list box////////////

      /////////        Starting of first drop downlist /////////
echo "<select name='cat' id='cat' onchange='' required><option value=''>Select one</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['status_id']==@$cat){echo "<option selected value='$noticia2[status_id]'>$noticia2[status_name]</option>"."<BR>";}
else{echo  "<option value='$noticia2[status_id]'>$noticia2[status_name]</option>";}
}
echo "</select>";

//////////////////  This will end the first drop down list ///////////
echo '<input type="hidden" name="ap_id" value ="'.$ap_id.'"/>';
      echo '<div align="center"><br><a href="#" class="btn btn-secondary cancel" style="font-size: medium; height: 33.5px; width: 120px;" data-dismiss="modal">CANCEL</a>&nbsp;&nbsp<button type="submit" class="btn btn-primary save" style="font-size: medium;" value="enter" id="enter" name="enter">OK</button></div>
  
      </div>   
       </form>
            </div>';

//MODAL FOR ADD MECHANIC

echo '<div id="modal2" class="modal">
              
              <form class="modal-content animate" action="change_mechanic.php" method="POST">
              <div class="modal-header">
              <span class="close" data-dismiss="modal">&times;</span>
              <h4 class="modal-title">Assign Mechanic</h4>
            </div>
            
                <div class="container">
                  <label for="cat3"><b>Choose the mechanic: </b></label><br>';
                      ///////// Getting the data from Mysql table for first list box//////////
                $quer3="SELECT DISTINCT mechanic_first_name,mechanic_last_name,mechanic_id FROM mechanics order by mechanic_first_name"; 
                ///////////// End of query for first list box////////////
            
                  /////////        Starting of first drop downlist /////////
            echo "<select name='cat3' id='cat3' onchange='' required><option value=''>Select one</option>";
            foreach ($dbo->query($quer3) as $noticia3) {
            if($noticia3['mechanic_id']==@$cat3){echo "<option selected value='$noticia3[mechanic_id]'>$noticia3[mechanic_first_name]&nbsp;$noticia3[mechanic_last_name]</option>"."<BR>";}
            else{echo  "<option value='$noticia3[mechanic_id]'>$noticia3[mechanic_first_name]&nbsp;$noticia3[mechanic_last_name]</option>";}
            }
            echo "</select>";
            
            //////////////////  This will end the first drop down list ///////////
            echo '<input type="hidden" name="ap_id" value ="'.$ap_id.'" />';
            echo '<input type="hidden" name="invoice" value ="'.$invoice.'" />';
            echo '<div align="center"><br><a href="#" class="btn btn-secondary cancel" style="font-size: medium; height: 33.5px; width: 120px;" data-dismiss="modal">CANCEL</a>&nbsp;&nbsp<button type="submit" class="btn btn-primary save" style="font-size: medium;" value="enter" id="enter" name="enter">OK</button></div>
              
                  </div>   
                   </form>
                        </div>';


//MODAL FOR ADD ITEMS
echo '<div id="modal3" class="modal">
  
  <form class="modal-content animate" action="add_item.php" method="POST">
  <div class="modal-header">
  <span class="close" data-dismiss="modal">&times;</span>
  <h4 class="modal-title">Add Items</h4>
</div>

    <div class="container">
      <label for="cat4"><b>Choose item: </b></label><br>';
          ///////// Getting the data from Mysql table for first list box//////////
    $quer4="SELECT DISTINCT item_name,item_id,item_price FROM parts_n_products order by item_name"; 
    ///////////// End of query for first list box////////////

      /////////        Starting of first drop downlist /////////
echo "<select name='cat4' id='cat4' onchange='' required><option value=''>Select one</option>";
foreach ($dbo->query($quer4) as $noticia4) {
if($noticia4['item_id']==@$cat4){echo "<option selected value='$noticia4[item_id]'>$noticia4[item_name]&nbsp;-&nbsp;€$noticia4[item_price]</option>"."<BR>";}
else{echo  "<option value='$noticia4[item_id]'>$noticia4[item_name]&nbsp;-&nbsp;€$noticia4[item_price]</option>";}
}
echo "</select>";
echo "<br><label for='qty'><b>Quantity: </b></label><br><input type='number' onkeypress='testNumber2(event)' name='qty' min='1' required><br>";

//////////////////  This will end the first drop down list ///////////
echo '<input type="hidden" name="ap_id" value ="'.$ap_id.'" />';

      echo '<div align="center"><br><a href="#" class="btn btn-secondary cancel" style="font-size: medium; height: 33.5px; width: 120px;" data-dismiss="modal">CANCEL</a>&nbsp;&nbsp<button type="submit" class="btn btn-primary save" style="font-size: medium;" value="enter" id="enter" name="enter">OK</button></div>
  
      </div>   
       </form>
            </div>';

            


defined('MY_INC_CODE') or die('Access to this file is restricted');



$query2= "SELECT * FROM slots WHERE slot_appointment_id='$ap_id'";

$query = "SELECT * FROM appointments 
INNER JOIN users ON appointments.customer_id = users.user_id 
INNER JOIN slots ON appointments.appointment_id = slots.slot_appointment_id 
INNER JOIN slot_times ON slots.slot_time_ref = slot_times.slot_time_id
INNER JOIN appointments_statuses ON appointments.appointment_status = appointments_statuses.status_id 
INNER JOIN vehicles ON appointments.ap_vehicle_id = vehicles.vehicle_id 
INNER JOIN vehicle_makes ON vehicles.vehicle_make = vehicle_makes.vehicle_make_id 
INNER JOIN vehicle_engines ON appointments.ap_vehicle_engine = vehicle_engines.vehicle_engine_id 
INNER JOIN vehicle_types ON vehicles.vehicle_type = vehicle_types.type_id 
INNER JOIN services ON appointments.service_id = services.service_id WHERE appointment_id='$ap_id' ORDER BY slot_time";


if(!$db) 
   {
      echo $db->lastErrorMsg();
   } 
     else 
   { 
        $results = mysqli_query($con,$query);
        $rowcount=mysqli_num_rows($results);

       if ($rowcount < 1 )
       {
           echo "<br><br>The query has returned no data";
           echo "<div align='right'><button class='btn btn-primary save' 'style: height: 33.5px; width: 120px;' onclick='goBack()'>BACK</button></div>";
       }else{
        $totaldue= 0;
        $row = mysqli_fetch_array($results);
         
        echo '<br><div>';

        echo 
        "<div class='row-fluid'>
        <h2>CUSTOMER'S INVOICE</h2><br>
        <div class='col'>
        <b>Appointment ID: </b>".$row['appointment_id'].
        "<br><b>Appointment Status: </b>".$row['status_name'].'&nbsp;<a href="#"><span data-toggle="modal" data-target="#modal1">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"></span></span></a>';
        $orig=$row['slot_date'];
        $datenew=date("d-m-y", strtotime($orig));      
        echo "<br><b>Date: </b>".$datenew.
        "<br><b>Time: </b>".$row['slot_time']
        ."<br><b>Customer's Name: </b>".$row['user_first_name']."&nbsp".$row['user_last_name'].
        "<br>
        <b>e-mail / login: </b>".$row['user_email'].
        "<br>
        <b>Mobile: </b>".$row['user_mobile'].
        "<br><br>
        <b>VEHICLE INFORMATION: </b>
        <br><br>";
             echo '<table class="table table-bordered table-hover table-responsive" id="dbtable">
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
               echo "<br>
               <b>SERVICE BOOKED: </b>
               <br><br>";
               $newserviceprice = number_format($row['service_price'],2);
             echo '<table class="table table-bordered table-hover table-responsive" id="dbtable">
             <thead class="thead-light">
             <tr>
                 <th scope="col">Service</th>
                 <th scope="col">Price</th>
                 <th scope="col"> Mechanic</th>
             </tr>
             </thead>
             <tbody>';
             echo "<tr><td>" 
               .$row['service_name']
               ."</td><td>€"
               .$newserviceprice
               ."</td>";
               if($row['mechanic_id'] == ""){
                echo "<td><a href='#'><span data-toggle='modal' data-target='#modal2'>Add a mechanic</span></a></td></tr>";
               }else{
                   $query2 = "SELECT * FROM mechanics WHERE mechanic_id='".$row['mechanic_id']."'";
                   $results2 = mysqli_query($con,$query2);
                   $row2 = mysqli_fetch_array($results2);
                echo "<td>".$row2['mechanic_first_name']."&nbsp;".$row2['mechanic_last_name']."</td></tr>";
               }

               $query3 = "SELECT * FROM invoices WHERE appointment_id='".$ap_id."'";
               $results3 = mysqli_query($con,$query3);
               $row3 = mysqli_fetch_array($results3);
               $_SESSION['invoice'] = $row3['invoice_id'];

               $query4 = "SELECT * from invoices INNER JOIN parts_n_invoice ON invoices.invoice_id = parts_n_invoice.invoice_id INNER JOIN parts_n_products ON parts_n_invoice.item_id = parts_n_products.item_id WHERE invoices.invoice_id = '".$row3['invoice_id']."'";
               $results4 = mysqli_query($con,$query4);
               
               echo "</tbody></table>";
               echo "<br>
        <b>ADDITIONALS: </b><br><br>";
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
             
             if(mysqli_num_rows($results4) == ""){
                echo "<tr><td><a href='#'><span data-toggle='modal' data-target='#modal3'>Add an item&nbsp;&nbsp;<span class='glyphicon glyphicon-plus-sign'</span></a></td><td></td><td></td><td></td></tr>";
             }else{
              while($row4 = mysqli_fetch_array($results4)){
                $calc = number_format(($row4['item_price']*$row4['items_quantity']),2);
                $newprice = number_format($row4['item_price'],2);
                echo "<tr><td>" 
                .$row4['item_name']
                ."</td><td>€"
                .$newprice
                ."</td><td>"
                .$row4['items_quantity']
                ."</td><td>"
                .$calc
                ."</td></tr>";
                $totalservices=$totalservices+$calc;
              }
                echo "<td><a href='#'><span data-toggle='modal' data-target='#modal3'>Add an item&nbsp;&nbsp;<span class='glyphicon glyphicon-plus-sign'></span></span></a></td><td></td><td></td><td></td></tr>";
             }
             
               }
       }
       $totaldue=number_format(($totalservices+$row['service_price']),2);
       echo "</tbody></table><br>";
       echo '<hr><div class="row"><div class="col"><h1>
       Total due: €'.$totaldue.'</h1>
       <br><p class="details">*Payment is due to collection.</div></div>';
       
$db->close();
?>

    
</body>
