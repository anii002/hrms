<?php
  require_once("../../global/user_header.php");
  require_once("../../global/user_topbar.php");
  require_once("../../global/user_sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
  			Rejected Claimed TA Inbox
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
						<h3 class="box-title">Rejected Claimed TA</h3>
					</div>
					<div class="box-body">
						<div class="col-xs-12 table-responsive">
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
									$query = "SELECT taentryform_master.reference, taentryform_master.TAYear,taentryform_master.empid, taentryform_master.TAMonth, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryform_master.reference IN (select ref from tbl_rejected where status='0') group by taentryform_master.reference";
									
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
											<button class='btn btn-danger reject_btn hide-print' value='".$val['reference']."' data-toggle='modal' emp='".$val['empid']."' data-target='#return' >Return </button>
											<button class='btn btn-success vett_btn hide-print' value='".$val['reference']."' data-toggle='modal' emp='".$val['empid']."' data-target='#vett' >Vett</button> </td>
										</tr>
										";
										}
									}
								 ?>


							</tbody>
						</table>
					</div>
					
					</div>
					<!-- /.box-body -->
				</div>

			<?php } 
			function get_employee($id)
						{
							$query = mysql_query("select name from employees where pfno='$id'");
							$result = mysql_fetch_array($query);
							return $result['name'];
						}
			?>
    </section>
  </div>
  
  <div id="return" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2>Return Claimed TA to Employee </h2>
      </div>
      <form action='control/adminProcess.php?action=finalreturn' method="post">
      <div class="modal-body" style="padding:20px;">
        <h3>Are you sure, Confirm Return?
		<textarea name="remark" id="remark" class="form-control" placeholder="Enter your remark here..."></textarea>
		<input type="hidden" name="return_id" id="return_id">
		<input type="hidden" name="return_emp" id="return_emp">
		<input type="hidden" name="return_admin" id="return_admin" value="<?php echo $_SESSION['empid']; ?>">
      </div>
      <div class="modal-footer" style="margin-top:40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Reject</button>
      </div>
    </form>
    </div>

  </div>
</div>

<div id="vett" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="border-bottom-color: white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2>Approve Claimed TA and Vett </h2>
      </div>
      <form action='control/adminProcess.php?action=finalapproval' method="post">
      <div class="modal-body" style="padding:20px;">
        <h3>Are you sure, Confirm approve?
		<!--textarea name="remark" id="remark" class="form-control" placeholder="Enter your remark here..."></textarea-->
		<input type="hidden" name="refe" id="refe">
		<input type="hidden" name="return_emp1" id="return_emp1">
		<input type="hidden" name="return_admin" id="return_admin" value="<?php echo $_SESSION['empid']; ?>">
      </div>
      <div class="modal-footer" style="margin-top:40px;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Approve</button>
      </div>
    </form>
    </div>

  </div>
</div>
  <!--Content code end here--->
 <?php
	require_once("../../global/footer.php");
 ?>
 
 <script>
 $(document).on("click",".reject_btn",function(){
		var value = $(this).val();
		var emp = $(this).attr('emp');
		$("#return_id").val(value);
		$("#return_emp").val(emp);
	});
  $(document).on("click",".vett_btn",function(){
		var value = $(this).val();
		var emp = $(this).attr('emp');
		$("#refe").val(value);
		$("#return_emp1").val(emp);
	});
 </script>
