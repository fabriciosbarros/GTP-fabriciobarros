<!DOCTYPE html>


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
$email = $_SESSION["email"];
$query = "SELECT * FROM users WHERE users.user_email = '".$email."'";
$results = mysqli_query($con,$query);
$row = mysqli_fetch_array($results);
$user_type=$row['user_type'];

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
    if($user_type == 1){
        include (VIEW_PATH . "/private/navigation.php"); 
    }else{
        include (VIEW_PATH . "/private/navigation_adm.php"); 
    }
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
    <?php
if($user_type == 1){
    echo '<h1>Welcome to Ger\'s Garage</h4><br>
    <h2>YOUR PERSONAL INFORMATION:</h2><br>';
    include ("userinfo.php");
}else{
    echo '<h1>Welcome to Ger\'s Garage</h4><br>
    <h2>ADMINISTRATOR INFORMATION:</h2><br>';
    include ("userinfoadmin.php");
    echo '</div><!-- column -->

    <div class="col-sm-7"> 
    <hr>   
        
    <h3>SEARCH FOR BOOKINGS:</h3>';
    
    include ("admin_bookings.php");
    
    echo '</div>';
}
?>

<?php include (VIEW_PATH . "/foot.php"); ?>

</body>
</html>