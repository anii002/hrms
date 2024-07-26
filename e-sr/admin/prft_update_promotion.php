<?php
//session_start();
// if(!isset($_SESSION['SESS_MEMBER_NAME']))
// {
// echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
// }
$_GLOBALS['a'] = 'prft';
include_once('../global/header_update.php');
include('create_log.php');
$conn = dbcon();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script src="javascript.js"></script>
<style>
	/* .nav-tabs > li > a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
 
.lbl_reg{
  display:none;
} 

.lbl_oth{
  display:none;
}
.lbl_oth1{
  display:none;
}
 */

	/*----- Tabs -----*/
	.tab {
		width: 100%;
		display: inline-block;
	}

	/*----- Tab Links -----*/
	/* Clearfix */
	.tab-links:after {
		display: block;
		clear: both;
		content: '';
	}

	.tab-links li {
		margin: 0px 5px;
		float: left;
		list-style: none;
	}

	.tab-links a {
		padding: 9px 15px;
		display: inline-block;
		border-radius: 3px 3px 0px 0px;
		background: #7FB5DA;
		font-size: 16px;
		font-weight: 600;
		color: #4c4c4c;
		transition: all linear 0.15s;
	}

	.tab-links a:hover {
		background: #a7cce5;
		text-decoration: none;
	}

	li.active a,
	li.active a:hover {
		background: #fff;
		color: #4c4c4c;
	}

	/*----- Content of Tabs -----*/
	.tab-content {
		padding: 15px;
		border-radius: 3px;
		box-shadow: -1px 1px 1px rgba(0, 0, 0, 0.15);
		background: #fff;
	}

	.tab {
		display: none;
	}

	.tab.active {
		display: block;
	}

	.nav-tabs>li>a {
		margin-right: 2px;
		line-height: 1.42857143;
		border: 1px solid transparent;
		border-radius: 4px 4px 0 0;
	}

	.lbl_reg {
		display: none;
	}

	.lbl_oth {
		display: none;
	}

	.lbl_oth1 {
		display: none;
	}

	.no-js #loader {
		display: none;
	}

	.js #loader {
		display: block;
		position: absolute;
		left: 100px;
		top: 0;
	}

	.se-pre-con {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url(Preloader_3.gif) center no-repeat #fff;
	}
</style>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>


