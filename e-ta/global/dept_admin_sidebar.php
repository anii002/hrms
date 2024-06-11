 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar hidden-print">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <a href="index.php"><li class="header" style="font-size: 18px;"><b> <i class="fa fa-dashboard"></i>&nbsp;&nbsp;&nbsp;डैशबोर्ड  / Dashboard</b></li></a>
        <?php 
          if($_SESSION['role'] == "11"){?>
           
     <li class="treeview">
          <a href="#">
           <i class="fa fa-book"></i> <span style="white-space: normal; line-height: 1.6">यात्रा भत्ता / <br/>Travelling Allowances</span> 
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> 
          <ul class="treeview-menu">
            <li class="">
          <a href="add_depot.php" style="width: 60px;">
            <i class="fa fa-book"></i> <span>Add Depot Master</span>
            <span class="pull-right-container">
             <!--  <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        </li>

        <li class="">
          <a href="add_user.php">
            <i class="fa fa-book"></i> <span>Add User</span>
            <span class="pull-right-container">
             <!--  <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        </li>
          
         <li class=""><a href="generate_summary.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Generate Summary</a></li>
            <li class=""><a href="summary_report.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Generated Summary Report</a></li>
            <li class=""><a href="vetted_list.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Vetted Summary</a></li>
          </ul>
        </li>
        <?php
          }
      ?>
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
