<?php
require_once('Global_Data/header.php');
error_reporting(0);
?>

<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main" style="background-image: url('images/small1.png');repeat:repeat;">
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
										<th>Employee ID</th>
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
									{	//echo "<script>alert($type)</script>";

										global $db_egr;
										$fetch_cat = mysqli_query($db_egr, "select cat_name from category where cat_id='" . $type . "'");
										//  $cat_fetch=mysqli_query($fetch_cat);
										while ($cat_get = mysqli_fetch_assoc($fetch_cat)) {
											$cat_names = $cat_get['cat_name'];
											//echo "<script>alert($cat_names)</script>";
										}
										// echo "<script>alert($fetch_cat)</script>";

										return ($cat_names);
									}
									$cnt = 1;
									$query = mysqli_query($db_egr,"Select  e.emp_id,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id where g.status='1'");
									while ($rw_data = mysqli_fetch_array($query)) {
										$emp_id = $rw_data["emp_id"];
										$emp_name = $rw_data["emp_name"];
										$emp_type = $rw_data["emp_type"];
										$gri_ref_no = $rw_data["gri_ref_no"];
										$gri_type = get_Cat($rw_data["gri_type"]);
										$gri_upload_date = $rw_data["gri_upload_date"];
										$g_id = $rw_data["id"];
										echo "<tr>";
										echo "<td>$g_id</td>";
										echo "<td>$emp_id</td>";
										echo "<td>$emp_name</td>";
										echo "<td>$emp_type</td>";
										echo "<td>$gri_ref_no</td>";
										echo "<td>$gri_type</td>";
										echo "<td>$gri_upload_date</td>";
										echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
										<a  style='width:34px' id='" . $rw_data['id'] . "' href='gri_comp_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
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