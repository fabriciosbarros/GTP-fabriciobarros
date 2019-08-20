<!DOCTYPE html>
<?php

include "config.php";

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
<!-- HEADER ------------------------------------------------>
        
<?php 
    echo "<header>";
    include (VIEW_PATH . "/public/banner.php");
    echo "</header>";
    
    include (APPLICATION_PATH . "/inc/db.inc.php");
?>
        
<!-- MAIN CONTENT ------------------------------------------>
<main class="margin-top-6 horizontal-center">    
<div class="container"> 
<br>
<div class="card card-container mx-auto">
    

    
    <form class="form-signin" action="login_next.php" method="POST" style="border: 0px;">
        <div align="center"><h2>Login to Ger's Garage</h2><br>
        <input type="text" id="username" name="username" class="form-control" placeholder="Enter your e-mail" required autofocus><br>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required><br>
        <!--
            <div id="remember" class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        -->
        <br>
        <div align="center"><button class="btn btn-primary save" type="submit" value="enter" id="enter" name="enter">SIGN IN</button></div>

    </form>
<!--
    <button id="" onclick="document.getElementById('id01').style.display='block'" class="btn btn-lg btn-warning btn-block btn-signin">SIGN UP</button><br>
-->
    
    <div align="center"><a href="newuser.php" class="forgot-password">New user</a></div>

    
</div><!-- /card-container -->
</div> <!-- END container-->    
</main>


<!-- all content above this line -->    
<?php include (VIEW_PATH . "/foot.php"); ?>
        
</body>

</html>

    