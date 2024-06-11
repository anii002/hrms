<?php
  require_once("../../global/user_header.php");
  require_once("../../global/user_topbar.php");
  require_once("../../global/user_sidebar.php");
?>
  <div class="content-wrapper">
     <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
      	<span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        फुटकर बिल सारांश विवरण रिपोर्ट / Contingency Summary Report Details
      	</span>
      	<span style="float: right">
	  		<button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
	  	</span>
	  </span>
	  <div class="clearfix"></div>
    </section>
    <section class="content">

<?php

if(isset($_SESSION['empid']) && isset($_REQUEST['id']))
{
$get_month = explode("-",$_REQUEST['id']);
	?>
	<?php
									$cnt=1;
									$cont_sum = 0;
									$total_sum_ta =0;
									$ref = "";
									$query = "SELECT e.pfno, e.name, e.desig, e.bp, ta.cont_date, tam.month, ta.reference_no, SUM(ta.amount) as sum from employees as e INNER JOIN add_cont as ta ON e.pfno = ta.empid INNER JOIN master_cont tam ON tam.reference_no = ta.reference_no  WHERE ta.reference_no IN(SELECT reference FROM tbl_summary_details where summary_id = '".$_REQUEST['id']."' and reject_pending='0' AND reference = (SELECT reference FROM tbl_summary where is_cont = '1' AND id = '".$_REQUEST['id']."')) GROUP BY ta.reference_no"; //DATE_FORMAT(ta.created_at, '%Y-%m-%d')
									$associative_emp = array();	
									
									$result = mysql_query($query);
									$total_sum =0;
									while($val = mysql_fetch_assoc($result))
									{
										$pf_no = $val['pfno'];
										$ref = $val['reference_no'];
										$associative_month = array();
										$array = array();
										$innnerset = mysql_query("select * from bill_forward where reference_id = '". $val['reference_no'] ."' order by id DESC");
										$innerresult = mysql_fetch_array($innnerset);
										if($innerresult['hold_status']=="1")
										{
											$check_date = "SELECT * FROM add_cont WHERE reference_no = '".$val['reference_no']."'";
											$data = mysql_query($check_date);
											while($row = mysql_fetch_array($data))
											{
												$time=strtotime($row['cont_date']);
												$taDate = $row['cont_date'];
												$month=date("F",$time);
												if(!array_key_exists($pf_no, $associative_emp)){
													$array[] = $row['kms'];
													array_push($array, $row['amount']);
													$associative_month[$month] = $array;
													$associative_emp[$pf_no] = $associative_month;
													//print_r($associative_emp[$pf_no]);
													
												}else{
													if(!array_key_exists($month, $associative_emp[$pf_no])){
														$array = array();
														$array[] = $row['kms'];
														array_push($array, $row['amount']);
														$associative_emp[$pf_no][$month] = $array;
														
													}
													else{
														//print_r($associative_emp[$pf_no][$month][0]);
														$associative_emp[$pf_no][$month][0] = $associative_emp[$pf_no][$month][0] + $row['kms'];
														$associative_emp[$pf_no][$month][1] = $associative_emp[$pf_no][$month][1] + $row['amount'];
														//print_r($associative_emp[$pf_no]);
													}
												}
											}


	                      						$query1 = "SELECT e.pfno, e.name, e.desig, e.bp, ta.cont_date, tam.month, ta.reference_no, SUM(ta.amount) as sum from employees as e INNER JOIN add_cont as ta ON e.pfno = ta.empid INNER JOIN master_cont tam ON tam.reference_no = ta.reference_no  WHERE ta.reference_no IN(SELECT reference FROM tbl_summary_details where summary_id = '".$_REQUEST['id']."' and reject_pending='0' AND reference = (SELECT reference FROM tbl_summary where is_cont = '1' AND id = '".$_REQUEST['id']."')) GROUP BY ta.reference_no";
												$result1 = mysql_query($query1);
												$total = 0;
												$data = "";
												while($res = mysql_fetch_array($result1))
												{
												    //$data .= "<a href='show_seperate_claim.php?id=".$res['reference_id']."' class='btn btn-primary'>Show</a>"; 
													$innner = mysql_query("select * from `continjency_master` where reference='".$res['reference_no']."'");
													while($resultset = mysql_fetch_array($innner))
													{
														$inner_query = mysql_query("SELECT SUM(total_amount) as total FROM `continjency` where cid='".$resultset['id']."' and set_number='".$resultset['set_number']."'");
														$resultinner = mysql_fetch_array($inner_query);
														$total = $total + (int) $resultinner['total'];
													}
	                   							}
	                       						$total_sum_ta = $total_sum_ta + $total;
												//echo "<td>$total</td>";
	                  							//echo "<td class='hidden-print'>";
												//echo "$data</td></tr>";
												$cont_sum = $cont_sum + (int)$val['sum'];
												$cnt++;
											}
									
										

									}
									//print_r($associative_emp);
								 ?>
								  
				<div class="box box-info">
					<div class="box-header">
						<h3 class="box-title">Summary Report Details</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive">
						<!--table id="" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>Sr. No</th>
								<th>P.F. No</th>
								<th>Name</th>
								<th>Design</th>
								<th>Basic</th>
								<th>TA Amount</th>
								<?php 
									if($_SESSION['role']=='6' || $_SESSION['role']=='5' || $_SESSION['role']=='2')
									{
										echo "<th class='hide-print'>Action</th>";
									}
								?>
							</tr>
							</thead>
							<tbody>
								<?php
								$cnt=1;
								$sum = 0;
								$ref = "";
									$query = "SELECT e.pfno, e.name, e.desig, e.bp, ta.reference_no, SUM(ta.amount) as sum from employees as e INNER JOIN add_cont as ta ON e.pfno = ta.empid WHERE ta.reference_no IN(SELECT reference FROM tbl_summary_details where summary_id = '".$_REQUEST['id']."' AND reject_pending='0') GROUP BY ta.reference_no";
									//echo $query;
									$result = mysql_query($query);
									while($val = mysql_fetch_array($result))
									{
										//$ref = $val['reference_id'];
										$innerquery = mysql_query("select fowarded_to from bill_forward where reference_id='".$val['reference_no']."' order by id desc");
										$resultinner = mysql_fetch_array($innerquery);
										if($resultinner['fowarded_to']==$_SESSION['empid'])
										{
											$ref = $val['reference_no'];
										echo "
										<tr>
											<td>$cnt</td>
											<td>".$val['pfno']."</td>
											<td>".$val['name']."</td>
											<td>".$val['desig']."</td>
											<td>".$val['bp']."</td>
											<td>".$val['sum']."</td>"; 
											if($_SESSION['role']=='6')
											{
											echo "<td><button class='btn btn-danger return_btn hide-print' value='".$ref."' data-toggle='modal' emp='".$val['pfno']."' data-target='#return' >Return </button> </td>";
											}
											if($_SESSION['role']=='5')
											{
											echo "<td class='hide-print'><button class='btn btn-danger hide-print reject_btn' value='".$ref."' data-toggle='modal' emp='".$val['pfno']."' data-target='#ReturntoEst' >Reject </button>";
											echo "<a style='margin-left:5px;' class='btn btn-primary hide-print' href='show_seperate_claim.php?id=".$ref."'>view </a> </td>";
											}
											if($_SESSION['role']=='2')
											{
											echo "<td class='hide-print'><a class='btn btn-primary hide-print' href='show_seperate_claim.php?id=".$ref."'>view </a> </td>";
											}
										echo "</tr>
										";
									}
										$sum = $sum + (int)$val['sum'];
										$cnt++;
									}
								 ?>
								<tr>
									<td colspan="5" style="text-align:right; font-size:16px; font-weight:bold;">Total</td>
									<td style="font-size:16px; font-weight:bold;"><?php echo $sum; ?></td>
								</tr>

							</tbody>
						</table-->
						<?php

			$query = "SELECT ta.set_no, ta.reference_no, tam.created_at, e.level, e.pfno, e.name, e.desig, e.bp, ta.cont_date, tam.month, ta.reference_no, SUM(ta.amount) as sum from employees as e INNER JOIN add_cont as ta ON e.pfno = ta.empid INNER JOIN master_cont tam ON tam.reference_no = ta.reference_no  WHERE ta.reference_no IN(SELECT reference FROM tbl_summary_details where summary_id = '".$_REQUEST['id']."' and reject_pending='0' AND reference = (SELECT reference FROM tbl_summary where is_cont = '1' AND id = '".$_REQUEST['id']."')) GROUP BY ta.reference_no";
			$result = mysql_query($query);
			
			$total_sum =0;
			$sr = 1;
			echo '<table id="" class="table  table-hover" style="page-break-inside: inherit; border-collapse:collapse" width="100%" border="1">
						<thead>
							<tr>
								<th rowspan="2" valign= "top">Sr No</th>
								<th rowspan="2" valign= "top">P.F. No</th>
								<th rowspan="2" valign= "top">Name</th>
								<th rowspan="2" valign= "top">Design</th>
								<th rowspan="2" valign= "top">Basic Pay</th> 
								<th rowspan="2" valign= "top">Rate</th> 
								<th rowspan="2" valign= "top">Contingency Month</th>
								<th rowspan="2" valign= "top"><center>Claimed Month</center></th>
								<!--th rowspan="2"><center>Rate/KM</center></th> 
								<th rowspan="2"><center>KM</center></th> 
								<th rowspan="2"><center>Amount</center></th--> 
								<th colspan="2"><center>Total</center></th>
								<th colspan="2"><center>Total Contingency (KM/Amount)</center></th>
								
								<th class="hidden-print" rowspan="2">Action</th>
								
							</tr>
							<tr>

								<th>KM</th>
								<th>Amount</th>
								<th>Total KM</th>
								<th>Total Amount</th>
							</tr>
							</thead>
							<tbody>';
							$cot_count = 0;
							$total_km_count = 0;
			while($val = mysql_fetch_assoc($result))
			{
				$dummy = 0;
				
				foreach ($associative_emp as $key => $value) 
				{
					$pf_cnt = 1;
					if($val['pfno'] == $key && $pf_cnt == '1')
					{	
						$query1 = "select amount from ta_amount where min<=".$val['level']." AND max>=".$val['level']."";
	  					$result1  = mysql_query($query1);
	  					$value1 = mysql_fetch_array($result1);
	  					$amount1 = (int)$value1['amount'];
	  					
						echo "
						<tr>
						<td>$sr</td>
						<td>".$val['pfno']." </td>
						<td>".$val['name']."</td>
						<td>".$val['desig']."</td>
						<td>".$val['bp']."</td>
						<td>".$amount1."</td>";
						$tem = $associative_emp[$val['pfno']];
						//echo $count = count($tem);
						$keyss = array_keys($tem);
						//print_r($keyss);
						$da = '';
						$coun = count($keyss);
						for($i=0; $i<$coun; $i++){
							$da .= "<tr style='line-height: 1.8'><td>".$keyss[$i]."</td></tr>";
						}
						$t = date_create($val['created_at']);
						echo"<td><table>".$da."</table></td>
						<td>".$t->Format('F')."</td>";
						echo "<td colspan='2'>";
						$km_count = $amoun_count = 0;
						$query_sum = "SELECT percent, SUM(amount) AS sum, COUNT(reference_id) AS cnt FROM 	taentryforms where amount<>'' and reference_id='".$ref."' GROUP BY percent";
	                    $result_sum = mysql_query($query_sum);
	                    $result_show = mysql_fetch_array($result_sum);
	                    echo "<table border='0' width='100%' style='table-layout: auto; text-align:center'>";
	                    foreach ($value as $month => $percent_value) 
	                    {
	                    	echo "<tr><td>".$associative_emp[$val['pfno']][$month][0]."<td><td>".$associative_emp[$val['pfno']][$month][1]."</td></tr>";
	                    	$km_count = $km_count + $associative_emp[$val['pfno']][$month][0];
	                    	$amoun_count = $amoun_count + $associative_emp[$val['pfno']][$month][1];
	                    	
	                    }
	                    echo "</table>";
						$pf_cnt++;	
						echo "</td>";	
						//$query1 = "SELECT tam.id, tam.created_at, e.level, e.pfno, e.name, e.desig, e.bp, ta.cont_date, tam.month, ta.reference_no, SUM(ta.amount) as sum from employees as e INNER JOIN add_cont as ta ON e.pfno = ta.empid INNER JOIN master_cont tam ON tam.reference_no = ta.reference_no  WHERE ta.reference_no IN(SELECT reference FROM tbl_summary_details where summary_id = '".$_REQUEST['id']."' and reject_pending='0' AND reference = (SELECT reference FROM tbl_summary where is_cont = '1' AND id = '".$_REQUEST['id']."')) GROUP BY ta.reference_no";
						//	$result1 = mysql_query($query1);
						//	$total = 0;
						//	$cont_data = '';
						//	$data = "";
						//	while($res = mysql_fetch_array($result1))
						//	{
								
						//		$cont_total = 0;
						echo "<td>$km_count</td><td>$amoun_count</td>";	
						$cot_count = $cot_count + $amoun_count;
						$total_km_count = $total_km_count + $km_count;
						if($_SESSION['role']=='6')
						{
						echo "<td><button class='btn btn-danger return_btn hide-print' value='".$val['reference_no']."' data-toggle='modal' emp='".$val['pfno']."' data-target='#return' >Return </button> </td>";
						}
						if($_SESSION['role']=='5')
						{
						echo "<td class='hide-print'><button class='btn btn-danger hide-print reject_btn' value='".$val['reference_no']."' data-toggle='modal' emp='".$val['pfno']."' data-target='#ReturntoEst' >Reject </button>";
						echo "<a style='margin-left:5px;' class='btn btn-primary hide-print' href='view_cont.php?id=".$val['set_no']."&ref=".$val['reference_no']."'>view </a> </td>";
						}
						if($_SESSION['role']=='2')
						{
						echo "<td class='hide-print'><a class='btn btn-primary hide-print' href='view_cont.php?id=".$val['set_no']."&ref=".$val['reference_no']."'>view </a> </td>";
						}
							    //echo "<td><a href='view_cont.php?id=".$val['set_no']."&ref=".$val['reference_no']."' class='btn btn-primary'>Show</a></td></tr>";
						//	}
					//echo "<td>$data</td></tr>";				
					}
					
					
				}
				$sr++;
			}
			echo '<tr>
				<td colspan="10" style="text-align:right; font-size:16px; font-weight:bold;">Total</td>
				<td style="font-size:16px; font-weight:bold;" class="text-center">'.$total_km_count.'</td>
				<td style="font-size:16px; font-weight:bold;" class="text-center">'.$cot_count.'</td>
				<td class="hidden-print"></td>
			</tr>';
			echo "</table>";
			?>
					</div>
					<?php 
					$query_approve = mysql_query("select * from bill_forward where reference_id='".$ref."' AND fowarded_to='".$_SESSION['empid']."' order by id desc limit 1");
					$result_approve = mysql_fetch_array($query_approve);
					$hold_status = $result_approve['hold_status'];
						$query_select = mysql_query("SELECT * FROM tbl_summary where id = '".$_REQUEST['id']."'");
						$result_set = mysql_fetch_array($query_select);
						if($result_set['forward_status']=='1' && $_SESSION['role']!='5' && $hold_status=='1' )
						{
					?>
					<div class="row">
						<div class="col-xs-offset-10 col-xs-2 pull-right">
							<?php echo "<button class='btn btn-danger' style='margin-left:10px;' data-toggle='modal' data-target='#forward'>Approve and Forward</button>"; ?>
						</div>
					</div>
					<?php 
						} else if($hold_status=='1' && $_SESSION['role']=='5') {
					?>
					<div class="row">
						<div class="col-xs-offset-10 col-xs-2 pull-right">
							<?php echo "<button class='btn btn-primary hide-print' style='margin-left:10px;' data-toggle='modal' data-target='#final_approve'>Vett</button>"; ?>
						</div>
					</div>
						<?php } else if($hold_status=='1') {
					?>
					<div class="row">
						<div class="col-xs-offset-10 col-xs-2 pull-right">
							<?php echo "<button class='btn btn-info' style='margin-left:10px;' data-toggle='modal' data-target='#final_approve'>Approve</button>"; ?>
						</div>
					</div>
						<?php } ?>
						<div class="row">
						<div class="col-xs-offset-10 col-xs-2 pull-right">
							<?php echo "<button class='btn btn-danger hide-print' style='margin-left:10px;' onclick='winprint();' >Print</button>"; ?>
						</div>
					</div>
					</div>
					<!-- /.box-body -->
				</div>

			<?php } ?>
			
    </section>
  </div>
  
  <!--Content code end here--->
  <div class='hide-print'>
 <?php
	require_once("../../global/footer.php");
 ?>
 </div>
 
  <!-- Modal -->
