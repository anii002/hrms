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
	#hide2
	{
		display : block;
	}
	#hide1{
		display : block;
	}
}

</style>
<div class="content-wrapper">
	<section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
  			Grant TA Details
        </span>
        <span style="float: right">
        <button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
      </span>
    </span>
    <div class="clearfix"></div>
    </section>
    <section class="content">
		<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Grant TA Report Details</h3>
			</div>
			<div class="box-body">
				<?php 
				error_reporting();
					if(isset($_REQUEST['from_date']) && isset($_REQUEST['to_date'])){
						 $from_date = date_create($_POST['from_date']);
						 $to_date = date_create($_REQUEST['to_date']);
				?>
				<div class="col-xs-12 table-responsive" id="print_table">
					<div class="row" id="hide1" style="margin-bottom:10px;">
						<label style="font-size:10px">Central Railway</label>
						<label class="" style="font-size:14px;margin-left:380px;"><b>SR DFM OFFICE</b></label>
						<label style="font-size:10px;margin-left:350px;" >Solapur Division</label>
						<?php
						//$query = mysql_query("SELECT * from tbl_summary where id = '".$_REQUEST['id']."'");
						//$query_result = mysql_fetch_array($query);
						?><br/><br/>
						<label style="font-size:14px; margin-left:250px;">Statement Showing the Grant TA Bills For the given Month-Year From <?php echo date_format($from_date, "F-Y"); ?> To <?php echo date_format($to_date, "F-Y"); ?> </label>
					</div>
					
								<?php
									$cnt=1;
									$cont_sum = 0;
									$total_sum_ta =0;
									$ref = "";
									//$query = "SELECT e.pfno, e.BU, e.name, e.level, e.desig, e.bp, SUM(ta.amount) as sum from employees as e INNER JOIN taentryforms as ta ON e.pfno = ta.empid INNER JOIN taentryform_master tam ON tam.reference = ta.reference_id WHERE ta.reference_id IN (SELECT reference FROM tbl_summary_details) AND EXTRACT(YEAR_MONTH FROM ta.taDate) BETWEEN '".date("Y", strtotime($_POST['from_date'])).date("m", strtotime($_POST['from_date']))."' AND '".date("Y", strtotime($_POST['to_date'])).date("m", strtotime($_POST['to_date']))."' GROUP BY MONTH(ta.taDate) ORDER BY sum DESC LIMIT 10"; //DATE_FORMAT(ta.created_at, '%Y-%m-%d')
									//$associative_emp = array();							
									$query = "SELECT taDate, SUM(ta.amount) AS amount from taentryforms ta WHERE ta.taDate BETWEEN '".$_POST['from_date']."-01' AND '".$_POST['to_date']."-31' AND reference_id IN (SELECT reference FROM tbl_summary_details) GROUP BY MONTH(taDate)";
									$result = mysql_query($query);
									//echo mysql_error();
									$total_sum =0;
									echo '<br/><table id="" class="table table-hover" style="page-break-inside: inherit; border-collapse:collapse" width="100%" border="1">
											<thead>
												<tr>
													<th rowspan="2" valign= "top">Sr No</th>
													<th rowspan="2" valign= "top">Month-Year</th>
													<th rowspan="2" valign= "top">TA Amount</th>
													<th rowspan="2" valign= "top">Contingency Amount</th>
													<th rowspan="2" valign= "top">Other Contingency Amount</th> 
													<th rowspan="2" valign= "top">Total Amount</th> 
												</tr>
											</thead>
											<tbody>';
									$total_ta = 0;
									$total_cont = 0;
									while($val = mysql_fetch_assoc($result))
									{
										$q = "SELECT ta.reference_id from taentryforms ta WHERE ta.taDate BETWEEN '".$_POST['from_date']."-01' AND '".$_POST['to_date']."-31' AND reference_id IN (SELECT reference FROM tbl_summary_details) GROUP BY MONTH(taDate), ta.reference_id";
										$r = mysql_query($q);

										$other_cont = "SELECT ac.cont_date, SUM(ac.amount) AS amount from add_cont ac WHERE ac.cont_Date BETWEEN '".$_POST['from_date']."-01' AND '".$_POST['to_date']."-31' AND ac.reference_no IN (SELECT reference FROM tbl_summary_details ts INNER JOIN tbl_summary s ON ts.summary_id = s.id WHERE s.is_cont = '0')";
										$other_q = mysql_query($other_cont);
										$other_r = mysql_fetch_array($other_q);

										while($v = mysql_fetch_assoc($r)){
											$cq = "SELECT SUM(c.total_amount) AS total_amount FROM `continjency` c INNER JOIN `continjency_master` cm ON c.cid = cm.id WHERE cm.reference = '".$v['reference_id']."'";	
											$cr = mysql_query($cq);
											$ce = mysql_fetch_array($cr);
											$total_cont = $total_cont + $ce['total_amount'];
										}
										

										$date = date_create($val['taDate']);
										echo "<tr>";
										echo "<td>$cnt</td>";
										echo "<td>".$date->format("F")."-".$date->format("Y")."</td>";
										echo "<td>".$val['amount']."</td>";
										echo "<td>".$total_cont."</td>";
										echo "<td>".$other_r['amount']."</td>";
										$total_ta = $total_ta + ($val['amount']+$total_cont+$other_r['amount']);
										echo "<td>".($val['amount']+$total_cont+$other_r['amount'])."</td>";
										
										$cnt++;
									}

								echo '<tr>
									<td colspan="5" style="text-align:right; font-size:16px; font-weight:bold;">Total&emsp;</td>
									<td class="">&emsp;'.$total_ta.'</td>
									</tr>';
								echo "</table>";
			?>

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
				<?php } ?>
				</div>

			
			
    </section>
  </div>
  
  <!--Content code end here--->
  <div class="hide-print">
 <?php
	require_once("../../global/footer.php");
 ?>
 </div>
 
 
  <!-- Modal -->

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
</script>