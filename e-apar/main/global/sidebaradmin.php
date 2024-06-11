 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <!--<div class="pull-left image">
          <img src="../plugins/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>-->
        <!--<div class="pull-left image">-->
        <!--    <?php if(isset($_SESSION['profile_image'])) { ?>-->
        <!--    <img src="../../../../images/profile/<?php echo $_SESSION['profile_image']; ?>" class="img-circle" alt="User Image">-->
        <!--    <?php } else { ?>-->
        <!--    <img src="../plugins/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
        <!--    <?php } ?>-->
          
        <!--</div>-->
        <!--<div class="pull-left info">-->
        <!--  <p>Admin</p>-->
         
        <!--</div>-->
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <!--<li class="header" style="color:white;">MAIN NAVIGATION</li>-->
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!--span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span-->
          </a>
      
        </li>

        <li><a href="frmimport.php"><i class="fa fa-cubes"></i> <span>Import Employee List</span></a></li>
        <li><a href="frmsearchemp.php"><i class="fa fa-search"></i> <span>Search Employee Details</span></a></li>
        <li><a href="add_employee.php"><i class="fa fa-search"></i> <span>Register Employee</span></a></li>
        <li><a href="frmsample.php"><i class="fa fa-user-plus"></i> <span>Create Groups</span></a></li>
        <li><a href="frmaddstation.php"><i class="fa fa-plus"></i> <span>Add Station</span></a></li>
        <li><a href="show_group.php"><i class="fa fa-users"></i> <span>Show Employee Groups</span></a></li>
        <li><a href="frmadduser.php"><i class="fa fa-user-plus"></i> <span>User management</span></a></li>
        <li><a href="frmapproveemp.php"><i class="fa fa-user-plus"></i> <span>Approve Employees</span></a></li>
        <li><a ><i class="fa fa-print"></i> <span>Report</span>
		<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span></a>
		  <ul class="treeview-menu">
            <li class="active"><a href="frmemployeereport.php"><i class="fa fa-dot-circle-o"></i> Employee Report </a></li>
            <li><a href="frmindividualreport.php"><i class="fa fa-dot-circle-o"></i>Individual Employee Report</a></li>
          </ul>
		</li>
		<li><a href="frmshowhelpdesk.php"><i class="fa fa-institution"></i> <span>Helpdesk</span></a></li>
		<!--li><a href="frmuseraudit.php"><i class="fa fa-pencil-square-o"></i> <span>User Audit</span></a></li-->
		<li><a href="userlogs.php"><i class="fa fa-expeditedssl"></i> <span>User Logs</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
