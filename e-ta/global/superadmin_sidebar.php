 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar hidden-print">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <a href="index.php"><li class="header" style="font-size: 18px;"><b> <i class="fa fa-dashboard"></i>&nbsp;&nbsp;&nbsp;डैशबोर्ड  / Dashboard</b></li></a>
        <?php 
          if($_SESSION['role'] == "0"){?>
         
        <li class="">
          <a href="add_user.php">
            <i class="fa fa-book"></i> <span>Add User</span>
            <span class="pull-right-container">
             <!--  <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
          <!-- <ul class="treeview-menu">
             <li class=""><a href="role_management.php"><i class="fa fa-circle-o"></i> <span style="white-space: normal; line-height: 1.6">Add Role</span></a></li>
             <li class=""><a href="assign_user.php"><i class="fa fa-circle-o"></i> <span style="white-space: normal; line-height: 1.6">Add User</span></a></li>
          </ul> -->
        </li>
        <?php

      }
      ?>
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
