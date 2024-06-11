<?php
  require_once("../../global/user_header.php");
  require_once("../../global/user_topbar.php");
  require_once("../../global/user_sidebar.php");
?>
<style>
table{
	
	 table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
}
#hide2{
	display:none;
}
#hide1{
	display:none;
}

@media print
{
#hide2{
		display : block;
	
	}#hide1{
		display : block;
	
	}
}

</style>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
      <span style="font-size:20px;font-weight:bold;" class="col-sm-8">
      Summary Report Details
      </span>
	  <span class="text-right col-sm-4">
	  <button class="btn btn-danger" onclick="history.go(-1);">Back</button>
	  </span>
	  <div class="clearfix"></div>
    </section>
    <section class="content">

<?php

if(isset($_SESSION['empid']) && isset($_REQUEST['id']))
{
$get_month = explode("-",$_REQUEST['id']);
	?>
				<div class="box box-info">
					<div class="box-header">
						<h3 class="box-title">Summary Report Details</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive" id="print_table">
							<!--23-3-2018 Code Start-->
							<div class="row" id="hide1" style="margin-bottom:10px;">
								<label style="font-size:10px">Central Railway</label>
								<label class="" style="font-size:14px;margin-left:380px;"><b>SR DFM OFFICE</b></label>
								<label style="font-size:10px;margin-left:350px;" >Solapur Division</label>
						<?php
						$query = mysql_query("SELECT * from tbl_summary where id = '".$_REQUEST['id']."'");
						$query_result = mysql_fetch_array($query);
						?>
							<label style="font-size:14px; margin-left:250px;">Statement Showing the summery of TA & Contingency Bills For the Month of <?= $query_result['title']; ?>  </label>
								</div>
							
							
						<!--23-3-2018 Code end-->
						<table id="" class="table  table-hover" style="
						page-break-inside: inherit; border-collapse:collapse" width="100%" border="1">
						<thead>
							<tr>
								<th rowspan="2" valign= "top">sr.no</th>
								<th rowspan="2" valign= "top">P.F. no</th>
								<th rowspan="2" valign= "top">Name</th>
								<th rowspan="2" valign= "top">Design</th>
								<th rowspan="2" valign= "top">Basic Pay</th> 
								<th rowspan="2" valign= "top">Travel Month</th>
								<th rowspan="2" valign= "top"><center>Claimed Month</center></th>
								<th colspan="2"><center>100%(Days Count)</center></th> 
								<th colspan="2"><center>70%(Days count)</center></th>
								<th colspan="2"><center>30%(Days count)</center></th>
								<th colspan="2"><center>Total Amount(Total Days Count)</center></th>
								<th>Contigency</th>
								<th class="hidden-print" rowspan="2">Action</th>
								
							</tr>
							<tr>
								<th>Day</th>
								<th>Amount</th>
								<th>Day</th>
								<th>Amount</th>
								<th>Day</th>
								<th>Amount</th>
								<th>Day Count</th>
								<th>Total Amount</th>
							</tr>	
		                    
							</thead>
							<tbody>
								<?php
								$cnt=1;
								$sum = 0;
								$ref = "";
									//$query = "SELECT e.pfno, e.name, e.desig, e.bp, ta.reference_id, SUM(ta.amount) as sum from employees as e INNER JOIN taentryforms as ta ON e.pfno = ta.empid WHERE ta.reference_id IN(SELECT reference FROM tbl_summary_details where summary_id = '".$_REQUEST['id']."' and reject_pending='0') GROUP BY ta.empid";
									//echo $query;
									$query = "SELECT e.pfno, e.name, e.desig, e.bp, ta.taDate, tam.TAMonth, ta.reference_id, SUM(ta.amount) as sum from employees as e INNER JOIN taentryforms as ta ON e.pfno = ta.empid INNER JOIN taentryform_master tam ON tam.reference = ta.reference_id  WHERE ta.reference_id IN(SELECT reference FROM tbl_summary_details where summary_id = '".$_REQUEST['id']."' and reject_pending='0') GROUP BY ta.empid";

									$result = mysql_query($query);
									$total_sum =0;
									while($val = mysql_fetch_array($result))
									{
										$ref = $val['reference_id'];
									$innnerset = mysql_query("select * from forward_data where reference_id='".$val['reference_id']."' order by id desc");
							 $innerresult = mysql_fetch_array($innnerset);
							 if($innerresult['hold_status']=="0")
							 {
$query_sum = "SELECT percent, SUM(amount) AS sum, amount, COUNT(reference_id) AS cnt FROM taentryforms where amount<>'' and reference_id='".$val['reference_id']."' AND percent != '0' GROUP BY percent ORDER BY percent ASC";
											$array = '';
											$array_100 = '';
											$array_30 = '';
											$array_70 = '';
											$day_count = 0;
											$result_sum = mysql_query($query_sum);
											//$result_show = mysql_fetch_array($result_sum);
											while($result_show = mysql_fetch_array($result_sum))
											{
												if($result_show['percent'] == "100%"){
													$array_100 .= $result_show['percent'].",";
													$array_100 .= $result_show['cnt'].",";
													$day_count = $result_show['cnt'];
													$array_100 .= $result_show['amount'];
													//$array_sum = $result_show['sum'];
												}
												if($result_show['percent'] == "70%"){
													$array_70 .= $result_show['percent'].",";
													$array_70 .= $result_show['cnt'].",";
													$day_count = $result_show['cnt'] + $day_count;
													$array_70 .= $result_show['amount'];
													//$array_sum = $result_show['sum'];
												}
												if($result_show['percent'] == "30%"){
													$array_30 .= $result_show['percent'].",";
													$array_30 .= $result_show['cnt'].",";
													$day_count = $result_show['cnt'] + $day_count;
													$array_30 .= $result_show['amount'];
													//$array_sum = $result_show['sum'];
												}
											}
											$array = $array_100.",".$array_70.",".$array_30;
											$count_array = explode(',', $array);
											
											echo "
											<tr>
												<td>$cnt</td>
												<td>".$val['pfno']."</td>
												<td>".$val['name']."</td>
												<td>".$val['desig']."</td>
												<td>".$val['bp']."</td>
												<td>".$val['taDate']."</td>
												<td>".$val['TAMonth']."</td>";
												if(isset($count_array[0]) && !empty($count_array[0])){
													if($count_array[0] == "100%")
													{	
														echo "<td>".$count_array[1]."</td>";
														echo "<td>".$count_array[2]."</td>";
													}else{
														echo "<td></td>";
														echo "<td></td>";
													}
												}else{
													echo "<td></td>";
													echo "<td></td>";
													if(isset($count_array[1]) && !empty($count_array[1])){
														if($count_array[1] == "70%")
														{	
															echo "<td>".$count_array[2]."</td>";
															echo "<td>".$count_array[3]."</td>";
															if(isset($count_array[4]) && !empty($count_array[4])){
																if($count_array[4] == "30%")
																{	
																	echo "<td>".$count_array[5]."</td>";
																	echo "<td>".$count_array[6]."</td>";
																}
															}
														}
													}else{
														echo "<td></td>";
														echo "<td></td>";
													}
												}
												if(isset($count_array[3]) &&  !empty($count_array[0])){
													if($count_array[3] == "70%")
													{	
														echo "<td>".$count_array[4]."</td>";
														echo "<td>".$count_array[5]."</td>";
														
													}else{
														echo "<td></td>";
														echo "<td></td>";
													}
												}else{
													//echo "<td></td>";
													//echo "<td></td>";
													if(isset($count_array[2]) && !empty($count_array[2]))
													{
														if($count_array[2] == "30%")
														{	
															echo "<td>".$count_array[3]."</td>";
															echo "<td>".$count_array[4]."</td>";
														}
													}
												}
												if(isset($count_array[6]) && !empty($count_array[3])){
													if($count_array[6] == "30%")
													{	
														echo "<td>".$count_array[7]."</td>";
														echo "<td>".$count_array[8]."</td>";
													}else{
														//echo "<td></td>";
														//echo "<td></td>";
													}
												}else{
													echo "<td></td>";
													echo "<td></td>";
												}
													
											if(!empty($count_array[0]) && !empty($count_array[3]) && empty($count_array[6]))
											{
												echo "<td></td><td></td>
												<td>$day_count</td>
						   							<td>".$val['sum']."</td>";
					   						}else{
					   							echo "<td>$day_count</td><td>".$val['sum']."</td>";
					   						}
                      $query1 = "SELECT e.pfno, e.name, e.desig, e.bp, ta.reference_id, SUM(ta.amount) as sum from employees as e INNER JOIN taentryforms as ta ON e.pfno = ta.empid WHERE ta.reference_id IN(SELECT reference FROM tbl_summary_details where summary_id = '".$_REQUEST['id']."' and reject_pending='0' and empid='".$val['pfno']."') GROUP BY ta.reference_id";
                      $result1 = mysql_query($query1);
                      $total = 0;
                      $data = "";
                      while($res = mysql_fetch_array($result1))
                      {
											   $data .= "<a href='show_seperate_claim.php?id=".$res['reference_id']."' class='btn btn-primary'>Show</a>"; 
                         $innner = mysql_query("select * from `continjency_master` where reference='".$res['reference_id']."'");
                         while($resultset = mysql_fetch_array($innner))
                         {
                            $inner_query = mysql_query("SELECT SUM(total_amount) as total FROM `continjency` where cid='".$resultset['id']."' and set_number='".$resultset['set_number']."'");
                            $resultinner = mysql_fetch_array($inner_query);
                            $total = $total + (int) $resultinner['total'];
                         }
                       }
                       $total_sum = $total_sum + $total;
											echo "<td>$total</td>";
                      echo "<td class='hidden-print'>";
										echo "$data</td></tr>
										";
										$sum = $sum + (int)$val['sum'];
										$cnt++;
									}
								}
								 ?>
								<tr>
									<td colspan="14" style="text-align:right; font-size:16px; font-weight:bold;">Total</td>
									<td style="font-size:16px; font-weight:bold;"><?php echo $sum; ?></td>
									<td style="font-size:16px; font-weight:bold;"><?php echo $total_sum; ?></td>
									<td class="hidden-print"></td>
								</tr>

							</tbody>
						</table>
						<!--23-3-2018 Code Start-->
						<div class="row" style="margin-top:60px;" id="hide2">
								<label style="font-size:10px"></label>
								<label class="" style="font-size:14px;margin-left:580px;"><b></b></label>
								<label style="font-size:13px;margin-left:300px;">SR DFM / SUR</label>
						
							
								</div>
						<!--23-3-2018 Code End-->
					</div>
					
						<div class="row">
						<div class="col-xs-offset-10 col-xs-2 pull-right">
							<?php echo "<button class='btn btn-danger hide-print' style='margin-left:10px;' id='btnclick' onclick='PrintPreview()'>Print</button>"; ?>
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
      <form action='control/adminProcess.php?action=establishment_send' method="post">
      <div class="modal-body" style="padding:20px;">
        <div class="form-group">
          <input type="hidden" name="original_id" value="<?php echo $_REQUEST['id']; ?>">
        <div class="col-xs-offset-1 col-xs-2"><label for="">User</label></div>
        <div class="col-xs-7">
            <select name="forwardName" class="form-control select2" style="width: 100%">
              <option value="none" hidden="hidden" readonly selected="selected">Select User</option>
              <?php 
                $query = "SELECT * FROM employees where pfno IN ( select empid from users where status='1')";
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

<!-- Modal Final Approve -->
<div id="final_approve" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2>Approve Summary Report </h2>
      </div>
      <form action='control/adminProcess.php?action=finalapprove' method="post">
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
<div id="return" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2>Return Claimed TA to Employee </h2>
      </div>
      <form action='control/adminProcess.php?action=finalreturn' method="post">
      <div class="modal-body" style="padding:20px;">
        <h3>Are you sure, Confirm Return?
		<textarea name="remark" id="remark" class="form-control" placeholder="Enter your remark here..."></textarea>
		<input type="hidden" name="return_id" id="return_id">
		<input type="hidden" name="return_emp" id="return_emp">
		<input type="hidden" name="return_admin" id="return_admin" value="<?php echo $_SESSION['empid']; ?>">
      </div>
      <div class="modal-footer" style="margin-top:40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Approve</button>
      </div>
    </form>
    </div>

  </div>
</div>

<script type="text/javascript">
/*--This JavaScript method for Print command--*/
   
/*--This JavaScript method for Print Preview command--*/
    function PrintPreview() {
        var toPrint = document.getElementById('print_table');
        
        var popupWin = window.open('', '_blank', 'width=1500,height=700,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write("<html><title>::Print Preview::</title><link rel='stylesheet'  media='screen'/><style>.hidden-print {display : none;border:1px solid black}@media print{table }</style></head>  <body onload='window.print()';> ");
       
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
		
        popupWin.document.close();
    }
</script>

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
		$("#return_id").val(value);
		$("#return_emp").val(emp);
	});
</script>