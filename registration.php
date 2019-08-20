<?php

include "config.php";

$v_type=$_POST['cat'];
$v_make=$_POST['subcat'];
$v_model=$_POST['subcat3'];
$v_engine=$_POST['v_engine'];
$license=$_POST['license'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$psw=$_POST['psw'];
$psw_repeat=$_POST['psw_repeat'];
$enter=$_POST['enter'];
$sql = "SELECT * FROM users WHERE user_email = '$email'";
$get_vehicle_id= "SELECT vehicle_id FROM vehicles WHERE vehicle_model = '$v_model'";


try {
    require_once 'pdo_connect.php';
} catch (Exception $e) {
    $error = $e->getMessage();
}
 if (isset($error)) {
    echo "<p>$error</p>";
}   


//$people = array("Peter", "Joe", "Glenn", "Cleveland");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ger's Garage &dash; Registration Confirmation</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    
</head>
<body>
<?php
    if (isset($enter)) 
    
    {    
      $verify = $db->query($sql);
      
        if ($verify->fetchColumn()==0)
        {
            if($psw!=$psw_repeat)
            {
                header('Location: pswnotmatch.php');
                }else{
                    $vehicle_result = mysqli_query($con,$get_vehicle_id);
                    $row = mysqli_fetch_array($vehicle_result);
                    $vehicle_id=$row['vehicle_id'];
                    mysqli_query($con,"INSERT INTO users (user_type, user_first_name, user_last_name, user_mobile, vehicle_id, vehicle_license, vehicle_engine_id, user_email, user_password) VALUES ('1','$first_name','$last_name','$mobile', '$vehicle_id','$license', '$v_engine','$email', '$psw')");
            header('Location: newuserconfirmation.php');
                }
                
        }else{
            header('Location: userexists.php');
        }
        }else{
            header('Location: error.php');
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
