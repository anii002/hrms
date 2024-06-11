<?php 
$_GLOBALS['a'] ='prft';
include_once('../global/header_update.php');

	include('create_log.php');
  
	$action="Visited PRFT Update page";
	$action_on=$_SESSION['set_update_pf'];
	create_log($action,$action_on);
?>
<!--Bio Tab Start -->
<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
	<div class="row" style="background:#67809f;margin:0px">
		<span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</span>
	</div>
		<div style="border:1px solid #67809f;padding:30px;">
			<!--h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>-->
				<div class="box-header with-border">
					<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
					<li class="active"><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
					<li class=""><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
					<li class=""><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
					<li class=""><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
					</ul>
				</div>
		<div class="tab-content">
			<div class="tab-pane active in" id="prft">
				<form method="post" action="process_main.php?action=" class="">
					<div class="modal-body">
						<!--<h3>Promotion</h3><hr>-->
							<div class="row">
								<section class="content">
									<div class="row pull-right">
									<?php
										$query=mysql_query("select * from present_work_temp where preapp_pf_number='".$_SESSION['set_update_pf']."'");
										
										$re=mysql_num_rows($query);
										if($re>0)
										{
											echo '<a class="btn btn-primary" href="prft_update_promotion.php?pf_no=promo">Add Promotion</a>';
										}else{
											echo '<a class="btn btn-primary" href="#" style="pointer-events: none;cursor: default;">Add Promotion</a>';
										}
										
									?>
										
									</div>
									<div class="row">
										<div class="col-xs-12">
											<div class="box">
												<div class="box-header">
												<h3 class="box-title">Employee List</h3>
												</div>
													<!-- /.box-header -->
												<div class="box-body">
													<table id="exampleprom" class="table table-striped">
														<thead>
														<tr>
															<th>Sr No</th>
															<th>PF Number</th>
															<th>Order Type</th>
															<th>Transaction Id</th>
															<th>Update</th>
														</tr>
														</thead>
														<tbody>
															<?php
															dbcon1();
															$pf_no=$_SESSION['set_update_pf'];
															$cnt_pr=1;
															$sql=mysql_query("select * from  prft_promotion_temp where pro_pf_no='$pf_no'");
															$h=mysql_num_rows($sql);
															if($h==0)
															{
																echo "<label class='control-label col-md-4 col-sm-3 col-xs-12' style='font-size:15px;color:red;'>PRFT Promotion for This Employee Is Not Available</label>";
															}
															while($result=mysql_fetch_array($sql)){
															echo "<tr>";
															echo "<td>$cnt_pr</td>";
															echo "<td>".$result['pro_pf_no']."</td>";
															echo "<td>".$result['pro_order_type']."</td>";
															echo "<td>".$result['temp_transaction_id']."</td>";
															echo "<td><a href='prft_update_promotion.php?pf_no=".$result['pro_pf_no']."&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>Update</b></i></a></td>";
															echo "</tr>";
															$cnt_pr++;
															}
															?>
														</tbody>
															<tfoot></tfoot>
													</table>
												</div>
										<!-- /.box-body -->
											</div>
										<!-- /.box -->
										</div>
									<!-- /.col -->
									</div>
							<!-- /.row -->
							</section>	
						<script>
						$(function () {
							$('#exampleprom').DataTable()
						})
						</script>
					</div>
				</div>
			</form>
		</div>
<!-- Prft promotion End  -->

