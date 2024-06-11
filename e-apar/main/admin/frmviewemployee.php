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
	
      <div class="row" style="overflow-y:scroll;">
	<!--div class="box-body" style="padding:50px 50px 50px 50px;"-->
		 <?php
		  if(isset($_GET["emppf"])!='')
		  {
		  $emp_id=$_GET["emppf"];
		 
		 $sqlempedit=mysql_query("select * from tbl_employee where emplcode='".$_GET["emppf"]."'");
		  $rwEmpEdit=mysql_fetch_array($sqlempedit)
		  ?>
		  <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><b><?php echo $rwEmpEdit["empname"]; ?></b> Details...</h3><hr>
            </div>
		 <div class="box-body">
			<form method="get" action="Ajaxaddremark.php" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" >  
			 <label style="font-size:18px;"><u>Basic Details....</u></label>
			<div class="form-group">
						<label class="col-md-2 col-sm-4">Employee Code </label>
						<div class="ccol-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
							<input type="number" class="form-control primary" id="txtempcode" name="txtempcode" value="<?php echo $rwEmpEdit["emplcode"];?>" readonly />
						</div><br>
						</div>
						
						<label class="col-md-2 col-sm-4">Employee Name  </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-font"></i></div>
						<input type="text" class="form-control primary" id="txtempname" name="txtempname" value="<?php echo $rwEmpEdit["empname"];?>" readonly />
						</div><br>
						</div>
			</div>
					
				<div class="form-group">
							<label class="col-md-2 col-sm-4">Department</label>
							<div class="col-md-4 col-sm-4">
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-cubes"></i></div>
								<select class="form-control primary" id="cmbdept" name="cmbdept" readonly>
								<option value="<?php echo $rwEmpEdit["dept"]; ?>"><?php echo $rwEmpEdit["dept"]; ?></option>
								</select>
							</div><br>
							</div>
							
					<label class="col-md-2 col-sm-4">Designation</label>
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
						  <div class="input-group-addon"><i class="fa fa-cube"></i></div>
							<select class="form-control primary" id="cmbdesignation" name="cmbdesignation" readonly>
							<option value="<?php echo $rwEmpEdit["designation"]; ?>"><?php echo $rwEmpEdit["design"]; ?></option>
						
							</select>
						</div><br>
					</div>
				</div>
				
				<div class="form-group">
						<label class="col-md-2 col-sm-4">Station</label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						  <div class="input-group-addon"><i class="fa fa-train"></i></div>
								<select class="form-control primary" id="cmbstation" name="cmbstation" readonly>
									<option value="<?php echo $rwEmpEdit["station"]; ?>"><?php echo $rwEmpEdit["station"]; ?></option>
								</select>
						</div><br>
						</div>
				
						<label class="col-md-2 col-sm-4">Pay Scale </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
							<input type="text" class="form-control primary" id="txtpayscale" name="txtpayscale" value="<?php echo $rwEmpEdit["payscale"];  ?>" readonly />
						</div><br>
						</div>
						
						<label class="col-md-2 col-sm-4">Substantive Gradepay</label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
							<input type="text" class="form-control primary" id="txtsubstantive" name="txtsubstantive"   value="<?php echo $rwEmpEdit["substantive"];  ?>" readonly />
						</div><br>
						</div>
						
						<label class="col-md-2 col-sm-4">Mobile number </label>
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-phone"></i></div>
							<input type="text" class="form-control primary" id="txtsubstantive" name="txtsubstantive"   value="<?php echo $rwEmpEdit["contact"];  ?>" readonly />
						</div><br>
						</div>
				</div>
				<div class="clearfix"></div>
			</div>
		 </div>
				
		  	
				<div class="clearfix"></div>
				<!--hr style="background-color:red;height:4px;width:100%;"-->
						<br><br>
			<div class="box box-info">
            
		 <div class="box-body" style=" overflow-y: scroll;">
				<label style="font-size:18px;"><u>APAR  Details....</u></label>		
				    <table class='table table-striped table-bordered table-hover' id='example' >
                  <thead>
                  <tr>
                    <th>APAR YEAR</th>
                    <th>Name</th>
                    <th>Substantive</th>
                    <th>Integrity</th>
                    <th>Reporting Officer Grading</th>
                    <th>Reviewing  Officer Grading</th>
                    <th>Accepting Authority Grading</th>
                    <!--th>Remark</th>
					<th></th-->
                  </tr>
                  </thead>
				  <?php
				 $sqlempedit=mysql_query("select * from scanned_apr where empid='".$_GET["emppf"]."'");
		  while($rwEmpEdit=mysql_fetch_array($sqlempedit,MYSQL_ASSOC))
			{
					$empfno=$_GET["emppf"];
					$year_E=$rwEmpEdit["year"];
					$remark=$rwEmpEdit["overallremark"];
				
					
				  ?>
					  <tbody>
					  <tr><input type="hidden" name="txtid$empfno" id="txtid$empfno" value="<?php echo $empfno; ?>"/>
					  <td><?php echo 
					  "<input type='hidden' name='txtid$year_E' id='txtid$year_E' value='$empfno'/>
					  
					  <a href='sampleyeardemo.php?emppf=$empfno&year=$year_E' data-toggle='modal' data-target='#myModalImage' role='button' ><input type='text' name='txtyear' id='txtyear' value='".$rwEmpEdit['year']."' style='border:none;' readonly /></a>";?></td>
					  <td><?php echo $rwEmpEdit["empname"];?></td>
					  <td><?php echo $rwEmpEdit["substantive"];?></td>
					  <td><?php echo $rwEmpEdit["integrity"];?></td>
					  <td><?php echo $rwEmpEdit["reportinggrade"];?></td>
					  <td><?php echo $rwEmpEdit["reviewinggrade"];?></td>
					  <td><?php echo $rwEmpEdit["acceptinggrade"];?></td>
					  <!--td>
					  <?php 
							
							if($remark=='')
							{
								echo "<input type='text' class='form-control primary' id='txtremark$year_E' name='txtremark$year_E'/>";
						}else
						{
							echo "<div id='output$year_E'>$remark</div>";
						}
						?>
						</td>
						<td colspan="10">
						<?php echo "<a class='nvalue' id='$year_E' name='$year_E' value='$year_E'><i class='fa fa-check'></i></a>";?>
					  </td-->
					  </tr>
					  </tbody>
					  <?php
			}
			?>
				</table>
				</div>
				</div>
						
						<?php
						}
						?>
				</div><!--Form group close-->
			</form>
			
		</div>
				
			
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
  <script>
  
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
  
</script>		
   <?php
 include_once('../global/footer.php');
 include_once('demo/Modal_Member.php');
 ?> 