<?php
  require_once("../../global/ctrl_officer_header.php");
  require_once("../../global/ctrl_officer_topbar.php");
  require_once("../../global/ctrl_officer_sidebar.php");
?>
<style>
table{
	
	 table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
}
@media print
{
table {page-break-after:always}
 tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
}
}
</style>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
      	<span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        दावा किए गए यात्रा भत्ता / Claimed TA Inbox
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
				<form action="control/adminProcess.php?action=generatesummary" method="post">
					<div class="box-header">
						<h3 class="box-title">ALL Claimed TA</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive" id="print_table">
						<table id="example1" class="table  table-hover" style="page-break-inside: inherit; border-collapse:collapse" width="100%" border="1">
							<thead>
							<tr>
								<th>Reference</th>
								<th>Name</th>
								<th>Year</th>
								<th>Month</th>
								<th>Total Distance</th>
								<th>Total Rate </th>
								<th>Applied month</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								$cnt=0;
								function get_employee($id)
								{
									$query = mysql_query("select name from employees where pfno='$id'");
									$result = mysql_fetch_array($query);
									return $result['name'];
								}
								if($_SESSION['role']=='13')
								{
									$query = "SELECT MONTHNAME( taentryform_master.created_at ) as created, taentryform_master.reference, taentryform_master.TAYear, taentryform_master.empid, taentryform_master.TAMonth, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryform_master.reference IN (select reference_id  from forward_data where forward_data.fowarded_to='".$_SESSION['empid']."'and admin_approve='1') group by taentryform_master.reference";
								}
								
								//echo $query;
									$result = mysql_query($query);
									while($val = mysql_fetch_array($result))
									{
										if($val['reference']!=null)
										{
										echo "
										<tr>
											<td>".$val['reference']."</td>
											<td>".get_employee($val['empid'])."</td>
											<td>".$val['TAYear']."</td>
											<td>".$val['TAMonth']."</td>
											<td>".$val['distance']."</td>
											<td>".$val['rate']."</td>
											<td>".$val['created']."</td>
											<td><a href='show_seperate_claim.php?id=".$val['reference']."' class='btn btn-primary'>Show</a>
										</tr>
										";
										$cnt++;
										}
									}
								 ?>


							</tbody>
						</table>
					</div>
					</form>
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
