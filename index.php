<!DOCTYPE html>

<?php
    $menuActive_index = "active"; // CHANGE
    define("APPLICATION_PATH", "app");
    define("VIEW_PATH", APPLICATION_PATH . "/view");
?>

<html lang="en">
    
<head>
    
<?php include (VIEW_PATH . "/head.php"); ?>


    
<!-- needed for the header image -->
<style> 
html,
body,
header {
    height: 100%;
}
</style>
    
</head>

<body class="intro">
        
<!-- HEADER ------------------------------------------------>
        
<?php 
    
    echo '<header>';
    include (VIEW_PATH . "/public/navigation.php");
    include (VIEW_PATH . "/public/bossImage.php");  
?>
        
<!-- MAIN CONTENT ------------------------------------------>


<!-- .................................................... --> 

<!-- FOOTER ------------------------------------------------>

<footer class="footer">
    <?php include (VIEW_PATH . "/public/footer.php"); ?>
</footer>   
        
<!-- all content above this line -->    
<?php include (VIEW_PATH . "/foot.php"); ?>
        
</body>
</html>

