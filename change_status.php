

<?php

include "config.php";
// PRIVATE PAGE
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

$menuActive_livetraffic = "active";
define("MY_INC_CODE", 888);
define("APPLICATION_PATH", "app");
define("VIEW_PATH", APPLICATION_PATH . "/view");
define("MODEL_PATH", APPLICATION_PATH . "/model");
include (APPLICATION_PATH . "/inc/config.inc.php");

$ap_id=$_POST['ap_id'];
$newstatus=$_POST['cat'];
$enter=$_POST['enter'];


$query = "UPDATE appointments SET appointment_status='$newstatus' WHERE appointment_id='$ap_id'";

defined('MY_INC_CODE') or die('Access to this file is restricted');

try {
  require_once 'pdo_connect.php';
} catch (Exception $e) {
  $error = $e->getMessage();
}
if (isset($error)) {
  echo "<p>$error</p>";
}   



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Ger's Garage &dash; Booking Status Modification</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  
</head>
<body>
<?php
  if (isset($enter)) 
  
  {    
          if ($con->query($query) === TRUE) {
            $_SESSION["ap_id_booking"]=$ap_id;
                header('Location: admin_edit_main.php');
              }else {
                echo "Error: " . $query2 . "<br>" . $con->error;
            }
          } else {
              echo "Error: " . $query . "<br>" . $con->error;
          }
  
  ?>

<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="../js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="../js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="../js/jquery.flexslider-min.js"></script>
<!-- Magnific Popup -->
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/magnific-popup-options.js"></script>
<!-- Main -->
<script src="../js/main.js"></script>
<script src="..js/alert.js"></script>
  

</body>
</html>