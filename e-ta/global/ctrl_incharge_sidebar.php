 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar hidden-print">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <a href="index.php"><li class="header" style="font-size: 18px;"><b> <i class="fa fa-dashboard"></i>&nbsp;&nbsp;&nbsp;डैशबोर्ड  / Dashboard</b></li></a>
        <?php 
          if($_SESSION['role'] == $_SESSION['role']){?>
            <li class="">
          <a href="verify_emp.php" style="width: 50px;">
            <i class="fa fa-book"></i> <span>Verify Employee</span>
            <span class="pull-right-container">
             <!--  <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>
        </li>

          <li class="treeview">
          <a href="#">
           <i class="fa fa-book"></i> <span style="white-space: normal; line-height: 1.6">यात्रा भत्ता / <br/>Travelling Allowances</span> 
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> 
          <ul class="treeview-menu">
           
            
             <li class=""><a href="TA_Entry_Form.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>यात्रा भत्ता प्रवेश फॉर्म / TA Entry Form</a></li>
            <li class=""><a href="Show_claimed_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा किए गए यात्रा भत्ता सूची / Claimed TA List</a></li>
             <li class=""><a href="Show_unclaimed_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा न किए गए यात्रा भत्ता सूची / Saved TA List</a></li>
             <li class=""><a href="ci_Show_claimed_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Claims received for Movement Verification</a></li>
            <li class=""><a href="ApprovedList.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Verified Movement TA list of Sub-ordinates</a></li>
          
          </ul>
        </li>
        <!--<li class="treeview">-->
        <!--  <a href="#">-->
        <!--    <i class="fa fa-book"></i> <span style="white-space: normal; line-height: 1.6">फुटकर बिल / Contingency</span> -->

        <!--    <span class="pull-right-container">-->
        <!--      <i class="fa fa-angle-left pull-right"></i>-->
        <!--    </span>-->
        <!--  </a> -->

        <!--  <ul class="treeview-menu">-->
        <!--      <li class=""><a href="add_cont.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>फुटकर बिल / Contingency Form </a></li>-->
        <!--      <li class=""><a href="show_cont.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा किए गए फुटकर बिल सूची / Claimed Contingency List</a></li>-->
        <!--      <li class=""><a href="show_unclaimed_cont.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा न किए गए फुटकर बिल सूची / Unclaimed Contingency List</a></li>-->
        <!--   </ul>-->
        <!-- </li>-->
      </ul>

     
        <?php
          }
      ?>
      
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>
