<?php 
$_GLOBALS['a'] ='report1';
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
<div id="myDiv" style="position:absolute;top:260px;right:0px;width:100%;height:100%;background-color:#fff;background-image:url('circle-loading-gif.gif');background-repeat:no-repeat;background-position:center;z-index:10000000;opacity: 0.4;filter: alpha(opacity=40); display:none;">
	</div>
<div style="padding:10px;margin:5px;padding-top:20px;margin-top:15px;">
	<div class="row" style="background:#67809f;margin:0px;">
		<span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Reports</span>
	</div>
		<div style="border:1px solid #67809f;padding:30px;background:#fff;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Reports Details</h3>
				<div class="box-header with-border">
					<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
						<li class="active"><a href="#prft" data-toggle="tab"><b>Department and Billunit Wise</b></a></li>
						<!--li class=""><a href="#rever" data-toggle="tab"><b>Date Wise</b></a></li>
						<li class=""><a href="#trans" data-toggle="tab"><b>Pf Number Wise</b></a></li-->
					</ul>
				</div>
		
	<div class="tab-content">
		<div class="tab-pane active in" id="prft">
			<div style="margin:10px;margin-top:20px;border:2px solid #f39c12;background-color:#FFF;">
				<form method="post" action="">
					<div class="row" style="padding:30px;margin:20px;">
						<div class="col-md-4 col-sm-12 col-xs-12">
							<div class="form-group bio">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
								<div class="col-md-9 col-sm-9 col-xs-12" >
									<select class="form-control primary select2" id="dept" name="dept" style="margin-top:0px;width:100%;">
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
						<div class="col-md-4 col-sm-12 col-xs-12 text-center">
							<button class="btn btn-primary" type="submit" name="btn_view">View</button>
						</div>
					</div>
				</form>
			</div>
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
															<th>Billunit</th>
															<th>Total Employee</th>
															<th>Completed</th>
															<th>Pending</th>
														</tr>
														</thead>
														<tbody>
						<?php
						$data='';
						if(isset($_POST['btn_view']))
						{
							$dept=$_POST['dept'];
							$count=1;
							dbcon();
							
							if($dept==""){
								$sql=mysql_query("select * from billunit where dept_id!=''");
								$f=mysql_num_rows($sql);
							}else{
								$sql=mysql_query("select * from billunit where dept_id='$dept'");
								$f=mysql_num_rows($sql);
							}
							
							$total_count=0;
							$pf_arr=[];
							while($result=mysql_fetch_array($sql))
							{
								$bill_id=get_billunit_report($result['billunit']);
								
								echo "<tr>";
								echo "<td>$count</td>";
								echo "<td>".$result['billunit']."</td>";
								
								dbcon1();
								$sql1=mysql_query("select * from present_work_temp where preapp_billunit='$bill_id' OR ogd_billunit='$bill_id'");
							
								$f=mysql_num_rows($sql1);
								
								echo "<td><a href='#' bill_value='$bill_id' from_date='$from_date' to_date='$to_date' form_name='present_work' data-toggle='modal' data-target='#myModal' class='info'>$f</a></td>";
								
								$total_count=0;
								$inc_count=0;
								$i=0;
								$j=0;
								while($fetch=mysql_fetch_array($sql1)){
									
									$emp_pf=$fetch['preapp_pf_number'];
																
									$row_cnt=0;
									$inc_row_count=0;
									$fetch_record=mysql_query("select * from biodata_temp where pf_number='$emp_pf'");
									$r=mysql_num_rows($fetch_record);
									
									if($r>0)
									{
										$re=mysql_fetch_array($fetch_record);
										if($re['pf_number']!="" && $re['sr_no']!="" && $re['dob']!="" && $re['emp_name']!="" && $re['aadhar_number']!="" && $re['pan_number']!="" && $re['identification_mark']!="" && $re['religion']!="" && $re['community']!="" && $re['gender']!="" && $re['marrital_status']!="" && $re['recruit_code']!="" && $re['group_col']!="" && $re['education_ini']!="")
										{
											$row_cnt++;
											
										}else{
											$inc_row_count++;
										}
									}
									
									$fetch_record=mysql_query("select * from medical_temp where medi_pf_number='$emp_pf'");
									$r=mysql_num_rows($fetch_record);
									
									if($r>0)
									{
										$re=mysql_fetch_array($fetch_record);
										if($re['medi_pf_number']!="" && $re['medi_cate']!="" && $re['medi_dob']!="" && $re['medi_appo_date']!="" && $re['medi_design']!="" && $re['medi_class']!="" && $re['medi_examtype']!="" && $re['medi_certino']!="" && $re['medi_certidate']!="")
										{
											$row_cnt++;
										}else{
											$inc_row_count++;
										}
									}
									
									
									$fetch_record=mysql_query("select * from appointment_temp where app_pf_number='$emp_pf'");
									$r=mysql_num_rows($fetch_record);
									
									if($r>0){
										$re=mysql_fetch_array($fetch_record);
										if($re['app_type']=="4")
										{
											if($re['app_type']!="" && $re['app_pf_number']!="" && $re['app_department']!="" && $re['app_designation']!="" && $re['app_date']!="" && $re['app_regul_date']!="" && $re['app_payscale']!="" && $re['app_group']!="" && $re['app_station']!="" && $re['app_rop']!="" && $re['app_depot']!="")
											{
												$row_cnt++;
											}else{
												$inc_row_count++;
											}
										}else{
											if($re['app_type']!="" && $re['app_pf_number']!="" && $re['app_department']!="" && $re['app_designation']!="" && $re['app_regul_date']!="" && $re['app_payscale']!="" && $re['app_group']!="" && $re['app_station']!="" && $re['app_rop']!="" && $re['app_depot']!="")
											{
												$row_cnt++;
											}else{
												$inc_row_count++;
											}
										}
									}
									
									$fetch_record=mysql_query("select * from present_work_temp where preapp_pf_number='$emp_pf'");
									
									$r=mysql_num_rows($fetch_record);
									
									if($r>0)
									{
										$re=mysql_fetch_array($fetch_record);
										if($re['sgd_dropdwn']=='2')
										{
											if($re['preapp_pf_number']!="" && $re['preapp_department']!="" && $re['preapp_designation']!="" && $re['ps_type']!="" && $re['preapp_group']!="" && $re['preapp_station']!="" && $re['preapp_billunit']!="" && $re['preapp_rop']!="")
											{
												$row_cnt++;
											}else{
												$inc_row_count++;
											}
										}else{
											if($re['sgd_designation']!="" && $re['sgd_pst']!="" && $re['sgd_billunit']!="" && $re['sgd_station']!="" && $re['sgd_group']!="" && $re['ogd_desig']!="" && $re['ogd_pst']!="" && $re['ogd_billunit']!="" && $re['ogd_station']!="" && $re['ogd_group']!="" && $re['ogd_rop']!="")
											{
												$row_cnt++;
											}else{
												$inc_row_count++;
											}
										}
									}
									
									$fetch_record=mysql_query("select emp_pf from family_temp where emp_pf='$emp_pf'");
									$r=mysql_num_rows($fetch_record);
									
									if($r>0){
										$row_cnt++;
									}else{
										$inc_row_count++;
									}
									
									$fetch_record=mysql_query("select nom_pf_number from nominee_temp where nom_pf_number='$emp_pf'");
									$r=mysql_num_rows($fetch_record);
									
									if($r>0){
										$row_cnt++;
									}else{
										$inc_row_count++;
									}
									
									if($row_cnt>=6)
									{
										if($bu!=$bill_id)
										{
											$i=0;
											$bu=$bill_id;
										}	
										$pf_arr[$bu."_".$i]=$re['preapp_pf_number'];
										
										$data=json_encode($pf_arr);
										$total_count++;
										$i++;
										
									}
									
									if($inc_row_count>=1)
									{
										
										if($bu!=$bill_id)
										{
											$j=0;
											$bu=$bill_id;
										}
										$pf_pending[$bu."_".$j]=$re['preapp_pf_number'];
										
										$data_pending=json_encode($pf_pending);
										$inc_count++;
										$j++;
									}
								}
								echo "<td><a href='#' data-toggle='modal' data-target='#myModal' bill_value='$bill_id' class='complete_pf'>$total_count</a></td>";
								echo "<td><a href='#' data-toggle='modal' data-target='#myModal' bill_value='$bill_id' class='pending_pf'>$inc_count</a></td>";
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
<!---- 2nd report--->
<!----end of 2nd report--->
	</div>			  					 
</div>			  					 
</div>
	

<!----- Modal Of detailed Explanation-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg" style="width:100%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registered PF Number</h4>
        </div>
        <div class="modal-body">
			<div class="box-body" id="info_all">
				
			</div>	
        </div>
        <div class="modal-footer">
          <button type="button" id="clear_tbody" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- Prft Fixation End  -->
<?php include('modal_js_header.php');?>
<?php include_once('../global/footer.php');?>  
<script>
$(document).on("click",".info", function(){
	debugger;
	var b_v=$(this).attr('bill_value');
	$.ajax({
		type:"post",
		url:"process.php",
		data:"action=get_all_report_detail&b_v="+b_v,
		beforeSend: function() {
			$("#myDiv").show();
		},
		success:function(data){
			$("#info_all").html("");
			$("#info_all").append(data);
			$('#abcd').DataTable();
			$("#myDiv").hide();
		  }
	});
});

$(document).on("click",".complete_pf",function(){
	var b_v=$(this).attr('bill_value');
	var pf_data=JSON.stringify(<?php echo $data;?>);
	
	$.ajax({
		type:"post",
		url:"process.php",
		data:"action=get_complete_pf_report&b_v="+b_v+"&pf_data="+pf_data,
		beforeSend: function() {
			$("#myDiv").show();
		},
		success:function(data){
		//alert(data);
			$("#info_all").html("");
			$("#info_all").html(data);
			$('#abcd').DataTable();
			$("#myDiv").hide();
		  }
	});
});

$(document).on("click",".pending_pf",function(){
	var b_v=$(this).attr('bill_value');
	var pf_data=JSON.stringify(<?php echo $data_pending;?>);
	$.ajax({
		type:"post",
		url:"process.php",
		data:"action=get_pending_pf_report&b_v="+b_v+"&pf_data="+pf_data,
		 beforeSend: function() {
              $("#myDiv").show();
           },
		success:function(data){
		debugger;
		//alert(data);
			debugger;
			$("#info_all").html("");
			$("#info_all").html(data);
			$('#abcd').DataTable();
			$("#myDiv").hide();
 
		  }
	});
});
</script>
<script>
	$(document).ready(function() {
		$('#abcd').DataTable();
	});
</script>