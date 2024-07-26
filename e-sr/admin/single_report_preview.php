<?php
include_once('../dbconfig/dbcon.php');
include('mini_function.php');
?>
<html>

<head>
	<link href="../bootstrap/hind.css" rel="stylesheet">
	<meta charset="UTF-8">
	</meta>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../bootstrap/bootstrap.min.css" media="print">
	<link rel="stylesheet" href="../bootstrap/bootstrap.min.css" media="screen">
	<!-- jQuery library -->
	<script src="../bootstrap/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="../bootstrap/bootstrap.min.js"></script>
</head>
<style type="text/css">
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
		/* html,body{}  */
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
			padding-left: 100px;
		}

		#p1 {
			display: none;
		}

		#p3 {
			display: none;
		}
	}
</style>

<body>
	<center>
		<div>
			<button class="btn btn-primary" onclick="print_page()" id="p1">Print this page</button>
			<a href="prft_update.php" class="btn btn-warning" style="border:none" id="p3">Back</a>
		</div>
	</center>
	<script type="text/javascript">
		function print_page() {
			window.print();
			var ButtonControl = document.getElementById("p1");
			ButtonControl.style.visibility = "hidden";
			window.location.reload();
		}
	</script>
	<?php
	$pf = $_GET['pf_no'];
	// echo $pf;
	$id = $_GET['id'];
	$form = $_GET['fnm'];
	//echo "<script>alert('$pf');</script>";
	dbcon1();
	/*biodata code*/

	/*Medical code*/

	/*Initial Appointment code*/

	/*Present Working Code*/

	/*Promotion Code*/
	$data = '';
	if ($form == 'promotion') {

		$query = mysqli_query($conn, "select * from prft_promotion_temp where pro_pf_no='$pf' and id='$id'");

		$query1 = mysqli_query($conn, "SELECT b.emp_name,b.pf_number,pr.pro_pf_no from biodata_temp b join prft_promotion_temp pr on b.pf_number=pr.pro_pf_no where b.pf_number='$pf'");

		// echo "SELECT b.emp_name,b.pf_number,pr.pro_pf_no from biodata_temp b join prft_promotion_temp pr on b.pf_number=pr.pro_pf_no where b.pf_number='$pf'";
		$result1 = mysqli_fetch_array($query1);
		$name = $result1['emp_name'];
		$result = mysqli_fetch_array($query);
		$pro_pf_no = $result['pro_pf_no'];
		$frm_dt = date('d-m-Y', strtotime($result['date_time']));
		$pro_frm_dept = get_department($result['pro_frm_dept']);
		$pro_frm_desig = get_designation($result['pro_frm_desig']);
		$pro_frm_othr_desig = $result['pro_frm_othr_desig'];
		$pro_frm_pay_scale_type = get_pay_scale_type($result['pro_frm_pay_scale_type']);
		$pro_frm_scale = $result['pro_frm_scale'];
		$pro_frm_level = $result['pro_frm_level'];
		$pro_frm_group = get_group($result['pro_frm_group']);
		$pro_frm_station = get_station($result['pro_frm_station']);
		$pro_frm_othr_station = $result['pro_frm_othr_station'];
		$pro_frm_billunit = get_billunit($result['pro_frm_billunit']);
		$pro_frm_depot = get_depot($result['pro_frm_depot']);
		$pro_frm_rop = $result['pro_frm_rop'];

		$pro_to_dept = get_department($result['pro_to_dept']);
		$pro_to_desig = get_designation($result['pro_to_desig']);
		$pro_to_othr_desig = $result['pro_to_othr_desig'];
		$pro_to_pay_scale_type = get_pay_scale_type($result['pro_to_pay_scale_type']);
		$pro_to_scale = $result['pro_to_scale'];
		$pro_to_level = $result['pro_to_level'];
		$pro_to_group = get_group($result['pro_to_group']);
		$pro_to_station = get_station($result['pro_to_station']);
		$pro_to_othr_station = $result['pro_to_othr_station'];
		$pro_to_rop = $result['pro_to_rop'];
		$pro_to_billunit = get_billunit($result['pro_to_billunit']);
		$pro_to_depot = get_depot($result['pro_to_depot']);
		$pro_carried_out_type = $result['pro_carried_out_type'];
		// print_r($result);
		// echo '.<br><br>.';
		if ($pro_frm_dept != $pro_to_dept) {
			$data .= "Department Changed from $pro_frm_dept to $pro_to_dept" . "<br>";
			// echo $pro_frm_desig."<br>". $pro_to_desig;
		}
		if ($pro_frm_desig != $pro_to_desig) {
			// echo "hello";
			$data .= "Designation Changed from $pro_frm_desig to $pro_to_desig" . "<br>";
			// echo "Designation Changed from $pro_frm_desig to $pro_to_desig  ";
		} elseif ($pro_frm_othr_desig != $pro_to_othr_desig) {
			$data .= "Other Designation Changed from $pro_frm_othr_desig to $pro_to_othr_desig" . "<br>";
		}
		if ($pro_frm_pay_scale_type != $pro_to_pay_scale_type) {
			$data .= "Pay Scale Type Changed from $pro_frm_pay_scale_type to $pro_to_pay_scale_type" . "<br>";
		}
		if ($pro_frm_scale != $pro_to_scale) {
			$data .= "Pay Scale Changed from $pro_frm_scale to $pro_to_scale" . "<br>";
		}
		if ($pro_frm_level != $pro_to_level) {
			$data .= "Pay Level Changed from $pro_frm_level to $pro_to_level" . "<br>";
		}
		if ($pro_frm_group != $pro_to_group) {
			$data .= "Group Changed from $pro_frm_group to $pro_to_group" . "<br>";
		}
		if ($pro_frm_station != $pro_to_station) {
			$data .= "Station Changed from $pro_frm_station to $pro_to_station" . "<br>";
		}
		if ($pro_frm_othr_station != $pro_to_othr_station) {
			$data .= "Other Station Changed from $pro_frm_othr_station to $pro_to_othr_station" . "<br>";
		}
		if ($pro_frm_billunit != $pro_to_billunit) {
			$data .= "Other Station Changed from $pro_frm_billunit to $pro_to_billunit" . "<br>";
		}
		if ($pro_frm_depot != $pro_to_depot) {
			$data .= "Other Station Changed from $pro_frm_depot to $pro_to_depot" . "<br>";
		}
		if ($pro_frm_rop != $pro_to_rop) {
			$data .= "Other Station Changed from $pro_frm_rop to $pro_to_rop" . "<br>";
		}
	}
	/*Reversion Code*/ elseif ($form == 'reversion') {
		// $query=mysqli_query("");
		$result = mysqli_fetch_array($query);

		$query = mysqli_query($conn, "select * from prft_reversion_temp where rev_pf_no='$pf' and id='$id'");
		$result = mysqli_fetch_array($query);
		$frm_dt = date('d-m-Y', strtotime($result['date_time']));
		// print_r($result);
		// echo '.<br><br>.';
		$rev_frm_dept = get_department($result['rev_frm_dept']);
		$rev_frm_desig = get_designation($result['rev_frm_desig']);
		$rev_frm_othr_desig = $result['rev_frm_othr_desig'];
		$rev_frm_pay_scale_type = get_pay_scale_type($result['rev_frm_pay_scale_type']);
		$rev_frm_scale = $result['rev_frm_scale'];
		$rev_frm_level = $result['rev_frm_level'];
		$rev_frm_group = get_group($result['rev_frm_group']);
		$rev_frm_station = get_station($result['rev_frm_station']);
		$rev_frm_othr_station = $result['rev_frm_othr_station'];
		$rev_frm_billunit = get_billunit($result['rev_frm_billunit']);
		$rev_frm_depot = get_depot($result['rev_frm_depot']);
		$rev_frm_rop = $result['rev_frm_rop'];

		$rev_to_dept = get_department($result['rev_to_dept']);
		$rev_to_desig = get_designation($result['rev_to_desig']);
		$rev_to_othr_desig = $result['rev_to_othr_desig'];
		$rev_to_pay_scale_type = get_pay_scale_type($result['rev_to_pay_scale_type']);
		$rev_to_scale = $result['rev_to_scale'];
		$rev_to_level = $result['rev_to_level'];
		$rev_to_group = get_group($result['rev_to_group']);
		$rev_to_station = get_station($result['rev_to_station']);
		$rev_to_othr_station = $result['rev_to_othr_station'];
		$rev_to_rop = $result['rev_to_rop'];
		$rev_to_billunit = get_billunit($result['rev_to_billunit']);
		$rev_to_depot = get_depot($result['rev_to_depot']);
		$rev_carried_out_type = $result['rev_carried_out_type'];
		// print_r($result);
		// echo '.<br><br>.';
		if ($rev_frm_dept != $rev_to_dept) {
			$data .= "Department Changed from $rev_frm_dept to $rev_to_dept" . "<br>";
			// echo $rev_frm_desig."<br>". $rev_to_desig;
		}
		if ($rev_frm_desig != $rev_to_desig) {
			// echo "hello";
			$data .= "Designation Changed from $rev_frm_desig to $rev_to_desig" . "<br>";
			// echo "Designation Changed from $rev_frm_desig to $rev_to_desig  ";
		} elseif ($rev_frm_othr_desig != $rev_to_othr_desig) {
			$data .= "Other Designation Changed from $rev_frm_othr_desig to $rev_to_othr_desig" . "<br>";
		}
		if ($rev_frm_pay_scale_type != $rev_to_pay_scale_type) {
			$data .= "Pay Scale Type Changed from $rev_frm_pay_scale_type to $rev_to_pay_scale_type" . "<br>";
		}
		if ($rev_frm_scale != $rev_to_scale) {
			$data .= "Pay Scale Changed from $rev_frm_scale to $rev_to_scale" . "<br>";
		}
		if ($rev_frm_level != $rev_to_level) {
			$data .= "Pay Level Changed from $rev_frm_level to $rev_to_level" . "<br>";
		}
		if ($rev_frm_group != $rev_to_group) {
			$data .= "Group Changed from $rev_frm_group to $rev_to_group" . "<br>";
		}
		if ($rev_frm_station != $rev_to_station) {
			$data .= "Station Changed from $rev_frm_station to $rev_to_station" . "<br>";
		}
		if ($rev_frm_othr_station != $rev_to_othr_station) {
			$data .= "Other Station Changed from $rev_frm_othr_station to $rev_to_othr_station" . "<br>";
		}
		if ($rev_frm_billunit != $rev_to_billunit) {
			$data .= "Other Station Changed from $rev_frm_billunit to $rev_to_billunit" . "<br>";
		}
		if ($rev_frm_depot != $rev_to_depot) {
			$data .= "Other Station Changed from $rev_frm_depot to $rev_to_depot" . "<br>";
		}
		if ($rev_frm_rop != $rev_to_rop) {
			$data .= "Other Station Changed from $rev_frm_rop to $rev_to_rop" . "<br>";
		}
	}
	/*Transfer code*/ elseif ($form == 'transfer') {
		$query = mysqli_query($conn,"select * from prft_transfer_temp where trans_pf_no='$pf' and id='$id'");
		$result = mysqli_fetch_array($query);
		$frm_dt = date('d-m-Y', strtotime($result['date_time']));
		// print_r($result);
		// echo '.<br><br>.';
		$trans_frm_dept = get_department($result['trans_frm_dept']);
		$trans_frm_desig = get_designation($result['trans_frm_desig']);
		$trans_frm_othr_desig = $result['trans_frm_othr_desig'];
		$trans_frm_pay_scale_type = get_pay_scale_type($result['trans_frm_pay_scale_type']);
		$trans_frm_scale = $result['trans_frm_scale'];
		$trans_frm_level = $result['trans_frm_level'];
		$trans_frm_group = get_group($result['trans_frm_group']);
		$trans_frm_station = get_station($result['trans_frm_station']);
		$trans_frm_othr_station = $result['trans_frm_othr_station'];
		$trans_frm_billunit = get_billunit($result['trans_frm_billunit']);
		$trans_frm_depot = get_depot($result['trans_frm_depot']);
		$trans_frm_rop = $result['trans_frm_rop'];

		$trans_to_dept = get_department($result['trans_to_dept']);
		$trans_to_desig = get_designation($result['trans_to_desig']);
		$trans_to_othr_desig = $result['trans_to_othr_desig'];
		$trans_to_pay_scale_type = get_pay_scale_type($result['trans_to_pay_scale_type']);
		$trans_to_scale = $result['trans_to_scale'];
		$trans_to_level = $result['trans_to_level'];
		$trans_to_group = get_group($result['trans_to_group']);
		$trans_to_station = get_station($result['trans_to_station']);
		$trans_to_othr_station = $result['trans_to_othr_station'];
		$trans_to_rop = $result['trans_to_rop'];
		$trans_to_billunit = get_billunit($result['trans_to_billunit']);
		$trans_to_depot = get_depot($result['trans_to_depot']);
		$trans_carried_out_type = $result['trans_carried_out_type'];
		// print_r($result);
		// echo '.<br><br>.';
		if ($trans_frm_dept != $trans_to_dept) {
			$data .= "Department Changed from $trans_frm_dept to $trans_to_dept" . "<br>";
			// echo $trans_frm_desig."<br>". $trans_to_desig;
		}
		if ($trans_frm_desig != $trans_to_desig) {
			// echo "hello";
			$data .= "Designation Changed from $trans_frm_desig to $trans_to_desig" . "<br>";
			// echo "Designation Changed from $trans_frm_desig to $trans_to_desig  ";
		} elseif ($trans_frm_othr_desig != $trans_to_othr_desig) {
			$data .= "Other Designation Changed from $trans_frm_othr_desig to $trans_to_othr_desig" . "<br>";
		}
		if ($trans_frm_pay_scale_type != $trans_to_pay_scale_type) {
			$data .= "Pay Scale Type Changed from $trans_frm_pay_scale_type to $trans_to_pay_scale_type" . "<br>";
		}
		if ($trans_frm_scale != $trans_to_scale) {
			$data .= "Pay Scale Changed from $trans_frm_scale to $trans_to_scale" . "<br>";
		}
		if ($trans_frm_level != $trans_to_level) {
			$data .= "Pay Level Changed from $trans_frm_level to $trans_to_level" . "<br>";
		}
		if ($trans_frm_group != $trans_to_group) {
			$data .= "Group Changed from $trans_frm_group to $trans_to_group" . "<br>";
		}
		if ($trans_frm_station != $trans_to_station) {
			$data .= "Station Changed from $trans_frm_station to $trans_to_station" . "<br>";
		}
		if ($trans_frm_othr_station != $trans_to_othr_station) {
			$data .= "Other Station Changed from $trans_frm_othr_station to $trans_to_othr_station" . "<br>";
		}
		if ($trans_frm_billunit != $trans_to_billunit) {
			$data .= "Other Station Changed from $trans_frm_billunit to $trans_to_billunit" . "<br>";
		}
		if ($trans_frm_depot != $trans_to_depot) {
			$data .= "Other Station Changed from $trans_frm_depot to $trans_to_depot" . "<br>";
		}
		if ($trans_frm_rop != $trans_to_rop) {
			$data .= "Other Station Changed from $trans_frm_rop to $trans_to_rop" . "<br>";
		}
	}

	/*Fixation code*/ elseif ($form == 'fixaction') {

		$query = mysqli_query($conn,"select * from prft_fixation_temp where fix_pf_no='$pf' and id='$id'");
		$result = mysqli_fetch_array($query);
		$frm_dt = date('d-m-Y', strtotime($result['date_time']));
		// print_r($result);
		// echo '.<br><br>.';
		$fix_frm_dept = get_department($result['fix_frm_dept']);
		$fix_frm_desig = get_designation($result['fix_frm_desig']);
		$fix_frm_othr_desig = $result['fix_frm_othr_desig'];
		$fix_frm_pay_scale_type = get_pay_scale_type($result['fix_frm_pay_scale_type']);
		$fix_frm_scale = $result['fix_frm_scale'];
		$fix_frm_level = $result['fix_frm_level'];
		$fix_frm_group = get_group($result['fix_frm_group']);
		$fix_frm_station = get_station($result['fix_frm_station']);
		$fix_frm_othr_station = $result['fix_frm_othr_station'];
		$fix_frm_billunit = get_billunit($result['fix_frm_billunit']);
		$fix_frm_depot = get_depot($result['fix_frm_depot']);
		$fix_frm_rop = $result['fix_frm_rop'];

		$fix_to_dept = get_department($result['fix_to_dept']);
		$fix_to_desig = get_designation($result['fix_to_desig']);
		$fix_to_othr_desig = $result['fix_to_othr_desig'];
		$fix_to_pay_scale_type = get_pay_scale_type($result['fix_to_pay_scale_type']);
		$fix_to_scale = $result['fix_to_scale'];
		$fix_to_level = $result['fx_to_level'];
		$fix_to_group = get_group($result['fix_to_group']);
		$fix_to_station = get_station($result['fix_to_station']);
		$fix_to_othr_station = $result['fix_to_othr_station'];
		$fix_to_rop = $result['fix_to_rop'];
		$fix_to_billunit = get_billunit($result['fix_to_billunit']);
		$fix_to_depot = get_depot($result['fix_to_depot']);
		$fix_carried_out_type = $result['fix_carried_out_type'];
		// print_r($result);
		// echo '.<br><br>.';
		if ($fix_frm_dept != $fix_to_dept) {
			$data .= "Department Changed from $fix_frm_dept to $fix_to_dept" . "<br>";
			// echo $fix_frm_desig."<br>". $fix_to_desig;
		}
		if ($fix_frm_desig != $fix_to_desig) {
			// echo "hello";
			$data .= "Designation Changed from $fix_frm_desig to $fix_to_desig" . "<br>";
			// echo "Designation Changed from $fix_frm_desig to $fix_to_desig  ";
		} elseif ($fix_frm_othr_desig != $fix_to_othr_desig) {
			$data .= "Other Designation Changed from $fix_frm_othr_desig to $fix_to_othr_desig" . "<br>";
		}
		if ($fix_frm_pay_scale_type != $fix_to_pay_scale_type) {
			$data .= "Pay Scale Type Changed from $fix_frm_pay_scale_type to $fix_to_pay_scale_type" . "<br>";
		}
		if ($fix_frm_scale != $fix_to_scale) {
			$data .= "Pay Scale Changed from $fix_frm_scale to $fix_to_scale" . "<br>";
		}
		if ($fix_frm_level != $fix_to_level) {
			$data .= "Pay Level Changed from $fix_frm_level to $fix_to_level" . "<br>";
		}
		if ($fix_frm_group != $fix_to_group) {
			$data .= "Group Changed from $fix_frm_group to $fix_to_group" . "<br>";
		}
		if ($fix_frm_station != $fix_to_station) {
			$data .= "Station Changed from $fix_frm_station to $fix_to_station" . "<br>";
		}
		if ($fix_frm_othr_station != $fix_to_othr_station) {
			$data .= "Other Station Changed from $fix_frm_othr_station to $fix_to_othr_station" . "<br>";
		}
		if ($fix_frm_billunit != $fix_to_billunit) {
			$data .= "Other Station Changed from $fix_frm_billunit to $fix_to_billunit" . "<br>";
		}
		if ($fix_frm_depot != $fix_to_depot) {
			$data .= "Other Station Changed from $fix_frm_depot to $fix_to_depot" . "<br>";
		}
		if ($fix_frm_rop != $fix_to_rop) {
			$data .= "Other Station Changed from $fix_frm_rop to $fix_to_rop" . "<br>";
		}
	}
	/*Increment code*/

	/*Penalty code*/

	/*Awards code*/

	/*Family code*/

	/*Nominee Code*/

	/*Advance Code*/

	/*Training Code*/

	/* Property code*/ else {
		// echo "Record Not Found";
	}

	?>


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
			<div class="row " style="border:2px solid white;margin:10px;width:1500px;padding:10px;height:1100;page-break-inside:inherit">
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
							<!--th rowspan="2"width="1%" style="text-align:left"class=""><span class=""><br>क्रम<br>सं. <br>Sr.<br>No</span></th>
