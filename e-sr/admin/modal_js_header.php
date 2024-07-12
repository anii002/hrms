<style>
	.okay_hover:focus {
		background: red !important;
	}
</style>
<!-- Modal Bill Unit-->
<div id="bill_unit_select" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Select Deopt and Bill Unit <a style='color:red;' href='DIVN MAP.jpg' target='_blank'><i class="fa fa-picture-o" style='padding-left:10px; font-size:22px;' aria-hidden="true"></i></a></h4>
				<!--DIVN MAP.jpg-->
			</div>
			<div class="modal-body">
				<!--<strong></string><u><a style='color:red;' href='DIVN MAP.jpg' target='_blank'>OPEN DIVN MAP</a></u></strong>-->
				<input type="hidden" name="got_bill_unit" id="got_bill_unit">
				<div class="row">
					<div class="col-md-12" style="margin-top:20px;">
						<label for="modal_zone">Zone</label>
						<select class="form-control select2" style="width:100%;" id="modal_zone" name="modal_zone">
							<option value="blank" selected>--Select Zone--</option>
							<?php
							$conn = dbcon();
							$sql = mysqli_query($conn, "select * from aims");
							while ($sql_fetch = mysqli_fetch_array($sql)) {
								echo "<option value='" . $sql_fetch['RLYCODE'] . "'>" . $sql_fetch['LONGDESC'] . "</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" style="margin-top:20px;">
						<label for="modal_zone">Unit</label>
						<select class="form-control select2" style="width:100%;" id="modal_unit" name="modal_unit">
							<option value="" readonly hidden selected>--Select Unit--</option>

						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" style="margin-top:20px;">
						<label for="modal_zone">Bill Unit/Depot</label>
						<select class="form-control select2" style="width:100%;" id="bill_unit_depot" name="bill_unit_depot">
							<option value="" readonly hidden selected>--Bill Unit/Depot--</option>

						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="row pull-left">
					<div class="col-md-12">
						<a href="#" data-toggle='modal' data-target="#extra_billunit" data-dismiss="modal" style="color:red;">In case of Complexities In mapping units click on this link for customise mapping</a>
					</div>
				</div>
				<br>
				<br>
				<button type="button" tabindex='1' class="btn btn-primary okay_hover" id="modal_okay" name="modal_okay" data-dismiss="modal">Okay</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
<!-- bill unit modal ends----------->

<!--Extra Modal Bill Unit-->
<div id="extra_billunit" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Deopt and Bill Unit</h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="process.php?add_deopt_billunit">
					<input type="hidden" name="got_bill_unit" id="got_bill_unit">
					<div class="row">
						<div class="col-md-12" style="margin-top:20px;">
							<label for="modal_zone">Zone</label>
							<input type="text" class="form-control" id="extra_modal_zone" name="extra_modal_zone">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" style="margin-top:20px;">
							<label for="modal_zone">Unit</label>
							<input type="text" class="form-control" id="extra_modal_unit" name="extra_modal_unit">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" style="margin-top:20px;">
							<label for="modal_zone">Bill Unit</label>
							<input type="text" class="form-control" id="extra_modal_billunit" name="extra_modal_billunit">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" style="margin-top:20px;">
							<label for="modal_zone">Depot</label>
							<input type="text" class="form-control" id="extra_modal_depot" name="extra_modal_depot">
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="modal_add_depot_okay" name="modal_add_depot_okay" data-dismiss="modal">Okay</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		</form>
	</div>
</div>
<!-- bill unit modal ends----------->

<!-- station Unit-->
<div id="station" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Select Station</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12" style="margin-top:20px;">
						<label for="modal_zone">Zone</label>
						<select class="form-control select2" style="width:100%;" id="modal_zone_station" name="modal_zone_station">
							<option value="blank" selected>--Select Zone--</option>
							<?php
							$conn = dbcon();
							$sql = mysqli_query($conn, "select * from aims");
							while ($sql_fetch = mysqli_fetch_array($sql)) {
								echo "<option value='" . $sql_fetch['RLYCODE'] . "'>" . $sql_fetch['LONGDESC'] . "</option>";
							}
							?>
						</select>
					</div>
				</div>
				<input type="hidden" name="got_station" id="got_station">
				<div class="row">
					<div class="col-md-12" style="margin-top:20px;">
						<label for="modal_zone">Division</label>
						<select class="form-control select2" style="width:100%;" id="modal_division" name="modal_division">
							<option value="" selected>--Select Division--</option>
							<?php
							/* $conn=dbcon();
						$sql=mysqli_query("select * from division");
						while($sql_fetch=mysqli_fetch_array($sql))
						{
							echo "<option value='".$sql_fetch['rlycode']."'>".$sql_fetch['longdesc']."</option>";
						} */
							?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" style="margin-top:20px;">
						<label for="modal_zone">Station</label>
						<select class="form-control select2" style="width:100%;" id="modal_station" name="modal_station">
							<option value="" readonly hidden selected>--Select Station--</option>

						</select>
					</div>
				</div>
				<br>
				<div class="row" style="display:none;" id="other_station">
					<div class="col-md-12">
						<label for="modal_zone">Enter Name of Other Station</label>
						<input type="text" class="form-control" id="add_other_station" name="add_other_station">
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="modal_station_okay" name="modal_station_okay" data-dismiss="modal">Okay</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
<!-- station modal ends----------->

<!-- add regular medical modal start-->
<div id="add_regular_medical" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Medical</h4>
			</div>
			<div class="modal-body">
				<form action="process_main.php?action=update_initial_medical" method="POST">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">PF Number<span class=""></span></label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary TextNumber common_pf_number" id="medi_pf_no" name="medi_pf_no" readonly />
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Medical Category</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select name="medi_cat" id="medi_cat" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<option value="" disabled selected>Select Category</option>
										<option value="blank"></option>
										<?php
										$conn = dbcon();
										$sqlreligion = mysqli_query($conn, "select * from medical_classi");
										while ($rwDept = mysqli_fetch_array($sqlreligion)) {
										?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>
										<?php
										}

										?>
										<option value="all class unfit">All Class Unfit</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<br>
					<h3>PME Schedule Defining Parameters</h3>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Date Of Birth</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<?php
									$last_pf = "";
									if ($_SESSION['set_update_pf'] != "") {
										$conn1 = dbcon1();
										$last_pf = $_SESSION['set_update_pf'];
										$sql = mysqli_query($conn1, "select dob from biodata_temp where pf_number='$last_pf'");

										while ($result = mysqli_fetch_array($sql)) {
											$last_pf = date('d-m-Y', strtotime($result['dob']));
										}
									} else {
										$last_pf = "";
									}

									?>
									<input type="text" name="med_dob" id="med_dob" class="form-control" readonly value="<?php echo $last_pf; ?>">

								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Date Of Appointment</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<?php

									$conn1 = dbcon1();
									$sql = mysqli_query($conn1,"select * from appointment_temp where app_pf_number='" . $_SESSION['set_update_pf'] . "'");
									$result = mysqli_fetch_array($sql);
									if ($result['app_type'] == 4) {
										$x = $result['app_date'];
									} else {
										$x = $result['app_regul_date'];
									}
									?>
									<input type="text" name="med_appo_date" id="med_appo_date" class="form-control " value="<?php echo date('d-m-Y', strtotime($x)); ?>" readonly>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary select2" id="in_med_desig" name="in_med_desig" style="margin-top:0px; width:100%;" required>
										<option value="blank" selected></option>
										<?php
										$conn = dbcon();
										$sqlDept = mysqli_query($conn,"select * from designation");
										while ($rwDept = mysqli_fetch_array($sqlDept)) {
										?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"]; ?></option>
										<?php
										}

										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Medical Class For PME</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select name="medi_cat_pme" id="medi_cat_pme" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<option value="blank" selected></option>
										<option value="A1/A2/A3">A1/A2/A3</option>
										<option value="B1/B2">B1/B2</option>
										<option value="C1/C2">C1/C2</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Type of Medical Examination</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select name="medi_exam" id="medi_exam" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<option value="" selected disabled> Select Type</option>

										<!--option value="initial">Initial</option-->
										<option value="periodic">Periodic</option>
										<option value="special">Special</option>
									</select>
								</div>
							</div>
						</div>

					</div>
					<br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Medical Certificate No </label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="medi_cer_no" name="medi_cer_no" class="form-control" placeholder="Enter If any" required>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Medical Certificate Date</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="med_cer_date" name="med_cer_date" class="form-control calender_picker" placeholder="Enter Date" required>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference </label>
								<div class="col-md-8 col-sm-12 col-xs-12">
									<textarea rows="2" style="resize:none;" class="form-control primary" id="med_ref" name="med_ref" placeholder="Enter Medical Reference"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference Date</label>
								<div class="col-md-8 col-sm-12 col-xs-12">
									<input type="text" id="med_ref_date" name="med_ref_date" class="form-control calender_picker_future_date_disabled" placeholder="Select Date">
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-2">Medical Remarks</label>
								<div class="col-md-10">
									<textarea rows="3" style="resize:none" class="form-control primary description" id="med_remark" name="med_remark" placeholder="Enter Medical Remarks"></textarea>
								</div>
							</div>
						</div>
					</div>

			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">ADD</button>
				<button type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
		</form>
	</div>
</div>
<!-- bill unit modal ends----------->
<script>
	$(".nospace").on("keydown", function(e) {
		return e.which !== 32;
	});
</script>
<script type="text/javascript">
	$(function() {
		$('.calender_picker').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true,
			forceParse: false
		});
	});
	$(function() {
		$('.calender_picker_future_date_disabled').datepicker({
			format: 'dd-mm-yyyy',
			endDate: '+0d',
			autoclose: true,
			forceParse: false
		});
	});
