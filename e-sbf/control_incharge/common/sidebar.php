<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse">
			
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
				if($GLOBALS['flag']=="4.1"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>				
					<a href="index.php">
					<i class="fas fa-home"></i>
					<span class="title">Dashboard / डॅशबोर्ड</span>
					<span class="selected"></span>
					</a>					
				</li>
				
				<?php
				if($GLOBALS['flag']=="1.4"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				    <a href="sub_forms.php">
					<i class="far fa-file-text"></i>
					<span class="title">Pending Form</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
				</li>

				<?php
				if($GLOBALS['flag']=="1.5"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				    <a href="for_form.php">
					<i class="far fa-file-text"></i>
					<span class="title">Forwarded Form</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
				</li>

				<?php
				if($GLOBALS['flag']=="1.6"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				    <a href="rej_form.php">
					<i class="far fa-file-text"></i>
					<span class="title">Rejected Form</span>
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