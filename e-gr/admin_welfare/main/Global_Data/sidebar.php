<?php
require_once('Global_Data/header.php');

?>

  <!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

  </head>
<style>
.para{
	color:white;
}
</style>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><span>E-Grievance</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info>
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
           <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                
				<?php 
					if($_SESSION['SESSION_ROLE']=='2')
					{
				?>
				<ul class="nav side-menu">
                  <li><a><i class="fa fa-dot-circle-o"></i>Grievance<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_grievance.php">Add New Grievance</a></li>
                      <li><a href="grievance_list.php">View Added Grievance</a></li>
                      <li><a href="closed_grievance_list.php">Closed Grievance</a></li>
                      <li><a href="closed_griv.php">Closed Grievances Admin View</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-dot-circle-o"></i>Report<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="category_rpt.php">Categroy Wise Report</a></li>
                      <li><a href="category_sum_rpt.php">Categroy Wise Summary Report </a></li>
                      <li><a href="section_rpt.php">Section Wise Report</a></li>
                      <li><a href="section_sum_rpt.php">Section Wise Summary Report </a></li>

                      <li><a href="bacategory_rpt.php">Branch Admin Categroy Wise Report</a></li>
                      <li><a href="bacategory_sum_rpt.php">Branch Admin Categroy Wise
                          Summary Report</a></li>
                      <li><a href="ba_wise_rpt.php">Branch Admin wise Report</a></li>
                      <li><a href="ba_wise_sum_rpt.php">Branch Admin wise Summary Report</a></li>
                      <!-- <li><a href="basection_rpt.php">Branch Admin Section wise Report</a></li> -->
                      <!-- <li><a href="basection_rpt_sum.php">Branch Admin Section Wise Summary Report</a> -->
                      <!--<li><a href="welfare_rpt.php">Welfare Inspector Wise Report </a></li>-->
                      <li><a href="branchofficer_rpt.php">Branch Officer Wise Report </a></li>
                  </li>
                </ul>
				<?php
					}
					else
					{
				?>
				<ul class="nav side-menu">
                  <li><a><i class="fa fa-dot-circle-o"></i>Grievance<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="new_grievance.php">New Grievance 
					  complaints</a></li>
                      <li><a href="griv_pending.php">Pending Grievances</a></li>
                      <li><a href="returned_back.php">Received Grievances</a></li>
                      <li><a href="re-forwarded.php">Reforwarded Grievances</a></li>
                      <li><a href="griv_closed.php">Closed Grievances</a></li>
                    </ul>
                  </li>
                </ul>
				<?php
					}
				?>
              </div>
         

            </div>
            <!-- /sidebar menu -->

         
          </div>
        </div>
          
        <!-- /footer content -->
      </div>
    </div>


   

  </body>
</html>
