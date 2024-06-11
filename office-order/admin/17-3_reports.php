<?php 
$_GLOBALS['a'] ='reports';
session_start();
//error_reporting(0);
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
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group bio">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >From Date</label>
					  <div class="col-md-9 col-sm-9 col-xs-12" >
						<input type="text" id="from_date" name="from_date" class="form-control form-text calender_picker" placeholder="Enter Date" required>
					  </div>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group bio">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >To Date</label>
					  <div class="col-md-9 col-sm-9 col-xs-12" >
						<input type="text" id="to_date" name="to_date" class="form-control form-text calender_picker" placeholder="Enter Date" required>
					  </div>
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="form-group bio">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
					  <div class="col-md-9 col-sm-9 col-xs-12" >
						<select class="form-control primary select2" id="dept" name="dept" style="margin-top:0px; width:100%;" >
							<option value="" disabled  selected>Select Department</option>
								<?php
									dbcon();
									$dept="";
									$sqlDept=mysql_query("select * from department");
									if (! $sqlDept){
									   echo 'Database error: ' . mysql_error();
									}
									while($rwDept=mysql_fetch_array($sqlDept))
									{
										$dept .="<option value='".$rwDept["id"]."'>".$rwDept["DEPTDESC"]."</option>";
									}
									echo $dept;
								?>
						</select>
					  </div>
					</div>
				</div>
				<br>
				<div class="col-md-12 col-sm-12 col-xs-12 text-center">
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
															<!--th>PF Number</th>
															<th>Employee Name</th-->
															<th>Billunit</th>
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
						
						if(isset($_POST['btn_view']))
						{
							$dept=$_POST['dept'];
							$from_date=date('Y-m-d', strtotime($_POST['from_date']));
							$to_date=date('Y-m-d', strtotime($_POST['to_date']));
							$count=1;
							dbcon();
							//echo $dept;
							$sql=mysql_query("select * from billunit where dept_id='$dept'");
							
							$f=mysql_num_rows($sql);
							
							while($result=mysql_fetch_array($sql))
							{
								
								$bill_id=get_billunit_report($result['billunit']);
								
								echo $re['pf_number'];
								echo "<tr>";
								echo "<td>$count</td>";
								echo "<td>".$result['billunit']."</td>";
								
								dbcon1();
								$sql2=mysql_query("select * from biodata_temp b INNER JOIN present_work_temp p ON b.pf_number=p.preapp_pf_number where p.preapp_billunit='$bill_id' OR p.ogd_billunit='$bill_id' and date(b.date_time) between '$from_date' and '$to_date'")or die(mysql_error());
								$f=mysql_num_rows($sql2);
								
								echo "<td>$f</td>";
								
								dbcon1();
								$sql3=mysql_query("select * from medical_temp b INNER JOIN present_work_temp p ON b.medi_pf_number=p.preapp_pf_number where p.preapp_billunit='$bill_id' OR p.ogd_billunit='$bill_id' and date(b.datetime) between '$from_date' and '$to_date'")or die(mysql_error());
								$f=mysql_num_rows($sql3);
								
								echo "<td>$f</td>";
								
								dbcon1();
								$sql4=mysql_query("select * from appointment_temp b INNER JOIN present_work_temp p ON b.app_pf_number=p.preapp_pf_number where p.preapp_billunit='$bill_id' OR p.ogd_billunit='$bill_id' and date(b.date_time) between '$from_date' and '$to_date'")or die(mysql_error());
								$f=mysql_num_rows($sql4);
								
								echo "<td>$f</td>";
								
								dbcon1();
								$sql1=mysql_query("select * from present_work_temp where preapp_billunit='$bill_id' OR ogd_billunit='$bill_id' and date(date_time) between '$from_date' and '$to_date'")or die(mysql_error());
								$f=mysql_num_rows($sql1);
								
								echo "<td>$f</td>";
								
								dbcon1();
								$sql1=mysql_query("select * from family_temp b INNER JOIN present_work_temp p ON b.fmy_pf_number=p.preapp_pf_number where p.preapp_billunit='$bill_id' OR p.ogd_billunit='$bill_id' and date(b.date_time) between '$from_date' and '$to_date'")or die(mysql_error());
								$f=mysql_num_rows($sql1);
								
								echo "<td>$f</td>";
								
								dbcon1();
								$sql1=mysql_query("select * from nominee_temp b INNER JOIN present_work_temp p ON b.nom_pf_number=p.preapp_pf_number where p.preapp_billunit='$bill_id' OR p.ogd_billunit='$bill_id' and date(b.date_time) between '$from_date' and '$to_date'")or die(mysql_error());
								$f=mysql_num_rows($sql1);
								
								echo "<td>$f</td>";
								
								echo "</tr>";
								$count++;
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