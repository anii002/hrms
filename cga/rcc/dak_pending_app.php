<?php
$GLOBALS['flag'] = "2.2";
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
							<i class="fa fa-globe"></i>Pending Application List
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
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
									<?php
									$con = dbcon1();
									$query_emp = "SELECT forward_application.id,forward_application.ex_emp_pfno as ex_emp_pfno,forward_application.applicant_username as username,applicant_registration.ex_empname as ex_empname,applicant_name,category,rcc_note_status FROM forward_application,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_application.applicant_username=applicant_registration.username and dak_status='1' and forward_to_pfno='" . $_SESSION['pf_number'] . "' ";

									$result_emp = mysqli_query($con, $query_emp);
									$sr = 1;
									while ($value_emp = mysqli_fetch_array($result_emp)) {
										echo "
								<tr>
								<td>" . $sr++ . "</td>
								<td>" . $value_emp['ex_emp_pfno'] . "</td>
								<td>" . $value_emp['ex_empname'] . "</td>
								<td>" . $value_emp['applicant_name'] . "</td>
								<td>" . getcase($value_emp['category']) . "</td>";
										if ($value_emp['rcc_note_status'] == 1) {

											echo "<td><a class='btn btn-primary btnn'   href='nominating_note_fw.php?id=" . $value_emp['id'] . "&ex_emp_pfno=" . $value_emp['ex_emp_pfno'] . "&username=" . $value_emp['username'] . "&case=" . $value_emp['category'] . "'>Show</a>&nbsp;<a class='btn btn-primary btnn'   href='nominating_note_fw_update.php?id=" . $value_emp['id'] . "&ex_emp_pfno=" . $value_emp['ex_emp_pfno'] . "&username=" . $value_emp['username'] . "&case=" . $value_emp['category'] . "'>Update</a></td>";
										} else {
											echo "<td><a class='btn btn-primary btnn'   href='basic_details.php?id=" . $value_emp['id'] . "&ex_emp_pfno=" . $value_emp['ex_emp_pfno'] . "&username=" . $value_emp['username'] . "&case=" . $value_emp['category'] . "'>Add Note</a></td>";
										}


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
			<div class="col-md-12">
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<div class="portlet box blue-hoki">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-globe"></i>Approved Nominating Application List From DPO
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
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
									<?php
									$con = dbcon1();
									$query_emp = "SELECT forward_application.id,forward_application.ex_emp_pfno as ex_emp_pfno,forward_application.applicant_username as username,applicant_registration.ex_empname as ex_empname,applicant_name,category,hold_status,rcc_note_status FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_application.applicant_username=applicant_registration.username and dak_status=0 and (hold_status='1' or hold_status='0' ) AND return_status=0 and (rcc_note_status=1 or rcc_note_status=0) and drm_approve=0 AND forward_to_pfno='" . $_SESSION['pf_number'] . "' GROUP BY forward_application.ex_emp_pfno order by forward_application.id desc ";

									$result_emp = mysqli_query($con, $query_emp);


									$sr = 1;
									while ($value_emp = mysqli_fetch_array($result_emp)) {
										echo "
								<tr>
								<td>" . $sr++ . "</td>
								<td>" . $value_emp['ex_emp_pfno'] . "</td>
								<td>" . $value_emp['ex_empname'] . "</td>
								<td>" . $value_emp['applicant_name'] . "</td>
								<td>" . getcase($value_emp['category']) . "</td>";

										$sql = mysqli_query($con, "SELECT status from nomination_note where ex_emp_pfno='" . $value_emp['ex_emp_pfno'] . "'");
										$res = mysqli_fetch_array($sql);
										if ($res['status'] == 1 && $value_emp['hold_status'] == 1 && $value_emp['rcc_note_status'] == 1) {
											echo "<td><a class='btn btn-primary btnn' href='nomi_show.php?id=" . $value_emp['id'] . "&ex_emp_pfno=" . $value_emp['ex_emp_pfno'] . "&username=" . $value_emp['username'] . "&case=" . $value_emp['category'] . "'>Show</td>";
										} else {

											echo "<td><a class='btn btn-primary disabled btnn' >Show</td>";
										}


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