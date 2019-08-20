<!DOCTYPE html>

<?php

include "config.php";

session_start();

$login_cookie = $_SESSION['name'];
$email = $_SESSION["email"];

$query = "SELECT * FROM users WHERE user_email='".$email."'";
$results = mysqli_query($con,$query);
$row = mysqli_fetch_array($results);
$user_type = $row['user_type'];

//-- HEADER ------------------------------------------------>

if (!isset($_SESSION["loggedIn"]) && !$_SESSION["loggedIn"] == 1)
{
    $menuActive_livetraffic = "active";
    define("MY_INC_CODE", 888);
    define("APPLICATION_PATH", "app");
    define("VIEW_PATH", APPLICATION_PATH . "/view");
    include (APPLICATION_PATH . "/inc/config.inc.php");

    echo "<header>"; 
    include (VIEW_PATH . "/public/navigation.php"); 
    echo "</header>";
    
}else{
    $menuActive_livetraffic = "active";
    define("MY_INC_CODE", 888);
    define("APPLICATION_PATH", "app");
    define("VIEW_PATH", APPLICATION_PATH . "/view");
    define("MODEL_PATH", APPLICATION_PATH . "/model");
    include (APPLICATION_PATH . "/inc/config.inc.php");

    if ($user_type == 2){
        echo "<header>";
        include (VIEW_PATH . "/private/navigation_adm.php");
        echo "</header>";
        
    }else{
        echo "<header>";
        include (VIEW_PATH . "/private/navigation.php");   
        echo "</header>";
        }
    }
        
    ?>

<html lang="en">
    
<head>
    
<?php include (VIEW_PATH . "/head.php"); ?>
    
</head>

<body onload="getLocation()">
        
<!-- HEADER ------------------------------------------------>


        
<!-- MAIN CONTENT ------------------------------------------>
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
<div class="row">
<div class="col">

<h1>Welcome to Ger's Garage</h1><br>
    
<h2>Live Traffic</h2>
<div class='row-fluid'>
      <div style="width:100%; height: 445px;" id="map"></div>
</div>   
    
</section>
    
<!-- .................................................... -->      

      
         
                      
            

<!-- .................................................... -->

</div> <!-- END container--> 

<!-- FOOTER ------------------------------------------------>
<footer>
    <?php include (VIEW_PATH . "/public/footer.php"); ?>
</footer>

   
</main>
        
<!-- all content above this line -->    
<?php include (VIEW_PATH . "/foot.php"); ?>
</body>
</html>


    








