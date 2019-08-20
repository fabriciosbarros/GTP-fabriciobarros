

<?php

include "config.php";
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
defined('MY_INC_CODE') or die('Access to this file is restricted');

echo '<form action="admin_bookings_main.php" method="POST" style="border: 0px;" >';
echo '<br><h3>Select starting date:</h3>';
echo '<input type="text" id="startdatepic" class="date readonly" autocomplete="off" name="startdatepic" required/>';

echo '<br><h3>Select ending date:</h3>';
echo '<input type="text" id="enddatepic" class="date readonly" autocomplete="off" name="enddatepic" required/>';

echo "<div align='right'><button type='submit' class='btn btn-primary save' style='font-size: medium;'>OK</button></div>";
echo "</div>";
               echo '</form>'; 

?>