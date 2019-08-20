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

<br>
<!--NEW USER FORM-->
            
<form action="registration.php" method="POST" style="border: 0px;">
  <div class="container">
    <h1>New user Registration</h1>

    <hr>
    <h3>VEHICLE INFORMATION</h3><br>
    <label for="v_type"><b>Select your vehicle Type</b></label><br>
    <?php

///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT DISTINCT type_name,type_id FROM vehicle_types order by type_name"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if category is selected else we will display all the subcategory///// 
$cat=$_GET['cat']; // This line is added to take care if your global variable is off
if(isset($cat) and strlen($cat) > 0){
$quer="SELECT DISTINCT vehicle_make_name,vehicle_make_id FROM vehicle_makes where vehicle_type=$cat order by vehicle_make_name"; 
}else{$quer="SELECT DISTINCT vehicle_make_name,vehicle_make_id FROM vehicle_makes order by vehicle_make_name"; } 
////////// end of query for second subcategory drop down list box ///////////////////////////


/////// for Third drop down list we will check if sub category is selected else we will display all the subcategory3///// 
$cat3=$_GET['cat3']; // This line is added to take care if your global variable is off
if(isset($cat3) and strlen($cat3) > 0){
$quer3="SELECT DISTINCT vehicle_model FROM vehicles where vehicle_make=$cat3 order by vehicle_model"; 
}else{$quer3="SELECT DISTINCT vehicle_model FROM vehicles order by vehicle_model"; } 
////////// end of query for third subcategory drop down list box ///////////////////////////

///////// Getting the data from Mysql table for fourth list box//////////
$quer4="SELECT DISTINCT vehicle_engine_id, engine_name FROM vehicle_engines order by engine_name"; 
///////////// End of query for fourth list box////////////

//////////        Starting of first drop downlist /////////
echo "<select name='cat' id='cat' onchange='reload(this.form)' required><option value=''>Select one</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['type_id']==@$cat){echo "<option selected value='$noticia2[type_id]'>$noticia2[type_name]</option>"."<BR>";}
else{echo  "<option value='$noticia2[type_id]'>$noticia2[type_name]</option>";}
}
echo "</select>";
//////////////////  This will end the first drop down list ///////////

//////////        Starting of second drop downlist /////////
echo "<br><br><label for='v_make'><b>Select your vehicle Make</b></label><br>";
echo "<select name='subcat' id='subcat' onchange='reload3(this.form)' required><option value=''>Select one</option>";
foreach ($dbo->query($quer) as $noticia) {
if($noticia['vehicle_make_id']==@$cat3){echo "<option selected value='$noticia[vehicle_make_id]'>$noticia[vehicle_make_name]</option>"."<BR>";}
else{echo  "<option value='$noticia[vehicle_make_id]'>$noticia[vehicle_make_name]</option>";}
}
echo "</select>";
//////////////////  This will end the second drop down list ///////////


//////////        Starting of third drop downlist /////////
echo "<br><br><label for='v_model'><b>Select your vehicle Model</b></label><br>";
echo "<select name='subcat3' id='subcat3' required><option value=''>Select one</option>";
foreach ($dbo->query($quer3) as $noticia) {
echo  "<option value='$noticia[vehicle_model]'>$noticia[vehicle_model]</option>";
}
echo "</select>";
//////////////////  This will end the third drop down list ///////////

//////////        Starting of fourth drop downlist /////////
echo "<br><br><label for='v_engine'><b>Select your vehicle Engine</b></label><br>";
echo "<select name='v_engine' id='v_engine' required><option value=''>Select one</option>";
foreach ($dbo->query($quer4) as $noticia4) {
if($noticia4['vehicle_engine_id']==@$v_engine){echo "<option selected value='$noticia4[vehicle_engine_id]'>$noticia4[engine_name]</option>"."<BR>";}
else{echo  "<option value='$noticia4[vehicle_engine_id]'>$noticia4[engine_name]</option>";}
}
echo "</select>";
//////////////////  This will end the fourth drop down list ///////////

//echo "<input type=submit value='Submit the form data'></form>";
echo "<br><br>";
?>
<label for="license"><b>Vehicle License</b></label>
    <input type="text" placeholder="Enter your vehicle license" name="license" id="license" required>
    <br><br>
    <hr>
<h3>USER INFORMATION</h3><br>
    <label for="first_name"><b>First Name</b></label>
    <input type="text" placeholder="Enter your First Name" name="first_name" id="first_name" required>

    <label for="last_name"><b>Last Name</b></label>
    <input type="text" placeholder="Enter your Last Name" name="last_name" id="last_name" required>

    <label for="mobile"><b>Mobile</b></label><br>

    <input type="text" class="form-control"  onkeypress="testNumber(event)" placeholder="Format 0831110000" name="mobile" id="mobile" required>

<br><br>

    <label for="email"><b>E-mail</b></label>
    <input type="text" placeholder="Enter your e-mail" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw_repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw_repeat" id="psw_repeat" required>
    <hr>
    <button type="submit" class="btn btn-primary" value="enter" id="enter" name="enter" style="font-size: medium;">REGISTER</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a></p>
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