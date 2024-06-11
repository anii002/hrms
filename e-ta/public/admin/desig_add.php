<?php 
$_GLOBALS['a'] ='biodata';
  include_once('../global/header_update.php');
  
	include('create_log.php');
  
	$action="Visited Biodata page";
	$action_on=$_SESSION['set_update_pf'];
	create_log($action,$action_on);
  ?>

<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
			<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp; User Managment</span>
			</div>
			<div style="border:1px solid #67809f;padding:30px;">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp; ADD Role	</h3>
				</div><br>

				
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group ifsc">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" >Department</label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary select2" id="preapp_dept" name="preapp_dept" style="margin-top:0px; width:100%;" > 
									<option selected disabled value="">Select Department</option>
										<?php echo $dept;?>
									</select>							
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group ifsc">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" >Designation</label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary select2" id="preapp_sgd_desig" name="preapp_sgd_desig" style="margin-top:0px; width:100%;" >
								<option selected disabled value="">Select Designation</option>
									<?php echo $alldesignations;?>
								</select>							
							  </div>
							</div>
						</div>
				</div>
				<hr>
				
				<br>
				
				<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<table width="100%" border="1" style="" >
									<tr style="text-align:center;font-size:14px;font-weight:800">
										<td width="33.33%">Basic Operation</td>
										<td width="33.33%">Master Forms</td>
										<td width="33.33%">Reports</td>
									</tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px" width="50%">BIO DATA</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td><td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px" width="50%">DEPARTMENT</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td><td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px" width="50%">BIO DATA</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
										
									</tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px" width="50%">MEDICAL</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td><td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">INCERMENT TYPE</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td><td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px" width="50%">BIO DATA</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
										
									</tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px" width="50%"  >INITIAL APPOINTMENT</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td><td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">PROPEERTY SOURCE</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td><td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">BIO DATA</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
										
									</tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">Present Working Details</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td><td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">AWARDS</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td><td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">BIO DATA</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
										
									</tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">PROMOTION</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td><td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">PROPEERTY ITEM MOVEABLE</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td><td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">BIO DATA</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
										
									</tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">REVERSION</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td><td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">PROPEERTY ITEM IMMOVEABLE</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td><td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">BIO DATA</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
										
									</tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">TRANSFER</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">COMMUNITY</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">BIO DATA</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
										
									</tr>
									<tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">FIXATION</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">RELIGION</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>	
									</tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">INCERMENT</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">RECRUITMENT</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">PENALTY</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">AWARDS</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">FAMILY COMPOSITION</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">NOMINATION</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
									</tr><tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">ADVANCE</td>




												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
									</tr><tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">PROPERTY</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
									</tr><tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">TRAINING</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">LAST ENTRY</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td>
										<table width="100%" >
											<tr style="text-align:left;">
												<td style="padding-left:50px"width="50%">SCAN DOCUMENT UPLOAD	</td>
												<td width="20%"><input type="checkbox"></td>
											</tr>
										</table>
										</td>
									</tr>
								</table>							
							</div>
							
					
			</div>
				
			<br>
			<div class="col-sm-2 col-xs-12 pull-right">
			<center>
						 <button  type="submit"  class="btn btn-primary source" name="bio_saveBtn" id="bio_saveBtn">Save</button>
						  <button  type="submit" class="btn btn-danger source" name="bio_updateBTN" id="bio_updateBTN">Cancel</button>
						 <button type="button" class="btn btn-danger"  style="display:none;" data-dismiss="modal">Close</button>
					</div>
					</center>
					<br>
				
				
				
			</div>
</div>
<?php include_once('../global/footer.php');?>  