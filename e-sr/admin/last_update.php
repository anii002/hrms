<?php
$_GLOBALS['a'] = 'last_entry';
include_once('../global/header_update.php');

include('create_log.php');

$action = "Visited Last Entry page";
$action_on = $_SESSION['set_update_pf'];
create_log($action, $action_on);

?>
<!--Bio Tab Start -->
<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
	<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Last Entry</span>
	</div>
	<div style="border:1px solid #67809f;padding:30px;">
		<div class="box-header with-border">
			<!--<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Last Entry</h3>-->
		</div><br>
		<form action="process_main.php?action=add_lastentry" method="POST" class="apply_readonly">
			<?php
			$conn = dbcon1();
			$last_count = 0;
			$query = mysqli_query($conn, "select * from  lastentry_temp where pf_number='" . $_SESSION['set_update_pf'] . "'") or die(mysqli_error($conn));
			$fetch = mysqli_num_rows($query);
			if ($fetch > 0) {
				$last_count = 1;
			}

			?>
			<div class="clearfix"></div>

			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" id="le_pf_no" name="le_pf_no" class="form-control TextNumber common_pf_number" placeholder="Enter PF Number" readonly>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12">Date of Joining</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<?php
							$conn=dbcon1();
							$query = mysqli_query($conn,"select app_regul_date from appointment_temp where app_pf_number='" . $_SESSION['set_update_pf'] . "'") or die(mysqli_error($conn));
							$fetch = mysqli_fetch_array($query);
							$app_date = date('d-m-Y', strtotime($fetch['app_regul_date']));
							?>
							<input type="text" id="le_doj" name="le_doj" class="form-control TextNumber" value="<?php echo $app_date; ?>" readonly>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row" id="schedule_id">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12">Retirement Type</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<select name="le_retiredment_type" id="le_retiredment_type" class="form-control select2" style="margin-top:0px; width:100%;">
								<?php
								$conn=dbcon();
								$sqlretired = mysqli_query($conn,"select * from  retirement_type");
								echo "select * from  retirement_type" . mysqli_error($conn);
								while ($rwDept = mysqli_fetch_array($sqlretired)) {
								?>
									<option value="<?php echo $rwDept["id"]; ?>">
										<?php echo $rwDept["retirement_type"]; ?></option>
								<?php
								}
								?>

							</select>
						</div>
					</div>
				</div>


				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" id="ret_date">Date Of Retirement</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12" style="display:none;" id="death_date">Date Of Death</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" id="tr_training_from" name="tr_training_from" class="form-control calender_picker">
						</div>
					</div>
				</div>


			</div><br>
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation On Retirement</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<?php
							$conn=dbcon1();
							$query = mysqli_query($conn,"select * from present_work_temp where preapp_pf_number='" . $_SESSION['set_update_pf'] . "'") or die(mysqli_error($conn));
							$fetch = mysqli_fetch_array($query);

							if ($fetch['sgd_dropdwn'] == '2') {
								$station = $fetch['preapp_station'];
								$rop = $fetch['preapp_rop'];
								$billunit = get_billunit($fetch['preapp_billunit']);
								$billunit_value = $fetch['preapp_billunit'];
								if ($fetch['ps_type'] == '1' || $fetch['ps_type'] == '2' || $fetch['ps_type'] == '3' || $fetch['ps_type'] == '4') {
									$scale_level = $fetch['preapp_scale'];
								} else {
									$scale_level = $fetch['preapp_level'];
								}
								$depot = get_depot($fetch['preapp_depot']);
								$dept = get_department($fetch['preapp_department']);
								$dept_value = $fetch['preapp_department'];
								$desc = get_designation($fetch['preapp_designation']);
								$desc_value = $fetch['preapp_designation'];
							} else {
								$station = $fetch['ogd_station'];
								$rop = $fetch['ogd_rop'];
								$billunit = get_billunit($fetch['ogd_billunit']);
								$billunit_value = $fetch['ogd_billunit'];
								if ($fetch['ogd_pst'] == '1' || $fetch['ogd_pst'] == '2' || $fetch['ogd_pst'] == '3' || $fetch['ogd_pst'] == '4') {
									$scale_level = $fetch['ogd_scale'];
								} else {
									$scale_level = $fetch['ogd_level'];
								}
								$depot = get_depot($fetch['ogd_depot']);
								$dept = get_department($fetch['preapp_department']);
								$dept_value = $fetch['preapp_department'];
								$desc = get_designation($fetch['ogd_desig']);
								$desc_value = $fetch['ogd_desig'];
							}

							?>
							<input type="hidden" name="desc_id" value="<?php echo $desc_value; ?>">
							<input type="text" id="le_des_retitr" name="le_des_retitr" value="<?php echo $desc; ?>" class="form-control TextNumber" readonly>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="hidden" name="dept_id" value="<?php echo $dept_value; ?>">
							<input type="text" id="le_dept" name="le_dept" class="form-control" value="<?php echo $dept; ?>" readonly>
						</div>
					</div>
				</div>

			</div>

			<div class="clearfix"></div> <br>
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12">Station</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="hidden" id="station_idh" name="station_idh">
							<input type="text" id="stationh" name="stationh" class="form-control station" value="<?php echo $station; ?>" readonly>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-1 col-xs-12">ROP</label>
						<div class="col-md-8 col-sm-12 col-xs-12">
							<input type="text" id="le_rop" name="le_rop" class="form-control" value="<?php echo $rop; ?>" readonly>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12">Bill Unit</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="hidden" name="billunit_id" value="<?php echo $billunit_value; ?>">
							<input type="text" id="le_billunit" name="le_billunit" class="form-control TextNumber" value="<?php echo $billunit; ?>" readonly>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-1 col-xs-12">Scale/Level</label>
						<div class="col-md-8 col-sm-12 col-xs-12">
							<input type="text" id="le_scale_level" name="le_scale_level" value="<?php echo $scale_level; ?>" class="form-control" readonly>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12">Depot</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" id="le_depot" name="le_depot" value="<?php echo $depot; ?>" class="form-control TextNumber" readonly>
						</div>
					</div>
				</div>
				<!--div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Employee Category</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="le_emp_cat" name="le_emp_cat" class="form-control" readonly>
									  </div>
									</div>
								</div-->
			</div>
			<br>
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12">Total Service</label>
						<div class="col-md-3 col-sm-8 col-xs-12">
							<input type="text" id="le_total_year" name="le_total_year" class="form-control TextNumber" placeholder="Years">
						</div>
						<div class="col-md-3 col-sm-8 col-xs-12">
							<input type="text" id="le_total_month" name="le_total_month" class="form-control TextNumber" placeholder="Months">
						</div>
						<div class="col-md-2 col-sm-8 col-xs-12">
							<input type="text" id="le_total_day" name="le_total_day" class="form-control TextNumber" placeholder="days">
						</div>
					</div>
				</div>

				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12">NO Qualification Service</label>
						<div class="col-md-3 col-sm-8 col-xs-12">
							<input type="text" id="le_total_year2" name="le_total_year2" class="form-control TextNumber" placeholder="Years">
						</div>
						<div class="col-md-3 col-sm-8 col-xs-12">
							<input type="text" id="le_total_month2" name="le_total_month2" class="form-control TextNumber" placeholder="Months">
						</div>
						<div class="col-md-2 col-sm-8 col-xs-12">
							<input type="text" id="le_total_day2" name="le_total_day2" class="form-control TextNumber" placeholder="days">
						</div>
					</div>
				</div>
			</div>
			<br>
			<hr>
			</hr>
			<h3>Dues</h3>
			<div class="row">
				<a class="btn btn-primary" id="add_row">+Add</a>
				<a class="btn btn-danger" id="remove_row">-Remove</a>
				<div class="col-md-12" id="add_due_1">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12">Type of Due</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="due_type_1" name="due_type[1]" class="form-control TextNumber">
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12">Amount of Due</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="due_amt_1" name="due_amt[1]" class="form-control TextNumber">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12" id="append_due">
				</div>
			</div>
			<hr>
			</hr>
			<h3>Leave Balance</h3>
			<hr>
			</hr>
			<div class="row">
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12">LAP</label>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" id="le_lap" name="le_lap" class="form-control TextNumber">
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-1 col-xs-12">LHAP</label>
						<div class="col-md-8 col-sm-12 col-xs-12">
							<input type="text" id="le_lhap" name="le_lhap" class="form-control">
						</div>
					</div>
				</div>
				<!--div class="col-md-4 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Advance Leaves</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="le_advance" name="le_advance" class="form-control" readonly>
									  </div>
									</div>
								</div-->
			</div>
			<br>
			<div class="clearfix"></div>
			<br>
			<div class="col-sm-2 col-xs-12 pull-right">
				<?php
				if ($last_count == '0') {
					echo "<button  type='submit' class='btn btn-info source'>Save</button>";
				}
				?>

				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

			</div>
			<br>

		</form>
	</div>
