<?php
  require_once("../../global/user_header.php");
  require_once("../../global/user_topbar.php");
  require_once("../../global/user_sidebar.php");
?>
  <div class="content-wrapper">
     <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
      	<span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        फुटकर बिल सारांश रिपोर्ट / Contingency Summary Report
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
						<h3 class="box-title">Summary Report</h3>
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
									$query = "SELECT * from tbl_summary where id in (select summary_id from tbl_summary_details where reference in (select reference_id from bill_forward where fowarded_to='".$_SESSION['empid']."' AND hold_status='1' ORDER BY id DESC)) ";
									
									$result = mysql_query($query);
									while($val = mysql_fetch_array($result))
									{
									$query_count = mysql_query("select count(id) as cnt from tbl_summary_details where summary_id='".$val['id']."' AND reject_pending='0'");
									$set = mysql_fetch_array($query_count);
									if($set['cnt']>=1)
									{
										if($val['title']!=null)
										{
										echo "
										<tr>
											<td>$cnt</td>
											<td>".$val['title']."</td>
											<td>".$val['description']."</td>
											<td><a href='c_level_summary_report_details.php?id=".$val['id']."' class='btn btn-primary'>Show</a>";
										echo "</tr>
										";
										$cnt++;
										}
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
