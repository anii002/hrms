 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar hidden-print">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <a href="index.php"><li class="header" style="font-size: 18px;"><b> <i class="fa fa-dashboard"></i>&nbsp;&nbsp;&nbsp;डैशबोर्ड  / Dashboard</b></li></a>
        <?php 
          if($_SESSION['role'] == $_SESSION['role']){?>
           <!--  <li class="">
          <a href="verify_emp.php" style="width: 50px;">
            <i class="fa fa-book"></i> <span>Verify Employee</span>
            <span class="pull-right-container">
             <!-  <i class="fa fa-angle-left pull-right"></i> --
            </span>
          </a>
        </li> -->

         <li class="treeview">
          <a href="#">
           <i class="fa fa-book"></i> <span style="white-space: normal; line-height: 1.6">यात्रा भत्ता / <br/>Travelling Allowances</span> 
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> 
          <ul class="treeview-menu">
           
            
            <li class=""><a href="co_Show_claimed_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा किए गए यात्रा भत्ता सूची / Claimed TA List</a></li>
             <li class=""><a href="ApprovedList.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा न किए गए यात्रा भत्ता सूची / Approved TA List</a></li>
            
          
          </ul>
        </li>
     
        <?php
          }
      ?>
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
