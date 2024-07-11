<?php
$GLOBALS['flag'] = "1.9";
include('common/header.php');
include('common/sidebar.php');
?>
<style type="text/css" media="screen">
	@media print {
		.btnhide {
			display: none !important;
			display: block;
		}

	}

	@media print {
		.content {
			background: #fff !important;
		}

		.content-wrapper {
			background: #fff !important;
		}
	}

	.box.box-info {
		border-top-color: #ccc;
	}

	.table-bordered>thead>tr>th,
	.table-bordered>tbody>tr>th,
	.table-bordered>tfoot>tr>th,
	.table-bordered>thead>tr>td,
	.table-bordered>tbody>tr>td,
	.table-bordered>tfoot>tr>td {
		border: 1px solid #ccc;
	}

	.table-bordered {
		border: 1px solid #ccc;
	}

	.borderbox {
		border: 1px solid black !important;
		overflow: hidden;
	}

	.summary-total {
		width: 33% !important;
		margin: 0px auto;
	}
</style>

<div class="page-content-wrapper">
	<div class="page-content">


		<div class="portlet box blue btnz">
			<div class="portlet-title">
				<div class="caption btnboom">
					<i class="fa fa-book"></i> Application Form
				</div>
			</div>

			<div class="portlet-body form">
				<form action="control/adminProcess.php?action=update_allCases" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
					<input type="hidden" id="curDate" value="<?php echo date('m/d/Y'); ?>">
					<input type="hidden" id="pid" name="pid" value="<?php echo $_GET['id']; ?>">
					<input type="hidden" id="p_emp_pfno" name="p_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>">
					<input type="hidden" id="case" name="case" value="<?php echo $_GET['case']; ?>">
					<div class="form-body">

						<div class="tabbable-line ">
							<ul class="nav nav-tabs btnboom">
								<li class="active">
									<a href="#tab_15_1" data-toggle="tab">
										form </a>
								</li>

								<li>
									<a href="#tab_15_3" data-toggle="tab">
										Verified Documents </a>
								</li>
								<li>
									<a href="#tab_15_4" data-toggle="tab">
										note </a>
								</li>

							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_15_1">
									<div class="form-body">
										<!-- <h3 class="form-section">Add User</h3> -->
										<div class="row">
											<div style="margin-left: 25px" class="table-responsive">
												<table class="table table-bordered table-striped" style="width: 85%;">
													<tbody>
														<?php
														$con = dbcon2();
														$sql = mysqli_query($con, "select * from register_user  where emp_no='" . $_GET['ex_emp_pfno'] . "' ");
														$res = mysqli_fetch_array($sql);
														$con = dbcon1();
														$sql1 = mysqli_query($con, "select * from service_particulars where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
														$res1 = mysqli_fetch_array($sql1);
														?>
														<tr>
															<td style="width: 30px;">1</td>
															<td style="width: 323px;">Name of the Employee</td>
															<td><?php echo $res['name']; ?></td>
														</tr>
														<tr>
															<td>2</td>
															<td>Whether belongs to SC/ST/OBC</td>
															<td><?php //echo $res['community']; 
																?></td>
														</tr>
														<tr>
															<td>3</td>
															<td>Design & place of last working</td>
															<td><?php echo designation($res['designation']) . " &  (" . $res['station'] . ")"; ?></td>
														</tr>
														<tr>
															<td>4</td>
															<td>Scale & rate of pay</td>
															<td><?php echo $res['basic_pay'];  ?></td>
														</tr>
														<tr>
															<td>5</td>
															<td>Date of Birth</td>
															<td><?php echo $res['dob']; ?></td>
														</tr>
														<tr>
															<td>6</td>
															<td>Date of Appointment<br>(Note:copy of the service certificate has to be enclosed in support of the information against item 1 to 6 )</td>
															<td><?php echo $res['doa']; ?></td>
														</tr>
														<tr>
															<td>7</td>
															<td>Date of death/medical decategorised /medically unfit/missing</td>
															<td>
																<?php
																$con = dbcon1();
																$sql = mysqli_query($con, "SELECT * from category where id='" . $_GET['case'] . "'");
																$res11 = mysqli_fetch_array($sql);
																if ($res11['id'] == 1) {
																	echo '<input type="text" class="form-control appl_dob" id="" name="expiry_date" value="' . $res['date_of_expiry'] . '">';
																} elseif ($res11['id'] == 2) {
																	echo '<input type="text" class="form-control appl_dob" id="" name="missing_date" value="' . $res['date_of_missing'] . '">';
																} elseif ($res11['id'] == 3) {
																	echo '<input type="text" class="form-control appl_dob" id="" name="date_of_md" value="' . $res['date_of_md'] . '">';
																	echo '<input type="text" class="form-control appl_dob" id="" name="date_of_vr" value="' . $res['date_of_vr'] . '">';
																} elseif ($res11['id'] == 4) {
																	echo '<input type="text" class="form-control appl_dob" id="" name="txtdomd" value="' . $res['date_of_med_decat'] . '">';
																	echo '<input type="text" class="form-control appl_dob" id="" name="txtdor" value="' . $res['date_of_retd'] . '">';
																}
																?>

														</tr>
														<tr>
															<td>8</td>
															<td>Whether death is due to accident on duty, if so, particulars of compensation paid.</td>
															<td><input type="text" class="form-control" name="due_to_accident" value="<?php echo $res1['death_is_dueto_accident_on_duty']; ?>"></td>

														</tr>
														<tr>
															<td>9</td>
															<td>Priority no. under which the case falls</td>
															<td><input type="text" name="priority_no" class="form-control " value="<?php echo $res1['priority_no']; ?>"></td>
														</tr>
														<tr>
															<td>10</td>
															<td>Cause of death /reason for medical unfitness /decategorisation</td>
															<td><input type="text" name="cause_death/medical" class="form-control" value="<?php echo $res1['cause_of_death/reason']; ?>"></td>
														</tr>
														<tr>
															<td>11</td>
															<td>The period of sickness in case of medical unfit / decategorisation</td>
															<td><input type="text" name="period_sickness" class="form-control" value="<?php echo $res1['period_sickness']; ?>"></td>
														</tr>
														<tr>
															<td>12</td>
															<td>Total service</td>
															<td><input type="text" name="total_service" class="form-control" value="<?php echo $res1['total_service']; ?>"></td>
														</tr>
														<tr>
															<td>13</td>
															<td>Date on which the alternative job offered (furnish Design/deptt & scale of the alternative post enclose copy of the alternative appointment).</td>
															<td><textarea name="alt_job_offered" class="form-control" rows="2"><?php echo $res1['alter_job_offered']; ?></textarea></td>
														</tr>
														<tr>
															<td>14</td>
															<td>Whether alternative appointment on same emolument offered or otherwise</td>
															<td><textarea name="apptmt_emolumt" class="form-control" rows="2"><?php echo $res1['alter_apptmt_emolumt_offered']; ?></textarea></td>
														</tr>
														<tr>
															<td rowspan="6">15</td>
															<td>Emoluments the employee has been drawing before decategorisation & BP also the post offered on alternative appointment.</td>
															<td>
																<p style="text-align: center;width: 50%;float: left;">Before</p>
																<p style="text-align: center;width: 50%;float: right;">After</p>
															</td>
														</tr>
														<tr>
															<td>BP</td>
															<td><input type="text" class="form-control" style="width: 47%;float: left;margin-right: 10px;" name="before_bp" value="<?php echo $res1['before_bp']; ?>"> <input type="text" style="width: 48%;" class="form-control" name="after_bp" value="<?php echo $res1['after_bp']; ?>"></td>
															<!-- <td></td> -->
														</tr>
														<tr>
															<td>DA</td>
															<td><input type="text" style="width: 47%;float: left;margin-right: 10px;" class="form-control" name="before_da" value="<?php echo $res1['before_da']; ?>"><input type="text" class="form-control" style="width: 48%;" name="after_da" value="<?php echo $res1['after_da']; ?>"></td>
															<!-- <td></td> -->
														</tr>
														<tr>
															<td>HRA</td>
															<td><input type="text" style="width: 47%;float: left;margin-right: 10px;" class="form-control" name="before_hra" value="<?php echo $res1['before_hra']; ?>"><input type="text" style="width: 48%;" class="form-control" name="after_hra" value="<?php echo $res1['after_hra']; ?>"></td>
															<!-- <td></td> -->
														</tr>
														<tr>
															<td>CCA</td>
															<td><input type="text" style="width: 47%;float: left;margin-right: 10px;" class="form-control" name="before_cca" value="<?php echo $res1['before_cca']; ?>"><input type="text" style="width: 48%;" class="form-control" name="after_cca" value="<?php echo $res1['after_cca']; ?>"></td>
															<!-- <td></td> -->
														</tr>
														<tr>
															<td>OTHERS</td>
															<td><input type="text" style="width: 47%;float: left;margin-right: 10px;" class="form-control" name="before_others" value="<?php echo $res1['before_others']; ?>"><input type="text" style="width: 48%;" class="form-control" name="after_others" value="<?php echo $res1['after_others']; ?>"></td>
															<!-- <td></td> -->
														</tr>

														<tr>
															<td>16</td>
															<td>Is there drop in emolument ,percentage of drop on alternative appointment.</td>
															<td><textarea class="form-control" name="drop_in_emlmt"><?php echo $res1['drop_in_emolumt']; ?></textarea></td>
														</tr>
														<tr>
															<td>17</td>
															<td>Reasons if any, for not accepting the altenative appointment (Encl copy of refusal)</td>
															<td><textarea class="form-control" name="not_accepting_alter"><?php echo $res1['not_accepting_alter_appmt']; ?></textarea></td>
														</tr>
														<tr>
															<td>18</td>
															<td>Date on which the service terminated / compulsory retd. due to non_acceptance of alternative appt OR retired without waiting for alternative appt (Encl copy of office order)</td>
															<td><textarea class="form-control" name="service_terminated/compulsory_retd" rows="3"><?php echo $res1['service_trminated/compulsory_retd']; ?></textarea></td>
														</tr>
														<tr>
															<td rowspan="8">19</td>
															<td>Settlement dues paid</td>
															<td></td>
														</tr>
														<?php
														$con = dbcon1();
														$qq = mysqli_query($con, "select * from wi_settlement where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
														$results = mysqli_fetch_array($qq);
														?>
														<input type="hidden" name="sd_id" value="<?php echo $results['id'] ?>">
														<tr>
															<td>PF:</td>
															<td><input type="text" class="form-control" name="pf2" value="<?php echo $results['pf']; ?>"></td>
														</tr>
														<tr>
															<td>DCRG:</td>
															<td><input type="text" class="form-control" name="dcrg2" value="<?php echo $results['dcrg']; ?>"></td>
														</tr>
														<tr>
															<td>GIS:</td>
															<td><input type="text" class="form-control" name="gis2" value="<?php echo $results['gis']; ?>"></td>
														</tr>
														<tr>
															<td>IL:</td>
															<td><input type="text" class="form-control" name="il2" value="<?php echo $results['il']; ?>"></td>
														</tr>
														<tr>
															<td>LE:</td>
															<td><input type="text" class="form-control" name="le2" value="<?php echo $results['le']; ?>"></td>
														</tr>
														<tr>
															<td>Compensation in regard to WCA:</td>
															<td><input type="text" class="form-control" name="wca2" value="<?php echo $results['wca']; ?>"></td>
														</tr>
														<tr>
															<td>Others:</td>
															<td><input type="text" class="form-control" name="other2" value="<?php echo $results['others']; ?>"></td>
														</tr>
														<tr>
															<td>20</td>
															<td>Pension /family pension sanction with relief</td>
															<td><input type="text" class="form-control" name="family_pension2" value="<?php echo $results['family_pension']; ?>"></td>
														</tr>
														<tr>
															<td>1</td>
															<td>Whether employed else were including in railways as CL/Sub & reasons for leaving the job (with particulars of employment viz. post held since when and monthly emolument) </td>
															<td><textarea class="form-control" rows="3" name="cl/sub_reasons"><?php echo $res1['cl_sub_n_reason']; ?></textarea></td>
														</tr>
														<tr>
															<td>2</td>
															<td>Whether eligible for the post of Gr. C or D based on educational qualification? </td>
															<td><!-- <input type="text" class="form-control"  name="eligible_group"> -->
																<select name="eligible_group" id="eligible_group" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">

																	<option value="<?php echo $res1['eligible_group']; ?>" selected><?php echo $res1['eligible_group']; ?></option>
																	<!-- <option value="Group A">Group A</option>								
																<option value="Group B">Group B</option> -->
																	<option value="Group C">Group C</option>
																	<option value="Group D">Group D</option>
																</select>
															</td>
														</tr>
														<tr>
															<td>3</td>
															<td>Date of receipt of application (for compassionate appointment and from whom Encl copy)</td>
															<td><textarea class="form-control" rows="3" name="date_of_receipt"><?php echo $res1['date_of_receipt_appl']; ?></textarea></td>
														</tr>
														<tr>
															<td>4</td>
															<td>Whether the widow has remarried or otherwise (encl declaration of the widow) </td>
															<td><textarea class="form-control" rows="3" name="widow_remarried"><?php echo $res1['widow_remarried']; ?></textarea></td>
														</tr>
														<tr>
															<td>5</td>
															<td>Whether the widow has applied for appointment for herself or forward within the time limit of 5 years from the date of death of deceased employee. </td>
															<td><textarea class="form-control" rows="3" name="widow_applied_appmt"><?php echo $res1['widow_applied_apptmt']; ?></textarea></td>
														</tr>
														<tr>
															<td>6</td>
															<td>Reason why she could not apply for appointment for herself or forward within five years. </td>
															<td><textarea class="form-control" rows="3" name="not_apply_appmt"><?php echo $res1['not_apply_for_apptmt']; ?></textarea></td>
														</tr>
														<tr>
															<td>7</td>
															<td>In the case the ward is minor at the time of death of the deceased,whether the widow has applied within 2 years from the date of the candidate attained majority. </td>
															<td><textarea class="form-control" rows="3" name="attained_majority"><?php echo $res1['minor_at_time_death']; ?></textarea></td>
														</tr>
														<tr>
															<td>8</td>
															<td>Detail remarking as on the circumtances of the case warranting relaxation of time limit of 5 to 20 years. </td>
															<td><textarea class="form-control" rows="3" name="warranting_time_limit"><?php echo $res1['warranting_time_limit']; ?></textarea></td>
														</tr>
														<tr>
															<td>9</td>
															<td>Whether relaxation in the age is , if so to what extant (while seeking age relaxation the provision of age limit for SC/ST candidates has to be observed). </td>
															<td><textarea class="form-control" rows="3" name="relaxation_age_req"><?php echo $res1['relaxation_age_req']; ?></textarea></td>
														</tr>
														<tr>
															<td>10</td>
															<td>Date on which proforma filled and report submitted </td>
															<td><textarea class="form-control" rows="3" name="filled_n_report_submit"><?php echo $res1['date_filled_n_report_submitted']; ?></textarea></td>
														</tr>
														<tr>
															<td>11</td>
															<td>Special or any other particulars considered relevant in the case: </td>
															<td><textarea class="form-control" rows="4" name="other_particulars"><?php echo $res1['other_particulars_considered']; ?></textarea></td>
														</tr>

													</tbody>
												</table>
											</div>
											<div class="row">
												<div style="margin-left: 25px" class="table-responsive">
													<table class="table table-bordered table-striped" style="width: 85%;">
														<tr>
															<th>Sr.NO.</th>
															<th>File Name</th>
															<th>Action</th>
														</tr>
														<tbody>
															<?php
															$con = dbcon1();
															$query = mysqli_query($con, "SELECT * from verified_docmts where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
															$sr = 0;
															while ($row = mysqli_fetch_array($query)) {

																$sr++;
																echo "<tr>
																			<td>$sr</td>
																			<td><a href='../verified_documts/" . $_GET['ex_emp_pfno'] . "/" . $row['file_path'] . "' target='_blank'>" . $row['file_path'] . "</a></td>
																			<td ><a data-id='" . $row['id'] . "' class='btn blue btnn' data-toggle='modal' href='#basic'>Update Doc </a></td>
																			</tr>
																			";
															}
															?>
														</tbody>
													</table>
												</div>

											</div>

										</div>
									</div>



								</div>

								<div class="tab-pane" id="tab_15_3">
									<p>
										Verified Documents
									</p>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">

												<?php
												$con = dbcon1();
												$query_emp = "SELECT * from verified_docmts where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'";
												$result_emp = mysqli_query($con, $query_emp);
												$sr = 0;
												while ($value_emp = mysqli_fetch_array($result_emp)) {
													$sr++;
													echo "$sr)<a href='../verified_documts/" . $_GET['ex_emp_pfno'] . "/" . $value_emp['file_path'] . "' target='_blank'>" . $value_emp['file_path'] . "</a><br><br>";
												}
												?>
											</div>
										</div>

									</div>

								</div>
								<div class="tab-pane" id="tab_15_4">
									<?php
									if ($_GET['case'] == 2) {
									?>
										<div class="form-body">
											<!-- <h3 class="form-section">Add User</h3> -->
											<?php
											$con = dbcon1();
											$sqll = mysqli_query($con, "SELECT * from common_heading_details where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
											$resl = mysqli_fetch_array($sqll);

											?>
											<input type="hidden" name="c_h_d_missing" value="<?php echo $resl['id']; ?>">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Number</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas  fa-digital-tachograph"></i>
															</span>
															<input type="text" autofocus="true" class="form-control" id="sr_no" name="sr_no" value="<?php echo $resl['number']; ?>" style="text-transform: uppercase;">
														</div>
													</div>
												</div>
												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">P/Rect Dtd</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas  fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" style="border-radius: 30px;" id="date" value="<?php echo $resl['date']; ?>" name="date">

														</div>
													</div>
												</div>

												<!--/span-->
											</div>
											<!--/row-->
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Subject</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-pencil-alt"></i>
															</span>
															<textarea class="form-control" rows="3" name="subject"><?php echo $resl['subject']; ?></textarea>
														</div>
													</div>
												</div>

												<!--/span-->

												<!--/span-->
											</div>
											<hr style='border:1px solid blue'>

											<h4>&emsp;1)Details of Ex. Employee:</h4>
											<hr>
											<?php
											$con = dbcon2();
											$sql = mysqli_query($con, "select * from register_user where emp_no='" . $_GET['ex_emp_pfno'] . "' ");
											$res = mysqli_fetch_array($sql);

											?>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">PF Number </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="pf_num" name="pf_num" value="<?php echo $res['emp_no']; ?>" readonly>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Employee Name </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="emp_name" name="emp_name" value="<?php echo $res['name']; ?>" readonly>
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Designation </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="desig" name="desig" value="<?php echo designation($res['designation']); ?>" readonly>
														</div>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of Birth </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" id="dob" name="dob" value="<?php echo $res['dob']; ?>" readonly>
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of Appointment </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" id="doa" name="doa" value="<?php echo $res['doa']; ?>" readonly>
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of Missing </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" style="border-radius: 30px;" id="txtdom" name="txtdom" value="<?php echo $res['date_of_missing']; ?>">
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Rate of Pay </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="ropay" name="ropay" value="<?php echo $res['basic_pay']; ?>" readonly>
														</div>
													</div>
												</div>




												<!--/span-->



												<!--/span-->
											</div>
											<hr>
											<h4>&emsp;2)Composition of his Family:</h4>
											<?php
											$con = dbcon1();
											$sql = mysqli_query($con, "SELECT * from emp_family_tbl where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
											$sr = 0;
											while ($row = mysqli_fetch_array($sql)) {
												$sr++;
											?>
												<?php echo $sr . ")"; ?>
												<input type="hidden" name="count" value="<?php echo $sr; ?>">
												<input type="hidden" name="fmly_id_<?php echo $sr; ?>" value="<?php echo $row['id']; ?>">
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Nominee Name </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_name_<?php echo $sr; ?>" value="<?php echo $row['member_name']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Relation with Ex. Employee </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-users"></i>
																</span>

																<select name="m_rel_<?php echo $sr; ?>" id="m_rel_1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																	<option value="<?php echo $row['member_relation']; ?>" selected><?php echo getRelation($row['member_relation']); ?> </option>
																	<?php
																	$con = dbcon1();
																	$query_emp = mysqli_query($con, "select * from relation");

																	while ($value_emp = mysqli_fetch_array($query_emp)) {
																		echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['longdesc'] . "</option>";
																	}

																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Age at the time of Death/MU/MD</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-calendar-alt"></i>
																</span>
																<input type="text" class="form-control ddate" id="mobile" name="m_date_<?php echo $sr; ?>" value="<?php echo $row['member_dob']; ?>">
															</div>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Education Qualification</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-university"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_edu_<?php echo $sr; ?>" value="<?php echo $row['member_qualifiaction']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Maritial Status </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<!--  -->
																<select name="m_mstatus_<?php echo $sr; ?>" id="m_mstatus_1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																	<option value="<?php echo ($row['marital_status']); ?>" selected><?php echo getMaritailStatus($row['marital_status']); ?></option>
																	<?php
																	$con = dbcon2();
																	$query_emp = mysqli_query($con, "select * from marital_status");

																	while ($value_emp = mysqli_fetch_array($query_emp)) {
																		echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['shortdesc'] . "</option>";
																	}

																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Wheather Employed/Otherwise </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_employedornot_<?php echo $sr; ?>" value="<?php echo $row['employed_or_other']; ?>">
															</div>
														</div>
													</div>

												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Aadhar Number</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_aadhar_<?php echo $sr; ?>" value="<?php echo $row['member_aadharno']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">PAN NO. </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_pan_<?php echo $sr; ?>" value="<?php echo $row['member_panno']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Mobile Number </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_mob_<?php echo $sr; ?>" value="<?php echo $row['member_mobileno']; ?>">
															</div>
														</div>
													</div>
												</div>
											<?php } ?>
											<hr>
											<h4>&emsp;3)Particulars of Applicant:</h4>
											<?php
											$con = dbcon1();
											$sql = mysqli_query($con, "SELECT str_to_date(applicant_dob,'%d/%m/%Y')as dob,str_to_date(created_at,'%d-%m-%Y')as cre,applicant_registration.* from applicant_registration where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
											$result = mysqli_fetch_array($sql);
											$a_date = substr($result['created_at'], 0, 10);

											// Declare and define two dates 
											$date1 = strtotime($result['dob']);
											$date2 = strtotime($result['cre']);

											// Formulate the Difference between two dates 
											$diff = abs($date2 - $date1);
											// To get the year divide the resultant date into 
											// total seconds in a year (365*60*60*24) 
											$years = floor($diff / (365 * 60 * 60 * 24));


											// To get the month, subtract it with years and 
											// divide the resultant date into 
											// total seconds in a month (30*60*60*24) 
											$months = floor(($diff - $years * 365 * 60 * 60 * 24)
												/ (30 * 60 * 60 * 24));


											// To get the day, subtract it with years and  
											// months and divide the resultant date into 
											// total seconds in a days (60*60*24) 
											$days = floor(($diff - $years * 365 * 60 * 60 * 24 -
												$months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
											// printf("%d years, %d months, %d days", $years, $months, 
											// $days);

											?>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Name </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?php echo $result['applicant_name']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Date of Birth </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" id="applicant_dob" name="applicant_dob" value="<?php echo $result['applicant_dob']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Educational Qualification</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-university"></i>
															</span>
															<input type="text" class="form-control" id="education" name="education" value="<?php echo $result['applicant_qualifiaction']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Permanent Address</label>

														<textarea name="permanent_address" class="form-control"><?php echo $result['permanent_address']; ?></textarea>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Wheather SC/ST </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-portrait"></i>
															</span>
															<input type="text" class="form-control" id="sc_or_st" name="sc_or_st" value="<?php echo $result['caste']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Maritial Status</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>

															<select name="maritial_status" id="appl_maritial_st" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo ($result['mariatial_status']); ?>" selected><?php echo getMaritailStatus($result['mariatial_status']); ?></option>
																<?php
																$con = dbcon2();
																$query_emp = mysqli_query($con, "select * from marital_status");

																while ($value_emp = mysqli_fetch_array($query_emp)) {
																	echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['shortdesc'] . "</option>";
																}

																?>
															</select>
														</div>
													</div>
												</div>


											</div>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Aadhar Number </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="aadhar" name="aadhar" value="<?php echo $result['applicant_aadharno']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">PAN Number</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="pan" name="pan" value="<?php echo $result['applicant_panno']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Mobile Number</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-mobile-alt"></i>
															</span>
															<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $result['applicant_mobno']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Category for which eligible </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<?php
															$con = dbcon1();
															$sql = mysqli_query($con, "SELECT eligible_group from service_particulars where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
															$r = mysqli_fetch_array($sql);

															?>

															<select name="eligible" id="eligible" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo $r['eligible_group']; ?>" selected><?php echo $r['eligible_group']; ?></option>
																<!-- <option value="Group A">Group A</option>								
																<option value="Group B">Group B</option> -->
																<option value="Group C">Group C</option>
																<option value="Group D">Group D</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Relation With </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>

															<select name="app_rel" id="app_rel" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo $result['relation_with']; ?>" selected><?php echo getRelation($result['relation_with']); ?> </option>
																<?php
																$con = dbcon1();
																$query_emp = mysqli_query($con, "select * from relation");

																while ($value_emp = mysqli_fetch_array($query_emp)) {
																	echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['longdesc'] . "</option>";
																}

																?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">E-Mail </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>
															<input type="email" class="form-control" id="appl_email" name="appl_email" value="<?php echo $result['applicant_emailid']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Identification Mark 1 </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_email" name="identfi_1" value="<?php echo $result['identification_mark1']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Identification Mark2 </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_email" name="identfi_2" value="<?php echo $result['identification_mark2']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Gender</label>

														<select name="appl_gender" id="appl_gender" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
															<option value="<?php echo $result['applicant_gender']; ?>" selected><?php echo getGender($result['applicant_gender']); ?></option>
															<?php
															$con = dbcon2();
															$query_emp = mysqli_query($con, "SELECT * from gender");

															while ($value_emp = mysqli_fetch_array($query_emp)) {
																echo "<option value='" . $value_emp['id'] . "'>" . $value_emp['gender'] . "</option>";
															}

															?>

														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">SC/ST/OBC/Other</label>

														<select name="appl_caste" id="appl_caste" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
															<option value="<?php echo $result['caste']; ?>" selected><?php echo $result['caste']; ?></option>
															<option value="SC">SC</option>
															<option value="ST">ST</option>
															<option value="OBC">OBC</option>
															<option value="General(UR)">Genl.(UR)</option>
														</select>
													</div>
												</div>

											</div>

											<hr>
											<h4>&emsp;4)Financial Position of Ex. Employee:</h4>

											<?php
											$con = dbcon1();
											$ss = mysqli_query($con, "SELECT * from financial_position_of_ex_emp where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
											$rs = mysqli_fetch_array($ss);
											?>
											<input type="hidden" name="fp_id" value="<?php echo $rs['id']; ?>">
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Income from Family Pension </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="income_fp" name="income_fp" value="<?php echo $rs['income_from_fmly_pension']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Expected Incomes From Business/Any other Members of the Family </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-users"></i>
															</span>
															<input type="text" class="form-control" id="expected_income" name="expected_income" value="<?php echo $rs['expected_income']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Total Income</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="total_income" name="total_income" value="<?php echo $rs['total_income']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Details of Immovable Property </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-percent"></i>
															</span>
															<!-- <input type="text" class="form-control" id="immovable_property" name="immovable_property" placeholder="Enter Details of Immovable Property " > -->
															<textarea class="form-control" id="immovable_property" name="immovable_property"><?php echo $rs['immovable property']; ?></textarea>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Whether Ex-Employee has his Own House or Not</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-clipboard-check"></i>
															</span>
															<select name="emp_house" id="emp_house" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo $rs['his_own_houseornot']; ?>" selected><?php echo $rs['his_own_houseornot']; ?></option>
																<option value="yes">YES</option>
																<option value="no">NO</option>

															</select>
														</div>
													</div>
												</div>

											</div>

											<hr>
											<h4>&emsp;5)Details of Settlement dues paid are as Follows:</h4>
											<?php
											$con = dbcon1();
											$sql = mysqli_query($con, "SELECT * from settlement where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' and category='" . $_GET['case'] . "'");
											$res = mysqli_fetch_array($sql);
											?>
											<input type="hidden" name="s_id" value="<?php echo $res['id']; ?>">
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Provident Fund</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="provident_fund" name="provident_fund" value="<?php echo $res['provident_fund']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">DCRG</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="dcrg" name="dcrg" value="<?php echo $res['dcrg']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">NGIS Lumpsum</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="ngis_lumps" name="ngis_lumps" value="<?php echo $res['ngis_lumpsum']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">NGIS Saving Fund </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="ngis_saving_fund" name="ngis_saving_fund" value="<?php echo $res['ngis_saving_fund']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Leave Salary</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="leave_sal" name="leave_sal" value="<?php echo $res['leave_sal']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Deposite Linked Insurance</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="deposit_ins" name="deposit_ins" value="<?php echo $res['deposit_linked_inssurance']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class="row">

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Family Pension</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="family_pension" name="family_pension" value="<?php echo $res['fmly_pension']; ?>">
														</div>
													</div>
												</div>
											</div>

											<h4>&nbsp;&nbsp;06)</h4>

											<?php
											$con = dbcon1();
											$sq = mysqli_query($con, "SELECT * from fetch_category_data where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
											$sqr = mysqli_fetch_array($sq);
											?>
											<input type="hidden" name="fetch_id" value="<?php echo $sqr['id']; ?>">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="six" rows="5" class="form-control"><?php echo $sqr['06']; ?></textarea>
													</div>
												</div>
											</div>
											<h4>&nbsp;&nbsp;07)</h4>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="seven" rows="5" class="form-control"><?php echo $sqr['07']; ?></textarea>
													</div>
												</div>
											</div>
											<h4>&nbsp;&nbsp;08)</h4>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="eight" class="form-control" rows="5"><?php echo $sqr['08']; ?></textarea>
													</div>
												</div>
											</div>
											<h4>&nbsp;&nbsp;09)</h4>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="nine" rows="5" class="form-control"><?php echo $sqr['09']; ?> </textarea>
													</div>
												</div>
											</div>
											<h4>&nbsp;&nbsp;10)</h4>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="ten" rows="5" class="form-control"><?php echo $sqr['10']; ?></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea rows="5" class="form-control" name="last"><?php echo $sqr['last_common']; ?></textarea>
													</div>
												</div>
											</div>


										</div>

									<?php
									} else if ($_GET['case'] == 1) {
									?>

										<div class="form-body">
											<!-- <h3 class="form-section">Add User</h3> -->
											<?php
											$con = dbcon1();
											$sqll = mysqli_query($con, "SELECT * from common_heading_details where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
											$resl = mysqli_fetch_array($sqll);

											?>
											<input type="hidden" name="c_h_d" value="<?php echo $resl['id']; ?>">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Number</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas  fa-digital-tachograph"></i>
															</span>
															<input type="text" autofocus="true" class="form-control" id="sr_no" style="text-transform: uppercase;" name="sr_no" value="<?php echo $resl['number']; ?>">
														</div>
													</div>
												</div>
												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">P/S A Cell Dtd:-</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas  fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" style="border-radius: 30px;" id="date" value="<?php echo $resl['date']; ?>" name="date">

														</div>
													</div>
												</div>

												<!--/span-->
											</div>
											<!--/row-->
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Subject</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-pencil-alt"></i>
															</span>
															<textarea class="form-control" rows="3" name="subject"><?php echo $resl['subject']; ?></textarea>
														</div>
													</div>
												</div>

												<!--/span-->

												<!--/span-->
											</div>
											<hr style='border:1px solid blue'>

											<h4>&emsp;1)Details of Ex. Employee:</h4>
											<hr>
											<?php
											$con = dbcon2();
											$sql = mysqli_query($con, "select * from register_user where emp_no='" . $_GET['ex_emp_pfno'] . "' ");
											$res = mysqli_fetch_array($sql);

											?>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">PF Number </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="pf_num" name="pf_num" value="<?php echo $res['emp_no']; ?>" readonly>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Employee Name </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="emp_name" name="emp_name" value="<?php echo $res['name']; ?>" readonly>
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Designation </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="desig" name="desig" value="<?php echo designation($res['designation']); ?>" readonly>
														</div>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of Birth </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" id="dob" name="dob" value="<?php echo $res['dob']; ?>" readonly>
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of Appointment </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" id="doa" name="doa" value="<?php echo $res['doa']; ?>" readonly>
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of Expiry<b style="color: red;">*</b> </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" style="border-radius: 30px;" id="txtdoe" value="<?php echo $res['date_of_expiry']; ?>" name="txtdoe">
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Rate of Pay </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="ropay" name="ropay" value="<?php echo $res['basic_pay']; ?>" readonly>
														</div>
													</div>
												</div>








												<!--/span-->



												<!--/span-->
											</div>
											<hr>
											<h4>&emsp;2)Composition of his Family:</h4>
											<?php
											$con = dbcon1();
											$sql = mysqli_query($con, "SELECT * from emp_family_tbl where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
											$sr = 0;
											while ($row = mysqli_fetch_array($sql)) {
												$sr++;
											?>
												<?php echo $sr . ")"; ?>
												<input type="hidden" name="count" value="<?php echo $sr; ?>">
												<input type="hidden" name="fmly_id_<?php echo $sr; ?>" value="<?php echo $row['id']; ?>">
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Nominee Name </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_name_<?php echo $sr; ?>" value="<?php echo $row['member_name']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Relation with Ex. Employee </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-users"></i>
																</span>

																<select name="m_rel_<?php echo $sr; ?>" id="m_rel_1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																	<option value="<?php echo $row['member_relation']; ?>" selected><?php echo getRelation($row['member_relation']); ?> </option>
																	<?php
																	$con = dbcon1();
																	$query_emp = mysqli_query($con, "select * from relation");

																	while ($value_emp = mysqli_fetch_array($query_emp)) {
																		echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['longdesc'] . "</option>";
																	}

																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Age at the time of Death/MU/MD</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-calendar-alt"></i>
																</span>
																<input type="text" class="form-control ddate" id="mobile" name="m_date_<?php echo $sr; ?>" value="<?php echo $row['member_dob']; ?>">
															</div>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Education Qualification</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-university"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_edu_<?php echo $sr; ?>" value="<?php echo $row['member_qualifiaction']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Maritial Status </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<!--  -->
																<select name="m_mstatus_<?php echo $sr; ?>" id="m_mstatus_1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																	<option value="<?php echo ($row['marital_status']); ?>" selected><?php echo getMaritailStatus($row['marital_status']); ?></option>
																	<?php
																	$con = dbcon2();
																	$query_emp = mysqli_query($con, "select * from marital_status");

																	while ($value_emp = mysqli_fetch_array($query_emp)) {
																		echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['shortdesc'] . "</option>";
																	}

																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Wheather Employed/Otherwise </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_employedornot_<?php echo $sr; ?>" value="<?php echo $row['employed_or_other']; ?>">
															</div>
														</div>
													</div>

												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Aadhar Number</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_aadhar_<?php echo $sr; ?>" value="<?php echo $row['member_aadharno']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">PAN NO. </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_pan_<?php echo $sr; ?>" value="<?php echo $row['member_panno']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Mobile Number </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_mob_<?php echo $sr; ?>" value="<?php echo $row['member_mobileno']; ?>">
															</div>
														</div>
													</div>
												</div>
											<?php } ?>
											<hr>
											<h4>&emsp;3)Particulars of Applicant:</h4>
											<?php
											$con = dbcon1();
											$sql = mysqli_query($con, "SELECT str_to_date(applicant_dob,'%d/%m/%Y')as dob,str_to_date(created_at,'%d-%m-%Y')as cre,applicant_registration.* from applicant_registration where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
											$result = mysqli_fetch_array($sql);
											$a_date = substr($result['created_at'], 0, 10);

											// Declare and define two dates 
											$date1 = strtotime($result['dob']);
											$date2 = strtotime($result['cre']);

											// Formulate the Difference between two dates 
											$diff = abs($date2 - $date1);
											// To get the year divide the resultant date into 
											// total seconds in a year (365*60*60*24) 
											$years = floor($diff / (365 * 60 * 60 * 24));


											// To get the month, subtract it with years and 
											// divide the resultant date into 
											// total seconds in a month (30*60*60*24) 
											$months = floor(($diff - $years * 365 * 60 * 60 * 24)
												/ (30 * 60 * 60 * 24));


											// To get the day, subtract it with years and  
											// months and divide the resultant date into 
											// total seconds in a days (60*60*24) 
											$days = floor(($diff - $years * 365 * 60 * 60 * 24 -
												$months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
											// printf("%d years, %d months, %d days", $years, $months, 
											// $days);

											?>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Name </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?php echo $result['applicant_name']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Date of Birth </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" id="applicant_dob" name="applicant_dob" value="<?php echo $result['applicant_dob']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Educational Qualification</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-university"></i>
															</span>
															<input type="text" class="form-control" id="education" name="education" value="<?php echo $result['applicant_qualifiaction']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Permanent Address</label>

														<textarea name="permanent_address" class="form-control"><?php echo $result['permanent_address']; ?></textarea>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Wheather SC/ST </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-portrait"></i>
															</span>
															<input type="text" class="form-control" id="sc_or_st" name="sc_or_st" value="<?php echo $result['caste']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Maritial Status</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>

															<select name="maritial_status" id="appl_maritial_st" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo ($result['mariatial_status']); ?>" selected><?php echo getMaritailStatus($result['mariatial_status']); ?></option>
																<?php
																$con = dbcon2();
																$query_emp = mysqli_query($con, "select * from marital_status");

																while ($value_emp = mysqli_fetch_array($query_emp)) {
																	echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['shortdesc'] . "</option>";
																}

																?>
															</select>
														</div>
													</div>
												</div>


											</div>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Aadhar Number </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="aadhar" name="aadhar" value="<?php echo $result['applicant_aadharno']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">PAN Number</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="pan" name="pan" value="<?php echo $result['applicant_panno']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Mobile Number</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-mobile-alt"></i>
															</span>
															<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $result['applicant_mobno']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Category for which eligible </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<?php
															$con = dbcon1();
															$sql = mysqli_query($con, "SELECT eligible_group from service_particulars where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
															$r = mysqli_fetch_array($sql);

															?>

															<select name="eligible" id="eligible" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo $r['eligible_group']; ?>" selected><?php echo $r['eligible_group']; ?></option>
																<!-- <option value="Group A">Group A</option>								
																<option value="Group B">Group B</option> -->
																<option value="Group C">Group C</option>
																<option value="Group D">Group D</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Relation With </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>

															<select name="app_rel" id="app_rel" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo $result['relation_with']; ?>" selected><?php echo getRelation($result['relation_with']); ?> </option>
																<?php
																$con = dbcon1();
																$query_emp = mysqli_query($con, "select * from relation");

																while ($value_emp = mysqli_fetch_array($query_emp)) {
																	echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['longdesc'] . "</option>";
																}

																?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">E-Mail </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>
															<input type="email" class="form-control" id="appl_email" name="appl_email" value="<?php echo $result['applicant_emailid']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Identification Mark 1 </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_email" name="identfi_1" value="<?php echo $result['identification_mark1']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Identification Mark2 </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_email" name="identfi_2" value="<?php echo $result['identification_mark2']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Gender</label>

														<select name="appl_gender" id="appl_gender" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
															<option value="<?php echo $result['applicant_gender']; ?>" selected><?php echo getGender($result['applicant_gender']); ?></option>
															<?php
															$con = dbcon2();
															$query_emp = mysqli_query($con, "SELECT * from gender");

															while ($value_emp = mysqli_fetch_array($query_emp)) {
																echo "<option value='" . $value_emp['id'] . "'>" . $value_emp['gender'] . "</option>";
															}

															?>

														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">SC/ST/OBC/Other</label>

														<select name="appl_caste" id="appl_caste" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
															<option value="<?php echo $result['caste']; ?>" selected><?php echo $result['caste']; ?></option>
															<option value="SC">SC</option>
															<option value="ST">ST</option>
															<option value="OBC">OBC</option>
															<option value="General(UR)">Genl.(UR)</option>
														</select>
													</div>
												</div>

											</div>

											<hr>
											<h4>&emsp;4)Financial Position of Ex. Employee:</h4>
											<?php
											$con = dbcon1();
											$sql = mysqli_query($con, "SELECT * from financial_position_of_ex_emp where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' and category='" . $_GET['case'] . "'");
											$res = mysqli_fetch_array($sql);
											?>
											<input type="hidden" name="fp_id" value="<?php echo $res['id']; ?>">
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Income from Family Pension <b style="color: red;">*</b></label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="income_fp" name="income_fp" value="<?php echo $res['income_from_fmly_pension']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Expected Incomes From Business/Any other Members of the Family <b style="color: red;">*</b></label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-users"></i>
															</span>
															<input type="text" class="form-control" id="expected_income" name="expected_income" value="<?php echo $res['expected_income']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Total Income<b style="color: red;">*</b></label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="total_income" name="total_income" value="<?php echo $res['total_income']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Details of Immovable Property <b style="color: red;">*</b></label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-percent"></i>
															</span>
															<!-- <input type="text" class="form-control" id="immovable_property" name="immovable_property" placeholder="Enter Details of Immovable Property " > -->
															<textarea class="form-control" id="immovable_property" name="immovable_property"><?php echo $res['immovable property']; ?></textarea>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Whether Ex-Employee has his Own House or Not<b style="color: red;">*</b></label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-clipboard-check"></i>
															</span>
															<select name="emp_house" id="emp_house" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo $res['his_own_houseornot']; ?>" selected><?php echo $res['his_own_houseornot']; ?></option>
																<option value="yes">YES</option>
																<option value="no">NO</option>

															</select>
														</div>
													</div>
												</div>

											</div>

											<hr>
											<h4>&emsp;5)Details of Settlement dues paid are as Follows:</h4>
											<?php
											$con = dbcon1();
											$sql = mysqli_query($con, "SELECT * from settlement where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' and category='" . $_GET['case'] . "'");
											$res = mysqli_fetch_array($sql);
											?>
											<input type="hidden" name="s_id" value="<?php echo $res['id']; ?>">
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Provident Fund <b style="color: red;">*</b></label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="provident_fund" name="provident_fund" value="<?php echo $res['provident_fund']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">DCRG<b style="color: red;">*</b></label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="dcrg" name="dcrg" value="<?php echo $res['dcrg']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">NGIS Lumpsum<b style="color: red;">*</b></label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="ngis_lumps" name="ngis_lumps" value="<?php echo $res['ngis_lumpsum']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">NGIS Saving Fund<b style="color: red;">*</b> </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="ngis_saving_fund" name="ngis_saving_fund" value="<?php echo $res['ngis_saving_fund']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Leave Salary<b style="color: red;">*</b></label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="leave_sal" name="leave_sal" value="<?php echo $res['leave_sal']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Deposite Linked Insurance<b style="color: red;">*</b></label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="deposit_ins" name="deposit_ins" value="<?php echo $res['deposit_linked_inssurance']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class="row">

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Family Pension<b style="color: red;">*</b></label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="family_pension" name="family_pension" value="<?php echo $res['fmly_pension']; ?>">
														</div>
													</div>
												</div>
											</div>

											<h4>&nbsp;&nbsp;06)</h4>
											<?php
											$con = dbcon1();
											$sq = mysqli_query($con, "SELECT * from fetch_category_data where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
											$sqr = mysqli_fetch_array($sq);
											?>
											<input type="hidden" name="fetch_id" value="<?php echo $sqr['id']; ?>">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="six" rows="5" class="form-control"><?php echo $sqr['06']; ?> </textarea>
													</div>
												</div>
											</div>
											<h4>&nbsp;&nbsp;07)</h4>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="seven" rows="5" class="form-control"><?php echo $sqr['07']; ?></textarea>
													</div>
												</div>
											</div>
											<h4>&nbsp;&nbsp;08)</h4>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="eight" class="form-control" rows="5"><?php echo $sqr['08']; ?></textarea>
													</div>
												</div>
											</div>
											<h4>&nbsp;&nbsp;09)</h4>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="nine" rows="5" class="form-control"><?php echo $sqr['09']; ?> </textarea>
													</div>
												</div>
											</div>
											<h4>&nbsp;&nbsp;10)</h4>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="ten" rows="5" class="form-control"><?php echo $sqr['10']; ?></textarea>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="last" rows="5" class="form-control"><?php echo $sqr['last_common']; ?> </textarea>
													</div>
												</div>
											</div>


										</div>

									<?php
									} elseif ($_GET['case'] == 3) {
									?>

										<div class="form-body">
											<input type="hidden" name="category" value="<?php echo $_GET['case']; ?>">
											<input type="hidden" name="pid" value="<?php echo $_GET['id']; ?>">
											<!-- <h3 class="form-section">Add User</h3> -->
											<?php
											$con = dbcon1();
											$sqll = mysqli_query($con, "SELECT * from common_heading_details where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
											$resl1 = mysqli_fetch_array($sqll);

											?>
											<input type="hidden" name="m_idd" value="<?php echo $resl1['id'] ?>">
											<div class="row">

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Number</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas  fa-digital-tachograph"></i>
															</span>
															<input type="text" class="form-control" id="sr_no" name="sr_no" value="<?php echo $resl1['number'] ?>" style="text-transform: uppercase;" required>
														</div>
													</div>
												</div>

												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas  fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" style="border-radius: 30px;" id="" value="<?php echo $resl1['date'] ?>" name="md_app_d" required="required">

														</div>
													</div>
												</div>
												<!--/span-->
											</div>
											<!--/row-->
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Subject</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-pencil-alt"></i>
															</span>
															<textarea class="form-control" rows="3" name="subject"><?php echo $resl1['subject'] ?></textarea>
														</div>
													</div>
												</div>

												<!--/span-->

												<!--/span-->
											</div>
											<hr style='border:1px solid blue'>

											<h4>&emsp;1)Details of Ex. Employee:</h4>
											<hr>
											<?php
											$con = dbcon2();
											$sql = mysqli_query($con, "SELECT * from register_user where emp_no='" . $_GET['ex_emp_pfno'] . "' ");
											$res = mysqli_fetch_array($sql);

											?>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">PF Number </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="pf_num" name="pf_num" value="<?php echo $res['emp_no']; ?>" readonly="">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Employee Name </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="emp_name" name="emp_name" value="<?php echo $res['name']; ?>" readonly>
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Designation and Station </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="desig" name="desig" value="<?php echo designation($res['designation']) . "  (" . $res['station'] . ")"; ?>" readonly>
														</div>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of Birth </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" id="dob" name="dob" value="<?php echo $res['dob']; ?>" readonly>
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of Appointment </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" id="doa" name="doa" value="<?php echo $res['doa']; ?>" readonly>
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of normal Retirement </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control " style="border-radius: 30px;" id="date_of_nr" value="<?php //echo $res['retirementdate']; 
																																							?>" name="date_of_nr" value="" readonly="">
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of Medically decategorized </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" style="border-radius: 30px;" id="date_of_md" value="<?php echo $res['date_of_md']; ?>" name="date_of_md">
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of Voluntary Retirement </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" style="border-radius: 30px;" id="date_of_vr" value="<?php echo $res['date_of_vr']; ?>" name="date_of_vr">
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Scale & Basic Pay </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="s_b_pay" name="s_b_pay" value="<?php echo $res['basic_pay'];   ?>" placeholder="Scale & Basic Pay " readonly>
														</div>
													</div>
												</div>
												<!--/span-->
											</div>

											<hr>
											<h4>&emsp;2)Details of the Candidate:</h4>
											<?php
											$con = dbcon1();
											$sql = mysqli_query($con, "SELECT str_to_date(applicant_dob,'%d/%m/%Y')as dob,str_to_date(created_at,'%d-%m-%Y')as cre,applicant_registration.* from applicant_registration where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
											$result = mysqli_fetch_array($sql);
											$a_date = substr($result['created_at'], 0, 10);

											// Declare and define two dates 
											$date1 = strtotime($result['dob']);
											$date2 = strtotime($result['cre']);

											// Formulate the Difference between two dates 
											$diff = abs($date2 - $date1);
											// To get the year divide the resultant date into 
											// total seconds in a year (365*60*60*24) 
											$years = floor($diff / (365 * 60 * 60 * 24));


											// To get the month, subtract it with years and 
											// divide the resultant date into 
											// total seconds in a month (30*60*60*24) 
											$months = floor(($diff - $years * 365 * 60 * 60 * 24)
												/ (30 * 60 * 60 * 24));


											// To get the day, subtract it with years and  
											// months and divide the resultant date into 
											// total seconds in a days (60*60*24) 
											$days = floor(($diff - $years * 365 * 60 * 60 * 24 -
												$months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
											// printf("%d years, %d months, %d days", $years, $months, 
											// $days);

											?>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Name </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?php echo $result['applicant_name']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Date of Birth </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" id="applicant_dob" name="applicant_dob" value="<?php echo $result['applicant_dob']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Educational Qualification</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-university"></i>
															</span>
															<input type="text" class="form-control" id="education" name="education" value="<?php echo $result['applicant_qualifiaction']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Permanent Address</label>

														<textarea name="permanent_address" class="form-control"><?php echo $result['permanent_address']; ?></textarea>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Wheather SC/ST </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-portrait"></i>
															</span>
															<input type="text" class="form-control" id="sc_or_st" name="sc_or_st" value="<?php echo $result['caste']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Maritial Status</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>

															<select name="maritial_status" id="appl_maritial_st" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo ($result['mariatial_status']); ?>" selected><?php echo getMaritailStatus($result['mariatial_status']); ?></option>
																<?php
																$con = dbcon2();
																$query_emp = mysqli_query($con, "select * from marital_status");

																while ($value_emp = mysqli_fetch_array($query_emp)) {
																	echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['shortdesc'] . "</option>";
																}

																?>
															</select>
														</div>
													</div>
												</div>


											</div>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Aadhar Number </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="aadhar" name="aadhar" value="<?php echo $result['applicant_aadharno']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">PAN Number</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="pan" name="pan" value="<?php echo $result['applicant_panno']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Mobile Number</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-mobile-alt"></i>
															</span>
															<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $result['applicant_mobno']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Category for which eligible </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<?php
															$con = dbcon1();
															$sql = mysqli_query($con, "SELECT eligible_group from service_particulars where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
															$r = mysqli_fetch_array($sql);

															?>

															<select name="eligible" id="eligible" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo $r['eligible_group']; ?>" selected><?php echo $r['eligible_group']; ?></option>
																<!-- <option value="Group A">Group A</option>								
																<option value="Group B">Group B</option> -->
																<option value="Group C">Group C</option>
																<option value="Group D">Group D</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Relation With </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>

															<select name="app_rel" id="app_rel" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo $result['relation_with']; ?>" selected><?php echo getRelation($result['relation_with']); ?> </option>
																<?php
																$con = dbcon1();
																$query_emp = mysqli_query($con, "select * from relation");

																while ($value_emp = mysqli_fetch_array($query_emp)) {
																	echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['longdesc'] . "</option>";
																}

																?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">E-Mail </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>
															<input type="email" class="form-control" id="appl_email" name="appl_email" value="<?php echo $result['applicant_emailid']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Identification Mark 1 </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_email" name="identfi_1" value="<?php echo $result['identification_mark1']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Identification Mark2 </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_email" name="identfi_2" value="<?php echo $result['identification_mark2']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Gender</label>

														<select name="appl_gender" id="appl_gender" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
															<option value="<?php echo $result['applicant_gender']; ?>" selected><?php echo getGender($result['applicant_gender']); ?></option>
															<?php
															$con = dbcon2();
															$query_emp = mysqli_query($con, "SELECT * from gender");

															while ($value_emp = mysqli_fetch_array($query_emp)) {
																echo "<option value='" . $value_emp['id'] . "'>" . $value_emp['gender'] . "</option>";
															}

															?>
														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">SC/ST/OBC/Other</label>

														<select name="appl_caste" id="appl_caste" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
															<option value="<?php echo $result['caste']; ?>" selected><?php echo $result['caste']; ?></option>
															<option value="SC">SC</option>
															<option value="ST">ST</option>
															<option value="OBC">OBC</option>
															<option value="General(UR)">Genl.(UR)</option>
														</select>
													</div>
												</div>

											</div>


											<hr>
											<h4>&emsp;3)Details of All the Members of Family:</h4>
											<?php
											$con = dbcon1();
											$sql = mysqli_query($con, "SELECT * from emp_family_tbl where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
											$sr = 0;
											while ($row = mysqli_fetch_array($sql)) {
												$sr++;
											?>
												<?php echo $sr . ")"; ?>
												<input type="hidden" name="count" value="<?php echo $sr; ?>">
												<input type="hidden" name="fmly_id_<?php echo $sr; ?>" value="<?php echo $row['id']; ?>">
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Nominee Name </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_name_<?php echo $sr; ?>" value="<?php echo $row['member_name']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Relation with Ex. Employee </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-users"></i>
																</span>

																<select name="m_rel_<?php echo $sr; ?>" id="m_rel_1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																	<option value="<?php echo $row['member_relation']; ?>" selected><?php echo getRelation($row['member_relation']); ?> </option>
																	<?php
																	$con = dbcon1();
																	$query_emp = mysqli_query($con, "select * from relation");

																	while ($value_emp = mysqli_fetch_array($query_emp)) {
																		echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['longdesc'] . "</option>";
																	}

																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Age at the time of Death/MU/MD</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-calendar-alt"></i>
																</span>
																<input type="text" class="form-control ddate" id="mobile" name="m_date_<?php echo $sr; ?>" value="<?php echo $row['member_dob']; ?>">
															</div>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Education Qualification</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-university"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_edu_<?php echo $sr; ?>" value="<?php echo $row['member_qualifiaction']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Maritial Status </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<!--  -->
																<select name="m_mstatus_<?php echo $sr; ?>" id="m_mstatus_1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																	<option value="<?php echo ($row['marital_status']); ?>" selected><?php echo getMaritailStatus($row['marital_status']); ?></option>
																	<?php
																	$con = dbcon2();
																	$query_emp = mysqli_query($con, "select * from marital_status");

																	while ($value_emp = mysqli_fetch_array($query_emp)) {
																		echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['shortdesc'] . "</option>";
																	}

																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Wheather Employed/Otherwise </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_employedornot_<?php echo $sr; ?>" value="<?php echo $row['employed_or_other']; ?>">
															</div>
														</div>
													</div>

												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Aadhar Number</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_aadhar_<?php echo $sr; ?>" value="<?php echo $row['member_aadharno']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">PAN NO. </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_pan_<?php echo $sr; ?>" value="<?php echo $row['member_panno']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Mobile Number </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_mob_<?php echo $sr; ?>" value="<?php echo $row['member_mobileno']; ?>">
															</div>
														</div>
													</div>
												</div>
											<?php } ?>
											<hr>
											<?php
											$con = dbcon1();
											$dsql = mysqli_query($con, "SELECT * from medicalcase_form where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
											$dres = mysqli_fetch_array($dsql);
											?>
											<input type="hidden" name="idd" value="<?php echo $dres['id']; ?>">
											<div class="row">
												<div class="col-md-4">
													<label class="control-label">Past record of ex-employee:</label>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">a) i)Rewards generated:</label>
														<input type="text" class="form-control" id="ai" name="ai" value="<?php echo $dres['a_i']; ?>">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">a) ii)Penalties imposed:</label>
														<input type="text" class="form-control" id="aii" name="aii" value="<?php echo $dres['a_ii']; ?>">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">a) iii)Working report/APAR:</label>
														<input type="text" class="form-control" id="aiii" name="aiii" value="<?php echo $dres['a_iii']; ?>">
													</div>
												</div>

											</div>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<label class="control-label">b)</label>
														<textarea class="form-control" rows="5" name="b"><?php echo $dres['b']; ?></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<label class="control-label">c)</label>
														<textarea class="form-control" rows="5" name="c"><?php echo $dres['c']; ?></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<label class="control-label">vii</label>
														<textarea class="form-control" rows="5" name="vii"><?php echo $dres['vii']; ?></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<!-- <label class="control-label"></label> -->
														<textarea class="form-control" rows="5" name="last_common_details"><?php echo $dres['last_common_details']; ?></textarea>
													</div>
												</div>
											</div>
										</div>
									<?php
									} else if ($_GET['case'] == 4) {
									?>
										<div class="form-body">
											<!-- <h3 class="form-section">Add User</h3> -->
											<?php
											$con = dbcon1();
											$sqll = mysqli_query($con, "SELECT * from common_heading_details where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
											$resl2 = mysqli_fetch_array($sqll);

											?>
											<input type="hidden" name="mi_idd" value="<?php echo $resl2['id'] ?>">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Number</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas  fa-digital-tachograph"></i>
															</span>
															<input type="text" autofocus="true" class="form-control" id="sr_no" name="sr_no" value="<?php echo $resl2['number']; ?>" style="text-transform: uppercase;">
														</div>
													</div>
												</div>
												<!--/span-->
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">P/Rect Dtd:-</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas  fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" style="border-radius: 30px;" id="date" value="<?php echo $resl2['date']; ?>" name="date">

														</div>
													</div>
												</div>

												<!--/span-->
											</div>
											<!--/row-->
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Subject</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-pencil-alt"></i>
															</span>
															<textarea class="form-control" rows="3" name="subject"><?php echo $resl2['subject']; ?></textarea>
														</div>
													</div>
												</div>

												<!--/span-->

												<!--/span-->
											</div>
											<hr style='border:1px solid blue'>

											<h4>&emsp;1)Details of Ex. Employee:</h4>
											<hr>
											<?php
											$con = dbcon2();
											$sql = mysqli_query($con, "select * from register_user where emp_no='" . $_GET['ex_emp_pfno'] . "' ");
											$res = mysqli_fetch_array($sql);

											?>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">PF Number </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="pf_num" name="pf_num" value="<?php echo $res['emp_no']; ?>" readonly>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Employee Name </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="emp_name" name="emp_name" value="<?php echo $res['name']; ?>" readonly>
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Designation </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="desig" name="desig" value="<?php echo designation($res['designation']); ?>" readonly>
														</div>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of Birth </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" id="dob" name="dob" value="<?php echo $res['dob']; ?>" readonly>
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of Appointment </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control" id="doa" name="doa" value="<?php echo $res['doa']; ?>" readonly>
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of Med Decat</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" style="border-radius: 30px;" id="vtxtdomd" name="vtxtdomd" value="<?php echo $res['date_of_med_decat'] ?>">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Date Of Retd</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" style="border-radius: 30px;" id="txtdor" name="txtdor" value="<?php echo $res['date_of_retd'] ?>">
														</div>
													</div>
												</div>


												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">Rate of Pay </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="ropay" name="ropay" value="<?php echo $res['basic_pay']; ?>" readonly>
														</div>
													</div>
												</div>
												<!--/span-->
												<!--/span-->
											</div>
											<hr>
											<h4>&emsp;2)Composition of his Family:</h4>
											<?php
											$con = dbcon1();
											$sql = mysqli_query($con, "SELECT * from emp_family_tbl where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
											$sr = 0;
											while ($row = mysqli_fetch_array($sql)) {
												$sr++;
											?>
												<?php echo $sr . ")"; ?>
												<input type="hidden" name="count" value="<?php echo $sr; ?>">
												<input type="hidden" name="fmly_id_<?php echo $sr; ?>" value="<?php echo $row['id']; ?>">
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Nominee Name </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_name_<?php echo $sr; ?>" value="<?php echo $row['member_name']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Relation with Ex. Employee </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-users"></i>
																</span>

																<select name="m_rel_<?php echo $sr; ?>" id="m_rel_1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																	<option value="<?php echo $row['member_relation']; ?>" selected><?php echo getRelation($row['member_relation']); ?> </option>
																	<?php
																	$con = dbcon1();
																	$query_emp = mysqli_query($con, "select * from relation");

																	while ($value_emp = mysqli_fetch_array($query_emp)) {
																		echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['longdesc'] . "</option>";
																	}

																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Age at the time of Death/MU/MD</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-calendar-alt"></i>
																</span>
																<input type="text" class="form-control ddate" id="mobile" name="m_date_<?php echo $sr; ?>" value="<?php echo $row['member_dob']; ?>">
															</div>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Education Qualification</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-university"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_edu_<?php echo $sr; ?>" value="<?php echo $row['member_qualifiaction']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Maritial Status </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<!--  -->
																<select name="m_mstatus_<?php echo $sr; ?>" id="m_mstatus_1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																	<option value="<?php echo ($row['marital_status']); ?>" selected><?php echo getMaritailStatus($row['marital_status']); ?></option>
																	<?php
																	$con = dbcon2();
																	$query_emp = mysqli_query($con, "select * from marital_status");

																	while ($value_emp = mysqli_fetch_array($query_emp)) {
																		echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['shortdesc'] . "</option>";
																	}

																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Wheather Employed/Otherwise </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_employedornot_<?php echo $sr; ?>" value="<?php echo $row['employed_or_other']; ?>">
															</div>
														</div>
													</div>

												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Aadhar Number</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_aadhar_<?php echo $sr; ?>" value="<?php echo $row['member_aadharno']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">PAN NO. </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_pan_<?php echo $sr; ?>" value="<?php echo $row['member_panno']; ?>">
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">Mobile Number </label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fas fa-user"></i>
																</span>
																<input type="text" class="form-control" id="mobile" name="m_mob_<?php echo $sr; ?>" value="<?php echo $row['member_mobileno']; ?>">
															</div>
														</div>
													</div>
												</div>
											<?php } ?>
											<hr>
											<h4>&emsp;3)Particulars of Applicant:</h4>
											<?php
											$con = dbcon1();
											$sql = mysqli_query($con, "SELECT str_to_date(applicant_dob,'%d/%m/%Y')as dob,str_to_date(created_at,'%d-%m-%Y')as cre,applicant_registration.* from applicant_registration where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
											$result = mysqli_fetch_array($sql);
											$a_date = substr($result['created_at'], 0, 10);

											// Declare and define two dates 
											$date1 = strtotime($result['dob']);
											$date2 = strtotime($result['cre']);

											// Formulate the Difference between two dates 
											$diff = abs($date2 - $date1);
											// To get the year divide the resultant date into 
											// total seconds in a year (365*60*60*24) 
											$years = floor($diff / (365 * 60 * 60 * 24));


											// To get the month, subtract it with years and 
											// divide the resultant date into 
											// total seconds in a month (30*60*60*24) 
											$months = floor(($diff - $years * 365 * 60 * 60 * 24)
												/ (30 * 60 * 60 * 24));


											// To get the day, subtract it with years and  
											// months and divide the resultant date into 
											// total seconds in a days (60*60*24) 
											$days = floor(($diff - $years * 365 * 60 * 60 * 24 -
												$months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
											// printf("%d years, %d months, %d days", $years, $months, 
											// $days);

											?>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Name </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-user"></i>
															</span>
															<input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?php echo $result['applicant_name']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Date of Birth </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" id="applicant_dob" name="applicant_dob" value="<?php echo $result['applicant_dob']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Educational Qualification</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-university"></i>
															</span>
															<input type="text" class="form-control" id="education" name="education" value="<?php echo $result['applicant_qualifiaction']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Permanent Address</label>

														<textarea name="permanent_address" class="form-control"><?php echo $result['permanent_address']; ?></textarea>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Wheather SC/ST </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-portrait"></i>
															</span>
															<input type="text" class="form-control" id="sc_or_st" name="sc_or_st" value="<?php echo $result['caste']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Maritial Status</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>

															<select name="maritial_status" id="appl_maritial_st" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo ($result['mariatial_status']); ?>" selected><?php echo getMaritailStatus($result['mariatial_status']); ?></option>
																<?php
																$con = dbcon2();
																$query_emp = mysqli_query($con, "select * from marital_status");

																while ($value_emp = mysqli_fetch_array($query_emp)) {
																	echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['shortdesc'] . "</option>";
																}

																?>
															</select>
														</div>
													</div>
												</div>


											</div>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Aadhar Number </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="aadhar" name="aadhar" value="<?php echo $result['applicant_aadharno']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">PAN Number</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<input type="text" class="form-control" id="pan" name="pan" value="<?php echo $result['applicant_panno']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Mobile Number</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-mobile-alt"></i>
															</span>
															<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $result['applicant_mobno']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Category for which eligible </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-id-card"></i>
															</span>
															<?php
															$con = dbcon1();
															$sql = mysqli_query($con, "SELECT eligible_group from service_particulars where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
															$r = mysqli_fetch_array($sql);

															?>

															<select name="eligible" id="eligible" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo $r['eligible_group']; ?>" selected><?php echo $r['eligible_group']; ?></option>
																<!-- <option value="Group A">Group A</option>								
																<option value="Group B">Group B</option> -->
																<option value="Group C">Group C</option>
																<option value="Group D">Group D</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Relation With </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>

															<select name="app_rel" id="app_rel" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo $result['relation_with']; ?>" selected><?php echo getRelation($result['relation_with']); ?> </option>
																<?php
																$con = dbcon1();
																$query_emp = mysqli_query($con, "select * from relation");

																while ($value_emp = mysqli_fetch_array($query_emp)) {
																	echo "<option value='" . $value_emp['code'] . "'>" . $value_emp['longdesc'] . "</option>";
																}

																?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">E-Mail </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>
															<input type="email" class="form-control" id="appl_email" name="appl_email" value="<?php echo $result['applicant_emailid']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Identification Mark 1 </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_email" name="identfi_1" value="<?php echo $result['identification_mark1']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Identification Mark2 </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_email" name="identfi_2" value="<?php echo $result['identification_mark2']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Gender</label>

														<select name="appl_gender" id="appl_gender" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
															<option value="<?php echo $result['applicant_gender']; ?>" selected><?php echo getGender($result['applicant_gender']); ?></option>

															<?php
															$con = dbcon2();
															$query_emp = mysqli_query($con, "SELECT * from gender");

															while ($value_emp = mysqli_fetch_array($query_emp)) {
																echo "<option value='" . $value_emp['id'] . "'>" . $value_emp['gender'] . "</option>";
															}

															?>


														</select>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">SC/ST/OBC/Other</label>

														<select name="appl_caste" id="appl_caste" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
															<option value="<?php echo $result['caste']; ?>" selected><?php echo $result['caste']; ?></option>
															<option value="SC">SC</option>
															<option value="ST">ST</option>
															<option value="OBC">OBC</option>
															<option value="General(UR)">Genl.(UR)</option>
														</select>
													</div>
												</div>

											</div>
											<hr>
											<h4>&emsp;4)Financial Position of Ex. Employee:</h4>

											<?php
											$con = dbcon1();
											$ss = mysqli_query($con, "SELECT * from financial_position_of_ex_emp where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
											$rs = mysqli_fetch_array($ss);
											?>
											<input type="hidden" name="fp_id" value="<?php echo $rs['id']; ?>">
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Income from Family Pension </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="income_fp" name="income_fp" value="<?php echo $rs['income_from_fmly_pension']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Expected Incomes From Business/Any other Members of the Family </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-users"></i>
															</span>
															<input type="text" class="form-control" id="expected_income" name="expected_income" value="<?php echo $rs['expected_income']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Total Income</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="total_income" name="total_income" value="<?php echo $rs['total_income']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Details of Immovable Property </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-percent"></i>
															</span>

															<textarea class="form-control" id="immovable_property" name="immovable_property"><?php echo $rs['immovable property']; ?></textarea>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Whether Ex-Employee has his Own House or Not</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-clipboard-check"></i>
															</span>
															<select name="emp_house" id="emp_house" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true">
																<option value="<?php echo $rs['his_own_houseornot']; ?>" selected><?php echo $rs['his_own_houseornot']; ?></option>
																<option value="yes">YES</option>
																<option value="no">NO</option>

															</select>
														</div>
													</div>
												</div>

											</div>
											<hr>
											<h4>&emsp;5)Details of Settlement dues paid are as Follows:</h4>
											<?php
											$con = dbcon1();
											$sql = mysqli_query($con, "SELECT * from settlement where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' and category='" . $_GET['case'] . "'");
											$res = mysqli_fetch_array($sql);
											?>
											<input type="hidden" name="s_id" value="<?php echo $res['id']; ?>">
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Provident Fund</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="provident_fund" name="provident_fund" value="<?php echo $res['provident_fund']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">DCRG</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="dcrg" name="dcrg" value="<?php echo $res['dcrg']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">NGIS Lumpsum</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="ngis_lumps" name="ngis_lumps" value="<?php echo $res['ngis_lumpsum']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class='row'>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">NGIS Saving Fund </label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="ngis_saving_fund" name="ngis_saving_fund" value="<?php echo $res['ngis_lumpsum']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Leave Salary</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="leave_sal" name="leave_sal" value="<?php echo $res['leave_sal']; ?>">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Deposite Linked Insurance</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="deposit_ins" name="deposit_ins" value="<?php echo $res['deposit_linked_inssurance']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class="row">

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Family Pension</label>
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fas fa-rupee-sign"></i>
															</span>
															<input type="text" class="form-control" id="family_pension" name="family_pension" value="<?php echo $res['fmly_pension']; ?>">
														</div>
													</div>
												</div>
											</div>

											<h4>&nbsp;&nbsp;06)</h4>
											<?php
											$con = dbcon1();
											$sq = mysqli_query($con, "SELECT * from fetch_category_data where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
											$mmsq = mysqli_fetch_array($sq);
											?>
											<input type="hidden" name="ids" value="<?php echo $mmsq['id']; ?>">
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="six" rows="5" class="form-control"><?php echo $mmsq['06']; ?>   </textarea>
													</div>
												</div>
											</div>
											<h4>&nbsp;&nbsp;07)</h4>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="seven" rows="5" class="form-control"><?php echo $mmsq['07']; ?></textarea>
													</div>
												</div>
											</div>
											<h4>&nbsp;&nbsp;08)</h4>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="eight" class="form-control" rows="5"><?php echo $mmsq['08']; ?></textarea>
													</div>
												</div>
											</div>
											<h4>&nbsp;&nbsp;09)</h4>
											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="nine" rows="5" class="form-control"><?php echo $mmsq['09']; ?> </textarea>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-8">
													<div class="form-group">
														<textarea name="last_common" rows="5" class="form-control"><?php echo $mmsq['last_common']; ?></textarea>
													</div>
												</div>
											</div>


										</div>



									<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>

					<div class="form-actions right">
						<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'>Update </button>

						&nbsp;
						<!-- <button onclick="print_button()" class="btn green btnhide">Print</button> -->
						<button type="button" class="btn default" onclick="history.go(-1);">Cancel</button>
					</div>

			</div>
			</form>



		</div>


	</div>
</div>
</div>
<?php
include 'common/footer.php';
?>

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="control/adminProcess.php?action=update_Doc" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Forward To </h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="ex_emp_pfno" name="ex_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>">
					<input type="text" id="tble_id" name="tble_id" value="">
					<!-- <input type="hidden" id="username" name="username" value="<?php echo $_GET['username']; ?>"> -->
					<!-- <input type="hidden" id="fw_tbl_id" name="fw_tbl_id" value="<?php echo $_GET['id']; ?>"> -->

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Upload Verified Documents / Files<span style="color:red;">*</span> <small style="color:red;">documents(in pdf format)</small> </label>
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
									</span>
									<input type="file" multiple="multiple" class="form-control" id="file" name="file" accept="application/pdf" placeholder=" ">
								</div><br>
								<button type="submit" class="btn blue">Update</button>
							</div>
						</div>


					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn blue">Save changes</button> -->
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<script>
	//verified docmt id...
	$(document).on('click', '.btnn', function() {
		var id = $(this).attr("data-id");
		alert(id);
		$("#tble_id").val(id);
	});

	//wi tab in that dates common id..
	$(function() {

		$('.appl_dob').datepicker({
			format: 'dd/mm/yyyy',
			autoclose: true
		});

	});

	//missing case date common class id..
	$(function() {

		$('.ddate').datepicker({
			autoclose: true,
			format: 'dd/mm/yyyy'
		});
	});


	//Print..
	function print_button() {
		$(".main-footer").hide();

		$(".btnboom").hide();
		$(".right").hide();
		$(".print3").show();
		$(".btnhide").hide();
		//$(".btnz").attr("border","0");
		$(".btnz").css("border", "0");
		window.print();


		window.location.reload();
	}
</script>