<!-- Prft Reversion Start  -->
<div class="tab-pane" id="rever">
	<!--<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>-->
		<div class="box-body">
			<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
					<!--<h3>Reversion</h3><hr>-->
						<div class="row">
							<section class="content">
								<div class="row pull-right">
									<?php
										$query=mysql_query("select * from present_work_temp where preapp_pf_number='".$_SESSION['set_update_pf']."'");
										
										$re=mysql_num_rows($query);
										if($re>0)
										{
											echo '<a class="btn btn-primary" href="prft_update_reversion.php?pf_no=rev">Add Reversion</a>';
										}else{
											echo '<a class="btn btn-primary" href="#" style="pointer-events: none;cursor: default;">Add Reversion</a>';
										}
										
									?>
										
									</div>
								<div class="row">
									<div class="col-xs-12">
										<div class="box">
											<div class="box-header">
												<h3 class="box-title">Employee List</h3>
											</div>
								<!-- /.box-header -->
											<div class="box-body">
												<table id="examplerev" class="table table-striped">
													<thead>
														<tr>
															<th>Sr No</th>
															<th>PF Number</th>
															<th>Order Type</th>
															<th>Transaction Id</th>
															<th>Update</th>
														</tr>
													</thead>
														<tbody>
															<?php
															dbcon1();
															$pf_no=$_SESSION['set_update_pf'];
															$cnt_rv=1;
															$sql=mysql_query("select * from  prft_reversion_temp where rev_pf_no='$pf_no'");
															$h=mysql_num_rows($sql);
															if($h==0)
															{
																echo "<label class='control-label col-md-4 col-sm-3 col-xs-12' style='font-size:15px;color:red;'>PRFT Reversion for This Employee Is Not Available</label>";
															}
															while($result=mysql_fetch_array($sql)){
															echo "<tr>";
															echo "<td>$cnt_rv</td>";
															echo "<td>".$result['rev_pf_no']."</td>";
															echo "<td>".$result['rev_order_type']."</td>";
															echo "<td>".$result['temp_transaction_id']."</td>";
															echo "<td><a href='prft_update_reversion.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>Update</b></i></a></td>";
															echo "</tr>";
															$cnt_rv++;
															}
															?>
														</tbody>
															<tfoot>	</tfoot>
												</table>
											</div>
										<!-- /.box-body -->
										</div>
									<!-- /.box -->
									</div>
								<!-- /.col -->
								</div>
						<!-- /.row -->
						</section>	
					<script>
						$(function () {
						$('#examplerev').DataTable()

						})
					</script>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- Prft Reversion End  -->

<!-- Prft Transfer Start  -->
<div class="tab-pane" id="trans">
	<!--<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>-->
		<div class="box-body">
			<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
					<!--<h3>Transfer</h3><hr>-->
						<div class="row">
							<section class="content">
								<div class="row pull-right">
									<?php
										$query=mysql_query("select * from present_work_temp where preapp_pf_number='".$_SESSION['set_update_pf']."'");
										
										$re=mysql_num_rows($query);
										if($re>0)
										{
											echo '<a class="btn btn-primary" href="prft_update_transfer.php?pf_no=trans">Add Transfer</a>';
										}else{
											echo '<a class="btn btn-primary" href="#" style="pointer-events: none;cursor: default;">Add Transfer</a>';
										}
										
									?>
										
									</div>
								<div class="row">
									<div class="col-xs-12">
										<div class="box">
											<div class="box-header">
												<h3 class="box-title">Employee List</h3>
											</div>
											<!-- /.box-header -->
												<div class="box-body">
													<table id="exampletrans" class="table table-striped">
														<thead>
															<tr>
																<th>Sr No</th>
																<th>PF Number</th>
																<th>Order Type</th>
																<th>Transaction Id</th>
																<th>Update</th>
															</tr>
														</thead>
															<tbody>
																<?php
																dbcon1();
																$pf_no=$_SESSION['set_update_pf'];
																$cnt_tr=1;
																$sql=mysql_query("select * from prft_transfer_temp where trans_pf_no='$pf_no'");
																$h=mysql_num_rows($sql);
																if($h==0)
																{
																	echo "<label class='control-label col-md-4 col-sm-3 col-xs-12' style='font-size:15px;color:red;'>PRFT Transfer for This Employee Is Not Available</label>";
																}
																while($result=mysql_fetch_array($sql)){
																echo "<tr>";
																echo "<td>$cnt_tr</td>";
																echo "<td>".$result['trans_pf_no']."</td>";
																echo "<td>".get_order_type_transfer($result['trans_order_type'])."</td>";
																echo "<td>".$result['temp_transaction_id']."</td>";
																echo "<td><a href='prft_update_transfer.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>Update</b></i></a></td>";
																echo "</tr>";
																$cnt_tr++;
																}
																?>
															</tbody>
																<tfoot></tfoot>
													</table>
												</div>
											<!-- /.box-body -->
											</div>
										<!-- /.box -->
										</div>
								<!-- /.col -->
								</div>
						<!-- /.row -->
						</section>	
					<script>
					$(function () {
					$('#exampletrans').DataTable()

					})
					</script>
				</div>
			</div>
		</form>
	</div>
