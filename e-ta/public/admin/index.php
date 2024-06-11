<?php
	require_once("../../global/admin_header.php");
	require_once("../../global/admin_topbar.php");
	require_once("../../global/admin_sidebar.php");
?>
  <div class="content-wrapper">
		<section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
      <h1>
        डैशबोर्ड / Dashboard
      </h1>
    </section>
		<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
             <?php 
				$query = mysql_query("select count(*) as total from employees");
				$resultset = mysql_fetch_array($query);
				echo "<h3>".$resultset['total']."</h3>";
			?>

              <p>कर्मचारी / Employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">अधिक जानकारी / More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php 
        $query = mysql_query("select count(*) as total from taentryform_master where forward_status='1' ");
        $resultset = mysql_fetch_array($query);
        echo "<h3>".$resultset['total']."</h3>";
        ?>

              <p>कुल दावे  / Total Claims</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">अधिक जानकारी / More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php 
        $query = mysql_query("SELECT COUNT(id) as total from tbl_summary_details where summary_id IN (SELECT id FROM tbl_summary where est_approved='1') and reject_pending='0' ");
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
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php 
        $query = mysql_query("SELECT * from forward_data where hold_status='1' GROUP BY reference_id");
        $cnt = mysql_num_rows($query);
        echo "<h3>".$cnt."</h3>";
      ?>

              <p>प्रलंबित  / Pending</p>
            </div>
            <div class="icon">
              <i class="ion ion-information-circled"></i>
            </div>
            <a href="#" class="small-box-footer">अधिक जानकारी / More info  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title">ऑडिट ट्रैक  / Audit track</h3>
				</div>
				<div class="box-body">
					<div class="col-xs-12 table-responsive">
					<table id="example1" class="table table-bordered table-hover">
						<thead>
						<tr>
							<th>प्रयोगकर्ता  /  User</th>
							<th>कार्य  / Task</th>
							<th>कार्रवाई  / Action</th>
							<th>तिथि समय / DateTime</th>
						</tr>
						</thead>
						<tbody>
						<?php
							$query_audit = "select * from audit_table limit 50";
							$result_audit = mysql_query($query_audit);
							while($value_audit = mysql_fetch_array($result_audit))
							{
								echo "
									<tr>
										<td>".$value_audit['empid']."</td>
										<td>".$value_audit['action']."</td>
										<td>".$value_audit['message']."</td>
										<td>".$value_audit['created_at']."</td>
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
	require_once("../../global/admin_footer.php");
 ?>
