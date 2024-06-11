<?php
	require_once("../../global/admin_header.php");
	require_once("../../global/admin_topbar.php");
	require_once("../../global/admin_sidebar.php");
?>
<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
			<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;ADD Designation Role</span>
			</div>
			<div style="border:1px solid #67809f;padding:30px;">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;User Managment </h3>
						
				</div>
				<div class="row">
				<h4>Existing Designations</h4>
				<a href="desig_add.php" class="pull-right btn btn-primary" style="margin-right:25px;">ADD Role</a>
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
 <?php
	require_once("../../global/footer.php"); ?>