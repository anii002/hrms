<?php
error_reporting(0);
include_once('../dbconfig/dbcon.php');
include('mini_function.php');

?>
<html>

<head>
	<link href="../bootstrap/hind.css" rel="stylesheet" media="print">
	<link href="../bootstrap/hind.css" rel="stylesheet" media="screen">
	<meta charset="UTF-8">
	</meta>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../bootstrap/bootstrap.min.css" media="print">
	<link rel="stylesheet" href="../bootstrap/bootstrap.min.css" media="screen">
	<!-- jQuery library -->
	<script src="../bootstrap/jquery.min.js" media="screen"></script>
	<script src="../bootstrap/jquery.min.js" media="print"></script>
	<!-- Latest compiled JavaScript -->
	<script src="../bootstrap/bootstrap.min.js" media="print"></script>
	<script src="../bootstrap/bootstrap.min.js" media="screen"></script>
	<script src="https://code.jquery.com/jquery-1.12.3.min.js" media="print"></script>
	<script src="https://code.jquery.com/jquery-1.12.3.min.js" media="screen"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js" media="print"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js" media="screen"></script>
</head>
<style type="text/css">
	.cntr {
		padding-left: 50px;
		font-size: 18px;
	}

	table {
		page-break-inside: auto;
	}

	tr {
		page-break-inside: avoid;
		page-break-after: auto;
	}

	.pb {
		page-break-before: always;
	}

	.table>tbody>tr>td,
	.table>tbody>tr>th,
	.table>tfoot>tr>td,
	.table>tfoot>tr>th,
	.table>thead>tr>td,
	.table>thead>tr>th {
		padding: 8px;
		line-height: 1.42857143;
		vertical-align: top;
		border-top: none;
	}

	.table>tr>td {
		border: 1px solid black;
	}

	.table>tbody>tr>td {
		font-size: 13px;
	}

	.table>tbody>tr>th {
		font-size: 12px;
	}

	@page {
		size: A4;
		margin: -15mm;
		margin-top: 12mm;

		
	}

	@media print {
		table {
			page-break-inside: auto;
		}

		.page-break {
			display: block;
			page-break-before: always;
		}

		tr {
			page-break-inside: avoid;
			page-break-after: auto;
		}

		.abc {
			-webkit-transform: rotate(90deg);
			-moz-transform: rotate(90deg);
			-ms-transform: rotate(90deg);
			/* IE 9 */
			-o-transform: rotate(90deg);
			/* Opera */
			transform: rotate(90deg);
			/* //height:250px; */
			/* //width:2000px; */
			margin-top: -80px;
			/* //margin-left:-870px; */
			padding-left: 150px;
		}

		#p1 {
			display: none;
		}

		#p3 {
			display: none;
		}

		#p4 {
			display: none;
		}
	}
</style>

