<?php
	$GLOBALS['flag']="4.95";
	include('common/header.php');
	include('common/sidebar.php');
?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 View Application
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="dashboard.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">View Application</a>
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
							<div class="caption col-md-6 col-xs-6">
								View Application
							</div>
					<!-- <div class="caption col-md-6 text-right backbtn">
						<button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
					</div> -->
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<!-- <div class="col-md-6">
										<div class="btn-group">
											<a class="btn btn-circle blue" href="add-enotification.php">Add e-notification</a>
										</div>
									</div> -->
								<!-- 	<div class="col-md-6">
										<div class="btn-group pull-right">
											<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="#">
													Print </a>
												</li>
												<li>
													<a href="#">
													Save as PDF </a>
												</li>
												<li>
													<a href="#">
													Export to Excel </a>
												</li>
											</ul>
										</div>
									</div> -->
								</div>
							</div>
							
							<table id="example1" class="table table-striped table-bordered table-hover">
							<thead>
							<tr>
								<th>Sr No</th>
								<th>Employee Name</th>
								<th>PF No</th>
								<th>Subject</th>
								<th>Created Date</th>
								<th>Status</th>
								<th>Action</th>
					
								
							</tr>
							</thead>
							<tbody>
							<?php
							$counter = 0;
							dbcon3();
							// $qry = mysql_query("SELECT * FROM `add_application`");
							$qry = mysql_query("SELECT add_application.*,forward_appl.* FROM `add_application`,forward_appl WHERE add_application.application_id = forward_appl.appli_id AND add_application.pfno = '".$_SESSION['user']."' ORDER BY application_id DESC");
							echo  mysql_error();
							while($row = mysql_fetch_array($qry))
							{
							?>
							<tr class="odd gradeX">
								<td><?php echo ++$counter; ?></td>
								<?php
								dbcon2();
								$name = mysql_query("SELECT name FROM register_user WHERE emp_no = '".$row['pfno']."'");
								$row_emp_name = mysql_fetch_array($name);
								?>
								<td><?php echo $row_emp_name['name'];?></td>
								<td><?php echo $row['pfno'];?></td>
								<td><?php echo $row['purpose'];?></td>
								<td><?php echo $row['created_date'];?></td>
									<!-- <a class="btn btn-circle green" href="<?php echo 'control/'.$row['file'];?>">View</a> -->
	
									<?php
									if($row['clerk_status'] == 1 && $row['cos_status'] == 0)
									{
									?>
										<td style="color:green;">Clerk Approved</td>
									<?php
									}
									elseif($row['clerk_status'] == 1 && $row['cos_status'] == 1)
									{
									?>
									    <td style="color:green;">Chief OS Closed</td>
									<?php
									}
									else
									{
									?>
									    <td style="color:red;">Pending</td>
	
								    <?php
									}
									?>
									<td><a class="btn btn-circle green" href="view_application_details_approved.php?application_id=<?php echo $row['application_id'];?>">View</a></td>
							</tr>
							<?php
							}
							?>
							</tbody>
							</table>
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
	
    $(document).on('click','.deleteapplication',function(){
    	var id=$(this).val();
    	// alert(id);
    	var result = confirm("Confirm!!! Proceed for Application delete?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'deleteapplication', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="view_application.php";
          });
        }
    });
</script>