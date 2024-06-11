<?php
//error_reporting(0);
//echo "hello";exit();
?>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
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
			
					<form class="sidebar-search " action="extra_search.html" method="POST">
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

				 

					<a href="add_user.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Add User</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					</li>
					 

					 
					<?php
					if($GLOBALS['flag']=="4.93"){
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>

					<a href="add_purpose.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Add Purpose</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					</li>
				 	 

					 
				 
					 

					 
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
				 

					 
					<?php
					if($GLOBALS['flag']=="5.4"){
					?>
					<li class="start active">
					<?php }else{ ?>
					<li>
					<?php } ?>

					<a href="status.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Application Status</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					</li>
					 

					 
							
					</ul>
				</li>
				 
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->