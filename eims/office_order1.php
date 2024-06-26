<?php
$GLOBALS['flag'] = "4.91";
include('common/header.php');
include('common/sidebar1.php');
include('dbcon.php');
$conn1 = dbcon1();
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
			e-Office Order
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="dashboard.php">Home / मुख पृष्ठ</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">e-Office Order</a>
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
							<i class="fa fa-list-alt"></i>OFFICE ORDER DETAILS 2019
						</div>

					</div>
					<div class="portlet-body">
						<a target="_blank" style="font-size:20px; text-align:center;" href='https://cr.indianrailways.gov.in/view_section.jsp?fontColor=black&backgroundColor=LIGHTSTEELBLUE&lang=0&id=0,6,1191,1197,1348'>View Online Office Order</a>

						<!--<div class="table-toolbar">-->
						<!--	<div class="row">-->
						<!--		<div class="col-md-6">-->
						<!--			<div class="btn-group">-->
						<!-- <a class="btn btn-circle blue" href="add_office_order.php">Add Office Order</a> -->
						<!--			</div>-->
						<!--		</div>-->
						<!--		<div class="col-md-6">-->

						<!--		</div>-->
						<!--	</div>-->
						<!--</div>-->


						<table id="example1" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th colspan="6">
										<center>OFFICE ORDER DETAILS - 2019</center>
									</th>
								</tr>
								<tr>
									<th>Sr No</th>
									<th>Order No</th>
									<th>Order Date</th>
									<th>L No</th>
									<th>Department</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$counter = 0;
								// dbcon1();
								$qry = mysqli_query($conn1, "SELECT * FROM `office_order` ORDER BY id DESC");
								//$row = mysql_fetch_array($qry);
								//print_r($row);
								while ($row = mysqli_fetch_array($qry)) {
								?>
									<tr class="odd gradeX">
										<td><?php echo ++$counter; ?></td>

										<td><?php echo $row['Order No']; ?></td>
										<td><?php echo $row['Order Date']; ?></td>
										<td><?php echo $row['L No']; ?></td>
										<td><?php echo $row['Department']; ?></td>

										<td>
											<a class="btn btn-circle blue" href="<?php echo $row['url']; ?>">View</a>
											<!-- <button class="btn btn-circle red deleteOffice"  value="<?php echo $row['id']; ?>">Delete</button> -->
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