<div id="forward" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2>Forward Summary Report </h2>
      </div>
      <form action='control/adminProcess.php?action=conti_establishment_send' method="post">
      <div class="modal-body" style="padding:20px;">
        <div class="form-group">
          <input type="hidden" name="original_id" value="<?php echo $_REQUEST['id']; ?>">
        <div class="col-xs-offset-1 col-xs-2"><label for="">User</label></div>
        <div class="col-xs-7">
            <select name="forwardName" class="form-control select2 required" required="required" style="width: 100%">
              <option value="" readonly >Select User</option>
              <?php 
                $query = "SELECT * FROM employees where pfno IN ( select empid from users where status='1' AND id<>'1' and role='5')";
                $result = mysql_query($query);
                while($value = mysql_fetch_array($result))
                {
                  echo "<option value='".$value['pfno']."'>".$value['name']."  (".$value['desig'].")</option>";
                }
              ?>
            </select>
        </div>
      </div>
      </div>
      <div class="modal-footer" style="margin-top:40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Forward</button>
      </div>
    </form>
    </div>

  </div>
</div>

<div id="ReturntoEst" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2>Reject and Send for approval </h2>
      </div>
      <form action='control/adminProcess.php?action=contingency_establishment_reject' method="post">
      <div class="modal-body" style="padding:20px;">
	  <h2>Are you sure, you want to reject this claim?</h2>
        <div class="form-group">
          <input type="hidden" name="reject_ref" id="reject_ref">
      </div>
      </div>
      <div class="modal-footer" style="margin-top:40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Forward to Est. Admin</button>
      </div>
    </form>
    </div>

  </div>
</div>

<!-- Modal Final Approve -->
<div id="final_approve" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2>Approve Summary Report </h2>
      </div>
      <form action='control/adminProcess.php?action=contingency_finalapprove' method="post">
      <div class="modal-body" style="padding:20px;">
        <h3>Are you sure, Confirm Approve?
		<input type="hidden" name="original_id" value="<?php echo $_REQUEST['id']; ?>">
      </div>
      <div class="modal-footer" style="margin-top:40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Approve</button>
      </div>
    </form>
    </div>

  </div>
</div>

<!-- Modal Final Approve -->



<script>
	function winprint()
	{
		$(".hide-print").hide();
		window.print();
		$(".hide-print").show();
	}
	$(document).on("click",".return_btn",function(){
		var value = $(this).val();
		var emp = $(this).attr('emp');
		alert(emp +" " + value);
		$("#return_id").val(value);
		$("#return_emp").val(emp);
	});

	$(document).on("click",".reject_btn",function(){
		var value = $(this).val();
		$("#reject_ref").val(value);
	});
	
	
</script>