</div>
<!--Last Tab End -->
<?php include('modal_js_header.php'); ?>
<script>
	debugger;
	//alert('.lnkj');
	$("#le_retiredment_type").on("change", function() {
		var type = $(this).val();
		if (type == '2') {
			$("#death_date").show();
			$("#ret_date").hide();
		} else {
			$("#ret_date").show();
			$("#death_date").hide();
		}
	});
	var val = <?php echo $last_count; ?>;
	var pf = '<?php echo $_SESSION['set_update_pf']; ?>';
	if (val == '1') {
		$.ajax({
			type: 'POST',
			url: 'process.php',
			data: 'action=get_last_entry&pf=' + pf,
			success: function(html) {
				//alert(html);
				var data = JSON.parse(html);
				//alert(data);
				$("#le_doj").val(data['date_of_join']);
				$("#le_retiredment_type").html(data['retire_type']);
				//$("#le_retirement_date").val(data['retire_date']);
				$("#tr_training_from").val(data['retire_date']);

				$("#desc_id").val(data['retire_designation_value']);
				$("#le_des_retitr").val(data['retire_designation']);

				$("#le_dept").val(data['department']);
				$("#dept_id").val(data['department_value']);

				$("#stationh").val(data['station']);
				$("#le_rop").val(data['rop']);
				$("#le_billunit").val(data['bill_unit']);
				$("#billunit_id").val(data['bill_unit_value']);
				$("#le_scale_level").val(data['scale']);
				$("#le_depot").val(data['depot']);
				$("#le_total_year").val(data['total_years']);
				$("#le_total_month").val(data['total_months']);
				$("#le_total_day").val(data['total_days']);
				$("#le_total_year2").val(data['no_years']);
				$("#le_total_month2").val(data['no_months']);
				$("#le_total_day2").val(data['no_days']);
				$("#le_lap").val(data['lap']);
				$("#le_lhap").val(data['lhap']);
				$("#add_due_1").html("");
				$("#append_due").html(data['due_type_amt']);

			}
		});
	}
	var x = 1;
	$("#add_row").click(function() {

		x++;

		var app_row = "<div class='col-md-12' style='margin-top:20px;' id='add_due_" + x + "'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Type of Due</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='due_type_" + x + "' name='due_type[" + x + "]' class='form-control TextNumber'></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'>Amount of Due</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='due_amt_" + x + "' name='due_amt[" + x + "]' class='form-control TextNumber'></div></div></div></div>";

		$("#append_due").append(app_row);
	});
	$("#remove_row").click(function() {
		$("#add_due_" + x).remove();
		x--;
	});
</script>
<?php include_once('../global/footer.php'); ?>