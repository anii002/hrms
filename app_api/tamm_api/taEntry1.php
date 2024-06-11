<?php 

/*$data='[{"empid":"01580632","referenceno":"01580632/2018/633010","taDate":"2018-2-5","trainno":"4513","dStation":"SUR","departT":"13:00","arriveS":"PUNE","arrivaT":"20:30","distance":"450","journeyType":"By Train","objective":"","level":"7","leave":"None","tamonth":"2","tokeno":"wer","year":"2018","setno":"0","taPercent":"0","rowCount":2},{"empid":"01580632","referenceno":"01580632/2018/633010","taDate":"2018-2-6","trainno":"15423","dStation":"PUNE","departT":"09:30","arriveS":"SUR","arrivaT":"01:30","distance":"450","journeyType":"By Train","objective":"","level":"7","leave":"None","tamonth":"2","tokeno":"234","year":"2018","setno":"0","taPercent":"0","rowCount":2}]';*/
	
	require_once 'DB_function.php';
    $db1=new DB_Function();
	$data=$_POST['TA'];
	$array = json_decode($data,true);
	//print_r($array);
	//echo $array[0]['empid'];

	$response=array("error"=>false);
	
	$hide_count = count($array);
	$hide_count = $hide_count-1;

	//echo $hide_count;
	$data = "";
	$date_count = 0;
	$k=1;

        $Tp_cnt=0;
		$Tp_amt=0;
		$Sp_cnt=0;
		$Sp_amt=0;
		$Hp_cnt=0;
		$Hp_amt=0;
		$otherp_cnt=0;
		$otherp_amt=0;
		
	$BD = false;
	$temp_date = [];
	$temp_train = [];
	$temp_dept_time = [];
	$temp_station = [];
	$temp_arri_station=[];
	$temp_arri_time=[];
	$temp_journey_type = [];
	$temp_leave = [];
	$temp_percent = [];
	$temp_amout = [];
	$temp_distance = [];
	$cnt_row = 0;
	$beginT="";
	$endT="";
	$tempr = 0;
	$changed=0;
	$i_count=0;
	$set = $array[0]['setno'];
// 	$set++;
    $year = $array[0]['year'];
	$level = $array[0]['level'];
//	echo $level;
	$months = $array[0]['tamonth'];
	$objective =  $array[0]['objective'];
	$cardpass = addslashes($array[0]['tokeno']);
	//Find out TA amount 
		$query = "select amount from ta_amount where min<='".$level."' and max>='".$level."'";
	  $result  = mysql_query($query) or die(mysql_error());
	  $value = mysql_fetch_array($result);
	  $amount = (int)$value['amount'];
	  //echo $amount;
	for($j=0;$j<$hide_count;$j++)
	{
		//echo $array[$j]['taDate']." ".$array[$k]['taDate'];
		if($array[$j]['taDate']!=$array[$k]['taDate'])
		{
			$date_count++;
//			echo $date_count;
		}
		$k++;
	}
	
	//echo $date_count;
	$repeat_count = 0;
	$k = $hide_count-1;
	//echo "<style> table tr td { border : 2px solid black; }</style>";
	if($date_count==0)
	{
		$total_time = 0;
		//echo $hide_count;
		//echo "<h3>One day</h3>";
		//echo "<table>";
		for($i=0;$i<=$hide_count;$i++)
		{
			$temp_date[$i_count]= $array[$i]['taDate'];
			$temp_train[$i_count]= $array[$i]['trainno'];
			$temp_dept_time[$i_count] = $array[$i]['departT'];
			$temp_station[$i_count] = $array[$i]['dStation'];
			$temp_arri_station[$i_count] = $array[$i]['arriveS'];
			$temp_arri_time[$i_count] =  $array[$i]['arrivaT'];
			$temp_distance[$i_count] = $array[$i]['distance'];
			$temp_journey_type[$i_count] =  $array[$i]['journeyType'];
			$temp_leave[$i_count] = $array[$i]['leave'];
			if($array[$i]['leave']=='1')
			{
				$BD = false;
				if($i==$hide_count)
				{
					$strStart = $array[0]['taDate']." ".$array[0]['departT']; 
					$strEnd   = $array[$hide_count]['taDate']." ".$array[$hide_count]['arrivaT']; 
					$dteStart = DateTime::createFromFormat('d/m/Y H:i',$strStart); 
					$dteEnd   = DateTime::createFromFormat('d/m/Y H:i',$strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H");
					$min = (int)$dteDiff->format("%I");
					$date = $array[0]['taDate'];
				// 	echo $time;
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
					//echo $query;
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
							if($time<6){
								$calamount = $amount*0.3;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = "30%";
							}
							else if($time>=6 && $time<12){
								if($time==6 && $min==0)
								{
									$calamount = $amount*0.3;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "30%";
								}
								else
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
							}
							else {
								if($time==12 && $min==0)
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
								else
								{
									$temp_amout[$i_count] = $amount;
									$temp_percent[$i_count] = "100%";
								}
							}
							if($BD==true)
							  {
								  $temp_amout[$i_count] = $amount;
								  $temp_percent[$i_count] = "100%";
							  }
							  
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
								// 		echo "You already get 100% for this date";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												if($time==6 && $min==0)
												{
													$calamount = $amount*0.3;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "30%";
												}
												else
												{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
												}
											}
									}
					  }
					  
				}
				else
				{
					$temp_amout[$i_count] = "";
					$temp_percent[$i_count] = "";
				}
			}