<body>
	<center>
		<div>
			<button class="btn btn-primary" onclick="print_page()" id="p1">Print this page</button>
			<a href="print_sr.php" class="btn btn-warning" style="border:none" id="p3">Back</a>
			<!--button class="btn btn-info" style="border:none" id="p4">Export to PDF</button-->
		</div>
	</center>
	<script type="text/javascript">
		function print_page() {
			window.print();
			var ButtonControl = document.getElementById("p1");
			ButtonControl.style.visibility = "hidden";
			window.location.reload();
		}
		var doc = new jsPDF();
		var specialElementHandlers = {
			'#editor': function(element, renderer) {
				return true;
			}
		};
		$('#p4').click(function() {
			doc.fromHTML($('.content').html(), 15, 15, {
				'width': 1100,
				'elementHandlers': specialElementHandlers
			});
			doc.save('<?php echo $pf; ?>.pdf');
		});
	</script>
	<?php
	$data = 0;
	$pf = $_GET['pf'];
	//echo "<script>alert('$pf');</script>";
	$conn=dbcon1();
	$query = mysqli_query($conn,"Select * from present_work_temp where preapp_pf_number='$pf'");
	if ($query) {
		($result = mysqli_fetch_assoc($query));
		$pre_dept = get_department($result['preapp_department']);
		$pre_des = get_designation($result['preapp_designation']);
	}
	$conn=dbcon1();
	$bio = mysqli_query($conn,"Select * from biodata_temp where pf_number='$pf' ");
	if ($bio) {
		($res = mysqli_fetch_assoc($bio));
		$emp_name = $res['emp_name'];
		//echo"<script>alert($emp_name)</script>";
	}
	$conn=dbcon1();
	$med = mysqli_query($conn,"select * from medical_temp where medi_pf_number='$pf'");
	if ($med) {
		($me = mysqli_fetch_assoc($med));
		$med_dob = $me['medi_dob'];
	}
	if (!isset($med_dob)) {
		$diff = "";
	} else {
		$diff = (date('Y') - date('Y', strtotime($med_dob)));
	}
	$conn=dbcon1();
	$app = mysqli_query($conn,"Select * from  appointment_temp where app_pf_number='$pf'") or die(mysqli_error($conn));
	if ($app) {
		$aap = mysqli_fetch_array($app);
		$app_designation = get_designation($aap['app_designation']);
		$app_department = get_department($aap['app_department']);
	}
	$conn=dbcon1();
	$query = mysqli_query($conn,"select * from medical_temp where medi_pf_number='$pf'");
	$tblname = 'medical';
	$blank = '';
	//echo "select * from medical_temp where medi_pf_number='$pf'".mysqli_error();
	while ($result = mysqli_fetch_array($query)) {
		$id = $result['id'];
		// echo "<script>alert();</script>"; 
		$tblname;
		$app_date = $result['medi_certidate'];
		$exm_typ = $result['medi_examtype'];
		$med_cat = $result['medi_cate'];
		$med_design = $result['medi_design'];
		$remark = $result['medi_remark'];
		$updated_date = "Created_by<br>" . substr($result['updated_by'], 5);
		// echo "<script>alert('".."');</script>";
		// echo $updated;
		// $sql = "SELECT * FROM `designation` WHERE `id` = ".$med_design."";
		// $query = mysqli_query($sql);
		// $res=mysqli_fetch_array($query);
		// $desiname=$res['desiglongdesc'];

		$med_cerno = $result['medi_certino'];
		if ($result['medi_certidate'] == '' || $result['medi_certidate'] == '1970-01-01') {
			$medi_date = '-';
		} else {
			$medi_date = $result['medi_certidate'];
		}
		$medidata = $app_date . "#" . $exm_typ . "#" . $blank . "#" . $tblname . "#" . $remark . "#" . $med_cerno . "#" . $medi_date . "#" . $updated_date . "#" . $blank . "#" . $id . ",";
		$mediarray[$data] = $medidata;
		$data++;
	}
	$sql = mysqli_query($conn,"select * from increment_temp where incr_pf_number='$pf'");
	$tablename1 = 'increment';
	$blank = ' ';
	while ($result = mysqli_fetch_array($sql)) {
		$id = $result['id'];
		$incr_date = $result['incr_date'];
		$blank;
		$tablename1;
		$incr_type = get_increment_type($result['incr_type']);
		$incr_scale = $result['incr_scale'];
		$incr_level = $result['incr_level'];
		$incr_remark = $result['incr_remark'];
		$incr_rop = $result['incr_rop'];
		$updated_date = "Created_by<br>" . substr($result['updated_by'], 5);
		$incrdata = $incr_date . "#" . $incr_type . "#" . 'New Pay-' . $incr_rop . "#" . $tablename1 . "#" . $incr_remark . "#" . $incr_level . "#" . $incr_date . "#" . $updated_date . "#" . $blank . ",";
		$mediarray[$data] = $incrdata;
		$data++;
	}
	$conn=dbcon1();
	// echo $pf;
	$sql1 = mysqli_query($conn,"select * from appointment_temp where app_pf_number='$pf'");
	// echo "select * from appointment_temp where app_pf_number='$pf'".mysqli_error();
	// $tablenamep='promotion';
	$tablenameappont = 'Initial Appointment';
	$blank = ' ';
	while ($result = mysqli_fetch_array($sql1)) {
		$id = $result['id'];
		// echo $id;
		$app_date = $result['app_date'];
		if ($app_date == '') {
			$app_date = $result['app_regul_date'];
		} else {
			$app_date = $result['app_date'];
		}
		// echo $app_date;
		// echo $app_date;
		$tablenamer;
		$app_type = get_appointment_type($result['app_type']);
		$app_letter_date = $result['app_letter_date'];
		$app_refno = $result['app_refno'];
		$app_remark = $result['app_remark'];
		$updated_date = "Created_by<br>" . substr($result['updated_by'], 5);
		$prodata = $app_date . "#" . $app_type . "#" . $blank . "#" . $tablenameappont . "#" . $app_remark . "#" . $app_refno . "#" . $app_letter_date . "#" . $updated_date . "#" . $blank . ",";
		$mediarray[$data] = $prodata;
		$data++;
	}
	//Penalty Code

	$conn=dbcon1();
	$sql1 = mysqli_query($conn,"select * from penalty_temp where pen_pf_number='$pf'");
	// echo "select * from appointment_temp where app_pf_number='$pf'".mysqli_error();
	// $tablenamep='promotion';
	$tablenameappont = 'Penalty';
	$blank = ' ';
	while ($result = mysqli_fetch_array($sql1)) {
		$id = $result['id'];
		$pen_frm_date = $result['pen_from'];
		$pen_to_date = date('d-m-Y', strtotime($result['pen_to']));
		$tablenamer;
		$pen_type = get_penalty_type($result['pen_type']);
		$app_letter_date = $result['app_letter_date'];
		$app_refno = $result['app_refno'];
		$pen_remark = $result['pen_remark'];
		$updated_date = "Created_by<br>" . substr($result['updated_by'], 5);
		$prodata = $pen_frm_date . "#" . $pen_type . "#" . $blank . "#" . $tablenameappont . "#" . $pen_remark . "#" . $app_refno . "#" . $app_letter_date . "#" . $updated_date . "#" . $pen_to_date . "#" . $blank . ",";
		$mediarray[$data] = $prodata;
		$data++;
	}




	$conn=dbcon1();
	$sql1 = mysqli_query($conn,"select * from prft_promotion_temp where pro_pf_no='$pf'");
	// echo "select * from prft_promotion_temp where pro_pf_no='$pf'".mysqli_error();
	$tablenamep = 'promotion';
	$blank = '';
	while ($result = mysqli_fetch_array($sql1)) {
		$id = $result['id'];
		$pro_wef = $result['pro_wef'];
		$rop = $result['rop_to'];
		$tablenamep;
		// $incr_type=$result['incr_type'];
		$pro_letter_no = $result['pro_letter_no'];
		$pro_letter_date = $result['pro_letter_date'];
		$pro_remark = $result['pro_remark'];
		$pro_type = $result['pro_order_type'];
		$updated_date = "Created_by<br>" . substr($result['updated_by'], 5);
		$prodata = $pro_wef . "#" . $pro_type . "#" . 'PAY-' . $rop . "#" . $tablenamep . "#" . $pro_remark . "#" . $pro_letter_no . "#" . $pro_letter_date . "#" . $updated_date . "#" . $blank . ",";
		$mediarray[$data] = $prodata;
		$data++;
	}
	$conn=dbcon1();
	$sql1 = mysqli_query($conn,"select * from prft_reversion_temp where rev_pf_no='$pf'");
	// echo "select * from prft_promotion_temp where pro_pf_no='$pf'".mysqli_error();
	// $tablenamep='promotion';
	$tablenamer = 'Reversion';
	while ($result = mysqli_fetch_array($sql1)) {
		$id = $result['id'];
		$rev_wef = $result['rev_wef'];
		$tablenamer;
		$rev_type = $result['rev_order_type'];
		$rev_letter_no = $result['rev_letter_no'];
		$rev_letter_date = $result['rev_letter_date'];
		$rev_remark = $result['rev_remark'];
		$updated_date = "Created_by<br>" . substr($result['updated_by'], 5);
		$prodata = $rev_wef . "#" . 'rev_type:-' . $rev_type . "#" . $blank . "#" . $tablenamer . "#" . $rev_remark . "#" . $rev_letter_no . "#" . $rev_letter_date . "#" . $updated_date . "#" . $blank . ",";
		$mediarray[$data] = $prodata;
		$data++;
	}
	$conn=dbcon1();
	$sql1 = mysqli_query($conn,"select * from prft_transfer_temp where trans_pf_no='$pf'");
	// echo "select * from prft_promotion_temp where pro_pf_no='$pf'".mysqli_error();
	// $tablenamep='promotion';
	$tablenametr = 'Transfer';
	$blank = '';
	while ($result = mysqli_fetch_array($sql1)) {
		$id = $result['id'];
		$trans_wef = $result['trans_wef'];
		$tablenamer;
		$trans_type = get_order_type_transfer($result['trans_order_type']);
		$trans_letter_no = $result['trans_letter_no'];
		$trans_letter_date = $result['trans_letter_date'];
		$trans_remark = $result['trans_remark'];
		$updated_date = "Created_by<br>" . substr($result['updated_by'], 5);
		$prodata = $trans_wef . "#" . $trans_type . "#" . $blank . "#" . $tablenametr . "#" . $trans_remark . "#" . $trans_letter_no . "#" . $trans_letter_date . "#" . $updated_date . "#" . $blank . ",";
		$mediarray[$data] = $prodata;
		$data++;
	}
	$conn=dbcon1();
	$sql1 = mysqli_query($conn,"select * from prft_fixation_temp where fix_pf_no='$pf'");
	// echo "select * from prft_promotion_temp where pro_pf_no='$pf'".mysqli_error();
	// $tablenamep='promotion';
	$tablenamefix = 'Fixction';
	while ($result = mysqli_fetch_array($sql1)) {
		$id = $result['id'];
		$fix_wef = $result['fix_wef'];
		if ($fix_wef == '01-01-1970') {
			$fix_wef = '-';
		}
		$tablenamefix;
		$fix_type = get_order_type_fixation($result['fix_order_type']);
		$fix_letter_no = $result['fix_letter_no'];
		if ($result['fix_letter_date'] == '1970-01-01') {
			$fix_letter_date = '-';
		} else {
			$fix_letter_date = $result['fix_letter_date'];
		}

		$fix_remark = $result['fix_remark'];
		$updated_date = "Created_by<br>" . substr($result['updated_by'], 5);
		$prodata = $fix_wef . "#" . $fix_type . "#" . $blank . "#" . $tablenamefix . "#" . $fix_remark . "#" . $fix_letter_no . "#" . $fix_letter_date . "#" . $updated_date . "#" . $blank . ",";
		$mediarray[$data] = $prodata;
		$data++;
	}
	$conn=dbcon1();
	$sql1 = mysqli_query($conn,"select * from award_temp where awd_pf_number='$pf'");
	// echo "select * from prft_promotion_temp where pro_pf_no='$pf'".mysqli_error();
	// $tablenamep='promotion';
	$tablenamefix = 'award';
	while ($result = mysqli_fetch_array($sql1)) {
		$id = $result['id'];
		$awd_date = $result['date_time'];
		$tablenamefix;
		$awd_type1 = $result['awd_type'];
		if ($awd_type1 == '1') {
			$awd_type = 'Railway Awards';
		} else {
			$awd_type = 'Other Than Railway Award';
		}
		$letter_no = $result['letter_no'];
		$letter_datetime = $result['letter_datetime'];
		$awd_detail = $result['awd_detail'];
		$updated_date = "Created_by<br>" . substr($result['updated_by'], 5);
		$prodata = $awd_date . "#" . $awd_type . "#" . $blank . "#" . $tablenamefix . "#" . $awd_detail . "#" . $letter_no . "#" . $letter_datetime . "#" . $updated_date . "#" . $blank . ",";
		$mediarray[$data] = $prodata;
		$data++;
	}
	$conn=dbcon1();
	$sql1 = mysqli_query($conn,"select * from training_temp where pf_number='$pf'");
	//echo "select * from prft_promotion_temp where pro_pf_no='$pf'".mysqli_error();
	// $tablenamet='training';
	$tablenametrain = 'Training';
	while ($result = mysqli_fetch_array($sql1)) {
		$id = $result['id'];
		$training_type = get_training_type($result['training_type']);
		$tablenametrain;
		$letter_no = $result['letter_no'];
		$letter_date = $result['letter_date'];
		$training_from = $result['training_from'];
		$description = $result['description'];
		$updated_date = "Created_by<br>" . substr($result['updated_by'], 5);
		$traindata = $training_from . "#" . $training_type . "#" . $blank . "#" . $tablenametrain . "#" . $description . "#" . $letter_no . "#" . $letter_date . "#" . $updated_date . "#" . $blank . ",";
		$mediarray[$data] = $traindata;
		$data++;
	}
	//$arr = array('11-01-2012', '01-01-2014', '01-01-2015', '09-02-2013', '01-01-2013');    
	//	function date_sort($a, $b) {
	//	return strtotime($a) - strtotime($b);
	//	}
	//usort($mediarray[0], "date_sort");
	//print_r($arr);
	sort($mediarray);
	// print_r($mediarray);
	$dates = [];
	$ids = [];
	$tbl_nm = [];
	// print_r($mediarray);
	$length = count($mediarray);
	// echo $length;
	for ($i = 0; $i < $length; $i++) {
		// $seperate_data=explode("#",$mediarray[$i]);
		// $dates[$i]=$seperate_data[0];
		// $ids[$i]=$seperate_data[1];
		// $tbl_nm[$i]=$seperate_data[2];
		// echo "helps";
		// $sort_dt=sort($dates);	 
	}
	?>
	<div class="content">
		<div id="editor"></div>
		<div class="row">
			<div class="col-md-10" style="margin-left:122px;margin-top:20px;">
				<div class="row " style="margin:10px;width:1100px;padding:20px;height:1500"><br>
					<center><b class="cntr">1</b>
						<div class="col-md-1 pull-right">
							<div class="row">
								<span style="font-size:14px;font-weight:700;border-bottom:1px solid black;margin-left:-70px;">&nbsp;जी.एस.-2/GS-2&nbsp;</span><br>
								<span style="font-size:8px;font-weight:700;border-bottom:1px solid black;margin-left:-80px;font-size:14px;">जी. 208 एफ/जी. 209 एफ</span><br>
								<span style="font-size:12px;font-weight:700;border-bottom:1px solid black;margin-left:-70px;font-size:14px;">G 208 F/G-209 F</span>
							</div>
						</div>
						<div class="col-md-11">
							<div class="row ">
								<span style="font-size:22px;font-weight:700;margin-right:-50px;">मध्य रेल</span><br>
								<span style="font-size:22px;font-weight:700;margin-right:-50px;">Central Railway</span>
							</div>
						</div>
						<div class="row" style="margin-top:80px;">
							<div class="col-md-12"><br>
								<span style="font-size:21px;font-weight:700;margin-right:20px;">सेवा-पंजी</span><br>
								<span style="font-size:21px;font-weight:700;margin-right:20px;">SERVICE REGISTER</span>
							</div>
						</div>
						<div class="row" style="margin-top:10px;">
							<div class="col-md-12"><br>
								<p style="font-weight:700;font-size:21px;text-align:justify;padding-left:20px;padding-right:20px">अराजपत्रित रेल कर्मचारियों के लिए (चतुर्थ श्रेणी के कर्मचारियों तथा कारखाने के अर्धकुशल और अकुशलश्रेणीयों कर्मचारियों को छोड़कर)<br>
									For Non- Gazetted Railway Staff (Other than Class IV Staff, including Workshop in Semi-Skilled and Un-Skilled Categories)
								</p>
							</div>
						</div>
					</center>
					<br><br><br>
					<table class="table" style="border:none;table-layout:fixed;">
						<tr>
							<td width="40%">
								<div class="col-md-6">
									<span class="" style="font-size:20px;"><b>विभाग</b></span><br>
									<span class="" style="font-size:20px;"><b>Department</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span style="text-decoration:underline;font-size:20px;"><?php echo  $pre_dept; ?></span></b>
								</div>
							</td>
							<td width="40%">
								<div class="row">
									<div class="col-md-6">
										<span class="" style="font-size:20px;"><b>कार्यालय</b></span><br>
										<span class="" style="font-size:20px;"><b>Office</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span style="text-decoration:underline;font-size:20px;"><?php echo  $pre_dept; ?></span></b>
									</div>
								</div>
							</td>
						</tr>
					</table>
					<br><br>
					<table class="table" style="table-layout:fixed;">
						<tr>
							<td width="30%" colspan="4">
								<div class="col-md-6">
									<span class="" style="font-size:20px;"><b>नाम</b></span><br>
									<span class="" style="font-size:20px;"><b>Name</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span style="text-decoration:underline;font-size:20px;"><?php echo  $emp_name; ?></span></b>
								</div>
							</td>
						</tr>
					</table>
					<br><br>
					<table class="table" style="table-layout:fixed;">
						<tr>
							<td width="30%" colspan="4">
								<div class="col-md-8">
									<span class="" style="font-size:20px;"><b>पदनाम</b></span><br>
									<span class="" style="font-size:20px;"><b>Designation</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-decoration:underline;font-size:20px;"><b><?php echo  $pre_des; ?></b></span>
								</div>
							</td>

						</tr>
					</table><br><br>
					<table class="table" style="table-layout:fixed;">
						<tr>
							<td width="30%" colspan="4">
								<div class="col-md-6">
									<span class="" style="font-size:20px;"><b>भविष्य निधि लेखा क्रमांक</b></span><br>
									<span class="" style="font-size:20px;"><b>P.F. Account No</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span style="text-decoration:underline;font-size:20px;"><?php echo  $pf; ?></span></b>
								</div>
							</td>
						</tr>
					</table><br><br>
					<table class="table" style="table-layout:fixed;">
						<tr>
							<td width="30%" colspan="4">
								<div class="col-md-6">
									<span class="" style="font-size:20px;"><b>टिकट क्रमांक</b></span><br>
									<span class="" style="font-size:20px;"><b>Ticket No.</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span style="text-decoration:underline">_______________</span><b>
								</div>
							</td>
						</tr>
					</table>
					<br><br>
					<table class="table" style="table-layout:fixed;">
						<tr>
							<td width="30%" colspan="4">
								<div class="col-md-6">
									<span class="" style="font-size:20px;"><b>वेतन क्रमांक <br>(आठ डिजीट) </b></span><br>
									<span class="" style="font-size:20px;"><b>Salary No.<br>(Eight Digit)</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span style="text-decoration:underline">_______________</span></b>
								</div>
							</td>
						</tr>
					</table><br>
				</div>
			</div>
		</div>
		<!--Page 2-->
		<div class="row pb">
			<div class=""></div>
			<div class="col-md-10" style="margin-left:122px;margin-top:90px;">
				<div class="row " style="margin:10px;width:1100px;padding:20px;height:1500;margin-top:50px;">
					<br>
					<center><b style="padding-left:50px;font-size:18px;">2</b>
						<div class="col-md-1 pull-right ">
							<div class="row">
								<span style="font-size:14px;font-weight:700;border-bottom:1px solid black;margin-left:-70px;">&nbsp;जी.एस.-2/GS-2&nbsp;</span><br>
								<span style="font-size:8px;font-weight:700;border-bottom:1px solid black;margin-left:-80px;font-size:14px;">जी. 208 एफ/जी. 209 एफ</span><br>
								<span style="font-size:12px;font-weight:700;border-bottom:1px solid black;margin-left:-70px;font-size:14px;">G 208 F/G-209 F</span>
							</div>
						</div>
						<div class="col-md-11">
							<div class="row ">
								<span style="font-size:22px;font-weight:700;margin-right:-50px;">मध्य रेल</span><br>
								<span style="font-size:22px;font-weight:700;margin-right:-50px;">Central Railway</span>
							</div>
						</div>
						<div class="row" style="margin-top:80px;">
							<div class="col-md-12"><br>
								<span style="font-size:21px;font-weight:700;margin-right:20px;">सेवा-पंजी</span><br>
								<span style="font-size:21px;font-weight:700;margin-right:20px;">SERVICE REGISTER</span>
							</div>

						</div>
						<div class="row" style="margin-top:10px;">
							<div class="col-md-12"><br>
								<p style="font-weight:700;font-size:21px;text-align:justify;padding-left:20px;padding-right:20px">अराजपत्रित रेल कर्मचारियों के लिए (चतुर्थ श्रेणी के कर्मचारियों तथा कारखाने के अर्धकुशल और अकुशलश्रेणीयों कर्मचारियों को छोड़कर)<br>
									For Non- Gazetted Railway Staff (Other than Class IV Staff, including Workshop in Semi-Skilled and Un-Skilled Categories)
								</p>
							</div>
						</div>
					</center><br><br><br>
					<table class="table" style="border:none;table-layout:fixed;">
						<tr>
							<td width="40%">
								<div class="col-md-6">
									<span class="" style="font-size:20px;"><b>विभाग</b></span><br>
									<span class="" style="font-size:20px;"><b>Department</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span style="text-decoration:underline;font-size:20px;"><?php echo  $pre_dept; ?></span></b>
								</div>
							</td>
							<td width="40%">
								<div class="row">
									<div class="col-md-6">
										<span class="" style="font-size:20px;"><b>कार्यालय</b></span><br>
										<span class="" style="font-size:20px;"><b>Office</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span style="text-decoration:underline;font-size:20px;"><?php echo  $pre_dept; ?></span></b>
									</div>
								</div>
							</td>
						</tr>
					</table><br><br>
					<table class="table" style="table-layout:fixed;">
						<tr>
							<td width="30%" colspan="4">
								<div class="col-md-6">
									<span class="" style="font-size:20px;"><b>नाम</b></span><br>
									<span class="" style="font-size:20px;"><b>Name</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span style="text-decoration:underline;font-size:20px;"><?php echo  $emp_name; ?></span></b>
								</div>
							</td>

						</tr>
					</table><br><br>
					<table class="table" style="table-layout:fixed;">
						<tr>
							<td width="30%" colspan="4">
								<div class="col-md-8">
									<span class="" style="font-size:20px;"><b>पदनाम</b></span><br>
									<span class="" style="font-size:20px;"><b>Designation</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-decoration:underline;font-size:20px;"><b><?php echo  $pre_des; ?></b></span>
								</div>
							</td>

						</tr>
					</table><br><br>
					<table class="table" style="table-layout:fixed;">
						<tr>
							<td width="30%" colspan="4">
								<div class="col-md-6">
									<span class="" style="font-size:20px;"><b>भविष्य निधि लेखा क्रमांक</b></span><br>
									<span class="" style="font-size:20px;"><b>P.F. Account No</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span style="text-decoration:underline;font-size:20px;"><?php echo  $pf; ?></span></b>
								</div>
							</td>

						</tr>
					</table><br><br>

					<table class="table" style="table-layout:fixed;">
						<tr>
							<td width="30%" colspan="4">
								<div class="col-md-6">
									<span class="" style="font-size:20px;"><b>टिकट क्रमांक</b></span><br>
									<span class="" style="font-size:20px;"><b>Ticket No.</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span style="text-decoration:underline">_______________</span><b>
								</div>
							</td>

						</tr>
					</table>
					<br><br>
					<table class="table" style="table-layout:fixed;">
						<tr>
							<td width="30%" colspan="4">
								<div class="col-md-6">
									<span class="" style="font-size:20px;"><b>वेतन क्रमांक <br>(आठ डिजीट) </b></span><br>
									<span class="" style="font-size:20px;"><b>Salary No.<br>(Eight Digit)</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><span style="text-decoration:underline">_______________</span></b>
								</div>
							</td>

						</tr>
					</table><br>
				</div>
			</div>
		</div>
		<!--Page 3-->
		<div class="row pb">
			<div class=""></div>
			<div class="col-md-10 " style="margin-left:110px;margin-top:100px;">

				<div class="row " style="margin:10px;width:1100px;padding:30px;height:1500">

					<center><b style="padding-left:50px;font-size:18px;">3</b>
						<div class="col-md-1 pull-right ">
							<div class="row">
								<span style="font-size:14px;font-weight:700;border-bottom:1px solid black;margin-left:-120px;">&nbsp;अनफध-6 ऩरयलशषि-III&nbsp;</span><br>
								<span style="font-size:14px;font-weight:700;border-bottom:1px solid black;margin-left:-120px;">Anexture-6 App-III</span><br>
								<span style="font-size:14px;font-weight:700;border-bottom:1px solid black;margin-left:-120px;">आईजीआयसी-आय/1 एभ 18 फी/ए</span>
							</div>
						</div>


						<div class="row" style="margin-top:50px;">
							<div class="col-md-12" style="margin-top:20px;"><br>
								<span style="font-size:22px;font-weight:100;margin-right:-20px;">उम्मीदवार की शारीरिक योग्यता का प्रमाण-पत्र</span><br>
								<span style="font-size:22px;font-weight:700;margin-right:-20px;">CERTIFICATE -- PHYSICAL FITNESS OF CANDIDATE</span><br>
								<span style="font-size:22px;font-weight:100;margin-right:-20px;">(रेल्वे मे नियुक्त के लिए उम्मीदवार की स्वास्थ परीक्षा लेने पर इस फार्म का उपयोग किया जाये)</span><br>
								<span style="font-size:22px;font-weight:100;margin-right:-20px;">(Certificate to be used when a candidate is medically examined for fitness for appointment to a railway)</span>
							</div>

						</div>

						<div class="col-md-1 pull-right " style="margin-top:20px;">
							<div class="row"><br>
								<span style="font-size:17px;font-weight:700;border-bottom:1px solid black;margin-left:-100px;">&nbsp;(वेतन पत्र के लिए प्रति)&nbsp;</span><br>
								<span style="font-size:15px;font-weight:100;border-bottom:1px solid black;margin-left:-100px;">(COPY FOR PAY SHEET)</span><br>

							</div>
						</div>
					</center>
					<?php
					$conn=dbcon1();
					$fe = mysqli_query($conn,'select * from medical_temp where medi_pf_number="' . $_GET['pf'] . '"');
					//echo 'select * from medical_temp where medi_pf_number="$pf"'.mysqli_error();
					$r = mysqli_fetch_array($fe);
					$class = $r['medi_class'];
					//echo "<script>alert('".$r['medi_class']."')</script>";
					?>
					<br>
					<div class="row">
						<div class="col-xs-12" style="margin-top:20px;padding-left:20px;padding-right:20px;line-height:3">
							<p style="text-align:justify;font-size:20px;">
								अस्पताल/दवाखाना/HOSPITAL/DISPENSARY&nbsp;<span style="text-decoration:underline"><b>_______</b></span>&nbsp; संख्या/ No.&nbsp;<span style="text-decoration:underline"><b>_______</b></span> &nbsp; मे एतदद्वारा प्रमाणित करता हू कि मेने श्री/श्रीमती <span style="text-decoration:underline"><b><?php echo $emp_name; ?></b></span>&nbsp; hereby certify that I have examined (Name) Age&nbsp;<span style="text-decoration:underline"><b><?php echo $diff; ?></b></span>&nbsp; को&nbsp; <span style="text-decoration:underline"><b>_______</b></span>&nbsp; श्रेणी मे <span style="text-decoration:underline">&nbsp;<b>_______</b></span> &nbsp;शाखा / विभाग मे <span style="text-decoration:underline"><b><?php echo $pre_dept; ?></b></span>&nbsp;पद पर नियुक्ती <span style="text-decoration:underline"><b>_______</b></span>&nbsp; a candidate for appointment as <span style="text-decoration:underline"><b><?php echo $app_designation; ?></b></span>&nbsp;(designation) के लिए डाक्टरी परीक्षा की (Class) <span style="text-decoration:underline"><b><?php echo $class; ?></b></span>&nbsp;in the <span style="text-decoration:underline"><b><?php echo $pre_dept; ?></b></span>&nbsp;branch/department.

							</p>

						</div>

					</div>
					<div class="row">
						<div class="col-xs-9" style="margin-top:10px;padding-left:20px;padding-right:20px;line-height:2">
							<p style="text-align:justify;font-size:20px;">
								इनके हस्ताक्षर/अंगुठा निशान मेरी उपस्थिती मे नीचे लिए गये हे |<br>
								Whose * Signature/thumb impression has been appended below in my presence.<br>
								मे इन्हे इस पद पर नियुक्ती के लिए * योग्य अयोग्य समझता हू |<br>
								I consider him * fit/unfit for such appointment.
							</p>

						</div>

					</div>
					<div class="row" style="padding-left:30px;">
						<br>
						<div class="col-xs-6" style="margin-top:10px;padding-left:20px;padding-right:20px;line-height:2">
							<p style="text-align:justify;font-size:20px;">
								पहचान चिन्ह<br>
								Mark of Identification

							</p>

						</div>
						<div class="col-xs-6 pull-right" style="margin-top:30px;padding-left:20px;line-height:1.4">
							<p style="text-align:justify;margin-left:150px;font-size:20px;">
								_______________________<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;परीक्षक के हस्ताक्षर<br>
								&nbsp;&nbsp;&nbsp;Signature of Examiner

							</p>

						</div>

					</div>
					<div class="row" style="padding-left:30px;">
						<div class="col-xs-6" style="margin-top:70px;padding-left:20px;padding-right:20px;line-height:2;">
							<p style="text-align:justify;font-size:20px;">
								कार्यालय मोहर/Office Seal


							</p>

						</div>
						<div class="col-xs-6 pull-right" style="margin-top:70px;padding-left:20px;line-height:1.4">
							<p style="text-align:justify;margin-left:170px;font-size:20px;"><b>&nbsp;&nbsp;&nbsp;<?php echo $app_designation; ?></b> <br>
								पदनाम/Designation

							</p>

						</div>

					</div>

					<div class="row" style="padding-left:30px;">
						<br>
						<div class="col-xs-6" style="margin-top:70px;padding-left:20px;padding-right:20px;line-height:2">
							<p style="text-align:justify;font-size:20px;">
								दिनांक/ Date :&nbsp;<?php echo date('d-m-Y', strtotime($r['medi_certidate'])); ?>


							</p>

						</div>
						<div class="col-xs-6 pull-right" style="margin-top:70px;padding-left:20px;line-height:1.4">
							<p style="text-align:justify;margin-left:100px;font-size:20px">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______________________<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;उमेद्वार का अंगुठा निशान<br>
								Signature/Thumb Impress of Candidate<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* जो लागू न हो उसे काट दिया जाय |<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Strike out where inapplicable


							</p>

						</div>

					</div>
				</div>
			</div>
		</div>
		<!--Page 4-->
		<div class="row pb">
			<div class=""></div>
			<div class="col-md-10" style="margin-left:110px;margin-top:100px;">

				<div class="row " style="margin:10px;width:1100px;padding:20px;height:1500">
					<?php
					$conn=dbcon1();
					$sql = mysqli_query($conn,"select * from biodata_temp where pf_number='$pf'");
					//echo "select * from biodata_temp where pf_number='$pf'".mysqli_error();
					$result = mysqli_fetch_array($sql);
					?>
					<center>
						<div class="col-md-1 pull-right ">
							<div class="" style="border:1px solid black;height:100px;width:100px;float:right;margin-right:10px;margin-top:10px;">
								<img src="upload_doc/<?php echo $result['imagefile']; ?>" height="100px" width="100px" alt=""></img>
							</div>
						</div>

						<div class="col-md-10">
							<div class="row ">
								<span style="font-size:20px;font-weight:700;margin-right:-150px;">जीवन वृत्त</span><br>
								<span style="font-size:20px;font-weight:700;margin-right:-150px;">I BIO DATA</span>
							</div>
						</div>

						<div class="row" style="margin-top:10px;">
							<div class="col-xs-1">

							</div>

						</div>
					</center><br>


					<table class="table" style="border:none;margin-top:-15px; table-layout:fixed;" width="100%">
						<tr>
							<td width="40%" style="">
								<span style="font-size:17px;font-weight:550">1. पूरा नाम (साफ अक्षरों में)</span><br>
								<span style="font-size:17px;font-weight:500">Name in full (in Block Letters)</span>
							</td>
							<td width="12%">
								<span class="" style="font-size:17px;">श्री/श्रीमती/कुमारी</span>
								<span class="" style="font-size:17px;">Shri/Smt./Kum</span>
							</td>
							<td width="35%" class="">
								<span class="" style="font-size:17px;"><b>&nbsp;</b></span><br>
								<span style="text-decoration:underline;font-size:20px;"><b><?php echo $result['emp_name']; ?></b></span>
							</td>
						</tr>
					</table>
					<table class="table" style="border:none;margin-top:-25px; table-layout:fixed;" width="100%">
						<tr>
							<td width="45%" style="">
								<span style="font-size:17px;font-weight:550">2. पिता का नाम (साफ अक्षरों में)</span><br>
								<span style="font-size:17px;font-weight:500">Father's Name (in Block Letters)</span>
							</td>

							<td width="30%">
								<span class="" style="font-size:10px;"><b>&nbsp;</b></span><br>
								<span style="text-decoration:underline;font-size:20px;"><b><?php echo $result['f_h_name']; ?></b></span>

							</td>
						</tr>
					</table>
					<table class="table" style="border:none;margin-top:-25px; table-layout:fixed;" width="100%">
						<tr>
							<td width="45%" style="">
								<span style="font-size:17px;font-weight:550">3. पति का नाम (साफ अक्षरों में))</span><br>
								<span style="font-size:17px;font-weight:500">Husband's Name (in Block Letters)</span>
							</td>
							<td width="30%">
								<span class="" style="font-size:10px;"><b>&nbsp;</b></span><br>
								<span style="text-decoration:underline;font-size:17px;"><b></b></span>
							</td>
						</tr>
					</table>
					<table class="table" style="border:none;margin-top:-25px; table-layout:fixed;" width="100%">
						<tr>
							<td width="45%" style="">
								<span style="font-size:17px;font-weight:550">4.राष्ट्रीयता(यदि भारत का नागरिक नहीं हैं तो पात्रता प्रमाण-पत्र <br>का क्र.तथा तारीख)</span><br>
								<span style="font-size:17px;font-weight:500">Nationality (If not a citizen of India,number and date<br>of
									eligibility certificate)</span>
							</td>
							<td width="30%">
								<span class="" style="font-size:10px;"><b>&nbsp;</b></span><br>
								<span style="text-decoration:underline;font-size:20px;"><b>INDIAN</b></span>
							</td>
						</tr>
					</table>



					<table class="table" style="border:none;margin-top:-25px; table-layout:fixed;" width="100%">
						<tr>
							<td width="45%" style="">
								<span style="font-size:17px;font-weight:550">5.क्या अनुसूचित जाति /जनजाति का है ?यदि हो तो,जाति बतायें </span><br>
								<span style="font-size:17px;font-weight:500">Whether a member of Scheduled Caste/ Tribe? If so,specify the community</span>
							</td>
							<td width="30%">
								<span class="" style="font-size:10px;"><b>&nbsp;</b></span><br>
								<span style="text-decoration:underline;font-size:17px;"><b><?php echo get_community($result['community']);
																							echo $result['caste']; ?> </b></span>
							</td>
						</tr>
					</table>




					<table class="table" style="border:none;margin-top:-25px; table-layout:fixed;" width="100%">
						<tr>
							<td width="45%" style="">
								<span style="font-size:17px;font-weight:550">6.इसवी सन और जहां कही संभव हो शक संवत मैं भी जन्म की तारीख(शब्दों और अंको दोनों मैं )</span><br>
								<span style="font-size:17px;font-weight:500">Date of Birth by Christian Era and wherever possible
									also in Saka Era(both in words and figures)</span>
							</td>
							<td width="30%">
								<?php
								$dob = strtoTime($result['dob']);
								$printdate = date('F d, Y', $dob);
								?>
								<span class="" style="font-size:17px;"><b>&nbsp;</b></span><br><br>
								<span style="text-decoration:underline;font-size:17px;"><b><?php echo date('d-m-Y', strtotime($result['dob']));
																							echo "(" . $printdate . ")"; ?></b></span>
							</td>
						</tr>
					</table>
					<table class="table" style="border:none;margin-top:-30px; table-layout:fixed;" width="100%">
						<tr>
							<td width="45%" style="">
								<span style="font-size:17px;font-weight:550">7.शैक्षणिक योग्यता</span><br>
								<span style="font-size:17px;font-weight:500">Educational Qualification</span>
							</td>
							<td width="30%">
								<span class="" style="font-size:10px;"><b>&nbsp;</b></span><br>
								<span style="text-decoration:underline;font-size:17px;"><b><?php echo $result['emp_name']; ?></b></span>
							</td>
						</tr>
					</table>
					<table class="table" style="border:none;margin-top:-30px; table-layout:fixed;margin-left:15px;" width="100%">
						<tr>
							<td width="42.5%" style="">
								<span style="font-size:17px;font-weight:550">(क) पहली नियुक्ति के समय</span><br>
								<span style="font-size:17px;font-weight:550">(a) At the time of First Appointment</span>
							</td>
							<td width="30%">
								<span class="" style="font-size:10px;"><b>&nbsp;</b></span><br>
								<span style="text-decoration:underline;font-size:17px;"><b><?php echo get_initial_edu($result['education_ini']); ?></b></span>
							</td>
						</tr>
					</table>
					<table class="table" style="border:none;margin-top:-30px; table-layout:fixed;margin-left:15px;" width="100%">
						<tr>
							<td width="42.5%" style="">
								<span style="font-size:17px;font-weight:550">(ख) बाद में प्राप्त की गई</span><br>
								<span style="font-size:17px;font-weight:550">(b) Subsequently acquired</span>
							</td>
							<td width="30%">
								<span class="" style="font-size:10px;"><b>&nbsp;</b></span><br>
								<span style="text-decoration:underline;font-size:17px;"><b><?php echo get_sub_edu($result['education_sub']); ?></b></span>
							</td>
						</tr>
					</table>
					<table class="table" style="border:none;margin-top:-20px; table-layout:fixed;" width="100%">
						<tr>
							<td width="45%" style="">
								<span style="font-size:17px;font-weight:550">8.ऐसी व्यावसायिक तथा तकनीकी योग्यताएं जिनका उल्लेख तक्ता ७ में न किया गया हो</span><br>
								<span style="font-size:17px;font-weight:500">Professional and Technical Qualifications not covered by 7</span>
							</td>
							<td width="30%">
								<span class="" style="font-size:10px;"><b>&nbsp;</b></span><br>
								<span style="text-decoration:underline;font-size:17px;"><b></b></span>
							</td>
						</tr>
					</table>
					<table class="table" style="border:none;margin-top:-20px; table-layout:fixed;" width="100%">
						<tr>
							<td width="45%" style="">
								<span style="font-size:17px;font-weight:550">9. माप के अनुसार वास्तविक कद सेंटीमीटर मैं (बिना जूतों के)</span><br>
								<span style="font-size:17px;font-weight:550">Exact Height by Measurement in centimeters (without Shoes)</span>
							</td>
							<td width="30%">
								<span class="" style="font-size:10px;"><b>&nbsp;</b></span><br>
								<span style="text-decoration:underline;font-size:12px;"><b></b></span>
							</td>
						</tr>
					</table>

					<table class="table" style="border:none;margin-top:-20px; table-layout:fixed;" width="100%">
						<tr>
							<td width="37%" style="">
								<span style="font-size:17px;font-weight:550">10.पहचान का वैयक्तिक चिन्ह</span><br>
								<span style="font-size:17px;font-weight:550">Personal mark of Identification</span>
							</td>
							<td width="8%">
								<span class="" style="font-size:17px;">(1)</span><br>
								<span class="" style="font-size:17px;">(2)</span>
							</td>
							<td width="30%">
								<?php
								$var = explode(',', $result['identification_mark']);
								?>
								<span style="text-decoration:underline;font-size:17px;"><b><?php echo $var[0]; ?></b></span><br>
								<span style="text-decoration:underline;font-size:17px;"><b><?php echo $var[1]; ?></b></span>

							</td>
						</tr>
					</table>

					<table class="table" style="border:none;margin-top:-20px; table-layout:fixed;" width="100%">
						<tr>
							<td width="45%" style="">
								<span style="font-size:17px;font-weight:550">11. स्थायी घर का पता</span><br>
								<span style="font-size:17px;font-weight:550">Permanent Home Address</span>
							</td>
							<td width="30%">
								<span class="" style="font-size:10px;"><b>&nbsp;</b></span><br>
								<span style="text-decoration:underline;font-size:17px;"><b><?php echo $result['permanent_address']; ?></b></span>
							</td>
						</tr>
					</table>
					<table class="table" style="border:none;margin-top:-20px; table-layout:fixed;" width="100%">
						<tr>
							<td width="45%" style="">
								<span style="font-size:17px;font-weight:550">12.सरकारी कर्मचारी के हस्ताक्षर अथवा बाएं हात के अंगूठे का निशान(तारीख सहित)</span><br>
								<span style="font-size:17px;font-weight:550">Signature or Left Hand Thumb Impression of the Government Servant(with date)</span>
							</td>
							<td width="30%">
								<span class="" style="font-size:10px;"><b>&nbsp;</b></span><br><br>
								<span style="text-decoration:underline;font-size:17px;"><b></b></span>
							</td>
						</tr>
					</table>
					<table class="table" style="border:none;margin-top:-20px; table-layout:fixed;" width="100%">
						<tr>
							<td width="45%" style="">
								<span style="font-size:17px;font-weight:550">13.साक्ष्यांकन अधिकारी के हस्ताक्षर तथा पदनाम (तारीख सहित)</span><br>
								<span style="font-size:17px;font-weight:500">Signature and Designation of Attesting Officer (with date)</span>
							</td>
							<td width="30%">
								<span class="" style="font-size:10px;"><b>&nbsp;</b></span><br>
								<span style="text-decoration:underline;font-size:17px;"><b></b></span>
							</td>
						</tr>
					</table>
					<table class="table" style="border:none;margin-top:-25px; table-layout:fixed;" width="100%">
						<tr>
							<td width="45%" style="">
								<span style="font-size:17px;font-weight:550">नियुक्ति के पहले कार्यालय प्रमुख द्वारा साक्ष्यांकित किया जाता है |</span><br>
								<span style="font-size:17px;font-weight:500">To be attested by the Head of Office before posting</span>
							</td>
							<td width="30%">
								<span class="" style="font-size:10px;"><b>&nbsp;</b></span><br>
								<span style="text-decoration:underline;font-size:12px;"><b></b></span>
							</td>
						</tr>
					</table>
					<table class="table" style="border:none;margin-top:-25px; table-layout:fixed;" width="100%">
						<tr>
							<td width="45%">
								<span style="font-size:17px;font-weight:550">आधार कार्ड नंबर/Aadhar Card Number </span><br>
							</td>
							<td width="30%">
								<span class="" style="font-size:17px;"><b><?php echo $result['aadhar_number']; ?></b></span><br>
							</td>
						</tr>
					</table>
					<div class="row" style="font-size:10px;margin-left:12px;">
						<label>टिप्पण्णी :-सरकारी कर्मचारी की १० वर्ष की सेवा के बाद नया फोटोग्राफ लगाया जाये। <br>Note : Photograph should be renewed after 10 years of service of Government Servant.<br><label style="margin-left:20px;">*चिपकाने से पहले कार्यालय प्रमुख द्वारा साक्ष्यांकित किया जाना हैं। * <br>&nbsp;* To be attested by the head of office before posting.<label>

					</div>



				</div>
			</div>
		</div>



		<!--Page 5-->
		<div class="row pb">
			<div class=""></div>
			<div class="col-md-10" style="margin-left:110px;margin-top:100px;">

				<div class="row " style="margin:10px;width:1100px;padding:20px;height:1500">
					<br>
					<center><b style="padding-left:50px;font-size:20px;">5</b>
						<div class="col-md-1 pull-right ">

						</div>

						<div class="col-md-11">
							<div class="row ">
								<span style="font-size:20px;font-weight:700;margin-right:-50px;">II प्रमाणपत्र और साक्ष्यांकन</span><br>
								<span style="font-size:20px;font-weight:700;margin-right:-50px;">CERTIFICATE AND ATTESTATION</span>
							</div>
						</div>


					</center><br>
					<div class="col-md-12">
						<div class="table-responsive" style="margin-top:10px;">
							<table class="table" border="2" style="border-collapse:collapse;font-size:16px;" width="100%">
								<tr>
									<th width="5%" style="font-size:17px;"><span class="">क्रम. सं <br>S.<br>No</span>
									</th>
									<th width="20%" class="" style="text-align:center;font-size:17px;"><span class="">विषय <br>Subject</span></th>
									<th width="50%" style="text-align:center;font-size:17px;" class=""><span class="">प्रमाण पत्र <br>Certificate</span></th>
									<th class=""><span style="font-size:17px;text-align:center;" width="25%">प्रमाणकर्ता अधिकारी के हस्ताक्षर तथा पदनाम <br>Signature and Designation of the certifying Officer</span></th>

								</tr>
								<tr align="center">
									<td class=""><span class=""><b>1</b></span></td>
									<td class=""><span class=""><b>2</b></span></td>
									<td class=""><span class=""><b>3</b></span></td>
									<td class=""><span class=""><b>4</b></span></td>

								</tr>
								<tr style="height:10px;padding:2px;font-size:16px;">
									<td style="padding:5px;"> <span class="">1</span></td>
									</td>
									<td style="padding:5px;"> <span class="">स्वास्थ परीक्षा<br>Medical Examination</span></td>
									<td style="padding:5px;"> <span class=""> कर्मचारी की &nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; द्वारा स्वास्थ्य परीक्षा की गई और वह स्वस्थ पाया गया। स्वास्थ्य प्रमाण पत्र पूरी तरह सुरक्षित रख लिया गया है देखिये सेवा पंजी के खण्ड II की क्रम सं.&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;<br>The employee was medically examined by &nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; on&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; and found fit.The medical certificate has been kept in safe custody vide S.No. &nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; of volume-II of the Service Book.</span> </td>
									<td style="padding:5px;"><span class=""> &nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;</span> </td>
								</tr>
								<tr style="height:10px;font-size:16px;">
									<td style="padding:5px;"> <span class="">2</span></td>
									<td style="padding:5px;"> <span class="">चरित्र तथा पूर्ववृत्त <br>Character & <br> antecedent</span> </td>
									<td style="padding:5px;"> <span class="">उसके चरित्र और पूर्ववृत्त की जांच कराई जा चुकी हैं और जांच रिपोर्ट पूरी तरह सुरक्षित रख ली गयी है।देखिये सेवा पंजी के खण्ड II की क्रम सं. &nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;<br>His/Her character and antecedent have been verified and the verification report kept in safe custody vide S.No. &nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;of volume-II of the Service Book. </span></td>
									<td style="padding:5px;">&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; </td>

								</tr>
								<tr style="height:15px;font-size:16px;">
									<td style="padding:5px;"> <span class="">3</span> </td>
									<td style="padding:5px;"> <span class="">सविंधान के प्रति निष्ठा <br>Allegiance to the Constitution </span></td>
									<td style="padding:5px;"><span class="">उसने सविधान के प्रति निष्ठा की शपथ ले ली है ,प्रतिज्ञा कर ली हैं देखिये सेवा पंजी खण्ड II की क्रम सं.&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;<br> He/Her has taken the oath of allegation/Affirmation to the Constitution vide S.No.&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; of volume-II of the Service Book.</span> </td>
									<td style="padding:5px;">&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; </td>
								</tr>
								<tr style="height:15px;font-size:16px;">
									<td style="padding:5px;"> <span class="">4</span> </td>
									<td style="padding:5px;"><span class="">वैवाहिक स्थिती<br>Marital Status</span> </td>
									<td style="padding:5px;"><span class="">उसने इस आशय की घोषणा कर दी हैं कि उसकी/उसके दो जीवित पत्नियां /पति नहीं हैं। संबंधित घोषणा पत्र की सेवा-पंजी खण्ड II की क्रम संख्या.&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;<br>He/Her has furnished declaration regarding his/her not having contracted bigamous marriage.The relevant declaration has been filed at S.No.&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; of volume-II of the Service Book. </span> </td>
									<td style="padding:5px;">&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; </td>
								</tr>
								<tr style="height:15px;font-size:16px;">
									<td style="padding:5px;"><span class="cls_005">5</span> </td>
									<td style="padding:5px;"><span class="cls_005">मूल निवास स्थान संबंधी घोषणा-पत्र <br>Declaration of home<br> town</span> </td>
									<td style="padding:5px;"><span class="cls_005">उसने मूल निवास स्थान संबंधी घोषणा पत्र दे दिया है कि स्वीकार कर लिया गया है और उसे सेवा-पंजी के खण्ड II की क्रम सं.&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;पर रख दिया गया है <br>He/She has furnished the declarationof home town which has been accepted and filed at S.No. &nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; of volume-II of the Service Book.</span> </td>
									<td style="padding:5px;">&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; </td>
								</tr>

								<tr style="height:15px;font-size:16px;">
									<td style="padding:5px;"><span class="cls_005">6</span> </td>
									<td style="padding:5px;"> <span class="cls_005">भाग I में इंदराजो का सत्यपान <br>Verification of entries in part-I</span> </td>
									<td style="padding:5px;"> <span class="cls_005"><br>भाग १ (जीवन वृत्त ) की क्रम सं सामने किये गये इंदराजो के सही होने सत्यापन प्रमाणपत्रो कि संबंधित उद्देश्यों के साक्ष्य के वैध दस्तावेज माने जाते है,किया जा चुका है। इन प्रमाण पत्रों की साक्ष्यांकित प्रतिया सेवा पंजी खण्ड II की क्रम सं &nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;<br>The correctness of the entries against S.Nos.5-8 of part'Bio-Data' has been verified from original certificates considered as valid documentary evidence for the respective purpose.Attested copies of these certificates have been filed at S.No.&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; of volume-II of the Service Book. </span> </td>
									<td style="padding:5px;"> &nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; </td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Page 6-->

		<div class="row pb">

			<div class=""></div>
			<div class="col-md-10" style="margin-left:110px;margin-top:100px;">

				<div class="row " style="margin:10px;width:1100px;padding:20px;height:1500">
					<br>
					<center><b style="padding-left:50px;">6</b>
						<div class="col-md-1 pull-right ">

						</div>
					</center><br>
					<div class="col-md-12">
						<div class="table-responsive" style="margin-top:10px;">
							<table class="table" border="1" style="border-collapse:collapse;font-size:17px;" width="100%">
								<tr>
									<th width="5%" class=""><span class="">क्रम. सं <br>S.<br>No</span>
									</th>
									<th width="20%" class="" style="text-align:center"><span class="">विषय <br>Subject</span></th>
									<th width="50%" style="text-align:center" class=""><span class="">प्रमाण पत्र <br>Certificate</span></th>
									<th class=""><span class="" width="25%">प्रमाणकर्ता अधिकारी के हस्ताक्षर तथा पदनाम /Signature and Designation of the certifying Officer</span></th>

								</tr>
								<tr align="center">
									<td class=""><span class=""><b>1</b></span></td>
									<td class=""><span class=""><b>2</b></span></td>
									<td class=""><span class=""><b>3</b></span></td>
									<td class=""><span class=""><b>4</b></span></td>

								</tr>
								<tr style="height:15px;border-left:none;padding:2px;font-size:17px;">
									<td style="padding:5px;"> <span class="">7</span></td>
									</td>
									<td style="padding:5px;"> <span class="">(क) राज्य रेल भविष्य निधि संख्या <br>(a) S. R. P. F.NO </span></td>
									<td style="padding:5px;"> <span class=""><span style="font-weight:800"><?php echo  $pf; ?></span><br></span> </td>
									<td style="padding:5px;"><span class=""></span> &nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;</td>
								</tr>
								<tr style="height:10px;font-size:17px;">
									<td style="padding:5px;"> <span class=""></span></td>
									<td style="padding:5px;"> <span class="">(ख) राज्य रेल भविष्य <br> &nbsp;&nbsp; निधि के लिये नामांकन <br> (b) Nomination for S.R.P.F</span> </td>
									<td style="padding:5px;"> <span class="">उसने राज्य रेल भविष्य निधि के लिये नामांकन भर दिया हें और निम्नलिखित संबंधित नोटिस जो उनके सामने दी गयी तारीख को लेखा अधिकारी को भेज दिया हें सेवा पंजी के खण्ड II में रख दिये गये हें |<br>He/ She has filed nomination for SRPF and the following related notices which have been forwarded to the Accounts Officer on dates shown against them have been filed in the volume II of the service book.<br>
											1.&nbsp;<span style="text-decoration:underline"><b><a href="#nom_detail">Anexture-Nominees</a></b></span>&nbsp;<br>
											2.&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;<br>
											3. &nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;</td>
									<td style="padding:5px;"> &nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; </td>


								</tr>
								<tr style="height:15px;font-size:17px;">
									<td style="padding:5px;"> <span class="">8</span> </td>
									<td style="padding:5px;"> <span class="">परिवार का विवरण <br>Family Particulars </span></td>
									<td style="padding:5px;"><span class="">उसने परिवार के सदस्यों का विवरण दे दिया हें जिसे सेवा पंजी के खण्ड II की क्रम सं. &nbsp;<span style="text-decoration:underline"><b><a href="#fmy_detail">Anexture-Family</a></b></span>&nbsp; पर रख दिया गया हें |<br> He/ She has furnished details of the family members which have been filed at S. No. &nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; of volume II of the service book.</span> </td>
									<td style="padding:5px;">&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; </td>
								</tr>
								<tr style="height:15px;font-size:17px;">
									<td style="padding:5px;"> <span class="cls_005">9</span> </td>
									<td style="padding:5px;"><span class="cls_005">मृत्यु तथा निवृति उपदान <br> D. C. R. Gratuity</span> </td>
									<td style="padding:5px;"><span class="cls_005">उसने मृत्यु तथा निवृति उत्पादन संबंधी नामांकन निम्नलिखित संबंधित नोटिस भर दिये गये हें जिन्हें सेवा पंजी के खण्ड II में उसके सामने दी गई क्रम संख्या पर रख दिया गया हें <br>He/She has filed nomination of DCR Gratuity and the following related notices which have been filed in volume II of the service book vide S. Nos. shown against them.<br>
											1.&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;<br>
											2.&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;<br>
											3.&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;
										</span> </td>
									<td style="padding:5px;"> &nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;</td>
								</tr>
								<tr style="height:15px;font-size:17px;">
									<td style="padding:5px;"> <span class="cls_005">10</span> </td>
									<td style="padding:5px;"><span class="cls_005">केन्द्रीय सरकारी कर्मचारी ग्रुप बीमा योजना 1980 के लिए नामांकन <br>Nomination for Central Government Employees Group Insurance scheme 1980</span> </td>
									<td style="padding:5px;"><span class="cls_005">उसने मृत्यु तथा निवृति उत्पादन संबंधी नामांकन निम्नलिखित केन्द्रीय सरकारी कर्मचारी ग्रुप बीमा योजना 1980 के लिए नामांकन निम्नलिखित संबंधित नोटिस जो उनके सामने दी गयी तारीख को भेज दिए गये हें, सेवा पंजी के खण्ड II में रख दिये गये हें |<br>He/ She has filed nomination for GIS 1980 the following related notices which has been forwarded to the Accounts Officer on the date shown against them have been filed in the volume-II of the Service Book.<br>
											1.&nbsp;<span style="text-decoration:underline"><b></span>__________</b><br>
											2.&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;<br>
											3.&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp;
										</span> </td>
									<td style="padding:5px;">&nbsp;<span style="text-decoration:underline"><b>__________</b></span>&nbsp; </td>
								</tr>
							</table>
						</div>
						<div class="row">
							<p style="text-align:justify;font-size:10px;padding-left:15px;">
								* जब किसी कर्मचारी आबंटित सामान्य राज्य रेल भविष्य निधि खाते की संख्या में तबदीली होती हें, तो यहाँ पर तबदीली के लिए प्राधिकार सहित बदली हुई संख्या दिखायी जायेगी |<br>
								* When SRPF number allotted to an official changes, the changed number will be entered here, along with the authority for the change.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Page 7-->
		<div class="row pb">
			<div class=""></div>
			<div class="col-md-10" style="margin-left:110px;margin-top:100px;">

				<div class="row " style="margin:10px;width:1100px;padding:20px;height:1500">
					<br>
					<center><b style="padding-left:50px;font-size:20px;">7</b>
						<div class="col-md-1 pull-right ">

						</div>

						<div class="col-md-11">

						</div>


						<div class="row" style="margin-top:10px;">
							<div class="col-md-12"><br>
								<p style="font-weight:100;font-size:16px;text-align:justify;padding-left:20px;padding-right:20px">प्रमाणपत्रों का अभिलेख जो कि सेवा संबंधी मामलो मैं विकल्प प्रदानीकरण से निगडित तथा विभागीय और भाषा की कसौटी परीक्षाए पारित करने के लिए जारी सभी अन्य प्रमाणपत्रों का अभिलेख,यदि हो।<br>
									Record of certificates like those concerning exercising of option in service matters and passing of departmental and language test and record of other certificates, if any.
								</p>
							</div>

						</div>
					</center><br>

					<div style="position:absolute;padding-left:20px;top:260px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:280px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:300px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:320px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:340px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:360px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:380px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:400px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:420px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:440px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:460px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:480px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:500px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:520px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:540px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:560px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:580px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:600px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:620px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:640px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:660px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:680px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:700px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:720px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:740px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:760px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:780px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:800px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:820px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:840px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:860px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:880px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:900px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:920px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:940px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:960px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:980px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
					<div style="position:absolute;padding-left:20px;top:1000px" class=""><span class="">__________________________________________________________________________________________________________________________________ </span></div>
				</div>
			</div>
		</div>
		<!--Page 8-->
		<div class="row pb">
			<div class=" "></div>
			<div class="col-md-10" style="margin-left:110px;margin-top:100px;">

				<div class="row " style="margin:10px;width:1100px;padding:20px;height:1500">
					<br>
					<center><b style="padding-left:50px;font-size:20px;">8</b>
						<div class="col-md-1 pull-right ">

						</div>

						<div class="col-md-11">
							<div class="row ">
								<span style="font-size:20px;font-weight:700;margin-right:-50px;">III. पिछली अर्हक सेवा और बाह्य विभाग सेवा</span><br>
								<span style="font-size:20px;font-weight:700;margin-right:-50px;">PREVIOUS QUALIFYING SERVICE AND FOREIGN SERVICE</span>
							</div><br>
							<div class="row ">
								<span style="font-size:18px;font-weight:700;margin-right:-50px;">(क) पिछली अर्हक सेवा</span><br>
								<span style="font-size:18px;font-weight:700;margin-right:-50px;">(a) Previous Qualifying Service</span>
							</div>
						</div>


						<div class="row" style="margin-top:10px;">


						</div>
					</center><br>

					<div class="table-responsive">
						<table class="table" border="1" style="border-collapse:collapse;font-size:15px;" width="100%">
							<tr style="font-size:16px;">
								<th colspan="2" width="20%" style="text-align:center" class=""><span class="">अवधि /Period</span>
								</th>
								<th rowspan="2" width="25%" style="text-align:center" class=""><span class="">पद /Post Heid</span></th>
								<th rowspan="2" width="25%" class=""><span class="">प्रयोजन जिसके लिये यह अर्हक होती है Purposes for which it qualifies</span></th>
								<th rowspan="2" class=""><span class="" width="25%">प्रमाणकर्ता अधिकारी के हस्ताक्षर तथा पदनाम Signature and Designation of the certifying Officer</span></th>
							<tr style="font-size:16px;text-align:center">
								<th class=""><span class="">से / From</span></th>
								<th class=""><span class=""> तक / To</span></th>
							</tr>
							</tr>
							<tr align="center" style="font-size:16px;">
								<td class=""><span class="">1</span></td>
								<td class=""><span class="">2</span></td>
								<td class=""><span class="">3</span></td>
								<td class=""><span class="">4</span></td>
								<td class=""><span class="">5</span></td>
							</tr>
							<tr style="height:15px;border-left:none;font-size:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>

						</table>


					</div>



				</div>
			</div>
		</div>
		<!--Page 9-->
		<Div class="row pb">
			<div class=""></div>
			<div class="col-md-10" style="margin-left:110px;margin-top:100px;">

				<div class="row " style="margin:10px;width:1100px;padding:20px;height:1500">
					<br>
					<center><b style="padding-left:50px;font-size:20px">9</b>
						<div class="col-md-1 pull-right ">

						</div>

						<div class="col-md-11">
							<div class="row ">
								<span style="font-size:20px;font-weight:700;margin-right:-50px;">(क) बाह्य विभाग सेवा</span><br>
								<span style="font-size:20px;font-weight:700;margin-right:-50px;">(b) Foreign Service</span>
							</div>
						</div>


						<div class="row" style="margin-top:10px;">


						</div>
					</center><br>

					<div class="table-responsive">
						<table class="table" border="1" style="border-collapse:collapse;font-size:12px;" width="100%">
							<tr style="font-size:16px;">
								<th colspan="2" width="20%" style="text-align:center" class=""><span class="">अवधि /Period</span>
								</th>
								<th rowspan="2" width="25%" style="text-align:center" class=""><span class="">पद तथा बाह्य विभाग सेवा के नियोक्ता का नाम /Post Heid and name of foreign employer</span></th>
								<th rowspan="2" width="25%" class=""><span class="">छुट्टी तथा पेंशन अंशदान किसके द्वारा देय है /Leave and pension contribution payable by</span></th>
								<th rowspan="2" class=""><span class="" width="25%">छुट्टी तथा पेंशन अंशदान जो की वास्तव में प्राप्त हुआ /Amount of leave and pension contribution actually received</span></th>
							<tr style="font-size:16px;">
								<th class=""><span class="">से/From</span></th>
								<th class=""><span class=""> तक /To</span></th>
							</tr>
							</tr>
							<tr align="center" style="font-size:15px;">
								<td class=""><span class="">1</span></td>
								<td class=""><span class="">2</span></td>
								<td class=""><span class="">3</span></td>
								<td class=""><span class="">4</span></td>
								<td class=""><span class="">5</span></td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr style="height:15px;">
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>

						</table>


					</div>
				</div>
			</div>
		</div>
		<?php
		$conn=dbcon1();
		$sgdval = "";

		$pre_desig = "";
		$pre_depart = "";

		$ogdval = "";
		$sql = mysqli_query($conn,"select * from present_work_temp where preapp_pf_number='$pf'");
		$result = mysqli_fetch_array($sql);
		$sd = $result['sgd_dropdwn'];
		$pre_depart = get_department($result['preapp_department']);
		$rop = $result1['preapp_rop'];
		//echo "<script> alert('$sd');</script>";
		if ($sd == 1) {
			$sgdval = "YES";
			$pre_desig = get_designation($result['ogd_desig']);
			//echo "<script>alert('".$result['ogd_desig']."');</script>";
			//$ogdval="NO";
		} else {
			//$sgdval="NO";
			$ogdval = "YES";
			$pre_desig = get_designation($result['sgd_designation']);
			//echo "<script>alert('".$result['sgd_designation']."');</script>";
		}

		?>



		<!---------------------------------------PAGE 10--------------------------------------------->
		<div class="row pb page-break">
			<div class=""></div>
			<div class="col-md-12 abc " style="margin-left:-5px;margin-right:-5px;margin-top:50px;" id="">
				<div class="row " style="margin:10px;width:1500px;padding:10px;height:1100;page-break-inside:inherit">
					<br>
					<center>
						<b style="margin-right:550px;font-size:20px;">10</b>
						<div class="col-xs-5 pull-left ">
							<span style="font-size:10px;font-weight:700;margin-left:-355px;">&nbsp;1.पहली नियुक्ती कि तारीख/ Date of First Appointment&nbsp;</span><br>
							<span style="font-size:10px;font-weight:700;margin-left:-355px;">&nbsp;2.पहली नियुक्ती का स्थान/ Place of First Appointment&nbsp;</span><br>
							<span style="font-size:10px;font-weight:700;margin-left:-400px;">&nbsp;3.नियुक्ति का पद/Capacity on Appointment&nbsp;</span><br>
							<span style="font-size:10px;font-weight:700;margin-left:-255px;">&nbsp;4.नियुक्ति के समय वेतन और वेतन-मान/Payment and Grade on Appointment&nbsp;</span><br>
							<span style="font-size:10px;font-weight:700;margin-left:-402px;">&nbsp;5.नियुक्ति प्राधिकारी/ Appointing Authority&nbsp;</span><br>
						</div>

						<div class="col-xs-7">
							<div class="row pull-left" style="margin-right:200px;">
								<span style="font-size:20px;font-weight:700;">IV सेवा-वृत तथा उसका सत्यापन</span><br>
								<span style="font-size:20px;font-weight:700;">History and verification Service</span>
							</div>
						</div>
						<div class="row" style="margin-top:10px;">
						</div>
					</center><br>

					<div class="">
						<table class="table" border="1" style="border-collapse:collapse;font-size:10px;page-break-inside:auto;" width="100%">
							<!--thead-->
							<tr style="font-size:12px;">
								<th rowspan="2" width="1%" style="text-align:left" class=""><span class=""><br>क्रम<br>सं. <br>Sr.<br>No</span></th>
								<th colspan="2" width="4%" style="text-align:center" class=""><span class=""><br>अवधि<br>Period</span></th>
								<th rowspan="2" width="20%" style="text-align:center" class=""><span class=""><br><br>पद, वेतमान तथा कार्यालय (स्थान सहित)<br>Post, Scale of pay and Office(with Station)</span></th>
								<th colspan="2" width="2%" style="text-align:center" class=""><span class=""><br>वेतन<br>Pay</span></th>
								<th rowspan="2" width="25%" style="text-align:center" class=""><span class=""><br><br><br>खाना 4-6 की प्रमाणत करनेवाली घटना (देखिए अनुदेश 10)<br>Event Affecting Clos4-6 (vide Instruction 10)</span></th>
								<th rowspan="2" width="7%" style="text-align:center" class=""><span class="">सत्यापन अधिकारी के हस्ताक्षर तथा पदनाम (तारीख सहित)<br>Signature and Designation of Attesting Officer (with date)</span></th>
								<th rowspan="2" width="7%" style="text-align:center" class=""><span class="">सत्यापन अधिकारी के हस्ताक्षर तथा पदनाम (तारीख सहित)<br>Signature and Designation of Verifying officer(with date)</span></th>
								<th rowspan="2" width="4%" style="text-align:center" class=""><span class="">सरकारी कर्मचारी के हस्ताक्षर<br>
										Signature of Govt. Servant</span></th>
								<th rowspan="2" width="15%" style="text-align:center" class=""><span class=""><br><br><br>अभुक्ति<br>Remarks</span></th>

							<tr style="font-size:10px;">
								<th class="" width="6%" style="text-align:center"><span class=""><br>से<br>From</span></th>
								<th class="" width="4%" style="text-align:center"><span class=""> <br>तक<br>To</span></th>
								<th class="" width="2%" style="text-align:center"><span class=""><br>मूल <br>Substantive</span></th>
								<th class="" width="2%" style="text-align:center"><span class=""><br> स्थानापन्न<br>Officiating</span></th>
							</tr>
							</tr>

							<tr align="center" style="font-size:10px;border:1px solid black">
								<td class=""><span class="">1</span></td>
								<td class=""><span class="">2</span></td>
								<td class=""><span class="">3</span></td>
								<td class=""><span class="">4</span></td>
								<td class=""><span class="">5</span></td>
								<td class=""><span class="">6</span></td>
								<td class=""><span class="">7</span></td>
								<td class=""><span class="">8</span></td>
								<td class=""><span class="">9</span></td>
								<td class=""><span class="">10</span></td>
								<td class=""><span class="">11</span></td>
							</tr>
							<!--/thead-->


							<?php $conn=dbcon1();
							$tbl_nm;
							$ids;
							$dates;
							$cnt = 0;
							$break = 0;

							$page_cnt = 10;
							for ($i = 0; $i < $length; $i++) {
								$cnt++;
								$break++;
								$split = explode("#", $mediarray[$i]);
								// print_r($split);
								$split_cnt = count($split);
								if ($split[6] == '') {
									$split[6] = '-';
								} else {
									$split[6] = date('d-m-Y', strtotime($split[6]));
								}

								echo "<tbody style='border:1px solid black;'>";
								echo "<tr style='height:10px;font-size:11px;border-left:none;text-transform:uppercase;'>";
								echo "<td colspan='' style='border:1px solid black;text-align:center'>$cnt</td>";
								echo "<td width='10%'>" . date('d-m-Y', strtotime($split[0])) . "</td>";
								echo "<td>" . $split[8] . "</td>";
								echo "<td>" . $split[1] . "<br>" . $split[2] . "</td>";
								echo "<td></td>";
								echo "<td><br></td>";
								echo "<td>" . $split[3] . "<br><b>Remarks:- &nbsp;</b>" . $split[4] . "</td>";
								echo "<td>" . $split[7] . "</td>";
								echo "<td></td>";
								echo "<td></td>";
								echo "<td>Off.Ord.No:" . $split[5] . "<br>Off.Ord.Date:" . $split[6] . "</td>";
								echo "</tr>";
								if ($break == '6') {
									$break = 0;
									$page_cnt++;
							?>
									</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row pb">
			<div class=""></div>
			<div class="col-md-12 abc" style="margin-left:-5px;margin-right:-5px;margin-top:50px;" id="">
				<div class="row " style="margin:10px;width:1500px;padding:10px;height:1100;">
					<br>
					<center><b style="margin-right:500px;font-size:20px;"><?php echo $page_cnt; ?></b>
						<div class="col-xs-5 pull-left ">
							<span style="font-size:10px;font-weight:700;margin-left:-355px;">&nbsp;1.पहली नियुक्ती कि तारीख/ Date of First Appointment&nbsp;</span><br>
							<span style="font-size:10px;font-weight:700;margin-left:-355px;">&nbsp;2.पहली नियुक्ती का स्थान/ Place of First Appointment&nbsp;</span><br>
							<span style="font-size:10px;font-weight:700;margin-left:-400px;">&nbsp;3.नियुक्ति का पद/Capacity on Appointment&nbsp;</span><br>
							<span style="font-size:10px;font-weight:700;margin-left:-255px;">&nbsp;4.नियुक्ति के समय वेतन और वेतन-मान/Payment and Grade on Appointment&nbsp;</span><br>
							<span style="font-size:10px;font-weight:700;margin-left:-402px;">&nbsp;5.नियुक्ति प्राधिकारी/ Appointing Authority&nbsp;</span><br>
						</div>

						<div class="col-xs-7">
							<div class="row pull-left" style="margin-right:200px;">
								<span style="font-size:20px;font-weight:700;">IV सेवा-वृत तथा उसका सत्यापन</span><br>
								<span style="font-size:20px;font-weight:700;">History and verification Service</span>
							</div>
						</div>

						<div class="row" style="margin-top:10px;">
						</div>
					</center><br>
					<div class=" ">
						<table class="table" border="1" style="border-collapse:collapse;font-size:10px;" width="100%" id="">
							<!--thead-->
							<tr style="font-size:12px;">
								<th rowspan="2" width="1%" style="text-align:left" class=""><span class=""><br>क्रम<br>सं. <br>Sr.<br>No</span></th>
								<th colspan="2" width="5%" style="text-align:center" class=""><span class=""><br>अवधि<br>Period</span></th>
								<th rowspan="2" width="10%" style="text-align:center" class=""><span class=""><br><br>पद, वेतमान तथा कार्यालय (स्थान सहित)<br>Post, Scale of pay and Office(with Station)</span></th>
								<th colspan="2" width="5%" style="text-align:center" class=""><span class=""><br>वेतन<br>Pay</span></th>
								<th rowspan="2" width="20%" style="text-align:center" class=""><span class=""><br><br><br>खाना 4-6 की प्रमाणत करनेवाली घटना (देखिए अनुदेश 10)<br>Event Affecting Clos4-6 (vide Instruction 10)</span></th>
								<th rowspan="2" width="7%" style="text-align:center" class=""><span class="">सत्यापन अधिकारी के हस्ताक्षर तथा पदनाम (तारीख सहित)<br>Signature and Designation of Attesting Officer (with date)</span></th>
								<th rowspan="2" width="7%" style="text-align:center" class=""><span class="">सत्यापन अधिकारी के हस्ताक्षर तथा पदनाम (तारीख सहित)<br>Signature and Designation of Verifying officer(with date)</span></th>
								<th rowspan="2" width="4%" style="text-align:center" class=""><span class="">सरकारी कर्मचारी के हस्ताक्षर<br>
										Signature of Govt. Servant</span></th>
								<th rowspan="2" width="10%" style="text-align:center" class=""><span class=""><br><br><br>अभुक्ति<br>Remarks</span></th>

							<tr style="font-size:11px;">
								<th class="" width="5%" style="text-align:center"><span class=""><br>से<br>From</span></th>
								<th class="" width="5%" style="text-align:center"><span class=""> <br>तक<br>To</span></th>
								<th class="" width="5%" style="text-align:center"><span class=""><br>मूल <br>Substantive</span></th>
								<th class="" width="5%" style="text-align:center"><span class=""><br> स्थानापन्न<br>Officiating</span></th>
							</tr>
							</tr>
							<tr align="center" style="font-size:10px;border:1px solid black">
								<td class=""><span class="">1</span></td>
								<td class=""><span class="">2</span></td>
								<td class=""><span class="">3</span></td>
								<td class=""><span class="">4</span></td>
								<td class=""><span class="">5</span></td>
								<td class=""><span class="">6</span></td>
								<td class=""><span class="">7</span></td>
								<td class=""><span class="">8</span></td>
								<td class=""><span class="">9</span></td>
								<td class=""><span class="">10</span></td>
								<td class=""><span class="">11</span></td>
							</tr>
					<?php
								}
							}
					?>
					</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!--Page 22-->
		<div class="row pb">
			<div class=""></div>
			<div class="col-md-10" style="margin-left:110px;margin-top:100px;">

				<div class="row " style="margin:10px;width:1100px;padding:20px;height:1500">
					<br>
					<center><b style="padding-left:50px;">22</b>
						<div class="col-md-1 pull-right ">

						</div>

						<div class="col-md-11">
							<div class="row ">
								<span style="font-size:20px;font-weight:700;margin-right:-50px;">लेखा-पंजी के रख-रखाव के लिये अनुदेश</span><br>
								<span style="font-size:20px;font-weight:700;margin-right:-50px;">Instructions for maintenance of Service Book</span>
							</div>
							<br>
							<div class="row ">
								<span style="font-size:20px;font-weight:700;margin-right:-50px;">भाग/PART-I</span><br>

							</div>
						</div>


						<div class="row" style="margin-top:10px;">
							<div class="col-md-12"><br>

								<ol type="1" style="font-weight:300;font-size:16px;text-align:left;padding-left:10px;padding-right:10px;line-height:1.7;">
									<li>इस भाग में प्रविष्टियां सरकारी कर्मचारी की प्रथम नियुक्ति के समय की जाएगी और इनका साक्ष्यांकन कार्यालय के प्रमुख या इस संबंध में प्राधिकृत अथवा किसी अधिकारी द्वारा किया जायेगा | इस भाग में होनेवाले परिवर्तन का साक्ष्यांकन भी उसी प्रकार किया जायेगा |</li>
									<p>Entries in this part will be made at the time of first appointment of the Government Servant and attested by the Head of Office or any other Officer dulyauthorized in this behalf. Additions and alterations in this part will also be similarly attested.</p>

									<li style="margin-top:-7px;">संबंधित सरकारी कर्मचारी के हस्ताक्षर अथवा बाए हाथ के अंगूठे के निशान कार्यालय अथवा प्राधिकृत अधिकारी की उपस्थिति में लिया जायेगा |</li>
									<li type="none">Signature or left hand thumb impression of the Government Servant concerned will be obtained in the presence of the Head of Office or authorized Officer.</li>
								</ol>
								<div class="row ">
									<span style="font-size:20px;font-weight:700;margin-right:0px;">भाग/PART-II</span><br>
								</div><br>
								<ol type="1" style="font-weight:300;font-size:16px;text-align:left;padding-left:10px;padding-right:10px;line-height:1.7;">
									<li type="none"></li>
									<li type="none"></li>
									<li>पहले सात प्रमाणपत्रो को सरकारी कर्मचारी की आरंभिक नियुक्ति के समय और शेष तीन प्रमाणपत्रो को उपयुक्त अवस्थताओ में दर्ज किया जायेगा | विशेष तथागोपनीयता की शपथ के सम्बंध में मद संख्या 4 को प्रमाणित करते समय कार्यालय प्रमुख यह सुनिश्चित्त करेगा की सरकारी गोपनीयता अधिनियम तथा केन्द्रीय
										सेवा (आचरण) नियमावली की एक-एक प्रति संबंधित सरकारी कर्मचारी को औपचारिक रूप से उनकी विषय वस्तु नोट करने के लिए उपलब्ध करायी जा चुकी हें |</li>
									<p>The first seven certificates will be recorded at the time of initial appointment of the Government Servant and the remaining three at the appointment stages. In particular before certifying item 4 regarding the oath of secrecy, the Head of Office will ensure thata copyeachof official Secrets Act and Central Services(conduct) Rules are made available to Government Servant concerned for formally noting their contents</p>
									<li style="margin-top:-7px;">इस माप के खाली स्थान का उपयोग जब कबी आवशक होगा सेवा संबंधी मामलो में विकल्पों को अपनाने और विभागीय तथा भाषा परीक्षाए पास करने संबंधीत अन्य प्रमाण पत्र दर्ज करने के लिये किया जायेगा | </li>
									<p>The blank space in this part may be utilized for recording other certificates like those concerning exercise of option in service matter and passingof departmental and language tests if and when necessary</p>
									<li style="margin-top:-7px;">घोषणापत्रों नामांकनों और राज्य रेलवे भविष्य निधि, मृत्यु तथा निवृति उपदान और परिवार पेंशनके लिये नामांकन से होनेवाली तबदीली से संबंधित इया भाग में उल्लिखित अथवा विश्वसनीयमने गये शंका पत्रों और अन्य दस्तावेजों को एक फोल्डर में रखा दिया जिस पर _______________ को खंड II पंजी लिखा होगा और इस कार्यालय प्रमुख की सुरक्षा में रखा जायेगा | </li>
									<p>The declarations, nominations and related notices like changes in nomination for S.R.P.F.,DCR Gratuity and Family Pension testimonials and other documents referredto or relied upon in this part will be placed in folder titled Volume-II of service book _____________ to be kept by the head of office in safe custody.</p>
								</ol>
								<div class="row ">
									<span style="font-size:20px;font-weight:700;margin-right:0px;">भाग/PART-III क/A</span><br>
								</div><br>
								<ol type="1" style="font-weight:300;font-size:16px;text-align:left;padding-left:10px;padding-right:10px;line-height:1.7;">
									<li type="none"></li>
									<li type="none"></li>
									<li type="none"></li>
									<li type="none"></li>
									<li type="none"></li>
									<li>इस भाग मैं प्रविष्टियां केवल तब तक की जायेगी जब तक पिछली सेवा के संबंध मैं पंजी उपलब्ध नहीं हैं और जिसे साक्ष्य के आधार पर स्वीकार किया जाता है।</li>
									<p>The part will be posted only where no Service Book is available in respect of the past service which has to be admitted on the basis,say of collateral evidence.</p>
									<p>6-क इस खाने मैं की गई प्रविष्टियों के कार्यालय के प्रमुख अथवा इस संबंध मैं विधिवत प्राधिकृत अन्य किसी अधिकारी द्वारा साक्ष्यांकित किया जाता है। <br>
										6-Entries made in this column should be attested by the Head of Office or any other Officer duly authorized in this behalf.</p>
									<p>6-ख जिस प्रयोजन अर्थात छुट्टी,वेतन ,पेंशन आदि के लिए पिछली सेवाको अर्हक स्वीकार किया गया है,उसका विशेष रूप से उल्लेख किया जाना चाहिये।<br>
										6-The purpose for which the previous service has been accepted as "qualifying" would be specified Leave,Pay,Pension etc.</p>
								</ol>
								<div class="row ">
									<span style="font-size:20px;font-weight:700;margin-right:0px;">भाग/PART-III ख/A</span><br>
								</div><br>
								<ol type="1" style="font-weight:300;font-size:16px;text-align:left;padding-left:10px;padding-right:10px;line-height:1.7;">
									<li type="none"></li>
									<li type="none"></li>
									<li type="none"></li>
									<li type="none"></li>
									<li type="none"></li>
									<li type="none"></li>
									<li> खाना 1,3 और 4 में प्रविष्टियां बाहय विभाग सेवा नियोक्ता से यह सुचना प्राप्त होने पर कि सरकारी कर्मचारी ने इसके पास कार्यभार ग्रहण कर लिया है, की जायेंगी ।</li>
									<p>Columns 1,3 and 4 will be posted after receipt of an intimation from the Foreign Employer about the Government Servant having reported to him for duty.</p>
									<li style="margin-top:-7px;">खाना 2 सरकारी कर्मचारी के बाहय विभाग सेवा से प्रत्यावर्तन होने के पश्यात भरा जायेगा। </li>
									<p>Column 2 will be filled after the revision of the Government Servant from Foreign Service.</p>

									<li style="margin-top:-7px;">खाना 4 मैं प्रविष्ट संक्षिप्त होगी अर्थात विभाग सेवा नियोक्ता अथवा सरकारी कर्मचारी,जैसा भी उपयुक्त हो। </li>
									<p>Entry in column 4 will be brief i.e 'Foreign Employer' or 'Government Servant' as may be appropriate.p>
								</ol>
							</div>
						</div>
					</center><br>
				</div>
			</div>
		</div>

		<!--Page 23-->
		<div class="row pb">
			<div class=""></div>
			<div class="col-md-10" style="margin-left:110px;margin-top:100px;">

				<div class="row " style="margin:10px;width:1100px;padding:20px;height:1500">
					<br>
					<center><b style="padding-left:50px;font-size:20px;">23</b>
						<div class="col-md-1 pull-right ">

						</div>

						<div class="col-md-11">
							<div class="row ">
								<span style="font-size:20px;font-weight:700;margin-right:-50px;">भाग/PART-IV</span><br>
							</div>
						</div>
						<div class="row" style="margin-top:10px;padding:10px;">
							<div class="col-md-12"><br>








								<ol type="1" style="font-weight:300;font-size:16px;text-align:left;padding-left:10px;padding-right:10px;line-height:2;">
									<li type="none"></li>
									<li type="none"></li>
									<li type="none"></li>
									<li type="none"></li>
									<li type="none"></li>
									<li type="none"></li>
									<li type="none"></li>
									<li type="none"></li>
									<li type="none"></li>

									<li>इस खाने में प्रविष्ठिया प्रारंभिक नियुक्ति के समय और उसके बाद पद, कार्यालय स्थान, वेतनमान अथवा नियुक्ति की किस्म की तबदीली जैसी घटनाओ
										के स्थल पर की जायेगी | एसी घटनाओ में नियुक्ति, पदोन्नति, प्रत्यावर्तन, प्रतिनियुक्त, स्थानांतरण (बाह्य विभाग सेवा में स्थानांतरण सहित) वेतन वृध, छुट्टी, और निलंबित सम्मिलित हें *** |</li>
									<p>Entries in this part will be made at the time of initial appointment and thereafter on the occurrence of event involving a change in the Post,Office,Station,scale of pay or nature of appointment,such events will include Appointment,Promotion,Reversion,Deputation,Transfer(including Transfer on Foreign Service)Increment, Leave and Suspension.***</p>
									<div style="padding-left:20px;">
										<li style="margin-top:-7px;">स्थायीकरण , स्थायीकृत और निलंबन तथा सेवा में अन्य प्रकार के अवरोधी की प्रविष्टिया लाल स्याही से की जायेगी |</li>
										<p>Entries regarding Confirmation, Quasi-Permanency and Suspension and other forms of interruption in service will be made in red ink.</p>

										<li style="margin-top:-7px;">किसी विशेष प्रविष्ठि के संबंधमें खाना 3 को अगली प्रविष्टि करते समय भरा जायेगा |</li>
										<p>Column 3 in respect of particular entry will be posted at the time of marking the next entry.</p>

										<li style="margin-top:-7px;">दूसरी तथा बाद की प्रविष्टियो के संबंध में खाना 4 केवल उस समय भरा जाना चाहिए जब पद, वेतनमान, कार्यालय या स्थान में कोई समदोषी हें | </li>
										<p>Column 4 in respect of second and subsequent entries need be filled only if there is a change in the post, Scale of Pay, office or Station.</p>

										<li style="margin-top:-7px;">खाना 5 और 6 में वेतन के विभिन्न अंशो को पृथक से दिखाया जायेगा, जैसे (240 + 50)(वि.पे. + 80) (नि.पे) | </li>
										<p>Column 5 and 6 will show different components of pay separately, thus (240 +50) (S.P.) +80(P.P)</p>

										<li style="margin-top:-7px;">किसी प्रविष्टि से संबंधित खाना 7 को अगली प्रविष्टि कराते समय भरा जायेगा, छुट्टी के मामले में इस खाने में छुट्टीकी किस्म भी दिखायी जायेगी | </li>
										<p>Column 7 concerning an entry will be posted at the time of making the next entry in the case of leave this column will also indicate the nature of leave.</p>

										<li style="margin-top:-7px;"> खाना 8 में हस्ताक्षर करने के पहले, साक्ष्यांकन अधिकारी यह सुनिश्चित्त करेगा की जिस प्रविष्टि का वह साक्ष्यांकन कर रहा हें यस खाना 2 में विवरण की गई
											तारीख और पुर्ववृति प्रविष्टि के खाना 3 से दिखायी गई तारीख में कोई एसा स्थान नहीं छोड़ा गया हें जिसका स्पष्टीकरण न दिया गया हो |</li>
										<p>Before putting his signature in column 8, the Attesting Officer will ensure that there is no un-explained gap between the date shown in column 2 of the entry he is attesting and column 3 of the preceding entry.</p>

										<li style="margin-top:-7px;">वर्ष बार के आरंभ में अथवा किसी अन्य कार्याल, महालेखाकार की सेवा दस्तावेज क का हस्ताक्षर करते समय, यदिइस प्रकार की घटना इसमें पहले हो
											कालम. 2-7 की बगल में प्रविष्टियो का सत्यापन 1938 जो की शर्तो के अनुसार संबंधित अभिलेखांकन सन्दर्भ में किया जायेगा | खाना 5 में हस्ताक्षर करते
											समय सत्यापन अधिकारी उसके द्वारा सत्यापित की गई प्रविष्टियो की क्रम संख्या और जिस रिकार्ड से सत्यापन किया गया हें, का उल्लेख करेगा| वह यह भी
											सुनिश्चित्त करेगा की इस मामले में उसके द्वारा सत्यापित प्रथम प्रविष्टि तथा पिछली बार जिस अंतिम प्रविष्टी का सत्यापन करना प्रमाणित किया गया हें |
											उसकी क्र.सं.में कोई स्थान छोड़ा गया हें |</li>
										<p>At the beginning of the year or at the time of transfer of Service documents to another office IAG with this event occurs earlier entries in column 2-7 will be verified, with reference to relevant records in terms of 1938 GR while putting his signature in column 9, the Verifying Officer will indicate the S. Nos. of the entries, he has verified and the records from which verified. He will also ensure that there is no gap between S. Nos. of the first entry verified and the records from which verified. He will also ensure that there is no gap between the S. Nos.of first entry verified by him in the instant case and that of the last entry certificate as having been verified on the last occasion.</p>

										<li style="margin-top:-7px;">यदि अपरिहार्य कारणों से कर्मचारी की सेवापंजी दिखाना और खाना 10 में उनके हस्ताक्षर लेना संभव नहीं हें तो उसे प्राप्ति स्वीकारने और वापसी का
											निर्धारित फार्म से सारांश भेज दिया जायेगा | उसके वापस प्राप्त होने पर इस प्रकार की प्राप्ति सुचना को सेवा पंजी के खण्ड II में रख दिया जायेगा |</li>
										<p>If for unavoidable reasons it is possible to show the Service Book to the employee and to obtain his signature in column 10 an abstract in the prescribed form will be communicated to him for acknowledgment and return. On receipt book, such acknowledgement will be kept in volume-II of the Service Book.</p>

										<li style="margin-top:-7px;">वेतन वृधि पर रोक लगाने, दक्षता रोध लागु करने जैसे खाना 1-5 की प्रवष्टिय को प्रभावित नही करती संक्षेप के कालम II नोट कर ली जायेगी |</li>
										<p>Events like stoppage of Increment, Enforcement of Efficiency Bar, which do not effect entries in columns 1-5 will be briefly noted in column-II.</p>
									</div>
								</ol>

								<div class="row">
									<span style="font-size:12px;padding-left:30px;margin-top:10px;" class="pull-left">*** परिशिष्ट/Appendix</span>

								</div>


							</div>

						</div>
					</center><br>
				</div>
			</div>
		</div>


		<!--Page 24-->
		<div class="row pb">
			<div class=""></div>
			<div class="col-md-10" style="margin-left:120px;margin-top:100px;">

				<div class="row " style="margin:10px;width:1100px;padding:20px;height:1500">

					<center>
						<div class="row" style="margin-top:15px;">
							<b style="padding-left:50px;font-size:20px;">24</b>

						</div>

						<div class="col-md-12 pull-left " style="margin-top:20px;">
							<div class="row">
								<span style="font-size:16px;font-weight:700;"></span>

							</div>
						</div>
					</center>
					<br>
					<div class="row">
						<div class="col-xs-12" style="margin-top:5px;padding-left:22px;padding-right:20px;line-height:1.5">
							<p style="text-align:justify;font-size:16px">
								<b>परिशिष्ठ /Appendix</b><br><br>
								वर्ष 20&nbsp;&nbsp;<span style="text-decoration:underline"><b>__________</b></span> &nbsp; के दौरान .&nbsp;<span style="text-decoration:underline"><b>__________</b></span> &nbsp;द्वारा कि गई सेवा का सारांश (नामपदनाम और कार्यालय)<br>Abstract service rendered by &nbsp;<span style="text-decoration:underline"><b>__________</b></span> &nbsp;during the year 20&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Designation and Office)
							</p>

						</div>

					</div>
					<div class="row">
						<div class="col-xs-12" style="margin-top:5px;padding-left:20px;padding-right:20px;line-height:3">
							<div class="table-responsive">
								<table class="table" border="1" style="border-collapse:collapse;font-size:16px;" width="100%">
									<tr>
										<td width="50%" colspan="3">पेंशन भत्ता निवृत्ती उत्पादन के लिए अर्हक सेवा कि अवधी <br>Period of qualifying sevice for purposes of pension/DCR Gratuity</td>
										<td width="50%" colspan="4">अवधि, यादि कोई हो तो सेवा के रूप अर्हक न हो और उसके कारण<br>Period,if any,not qualifying as service,and reasons thereof</td>


									</tr>
									<tr>
										<th class=""><span class="">तारीख से<br>From Date</span></th>
										<th class=""><span class="">तारीख तक <br>To Date</span></th>
										<th class=""><span class=""> अवधि <br>Period</span></th>
										<th class=""><span class="">तारीख से<br>From Date</span></th>
										<th class=""><span class="">तारीख तक <br>To Date</span></th>
										<th class=""><span class=""> अवधि <br>Period</span></th>
										<th class="" width="50%" style="text-align:center"><span class=""> कारण <br>Reason</span></th>
									</tr>
									<tr align="center">
										<td class=""><span class="">1</span></td>
										<td class=""><span class="">2</span></td>
										<td class=""><span class="">3</span></td>
										<td class=""><span class="">4</span></td>
										<td class=""><span class="">5</span></td>
										<td class=""><span class="">6</span></td>
										<td class="" width="50%"><span class="">7</span></td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
									<tr style="height:15px;">
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
								</table>
							</div>

						</div>

					</div>

					<div class="row" style="padding-left:-50px;">

						<div class="col-xs-6 pull-right" style="margin-top:15px;padding-left:30px;line-height:1.4">
							<p style="text-align:justify;margin-left:180px;font-size:16px;">

								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>कार्यालय प्रमुख के हस्ताक्षर</b><br>
								&nbsp;&nbsp;<b>Signature of Head of Office</b>

							</p>

						</div>

					</div>

					<div class="row">
						<div class="col-xs-12" style="margin-top:20px;padding-left:20px;padding-right:20px;line-height:1.5">
							<p style="text-align:justify;font-size:14px">
								मे एतदद्वरा &nbsp;<span style="text-decoration:underline"><b>__________</b></span> &nbsp; कि अवधि मे कि गई सेवा के सारांश कि प्राप्ती स्वीकार करता हू और इसे सही मानता हू |<br>
								नीचे दिये कारणों से सही न मानकर अस्वीकार करता हूँ<br>
								Thereby acknowledge the receipt of the abstract of service rendered by me during &nbsp;<span style="text-decoration:underline"><b>__________</b></span> &nbsp; and accept it as correct/ do not accept for reasons indicated below.
							</p>

						</div>

					</div>
					<div class="row" style="padding-left:-30px;">
						<br><br><br>
						<div class="col-xs-6 pull-right" style="margin-top:25px;padding-left:20px;line-height:1.4">
							<p style="text-align:justify;margin-left:180px;font-size:16px;">

								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>सरकारी कर्मचारी के हस्ताक्षर</b><br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Signature of Head of Office</b>
							</p>

						</div>

					</div>


				</div>
			</div>
		</div>
	</div>
	</div>
	<!--Page 25-->
	<div class="row pb" id="fmy_detail">
		<div class=" "></div>
		<div class="col-md-10" style="margin-left:110px;margin-top:100px;">

			<div class="row " style="margin:10px;width:1100px;padding:20px;height:1500">
				<br>
				<center><b style="padding-left:50px;font-size:20px;">25</b>
					<div class="col-md-1 pull-right ">

					</div>

					<div class="col-md-11">
						<div class="row ">
							<span style="font-size:20px;font-weight:700;margin-right:-50px;">परिवार अनुबंध </span><br>
							<span style="font-size:20px;font-weight:700;margin-right:-50px;">Anexture-Family</span>
						</div><br>
						<!--div class="row ">
