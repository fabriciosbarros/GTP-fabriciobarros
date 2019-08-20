<!DOCTYPE html>

<?php

$menuActive_home = "active";
define("MY_INC_CODE", 888);
define("APPLICATION_PATH", "app");
define("VIEW_PATH", APPLICATION_PATH . "/view");
define("MODEL_PATH", APPLICATION_PATH . "/model");
include (APPLICATION_PATH . "/inc/config.inc.php");

// PRIVATE PAGE

//needs to be at the start of every page where you will use $_SESSION
session_start();
header("Cache-Control: nmax-age=600");

$login_cookie = $_SESSION['name'];
if($_POST['startdatepic'] != "" && $_POST['enddatepic'] != "" ){
    $_SESSION['startdate']=$_POST['startdatepic'];
    $_SESSION['enddate']=$_POST['enddatepic'];
}

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
    include (VIEW_PATH . "/private/navigation_adm.php"); 
    echo "</header>";
    
    include (APPLICATION_PATH . "/inc/db.inc.php");
?>
        
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

<h1>Welcome to Ger's Garage</h4><br>

    
<?php include ("admin_bookings_content.php"); ?>


</div><!-- column -->  
            
</section>
<!-- .................................................... -->

</div> <!-- END container-->    
</main>

<!-- FOOTER ------------------------------------------------>
<footer>
    <?php include (VIEW_PATH . "/private/footer.php"); ?>
</footer>
        
<!-- all content above this line -->    
<?php include (VIEW_PATH . "/foot.php"); ?>
        
</body>
</html>


    