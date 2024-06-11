<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://drmpsur-hrms.in/e-apar/index.php';</script>";
 }
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

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
				<a href="frmsample.php"><button type="button" class="btn btn-success" id="#btn1"><i class="fa fa-mail-reply"> Back</i></button></a>
		
		  </li>
		  </ol>
		  <br>
		</section>
	
		<!-- Main content -->
		<section class="content">
		  <!-- Small boxes (Stat box) -->
		
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header">
						  <h3 class="" style="text-align:center;">
						  Employee Report
						  </h3>
						</div>
								<!-- /.box-header -->
						<div class="box-body">
							<form action="" method="GET"  enctype="multipart/form-data" role="form" id="frmhelpdesk">
							
							<label class="col-md-1 col-sm-4">Department </label>
							<div class="ccol-md-4 col-sm-4">
							<div class="input-group">
								<select class="form-control"  id="txtdept" name="txtdept" onchange="showDeptReport(this)">
								<option value="" selected hidden disabled>-- Select Department --</option>
								<?php
								$sqlDept=mysql_query("select * from tbl_department");
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["deptname"]; ?>"><?php echo $rwDept["deptname"]; ?></option>
								<?php
								}
							
							?>
								</select>
							</div><br>
							</div>
							
							<label class="col-md-1 col-sm-4">Category </label>
							<div class="ccol-md-4 col-sm-4">
							<div class="input-group">
								<select class="form-control"  id="txtcategory" name="txtcategory">
								<option value="" selected hidden disabled>-- Select Category --</option>
								<option value="ALL">All Report</option>
								<option value="YEAR WISE">YEAR WISE</option>
								</select>
							</div><br>
							</div>
							
								<div class="form-group" id="customdate">
									<label class="col-md-1">Year :</label>
									<div class="col-md-4">
										<div class="input-group">
										<select class="form-control" id="txtstartyear" name="txtstartyear" onChange="showReport(this)">
											<option value="" selected hidden disabled>-- Start Number Of Year --</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
										</select>
										</div>
									</div>
								</div>
								
								
								
								
								<center><div class="col-md-12 form-group">
										<div class="col-sm-4 col-md-3">
										<!--input type='button' id='btnShowReport' class='btn btn-info btn-flat' value='Show Report' /-->
										<button class='btn btn-info btn-flat' id='btnShowReport'>Show Report</button>
										</div>
										<div class="col-sm-2 col-md-2">
										<input type='reset' id='btnPrint' class='btn btn-default btn-flat ' value='Print Report' />
										</div>
										</div>
								</center>
								
								<div id="showcustomedetails"></div>
								
								<div class="clearfix"></div>
								<div class="table-responsive" id="showempdetails" name="showempdetails">
									<table class='table table-striped table-bordered table-hover' id='example'>
											<thead>
													<tr class='odd gradeX'>
														<th style='display:none;'> Employee Code</th>
														<th style=''></th>
														<th> PF No</th>
														<th> Name </th>
														<th> Design </th>
														<th> Station </th>
														<th> Pay Scale </th>
														<?php
														$sql=mysql_query("SELECT * FROM year order by id desc limit 7");
														while($rev = mysql_fetch_array($sql))
														{
														?>
														   <th><?php echo $rev['years']; ?></th>
													   <?php
														}
														?>
														
													</tr>
													
											</thead>
									  
										<tbody>
										  <?php
										$sqlemployee=mysql_query("select * from tbl_employee order by empid asc");
										while($rwEmployee=mysql_fetch_array($sqlemployee,MYSQL_ASSOC))
										{
											$empid=$rwEmployee["empid"];
											$year=$rwEmployee["year"];
											$emppf=$rwEmployee["emplcode"];
											$dept=$rwEmployee["dept"];
											$design=$rwEmployee["design"];
											$station=$rwEmployee["station"];
											$payscale=$rwEmployee["payscale"];
											$year=$rwEmployee["year"];
											$uploadfile=$rwEmployee["uploadfile"];
											$empname = $rwEmployee["empname"];
											
										?>
										<tr class="headings">	
													<td style="display:none;" id="tdempid$empid"><?php echo $empid; ?></td>
													<td id="tdempid$empid"><input type="checkbox" name="check_list[]" value=<?php echo $empid; ?>/></td>
													<!--td id="tdemppf$empid"><?php echo $emppf; ?></a></td-->
													<td id="tdemppf$empid"><?php echo "<a href='frmshowemployee.php?emppf=".$emppf."'>$emppf</a> "?></td>
													<td id="tddept$empid"><?php echo $empname; ?></td>
													<td id="tddesign$empid"><?php echo $design; ?></td>
													<td id="tdstation$empid"><?php echo $station; ?></td>
													<td id="tdstation$empid"><?php echo $payscale; ?></td>
													<?php
													$i=0;
													$sql=mysql_query("SELECT * FROM year order by id desc limit 7");
													while($rev = mysql_fetch_array($sql))
													{
														//$sql_query = mysql_query("select * from scanned_apr where empid='".$emppf."' AND year='".$rev['years']."'");
														$sql_query = mysql_query("select * from scanned_img where empid='".$emppf."' AND year='".$rev['years']."'");
														$result=mysql_fetch_array($sql_query);
														$demo_year=$rev['years'];
														//$emppf=$rwEmployee["emplcode"];
														
														if($result['image']!="")
														{
															$query = mysql_query("select * from scanned_apr where empid='".$emppf."' AND year='".$rev['years']."'");
															$rwQuery = mysql_fetch_array($query);
															$Rtype = $rwQuery['reporttype'];
															if($rwQuery['reporttype']=='APAR Report')
															{
														?>
														<td><input type="checkbox" name="year_list[<?php echo $emppf; ?>][]" value=<?php echo $rev["years"]; ?> ><label style="color:green;">AV[AR]</label></td>
														<?php
															}
															else
															{
														?>
															<td><input type="checkbox" name="year_list[<?php echo $emppf; ?>][]" value="<?php echo $rev["years"]; ?>" ><label style="color:green;">AV[WR]</label></td>
														<?php
															}
														}else
														{
														$sqlreason=mysql_query("select * from tbl_reason where  empcode='$emppf' AND financialyear='$demo_year'");
														$rwReason=mysql_fetch_array($sqlreason);
															
															if(isset($rwReason["reasontype"])!='')
															{
															echo "<td id='tduploadfile$empid'><span>".$rwReason["reasontype"]."</span></td>";
															}else
															{
															echo "<td id='tduploadfile$empid'><span>NA</span></td>";
															
															}
															
														?>
														<?php
														}
													}
													?>
													
												 </tr>
										<?php
										
										}
										?>
										</tbody>
									</table>
								</div>
								
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
	</div>
  
  <script>
  
  //----------------Script-------------------------//

	$(document).ready(function() {
	$('#customdate').hide(); 
	$('#showempdetails').hide(); 
	$('#showcustomedetails').hide(); 
	$("#btnShowReport").hide();
	
$('#txtcategory').change(function(){
	if($('#txtcategory').val() == 'YEAR WISE') 
	{
		
	$('#customdate').show(); 
	$("#txtcategory").val("");
	$('#showcustomedetails').show();
	$("#showempdetails").hide();
	showReport(this);
	
	}else if($('#txtcategory').val() == 'ALL') {
	$('#showempdetails').show(); 
	$('#customdate').hide(); 
	$('#showcustomedetails').hide(); 
	$("#btnShowReport").hide();
	} else
	{
		
	}
	});
	
	$("#btnPrint").click(function(){
		$(".NoPrint").css("display","none");
		$("#btnShowReport").hide();
		$("#btnPrint").hide();
		$('#customdate').hide();
		$('#txtcategory').hide();
		// $('#showcustomedetails').hide();
		// $("#showempdetails").hide();
		window.print();
		$(".NoPrint").css("display","none");
		
		});
		
		
	});
