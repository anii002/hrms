<?php
	$GLOBALS['flag']="1.7";
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
								<i class="fa fa-globe"></i>Approved Application List
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
								dbcon1();
								$sql=mysql_query("SELECT * from forward_application where forward_to_pfno='".$_SESSION['pf_number']."' and hold_status=1 and rcc_note_status=1 order by id desc ");
								$qs=mysql_fetch_array($sql);

								$sql1=mysql_query("SELECT pf_number from login where pf_number='".$qs['forward_from_pfno']."' and  role='4' ");
								$qs1=mysql_fetch_array($sql1);


								// $sql2=mysql_query("SELECT pf_number from login where pf_number='".$qs['forward_from_pfno']."' and  role='5' ");
								// $qs2=mysql_fetch_array($sql2);

								if($qs['forward_to_pfno']==$_SESSION['pf_number'] && $qs['forward_from_pfno']==$qs1['pf_number'] && $qs['hold_status']==1 && $qs['rcc_note_status']==1)
								{

								}
								// else if($qs['forward_to_pfno']==$_SESSION['pf_number'] && $qs['forward_from_pfno']==$qs2['pf_number'] && $qs['hold_status']==0 && $qs['rcc_note_status']==0)
								// {

								// }
								else
								 {

									 $query_emp = "SELECT forward_application.id,forward_application.ex_emp_pfno as ex_emp_pfno,forward_application.applicant_username as username,applicant_registration.ex_empname as ex_empname,applicant_name,category FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_application.applicant_username=applicant_registration.username and hold_status='1' AND rcc_note_status=1 and drm_approve=0  AND forward_to_pfno='".$_SESSION['pf_number']."' ";
								
								$result_emp = mysql_query($query_emp);
								$sr=1;
								while($value_emp = mysql_fetch_array($result_emp))
								{
									 echo "
								<tr>
								<td>".$sr++."</td>
								<td>".$value_emp['ex_emp_pfno']."</td>
								<td>".$value_emp['ex_empname']."</td>
								<td>".$value_emp['applicant_name']."</td>
								<td>".getcase($value_emp['category'])."</td>";
								if($value_emp['category']==1)
								{
									echo "<td><a class='btn btn-primary btnn' href='deathcase_report.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show</a>&nbsp;<a class='btn btn-primary btnn' href='update_application.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Update Application</a></td>";
								}
								else if($value_emp['category']==2)
								{
									echo "<td><a class='btn btn-primary btnn' href='missingcase_report.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show</a>&nbsp;<a class='btn btn-primary btnn' href='update_application.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Update Application</a></td>";
								}
								else if($value_emp['category']==3)
								{
									echo "<td><a class='btn btn-primary btnn' href='medicalcase_report.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show</a>&nbsp;<a class='btn btn-primary btnn' href='update_application.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Update Application</a></td>";
								}
								else if($value_emp['category']==4)
								{
									echo "<td><a class='btn btn-primary btnn' href='minor_registration_report.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show</a>&nbsp;<a class='btn btn-primary btnn' href='update_application.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Update Application</a></td>";
								}

								
								
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