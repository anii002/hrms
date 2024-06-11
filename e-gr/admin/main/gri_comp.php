<?php
require_once('Global_Data/header.php');
error_reporting(0);
$userrole = $_SESSION["SESSION_ROLE"];
?>

<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <h2>New Grievance Complaints <small>List</small></h2>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									$cnt = 1;
									if ($userrole == 3 || isBA()) {
										$current_id = $_SESSION['SESSION_ID'];
										// $sql = "Select e.emp_id,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.section_id='0' and g.status='2' and f.status='2' and f.user_id_forwarded='$current_id' and f.griv_ref_no not like 'WEL%' ORDER BY g.gri_upload_date DESC";
										 $sql = "Select e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from $db_common_name.resgister_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.section_id='0' and g.status='2' and f.status='2' and f.user_id_forwarded='$current_id' and gri_ref_no NOT like 'WEL%' group by g.id ORDER BY g.gri_upload_date DESC ";
									} else {
										// $sql = "Select e.emp_id,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id where g.status='1' AND g.gri_ref_no not like 'WEL%' ORDER BY g.gri_upload_date DESC";
										 $sql = "Select e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id from $db_common_name.resgister_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id where g.status='1' AND gri_ref_no NOT like 'WEL%' group by g.id ORDER BY g.gri_upload_date DESC ";
									}
									$query = mysql_query($sql);

									while ($rw_data = mysql_fetch_array($query)) {
										$emp_id = $rw_data["emp_no"];
										$emp_name = $rw_data["name"];
										$emp_type = get_type($rw_data["empType"]);
										$gri_ref_no = $rw_data["gri_ref_no"];
										$gri_type = get_Cat($rw_data["gri_type"]);
										$gri_upload_date = $rw_data["gri_upload_date"];
										$g_id = $rw_data["id"];
										echo "<tr>";
										echo "<td>$cnt</td>";
										echo "<td>$emp_id</td>";
										echo "<td>$emp_name</td>";
										echo "<td>$emp_type</td>";
										echo "<td>$gri_ref_no</td>";
										echo "<td>$gri_type</td>";
										echo "<td>$gri_upload_date</td>";
										echo "<td><div class='btn-group'>
											 <a id='" . $rw_data['id'] . "' href='gri_comp_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
											 <a id='" . $rw_data['id'] . "' data-toggle='modal' data-target='#delete_griv' class='btn_show_center btn1 btn btn-danger btn-delete' value='" . $rw_data['id'] . "'><i class='fa fa-trash' aria-hidden='true'></i></a>
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

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <h2>New Grievance<small> Added By Welfare List</small></h2>
                                <hr>
                                <div class="x_content">
                                    <table class="table table-striped table-bordered display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Employee No</th>
                                                <th>Employee Name</th>
                                                <th>Mobile Number</th>
                                                <th>Grievance Ref.No.</th>
                                                <th>Category</th>
                                                <th>Updated Date</th>
                                                <th>Uploaded By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											$cnt = 1;
											if ($userrole == 3 || isBA()) {
												$current_id = $_SESSION['SESSION_ID'];
												// $sql = "Select e.emp_id,e.emp_name,e.emp_mob,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.uploaded_by,g.id,f.forwarded_date from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.section_id='0' and g.status='2' and f.status='2' and f.user_id_forwarded='$current_id'  and f.griv_ref_no like 'WEL%' ORDER BY g.gri_upload_date DESC";
												$sql = "Select e.emp_no,e.name,e.mobile,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.uploaded_by,g.id,f.forwarded_date from $db_common_name.resgister_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.section_id='0' and g.status='2' and f.status='2' and f.user_id_forwarded='$current_id' and f.griv_ref_no like 'WEL%' GROUP BY g.id ORDER BY g.gri_upload_date DESC";
											} else {
												// $sql = "Select  e.emp_id,e.emp_mob,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date, g.uploaded_by, g.id from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id where g.status='1' AND g.gri_ref_no like 'WEL%' ORDER BY g.gri_upload_date DESC";
											 $sql = "Select e.emp_no,e.name,e.empType,e.mobile,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.uploaded_by,g.id from $db_common_name.resgister_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id where g.status='1' AND gri_ref_no like 'WEL%' group by g.id ORDER BY g.gri_upload_date DESC ";
											}
											$query = mysql_query($sql);
											while ($rw_data = mysql_fetch_array($query)) {
												$emp_id = $rw_data["emp_no"];
												$emp_name = $rw_data["name"];
												$emp_mobile = $rw_data["mobile"];
												$gri_ref_no = $rw_data["gri_ref_no"];
												$gri_type = get_Cat($rw_data["gri_type"]);
												$gri_upload_date = $rw_data["gri_upload_date"];
												$g_id = $rw_data["id"];
												$uploaded_by = get_uploaded_user($rw_data["uploaded_by"]);
												echo "<tr>";
												echo "<td>$cnt</td>";
												echo "<td>$emp_id</td>";
												echo "<td>$emp_name</td>";
												echo "<td>$emp_mobile</td>";
												echo "<td>$gri_ref_no</td>";
												echo "<td>$gri_type</td>";
												echo "<td>$gri_upload_date</td>";
												echo "<td>$uploaded_by</td>";
												echo "<td><div class='btn-group'>
        										<a id='" . $rw_data['id'] . "' href='gri_wel_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
        										<a id='" . $rw_data['id'] . "' data-toggle='modal' data-target='#delete_griv' class='btn_show_center btn1 btn btn-danger btn-delete' value='" . $rw_data['id'] . "'><i class='fa fa-trash' aria-hidden='true'></i></a>
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
    </div>
</div>

<?php
require_once('Global_Data/footer.php');
?>

<div class="modal fade" id="delete_griv" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="process.php?action=delete_griv" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Grievance</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="hidden_id_delete" id="hidden_id_delete">
                    <p>Do you really want to delete this record? This process cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" name="des_update">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).on("click", ".btn-delete", function() {
    // alert($(this).attr("id"));
    var id=$(this).attr('id');
    $("#hidden_id_delete").val(id);
    // alert($("#hidden_id_delete").val());
});
</script>