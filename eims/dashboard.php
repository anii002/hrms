<?php
	
	$GLOBALS['flag']="5.1";
	include('common/header.php');
	//include('dbcon.php');
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
								   dbcon1();
									$qry1 = mysql_query("SELECT * FROM `office_order`");
									//echo "SELECT * FROM `office_order1`".mysql_error();
									echo $count = mysql_num_rows($qry1); 
								?> 
							</div>
							<div class="desc">
								<p>Total</br>Office Order</p>
							</div>
						</div>
						<a class="more" href="office_order.php">
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
								 dbcon1();
									$qry2 = mysql_query("SELECT * FROM `seniority_list`");
									echo $count = mysql_num_rows($qry2); 
								?> 
							</div>
							<div class="desc">
								<p>Total</br>Seniority</p> 
							</div>
						</div>
						<a class="more" href="seniority.php">
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
								dbcon1();
									$qry3 = mysql_query("SELECT * FROM `e-notification1`");
									echo $count = mysql_num_rows($qry3); 
								?> 
							</div>
							<div class="desc">  
								<p>Total</br>e-notification</p>
							</div>
						</div>
						<a class="more" href="e-notification.php">
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
								
							</div>
							<div class="desc">
								<p>All</br>Circulars</p> 
							</div>
						</div>
						<!--<a class="more" href="circular1.php">-->
						<a class="more" target="_blank" href="http://10.31.3.3/pers/circular/view.asp">
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
								<p></br>RESS</p>
							</div>
						</div>
						<a class="more" target="_blank" href="https://aims.indianrailways.gov.in/mAIMS">
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
								 dbcon1();
									$qry4 = mysql_query("SELECT * FROM `checklist`");
									echo $count = mysql_num_rows($qry4); 
								?>
							</div>
							<div class="desc">
								<p></br>Checklist</p>
							</div>
						</div>
						<a class="more" href="checklist.php">
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
								 dbcon1();
									$qry6 = mysql_query("SELECT * FROM `photo_gallary`");
									echo $count = mysql_num_rows($qry6); 
								?>
							</div>
							<div class="desc">
								<p></br>Photo Gallery</p>
							</div>
						</div>
						<a class="more" href="Photo_Gallary.php">
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
								 dbcon1();
									$qry5 = mysql_query("SELECT * FROM `transfer_registration`");
									echo $count = mysql_num_rows($qry5); 
								?>
							</div>
							<div class="desc">
								<p></br>Transfer Registration</p>
							</div>
						</div>
						<a class="more" href="transfer_registration.php">
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