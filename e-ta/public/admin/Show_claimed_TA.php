<?php
	require_once("../../global/admin_header.php");
	require_once("../../global/admin_topbar.php");
	require_once("../../global/admin_sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
	  <span style="font-size:20px;font-weight:bold;" class="col-sm-8">
      Claimed TA Inbox
      </span>
	  <span class="text-right col-sm-4">
	  <button class="btn btn-danger" onclick="history.go(-1);">Back</button>
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
						<h3 class="box-title">ALL Claimed TA</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive">
						<table id="example1" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>Reference</th>
								<th>EMPID</th>
								<th>Name</th>
								<th>Year</th>
								<th>Month</th>
								<th>Total Distance</th>
								<th>Total Rate </th>
								<th>Applied Month</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
								<?php

								function get_employee($id)
								{
									$query = mysql_query("select name from employees where pfno='$id'");
									$result = mysql_fetch_array($query);
									return $result['name'];
								}
								
									$query = "SELECT MONTHNAME( taentryform_master.created_at ) as created,taentryform_master.reference, taentryform_master.TAYear, taentryform_master.TAMonth,taentryform_master.empid, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate, taentryform_master.empid FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id where taentryform_master.forward_status='1' group by taentryform_master.reference ";
									$result = mysql_query($query);
									while($val = mysql_fetch_array($result))
									{
										if($val['reference'] != null)
										{
										echo "
										<tr>
											<td>".$val['reference']."</td>
											<td>".$val['empid']."</td>
											<td>".get_employee($val['empid'])."</td>
											<td>".$val['TAYear']."</td>
											<td>".$val['TAMonth']."</td>
											<td>".$val['distance']."</td>
											<td>".$val['rate']."</td>
											<td>".$val['created']."</td>
											<td><a href='show_seperate_claim1.php?id=".$val['reference']."' class='btn btn-primary'>Show</a>
										</tr>
										";
										}
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
