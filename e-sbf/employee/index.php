<?php
	
	$GLOBALS['flag']="4.1";
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
								// dbcon();
								// $sql3=mysql_query("SELECT count(id) AS total FROM tbl_form_details WHERE status=0 AND emp_no='".$_SESSION['username']."'");
								// $row3 = mysql_fetch_array($sql3);
								//  echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>".$row3['total']."</h3>";
							?>
							</div>
							<div class="desc"> 
								 <p>Add Forms</p>
							</div>
						</div>
						<a class="more" href="add_forms.php">
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
								dbcon();
								$sql3=mysql_query("SELECT count(id) AS total FROM tbl_form_details WHERE status=0 AND emp_no='".$_SESSION['username']."'");
								$row3 = mysql_fetch_array($sql3);
								 echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>".$row3['total']."</h3>";
							?>
							</div>
							<div class="desc"> 
								 <p>Submitted Forms</p>
							</div>
						</div>
						<a class="more" href="sub_forms.php">
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
								dbcon();
								$sql2=mysql_query("SELECT count(id) AS total FROM tbl_form_details WHERE status=1 AND emp_no='".$_SESSION['username']."'");
								$row2 = mysql_fetch_array($sql2);
								 echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>".$row2['total']."</h3>";
								?>
							</div>
							<div class="desc">  
								 <p>Forwarded Forms</p>
							</div>
						</div>
						<a class="more" href="for_form.php">
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
								dbcon();
								$sql1=mysql_query("SELECT count(id) AS total FROM tbl_form_details WHERE status=1 AND rejected=1 AND emp_no='".$_SESSION['username']."'");
								$row = mysql_fetch_array($sql1);
								 echo "<h3 style='margin-bottom: 0px;margin-top: 18px;'>".$row['total']."</h3>";
								?>
							</div>
							<div class="desc">  
								 <p>Rejected Forms</p>
							</div>
						</div>
						<a class="more" href="rej_form.php">
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