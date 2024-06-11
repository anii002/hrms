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
						<a href="../../index.php">Home / मुख पृष्ठ</a>
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
								 	dbcon3();
									$qry1 = mysql_query("SELECT * FROM `add_user`");
									echo $count = mysql_num_rows($qry1); 
								?> 
							</div>
							<div class="desc">
								<p>Total</br>User</p>
							</div>
						</div>
						<a class="more" href="add_user.php">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple-plum">
						<div class="visual">
							<i class="fas fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php
								 	/*dbcon3();
									$qry1 = mysql_query("SELECT * FROM `add_application`");
									echo $count = mysql_num_rows($qry1); */
								?> 
							</div>
							<div class="desc">
								<p>Total</br>e-Application</p>
							</div>
						</div>
						<a class="more" href="#">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>-->
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fas fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php
								 	dbcon3();
									$qry1 = mysql_query("SELECT * FROM `purpose`");
									echo $count = mysql_num_rows($qry1); 
								?> 
							</div>
							<div class="desc">
								<p>Total</br>Subject</p>
							</div>
						</div>
						<a class="more" href="add_purpose.php">
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
								 	dbcon3();
									$qry1 = mysql_query("SELECT add_application.*,forward_appl.* FROM `add_application`,forward_appl WHERE add_application.application_id = forward_appl.appli_id AND forward_appl.forward_status = 1 AND forward_appl.admin_status = 0 AND forward_appl.forwarded_to = '".$_SESSION['user']."'");
									echo $count = mysql_num_rows($qry1); 
								?> 
							</div>
							<div class="desc">
								<p>Received</br>Applications</p>
							</div>
						</div>
						<a class="more" href="pending_application_admin.php">
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
								 	dbcon3();
									$qry1 = mysql_query("SELECT add_application.*,forward_appl.* FROM `add_application`,forward_appl WHERE add_application.application_id = forward_appl.appli_id AND forward_appl.forward_status = 1 AND forward_appl.admin_status = 1 AND forward_appl.forwarded_to = '".$_SESSION['user']."'");
									echo $count = mysql_num_rows($qry1); 
								?> 
							</div>
							<div class="desc">
								<p>Approved</br>Applications</p>
							</div>
						</div>
						<a class="more" href="approved_application_admin.php">
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
								
							</div>
							<div class="desc">
								<p>Section Wise</br>Status</p>
							</div>
						</div>
						<a class="more" href="section_wise.php">
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
								
							</div>
							<div class="desc">
								<p>Section Wise</br>Summary</p>
							</div>
						</div>
						<a class="more" href="section_wise_summary.php">
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
								<p>Add</br>e-Application</p>
							</div>
						</div>
						<a class="more" href="add_application.php">
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
								 	dbcon3();
									$qry1 = mysql_query("SELECT * FROM `add_application` WHERE pfno = '".$_SESSION['user']."'");
									echo $count = mysql_num_rows($qry1); 
								?> 
							</div>
							<div class="desc">
								<p>View</br>e-Applications</p>
							</div>
						</div>
						<a class="more" href="view_application.php">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
			<?php
			}
			?>
			<!-- BillUnit Clerk -->
			<?php
			if($_SESSION['user_role'] != "admin" && $_SESSION['user_role'] == 1)
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
								 	dbcon3();
									$qry1 = mysql_query("SELECT add_application.*,forward_appl.* FROM `add_application`,forward_appl WHERE add_application.application_id = forward_appl.appli_id AND forward_appl.admin_status = 1 AND forward_appl.clerk_status = 0 AND forward_appl.forwarded_to_clerk = '".$_SESSION['user']."'");
									echo $count = mysql_num_rows($qry1); 
								?> 
							</div>
							<div class="desc">
								<p>Received</br>Application</p>
							</div>
						</div>
						<a class="more" href="pending_application.php">
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
								 	dbcon3();
									$qry1 = mysql_query("SELECT add_application.*,forward_appl.* FROM `add_application`,forward_appl WHERE add_application.application_id = forward_appl.appli_id AND forward_appl.clerk_status = 1 AND forward_appl.forwarded_to_clerk = '".$_SESSION['user']."'");
									echo $count = mysql_num_rows($qry1); 
								?> 
							</div>
							<div class="desc">
								<p>Approved</br>Application</p>
							</div>
						</div>
						<a class="more" href="approved_application.php">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
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
								 	dbcon3();
									$qry1 = mysql_query("SELECT * FROM `purpose`");
									echo $count = mysql_num_rows($qry1); 
								?> 
							</div>
							<div class="desc">
								<p>Total</br>Purpose</p>
							</div>
						</div>
						<a class="more" href="#">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div> -->
			</div>
			<?php
			}
			?>
			<!-- Chief OS -->
			<?php
			if($_SESSION['user_role'] != "admin" && $_SESSION['user_role'] == 2)
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
								 	dbcon3();
									$qry1 = mysql_query("SELECT add_application.*,forward_appl.* FROM `add_application`,forward_appl WHERE add_application.application_id = forward_appl.appli_id AND forward_appl.clerk_status = 1 AND forward_appl.cos_status = 0 AND forward_appl.forwarded_to_cos = '".$_SESSION['user']."'");
									echo $count = mysql_num_rows($qry1); 
								?> 
							</div>
							<div class="desc">
								<p>Received</br>Application</p>
							</div>
						</div>
						<a class="more" href="pending_application_cos.php">
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
								 	dbcon3();
									$qry1 = mysql_query("SELECT add_application.*,forward_appl.* FROM `add_application`,forward_appl WHERE add_application.application_id = forward_appl.appli_id AND forward_appl.clerk_status = 1 AND forward_appl.cos_status = 1 AND forward_appl.forwarded_to_cos = '".$_SESSION['user']."'");
									echo $count = mysql_num_rows($qry1); 
								?> 
							</div>
							<div class="desc">
								<p>Approved</br>Application</p>
							</div>
						</div>
						<a class="more" href="approved_application_cos.php">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
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
								 	dbcon3();
									$qry1 = mysql_query("SELECT * FROM `purpose`");
									echo $count = mysql_num_rows($qry1); 
								?> 
							</div>
							<div class="desc">
								<p>Total</br>Purpose</p>
							</div>
						</div>
						<a class="more" href="#">
						अधिक जानकारी / View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div> -->
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