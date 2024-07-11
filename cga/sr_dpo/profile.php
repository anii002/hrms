<?php
$GLOBALS['flag'] = "1.3";
include('common/header.php');
include('common/sidebar.php');


?>

<div class="page-content-wrapper">
	<div class="page-content">

		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.html">Home / मुख पृष्ठ</a>
					<i class="fa fa-angle-right"></i>
				</li>

				<li>
					<a href="#"> Profile / </a>
				</li>
			</ul>

		</div>

		<!-- <div class="profile-sidebar">
				<div class="portlet light profile-sidebar-portlet">
					<div class="profile-userpic">
						<img src="../assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
					</div>
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">
									 Marcus Doe
						</div>
						<div class="profile-usertitle-job">
						Developer
						</div>
					<div>
							END SIDEBAR USER TITLE
							!-- SIDEBAR BUTTONS --
					<div class="profile-userbuttons">
								<button type="button" class="btn btn-circle green-haze btn-sm">Follow</button>
								<button type="button" class="btn btn-circle btn-danger btn-sm">Message</button>
					</div>
							
					<div class="profile-usermenu">
								sdcd
					</div>
									!-- END MENU --
				<div>
			<div> -->

		<!-- BEGIN PAGE CONTENT-->
		<div class="row margin-top-20">
			<div class="col-md-12">
				<!-- BEGIN PROFILE SIDEBAR -->
				<div class="profile-sidebar">
					<!-- PORTLET MAIN -->
					<div class="portlet light profile-sidebar-portlet">
						<!-- SIDEBAR USERPIC -->
						<div class="profile-userpic">

							<?php
							$con = dbcon1();
							$query = mysqli_query($con, "SELECT img from drmpsurh_cga.login where pf_number='" . $_SESSION['pf_number'] . "'");
							$result = mysqli_fetch_array($query);
							if ($result['img'] == "") {
							?>
								<img src="../assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
							<?php
							} else {
								echo "<img class='img-responsive' src='" . $result['img'] . "'  alt='User profile picture'>";
							}
							?>
							<?php
							$con=dbcon1();
							$con=dbcon2();
							$query = "SELECT department,emp_no,name from drmpsurh_sur_railway.register_user where emp_no in(SELECT pf_number from drmpsurh_cga.login where pf_number='" . $_SESSION['pf_number'] . "') ";
							$result = mysqli_query($con,$query) or die(mysqli_error($con));
							$value = mysqli_fetch_array($result);
							?>
						</div>
						<!-- END SIDEBAR USERPIC -->
						<!-- SIDEBAR USER TITLE -->
						<div class="profile-usertitle">
							<div class="profile-usertitle-name">
								<?php echo $value['name']; ?>
							</div>
							<div class="profile-usertitle-job">
								<!-- SUPERADMIN -->
							</div>
							<div class="profile-usertitle-job btn-orange-moon ">
								(<?php echo getdepartment($value['department']); ?>)
							</div>
						</div>
						<!-- END SIDEBAR USER TITLE -->
						<!-- SIDEBAR BUTTONS -->
						<div class="profile-userbuttons">

						</div>
						<!-- END SIDEBAR BUTTONS -->
						<!-- SIDEBAR MENU -->
						<?php
						$con=dbcon2();
						$query = mysqli_query($con,"SELECT mobile,dob from drmpsurh_sur_railway.register_user where emp_no='" . $_SESSION['pf_number'] . "' ");
						$result = mysqli_fetch_array($query);
						?>
						<div class="profile-usermenu">
							<ul class="nav">
								<li class="active">
									<i class="fa fa-mobile"></i>Mobile :
									<?php
									if ($result['mobile'] == '')
										echo "-";
									else
										echo $result['mobile'];
									?>
								</li>
								<li>

									<i class="fa fa-envelope-square"></i>DOB :
									<?php
									if ($result['dob'] == '')
										echo "-";
									else
										echo $result['dob'];
									?>
								</li>

							</ul>
						</div>
						<!-- END MENU -->
					</div>
					<!-- END PORTLET MAIN -->
					<!-- PORTLET MAIN -->

					<!-- END PORTLET MAIN -->
				</div>
				<!-- END BEGIN PROFILE SIDEBAR -->
				<!-- BEGIN PROFILE CONTENT -->
				<div class="profile-content">
					<div class="row">
						<div class="col-md-12">
							<div class="portlet light bg-inverse">
								<!-- <div class="portlet-title">
										 <div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase">Change Password</span>
											
										</div>
									
									</div> -->
								<div class="portlet-body form">
									<!-- BEGIN FORM-->

									<div class="form-body">
										<h4 class="caption-subject font-red-sunglo bold uppercase form-section">Change Password</h4>

										<form class="form-horizontal" action="control/adminProcess.php?action=changePass" method="post">
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">New Password</label>
													<div class="col-md-6">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>
															<input type="password" class="form-control" id="inputName" name="pass" placeholder="New Password" required="required">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">Confirm Password</label>
													<div class="col-md-6">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>
															<input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm New Password" required="required">
														</div>
													</div>
												</div>
												<div align="center">
													<button type="button" class="btn default">Cancel</button>
													<button type="submit" class="btn blue"><i class="fa fa-check"></i> Submit</button>
												</div>


										</form>
										<!--/span-->

										<!--/row-->

										<!--/row-->
										<h4 class="caption-subject font-red-sunglo bold uppercase form-section">Update Profile Photo </h4>

										<form class="form-horizontal" action="control/adminProcess.php?action=changeimg" method="post" enctype="multipart/form-data">
											<div class="form-body">
												<div class="form-group">
													<div class="col-lg-7">
														<!-- The fileinput-button span is used to style the file input field as button -->
														<span class="btn green fileinput-button">

															<input type="file" id="profile" name="profile" accept="image/*" required="required">
														</span>
														<button type="submit" class="btn blue start">
															<i class="fa fa-upload"></i>
															<span>
																Update Profile </span>
														</button>

													</div>

												</div>
											</div>

										</form>

										<!--/row-->

									</div>
								</div>

								</form>
								<!-- END FORM-->
							</div>
						</div>
					</div>
				</div>


			</div>
			<!-- END PROFILE CONTENT -->
		</div>
	</div>
	<!-- END PAGE CONTENT-->
</div>
</div>










</div>
</div>



<?php
include 'common/footer.php';
?>