<?php

$GLOBALS['flag'] = "1.4";

include('common/header.php');

include('common/sidebar.php');

?>

<!-- BEGIN CONTENT -->

<div class="page-content-wrapper">

	<div class="page-content">

		<!-- BEGIN PAGE HEADER-->



		<div class="page-bar">

			<ul class="page-breadcrumb">

				<li>

					<i class="fa fa-home"></i>

					<a href="index.php">Home / मुख पृष्ठ</a>

					<i class="fa fa-angle-right"></i>

				</li>

				<li>

					<a href="#">Forward Form</a>

				</li>

			</ul>

			<div class="page-toolbar">

				<div id="" class="pull-right tooltips btn btn-fit-height grey-salt">

					<i class=""></i> <span><?php echo date('Y/m/d H:i:s'); ?></span>

				</div>

			</div>

		</div>

		<!-- END PAGE HEADER-->

		<!-- BEGIN DASHBOARD STATS -->



		<!-- END DASHBOARD STATS -->

		<div class="clearfix">

		</div>

		<div class="portlet box blue">

			<div class="portlet-title">

				<div class="caption  col-md-6">

					<i class="fa fa-book"></i>Forwarding Form:

				</div>

				<div class="caption col-md-6 text-right backbtn">

					<button class="btn btn-danger" onclick="history.go(-1);">Back</button>

				</div>

			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->

				<form class="horizontal-form">

					<input type="hidden" name="empid" id="empid" value="<?php echo $_SESSION['username']; ?>">

					<input type="hidden" name="ref" id="ref" value="<?php echo $_GET['reference_id']; ?>">

					<input type="hidden" name="emp_no" id="emp_no" value="<?php echo $_GET['emp_no']; ?>">

					<div id="frd_form">

						<div class="form-body">

							<div class="row">

								<div class="col-md-4"></div>

								<div class="col-md-4">

									<div class="form-group">

										<center>

											<label class="control-label">
												<h4 class="">Select CSBF Admin</h4>
											</label>

										</center>

									</div>

								</div>

								<div class="col-md-4"> </div>

							</div>

							<div class="row">

								<div class="col-md-4"></div>

								<div class="col-md-4 billunitzindex">

									<div class="form-group">

										<select name="forwardName" id="forwardName" class="form-control select2 required" style="width: 100%" required>

											<option readonly value='0' selected>Select CSBF Admin</option>

											<?php



											$conn = dbcon();

											$query_bu_users = mysqli_query($conn, "SELECT `user_pfno` FROM `add_user` WHERE user_role = '3'");

											while ($row_bu_users = mysqli_fetch_array($query_bu_users)) {



												$conn = dbcon1();

												$q_name = mysqli_query($conn, "SELECT `name` FROM `register_user` WHERE emp_no = '" . $row_bu_users['user_pfno'] . "'");

												$row_name_emp = mysqli_fetch_array($q_name);

												// echo $row_name_emp['name'];

												echo "<option value='" . $row_bu_users['user_pfno'] . "'>" . $row_name_emp['name'] . "</option>";
											}

											?>

										</select>

									</div>

								</div>

								<div class="col-md-4"></div>

							</div>



						</div>

						<div class="form-actions right">

							<button type="button" class="btn blue btn_confirm_otp" id="submit_btn" name='button'><i class="fa fa-check"></i>प्रस्तुत करे / Submit</button>

						</div>

					</div>

					<div id="otp_confirm_form" style="display: none;">

						<div class="form-body">

							<!-- <h3 class="form-section">Add User</h3> -->

							<div class="row">

								<div class="col-md-4"></div>

								<div class="col-md-4">

									<div class="form-group">

										<center>

											<label class="control-label">
												<h4 class="">Enter OTP</h4>
											</label>

										</center>

									</div>

								</div>

								<div class="col-md-4"> </div>

							</div>

							<div class="row">

								<div class="col-md-5"></div>

								<div class="col-md-2">

									<div class="form-group">

										<center>

											<input type="text" maxlength="4" autofocus="true" placeholder="Enter OTP" name="c_otp" id="c_otp" class="form-control" required>

										</center>

									</div>

								</div>

								<div class="col-md-5"></div>

							</div>

						</div>

						<!-- <div class="form-actions right">

									<button type="button" class="btn blue btn_confirm_otp" id="submit_btn" name='button'><i class="fa fa-check"></i> Confirm OTP</button>

						</div> -->

					</div>

				</form>

				<!-- END FORM-->

			</div>

		</div>

	</div>

</div>

<!-- END CONTENT -->

</div>

<!-- END CONTAINER -->

<?php

include('common/footer.php');

?>

<script type="text/javascript">
	$(document).on('click', '.btn_confirm_otp', function() {

		var fdname = $("#forwardName").val();

		var empid = $("#empid").val();

		var emp_no = $("#emp_no").val();

		var ref_no = $("#ref").val();

		// var c_otp=$("#c_otp").val();

		//alert(emp_no+"_"+empid+"_"+fdname+"_"+ref_no);

		if (fdname != '0')

		{

			$("#otp_loader").show();

			$.ajax({

				type: "post",

				url: "control/adminProcess.php",

				data: "action=forward_form&fdname=" + fdname + "&empid=" + empid + "&ref_no=" + ref_no + "&emp_no=" + emp_no,

				success: function(data)

				{

					//alert(data);

					$("#otp_loader").hide();

					if (data == 1)

					{

						$.jGrowl("Your Form has been forwarded to" + fdname, {
							header: 'Forward Form.'
						});

						var delay = 1500;

						setTimeout(function() {
							window.location = 'sub_forms.php'
						}, delay);

					} else

					{

						// alert("Something Went Wrong.");

						$.jGrowl("Something Went Wrong...", {
							header: 'Forward Form.'
						});

					}

				}

			});

		} else {

			// alert("Please select Controlling Incahrge to forward TA.");

			$.jGrowl("Please select Controlling Incharge to forward Contingency...", {
				header: 'Forward Cont.'
			});

		}

	});
</script>