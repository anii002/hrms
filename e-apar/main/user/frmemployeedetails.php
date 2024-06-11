<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://drmpsur-hrms.in/e-apar/index.php';</script>";
 }
include_once('../global/header.php');
include_once('../global/topbaremployee.php');
include_once('../global/sidebaremployee.php');

?>
<!--link rel="stylesheet" href="style.css" media="screen"/-->
 <script>

</script> 
<style>
	
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
    	        <!--div class="box-body" style="padding:50px 50px 50px 50px;"-->
        		 <?php
            		$empcode = $_SESSION['EMP_PF_NO'];
            		// echo $empcode;  
        		    $sqlempedit=mysql_query("select * from tbl_employee where emplcode='$empcode'");
        		    $rwEmpEdit=mysql_fetch_array($sqlempedit);
        		    $empcode=$rwEmpEdit["emplcode"];
        		  ?>
    		    <div class="box box-info">
                    <!--<div class="box-header">-->
                    <!--    <h3 class="box-title"> <b><?php echo $rwEmpEdit["empname"]; ?></b> Details</h3><hr>-->
                    <!--</div>  -->
                    <div class="box-header">
                        <h3 class="box-title">Basic Details</h3>
                    </div>
		            <div class="box-body" id="empbasic" name="empbasic">
			            <form method="get" action="Ajaxaddremark.php" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" >  
			                <div class="clearfix"></div>
			                <!--<label style="font-size:18px;">Basic Details</label>-->
			                <div class="row">
			                    <div class="col-md-3">
			                        <div class="form-group">
			                            <label class="">Employee Code </label>
                						<div class="input-group">
                    						<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
                							<input type="number" class="form-control primary" id="txtempcode" name="txtempcode" value="<?php echo $rwEmpEdit["emplcode"];?>" readonly />
                						</div>
			                        </div>
			                    </div>
			                    <div class="col-md-3">
			                        <div class="form-group">
			                            <label class="">Employee Name  </label>
                						<div class="input-group">
                						    <div class="input-group-addon"><i class="fa fa-font"></i></div>
                						    <input type="text" class="form-control primary" id="txtempname" name="txtempname" value="<?php echo $rwEmpEdit["empname"];?>" readonly />
                						</div>
			                        </div>
			                    </div>
			                    <div class="col-md-3">
			                        <div class="form-group">
			                            <label class="">Department</label>
                						<div class="input-group">
                						    <div class="input-group-addon"><i class="fa fa-cubes"></i></div>
                							<select class="form-control primary" id="cmbdept" name="cmbdept" readonly>
                							    <option value="<?php echo $rwEmpEdit["dept"]; ?>"><?php echo $rwEmpEdit["dept"]; ?></option>
                							</select>
                						</div>
		                            </div>
	                            </div>
	                            <div class="col-md-3">
			                        <div class="form-group">
			                            <label class="">Designation</label>
                    					<div class="input-group">
                    					<div class="input-group-addon"><i class="fa fa-cube"></i></div>
                    						<select class="form-control primary" id="cmbdesignation" name="cmbdesignation" readonly>
                    						    <option value="<?php echo $rwEmpEdit["designation"]; ?>"><?php echo $rwEmpEdit["design"]; ?></option>
                    						</select>
                    					</div>
			                        </div>
		                        </div>
			                </div>
			                <div class="row">
		                        <div class="col-md-3">
			                        <div class="form-group">
			                            <label class="">Station</label>
                						<div class="input-group">
                						    <div class="input-group-addon"><i class="fa fa-train"></i></div>
            								<select class="form-control primary" id="cmbstation" name="cmbstation" readonly>
            									<option value="<?php echo $rwEmpEdit["station"]; ?>"><?php echo $rwEmpEdit["station"]; ?></option>
            								</select>
                						</div>
			                        </div>
		                        </div>
		                        <div class="col-md-3">
			                        <div class="form-group">
			                            <label class="">Pay Scale </label>
                						<div class="input-group">
                						    <div class="input-group-addon"><i class="fa fa-calculator"></i></div>
                							<input type="text" class="form-control primary" id="txtpayscale" name="txtpayscale" value="<?php echo $rwEmpEdit["payscale"];  ?>" readonly />
                						</div>
		                            </div>
	                            </div>
	                            <div class="col-md-3">
			                        <div class="form-group">
		                                <label class="">Substantive </label>
                						<div class="input-group">
                						    <div class="input-group-addon"><i class="fa fa-calculator"></i></div>
                							<input type="text" class="form-control primary" id="txtsubstantive" name="txtsubstantive"   value="<?php echo $rwEmpEdit["substantive"];  ?>" readonly />
                						</div>
		                            </div>
	                            </div>
	                            <div class="col-md-3">
			                        <div class="form-group">
    		                            <label class="">Mobile number </label>
                						<div class="input-group">
                						    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                							<input type="text" class="form-control primary" id="txtsubstantive" name="txtsubstantive"   value="<?php echo $rwEmpEdit["contact"];  ?>" readonly />
                						</div>
		                            </div>
	                            </div>
	                        </div>
				            <div class="clearfix"></div>
			            </div>
		            </div>
    				
				    <div class="clearfix"></div>
				    <!--hr style="background-color:red;height:4px;width:100%;"-->
					<br>
			        <div class="box box-info" id="divemployee">
			            <div class="box-header">
                            <h3 class="box-title">APAR Details</h3>
                        </div>
    					<div class="box-body">
    						<!--<label style="font-size:18px;"><u>APAR  Details....</u></label>		-->
    						<table class='table table-striped table-bordered table-hover' id='example' >
    						    <thead>
        						    <tr>
            							<th>APAR YEAR</th>
            							<th>Name</th>
            							<th>Department</th>
            							<th>Designation</th>
            							<th>Integrity</th>
            							<th>Reporting Officer Grading</th>
            							<th>Reviewing  Officer Grading</th>
            							<th>Accepting Authority Grading</th>
            							<th>Remark</th> 
        						    </tr>
    						    </thead>
        						  <?php
        						  $sqlempedit=mysql_query("select * from scanned_apr where empid='$empcode'");
        						  while($rwEmpEdit=mysql_fetch_array($sqlempedit,MYSQL_ASSOC))
        							{
        								$empfno=$rwEmpEdit["empid"];
        								$year_E=$rwEmpEdit["year"];
        								$remark=$rwEmpEdit["overallremark"];
        						  ?>
							    <tbody>
								    <tr>
									    <input type="hidden" name="txtid$empfno" id="txtid$empfno" value="<?php echo $empfno; ?>"/>
									      <td>
    									  <?php echo 
    									  "<input type='hidden' name='txtid$year_E' id='txtid$year_E' value='$empfno'/>
    									  <a href='sampleyeardemo.php?emppf=$empfno&year=$year_E' data-toggle='modal' data-target='#myModalImage' role='button' >".$rwEmpEdit["year"]."</a>";?>
    									  </td>
    									  <td><?php echo $rwEmpEdit["empname"];?></td>
    									  <td><?php echo $rwEmpEdit["dept"];?></td>
    									  <td><?php echo $rwEmpEdit["designation"];?></td>
    									  <td><?php echo $rwEmpEdit["integrity"];?></td>
    									  <td><?php echo $rwEmpEdit["reportinggrade"];?></td>
    									  <td><?php echo $rwEmpEdit["reviewinggrade"];?></td>
    									  <td><?php echo $rwEmpEdit["acceptinggrade"];?></td>
    									  <td><?php echo $rwEmpEdit["overallremark"];?></td>
								    </tr>
							    </tbody>
    							<?php
    							}
    							?>
						    </table>
					    </div>
				    </div> 
				</div><!--Form group close-->
			</form> 
		</div>
		<!--Modal Code For APAR YEAR START-->
		<div class="modal fade" id="myModalAPAR" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="example-modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color: rgba(221, 75, 57, 0.48);">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true" ><b>×</b></span></button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> New User Registration</h4>
					<hr style="width:100%;background-color:red;height:2px;">
					</div>
			<form method="post" id="frmadduser" action="ajaxaddusers.php" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg">
					<div class="modal-body" style="overflow-y: scroll;">
					
						<div class="form-group">
						<?php
					if(isset($_GET["year_E"]))
					{
					$getempcode=$_GET["year_E"];
					echo $getempcode."Hello ";
					}
					?>
							<label class="col-md-4">User Full Name :</label>
							<div class="col-md-8">
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-font"></i></div>
								<input type="text" class="form-control primary" id="txtuserfullname" name="txtuserfullname" placeholder="Enter Full Name"  />
							</div><br>
							</div>
						
								<div class="clearfix"></div>
						</div>
					</div>
			</form>
				
				<!-- /.modal-content -->
			</div>
		</div>
	</div>
	   <!--END ADMIN MODAL SETTINGS -->
	</div>
				<!--Modal Code For APAR YEAR END-->
				
			
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
  <script>
 
 //----------------Script-------------------------//

	$(document).ready(function() 
	{
		$('#divemployee').show(); 
		$('#divparticular').hide(); 
		$('#empbasic').show(); 
		$('#customdate').hide(); 
		$('#divcategory').show(); 
		$('#showcustomedetails').hide();
		//alert($('#selyear').val());
		
		$('#selyear').change(function()
		{
			if($('#selyear').val() == '1') 
			{
				
				$('#empbasic').show();	
				$('#divemployee').show();
				//$("#divcategory").val("");
				$('#customdate').hide();
				$('#outputparticular').hide();
				$('#divparticular').hide(); 
				$('#showcustomedetails').hide();
			
			}else if($('#selyear').val() == '2') 
		{
			
			$('#divemployee').hide(); 
			$('#divparticular').show(); 
			$("#divcategory").val("");
			$('#empbasic').hide(); 
			$('#divcategory').show(); 
			$('#outputparticular').show();
			$('#customdate').hide();
			$('#showcustomedetails').hide();
			
			
		} else if($('#selyear').val() == '3')
		{
			
			$('#divemployee').hide(); 
			$("#divcategory").val("");
			$('#divparticular').hide(); 
			$('#empbasic').hide(); 
			$('#divcategory').show(); 
			$('#outputparticular').hide();
			$('#showcustomedetails').show();
			$('#customdate').show();
			
		}
		else
		{
			alert('Please selecte any category..........!')
		}
		});
	});
	
	
	//----- --------------Script End -------------//
  $(document).ready(function () 
{	
	$(".nvalue").click(function()
	{
		
		id=$(this).attr('id');
		var nvalue1=document.getElementById("txtremark"+id).value;
		var v1=document.getElementById("txtid"+id).value;
			{
				$.ajax({
					type: "POST",
					url: "Ajaxaddremark.php",
					data: "nvalue1=" + nvalue1+"&v1="+ v1+"&id="+id,
					cache: false,
					beforeSend: function() {
						$('#output'+id).html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
					},
					success: function(html) 
					{
						$("#output"+id).html(html);
						$("#txtremark"+id).hide();
						window.location.reload();
					}
				});
			}
			
  });
	
	
});  


