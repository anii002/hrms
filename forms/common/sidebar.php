<?php
// session_start();
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

					<form class="sidebar-search " action="extra_search.html" method="POST">
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<?php if ($_SESSION['user'] == 'admin') { ?>
					<?php
					if ($GLOBALS['flag'] == "5.1") {
					?>
						<li class="start active">
						<?php } else { ?>
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
						if ($GLOBALS['flag'] == "5.2") {
						?>
							<li class="start active">
							<?php } else { ?>
							<li>
							<?php } ?>

							<a href="view_file.php">
								<i class="fas fa-edit"></i>
								<span class="title">View File</span>
								<span class="selected"></span>
								<!-- <span class="arrow "></span> -->
							</a>

							</li>


							<?php
							if ($GLOBALS['flag'] == "5.3") {
							?>
								<li class="start active">
								<?php } else { ?>
								<li>
								<?php } ?>

								<a href="add_forms.php">
									<i class="fas fa-edit"></i>
									<span class="title">Add File</span>
									<span class="selected"></span>
									<!-- <span class="arrow "></span> -->
								</a>

								</li>
							<?php } ?>
							<?php if ($_SESSION['user'] == 'employee') { ?>
								<?php
								if ($GLOBALS['flag'] == "5.1") {
								?>
									<li class="start active">
									<?php } else { ?>
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
									if ($GLOBALS['flag'] == "5.4") {
									?>
										<li class="start active">
										<?php } else { ?>
										<li>
										<?php } ?>

										<a href="view_emp.php">
											<i class="fas fa-home"></i>
											<span class="title">View Forms</span>
											<span class="selected"></span>
											<!-- <span class="arrow "></span> -->
										</a>

										</li>
									<?php } ?>


			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->