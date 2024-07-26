<!--Present Appointment Tab Start -->

<?php

$_GLOBALS['a'] = 'pwd';

include_once('../global/header1.php'); ?>

<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">

	<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;PRESNT WORKING DETAILS</span>

	</div>

	<div style="border:1px solid #67809f;padding:30px;">

		<?php

		$pre_exist = 0;

		if (isset($_SESSION['same_pf_no'])) {

			$conn = dbcon1();

			$sql = mysqli_query($conn, "select * from present_work_temp where preapp_pf_number='" . $_SESSION['same_pf_no'] . "'");

			//echo "select * from biodata_temp where pf_number='".$_SESSION['same_pf_no']."'".mysqli_error();

			$result = mysqli_num_rows($sql);



			if ($result > 0) {

				$pre_exist = 1;
			}
		}

		?>

		<form method="POST" action="process_main.php?action=add_present_work_detail" id="pre_appo" class="apply_readonly">

			<div class="modal-body">

				<div class="row">

					<div class="col-md-6 col-sm-12 col-xs-12">

						<div class="form-group">

							<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

							<div class="col-md-8 col-sm-8 col-xs-12">

								<input type="text" id="pre_pf_no" name="pre_pf_no" class="form-control form-text TextNumber common_pf_number" readonly required>

							</div>

						</div>

					</div>

					<div class="col-md-6 col-sm-12 col-xs-12">

						<div class="form-group">

							<label class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>

							<div class="col-md-8 col-sm-8 col-xs-12">

								<select class="form-control primary select2" id="preapp_dept" name="preapp_dept" style="margin-top:0px; width:100%;" required>

									<option value="NA" selected hidden disabled>-- Select Department --</option>

									<?php

									$conn = dbcon();

									$sqlDept = mysqli_query($conn, "select * from department");

									while ($rwDept = mysqli_fetch_array($sqlDept)) {

									?>

										<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["DEPTDESC"]; ?></option>

									<?php

									}



									?>

								</select>

							</div>

						</div>

					</div>

				</div>

				<br>

				<div class="row">

					<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="form-group">

							<label class="control-label col-md-3 col-sm-3 col-xs-12">Weather Employee is officiating in <br>higher grade than substantive grade?</label>

							<div class="col-md-3 col-sm-8 col-xs-12" style="margin-left:-15px">

								<select name="preapp_subtype1" id="preapp_subtype1" class="form-control bio_all_status select2" style="margin-top:0px; width:100%;" required>

									<option value="" selected disabled>Select Type</option>



									<option value="1">Yes</option>

									<option value="2">No</option>

								</select>

							</div>

						</div>

					</div>

				</div>

				<br>



				<div class="row" style="display:none" id="show1">

					<h3>Substantive Grade Details</h3>

					<hr>
					</hr>

					<div class="row">



						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary select2" id="preapp_sgd_desig" name="preapp_sgd_desig" style="margin-top:0px; width:100%;" required>

										<option value="NA" selected hidden>NA</option>

										<?php

										echo $alldesignations;

										?>

									</select>

								</div>

							</div>

						</div>



						<div class="col-md-6 col-sm-12 col-xs-12" id="">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Pay Scale TYPE</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary ps_type1 ps_type select2" id="sgd_ps_type_2" name="sgd_ps_type_2" style="margin-top:0px; width:100%;" required>

										<option value="NA" selected hidden>NA</option>

										<?php

										echo $pay_scale_type;

										?>



									</select>

								</div>

							</div>

						</div>

					</div>

					<div class="row">

						<div class="col-md-6 col-sm-12 col-xs-12 lbl_oth_preapp_sgd_desig" style="display:none;">

							<div class="form-group"><br>

								<label class="control-label col-md-4 col-sm-3 col-xs-12 ">Other Designation<span class=""></span></label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="text" class="form-control primary" id="preapp_sgd_other_desig" name="preapp_sgd_other_desig" placeholder="Enter Other Designation" />

								</div>

							</div>

						</div>

						<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="level_2">

							<div class="form-group"><br>

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Level</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary select2 level_2" id="preapp_sgd_level" name="preapp_sgd_level" style="margin-top:0px; width:100%;">

										<option value="" selected hidden>-- Select Level --</option>



									</select>

								</div>

							</div>

						</div>

						<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="scale_2">

							<div class="form-group"><br>

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Scale</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary select2 scale_2" id="preapp_sgd_scale" name="preapp_sgd_scale" style="margin-top:0px; width:100%;">

										<option value="NA" selected hidden>NA</option>

									</select>

								</div>

							</div>

						</div>

						<div class="col-md-6 col-sm-12 col-xs-12" id="scale_text_2" style='display:none;'>

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="text" class="form-control primary scale_text_2" id="preapp_sgd_scale_text" name="preapp_sgd_scale_text" placeholder="Enter 3rd Pay Rate" />

								</div>

							</div><br><br>

						</div>







					</div><br>

					<div class="row">

						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Bill Unit<a href="#" data-toggle="modal" data-target="#myModal" style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="hidden" name="depot_bill_unit2" id="depot_bill_unit2">

									<input type="text" class="form-control primary bill_unit" id="billunit2" name="billunit2" required data-toggle="modal" data-target="#bill_unit_select" readonly>

								</div>

							</div>

						</div>



						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Depot/Workplace</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="text" class="form-control primary depot" id="depot2" name="depot2" required readonly>

								</div>

							</div>

						</div>



					</div><br>

					<div class="row">

						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Station <a href="#" data-toggle="modal" data-target="#myModal" style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="hidden" id="station_id4" name="station_id4" class="other">

									<input type="text" class="form-control primary station" id="station4" name="station4" required data-toggle="modal" data-target="#station" readonly>



								</div>

							</div>

						</div>

						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Group<span class=""></span></label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary select2" id="sgd_preapp_group" name="sgd_preapp_group" style="margin-top:0px; width:100%;" required>

										<option value=" " selected></option>



										<?php

