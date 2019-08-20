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

$query = "SELECT * FROM users WHERE user_email = '$login_email'";
$results = mysqli_query($con,$query);


if(!$db) 
   {
      echo $db->lastErrorMsg();
   } 
     else 
   {    
       //if ( $results->numColumns() < 1 )
       //{
       //    echo "User not found";
       //}
       //else
       //{
           //$theData = array();
           $row = mysqli_fetch_array($results);
         
           echo '<div class>';

           echo 
           "<div class='row-fluid'>
           <div class='col'>
           <b>ID: </b>".$row['user_id'].
           "<br><b>Name: </b>".$row['user_first_name']."&nbsp".$row['user_last_name'].
           "<br>
           <b>e-mail / login: </b>".$row['user_email'].
           "<br>
           <b>Mobile: </b>".$row['user_mobile'].
           "<br><br>
           <h2>YOUR VEHICLE INFORMATION: </h2>
           <br>";
       //}
    
           $vehicle_id = $row['vehicle_id'];
           $query2 = "SELECT * FROM vehicles WHERE vehicle_id = '$vehicle_id'";
           $results2 = mysqli_query($con,$query2);
                $row2 = mysqli_fetch_array($results2);

                $type_id = $row2['vehicle_type'];
                $query3 = "SELECT type_name FROM vehicle_types WHERE type_id = '$type_id'";
                $results3 = mysqli_query($con,$query3);
                $row3 = mysqli_fetch_array($results3);

                $make_id = $row2['vehicle_make'];
                $query4 = "SELECT vehicle_make_name FROM vehicle_makes WHERE vehicle_make_id = '$make_id'";
                $results4 = mysqli_query($con,$query4);
                $row4 = mysqli_fetch_array($results4);

                $engine_id = $row['vehicle_engine_id'];
                $query5 = "SELECT engine_name FROM vehicle_engines WHERE vehicle_engine_id = '$engine_id'";
                $results5 = mysqli_query($con,$query5);
                $row5 = mysqli_fetch_array($results5);

                
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
                  .$row3['type_name']
                  ."</td><td>"
                  .$row4['vehicle_make_name']
                  ."</td><td>"
                  .$row2['vehicle_model']
                  ."</td><td>"
                  .$row['vehicle_license']
                  ."</td><td>"
                  .$row5['engine_name']
                  ."</td></tr>";
           //}

           $user_id = $row['user_id'];
           
           echo "</tbody></table>";
           echo "</div>";
    }
       
$db->close();