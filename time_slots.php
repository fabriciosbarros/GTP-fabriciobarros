

<?php

include "config.php";
// PRIVATE PAGE


//needs to be at the start of every page where you will use $_SESSION
session_start();

$login_cookie = $_SESSION['name'];
$login_email = $_SESSION['email']; 
$user_id= $row['user_id'];
$vehicle_id=$row['vehicle_id'];
$vehicle_license=$row['vehicle_license'];
$vehicle_engine=$row['vehicle_engine_id'];

if (!isset($_SESSION["loggedIn"]) && !$_SESSION["loggedIn"] == 1)
{
    //throw you off the page if not logged in
    header("Location:index.php");
}

defined('MY_INC_CODE') or die('Access to this file is restricted');


$radiotemp=$_POST['optradio'];
$date=$_POST['datep'];
$datenew=date("d-m-y", strtotime($date));

if($radiotemp == "radio_btn_1")
{
  $radio = "Annual Service";
}else if($radiotemp == "radio_btn_2"){
  $radio = "Major Service";
}else if($radiotemp == "radio_btn_3"){
  $radio = "Repair / Fault";
}else if($radiotemp == "radio_btn_4"){
  $radio = "Major Repair";
}else{
  $radio = "Invalid Service";
}


echo '<div>';
echo '<h4><b>Service you picked: </b><br>'.$radio.'</p>';
echo '<h4><b>Date: </b><br>'.$datenew.'</p>';
echo '<hr>';
echo '<h2>Step 3/3: Select a time slot for your service:';
echo '</div>';
echo '<br>';
echo '<form action="final_step.php" method="POST" style="border: 0px;" >';
echo '<input type="hidden" name="service" value ="'.$radiotemp.'" />';
echo '<input type="hidden" name="user_id" value ="'.$user_id.'" />';
echo '<input type="hidden" name="date" value ="'.$date.'" />';
echo '<input type="hidden" name="vehicle_id" value ="'.$vehicle_id.'" />';
echo '<input type="hidden" name="vehicle_license" value ="'.$vehicle_license.'" />';
echo '<input type="hidden" name="vehicle_engine" value ="'.$vehicle_engine.'" />';
//echo '<div>';
echo '<table class="table table-bordered table-hover table-sm table-responsive" id="dbtable">
                <thead class="thead-light">
                <tr>
                    <th scope="col" width="100px"><p align="center">Select</th>
                    <th scope="col" width="150px"><p align="center">Time Slot</th>
                </tr>
                </thead>
                <tbody>';

$query1 = "SELECT * FROM slots WHERE slot_date='".$date."' AND slot_time_ref='1'";
$query2 = "SELECT * FROM slots WHERE slot_date='".$date."' AND slot_time_ref='2'";
$query3 = "SELECT * FROM slots WHERE slot_date='".$date."' AND slot_time_ref='3'";
$query4 = "SELECT * FROM slots WHERE slot_date='".$date."' AND slot_time_ref='4'";
$query5 = "SELECT * FROM slots WHERE slot_date='".$date."' AND slot_time_ref='5'";
$query6 = "SELECT * FROM slots WHERE slot_date='".$date."' AND slot_time_ref='6'";

$results1 = mysqli_query($con,$query1);
$results2 = mysqli_query($con,$query2);
$results3 = mysqli_query($con,$query3);
$results4 = mysqli_query($con,$query4);
$results5 = mysqli_query($con,$query5);
$results6 = mysqli_query($con,$query6);

$rowCount1 = mysqli_num_rows($results1);
$rowCount2 = mysqli_num_rows($results2);
$rowCount3 = mysqli_num_rows($results3);
$rowCount4 = mysqli_num_rows($results4);
$rowCount5 = mysqli_num_rows($results5);
$rowCount6 = mysqli_num_rows($results6);

//CHECK IF THERE IS ALREADY 4 MAJOR SERVICES BOOKED FOR EACH TIME SLOT TO SHOW ONLY SLOTS AVAILABLE
if($radiotemp == 'radio_btn_4'){
  if(($rowCount5 >= 4 && $rowCount6 >= 4) || ($rowCount1 >= 4 && $rowCount2 >= 4 && $rowCount3 >= 4 && $rowCount4 >= 4)) {
    echo '<tr><td align="center">No time slots available</td><td align="center">Please choose <a href="new_booking_main.php">another date</a></td></tr>';
  }else{
  if($rowCount5 < 4 && $rowCount1 < 4 && $rowCount2 < 4){
    echo '<tr><td align="center"><div class ="radio2"><input type="radio" name="optradio2" value=radio_time_5 required></div></td><td align="center">9am - 1pm</td></tr>';
  }
  if($rowCount6 < 4 && $rowCount3 < 4 && $rowCount4 < 4){
    echo '<tr><td align="center"><div class ="radio2"><input type="radio" name="optradio2" value=radio_time_6 required></div></td><td align="center">2pm - 6pm</td></tr>';
  }else{
    echo '<tr><td align="center">No time slots available</td><td align="center">Please choose <a href="new_booking_main.php">another date</a></td></tr>';
  }
}
echo "</tbody></table><br>";
echo "<p class = 'details'>* <b>Major Repairs</b> uses <b>2 slot times</b> to book.</p>";

//CHECK IF THERE IS ALREADY 4 SERVICES/REPAIRS BOOKED FOR EACH TIME SLOT TO SHOW ONLY SLOTS AVAILABLE
}else{
  if(($rowCount1 >= 4 && $rowCount2 >= 4 && $rowCount3 >= 4 && $rowCount4 >= 4) || ($rowCount5 >= 4 && $rowCount6 >= 4)){
    echo '<tr><td align="center">No time slots available</td><td align="center">Please choose <a href="new_booking_main.php">another date</a></td></tr>';
  }else{
  if($rowCount1 < 4 && $rowCount5 < 4){
    echo '<tr><td align="center"><div class ="radio2"><input type="radio" name="optradio2" value=radio_time_1 required></div></td><td align="center">9am</td></tr>';
  }
  if($rowCount2 < 4 && $rowCount5 < 4){
    echo '<tr><td align="center"><div class ="radio2"><input type="radio" name="optradio2" value=radio_time_2></div></td><td align="center">11am</td></tr>';
  }
  if($rowCount3 < 4 && $rowCount6 < 4){
    echo '<tr><td align="center"><div class ="radio2"><input type="radio" name="optradio2" value=radio_time_3></div></td><td align="center">2pm</td></tr>';
  }
  if($rowCount4 < 4 && $rowCount6 < 4){
    echo '<tr><td align="center"div class ="radio2"><input type="radio" name="optradio2" value=radio_time_4></div></td><td align="center">4pm</td></tr>';
  }
}
echo "</tbody></table><br>";
}



echo "<br><p><b> Add a comment: </p></b>";
echo '<textarea id="comment" name="comment" rows="4" cols="50"></textarea>';
                

 echo "<div align='right'><a href='home.php' class='btn btn-secondary cancel' style='font-size: medium; height: 33.5px; width: 120px;'>CANCEL</a>&nbsp;&nbsp<button type='submit' class='btn btn-primary save' style='font-size: medium;' width='100px' value='enter' id='enter' name='enter'>CONFIRM</button></div>";
 echo '</form>';
       
$db->close();
?>
