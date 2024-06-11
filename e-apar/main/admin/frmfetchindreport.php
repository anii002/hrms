<?php

	include('../dbconfig/dbcon.php');
	dbcon(); 
	
	
$cat_id = ($_REQUEST["txtstartyear"] <> "") ? trim($_REQUEST["txtstartyear"] ) : "";
$emp_id = ($_REQUEST["var1"] <> "") ? trim($_REQUEST["var1"] ) : "";
if ($cat_id <> "")
	{
 
		$cat_id=$_POST["txtstartyear"];
		$emp_id=$_POST["var1"];
	    ?>
		
				<div class="row">
					 <?php
						$sqlempedit=mysql_query("select * from tbl_employee where emplcode='$emp_id'");
						  $rwEmpEdit=mysql_fetch_array($sqlempedit);
						  $empcode=$rwEmpEdit["emplcode"];
					  ?>
						<form method="get" action="Ajaxaddremark.php" id="frmaddemployee" enctype="multipart/form-data" accept="image/jpg,image/png,image/gif,image/jpeg" >  
						 <div class="clearfix"></div>
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
								  <div class="input-group-addon"><i class="fa fa-cube"></i> </div>
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
									
									<label class="col-md-2 col-sm-4">Substantive </label>
									<div class="col-md-4 col-sm-4">
									<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-calculator"></i></div>
										<input type="text" class="form-control primary" id="txtsubstantive" name="txtsubstantive"   value="<?php echo $rwEmpEdit["substantive"];  ?>" readonly />
									</div><br>
									</div>
									
									<label class="col-md-2 col-sm-4">Mobile No </label>
									<div class="col-md-4 col-sm-4">
									<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-phone"></i></div>
										<input type="text" class="form-control primary" id="txtsubstantive" name="txtsubstantive"   value="<?php echo $rwEmpEdit["contact"];  ?>" readonly />
									</div><br>
									</div>
							</div>
							<div class="clearfix"></div>
					</div>
							
						
							<div class="clearfix"></div>
							<!--hr style="background-color:red;height:4px;width:100%;"-->
									<br><br>
						<div class="box box-info" id="divemployee">
								<div class="box-body" style=" overflow-y: scroll;">
									<label style="font-size:18px;"><u>APAR  Details....</u></label>		
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
										$cnt=1;
										
									 
										
										 
									  $sqlempedit=mysql_query("select * from scanned_apr where empid='$emp_id'");
									  while($rwEmpEdit=mysql_fetch_array($sqlempedit,MYSQL_ASSOC))
										{
										if($cnt<=$cat_id)
										{
											$cnt++;
											$empfno=$rwEmpEdit["empid"];
											$year_E=$rwEmpEdit["year"];
											$remark=$rwEmpEdit["overallremark"];
									  ?>
										  <tbody>
											<tr>
												  <input type="hidden" name="txtid$empfno" id="txtid$empfno" value="<?php echo $empfno; ?>"/>
												  <td><?php echo 
												  "<input type='hidden' name='txtid$year_E' id='txtid$year_E' value='$empfno'/>
												  <a href='sampleyeardemo.php?emppf=$empfno&year=$year_E' data-toggle='modal' data-target='#myModalImage' role='button' ><input type='text' name='txtyear' id='txtyear' value='".$rwEmpEdit['year']."' style='border:none;' readonly /></a>";?></td>
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
									  }
										?>
									</table>
								</div>
							</div>
									
									
							</div><!--Form group close-->
							
						</form>
					</div>
					
					
					
     
<?php
//echo "<script>window.location.reload();</script>";
	}
?>