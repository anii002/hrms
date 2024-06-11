<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>E-Pension</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <!--a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a-->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		
          <li class="dropdown user user-menu">
		   <?php
				$sqlclerk=mysql_query("select * from tbl_user where userid='".$_SESSION['SESS_MEMBER_ID']."'");
				$rwClerk=mysql_fetch_array($sqlclerk);
				$rwname=$rwClerk["fullname"];
			  ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../admin/uploads/<?php print $rwClerk["image"]; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">
			  <?php echo $rwname;?>
			 </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../admin/uploads/<?php print $rwClerk["image"]; ?>" class="img-circle" alt="User Image">

                <p>
                <?php echo $rwname;?>
                </p>
              </li>
       
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../index.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
			
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="../index.php" data-toggle="control-sidebar"><i class="fa fa-power-off text-yellow"></i> Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
