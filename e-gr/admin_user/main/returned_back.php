<?php
require_once('Global_Data/header.php');
error_reporting(0);
?>
<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <h2>Returned Back Grievance Complaints <small>List</small></h2>
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
									function get_Cat($type)
									{
										global $db_egr;
										$fetch_cat = mysql_query("select cat_name from category where cat_id='" . $type . "'", $db_egr);
										//  $cat_fetch=mysql_query($fetch_cat);
										while ($cat_get = mysql_fetch_assoc($fetch_cat)) {
											$cat_names = $cat_get['cat_name'];
											//echo "<script>alert($cat_names)</script>";
										}
										// echo "<script>alert($fetch_cat)</script>";

										return ($cat_names);
									}
									function get_type($emp_type)
									{
										global $db_egr;
										$fetch_cat = mysql_query("select * from emp_type where id='$emp_type'", $db_egr);
										while ($cat_fetch = mysql_fetch_array($fetch_cat)) {
											$e_type = $cat_fetch['type'];
										}
										return $e_type;
									}
									$current_id = $_SESSION['SESSION_ID'];
									//echo "<script>alert('$current_id');</script>";
									$cnt = 1;
									// $sql = "Select e.emp_id,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='3' and f.status='3' and f.admin_action='2' and f.section_action is NULL and user_id_forwarded='$current_id'";
									$sql = "Select e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='3' and f.status='3' and f.admin_action='2' and f.section_action is NULL and user_id_forwarded='$current_id' group by g.id order by g.gri_upload_date DESC";
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
										<a id='" . $rw_data['id'] . "' href='return_back_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
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
<script>
/* $(document).on("click",".btn1",function(){
	var g_id=$(this).attr('id');
	alert(g_id);
	$.ajax({
		type:"post",
		url:"gri_comp_detail.php",
		data:{'g_id':g_id},
		success: function (data) {
			alert;
		}
	});
}); */
</script>