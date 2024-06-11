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
		  <h1> Employee Management </h1> 
		</section>
	
		<!-- Main content -->
		<section class="content"> 
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header">
						  <h3 class="" style="text-align:center; margin-top:0px;"> Report Of Individual Employee </h3> 
						  <hr style="width:100%;background-color:#ddd;height:1px;">
						  <span style="color:red;font-size:18px;"><i class="fa fa-book text-red"></i> Note: Please click the print icon to generate report of specific employee</span>
						  
						</div>
								<!-- /.box-header -->
						<div class="box-body">
							<form action="" method="GET"  enctype="multipart/form-data" role="form" id="frmhelpdesk">
							
								
								
								<div class="clearfix"></div>
								<div class="table-responsive" id="showempdetails" name="showempdetails">
									<table class='table table-striped table-bordered table-hover' id='example'>
											<thead>
													<tr class='odd gradeX'>
														<th style='display:none;'> Employee Code</th>
														<th style=''></th>
														<th> PF No</th>
														<th> Name </th>
														<th> Department </th>
														<th> Designation </th>
														<th> Station </th>
														<th> Pay Scale </th>
														<th> Substantive</th>
														<th> STSC</th>
														<th> Contact</th>
														<th> View Report</th>
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
													<td><?php echo $empname; ?></td>
													<td ><?php echo $dept; ?></td>
													<td><?php echo $design; ?></td>
													<td><?php echo $station; ?></td>
													<td ><?php echo $payscale; ?></td>
													<td><?php echo $rwEmployee["substantive"]; ?></td>
													<td><?php echo $rwEmployee["stsc"]; ?></td>
													<td><?php echo $rwEmployee["contact"]; ?></td>
													<td><?php echo '<a href="frmreport.php?emppf=' . $emppf. '"><i class="fa fa-print"></i></a> '?></td>
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
	$('#showempdetails').show(); 
	
	
	$("#btnPrint").click(function(){
		$(".NoPrint").css("display","none");
		$("#btnPrint").hide();
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
	
	//-----------------print script-------------------//
	
	function printDiv() {    
    var printContents = document.getElementById('Your printable div').innerHTML;
    var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
    }
</script>		
   <?php
 include_once('../global/footer.php');
 ?> 