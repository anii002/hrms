<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">

  <header class="main-header" >
    <!-- Logo -->
    <a href="index.php" class="logo" style="background-color: black">
      <!-- mini logo for sidebar mini 50x50 pixels -->

      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="margin-left: -20px;"><img src="../../images/logo1.png" height="40px" width="40px">&nbsp;</img>TAMM</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #464141">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav" style="margin-left: -90px;">

          

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu" style="">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php 
				$query = mysql_query("select img from users where empid='".$_SESSION['empid']."'");
				$result = mysql_fetch_array($query);
				if($result['img']=="")
				{
			?>
              <img src="../../images/user8-128x128.jpg" class="user-image" >
			  <?php 
				}
				else
				{
					echo "<img src='".$result['img']."' class='user-image' >";
				}
				?>
              <span class="hidden-xs"><?php echo $_SESSION['admin_name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php 
                if($result['img']=="")
				{
			?>
              <img src="../../images/user8-128x128.jpg" class="user-image"  style="height:128px; width:128px; float: inherit;">
			  <?php 
				}
				else
				{
					echo "<img src='".$result['img']."' class='user-image'  style='height:128px; width:128px; float: inherit;'>";
				}
				?>
                <p>
                 <?php echo $_SESSION['admin_name']; ?>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer" style="background-color: #14232b">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
