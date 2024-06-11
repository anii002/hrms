<?php
	$GLOBALS['flag']="1.1";	
	include('common/header.php');
	include('common/sidebar.php');
?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Dashboard<!-- <small>reports & statistics</small> -->
			</h3>
			<!--div class="page-bar">
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
						<i class=""></i> <span><?php //echo date('Y/m/d H:i:s'); ?></span>
						<!-- <span class="thin uppercase visible-lg-inline-block"></span> -->
						<!-- <i class="fa fa-angle-down"></i> -->
					<!--/div>
				</div>
			</div-->
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
								dbcon1();
								 $query = mysql_query("SELECT count(forward_application.id) as total from forward_application,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and ss_status=0 and hold_status=1 and rcc_note_status=1 and drm_approve=1  ");

								 $resultset = mysql_fetch_array($query);
								 echo "<h3>".$resultset['total']."</h3>";
								?>
							</div>
							<div class="desc">
								<p>Received Appliaction</p>
							</div>
						</div>
						<a class="more" href="recevied_application.php">
						 View more <i class="m-icon-swapright m-icon-white"></i>
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
								dbcon1();
								 $query = mysql_query("SELECT count(forward_application.id) as total from forward_application,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and ss_status=1 and hold_status=1 and rcc_note_status=1 and drm_approve=1 and cc_status=1  ");

								 $resultset = mysql_fetch_array($query);
								 echo "<h3>".$resultset['total']."</h3>";
								?>
							</div>
							<div class="desc">
								 <p> Application List</p>
							</div>
						</div>
						<a class="more" href="applicaton_list.php">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fas fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php 
								// $query = mysql_query("select count(id) as total from users where role='12'");

								// $resultset = mysql_fetch_array($query);
								// echo "<h3>".$resultset['total']."</h3>";
								?>
							</div>
							<div class="desc">
								 <p> Control Incharge</p>
							</div>
						</div>
						<a class="more" href="#">
						 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div> -->
				
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