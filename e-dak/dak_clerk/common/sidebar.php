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
				if ($GLOBALS['flag'] == "1.2") {
					?>
					<li class="active">
					<?php } else { ?>
					<li>
					<?php } ?>
					<a href="registered_dak.php">
						<i class="fas fa-book"></i>
						<span class="title">Registered Dak</span>
						<span class="selected"></span>
					</a>
				</li>


				<?php
				if ($GLOBALS['flag'] == "1.3") {
					?>
					<li class="active">
					<?php } else { ?>
					<li>
					<?php } ?>
					<a href="pending_dak_list.php">
						<i class="fas fa-book"></i>
						<span class="title">Pending Dak</span>
						<span class="selected"></span>
					</a>
				</li>

				<!-- <?php
						if ($GLOBALS['flag'] == "1.41") {
							?>
												<li class="active">
				<?php } else { ?>
												<li>
				<?php } ?>
					<a href="forwarded_dak_list.php">
					<i class="fas fa-book"></i>
					<span class="title">Forwarded Dak List</span>
					<span class="selected"></span>
					</a>
				</li> -->

				<?php
				if ($GLOBALS['flag'] == "1.51") {
					?>
					<li class="active">
					<?php } else { ?>
					<li>
					<?php } ?>
					<a href="completed_dak_list.php">
						<i class="fas fa-book"></i>
						<span class="title">Completed Dak List</span>
						<span class="selected"></span>
					</a>
				</li>
				
				<?php
				if ($GLOBALS['flag'] == "1.4" || $GLOBALS['flag'] == "1.5" || $GLOBALS['flag'] == "1.6" || $GLOBALS['flag'] == "1.7" || $GLOBALS['flag'] == "1.9") {
					?>
					<li class="start active">
					<?php } else { ?>
					<li>
					<?php } ?>

					<a href="">
						<i class="fas fa-book"></i>
						<span class="title">Reports </span>
						<span class="selected"></span>
						<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">

						<?php
						if ($GLOBALS['flag'] == "1.4") {
							?>
							<li class="start active">
							<?php } else { ?>
							<li>
							<?php } ?>

							<a href="src_wise.php">
								<i class="far fa-file-text"></i>
								Source wise report</a>
						</li>

						<?php
						if ($GLOBALS['flag'] == "1.5") {
							?>
							<li class="start active">
							<?php } else { ?>
							<li>
							<?php } ?>
							<a href="src_wise_summary.php">
								<i class="far  fa-list-alt"></i>
								Source wise summary report</a>
						</li>

						<?php
						if ($GLOBALS['flag'] == "1.6") {
							?>
							<li class="start active">
							<?php } else { ?>
							<li>
							<?php } ?>
							<a href="section_wise.php">
								<i class="far  fa-list-alt"></i>
								Section wise report</a>
						</li>

						<?php
						if ($GLOBALS['flag'] == "1.7") {
							?>
							<li class="start active">
							<?php } else { ?>
							<li>
							<?php } ?>
							<a href="section_wise_summary.php">
								<i class="far  fa-list-alt"></i>
								Section wise summary report</a>
						</li>
                        
                        <?php
						if ($GLOBALS['flag'] == "1.9") {
							?>
							<li class="start active">
							<?php } else { ?>
							<li>
							<?php } ?>
							<a href="current_pending.php">
								<i class="far  fa-list-alt"></i>
								Current pending report</a>
						</li>

					</ul>
				</li>
				

			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>

	<!-- END SIDEBAR -->