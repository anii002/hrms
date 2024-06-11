<?php
	
	$GLOBALS['flag']="5.1";
	include('common/header.php');
	include('common/sidebar.php');
?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Dashboard / डॅशबोर्ड<!-- <small>reports & statistics</small> -->
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="dashboard.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Dashboard / डॅशबोर्ड</a>
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
			<!-- Admin -->
			<?php
			if($_SESSION['user_role'] == "admin")
			{
			?>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fas fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php
								 	dbcon2();
							        $qry = mysql_query("SELECT * FROM feedback WHERE status = '0'");
									echo $count = mysql_num_rows($qry); 
								?>
							</div>
							<div class="desc">
								<p>View</br>Feedback</p>
							</div>
						</div>
						<a class="more" href="view_feedback_admin.php">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fas fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php
								 	dbcon2();
									$qry1 = mysql_query("SELECT * FROM `feedback` WHERE status ='1'");
									echo $count = mysql_num_rows($qry1); 
								?>
							</div>
							<div class="desc">
								<p>Replied</br>Feedback</p>
							</div>
						</div>
						<a class="more" href="view_replied_feedback.php">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
			<?php
			}
			?>
			<!-- Employee -->
			<?php
			if($_SESSION['user_role'] == 3)
			{
			?>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fas fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								
							</div>
							<div class="desc">
								<p>Add<br>Feedback</p>
							</div>
						</div>
						<a class="more" href="add_feedback.php">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple-plum">
						<div class="visual">
							<i class="fas fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								  <?php
								 	dbcon2();
									$qry1 = mysql_query("SELECT * FROM `feedback` WHERE pfno = '".$_SESSION['user']."'");
									echo $count = mysql_num_rows($qry1); 
									?> 
							</div>
							<div class="desc">
								<p>View<br>Feedback</p>
							</div>
						</div>
						<a class="more" href="view_feedback.php">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
			<?php
			}
			?>
			
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