<?php
$GLOBALS['flag'] = "4.94";
include('common/header.php');
include('common/sidebar.php');
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
			Purpose
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="dashboard.php">Home / मुख पृष्ठ</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Purpose</a>
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
							<i class="fa fa-list-alt"></i>PURPOSE DETAILS 2019
						</div>

					</div>
					<div class="portlet-body">



						<div class="table-toolbar">
							<div class="row">
								<!-- <div class="col-md-6">
										<div class="btn-group">
											<a class="btn btn-circle blue" href="add_office_order.php">Add Office Order</a>
										</div>
									</div> -->
								<div class="col-md-6">

								</div>
							</div>
						</div>


						<table id="example1" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th colspan="6">
										<center>PURPOSE DETAILS</center>
									</th>
								</tr>
								<tr>
									<th>Sr No</th>
									<th>Purpose</th>
									<!-- <th>Station</th> -->
									<!-- <th>L No</th>
								<th>Department</th> -->
									<th>Action</th>

									<!--<th>Action</th>-->


								</tr>
							</thead>
							<tbody>
								<?php
								$counter = 0;
								$conn=dbcon3();
								$qry = mysqli_query($conn,"SELECT * FROM `purpose`");
								//$row = mysqli_fetch_array($qry);
								//print_r($row);
								while ($row = mysqli_fetch_array($qry)) {
								?>
									<tr class="odd gradeX">
										<td><?php echo ++$counter; ?></td>

										<td><?php echo $row['purpose']; ?></td>
										<!-- <td><?php echo $row['station']; ?></td> -->
										<!-- <td><?php echo $row['L No']; ?></td>
								<td><?php echo $row['Department']; ?></td> -->

										<td>
											<a class="btn btn-circle blue" href="update_purpose.php?purpose_id=<?php echo $row['purpose_id']; ?>">Update</a>
											<button class="btn btn-circle red deletepurpose" value="<?php echo $row['purpose_id']; ?>">Delete</button>
										</td>
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
	$(document).on('click', '.deletepurpose', function() {
		var id = $(this).val();
		// alert(id);
		var result = confirm("Confirm!!! Proceed for Purpose delete?");
		if (result == true) {
			$.ajax({
					url: 'control/adminProcess.php',
					type: 'POST',
					data: {
						action: 'deletepurpose',
						id: id
					},
				})
				.done(function(html) {
					alert(html);
					window.location = "view_purpose.php";
				});
		}
	});
</script>