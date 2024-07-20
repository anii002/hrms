<?php
$GLOBALS['flag'] = "1.1";
include_once('../common_files/header.php');
include_once("../dbconfig/dbcon.php");
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
                            $current_id = $_SESSION["id"];
                            $sql = "SELECT fw.emp_pf FROM `tbl_form_forward` fw INNER JOIN tbl_form_master_entry f_m_e ON fw.form_reference_id=f_m_e.form_ref_id WHERE f_m_e.current_status='2' AND fw.fw_to='$current_id' AND f_m_e.status='1' GROUP BY fw.`form_reference_id` ORDER BY fw.id DESC";
                            // $sql = "SELECT fw.emp_pf FROM `tbl_form_forward` fw INNER JOIN tbl_form_master_entry f_m_e WHERE f_m_e.current_status='2' AND fw.fw_to='$current_id' GROUP BY fw.`form_reference_id` ORDER BY fw.id DESC";
                            $rst_pending_list = mysqli_query($db_edar,$sql );
                            echo mysqli_num_rows($rst_pending_list);
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
                            $sql = "SELECT fw.emp_pf,fw.form_reference_id FROM `tbl_form_forward` fw INNER JOIN tbl_form_master_entry f_m_e ON f_m_e.form_ref_id=fw.form_reference_id WHERE f_m_e.current_status='9' AND fw.fw_from='$current_id' AND f_m_e.status='2' GROUP BY fw.form_reference_id ORDER BY fw.id DESC";
                            $rst_closed_list = mysqli_query($db_edar,$sql);
                            echo mysqli_num_rows($rst_closed_list);
                            ?>
                        </div>
                        <div class="desc">
                            <p>Completed DAR</p>
                        </div>
                    </div>
                    <a class="more" href="closed_form_list.php">
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