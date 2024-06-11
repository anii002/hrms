<?php
	require_once("../../global/header.php");
	require_once("../../global/topbar.php");
	require_once("../../global/sidebar.php");
?>
<style type="text/css">
.small-box p {
    font-size: 19px !important;
    font-weight: 500;
}
.small-box .small-box-footer {
    font-size: 15px !important; 
}
.box-header .box-title{
	font-family: 'Raleway', sans-serif;
	color: #2c2e43;
}
</style>
<!--Content page--->
  <div class="content-wrapper">
	<section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <h1 style="font-family: 'Raleway', sans-serif;">
        Dashboard <small style="color:#423c3c;">Control panel</small>
      </h1>
    </section>
		<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background: #488082db">
            <div class="inner">
			<?php 
				$query = mysql_query("select count(*) as total from taentryform_master where empid='".$_SESSION['empid']."' and forward_status='1'");
				$resultset = mysql_fetch_array($query);
				echo "<h3>".$resultset['total']."</h3>";
			?>
              <p class="">कुल दावे / Total Claims</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">अधिक जानकारी / More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color: #909e1abd">
            <div class="inner">
              <?php 
				$query = mysql_query("SELECT COUNT(id) as total from tbl_summary_details where summary_id IN (SELECT id FROM tbl_summary where est_approved='1') AND empid='".$_SESSION['empid']."'");
				$resultset = mysql_fetch_array($query);
				echo "<h3>".$resultset['total']."</h3>";
			?>

              <p>अनुमोदित / Approved</p>
            </div>
            <div class="icon">
              <i class="ion ion-checkmark-circled"></i>
            </div>
            <a href="#" class="small-box-footer">अधिक जानकारी / More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color: #429fa4db">
            <div class="inner">
               <?php 
				$query = mysql_query("SELECT * from forward_data where empid='".$_SESSION['empid']."' AND hold_status='1' GROUP BY reference_id");
				$cnt = mysql_num_rows($query);
				echo "<h3>".$cnt."</h3>";
			?>

              <p>प्रलंबित / Pending</p>
            </div>
            <div class="icon">
              <i class="ion ion-information-circled"></i>
            </div>
            <a href="#" class="small-box-footer">अधिक जानकारी / More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title">पिछले माह में दावा किए गए यात्रा भत्ता सूची / Last month claimed TA list</h3>
				</div>
				<div class="box-body">
					<div class="col-xs-12 table-responsive">
					<table id="example1" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>संदर्भ / Reference</th>
								<th>वर्ष / Year</th>
								<th>माह / Month</th>
								<th>कुल दूरी /  Total Distance</th>
								<th>कुल दर / Total Rate </th>
								<th>कार्रवाई  / Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								$month = date('m') - 1;
									$query = "SELECT taentryform_master.reference, taentryform_master.TAYear, taentryform_master.TAMonth, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryforms.reference_id in (select taentryform_master.reference from taentryform_master where taentryform_master.empid='".$_SESSION['empid']."') AND TAYear='".date('Y')."' AND TAMonth like '%".$month."%' GROUP BY taentryforms.reference_id";
								 
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
											<td><a href='show_seperate_claim.php?id=".$val['reference']."' class='btn btn-primary'>Show</a>
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
		</section>
  </div>
  <!--Content code end here--->
 <?php
	require_once("../../global/footer.php");
 ?>