</script>
<script>
	function fun_call() {
		var value = document.getElementById('reason_desig').value;
		var value1 = document.getElementById('app_olddesig1').value;
		document.getElementById('hide_app_olddesig_reason').value = value;
		document.getElementById('app_olddesig').value = value1;
		//alert($("#hide_app_olddesig").val());	
	}
	//$(".common_pf_number").attr('readonly',true);
	$(function() {
		$(".onlyText").on("input change paste", function() {
			var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');
			$(this).val(newVal);
		});

		$(document).on("input change paste", ".onlyNumber", function() {
			var newVal = $(this).val().replace(/[^0-9]*$/g, '');
			$(this).val(newVal);
		});

		$(document).on("input change paste", ".TextNumber", function() {
			var newVal = $(this).val().replace(/[^a-zA-Z0-9\s]/g, '');
			$(this).val(newVal);
		});
		$(document).on("input change paste", ".description", function() {
			var newVal = $(this).val().replace(/[^a-zA-Z0-9\s,-.\/\\_]/g, '');
			$(this).val(newVal);
		});
		$(document).on("input change paste", ".ps_3", function() {
			var newVal = $(this).val().replace(/[^0-9\s-]/g, '');
			$(this).val(newVal);
		});


	});
</script>
<script>
	jQuery(document).ready(function() {
		$(".hide_make").hide();
		$("#pd_pro_type").change(function() {
			var pro_type = $(this).val();
			if (pro_type == '1')
				$(".hide_make").show();
			else
				$(".hide_make").hide();
			//alert(pro_type);
			$.ajax({
				type: "post",
				url: "process.php",
				data: "action=get_property_item&pro_type=" + pro_type,
				success: function(data) {
					//alert(data);
					$("#pd_item_name").html(data);
				}
			});
		});
	});
