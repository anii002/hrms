<?php 
$_GLOBALS['a'] ='biodata';
  include_once('../global/header_update.php');
  
	include('create_log.php');
  
	$action="Visited Biodata page";
	$action_on=$_SESSION['set_update_pf'];
	create_log($action,$action_on);
  ?>

<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
			<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;ADD USER</span>
			</div>
			<div style="border:1px solid #67809f;padding:30px;">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;User Managment </h3>
						
				</div>
				<div class="row">
				<h4>Existing User</h4>
				<a href="add_user.php" class="pull-right btn btn-primary" style="margin-right:25px;">Add User</a>
				</div>
					<div class="box-body">
														<table id="exampleprom" class="table table-striped">
														<thead>
														<tr>
															<th width="40%">Sr No</th>
															<th width="40%">Name</th>
															<th width="20%">Action</th>
														</tr>
														</thead>
														<tbody>
															<tr>
																<td width="40%"></td>
																<td width="40%"></td>
																<td width="20%"><a class="btn btn-primary" href="#">Edit</a>&emsp;<a class="btn btn-warning"href="#">Deactivate</a></td>									
															</tr>
														</tbody>
															
													</table>
												</div>
						<script>
							$(function () {
							$('#exampleprom').DataTable()
							})
						</script>
				
				
				
				
			</div>
</div>
<?php include_once('../global/footer.php');?>  