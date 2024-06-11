<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://localhost/E-APAR/index.php';</script>";
 }
include_once('../global/header.php');
include_once('../global/topbaruser.php');
include_once('../global/sidebaruser.php');

?>
<!--link rel="stylesheet" href="style.css" media="screen"/-->
 <script>

</script> 
<style>
	.primary
	{
		box-shadow: none;
		border-color: #337AB7;
	}


</style>
<!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Employee Management
		  </h1>
		  <ol class="breadcrumb">
		   
			<li class="active">
				<a href="frmsample.php"><button type="button" class="btn btn-success" id="btn1"><i class="fa fa-mail-reply"> Back</i></button></a>
		
		  </li>
		  </ol>
		  <br>
		</section>
	
		<!-- Main content -->
		<section class="content">
		  <!-- Small boxes (Stat box) -->
		
			<div class="row" onload="showhide()">
			<div class="box-body">
			
				<label class="col-md-1 col-sm-4">Department </label>
							<div class="col-md-3 col-sm-4">
							<div class="input-group">
								<select class="form-control"  id="txtdept" name="txtdept" >
								<option value="" selected hidden disabled>-- Select Department --</option>
								<?php
								$sqlDept=mysql_query("select * from tbl_department");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
									$rowDept= $rwDept["dept_id"];
								?>
								<option value="<?php echo $rwDept["deptname"]; ?>"><?php echo $rwDept["deptname"]; ?></option>
								<?php
								}
							
							?>
								</select>
							</div><br>
							</div>
							<label class="col-md-1 col-sm-4">Category </label>
							<div class="col-md-3 col-sm-4">
							<div class="input-group">
								<select class="form-control"  id="txtcategory" name="txtcategory" onchange="showhide()">
								<option value="" selected hidden disabled>-- Select Category --</option>
								<option value="ALL">All Report</option>
								<option value="YEAR WISE">YEAR WISE</option>
								</select>
							</div><br>
							</div>
							
							<div id="divyear">
							<label class="col-md-1 col-sm-4">YEAR </label>
							<div class="col-md-3 col-sm-4">
							<div class="input-group">
								<select class="form-control"  id="txtyear" name="txtyear" >
								<option value="" selected hidden disabled>-- Select Category --</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								</select>
							</div><br>
							</div>
							</div>
							
							<div class="ccol-md-1 col-sm-4">
							<div class="input-group">
								<button class="btn btn-success btn-flat" id="btnshow" name="btnshow" onclick="showDeptReport(this)">SHOW</button>&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
				$permission = mysql_query("select * from tbl_accesspermission where accesslevel='".$_SESSION['Access_level']."'");
				$ResultSet = mysql_fetch_array($permission);
				if($ResultSet['report_printing']=='on')
				{
			?>
								<button class="btn bg-navy btn-narr margin"  id="btnprint" name="btnprint" onclick="printDiv();">PRINT REPORT</button>
								<?php
				}
								?>
								</div><br>
							</div>
			
						
			</div>
			
			<div id="showcustomedetails"></div>
			
				
								
			</div>
		</section>
		<!-- /.content -->
	</div>

	
<script>

function printDiv()
 {
var printContents = document.getElementById("showcustomedetails").innerHTML;
var originalContents = document.body.innerHTML;
document.getElementById('header').style.display = 'none';
document.getElementById('footer').style.display = 'none';
document.getElementById('btnshow').style.display = 'none';
document.body.innerHTML = printContents;

window.print();


document.body.innerHTML = originalContents;
}


//---------Document Script----------------//
$(document).ready(function() {
$("#divyear").hide();

});
	function showhide()
	{
		var txtcategory = document.getElementById('txtcategory').value;
		if(txtcategory=='ALL')
		{
			$("#divyear").hide();
			
		}
		else{
		$("#divyear").show();
		
		}
	}
	
function showDeptReport(sel) 
	{
		
		var txtcategory = document.getElementById('txtcategory').value;
		var dept = document.getElementById('txtdept').value;
		if(txtcategory=='ALL')
		{
				$.ajax({
					type: "POST",
					url: "fetch_all_record.php",
					data: "txtcategory=" + txtcategory+"&dept="+dept,
					cache: false,
					beforeSend: function() {
						$('#showcustomedetails').html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
					},
					success: function(html) 
					{
						$("#showcustomedetails").html(html);
						$("#showcustomedetails").show();
						$("#divyear").hide();
					}
				});
		}
		else if(txtcategory=='YEAR WISE')
		{
			var txtcategory = document.getElementById('txtcategory').value;
			var txtyear = document.getElementById('txtyear').value;
			/* alert(txtcategory);
			alert(txtyear);
			alert(dept); */
			 $.ajax({
					type: "POST",
					url: "fetch_year_record.php",
					data: "txtyear=" + txtyear+"&dept="+dept,
					cache: false,
					beforeSend: function() {
						$('#showcustomedetails').html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
					},
					success: function(html) 
					{
						$("#showcustomedetails").html(html);
						$("#showcustomedetails").show();
						$("#divyear").show();
					}
				});
		}
	}
</script>
	
  <?php
 include_once('../global/footer.php');
 ?> 