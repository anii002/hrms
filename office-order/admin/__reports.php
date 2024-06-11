<?php 
$_GLOBALS['a'] ='reports';
session_start();
error_reporting(0);
$GLOBALS['a'] = 'reports';
include_once('../global/header.php');
include_once('../global/topbar.php');

include('mini_function.php');
include('fetch_all_column.php');
include_once('../dbconfig/dbcon.php');
dbcon1();
//include_once('../global/header_update.php');?>
<!--Bio Tab Start -->
<div style="padding:10px;margin:5px;padding-top:20px;margin-top:15px;">
	<div class="row" style="background:#67809f;margin:0px;">
		<span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Reports</span>
	</div>
		<div style="border:1px solid #67809f;padding:30px;background:#fff;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Reports Details</h3>
				<!--div class="box-header with-border">
					<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
					<li class="active"><a href="#prft" data-toggle="tab"><b>Bio-Data</b></a></li>
					<li class=""><a href="#rever" data-toggle="tab"><b>Medical-Details</b></a></li>
					<li class=""><a href="#trans" data-toggle="tab"><b>Initial Appointment</b></a></li>
					<li class=""><a href="#fix" data-toggle="tab"><b>Present Appointment</b></a></li>
					<li class=""><a href="#fix" data-toggle="tab"><b>Family Composition</b></a></li>
					<li class=""><a href="#fix" data-toggle="tab"><b>Nominee</b></a></li>
					</ul>
				</div-->
		<div style="margin:10px;margin-top:20px;border:2px solid #f39c12;background-color:#FFF;">
			<form method="post" action="">
				<div class="row" style="padding:30px;margin:20px;">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="form-group bio">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >From Date</label>
					  <div class="col-md-9 col-sm-9 col-xs-12" >
						<input type="text" id="from_date" name="from_date" class="form-control form-text calender_picker" placeholder="Enter Date" required>
					  </div>
					</div>
				</div>
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="form-group bio">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >To Date</label>
					  <div class="col-md-9 col-sm-9 col-xs-12" >
						<input type="text" id="to_date" name="to_date" class="form-control form-text calender_picker" placeholder="Enter Date" required>
					  </div>
					</div>
				</div>
				<div class="col-md-2 col-sm-12 col-xs-12">
					<button class="btn btn-primary" type="submit" name="btn_view">View</button>
				</div>
				
			</div>
			</form>
		</div>
		<div class="tab-content">
			<div class="tab-pane active in" id="prft">
				<form method="post" action="process_main.php?action=" class="">
					<div class="modal-body">
						<!--h3>Promotion</h3--><hr>
							<div class="row">
								<section class="content">
									<div class="row">
										<div class="col-xs-12">
											<div class="box">
												<div class="box-header">
												<h3 class="box-title">Employee List</h3>
												</div>
													<!-- /.box-header -->
												<div class="box-body table-responsive">
													<table id="exampleprom" class="table table-striped ">
														<thead>
														<tr>
															<th>Sr No</th>
															<th>PF Number</th>
															<th>Employee Name</th>
															<th>Bio-Data</th>
															<th>Medical-Details</th>
															<th>Initial Appointment</th>
															<th>Present Appointment</th>
															<th>Family Composition</th>
															<th>Nominee</th>
														</tr>
														</thead>
														<tbody>
			<?php
			dbcon1();
			if(isset($_POST['btn_view'])){
				
				$date_from=date('Y-m-d', strtotime($_POST['from_date']));
				$date_to=date('Y-m-d', strtotime($_POST['to_date']));
				
				$sql=mysql_query("select * from biodata_temp where DATE(date_time) between '$date_from' and '$date_to'");
				$cnt=1;
				while($result=mysql_fetch_array($sql)){
					echo "<tr>";
					echo "<td>$cnt</td>";
					echo "<td>".$result['pf_number']."</td>";
					echo "<td>".$result['emp_name']."</td>";
					echo "<td style='text-align:center;'><i class='fa fa-check' aria-hidden='true' style='color:green;font-size:20px;'></i></td>";
					$f_m=mysql_query("select * from medical_temp where medi_pf_number='".$result['pf_number']."'");
					$m_cnt=mysql_num_rows($f_m);
					if($m_cnt>=1){
						echo "<td style='text-align:center;'><i class='fa fa-check' aria-hidden='true' style='color:green;font-size:20px;'></i></td>";
					}else{
						echo "<td style='text-align:center;'><i class='fa fa-times' aria-hidden='true' style='color:red;font-size:20px;'></i></td>";
					}
					$f_app=mysql_query("select * from  appointment_temp where app_pf_number='".$result['pf_number']."'");
						$app_cnt=mysql_num_rows($f_app);
						if($app_cnt>=1){
							echo "<td style='text-align:center;'><i class='fa fa-check' aria-hidden='true' style='color:green;font-size:20px;'></i></td>";
						}else{
							echo "<td style='text-align:center;'><i class='fa fa-times' aria-hidden='true' style='color:red;font-size:20px;'></i></td>";
						}
					$f_pre=mysql_query("select * from  present_work_temp where preapp_pf_number='".$result['pf_number']."'");
						$pre_cnt=mysql_num_rows($f_pre);
						if($pre_cnt>=1){
							echo "<td style='text-align:center;'><i class='fa fa-check' aria-hidden='true' style='color:green;font-size:20px;'></i></td>";
						}else{
							echo "<td style='text-align:center;'><i class='fa fa-times' aria-hidden='true' style='color:red;font-size:20px;'></i></td>";
						}
					$f_fmy=mysql_query("select * from family_temp where emp_pf='".$result['pf_number']."'");
						$fmy_cnt=mysql_num_rows($f_fmy);
						if($fmy_cnt>=1){
							echo "<td style='text-align:center;'><i class='fa fa-check' aria-hidden='true' style='color:green;font-size:20px;'></i></td>";
						}else{
							echo "<td style='text-align:center;'><i class='fa fa-times' aria-hidden='true' style='color:red;font-size:20px;'></i></td>";
						}
					$f_nom=mysql_query("select * from nominee_temp where nom_pf_number='".$result['pf_number']."'");
					$nom_cnt=mysql_num_rows($f_nom);
						if($nom_cnt>=1){
							echo "<td style='text-align:center;'><i class='fa fa-check' aria-hidden='true' style='color:green;font-size:20px;'></i></td>";
						}else{
							echo "<td style='text-align:center;'><i class='fa fa-times' aria-hidden='true' style='color:red;font-size:20px;'></i></td>";
						}
					
					echo "</tr>";
					$cnt++;
				}
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
	</div>			  					 
</div>			  					 
</div>


<!-- Prft Fixation End  -->
<?php include('modal_js_header.php');?>
						
<?php include_once('../global/footer.php');?>  