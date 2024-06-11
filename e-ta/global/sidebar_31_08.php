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
             <li class=""><a href="TA_Entry_Form.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>यात्रा भत्ता प्रवेश फॉर्म / TA Entry Form</a></li>
             <li class=""><a href="Show_claimed_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा किए गए यात्रा भत्ता सूची / Claimed TA List</a></li>
             <li class=""><a href="Show_unclaimed_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा न किए गए यात्रा भत्ता सूची / Unclaimed TA List</a></li>
             <li class=""><a href="Show_returned_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>निर्वाचित  यात्रा भत्ता सूची / Returned TA List</a></li>
             <li class=""><a href="Track.php"><i class="fa fa-circle-o"></i>दावा ट्रैक / Track claim</a></li>
            
          </ul>
        </li>
        <li class="treeview">
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
         </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
