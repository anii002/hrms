<?php
$GLOBALS['flag'] = "5.4";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
if (isset($_POST['getback'])) {
	$ref_no = $_GET['ref_no'];
	// 	echo $ref_no;

	$query = mysqli_query($conn, "SELECT `empid` FROM `taentry_master` WHERE `reference_no`='" . $ref_no . "' ");
	$row = mysqli_fetch_array($query);
	$empid = $row['empid'];

	$query2 = mysqli_query($conn, "UPDATE `taentry_master` SET `forward_status`=0 WHERE reference_no = '" . $ref_no . "' and empid = '" . $empid . "' ");
	$query3 = mysqli_query($conn, "DELETE FROM `forward_data` WHERE reference_id = '" . $ref_no . "' AND empid = '" . $empid . "' ");

	if ($query3 && $query3 == TRUE) {
		$file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
		user_activity($empid, $file_name, 'Get Back TA', 'ADFM Get Back TA');
		echo "<script>alert('TA Get Back Successfully...');</script>";
		echo "<script> window.location='Show_unclaimed_TA.php'; </script>";
	} else {
		$file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
		user_activity($empid, $file_name, 'Get Back TA', 'ADFM unable to Get Back TA');
		echo "<script>alert('Error While Changing Data...')</script>";
	}
}
?>
<style type="text/css" media="screen">
	@media print {
		.btnhide {
			display: none !important;
			display: block;
		}

		#info1 {
			border: 1px solid black;
			display: none;
			page-break-after: always;
		}

		#info2 {
			display: none;
		}

		#info3 {
			display: none;
		}

		#info4 {
			display: none;
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

	#info1 {
		display: none;
		page-break-after: always;

	}

	#info2 {
		display: none;
	}

	#info3 {
		display: none;
	}

	#info4 {
		display: none;
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

<?php

if (isset($_GET['ref_no'])) {
	$ref_no = $_GET['ref_no'];

	// Using prepared statements to prevent SQL injection
	$stmt = $conn->prepare("SELECT * FROM taentry_master WHERE reference_no = ?");
	$stmt->bind_param("s", $ref_no);
	$stmt->execute();
	$empl_query = $stmt->get_result();

	if ($empl_query->num_rows > 0) {
		$empl_id_result = $empl_query->fetch_assoc();
		$empl_id = $empl_id_result['empid'];

		$stmt = $conn->prepare("SELECT * FROM employees WHERE pfno = ?");
		$stmt->bind_param("s", $empl_id);
		$stmt->execute();
		$emp_query = $stmt->get_result();

		if ($emp_query->num_rows > 0) {
			$emp_result = $emp_query->fetch_assoc();
			$years = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
			$expl = explode(",", $empl_id_result['TAMonth']);
		} else {
			echo "Employee not found.";
		}
	} else {
		echo "Reference number not found.";
	}
} else {
	echo "Reference number not set.";
}

?>

