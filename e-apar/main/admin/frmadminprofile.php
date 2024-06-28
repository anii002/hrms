<?php
session_start();
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
	echo "<script>window.location='http://drmpsur-hrms.in/e-apar/index.php';</script>";
}
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

?>
<script>
	//----------------------------// Document Ready Function //----------------------------//
	$(document).ready(function() {
		ShowRecordsUser();
		$("#frmaddemployee").submit(function(event) {
			var formData = new FormData($(this)[0]);
			formData.append("Flag", $("#btnSave").val());
			$.ajax({
				url: "Ajaxemployee.php",
				type: 'POST',
				data: formData,
				async: false,
				success: function(data) {
					// alert(data);
					// ShowRecords();
				},
				cache: false,
				contentType: false,
				processData: false
			});
		});
	}); ///ready fun close


	//----------------------------//Function ShowRecords User//----------------------------//
	function ShowRecordsUser() {
		$.post("Ajaxemployee.php", {
				Flag: "ShowRecordsUser"
			},
			function(data, success) {
				$("#divRecords").html(data);
				var oTable = $('#tbl_registration').dataTable({
					"oLanguage": {
						"sSearch": "Search all columns:"
					},
					"aoColumnDefs": [{
							'bSortable': false,
							'aTargets': [0]
						} //disables sorting for column one
					],
					'iDisplayLength': 12,
					"sPaginationType": "full_numbers",
					"dom": 'T<"clear">lfrtip'
				});
			}
		);
	}
