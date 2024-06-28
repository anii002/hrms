<?php
session_start();
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
	echo "<script>window.location='http://drmpsur-hrms.in/e-apar/index.php';</script>";
}
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

?>
<!--link rel="stylesheet" href="style.css" media="screen"/-->
<script>

</script>
<style>
	.primary {
		box-shadow: none;
		border-color: #337AB7;
	}
</style>
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Employee Management
		</h1>

		<br>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->

		<div class="row" style="overflow-y:scroll;">
			<!--div class="box-body" style="padding:50px 50px 50px 50px;"-->
			<?php
			if (isset($_GET["emppf"]) != '') {
				$emp_id = $_GET["emppf"];

				$sqlempedit = mysqli_query($conn,"select * from tbl_employee where emplcode='" . $_GET["emppf"] . "'");
				$rwEmpEdit = mysqli_fetch_array($sqlempedit);
				$empcode = $rwEmpEdit["emplcode"];
			?>
				<div class="box box-info">
					<div class="box-header">
						<h3 class="box-title">Individual Employee Details...</h3>
						<hr>
					</div>

					<div class="form-group" id="divcategory">
						<label class="col-md-2 col-sm-4">Category: </label>
						<div class="ccol-md-4 col-sm-4">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-cubes"></i></div>
								<select class="form-control primary" id="selyear" name="selyear">
									<option value="" selected hidden disabled>-- Select Category --</option>
									<option value="1"> ALL </option>
									<option value="2">Particular Year</option>
									<option value="3">Select Number Of Years</option>
									<!--option value="4">Range</option-->
								</select>
							</div><br>
						</div>
					</div>


					<div class="form-group" id="divparticular">
						<label class="col-md-2 col-sm-4">Particular Year: </label>
						<div class="ccol-md-4 col-sm-4">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-cubes"></i></div>
								<select class="form-control primary" id="selyear" name="selyear" onChange="showParticularReport(this)">
									<option value="" selected hidden disabled>-- Select Years --</option>
									<?php
									$emp_id = $_GET["emppf"];
									$sqlemployee = mysqli_query($conn,"select * from scanned_apr where empid='" . $emp_id . "'");
									while ($rwEmp = mysqli_fetch_array($sqlemployee)) {

									?>
										<option value="<?php echo $rwEmp["year"]; ?>"><?php echo $rwEmp["year"]; ?></option>
									<?php
									}
									?>
								</select>
							</div><br>
						</div>
					</div>
					<div id="outputparticular" style="margin-left:20px;"></div>

					<div class="form-group" id="customdate">
						<label class="col-md-1">Year :</label>
						<div class="col-md-4">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
								<select class="form-control" id="txtstartyear" name="txtstartyear" onChange="showReport(this)">
									<option value="" selected hidden disabled>-- Start Number Of Year --</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
								</select>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div id="showcustomedetails" style="margin-left:20px;"></div>


					<div class="box-body" id="empbasic" name="empbasic">
						<form method="get" action="Ajaxaddremark.php" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">
							<div class="clearfix"></div>
							<label style="font-size:18px;"><u>Basic Details....</u></label>
							<div class="form-group">
								<label class="col-md-2 col-sm-4">Employee Code </label>
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
										<input type="text" class="form-control primary" id="txtempname" name="txtempname" value="<?php echo $rwEmpEdit["empname"]; ?>" readonly />
									</div><br>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-4">Department</label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-cubes"></i></div>
										<select class="form-control primary" id="cmbdept" name="cmbdept" readonly>
											<option value="<?php echo $rwEmpEdit["dept"]; ?>"><?php echo $rwEmpEdit["dept"]; ?></option>
										</select>
									</div><br>
								</div>

								<label class="col-md-2 col-sm-4">Designation</label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"> <i class="fa fa-cube"></i></div>
										<select class="form-control primary" id="cmbdesignation" name="cmbdesignation" readonly>
											<option value="<?php echo $rwEmpEdit["designation"]; ?>"><?php echo $rwEmpEdit["design"]; ?></option>

										</select>
									</div><br>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 col-sm-4">Station</label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-train"></i></div>
										<select class="form-control primary" id="cmbstation" name="cmbstation" readonly>
											<option value="<?php echo $rwEmpEdit["station"]; ?>"><?php echo $rwEmpEdit["station"]; ?></option>
										</select>
									</div><br>
								</div>

								<label class="col-md-2 col-sm-4">Pay Scale </label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
										<input type="text" class="form-control primary" id="txtpayscale" name="txtpayscale" value="<?php echo $rwEmpEdit["payscale"];  ?>" readonly />
									</div><br>
								</div>

								<label class="col-md-2 col-sm-4">Substantive </label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
										<input type="text" class="form-control primary" id="txtsubstantive" name="txtsubstantive" value="<?php echo $rwEmpEdit["substantive"];  ?>" readonly />
									</div><br>
								</div>

								<label class="col-md-2 col-sm-4">Mobile No </label>
								<div class="col-md-4 col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-phone"></i></div>
										<input type="text" class="form-control primary" id="txtsubstantive" name="txtsubstantive" value="<?php echo $rwEmpEdit["contact"];  ?>" readonly />
									</div><br>
								</div>
							</div>
							<div class="clearfix"></div>
					</div>
				</div>


				<div class="clearfix"></div>
				<!--hr style="background-color:red;height:4px;width:100%;"-->
				<br><br>
				<div class="box box-info" id="divemployee">
					<div class="box-body" style=" overflow-y: scroll;">
						<label style="font-size:18px;"><u>APAR Details....</u></label>
						<table class='table table-striped table-bordered table-hover' id='example'>
							<thead>
								<tr>
									<th>APAR YEAR</th>
									<th>Name</th>
									<th>Department</th>
									<th>Designation</th>
									<th>Integrity</th>
									<th>Reporting Officer Grading</th>
									<th>Reviewing Officer Grading</th>
									<th>Accepting Authority Grading</th>
									<th>Remark</th>
								</tr>
							</thead>
							<?php
							$sqlempedit = mysqli_query($conn,"select * from scanned_apr where empid='" . $_GET["emppf"] . "'");
							while ($rwEmpEdit = mysqli_fetch_array($sqlempedit, MYSQLI_ASSOC)) {
								$empfno = $_GET["emppf"];
								$year_E = $rwEmpEdit["year"];
								$remark = $rwEmpEdit["overallremark"];
							?>
								<tbody>
									<tr>
										<input type="hidden" name="txtid$empfno" id="txtid$empfno" value="<?php echo $empfno; ?>" />
										<td>
											<?php echo
											"<input type='hidden' name='txtid$year_E' id='txtid$year_E' value='$empfno'/>
									  <a href='sampleyeardemo.php?emppf=$empfno&year=$year_E' data-toggle='modal' data-target='#myModalImage' role='button' ><input type='text' name='txtyear' id='txtyear' value='" . $rwEmpEdit['year'] . "' style='border:none;' readonly /></a>"; ?>
										</td>
										<td><?php echo $rwEmpEdit["empname"]; ?></td>
										<td><?php echo $rwEmpEdit["dept"]; ?></td>
										<td><?php echo $rwEmpEdit["designation"]; ?></td>
										<td><?php echo $rwEmpEdit["integrity"]; ?></td>
										<td><?php echo $rwEmpEdit["reportinggrade"]; ?></td>
										<td><?php echo $rwEmpEdit["reviewinggrade"]; ?></td>
										<td><?php echo $rwEmpEdit["acceptinggrade"]; ?></td>
										<td><?php echo $rwEmpEdit["overallremark"]; ?></td>
									</tr>
								</tbody>
							<?php
							}
							?>
						</table>
					</div>
				</div>

			<?php
			}
			?>
		</div><!--Form group close-->
		</form>

