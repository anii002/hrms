<?php
	$GLOBALS['flag']="4.93";
	include('common/header.php');
	include('common/sidebar1.php');
?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 e-Seniority Suggestion
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="dashboard.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">e-Seniority Suggestion</a>
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
								<i class="fa fa-list-alt"></i>e-Seniority Suggestion
							</div>
							
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											 <!--<a class="btn btn-circle blue" href="add-suggestion.php">Add Suggestion</a> -->
										</div>
									</div>
									<div class="col-md-6">
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
									</div>
								</div>
							</div>
							
						<table id="example1" class="table table-striped table-bordered table-hover">
							<thead>
							<tr>
							<th colspan="7"><center>SENIORITY SUGGESTION</center></th>
							</tr>
							<tr>
								<th>Sr No</th>
								<th>PF No.</th>
								<th>Name</th>
								<th>Suggestion</th>
								<th>Remark</th>
								<th>Created Date</th>
								<th>Updated Date</th>
								<th>Status</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$counter = 0;
							dbcon1();
				// 			echo $_SESSION['user'];
							$qry = mysql_query("SELECT * FROM suggestion WHERE pfno = '".$_SESSION['user']."' ORDER BY id DESC");

							while($row = mysql_fetch_array($qry))
							{
								dbcon2();
								$qry1 = mysql_query("SELECT name FROM register_user WHERE emp_no = '".$row['pfno']."'");
								while($row1 = mysql_fetch_array($qry1))
								{


							?>
							<tr class="odd gradeX">
								<td><?php echo ++$counter; ?></td>
								<td><?php echo $row['pfno'];?></td>
								<td><?php echo $row1['name'];?></td>
								<td><?php echo $row['suggestion'];?></td>
								<!-- <td>
									<button class="btn btn-circle red deleteseniority"  value="<?php echo $row['id'];?>">Delete</button>
								</td> -->
								<td><?php echo $row['remark'];?></td>
								<td><?php echo $row['created_date'];?></td>
								<td><?php echo $row['updated_date'];?></td>
								<?php
								if($row['status'] == 0)
								{
								?>
								<td style='color:orange;'>Pending</td>
								<?php
								}
								else
								{
								?>
								<td style='color:red;'>Closed</td>
								<?php
								}
								?>
							</tr>
							<?php
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

