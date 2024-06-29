<?php
session_start();
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
	echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
}
include_once('../global/header.php');
include_once('../global/topbaruser.php');
include_once('../global/sidebaruser.php');

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
					//alert(data);
					//ShowRecords();
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
</script> <!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Admin
		</h1>
		<ol class="breadcrumb">

			<li class="active">
				<!--button type="button" href="#myModal" class="btn btn-success" id="#btn1"><i class="fa fa-user"> Add User</i></button-->

			</li>
		</ol>
		<br>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->

		<div class="row">

			<div class="box-body" style="padding:50px 50px 50px 50px;">
				<?php
				if (isset($_GET["emppf"]) != '') {
					$emp_id = $_GET["emppf"];
					//echo "$emp_id";
					$sqlempedit = mysqli_query($conn, "select * from tbl_employee where emplcode='$emp_id'");
					while ($rwEmpEdit = mysqli_fetch_array($sqlempedit)) {
						$id = $rwEmpEdit["empid"];
				?>
						<form method="POST" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" action="Ajaxeditemployee.php">
							<label style="font-size:20px;"><u>Basic Details..</u></label>
							<br><br>
							<div class="form-group">

								<label class="col-md-2 col-sm-4">Mobile Number </label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
										<input type="number" class="form-control primary" id="txtcontact" name="txtcontact" value="<?php echo $rwEmpEdit["contact"]; ?>" />
									</div><br>
								</div>

								<label class="col-md-2 col-sm-4">Employee No/PF No </label>
								<div class="ccol-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
										<input type="number" class="form-control primary" id="txtempcode" name="txtempcode" value="<?php echo $rwEmpEdit["emplcode"]; ?>" readonly />
									</div><br>
								</div>

								<label class="col-md-2 col-sm-4">Employee Name </label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-font"></i></div>
										<input type="text" class="form-control primary" id="txtempname" name="txtempname" value="<?php echo $rwEmpEdit["empname"]; ?>" />
									</div><br>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-4">Department</label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-cubes"></i></div>
										<select class="form-control primary" id="cmbdept" name="cmbdept" selected>
											<option value="<?php echo $rwEmpEdit["dept"]; ?>"><?php echo $rwEmpEdit["dept"]; ?></option>
											<?php
											$sqlDept = mysqli_query($conn, "select * from tbl_department");
											while ($rwDept = mysqli_fetch_array($sqlDept)) {
											?>
												<option value="<?php echo $rwDept["deptname"]; ?>"><?php echo $rwDept["deptname"]; ?></option>
											<?php
											}

											?>
										</select>
									</div><br>
								</div>

								<label class="col-md-2 col-sm-4">Designation</label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-cube"></i> </div>
										<select class="form-control primary" id="cmbdesignation" name="cmbdesignation">
											<option value="<?php echo $rwEmpEdit["design"]; ?>"><?php echo $rwEmpEdit["design"]; ?></option>
											<?php
											$sqlDept = mysqli_query($conn, "select * from tbl_designation");
											while ($rwDept = mysqli_fetch_array($sqlDept)) {
											?>
												<option value="<?php echo $rwDept["designation"]; ?>"><?php echo $rwDept["designation"]; ?></option>
											<?php
											}

											?>
										</select>
									</div><br>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-4">Station</label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-train"></i></div>
										<select class="form-control primary" id="cmbstation" name="cmbstation">
											<option value="<?php echo $rwEmpEdit["station"]; ?>"><?php echo $rwEmpEdit["station"]; ?></option>
											<?php
											$sqlDept = mysqli_query($conn, "select * from tbl_station");
											while ($rwDept = mysqli_fetch_array($sqlDept)) {
											?>
												<option value="<?php echo $rwDept["station_name"]; ?>"><?php echo $rwDept["station_name"]; ?></option>
											<?php
											}

											?>

										</select>
									</div><br>
								</div>

								<label class="col-md-2 col-sm-4">Pay Scale </label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
										<input type="text" class="form-control primary" id="txtpayscale" name="txtpayscale" value="<?php echo $rwEmpEdit["payscale"];  ?>" />
									</div><br>
								</div>
							</div>

							<div class="form-group">


								<label class="col-md-2 col-sm-4">Substantive </label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
										<input type="text" class="form-control primary" id="txtsubstantive" name="txtsubstantive" value="<?php echo $rwEmpEdit["substantive"];  ?>" />
									</div><br>
								</div>

								<label class="col-md-2 col-sm-4">7th CPC PayLevel</label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
										<input type="text" class="form-control primary" id="txtsevencpcpaylevel" name="txtsevencpcpaylevel" value="<?php echo $rwEmpEdit["sevencpcpaylevel"];  ?>" />
									</div><br>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-4">ST SC</label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-bookmark"></i></div>
										<select class="form-control primary" id="txtstsc" name="txtstsc">
											<option value="<?php echo $rwEmpEdit["stsc"]; ?>"><?php echo $rwEmpEdit["stsc"]; ?></option>
										</select>
									</div><br>
								</div>
							</div>
							<br><br><br><br>
							<hr style="background-color:black;height:1px;width:100%;">


							<label style="font-size:20px;"><u>APAR Details..</u></label>
							<div class="form-group">
								<label class="col-md-2 col-sm-4"> Year </label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
										<select class="form-control primary" id="cmbyear" name="cmbyear" selected>

											<?php
											$sqlDept = mysqli_query($conn, "select * from year");
											while ($rwDept = mysqli_fetch_array($sqlDept)) {
											?>

												<option value="<?php echo $rwDept["years"]; ?>"><?php echo $rwDept["years"]; ?></option>
											<?php
											}

											?>
										</select>
									</div><br>
								</div>

								<label class="col-md-2 col-sm-4">Integrity</label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-diamond"></i></div>
										<select class="form-control primary" name="txtinterity" id="txtinterity">
											<option value="" selected hidden disabled> -- Select Integrity -- </option>
											<option value="Beyond Doubtfull">Beyond Doubtfull</option>
											<option value="Doubtfull">Doubtfull</option>
											<option value="Other">Other</option>
										</select>
									</div><br>
								</div>

								<label class="col-md-2 col-sm-4">Reporting Officer Grading:</label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-navicon"></i></div>
										<select class="form-control" name="txtreportingofficer" id="txtreportingofficer">
											<option value="" selected hidden disabled>-- Select Reporting Officer Grade --</option>
											<option value="5">Outstading</option>
											<option value="4">Very Good</option>
											<option value="3">Good</option>
											<option value="2">Average</option>
											<option value="1">Below Average</option>
											<option value="NA">Not Applicable</option>
										</select>
									</div><br>
								</div>

								<label class="col-md-2 col-sm-4">Reviewing Officer Grading:</label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-navicon"></i></div>
										<select class="form-control" name="txtreviewingofficer" id="txtreviewingofficer" onchange="getCount();">
											<option value="" selected hidden disabled>-- Select Reviewing Officer Grade --</option>
											<option value="5">Outstading</option>
											<option value="4">Very Good</option>
											<option value="3">Good</option>
											<option value="2">Average</option>
											<option value="1">Below Average</option>
											<option value="NA">Not Applicable</option>
										</select>
									</div><br>
								</div>

								<label class="col-md-2 col-sm-4">Accepting Authority Grading:</label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-navicon"></i></div>
										<select class="form-control" name="txtacceptauthofficer" id="txtacceptauthofficer" onchange="showGrade();">
											<option value="" selected hidden disabled>-- Select Accepting Authority Grade --</option>
											<option value="5">Outstading</option>
											<option value="4">Very Good</option>
											<option value="3">Good</option>
											<option value="2">Average</option>
											<option value="1">Below Average</option>
											<option value="0">Not Applicable</option>
										</select>
										<input type="hidden" class="form-control primary" id="txttotalgrade" name="txttotalgrade" />
									</div><br>
								</div>

								<label class="col-md-2 col-sm-4">Select type</label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-server"></i></div>
										<select class="form-control primary" name="txttype" id="txttype">
											<option value="APAR Report">APAR Report</option>
											<option value="Working Report">Working Report</option>
										</select>
									</div><br>
								</div>


								<label class="col-md-2 col-sm-4">Select File </label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-upload"></i></div>
										<input type="file" class="form-control primary" id="txtfileappr" name="txtfileappr[]" multiple="multiple" />
										<input type="hidden" class="form-control primary" id="txtempid" name="txtempid" value="<?php echo $rwEmpEdit["empid"]; ?>" />
										<input type="hidden" id="txtsession" name="txtsession" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>" />
									</div>
								</div><br>

								<div class="clearfix"></div>
								<br><br>
							</div>
							<div class="form-group">
								<div class="col-md-12">

									<input type="submit" id="btnupdate" name="btnupdate" value="Update" class="btn btn-primary" />
									<input type="reset" id="btnreset" name="btnreset" value="Reset" class="btn btn-default" onClick="window.location.reload()" />
									<br>
									<br>
									<br>
								</div>
							</div>
						</form>
				<?php
					}
				}
				?>

			</div>

		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<script>

</script>
<?php
include_once('../global/footer.php');
?>