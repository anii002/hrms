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
			
					<form class="sidebar-search " action="extra_search.html" method="POST">
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>

				<?php
				if($GLOBALS['flag']=="2.1"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="index.php">
					<i class="fas fa-home"></i>
					<span class="title">Dashboard / डॅशबोर्ड</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					
				</li>
								
				<?php
				if($GLOBALS['flag']=="2.2" || $GLOBALS['flag']=="2.3" || $GLOBALS['flag']=="2.345" || $GLOBALS['flag']=="2.9" || $GLOBALS['flag']=="2.5" || $GLOBALS['flag']=="2.6" || $GLOBALS['flag']=="2.7" || $GLOBALS['flag']=="2.8" || $GLOBALS['flag']=="5.12" || $GLOBALS['flag']=="5.13" || $GLOBALS['flag']=="5.14"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="javascript:;">
					<i class="fas fa-book"></i>
					<span class="title">SOA Role</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">

						<?php
						if($GLOBALS['flag']=="2.3"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="add_user.php">
							<i class="far  fa-user"></i>
							Add User</a>
						</li>
						
						<?php
						if($GLOBALS['flag']=="2.345"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="view_user_logs.php">
							<i class="far  fa-user"></i>
							View User Activity Logs</a>
						</li>
						
						<?php
						if($GLOBALS['flag']=="2.8"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="update_ci_details.php">
							<i class="far  fa-user"></i>
						    Request Of Update User Details</a>
						</li>
						
						<?php
						if($GLOBALS['flag']=="2.5"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="generate_summary1.php">
							<i class="far fa-list-alt"></i>
							Generate TA Summary</a>
						</li>
						
						<?php
						if($GLOBALS['flag']=="2.6"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<!--<a href="approve_summary_report.php">-->
							<a href="summary_report.php">
							<i class="far fa-chart-bar"></i>
							TA Summary Forward to ADFM</a>
						</li>
						
						
						<?php
						if($GLOBALS['flag']=="2.9"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<!--<a href="approve_summary_report.php">-->
							<a href="gen_summary_report.php">
							<i class="far fa-chart-bar"></i>
							View Generated TA Summary</a>
						</li>
						
						<?php
						if($GLOBALS['flag']=="2.7"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="vetted_list.php">
							<i class="far fa-chart-bar"></i>
							Vetted TA Summary</a>
						</li>

						<hr>
						<?php
						if($GLOBALS['flag']=="5.12"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="generate_summary_cont.php">
							<i class="far fa-list-alt"></i>
							Generate Contingecy Summary</a>
						</li>

						<?php
						if($GLOBALS['flag']=="5.13"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="summary_report_cont.php">
							<i class="far fa-chart-bar"></i>
							Contingecy Summary Forward to ADFM</a>
						</li>

						<?php
						if($GLOBALS['flag']=="5.14"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="vetted_list_cont.php">
							<i class="far fa-chart-bar"></i>
							Vetted Contingecy Summary</a>
						</li>



					</ul>
				</li>

								 
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->