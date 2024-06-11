<?php
  require_once("../../global/user_header.php");
  require_once("../../global/user_topbar.php");
  require_once("../../global/user_sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
      	<span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        दावा किए गए फुटकर बिल / Claimed Contingency
      	</span>
      	<span style="float: right">
	  		<button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
	  	</span>
	  </span>
	  <div class="clearfix"></div>
    </section>
    <section class="content">

<?php

if(isset($_SESSION['empid']))
{

	?>
				<div class="box box-info">
					<div class="box-header">
						<h3 class="box-title">All Contingency</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive">
						<table id="example1" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>Reference No</th>
								<th>Employee Name</th>
								<th>Month</th>
								<th>Total Amount</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								$years=["","January","February","March","April","May","June","July","August","September","October","November","December"];
									$query = "select * from master_cont where reference_no in (select reference_id from bill_forward where fowarded_to='".$_SESSION['empid']."' and hold_status='1' AND admin_approve != '1' GROUP BY reference_id)";
								
								//echo $query;		
									$result = mysql_query($query);
									echo mysql_error();
									while($val = mysql_fetch_array($result))
									{
										$sql = "select name from employees where pfno = '".$val['empid']."'";
										$res = mysql_query($sql);
										$results = mysql_fetch_array($res);
										echo "
										<tr>
											<td>".$val['reference_no']."</td>
											<td>".$results['name']."</td>
											<td>".$val['month']."</td>
											<td>".$val['total_amount']."</td>
											<td><a href='view_cont.php?id=".$val['id']."&ref=".$val['reference_no']."' class='btn btn-primary'>Show</a>
										</tr>
										";
									}
								 ?>


							</tbody>
						</table>
						
	
					</div>
					
					</div>
					<!-- /.box-body -->
				</div>

			<?php } ?>
    </section>
  </div>
  <!--Content code end here--->
 <?php
	require_once("../../global/footer.php");
 ?>
