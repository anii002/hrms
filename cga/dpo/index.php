<?php
	$GLOBALS['flag']="1.1";	
	include('common/header.php');
	include('common/sidebar.php');
	$con = dbcon1();
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
								// dbcon1(); 
								 $query = mysqli_query($con,"SELECT count(forward_application.id) as total FROM `forward_application` where  hold_status='1' and dak_status=1  AND forward_to_pfno='".$_SESSION['pf_number']."' ");

								 $resultset = mysqli_fetch_array($query);
								 echo "<h3>".$resultset['total']."</h3>";
								?>
							</div>
							<div class="desc">
								<p>Pending Nominating Application</p>
							</div>
						</div>
						<a class="more" href="nomi_note_app.php">
						 View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fas fa-users"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php
								// dbcon1(); 
								 $query = mysqli_query($con,"SELECT count(forward_application.id) as total FROM `forward_application` where dak_status=0 and drm_approve=0 and  hold_status='1'  AND forward_to_pfno='".$_SESSION['pf_number']."' ");

								 $resultset = mysqli_fetch_array($query);
								 echo "<h3>".$resultset['total']."</h3>";
								?>
							</div>
							<div class="desc">
								<p>Pending Application RCC</p>
							</div>
						</div>
						<a class="more" href="rcc_pending_app.php">
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
									// $query = mysqli_query("select count(forward_from_u) as total from forward_application where hold_status='1' AND return_status='1' AND forward_to_u = '".$_SESSION['pf_number']."'");
								$query_emp = mysqli_query($con,"SELECT forward_application.id,forward_application.ex_emp_pfno as ex_emp_pfno,forward_application.applicant_username as username,applicant_registration.ex_empname as ex_empname,applicant_name,category,forward_application.remark FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_application.applicant_username=applicant_registration.username and hold_status='1' AND return_status='1' AND forward_to_pfno='".$_SESSION['pf_number']."' ");

									$resultset = mysqli_num_rows($query_emp);
									echo "<h3>".$resultset."</h3>";
								?>
							</div>
							<div class="desc">
								 <p>Rejected Application</p>
							</div>
						</div>
						<a class="more" href="rcc_returned_list.php">
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
								// dbcon1(); 
								 $query = mysqli_query($con,"SELECT count(forward_application.id) as total FROM `forward_application` where hold_status='0' and rcc_note_status='0' and forward_from_pfno='".$_SESSION['pf_number']."' ");

								 $resultset = mysqli_fetch_array($query);
								 echo "<h3>".$resultset['total']."</h3>";
								?>
							</div>
							<div class="desc">
								 <p> Forwarded Application</p>
							</div>
						</div>
						<a class="more" href="rcc_forworded_list.php">
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
								// $query = mysqli_query("select count(id) as total from users where role='12'");

								// $resultset = mysqli_fetch_array($query);
								// echo "<h3>".$resultset['total']."</h3>";
								?>
							</div>
							<div class="desc">
								 <p></p>
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