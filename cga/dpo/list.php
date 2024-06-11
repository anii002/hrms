<?php
	$GLOBALS['flag']="2.5";
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
								<i class="fa fa-globe"></i> Approved Application List
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
								<!-- <th>Applicant Userame</th> -->
								<th>Category</th>
								<th>Action</th>
								
							</tr>
							</thead>
							<tbody>
								<?php
								dbcon1();
								//echo "<br>".$s="SELECT * FROM `forward_application` where  forward_to_pfno='".$_SESSION['pf_number']."'";
								$query_emp1 = mysql_query("SELECT * FROM `forward_application` where  forward_to_pfno='".$_SESSION['pf_number']."' ");
									$res=mysql_fetch_array($query_emp1);

									$qq=mysql_query("SELECT pf_number,role from login where pf_number='".$res['forward_from_pfno']."' and role=7 ");
									$res1=mysql_fetch_array($qq);
									//print_r($res);
									// echo "<br>";
									// print_r($res1);
									//$query_emp="";
									if($res['forward_from_pfno']==$res1['pf_number'] && $res['forward_to_pfno']==$_SESSION['pf_number'] && $res['hold_status']==1 && $res['dak_status']==1 ){
										//echo "jhj  working";
									}
									else
									{


										 $query_emp = "SELECT forward_application.id as f_id,hold_status,drm_approve,applicant_registration.* FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno  and forward_to_pfno='".$_SESSION['pf_number']."' order by forward_application.id desc limit 1 ";
										

								$query_emp;
								$result_emp = mysql_query($query_emp);
								echo mysql_error();
								$sr=1;
								while($value_emp = mysql_fetch_array($result_emp))
								{
									//echo $value_emp['f_id'];
									//if(($value_emp['hold_status']==1 && $value_emp['drm_approve']==1)||($value_emp['hold_status']==0 && $value_emp['drm_approve']==0))
									if($value_emp['hold_status']==1 && $value_emp['drm_approve']==1)
									{
								echo "
								<tr>
								<td>".$sr++."</td>
								<td>".$value_emp['ex_emp_pfno']."</td>
								<td>".$value_emp['ex_empname']."</td>
								<td>".$value_emp['applicant_name']."</td>
								
								<td>".getcase($value_emp['category'])."</td>
								<td><a class='btn btn-primary btnn'  href='submit.php?id=".$value_emp['f_id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show</a></td>";
								
								echo "</tr>";
									} 

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