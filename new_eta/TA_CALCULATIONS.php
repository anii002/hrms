<?php
include "TA_PERCENTAGE.php";
	$sr=$_POST["sr"];  // Row Count
	$fromDate = $_POST['date0'];
	$toDate = $_POST['date'.$sr];

	// Declare an empty array 
	$all_date_array = array();
	$ta_array= array (); 
	$empty_date_array = array(); 
	$interval = new DateInterval('P1D'); 
	$realEnd = new DateTime($toDate); 
	$realEnd->add($interval); 
	$period = new DatePeriod(new DateTime($fromDate), $interval, $realEnd); 
	
	// variables
	$strEnd = $total_time = $end_time  ='';
	for($i=0; $i<=$sr; $i++){
		if($i==0){
			if($i==$sr){
				$next_cnt=$i;
			}else{
				$next_cnt=$i+1;
			}
			$start_time=$_POST['dtime'.$i];
			$strStart = $_POST['date'.$i]." ".$start_time;
			$current_date=$_POST['date'.$i];
			$next_date=$_POST['date'.$next_cnt];
			if($current_date!=$next_date){
				$end_time='00:00';
			    $strEnd = $_POST['date'.$next_cnt]." ".$end_time; 
			}else{
				echo $end_time=$_POST['atime'.$next_cnt];
			    $strEnd = $_POST['date'.$next_cnt]." ".$end_time;
			}

			$dteStart = new DateTime($strStart); 
			$dteEnd   = new DateTime($strEnd); 
			$dteDiff  = $dteStart->diff($dteEnd); 
			$time = $dteDiff->format("%H"); 
			$min = $dteDiff->format("%I");
			$total_time = $time.":".$min;
			$percent=get_percentage($total_time);
			array_push($ta_array, $current_date);
			array_push($ta_array, $start_time);
			array_push($ta_array, $next_date);
			array_push($ta_array, $end_time);
			array_push($ta_array, $time."->".$min);
			array_push($ta_array, $percent);
		}
		else{
			if($i==$sr){
				$next_cnt=$i;
			}else{
				$next_cnt=$i+1;
			}
			$current_date=$_POST['date'.$i];
			$next_date=$_POST['date'.$next_cnt];
			if($current_date==$next_date){
				if($_POST['dtime'.$i]==''){
					$start_time="00:00";
				}else{
					$start_time=$_POST['dtime'.$i];
				}
				if( $_POST['atime'.$next_cnt]==''){
					$end_time="23:59";
				}else{
					$end_time = $_POST['atime'.$next_cnt];
				}
				$strEnd   = $_POST['date'.$i]." ".$end_time;
			}
			else{
				
			} 
			$dteStart = new DateTime($current_date); 
			$dteEnd   = new DateTime($strEnd); 
			$dteDiff  = $dteStart->diff($dteEnd); 
			$time = $dteDiff->format("%H"); 
			$min = $dteDiff->format("%I");
			$total_time = $time.":".$min;
			$percent=get_percentage($total_time);
			array_push($ta_array, $current_date);
			array_push($ta_array, $start_time);
			array_push($ta_array, $next_date);
			array_push($ta_array, $end_time);
			array_push($ta_array, $time."->".$min);
			array_push($ta_array, $percent);
		} 
		
		 
	}
	print_r($ta_array);
	// $sort=sort($ta_array);
	// print_r($sort);
?>