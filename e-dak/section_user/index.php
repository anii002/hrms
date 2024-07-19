<?php

$GLOBALS['flag'] = "5.1";
include('common/header.php');
include('common/sidebar.php');
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
			Dashboard / डॅशबोर्ड
			<!-- <small>reports & statistics</small> -->
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.php">Home / मुख पृष्ठ</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Dashboard / डॅशबोर्ड</a>
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

			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat red-intense">
					<div class="visual">
						<i class="fas fa-users"></i>
					</div>
					<div class="details">
						<div class="number">
							<?php
							$query_src = "SELECT count(tbl_dak_forward.id) as total from tbl_dak_forward,tbl_dak where tbl_dak.unique_dak_no=tbl_dak_forward.unique_dak_no and tbl_dak_forward.marked_to='" . $_SESSION['emp_id'] . "' and tbl_dak_forward.status='1'";
							$result_src = mysqli_query($db_edak,$query_src );
							$res = mysqli_fetch_array($result_src);
							echo $res['total'];
							?>
						</div>
						<div class="desc">
							<p>Pending<br>Dak List</p>
						</div>
					</div>
					<a class="more" href="pending_dak_list.php">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat dashboard-stat purple-plum">
					<div class="visual">
						<i class="fas fa-users"></i>
					</div>
					<div class="details">
						<div class="number">
							<?php
							$query_src = "SELECT count(id) as total from tbl_dak where status='2' and marked_to='" . $_SESSION['emp_id'] . "'";
							$result_src = mysqli_query($db_edak,$query_src);
							$res = mysqli_fetch_array($result_src);
							echo $res['total'];
							?>
						</div>
						<div class="desc">
							<p>Completed List</p>
						</div>
					</div>
					<a class="more" href="completed_dak_list.php">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
					</a>
				</div>
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