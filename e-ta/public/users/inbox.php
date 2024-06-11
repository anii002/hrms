<?php
  require_once("../../global/user_header.php");
  require_once("../../global/user_topbar.php");
  require_once("../../global/user_sidebar.php");
?>
  <div class="content-wrapper">
     <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
  			Claimed Contingency
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
						<h3 class="box-title">All contigency</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive">
						<table id="example1" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>Name</th>
								<th>Month</th>
								<th>Total Amount</th>
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
								$years=["","January","February","March","April","May","June","July","August","September","October","November","December"];
									$query = "select * from master_cont where reference_no in (select reference_no from bill_forward where fowarded_to='".$_SESSION['empid']."' and hold_status='1')";
								
								//echo $query;		
									$result = mysql_query($query);
									while($val = mysql_fetch_array($result))
									{
										echo "
										<tr>
											<td>".get_employee($val['empid'])."</td>
											<td>".$val['month']."</td>
											<td>".$val['total_amount']."</td>
											<td><a href='view_cont.php?id=".$val['id']."&ref=".$val['reference_no']."' class='btn btn-primary'>Show</a>
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
