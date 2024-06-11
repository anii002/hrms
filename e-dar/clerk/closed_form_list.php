<?php
$GLOBALS['flag'] = "1.7";
include_once('../common_files/header.php');
// include_once('../common_files/sidebar.php');
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Closed Forms List</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Closed Forms List
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
                            // $sql = "SELECT * FROM `tbl_form_master_entry` WHERE status='2'";
                            $sql = "SELECT fw.emp_pf,fw.form_reference_id FROM `tbl_form_forward` fw INNER JOIN  tbl_form_master_entry f_m_e ON f_m_e.form_ref_id=fw.form_reference_id WHERE f_m_e.current_status='9' AND fw.fw_from='$current_id' AND f_m_e.status='2' GROUP BY fw.form_reference_id ORDER BY fw.id DESC";
                            $rst_closed_list = mysql_query($sql, $db_edar);
                            if (mysql_num_rows($rst_closed_list) > 0) {
                                $sr = 1;
                                while ($rw_closed_list = mysql_fetch_assoc($rst_closed_list)) {
                                    # code...
                                    // print_r($rw_closed_list);     
                                    $emp_pf = $rw_closed_list["emp_pf"];
                                    $emp_name = get_emp_name($emp_pf);
                                    $form_ref_id = $rw_closed_list["form_reference_id"];
                                    echo <<<xyz
                                    <tr>
                                        <td>$sr</td>
                                        <td>$emp_name</td>
                                        <td><a href="view_closed_forms_details.php?display=view&emp_pf=$emp_pf&form_ref_id=$form_ref_id" class="btn btn-info"><i class="fa fa-eye"></i></a>
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