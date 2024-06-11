<?php
	require_once("../../global/admin_header.php");
	require_once("../../global/admin_topbar.php");
	require_once("../../global/admin_sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
       <span style="font-size:20px;font-weight:bold;" class="col-sm-8">
       Custom Claimed TA Inbox
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
					<form action="" method='post'>
					<div class="col-md-12">
                			<!--div class="col-xs-4">For which allowances Claimed for</div-->
                			<div class="col-xs-3">
                				<div class="form-group">
				                <label style='margin-right:20px;'>TO</label>
				                <input type='date' name='date1' value='<?php echo date('Y-m-d'); ?>'/>
				              </div>
                			</div>
							<div class="col-xs-3">
                				<div class="form-group">
				                <label style='margin-right:20px;'>From</label>
				                <input type='date' name='date2' value='<?php echo date('Y-m-d'); ?>' max='<?php echo date('Y-m-d'); ?>'/>
				              </div>
                			</div>
							<div class="col-xs-2">
                				<div class="form-group">
				                <input type='submit' value='Check' class='btn btn-default'/>
				              </div>
                			</div>
                		</div>
						<?php 
							if(isset($_REQUEST['date1']) || isset($_REQUEST['date2']))
							{
						?>
						<div class="col-xs-12 table-responsive">
						<?php 
							$date1 = date_create($_REQUEST['date1']);
							$date1 = date_format($date1,'d/m/Y');
							$date2 = date_create($_REQUEST['date2']);
							$date2 = date_format($date2,'d/m/Y');
						?>
						<h2>Result date between <?php echo $date1." & ".$date2; ?></h2>
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
								
									$query = "SELECT taentryform_master.reference, taentryform_master.TAYear, taentryform_master.TAMonth,taentryform_master.empid, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate, taentryform_master.empid FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id where taentryform_master.forward_status='1' AND taentryforms.created_at between '".$_REQUEST['date1']."' AND '".$_REQUEST['date2']."' group by taentryform_master.reference ";
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
											<td><a href='show_seperate_claim1.php?id=".$val['reference']."' class='btn btn-primary'>Show</a>
										</tr>
										";
										}
									}
								 ?>


							</tbody>
						</table>
					</div>
					<?php  
					
							}
							?>
					</div>
					<!-- /.box-body -->
				</div>

			<?php } ?>
			</form>
    </section>
  </div>
  <!--Content code end here--->
 <?php
	require_once("../../global/footer.php");
 ?>