</div>
<!--Modal Code For APAR YEAR START-->

<!--Modal Code For APAR YEAR END-->


<!-- /.row -->
</section>
<!-- /.content -->
</div>

<script>
	//----------------Script-------------------------//

	$(document).ready(function() {
		$('#divemployee').hide();
		$('#divparticular').hide();
		$('#empbasic').hide();
		$('#customdate').hide();
		$('#divcategory').show();
		$('#showcustomedetails').hide();
		//alert($('#selyear').val());

		$('#selyear').change(function() {
			if ($('#selyear').val() == '1') {
				//window.location.reload();

				$('#empbasic').show();
				$('#divemployee').show();
				//$("#divcategory").val("");
				$('#customdate').hide();
				$('#outputparticular').hide();
				$('#divparticular').hide();
				$('#showcustomedetails').hide();

			} else if ($('#selyear').val() == '2') {

				$('#divemployee').hide();
				$('#divparticular').show();
				//$("#divcategory").val("");
				$('#empbasic').hide();
				$('#divcategory').show();
				$('#outputparticular').show();
				$('#customdate').hide();
				$('#showcustomedetails').hide();



			} else if ($('#selyear').val() == '3') {

				$('#divemployee').hide();
				//$("#divcategory").val("");
				$('#divparticular').hide();
				$('#empbasic').hide();
				$('#divcategory').show();
				$('#outputparticular').hide();
				$('#showcustomedetails').show();
				$('#customdate').show();

			} else {
				alert('Please selecte any category..........!')
			}
		});
	});


	//----- --------------Script End -------------//
	$(document).ready(function() {
		$(".nvalue").click(function() {

			id = $(this).attr('id');
			var nvalue1 = document.getElementById("txtremark" + id).value;
			var v1 = document.getElementById("txtid" + id).value;
			//alert(id);
			//alert(v1);
			//alert(nvalue1);
			//if (nvalue1.length > 0 ) 
			{
				$.ajax({
					type: "POST",
					url: "Ajaxaddremark.php",
					data: "nvalue1=" + nvalue1 + "&v1=" + v1 + "&id=" + id,
					cache: false,
					beforeSend: function() {
						$('#output' + id).html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
					},
					success: function(html) {
						$("#output" + id).html(html);
						$("#txtremark" + id).hide();
						//window.location.reload();
					}
				});
			}

		});


	});


	//--------------------------Select Particular Year---------------//
	function showParticularReport(sel) {
		var selyear = sel.options[sel.selectedIndex].value;
		var var1 = document.getElementById("txtempcode").value;
		$("#outputparticular").html("");
		if (selyear.length > 0) {
			$.ajax({
				type: "POST",
				url: "frmfetchindividual.php",
				data: "selyear=" + selyear + "&var1=" + var1,
				cache: false,
				beforeSend: function() {
					$('#outputparticular').html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
				},
				success: function(html) {
					$("#outputparticular").html(html);
					//window.location.reload();
					$('#divemployee').show();

				}
			});
		}
	}
	//----------End-----------------//
	function showReport(sel) {
		var txtstartyear = sel.options[sel.selectedIndex].value;
		var var1 = document.getElementById("txtempcode").value;
		//$('#customdate').show();
		//alert(var1);
		$("#showcustomedetails").html("");
		if (txtstartyear.length > 0) {
			$.ajax({
				type: "POST",
				url: "frmfetchindreport.php",
				data: "txtstartyear=" + txtstartyear + "&var1=" + var1,
				cache: false,
				beforeSend: function() {
					$('#showcustomedetails').html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
				},
				success: function(html) {
					$("#showcustomedetails").html(html);
					$('#divemployee').show();
				}
			});
		}
	}
</script>
<?php
include_once('../global/footer.php');
include_once('demo/Modal_Member.php');
?>