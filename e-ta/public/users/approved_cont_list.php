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
        दावा किए गए फुटकर बिल / Claimed Contingency Inbox
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
						<h3 class="box-title">ALL Approved Contingency</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive" id="print_table">
						<table id="" class="table  table-hover" style="page-break-inside: inherit; border-collapse:collapse" width="100%" border="1">
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
								if($_SESSION['role']=='4')
								{
									$query = "SELECT master_cont.id, MONTHNAME( master_cont.created_at ) as created, master_cont.reference_no, master_cont.ContYear, master_cont.empid, master_cont.month, SUM(add_cont.kms) AS distance, SUM(add_cont.amount) as rate FROM master_cont INNER JOIN add_cont ON master_cont.reference_no = add_cont.reference_no WHERE master_cont.reference_no IN (select reference_id  from bill_forward where bill_forward.fowarded_to='".$_SESSION['empid']."' and admin_approve='0' and admin_returned_status='0' AND depart_time is not null) group by master_cont.reference_no";
								}
								else if($_SESSION['role']=='3')
								{
									$query = "SELECT master_cont.id, MONTHNAME( master_cont.created_at ) as created, master_cont.reference_no, master_cont.ContYear, master_cont.empid, master_cont.month, SUM(add_cont.kms) AS distance, SUM(add_cont.amount) as rate FROM master_cont INNER JOIN add_cont ON master_cont.reference_no = add_cont.reference_no WHERE master_cont.reference_no IN (select reference_id  from bill_forward where bill_forward.fowarded_to='".$_SESSION['empid']."' and admin_approve='1' and admin_returned_status='0') group by master_cont.reference_no";
								}
								else
								{
									$query = "SELECT master_cont.id, MONTHNAME( master_cont.created_at ) as created, master_cont.reference_no, master_cont.ContYear, master_cont.empid, master_cont.month, SUM(add_cont.kms) AS distance, SUM(add_cont.amount) as rate FROM master_cont INNER JOIN add_cont ON master_cont.reference_no = add_cont.reference_no WHERE master_cont.reference_no IN (select reference_id  from bill_forward where bill_forward.fowarded_to='".$_SESSION['empid']."') group by master_cont.reference_no";
								}
								//echo $query;
									$result = mysql_query($query);
									while($val = mysql_fetch_array($result))
									{
										if($val['reference_no']!=null)
										{
										echo "
										<tr>
											<td>".$val['reference_no']."</td>
											<td>".get_employee($val['empid'])."</td>
											<td>".$val['ContYear']."</td>
											<td>".$val['month']."</td>
											<td>".$val['distance']."</td>
											<td>".$val['rate']."</td>
											<td>".$val['created']."</td>
											<td><a href='view_cont.php?id=".$val['id']."&ref=".$val['reference_no']."' class='btn btn-primary'>Show</a>
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
