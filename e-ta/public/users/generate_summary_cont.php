<?php
  require_once("../../global/user_header.php");
  require_once("../../global/user_topbar.php");
  require_once("../../global/user_sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
  			Generate Contingency Summary
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
				<form action="cont_summary_details.php" method="post">
					<div class="box-header">
						<h3 class="box-title">ALL Claimed Contingency</h3>
						<input type="submit" class="btn btn-warning pull-right" id='gn' name="subtn" value="Generate Summary">
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive">
						<table id="" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th></th>
								<th>Reference</th>
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
								$cnt=0;
									//$query = "SELECT MONTHNAME( taentryform_master.created_at ) as created, taentryform_master.reference, taentryform_master.TAYear,taentryform_master.empid, taentryform_master.TAMonth, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryform_master.reference IN (select reference_id  from forward_data where forward_data.fowarded_to='".$_SESSION['empid']."' AND forward_data.depart_time is null AND admin_approve='1' AND summary='0') group by taentryform_master.reference";

									$query = "SELECT master_cont.id, MONTHNAME( master_cont.created_at ) as created, master_cont.reference_no, master_cont.ContYear, master_cont.empid, master_cont.month, SUM(add_cont.kms) AS distance, SUM(add_cont.amount) as rate FROM master_cont INNER JOIN add_cont ON master_cont.reference_no = add_cont.reference_no WHERE master_cont.reference_no IN (select reference_id  from bill_forward where bill_forward.fowarded_to='".$_SESSION['empid']."' and bill_forward.depart_time is null AND admin_approve='1' and summary='0') group by master_cont.reference_no";
									//echo $query;
									
									$result = mysql_query($query);
									$count_row = mysql_num_rows($result);
									if($count_row>0){}else{
										echo "<script>document.getElementById('gn').style.display='none';</script>";
									}
									//echo $count_row;
									while($val = mysql_fetch_array($result))
									{
										if($val['reference_no']!=null)
										{
											//echo "no records";
										echo "
										<tr>
											<td><input type='checkbox' name='selected_list[$cnt]' value='".$val['reference_no']."'></td>
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