<div class="se-pre-con"></div>
<div class="content-wrapper" style="margin-top: -20px;">
	<section class="content">
		<div class="row">
			<div class="box box-info">
				<div class="box box-warning box-solid">

					<div class="box-body">
						<div class="tab-pane" id="prft">
							<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion </h3>
							<?php
							$conn = dbcon1();
							$pf_no = $_GET['pf_no'];
							$id = $_GET['id'];

							if ($pf_no != 'promo') {
								$query = mysqli_query($conn, "select * from  prft_promotion_temp where pro_pf_no='$pf_no' and id='$id'");
								$cnt = mysqli_num_rows($query);
								$result = mysqli_fetch_array($query);

								$action = "Viewed PRFT Promotion single record On SR Entry";
							} else {
								$action = "Visited Add Promotion Page On SR Entry";
							}

							$action_on = $_SESSION['set_update_pf'];
							create_log($action, $action_on);

							?>

							<form method="post" action="process_main.php?action=update_prtf_promotion" class="apply_readonly">
								<div class="modal-body">
									<div class="row">
										<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<input type="text" class="form-control primary TextNumber common_pf_number" id="pm_pf" name="pm_pf" placeholder="Enter PF No." readonly value="<?php echo $_SESSION['set_update_pf']; ?>" />
													<input type="hidden" value="<?php echo $id; ?>" id="pro_id" name="pro_id">
												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-4 col-sm-3 col-xs-12">Order Type<span class=""></span></label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<select class="form-control primary odrtype select2" id="pm_ordertype" name="pm_ordertype" style="width:100%;">
														<option value="" selected hidden disabled>-- Select Order Type --</option>
														<?php
														$conn = dbcon();
														$sqlDept = mysqli_query($conn, "select * from promotion_order_type");
														echo "select * from promotion_order_type" . mysqli_error($conn);
														while ($rwDept = mysqli_fetch_array($sqlDept)) {
														?>
															<option value="<?php echo $rwDept["descri"]; ?>"><?php echo $rwDept["descri"]; ?></option>
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
												<label class="control-label col-md-4 col-sm-3 col-xs-12">Office Order No<span class=""></span></label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<input type="text" class="form-control primary " id="pm_letterno" name="pm_letterno" placeholder="Enter Letter No" />
												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-4 col-sm-3 col-xs-12">Office Order Date</label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<input type="text" class="form-control primary calender_picker" id="pm_letterdate" name="pm_letterdate" />
												</div>
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-4 col-sm-3 col-xs-12">With Effect From</label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<input type="text" class="form-control primary calender_picker" id="pm_wef" name="pm_wef">
												</div>
											</div>
										</div>

										<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-4 col-sm-3 col-xs-12">Remark</label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<textarea type="text" class="form-control primary" id="pm_remark" name="pm_remark"></textarea>
												</div>
											</div>
										</div>
									</div>
									<br>
									<div class="row" id="promoform" style="display:none">
										<div class="col-md-6">
											<h4 id="from1"><b>Promotion From</b></h4>
											<h4 style="display:none;" id="from"><b>From</b></h4>
											<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2" id="pm_frm_dept" name="pm_frm_dept" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Department --</option>
																<?php
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
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2" id="pm_frm_desig" name="pm_frm_desig" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Designation --</option>
																<?php
																$sqlDept = mysqli_query($conn, "select * from designations");
																while ($rwDept = mysqli_fetch_array($sqlDept)) {
																?>
																	<option value="<?php echo $rwDept["id"]; ?>"><?php echo "(" . $rwDept["desigshortdesc"] . ")" . $rwDept["desiglongdesc"]; ?></option>
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
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Designation<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary" id="pm_frm_otherdesig" name="pm_frm_otherdesig" placeholder="Enter Designation" />
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Pay Scale TYPE</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary ps_type select2" id="pm_frm_ps_type_5" name="pm_frm_ps_type_3" style="margin-top:0px; width:100%;">
																<option value="" selected disabled>-- Select Pay Scale Type --</option>
																<?php
																echo $pay_scale_type;
																?>
															</select>
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="scale_5" style="display:none">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Scale</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2 scale_5" id="pm_frm_scale" name="pm_frm_scale" style="width:100%;">
																<option value="" selected hidden disabled>-- Select scale --</option>

															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_5" style='display:none;'>
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary scale_text_5 ps_3" id="pm_frm_scale_text" name="pm_frm_scale_text" placeholder="Enter 3rd Pay Rate" />
														</div>
													</div><br><br>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="level_5" style="display:none">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Level<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2 level_5" id="pm_frm_level" name="pm_frm_level" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Level --</option>

															</select>
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Group<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2" id="pm_frm_group" name="pm_frm_group" style="width:100%;">
																<option value="" selected disabled>-- Select Group --</option>
																<?php
																$sqlDept = mysqli_query($conn, "select * from group_col");
																while ($rwDept = mysqli_fetch_array($sqlDept)) {
																?>
																	<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Station<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="hidden" id="station_id1" name="station_id1" class="other">
															<input type="text" class="form-control primary station" id="station1" name="station1" data-toggle="modal" data-target="#station" readonly>
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Station<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary TextNumber" id="pm_frm_otherstation" name="pm_frm_otherstation" placeholder="Enter Station Name" />
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">

												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Rate Of Pay<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary onlyNumber" id="pm_frm_rop" name="pm_frm_rop" placeholder="Enter ROP" />
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Bill Unit<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="hidden" name="depot_bill_unita" id="depot_bill_unita">
															<input type="text" class="form-control primary bill_unit" id="billunita" name="billunita" data-toggle="modal" data-target="#bill_unit_select" readonly>
														</div>
													</div>
												</div>
											</div>
											<br>

											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Depot/Workplace<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="depota" name="depota" readonly>
														</div>
													</div>
												</div>

											</div>
										</div>
										<div class="col-md-6">
											<h4 id="to1"><b>Promotion To</b></h4>
											<h4 style="display:none" id="to"><b>To</b></h4>
											<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2" id="pm_to_dept" name="pm_to_dept" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Department --</option>
																<?php
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
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2" id="pm_to_desig" name="pm_to_desig" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Designation --</option>
																<?php
																$sqlDept = mysqli_query($conn, "select * from designations");
																while ($rwDept = mysqli_fetch_array($sqlDept)) {
																?>
																	<option value="<?php echo $rwDept["id"]; ?>"><?php echo "(" . $rwDept["desigshortdesc"] . ")" . $rwDept["desiglongdesc"]; ?></option>
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
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Designation<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary" id="pm_to_otherdesig" name="pm_to_otherdesig" placeholder="Enter Designation" />
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Pay Scale TYPE</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary ps_type select2" id="pm_to_ps_type_6" name="pm_to_ps_type_3" style="margin-top:0px; width:100%;">
																<?php
																echo $pay_scale_type;
																?>
															</select>
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="scale_6" style="display:none">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Scale</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2 scale_6" id="pm_to_scale" name="pm_to_scale" style="width:100%;">
																<option value="" selected hidden disabled>-- Select scale --</option>

															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_6" style='display:none;'>
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary scale_text_6 ps_3" id="pm_to_scale_text" name="pm_to_scale_text" placeholder="Enter 3rd Pay Rate" />
														</div>
													</div><br><br>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="level_6" style="display:none">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Level<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2 level_6" id="pm_to_level" name="pm_to_level" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Level --</option>

															</select>
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Group<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2" id="pm_to_group" name="pm_to_group" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Group --</option>
																<?php
																$sqlDept = mysqli_query($conn, "select * from group_col");
																while ($rwDept = mysqli_fetch_array($sqlDept)) {
																?>
																	<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Station<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="hidden" id="station_id7" name="station_id7" class="other">
															<input type="text" class="form-control primary station" id="station7" name="station7" data-toggle="modal" data-target="#station" readonly>
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Station<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary TextNumber" id="pm_to_otherstation" name="pm_to_otherstation" placeholder="Enter Station Name" />
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">

												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Rate Of Pay<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary onlyNumber" id="pm_to_rop" name="pm_to_rop" placeholder="Enter ROP" />
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Bill Unit<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="hidden" name="depot_bill_unit5" id="depot_bill_unit5">
															<input type="text" class="form-control primary bill_unit" id="billunit5" name="billunit5" data-toggle="modal" data-target="#bill_unit_select" readonly>
														</div>
													</div>
												</div>
											</div>
											<br>

											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Depot/Workplace<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="depot5" name="depot5" readonly>
														</div>
													</div>
												</div>

											</div>
										</div>
									</div>
									<!--Deputation Code start-->
									<div class="row" id="deputation_tb" style="display:none">
										<div class="col-md-6">
											<h4 id="from1"><b>Deputation From</b></h4>
											<h4 style="display:none;" id="from"><b>From</b></h4>
											<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2" id="dp_frm_dept" name="dp_frm_dept" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Department --</option>
																<?php
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
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2" id="dp_frm_desig" name="dp_frm_desig" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Designation --</option>
																<?php
																$sqlDept = mysqli_query($conn, "select * from designations");
																while ($rwDept = mysqli_fetch_array($sqlDept)) {
																?>
																	<option value="<?php echo $rwDept["id"]; ?>"><?php echo "(" . $rwDept["desigshortdesc"] . ")" . $rwDept["desiglongdesc"]; ?></option>
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
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Designation<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary" id="dp_frm_otherdesig" name="dp_frm_otherdesig" placeholder="Enter Designation" />
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Pay Scale TYPE</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary ps_type select2" id="dp_frm_ps_type_7" name="dp_frm_ps_type_3" style="margin-top:0px; width:100%;">
																<option value="" selected hidden disabled>-- Select PC Type --</option>
																<?php
																echo $pay_scale_type;
																?>
															</select>
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="scale_7" style="display:none;">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Scale</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2 scale_7" id="dp_frm_scale" name="dp_frm_scale" style="width:100%;">
																<option value="" selected hidden disabled>-- Select scale --</option>
																<?php
												echo $pay_scale_type;
												?>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_7" style='display:none;'>
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary scale_text_7 ps_3" id="dp_frm_scale_text" name="dp_frm_scale_text" placeholder="Enter 3rd Pay Rate" />
														</div>
													</div><br><br>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_7">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Level<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2 level_7" id="dp_frm_level" name="dp_frm_level" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Level --</option>
																<?php
												echo $pay_scale_type;
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
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Group<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2" id="dp_frm_group" name="dp_frm_group" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Group --</option>
																<?php
																$sqlDept = mysqli_query($conn, "select * from group_col");
																while ($rwDept = mysqli_fetch_array($sqlDept)) {
																?>
																	<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Station<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="hidden" id="station_id8" name="station_id8" class="other">
															<input type="text" class="form-control primary station" id="station8" name="station8" data-toggle="modal" data-target="#station" readonly>
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Station<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary TextNumber" id="dp_frm_otherstation" name="dp_frm_otherstation" placeholder="Enter Station Name" />
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Rate Of Pay<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary onlyNumber" id="dp_frm_rop" name="dp_frm_rop" placeholder="Enter ROP" />
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Bill Unit<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="hidden" name="depot_bill_unit6" id="depot_bill_unit6">
															<input type="text" class="form-control primary bill_unit" id="billunit6" name="billunit6" data-toggle="modal" data-target="#bill_unit_select" readonly>
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Depot/Workplace<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="depot6" name="depot6" readonly>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!--Deputation from end-->
										<!--Deputation to start-->
										<div class="col-md-6">
											<h4 id="to1"><b>Deputation To</b></h4>
											<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="dp_to_dept" name="dp_to_dept">
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="dp_to_desig" name="dp_to_desig">
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Designation<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="dp_to_othr_desig" name="dp_to_othr_desig">
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Pay Scale / Level</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="dp_to_pay_scale_level" name="dp_to_pay_scale_level">
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Group<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="dp_to_grp" name="dp_to_grp">
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Place<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="dp_to_place" name="dp_to_place">
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">

												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Rate Of Pay<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="dp_to_rop" name="dp_to_rop">
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Bill Unit<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="hidden" class="form-control primary depot" id="depot_bill_unit7" name="depot_bill_unit7">
															<input type="text" class="form-control primary depot" id="billunit7" name="billunit7">
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Depot/Workplace<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="depot7" name="depot7">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<!--Deputation Code End-->
									<!--Reparation Code Start--->

									<div class="row" id="reparation_tb" style="display:none">
										<div class="col-md-6">
											<h4 id="to1"><b>Reparation From</b></h4>
											<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="re_to_dept" name="re_to_dept">
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="re_to_desig" name="re_to_desig">
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Designation<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="re_to_otr_desig" name="re_to_otr_desig">
														</div>
													</div>
												</div>



											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Pay Scale / Level</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="re_to_pay_scale" name="re_to_pay_scale">
														</div>
													</div>
												</div>

											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Group<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="re_to_group" name="re_to_group">
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Place<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="re_to_place" name="re_to_place">
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">

												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Rate Of Pay<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="re_to_rop" name="re_to_rop">
														</div>
													</div>
												</div>
											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Bill Unit<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="hidden" id="depot_bill_unit8" name="depot_bill_unit8">
															<input type="text" class="form-control primary depot" id="billunit8" name="billunit8">
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Depot/Workplace<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="depot8" name="depot8">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<h4 id="from1"><b>Reparation To</b></h4>
											<h4 style="display:none;" id="from"><b>From</b></h4>
											<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2" id="re_frm_dept" name="re_frm_dept" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Department --</option>
																<?php
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
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2" id="re_frm_desig" name="re_frm_desig" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Designation --</option>
																<?php
																$sqlDept = mysqli_query($conn, "select * from designations");
																while ($rwDept = mysqli_fetch_array($sqlDept)) {
																?>
																	<option value="<?php echo $rwDept["id"]; ?>"><?php echo "(" . $rwDept["desigshortdesc"] . ")" . $rwDept["desiglongdesc"]; ?></option>
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
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Designation<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary" id="re_frm_otherdesig" name="re_frm_otherdesig" placeholder="Enter Designation" />
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Pay Scale TYPE</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary ps_type select2" id="re_frm_ps_type_8" name="re_frm_ps_type_3" style="margin-top:0px; width:100%;">
																<option value="" selected hidden disabled>-- Select PC Type --</option>
																<?php echo $get_all_pay_scale_type ?>
															</select>
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="scale_8" style="display:none;">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Scale</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2 scale_8" id="re_frm_scale" name="re_frm_scale" style="width:100%;">
																<option value="" selected hidden disabled>-- Select scale --</option>

															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_8" style='display:none;'>
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary scale_text_8 ps_3" id="re_frm_scale_text" name="re_frm_scale_text" placeholder="Enter 3rd Pay Rate" />
														</div>
													</div><br><br>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_8">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Level<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2 level_8 " id="re_frm_level" name="re_frm_level" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Level --</option>

															</select>
														</div>
													</div>
												</div>

											</div><br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Group<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<select class="form-control primary select2" id="re_frm_group" name="re_frm_group" style="width:100%;">
																<option value="" selected hidden disabled>-- Select Group --</option>
																<?php
																$sqlDept = mysqli_query($conn, "select * from group_col");
																while ($rwDept = mysqli_fetch_array($sqlDept)) {
																?>
																	<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Station<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="hidden" id="station_id9" name="station_id9" class="other">
															<input type="text" class="form-control primary station" id="station9" name="station9" data-toggle="modal" data-target="#station" readonly>
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Other Station<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary TextNumber" id="re_frm_otherstation" name="re_frm_otherstation" placeholder="Enter Station Name" />
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Rate Of Pay<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary onlyNumber" id="re_frm_rop" name="re_frm_rop" placeholder="Enter ROP" />
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Bill Unit<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="hidden" name="depot_bill_unit9" id="depot_bill_unit9">
															<input type="text" class="form-control primary bill_unit" id="billunit9" name="billunit9" data-toggle="modal" data-target="#bill_unit_select" readonly>
														</div>
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-3 col-xs-12">Depot/Workplace<span class=""></span></label>
														<div class="col-md-8 col-sm-8 col-xs-12">
															<input type="text" class="form-control primary depot" id="depot9" name="depot9" readonly>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--Reparation Code end--->

									<!--Carried Out Code Start-->
									<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
									<div class="row">
										<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-4 col-sm-3 col-xs-12">Carried Out<span class=""></span></label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<select class="form-control primary return1 select2" id="prtf_carried" name="prtf_carried" style="width:100%;">
														<option value="" selected hidden disabled>-- Select Carried Out --</option>
														<option value="Yes">Carried Out</option>
														<option value="No">Returned</option>
													</select>

												</div>
											</div>
										</div>

									</div><br>
									<div class="row" id="return" style="display:none;">
										<div class="row">
											<div class="col-md-6 col-sm-12 col-xs-12">
												<div class="form-group">
													<label class="control-label col-md-4 col-sm-3 col-xs-12">Acceptance Letter NO.</label>
													<div class="col-md-8 col-sm-8 col-xs-12">
														<input type="text" class="form-control primary" id="prtf_acc_ltr_no" name="prtf_acc_ltr_no" />
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-12 col-xs-12">
												<div class="form-group">
													<label class="control-label col-md-4 col-sm-3 col-xs-12">Acceptance Letter Date</label>
													<div class="col-md-8 col-sm-8 col-xs-12">
														<input type="text" class="form-control primary calender_picker" id="prtf_acc_ltr_date" name="prtf_acc_ltr_date" />
													</div>
												</div>
											</div>
										</div><br>
										<div class="row">
											<div class="col-md-6 col-sm-12 col-xs-12">
												<div class="form-group">
													<label class="control-label col-md-4 col-sm-3 col-xs-12">WEF Date</label>
													<div class="col-md-8 col-sm-8 col-xs-12">
														<input type="text" class="form-control primary calender_picker" id="prtf_carr_wef_date" name="prtf_carr_wef_date" />
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-12 col-xs-12">
												<div class="form-group">
													<label class="control-label col-md-4 col-sm-3 col-xs-12">Remark</label>
													<div class="col-md-8 col-sm-8 col-xs-12">
														<input type="text" class="form-control primary" id="prtf_carr_remark" name="prtf_carr_remark" />
													</div>
												</div>
											</div>
										</div>



									</div>
									<div class="row" id="notreturn">
										<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-4 col-sm-3 col-xs-12">W.E.F Date</label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<input type="text" class="form-control primary calender_picker" id="prtf_wefdate" name="prtf_wefdate" />
												</div>
											</div>

										</div>
										<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="control-label col-md-4 col-sm-3 col-xs-12">Date of Incr.</label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<input type="text" class="form-control primary calender_picker" id="prtf_incrdate" name="prtf_incrdate" />
												</div>
											</div>

										</div>
									</div><br>


									<div class="form-group">
										<div class="col-sm-3 col-xs-12 pull-right">
											<input type="submit" id="btnSave" name="btnSave" value="Update" class="btn btn-success" />
											<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
											<a href="prft_update.php?pf=<?php echo $_SESSION['set_update_pf'] ?>" class="btn btn-primary">Back</a>
											<br>
										</div>
									</div>

									<div class="col-md-7 col-sm-12 col-xs-12" align="center">

									</div>
								</div>
							</form>
						</div>
					</div>


				</div>
			</div>
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<?php include('modal_js_header.php'); ?>
<script type="text/javascript">
	$(document).on('focus', '.select2', function() {
		$(this).siblings('select').select2('open');
	});
	$('#pm_ordertype').on('select2:close', function(e) {
		$("#pm_letterno").focus();
	});
	$('#pm_frm_dept').on('select2:close', function(e) {
		$("#pm_frm_desig").focus();
	});
	$('#pm_frm_desig').on('select2:close', function(e) {
		$("#pm_frm_otherdesig").focus();
	});
	$('#pm_frm_ps_type_5').on('select2:close', function(e) {
		$("#pm_frm_group").focus();
	});
	$('#pm_frm_group').on('select2:close', function(e) {
		$("#station1").focus();
	});
	$('#pm_to_dept').on('select2:close', function(e) {
		$("#pm_to_desig").focus();
	});
	$('#pm_to_desig').on('select2:close', function(e) {
		$("#pm_to_otherdesig").focus();
	});
	$('#pm_to_ps_type_6').on('select2:close', function(e) {
		$("#pm_to_group").focus();
	});
	$('#pm_to_group').on('select2:close', function(e) {
		$("#station7").focus();
	});
	$('#prtf_carried').on('select2:close', function(e) {
		$("#prtf_wefdate").focus();
	});


	var promo = '<?php echo $pf_no ?>';
	if (promo != 'promo') {

		var prft_pf_no = '<?php echo "" . $pf_no; ?>';
		var prft_id = '<?php echo "" . $id; ?>';
		$.ajax({
			type: "post",
			url: "process_main.php",
			data: "action=get_prft_promotion_2&prft_pf_no=" + prft_pf_no + "&prft_id=" + prft_id,
			success: function(data) {
				var arr = JSON.parse(data);

				if (arr['pro_order_type'] == 'LDCE' || arr['pro_order_type'] == 'GDCE' || arr['pro_order_type'] == 'LGS' || arr['pro_order_type'] == 'Departmental' || arr['pro_order_type'] == 'Re-structuring' || arr['pro_order_type'] == 'MACP-1' || arr['pro_order_type'] == 'MACP-2' || arr['pro_order_type'] == 'MACP-3') {
					$("#promoform").show();

					$('#pm_ordertype').val(arr['pro_order_type']).trigger('change');

					$("#pm_letterno").val(arr['pro_letter_no']);
					$('#pm_letterdate').val(arr['pro_letter_date']);
					$('#pm_wef').val(arr['pro_wef']);
					$('#pm_frm_dept').val(arr['pro_frm_dept']).trigger('change');
					$('#pm_frm_desig').val(arr['pro_frm_desig']).trigger('change');
					$('#pm_frm_otherdesig').val(arr['pro_frm_othr_desig']);
					$('#pm_frm_ps_type_5').html(arr['pro_frm_pay_scale_type']);

					$('#pm_frm_scale').html(arr['pro_frm_scale']);
					$('#pm_frm_level').html(arr['pro_frm_level']);

					$('#pm_frm_group').val(arr['pro_frm_group']).trigger('change');
					$('#station1').val(arr['pro_frm_station']);
					$('#station_id1').val(arr['pro_frm_station']);
					$('#pm_frm_otherstation').val(arr['pro_frm_othr_station']);
					$('#pm_frm_rop').val(arr['pro_frm_rop']);
					$('#billunita').val(arr['pro_frm_billunit']);
					$('#depot_bill_unita').val(arr['pro_frm_billunit_value']);
					$('#depota').val(arr['pro_frm_depot']);
					$('#pm_to_dept').val(arr['pro_to_dept']).trigger('change');
					$('#pm_to_desig').val(arr['pro_to_desig']).trigger('change');
					$('#pm_to_otherdesig').val(arr['pro_to_othr_desig']);
					$('#pm_to_ps_type_6').html(arr['pro_to_pay_scale_type']);
					//alert(arr['pro_to_scale']);
					$('#pm_to_scale').html(arr['pro_to_scale']);
					$('#pm_to_level').html(arr['pro_to_level']);
					$('#pm_to_group').val(arr['pro_to_group']).trigger('change');
					$('#station7').val(arr['pro_to_station']);
					$('#station_id7').val(arr['pro_to_station']);
					$('#pm_to_otherstation').val(arr['pro_to_othr_station']);
					$('#pm_to_rop').val(arr['rop_to']);
					$('#billunit5').val(arr['pro_to_billunit']);
					$('#depot_bill_unit5').val(arr['pro_to_billunit_value']);
					$('#depot5').val(arr['pro_to_depot']);

					if (arr['pro_frm_ps'] == "5") {
						$("#level_5").show();

					} else if (arr['pro_frm_ps'] == "2" || arr['pro_frm_ps'] == "3" || arr['pro_frm_ps'] == "4") {
						$("#scale_5").show();
					} else {
						$("#scale_text_5").show();
						$(".scale_text_5").val(arr['pro_frm_scale']);
					}

					if (arr['pro_to_ps'] == "5") {
						$("#level_6").show();

					} else if (arr['pro_to_ps'] == "2" || arr['pro_to_ps'] == "3" || arr['pro_to_ps'] == "4") {
						$("#scale_6").show();
					} else {
						$("#scale_text_6").show();
						$(".scale_text_6").val(arr['pro_to_scale']);
					}
					//$("#pm_remark").html(arr['pro_remark']);
				} else if (arr['pro_order_type'] == 'Deputation') {
					$("#deputation_tb").show();
					$('#pm_ordertype').val(arr['pro_order_type']).trigger('change');
					$("#pm_letterno").val(arr['pro_letter_no']);
					$('#pm_letterdate').val(arr['pro_letter_date']);
					$('#pm_wef').val(arr['pro_wef']);
					$('#dp_frm_dept').val(arr['pro_frm_dept']).trigger('change');
					$('#dp_frm_desig').val(arr['pro_frm_desig']).trigger('change');
					$('#dp_frm_otherdesig').val(arr['pro_frm_othr_desig']);
					$('#dp_frm_ps_type_7').html(arr['pro_frm_pay_scale_type']);
					$('#dp_frm_scale').html(arr['pro_frm_scale']);
					$('#dp_frm_level').html(arr['pro_frm_level']);
					$('#dp_frm_group').val(arr['pro_frm_group']).trigger('change');
					$('#station8').val(arr['pro_frm_station']);
					$('#station_id8').val(arr['pro_frm_station']);
					$('#dp_frm_otherstation').val(arr['pro_frm_othr_station']);
					$('#dp_frm_rop').val(arr['pro_frm_rop']);
					//alert(arr['pro_frm_billunit']);
					$('#billunit6').val(arr['pro_frm_billunit']);
					$('#depot_bill_unit6').val(arr['pro_frm_billunit_value']);
					$('#depot6').val(arr['pro_frm_depot']);

					$('#dp_to_dept').val(arr['pro_to_dept']);
					$('#dp_to_desig').val(arr['pro_to_desig']);
					$('#dp_to_othr_desig').val(arr['pro_to_othr_desig']);
					$('#dp_to_grp').val(arr['pro_to_group']);
					$('#dp_to_place').val(arr['pro_to_station']);
					$('#dp_to_pay_scale_level').val(arr['dep_scale_value']);
					$('#dp_to_rop').val(arr['rop_to']);
					$('#billunit7').val(arr['pro_to_billunit']);
					$('#depot_bill_unit7').val(arr['pro_to_billunit_value']);
					$('#depot7').val(arr['pro_to_depot']);

					if (arr['pro_frm_ps'] == "5") {
						$("#level_7").show();
					} else if (arr['pro_frm_ps'] == "2" || arr['pro_frm_ps'] == "3" || arr['pro_frm_ps'] == "4") {
						$("#scale_7").show();
					} else {
						$("#scale_text_7").show();
						$(".scale_text_7").val(arr['pro_frm_scale']);
					}

					//$("#pm_remark").html(arr['pro_remark']);

				} else {
					$("#reparation_tb").show();
					$('#pm_ordertype').val(arr['pro_order_type']).trigger('change');
					$("#pm_letterno").val(arr['pro_letter_no']);
					$('#pm_letterdate').val(arr['pro_letter_date']);
					$('#pm_wef').val(arr['pro_wef']);

					$('#re_to_dept').val(arr['pro_to_dept']);
					$('#re_to_desig').val(arr['pro_to_desig']);
					$('#re_to_otr_desig').val(arr['pro_to_othr_desig']);

					$('#re_to_group').val(arr['pro_to_group']);
					$('#re_to_place').val(arr['pro_to_station']);
					$('#re_to_pay_scale').val(arr['dep_scale_value']);
					$('#re_to_rop').val(arr['rop_to']);
					$('#billunit8').val(arr['pro_to_billunit']);
					$('#depot_bill_unit8').val(arr['pro_to_depot']);
					$('#depot8').val(arr['pro_to_depot']);
					$('#re_frm_dept').val(arr['pro_frm_dept']).trigger('change');
					$('#re_frm_desig').val(arr['pro_frm_desig']).trigger('change');
					$('#re_frm_otherdesig').val(arr['pro_frm_othr_desig']);
					$('#re_frm_ps_type_8').html(arr['pro_frm_pay_scale_type']);
					$('#re_frm_scale').html(arr['pro_frm_scale']);
					//alert(arr['pro_frm_level']);
					$('#re_frm_level').html(arr['pro_frm_level']);
					$('#re_frm_group').val(arr['pro_frm_group']).trigger('change');
					$('#station9').val(arr['pro_frm_station']);
					$('#station_id9').val(arr['pro_frm_station']);
					$('#re_frm_otherstation').val(arr['pro_frm_othr_station']);
					$('#re_frm_rop').val(arr['pro_frm_rop']);
					$('#billunit9').val(arr['pro_frm_billunit']);
					$('#depot_bill_unit9').val(arr['pro_frm_billunit_value']);
					$('#depot9').val(arr['pro_frm_depot']);

					if (arr['pro_frm_ps'] == "5") {
						$("#level_8").show();
					} else if (arr['pro_frm_ps'] == "5" || arr['pro_frm_ps'] == "5" || arr['pro_frm_ps'] == "5") {
						$("#scale_8").show();
					} else {
						$("#scale_text_8").show();
						$(".scale_text_8").val(arr['pro_frm_scale']);
					}
					//$("#pm_remark").html(arr['pro_remark']);
				}
				if (arr['pro_carried_out_type'] == 'No') {
					$("#return").show();
					$("#notreturn").hide();
				} else {
					$("#return").hide();
					$("#notreturn").show();
				}

				$('#prtf_carried').val(arr['pro_carried_out_type']).trigger('change');
				$('#prtf_wefdate').val(arr['pro_carri_wef']);
				$('#prtf_incrdate').val(arr['pro_carri_date_of_incr']);

				$('#prtf_acc_ltr_no').val(arr['pro_car_re_accept_ltr_no']);
				$('#prtf_acc_ltr_date').val(arr['pro_car_re_accept_ltr_date']);
				$('#prtf_carr_wef_date').val(arr['pro_car_re_wef_date']);
				$('#prtf_carr_remark').val(arr['pro_car_re_remark']);
				$('#pm_remark').val(arr['pro_remark']);

			}
		});


	}
</script>
<?php include_once('../global/footer.php'); ?>
<script>
	$('#prtf_carried').on('change', function() {

		if ($(this).val() == 'Yes') {
			$("#return").hide();
			$("#notreturn").show();
			$("#prtf_acc_ltr_no").val('');
			$("#prtf_acc_ltr_date").val('');
			$("#prtf_carr_wef_date").val('');
			$("#prtf_carr_remark").val('');
		} else {
			$("#return").show();
			$("#notreturn").hide();
			$('#prtf_wefdate').val('');
			$('#prtf_incrdate').val('');
		}

	});

	// 	$('#pm_frm_desig').on("change",function(){
	// 	   var $value=$(this).val();
	// 	   $("#pm_to_desig").val($value).trigger('change');
	// 	});
	// 	$('#pm_frm_otherdesig').on("change",function(){
	// 	   var $value=$(this).val();
	// 	   $("#pm_to_otherdesig").val($value);
	// 	});
	// 	$('#pm_frm_ps_type_5').on("change",function(){
	// 	   var $value=$(this).val();
	// 	   $("#pm_to_ps_type_6").val($value).trigger('change');
	// 	});
</script>
<script>
	$('#pm_frm_dept').on("change", function() {
		var $value = $(this).val();
		$("#pm_to_dept").val($value).trigger('change');
	});
	$('#pm_frm_desig').on("change", function() {
		var $value = $(this).val();
		$("#pm_to_desig").val($value).trigger('change');
	});
	$('#pm_frm_otherdesig').on("change", function() {
		var $value = $(this).val();
		$("#pm_to_otherdesig").val($value);
	});
	$('#pm_frm_ps_type_m').on("change", function() {
		var $value = $(this).val();
		$("#pm_to_ps_type_n").val($value).trigger('change');
	});
	$('#pm_frm_group').on("change", function() {
		var $value = $(this).val();
		$("#pm_to_group").val($value).trigger('change');
	});
	$('#pm_frm_scale_text').on("change", function() {
		var $value = $(this).val();
		$("#pm_to_scale_text").val($value);
	});
	$('#pm_frm_otherstation').on("change", function() {
		var $value = $(this).val();
		$("#pm_to_otherstation").val($value);
	});
	$('#pm_frm_rop').on("change", function() {
		var $value = $(this).val();
		$("#pm_to_rop").val($value);
	});

	$('#pm_frm_scale').on("change", function() {
		var $value = $(this).val();
		$("#pm_to_scale").val($value).trigger('change');
	});
	$('#pm_frm_ps_type_5').on("change", function() {
		var $value = $(this).val();
		$("#pm_to_ps_type_6").val($value).trigger('change');
	});

	$('#pm_frm_level').on("change", function() {
		var $value = $(this).val();
		$("#pm_to_level").val($value).trigger('change');
	});
</script>