<span style="font-size:18px;font-weight:700;margin-right:-50px;">(क)  पिछली अर्हक सेवा</span><br>
<span style="font-size:18px;font-weight:700;margin-right:-50px;">(a) Previous Qualifying Service</span>
</div-->
					</div>


					<div class="row" style="margin-top:10px;">


					</div>
				</center><br>

				<div class="table-responsive">
					<table class="table" border="1" style="border-collapse:collapse;font-size:15px;" width="100%">
						<tr style="font-size:16px;">
							<th width="10%" style="text-align:center" class=""><span class="">क्रम सं. / Sr.No</span></th>
							<th width="25%" style="text-align:center" class=""><span class="">परिवार सदस्य का नाम / Family Member Name</span></th>
							<th width="25%" class=""><span class="">कर्मचारी के साथ नाता / MEMBER RELATION</span></th>
							<th class=""><span class="" width="25%">लिंग / Gender</span></th>
							<th class=""><span class="" width="25%">जन्मदिन की तारीख / Date Of Birth</span></th>
						</tr>
						<?php
						$conn=dbcon1();
						$famcnt = 0;
						$sqlfam = mysqli_query($conn,"select * from family_temp where emp_pf='$pf'");
						// echo "select * from family_temp where emp_pf='$pf'";
						while ($fetchfam = mysqli_fetch_array($sqlfam)) {
							$famcnt++;
							$mem_name = $fetchfam['fmy_member'];
							$mem_gender = get_gender($fetchfam['fmy_gender']);
							$mem_rel = get_relation($fetchfam['fmy_rel']);
							$mem_dob = $fetchfam['fmy_dob'];
							// echo $mem_dob;
							if ($mem_dob == '1970-01-01') {
								$mem_dob = '-';
							} else {
								$mem_dob = date('d-m-Y', strtotime($fetchfam['fmy_dob']));
							}

							echo "<tr style='height:15px;border-left:none;font-size:15px;'>
		<td>$famcnt</td>
		<td>$mem_name</td>
		<td>$mem_rel</td>
		<td>$mem_gender</td>
		<td>$mem_dob</td>
	</tr>";
						}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!--Page 26-->
	<div class="row pb" id="nom_detail">
		<div class=" "></div>
		<div class="col-md-10" style="margin-left:110px;margin-top:100px;">

			<div class="row " style="margin:10px;width:1100px;padding:20px;height:1500">
				<br>
				<center><b style="padding-left:50px;font-size:20px;">26</b>
					<div class="col-md-1 pull-right ">

					</div>

					<div class="col-md-11">
						<div class="row ">
							<span style="font-size:20px;font-weight:700;margin-right:-50px;">नामांकित व्यक्ति का विवरण </span><br>
							<span style="font-size:20px;font-weight:700;margin-right:-50px;">Anexture-Nominee</span>
						</div><br>
						<!--div class="row ">
