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
	// $ref = rand(10000,999999);
	$year = date("Y");
	$reference = $_POST['u_ref_no'];
	// $_SESSION['empid'];
	$t_main_rows = $_POST['sr1'];
	$total_rows = $_POST['sr1'] + 1;

	// $mts=implode(",", $_POST['month']);
	//$mts=$_POST['month'];
	$object = mysqli_real_escape_string($conn, $_POST['object']);
	$cardpass = $_POST['cardpass'];
	$u_amount = $_POST['u_amount'];

	$set_no = $_POST['u_set_no'];

	$result = delete_ta_details($reference, $set_no);

	if ($result == 1) {
		$set_no = $set_no;

		// echo "<br>";
		$length = 0;
		$date_array = array();

		for ($i = 0; $i < $total_rows; $i++) {
			$date_array[] = $_POST['date' . $i];
			$length++;
		}

		$tr1 = count($date_array);
		// Declare two dates 
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

		// Display the dates in array format 
		// print_r($array); echo "<br>";
		// print_r($date_array); 
		$tr = count($dates);
		//echo $tr;
		// echo "<br>";
		$lm = 0;
		for ($j = 0; $j < $tr; $j++) {

			if (in_array($dates[$j], $date_array)) {
				if ($lm == "0") {
					$tamount = 0;
					for ($k = 0; $k < $total_rows; $k++) {
						$date = $_POST['date' . $k];
						$type = $_POST['type' . $k];
						$other = $_POST['other' . $k];
						$dtime = $_POST['dtime' . $k];
						$atime = $_POST['atime' . $k];
						$distance = $_POST['distance' . $k];
						$per = $_POST['per' . $k];
						$amt = $_POST['amt' . $k];
						$tamount = $tamount + $_POST['amt' . $k];

						if ($per == "30%" || $per == "30") {
							$Tp_cnt = $Tp_cnt + 1;
							$Tp_amt = $Tp_amt + $amt;
						} else if ($per == "70%" || $per == "70") {
							$Sp_cnt = $Sp_cnt + 1;
							$Sp_amt = $Sp_amt + $amt;
						} else if ($per == "100%" || $per == "100") {
							$Hp_cnt = $Hp_cnt + 1;
							$Hp_amt = $Hp_amt + $amt;
						}
						// 		else if($other == "5")
						// 		{
						// 			$otherp_cnt=$otherp_cnt+1;
						// 			$otherp_amt=$otherp_amt+$amt;
						// 		}
						$query2 = "INSERT INTO `taentrydetails`(`empid`, `reference_no`, `taDate`, `journey_type`, `train_no`, `journey_purpose`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `status`, `created_at`,cardpass,objective ,`set_number`) VALUES ( '" . $_SESSION['empid'] . "','" . $reference . "', '" . $date . "','" . $type . "','" . $_POST['trainno' . $k] . "','" . $other . "','" . $_POST['dstn' . $k] . "','" . $dtime . "','" . $_POST['astn' . $k] . "', '" . $atime . "','" . $distance . "','" . $per . "','" . $amt . "','0','" . $date1 . "','" . $cardpass . "','" . $object . "','" . $set_no . "'  )";
						// echo "<br>";
						$sql2 = mysqli_query($conn, $query2);
						// echo "<br>";
						$lm++;
					}
				} else {
				}
			} else {
				// echo "<br>900";
				$Hp_cnt = $Hp_cnt + 1;
				$Hp_amt = $Hp_amt + $u_amount;
				$query2 = "INSERT INTO `taentrydetails`(`empid`, `reference_no`, `taDate`, `journey_type`, `train_no`, `journey_purpose`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `status`, `created_at`, cardpass,objective ,`set_number`) VALUES ( '" . $_SESSION['empid'] . "','" . $reference . "', '" . $dates[$j] . "','','','','','','', '','0','100%','" . $u_amount . "','0','" . $date1 . "','" . $cardpass . "','" . $object . "','" . $set_no . "'  )";
				$sql2 = mysqli_query($conn, $query2);
			}
		}
		// echo "<br>Total Amount ".$tamount;

		$query = "SELECT `30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt`,`otherp_cnt`,`otherp_amt` FROM `tasummarydetails` WHERE reference_no='" . $_POST['u_ref_no'] . "' ";
		$sql = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($sql);

		$total_30p_cnt = $row['30p_cnt'] + $Tp_cnt;
		$total_30p_amt = $row['30p_amt'] + $Tp_amt;
		$total_70p_cnt = $row['70p_cnt'] + $Sp_cnt;
		$total_70p_amt = $row['70p_amt'] + $Sp_amt;
		$total_100p_cnt = $row['100p_cnt'] + $Hp_cnt;
		$total_100p_amt = $row['100p_amt'] + $Hp_amt;
		$total_otherp_cnt = $row['otherp_cnt'] + $otherp_cnt;
		$total_otherp_amt = $row['otherp_amt'] + $otherp_amt;

		$query3 = "UPDATE `tasummarydetails` SET `30p_cnt`='" . $total_30p_cnt . "',`30p_amt`='" . $total_30p_amt . "',`70p_cnt`='" . $total_70p_cnt . "',`70p_amt`='" . $total_70p_amt . "',`100p_cnt`='" . $total_100p_cnt . "',`100p_amt`='" . $total_100p_amt . "',`otherp_cnt`='" . $total_otherp_cnt . "',`otherp_amt`='" . $total_otherp_amt . "',`created_at`='" . $date1 . "' WHERE `reference_no`='" . $_POST['u_ref_no'] . "'  ";
		$sql3 = mysqli_query($conn, $query3);
		$empid = $_SESSION['empid'];
		$file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
		user_activity($empid, $file_name, 'Update TA', 'DA updating the TA');
		echo "<script>alert('TA Saved Successfully... '); window.location='Show_unclaimed_TA.php'; </script>";
	}
}






