<!--Increment Tab Start -->

<?php

$_GLOBALS['a'] = 'increment';

include_once('../global/header1.php'); ?>

<div style="padding:50px;border:1px solid black;margin:10px;">

	<div class="box-header with-border">

		<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Annual Increment </h3>

	</div>

	<form method="post" action="process_main.php?action=add_increment" class="apply_readonly">

		<div class="modal-body">

			<div class="row">

				<div class="col-md-6 col-sm-12 col-xs-12">

					<div class="form-group">

						<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

						<div class="col-md-8 col-sm-8 col-xs-12">

							<input type="text" class="form-control primary TextNumber common_pf_number" id="incr_pf" name="incr_pf" readonly required />

						</div>

					</div>

				</div>



			</div>

			<br>



		</div>

		<hr style="height:1px;color:#f39c12;background-color:#f39c12;">

		<div class="row" style="padding:20px;padding-bottom:0px;">

			<a class="btn btn-primary pull-right" id="incr_add_row" name="incr_add_row">Add Row</a>

			<input type="hidden" id="row_count" name="row_count">

		</div><br>

		<div class="row" style="padding:20px;">





			<div class="table-responsive">

				<table class="table" style="border-collapse:collapse width=70%" border="1">

					<tr>

						<th width="1%">Sr<br>No</th>

						<th width="10%">Increment Type</th>

						<th width="15%">Pay Scale Type</th>

						<th width="25%">Pay Scale/Level</th>

						<th width="10%">Rate Of Pay</th>

						<th width="15%">Increment Date</th>

						<th width="25%">Reason</th>

					</tr>

					<tbody id="ad_row_incr">

						<tr>

							<td>1</td>

							<td>

								<select class="form-control primary select2" id="incr_type1" name="incr_type1" style="width:100%;" required>

									<option value="" selected disabled>-- Select Type --</option>

									<option value="blank"></option>

									<?php

									$sqlDept = mysqli_query($conn,"select * from increment_type");

									while ($rwDept = mysqli_fetch_array($sqlDept)) {

									?>

										<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["increment_type"]; ?></option>

									<?php

									}

									?>



								</select>

							</td>

							<td>

								<select class="form-control primary ps_type_addnew_row select2" id="ps_type_row_1" name="ps_type_row_1" num="1" style="margin-top:0px; width:100%;" required>

									<option value="" selected hidden disabled>-- Select PC Type --</option>

									<?php

									echo $pay_scale_type;

									?>

								</select>

							</td>

							<td>

								<div class="col-md-12 col-sm-12 col-xs-12" id="scale_row_1" style="display:none;">

									<div class="form-group">

										<label class="control-label col-md-2 col-sm-3 col-xs-12" >Scale</label>

										<div class="col-md-12 col-sm-8 col-xs-12">

											<select class="form-control primary select2 scale_drop_1" num="1" id="scale_drop_1" name="scale_drop_1" style="width:100%;">

											</select>

										</div>

									</div>

								</div>

								<div class="col-md-12 col-sm-12 col-xs-12" id="level_row_1" style="display:none;">

									<div class="form-group">

										<!-- label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label -->

										<div class="col-md-12 col-sm-8 col-xs-12">

											<select class="form-control primary select2 level_drop_1" num="1" id="level_drop_1" name="level_drop_1" style="width:100%;">



											</select>

										</div>

									</div>

								</div>

							</td>

							<td><input type="text" style="width:100%" id="incr_add_row_rop1" name="incr_add_row_rop1" placeholder="enter rop"></td>

							<td>

								<input type="text" class="form-control primary calender_picker" id="incr_date1" name="incr_date1" placeholder="enter date" required />
							</td>

							<td><textarea style="resize:none;width:100%" id="incr_row_reason1" placeholder="enter reason" name="incr_row_reason1"> </textarea></td>

						</tr>

					</tbody>

				</table>

			</div>



			<!--div class="row">

						<div class="col-md-6 col-sm-12 col-xs-12">

								<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Increment Date<span class=""></span></label>

								  <div class="col-md-8 col-sm-8 col-xs-12">

									<input type="date" class="form-control primary" id="incr_date" name="incr_date" required  />

								  </div>

                                </div>

						    </div>

							<div class="col-md-6 col-sm-12 col-xs-12" id="">

								<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>

									<div class="col-md-8 col-sm-8 col-xs-12">

										<select class="form-control primary ps_type select2" id="ps_type_f" name="ps_type_4" style="margin-top:0px; width:100%;" required>

											<option value="" selected hidden disabled>-- Select PC Type --</option>

											<?php

											echo $pay_scale_type;

											?>

										</select>

									</div>

								</div>

							</div>

							

						</div><br-->

			<!--div class="row">

						<div class="col-md-6 col-sm-12 col-xs-12" id="scale_f" style="display:none;">

								<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>

								  <div class="col-md-8 col-sm-8 col-xs-12" >

									<select class="form-control primary select2 scale_f" id="incr_scale" name="incr_scale" style="width:100%;"  >

							

					         </select>

								  </div>

                                </div>

						    </div>

						<div class="col-md-6 col-sm-12 col-xs-12" id="level_f" style="display:none;">

								<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>

								  <div class="col-md-8 col-sm-8 col-xs-12">

									<select class="form-control primary select2 level_f" id="incr_level" name="incr_level" style="width:100%;" >

										

									</select>

								  </div>

                                </div>

						    </div>

							<div class="col-md-6 col-sm-12 col-xs-12">

								<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Old Rate Of Pay</label>

								  <div class="col-md-8 col-sm-8 col-xs-12" >

									 <input type="text" class="form-control primary onlyNumber" id="incr_oldrop" name="incr_oldrop" placeholder="Enter Old ROP"    />

								  </div>

                                </div>

						    </div>

						</div><br-->

			<!--div class="row">

						<div class="col-md-6 col-sm-12 col-xs-12">

								<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>

								  <div class="col-md-8 col-sm-8 col-xs-12">

									  <input type="text" class="form-control primary onlyNumber" id="incr_rop" name="incr_rop" placeholder="Enter ROP" required />

								  </div>

                                </div>

						    </div>

							<div class="col-md-6 col-sm-12 col-xs-12">

								<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Personal Pay</label>

								  <div class="col-md-8 col-sm-8 col-xs-12" >

									 <input type="text" class="form-control primary TextNumber" id="incr_personel" name="incr_personel"  placeholder="Enter Personal Pay" required />

								  </div>

                                </div>

						    </div> 

						</div--><br>

			<!--div class="row">

						<div class="col-md-6 col-sm-12 col-xs-12">

								<div class="form-group">

								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Special Pay<span class=""></span></label>

								  <div class="col-md-8 col-sm-8 col-xs-12">

									  <input type="text" class="form-control primary TextNumber" id="incr_special" name="incr_special"  placeholder="Enter Special Pay" required />

								  </div>

                                </div>

						    </div>

							<div class="col-md-6 col-sm-12 col-xs-12">

								<div class="form-group">

								<label class="control-label col-md-4 ">Next Increment Date</label>

								  <div class="col-md-8">

									  <input type="date" class="form-control primary" id="incr_nxt_incr" name="incr_nxt_incr" required />

								  </div>

                                </div>

						    </div>

						</div-->

			<!--div class="row">

					 	<div class="col-md-12 col-sm-12 col-xs-12">

								<div class="form-group">

								<label class="control-label col-md-2 ">Remark</label>

								  <div class="col-md-10">

									 <textarea  rows="4" style="resize:none" class="form-control primary description" id="incr_remark" name="incr_remark"placeholder="Enter Increment Remark" required></textarea>

								  </div>

                                </div>

						    </div>

					 </div-->

			<br>

			<div class="form-group">

				<div class="col-sm-2 col-xs-12 pull-right">

					<input type="hidden" id="txtsession" name="txtsession" class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>" />

					<input type="submit" id="btnSave" name="btnSave" value="Save" class="btn btn-success" />

					<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />



					<br>

					<br>

					<br>

				</div>

			</div>



		</div>

	</form>

