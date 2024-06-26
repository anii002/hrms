<?php
session_start();
if (!isset($_SESSION['EMP_PF_NO'])) {
	echo "<script>window.location='http://localhost/E-APAR/index.php';</script>";
}
include_once('../global/header.php');
include_once('../global/topbaremployee.php');
include_once('../global/sidebaremployee.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Employee APAR Details</h1>
		<hr>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title"><i class="fa fa-tag"></i>&nbsp;&nbsp; Employee APAR Details</h3>
				</div>
				<div class="box-body">
					<?php
					$empcode = $_SESSION['EMP_PF_NO'];
					//echo $empcode;
					$sqlempedit = mysqli_query($conn, "select * from tbl_employee where emplcode='$empcode'");
					while ($rwEmpEdit = mysqli_fetch_array($sqlempedit)) {
						$id = $rwEmpEdit["empid"];
						$empcode = $rwEmpEdit["emplcode"];
						$empyear = $rwEmpEdit["year"];
					?>
						<form method="post" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" action="">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class=""> Year </label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
											<select class="form-control primary" id="cmbyear" name="cmbyear" readonly>
												<option value="<?php echo $rwEmpEdit["year"]; ?>"><?php echo $rwEmpEdit["year"]; ?></option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="">Employee Code </label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
											<input type="number" class="form-control primary" id="txtempcode" name="txtempcode" value="<?php echo $rwEmpEdit["emplcode"]; ?>" readonly />
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="">Employee Name </label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-font"></i></div>
											<input type="text" class="form-control primary" id="txtempname" name="txtempname" value="<?php echo $rwEmpEdit["empname"]; ?>" readonly />
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="">Department</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-cubes"></i></div>
											<select class="form-control primary" id="cmbdept" name="cmbdept" readonly>
												<option value="<?php echo $rwEmpEdit["dept"]; ?>"><?php echo $rwEmpEdit["dept"]; ?></option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="">Designation</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-cube"></i></div>
											<select class="form-control primary" id="cmbdesignation" name="cmbdesignation" readonly>
												<option value="<?php echo $rwEmpEdit["design"]; ?>"><?php echo $rwEmpEdit["design"]; ?></option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="">Station</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-train"></i></div>
											<select class="form-control primary" id="cmbstation" name="cmbstation" readonly>
												<option value="<?php echo $rwEmpEdit["station"]; ?>"><?php echo $rwEmpEdit["station"]; ?></option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="">Pay Scale </label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
											<input type="text" class="form-control primary" id="txtpayscale" name="txtpayscale" value="<?php echo $rwEmpEdit["payscale"];  ?>" readonly />
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="">Integrity</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-diamond"></i></div>
											<input type="text" class="form-control primary" id="txtinterity" name="txtinterity" value="<?php echo $rwEmpEdit["integrity"];  ?>" readonly />
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="">Substantive </label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
											<input type="number" class="form-control primary" id="txtsubstantive" name="txtsubstantive" value="<?php echo $rwEmpEdit["substantive"];  ?>" readonly />
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="">ST SC</label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-bookmark"></i></div>
											<input type="text" class="form-control primary" id="txtstsc" name="txtstsc" value="<?php echo $rwEmpEdit["stsc"];  ?>" readonly />
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="">Mobile number </label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
											<input type="number" class="form-control primary" id="txtsubstantive" name="txtsubstantive" value="<?php echo $rwEmpEdit["contact"];  ?>" readonly />
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="">Selected Year </label>
										<div class="input-group">
											<div class="input-group-addon"><i class="fa fa-image"></i></div>
											<select class="form-control primary" id="txtyear" name="txtyear" onChange="showImage(this);">
												<option value="">--Select Year--</option>
												<?php

												$employeeid = $rwEmpEdit["emplcode"];
												$sqlscapr = mysqli_query($conn, "select distinct year from scanned_img where empid='$employeeid'");
												while ($rwYear = mysqli_fetch_array($sqlscapr)) {
													$rowempid = $rwYear["empid"];
												?>
													<option value="<?php echo $rwYear["year"]; ?>"><?php echo $rwYear["year"]; ?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<div class="col-md-2">
									<div class="input-group">
										<button type="button" class="btn btn-primary btn-block btn-flat" id="btnmultiple" name="btnmultiple" onclick='display_multiple()'><i class="fa fa-image"></i> &nbsp;&nbsp;Multiple Year Image</button>
									</div>
								</div>
								<div class="col-md-2">
									<div class="input-group">
										<button type="button" class="btn btn-warning btn-block btn-flat" onclick='window.location.reload();'><i class="fa fa-refresh"></i> &nbsp;Refresh</button>
									</div>
								</div>
								<div id="output1"> </div>
							</div>
				</div>
			</div><!--box info-->
		</div>
		</form>
		<div class="row" id="show_multiple" name="show_multiple">

		</div>
	<?php
					}
	?>

	<!-- /.row -->
	</section>
	<!-- /.content -->
</div>

<script>
	function showImage(sel) {
		var txtyear = sel.options[sel.selectedIndex].value;
		var empcode = document.getElementById("txtempcode").value;
		$("#output1").html("");
		if (txtyear.length > 0) {
			$.ajax({
				type: "POST",
				url: "demo/fetch_state.php",
				data: "txtyear=" + txtyear + "&empcode=" + empcode,
				//data: "empcode="+ empcode,

				cache: false,
				beforeSend: function() {
					$('#output1').html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
				},
				success: function(html) {
					$("#output1").html(html);
					$('#show_multiple').hide();
					$('#output1').show();
				}
			});

		}
	}

	function display_multiple() {
		//alert('Multiple');
		var empcode = document.getElementById("txtempcode").value;

		var btnshow = document.getElementById("btnmultiple").value;
		$("#show_multiple").html("");
		if (txtyear.length > 0) {
			$.ajax({
				type: "POST",
				url: "demo/fetch_multiple.php",
				data: "btnshow=" + btnshow + "&empcode=" + empcode,
				cache: false,
				beforeSend: function() {
					$('#show_multiple').html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
				},
				success: function(html) {
					$("#show_multiple").html(html);
					$('#output1').hide();
					$('#show_multiple').show();
				}
			});

		}
	}
</script>
<?php
include_once('../global/footer.php');
?>