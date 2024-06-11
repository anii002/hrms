<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if(isset($_SESSION['profile_image'])) { ?>
                <img src="../../../../images/profile/<?php echo $_SESSION['profile_image']; ?>" class="img-circle" alt="User Image">
                <?php } else { ?>
                <img src="../resources/admin/User_Circle.png" class="img-circle" alt="User Image">
                <?php } ?>
            </div>
            <div class="pull-left info">
                <p>
    		        <?php
    				    echo $_SESSION['SESS_EMPLOYEE_NAME'];
    		        ?>
    		    </p> 
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <!--<li class="header" style="color:white;">MAIN NAVIGATION</li>-->
            <li class="active treeview">
              <a href="frmemployeedetails.php">
                <i class="fa fa-dashboard"></i> <span>Employee Details</span>
              </a> 
            </li> 
            <li><a href="frmempapar.php"><i class="fa fa-user-plus"></i> <span>APAR Details</span></a></li>
	    </ul>
    </section>
    <!-- /.sidebar -->
</aside>