$conn=dbcon();

										$group_col = mysqli_query($conn,"select * from group_col");

										while ($group_colre = mysqli_fetch_array($group_col)) {

										?>

											<option value="<?php echo $group_colre["id"]; ?>"><?php echo $group_colre["group_col"]; ?></option>

										<?php

										}



										?>

									</select>

								</div>

							</div>

						</div>





					</div><br>



					<h3>Officiating Grade Details</h3>



					<hr>
					</hr>

					<div class="row">



						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary select2" id="preapp_ogd_desig" name="preapp_ogd_desig" style="margin-top:0px; width:100%;" required>

										<option value="" selected hidden disabled>-- Select Designation --</option>

										<?php

										echo $alldesignations;

										?>

									</select>

								</div>

							</div>

						</div>



						<div class="col-md-6 col-sm-12 col-xs-12" id="">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Pay Scale TYPE</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary ps_type2 ps_type select2" id="ogd_ps_type_3" name="ogd_ps_type_2" style="margin-top:0px; width:100%;" required>

										<option value="" selected hidden disabled>-- Select PC Type --</option>

										<?php

										echo $pay_scale_type;

										?>



									</select>

								</div>

							</div>

						</div>

					</div>

					<div class="row">

						<div class="col-md-6 col-sm-12 col-xs-12 lbl_oth_preapp_ogd_desig" style="display:none;">

							<div class="form-group"><br>

								<label class="control-label col-md-4 col-sm-3 col-xs-12 ">Other Designation<span class=""></span></label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="text" class="form-control primary" id="preapp_ogd_other_desig" name="preapp_other_desig" placeholder="Enter Other Designation" />

								</div>

							</div>

						</div>

						<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="level_3">

							<div class="form-group"><br>

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Level</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary select2 level_3" id="preapp_ogd_level" name="preapp_ogd_level" style="margin-top:0px; width:100%;">

										<option value="" selected hidden disabled>-- Select Level --</option>



									</select>

								</div>

							</div>

						</div>

						<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="scale_3">

							<div class="form-group"><br>

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Scale</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary select2 scale_3" id="preapp_ogd_scale" name="preapp_ogd_scale" style="margin-top:0px; width:100%;">

										<option value="" selected hidden disabled>-- Select scale --</option>



									</select>

								</div>

							</div>

						</div>

						<div class="col-md-6 col-sm-12 col-xs-12" id="scale_text_3" style='display:none;'>

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="text" class="form-control primary scale_text_3" id="preapp_ogd_scale_text" name="preapp_ogd_scale_text" placeholder="Enter 3rd Pay Rate" />

								</div>

							</div><br><br>

						</div>







					</div><br>

					<div class="row">

						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Bill Unit<a href="#" data-toggle="modal" data-target="#myModal" style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="hidden" name="depot_bill_unit4" id="depot_bill_unit4">

									<input type="text" class="form-control primary bill_unit" id="billunit4" name="billunit4" required data-toggle="modal" data-target="#bill_unit_select" readonly>

								</div>

							</div>

						</div>



						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Depot/Workplace</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="text" class="form-control primary depot" id="depot4" name="depot4" required readonly>

								</div>

							</div>

						</div>



					</div><br>

					<div class="row">

						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Station <a href="#" data-toggle="modal" data-target="#myModal" style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="hidden" id="station_id5" name="station_id5" class="other">

									<input type="text" class="form-control primary station" id="station5" name="station5" required data-toggle="modal" data-target="#station" readonly>



								</div>

							</div>

						</div>

						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Group<span class=""></span></label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary select2" id="preapp_ogd_group" name="preapp_ogd_group" style="margin-top:0px; width:100%;" required>

										<option value="" selected hidden disabled>-- Select Group --</option>



										<?php