//			For exam validation 
			else if($array[$i]['leave']=='4')
			{
				$BD = false;
				if($i<$hide_count)
				{
					$strStart = $array[$i]['taDate']." ".$array[$i]['departT']; 
					$strEnd   = $array[$hide_count]['taDate']." ".$array[$i]['arrivaT']; 
					$dteStart = DateTime::createFromFormat('d/m/Y H:i',$strStart); 
					$dteEnd   = DateTime::createFromFormat('d/m/Y H:i',$strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H"); 
					$min = (int)$dteDiff->format("%I");
					$total_time += (int)$time;
					$temp_amout[$i_count] = "";
					$temp_percent[$i_count] = "";
				// 	echo $total_time;
				}
				else if($i==$hide_count)
				{
					$strStart = $array[$i]['taDate']." ".$array[$i]['departT']; 
					$strEnd   = $array[$hide_count]['taDate']." ".$array[$i]['arrivaT']; 
					$dteStart =  DateTime::createFromFormat('d/m/Y H:i',$strStart); 
					$dteEnd   =  DateTime::createFromFormat('d/m/Y H:i',$strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H");
					$min = (int)$dteDiff->format("%I"); 
					$total_time += (int)$time;
					$date = $array[0]['taDate'];
				// 	echo $total_time;
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
							if($total_time<6){
								$calamount = $amount*0.3;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = "30%";
							}
							else if($total_time>=6 && $total_time<12){
								if($time==6 && $min==0)
								{
									$calamount = $amount*0.3;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "30%";
								}
								else
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
							}
							else {
								if($time==12 && $min==0)
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
								else
								{
									$temp_amout[$i_count] = $amount;
									$temp_percent[$i_count] = "100%";
								}
							}
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
								// 		echo "You already get 100% for this date";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												if($time==6 && $min==0)
												{
													$calamount = $amount*0.3;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "30%";
												}
												else
												{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
												}
											}
										
									}
					  }
				}
				else
				{
					$temp_amout[$i_count] = "";
					$temp_percent[$i_count] = "";
				}
			}
			//For break down allowances
			else if($array[$i]['leave']=='3')
			{
				$BD = true;
				if($i==$hide_count)
				{
					$strStart = $array[0]['taDate']." ".$array[0]['departT']; 
					$strEnd   = $array[$hide_count]['taDate']." ".$array[$hide_count]['arrivaT']; 
					$dteStart =  DateTime::createFromFormat('d/m/Y H:i',$strStart); 
					$dteEnd   =  DateTime::createFromFormat('d/m/Y H:i',$strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H"); 
					$min = (int)$dteDiff->format("%I");
					$date = $array[0]['taDate'];
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[$i]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
							
								$temp_amout[$i_count] = $amount;
								$temp_percent[$i_count] = "100%";
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
								// 		echo "You already get 100% for this date";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
												$calamount = $amount*0.7;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "70%";
									}
					  }
				}
				else
				{
					$temp_amout[$i_count] = "";
					$temp_percent[$i_count] = "";
				}
			}
			$i_count++;
		}
	}
	else
	{
		echo "<h3>Normal</h3>";
// 		echo "<table>";
		$end=0;
		for($i=0;$i<=$hide_count;$i++)
		{
			
			$temp_date[$i_count]= $array[$i]['taDate'];
			$temp_train[$i_count]= $array[$i]['trainno'];
			$temp_dept_time[$i_count] = $array[$i]['departT'];
			$temp_station[$i_count] = $array[$i]['dStation'];
			$temp_arri_station[$i_count] = $array[$i]['arriveS'];
			$temp_arri_time[$i_count] =  $array[$i]['arrivaT'];
			$temp_distance[$i_count] = $array[$i]['distance'];
			$temp_journey_type[$i_count] =  $array[$i]['journeyType'];
			$temp_leave[$i_count] = $array[$i]['leave'];
			//echo $temp_date[$i_count];
				$tmp = $i+1;
				
			if($array[$i]['leave']=='1')
			{
			    echo "On Duty";
				$begin_Date = $array[$i]['taDate'];	
				if($i==0)
				{
					if($array[$tmp]['taDate']==$begin_Date)
						{
						    echo "Same Date";
							if($cnt_row==0)
							{
								$beginT = $array[$i]['departT'];
							}
							else{
								$endT = $array[$i]['arrivaT'];
							}
							$tempr = 1;
						}
						else{
							$cnt_row= 0;
						}
					if($array[$tmp]['taDate']!=$begin_Date)
					{
					    echo "next Date".$array[$tmp]['taDate'];
					    
					    echo "Begin Date".$begin_Date;
					   // $BD=true;
					$strStart = $array[0]['taDate']." ".$array[0]['departT']; 
					$strEnd   = $array[0]['taDate']." 24:00"; 
					$dteStart =  DateTime::createFromFormat('d/m/Y H:i',$strStart); 
					$dteEnd   =  DateTime::createFromFormat('d/m/Y H:i',$strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H");
					$min = (int)$dteDiff->format("%I");
					$date = $array[0]['taDate'];
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
							if($time<6){
								$calamount = $amount*0.3;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = "30%";
							}
							else if($time>=6 && $time<12){
								if($time==6 && $min==0)
								{
									$calamount = $amount*0.3;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "30%";
								}
								else
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
							}
							else {
								if($time==12 && $min==0)
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
								else
								{
									$temp_amout[$i_count] = $amount;
									$temp_percent[$i_count] = "100%";
								}
							}
							if($BD==true)
							  {
								  $temp_amout[$i_count] = $amount;
								  $temp_percent[$i_count] = "100%";
								//   $BD=false;
							  }
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
										echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												if($time==6 && $min==0)
												{
													$calamount = $amount*0.3;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "30%";
												}
												else
												{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
												}
											}
										
									}
					  }
					  $i_count++;
					  //echo $i_count."<br>";
					}
					else{
						$temp_amout[$i_count] = "";
						$temp_percent[$i_count] = "";
						$i_count++;
					}
					if($i<$hide_count)
						//Code to check date difference
					{
						$diff_count = $i+1;
				// 		$datetime1 = new DateTime($array[$i]['taDate']);
				// 		$datetime2 = new DateTime($array[$diff_count]['taDate']);
						
						$datetime1 = DateTime::createFromFormat('d/m/Y',$array[$i]['taDate']);
						$datetime2 = DateTime::createFromFormat('d/m/Y',$array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							echo "date Diff".$diff_count;
								// 	$begin = new DateTime( $array[$i]['taDate'] );
								// 	$end = new DateTime( $array[$diff_count]['taDate'] );
									$begin = DateTime::createFromFormat('d/m/Y',$array[$i]['taDate'] );
									$end = DateTime::createFromFormat('d/m/Y',$array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=0;
									foreach($daterange as $date){
										echo "$i_count Dfferce ".$difference;
										if($count!=$difference)
										{
										$count = $count+1;
										if($date->format("d/m/Y")!= $array[$i]['taDate'])
										{
										$temp_date[$i_count]= $date->format("d/m/Y");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("d/m/Y");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[$i]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
								$temp_amout[$i_count] = $amount;
								$temp_percent[$i_count] = "100%";
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
										echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												if($time==6 && $min==0)
												{
													$calamount = $amount*0.3;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "30%";
												}
												else
												{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
												}
											}
										
									}
					  }
										//echo $date->format("Y-m-d")."<br>";
										if($count<=$difference)
											$i_count++;
										//echo $i_count." i coount<br>";
										}
										}
									}
						}
						
					}
					
			//echo "Count = ".$i_count;
					//finished
				}
				else if($i<=$hide_count)
				{
					//echo $i_count." = icounts <br>";
					//$i_count++;
					$begin_Date = $array[$i]['taDate'];
					if($tempr != 1)
					{
						$beginT = $array[$i]['departT'];
					}
					$endT = $array[$i]['arrivaT'];
					$tmp = 0;
					if($i<$hide_count)
						$tmp = $i+1;
					$tmpr = $i-1;
					if($array[$tmp]['arrivaT']==$begin_Date)
						{
							if($cnt_row==0)
							{
								$beginT = $array[$i]['departT'];
							}
							else{
								$endT = $array[$i]['arrivaT'];
							}
							$changed=0;
						}
						else{
							$cnt_row= 0;
							if($tempr==1)
							{
								$tempr=0;
								$changed=1;
							}
						}
						
					if($array[$tmp]['taDate']!=$begin_Date)
					{
						if($beginT=="")
							$beginT="00:00";
						if($endT=="" || $i<$hide_count)
							$endT="23:59";
						if($i==$hide_count)
							$beginT="00:00";
						if($i<$hide_count && $tempr == 0 && $changed==0){
							$beginT="00:00";
							$endT="23:59";
						}
						if($tempr==2)
							$tempr=0;
						$strStart = $begin_Date." ".$beginT; 
						$strEnd   = $begin_Date." ".$endT; 
						$dteStart =  DateTime::createFromFormat('d/m/Y H:i',$strStart); 
				// 		$dteStart=date_format($dtStart, 'd/m/Y H:i');
						$dteEnd   = DateTime::createFromFormat('d/m/Y H:i',$strEnd); 
				// 		$dteEnd   = date_format($dtEnd, 'd/m/Y H:i'); 
						$dteDiff  = $dteStart->diff($dteEnd); 
						$time = (int)$dteDiff->format("%H");
					$min = (int)$dteDiff->format("%I"); 
					
					echo "Time DIff".$dteDiff->format("%I");
						$date = $begin_Date;
						$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[$i]['empid']."' and taDate='$date'";
						  $result = mysql_query($query);
						  $data = mysql_fetch_array($result);
						  $cnt = mysql_num_rows($result);
						  if($cnt>0 && $data['SUM']!="")
						  {
							$sum =  $data['SUM'];
						  }
						  else
						  {
							$sum= 0;
						  }
						  if($sum==0)
						  {
							  if($time<6){
								$calamount = $amount*0.3;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = "30%";
							}
							else if($time>=6 && $time<12){
								if($time==6 && $min==0)
								{
									$calamount = $amount*0.3;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "30%";
								}
								else
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
							}
							else {
								if($time==12 && $min==0)
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
								else
								{
									$temp_amout[$i_count] = $amount;
									$temp_percent[$i_count] = "100%";
								}
							}
							if($BD==true)
							  {
								  $temp_amout[$i_count] = $amount;
								  $temp_percent[$i_count] = "100%";
							  }
						  }
						  else
						  {
							  
								$remain = 100-$sum;
								if($remain==0 || $remain==10)
										{
											$amount=0;
											echo "You already get 100% for this date";
											$temp_amout[$i_count] = 0;
											$temp_percent[$i_count] = "0%";
										}
										else if($remain==30 || $remain==40)
										{
											$calamount = $amount*0.3;
											$temp_amout[$i_count] = $calamount;
											$temp_percent[$i_count] = "30%";
										}
										else if($remain==70)
										{
												if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												if($time==6 && $min==0)
												{
													$calamount = $amount*0.3;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "30%";
												}
												else
												{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
												}
											}
											
										}
						  }
					}
					else
					{
						$temp_amout[$i_count] = "";
						$temp_percent[$i_count] = "";
					}
					
					
			$i_count++;
					$diff_count = $i+1;
					if($diff_count<=$hide_count)
					{
						echo $array[$i]['taDate']."<br><br>";
				// 		$datetime1 = new DateTime($array[$i]['taDate']);
				// 		$datetime2 = new DateTime($array[$diff_count]['taDate']);
						$datetime1 = DateTime::createFromFormat('d/m/Y',$array[$i]['taDate']);
						$datetime2 = DateTime::createFromFormat('d/m/Y',$array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							
									$begin = DateTime::createFromFormat('d/m/Y', $array[$i]['taDate'] );
									$end = DateTime::createFromFormat('d/m/Y', $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=$i_count-1;
									foreach($daterange as $date){
										if($count!=$difference)
										{
										if($date->format("d/m/Y")!= $temp_date[$cnt])
										{
											
										//echo $date->format("Y-m-d");
										$count = $count+1;
										$temp_date[$i_count]= $date->format("d/m/Y");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("d/m/Y");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  //echo "SUM : ".$sum." Time : ".$time;
					  if($sum==0)
					  {
								$temp_amout[$i_count] = $amount;
								$temp_percent[$i_count] = "100%";
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
										echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												if($time==6 && $min==0)
												{
													$calamount = $amount*0.3;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "30%";
												}
												else
												{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
												}
											}
										
									}
					  }
										//echo $date->format("Y-m-d")."<br>";
										if($count<$difference)
											$i_count++;
										//echo $i_count." i coount<br>";
										
										//echo $i_count;
										}
										}
										
									}
						}
					}
			//echo "<br><br>I count = $i_count <br>";
				}
				
			}//MSC END
			//Break down validation start
			else if($array[$i]['leave']=='3')
			{
				$BD = true;
				$begin_Date = $array[$i]['taDate'];
				if($i==0)
				{
					if($array[$tmp]['taDate']==$begin_Date)
						{
							if($cnt_row==0)
							{
								$beginT = $array[$i]['departT'];
							}
							else{
								$endT = $array[$i]['arrivaT'];
							}
							$tempr = 1;
						}
						else{
							$cnt_row= 0;
						}
					if($array[$tmp]['taDate']!=$begin_Date)
					{
					$strStart = $array[0]['taDate']." ".$array[0]['departT']; 
					$strEnd   = $array[0]['taDate']." 24:00"; 
					$dteStart = DateTime::createFromFormat('d/m/Y H:i',$strStart); 
					$dteEnd   = DateTime::createFromFormat('d/m/Y H:i',$strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H");
					$min = (int)$dteDiff->format("%I"); 
					$date = $array[0]['taDate'];
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
							
								$temp_amout[$i_count] = $amount;
								$temp_percent[$i_count] = "100%";
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
										// 		echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
												$calamount = $amount*0.7;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "70%";
										
									}
					  }
					  $i_count++;
					  //echo $i_count."<br>";
					}
					else{
						$temp_amout[$i_count] = "";
						$temp_percent[$i_count] = "";
						$i_count++;
					}
					if($i<$hide_count)
						//Code to check date difference
					{
						$diff_count = $i+1;
						$datetime1 = DateTime::createFromFormat('d/m/Y',$array[$i]['taDate']);
						$datetime2 = DateTime::createFromFormat('d/m/Y',$array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							//echo $diff_count;
									$begin = DateTime::createFromFormat('d/m/Y', $array[$i]['taDate'] );
									$end =  DateTime::createFromFormat('d/m/Y', $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=0;
									foreach($daterange as $date){
										//echo "$i_count Dfferce ".$difference;
										if($count!=$difference)
										{
										$count = $count+1;
										if($date->format("d/m/Y")!= $array[0]['taDate'])
										{
										$temp_date[$i_count]= $date->format("d/m/Y");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("d/m/Y");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
								$temp_amout[$i_count] = $amount;
								$temp_percent[$i_count] = "100%";
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
								// 		echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
												$calamount = $amount*0.7;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "70%";
										
									}
					  }
										//echo $date->format("Y-m-d")."<br>";
										if($count<=$difference)
											$i_count++;
										//echo $i_count." i coount<br>";
										}
										}
									}
						}
						
					}
				}
				else if($i<=$hide_count)
				{
					//echo $i_count." = icounts <br>";
					//$i_count++;
					$begin_Date = $array[$i]['taDate'];
					if($tempr != 1)
					{
						$beginT = $array[$i]['departT'];
					}
					$endT = $array[$i]['arrivaT'];
					$tmp = 0;
					if($i<$hide_count)
						$tmp = $i+1;
					$tmpr = $i-1;
					if($array[$i]['taDate']==$begin_Date)
						{
							if($cnt_row==0)
							{
								$beginT = $array[$i]['departT'];
							}
							else{
								$endT = $array[$i]['arrivaT'];
							}
							$changed=0;
						}
						else{
							$cnt_row= 0;
							if($tempr==1)
							{
								$tempr=0;
								$changed=1;
							}
						}
						
					if($array[$tmp]['taDate']!=$begin_Date)
					{
						if($beginT=="")
							$beginT="00:00";
						if($endT=="" || $i<$hide_count)
							$endT="23:59";
						if($i==$hide_count)
							$beginT="00:00";
						if($i<$hide_count && $tempr == 0 && $changed==0){
							$beginT="00:00";
							$endT="23:59";
						}
						if($tempr==2)
							$tempr=0;
						$strStart = $begin_Date." ".$beginT; 
						$strEnd   = $begin_Date." ".$endT; 
						$dteStart = DateTime::createFromFormat('d/m/Y H:i',$strStart); 
						$dteEnd   = DateTime::createFromFormat('d/m/Y H:i',$strEnd); 
						$dteDiff  = $dteStart->diff($dteEnd); 
						$time = (int)$dteDiff->format("%H"); 
					$min = (int)$dteDiff->format("%I");
						
						$date = $begin_Date;
						$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[$i]['empid']."' and taDate='$date'";
						  $result = mysql_query($query);
						  $data = mysql_fetch_array($result);
						  $cnt = mysql_num_rows($result);
						  if($cnt>0 && $data['SUM']!="")
						  {
							$sum =  $data['SUM'];
						  }
						  else
						  {
							$sum= 0;
						  }
						  if($sum==0)
						  {
									$calamount = $amount;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "100%";
						  }
						  else
						  {
							  
								$remain = 100-$sum;
								if($remain==0 || $remain==10)
										{
											$amount=0;
								// 			echo "You already get 100% for this date";
											$temp_amout[$i_count] = 0;
											$temp_percent[$i_count] = "0%";
										}
										else if($remain==30 || $remain==40)
										{
											$calamount = $amount*0.3;
											$temp_amout[$i_count] = $calamount;
											$temp_percent[$i_count] = "30%";
										}
										else if($remain==70)
										{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
										}
						  }
					}
					else
					{
						$temp_amout[$i_count] = "";
						$temp_percent[$i_count] = "";
					}
					
					
			$i_count++;
					$diff_count = $i+1;
					if($diff_count<=$hide_count)
					{
						//echo $array[$i]['taDate']."<br><br>";
						$datetime1 = DateTime::createFromFormat('d/m/Y',$array[$i]['taDate']);
						$datetime2 = DateTime::createFromFormat('d/m/Y',$array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							
									$begin = DateTime::createFromFormat('d/m/Y', $array[$i]['taDate'] );
									$end = DateTime::createFromFormat('d/m/Y', $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=$i_count-1;
									foreach($daterange as $date){
										if($count!=$difference)
										{
										if($date->format("d/m/Y")!= $temp_date[$cnt])
										{
											
										//echo $date->format("Y-m-d");
										$count = $count+1;
										$temp_date[$i_count]= $date->format("d/m/Y");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("d/m/Y");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  //echo "SUM : ".$sum." Time : ".$time;
					  if($sum==0)
					  {
								$temp_amout[$i_count] = $amount;
								$temp_percent[$i_count] = "100%";
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
								// 		echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
												$calamount = $amount*0.7;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "70%";
									}
					  }
										//echo $date->format("Y-m-d")."<br>";
										if($count<$difference)
											$i_count++;
										//echo $i_count." i coount<br>";
										
										//echo $i_count;
										}
										}
										
									}
						}
					}
			//echo "<br><br>I count = $i_count <br>";
				}
			}//Break down validation end here
			else if($array[$i]['leave']=='5')
			{
				$BD = false;
				if($i==0)
				{
					if($array[$tmp]['taDate']==$begin_Date)
						{
							if($cnt_row==0)
							{
								$beginT = $array[$i]['departT'];
							}
							else{
								$endT = $array[$i]['arrivaT'];
							}
							$tempr = 1;
						}
						else{
							$cnt_row= 0;
						}
					if($array[$tmp]['taDate']!=$begin_Date)
					{
					$strStart = $array[0]['taDate']." ".$array[0]['departT']; 
					$strEnd   = $array[0]['taDate']." ".$array[0]['arrivaT']; 
					$dteStart = DateTime::createFromFormat('d/m/Y H:i',$strStart); 
					$dteEnd   = DateTime::createFromFormat('d/m/Y H:i',$strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H"); 
					$min = (int)$dteDiff->format("%I");
					global $total_time;
					$total_time += (int)$time;
					$date = $array[0]['taDate'];
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
							if($time<6){
								$calamount = $amount*0.3;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = "30%";
							}
							else if($time>=6 && $time<12){
								if($time==6 && $min==0)
								{
									$calamount = $amount*0.3;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "30%";
								}
								else
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
							}
							else {
								if($time==12 && $min==0)
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
								else
								{
									$temp_amout[$i_count] = $amount;
									$temp_percent[$i_count] = "100%";
								}
							}
							if($BD==true)
							  {
								  $temp_amout[$i_count] = $amount;
								  $temp_percent[$i_count] = "100%";
							  }
							  if(isset($array[$i]['taPercent']))
							  {
								  $calamount = ($amount* (int)$array[$i]['taPercent'])/100;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = ""+$array[$i]['taPercent']."%";
							  }
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
								// 		echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												if($time==6 && $min==0)
												{
													$calamount = $amount*0.3;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "30%";
												}
												else
												{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
												}
											}
										
									}
					  }
					  $i_count++;
					  //echo $i_count."<br>";
					}
					else{
						$temp_amout[$i_count] = "";
						$temp_percent[$i_count] = "";
						$i_count++;
					}
					if($i<$hide_count)
						//Code to check date difference
					{
						$diff_count = $i+1;
						$datetime1 = DateTime::createFromFormat('d/m/Y',$array[$i]['taDate']);
						$datetime2 = DateTime::createFromFormat('d/m/Y',$array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							//echo $diff_count;
									$begin = DateTime::createFromFormat('d/m/Y', $array[$i]['taDate'] );
									$end = DateTime::createFromFormat('d/m/Y', $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=0;
									foreach($daterange as $date){
										//echo "$i_count Dfferce ".$difference;
										if($count!=$difference)
										{
										$count = $count+1;
										if($date->format("d/m/Y")!= $array[$i]['taDate'])
										{
										$temp_date[$i_count]= $date->format("d/m/Y");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("d/m/Y");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
								  $calamount = ($amount* (int)$array[$i]['taPercent'])/100;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = ""+$array[$i]['taPercent'];
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
								// 		echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												if($time==6 && $min==0)
												{
													$calamount = $amount*0.3;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "30%";
												}
												else
												{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
												}
											}
										
									}
					  }
										//echo $date->format("Y-m-d")."<br>";
										if($count<=$difference)
											$i_count++;
										//echo $i_count." i coount<br>";
										}
										}
									}
						}
						
					}
					
			//echo "Count = ".$i_count;
					//finished
				}
				else if($i<=$hide_count)
				{
					//echo $i_count." = icounts <br>";
					//$i_count++;
					$begin_Date = $array[$i]['taDate'];
					if($tempr != 1)
					{
						$beginT = $array[$i]['departT'];
					}
					$endT = $array[$i]['arrivaT'];
					$tmp = 0;
					if($i<$hide_count)
						$tmp = $i+1;
					$tmpr = $i-1;
					if($array[$tmp]['taDate']==$begin_Date)
						{
							if($cnt_row==0)
							{
								$beginT = $array[$i]['departT'];
							}
							else{
								$endT = $array[$i]['arrivaT'];
							}
							$changed=0;
						}
						else{
							$cnt_row= 0;
							if($tempr==1)
							{
								$tempr=0;
								$changed=1;
							}
						}
						
					if($array[$tmp]['taDate']!=$begin_Date)
					{
						if($beginT=="")
							$beginT="00:00";
						if($endT=="")
							$endT="23:59";
						if($tempr==2)
							$tempr=0;
						$strStart = $begin_Date." ".$beginT; 
						$strEnd   = $begin_Date." ".$endT; 
				// 		echo $strStart;
				// 		echo $strEnd;
						$dteStart = DateTime::createFromFormat('d/m/Y H:i',$strStart); 
						$dteEnd   = DateTime::createFromFormat('d/m/Y H:i',$strEnd); 
						$dteDiff  = $dteStart->diff($dteEnd); 
						$time = (int)$dteDiff->format("%H"); 
					$min = (int)$dteDiff->format("%I");
						$date = $begin_Date;
						$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
						  $result = mysql_query($query);
						  $data = mysql_fetch_array($result);
						  $cnt = mysql_num_rows($result);
						  if($cnt>0 && $data['SUM']!="")
						  {
							$sum =  $data['SUM'];
						  }
						  else
						  {
							$sum= 0;
						  }
						  if($sum==0)
						  {
							  if($time<6){
								$calamount = $amount*0.3;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = "30%";
							}
							else if($time>=6 && $time<12){
								if($time==6 && $min==0)
								{
									$calamount = $amount*0.3;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "30%";
								}
								else
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
							}
							else {
								if($time==12 && $min==0)
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
								else
								{
									$temp_amout[$i_count] = $amount;
									$temp_percent[$i_count] = "100%";
								}
							}
							if($BD==true)
							  {
								  $temp_amout[$i_count] = $amount;
								  $temp_percent[$i_count] = "100%";
							  }
							  
							  if(isset($array[$i]['taPercent']))
							  {
								  $calamount = ($amount* (int)$array[$i]['taPercent'])/100;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = ""+$array[$i]['taPercent']."%";
							  }
						  }
						  else
						  {
							  
								$remain = 100-$sum;
								if($remain==0 || $remain==10)
										{
											$amount=0;
								// 			echo "You already get 100% for this date";
											$temp_amout[$i_count] = 0;
											$temp_percent[$i_count] = "0%";
										}
										else if($remain==30 || $remain==40)
										{
											$calamount = $amount*0.3;
											$temp_amout[$i_count] = $calamount;
											$temp_percent[$i_count] = "30%";
										}
										else if($remain==70)
										{
												if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												if($time==6 && $min==0)
												{
													$calamount = $amount*0.3;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "30%";
												}
												else
												{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
												}
											}
											
										}
						  }
					}
					else
					{
						$temp_amout[$i_count] = "";
						$temp_percent[$i_count] = "";
					}
					
					
			$i_count++;
					$diff_count = $i+1;
					if($diff_count<=$hide_count)
					{
						//echo $array[$i]['taDate']."<br><br>";
						$datetime1 = DateTime::createFromFormat('d/m/Y',$array[$i]['taDate']);
						$datetime2 = DateTime::createFromFormat('d/m/Y',$array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							
									$begin = DateTime::createFromFormat('d/m/Y', $array[$i]['taDate'] );
									$end = DateTime::createFromFormat('d/m/Y', $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=$i_count-1;
									foreach($daterange as $date){
										if($count!=$difference)
										{
										if($date->format("d/m/Y")!= $temp_date[$cnt])
										{
											
										//echo $date->format("Y-m-d");
										$count = $count+1;
										$temp_date[$i_count]= $date->format("d/m/Y");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("d/m/Y");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
								$calamount = ($amount* (int)$array[$i]['taPercent'])/100;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = ""+$array[$i]['taPercent']."%";
										//echo $date->format("Y-m-d")."<br>";
										if($count<$difference)
											$i_count++;
										//echo $i_count." i coount<br>";
										
										//echo $i_count;
										}
										}
										
									}
						}
					}
			//echo "<br><br>I count = $i_count <br>";
				}
				
			}//Training validation end here
			else if($array[$i]['leave']=='4')
			{
				$BD = false;
				if($i==0)
				{
					if($array[$tmp]['taDate']==$begin_Date)
						{
							if($cnt_row==0)
							{
								$beginT = $array[$i]['departT'];
							}
							else{
								$endT = $array[$i]['arrivaT'];
							}
							$tempr = 1;
						}
						else{
							$cnt_row= 0;
						}
					if($array[$tmp]['taDate']!=$begin_Date)
					{
					$strStart = $array[0]['taDate']." ".$array[0]['departT']; 
					$strEnd   = $array[0]['taDate']." ".$array[0]['arrivaT']; 
					$dteStart = DateTime::createFromFormat('d/m/Y H:i',$strStart); 
					$dteEnd   = DateTime::createFromFormat('d/m/Y H:i',$strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H"); 
					$min = (int)$dteDiff->format("%I");
					global $total_time;
					$total_time += (int)$time;
					$date = $array[0]['taDate'];
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
							if($time<6){
								$calamount = $amount*0.3;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = "30%";
							}
							else if($time>=6 && $time<12){
								if($time==6 && $min==0)
								{
									$calamount = $amount*0.3;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "30%";
								}
								else
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
							}
							else {
								if($time==12 && $min==0)
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
								else
								{
									$temp_amout[$i_count] = $amount;
									$temp_percent[$i_count] = "100%";
								}
							}
							if($BD==true)
							  {
								  $temp_amout[$i_count] = $amount;
								  $temp_percent[$i_count] = "100%";
							  }
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
								// 		echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												if($time==6 && $min==0)
												{
													$calamount = $amount*0.3;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "30%";
												}
												else
												{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
												}
											}
										
									}
					  }
					  $i_count++;
					  //echo $i_count."<br>";
					}
					else{
						$temp_amout[$i_count] = "";
						$temp_percent[$i_count] = "";
						$i_count++;
					}
					if($i<$hide_count)
						//Code to check date difference
					{
						$diff_count = $i+1;
						$datetime1 = DateTime::createFromFormat('d/m/Y',$array[$i]['taDate']);
						$datetime2 = DateTime::createFromFormat('d/m/Y',$array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							//echo $diff_count;
									$begin = DateTime::createFromFormat('d/m/Y', $array[$i]['taDate'] );
									$end =  DateTime::createFromFormat('d/m/Y', $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=0;
									foreach($daterange as $date){
										//echo "$i_count Dfferce ".$difference;
										if($count!=$difference)
										{
										$count = $count+1;
										if($date->format("d/m/Y")!= $array[$i]['taDate'])
										{
										$temp_date[$i_count]= $date->format("d/m/Y");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("d/m/Y");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
								$temp_amout[$i_count] = $amount;
								$temp_percent[$i_count] = "100%";
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
								// 		echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												if($time==6 && $min==0)
												{
													$calamount = $amount*0.3;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "30%";
												}
												else
												{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
												}
											}
										
									}
					  }
										//echo $date->format("Y-m-d")."<br>";
										if($count<=$difference)
											$i_count++;
										//echo $i_count." i coount<br>";
										}
										}
									}
						}
						
					}
					
			//echo "Count = ".$i_count;
					//finished
				}
				else if($i<=$hide_count)
				{
					//echo $i_count." = icounts <br>";
					//$i_count++;
					$begin_Date = $array[$i]['taDate'];
					if($tempr != 1)
					{
						$beginT = $array[$i]['departT'];
					}
					$endT = $array[$i]['arrivaT'];
					$tmp = 0;
					if($i<$hide_count)
						$tmp = $i+1;
					$tmpr = $i-1;
					if($array[$tmp]['taDate']==$begin_Date)
						{
							if($cnt_row==0)
							{
								$beginT = $array[$i]['departT'];
							}
							else{
								$endT = $array[$i]['arrivaT'];
							}
							$changed=0;
						}
						else{
							$cnt_row= 0;
							if($tempr==1)
							{
								$tempr=0;
								$changed=1;
							}
						}
						
					if($array[$tmp]['taDate']!=$begin_Date)
					{
						if($beginT=="")
							$beginT="00:00";
						if($endT=="")
							$endT="23:59";
						if($tempr==2)
							$tempr=0;
						$strStart = $begin_Date." ".$beginT; 
						$strEnd   = $begin_Date." ".$endT; 
						// echo $strStart;
						// echo $strEnd;
						$dteStart = DateTime::createFromFormat('d/m/Y H:i',$strStart); 
						$dteEnd   = DateTime::createFromFormat('d/m/Y H:i',$strEnd); 
						$dteDiff  = $dteStart->diff($dteEnd); 
						$time = (int)$dteDiff->format("%H"); 
					$min = (int)$dteDiff->format("%I");
						$date = $begin_Date;
						$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
						  $result = mysql_query($query);
						  $data = mysql_fetch_array($result);
						  $cnt = mysql_num_rows($result);
						  if($cnt>0 && $data['SUM']!="")
						  {
							$sum =  $data['SUM'];
						  }
						  else
						  {
							$sum= 0;
						  }
						  if($sum==0)
						  {
							  if($time<6){
								$calamount = $amount*0.3;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = "30%";
							}
							else if($time>=6 && $time<12){
								if($time==6 && $min==0)
								{
									$calamount = $amount*0.3;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "30%";
								}
								else
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
							}
							else {
								if($time==12 && $min==0)
								{
									$calamount = $amount*0.7;
									$temp_amout[$i_count] = $calamount;
									$temp_percent[$i_count] = "70%";
								}
								else
								{
									$temp_amout[$i_count] = $amount;
									$temp_percent[$i_count] = "100%";
								}
							}
							if($BD==true)
							  {
								  $temp_amout[$i_count] = $amount;
								  $temp_percent[$i_count] = "100%";
							  }
						  }
						  else
						  {
							  
								$remain = 100-$sum;
								if($remain==0 || $remain==10)
										{
											$amount=0;
								// 			echo "You already get 100% for this date";
											$temp_amout[$i_count] = 0;
											$temp_percent[$i_count] = "0%";
										}
										else if($remain==30 || $remain==40)
										{
											$calamount = $amount*0.3;
											$temp_amout[$i_count] = $calamount;
											$temp_percent[$i_count] = "30%";
										}
										else if($remain==70)
										{
												if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												if($time==6 && $min==0)
												{
													$calamount = $amount*0.3;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "30%";
												}
												else
												{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
												}
											}
											
										}
						  }
					}
					else
					{
						$temp_amout[$i_count] = "";
						$temp_percent[$i_count] = "";
					}
					
					
			$i_count++;
					$diff_count = $i+1;
					if($diff_count<=$hide_count)
					{
						//echo $array[$i]['taDate']."<br><br>";
						$datetime1 = DateTime::createFromFormat('d/m/Y',$array[$i]['taDate']);
						$datetime2 = DateTime::createFromFormat('d/m/Y',$array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							
									$begin = DateTime::createFromFormat('d/m/Y', $array[$i]['taDate'] );
									$end = DateTime::createFromFormat('d/m/Y', $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=$i_count-1;
									foreach($daterange as $date){
										if($count!=$difference)
										{
										if($date->format("d/m/Y")!= $temp_date[$cnt])
										{
											
										//echo $date->format("Y-m-d");
										$count = $count+1;
										$temp_date[$i_count]= $date->format("d/m/Y");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";$date = $date->format("d/m/Y");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
								$temp_amout[$i_count] = $amount;
								$temp_percent[$i_count] = "0%";
										//echo $date->format("Y-m-d")."<br>";
										if($count<$difference)
											$i_count++;
										//echo $i_count." i coount<br>";
										
										//echo $i_count;
										}
										}
										
									}
						}
					}
			//echo "<br><br>I count = $i_count <br>";
				}
				
			}//Exam validation end here
			else
			{
				$temp_amout[$i_count] = "0";
				$temp_percent[$i_count] = "0";
				$i_count++;
				//Leave module
					$diff_count = $i+1;
						$datetime1 = DateTime::createFromFormat('d/m/Y',$array[$i]['taDate']);
						$datetime2 = DateTime::createFromFormat('d/m/Y',$array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							//echo $diff_count;
									$begin = DateTime::createFromFormat('d/m/Y', $array[$i]['taDate'] );
									$end = DateTime::createFromFormat('d/m/Y', $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=0;
									foreach($daterange as $date){
										//echo "$i_count Dfferce ".$difference;
										if($count!=$difference)
										{
										$count = $count+1;
										if($date->format("d/m/Y")!= $array[$i]['taDate'])
										{
										$temp_date[$i_count]= $date->format("d/m/Y");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("d/m/Y");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentrydetails where empid='".$array[0]['empid']."' and taDate='$date'";
					  $result = mysql_query($query);
					  $data = mysql_fetch_array($result);
					  $cnt = mysql_num_rows($result);
					  if($cnt>0 && $data['SUM']!="")
					  {
						$sum =  $data['SUM'];
					  }
					  else
					  {
						$sum= 0;
					  }
					  if($sum==0)
					  {
								$temp_amout[$i_count] = $amount;
								$temp_percent[$i_count] = "100%";
					  }
					  else
					  {
							$remain = 100-$sum;
							if($remain==0 || $remain==10)
									{
										$amount=0;
								// 		echo "You already get 100% for this date";
										$temp_amout[$i_count] = 0;
										$temp_percent[$i_count] = "0%";
									}
									else if($remain==30 || $remain==40)
									{
										$calamount = $amount*0.3;
										$temp_amout[$i_count] = $calamount;
										$temp_percent[$i_count] = "30%";
									}
									else if($remain==70)
									{
											if($time<6)
											{
												$calamount = $amount*0.3;
												$temp_amout[$i_count] = $calamount;
												$temp_percent[$i_count] = "30%";
											}
											else
											{
												if($time==6 && $min==0)
												{
													$calamount = $amount*0.3;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "30%";
												}
												else
												{
													$calamount = $amount*0.7;
													$temp_amout[$i_count] = $calamount;
													$temp_percent[$i_count] = "70%";
												}
											}
									}
					  }
										//echo $date->format("Y-m-d")."<br>";
										if($count<=$difference)
											$i_count++;
										//echo $i_count." i coount<br>";
										}
										}
									}
						}
				//Leave ends here
			}
		}
	}
	
	//echo "<table><tbody>";
	//$ref = rand(10000,999999);
      //  $reference = $array[0]['empid']."/".$year."/".$ref;
	for($show=0;$show<$i_count;$show++)
	{
		/*echo "<tr>";
		echo 	"<td>".$temp_date[$show]." </td>";
		echo	"<td>".$temp_train[$show]."</td>";
		echo	"<td>".$temp_dept_time[$show]."</td>";
		echo	"<td>".$temp_station[$show]."</td>";
		echo	"<td>".$temp_arri_station[$show]."</td>";
		echo	"<td>".$temp_arri_time[$show]."</td>";
		echo	"<td>".$temp_distance[$show]."</td>";
		echo	"<td>".$temp_journey_type[$show]."</td>";
		echo	"<td>".$temp_leave[$show]."</td>";
		echo	"<td>".$temp_percent[$show]."</td>";
		echo	"<td>".$temp_amout[$show]."</td>";
		echo "</tr>";*/
		global $con;
		
		date_default_timezone_set('Asia/Kolkata');
	    $date1=date("d/m/Y h:i:s");
		
		if($show==0)
		{
	  $query_outer = "insert into taentry_master(empid,reference_no,TAYear, TAMonth, cardpass,created_date,objective) values('".$array[0]['empid']."','".$array[0]['referenceno']."','$year','$months','$cardpass','$date1','$objective')";
	  
	 $result_outer = mysql_query($query_outer);
		}
		
		if($temp_percent[$show] == "30%" )
						{
							$Tp_cnt=$Tp_cnt+1;
							$Tp_amt=$Tp_amt+$temp_amout[$show];
							
				// 			echo $Tp_amt;
						}
						else if($temp_percent[$show] == "70%")
						{
							$Sp_cnt=$Sp_cnt+1;
							$Sp_amt=$Sp_amt+$temp_amout[$show];
						}
						else if($temp_percent[$show] == "100%")
						{
							$Hp_cnt=$Hp_cnt+1;
							$Hp_amt=$Hp_amt+$temp_amout[$show];
						}
						else if($array[$show]['leave'] == "5")
						{
							$otherp_cnt=$otherp_cnt+1;
							$otherp_amt=$otherp_amt+$temp_amout[$show];
						}
		$query = "INSERT INTO `taentrydetails`(empid,reference_no,`taDate`, `train_no`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `set_number`,`journey_type`,`cardpass`,`journey_purpose`,`objective`,`created_at`) VALUES ('".$array[0]['empid']."','".$array[0]['referenceno']."','".$temp_date[$show]."','".$temp_train[$show]."','".$temp_station[$show]."','".$temp_dept_time[$show]."','".$temp_arri_station[$show]."','".$temp_arri_time[$show]."','".$temp_distance[$show]."','".$temp_percent[$show]."','".$temp_amout[$show]."','$set','".$temp_journey_type[$show]."','$cardpass','".$temp_leave[$show]."','$objective','$date1')";
		$_SESSION['table_ref']=$array[0]['referenceno'];
		$result = mysql_query($query) or die(mysql_error());
	}