</div>

<script>
	$(document).ready(function() {



		$("#app_desig").change(function() {

			var x = $(this).val();

			if (x == '2029') {

				$(".lbl_oth1").show();



			} else {

				$(".lbl_oth1").hide();

			}

		});



		$("#preapp_desig").change(function() {

			var x = $(this).val();

			if (x == '2029') {

				$(".lbl_oth_predesig").show();



			} else {

				$(".lbl_oth_predesig").hide();

			}

		});

		$("#preapp_sgd_desig").change(function() {

			var x = $(this).val();

			if (x == '2029') {

				$(".lbl_oth_preapp_sgd_desig").show();



			} else {

				$(".lbl_oth_preapp_sgd_desig").hide();

			}

		});

		$("#preapp_ogd_desig").change(function() {

			var x = $(this).val();

			if (x == '2029') {

				$(".lbl_oth_preapp_ogd_desig").show();



			} else {

				$(".lbl_oth_preapp_ogd_desig").hide();

			}

		});



		var r = 0;

		$(document).on("click", ".add_source", function() {
    debugger;

    r++;

    var pt = $(this).attr('id');
    var t = pt.slice(-1);

    var source = `
        <br>
        <div class='col-md-6 col-sm-12 col-xs-12'>
            <div class='form-group'>
                <label class='control-label col-md-4 col-sm-3 col-xs-12'>Source Type</label>
                <div class='col-md-8 col-sm-8 col-xs-12'>
                    <select name='pd_sourcr_type${t}[${r}]' id='pd_sourcr_type${r}' class='form-control select2' style='margin-top:0px; width:100%;' required>
                        <option disabled selected>Select Source Type</option>
                        <?php
                            $conn=dbcon();
                            $sqlreligion = mysqli_query($conn,"SELECT * FROM property_source") or die(mysqli_error($conn));
                            while ($rwDept = mysqli_fetch_array($sqlreligion)) {
                                echo "<option value='" . $rwDept['id'] . "'>" . $rwDept['property_source'] . "</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class='col-md-6 col-sm-12 col-xs-12'>
            <div class='form-group'>
                <label class='control-label col-md-4 col-sm-1 col-xs-12'>Amount</label>
                <div class='col-md-8 col-sm-12 col-xs-12'>
                    <input type='text' id='pd_source_amt${r}' name='pd_source_amt${t}[${r}]' class='form-control TextNumber' placeholder='Enter Source Amount' required>
                </div>
            </div>
        </div>
        <br>
    `;

    $("#add_source_div" + t).append(source);
    // $(".select2").select2(); // Uncomment if needed
});





		$("#remove_source").click(function() {

			if (r > 0)

			{

				$("#" + r).remove();

				$("#desc_" + x).remove();

				x--;

			} else {

				alert("No TextBox To Remove");

			}



		});





		var x = 0;

		$("#add_edu_info_1").click(function() {

			<?php dbcon(); ?>

			x++;

			var edu_drop_ini = "<div class='form-group' id='" + x + "'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Edu. Qual.</label><div class=col-md-8 col-sm-12 col-xs-12' id='edu_main_info'><select name='edu_pri_info[" + x + "]' id='edu_pri_info" + x + "' class='form-control' style='margin-top:0px; width:100%;' required><option value='blank' selected></option><?php $sql = mysqli_query($conn,"select * from education");
																																																																																															while ($sql_fetch = mysqli_fetch_array($sql)) {
																																																																																																echo "<option value='" . $sql_fetch['id'] . "'>" . $sql_fetch['education'] . "</option>";
																																																																																															} ?></select></div></div>";

			//alert(edu_drop_ini);

			var edu_drop_desc = "<div class='form-group' id='desc_" + x + "'><input type='text' class='form-control col-md-12 col-sm-12 col-xs-12' name='bio_edu_ini[" + x + "]' id='bio_edu_ini" + x + "' placeholder='Description'></div>";



			$("#add_edu_info_drop_1").append(edu_drop_ini);

			$("#edu_pri_info_desc_1").append(edu_drop_desc);



		});



		$("#remove_edu_info_1").click(function() {

			if (x > 0)

			{

				$("#" + x).remove();

				$("#desc_" + x).remove();

				x--;

			} else {

				alert("No TextBox To Remove");

			}



		});

		var y = 0;

		$("#add_edu_info_2").click(function() {

			y++;

			var edu_drop_ini = "<div class='form-group' id='" + y + "'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Edu. Qual.</label><div class=col-md-8 col-sm-12 col-xs-12' id='edu_main_info'><select name='edu_pri_info_sub[" + y + "]' id='edu_pri_info_sub" + y + "' class='form-control' style='margin-top:0px; width:100%;' required><option value='blank' selected></option><?php $sql = mysqli_query($conn,"select * from education");
																																																																																																	while ($sql_fetch = mysqli_fetch_array($sql)) {
																																																																																																		echo "<option value='" . $sql_fetch['id'] . "'>" . $sql_fetch['education'] . "</option>";
																																																																																																	} ?></select></div></div>";

			//alert(edu_drop_ini);

			var edu_drop_desc = "<div class='form-group' id='desc_" + y + "'><input type='text' class='form-control col-md-12 col-sm-12 col-xs-12' name='bio_edu_sub[" + y + "]' id='bio_edu_sub" + y + "' placeholder='Description'></div>";



			$("#add_edu_info_drop_2").append(edu_drop_ini);

			$("#add_edu_info_desc_2").append(edu_drop_desc);

		});

		$("#remove_edu_info_2").click(function() {

			if (y > 0)

			{

				$("#" + y).remove();

				$("#desc_" + y).remove();

				y--;

			} else {

				alert("No TextBox To Remove");

			}



		});



		var ad = 1;

		$("#incr_add_row").click(function() {

			debugger;

			ad++;

			var add_new_row = "<tr><td>" + ad + "</td><td><select class='form-control primary select2' id='incr_type" + ad + "' name='incr_type" + ad + "' style='width:100%;' required><option value='blank' selected>-- Select Type --</option><option value='blank' ></option><?php $sqlDept = mysqli_query($conn,'select * from increment_type');
																																																																					while ($rwDept = mysqli_fetch_array($sqlDept)) {
																																																																						echo "<option value=' " . $rwDept["id"] . "'> " . $rwDept["increment_type"] . "</option>";
																																																																					} ?></select></td><td><select class='form-control primary ps_type_addnew_row select2' id='ps_type_row_" + ad + "' name='ps_type_row_" + ad + "' style='margin-top:0px; width:100%;' num='" + ad + "' required><option value='' selected hidden disabled>-- Select PC Type --</option><?php echo $pay_scale_type; ?></select></td><td><div class='col-md-12 col-sm-12 col-xs-12' id='scale_row_" + ad + "' num='" + ad + "' style='display:none;'><div class='form-group'> <div class='col-md-12 col-sm-8 col-xs-12'><select class='form-control primary select2 scale_drop_" + ad + "' id='scale_drop_" + ad + "' name='scale_drop_" + ad + "' style='width:100%;'></select></div></div></div><div class='col-md-12 col-sm-12 col-xs-12' id='level_row_" + ad + "' num='" + ad + "' style='display:none;'><div class='form-group'><div class='col-md-12 col-sm-8 col-xs-12'><select class='form-control primary select2 level_drop_" + ad + "' id='level_drop_" + ad + "' name='level_drop_" + ad + "' style='width:100%;'></select></div></div></div></td><td><input type='text' style='width:100%' id='incr_add_row_rop_" + ad + "' placeholder='enter rop' name='incr_add_row_rop" + ad + "'></td><td><input type='text' class='form-control primary calender_picker'placeholder='enter date' id='incr_date" + ad + "' name='incr_date" + ad + "' required/></td><td><textarea style='resize:none;width:100%' id='incr_row_reason_" + ad + "'name='incr_row_reason" + ad + "' placeholder='enter reason'> </textarea></td></tr>";



			$("#ad_row_incr").append(add_new_row);

			$("#row_count").val(ad);

			$(".select2").select2();

			$('.calender_picker').datepicker({

				format: 'dd-mm-yyyy',

				autoclose: true,

				forceParse: false



			});



		});





		$("#bio_emp_old_name").focus(function() {



			$(".old_name").text("Applicable in case of change in name due to marriage or gazette notification etc.");

		});

		$("#bio_emp_old_name").blur(function() {

			$(".old_name").text("");

		});

	});
</script>

<?php include_once('../global/footer.php'); ?>

<!--Increment Tab End -->