<div class="">
	<div class="page-content-wrapper">
		<div class="page-content">

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">दावा किए गए यात्रा भत्ता / Claimed / Forwarded TA</a>
					</li>
				</ul>

			</div>

			<div class="borderbox" id="info1" style="border-top:1px solid black;padding:10px;">
				<div class="row text-center">
					<label class="" style="font-size:16px"><b>यात्रा भत्ता जर्नल/TRAVELLING ALLOWANCE JOURNAL</b></label>
					<div style="position:absolute;left:80%;top:5px;font-size:16px;" class="cls_005"><span class="cls_005">जी.ए.31 एस आर सी /जी 1677</span></div>
					<div style="position:absolute;left:80%;top:20px;font-size:14px;" class="cls_005"><span class="cls_005">जी.69 एफ / जी 69 एफ / ए </span></div>
					<div style="position:absolute;left:80%;top:25px;font-size:12px;" class="cls_005"><span class="cls_005">____________________________________</span></div>
					<div style="position:absolute;left:80%;top:37px;font-size:16px;" class="cls_005"><span class="cls_005">GA 31 SRC/G 1677</span></div>
					<div style="position:absolute;left:80%;top:48px;font-size:14px;" class="cls_005"><span class="cls_005">G 69 F/G 69 F/A </span></div>
				</div>
				<div class="row">
					<label align="left" style="font-size:18px;margin-left:20px;">मध्य रेल/CENTRAL RAILWAY</label>
				</div>
				<div class="row text-center">
					<label class="" style="font-size:16px;font-weight:100;">नियम जिससे शामिल हे /Rules by Which governed &nbsp;<span style="border-bottom:1px solid black"><b></b></span></label>
				</div>
				<div class="row">
					<label class="" style="font-size:16px;font-weight:100;margin-left:20px;">
						शाखा/Branch &nbsp;&nbsp;<span style="border-bottom:1px solid black;">
							<b><?php echo getdepartment($emp_result['dept']); ?></b></span>&nbsp;&nbsp;&nbsp;&nbsp;
						मंडल/जिला/Division/Dist.&nbsp;&nbsp;&nbsp;&nbsp;<span style="border-bottom:1px solid black">
							<b><?php echo get_dept_shortform($emp_result['dept']); ?> OFFICE</b></span>&nbsp;&nbsp;&nbsp;&nbsp;
						मुख्यालय/Headquarters at&nbsp;&nbsp;<span style="border-bottom:1px solid black">
							<b>SUR</b></span>&nbsp;&nbsp;&nbsp;&nbsp;द्वारा किये गये कार्यो का जर्नल, जिनके बारे मैं &nbsp;&nbsp;
						<span style="border-bottom:1px solid black">
							<b>
								<?php
								foreach ($expl as $val) {
									echo $years[(int)$val - 1] . ", ";  // Cast $val to int if it's supposed to be an index
								}

								$query_1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `taentrydetails` WHERE reference_no='" . (int)$empl_id_result['reference_no'] . "'"));  // Cast reference_no to int if it's supposed to be numeric
								$td = explode("/", $query_1['taDate']);
								echo " - " . $td[2];
								?>


							</b>
						</span>
						&nbsp;&nbsp;&nbsp;&nbsp;के लिये भत्ता मांगा गया हें |
					</label>

					<!-- echo " - ".$empl_id_result['TAYear']; ?></b></span> &nbsp;&nbsp;&nbsp;&nbsp;के लिये भत्ता मांगा गया हें |</label> -->

					<?php
					// Assuming $conn is your database connection and $_SESSION['empid'] is set

					// Fetching employee details (assumed to be fetched somewhere before)
					$emp_result = [
						'pfno' => '12345',
						'name' => 'John Doe',
						'desig' => 'Software Engineer',
						'bp' => '50000'
					];

					// Fetching $expl and $years (assumed to be defined somewhere before)
					$expl = [1, 2, 3]; // Example data
					$years = ['Year1', 'Year2', 'Year3']; // Example data

					// Fetching $td (assumed to be defined somewhere before)
					$td = [0, 0, 2024]; // Example data

					$query1 = "SELECT `id`, `TAMonth`, `TAYear`, `empid`, `reference_no`, `objective`, `created_date` FROM `taentry_master` WHERE empid='" . $_SESSION['empid'] . "' AND forward_status='0' ";
					$sql1 = mysqli_query($conn, $query1);

					while ($row = mysqli_fetch_array($sql1)) {
						$query2 = "SELECT SUM(amount) as total_amount, distance FROM `taentrydetails` WHERE empid='" . $_SESSION['empid'] . "' AND reference_no='" . $row['reference_no'] . "' ";
						$sql2 = mysqli_query($conn, $query2);
						$row2 = mysqli_fetch_array($sql2);

						$query3 = "SELECT cardpass, month, year, `30p_cnt`, `30p_amt`, `70p_cnt`, `70p_amt`, `100p_cnt`, `100p_amt` FROM `tasummarydetails`, taentry_master WHERE tasummarydetails.reference_no = taentry_master.reference_no AND tasummarydetails.empid='" . $_SESSION['empid'] . "' AND tasummarydetails.`reference_no`='" . $row['reference_no'] . "'";
						$sql3 = mysqli_query($conn, $query3);

						$row3 = mysqli_fetch_array($sql3);
						if (!$row3) {
							$row3 = [
								'30p_amt' => 0,
								'70p_amt' => 0,
								'100p_amt' => 0
							];
						}

						// Ensure numeric conversion for all relevant variables
						$total_amount = intval($row3['100p_amt']) + intval($row3['70p_amt']) + intval($row3['30p_amt']);
					?>

						<tr>
							<td><?php echo htmlspecialchars($row['reference_no']); ?></td>
							<td><?php echo htmlspecialchars($row['TAYear']); ?></td>
							<td><?php echo htmlspecialchars($row['TAMonth']); ?></td>
							<td><?php echo htmlspecialchars($row2['distance']); ?></td>
							<td><?php echo htmlspecialchars($total_amount); ?></td>
							<td><?php echo htmlspecialchars($row['created_date']); ?></td>
							<td><a href="unclaimed_details.php?ref_no=<?php echo urlencode($row['reference_no']); ?>" class="btn green btn_action">Show</a></td>
						</tr>
					<?php
					}

					// Employee label details
					$allowance_years = '';
					foreach ($expl as $val) {
						$allowance_years .= $years[$val - 1] . ", ";
					}
					$allowance_years = rtrim($allowance_years, ', ');
					if (isset($td[2]) && is_numeric($td[2])) {
						$allowance_years .= " - " . intval($td[2]);
					} else {
						$allowance_years .= " - N/A";
					}
					?>

					<label style="font-size:16px; font-weight:100; margin-left:20px;">
						Journal of duties performed by &nbsp;&nbsp;&nbsp;
						<span style="border-bottom:1px solid black">
							<b><?php echo htmlspecialchars($emp_result['pfno']) . ' (' . htmlspecialchars($emp_result['name']) . ')'; ?></b>
						</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for which allowance for&nbsp;&nbsp;&nbsp;
						<span style="border-bottom:1px solid black">
							<b><?php echo htmlspecialchars($allowance_years); ?></b>
						</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;is claimed.
					</label>
					<label style="font-size:13px; font-weight:100; margin-left:80px;">
						पदनाम /Designation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span style="border-bottom:1px solid black">
							<b><?php echo htmlspecialchars($emp_result['desig']); ?></b>
						</span>&nbsp;&nbsp;&nbsp;&nbsp;वेतन/Pay&nbsp;&nbsp;&nbsp;&nbsp;
						<span style="border-bottom:1px solid black">
							<b><?php echo htmlspecialchars($emp_result['bp']); ?></b>
						</span>&nbsp;&nbsp;
					</label>

				</div>
			</div>



			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6 btnhide">
						<b>दावा किए गए यात्रा भत्ता विवरण / Claimed / Forwarded TA Details</b>
					</div>
					<div class="caption col-md-6 text-right backbtn">
						<button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
					</div>
				</div>
				<div class="portlet-body form">

					<form method="POST">
						<div class="form-body add-train">
							<div class="row add-train-title">
								<div class="col-md-12">
									<div class="form-group">
										<!-- <label class="control-label"><h4 class="">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label> -->

										<input type="hidden" value="<?php echo isset($_GET['ref_no']) ? $_GET['ref_no'] : ''; ?>" name="reference_no" id="reference_no">


										<div class="portlet-body">
											<div class="table-scrollable summary-table">
												<table id="example" class="table table-hover table-bordered display">
													<thead>
														<tr class="warning">
															<th>Card Pass</th>
															<th>Date</th>
															<th>
																<center>Journey<br>Type</center>
															</th>
															<th>Train No.</th>
															<th>
																<center>Journey<br>Purpose</center>
															</th>
															<th>
																<center>Depart<br>Station</center>
															</th>
															<th>
																<center>Depart<br>Time</center>
															</th>
															<th>
																<center>Arrival<br>Station</center>
															</th>
															<th>
																<center>Arrival<br>Time</center>
															</th>
															<th>Rate</th>
															<th>Claim</th>
															<th>Objective</th>
															<th class='btnhide'>Action</th>
														</tr>
													</thead>
													<tbody align="center">
														<?php
														// Ensure $_GET['ref_no'] is set and not empty
														$ref_no = isset($_GET['ref_no']) ? $_GET['ref_no'] : '';

														$query = "SELECT DISTINCT(set_number) FROM `taentrydetails` WHERE reference_no='" . mysqli_real_escape_string($conn, $ref_no) . "'  ORDER by STR_TO_DATE(taDate,'%d/%m/%Y') ASC";
														$sql = mysqli_query($conn, $query);
														$total_row1 = mysqli_num_rows($sql);

														while ($row_1 = mysqli_fetch_array($sql)) {
															$query1 = "SELECT * FROM `taentrydetails` WHERE set_number='" . $row_1['set_number'] . "' AND reference_no='" . mysqli_real_escape_string($conn, $ref_no) . "' ORDER by STR_TO_DATE(taDate,'%d/%m/%Y') ASC";
															$sql1 = mysqli_query($conn, $query1);
															$total_rows = mysqli_num_rows($sql1);
															$cnt = 1;

															while ($row = mysqli_fetch_array($sql1)) {
														?>
																<tr>
																	<?php if ($cnt == 1) { ?>
																		<td width="10%" rowspan='<?php echo $total_rows; ?>'> <?php echo htmlspecialchars($row['reference_no']); ?> </td>
																	<?php } ?>
																	<td><?php echo htmlspecialchars($row['taDate']); ?></td>
																	<td><?php echo htmlspecialchars(getjourneytype($row['journey_type'])); ?></td>
																	<td><?php echo htmlspecialchars($row['train_no']); ?> </td>
																	<td> <?php echo htmlspecialchars(getjourneypurpose($row['journey_purpose'])); ?></td>
																	<td><?php echo htmlspecialchars($row['departS']); ?></td>
																	<td><?php echo htmlspecialchars($row['departT']); ?></td>
																	<td><?php echo htmlspecialchars($row['arrivalS']); ?></td>
																	<td><?php echo htmlspecialchars($row['arrivalT']); ?></td>
																	<td><?php echo htmlspecialchars($row['amount']); ?></td>
																	<td><?php echo htmlspecialchars($row['percent']); ?></td>
																	<?php if ($cnt == 1) { ?>
																		<td width="10%" rowspan='<?php echo $total_rows; ?>'> <?php echo htmlspecialchars($row['objective']); ?> </td>
																		<td class='btnhide' width="10%" rowspan='<?php echo $total_rows; ?>'>
																			<?php
																			$q = "SELECT id FROM `master_cont` WHERE reference_no='" . mysqli_real_escape_string($conn, $ref_no) . "' AND set_no='" . mysqli_real_escape_string($conn, $row_1['set_number']) . "' ";
																			$s = mysqli_query($conn, $q);
																			$t = mysqli_num_rows($s);
																			if ($t == 1) {
																			?>
																				<a id="<?php echo htmlspecialchars($row_1['set_number']); ?>" style="margin-top: 2px;" class="btn green view_cont btn_action">View Conti.</a>
																			<?php } else { ?>
																				No Contingency Attached.
																			<?php } ?>
																		</td>
																	<?php } ?>
																</tr>
															<?php
																$cnt++;
															}
															?>
															<tr>
																<td colspan="13" style="background-color: #fcf8e3a3;"></td>
															</tr>
														<?php
														}
														?>

													</tbody>
												</table>
											</div>

											<!-- <div class="text-right">
								<button class="btn yellow">Print</button>
							</div> -->
										</div>
										<div class="row" style="border-top:0;page-break-before:always;">
											<div class="col-md-4"></div>
											<div class="col-md-4 summary-total">
												<h4 style="font-weight: bold;">Summary</h4>
												<div class="table-scrollable">
													<?php
													// Check if ref_no is set
													if (isset($_GET['ref_no'])) {
														$query3 = "SELECT `30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt`,is_summary_generated FROM `tasummarydetails` WHERE `empid`='" . $_SESSION['empid'] . "' AND `reference_no`='" . mysqli_real_escape_string($conn, $_GET['ref_no']) . "' ";
														$sql3 = mysqli_query($conn, $query3);

														if ($sql3 && mysqli_num_rows($sql3) > 0) {
															$row3 = mysqli_fetch_array($sql3);
															$total_amount = $row3['100p_amt'] + $row3['70p_amt'] + $row3['30p_amt'];
													?>
															<table class="table table-bordered table-hover">
																<thead class="page-bar">
																	<tr>
																		<th>Percent</th>
																		<th>Count</th>
																		<th>Total</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>100%</td>
																		<td><?php echo $row3['100p_cnt']; ?></td>
																		<td><?php echo $row3['100p_amt']; ?></td>
																	</tr>
																	<tr>
																		<td>70%</td>
																		<td><?php echo $row3['70p_cnt']; ?></td>
																		<td><?php echo $row3['70p_amt']; ?></td>
																	</tr>
																	<tr>
																		<td>30%</td>
																		<td><?php echo $row3['30p_cnt']; ?></td>
																		<td><?php echo $row3['30p_amt']; ?></td>
																	</tr>
																	<tr>
																		<td></td>
																		<td><b>Total</b></td>
																		<td><b><?php echo $total_amount; ?></b></td>
																	</tr>
																</tbody>
															</table>
													<?php
														} else {
															echo "No data found for reference number: " . htmlspecialchars($_GET['ref_no']);
														}
													} else {
														echo "Reference number not provided.";
													}
													?>
												</div>

											</div>
											<div class="col-md-4"></div>
										</div>

										<div id="info2">
											<div class="row">
												<div style="padding-left:35px;padding-right:30px;margin-top:30px;">
													<p style="text-align:justify;font-size:12px;"> मैं प्रमाणित करता हूँ कि उपर्युक्त _______________________ उस अवधि के दौरान, जिसके लिये इस बिल मैं भत्ता माँगा गया है रेलवे के कार्य से ड्यूटी पर मुख्यलय स्टेशन से बाहर गया था। इस अधिकारी ने रेलमार्ग /समुद्रमार्ग /सड़क-वाहन /वायुमार्ग की और इसे मुफ्त पास या सरकारी स्थानीय निधि या भारत सरकार के खर्च पर यात्रा करने की सुविधा दी गयी/नहीं दी गयी थी। <br>
														मैं प्रमाणित करता हूं कि ड्यूटी पास की गयी यात्रा तथा विराम के बारे मैं जिसके लिए इस बिल मैं यात्रा भत्ता/दैनिक भत्ता मांगा गया हैं,किसी भी स्त्रोत से कोई यात्रा भत्ता या अन्य पारिश्रमिक नहीं लिया गया हैं। </p>
													<p style="text-align:justify;font-size:12px;margin-top:-11px;">
														I hereby certify that the above mentioned _______________________ was absent on duty from his headquater's station during the period charged for in this bill on railway business and that the officer performed the journey by Rail/Sea/Road/Air and was allowed free pass or locomotion at the expenses of Government local fund or Govt. of India.<br>
														I certify that no TA/DA or any other remuneration has been drawn from any other source in respect of the journey performed on duty pass and also for the halts for which TA/DA has been claimed in this bill.

													</p>
												</div>
											</div>
										</div>
										<div id="info3">
											<div class="row" style="margin-top:15px;">
												<div style="padding-right:30px;padding-left:30px;">
													<div class="pull-left">___________________________________</div>
													<div class="pull-left" style="margin-top:25px;font-size:14px;margin-left:-180px;">प्रति हस्ताक्षरित/Countersigned</div>
												</div>
												<div style="padding-right:30px;padding-left:30px;margin-left:350px;">
													<div class="pull-left">___________________________________</div>
													<div class="pull-left" style="margin-top:25px;font-size:14px;margin-left:-180px;">कार्यालय प्रमुख /Head Of Office</div>
												</div>
												<div style="padding-right:px;padding-left:80px;margin-left:200px;margin-top:-3px;">
													<div class="" style="margin-left:500px;">___________________________________</div>
													<div class="" style="margin-top:5px;font-size:14px;margin-left:52%;">भत्ता मांगने वाले अधिकारी का हस्ताक्षर <br>Signature of officer/Claiming T.A</div>
												</div>
											</div>
										</div>
										<div id="info4">
											<div class="row" style="margin-top:15px;">
												<div style="padding-left:35px;padding-right:30px;">
													<div style="font-size:14px;">टिप्पणी :- किसी एक रेलवे से दूसरी रेलवे पर स्तानंन्तरण होने पर यात्रा भत्ता बिल पर यह प्रमाणित किया जाना चाहिये कि मुफ्त पास या सरकारी खर्च पर यात्रा करने की सुविधा दी गयी या नहीं। </div>
													<div style="font-size:14px;">Note :- On transfer from one Railway to another,certificate whether or not a free pass or not a free pass or Locomotion at Government expenses was allowed or not should be recorded on T.A Bills. </div>

												</div>
											</div>
										</div>


										<div class="col-md-12 trackprint-btn">
											<ul>
												<?php
												// Check if $_GET['ref_no'] is set and not empty
												if (isset($_GET['ref_no']) && !empty($_GET['ref_no'])) {
													$ref_no = $_GET['ref_no'];

													// Query to fetch data related to the reference number
													$query3 = "SELECT `30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt`,is_summary_generated FROM `tasummarydetails` WHERE `empid`='" . $_SESSION['empid'] . "' AND `reference_no`='" . mysqli_real_escape_string($conn, $ref_no) . "' ";
													$sql3 = mysqli_query($conn, $query3);

													// Check if data exists for the reference number
													if ($sql3 && mysqli_num_rows($sql3) > 0) {
														$row3 = mysqli_fetch_array($sql3);

														// Display buttons based on summary generation status
														if ($row3['is_summary_generated'] != 1) {
												?>
															<li><button type="submit" name="getback" class="btn blue btnhide">Get Back</button></li>
														<?php } ?>

														<!--<li><button class="btn blue btnhide">Track</button></li>-->
														<li><a href="track-modul.php?ref_no=<?php echo htmlspecialchars($ref_no); ?>" class="btn green btn_action btnhide">Track</a></li>
														<li><button onclick="print_button()" class="btn green btnhide">Print</button></li>
												<?php
													} else {
														echo "<p>No data found for reference number: " . htmlspecialchars($ref_no) . "</p>";
													}
												} else {
													echo "<p>Reference number not provided or invalid.</p>";
												}
												?>
											</ul>
										</div>

									</div>
								</div>

							</div>
						</div>
				</div>

				</form>


			</div>
		</div>
	</div>
