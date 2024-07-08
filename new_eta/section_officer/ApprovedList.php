<?php
$GLOBALS['flag']="4.8";
include('common/header.php');
include('common/sidebar.php');
?>
		
			<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Verified Movement TA list of Sub-ordinates</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
			
		
		<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6">
						<b>All Verified TA List</b>
					</div>
					<div class="caption col-md-6 text-right backbtn">
						<a href="#."></a>
					</div>
				</div>
				<div class="portlet-body form">
						
	<form method="POST">										
		<div class="form-body add-train">
			<div class="row add-train-title">
				<div class="col-md-12">
					<div class="form-group">
						<!-- <label class="control-label"><h4 class="">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label> -->
						<div class="portlet-body">
								<div class="table-scrollable summary-table">
								<table id="example1" class="table table-hover table-bordered display">
									<thead>
										<tr class="warning">
											<th>संदर्भ / Reference</th>
											<th>नाम / Name</th>
											<th>वर्ष  / Year</th>
											<th>माह  / Month</th>
											<th>कुल दूरी / Total Distance</th>
											<th>कुल दर / Total Rate </th>
											<th>लागू माह / Applied Month </th>
											<th>कार्रवाई / Action</th>
										</tr>										
									</thead>
									<tbody>
										<?php
											$cnt=0;
											function get_employee($id)
											{
												global $conn;
												$query = mysqli_query($conn,"select name from employees where pfno='$id'");
												$result = mysqli_fetch_array($query);
												return $result['name'];
											}
											if($_SESSION['role']=='BO')
											{
												$query = "SELECT MONTHNAME(  str_to_date(taentry_master.created_date,'%d/%m/%Y') ) as created, taentry_master.reference_no, taentry_master.TAYear, taentry_master.empid as empid, taentry_master.TAMonth, SUM(taentrydetails.distance) AS distance, SUM(taentrydetails.amount) as rate FROM taentry_master INNER JOIN taentrydetails ON taentry_master.reference_no = taentrydetails.reference_no WHERE taentry_master.reference_no IN (select reference_id  from forward_data where forward_data.fowarded_to='".$_SESSION['empid']."' and admin_approve='0' and admin_returned_status='0' AND depart_time is not null) group by taentry_master.reference_no";
											}else if($_SESSION['role']=='OS')
											{
												$query = "SELECT MONTHNAME(  str_to_date(taentry_master.created_date,'%d/%m/%Y') ) as created, taentry_master.reference_no, taentry_master.TAYear, taentry_master.empid as empid, taentry_master.TAMonth, SUM(taentrydetails.distance) AS distance, SUM(taentrydetails.amount) as rate FROM taentry_master INNER JOIN taentrydetails ON taentry_master.reference_no = taentrydetails.reference_no WHERE taentry_master.reference_no IN (select reference_id  from forward_data where forward_data.fowarded_to='".$_SESSION['empid']."' and admin_approve='1' and admin_returned_status='0') group by taentry_master.reference_no";
											}
											else
											{
												$query = "SELECT MONTHNAME(  str_to_date(taentry_master.created_date,'%d/%m/%Y') ) as created, taentry_master.reference_no, taentry_master.TAYear, taentry_master.empid as empid, taentry_master.TAMonth, SUM(taentrydetails.distance) AS distance, SUM(taentrydetails.amount) as rate FROM taentry_master INNER JOIN taentrydetails ON taentry_master.reference_no = taentrydetails.reference_no WHERE taentry_master.reference_no IN (select reference_id  from forward_data where forward_data.fowarded_to='".$_SESSION['empid']."' AND forward_data.depart_time != '') group by taentry_master.reference_no";
											}
											// echo $query;
												$result = mysqli_query($conn,$query);
												while($val = mysqli_fetch_array($result))
												{
													if($val['reference_no']!=null)
													{
													echo "
													<tr>
														<td>".$val['reference_no']."</td>
														<td>".get_employee($val['empid'])."</td>
														<td>".$val['TAYear']."</td>
														<td>".$val['TAMonth']."</td>
														<td>".$val['distance']."</td>
														<td>".$val['rate']."</td>
														<td>".$val['created']."</td>
														<td><a href='show_seperate_approve_1.php?ref_no=".$val['reference_no']."&empid=".$val['empid']."' class='btn btn-primary'>Show</a>
													</tr>
													";
													$cnt++;
													}
												}
										?>
									</tbody>
								</table>
							</div>
							<?php  
								// function get_employee($id)
								// {
								// 	$query = mysqli_query("select name from employees where pfno='$id'");
								// 	$result = mysqli_fetch_array($query);
								// 	return $result['name'];
								// }
							?>
							<div class="text-right">
								<!-- <button class="btn yellow">Print</button> -->
							</div>
						</div>
					</div>
					
				</div>
			</div>
	</div>
</form>				

				</div>
			</div>

			
		</div>
	</div>
<?php
	include 'common/footer.php';
?>