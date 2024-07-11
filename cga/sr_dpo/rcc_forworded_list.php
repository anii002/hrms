<?php
	$GLOBALS['flag']="1.8";
	include('common/header.php');
	include('common/sidebar.php');
	$con=dbcon1();
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Forworded & Apporved Application List
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
								<th>Applicant Userame</th>
								<th>Category</th>
								<th>Action</th>
								
							</tr>
							</thead>
							<tbody>
								<?php
								$query_emp = "SELECT * FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and  forward_from_pfno='".$_SESSION['pf_number']."' and return_status=0  group by forward_application.ex_emp_pfno order by forward_application.id desc  ";
								$result_emp = mysqli_query($con,$query_emp);
								echo mysqli_error($con);
								$sr=1;
								while($value_emp = mysqli_fetch_array($result_emp))
								{
									
									if($value_emp['hold_status']==1 || $value_emp['hold_status']==0)
									{
								echo "
								<tr>
								<td>".$sr++."</td>
								<td>".$value_emp['ex_emp_pfno']."</td>
								<td>".$value_emp['ex_empname']."</td>
								<td>".$value_emp['applicant_name']."</td>
								<td>".$value_emp['username']."</td>
								<td>".getcase($value_emp['category'])."</td>
								<td><a class='btn btn-primary btnn' data-toggle='modal' value='".$value_emp['username']."' id='".$value_emp['ex_emp_pfno']."' mass='".$value_emp['id']."' href='track-modul.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."''>Status</a>&nbsp;&nbsp;<a class='btn btn-default' href='show_application.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show Application</a></td>";
								
								echo "</tr>";
									} 
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
</div>
<?php
	include 'common/footer.php';
?>

<script type="text/javascript">
  $('#DataTables_Table_22').DataTable( {
                    dom: 'Bfrtip',
                    "pageLength": 5,
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );
</script>