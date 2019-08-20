<!DOCTYPE html>
<?php

    define("MY_INC_CODE", 888);
    define("APPLICATION_PATH", "app");
    define("VIEW_PATH", APPLICATION_PATH . "/view");
    include (APPLICATION_PATH . "/inc/config.inc.php");
?>

<html lang="en">
    
<head>

    <title>Ger's Garage &dash; Login</title>

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
<form class="modal-content animate" action="newuser.php" >
<div class="modal-header">
<h4 class="modal-title">User exists</h4> 
</div>

<div class="modal-body">
        You entered an e-mail that already exists in our database. Please, try again or <a href="login.php">click here</a> to log in.
</div>
<div class="modal-footer">
<button class="btn btn-primary save">OK</button>
    </div>
    </form>


<!-- FOOTER ------------------------------------------------>
<footer>
    <?php include (VIEW_PATH . "/public/footer.php"); ?>
</footer>
        
<!-- all content above this line -->    
<?php include (VIEW_PATH . "/foot.php"); ?>
        
</body>
</html>


    