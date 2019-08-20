

<?php

include "config.php";
// PRIVATE PAGE


//needs to be at the start of every page where you will use $_SESSION
session_start();

$login_cookie = $_SESSION['name'];
$login_email = $_SESSION['email']; 
$user_id= $row['user_id'];

if (!isset($_SESSION["loggedIn"]) && !$_SESSION["loggedIn"] == 1)
{
    //throw you off the page if not logged in
    header("Location:index.php");
}
//Ref: https://www.tutorialspoint.com/sqlite/sqlite_php.htm
//Ref: http://php.net/manual/en/sqlite3stmt.execute.php
//Ref: http://www.sqlitetutorial.net/sqlite-php/


defined('MY_INC_CODE') or die('Access to this file is restricted');

echo'<br><h3>Your appointment was created successfully!</h3>';
echo "<button class='btn btn-secondary save' style='font-size: medium;' onclick=\"window.location.href = 'list_bookings.php';\">OK</button>";
       
$db->close();
?>
