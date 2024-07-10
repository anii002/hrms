<?php
$GLOBALS['flag'] = "1.4";
include('common/header.php');
include('common/sidebar.php');

$con=dbcon1();
$con=dbcon2();
$sqll = mysqli_query($con,"SELECT applicant_name,designation,station from drmpsurh_cga.applicant_registration,drmpsurh_sur_railway.register_user where register_user.emp_no=applicant_registration.ex_emp_pfno and ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
$ser = mysqli_fetch_array($sqll);

$name = $ser['applicant_name'];
$desig = designation($ser['designation']);
$staion = $ser['station'];
?>

<div class="page-content-wrapper">
	<div class="page-content">


		<!-- <h1>ecefce</h1> -->


		<!-- <h1>ecefce</h1> -->
		<div class="portlet box blue btnz">
			<div class="portlet-title">
				<div class="caption btnboom">
					<i class="fa fa-book"></i> Pending Application Form
				</div>
			</div>

			<div class="portlet-body form">
				<form action="control/adminProcess.php?action=deathData_ins" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
					<input type="hidden" name="category" value="<?php echo $_GET['case']; ?>">
					<input type="hidden" name="pid" value="<?php echo $_GET['id']; ?>">
					<div class="form-body">

						<div class="tabbable-line ">
							<ul class="nav nav-tabs btnboom">
								<li class="active">
									<a href="#tab_15_1" data-toggle="tab">
										wi form report </a>
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

									<div class="" id="info1" style="border-top:px solid black;padding:10px;">
										<div class="row text-center">
											<label class="" style="font-size:16px;margin-top:25px;"><b>Central Railway</b></label>
										</div>
										<div class="row">
											<label align="right" style="font-size:14px;margin-left:80%;margin-top:25px;"><b>PHOTO</b></label>
										</div><br><br>
										<div class="row">
											<label align="left" style="font-size:16px;margin-left:20px;">Investigation Report to be submitted by the Staff & Welfare Inspector in connection with appointment of candidates on compassionate grounds.</label>
										</div>
										<div class="row text-center">
											<label class="" style="font-size:16px"><b>********</b></label>
										</div>
										<div class="row">
											<label align="left" style="font-size:16px;margin-left:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shri / Smt........................has submitted an application seeking appointment to her / her..........in group `C` / `D` on compassionate grounds against the death / Medical unfit of his / her.......The family of the deceased has been contacted on........</label>
										</div><br>
										<div class="row">
											<label align="left" style="font-size:16px;margin-left:20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The particular in detail of the ex employee, his family and the candidate for whom appointment on compassionate ground is sought have since been investigated and details are as under:- </label>
										</div><br>
										<div class="row">
											<label class="" align="left" style="font-size:16px;margin-left:20px;"><b>PRIORITY NUMBER: | / || / |||</b></label>
										</div>
										<div class="row">
											<label class="" align="left" style="font-size:16px;margin-left:20px;"><b>(A) SERVICE PARTICULAR OF THE DECEASED / MEDICALLY DECALLY / UNFIT / MISSING EMPLOYEE.</b></label>
										</div>
									</div>

									<div class="row">
										<div style="margin-left: 25px" class="table-responsive">
											<table border="1" style="width: 85%;">
												<tbody>
													<?php
													$con=dbcon2();
													$sql = mysqli_query($con,"SELECT * from drmpsurh_sur_railway.register_user where emp_no='" . $_GET['ex_emp_pfno'] . "' ");
													$res = mysqli_fetch_array($sql);
													$con=dbcon1();
													$sql1 = mysqli_query($con,"SELECT * from service_particulars where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
													$res1 = mysqli_fetch_array($sql1);
													?>
													<tr>
														<td style="width: 30px;">1</td>
														<td style="width: 323px;">Name of the Employee</td>
														<td>:<?php echo $res['name']; ?></td>
													</tr>
													<tr>
														<td>2</td>
														<td>Whether belongs to SC/ST/OBC</td>
														<td>:<?php //echo $res['']; 
																?></td>
													</tr>
													<tr>
														<td>3</td>
														<td>Design & place of last working</td>
														<td>:<?php echo designation($res['designation']) . " &  (" . $res['station'] . ")"; ?></td>
													</tr>
													<tr>
														<td>4</td>
														<td>Scale & rate of pay</td>
														<td>:<?php  //echo "(".getScaleCode($res['scalecode']).") & "; echo $res['basic_pay'];
																echo $res['basic_pay'];  ?></td>
													</tr>
													<tr>
														<td>5</td>
														<td>Date of Birth</td>
														<td>:<?php echo $res['dob']; ?></td>
													</tr>
													<tr>
														<td>6</td>
														<td>Date of Appointment<br>(Note:copy of the service certificate has to be enclosed in support of the information against item 1 to 6 )</td>
														<td>:<?php echo $res['doa']; ?></td>
													</tr>
													<tr>
														<td>7</td>
														<td>Date of death/medical decategorised /medically unfit/missing</td>
														<td>:<?php

																if ($_GET['case'] == 1) {
																	echo $res['date_of_expiry'];
																} else if ($_GET['case'] == 2) {
																	echo $res['date_of_missing'];
																} else if ($_GET['case'] == 3) {
																	echo $res['date_of_md'] . "&nbsp;&nbsp;&nbsp;&nbsp;";
																	echo $res['date_of_vr'];
																} elseif ($_GET['case'] == 4) {
																	echo $res['date_of_med_decat'] . "&nbsp;&nbsp;&nbsp;&nbsp;";
																	echo $res['date_of_retd'];
																}
																?></td>
													</tr>
													<tr>
														<td>8</td>
														<td>Whether death is due to accident on duty, if so, particulars of compensation paid.</td>
														<td>:<?php echo $res1['death_is_dueto_accident_on_duty']; ?></td>

													</tr>
													<tr>
														<td>9</td>
														<td>Priority no. under which the case falls</td>
														<td>:<?php echo $res1['priority_no']; ?></td>
													</tr>
													<tr>
														<td>10</td>
														<td>Cause of death /reason for medical unfitness /decategorisation</td>
														<td>:<?php echo $res1['cause_of_death/reason']; ?></td>
													</tr>
													<tr>
														<td>11</td>
														<td>The period of sickness in case of medical unfit / decategorisation</td>
														<td>:<?php echo $res1['period_sickness']; ?></td>
													</tr>
													<tr>
														<td>12</td>
														<td>Total service</td>
														<td>:<?php echo $res1['total_service']; ?></td>
													</tr>

												</tbody>
											</table>
										</div>
									</div>
									<div class="row">
										<label align="right" style="font-size:12px;margin-left:80%;margin-top:25px;"><b>Cont 2</b></label>
									</div>
									<div id="info2">
										<div class="row" style="border-top:0;page-break-before:always;">


											<div class="col-md-12">
												<p>Name of applicant: <?php echo $name ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh/Lt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design: <?php echo $desig; ?></p>
												<p>Place of Working: <?php echo $staion; ?> </p>
												<!-- <p class="text-center"></p>
											<p style="float: right;"></p> -->

											</div>


											<div class="row text-center text-center">
												<label style="font-size:16px;margin-left:30px;">-2-</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div style="margin-left: 25px" class="table-responsive">
											<table border="1" style="width: 85%;">
												<tbody>
													<?php
													$con=dbcon1();
													$sql = mysqli_query($con,"SELECT * from service_particulars where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
													$res = mysqli_fetch_array($sql);
													?>
													<tr>
														<td style="width: 30px;">13</td>
														<td style="width: 323px;">Date on which the alternative job offered (furnish Design/deptt & scale of the alternative post enclose copy of the alternative appointment).</td>
														<td>:<?php echo $res['alter_job_offered']; ?></td>
													</tr>
													<tr>
														<td>14</td>
														<td>Whether alternative appointment on same emolument offered or otherwise</td>
														<td>:<?php echo $res['alter_apptmt_emolumt_offered']; ?></td>
													</tr>
													<tr>
														<td rowspan="6">15</td>
														<td>Emoluments the employee has been drawing before decategorisation & BP also the post offered on alternative appointment.</td>
														<td>
															<p style="text-align: center;width: 50%;float: left;">Before</p>
															<p style="text-align: center;width: 50%;float: right;">After</p>
														</td>
													</tr>
													<tr class="borderright">
														<td style="text-align: right;">BP:</td>
														<td>
															<h5 class="bderright" style="width: 47%;float: left;text-align: center;" name="before_bp"><?php echo $res['before_bp']; ?></h5>
															<h5 name="after_bp" style="text-align: center;"><?php echo $res['after_bp']; ?></h5>
														</td>
														<!-- <td></td> -->
													</tr>
													<tr class="borderright">
														<td style="text-align: right;">DA:</td>
														<td>
															<h5 class="bderright" style="width: 47%;float: left;text-align: center;" name="before_bp"><?php echo $res['before_da']; ?></h5>
															<h5 name="after_bp" style="text-align: center;"><?php echo $res['after_da']; ?></h5>
														</td>
														<!-- <td></td> -->
													</tr>
													<tr class="borderright">
														<td style="text-align: right;">HRA:</td>
														<td>
															<h5 class="bderright" style="width: 47%;float: left;text-align: center;" name="before_bp"><?php echo $res['before_hra']; ?></h5>
															<h5 name="after_bp" style="text-align: center;"><?php echo $res['after_hra']; ?></h5>
														</td>
														<!-- <td></td> -->
													</tr>
													<tr class="borderright">
														<td style="text-align: right;">CCA:</td>
														<td>
															<h5 class="bderright" style="width: 47%;float: left;text-align: center;" name="before_bp"><?php echo $res['before_cca']; ?></h5>
															<h5 name="after_bp" style="text-align: center;"><?php echo $res['after_cca']; ?></h5>
														</td>
														<!-- <td></td> -->
													</tr>
													<tr class="borderright">
														<td style="text-align: right;">OTHERS:</td>
														<td>
															<h5 class="bderright" style="width: 47%;float: left;text-align: center;" name="before_bp"><?php echo $res['before_others']; ?></h5>
															<h5 name="after_bp" style="text-align: center;"><?php echo $res['after_others']; ?></h5>
														</td>
														<!-- <td></td> -->
													</tr>
													<tr>
														<td>16</td>
														<td>Is there drop in emolument ,percentage of drop on alternative appointment.</td>
														<td>:<?php echo $res['drop_in_emolumt']; ?></td>
													</tr>
													<tr>
														<td>17</td>
														<td>Reasons if any, for not accepting the altenative appointment (Encl copy of refusal)</td>
														<td>:<?php echo $res['not_accepting_alter_appmt']; ?></td>
													</tr>
													<tr>
														<td>18</td>
														<td>Date on which the service terminated / compulsory retd. due to non_acceptance of alternative appt OR retired without waiting for alternative appt (Encl copy of office order)</td>
														<td>:<?php echo $res['service_trminated/compulsory_retd']; ?></td>
													</tr>
													<tr>
														<td rowspan="8">19</td>
														<td>Settlement dues paid</td>
														<?php
														$sql = mysqli_query($con,"SELECT * from wi_settlement where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
														$res = mysqli_fetch_array($sql);
														?>
														<td></td>
													</tr>
													<tr>
														<td align="right">PF:</td>
														<td>Rs.<?php echo $res['pf']; ?></td>
													</tr>
													<tr>
														<td align="right">DCRG:</td>
														<td>Rs.<?php echo $res['dcrg']; ?></td>
													</tr>
													<tr>
														<td align="right">GIS:</td>
														<td>Rs.<?php echo $res['gis']; ?></td>
													</tr>
													<tr>
														<td align="right">IL:</td>
														<td>Rs.<?php echo $res['il']; ?></td>
													</tr>
													<tr>
														<td align="right">LE:</td>
														<td>Rs.<?php echo $res['le']; ?></td>
													</tr>
													<tr>
														<td align="right">Compensation in regard to WCA:</td>
														<td>Rs.<?php echo $res['wca']; ?></td>
													</tr>
													<tr>
														<td align="right">Others:</td>
														<td>Rs.<?php echo $res['others']; ?></td>
													</tr>
													<tr>
														<td>20</td>
														<td>Pension /family pension sanction with relief</td>
														<td>Rs.<?php echo $res['family_pension']; ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="row">
										<label align="right" style="font-size:12px;margin-left:80%;margin-top:25px;"><b>Cont 3</b></label>
									</div>
									<div id="info2">
										<div class="row" style="border-top:0;page-break-before:always;">
											<div class="col-md-12">
												<p>Name of applicant: <?php echo $name ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh/Lt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design: <?php echo $desig; ?></p>
												<p>Place of Working: <?php echo $staion; ?> </p>
												<!-- <p class="text-center"></p>
											<p style="float: right;"></p> -->

											</div>
											<div class="row text-center">
												<label style="font-size:16px;margin-left:30px;">-3-</label>
											</div>
											<div class="row">
												<label align="left" style="font-size:16px;margin-left:20px;">21.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Present financial status of the family indicating land, immovable and movable property with details if any. Details of other source of income, location and place. Staff & Welfare Inspector should certify in his own handwriting whether the case deserves compassionate or otherwise:<br><br></label>
												<div class="col-md-12" style="margin-left: 30px">
													<p><?php echo $res['twenty_one']; ?></p>
												</div>
											</div><br><br>
											<div class="row">
												<label align="left" style="font-size:16px;margin-left:20px;margin-top:150px;">22.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Particular of composition of the family:(Wife,son and daughter as per the pass account).Enclose family composition certificate furnished by the ex-employee while in service.</label>
											</div><br><br>
										</div>
									</div>
									<table border="1" style="width: 85%;">
										<thead>
											<th>Sr No.</th>
											<th>Name</th>
											<th>Relation with ex employee</th>
											<th>D O B</th>
											<th>Edu<br>Quali</th>
											<th>Martial status</th>
											<th>Employed/<br>Unemployed</th>
											<!-- <th>Sr No.</th> -->
										</thead>
										<tbody>
											<?php
											$sql = mysqli_query($con,"SELECT * from emp_family_tbl where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
											$sr = 0;
											while ($res = mysqli_fetch_array($sql)) {
												$sr++;
											?>
												<tr>
													<td><?php echo $sr; ?></td>
													<td><?php echo $res['member_name']; ?></td>
													<td><?php echo getRelation($res['member_relation']); ?></td>
													<td><?php echo $res['member_dob']; ?></td>
													<td><?php echo $res['member_qualifiaction']; ?></td>
													<td><?php echo getMaritailStatus($res['marital_status']); ?></td>
													<td><?php echo $res['employed_or_other']; ?></td>
												</tr>
											<?php } ?>

										</tbody>
									</table>
									<div class="row">
										<label align="left" style="font-size:16px;margin-left:20px;"><b>B.</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>PARTICULARS OF THE CANDIDATE IN WHOSE FAVOUR APPOINTMENT ON COMPASSIONATE GROUND SOUGHT FOR:</b></label>
									</div><br>
									<table border="1" style="width: 85%;">
										<?php
										$con=dbcon1();
										$sql = mysqli_query($con,"SELECT * from applicant_registration where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
										$res = mysqli_fetch_array($sql);
										?>
										<tr>
											<td style="width: 30px;">1</td>
											<td style="width: 323px;">Name of the candidate and relationship with the deceased /
												MU / MD employee
												(encl certificate for two co-workers)</td>
											<td>:<?php echo $res['applicant_name'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(" . getRelation($res['relation_with']) . ")"; ?></td>
										</tr>
										<tr>
											<td>2</td>
											<td>Date of the birth (encl SSC / SSLC / Leaving certificate / affidavit from the court of law)</td>
											<td>:<?php echo $res['applicant_dob']; ?></td>
										</tr>
										<tr>
											<td>3</td>
											<td>Educational Qualification (encl attested copies of certificate in support)</td>
											<td>:<?php echo $res['applicant_qualifiaction']; ?></td>
										</tr>
										<tr>
											<td>4</td>
											<td>Personal marks of identification of the candidate</td>
											<td>:a.<?php echo $res['identification_mark1']; ?><br><br>:b.<?php echo $res['identification_mark2']; ?></td>
										</tr>
										<tr>
											<td>5</td>
											<td>Permanent address of the candidate</td>
											<td>:<?php echo $res['permanent_address']; ?></td>
										</tr>
									</table>
									<div class="row">
										<label align="right" style="font-size:12px;margin-left:80%;margin-top:25px;"><b>Cont 4</b></label>
									</div>
									<div id="info2">
										<div class="row">
											<div class="row">
												<label align="left" style="font-size:16px;margin-left:30px;">Name of applicant:</label>
												<label align="left" style="font-size:16px;margin-left:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh / Lt</label>
												<label align="left" style="font-size:16px;margin-left:30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Design: Ex.......</label>
											</div>
										</div>
									</div>

									<div id="info2">
										<div class="row" style="border-top:0;page-break-before:always;">
											<div class="col-md-12">
												<p>Name of applicant: <?php echo $name ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh/Lt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design: <?php echo $desig; ?></p>
												<p>Place of Working: <?php echo $staion; ?> </p>
												<!-- <p class="text-center"></p>
											<p style="float: right;"></p> -->

											</div>
											<div class="row text-center">
												<label style="font-size:16px;margin-left:30px;">-4-</label>
											</div>
										</div>
									</div>
									<table border="1" style="width: 85%;">
										<?php
										$sql = mysqli_query($con,"SELECT * from service_particulars where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
										$res = mysqli_fetch_array($sql);
										?>
										<tr>
											<td style="width: 30px;">6</td>
											<td style="width: 323px;">Whether employed else were including in railways as CL/Sub & reasons for leaving the job(with particulars of employment viz. post held since when and monthly emoluments.)</td>
											<td><?php echo $res['cl_sub_n_reason']; ?></td>
										</tr>
										<tr>
											<td>7</td>
											<td>Whether eligible for the post of Gr. C or D based on educational qualification?</td>
											<td><?php echo $res['eligible_group']; ?></td>
										</tr>
										<tr>
											<td>8</td>
											<td>Date of receipt of application (for compassionate appointment and form whom Encl copy)</td>
											<td><?php echo $res['date_of_receipt_appl']; ?></td>
										</tr>
										<tr>
											<td>9</td>
											<td>Whether the window has remarried or otherwise (encl declaration of the window)</td>
											<td><?php echo $res['widow_remarried']; ?></td>
										</tr>
										<tr>
											<td>10</td>
											<td>Whether the window has applied for appointment for herself or forward with in the time limit of 5 years from the date of death of deceased employee.</td>
											<td><?php echo $res['widow_applied_apptmt']; ?></td>
										</tr>
										<tr>
											<td>11</td>
											<td>Reason why she could not apply for appointment for herself or forward within five years.</td>
											<td><?php echo $res['not_apply_for_apptmt']; ?></td>
										</tr>
										<tr>
											<td>12</td>
											<td>In the case the ward is minor at the time of death of the deceased, whether the window has applied within 2 years from the date of the candidate attained majority.</td>
											<td><?php echo $res['minor_at_time_death']; ?></td>
										</tr>
										<tr>
											<td>13</td>
											<td>Detail remarks as on the circumstances of the case warranting relaxation of time limit of 5 to 20 years.</td>
											<td><?php echo $res['warranting_time_limit']; ?></td>
										</tr>
										<tr>
											<td>14</td>
											<td>Whether relaxation in the age is required, if so to what extant (while seeking age relaxation the provision of age limit for SC / ST candidates has to be observed).</td>
											<td><?php echo $res['relaxation_age_req']; ?></td>
										</tr>
										<tr>
											<td>15</td>
											<td>Date on which proforma filled and report submitted</td>
											<td><?php echo $res['date_filled_n_report_submitted']; ?></td>
										</tr>
										<tr>
											<td>16</td>
											<td>Special or any other particulars considered relevant in the case:</td>
											<td><?php echo $res['other_particulars_considered']; ?></td>
										</tr>
									</table>
									<div class="row">
										<label align="right" style="font-size:12px;margin-left:80%;margin-top:25px;"><b>Cont 5</b></label>
									</div>
									<div id="info2">
										<div class="row" style="border-top:0;page-break-before:always;">
											<div class="col-md-12">
												<p>Name of applicant: <?php echo $name ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/o Sh/Lt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design: <?php echo $desig; ?></p>
												<p>Place of Working: <?php echo $staion; ?> </p>
												<!-- <p class="text-center"></p>
											<p style="float: right;"></p> -->

											</div>
											<div class="row text-center">
												<label style="font-size:16px;margin-left:30px;">-5-</label>
											</div>
										</div>
										<div class="row">
											<label align="left" style="font-size:16px;margin-left:20px;">Staff & Welfare Inspector should certify below in his / her own handwriting that the above information has been vertified from records / spot enquiry and are correct and no appointment to any ward of the deceased / crippled / medically unfit / incapacitated / medically decategorised employee (Mention the name of the ex employee ) has been given.</label>
										</div><br><br>
										<div class="row">
											<label align="left" style="font-size:16px;margin-left:20px;margin-top:180px;">Submitted for needful action in the matter.</label>
										</div><br>
										<div class="row">
											<label align="left" style="font-size:16px;margin-left:20px;">Note: Information against any column / item is not applicable should be indicated clearly as 'NOT APPLICABLE' and not merely putting dash (-).</label>
										</div><br><br>
										<div class="row">
											<label align="right" style="font-size:14px;margin-left:60%;margin-top:35px;">Signature of Staff & Welfare Inspector</label>
										</div>
										<div class="row">
											<label align="left" style="font-size:16px;margin-left:60%;margin-top:35px;">Name:</label><br><br>
											<label align="left" style="font-size:16px;margin-left:60%;margin-top:25px;">Date:</label>
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
												$query_emp = "SELECT * from verified_docmts where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'";
												$result_emp = mysqli_query($con,$query_emp);
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
									<div class="form-body">
										<!-- <h3 class="form-section">Add User</h3> -->
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Number</label>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fas  fa-digital-tachograph"></i>
														</span>
														<input type="text" autofocus="true" maxlength="35" class="form-control" id="sr_no" style="text-transform: uppercase;" name="sr_no" maxlength="45" placeholder="SUR/P/SAC/CA/UP" required>
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
														<input type="text" class="form-control ddate" style="border-radius: 30px;" id="date" placeholder="Select Date" name="date">

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
														<textarea class="form-control" rows="3" name="subject"></textarea>
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
										$con=dbcon2();
										$sql = mysqli_query("SELECT * from register_user where emp_no='" . $_GET['ex_emp_pfno'] . "' ");
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
										$con=dbcon1();
										$sql = mysqli_query($con,"SELECT * from emp_family_tbl where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
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

																$query_emp = mysqli_query($con,"SELECT * from relation");

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
																$query_emp = mysqli_query($con,"select * from marital_status");

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
										$con=dbcon1();
										$sql = mysqli_query($con,"SELECT str_to_date(applicant_dob,'%d/%m/%Y')as dob,str_to_date(created_at,'%d-%m-%Y')as cre,applicant_registration.* from applicant_registration where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "' ");
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
													<label class="control-label">Aadhar Number </label>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fas fa-id-card"></i>
														</span>
														<input type="text" class="form-control" id="aadhar" name="aadhar" value="<?php echo $result['applicant_aadharno']; ?>" onchange="aadharnum(this)">
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
														<input type="text" class="form-control" id="pan" name="pan" value="<?php echo $result['applicant_panno']; ?>" onchange="pannumber(this)">
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
														<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $result['applicant_mobno']; ?>" onchange="phonenumber(this)">
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
														$con=dbcon1();
														$sql = mysqli_query($con,"SELECT eligible_group from service_particulars where ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
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
															$con=dbcon1();
															$query_emp = mysqli_query($con,"SELECT * from relation");

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
														<option value="<?php echo getGender($result['applicant_gender']); ?>" selected><?php echo getGender($result['applicant_gender']); ?></option>
														<?php
														$con=dbcon1();
														$query_emp = mysqli_query($con,"SELECT * from gender");

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
														<option value="sc">SC</option>
														<option value="st">ST</option>
														<option value="obc">OBC</option>
														<option value="general_ur">Genl.(UR)</option>
													</select>
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
															$query_emp = mysqli_query($con,"select * from marital_status");

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
													<label class="control-label">Permanent Address</label>

													<textarea name="permanent_address" class="form-control"><?php echo $result['permanent_address']; ?></textarea>
												</div>
											</div>
										</div>

										<hr>
										<h4>&emsp;4)Financial Position of Ex. Employee:</h4>

										<div class='row'>
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Income from Family Pension <b style="color: red;">*</b></label>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fas fa-rupee-sign"></i>
														</span>
														<input type="text" class="form-control description" id="income_fp" name="income_fp" placeholder="Ente Family Pension " required>
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
														<input type="text" class="form-control description" id="expected_income" name="expected_income" placeholder="Enter Income " required>
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
														<input type="text" class="form-control description" id="total_income" name="total_income" placeholder="Enter Total Income " required>
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
														<textarea class="form-control description" id="immovable_property" name="immovable_property" required></textarea>
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
														<select name="emp_house" id="emp_house" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
															<option value="" selected disabled>Select Own House or Not</option>
															<option value="yes">YES</option>
															<option value="no">NO</option>

														</select>
													</div>
												</div>
											</div>

										</div>

										<hr>
										<h4>&emsp;5)Details of Settlement dues paid are as Follows:</h4>
										<!-- <?php
												//$sql=mysqli_query("SELECT * from settlement where ex_emp_pfno='".$_GET['ex_emp_pfno']."' and category='".$_GET['case']."'");
												//$res=mysqli_fetch_array($sql);
												?> -->
										<div class='row'>
											<div class="col-md-4">
												<div class="form-group">
													<label class="control-label">Provident Fund <b style="color: red;">*</b></label>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fas fa-rupee-sign"></i>
														</span>
														<input type="text" class="form-control description" id="provident_fund" name="provident_fund" value="" required>
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
														<input type="text" class="form-control description" id="dcrg" name="dcrg" value="" required>
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
														<input type="text" class="form-control description" id="ngis_lumps" name="ngis_lumps" placeholder="Enter Lumpsum" required>
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
														<input type="text" class="form-control description" id="ngis_saving_fund" name="ngis_saving_fund" placeholder="NGIS Saving Fund " required>
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
														<input type="text" class="form-control description" id="leave_sal" name="leave_sal" placeholder="Enter Leave Salary " required>
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
														<input type="text" class="form-control description" id="deposit_ins" name="deposit_ins" placeholder="Enter Deposite Linked Insurance " required>
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
														<input type="text" class="form-control description" id="family_pension" name="family_pension" value="" required>
													</div>
												</div>
											</div>
										</div>

										<h4>&nbsp;&nbsp;06)<b style="color: red;">*</b></h4>
										<div class="row">
											<div class="col-md-8">
												<div class="form-group">
													<textarea name="six" rows="5" class="form-control" required="">In this case the ex. employee expired on 21/02/2006 leaving behind widow Smt. Laxmi one minor son & one minor Dtr. only.Smt. Laxmi W/o ex employee was not interested to take up job in Rlys hence she had requestsed to register her son Depak name for Appt. on CG after his attaining age of majority vide her application dtd 22/07/2017.Page-15. Her request was considered & as per orders on Office Note on NP Page-2-1. She was advised to submit Application for her son Deepak Appt. after his attaining age of majority. Page-31.   </textarea>
												</div>
											</div>
										</div>
										<h4>&nbsp;&nbsp;07)<b style="color: red;">*</b></h4>
										<div class="row">
											<div class="col-md-8">
												<div class="form-group">
													<textarea name="seven" rows="5" class="form-control" required="">Now Smt laxmi vide her application dtd 22/02/2007 is requesting for Appt on CG to her son Mr. Deepak in Gr C Category as he has now attained age of Majority, Page-43. Accordingly case was processed & present status of Ex Empolyee missing was obtained from Police Authorities dtd 20/01/2018 has obtained Page-73. Pass Port Authorities also certified that the name of ex employee has not been issued Pass Port. Page-66.</textarea>
												</div>
											</div>
										</div>
										<h4>&nbsp;&nbsp;08)<b style="color: red;">*</b></h4>
										<div class="row">
											<div class="col-md-8">
												<div class="form-group">
													<textarea name="eight" class="form-control" rows="5" required="">Report submitted by S&WI at Page-61---51 & 74 may kindly be perused.</textarea>
												</div>
											</div>
										</div>
										<h4>&nbsp;&nbsp;09)<b style="color: red;">*</b></h4>
										<div class="row">
											<div class="col-md-8">
												<div class="form-group">
													<textarea name="nine" rows="5" class="form-control" required="">Name of candidate is appearing in the Pass/PTO & settlement Papers of ex empolyee at Page-14 & 02 resp. </textarea>
												</div>
											</div>
										</div>
										<h4>&nbsp;&nbsp;10)<b style="color: red;">*</b></h4>
										<div class="row">
											<div class="col-md-8">
												<div class="form-group">
													<textarea name="ten" rows="5" class="form-control" required="">His educational qualication ie SSC  & HSC, has been verified by S & WI & school Authorities at page 50,49,48,47 resp.</textarea>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-8">
												<div class="form-group">
													<textarea name="last_common" rows="5" class="form-control" required="">In view of the above if agreed to smt Laxmi request for Appointment on CG to her son Mr. Deepak in Gr C Category will be considered & be called for Screening to adjudge his Suitability for posting in Gr C Category. </textarea>
												</div>
											</div>
										</div>


									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions right">
						<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'>Submit </button>
						&nbsp;
						<a class='btn red btnn' data-toggle='modal' href='#reject'>Reject</a>
						<button onclick="print_button()" class="btn green btnhide">Print</button>
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


<div class="modal fade" id="reject" tabindex="-1" role="reject" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="control/adminProcess.php?action=reject" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Reject Application </h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="ex_emp_pfno" name="ex_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>">
					<!-- <input type="hidden" id="username" name="username" value="<?php echo $_GET['username']; ?>"> -->
					<input type="hidden" id="fw_tbl_id" name="fw_tbl_id" value="<?php echo $_GET['id']; ?>">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Reason</label>
								<textarea class="form-control" name="remark" rows="4" required=""></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">

								<button type="submit" class="btn blue">Submit</button>

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
	$(function() {

		$('.ddate').datepicker({
			autoclose: true,
			format: 'dd/mm/yyyy'
		});
		//     $('#txtdoe').datepicker({
		//      autoclose: true,
		//      format:'dd/mm/yyyy'
		//    });

	});
</script>
<script type="text/javascript">
	$('#DataTables_Table_22').DataTable({
		dom: 'Bfrtip',
		"pageLength": 5,
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});


	// $(document).on("change","#empid",function(){
	//     var newVal = $(this).val().replace(/[^0-9]/g,'');
	//     if(newVal == '')
	//     {
	//     	$("#empid").focus();          
	//     	$(this).val(newVal); 
	//     	alert("Enter Numbers only");
	//     }    
	// }); 
	$(document).on("change", "#appl_name", function() {
		var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');
		if (newVal == '') {
			$("#appl_name").focus();
			$(this).val(newVal);
			alert("Enter Alphabets only");
		}


	});

	function phonenumber(inputtxt) {

		var phoneno = /^[6789]\d{9}$/;
		if ((inputtxt.value.match(phoneno))) {
			return true;
		} else {
			$("#appl_mobile").val("");
			$("#appl_mobile").focus();
			alert("Invalid Mobile number");

			return false;
		}
	}

	function pannumber(inputtxt) {
		var phoneno = /^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/;

		if ((inputtxt.value.match(phoneno))) {
			return true;
		} else {
			alert("Please Enter PAN No. Format... ");
			$('#appl_pan').val("");
			$('#appl_pan').focus();
			return false;
		}
	}

	function aadharnum(inputtxt) {
		var phoneno = /^([0-9]){12}$/;

		if ((inputtxt.value.match(phoneno))) {
			return true;
		} else {
			alert("Please Enter AADHAR No. Format... ");
			$('#appl_aadhar').val("");
			$('#appl_aadhar').focus();
			return false;
		}
	}

	$(document).on("input change paste", ".description", function() {

		var newVal = $(this).val().replace(/[^a-zA-Z0-9\s,+-.\/\\_]/g, '');

		$(this).val(newVal);

	});
</script>