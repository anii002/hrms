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
				if($GLOBALS['flag']=="4.9"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="update_emp.php">
					<i class="fas fa-edit"></i>
					<span class="title">Update Profile / प्रोफ़ाइल अपडेट करें</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					
				</li>


				<?php
				if($GLOBALS['flag']=="2.2" || $GLOBALS['flag']=="2.3" || $GLOBALS['flag']=="2.345" || $GLOBALS['flag']=="2.9" || $GLOBALS['flag']=="2.5" || $GLOBALS['flag']=="2.6" || $GLOBALS['flag']=="2.7" || $GLOBALS['flag']=="2.8"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="javascript:;">
					<i class="fas fa-book"></i>
					<span class="title">DA Role</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">

						<?php
						if($GLOBALS['flag']=="2.2"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
						
							<a href="add_depot.php">
							<i class="far fa-file-text"></i>
							Add Depot Master</a>
						</li>
						
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
							Generate Summary</a>
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
							Forward to Personnel Admin</a>
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
							View Generated Summary</a>
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
							Vetted Summary</a>
						</li>
					</ul>
				</li>

				<?php
				if($GLOBALS['flag']=="5.3" || $GLOBALS['flag']=="5.4" || $GLOBALS['flag']=="5.5" || $GLOBALS['flag']=="5.6" || $GLOBALS['flag']=="5.7" ){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
					
					<a href="">
					<i class="fas fa-book"></i>
					<span class="title">Self Travelling Allowances / स्वयं यात्रा भत्ता</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">

						<?php
						if($GLOBALS['flag']=="5.3"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
						
							<a href="TA_Entry_Form.php">
							<i class="far fa-file-text"></i>
							यात्रा भत्ता प्रवेश फॉर्म / TA Entry Form</a>
						</li>
						
						<?php
						if($GLOBALS['flag']=="5.4"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="Show_claimed_TA.php">
							<i class="far  fa-list-alt"></i>
							दावा किए गए यात्रा भत्ता सूची / Claimed / Forwarded TA List</a>
						</li>
						
						<?php
						if($GLOBALS['flag']=="5.5"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="Show_unclaimed_TA.php">
							<i class="far  fa-list-alt"></i>
							दावा न किए गए यात्रा भत्ता सूची / Saved / Unforwarded TA List</a>
						</li>

						<?php
						if($GLOBALS['flag']=="5.6"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="Show_returned_TA.php">
							<i class="far  fa-list-alt"></i>
							वापस यात्रा भत्ता सूची / Returned TA List</a>
						</li>

						<?php
						if($GLOBALS['flag']=="5.7"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="Track.php">
							<i class="far  fa-list-alt"></i>
							दावा ट्रैक / Track claim</a>
						</li>
							
					</ul>
				</li>

                
                
            <?php
				if($GLOBALS['flag']=="5.12" || $GLOBALS['flag']=="5.13" || $GLOBALS['flag']=="5.14" ){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
					
					<a href="">
					<i class="fas fa-book"></i>
					<span class="title">फुटकर बिल / Contingency </span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">

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
						
						
				
					
				</li> 
							
					</ul>
				</li>

				 
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->