<?php
		require_once("../../global/ctrl_incharge_header.php");
	require_once("../../global/ctrl_incharge_topbar.php");
	require_once("../../global/ctrl_incharge_sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
      	<span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        दावा किए गए यात्रा भत्ता / Claimed TA
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
						<h3 class="box-title">यात्रा भत्ता के सभी दावे / ALL Claimed TA</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive">
						<table id="example1" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>संदर्भ / Reference</th>
								<th>वर्ष  / Year</th>
								<th>माह  / Month</th>
								<th>कुल दूरी / Total Distance</th>
								<th>कुल दर / Total Rate </th>
								<th>कार्रवाई / Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								if(isset($_REQUEST['ref']))
								{
									$query = "SELECT taentryform_master.reference, taentryform_master.TAYear, taentryform_master.TAMonth, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryform_master.reference='".$_REQUEST['ref']."' and taentryform_master.forward_status='1'";
								}
								else
								{
									ECHO $query = "SELECT taentryform_master.reference, taentryform_master.TAYear, taentryform_master.TAMonth, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryforms.reference_id in (select taentryform_master.reference from taentryform_master where taentryform_master.empid='".$_SESSION['empid']."') and taentryform_master.forward_status='1' GROUP BY taentryforms.reference_id";
								}
								//echo $query;		
									$result = mysql_query($query);
									while($val = mysql_fetch_array($result))
									{
										echo "
										<tr>
											<td>".$val['reference']."</td>
											<td>".$val['TAYear']."</td>
											<td>".$val['TAMonth']."</td>
											<td>".$val['distance']."</td>
											<td>".$val['rate']."</td>
											<td><a href='show_seperate_claim1.php?id=".$val['reference']."' class='btn btn-primary'>दर्शाया जाए /Show</a>
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
