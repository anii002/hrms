 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
     <!-- Sidebar user panel -->
     <div class="user-panel">
       <div class="pull-left image">
         <?php if (isset($_SESSION['profile_image'])) { ?>
           <img src="../../../../hrms/images/profile/<?php echo $_SESSION['profile_image']; ?>" class="img-circle" alt="User Image">
         <?php } else { ?>
           <img src="../plugins/dist/img/usericon.png" class="img-circle" alt="User Image">
         <?php } ?>
       </div>
       <div class="pull-left info">
         <p>
           <?php
            echo $_SESSION['SESS_USER_NAME'];
            ?>
         </p>
       </div>
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
       <?php

        $sqluser = mysqli_query($conn, "select * from tbl_accesspermission where accesslevel='" . $_SESSION['Access_level'] . "'");
        $rwUer = mysqli_fetch_array($sqluser);
        if (isset($rwUer["adding"]) && $rwUer["adding"] == "on") {
        ?>
         <li><a href="add_employee.php"><i class="fa fa-user-plus"></i> <span>Add Employee</span></a></li>
       <?php
        }
        if (isset($rwUer["adding"]) && $rwUer["adding"] == "on") {
        ?>
         <li><a href="frmsample.php"><i class="fa fa-user-plus"></i> <span>Create group</span></a></li>
       <?php
        }
        ?>
       <li><a href="show_group.php"><i class="fa fa-users"></i> <span>Show Employee Groups</span></a></li>
       <li><a href="frmhelpdesk.php"><i class="fa fa-institution"></i> <span>Helpdesk</span></a></li>
       <li><a href="frmnotification.php"><i class="fa fa-bullhorn"></i> <span>Notification</span></a></li>

       <?php

        $usertype = $_SESSION['Access_level'];
        if ($usertype == 'Techinical') {
        ?>
         <li><a href="frmemplogindetails.php"><i class="fa fa-lock"></i> <span>Employee Login Details</span></a></li>
       <?php
        } else if ($usertype == 'Admin') {
        ?>
         <li><a href="frmadduser.php"><i class="fa fa-user-plus"></i> <span>Add User</span></a></li>
       <?php
        }
        ?>
       <li><a><i class="fa fa-print"></i> <span>Report</span>
           <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
           </span></a>
         <ul class="treeview-menu">
           <li class="active"><a href="frmemployeereport.php"><i class="fa fa-dot-circle-o"></i> Employee Report </a></li>
           <li><a href="frmindividualreport.php"><i class="fa fa-dot-circle-o"></i>Individual Employee Report</a></li>
         </ul>
       </li>
       <!--li><a href="../index.php"><i class="fa fa-circle-o text-yellow"></i> <span>Logout</span></a></li-->
       <!--li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li-->
     </ul>
   </section>
   <!-- /.sidebar -->
 </aside>