<span style="font-size:18px;font-weight:700;margin-right:-50px;">(क)  पिछली अर्हक सेवा</span><br>
<span style="font-size:18px;font-weight:700;margin-right:-50px;">(a) Previous Qualifying Service</span>
</div-->
					</div>


					<div class="row" style="margin-top:10px;">


					</div>
				</center><br>

				<div class="table-responsive">
					<table class="table" border="1" style="border-collapse:collapse;font-size:15px;" width="100%">
						<tr style="font-size:16px;">
							<th width="10%" style="text-align:center" class=""><span class="">क्रम सं. / Sr.No</span></th>
							<th width="25%" style="text-align:center" class=""><span class="">परिवार सदस्य का नाम / Family Member Name</span></th>
							<th width="25%" class=""><span class="">नामांकन का प्रकार / Type Of Nomination</span></th>
							<th width="10%" class=""><span class="">Percentage</span></th>
							<th class=""><span class="" width="25%">लिंग / Gender</span></th>
							<th class=""><span class="" width="25%">जन्मदिन की तारीख / Date Of Birth</span></th>
							<th class=""><span class="" width="10%">Age</span></th>
						</tr>
						<?php
						$conn=dbcon1();
						$nomcnt = 0;
						$sqlfam = mysqli_query($conn,"select * from nominee_temp where nom_pf_number='$pf'");
						// echo "select * from nominee_temp where nom_pf_number='$pf'";
						while ($fetchfam = mysqli_fetch_array($sqlfam)) {
							$nomcnt++;
							$nom_name = get_fam_name($fetchfam['nom_name']);

							$nom_type = get_nom_type($fetchfam['nom_type']);
							$mem_dob = $fetchfam['nom_dob'];
							$nom_per = $fetchfam['nom_per'];
							$nom_age = $fetchfam['nom_age'];

							// echo $mem_dob;
							if ($mem_dob == '1970-01-01') {
								$mem_dob = '-';
							} else {
								$mem_dob = date('d-m-Y', strtotime($fetchfam['nom_dob']));
							}

							echo "<tr style='height:15px;border-left:none;font-size:15px;'>
		<td>$nomcnt</td>
		<td>$nom_name</td>
		<td>$nom_type</td>
		<td>$nom_per</td>
		<td>$mem_gender</td>
		<td>$mem_dob</td>
		<td>$nom_age</td>
	</tr>";
						}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>



</body>


</html>