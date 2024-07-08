<?php

include("../dbconfig/dbcon.php");
session_start();

date_default_timezone_set('Asia/Kolkata');
$date1 = date("d/m/Y h:i:s");
if (isset($_POST['submit'])) {
	$Tp_cnt = 0;
	$Tp_amt = 0;
	$Sp_cnt = 0;
	$Sp_amt = 0;
	$Hp_cnt = 0;
	$Hp_amt = 0;
	$otherp_cnt = 0;
	$otherp_amt = 0;
	$ref = rand(10000, 999999);
	$year = date("Y");
	$reference = $_SESSION['empid'] . "/" . $year . "/" . $ref;
	$_SESSION['empid'];
	$u_amount = $_POST['u_amount'];
	$t_main_rows = $_POST['sr1'];
	$total_rows = $_POST['sr1'] + 1;

	$object = $_POST['object'];
	$cardpass = $_POST['cardpass'];

	$mts = implode(",", $_POST['month']);

	$query1 = "INSERT INTO `taentry_master`( `TAMonth`, `TAYear`, `empid`, `reference_no`, `cardpass`, `objective`, `status`, `forward_status`, `created_date`, `is_rejected`, `reason`) VALUES ('" . $mts . "','" . $year . "','" . $_SESSION['empid'] . "','" . $reference . "','" . $cardpass . "','" . $object . "','0','0','" . $date1 . "','0','null' )";
	$sql1 = mysqli_query($conn,$query1);
	echo mysqli_error($conn);
	// echo "<br>";
	$length = 0;
	$date_array = array();
	$_POST['date0'];
	// echo "<br>";echo "<br>";echo "<br>";

	for ($i = 0; $i < $total_rows; $i++) {
		$date_array[] = $_POST['date' . $i];
		// echo "<br> PER ".$_POST['per'.$i].$_POST['amt'.$i];
		$length++;
	}

	$tr1 = count($date_array);
	function returnDates($fromdate, $todate)
	{
		$fromdate = \DateTime::createFromFormat('d/m/Y', $fromdate);
		$todate = \DateTime::createFromFormat('d/m/Y', $todate);
		return new \DatePeriod(
			$fromdate,
			new \DateInterval('P1D'),
			$todate->modify('+1 day')
		);
	}
	$d1 = 0;
	$datePeriod = returnDates($_POST['date0'], $_POST['date' . $t_main_rows]);
	foreach ($datePeriod as $date) {
		$dates[$d1] = $date->format('d/m/Y');
		$d1++;
	}
	//print_r($dates);
	//echo "<br>";
	//print_r($date_array);
	$tr = count($dates);

	$lm = 0;
	for ($j = 0; $j < $tr; $j++) {

		if (in_array($dates[$j], $date_array)) {
			if ($lm == "0") {
				$tamount = 0;
				//echo "<br>".$k;
				for ($k = 0; $k < $total_rows; $k++) {
					$date = $_POST['date' . $k];
					$type = $_POST['type' . $k];
					$other = $_POST['other' . $k];
					$dtime = $_POST['dtime' . $k];
					$atime = $_POST['atime' . $k];
					$per = $_POST['per' . $k];
					$amt = $_POST['amt' . $k];
					$tamount = $tamount + $_POST['amt' . $k];

					if ($per == "30%") {
						$Tp_cnt = $Tp_cnt + 1;
						$Tp_amt = $Tp_amt + $amt;
					} else if ($per == "70%") {
						$Sp_cnt = $Sp_cnt + 1;
						$Sp_amt = $Sp_amt + $amt;
					} else if ($per == "100%") {
						$Hp_cnt = $Hp_cnt + 1;
						$Hp_amt = $Hp_amt + $amt;
					} else if ($other == "5") {
						$otherp_cnt = $otherp_cnt + 1;
						$otherp_amt = $otherp_amt + $amt;
					}
					$query2 = "INSERT INTO `taentrydetails`(`empid`, `reference_no`, `taDate`, `journey_type`, `train_no`, `journey_purpose`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `status`, `created_at`, cardpass,objective ,`set_number`) VALUES ( '" . $_SESSION['empid'] . "','" . $reference . "', '" . $date . "','" . $type . "','" . $_POST['trainno' . $k] . "','" . $other . "','" . $_POST['dstn' . $k] . "','" . $dtime . "','" . $_POST['astn' . $k] . "', '" . $atime . "','0','" . $per . "','" . $amt . "','0','" . $date1 . "','" . $cardpass . "','" . $object . "','0'  )";
					// echo "<br>";
					$sql2 = mysqli_query($conn,$query2);
					// echo "<br>";
					$lm++;
				}
			} else {
			}
		} else {
			//$k--;
			$Hp_cnt = $Hp_cnt + 1;
			$Hp_amt = $Hp_amt + $u_amount;
			$query2 = "INSERT INTO `taentrydetails`(`empid`, `reference_no`, `taDate`, `journey_type`, `train_no`, `journey_purpose`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `status`, `created_at`, cardpass,objective ,`set_number`) VALUES ( '" . $_SESSION['empid'] . "','" . $reference . "', '" . $dates[$j] . "','','','','','','', '','0','100%','" . $u_amount . "','0','" . $date1 . "','" . $cardpass . "','" . $object . "','0'  )";
			$sql2 = mysqli_query($conn,$query2);
			//echo "<br>";
			// echo "<br>Total Amount ".$tamount;
		}
	}
	// echo "<br>Total Amount ".$tamount;


	$query3 = "INSERT INTO `tasummarydetails`(`empid`, `reference_no`, `month`, `year`, `30p_cnt`, `30p_amt`, `70p_cnt`, `70p_amt`, `100p_cnt`, `100p_amt`, `otherp_cnt`, `otherp_amt`, `is_summary_generated`, `created_at`) VALUES ('" . $_SESSION['empid'] . "','" . $reference . "','" . $mts . "','" . $year . "','" . $Tp_cnt . "','" . $Tp_amt . "','" . $Sp_cnt . "','" . $Sp_amt . "','" . $Hp_cnt . "','" . $Hp_amt . "','" . $otherp_cnt . "','" . $otherp_amt . "','0','" . $date1 . "' )";

	$sql3 = mysqli_query($conn,$query3);
	echo "<script> window.location='Show_unclaimed_TA.php'; </script>";
}
