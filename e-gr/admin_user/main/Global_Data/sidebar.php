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
					if($_SESSION['SESSION_ROLE']=='welfare')
					{
				?>
				<ul class="nav side-menu">
                  <li><a><i class="fa fa-dot-circle-o"></i>Grievance<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="new_grievance.php">Add New Grievance</a></li>
                      <li><a href="new_grievance.php">View Added Grievance</a></li>
                    </ul>
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
                      <li><a href="returned_back.php">Returned Grievances</a></li>
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
