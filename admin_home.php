<!DOCTYPE html>

<?php

// PRIVATE PAGE

//needs to be at the start of every page where you will use $_SESSION
session_start();

$login_cookie = $_SESSION['name'];

if (!isset($_SESSION["loggedIn"]) && !$_SESSION["loggedIn"] == 1)
{
    //throw you off the page if not logged in
    header("Location:index.php");
}

$menuActive_livetraffic = "active";
define("MY_INC_CODE", 888);
define("APPLICATION_PATH", "app");
define("VIEW_PATH", APPLICATION_PATH . "/view");
define("MODEL_PATH", APPLICATION_PATH . "/model");
include (APPLICATION_PATH . "/inc/config.inc.php");

?>

<html lang="en">
    
<head>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

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

<h3>Admin Information</h3>
    
<?php include ("userinfoadmin.php"); ?>


</div><!-- column -->

<div class="col-sm-7"> 
<hr>   
    
<h3>Upcoming bookings</h3>

<?php include ("admin_bookings.php"); ?>


<!-- AJAX -->
<!-- END AJAX -->
<!-- column -->  
</div><!-- row -->
<!-- END ROW 1 -->      
                      
            
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    
    <script
			  src="http://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>

              <script
			  src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"
			  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
			  crossorigin="anonymous"></script>


<script src="js/main.js"></script>
        
</body>
</html>


    