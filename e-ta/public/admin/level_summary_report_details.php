<?php
  require_once("../../global/admin_header.php");
  require_once("../../global/admin_topbar.php");
  require_once("../../global/admin_sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
      <h1>
        Summary Reports
      </h1>
    </section>
    <section class="content">

<?php

if(isset($_SESSION['empid']) && isset($_REQUEST['id']))
{
$get_month = explode("-",$_REQUEST['id']);
	?>
				<div class="box box-info">
					<div class="box-header">
						<h3 class="box-title">Summary Report Details</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive">
						<table id="" class="table table-bordered table-hover">
							<thead>
							<tr>
								<th>sr.no</th>
								<th>P.F. no</th>
								<th>Name</th>
								<th>Design</th>
								<th>Basic</th>
								<th>TA amount</th>
							</tr>
							</thead>
							<tbody>
								<?php
								$cnt=1;
								$sum = 0;
								$ref = "";
									$query = "SELECT e.pfno, e.name, e.desig, e.bp, ta.reference_id, SUM(ta.amount) as sum from employees as e INNER JOIN taentryforms as ta ON e.pfno = ta.empid WHERE ta.reference_id IN(SELECT reference FROM tbl_summary_details where summary_id = '".$_REQUEST['id']."') GROUP BY ta.empid";
									//echo $query;
									$result = mysql_query($query);
									while($val = mysql_fetch_array($result))
									{
										$ref = $val['reference_id'];
										echo "
										<tr>
											<td>$cnt</td>
											<td>".$val['pfno']."</td>
											<td>".$val['name']."</td>
											<td>".$val['desig']."</td>
											<td>".$val['bp']."</td>
											<td>".$val['sum']."</td>
										</tr>
										";
										$sum = $sum + (int)$val['sum'];
										$cnt++;
									}
								 ?>
								<tr>
									<td colspan="5" style="text-align:right; font-size:16px; font-weight:bold;">Total</td>
									<td style="font-size:16px; font-weight:bold;"><?php echo $sum; ?></td>
								</tr>

							</tbody>
						</table>
					</div>
					<?php 
					
					$query_approve = mysql_query("select * from forward_data where reference_id='".$ref."' AND fowarded_to='".$_SESSION['empid']."'");
					$result_approve = mysql_fetch_array($query_approve);
					$hold_status = $result_approve['hold_status'];
						$query_select = mysql_query("SELECT * FROM tbl_summary where id = '".$_REQUEST['id']."'");
						$result_set = mysql_fetch_array($query_select);
						if($result_set['forward_status']=='1' && $_SESSION['role']!='5' && $hold_status=='1' )
						{
					?>
					<div class="row">
						<div class="col-xs-offset-10 col-xs-2 pull-right">
							<?php echo "<button class='btn btn-danger' style='margin-left:10px;' data-toggle='modal' data-target='#forward'>Approve and Forward</button>"; ?>
						</div>
					</div>
					<?php 
						} else if($hold_status=='1') {
					?>
					<div class="row">
						<div class="col-xs-offset-10 col-xs-2 pull-right">
							<?php echo "<button class='btn btn-danger' style='margin-left:10px;' data-toggle='modal' data-target='#final_approve'>Approve</button>"; ?>
						</div>
					</div>
						<?php } ?>
						<div class="row">
						<div class="col-xs-offset-10 col-xs-2 pull-right">
							<?php echo "<button class='btn btn-danger hide-print' style='margin-left:10px;' onclick='winprint();' >Print</button>"; ?>
						</div>
					</div>
					</div>
					<!-- /.box-body -->
				</div>

			<?php } ?>
			
    </section>
  </div>
  
  <!--Content code end here--->
  <div class='hide-print'>
 <?php
	require_once("../../global/footer.php");
 ?>
 </div>
 
  <!-- Modal -->
<div id="forward" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2>Forward Summary Report to ADFM </h2>
      </div>
      <form action='control/adminProcess.php?action=establishment_send' method="post">
      <div class="modal-body" style="padding:20px;">
        <div class="form-group">
          <input type="hidden" name="original_id" value="<?php echo $_REQUEST['id']; ?>">
        <div class="col-xs-offset-1 col-xs-2"><label for="">User</label></div>
        <div class="col-xs-7">
            <select name="forwardName" class="form-control select2" style="width: 100%">
              <option value="none" hidden="hidden" readonly selected="selected">Select User</option>
              <?php 
                $query = "SELECT * FROM employees where pfno IN ( select empid from users where status='1' AND role='5')";
                $result = mysql_query($query);
                while($value = mysql_fetch_array($result))
                {
                  echo "<option value='".$value['pfno']."'>".$value['name']."  (".$value['desig'].")</option>";
                }
              ?>
            </select>
        </div>
      </div>
      </div>
      <div class="modal-footer" style="margin-top:40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Forward</button>
      </div>
    </form>
    </div>

  </div>
</div>

<!-- Modal Final Approve -->
<div id="final_approve" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2>Approve Summary Report </h2>
      </div>
      <form action='control/adminProcess.php?action=finalapprove' method="post">
      <div class="modal-body" style="padding:20px;">
        <h3>Are you sure, Confirm Approve?
		<input type="hidden" name="original_id" value="<?php echo $_REQUEST['id']; ?>">
      </div>
      <div class="modal-footer" style="margin-top:40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Approve</button>
      </div>
    </form>
    </div>

  </div>
</div>

<script>
	function winprint()
	{
		$(".hide-print").hide();
		window.print();
		$(".hide-print").show();
	}
</script>