<?php
require_once('Global_Data/header.php');
// include('functions.php')

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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

                            <?php
                            // Function to check if the user has a Branch Officer role
                            if (!function_exists('isBo')) {
                                function isBo()
                                {
                                    if (isset($_SESSION['SESSION_ROLE'])) {
                                        return $_SESSION['SESSION_ROLE'] == 'Branch Officer';
                                    }
                                    return false;
                                }
                            }

                            // Similarly, define isBA() function if it is also used
                            if (!function_exists('isBA')) {
                                function isBA()
                                {
                                    if (isset($_SESSION['SESSION_ROLE'])) {
                                        return $_SESSION['SESSION_ROLE'] == 'Branch Admin';
                                    }
                                    return false;
                                }
                            }
                            ?>

                            <ul class="nav side-menu">
                                <?php
                                if (isset($_SESSION['SESSION_ROLE'])) {
                                    if ($_SESSION['SESSION_ROLE'] != 3) {
                                ?>
                                            <li><a><i class="fa fa-home"></i>Master <span class="fa fa-chevron-down"></span></a>
                                                <ul class="nav child_menu">
                                                    <li><a href="Employee_list.php">Employee List</a></li>
                                                    <li><a href="user_reg.php">Create User</a></li>
                                                    <li><a href="user_list.php">User List</a></li>
                                                    <li><a href="category.php">Category</a></li>
                                                    <li><a href="section.php">Section</a></li>
                                                    <li><a href="office_cat.php">Office</a></li>
                                                </ul>
                                            </li>
                                        <?php }
                                        } ?>
                                    <li><a><i class="fa fa-dot-circle-o"></i>Grievance<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <?php if (!isBo() && !isBA()) { ?>
                                                <li><a href="gri_comp.php">New Grievance Complaints</a></li>
                                                <li><a href="re_forward_gri.php">Returned Grievance</a></li>
                                            <?php } ?>
                                            <li><a href="returned_back.php">
                                                    <?php
                                                    if (isBo() || isBA()) {
                                                        $val = "New / Returned Grievance";
                                                    } else {
                                                        $val = "In Progress Grievance";
                                                    }
                                                    echo $val;
                                                    ?></a></li>
                                            <li><a href="griv_pending.php">Pending Grievances</a></li>
                                            <li><a href="re_forward.php">Returned to Employee Grievances</a></li>
                                            <li><a href="closed_griv.php">Closed Grievances</a></li>
                                        </ul>
                                    </li>
                                    <?php
                                    if (isset($_SESSION['SESSION_ROLE'])) {
                                    ?>
                                        <li><a><i class="fa fa-dot-circle-o"></i>Reports<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <?php if (!isBA()) { ?>
                                                    <li><a href="category_rpt.php">Categroy Wise Report</a></li>
                                                    <li><a href="category_sum_rpt.php">Categroy Wise Summary Report </a></li>
                                                    <li><a href="section_rpt.php">Section Wise Report</a></li>
                                                    <li><a href="section_sum_rpt.php">Section Wise Summary Report </a></li>
                                                    <li><a href="bacategory_rpt.php">Branch Admin Categroy Wise Report</a></li>
                                                    <li><a href="bacategory_sum_rpt.php">Branch Admin Categroy Wise Summary Report</a></li>
                                                    <li><a href="ba_wise_rpt.php">Branch Admin wise Report</a></li>
                                                    <li><a href="ba_wise_sum_rpt.php">Branch Admin wise Summary Report</a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <?php
                                            if ($_SESSION['SESSION_ROLE'] != 3) {
                                                if (!isBA()) { ?>
                                                    <li><a href="h_w.php"><i class="fa fa-dot-circle-o"></i>Handicap/Woman Employee Grievance List</a></li>
                                                    <li><a href="feedback.php"><i class="fa fa-dot-circle-o"></i>Feedback List</a></li>
                                        <?php }
                                            }
                                        }
                                        ?>
                                            <!-- <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="form.html">General Form</a></li>
                              <li><a href="form_advanced.html">Advanced Components</a></li>
                              <li><a href="form_validation.html">Form Validation</a></li>
                              <li><a href="form_wizards.html">Form Wizard</a></li>
                              <li><a href="form_upload.html">Form Upload</a></li>
                              <li><a href="form_buttons.html">Form Buttons</a></li>
                            </ul>
                          </li> -->
                                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /footer content -->
    </div>
</body>

</html>
