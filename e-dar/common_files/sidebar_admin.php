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
					<!-- <span style="color: white;padding-left: 10px;margin-top: 5px">MENU</span> -->
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
				if ($GLOBALS['flag'] == "1.1") {
					?>
					<li class="active">
					<?php } else { ?>
					<li>
					<?php } ?>
					<a href="index.php">
						<i class="fas fa-home"></i>
						<span class="title">Dashboard / डॅशबोर्ड</span>
						<span class="selected"></span>
						<!-- <span class="arrow open"></span> -->
					</a>

				</li>

				<?php
				if ($GLOBALS['flag'] == "1.3") {
					?>
					<li class="active">
					<?php } else { ?>
					<li>
					<?php } ?>
					<a href="add_user.php">
						<i class="fa fa-user-plus"></i>
						<span class="title">Add User</span>
						<span class="selected"></span>
					</a>
				</li>
				<?php
				/*if ($GLOBALS['flag'] == "1.2") {
					?>
					<li class="active">
					<?php } else { ?>
					<li>
					<?php } ?>
					<a href="master_forms.php">
						<i class="fas fa-book"></i>
						<span class="title">Master Forms</span>
						<span class="selected"></span>
					</a>
				</li>

				<?php
				if ($GLOBALS['flag'] == "1.8") {
					?>
					<li class="active">
					<?php } else { ?>
					<li>
					<?php } ?>
					<a href="master_penalty_type.php">
						<i class="fa fa-bar-chart"></i>
						<span class="title">Master Penalty Type</span>
						<span class="selected"></span>
					</a>
				</li>
				<?php */?>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>

	<!-- END SIDEBAR -->