//--------------------------Select Particular Year---------------//
function showParticularReport(sel) 
	{
		var selyear = sel.options[sel.selectedIndex].value;
		var var1=document.getElementById("txtempcode").value;
		$("#outputparticular").html("");
		if (selyear.length > 0 ) 
			{
				$.ajax({
					type: "POST",
					url: "frmfetchindividual.php",
					data: "selyear=" + selyear+"&var1="+var1,
					cache: false,
					beforeSend: function() {
						$('#outputparticular').html('<img src="../resources/loader.gif" alt="" width="24" height="24">');
					},
					success: function(html) 
					{
						$("#outputparticular").html(html);
						
						
					}
				});
			}	
	}
  //----------End-----------------//
  function showReport(sel) 
	{
		var txtstartyear = sel.options[sel.selectedIndex].value;
		var var1=document.getElementById("txtempcode").value;
		//$('#customdate').show();
		//alert(var1);
		$("#showcustomedetails").html("");
		if (txtstartyear.length > 0 ) 
			{
				$.ajax({
					type: "POST",
					url: "frmfetchindreport.php",
					data: "txtstartyear=" + txtstartyear+"&var1="+var1,
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
  
  
</script>		
   <?php
 include_once('../global/footer.php');
  include_once('demo/Modal_Member.php');
 ?> 