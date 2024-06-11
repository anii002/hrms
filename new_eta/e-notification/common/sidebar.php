<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse">
			
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
						<i class=""></i>
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
				
					<a href="#">
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
				
					<a href="office_order.php">
					<i class="fas fa-edit"></i>
					<span class="title">Office Order</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					
				</li>
				<?php
				if($GLOBALS['flag']=="4.92"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="seniority.php">
					<i class="fas fa-edit"></i>
					<span class="title">Seniority</span>
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
				
					<a href="#">
					<i class="fas fa-edit"></i>
					<span class="title">Circulars</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					
				</li>




				<!-- <?php
				if($GLOBALS['flag']=="5.8" || $GLOBALS['flag']=="5.9" || $GLOBALS['flag']=="5.10"  ){
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
						if($GLOBALS['flag']=="5.8"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
						
							<a href="add_cont.php">
							<i class="far fa-file-text"></i>
							फुटकर बिल / Contingency Form</a>
						</li>
						
						<?php
						if($GLOBALS['flag']=="5.9"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="show_cont.php">
							<i class="far  fa-list-alt"></i>
							दावा किए गए फुटकर बिल सूची / Claimed Contingency List</a>
						</li>
						
						<?php
						if($GLOBALS['flag']=="5.10"){
						?>
						<li class="start active">
						<?php }else{ ?>
						<li>
						<?php } ?>
							<a href="show_unclaimed_cont.php">
							<i class="far  fa-list-alt"></i>
							दावा न किए गए फुटकर बिल सूची / Unclaimed Contingency List</a>
						</li>

						
						
					</ul>
				</li> -->
				 
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->