</div>			 
<!-- Prft Transfer End  -->

<!-- Prft Fixation Start  -->
<div class="tab-pane" id="fix">
	<!--<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>-->
		<div class="box-body">
			<form method="post" action="process_main.php?action=" class="">
				<div class="modal-body">
					<!--<h3>Fixation</h3><hr>-->
						<div class="row">
							<section class="content">
								<div class="row pull-right">
									<?php
									dbcon1();
										$query=mysql_query("select * from present_work_temp where preapp_pf_number='".$_SESSION['set_update_pf']."'");
										//echo "select * from present_work_temp where preapp_pf_number='".$_SESSION['set_update_pf']."'".mysql_error();
										
										$re=mysql_num_rows($query);
										if($re>0)
										{
											echo '<a class="btn btn-primary" href="prft_update_fixaction.php?pf_no=fix">Add Fixation</a>';
										}else{
											echo '<a class="btn btn-primary" href="#" style="pointer-events: none;cursor: default;">Add Fixation</a>';
										}
										
									?>
									
								</div>
								<div class="row">
									<div class="col-xs-12">
										<div class="box">
											<div class="box-header">
												<h3 class="box-title">Employee List</h3>
											</div>
												<!-- /.box-header -->
												<div class="box-body">
													<table id="examplefix" class="table table-striped">
														<thead>
															<tr>
																<th>Sr No</th>
																<th>PF Number</th>
																<th>Order Type</th>
																<th>Transsaction Id</th>
																<th>Update</th>
															</tr>
														</thead>
															<tbody>
																<?php
																	dbcon1();
																	$pf_no=$_SESSION['set_update_pf'];
																	$cnt_fx=1;
																	$sql1=mysql_query("select * from prft_fixation_temp where fix_pf_no='$pf_no'");
																	$cnt=mysql_num_rows($sql1);
																	if($cnt==0)
																	{
																		echo "<label class='control-label col-md-4 col-sm-3 col-xs-12' style='font-size:15px;color:red;'>PRFT Fixation for This Employee Is Not Available</label>";
																	}
																	while($result=mysql_fetch_array($sql1)){
																		
																	echo "<tr>";
																	echo "<td>$cnt_fx</td>";
																	echo "<td>".$result['fix_pf_no']."</td>";
																	echo "<td>".get_order_type_fixation($result['fix_order_type'])."</td>";
																	echo "<td>".$result['temp_transaction_id']."</td>";
																	echo "<td><a href='prft_update_fixaction.php?pf_no=$pf_no&id=".$result['id']."' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>Update</b></i></a></td>";
																	echo "</tr>";
																	$cnt_fx++;
																	}
																	?>
															</tbody>
														<tfoot></tfoot>
													</table>
												</div>
											<!-- /.box-body -->
											</div>
										<!-- /.box -->
										</div>
									<!-- /.col -->
									</div>
							<!-- /.row -->
							</section>	
					<script>
						$(function () {
						$('#examplefix').DataTable()
						})
					</script>
				</div>
			</div>
		</div>
	</form>
</div>		  					 
	</div>			  					 
		</div>			  					 
	</div>
</div>

<!-- Prft Fixation End  -->
<?php include('modal_js_header.php');?>
<?php
if(isset($_SESSION['set_update_pf']))
{
echo "<script>$('.common_pf_number').val('".$_SESSION['set_update_pf']."'); </script>";
} 
?>							
<?php include_once('../global/footer.php');?>  