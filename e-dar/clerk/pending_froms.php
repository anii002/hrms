<?php
$GLOBALS['flag'] = "1.4";
include_once('../common_files/header.php');
// include_once('../common_files/sidebar.php');
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- 
			<h3 class="page-title">
			Dashboard / डॅशबोर्ड<small>reports & statistics</small>
			</h3> -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Pending Forms List</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Pending Forms List
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-bordered table-stripped table-responsive">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Employee Name</th>
                                <th>View Form</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $current_id = $_SESSION["id"];
                            // $sql = "SELECT * FROM `tbl_form_forward` WHERE `current_role`='2' AND `hold_status`='1' and `fw_from`='$current_id' And `form_reference_id` in (SELECT `form_ref_id` FROM `tbl_form_master_entry` WHERE status='1') GROUP By form_reference_id ORDER By id";
                            // $sql = "SELECT * FROM `tbl_form_master_entry` WHERE `current_status`='2' ORDER BY id DESC";
                            // $sql = "SELECT * FROM `tbl_form_forward` WHERE `status`='2' AND `current_role`='2' AND `hold_status`='1' GROUP By `form_reference_id` ORDER BY `id`";
                            $sql = "SELECT fw.emp_pf FROM `tbl_form_forward` fw INNER JOIN tbl_form_master_entry f_m_e ON fw.form_reference_id=f_m_e.form_ref_id WHERE f_m_e.current_status='2' AND fw.fw_from='$current_id' AND f_m_e.status='1' GROUP BY fw.`form_reference_id` ORDER BY fw.id DESC";
                            $rst_pending_list = mysql_query($sql, $db_edar);
                            // echo mysql_error();
                            // var_dump($rst_pending_list);
                            if (mysql_num_rows($rst_pending_list) > 0) {
                                $sr = 1;
                                while ($rw_pending_list = mysql_fetch_assoc($rst_pending_list)) {
                                    # code...
                                    // print_r($rw_pending_list);
                                    $emp_pf = $rw_pending_list["emp_pf"];
                                    $emp_name = get_emp_name($emp_pf);
                                    echo <<<xyz
                                    <tr>
                                        <td>$sr</td>
                                        <td>$emp_name</td>
                                        <td><a href="view_forms_details.php?display=view&emp_pf=$emp_pf" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
xyz;
                                    $sr++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
    </div>
</div>

<?php
include_once('../common_files/footer.php');
?>