$conn=dbcon();

										$group_col = mysqli_query($conn,"select * from group_col");

										while ($group_colre = mysqli_fetch_array($group_col)) {

										?>

											<option value="<?php echo $group_colre["id"]; ?>"><?php echo $group_colre["group_col"]; ?></option>

										<?php

										}



										?>

									</select>

								</div>

							</div>

						</div>





					</div><br>

					<div class="row">



						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Rate Of Pay<a href="#" data-toggle="modal" data-target="#myModal" style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="text" class="form-control primary onlyNumber" id="preapp_ogd_rop" name="preapp_ogd_rop" placeholder="Enter ROP" required />

								</div>

							</div>

						</div>

					</div><br>

					<div class="col-md-12 col-sm-12 col-xs-12">

						<div class="form-group">

							<label class="control-label col-md-2 ">Remarks</label>

							<div class="col-md-10">

								<textarea rows="4" style="resize:none" class="form-control primary description" id="pwd1_remark" name="pwd1_remark" placeholder="Enter Remarks"></textarea>

							</div>

						</div>

					</div>

				</div>

				<div class="row" id="pwd">

					<div class="row">



						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary select2" id="preapp_desig" name="preapp_desig" style="margin-top:0px; width:100%;" required>

										<option value="" selected hidden disabled>-- Select Designation --</option>

										<?php

										echo $alldesignations;



										?>

									</select>

								</div>

							</div>

						</div>



						<div class="col-md-6 col-sm-12 col-xs-12" id="">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Pay Scale TYPE</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary ps_type select2" id="ps_type_4" name="ps_type_2" style="margin-top:0px; width:100%;" required>

										<option value="" selected hidden disabled>-- Select PC Type --</option>

										<?php

										echo $pay_scale_type;

										?>



									</select>

								</div>

							</div>

						</div>

					</div>

					<div class="row">

						<div class="col-md-6 col-sm-12 col-xs-12 lbl_oth_predesig" Style="display:none">

							<div class="form-group"><br>

								<label class="control-label col-md-4 col-sm-3 col-xs-12 ">Other Designation<span class=""></span></label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="text" class="form-control primary" id="preapp_other_desig" name="preapp_other_desig" placeholder="Enter Other Designation" />

								</div>

							</div>

						</div>



						<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="level_4">

							<div class="form-group"><br>

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Level</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary select2 level_4" id="preapp_level" name="preapp_level" style="margin-top:0px; width:100%;">

										<option value="blank" selected></option>

										<option value="" selected hidden disabled>-- Select Level --</option>



									</select>

								</div>

							</div>

						</div>

						<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="scale_4">

							<div class="form-group"><br>

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Scale</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary select2 scale_4" id="preapp_scale" name="preapp_scale" style="margin-top:0px; width:100%;">

										<option value="blank" selected></option>

										<option value="" selected hidden disabled>-- Select scale --</option>



									</select>

								</div>

							</div>

						</div>



						<div class="col-md-6 col-sm-12 col-xs-12" id="scale_text_4" style='display:none;'>

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="text" class="form-control primary scale_text_4" id="preapp_scale_text" name="preapp_scale_text" placeholder="Enter 3rd Pay Rate" />

								</div>

							</div><br><br>

						</div>





					</div><br>

					<div class="row">

						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Bill Unit<a href="#" data-toggle="modal" data-target="#myModal" style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="hidden" name="depot_bill_unit1" id="depot_bill_unit1">

									<input type="text" class="form-control primary bill_unit" id="billunit1" name="billunit1" required data-toggle="modal" data-target="#bill_unit_select" readonly>

								</div>

							</div>

						</div>



						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Depot/Workplace</label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="text" class="form-control primary depot" id="depot1" name="depot1" required readonly>

								</div>

							</div>

						</div>



					</div><br>

					<div class="row">

						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Station <a href="#" data-toggle="modal" data-target="#myModal" style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="hidden" id="station_id6" name="station_id6" class="other">

									<input type="text" class="form-control primary station" id="station6" name="station6" required data-toggle="modal" data-target="#station" readonly>



								</div>

							</div>

						</div>

						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Group<span class=""></span></label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary select2" id="preapp_group" name="preapp_group" style="margin-top:0px; width:100%;" required>

										<option value="" selected hidden disabled>-- Select Group --</option>



										<?php

