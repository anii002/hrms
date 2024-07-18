<?php
require_once('Global_Data/header.php');
error_reporting(0);
include('config.php');
include('functions.php')
?>

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <!--<h2>Re-Forwarded Grievance<small>List</small></h2>-->
                        <h2>Returned Back To Employee Grievance<small>List</small></h2>
                        <hr>
                        <div class="x_content">
                            <table class="table table-striped table-bordered display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Employee No</th>
                                        <th>Employee Name</th>
                                        <th>Employee Type</th>
                                        <th>Grievance Ref.No.</th>
                                        <th>Category</th>
                                        <th>Updated Date</th>
                                        <th>Last Updated Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cnt = 1;
                                    // $sql="Select  e.emp_id,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='3' and f.status='3' and f.admin_action='2' and f.section_action is NULL ORDER BY g.gri_upload_date DESC";
                                    $sql = "Select e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='3' and f.status='3' and f.admin_action='2' and f.section_action is NULL  Group by g.id ORDER BY g.gri_upload_date DESC";
                                    $query = mysqli_query($db_egr,$sql);
                                    while ($rw_data = mysqli_fetch_array($query)) {
                                        $emp_id = $rw_data["emp_no"];
                                        $emp_name = $rw_data["name"];
                                        $emp_type = get_type($rw_data["empType"]);
                                        $gri_ref_no = $rw_data["gri_ref_no"];
                                        $gri_type = get_Cat($rw_data["gri_type"]);
                                        $gri_upload_date = $rw_data["gri_upload_date"];
                                        $g_id = $rw_data["id"];
                                        $forwarded_date = $rw_data["forwarded_date"];
                                        echo "<tr>";
                                        echo "<td>$cnt</td>";
                                        echo "<td>$emp_id</td>";
                                        echo "<td>$emp_name</td>";
                                        echo "<td>$emp_type</td>";
                                        echo "<td>$gri_ref_no</td>";
                                        echo "<td>$gri_type</td>";
                                        echo "<td>$gri_upload_date</td>";
                                        echo "<td>$forwarded_date</td>";
                                        echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
										<a  style='width:34px' id='" . $rw_data['id'] . "' href='re-forwarded.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
										</div>
										</td>";
                                        echo "</tr>";
                                        $cnt++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('Global_Data/footer.php');
?>