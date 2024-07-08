<?php
$GLOBALS['flag'] = "5.8";
include('common/header.php');
include('common/sidebar.php');
?>
<style type="text/css">
	.billunitzindex {
		z-index: 1 !important;
	}
</style>
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
					<a href="#">फुटकर बिल / Contingency Form</a>
				</li>
			</ul>

		</div>
		<!-- <h1>ecefce</h1> -->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-book"></i>फुटकर बिल / Contingency Form
				</div>
			</div>
			<div class="portlet-body form">

				<form action="conprocess.php" autocomplete="off" method="POST">

					<?php
					// 	 $_SESSION['empid'];
					$level_q =  mysqli_query($conn,"SELECT LEVEL FROM `employees` where pfno='" . $_SESSION['empid'] . "' ");
					$level_row =  mysqli_fetch_array($level_q);

					$lev = $level_row['LEVEL'];
					$level_q1 =  mysqli_query($conn,"SELECT amount from ta_amount WHERE min<='" . $lev . "' AND max>='" . $lev . "' ");
					$level_row1 =  mysqli_fetch_array($level_q1);
					$user_amount = $level_row1['amount'];

					?>
					<input type="hidden" name="u_amount" id="u_amount" value="<?php echo $user_amount; ?>" class="form-control">
					<input type="hidden" name="u_pfno" id="u_pfno" value="<?php echo $_SESSION['empid']; ?>" class="form-control">

					<div class="form-body add-train">
						<div class="row add-train-title ">
							<div class="col-md-4 billunitzindex">
								<div class="form-group">
									<label class="control-label">
										<h4 class="">For which allowances claimed for</h4>
									</label>
									<select class="form-control select2" name="month[]" id="month" multiple="multiple" data-placeholder="माह का चयन करे / Select a Months" required>
										<option value="00" selected disabled>माह का चयन करे / Select Month</option>
										<option value="01">January</option>
										<option value="02">February</option>
										<option value="03">March</option>
										<option value="04">April</option>
										<option value="05">May</option>
										<option value="06">June</option>
										<option value="07">July</option>
										<option value="08">August</option>
										<option value="09">September</option>
										<option value="10">October</option>
										<option value="11">November</option>
										<option value="12">December</option>
									</select>
								</div>
							</div>
							<!-- <div class="col-md-4">
					<div class="form-group">
						<label class="control-label"><h4 class="">टोकन / कार्ड पास / Token / Card Pass</h4></label>
						<input  class="form-control" type="text" placeholder="Enter Token / Card Pass" name="cardpass" id="cardpass" required>
					</div>
				</div> -->

						</div>

						<div class="add-train">
							<div class="portlet-body">
								<div class="table-scrollable table-responsive">
									<table class="table table-bordered">
										<tbody id="new_row">

											<tr class="odd gradeX">
												<td style="width: 16.66%">
													<div class="form-group ">
														<label class="control-label">Date <br> दिनांक </label>
														<div class="billunitzindex">
															<input type="text" class=" form-control datepicker datecheck" val='0' id="date0" name="date0" placeholder="dd/mm/yyyy">
														</div>
													</div>
												</td>
												<td style="width: 16.66%">
													<div class="form-group">
														<label class="control-label">From <br> से</label>
														<input type='text' list='dstation0' style='text-transform:uppercase' name='dstn0' id='dstn0' placeholder='From Place' val="0" class="departClass form-control">
													</div>
												</td>

												<td style="width: 16.66%">
													<div class="form-group">
														<label class="control-label">To <br> तक</label>
														<input type='text' list='astation0' style='text-transform:uppercase' name='astn0' id='astn0' placeholder='To Place' val="0" class="form-control arrivalstn">
													</div>
												</td>

												<td style="width: 16.66%">
													<div class="form-group">
														<label class="control-label">K.M. <br> कि.मी.</label>
														<input type="text" class="form-control kms" name="distance0" id="distance0" placeholder="Enter K.M." maxlength="3" onkeyup="this.value=this.value.replace(/[^\d]/,'')" val="0">
													</div>
												</td>
												<td style="width: 16.66%">
													<div class="form-group">
														<label class="control-label">Rate/K.M <br> प्रति कि.मी.</label>
														<input type="text" class="form-control rate" name="per0" id="per0" placeholder="Percentage" maxlength="2" onkeyup="this.value=this.value.replace(/[^\d]/,'')" val="0">
													</div>
												</td>
												<td style="width: 16.66%">
													<div class="form-group">
														<label class="control-label">Amount <br> राशि</label>
														<input type="text" class="form-control" name="amt0" id="amt0" placeholder="Amount" readonly onkeyup="this.value=this.value.replace(/[^\d]/,'')" val="0">
													</div>
												</td>
											</tr>

										</tbody>
									</table>
								</div>
								<div class="objcttextarea objcttextarea-fullwidth">
									<div class="form-group">
										<label class="control-label">Objective उद्देश्य</label>
										<textarea class="" name="object" id="object" rows="2" required></textarea>
									</div>
									<input type="hidden" name="sr" id="sr" value='0'>
									<input type="hidden" name="sr1" id="sr1" value='0'>
									<input type="hidden" name="nr" id="nr" value='0'>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="">
								<div class="text-left col-md-6 col-xs-6">
									<button type="button" class="btn yellow addrowbtn addbtn">पंक्ति जोड़े / Add Row <i class="fa fa-plus"></i></button>
									<button type="button" class="btn red removerowbtn addbtn">पंक्ति निकालें / Remove Row <i class="fa fa-minus"></i></button>
								</div>
								<div class="text-right col-md-6 col-xs-6">
									<button type="submit" name="submit" id="submit" class="btn green savebtn" style="display: none;">जमा करें / Submit</button>
								</div>
							</div>
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