/*if($result)
//Success!
  {
     $response["error"]=true;
	 echo json_encode($response);
  }else
  {
	  $response["error"]=false;
	 echo json_encode($response);
  }*/
   /*else
     echo "Failed to insert";
	}*/
	
	$query3="INSERT INTO `tasummarydetails`(`empid`, `reference_no`, `month`, `year`, `30p_cnt`, `30p_amt`, `70p_cnt`, `70p_amt`, `100p_cnt`, `100p_amt`, `otherp_cnt`, `otherp_amt`, `is_summary_generated`, `created_at`) VALUES ('".$array[0]['empid']."','".$array[0]['referenceno']."','".$months."','".$year."','".$Tp_cnt."','".$Tp_amt."','".$Sp_cnt."','".$Sp_amt."','".$Hp_cnt."','".$Hp_amt."','".$otherp_cnt."','".$otherp_amt."','0','".$date1."' )";
	 //echo $query3;
	mysql_query($query3);
	
// 	echo "INSERT INTO `tasummarydetails`(`empid`, `reference_no`, `month`, `year`, `30p_cnt`, `30p_amt`, `70p_cnt`, `70p_amt`, `100p_cnt`, `100p_amt`, `otherp_cnt`, `otherp_amt`, `is_summary_generated`, `created_at`) VALUES ('".$array[0]['empid']."','".$array[0]['referenceno']."','".$months."','".$year."','".$Tp_cnt."','".$Tp_amt."','".$Sp_cnt."','".$Sp_amt."','".$Hp_cnt."','".$Hp_amt."','".$otherp_cnt."','".$otherp_amt."','0','".$date1."' )".mysql_error();
	//echo "</tbody></table>";
	//echo "<script>alert('TA Claimed successfully');window.location='Show_claimed_TA.php';</script>";
	
?>
