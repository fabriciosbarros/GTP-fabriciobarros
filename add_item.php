

<?php

include "config.php";

define("MY_INC_CODE", 888);
define("APPLICATION_PATH", "app");
define("VIEW_PATH", APPLICATION_PATH . "/view");
include (APPLICATION_PATH . "/inc/config.inc.php");

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

if ($_SESSION['invoice'] == ""){
  echo "No invoice number defined";
}else{
  $invoice=$_SESSION['invoice'];
  $_SESSION['invoice']="";
}

$ap_id=$_POST['ap_id'];
$qty=$_POST['qty'];
$item=$_POST['cat4'];
$enter=$_POST['enter'];


$query = "INSERT INTO parts_n_invoice (invoice_id, item_id, items_quantity) VALUES ('$invoice','$item','$qty')";

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
  <title>Ger's Garage &dash; Add Parts to a Booking</title>
  <?php include (VIEW_PATH . "/head.php"); ?>

  
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

<?php include (VIEW_PATH . "/foot.php"); ?>
  

</body>
</html>