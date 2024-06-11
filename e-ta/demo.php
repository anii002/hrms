<?php 
	$data = '[{"empid":"20141219","referenceno":"20141219/2018/683505","taDate":"2018-10-4","trainno":"8698","dStation":"SUR","departT":"18:10","arriveS":"PUNE","arrivaT":"22:10","distance":"4687","journeyType":"By Train","objective":"sgz","level":"10","leave":"None","tamonth":"10","tokeno":"2663","year":"2017","setno":"0","taPercent":"60","rowCount":2},{"empid":"20141219","referenceno":"20141219/2018/683505","taDate":"2018-10-8","trainno":"3827","dStation":"PUNE","departT":"08:10","arriveS":"SUR","arrivaT":"09:10","distance":"6750","journeyType":"By Train","objective":"sgsg","level":"10","leave":"None","tamonth":"10","tokeno":"2762","year":"2017","setno":"0","taPercent":"60","rowCount":2}]';
	$array = json_decode($data,true);
	print_r($array);
	echo $array[0]['empid'];
include("dbconfig/dbcon.php");
	$hide_count = count($array);
	$hide_count = $hide_count - 1;
	//echo $hide_count;
	$data = "";
	$date_count = 0;
	$k=1;

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
        $year = $array[0]['year'];
	$level = $array[0]['level'];
	$months = $array[0]['tamonth'];
	$objective =  $array[0]['objective'];
	$cardpass = addslashes($array[0]['tokeno']);
	//Find out TA amount 
		$query = "select amount from ta_amount where min<=$level AND max>=$level";
	  $result  = mysql_query($query) or die(mysql_error());
	  $value = mysql_fetch_array($result);
	  $amount = (int)$value['amount'];
	  echo $amount;
	for($j=0;$j<$hide_count;$j++)
	{
		//echo $array[$j]['taDate']." ".$array[$k]['taDate'];
		if($array[$j]['taDate']!=$array[$k]['taDate'])
		{
			$date_count++;
			echo $date_count;
		}
		$k++;
	}
	//echo $date_count;
	$repeat_count = 0;
	$k = $hide_count-1;
	echo "<style> table tr td { border : 2px solid black; }</style>";
	if($date_count==0)
	{
		$total_time = 0;
		echo $hide_count;
		echo "<h3>One day</h3>";
		echo "<table>";
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
			if($array[$i]['leave']=='None')
			{
				$BD = false;
				if($i==$hide_count)
				{
					$strStart = $array[0]['taDate']." ".$array[0]['departT']; 
					$strEnd   = $array[$hide_count]['taDate']." ".$array[$hide_count]['arrivaT']; 
					$dteStart = new DateTime($strStart); 
					$dteEnd   = new DateTime($strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H");
					$min = (int)$dteDiff->format("%I");
					$date = $array[0]['taDate'];
					echo $time;
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
			/*For exam validation */
			else if($array[$i]['leave']=='Exam')
			{
				$BD = false;
				if($i<$hide_count)
				{
					$strStart = $array[$i]['taDate']." ".$array[$i]['departT']; 
					$strEnd   = $array[$hide_count]['taDate']." ".$array[$i]['arrivaT']; 
					$dteStart = new DateTime($strStart); 
					$dteEnd   = new DateTime($strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H"); 
					$min = (int)$dteDiff->format("%I");
					$total_time += (int)$time;
					$temp_amout[$i_count] = "";
					$temp_percent[$i_count] = "";
					echo $total_time;
				}
				else if($i==$hide_count)
				{
					$strStart = $array[$i]['taDate']." ".$array[$i]['departT']; 
					$strEnd   = $array[$hide_count]['taDate']." ".$array[$i]['arrivaT']; 
					$dteStart = new DateTime($strStart); 
					$dteEnd   = new DateTime($strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H");
					$min = (int)$dteDiff->format("%I"); 
					$total_time += (int)$time;
					$date = $array[0]['taDate'];
					echo $total_time;
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
										echo "You already get 100% for this date";
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
			/*For break down allowances*/
			else if($array[$i]['leave']=='BD')
			{
				$BD = true;
				if($i==$hide_count)
				{
					$strStart = $array[0]['taDate']." ".$array[0]['departT']; 
					$strEnd   = $array[$hide_count]['taDate']." ".$array[$hide_count]['arrivaT']; 
					$dteStart = new DateTime($strStart); 
					$dteEnd   = new DateTime($strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H"); 
					$min = (int)$dteDiff->format("%I");
					$date = $array[0]['taDate'];
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[$i]['empid']."' and taDate='$date'";
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
		echo "<table>";
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
				
			if($array[$i]['leave']=='None')
			{
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
					$dteStart = new DateTime($strStart); 
					$dteEnd   = new DateTime($strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H");
					$min = (int)$dteDiff->format("%I");
					$date = $array[0]['taDate'];
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
					  $i_count++;
					  //echo $i_count."<br>";
					}
					else{
						$temp_amout[$i_count] = "";
						$temp_percent[$i_count] = "";
						$i_count++;
					}
					if($i<$hide_count)
						/*Code to check date difference*/
					{
						$diff_count = $i+1;
						$datetime1 = new DateTime($array[$i]['taDate']);
						$datetime2 = new DateTime($array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							//echo $diff_count;
									$begin = new DateTime( $array[$i]['taDate'] );
									$end = new DateTime( $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=0;
									foreach($daterange as $date){
										//echo "$i_count Dfferce ".$difference;
										if($count!=$difference)
										{
										$count = $count+1;
										if($date->format("Y-m-d")!= $array[$i]['taDate'])
										{
										$temp_date[$i_count]= $date->format("Y-m-d");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("Y-m-d");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[$i]['empid']."' and taDate='$date'";
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
						$dteStart = new DateTime($strStart); 
						$dteEnd   = new DateTime($strEnd); 
						$dteDiff  = $dteStart->diff($dteEnd); 
						$time = (int)$dteDiff->format("%H");
					$min = (int)$dteDiff->format("%I"); 
					
					echo "Time".$dteDiff->format("%I");
						$date = $begin_Date;
						$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[$i]['empid']."' and taDate='$date'";
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
						//echo $array[$i]['taDate']."<br><br>";
						$datetime1 = new DateTime($array[$i]['taDate']);
						$datetime2 = new DateTime($array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							
									$begin = new DateTime( $array[$i]['taDate'] );
									$end = new DateTime( $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=$i_count-1;
									foreach($daterange as $date){
										if($count!=$difference)
										{
										if($date->format("Y-m-d")!= $temp_date[$cnt])
										{
											
										//echo $date->format("Y-m-d");
										$count = $count+1;
										$temp_date[$i_count]= $date->format("Y-m-d");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";$date = $date->format("Y-m-d");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
			else if($array[$i]['leave']=='BD')
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
					$dteStart = new DateTime($strStart); 
					$dteEnd   = new DateTime($strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H");
					$min = (int)$dteDiff->format("%I"); 
					$date = $array[0]['taDate'];
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
						/*Code to check date difference*/
					{
						$diff_count = $i+1;
						$datetime1 = new DateTime($array[$i]['taDate']);
						$datetime2 = new DateTime($array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							//echo $diff_count;
									$begin = new DateTime( $array[$i]['taDate'] );
									$end = new DateTime( $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=0;
									foreach($daterange as $date){
										//echo "$i_count Dfferce ".$difference;
										if($count!=$difference)
										{
										$count = $count+1;
										if($date->format("Y-m-d")!= $array[0]['taDate'])
										{
										$temp_date[$i_count]= $date->format("Y-m-d");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("Y-m-d");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
						$dteStart = new DateTime($strStart); 
						$dteEnd   = new DateTime($strEnd); 
						$dteDiff  = $dteStart->diff($dteEnd); 
						$time = (int)$dteDiff->format("%H"); 
					$min = (int)$dteDiff->format("%I");
						
						$date = $begin_Date;
						$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[$i]['empid']."' and taDate='$date'";
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
						$datetime1 = new DateTime($array[$i]['taDate']);
						$datetime2 = new DateTime($array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							
									$begin = new DateTime( $array[$i]['taDate'] );
									$end = new DateTime( $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=$i_count-1;
									foreach($daterange as $date){
										if($count!=$difference)
										{
										if($date->format("Y-m-d")!= $temp_date[$cnt])
										{
											
										//echo $date->format("Y-m-d");
										$count = $count+1;
										$temp_date[$i_count]= $date->format("Y-m-d");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";$date = $date->format("Y-m-d");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
			else if($array[$i]['leave']=='training')
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
					$dteStart = new DateTime($strStart); 
					$dteEnd   = new DateTime($strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H"); 
					$min = (int)$dteDiff->format("%I");
					global $total_time;
					$total_time += (int)$time;
					$date = $array[0]['taDate'];
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
							  if(isset($_REQUEST['percentage'.$i]))
							  {
								  $calamount = ($amount* (int)$_REQUEST['percentage'.$i])/100;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = ""+$_REQUEST['percentage'.$i]."%";
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
						/*Code to check date difference*/
					{
						$diff_count = $i+1;
						$datetime1 = new DateTime($array[$i]['taDate']);
						$datetime2 = new DateTime($array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							//echo $diff_count;
									$begin = new DateTime( $array[$i]['taDate'] );
									$end = new DateTime( $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=0;
									foreach($daterange as $date){
										//echo "$i_count Dfferce ".$difference;
										if($count!=$difference)
										{
										$count = $count+1;
										if($date->format("Y-m-d")!= $array[$i]['taDate'])
										{
										$temp_date[$i_count]= $date->format("Y-m-d");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("Y-m-d");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
								  $calamount = ($amount* (int)$_REQUEST['percentage'.$i])/100;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = ""+$_REQUEST['percentage'.$i];
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
						echo $strStart;
						echo $strEnd;
						$dteStart = new DateTime($strStart); 
						$dteEnd   = new DateTime($strEnd); 
						$dteDiff  = $dteStart->diff($dteEnd); 
						$time = (int)$dteDiff->format("%H"); 
					$min = (int)$dteDiff->format("%I");
						$date = $begin_Date;
						$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
							  
							  if(isset($_REQUEST['percentage'.$i]))
							  {
								  $calamount = ($amount* (int)$_REQUEST['percentage'.$i])/100;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = ""+$_REQUEST['percentage'.$i]."%";
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
						//echo $array[$i]['taDate']."<br><br>";
						$datetime1 = new DateTime($array[$i]['taDate']);
						$datetime2 = new DateTime($array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							
									$begin = new DateTime( $array[$i]['taDate'] );
									$end = new DateTime( $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=$i_count-1;
									foreach($daterange as $date){
										if($count!=$difference)
										{
										if($date->format("Y-m-d")!= $temp_date[$cnt])
										{
											
										//echo $date->format("Y-m-d");
										$count = $count+1;
										$temp_date[$i_count]= $date->format("Y-m-d");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";$date = $date->format("Y-m-d");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
								$calamount = ($amount* (int)$_REQUEST['percentage'.$i])/100;
								$temp_amout[$i_count] = $calamount;
								$temp_percent[$i_count] = ""+$_REQUEST['percentage'.$i]."%";
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
			else if($array[$i]['leave']=='Exam')
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
					$dteStart = new DateTime($strStart); 
					$dteEnd   = new DateTime($strEnd); 
					$dteDiff  = $dteStart->diff($dteEnd); 
					$time = (int)$dteDiff->format("%H"); 
					$min = (int)$dteDiff->format("%I");
					global $total_time;
					$total_time += (int)$time;
					$date = $array[0]['taDate'];
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
					  $i_count++;
					  //echo $i_count."<br>";
					}
					else{
						$temp_amout[$i_count] = "";
						$temp_percent[$i_count] = "";
						$i_count++;
					}
					if($i<$hide_count)
						/*Code to check date difference*/
					{
						$diff_count = $i+1;
						$datetime1 = new DateTime($array[$i]['taDate']);
						$datetime2 = new DateTime($array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							//echo $diff_count;
									$begin = new DateTime( $array[$i]['taDate'] );
									$end = new DateTime( $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=0;
									foreach($daterange as $date){
										//echo "$i_count Dfferce ".$difference;
										if($count!=$difference)
										{
										$count = $count+1;
										if($date->format("Y-m-d")!= $array[$i]['taDate'])
										{
										$temp_date[$i_count]= $date->format("Y-m-d");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("Y-m-d");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
						$dteStart = new DateTime($strStart); 
						$dteEnd   = new DateTime($strEnd); 
						$dteDiff  = $dteStart->diff($dteEnd); 
						$time = (int)$dteDiff->format("%H"); 
					$min = (int)$dteDiff->format("%I");
						$date = $begin_Date;
						$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
						//echo $array[$i]['taDate']."<br><br>";
						$datetime1 = new DateTime($array[$i]['taDate']);
						$datetime2 = new DateTime($array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							
									$begin = new DateTime( $array[$i]['taDate'] );
									$end = new DateTime( $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=$i_count-1;
									foreach($daterange as $date){
										if($count!=$difference)
										{
										if($date->format("Y-m-d")!= $temp_date[$cnt])
										{
											
										//echo $date->format("Y-m-d");
										$count = $count+1;
										$temp_date[$i_count]= $date->format("Y-m-d");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";$date = $date->format("Y-m-d");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
						$datetime1 = new DateTime($array[$i]['taDate']);
						$datetime2 = new DateTime($array[$diff_count]['taDate']);
						$interval = $datetime1->diff($datetime2);
						$difference =  (int)$interval->format('%a');
						
						if($difference>1)
						{
							//echo $diff_count;
									$begin = new DateTime( $array[$i]['taDate'] );
									$end = new DateTime( $array[$diff_count]['taDate'] );
									$end = $end->modify( '+1 day' ); 

									$interval = new DateInterval('P1D');
									$daterange = new DatePeriod($begin, $interval ,$end);
									$count = 0;$cnt=0;
									foreach($daterange as $date){
										//echo "$i_count Dfferce ".$difference;
										if($count!=$difference)
										{
										$count = $count+1;
										if($date->format("Y-m-d")!= $array[$i]['taDate'])
										{
										$temp_date[$i_count]= $date->format("Y-m-d");
										$temp_train[$i_count]= "";
										$temp_dept_time[$i_count] = "";
										$temp_station[$i_count] = "";
										$temp_arri_station[$i_count] = "";
										$temp_arri_time[$i_count] =  "";
										$temp_distance[$i_count] = "";
										$temp_journey_type[$i_count] =  "";
										$temp_leave[$i_count] = "";
										$date = $date->format("Y-m-d");
										$temp_amout[$i_count] = "$amount";
										$temp_percent[$i_count] = "100";
					$query = "select SUM(percent) AS SUM from taentryforms where empid='".$array[0]['empid']."' and taDate='$date'";
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
				//Leave ends here
			}
		}
	}
	echo "<table><tbody>";
	$ref = rand(10000,999999);
        $reference = $array[0]['empid']."/".$year."/".$ref;
	for($show=0;$show<$i_count;$show++)
	{
		echo "<tr>";
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
		echo "</tr>";
		global $con;
		if($show==0)
		{
	  $query_outer = "insert into taentryform_master(empid,reference,TAYear, TAMonth, cardpass) values('".$array[0]['empid']."','$reference','$year','$months','$cardpass')";
	  
	 // $result_outer = mysql_query($query_outer);
		}
		$query = "INSERT INTO `taentryforms`(empid,reference_id,`taDate`, `train`, `departS`, `departT`, `arrivalS`, `arrivalT`, `distance`, `percent`, `amount`, `set_number`,`journey_type`,`cardpass`,`leave_info`,`Objective`) VALUES ('".$array[0]['empid']."','$reference','".$temp_date[$show]."','".$temp_train[$show]."','".$temp_station[$show]."','".$temp_dept_time[$show]."','".$temp_arri_station[$show]."','".$temp_arri_time[$show]."','".$temp_distance[$show]."','".$temp_percent[$show]."','".$temp_amout[$show]."','$set','".$temp_journey_type[$show]."','$cardpass','".$temp_leave[$show]."','$objective')";
		$_SESSION['table_ref']=$reference;
		//$result = mysql_query($query) or die(mysql_error());

  // if($result)
    // echo "Record inserted successfully";
  // else
    // echo "Failed to insert";
	}
	echo "</tbody></table>";
	//echo "<script>alert('TA Claimed successfully');window.location='Show_claimed_TA.php';</script>";
	
?>