</script>
<script>
	$('#tr_training_status').change(function() {
		var value = $(this).val();
		//alert(value);
		if (value == 5) {
			$('#schedule_id').show();
		} else {
			$('#schedule_id').hide();
		}
	});
</script>
<script>
	$("#app_bill_unit").on("change", function() {
		var app_bill_unit = document.getElementById('app_bill_unit').value;
		// alert(app_bill_unit);
		$.ajax({
			type: "post",
			url: "process.php",
			data: "action=get_depot&app_bill_unit=" + app_bill_unit,
			success: function(data) {
				//alert(data);
				var ddd = data;
				var arr = ddd.split('$');
				//alert(arr[0]);
				$("#app_depot").val(arr[0]);
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$(document).on('change', '.ps_type', function() {
			//debugger;
			var type = $(this).attr("id");
			var got_type = type.slice(-1);
			var value = $(this).val();

			if ($(this).val() == '1') {
				$("#scale_text_" + got_type).show();
				$("#scale_" + got_type).hide();
				$("#level_" + got_type).hide();

			} else if ($(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4') {
				$.ajax({
					type: "post",
					url: "process.php",
					data: "action=get_scale_all&value=" + value,
					success: function(data) {
						// alert(data);
						$(".scale_" + got_type).html(data);
						$(".scale_" + got_type).attr('required', true);
						$(".level_" + got_type).attr('required', false);

					}
				});
				$("#scale_" + got_type).show();
				$("#scale_text_" + got_type).hide();
				$("#level_" + got_type).hide();

			} else if ($(this).val() == '5') {

				$.ajax({
					type: "post",
					url: "process.php",
					data: "action=get_scale_all&value=" + value,
					success: function(data) {
						//alert(data);
						$(".level_" + got_type).html(data);
						$(".scale_" + got_type).attr('required', false);
						$(".level_" + got_type).attr('required', true);
					}
				});
				$("#level_" + got_type).show();
				$("#scale_text_" + got_type).hide();
				$("#scale_" + got_type).hide();
			} else {

				$("#scale_text_" + got_type).hide();
				$("#scale_" + got_type).hide();
				$("#level_" + got_type).hide();
			}
		});
	});
</script>
<?php
if (isset($_SESSION['set_update_pf'])) {
	echo "<script>$('.common_pf_number').val('" . $_SESSION['set_update_pf'] . "'); </script>";
	//echo "<script>alert('".$_SESSION['same_pf_no']."'); </script>";
}
?>

<?php include_once('../global/footer.php'); ?>
<link href="select2/select2.min.css" rel="stylesheet" />
<script src="select2/select2.min.js"> </script>
<script>
	$("#modal_zone_station").select2();
	$("#modal_zone").select2();
	$("#modal_unit").select2();
	$("#bill_unit_depot").select2();
	$("#modal_station").select2();
	$("#modal_division").select2();
	$(".select2").select2();
	var bill_unit = "";
	var deopt = "";
	var station = "";
	$(".bill_unit").click(function() {
		$('#modal_zone').val('01').trigger('change');
		$('#modal_unit').html("");
		$('#bill_unit_depot').html("");
		bill_unit = $(this).attr("id");
		//alert(bill_unit);
		var unit = '0107';
		$.ajax({
			type: 'POST',
			url: 'process.php',
			data: 'action=get_bill_unit_depot&unit=' + unit,
			success: function(html) {
				//alert(html);
				$("#bill_unit_depot").html(html);
			}

		});
	});
	$(".station").click(function() {
		//alert('data');
		$('#modal_zone_station').val('01').trigger('change');
		$("#modal_station").html("");
		$("#modal_division").html("SUR");
		station = $(this).attr("id");
		//$('#modal_zone').select2("val", null); 
		//alert(station);
		$(this).val("");

		var division = 'SUR';
		debugger;
		$.ajax({
			type: 'POST',
			url: 'process.php',
			data: 'action=get_station&division=' + division,
			success: function(html) {
				//alert(html);
				$("#modal_station").html(html);
			}
		});
	});
	// Stations
	$("#modal_zone_station").change(function() {

		//$('#modal_division').html("");

		var zone = $(this).val();
		//alert(zone);
		$.ajax({
			type: 'POST',
			url: 'process.php',
			data: 'action=get_division&zone=' + zone,
			success: function(html) {
				//alert(html);
				$("#modal_division").html(html);
			}

		});
	});

	$("#modal_division").change(function() {
		var division = $(this).val();
		//alert(division);
		$("#modal_station").html("");
		$.ajax({
			type: 'POST',
			url: 'process.php',
			data: 'action=get_station&division=' + division,
			success: function(html) {
				//alert(html);
				$("#modal_station").html(html);
			}
		});
	});

	$("#modal_station_okay").click(function() {
		var station_name = $("#modal_station option:selected").text();
		var station_id = $("#modal_station").val();
		//alert(station_id);
		$("#" + station).val(station_name);
		var hidden_station = station.slice(-1);
		$("#station_id" + hidden_station).val(station_id);

		if ($("#add_other_station").val() != "") {
			var new_station = $("#add_other_station").val();
			var new_div = $("#modal_division").val();
			//alert(new_station);
			//alert(new_div);
			$.ajax({
				type: 'POST',
				url: 'process.php',
				data: 'action=add_new_station&new_station=' + new_station + '&new_div=' + new_div,
				success: function(html) {
					$("#station_id" + hidden_station).val("");
					$("#station3").val(new_station);

				}

			});
		}

	});
	$("#bill_unit_depot").change(function() {

	});


	$("#modal_zone").change(function() {

		$('#modal_unit').html("");
		$('#bill_unit_depot').html("");
		var zone = $(this).val();
		//alert(zone);
		$.ajax({
			type: 'POST',
			url: 'process.php',
			data: 'action=get_division1&zone=' + zone,
			success: function(html) {
				//alert(html);
				$("#modal_unit").html(html);
			}

		});
	});

	$("#modal_unit").change(function() {
		$('#bill_unit_depot').html("");
		var unit = $(this).val();
		//alert(zone);
		$.ajax({
			type: 'POST',
			url: 'process.php',
			data: 'action=get_bill_unit_depot&unit=' + unit,
			success: function(html) {
				//alert(html);
				$("#bill_unit_depot").html(html);
			}

		});
	});
	$("#modal_okay").click(function() {
		var got_billunit = $("#bill_unit_depot").val();
		//alert(got_billunit);
		$.ajax({
			type: 'POST',
			url: 'process.php',
			data: 'action=get_separate&got_billunit=' + got_billunit,
			success: function(html) {
				//alert(html);
				var data = JSON.parse(html);
				var deopt = bill_unit.slice(-1);
				$("#" + bill_unit).val(data['billunit']);
				$("#depot" + deopt).val(data['deopt']);
				$("#depot_bill_unit" + deopt).val(got_billunit);

				$("#billunitj").val(data['billunit']);
				$("#depotj").val(data['deopt']);
				$("#depot_bill_unitj").val(got_billunit);
			}
		});

		//alert(bill_unit);
		if (got_billunit == 'not_available') {
			//alert('jdd');
			var got = bill_unit.slice(-1);
			$("#depot" + got).attr('readonly', false);
		}
	});
	/* $("#modal_biodata_okay").click(function(){
			 $("form").removeClass("apply_readonly");
		});  */
	$("#modal_station").change(function() {
		//var p=$(this).attr("id");
		//var q =$("#"+p).val();
		//alert($(this).val());
		if ($(this).val() == 'other_station') {
			//alert($(.other).attr("id"));
			$("#other_station").show();
		}
	});
</script>

<script>
	$(document).on("change", "#newpfnumber", function() {
		$.ajax({
			type: 'POST',
			url: 'set_session.php',
			data: 'action=set_new_pf',
			success: function(html) {
				// alert(html);
				window.location = 'sr_entry.php';
			}
		});
	});
</script>

<script>
	$(".readonly").keydown(function(e) {
		e.preventDefault();
	});
</script>