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
.para {
    color: white;
}
</style>

<body class="nav-md">
    <div class="container body" style="background-image: url('images/b.jpg');">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.php" class="site_title"><span style="color:white">E-Grievance</span></a>
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
                            <ul class="nav side-menu">
                                <?php
                                if (isset($_SESSION['SESSION_ROLE'])) {
                                    if ($_SESSION['SESSION_ROLE'] != 3) {
                                        ?>
                                <li><a><i class="fa fa-home"></i>Master <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <!--li><a href="employee_registration.php">Employee</a></li-->
                                        <li><a href="Employee_list.php">Employee List</a></li>
                                        <li><a href="user_reg.php">Create User</a></li>
                                        <!--li><a href="welfare_register.php">Create Staff & Welfare Inspector</a></li-->
                                        <li><a href="user_list.php">User List</a></li>
                                        <li><a href="category.php">Category</a></li>
                                        <!--<li><a href="department.php">Department</a></li>-->
                                        <!-- <li><a href="designation.php">Designation</a></li> -->
                                        <li><a href="section.php">Section</a></li>
                                        <li><a href="office_cat.php">Office</a></li>
                                    </ul>
                                </li><?php }
                                    } ?>
                                <li><a><i class="fa fa-dot-circle-o"></i>Grievance<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <?php if (!isBo() && !isBA()) { ?>
                                        <li><a href="gri_comp.php">New Grievance Complaints</a></li>
                                        <li><a href="re_forward_gri.php">Returned Grievance</a></li>
                                        <?php } ?>
                                        <li><a href="returned_back.php">
                                        <?php if (isBo() || isBA()) {
                                                                            $val = "New / Returned Grievance";
                                                                        } else {
                                                                            $val = "In Progress Grievance";
                                                                        }
                                                                        echo $val;
                                                                        ?></a></li>
                                        <li><a href="griv_pending.php">Pending Grievances</a></li>
                                        <!--<li><a href="re_forward.php">Reforwarded Grievances</a></li>-->
                                        <li><a href="re_forward.php">Returned to Employee Grievances</a></li>
                                        <li><a href="closed_griv.php">Closed Grievances</a></li>

                                    </ul>
                                </li>
                                <?php
                                if (isset($_SESSION['SESSION_ROLE'])) {
                                    
                                        ?>
                                <!-- reminder -->
                                <!-- <li><a><i class="fa fa-dot-circle-o"></i>Reminder<span
                                                                                    class="fa fa-chevron-down"></span></a>
                                                                            <ul class="nav child_menu">
                                                                                <li><a href="reminder.php">New Reminder</a></li>
                                                                                <li><a href="viewed_reminder.php">Viewed Reminder</a></li>
                                                                            </ul>
                                                                        </li> -->
                                <!--li><a href="griv_upload_admin.php"><i class="fa fa-dot-circle-o"></i>Admin Uploaded Grievance</a></li-->

                                <li><a><i class="fa fa-dot-circle-o"></i>Reports<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <!--<li><a href="category_rpt.php">Categroy Wise Report</a></li>-->
                                        <!--<li><a href="category_sum_rpt.php">Categroy Wise Summary Report </a></li>-->
                                        <!--<li><a href="section_rpt.php">Section Wise Report</a></li>-->
                                        <!--<li><a href="section_sum_rpt.php">Section Wise Summary Report </a></li>-->
                                        <!--<?php //if (!isBA()) { ?>-->
                                        <!--<li><a href="bacategory_rpt.php">Branch Admin Categroy Wise Report</a></li>-->
                                        <!--<li><a href="bacategory_sum_rpt.php">Branch Admin Categroy Wise-->
                                        <!--        Summary Report</a></li>-->
                                        <!--<li><a href="basection_rpt.php">Branch Admin Section wise Report</a></li>-->
                                        <!--<li><a href="basection_rpt_sum.php">Branch Admin Section Wise Summary Report</a>-->
                                        <!--</li>-->
                                        <!--<li><a href="welfare_rpt.php">Welfare Inspector Wise Report </a></li>-->
                                        <!--<li><a href="branchofficer_rpt.php">Branch Officer Wise Report </a></li>-->
                                        <!--<?php// } ?>-->
                                        <!-- <li><a href="snwi_rpt.php">S&amp;WI wise Report Summary</a></li> -->
                                        
                                          <?php if (!isBA()) { ?>
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
                                            </li>
                                            <li><a href="welfare_rpt.php">Welfare Inspector Wise Report </a></li>
                                            <li><a href="branchofficer_rpt.php">Branch Officer Wise Report </a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?php 
                                if ($_SESSION['SESSION_ROLE'] != 3) {
                                if (!isBA()) { ?>
                                <!-- <li><a href="emp_list.php"><i class="fa fa-dot-circle-o"></i>Employee List</a></li> -->
                                <li><a href="h_w.php"><i class="fa fa-dot-circle-o"></i>Handicap/Woman Employee
                                        Grievance List</a></li>
                                <li><a href="feedback.php"><i class="fa fa-dot-circle-o"></i>Feedback List</a></li>
                                <?php }
                                }
                            } ?>
                                <!--li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.html">General Form</a></li>
                      <li><a href="form_advanced.html">Advanced Components</a></li>
                      <li><a href="form_validation.html">Form Validation</a></li>
                      <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                  </li-->
                            </ul>
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