<script type="text/javascript">
	$(document).on("change", ".onlyNumber", function() {
		var newVal = $(this).val().replace(/[^0-9\s]/g, '');
		if (newVal == '')
			$(this).focus();
		$(this).val(newVal);
	});

	$(document).on("change", "#object", function() {
		// console.log("SDFSGsfd");
		var newVal = $(this).val().replace(/[^a-zA-Z0-9\s]/g, '');
		if (newVal == '')
			$("#object").focus();
		$(this).val(newVal);
	});


	$(document).on("change", ".kms", function() {
		var id = $(this).attr('val');
		// console.log(id);
		var val1 = $(this).val();

		var val2 = $("#per" + id).val();
		var sum = val1 * val2;
		$("#amt" + id).val(sum);
	});

	$(document).on("change", ".rate", function() {
		var id = $(this).attr('val');
		console.log(id);
		var val1 = $(this).val();
		var val2 = $("#distance" + id).val();

		var sum = val1 * val2;
		$("#amt" + id).val(sum);

	});

	// $(document).on("change","#cardpass",function(){
	//     var newVal = $(this).val().replace(/[^a-zA-Z0-9\s]/g, '');
	//     if(newVal == '')
	//         $("#cardpass").focus();  
	//     $(this).val(newVal);
	// });

	$(document).on("change", "#month", function() {
		var month = $(this).val();
		var u_pfno = $("#u_pfno").val();
		//  	console.log(month+u_pfno);
		$.ajax({
			type: "post",
			url: "control/adminProcess.php",
			data: "action=check_date1&month=" + month + "&u_pfno=" + u_pfno,
			success: function(data) {
				//  	console.log(data);
				var str = data.trim();
				if (str == 'claimed') {
					alert("You are alreday calimed TA for these " + month + " month");
					window.location = 'index.php';
				} else if (str != 0) {
					alert("You are alreday saved TA for this " + month + " MONTH, Please fill TA from ADD MORE OPTION in Saved TA.");
					window.location = 'show_saved_cont.php?ref_no=' + data;
				}
			}
		});
	});

	$(document).on("click", ".removerowbtn", function() {
		var sr = $("#sr1").val();
		console.log(sr);
		if (sr != 0) {
			$("#new_row").children().last().remove();
			sr--;
			$("#sr1").val(sr);
			$("#atime" + sr + "").focus();
			console.log(sr);
		}

	});


	$(".addrowbtn").on("click", function() {
		var data = '';
		var sr = $("#sr1").val();
		//alert(sr);
		var prevdate = $("#date" + sr).val();

		sr++;
		data += '<tr class="odd gradeX"><td style="width: 16.66%"><div class="form-group ">				 <label class="control-label">Date <br> दिनांक </label><div class="billunitzindex">			  <input type="text" class=" form-control datepicker datecheck" val=' + sr + ' value=' + prevdate + ' id="date' + sr + '" name="date' + sr + '" placeholder="dd/mm/yyyy"></div></div></td><td style="width: 16.66%">			   <div class="form-group"><label class="control-label">From <br> से</label>							<input type="text" style="text-transform:uppercase" name="dstn' + sr + '" id="dstn' + sr + '" placeholder="From Place" val=' + sr + ' class="departClass form-control"></div></td><td style="width: 16.66%"><div class="form-group"><label class="control-label">To <br> तक</label><input type="text" style="text-transform:uppercase" name="astn' + sr + '"       id="astn' + sr + '" placeholder="To Place" val=' + sr + ' class="form-control arrivalstn"></div></td><td style="width: 16.66%"><div class="form-group"><label class="control-label">K.M. <br> .मी.</label><input type="text" class="form-control kms onlyNumber"  name="distance' + sr + '" id="distance' + sr + '" placeholder="Enter K.M." maxlength="3" val=' + sr + ' ></div></td><td style="width: 16.66%"><div class="form-group"><label class="control-label">Rate/K.M <br> प्रति कि.मी.</label><input type="text" class="form-control rate onlyNumber"  name="per' + sr + '" id="per' + sr + '" placeholder="Percentage"	maxlength="2" val=' + sr + '></div></td>	  <td style="width: 16.66%">  <div class="form-group"><label class="control-label">Amount <br> राशि</label><input type="text" class="form-control" name="amt' + sr + '" id="amt' + sr + '" placeholder="Amount"  readonly val=' + sr + '></div></td></tr>';

		$("#new_row").append(data);
		$("#sr1").val(sr);

		var x = 60;
		var CurrentDate = new Date();
		CurrentDate.setDate(CurrentDate.getDate() - x);
		var mon = CurrentDate.getMonth() + 1;
		var date = CurrentDate.getDate();
		var year = CurrentDate.getFullYear();
		var mindate = date + "/" + mon + "/" + year;
		// console.log(mindate);

		$(".datepicker").datepicker({
			dateFormat: "dd/mm/yy",
			minDate: mindate,
			//maxDate: "19/04/2019", 
			changeYear: true,
			changeMonth: true,
		});
	});



	// Train Validation
	$(document).on("change", ".val", function() {
		var value = $(this).attr('val');
		//alert(value);
		var type = $("#type" + value).val();
		var trainno = $("#trainno" + value).val();
		//alert(type);
		if (type == '1') {
			var number_match = /^\d{5}$/;
			//alert(trainno) ; 
			if ((trainno.match(number_match))) {
				return true;
			} else {
				alert("Train number must be integer and 5 digits");
				$("#trainno" + value).val("");
				$("#trainno" + value).focus();
				return false;
			}
		}
		//else{
		// 		$("#trainno"+value).removeAttribute('maxLength');
		// }
	});

	// Arrival and Depart station validation
	$(document).on("change", ".departClass", function() {
		var cnt = $(this).attr('val');
		for (var i = 0; i <= cnt; i++) {
			var prev_cnt = (+cnt) - i;
			var arrivalS = $("#astn" + prev_cnt).val();
			var departS = $("#dstn" + cnt).val();
			var arravalStation = arrivalS.toUpperCase();
			var departStation = departS.toUpperCase();
			if (arrivalS != "") {
				if (arravalStation != departStation) {
					alert('Arrival place and depart place must match');
					$("#dstn" + cnt).val("");
					$("#dstn" + cnt).focus();
					break;
				} else {
					if (arravalStation == departStation) {
						break;
					}
				}
			}
		}
	});


	$(document).on("change", ".arrivalstn", function() {
		var cnt = $(this).attr('val');
		var dptstn = $("#dstn0").val();
		var arrstn = $("#astn" + cnt).val();
		var dptstn1 = dptstn.toUpperCase();
		var arrstn1 = arrstn.toUpperCase();
		if (dptstn1 == arrstn1) {
			$(".savebtn").show();
			$(".addbtn").hide();
		} else {
			$(".savebtn").hide();
			$(".addbtn").show();
		}
	});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		//$('#birth-date').mask('00/00/0000');
		$('.timevalue').mask('00:00');
	});
</script>

<script>
	$(document).on("change", "#month", function() {
		var month = $(this).val();
		var new_month = mindate;

		var dateval = $("#date0").val();
		if (dateval == '') {
			$("#date0").val(new_month);
		}

	});

	var x = 60; //or whatever offset
	var CurrentDate = new Date();
	CurrentDate.setDate(CurrentDate.getDate() - x);
	var mon = CurrentDate.getMonth() + 1;
	var date = CurrentDate.getDate();
	var year = CurrentDate.getFullYear();
	var mindate = date + "/" + mon + "/" + year;

	var m_array = [];
	$("#month option").each(function() {
		m_array.push($(this).val());
	});

	// console.log(m_array);

	$("#month option").each(function() {
		// console.log($(this).val());
		var mth = $(this).val();
		if (mth < mon) {
			$(this).attr('disabled', 'disabled');
		}
	});
	$(".datepicker").datepicker({
		dateFormat: "dd/mm/yy",
		minDate: mindate,
		//maxDate: "29/05/2019", 
		changeYear: true,
		changeMonth: true,
	});
</script>