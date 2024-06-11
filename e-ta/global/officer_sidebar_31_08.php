<style>
 li>a>.pull-right-container {
    position: absolute;
    right: 10px;
    top: 60% !important;
    margin-top: -14px !important;
}
</style>
 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar hidden-print" style="background: #2c2e43 !important">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <a href="index.php"><li class="header" style="font-size: 18px;"><b> <i class="fa fa-dashboard"></i> डैशबोर्ड / Dashboard</b></li></a>
		      <li class="treeview">
          <a href="#">
           <i class="fa fa-book"></i> <span style="white-space: normal; line-height: 1.6">यात्रा भत्ता / <br/>Travelling Allowances</span> 
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> 
          <ul class="treeview-menu">
            <?php
            if(isset($_SESSION['role']) && $_SESSION['role'] == "OS"){
              ?>
            <li class=""><a href="employee_registration.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Employee Registration</a></li>
            <li class=""><a href="user_register.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>User Registration</a></li>
            <li class=""><a href="officer_Show_claimed_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Claimed TA List</a></li>
            <li class=""><a href="ApprovedList.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Approved TA</a></li>
            <li class=""><a href="generate_summary.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Generate Summary</a></li>
            <li class=""><a href="summary_report.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Generated Summary Report</a></li>
            <li class=""><a href="vetted_list.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Vetted Summary</a></li>
            <?php
              }
              else if(isset($_SESSION['role']) && $_SESSION['role'] == "BO"){?>
            <li class=""><a href="TA_Entry_Form.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>यात्रा भत्ता प्रवेश फॉर्म / TA Entry Form</a></li>
            <li class=""><a href="Show_claimed_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा किए गए यात्रा भत्ता सूची / Claimed TA List</a></li>
             <li class=""><a href="Show_unclaimed_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा न किए गए यात्रा भत्ता सूची / Unclaimed TA List</a></li>
             <li class=""><a href="officer_Show_claimed_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Claimed TA List</a></li>
            <li class=""><a href="ApprovedList.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Approved TA</a></li>
            <?php
              }
              else if(isset($_SESSION['role']) && $_SESSION['role'] == "AP"){?>
                
            <li class=""><a href="level_summary_report.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Summary</a></li>
            <li class=""><a href="vetted_list.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Approved Summary</a></li>
              <?php
              }else{
              ?>
             <li class=""><a href="TA_Entry_Form.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>यात्रा भत्ता प्रवेश फॉर्म / TA Entry Form</a></li>
             <li class=""><a href="Show_claimed_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा किए गए यात्रा भत्ता सूची / Claimed TA List</a></li>
             <li class=""><a href="Show_unclaimed_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा न किए गए यात्रा भत्ता सूची / Unclaimed TA List</a></li>
             <li class=""><a href="Show_returned_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>निर्वाचित  यात्रा भत्ता सूची / Returned TA List</a></li>
             <li class=""><a href="Track.php"><i class="fa fa-circle-o"></i> <span style="white-space: normal; line-height: 1.6">दावा ट्रैक / Track claim</span></a></li>
          <?php } ?>
          </ul>
        </li>
        <!--li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span style="white-space: normal; line-height: 1.6">फुटकर बिल / Contingency</span> 

            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> 

          <ul class="treeview-menu">
              <li class=""><a href="add_cont.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>फुटकर बिल / Contingency Form </a></li>
              <li class=""><a href="show_cont.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा किए गए फुटकर बिल सूची / Claimed Contingency List</a></li>
              <li class=""><a href="show_unclaimed_cont.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा न किए गए फुटकर बिल सूची / Unclaimed Contingency List</a></li>
           </ul>
         </li-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
