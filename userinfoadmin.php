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

           echo 
           "<div class='row-fluid' align='left'>
           <div class='col'>
           <b>ID: </b>".$row['user_id'].
           "<br><b>Name: </b>".$row['user_first_name']."&nbsp".$row['user_last_name'].
           "<br>
           <b>e-mail / login: </b>".$row['user_email'].
           "<br>
           <b>Mobile: </b>".$row['user_mobile'].
           "<br>";

           $user_id = $row['user_id'];
           
           echo "</tbody></table>";
           echo "</div>";
    }
       
$db->close();