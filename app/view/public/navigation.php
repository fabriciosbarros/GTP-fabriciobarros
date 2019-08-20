<!-- PUBLIC MENU -->
<!-- this goes in the header section --> 

    <!-- MENU -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary fixed-top">

      <a class="navbar-brand" href="index.php">
        <img src="img/Logo.jpg" alt="Ger Logo" style="width:80px;">
      </a>
        
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
        
      <!-- wrapper for collapsing nav bar -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
          
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php echo "$menuActive_index"; ?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo "$menuActive_livetraffic"; ?>" href="livetraffic.php">Live traffic</a>
        </li>
      </ul> 
        
      <ul class="nav nav-button ml-auto">
        <li><button class="btn btn-warning" type="button" style="font-size: medium;" onclick="location.href='login.php'">Log in <i class="fa fa-address-book ml-2"></i></button></li>

      </ul>
          
      </div><!-- END: menu collapse wrapper-->
        
    </nav>           
        
<!-- the end of header is in the main html file -->
