<?php
$GLOBALS['flag'] = "1.1";
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
					<a href="../../index.php">Home </a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="#">Dashboard </a>
				</li>
			</ul>
			<div class="page-toolbar">
				<div id="" class="pull-right tooltips btn btn-fit-height grey-salt">
					<i class=""></i> <span><?php echo date('Y/m/d H:i:s'); ?></span>

				</div>
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN DASHBOARD STATS -->
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat blue-madison">
					<div class="visual">
						<i class="fas fa-users"></i>
					</div>
					<div class="details">
						<div class="number">
							<?php
							$query = mysql_query("SELECT count(id) as total from master_source", $db_edak);
							$f_query = mysql_fetch_array($query);
							echo $f_query['total'];
							?>
						</div>
						<div class="desc">
							<p>Master Source</p>
						</div>
						<div></div>
					</div>
					<a class="more" href="master_src.php">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat red-intense">
					<div class="visual">
						<i class="fas fa-users"></i>
					</div>
					<div class="details">
						<div class="number">
							<?php
							$query = mysql_query("SELECT count(id) as total from tbl_user where role in(2)", $db_edak);
							$f_query = mysql_fetch_array($query);
							echo $f_query['total'];

							?>
						</div>
						<div class="desc">
							<p>Master Marked</p>
						</div>
					</div>
					<a class="more" href="master_marked.php">
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