</div>


<div id="responsive" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
	<div class="modal-header btn-orange-moon">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Contingency Data : <span id="name1" name="name1"></span> </h4>
	</div>
	<form action="control/adminProcess.php?action=delcont" method="post" class="horizontal-form">
		<input type="hidden" id="ref_no" value="<?php echo $_GET['ref_no']; ?>" name="ref_no">
		<input type="hidden" id="set_no1" value="" name="set_no1">
		<div class="modal-body">
			<div class="portlet-body table-responsive">
				<div id="cont_details"></div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn default" data-dismiss="modal">Close</button>
			<!--<button type="submit" class="btn red" >Delete TA</button>-->
		</div>
	</form>
</div>


<?php
include 'common/footer.php';
?>



<!-- File export script -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5'
			]
		});
	});


	$(document).on("click", ".view_cont", function() {
		var sno = $(this).attr('id');
		var ref_no = $("#reference_no").val();
		// alert(sno);
		// alert(ref_no);
		$("#set_no1").val(sno);

		$.ajax({
			url: 'control/adminProcess.php',
			type: 'post',
			data: "action=view_conti&ref_no=" + ref_no + "&set_no=" + sno,

			success: function(data) {
				// alert(data);
				if (data != 0) {
					$("#cont_details").html(data);
					$("#responsive").modal('toggle');
					$("#responsive").modal('show');
				}
			}
		});

	});

	function print_button() {
		$(".main-footer").hide();
		$(".box-header").hide();
		$(".hide_print").hide();
		$("#info").hide();
		$(".btnhide").hide();
		window.print();
		$(".main-footer").show();
		$(".box-header").show();
		$(".hide_print").show();
		$("#info").show();
		$("#info2").show();
		$("#info3").show();
		$("#info4").show();
		window.location.reload();
	}
</script>

<!--<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>