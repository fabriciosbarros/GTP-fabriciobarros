<!DOCTYPE html>
<?php

    define("MY_INC_CODE", 888);
    define("APPLICATION_PATH", "app");
    define("VIEW_PATH", APPLICATION_PATH . "/view");
    include (APPLICATION_PATH . "/inc/config.inc.php");
?>

<html lang="en">
    
<head>

    <title>Ger's Garage &dash; Login Error</title>

<?php include (VIEW_PATH . "/head.php"); ?>
    
</head>

<body>
        
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
        <b>Login Error</b>
    </div>

    <div class="modal-body">
        You entered an invalid e-mail or password. Please try again.
</div>
        <div class="modal-footer">
            <button class="btn btn-primary save">OK</button></div>
    </div>
    </form>

</body>
</html>
