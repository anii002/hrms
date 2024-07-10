<?php
	$GLOBALS['flag']="5.4";
	include('common/header.php');
	include('common/sidebar.php');
	include('control/function.php');
?>
<style type="text/css">
	.cos
	{
		display: none;
	}
	.clerk
	{
		display: none;
	}
	.admin
	{
		display: none;
	}
</style>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 All Application Status
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="dashboard.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">All Application Status</a>
					</li>
				</ul>
				<div class="page-toolbar">
					<div id="" class="pull-right tooltips btn btn-fit-height grey-salt">
						<i class=""></i> <span><?php echo date('Y/m/d H:i:s'); ?></span>
						<!-- <span class="thin uppercase visible-lg-inline-block"></span> -->
						<!-- <i class="fa fa-angle-down"></i> -->
					</div>
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				
				
				
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-list-alt"></i>All Application Status
							</div>
							
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-2">
										<div class="btn-group pull-right">
											<select id="select" class="form-control" style="width: 125%;">
												<option selected value="0">
												All Application Status
												</option>
												<option value="1">
												Admin
												</option>
												<option value="2">
												Billunit Clerk 
												</option>
												<option value="3">
												Chief OS 
												</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<!-- All -->
							<div class="all">
							<table id="tbl_employee_1" class="table table-striped table-bordered table-hover">
							<thead>
							<tr>
								<th>Sr No</th>
								<th>Employee Name</th>
								<th>PF No</th>
								<th>Department</th>
								<th>BillUnit</th>
								<th>Subject</th>
								<th>Received Date/Time</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$counter = 0;
							dbcon3();
							$qry = mysql_query("SELECT add_application.*,forward_appl.* FROM `add_application`,forward_appl WHERE add_application.application_id = forward_appl.appli_id ORDER BY application_id DESC");
							echo  mysql_error();
							while($row = mysql_fetch_array($qry))
							{
								dbcon2();	
								 $emp_query_admin1 = mysql_query("SELECT name FROM register_user WHERE emp_no = '".$row['forwarded_to']."'");
								 $emp_row_admin1 = mysql_fetch_array($emp_query_admin1);
								  dbcon2();	
								 $emp_query_clerk1 = mysql_query("SELECT name FROM register_user WHERE emp_no = '".$row['forwarded_to_clerk']."'");
								 $emp_row_clerk1 = mysql_fetch_array($emp_query_clerk1);
								 dbcon2();	
								 $emp_query_cos1 = mysql_query("SELECT name FROM register_user WHERE emp_no = '".$row['forwarded_to_cos']."'");
								 $emp_row_cos1 = mysql_fetch_array($emp_query_cos1);
							?>
							<tr class="odd gradeX">
								<td><?php echo ++$counter; ?></td>
								<?php
								dbcon2();
								$name = mysql_query("SELECT name,department FROM register_user WHERE emp_no = '".$row['pfno']."'");
								$row_emp_name = mysql_fetch_array($name);
								?>
								<td><?php echo $row_emp_name['name'];?></td>
								<td><?php echo $row['pfno'];?></td>
								<td><?php echo getdepartment($row_emp_name['department']);?></td>
								<td><?php echo $row['billunit'];?></td>
								<td><?php echo $row['purpose'];?></td>
								<td><?php echo $row['created_date'];?></td>
								<?php
								// 	if($row['admin_status'] == 1 && $row['clerk_status'] == 0)
								// 	{
								// 		$tmp = 'Admin Approved'."<br>"."(".$emp_row_admin1['name'].")";
								// 	}
								// 	elseif($row['clerk_status'] == 1 && $row['cos_status'] == 0)
								// 	{
								// 		$tmp = 'Clerk Approved'."<br>"."(".$emp_row_clerk1['name'].")";
								// 	}
								// 	elseif($row['admin_status'] == 1 && $row['clerk_status'] == 1 && $row['cos_status'] == 1)
								// 	{
								// 		$tmp = 'COS Closed'."<br>"."(".$emp_row_cos1['name'].")";
								// 	}
								// 	else
								// 	{
								// 		$tmp = 'Pending';
								// 	}
								
								    if($row['admin_status'] == 1 && $row['clerk_status'] == 0)
									{
								?>
										<td style="color:green;"> Admin Approved<br>(<?php echo $emp_row_admin1['name'].")"; ?></td>
								<?php
									}
									elseif($row['clerk_status'] == 1 && $row['cos_status'] == 0)
									{
								?>
								        <td style="color:green;"> Clerk Approved<br>(<?php echo $emp_row_clerk1['name'].")"; ?></td>
								<?php
									}
									elseif($row['admin_status'] == 1 && $row['clerk_status'] == 1 && $row['cos_status'] == 1)
									{
								?>
								        <td style="color:green;"> Chief OS Closed<br>(<?php echo $emp_row_cos1['name'].")"; ?></td>
								<?php
									}
									else
									{
								?>
								        <td style="color:red;">Pending</td>
								<?php
									}
								?>
									<!--<td style="color:red;"><?php //echo $tmp; ?></td>-->
								<td>
									<a class="btn btn-circle green" href="view_application_details_approved.php?application_id=<?php echo $row['application_id'];?>">View</a>
								</td>
							</tr>
							<?php
							}
							?>
							</tbody>
							</table>
						</div>
						<!-- All -->
						<!-- Admin -->
							<div class="admin">
							<table id="tbl_employee_2" class="table table-striped table-bordered table-hover">
							<thead>
							<tr>
								<th>Sr No</th>
								<th>Employee Name</th>
								<th>PF No</th>
								<th>Department</th>
								<th>BillUnit</th>
								<th>Subject</th>
								<th>Received Date/Time</th>
								<th>Status</th>
								<th>Approved Date/Time</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$counter = 0;
							dbcon3();
							$qry = mysql_query("SELECT add_application.*,forward_appl.* FROM `add_application`,forward_appl WHERE add_application.application_id = forward_appl.appli_id AND forward_appl.admin_status IN ('0','1') ORDER BY application_id DESC");
							echo  mysql_error();
							while($row = mysql_fetch_array($qry))
							{	
								 dbcon2();	
								 $emp_query_admin = mysql_query("SELECT name FROM register_user WHERE emp_no = '".$row['forwarded_to']."'");
								 $emp_row_admin = mysql_fetch_array($emp_query_admin);
							?>
							<tr class="odd gradeX">
								<td><?php echo ++$counter; ?></td>
								<?php
								dbcon2();
								$name = mysql_query("SELECT name,department FROM register_user WHERE emp_no = '".$row['pfno']."'");
								$row_emp_name = mysql_fetch_array($name);
								?>
								<td><?php echo $row_emp_name['name'];?></td>
								<td><?php echo $row['pfno'];?></td>
								<td><?php echo getdepartment($row_emp_name['department']);?></td>
								<td><?php echo $row['billunit'];?></td>
								<td><?php echo $row['purpose'];?></td>
								<td><?php echo $row['arrived_at_admin'];?></td>
								<?php
								// 	if($row['forward_status'] == 1 && $row['admin_status'] == 0)
								// 	{
								// 		$tmp = 'Admin Pending'."<br>"."(".$emp_row_admin['name'].")";
								// 	}
								// 	else
								// 	{
								// 		$tmp = 'Admin Approved'."<br>"."(".$emp_row_admin['name'].")";
								// 	}
								?>
									<!--<td style="color:red;"><?php //echo $tmp; ?></td>-->
								<?php
									if($row['forward_status'] == 1 && $row['admin_status'] == 0)
									{
								?>
										<td style="color:red;"> Admin Pending<br>(<?php echo $emp_row_admin['name'].")"; ?></td>
								<?php
									}
									else
									{
								?>
										<td style="color:green;"> Admin Approved<br>(<?php echo $emp_row_admin['name'].")"; ?></td>
								<?php
									}
								?>
									<td><?php echo $row['arrived_time'];?></td>
								<td>
									<a class="btn btn-circle green" href="view_application_details_approved.php?application_id=<?php echo $row['application_id'];?>">View</a>
								</td>
							</tr>
							<?php
							}
							?>
							</tbody>
							</table>
						</div>
						<!-- Admin -->
						<!-- clerk-->
						<div class="clerk">
							<table id="tbl_employee_3" class="table table-striped table-bordered table-hover">
							<thead>
							<tr>
								<th>Sr No</th>
								<th>Employee Name</th>
								<th>PF No</th>
								<th>Department</th>
								<th>BillUnit</th>
								<th>Subject</th>
								<th>Received Date/Time</th>
								<th>Status</th>
								<th>Approved Date/Time</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$counter = 0;
							dbcon3();
							$qry = mysql_query("SELECT add_application.*,forward_appl.* FROM `add_application`,forward_appl WHERE add_application.application_id = forward_appl.appli_id AND forward_appl.clerk_status IN ('0','1') ORDER BY application_id DESC");
							echo  mysql_error();
							while($row = mysql_fetch_array($qry))
							{
								 dbcon2();	
								 $emp_query_clerk = mysql_query("SELECT name FROM register_user WHERE emp_no = '".$row['forwarded_to_clerk']."'");
								 $emp_row_clerk = mysql_fetch_array($emp_query_clerk);
							?>
							<tr class="odd gradeX">
								<td><?php echo ++$counter; ?></td>
								<?php
								dbcon2();
								$name = mysql_query("SELECT name,department FROM register_user WHERE emp_no = '".$row['pfno']."'");
								$row_emp_name = mysql_fetch_array($name);
								?>
								<td><?php echo $row_emp_name['name'];?></td>
								<td><?php echo $row['pfno'];?></td>
								<td><?php echo getdepartment($row_emp_name['department']);?></td>
								<td><?php echo $row['billunit'];?></td>
								<td><?php echo $row['purpose'];?></td>
								<td><?php echo $row['arrived_time'];?></td>
								<?php
								// 	if($row['admin_status'] == 1 && $row['clerk_status'] == 0)
								// 	{
								// 		$tmp = 'Clerk Pending'."<br>"."(".$emp_row_clerk['name'].")";
								// 	}
								// 	else
								// 	{
								// 		$tmp = 'Clerk Approved'."<br>"."(".$emp_row_clerk['name'].")";
								// 	}
									?>
									<!--<td style="color:red;"><?php //echo $tmp; ?></td>-->
								<?php
									if($row['admin_status'] == 1 && $row['clerk_status'] == 0)
									{
								?>
										<td style="color:red;"> Clerk Pending<br>(<?php echo $emp_row_clerk['name'].")"; ?></td>
								<?php
									}
									else
									{
								?>
										<td style="color:green;"> Clerk Approved<br>(<?php echo $emp_row_clerk['name'].")"; ?></td>
								<?php
									}
								?>
									<td><?php echo $row['approved_time'];?></td>
								<td>
									<a class="btn btn-circle green" href="view_application_details_approved.php?application_id=<?php echo $row['application_id'];?>">View</a>
								</td>
							</tr>
							<?php
							}
							?>
							</tbody>
							</table>
						</div>
						<!-- clerk-->
						<!-- cos  -->
						<div class="cos">
							<table id="tbl_employee_4" class="table table-striped table-bordered table-hover">
							<thead>
							<tr>
								<th>Sr No</th>
								<th>Employee Name</th>
								<th>PF No</th>
								<th>Department</th>
								<th>Subject</th>
								<th>Received Date/Time</th>
								<th>Status</th>
								<th>Approved Date/Time</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$counter = 0;
							dbcon3();
							$qry = mysql_query("SELECT add_application.*,forward_appl.* FROM `add_application`,forward_appl WHERE add_application.application_id = forward_appl.appli_id AND forward_appl.cos_status IN ('0','1') ORDER BY application_id DESC");
							echo  mysql_error();
							while($row = mysql_fetch_array($qry))
							{
								dbcon2();	
								 $emp_query_cos = mysql_query("SELECT name FROM register_user WHERE emp_no = '".$row['forwarded_to_cos']."'");
								 $emp_row_cos = mysql_fetch_array($emp_query_cos);
							?>
							<tr class="odd gradeX">
								<td><?php echo ++$counter; ?></td>
								<?php
								dbcon2();
								$name = mysql_query("SELECT name,department FROM register_user WHERE emp_no = '".$row['pfno']."'");
								$row_emp_name = mysql_fetch_array($name);
								?>
								<td><?php echo $row_emp_name['name'];?></td>
								<td><?php echo $row['pfno'];?></td>
								<td><?php echo getdepartment($row_emp_name['department']);?></td>
								<td><?php echo $row['purpose'];?></td>
								<td><?php echo $row['approved_time'];?></td>
								<?php
								// 	if($row['clerk_status'] == 1 && $row['cos_status'] == 0)
								// 	{
								// 		$tmp = 'COS Pending'."<br>"."(".$emp_row_cos['name'].")";
								// 	}
								// 	else
								// 	{
								// 		$tmp = 'COS Closed'."<br>"."(".$emp_row_cos['name'].")";
								// 	}
									?>
									<!--<td style="color:red;"><?php //echo $tmp; ?></td>-->
								<?php
									if($row['clerk_status'] == 1 && $row['cos_status'] == 0)
									{
								?>
										<td style="color:red;"> Chief OS Pending<br>(<?php echo $emp_row_cos['name'].")"; ?></td>
								<?php
									}
									else
									{
								?>
										<td style="color:green;"> Chief OS Approved<br>(<?php echo $emp_row_cos['name'].")"; ?></td>
								<?php
									}
								?>
									<td><?php echo $row['cos_approved_time'];?></td>
								<td>
									<a class="btn btn-circle green" href="view_application_details_cos_approved.php?application_id=<?php echo $row['application_id'];?>">View</a>
								</td>
							</tr>
							<?php
							}
							?>
							</tbody>
							</table>
						</div>
						<!-- cos  -->
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php
	include('common/footer.php');
?>
<script type="text/javascript">
    $(document).ready(function(){
    $('#select').on('change', function() {
      if(this.value == '0')
      {
      	$(".admin").hide();
        $(".clerk").hide();
        $(".cos").hide();
        $(".all").show();
      }
      else if(this.value == '1')
      {
        $(".admin").show();
        $(".clerk").hide();
        $(".cos").hide();
        $(".all").hide();
      }
      else if(this.value == '2')
      {
        $(".admin").hide();
        $(".clerk").show();
        $(".cos").hide();
        $(".all").hide();
      }
       else if(this.value == '3')
      {
      	$(".admin").hide();
        $(".clerk").hide();
        $(".cos").show();
        $(".all").hide();
      }
    });
});
$('#tbl_employee_1').DataTable( {
} );
$('#tbl_employee_2').DataTable( {
} );
$('#tbl_employee_3').DataTable( {
} );
$('#tbl_employee_4').DataTable( {
} );
</script>