<?php
	$GLOBALS['flag']="1.8";
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
								$con=dbcon1();
								$query_emp = "SELECT forward_application.id,forward_application.ex_emp_pfno as ex_emp_pfno,forward_application.applicant_username as username,applicant_registration.ex_empname as ex_empname,applicant_name,category,status_add_data FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_application.applicant_username=applicant_registration.username and hold_status='1' AND forward_to_pfno='".$_SESSION['pf_number']."' ";
								
								$result_emp = mysqli_query($con,$query_emp);
								$sr=1;
								while($value_emp = mysqli_fetch_array($result_emp))
								{
									//echo '';
									 echo "
								<tr>
								<td>".$sr++."</td>
								<td>".$value_emp['ex_emp_pfno']."</td>
								<td>".$value_emp['ex_empname']."</td>
								<td>".$value_emp['applicant_name']."</td>
								<td>".getcase($value_emp['category'])."</td>";
								if($value_emp['status_add_data']==1)
								{
									echo "<td><a class='btn btn-primary' href='show_application_dec.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show Application</a></td>";
								}
								else
								{
									echo "<td><a class='btn btn-primary btnn' href='show_application1.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Add Data</a>&nbsp;
										<a class='btn red btnn' data-toggle='modal' href='#reject'>Reject</a>
								</td>";
								}
								
								
								$a=$value_emp['ex_emp_pfno'];
								$b=$value_emp['id'];
								echo "</tr>";
								} 
								?>
							</tbody>
							</table>
							<input type="hidden" id="ex_emp_pfno1" name="ex_emp_pfno" value="<?php echo $a; ?>">
									<input type="hidden" id="fw_tbl_id1" name="fw_tbl_id" value="<?php echo $b; ?>">
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
<div class="modal fade" id="reject" tabindex="-1" role="reject" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="control/adminProcess.php?action=reject" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Reject Application </h4>
				</div>
				<div class="modal-body">
					 <input type="hidden" id="ex_emp_pfno" name="ex_emp_pfno" value="" >
					 <!-- <input type="hidden" id="username" name="username" value="<?php echo $_GET['username']; ?>"> -->
					 <input type="hidden" id="fw_tbl_id" name="fw_tbl_id" value="">
					 <div class="row">
					 	<div class="col-md-12">
							<div class="form-group">
								<label>Reason</label>
									<textarea class="form-control" name="remark" rows="4"></textarea>
							</div>
						</div>
					 </div>
					 
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								
								<button type="submit" class="btn blue">Submit</button>
									
							</div>
						</div>
						
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn blue">Save changes</button> -->
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script type="text/javascript">
  $('#DataTables_Table_22').DataTable( {
                    dom: 'Bfrtip',
                    "pageLength": 5,
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );

  $(document).on('click','.btnn',function(){
  	var pf=$(this).attr("id");
  	var username=$(this).attr("value");
  	var id=$(this).attr("mass");

  	$("#ex_emp_pfno").val(pf);
  	$("#username").val(username);
  	$("#fw_tbl_id").val(id);

  });

  $(document).on('click','.btnn',function(){
  	var id=$("#fw_tbl_id1").val();
  	alert(id);
  	var pf=$("#ex_emp_pfno1").val();

  	$("#fw_tbl_id").val(id);
  	$("#ex_emp_pfno").val(pf);
  });
</script>