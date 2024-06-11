<?php
error_reporting(0);
?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			
			<ul class="page-sidebar-menu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hamberger-menu">
						<i class="fas fa-bars"></i>
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
			
					<form class="sidebar-search " action="#" method="POST">
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>				
			
					<?php
					if($GLOBALS['flag']=="5.1"){
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>

					<a href="dashboard.php">
					<i class="fas fa-home"></i>
					<span class="title">Dashboard / डॅशबोर्ड</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					</li>

					<?php
					if($GLOBALS['flag']=="4.91"){
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>

					<?php
					if($_SESSION['user_role'] == "admin")
					{
					?>

					<a href="add_user.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Add User</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					</li>
					<?php } ?>

					<?php
					if($_SESSION['user_role'] == "admin")
					{
					?>
					<?php
					if($GLOBALS['flag']=="4.93"){
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>

					<a href="add_purpose.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Add Subject</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					</li>
					<?php } ?>

					<!-- <?php
					if($_SESSION['user'] == "admin")
					{
					?>
					<?php
					if($GLOBALS['flag']=="4.94"){
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>

					<a href="view_purpose.php">
					<i class="fas fa-edit"></i>
					<span class="title">View Purpose</span>
					<span class="selected"></span>
					 <span class="arrow "></span>
					</a>
					</li>
					<?php } ?> -->

					<?php
					if($_SESSION['user_role'] == "admin")
					{
					?>
					<?php
					if($GLOBALS['flag']=="5.5"){
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>

					<a href="pending_application_admin.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Received Applications</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					</li>
					<?php } ?>

					<?php
					if($_SESSION['user_role'] == "admin")
					{
					?>
					<?php
					if($GLOBALS['flag']=="5.6"){
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>

					<a href="approved_application_admin.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Approved Applications</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					</li>
					<?php } ?>

					<?php
					if($_SESSION['user_role'] == "admin")
					{
					?>
					<?php
					if($GLOBALS['flag']=="5.4" || $GLOBALS['flag']=="5.7" || $GLOBALS['flag']=="5.8"){
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>

					<a href="">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Application Status</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<?php
						if($GLOBALS['flag']=="5.7"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
						
							<a href="section_wise.php">
							<i class="far fa-file-text"></i>
							Section Wise</a>
						</li>
						
						<?php
						if($GLOBALS['flag']=="5.8"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="section_wise_summary.php">
							<i class="far  fa-list-alt"></i>
							Section Wise Summary</a>
						</li>
					</ul>
					</li>
					<?php } ?>

					<?php
					if($GLOBALS['flag']=="1.2"){
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>

					<?php
					if($GLOBALS['flag']=="1.2"){
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>
					<?php
					if($_SESSION['user_role'] == 3)
					{
					?>
					<a href="add_application.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Add Application</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					</li>
					<?php } ?>

					<?php
					if($GLOBALS['flag']=="4.95"){
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>
					<?php
					if($_SESSION['user_role'] == 3)
					{
					?>
					<a href="view_application.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">View Application</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					</li>
					<?php } ?>

					<?php
					if($GLOBALS['flag']=="4.96")
					{
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>
					<?php
					if($_SESSION['user_role'] != "admin" && $_SESSION['user_role'] == 1)
					{
					?>
					<a href="pending_application.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Received Applications</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					</li>
					<?php } ?>

					<?php
					if($GLOBALS['flag']=="4.97"){
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>

					<?php
					if($_SESSION['user_role'] != "admin" && $_SESSION['user_role'] == 1)
					{
					?>
					<a href="approved_application.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Approved Application</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					</li>
					<?php } ?>

					<?php
					if($GLOBALS['flag']=="5.2")
					{
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>
					<?php
					 // echo $_SESSION['user_role'];
					if($_SESSION['user_role'] != "admin" && $_SESSION['user_role'] == 2)
					{
					?>
					<a href="pending_application_cos.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Received Applications</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					</li>
					<?php } ?>

					<?php
					if($GLOBALS['flag']=="5.3"){
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>

					<?php
					if($_SESSION['user_role'] != "admin" && $_SESSION['user_role'] == 2)
					{
					?>
					<a href="approved_application_cos.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Approved Application</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					</li>
					<?php } ?>
							
					</ul>
				</li>
				 
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->