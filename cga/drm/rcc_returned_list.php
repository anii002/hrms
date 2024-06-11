<?php
	$GLOBALS['flag']="1.6";
	include('common/header.php');
	include('common/sidebar.php');
	dbcon1();
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Rejected Application List
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
								<th>Rejected Date</th>
								<th>Action</th>
								
							</tr>
							</thead>
							<tbody>
							<?php
								 $query_emp = "SELECT forward_application.id,forward_application.ex_emp_pfno as ex_emp_pfno,forward_application.applicant_username as username,applicant_registration.ex_empname as ex_empname,applicant_name,category,forward_application.remark,arrived_time,hold_status FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_application.applicant_username=applicant_registration.username  AND  return_status='1' and drm_approve=0 and rcc_note_status=0 AND forward_from_pfno='".$_SESSION['pf_number']."' ";
								
								$result_emp = mysql_query($query_emp);
								$sr=1;
								while($value_emp = mysql_fetch_array($result_emp))
								{
									if($value_emp['hold_status']==1 || $value_emp['hold_status']==0 )
									{
									 echo "
									
								<tr>
								<td>".$sr++."</td>
								<td>".$value_emp['ex_emp_pfno']."</td>
								<td>".$value_emp['ex_empname']."</td>
								<td>".$value_emp['applicant_name']."</td>
								<td>".getcase($value_emp['category'])."</td>
								<td>".$value_emp['remark']."</td>
								<td>".$value_emp['arrived_time']."</td>
								";
								
									echo "<td><a class='btn btn-primary btnn' href='show_application.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show</a></td>";
								//<a class='btn btn-primary btnn'   href='deathcase.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show</a>
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