<?php
$GLOBALS['flag'] = "5.990";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
if (isset($_POST['getback'])) {
	$ref_no = $_GET['ref_no'];
	// echo $ref_no;

	$query = mysqli_query($conn, "SELECT `empid` FROM `continjency_master` WHERE `reference`='" . $ref_no . "' ");
	$row = mysqli_fetch_array($query);
	$empid = $row['empid'];

	$query2 = mysqli_query($conn, "UPDATE `continjency_master` SET `forward_status`=0 WHERE reference = '" . $ref_no . "' and empid = '" . $empid . "' ");
	$query3 = mysqli_query($conn, "DELETE FROM `forward_data` WHERE reference_id = '" . $ref_no . "' AND empid = '" . $empid . "' ");

	if ($query3 && $query3 == TRUE) {
		$empid = $_SESSION['empid'];
		$file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
		user_activity($empid, $file_name, 'Get Back Contingency', 'ADFM Contingency Get Back Successfully');
		echo "<script>alert('Contingency Get Back Successfully...'); window.location='show_saved_cont.php'; </script>";
	} else {
		$empid = $_SESSION['empid'];
		$file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
		user_activity($empid, $file_name, 'Get Back Contingency', 'ADFM unable to Get Back Contingency');
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

// if(isset($_POST['print_data']))
{
    // Check if the connection is valid and $_GET['ref_no'] is set
    if (isset($conn) && isset($_GET['ref_no'])) {
        $empl_query = mysqli_query($conn, "select * from taentry_master where reference_no='" . mysqli_real_escape_string($conn, $_GET['ref_no']) . "'");
        
        if ($empl_query && mysqli_num_rows($empl_query) > 0) {
            $empl_id_result = mysqli_fetch_array($empl_query);
            $empl_id = $empl_id_result['empid'];

            $emp_query = mysqli_query($conn, "select * from employees where pfno='" . mysqli_real_escape_string($conn, $empl_id) . "'");
            
            if ($emp_query && mysqli_num_rows($emp_query) > 0) {
                $emp_result = mysqli_fetch_array($emp_query);
                $years = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                
                if (isset($empl_id_result['TAMonth'])) {
                    $expl = explode(",", $empl_id_result['TAMonth']);
                } else {
                    $expl = [];
                }
            } else {
                echo "Employee data not found.";
                $emp_result = [];
                $expl = [];
            }
        } else {
            echo "TA entry data not found.";
            $empl_id_result = [];
            $emp_result = [];
            $expl = [];
        }
    } else {
        echo "Invalid request.";
        $empl_id_result = [];
        $emp_result = [];
        $expl = [];
    }
}
?>



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
					<a href="#">फुटकर बिल विस्तार / Contingency Details</a>
				</li>
			</ul>

		</div>

		<div class="borderbox" id="info1" style="border-top:1px solid black;padding:10px;">
			<div class="row text-center">
				<label class="" style="font-size:16px"><b>फुटकर बिल विस्तार / Contingency Details</b></label>
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
					शाखा/Branch &nbsp;&nbsp;
					<span style="border-bottom:1px solid black;">
						<b><?php echo isset($emp_result['dept']) ? getdepartment($emp_result['dept']) : 'Department not found'; ?></b>
					</span>&nbsp;&nbsp;&nbsp;&nbsp;
					मंडल/जिला/Divison/Dist.&nbsp;&nbsp;&nbsp;&nbsp;
					<span style="border-bottom:1px solid black">
						<b>SR. DFM's OFFICE</b>
					</span>&nbsp;&nbsp;&nbsp;&nbsp;
					मुख्यालय /Headquarters at&nbsp;&nbsp;
					<span style="border-bottom:1px solid black">
						<b>SUR</b>
					</span>&nbsp;&nbsp; &nbsp;द्वारा किये गये कार्यो का जर्नल, जिनके बारे मैं &nbsp;&nbsp;
					<span style="border-bottom:1px solid black">
						<b>
							<?php
							foreach ($expl as $val) {
								if (is_numeric($val)) {
									echo isset($years[$val - 1]) ? $years[$val - 1] . ", " : 'Year not found, ';
								} else {
									echo "Invalid year value, ";
								}
							}
							echo " - " . (isset($empl_id_result['TAYear']) ? $empl_id_result['TAYear'] : 'Year not found');
							?>
						</b>
					</span> &nbsp;&nbsp;&nbsp;&nbsp;के लिये भत्ता मांगा गया हें |
				</label>

				<label class="" style="font-size:16px;font-weight:100;margin-left:20px;">
					Journal of duties performed by &nbsp;&nbsp;&nbsp;
					<span style="border-bottom:1px solid black">
						<b><?php echo isset($emp_result['name']) ? $emp_result['name'] : 'Name not found'; ?></b>
					</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for which allowance for&nbsp;&nbsp;&nbsp;
					<span style="border-bottom:1px solid black">
						<b>
							<?php
							foreach ($expl as $val) {
								if (is_numeric($val)) {
									echo isset($years[$val - 1]) ? $years[$val - 1] . ", " : 'Year not found, ';
								} else {
									echo "Invalid year value, ";
								}
							}
							echo " - " . (isset($empl_id_result['TAYear']) ? $empl_id_result['TAYear'] : 'Year not found');
							?>
						</b>
					</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;is claimed.
				</label>

				<label style="font-size:13px;font-weight:100;margin-left:80px;">
					पदनाम /Designation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span style="border-bottom:1px solid black">
						<b><?php echo isset($emp_result['desig']) ? $emp_result['desig'] : 'Designation not found'; ?></b>
					</span>&nbsp;&nbsp;&nbsp;&nbsp;वेतन/Pay &nbsp;&nbsp;&nbsp;&nbsp;
					<span style="border-bottom:1px solid black">
						<b><?php echo isset($emp_result['bp']) ? $emp_result['bp'] : 'Pay not found'; ?></b>
					</span>&nbsp;&nbsp;
				</label>
			</div>

		</div>

		<!-- <h1>ecefce</h1> -->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption col-md-6 btnhide">
					<b>फुटकर बिल विस्तार / Contingency Details</b>
				</div>
				<div class="caption col-md-6 text-right backbtn btnhide">
					<button class="btn btn-danger" onclick="history.go(-1);">Back</button>
				</div>
			</div>
			<div class="portlet-body form">

				<form method="POST">
					<div class="form-body add-train">
						<div class="row add-train-title">
							<div class="col-md-12">
								<div class="form-group">
									<input type="hidden" value="<?php echo $_GET['ref_no']; ?>" name="reference_no" id="reference_no">
									<!-- <label class="control-label"><h4 class="">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label> -->
									<div class="portlet-body">
										<div class="table-scrollable summary-table">
											<table id="example" class="table table-hover table-bordered display">
												<thead>
													<tr class="warning">
														<th>Reference No.</th>
														<th>Date</th>
														<th>
															<center>From<br>Place</center>
														</th>
														<th>
															<center>To<br>Place</center>
														</th>
														<th>K.M.</th>
														<th>Rate/K.M </th>
														<th>Amount</th>
														<th>Objective</th>
														<th class='btnhide'>Action</th>
													</tr>
												</thead>
												<tbody align="center">
													<?php
													// $_GET['ref_no'];
													$query = "SELECT DISTINCT(set_number),reference FROM `continjency` WHERE reference='" . $_GET['ref_no'] . "' ORDER by STR_TO_DATE(cntdate,'%d/%m/%Y') ASC";
													$sql = mysqli_query($conn, $query);
													$total_row1 = mysqli_num_rows($sql);
													while ($row_1 = mysqli_fetch_array($sql)) {

														$query1 = "SELECT * FROM `continjency` WHERE set_number='" . $row_1['set_number'] . "' AND reference='" . $_GET['ref_no'] . "' ORDER by STR_TO_DATE(cntdate,'%d/%m/%Y') ASC";
														$sql1 = mysqli_query($conn, $query1);
														echo mysqli_error($conn);
														$total_rows = mysqli_num_rows($sql1);
														$cnt = 1;
														$T_amount = 0;
														while ($row = mysqli_fetch_array($sql1)) {
													?>
															<tr>
																<?php
																if ($cnt == 1) {
																?>
																	<td width="10%" rowspan='<?php echo $total_rows; ?>'> <?php echo $row_1['reference']; ?> </td>
																<?php
																}
																?>
																<td><?php echo $row['cntdate']; ?></td>
																<td><?php echo $row['cntfrom']; ?></td>
																<td><?php echo $row['cntTo']; ?></td>
																<td><?php echo $row['kms']; ?></td>
																<td><?php echo $row['rate_per_km']; ?></td>
																<td>
																	<?php
																	echo $row['total_amount'];
																	$T_amount = $T_amount + $row['total_amount'];
																	?>
																</td>
																<?php
																if ($cnt == 1) {
																?>
																	<td width="10%" rowspan='<?php echo $total_rows; ?>'> <?php echo $row['objective']; ?> </td>

																	<?php
																	$query_f_s = mysqli_query($conn, "SELECT forward_status FROM `continjency_master` WHERE reference='" . $_GET['ref_no'] . "' ");
																	$total_row_f_s = mysqli_fetch_array($query_f_s);
																	if ($total_row_f_s['forward_status'] == '0') {
																	?>
																		<td class='btnhide' width="10%" rowspan='<?php echo $total_rows; ?>'>
																			<a href="update_cont_sep.php?ref_no=<?php echo $row_1['reference']; ?>" class="btn blue btn_action btnhide">Update</a>
																			<br>
																			<a data-toggle="modal" href="#delete_cont" id="<?php echo $row['set_number']; ?>" style="margin-top: 2px;" class="btn red btn_action btnhide">Delete</a>
																			<br>
																		</td>
																	<?php } else {
																	?>
																		<td class='btnhide' width="10%" rowspan='<?php echo $total_rows; ?>'>
																			<button type="submit" name="getback" class="btn blue btnhide">Get Back</button>
																		</td>
																<?php }
																} ?>
																<?php
																$cnt++;
																?>
															</tr>
														<?php
														}
														?>
														<tr>
															<td colspan="6" style="text-align: right;"><b>Total</b></td>
															<td colspan="3" style="text-align: left;"><b><?php echo $T_amount; ?></b></td>
														</tr>
														<tr>
															<td colspan="13" style="background-color: #fcf8e3a3;"></td>
														</tr>
													<?php
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4"></div>
										<div class="col-md-4">


										</div>


										<div class="col-md-4"></div>
									</div>



									<div id="info2">
										<div class="row">
											<div style="padding-left:35px;padding-right:30px;margin-top:20px;">
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
										<?php
										$query3 = "SELECT cardpass,month,year,`30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt` FROM `tasummarydetails`,taentry_master WHERE  tasummarydetails.reference_no=taentry_master.reference_no AND tasummarydetails.empid='" . $_SESSION['empid'] . "' AND tasummarydetails.`reference_no`='" . $_GET['ref_no'] . "'";
										$sql3 = mysqli_query($conn, $query3);
										$row3 = mysqli_fetch_array($sql3);
										$total_amount = $row3['100p_amt'] + $row3['70p_amt'] + $row3['30p_amt'];
										?>
										<ul>
											<input type="hidden" value="<?php echo $row3['month']; ?>" name="ta_manth" id="ta_manth">
											<input type="hidden" value="<?php echo $row3['cardpass']; ?>" name="cardpass" id="cardpass">
											<input type="hidden" value="<?php echo $row3['year']; ?>" name="year" id="year">
											<?php
											$month = explode(',', $row3['month']);
											//   print_r($month);
											$month = end($month);

											$query1 = mysqli_query($conn, "SELECT forward_status FROM `continjency_master` WHERE empid='" . $_SESSION['empid'] . "' AND reference='" . $_GET['ref_no'] . "' ");
											$row = mysqli_fetch_array($query1);

											if ($row['forward_status'] != '1') {
											?>
												<li><a href="otp_forward_cont.php?reference_no=<?php echo $_GET['ref_no']; ?>" class="btn green btnhide" class="hide_print btn btn-primary pull-right">Forword</a></li>
											<?php } ?>
											<!-- <li><button onclick="print_button()" class="btn green btnhide">Print</button></li> -->
										</ul>
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


<div id="delete_cont" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
	<div class="modal-header btn-orange-moon">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Delete Contindency : <span id="name1" name="name1"></span> </h4>
	</div>
	<form action="control/adminProcess.php?action=deletecont" method="post" autocomplete="off" class="horizontal-form">
		<div class="modal-body">
			Do you really want to delete Contindency?
			<input type="hidden" name="ref_no" id="ref_no" value="<?php echo $_GET['ref_no']; ?>">
			<input type="hidden" name="set_no" id="set_no">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn default" data-dismiss="modal">Close</button>
			<button type="submit" class="btn blue">Delete Contindency</button>
		</div>
	</form>
</div>


<?php
include 'common/footer.php';
?>


<!-- File export script -->
<script type="text/javascript">
	$(document).on("click", ".btn_action", function() {
		var sno = $(this).attr('id');
		// alert(sno);
		$("#set_no").val(sno);
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

<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>