<?php
$GLOBALS['flag'] = "1.9";
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
                    <a href="#">Accepted Forms List</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Accepted Forms List
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
                            // $sql = "Select e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id where g.status='1' AND gri_ref_no NOT like 'WEL%' group by g.id ORDER BY g.gri_upload_date DESC";
                            // $sql = "Select e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='3' and f.status='3' and f.admin_action='2' and f.section_action is NULL  Group by g.id ORDER BY g.gri_upload_date DESC"
                            //
                            // $sql = "SELECT fw.emp_pf FROM `tbl_form_forward` fw INNER JOIN tbl_form_master_entry f_m_e WHERE f_m_e.current_status IN ('3') AND fw.fw_to='$current_id' GROUP BY fw.`form_reference_id` ORDER BY fw.id DESC";
                            // echo $sql = "SELECT fw.emp_pf FROM `tbl_form_forward` fw INNER JOIN tbl_form_master_entry f_m_e WHERE f_m_e.current_status IN ('3','5','6','7','8') AND fw.fw_from='$current_id'  ORDER BY fw.id DESC";
                            // echo $sql = "SELECT DISTINCT(fw.emp_pf),approved_date FROM `tbl_form_forward` fw INNER JOIN tbl_form_master_entry f_m_e WHERE f_m_e.current_status IN ('3','5','6','7','8') AND fw.fw_from='$current_id' AND fw.approved_date is not NULL ORDER BY fw.id DESC";
                            $sql = "SELECT DISTINCT(fw.emp_pf),approved_date FROM `tbl_form_forward` fw INNER JOIN tbl_form_master_entry f_m_e ON fw.form_reference_id=f_m_e.form_ref_id WHERE f_m_e.current_status IN ('5') AND fw.fw_from='$current_id' AND fw.approved_date is not NULL  ORDER BY fw.id DESC";
                            // $sql = "SELECT * FROM `tbl_form_forward` WHERE `hold_status`='0' and `fw_to`='$current_id' And `form_reference_id` in (SELECT `form_ref_id` FROM `tbl_form_master_entry` WHERE status='1') ORDER BY id DESC";
                            // $sql = "SELECT * FROM `tbl_form_forward` WHERE `status`='2' AND `current_role`='2' AND `hold_status`='0' GROUP By `form_reference_id` ORDER BY `id`";
                            $rst_pending_list = mysqli_query($db_edar,$sql, );
                            if (mysqli_num_rows($rst_pending_list) > 0) {
                                $sr = 1;
                                while ($rw_pending_list = mysqli_fetch_assoc($rst_pending_list)) {
                                    # code...
                                    // print_r($rw_pending_list);
                                    $emp_pf = $rw_pending_list["emp_pf"];
                                    $emp_name = get_emp_name($emp_pf);
                                    echo <<<xyz
                                    <tr>
                                        <td>$sr</td>
                                        <td>$emp_name</td>
                                        <td><a href="view_forms_details_new.php?display=view,update&emp_pf=$emp_pf&baction=forward,close&action=add_forms,add_speak,add_office_note" class="btn btn-info"><i class="fa fa-eye"></i></a>
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