$conn=dbcon();

										$group_col = mysqli_query($conn,"select * from group_col");

										while ($group_colre = mysqli_fetch_array($group_col)) {

										?>

											<option value="<?php echo $group_colre["id"]; ?>"><?php echo $group_colre["group_col"]; ?></option>

										<?php

										}



										?>

									</select>

								</div>

							</div>

						</div>





					</div><br>

					<div class="row">



						<div class="col-md-6 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12">Rate Of Pay<a href="#" data-toggle="modal" data-target="#myModal" style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>

								<div class="col-md-8 col-sm-8 col-xs-12">

									<input type="text" class="form-control primary onlyNumber" id="preapp_rop" name="preapp_rop" placeholder="Enter ROP" required />

								</div>

							</div>

						</div>

					</div><br>

					<div class="row">

						<div class="col-md-12 col-sm-12 col-xs-12">

							<div class="form-group">

								<label class="control-label col-md-2 ">Remarks</label>

								<div class="col-md-10">

									<textarea rows="4" style="resize:none" class="form-control primary description" id="pwd_remark" name="pwd_remark" placeholder="Enter Remarks"></textarea>

								</div>

							</div>

						</div>

					</div><br>

				</div>

				<div class="">

					<div class="col-sm-2 col-xs-12 pull-right">

						<input type="hidden" id="txtsession" name="txtsession" class="" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>" />

						<input type="submit" id="btnSave" name="btnSave" value="Save" class="btn btn-success">

						<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger">

						<br>

					</div>

				</div>



			</div>

	</div>

	</form>

</div><?php include_once('../global/footer.php'); ?>

<?php include_once('all_javascript.php'); ?>



<!--Present Appointment Tab End -->