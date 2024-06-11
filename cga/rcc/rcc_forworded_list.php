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
								<i class="fa fa-globe"></i>Forworded Application List
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
								 dbcon1();
				// 				$sql=mysql_query("SELECT * from forward_application where forward_to_pfno='".$_SESSION['pf_number']."' and hold_status='1' and rcc_note_status='1'");
				// 				$qs=mysql_fetch_array($sql);

				// 				$sql1=mysql_query("SELECT pf_number from login where pf_number='".$qs['forward_from_pfno']."' and  role='4' ");
				// 				$qs1=mysql_fetch_array($sql1);

				// 				if($qs['forward_to_pfno']==$_SESSION['pf_number'] && $qs['forward_from_pfno']==$qs1['pf_number'] && $qs['hold_status']==1 && $qs['rcc_note_status']==1 && $qs['drm_approve']==0)
				// 				{

				// 				}
				// 				else
				// 				{
				// 				 	 $query_emp = "SELECT forward_application.id,forward_application.*,applicant_registration.* FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and dak_status=0 and (hold_status=1 or hold_status=0) and rcc_note_status=0 and drm_approve=0 and  forward_from_pfno='".$_SESSION['pf_number']."' group by forward_application.ex_emp_pfno order by forward_application.id desc ";
																
				// 				$result_emp = mysql_query($query_emp);

				// 				echo mysql_error();
				// 				$sr=1;
				// 				while($value_emp = mysql_fetch_array($result_emp))
				// 				{
								
				// 				echo "
				// 				<tr>
				// 				<td>".$sr++."</td>
				// 				<td>".$value_emp['ex_emp_pfno']."</td>
				// 				<td>".$value_emp['ex_empname']."</td>
				// 				<td>".$value_emp['applicant_name']."</td>
				// 				<td>".$value_emp['username']."</td>
				// 				<td>".getcase($value_emp['category'])."</td>
				// 				<td><a class='btn btn-primary btnn' data-toggle='modal' value='".$value_emp['username']."' id='".$value_emp['ex_emp_pfno']."' mass='".$value_emp['id']."' href='track-modul.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Status</a>&nbsp;&nbsp;";
				// 				if($value_emp['hold_status']==1 && $value_emp['depart_time']=='')
				// 				{
				// 					echo "<a class='btn btn-default' href='show_application.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."' disabled>Show Application</a></td>";	
				// 				}
				// 				else
				// 				{
				// 					echo "<a class='btn btn-default' href='show_application.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show Application</a></td>";
				// 				}
				// 				echo "</tr>";
				// 				} 
				// 			}
				                $sql=mysql_query("SELECT * from forward_application where forward_to_pfno='".$_SESSION['pf_number']."' and hold_status='1' and rcc_note_status='1'");
								$qs=mysql_fetch_array($sql);

								$sql1=mysql_query("SELECT pf_number from login where pf_number='".$qs['forward_from_pfno']."' and  role='4' ");
								$qs1=mysql_fetch_array($sql1);

								if($qs['forward_to_pfno']==$_SESSION['pf_number'] && $qs['forward_from_pfno']==$qs1['pf_number'] && $qs['hold_status']==1 && $qs['rcc_note_status']==1 && $qs['drm_approve']==0)
								{
									$query_emp ="SELECT forward_application.id as fid,forward_application.*,applicant_registration.*,hold_status,dak_status,rcc_note_status,forward_application.ex_emp_pfno as pf FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and (hold_status=0 or hold_status=1) and rcc_note_status=0 and drm_approve=0 and dak_status=0 and forward_application.cc_status is NULL AND forward_from_pfno='".$_SESSION['pf_number']."' and forward_application.forward_to_pfno in(SELECT pf_number from login,forward_application where login.pf_number=forward_application.forward_to_pfno AND role='4' ORDER BY forward_application.id ) order by forward_application.id desc";

								}
								else
								{
								 	 // $query_emp1 = mysql_query("SELECT forward_application.id as fidd FROM `forward_application` where  (hold_status=0 or hold_status=1) and rcc_note_status=0 and drm_approve=0 and dak_status=0 and forward_from_pfno='".$_SESSION['pf_number']."' ");
								 	 // $ed=mysql_fetch_array($query_emp1);
								 	 // $query_emp = "SELECT forward_application.id as fid,forward_application.*,applicant_registration.* FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_application.id='".$ed['fidd']."' ";
									$query_emp ="SELECT forward_application.id as fid,forward_application.*,applicant_registration.*,hold_status,dak_status,rcc_note_status,forward_application.ex_emp_pfno as pf FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and (hold_status=0 or hold_status=1) and rcc_note_status=0 and drm_approve=0 and dak_status=0 and forward_application.cc_status is NULL AND forward_from_pfno='".$_SESSION['pf_number']."' and forward_application.forward_to_pfno in(SELECT pf_number from login,forward_application where login.pf_number=forward_application.forward_to_pfno AND role='4' ORDER BY forward_application.id )order by forward_application.id desc";
																
								 
									}
									$result_emp = mysql_query($query_emp);

								echo mysql_error();
								$sr=1;
								while($value_emp = mysql_fetch_array($result_emp))
								{
									//echo $value_emp['fid'];
								
								echo "
								<tr>
								<td>".$sr++."</td>
								<td>".$value_emp['ex_emp_pfno']."</td>
								<td>".$value_emp['ex_empname']."</td>
								<td>".$value_emp['applicant_name']."</td>
								<td>".$value_emp['username']."</td>
								<td>".getcase($value_emp['category'])."</td>
								<td><a class='btn btn-primary btnn' data-toggle='modal' value='".$value_emp['username']."' id='".$value_emp['ex_emp_pfno']."' mass='".$value_emp['id']."' href='track-modul.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Status</a>&nbsp;&nbsp;";
								if($value_emp['hold_status']==1 && $value_emp['depart_time']=='')
								{
									echo "<a class='btn btn-default' href='show_application.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."' disabled>Show Application</a></td>";	
								}
								else
								{
									echo "<a class='btn btn-default' href='show_application.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show Application</a></td>";
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
								<th>Action</th>
								
							</tr>
							</thead>
							<tbody>
								<?php
								dbcon1();
								$query_emp = "SELECT forward_application.id,forward_application.ex_emp_pfno as ex_emp_pfno,forward_application.applicant_username as username,applicant_registration.ex_empname as ex_empname,applicant_name,category,forward_application.remark FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_application.applicant_username=applicant_registration.username and hold_status='0' AND return_status='1' AND forward_to_pfno='".$_SESSION['pf_number']."' ";
								
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
								<td>".getcase($value_emp['category'])."</td>
								<td>".$value_emp['remark']."</td>";
								
									echo "<td><a class='btn btn-primary btnn' href='show_application.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show</a></td>";
								//<a class='btn btn-primary btnn'   href='deathcase.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show</a>
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
  $('#DataTables_Table_22').DataTable( {
                    dom: 'Bfrtip',
                    "pageLength": 5,
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );
</script>