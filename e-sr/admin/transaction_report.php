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
		<span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Transaction type and Date wise Report</span>
	</div>
	<div style="border:1px solid #67809f;padding:30px;background:#fff;">
		<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Reports Details</h3>
			<div class="box-header with-border">
				<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
					<li class="active"><a href="#prft" data-toggle="tab"><b>Department and Billunit Wise</b></a></li>
				</ul>
			</div>
			<form method="post" action="">
				<div class="row" style="padding:30px;margin:20px;">
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="form-group bio">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >Transaction</label>
							<div class="col-md-9 col-sm-9 col-xs-12" >
								<select name="trans" id="trans" class="form-control select2">
									<option hidden selected disabled></option>
									<?php
										dbcon();
										$sql=mysql_query("select * from transaction_type");
										while($res=mysql_fetch_array($sql))
										{
											echo "<option value='".$res['id']."'>".$res['transaction']."</option>";
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="form-group bio">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" >Type</label>
							<div class="col-md-9 col-sm-9 col-xs-12" >
								<select name="billunit" id="billunit" class="form-control select2">
									
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
									<th>PF Number</th>
									<th>Employee Name</th>
									
								</tr>
								</thead>
								<tbody>
								<?php
									echo "<script>alert('out');</script>";
									if(isset($_POST['btn_view']))
									{
										echo "<script>alert('in');</script>";
										$dept=$_POST['dept'];
										$billunit=$_POST['billunit'];

										dbcon1();
										$sql=mysql_query("select * from present_work_temp where preapp_billunit='$billunit'");
										$sr_no=1;
										while($res=mysql_fetch_array($sql))
										{
											echo "<tr>";
											echo "<td>$sr_no</td>";
											echo "<td>".$res['preapp_pf_number']."</td>";
											echo "<td>".get_emp_name($res['preapp_pf_number'])."</td>";

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

$(document).on('change','#dept',function(){
	var dept=$(this).val();
	$.ajax({
		type:"post",
		url:"process.php",
		data:"action=get_report_billunit&dept="+dept,
		success:function(data){
			//alert(data);
			debugger;
			$("#billunit").html(data);
		  }
	});
});

</script>