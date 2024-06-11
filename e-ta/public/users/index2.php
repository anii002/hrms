<?php
	require_once("../../global/user_header.php");
	require_once("../../global/user_topbar.php");
	require_once("../../global/user_sidebar.php");
?>
<!--Content page--->
  <div class="content-wrapper">
		<section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
      <h1>
        Dashboard <small style="color:gray;">Control panel</small>
      </h1>
    </section>
		<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>14569</h3>

              <p>Employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>1236</h3>

              <p>Total Claims</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>860</h3>

              <p>Approved</p>
            </div>
            <div class="icon">
              <i class="ion ion-checkmark-circled"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Pending</p>
            </div>
            <div class="icon">
              <i class="ion ion-information-circled"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title">New Summary Reports</h3>
				</div>
				<div class="box-body">
					<div class="col-xs-12 table-responsive">
					<table id="example1" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								$cnt=1;
									$query = "SELECT * from tbl_summary";
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
											<td>".$val['description']."</td>
											<td><a href='summary_report_details.php?id=".$val['id']."' class='btn btn-primary'>Show</a>";
										echo "</tr>
										";
										$cnt++;
										}
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
	require_once("../../global/user_footer.php");
 ?>