<th colspan="2"width="4%" style="text-align:center"class=""><span class=""><br>अवधि<br>Period</span></th>
<th rowspan="2"width="20%" style="text-align:center"class=""><span class=""><br><br>पद, वेतमान तथा कार्यालय (स्थान सहित)<br>Post, Scale of pay and Office(with Station)</span></th>
<th colspan="2"width="2%" style="text-align:center"class=""><span class=""><br>वेतन<br>Pay</span></th>
<th rowspan="2"width="25%" style="text-align:center"class=""><span class=""><br><br><br>खाना 4-6 की प्रमाणत करनेवाली घटना (देखिए अनुदेश 10)<br>Event Affecting Clos4-6 (vide Instruction 10)</span></th>
<th rowspan="2"width="7%" style="text-align:center"class=""><span class="">सत्यापन अधिकारी के हस्ताक्षर तथा पदनाम (तारीख सहित)<br>Signature and Designation of Attesting Officer (with date)</span></th>
<th rowspan="2"width="7%" style="text-align:center"class=""><span class="">सत्यापन अधिकारी के हस्ताक्षर तथा पदनाम (तारीख सहित)<br>Signature and Designation of Verifying officer(with date)</span></th>
<th rowspan="2"width="4%" style="text-align:center"class=""><span class="">सरकारी कर्मचारी के हस्ताक्षर<br>
Signature of Govt. Servant</span></th>
<th rowspan="2"width="15%" style="text-align:center"class=""><span class=""><br><br><br>अभुक्ति<br>Remarks</span></th-->

							<!--tr style="font-size:10px;">
<th class=""width="6%"style="text-align:center"><span class=""><br>से<br>From</span></th>
<th class=""width="4%"style="text-align:center"><span class=""> <br>तक<br>To</span></th>
<th class=""width="2%" style="text-align:center"><span class=""><br>मूल <br>Substantive</span></th>
<th class=""width="2%"style="text-align:center"><span class=""><br> स्थानापन्न<br>Officiating</span></th>
</tr-->
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

						<tbody style='border:1px solid black;'>
							<tr style='height:10px;font-size:11px;border-left:none;text-transform:uppercase;'>
								<td colspan='11' style='border:1px solid black'><?php echo '<b>PF NO:- </b>' . $pro_pf_no . '&emsp;<b>Name :-</b>' . $name ?></td>

							</tr>

							<tr style='height:10px;font-size:11px;border-left:none;text-transform:uppercase;'>
								<td colspan='' style='border:1px solid black;text-align:center'>1</td>
								<td width="10%"><?php echo $frm_dt ?></td>


								<td style='font-style: italic;' colspan="8"><!--".$result['medi_remark']."--><?php echo $nm ?><?php echo $output ?> <span style='font-weight:700'><?php echo $data ?></span></td>
								<td><b></b></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>



</body>


</html>