</script>
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Admin Profile
		</h1>
		<ol class="breadcrumb">

			<li class="active">
				<button type="button" class="btn btn-warning" id="" data-toggle='modal' data-target='#myModalAddUserPermissions'><i class="fa fa-user"> User Permissions</i></button>

			</li>
		</ol>
		<br>
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="row">
			<div class="col-md-3">

				<!-- Profile Image -->
				<div class="box box-primary">
					<div class="box-body box-profile" style="height: 391px;">
						<img class="profile-user-img img-responsive img-circle" src="../plugins/dist/user2-160x160.jpg" alt="User profile picture">

						<h3 class="profile-username text-center"><?php echo $_SESSION['SESS_ADMIN_FULLNAME']; ?></h3>
						<br>
						<p class="text-muted text-center">Sr.Divisional Personnel Officer</p>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
				<!-- /.box -->
			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#activity" data-toggle="tab">Basic Details</a></li>
						<li><a href="#settings" data-toggle="tab">Change Password</a></li>
					</ul>
					<div class="tab-content">
						<?php
						$sqladmin = mysqli_query($conn, "select * from tbl_login");
						while ($rwAdmin = mysqli_fetch_array($sqladmin)) {
						?>
							<div class="active tab-pane" id="activity">
								<!-- Post -->
								<div class="post">
									<div class="user-block">
										<img class="img-circle img-bordered-sm" src="../plugins/dist/user2-160x160.jpg" alt="user image">
										<span class="username">
											<a href="#"><?php echo $_SESSION['SESS_ADMIN_FULLNAME']; ?></a>
									</div>
									<!-- /.user-block -->
									<p>
										About Me
									</p>

									<form class="form-horizontal">
										<div class="form-group">
											<label for="inputName" class="col-sm-2 control-label">Name</label>

											<div class="col-sm-10">
												<input type="email" class="form-control" id="inputName" value="<?php echo $rwAdmin["adminname"]; ?>" readonly />
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail" class="col-sm-2 control-label">Email</label>

											<div class="col-sm-10">
												<input type="email" class="form-control" id="inputEmail" value="<?php echo $rwAdmin["email"]; ?>" readonly />
											</div>
										</div>
										<div class="form-group">
											<label for="inputName" class="col-sm-2 control-label">Role</label>

											<div class="col-sm-10">
												<input type="text" class="form-control" id="inputName" value="<?php echo $rwAdmin["role"]; ?>" readonly />
											</div>
										</div>
										<div class="form-group">
											<label for="inputExperience" class="col-sm-2 control-label">User Name</label>

											<div class="col-sm-10">
												<input type="text" class="form-control" id="inputName" value="<?php echo $rwAdmin["username"]; ?>" readonly />
											</div>
										</div>
										<div class="form-group">
											<label for="inputSkills" class="col-sm-2 control-label">Password</label>

											<div class="col-sm-10">
												<input type="text" class="form-control" id="inputSkills" value="<?php echo $rwAdmin["password"]; ?>" readonly />
											</div>
										</div>
									</form>
								</div>
							</div>

							<!-- /.post -->
							<div class="tab-pane" id="settings">
								<form class="form-horizontal" id="frmchangepass" action="Ajaxchangepassword.php" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label for="inputName" class="col-sm-3 control-label">Old Username</label>

										<div class="col-sm-8">
											<input type="text" class="form-control" id="txtoldpass" name="txtoldpass" value="<?php echo $rwAdmin["password"]; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail" class="col-sm-3 control-label">New Password</label>

										<div class="col-sm-8">
											<input type="password" class="form-control" id="txtnewpass" name="txtnewpass" placeholder="Enter New Password">
										</div>
									</div>
									<div class="form-group">
										<label for="inputName" class="col-sm-3 control-label">Re-Enter New Password</label>

										<div class="col-sm-8">
											<input type="password" class="form-control" id="txtrenewpass" name="txtrenewpass" placeholder="Re-Enter New Password">
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<div class="checkbox">
												<label>
													<input type="checkbox"> Remember Me
												</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-info btn-flat" id="btnSubmit" name="btnSubmit">Submit</button>
										</div>
									</div>
								</form>
							</div>
							<!-- /.tab-pane -->
							<!-- /.tab-pane -->

						<?php
						}
						?>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->

		<div class="modal fade" id="myModalAddUserPermissions" tabindex="-4" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="example-modal">
				<div class="modal-dialog">
					<div class="modal-content" style="height: 1000px;">
						<div class="modal-header" style="background-color: rgba(150, 9, 57, 0.54);color: white;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true"><b>×</b></span></button>
							<h4 class="modal-title" style="text-align:center;"><i class="fa fa-edit"></i>&nbsp;&nbsp; Grant User Permissions</h4>
							<hr style="width:100%;background-color:red;height:2px;">
						</div>
						<form method="GET" id="frmadduser" action="ajaxAccess.php" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">
							<div class="modal-body" style="overflow-x: scroll;width:100%;">
								<table class="table table-striped table-hover" style="border:1px solid gray;" id="example">
									<thead>
										<tr>
											<th>User Level</th>
											<th>Access Justification</th>
											<th colspan="10">Access Permissions</th>
										</tr>
									</thead>
									<tbody>

										<tr>
											<td rowspan="1">&nbsp;</td>
											<td rowspan="1">&nbsp;</td>
											<td>&nbsp;A</td>
											<td>&nbsp;B</td>
											<td>&nbsp;C</td>
											<td>&nbsp;D</td>
											<td>&nbsp;E</td>
											<td>&nbsp;F</td>
											<td>&nbsp;G</td>
											<td>&nbsp;H</td>
											<td>&nbsp;I</td>
											<td>&nbsp;J</td>
										</tr>

										<tr>
											<?php
											$sql = "select * from tbl_accesspermission where accesslevel='Super Admin'";
											$rwResult = mysqli_query($conn, $sql);
											$cnt = 3;
											while ($fetch = mysqli_fetch_array($rwResult, MYSQLI_NUM)) {

											?>
												<td>&nbsp;<input type="text" value="Super Admin" style="border:none;" name="txtsuperadmin" id="txtsuperadmin" readonly /></td>
												<td>&nbsp;<input type="text" id="txtdept1" style="border:none;" name="txtdept1" value="All Departments" readonly /></td>
											<?php
												for ($i = 1; $i <= 10; $i++) {
													$value = $fetch[$cnt++];

													if ($value == "on")
														echo "<td>&nbsp;<input type='checkbox' id='check" . $i . "' name='check" . $i . "' checked/></td>";
													else
														echo "<td>&nbsp;<input type='checkbox' id='check" . $i . "' name='check" . $i . "' /></td>";
												}
											}
											?>

										</tr>
										<tr>
											<?php
											$sql1 = "select * from tbl_accesspermission where accesslevel='Admin'";
											$rwResult1 = mysqli_query($conn, $sql1);
											$cnt = 3;
											while ($fetch1 = mysqli_fetch_array($rwResult1, MYSQLI_NUM)) {
											?>
												<td>&nbsp;<input type="text" style="border:none;" value="Admin" name="txtadmin" id="txtadmin" readonly /></td>
												<td>&nbsp;<input type="text" id="txtdept2" style="border:none;" name="txtdept2" value="All Departments" readonly /></td>
											<?php
												for ($i = 11; $i <= 20; $i++) {
													$value1 = $fetch1[$cnt++];

													if ($value1 == "on")
														echo "<td>&nbsp;<input type='checkbox' id='check" . $i . "' name='check" . $i . "' checked/></td>";
													else
														echo "<td>&nbsp;<input type='checkbox' id='check" . $i . "' name='check" . $i . "' /></td>";
												}
											}
											?>
										</tr>
										<tr>
											<?php
											$sql2 = "select * from tbl_accesspermission where accesslevel='Officer General'";
											$rwResult2 = mysqli_query($conn, $sql2);
											$cnt = 3;
											while ($fetch2 = mysqli_fetch_array($rwResult2, MYSQLI_NUM)) {
											?>
												<td>&nbsp;<input type="text" style="border:none;" value="Officer General" name="txtOfficerGeneral" id="txtOfficerGeneral" readonly /></td>
												<td>&nbsp;<input type="text" id="txtdept3" style="border:none;" name="txtdept3" value="All Departments" readonly /></td>
											<?php
												for ($i = 21; $i <= 30; $i++) {
													$value2 = $fetch2[$cnt++];

													if ($value2 == "on")
														echo "<td>&nbsp;<input type='checkbox' id='check" . $i . "' name='check" . $i . "' checked/></td>";
													else
														echo "<td>&nbsp;<input type='checkbox' id='check" . $i . "' name='check" . $i . "' /></td>";
												}
											}
											?>
										</tr>
										<tr>
											<?php
											$sql3 = "select * from tbl_accesspermission where accesslevel='Officer Departmental'";
											$rwResult3 = mysqli_query($conn, $sql3);
											$cnt = 3;
											while ($fetch3 = mysqli_fetch_array($rwResult3, MYSQLI_NUM)) {
											?>
												<td>&nbsp;<input type="text" style="border:none;" value="Officer Departmental" name="txtOfficerDepartmental" id="txtOfficerDepartmental" readonly /></td>
												<td>&nbsp;<input type="text" id="txtdept4" style="border:none;" name="txtdept4" value="Concerned Department" readonly /></td>
											<?php
												for ($i = 31; $i <= 40; $i++) {
													$value3 = $fetch3[$cnt++];

													if ($value3 == "on")
														echo "<td>&nbsp;<input type='checkbox' id='check" . $i . "' name='check" . $i . "' checked/></td>";
													else
														echo "<td>&nbsp;<input type='checkbox' id='check" . $i . "' name='check" . $i . "' /></td>";
												}
											}
											?>
										</tr>
										<tr>
											<?php
											$sql4 = "select * from tbl_accesspermission where accesslevel='Cadder Cheif Office Superitendent'";
											$rwResult4 = mysqli_query($conn,$sql4);
											$cnt = 3;
											while ($fetch4 = mysqli_fetch_array($rwResult4, MYSQLI_NUM)) {
											?>
												<td>&nbsp;<input type="text" style="border:none;" value="Cadder Cheif Office Superitendent" name="txtCHOS" id="txtCHOS" readonly /></td>
												<td>&nbsp;<input type="text" id="txtdept5" style="border:none;" name="txtdept5" value="Concerned Department" readonly /></td>
											<?php
												for ($i = 41; $i <= 50; $i++) {
													$value4 = $fetch4[$cnt++];

													if ($value4 == "on")
														echo "<td>&nbsp;<input type='checkbox' id='check" . $i . "' name='check" . $i . "' checked/></td>";
													else
														echo "<td>&nbsp;<input type='checkbox' id='check" . $i . "' name='check" . $i . "' /></td>";
												}
											}
											?>
										</tr>

										<tr>
											<?php
											$sql5 = "select * from tbl_accesspermission where accesslevel='Techinical'";
											$rwResult5 = mysqli_query($conn,$sql5);
											$cnt = 3;
											while ($fetch5 = mysqli_fetch_array($rwResult5, MYSQLI_NUM)) {
											?>
												<td>&nbsp;<input type="text" style="border:none;" value="Techinical" name="txtTechinical" id="txtTechinical" readonly /></td>
												<td>&nbsp;<input type="text" id="txtdept6" style="border:none;" name="txtdept6" value="Concerned Department" readonly /></td>
											<?php
												for ($i = 51; $i <= 60; $i++) {
													$value5 = $fetch5[$cnt++];

													if ($value5 == "on")
														echo "<td>&nbsp;<input type='checkbox' id='check" . $i . "' name='check" . $i . "' checked/></td>";
													else
														echo "<td>&nbsp;<input type='checkbox' id='check" . $i . "' name='check" . $i . "' /></td>";
												}
											}
											?>
										</tr>
										<tr>
											<td colspan="10"><button class="btn btn-primary btn-flat" id="btnGrant" name="btnGrant">Grant</button></td>
										</tr>

									</tbody>
								</table>

							</div>
							<div class="col-md-12">
								<div class="clearfix"></div><br><br>
								<div class="box box-success box-solid">
									<div class="box-header with-border">
										<h3 class="box-title"><i class="fa fa-tags"></i>&nbsp;&nbsp;<b>Note:</b></h3>
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<label>Access Types</label><br>
										<div class="col-md-4">
											<label>A:&nbsp;View</label><br>
											<label>B:&nbsp;Add</label><br>
											<label>C:&nbsp;Edit</label><br>
											<label>D:&nbsp;Delete</label>
										</div>
										<div class="col-md-4">
											<label>E:&nbsp;Confirm Edit</label><br>
											<label>F:&nbsp;Confirm Delete</label><br>
											<label>G:&nbsp;Grouping / Flagging</label><br>
											<label>H:&nbsp;Assigning Group</label>
										</div>
										<div class="col-md-4">
											<label>I:&nbsp;Report Generation</label><br>
											<label>J:&nbsp;Report Printing</label><br>
										</div>
									</div>
									<!-- /.box-body -->
								</div>
								<!-- /.box -->
							</div>
						</form>

					</div>
					<!-- /.modal-content -->
				</div>
			</div>
		</div><!--Modal End-->
		<!--END ADMIN MODAL SETTINGS -->

	</section>

	<!-- /.content -->
</div>


<!-- Modal Open-->


<?php
include_once('../global/footer.php');
?>