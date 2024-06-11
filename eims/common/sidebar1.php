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
				if($GLOBALS['flag']=="5.1"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="emp_dashboard.php">
					<i class="fas fa-home"></i>
					<span class="title">Dashboard / डॅशबोर्ड</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					
				</li>

				<!-- <?php
				if($GLOBALS['flag']=="1.2"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="add_user.php">
					<i class="fas fa-home"></i>
					<span class="title">Create New User</span>
					<span class="selected"></span>
					<span class="arrow "></span>
					</a>
					
				</li>  -->

				<?php
				if($GLOBALS['flag']=="4.91"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="office_order1.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Office Order</span>
					<span class="selected"></span>
					</a>
				</li>

				<?php
				if($GLOBALS['flag']=="4.92"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="seniority1.php">
					<i class="fas fa-angle-double-right"></i>
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
					<a href="view_suggestion_emp.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">View Seniority Suggestion</span>
					<span class="selected"></span>
					</a>
					
				</li>
				<?php
				if($GLOBALS['flag']=="4.94"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="e-notification1.php">
				<i class="fas fa-angle-double-right"></i>
					<span class="title">e-notification</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					
				</li>


				<?php
				if($GLOBALS['flag']=="4.95"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="http://10.31.3.3/pers/circular/view.asp">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Circulars</span>
					<span class="selected"></span>
					</a>	
				</li>
				
				<?php
				if($GLOBALS['flag']=="4.96"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="organization.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Organization Setup</span>
					<span class="selected"></span>
					</a>	
				</li>
				
				<?php
				if($GLOBALS['flag']=="4.97"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="employee_facility.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Employee Facility</span>
					<span class="selected"></span>
					</a>	
				</li>

				<?php
				if($GLOBALS['flag']=="4.98"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="checklist1.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Checklist</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					
				</li>

				<?php
				if($GLOBALS['flag']=="4.99"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="Photo_Gallary1.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Photo Gallary</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					
				</li>

				<?php
				if($GLOBALS['flag']=="4.100"){
				?>
				<li class="start active">
				<?php }else{ ?>
				<li>
				<?php } ?>
				
					<a href="transfer_registration1.php">
					<i class="fas fa-angle-double-right"></i>
					<span class="title">Transfer Registration</span>
					<span class="selected"></span>
					<!-- <span class="arrow "></span> -->
					</a>
					
				</li>

			</ul>

			<!-- </ul> -->
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->