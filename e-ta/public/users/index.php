<?php
	require_once("../../global/user_header.php");
	require_once("../../global/user_topbar.php");
	require_once("../../global/user_sidebar.php");
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
<div class="content-wrapper">
		<section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <h1 style="font-family: 'Raleway', sans-serif;">
        डैशबोर्ड / Dashboard <small style="color:#423c3c;">Control panel</small>
      </h1>
    </section>
		<section class="content">
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
					<h3 class="box-title">New Claims</h3>
				</div>
				<div class="box-body">
					<div class="col-xs-12 table-responsive">
					<?php 
						if($_SESSION['role']=='2' || $_SESSION['role']=='5')
						{
					?>
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
								$cnt=1;
								if($_SESSION['role'] == '5'){
									$query = "SELECT * from tbl_summary where id in (select summary_id from tbl_summary_details where reference in (select reference_id from forward_data where fowarded_to='12212325' AND hold_status='1')) AND is_cont != '1'";
								}else{
									$query = "SELECT * from tbl_summary where id in (select summary_id from tbl_summary_details where reference in (select reference_id from forward_data where fowarded_to='".$_SESSION['empid']."' AND hold_status='1')) AND is_cont != '1'";
								}
									//echo $query;
									$result = mysql_query($query);
									while($val = mysql_fetch_array($result))
									{
										if($val['title']!=null)
										{
										echo "
										<tr>
											<td>$cnt</td>
											<td>".$val['title']."</td>
											<td>".$val['description']."</td>";
											if($val['othe_dept'] == '1'){
												$file_name = "level_summary_report_details1.php?id=".$val['id'];
											}else{
												$file_name = "level_summary_report_details.php?id=".$val['id'];
											}
											if($_SESSION['role']=='5')
											{
												echo "<td><a href='".$file_name."' class='btn btn-primary'>Show</a>";
											}else {
											echo "<td><a href='level_summary_report_details.php?id=".$val['id']."' class='btn btn-primary'>Show</a>";
											}
										echo "</tr>
										";
										$cnt++;
										}
									}
								 ?>


							</tbody>
						</table>
						<br/>
						<h4>Contingency List</h4>
						<table id="example2" class="table table-bordered table-hover">
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
								$cnt=1;
									$query = "SELECT * from tbl_summary where id in (select summary_id from tbl_summary_details where reference in (select reference_id from bill_forward where fowarded_to='".$_SESSION['empid']."' AND hold_status='1')) AND is_cont = '1' AND est_approved != '1'";
									//echo $query;
									$result = mysql_query($query);
									while($val = mysql_fetch_array($result))
									{
										if($val['title']!=null)
										{
										echo "
										<tr>
											<td>$cnt</td>
											<td>".$val['title']."</td>
											<td>".$val['description']."</td>";
											if($_SESSION['role']=='5')
											{
												echo "<td><a href='c_level_summary_report_details.php?id=".$val['id']."' class='btn btn-primary'>Show</a>";
											}else {
											echo "<td><a href='c_level_summary_report_details.php?id=".$val['id']."' class='btn btn-primary'>Show</a>";
											}
										echo "</tr>
										";
										$cnt++;
										}
									}
								 ?>


							</tbody>
						</table>
						<?php } else {?>
					<table id="example1" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>Reference</th>
								<th>Name</th>
								<th>Year/Month</th>
								<th>Amount</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								if($_SESSION['role']=='3')
								{
									$query = "SELECT taentryform_master.reference, taentryform_master.TAYear, taentryform_master.empid, taentryform_master.TAMonth, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryform_master.reference IN (select reference_id from forward_data where forward_data.fowarded_to='".$_SESSION['empid']."' AND forward_data.depart_time is null AND admin_approve='0') group by taentryform_master.reference";
								}
								else{
									$query = "SELECT taentryform_master.reference, taentryform_master.TAYear,taentryform_master.empid, taentryform_master.TAMonth, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryform_master.reference IN (select reference_id from forward_data where forward_data.fowarded_to='".$_SESSION['empid']."' AND forward_data.depart_time is null AND admin_approve='0') group by taentryform_master.reference";
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
											<td>".$val['TAYear']."/".$val['TAMonth']."</td>
											<td>".$val['rate']."</td>
											<td><a href='show_seperate_claim.php?id=".$val['reference']."' class='btn btn-primary'>Show</a>
										</tr>
										";
										}
									}
								 ?>


							</tbody>
						</table>
						<?php }
						function get_employee($id)
						{
							$query = mysql_query("select name from employees where pfno='$id'");
							$result = mysql_fetch_array($query);
							return $result['name'];
						}
						?>
				</div>
				</div>
				<!-- /.box-body -->
			</div>
		</section>
  </div>
  <!--Content code end here--->
 <?php
	require_once("../../global/user_footer.php");
 ?>
