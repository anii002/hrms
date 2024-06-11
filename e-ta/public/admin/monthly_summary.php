<?php
	require_once("../../global/admin_header.php");
	require_once("../../global/admin_topbar.php");
	require_once("../../global/admin_sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
      <span style="font-size:20px;font-weight:bold;" class="col-sm-8">
       Monthly Claimed TA Summary Inbox
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
                			<div class="col-xs-4">
                				<div class="form-group">
				                <label>For which allowances Claimed for</label>
				                <input type='month' name='month' onchange='this.form.submit()'/>
				              </div>
                			</div>
                		</div>
						<?php 
							if(isset($_REQUEST['month']))
							{
								$mon = $_REQUEST['month'];
								$mon_split = explode('-',$mon);
						?>
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
									$query = "SELECT * from tbl_summary where id in (select summary_id from tbl_summary_details where reference in (select reference_id from forward_data where hold_status='0' ORDER BY id DESC)) AND MONTH(generated_date)='".$mon_split[1]."' AND YEAR(generated_date)='".$mon_split[0]."' AND est_approved='1'";
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
											<td><a href='level_summary_report_details.php?id=".$val['id']."' class='btn btn-primary'>Show</a>";
										echo "</tr>
										";
										$cnt++;
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
