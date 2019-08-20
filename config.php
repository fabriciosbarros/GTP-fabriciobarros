<?Php
/////// Update your database login details here /////
$dbhost_name = "localhost"; // Your host name 
$database = "gers_garage";       // Your database name
$username = "root";            // Your login userid 
$password = "root";            // Your password 
//////// End of database details of your server //////

// Create connection
$con = mysqli_connect($dbhost_name, $username, $password, $database);

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$dbhost_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?> 