function delete_ta_details($reference, $set_no)
{
	global $conn;
	//echo ("SELECT DISTINCT(set_number) FROM `taentrydetails` WHERE reference_no='".$reference."' ");
	$sql = mysqli_query($conn, "SELECT DISTINCT(set_number) FROM `taentrydetails` WHERE reference_no='" . $reference . "' ");
	$total_rows = mysqli_num_rows($sql);
	//	echo $total_rows;
	//exit;
	$delete_flag = 0;

	if ($total_rows >= 1) {
		$sql1 = mysqli_query($conn, "SELECT `percent`,`amount` FROM `taentrydetails` WHERE `reference_no`='" . $reference . "' AND `set_number`='" . $set_no . "' ");
		$amt = 0;
		$Tp_cnt = 0;
		$Sp_cnt = 0;
		$Hp_cnt = 0;
		$Otp_cnt = 0;
		$Tp_amt = 0;
		$Sp_amt = 0;
		$Hp_amt = 0;
		$Otp_amt = 0;
		while ($result1 = mysqli_fetch_array($sql1)) {
			if ($result1['percent'] == "30%" || $result1['percent'] == "30") {
				$Tp_cnt = $Tp_cnt + 1;
				$Tp_amt = $Tp_amt + $result1['amount'];
			} else if ($result1['percent'] == "70%" || $result1['percent'] == "70") {
				$Sp_cnt = $Sp_cnt + 1;
				$Sp_amt = $Sp_amt + $result1['amount'];
			} else if ($result1['percent'] == "100%" || $result1['percent'] == "100") {
				$Hp_cnt = $Hp_cnt + 1;
				$Hp_amt = $Hp_amt + $result1['amount'];
			}
			//   else if($result1['percent'] != "")
			//   {
			//     $Otp_cnt=$Otp_cnt+1;
			//     $Otp_amt=$Otp_amt+$result1['amount'];
			//   }
		}

		$sql2 = mysqli_query($conn, "SELECT `30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt`,`otherp_cnt`,`otherp_amt` FROM `tasummarydetails` WHERE `reference_no`='" . $reference . "' AND `empid`='" . $_SESSION['empid'] . "' ");
		$result2 = mysqli_fetch_array($sql2);

		$total_30p_cnt = $result2['30p_cnt'] - $Tp_cnt;
		$total_30p_amt = $result2['30p_amt'] - $Tp_amt;
		$total_70p_cnt = $result2['70p_cnt'] - $Sp_cnt;
		$total_70p_amt = $result2['70p_amt'] - $Sp_amt;
		$total_100p_cnt = $result2['100p_cnt'] - $Hp_cnt;
		$total_100p_amt = $result2['100p_amt'] - $Hp_amt;

		$total_otherp_cnt = $result2['otherp_cnt'] - $Otp_cnt;
		$total_otherp_amt = $result2['otherp_amt'] - $Otp_amt;

		$sql3 = mysqli_query($conn, "DELETE FROM taentrydetails WHERE reference_no = '" . $reference . "' AND set_number = '" . $set_no . "' ");

		if (mysqli_affected_rows($conn) > 0) {
			$query4 = "UPDATE `tasummarydetails` SET `30p_cnt`='" . $total_30p_cnt . "',`30p_amt`='" . $total_30p_amt . "',`70p_cnt`='" . $total_70p_cnt . "',`70p_amt`='" . $total_70p_amt . "',`100p_cnt`='" . $total_100p_cnt . "',`100p_amt`='" . $total_100p_amt . "',`otherp_cnt`='" . $total_otherp_cnt . "',`otherp_amt`='" . $total_otherp_amt . "' WHERE `reference_no`='" . $reference . "'  ";

			$result4 = mysqli_query($conn, $query4);
			return 1;
		} else {
			return 0;
		}
	}
}
