<?php
$GLOBALS['flag'] = "1.5";
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
										<th>Applicant Usename</th>
										<th>Category</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>

									<?php
									$con=dbcon1();
									$query_emp = "SELECT forward_application.id,applicant_registration.*,forward_application.* FROM forward_application,applicant_registration where applicant_registration.ex_emp_pfno=forward_application.ex_emp_pfno and hold_status=1 and dak_status=0 and forward_to_pfno='" . $_SESSION['pf_number'] . "' ";
									$result_emp = mysqli_query($con,$query_emp);
									$sr = 0;
									while ($value_emp = mysqli_fetch_array($result_emp)) {
										$sr++;
										$id = $value_emp['id'];
										echo "<input type='hidden' id='tbl_id' name='tbl_id' value='" . $id . "' >";
										echo "
								<tr>
								<td>$sr</td>
								<td>" . $value_emp['ex_emp_pfno'] . "</td>
								<td>" . $value_emp['ex_empname'] . "</td>
								<td>" . $value_emp['applicant_name'] . "</td>
								<td>" . $value_emp['username'] . "</td>
								<td>" . getcase($value_emp['category']) . "</td>";
										if ($value_emp['status_add_data'] == 1) {
											echo "<td><a class='btn btn-primary' href='show_application.php?id=" . $value_emp['id'] . "&ex_emp_pfno=" . $value_emp['ex_emp_pfno'] . "&username=" . $value_emp['username'] . "&case=" . $value_emp['category'] . "'>Show</a>&nbsp;&nbsp;<a  class='btn btn-primary' href='update_application.php?id=" . $value_emp['id'] . "&ex_emp_pfno=" . $value_emp['ex_emp_pfno'] . "&username=" . $value_emp['username'] . "&case=" . $value_emp['category'] . "'>Update Application</a></td>";
										} else {
											echo "<td><a class='btn btn-primary btnn' href='nomi_show.php?id=" . $value_emp['id'] . "&ex_emp_pfno=" . $value_emp['ex_emp_pfno'] . "&username=" . $value_emp['username'] . "&case=" . $value_emp['category'] . "'>Check Note</a>&nbsp;<a class='btn btn-primary btnn' href='show_application1.php?id=" . $value_emp['id'] . "&ex_emp_pfno=" . $value_emp['ex_emp_pfno'] . "&username=" . $value_emp['username'] . "&case=" . $value_emp['category'] . "'>Add Data</a></td>";
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

		$(document).on('click', '.btnn', function() {
			var pf = $(this).attr("id");
			var username = $(this).attr("value");
			var id = $(this).attr("mass");

			$("#ex_emp_pfno").val(pf);
			$("#username").val(username);
			$("#fw_tbl_id").val(id);

		});
	</script>