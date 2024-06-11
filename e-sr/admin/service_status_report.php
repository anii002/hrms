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
?>

	<div class="row" style="background:#67809f;margin:0px;">
		<span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Service Status Wise Report</span>
	</div>
	<div style="border:1px solid #67809f;padding:30px;background:#fff;">
		<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Reports Details</h3>
			<div class="box-header with-border">
				<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
					<li class="active"><a href="#prft" data-toggle="tab"><b>Service Status Wise</b></a></li>
				</ul>
			</div>
			<form method="post" action="">
				<div class="row" style="padding:30px;margin:20px;">
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="form-group bio">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >Service</label>
							<div class="col-md-9 col-sm-9 col-xs-12" >
								<select name="service" id="service" class="form-control select2">
									<option hidden selected disabled></option>
									<option value='serving'>In Service</option>
									<option value='retired'>Retired</option>
									<option value='transfered'>Transfered</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12" id="type_div">
						<div class="form-group bio">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" >Type</label>
							<div class="col-md-9 col-sm-9 col-xs-12" >
								<select name="type" id="type" class="form-control select2">
									
								</select>
							</div>
						</div>
					</div>
					<br>
					<div class="col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top:10px;">
						<button class="btn btn-primary" type="submit" name="btn_view">View</button>
					</div>
				</div>
			</form>	
			<?php
				if(isset($_POST['btn_view']))
				{ 
					$service=$_POST['service'];
					$type=$_POST['type'];

					if($service=='serving')
					{
						$sql1=mysql_query('select preapp_pf_number,preapp_billunit from present_work_temp where serving_status="1"');
						//echo 'select preapp_pf_number,preapp_billunit from present_work_temp where serving_status="1"'.mysql_error();
					}else if($service == 'retired')
					{
						$sql1=mysql_query("select preapp_pf_number,preapp_billunit from present_work_temp where serving_status='$type'");
					}else if($serice == 'transfered')
					{
						$sql1=mysql_query("select trans_pf_no from prft_transfer_temp where trans_order_type='$type'");
					}
					?>
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title">Employee List</h3>
								</div>
								<!-- /.box-header -->
								<div class="box-body table-responsive">
									<table id="exampleprom" class="table table-striped">
										<thead>
										<tr>
											<th>Sr No</th>
											<th>Employee Name</th>
											<th>PF Number</th>
											<th>Billunit</th>
											<th>Department</th>
										</tr>
										</thead>
										<tbody>
										<?php
										if($service=='transfered')
										{
											$sr_no=1;
											while($res=mysql_fetch_array($sql1))
											{
												echo "<tr>";
												
												echo "<td>$sr_no</td>";
												echo "<td>".$res['trans_pf_number']."</td>";
												echo "<td>".get_emp_name($res['trans_pf_number'])."</td>";
												echo "<td>".get_billunit(get_pf_billunit($res['trans_pf_number']))."</td>";
												echo "<td>".get_pf_department(get_department($res['trans_pf_number']))."</td>";

												echo "</tr>";
												$sr_no++;
											}
										}else{
											$sr_no=1;
											while($res=mysql_fetch_array($sql1))
											{
												echo "<tr>";
												echo "<td>$sr_no</td>";
												echo "<td>".$res['preapp_pf_number']."</td>";
												echo "<td>".get_emp_name($res['preapp_pf_number'])."</td>";
												echo "<td>".get_billunit($res['preapp_billunit'])."</td>";
												echo "<td>".get_department(get_pf_department($res['preapp_pf_number']))."</td>";

												echo "</tr>";
												$sr_no++;
											}
										}
											
										?>
										</tbody>
										<tfoot></tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
		</div>
	</div>
	<script>
		$(function () {
			$('#exampleprom').DataTable()
		})
	</script>			  					 

<?php include('modal_js_header.php');?>
<?php include_once('../global/footer.php');?>  
<script>

$(document).on('change','#service',function(){
	var service=$(this).val();
	// debugger;
	// alert(service);
	if(service=='serving')
	{
		$("#type_div").attr('style','display:none');
	}else if(service=='retired')
	{
		$.ajax({
			type:"post",
			url:"process.php",
			data:"action=get_retired_type",
			success:function(data){
				// alert(data);
				$("#type_div").attr('style','display:block');
				$("#type").html(data);
			}
		});
	}else if(service=='transfered')
	{
		$.ajax({
			type:"post",
			url:"process.php",
			data:"action=get_transferd_type",
			success:function(data){
				// alert(data);
				 $("#type_div").attr('style','display:block');
				 $("#type").html(data);
			}
		});
	}
});

</script>