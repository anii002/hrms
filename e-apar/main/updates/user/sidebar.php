 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
		   <?php
				$sqlclerk=mysql_query("select * from tbl_user where userid='".$_SESSION['SESS_MEMBER_ID']."'");
				$rwClerk=mysql_fetch_array($sqlclerk);
				$rwname=$rwClerk["fullname"];
			  ?>
          <img src="../admin/uploads/<?php print $rwClerk["image"]; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php print $rwClerk["fullname"]; ?></p>
         
        </div>
      </div>
      <!-- search form -->
      <!--form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header" style="color:white;">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
      
        </li>

        <li><a href="registration.php"><i class="fa fa-gear"></i> <span>Employee Registration</span></a></li>
        <li><a href="userlist.php"><i class="fa fa-th-list"></i> <span>Registered Employee List</span></a></li>
        <!--li><a href="../index.php"><i class="fa fa-circle-o text-yellow"></i> <span>Logout</span></a></li-->
        <!--li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
