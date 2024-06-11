<header class="main-header">
	<!-- Logo -->
	<a href="index.php" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b></b></span>
		<!-- logo for regular state and mobile devices -->
		
		<!--link rel="shortcut icon" href="../resources/admin/images.jpg"--><span class="logo-lg" style="color:white ;">
		<!--img src="../resources/admin/Indian_Railway.png"/ height="30" width="50"-->
		Selection Calender</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
		</a>

		<div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../plugins/dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs">
				<?php echo $_SESSION['SESS_USER_FULLNAME'];?>
			 </span>
            </a>
            <ul class="dropdown-menu">
   
              <li class="user-header">
                <img src="../plugins/dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                <?php echo $_SESSION['SESS_USER_FULLNAME'];?>
                </p>
              </li>
       
             
              <li class="user-footer">
                <div class="pull-left">
                 <a href="../user/changeprofile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../index.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
			
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--li>
            <a href="../index.php" data-toggle="control-sidebar"><i class="fa fa-power-off text-yellow" ></i> Logout</a>
          </li-->
        </ul>
			
		</div>
	</nav>
</header>