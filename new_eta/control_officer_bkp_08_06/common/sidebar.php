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
				if($GLOBALS['flag']=="3.1"){
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
				if($GLOBALS['flag']=="5.1"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="grievance_list.php">
					<i class="fas fa-list"></i>
					<span class="title">Grievance List / शिकायत सूची</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>					
				</li>
				
				<?php
				if($GLOBALS['flag']=="3.2" || $GLOBALS['flag']=="3.3" ){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="javascript:;">
					<i class="fas fa-book"></i>
					<span class="title">Travelling Allowances / यात्रा भत्ता </span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">

						<?php
						if($GLOBALS['flag']=="3.2"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
						
							<a href="co_Show_claimed_TA.php">
							<i class="far fa-file-text"></i>
							दावा किए गए यात्रा भत्ता सूची / Received TA List</a>
						</li>
						
						<?php
						if($GLOBALS['flag']=="3.3"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="ApprovedList.php">
							<i class="far  fa-user"></i>
							दावा न किए गए यात्रा भत्ता सूची / Approved TA List</a>
						</li>
						
						
					</ul>
				</li>
				
				
				
				<?php
				if($GLOBALS['flag']=="5.8" || $GLOBALS['flag']=="5.9" || $GLOBALS['flag']=="5.11"  ){
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
						if($GLOBALS['flag']=="5.9"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
						
							<a href="approved_list_cont.php">
							<i class="far fa-file-text"></i>
							दावा किए गए यात्रा भत्ता सूची / Claimed Contijency List</a>
						</li>
						
						<?php
						if($GLOBALS['flag']=="5.11"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="forwarded_list.php">
							<i class="far  fa-list-alt"></i>
							दावा न किए गए यात्रा भत्ता सूची / Approved Contijency List</a>
						</li>
						
						<!-- <?php
						if($GLOBALS['flag']=="5.11"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="show_saved_cont.php">
							<i class="far  fa-list-alt"></i>
							दावा न किए गए फुटकर बिल सूची / Saved Contingency List</a>
						</li>
						<?php
						if($GLOBALS['flag']==""){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="forwarded_list.php">
							<i class="far  fa-user"></i>
							Claims received for Movement Verification</a>
						</li>

						<?php
						if($GLOBALS['flag']==""){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
						
							<a href="approved_list_cont.php">
							<i class="far fa-file-text"></i>
							Verified Movement TA list of Sub-ordinates</a>
						</li> -->
					</ul>
				</li> 
	
					
						
					</ul>
				</li>
				 
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->