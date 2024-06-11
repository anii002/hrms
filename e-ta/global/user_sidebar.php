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
        <a href="index.php"><li class="header" style="font-size: 18px;"><b> <i class="fa fa-dashboard"></i>&nbsp;&nbsp;&nbsp;डैशबोर्ड / Dashboard</b></li></a>

    
		      <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span style="white-space: normal; line-height: 1.7">यात्रा भत्ता <br> Travelling Allowances</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		  <?php 
			  $query = "select role from users where username='".$_SESSION['admin_username']."'";
        $result = mysql_query($query);
				$result_set = mysql_fetch_array($result);
				$role = $result_set['role'];
				if($role=="3")
				{
		  ?>
             <li class=""><a href="Show_claimed_TA.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>दावा किए गए यात्रा भत्ता सूची / Claimed TA List</a></li>
             <li class=""><a href="ApprovedList.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>अनुमोदित  यात्रा भत्ता सूची /<br> Approved TA List</a></li>
             <li class=""><a href="generate_summary.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Generate Summary</a></li>
             <li class=""><a href="summary_report.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Generated Summary</a></li>
             <li class=""><a href="vetted_list.php" style="white-space: normal;"><i class="fa fa-circle-o"></i>Vetted Summary</a></li>
            </ul>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span style="white-space: normal; line-height: 1.6">फुटकर बिल / Contingency</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="approved_cont.php" style="white-space: normal; line-height: 1.5"><i class="fa fa-circle-o"></i>दावा किए गए फुटकर बिल सूची / Claimed Contingency List</a></li>
                <li class=""><a href="approved_cont_list.php" style="white-space: normal; line-height: 1.5"><i class="fa fa-circle-o"></i>अनुमोदित फुटकर बिल / Approved Contingency List</a></li>
                <li class=""><a href="generate_summary_cont.php" style="white-space: normal; line-height: 1.5"><i class="fa fa-circle-o"></i>उत्पन्न फुटकर बिल / Generate Contingency</a></li>
                <li class=""><a href="summary_report_contingency.php" style="white-space: normal; line-height: 1.5"><i class="fa fa-circle-o"></i>उत्पन्न किए गए / Generated Contingency</a></li>
                <li class=""><a href="cont_vetted_list.php"><i class="fa fa-circle-o"></i>Vetted Contingency</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-clipboard"></i> <span>रिपोर्ट / Report</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
        		<li class=""><a href="top_10.php" style="white-space: normal; line-height: 1.6"><i class="fa fa-circle-o"></i>शीर्ष 10 यात्रा भत्ता रिपोर्ट / Top 10 TA Report</a></li>
            <li class=""><a href="grant_report.php"><i class="fa fa-circle-o"></i> <span style="white-space: normal; line-height: 1.6">Grant Report</span></a></li>
        	</ul>
        </li>
				<?php } else if($role=='2') {?>
			 <li class=""><a href="level_summary_report.php"><i class="fa fa-circle-o"></i> <span style="white-space: normal; line-height: 1.6">यात्रा भत्ता सारांश / TA Summary</span></a></li>
             <li class=""><a href="final_approved_list.php"><i class="fa fa-circle-o"></i> <span style="white-space: normal; line-height: 1.6">अनुमोदित यात्रा भत्ता सारांश / TA Approved Summary</span></a></li>
           </li>
         </ul>
         <li class="treeview">
            <a href="#">
                <i class="fa fa-book"></i> <span style="white-space: normal; line-height: 1.6">फुटकर बिल / Contingency</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="c_level_summary_report.php"><i class="fa fa-circle-o"></i> <span style="white-space: normal; line-height: 1.6">फुटकर बिल सारांश / Contingency Summary</span></a></li>
                <li class=""><a href="c_final_approved_list.php"><i class="fa fa-circle-o"></i> <span style="white-space: normal; line-height: 1.6">अनुमोदित फुटकर बिल सारांश / Approved Contingency Summary</span></a></li>
              </ul>
         </li>

				<?php } else if($role=='5'){ ?>
				<li class=""><a href="level_summary_report.php"><i class="fa fa-circle-o"></i> <span style="white-space: normal; line-height: 1.6">सारांश / Summary</span></a></li>
             <li class=""><a href="final_approved_list.php"><i class="fa fa-circle-o"></i><span style="white-space: normal; line-height: 1.6"> अनुमोदित सारांश / Approved Summary</span></a></li>
             </li>
         </ul>
         <li class="treeview">
            <a href="#">
                <i class="fa fa-book"></i> <span style="white-space: normal; line-height: 1.6">फुटकर बिल / Contingency</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="c_level_summary_report.php"><i class="fa fa-circle-o"></i> <span style="white-space: normal; line-height: 1.6">फुटकर बिल सारांश / Contingency Summary</span></a></li>
                <li class=""><a href="c_final_approved_list.php"><i class="fa fa-circle-o"></i> <span style="white-space: normal; line-height: 1.6">अनुमोदित फुटकर बिल सारांश / Approved Contingency Summary</span></a></li>
              </ul>
         </li>
				<?php }else if($role=='6') { ?>
				<li class=""><a href="show_rejected_claim.php"><i class="fa fa-circle-o"></i> <span style="white-space: normal; line-height: 1.6">Rejected Pending TA List</span></a></li>
             <li class=""><a href="rejectedclaim.php"><i class="fa fa-circle-o"></i> <span style="white-space: normal; line-height: 1.6">Rejected Approved TA List</span></a></li>

             <li class=""><a href="level_summary_report.php"><i class="fa fa-circle-o"></i> <span style="white-space: normal; line-height: 1.6">Summary List </span></a></li>
				<?php } else{ ?>
				<li class=""><a href="Show_claimed_TA.php" style="white-space: normal; line-height: 1.5"><i class="fa fa-circle-o"></i>दावा किए गए /  यात्रा भत्ता सूची / Claimed TA List</a></li>
             <li class=""><a href="ApprovedList.php" style="white-space: normal; line-height: 1.5"><i class="fa fa-circle-o"></i>अनुमोदित  यात्रा भत्ता सूची / Approved TA List</a></li>
           </ul>
           <li class="treeview">
            <a href="#">
                <i class="fa fa-book"></i> <span style="white-space: normal; line-height: 1.7">फुटकर बिल /<br/> Contingency</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="approved_cont.php" style="white-space: normal; line-height: 1.5"><i class="fa fa-circle-o"></i>दावा किए गए फुटकर बिल / Claimed Contingency</a></li>
                <li class=""><a href="approved_cont_list.php" style="white-space: normal; line-height: 1.5"><i class="fa fa-circle-o"></i>अनुमोदित फुटकर बिल / Approved Contingency</a></li>
              </ul>
         </li>
             
				<?php } ?>
          </ul>
        </li>
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
