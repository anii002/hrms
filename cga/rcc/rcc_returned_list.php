<?php
	$GLOBALS['flag']="1.6";
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
								<th>Date</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								
								dbcon1();
								

								$sql=mysql_query("SELECT * from forward_application where forward_to_pfno='".$_SESSION['pf_number']."' and return_status='1' ");
								$m_sql=mysql_fetch_array($sql);

								$sql1=mysql_query("SELECT pf_number from login where pf_number='".$m_sql['forward_from_pfno']."' and role='5' ");
								$m_sql1=mysql_fetch_array($sql1);

								if($m_sql['forward_from_pfno']==$m_sql1['pf_number'] && $m_sql['return_status']==1 && $m_sql['hold_status']==0 )
								{
								    	dbcon1();
								dbcon2();

								$query_emp = "SELECT forward_application.id,forward_application.ex_emp_pfno as ex_emp_pfno,forward_application.applicant_username as username,applicant_registration.ex_empname as ex_empname,applicant_name,category,forward_application.remark,rejected_by,return_status,hold_status,arrived_time FROM drmpsurh_cga.forward_application,drmpsurh_cga.applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_application.applicant_username=applicant_registration.username  AND hold_status=1 and  return_status='1' and forward_to_pfno='".$_SESSION['pf_number']."' ";

								}
								else
								{



									dbcon1();
								dbcon2();

								$query_emp = "SELECT forward_application.id,forward_application.ex_emp_pfno as ex_emp_pfno,forward_application.applicant_username as username,applicant_registration.ex_empname as ex_empname,applicant_name,category,forward_application.remark,rejected_by,return_status,hold_status,arrived_time FROM drmpsurh_cga.forward_application,drmpsurh_cga.applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_application.applicant_username=applicant_registration.username  AND hold_status=1 and  return_status='1' and forward_to_pfno='".$_SESSION['pf_number']."' ";
								}
								$result_emp = mysql_query($query_emp);
								$sr=1;
								while($value_emp = mysql_fetch_array($result_emp))
								{
									$sa=$value_emp['rejected_by'];
									$sa=explode(',', $sa);
									$name=$sa[0];
									$role=$sa[1];
									$sql=mysql_query("SELECT name,role_name from drmpsurh_sur_railway.resgister_user,drmpsurh_cga.login,drmpsurh_cga.master_role where resgister_user.emp_no=login.pf_number and master_role.role_shortname=login.role and emp_no='".$name."' and login.role='".$role."'");
									$sq=mysql_fetch_array($sql);
									$name2=$sq['name']." (".$sq['role_name'].")";

									$pf=$value_emp['ex_emp_pfno'];
								$id=$value_emp['id'];
								$username=$value_emp['username'];
									 echo "
								<tr>
								<td>".$sr++."</td>
								<td>".$value_emp['ex_emp_pfno']."</td>
								<td>".$value_emp['ex_empname']."</td>
								<td>".$value_emp['applicant_name']."</td>
								<td>".getcase($value_emp['category'])."</td>
								<td>".($value_emp['remark'])."</td>
								<td>".$name2."</td>
								<td>".$value_emp['arrived_time']."</td>
								";

									echo "<td><a class='btn btn-primary btnn'  href='rejected_update_application.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show</a>";
									if($value_emp['hold_status']==1)
									{
										echo"<a class='btn blue bnn' tbl_id='".$id."' user='".$username."' pf='".$pf."' data-toggle='modal' href='#basic'>Forward To </a>";
									}
									echo"</td>";
								
								
									
								echo "</tr>";
								} 
							
								?>
							</tbody>
							</table>
							
							<!-- <input type="text" name="pf_number" value="<?php ?>"> -->
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

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="control/adminProcess.php?action=rejected_app_update" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Forward To </h4>
				</div>
				<div class="modal-body">
					 <input type="hidden" id="ex_emp_pfno" name="ex_emp_pfno" value="" >
					 
					 <input type="hidden" id="fw_tbl_id" name="fw_tbl_id" value="">
					 <input type="hidden" id="username" name="username" value="">

					 <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								
									<select name="fw_to_pfno" id="fw_to_pfno" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
										<option value="" selected disabled>Select DPO Officer</option>
										  <?php
											 dbcon1();
											 dbcon2();
											 $query_emp =mysql_query("SELECT name as name,login.pf_number as pf_number,login.* from drmpsurh_cga.login,drmpsurh_sur_railway.resgister_user where resgister_user.emp_no=login.pf_number AND role='4' ");
											 					
											 while($value_emp = mysql_fetch_array($query_emp))
											 {
											  	echo "<option value='".$value_emp['pf_number']."'>".$value_emp['name']."</option>";
											 }
										  ?>
									</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								
								<button type="submit" class="btn blue">Forward</button>
									
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


$(document).on('click','.bnn',function(){
	var pf=$(this).attr('pf');
	var id=$(this).attr('tbl_id');
	var username=$(this).attr('user');
	//alert(pf+id);
	$("#fw_tbl_id").val(id);
	$("#ex_emp_pfno").val(pf);
	$("#username").val(username);

	// $.ajax({
	// 	type:'post',
	// 	url:'control/adminProcess.php',
	// 	data:'action=rejected_app_update&pf='+pf+'&id='+id,
	// 	success:function(data){
	// 		//alert(data);
	// 		if(data==1)
	// 		{
	// 			alert("Forwarded successfully..");
	// 			window.location="rcc_returned_list.php";

	// 		}
	// 		else
	// 		{
	// 			alert("Failed..");
	// 			window.location="rcc_returned_list.php";				
	// 		}
	// 	}
	// });
});

</script>