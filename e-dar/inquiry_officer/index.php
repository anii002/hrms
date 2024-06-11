<?php
$GLOBALS['flag'] = "1.1";
include_once('../common_files/header.php');
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Dashboard / डॅशबोर्ड
            <!-- <small>reports & statistics</small> -->
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home / मुख पृष्ठ</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Dashboard / डॅशबोर्ड</a>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="" class="pull-right tooltips btn btn-fit-height grey-salt">
                    <i class=""></i> <span><?php echo date('Y/m/d H:i:s'); ?></span>
                    <!-- <span class="thin uppercase visible-lg-inline-block"></span> -->
                    <!-- <i class="fa fa-angle-down"></i> -->
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS -->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue-madison">
                    <div class="visual">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php
                            $query = mysql_query("SELECT count(id) as id  from tbl_form_master_entry where emp_pf in (SELECT emp_id from tbl_form_details where inquiry_o_pf ='".$_SESSION['id']."') and status='1' and current_status='7' ", $db_edar);
                            $resultset = mysql_fetch_array($query);
                            echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>" . $resultset['id'] . "</h3>";
                            ?>
                        </div>
                        <div class="desc">
                            <p>Pending DAR</p>
                        </div>
                    </div>
                    <a class="more" href="pending_froms.php">
                        अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat green-haze">
                    <div class="visual">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php
                            $query = mysql_query("SELECT count(id) as id  from tbl_form_master_entry where emp_pf in (SELECT emp_id from tbl_form_details where inquiry_o_pf ='".$_SESSION['id']."') and status='1' and current_status='8' ", $db_edar);
                            $resultset = mysql_fetch_array($query);
                            echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>" . $resultset['id'] . "</h3>";
                            ?>
                        </div>
                        <div class="desc">
                            <p>Forwarded DAR</p>
                        </div>
                    </div>
                    <a class="more" href="fwded_forms.php">
                        अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-intense">
                    <div class="visual">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php
                            $query = mysql_query("SELECT count(id) as id  from tbl_form_master_entry where emp_pf in (SELECT emp_id from tbl_form_details where inquiry_o_pf ='".$_SESSION['id']."') and status='1' and current_status='11' ", $db_edar);
                            $resultset = mysql_fetch_array($query);
                            echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>" . $resultset['id'] . "</h3>";
                            ?>
                        </div>
                        <div class="desc">
                            <p>Rejected DAR</p>
                        </div>
                    </div>
                    <a class="more" href="rejected_forms.php">
                        अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple-plum">
                    <div class="visual">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <?php
                            $query = mysql_query("SELECT count(id) as id  from tbl_form_master_entry where emp_pf in (SELECT emp_id from tbl_form_details where inquiry_o_pf ='".$_SESSION['id']."') and status='2' and current_status='9' ", $db_edar);
                            $resultset = mysql_fetch_array($query);
                            echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>" . $resultset['id'] . "</h3>";
                            ?>
                        </div>
                        <div class="desc">
                            <p>Closed DAR</p>
                        </div>
                    </div>
                    <a class="more" href="closed_forms_list.php">
                        अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
            

        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
    </div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php include_once('../common_files/footer.php'); ?>