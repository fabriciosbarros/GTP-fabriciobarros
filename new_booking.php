

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


defined('MY_INC_CODE') or die('Access to this file is restricted');

$query = "SELECT * FROM services";
$results = mysqli_query($con,$query);

echo '<br><h2><b>Step 1/3:</b> Choose a service</h2><br>';

if(!$db) 
   {
      echo $db->lastErrorMsg();
   } 
     else 
   {    
    echo '<form action="new_booking_main2.php" method="POST" style="border: solid white;">';
    echo '<div>';
    echo '<table class="table table-bordered table-hover table-responsive" id="dbtable">
                <thead class="thead-light">
                <tr>
                    <th scope="col" width="10%"><p align="center">Select</th>
                    <th scope="col" width="10%"><p align="center">Service</th>
                    <th scope="col" width="10%"><p align="center">Price</th>
                    <th scope="col" width="70%"><p align="center">Detail</p></th>
                </tr>
                </thead>
                <tbody>';

                while($row = mysqli_fetch_array($results)){
                    echo "<tr><td style='vertical-align: middle;'>
                    <div class='radio' align='center'>
                    <input type='radio' name='optradio' value=\"radio_btn_".$row['service_id']."\" id=\"radio_btn_".$row['service_id']."\" required onclick='ShowBooking()'>
                    </div>
                    </td><td align='center' style='vertical-align: middle;'><b><p>"
                      .$row['service_name']
                      ."</td><td align ='center' style='vertical-align: middle;'></h5><h1>€ "
                      .$row['service_price']
                      ."</h1></td><td style='vertical-align: middle;'><p>"
                      .$row['service_detail']
                      ."</td></tr>";
               }
               
               echo "</tbody></table><br>";

//BOOKING DIV WILL BE SHOWN AFTER USER CHOOSE A SERVICE

echo '<div class="hide" id="wrapper">
<div id="first">
<h2>Step 2/3: Pick a Date and confirm:</h2>
<p>*The garage doesn\'t open on Sundays so all Sundays are disabled on the calendar</p><br>
<h5>Date:</h5><input type="text" class="date readonly" id="datep" name="datep" autocomplete="off" required/>
</div>';
               echo "</div>";
               echo "</div>";
               echo "<div align='right'><a href='home.php' class='btn btn-secondary cancel' style='font-size: medium; height: 33.5px; width: 120px;'>CANCEL</a>&nbsp;&nbsp;<button type='submit' class='btn btn-primary save' style='font-size: medium;'>CONTINUE</button></div>";
               echo '</form>'; 
               
}
   
$db->close();
?>

