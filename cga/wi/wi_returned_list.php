<?php
$GLOBALS['flag'] = "1.6";
include('common/header.php');
include('common/sidebar.php');
?>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-globe"></i>Returned Application List
						</div>
						<div class="tools">
						</div>
					</div>

					<div class="portlet-body">
						<br>
						<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
							<table class="table table-bordered table-striped table-hover dataTable js-exportable" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
								<thead>
									<tr>
										<th>SR No</th>
										<th>Ex. Employee PFno</th>
										<th>Ex. Employee Name</th>
										<th>Applicant Name</th>
										<th>Category</th>
										<th>Reason</th>
										<th>Rejected By</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
									<?php
									$con = dbcon1();
									$query_emp = "SELECT forward_application.id,forward_application.ex_emp_pfno as ex_emp_pfno,forward_application.applicant_username as username,applicant_registration.ex_empname as ex_empname,applicant_name,category,forward_application.remark,rejected_by FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_application.applicant_username=applicant_registration.username and hold_status='0' AND return_status='1' AND forward_from_pfno='" . $_SESSION['pf_number'] . "' ";

									$result_emp = mysqli_query($con, $query_emp);
									$sr = 1;
									while ($value_emp = mysqli_fetch_array($result_emp)) {
										$sa = $value_emp['rejected_by'];
										$sa = explode(',', $sa);
										$name = $sa[0];
										$role = $sa[1];
										$con = dbcon2();
										$con = dbcon1();
										$sql = mysqli_query($con, "SELECT name,role_name from drmpsurh_sur_railway.register_user,drmpsurh_cga.login,master_role where register_user.emp_no=login.pf_number and master_role.role_shortname=login.role and emp_no='" . $name . "' and login.role='" . $role . "'");
										$sq = mysqli_fetch_array($sql);
										$name2 = $sq['name'] . " (" . $sq['role_name'] . ")";

										echo "
								<tr>
								<td>" . $sr++ . "</td>
								<td>" . $value_emp['ex_emp_pfno'] . "</td>
								<td>" . $value_emp['ex_empname'] . "</td>
								<td>" . $value_emp['applicant_name'] . "</td>
								<td>" . getcase($value_emp['category']) . "</td>
								<td>" . ($value_emp['remark']) . "</td>
								<td>" . $name2 . "</td>
								";

										echo "<td><a class='btn btn-primary btnn'   href='show_application.php?id=" . $value_emp['id'] . "&ex_emp_pfno=" . $value_emp['ex_emp_pfno'] . "&username=" . $value_emp['username'] . "&case=" . $value_emp['category'] . "'>Show</a></td>";
										//<a class='btn btn-primary btnn'  value='".$value_emp['username']."' id='".$value_emp['ex_emp_pfno']."' mass='".$value_emp['id']."' href='track-modul.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Status</a>&nbsp;&nbsp;&nbsp;
										echo "</tr>";
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>

		</div>
	</div>
	<?php
	include 'common/footer.php';
	?>

	<script type="text/javascript">
		$('#DataTables_Table_22').DataTable({
			dom: 'Bfrtip',
			"pageLength": 5,
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		});
	</script>