//----------------Script End-------------------------//

	function showReport(sel) 
	{
		var txtstartyear = sel.options[sel.selectedIndex].value;
		//$('#customdate').show();
		//alert(txtstartyear);
		$("#showcustomedetails").html("");
		if (txtstartyear.length > 0 ) 
			{
				$.ajax({
					type: "POST",
					url: "frmfetchreport.php",
					data: "txtstartyear=" + txtstartyear,
					cache: false,
					beforeSend: function() {
						$('#showcustomedetails').html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
					},
					success: function(html) 
					{
						$("#showcustomedetails").html(html);
					}
				});
			}	
	}
	
	//-----------------Department script-------------------//
	
	// function showDeptReport(sel) 
	// {
		// var txtstartyear = sel.options[sel.selectedIndex].value;
		// $('#customdate').show();
		// alert(txtstartyear);
		//$("#showcustomedetails").html("");
		// if (txtstartyear.length > 0 ) 
			// {
				// $.ajax({
					// type: "POST",
					// url: "frmfetchreport.php",
					// data: "txtstartyear=" + txtstartyear,
					// cache: false,
					// beforeSend: function() {
						// $('#showcustomedetails').html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
					// },
					// success: function(html) 
					// {
						// $("#showcustomedetails").html(html);
					// }
				// });
			// }	
	// }
    // }
</script>		
   <?php
 include_once('../global/footer.php');
 ?> 