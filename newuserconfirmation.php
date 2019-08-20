<!DOCTYPE html>
<?php

    define("MY_INC_CODE", 888);
    define("APPLICATION_PATH", "app");
    define("VIEW_PATH", APPLICATION_PATH . "/view");
    include (APPLICATION_PATH . "/inc/config.inc.php");
?>
<html lang="en">
    
<head>

    <title>Ger's Garage &dash; Registration confirmation</title>
    <?php include (VIEW_PATH . "/head.php"); ?>
    
	</head>
<!-- HEADER ------------------------------------------------>
        
<?php 
    echo "<header>";
    include (VIEW_PATH . "/public/banner.php");
    echo "</header>";
    
    include (APPLICATION_PATH . "/inc/db.inc.php");
?>
        
<!-- MAIN CONTENT ------------------------------------------>
<body>

  <!--MODAL TO SHOW ERROR AND REDIRECT-->
  

<form class="modal-content animate" action="login.php" >
<div class="modal-header">
<h4 class="modal-title">Thank you!</h4> 
</div>

<div class="modal-body">
        Thank you for signing up!<br>
        To make your appointment and book your service, please login with your e-mail and password.
</div>
<div class="modal-footer">
        <button class="btn btn-primary save">OK</button>
    </div>
    </form>


</body>
</html>
