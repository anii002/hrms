 <?php 
$_GLOBALS['a'] ='pwd';
  include_once('../global/header_update.php');?>
 <!--Bio Tab Start -->
	<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
		<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Present Working Details Update</span>
		</div>
		<div style="border:1px solid #67809f;padding:30px;">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Present Working Details</h3>
			</div>
			<?php 
				dbcon1();
				$pw_exist=0;
				$sql=mysql_query("select * from present_work_temp where preapp_pf_number='".$_SESSION['set_update_pf']."'");
				$sql_fetch=mysql_num_rows($sql);
				if($sql_fetch>=0){
					$pw_exist=1;
				}
				
			?>
			<form method="POST" action="process_main.php?action=update_present_work_detail" id="pre_appo" class="apply_readonly">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="pre_pf_no" name="pre_pf_no" class="form-control form-text TextNumber common_pf_number" readonly   >
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<select class="form-control primary select2" id="preapp_dept" name="preapp_dept" style="margin-top:0px; width:100%;" > 
								<option selected disabled value="">Select Department</option>
									<?php echo $dept;?>
								</select>
							  </div>
							</div>
						</div>
					</div>
					<br>
	<!---------------------------------------------New Code  11-1-2018-------------------------------------------------- -->
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >Weather Employee is officiating in <br>higher grade than substansive grade?</label>
					  <div class="col-md-3 col-sm-8 col-xs-12" style="margin-left:-15px">
						<select name="preapp_subtype1" id="preapp_subtype1" class="form-control bio_all_status select2" style="margin-top:0px; width:100%;"  >
						 
					
						
						<option value="1">Yes</option>
						<option value="2">No</option>
					</select> 
					  </div>
					</div>
				</div>
			</div>
			<br>	
			<div class="row" style="display:none" id="show1">
				<h3>Substantive Grade Details</h3><hr>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation</label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<select class="form-control primary select2" id="preapp_sgd_desig" name="preapp_sgd_desig" style="margin-top:0px; width:100%;" >
								<?php echo $alldesignations;?>
							</select>
						  </div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary ps_type1 ps_type select2" id="sgd_ps_type_2" name="sgd_ps_type_2" style="margin-top:0px; width:100%;">
									<?php echo $pay_scale_type;?>
								</select>
							</div>
						</div>
					</div>
				</div> 
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12 lbl_oth_preapp_sgd_desig" style="display:none;">
						<div class="form-group"><br>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 ">Other Designation<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" class="form-control primary" id="preapp_sgd_other_desig" name="preapp_sgd_other_desig" placeholder="Enter Other Designation" />
							</div>
						</div>
					</div> 						
					<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="level_2">
						<div class="form-group"><br>
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level</label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<select class="form-control primary select2 level_2" id="preapp_sgd_level" name="preapp_sgd_level" style="margin-top:0px; width:100%;">
								<option value="" selected hidden>-- Select Level --</option>
								 
							</select>
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="scale_text_2" style="display:none;">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 ">Scale</label>
							<div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" class="form-control primary scale_text_2" id="preapp_sgd_scale_text" name="preapp_sgd_scale_text" placeholder="Enter 3rd Pay Rate" >
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="scale_2">
						<div class="form-group"><br>
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
							<div class="col-md-8 col-sm-8 col-xs-12" >
								<select class="form-control primary select2 scale_2" id="preapp_sgd_scale" name="preapp_sgd_scale" style="margin-top:0px; width:100%;" >
								</select>
							</div>
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="hidden" name="depot_bill_unit2" id="depot_bill_unit2">
								<input type="text" class="form-control primary bill_unit" id="billunit2" name="billunit2" data-toggle="modal" data-target="#bill_unit_select" readonly >
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" class="form-control primary depot" id="depot2" name="depot2" readonly>
							</div>
						</div>
					</div>
					
				</div><br>
			 <div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station <a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
						  <input type="hidden" id="station_id4" name="station_id4" class="other">
							<input type="text" class="form-control primary station" id="station4" name="station4"    data-toggle="modal" data-target="#station" readonly>
					
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<select class="form-control primary select2" id="sgd_preapp_group" name="sgd_preapp_group" style="margin-top:0px; width:100%;"  >
								<option value="" selected hidden disabled>-- Select Group --</option>
								<?php echo $group;?>
							</select>
						  </div>
						</div>
					</div>
				</div><br>
				<h3>Officiating Grade Details</h3>		
				<hr></hr>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation</label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<select class="form-control primary select2" id="preapp_ogd_desig" name="preapp_ogd_desig" style="margin-top:0px; width:100%;" >
								<?php echo $alldesignations;?>
							</select>
						  </div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary ps_type2 ps_type select2" id="ogd_ps_type_3" name="ogd_ps_type_2" style="margin-top:0px; width:100%;" >
									<?php echo $pay_scale_type;?>
								</select>
							</div>
						</div>
					</div>
				</div> 
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12 lbl_oth_preapp_ogd_desig" style="display:none;">
						<div class="form-group"><br>
							<label class="control-label col-md-4 col-sm-3 col-xs-12 ">Other Designation<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" class="form-control primary" id="preapp_ogd_other_desig" name="preapp_other_desig" placeholder="Enter Other Designation" />
							</div>
						</div>
					</div> 						
					<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="level_3">
						<div class="form-group"><br>
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary select2 level_3" id="preapp_ogd_level" name="preapp_ogd_level" style="margin-top:0px; width:100%;" >
									<option value="" selected hidden disabled>-- Select Level --</option>
								</select>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-12 col-xs-12" id="scale_text_3" style='display:none;'>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12">Scale</label>
							<div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" class="form-control primary scale_text_3" id="preapp_ogd_scale_text" name="preapp_ogd_scale_text" placeholder="Enter 3rd Pay Rate" >
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="scale_3">
						<div class="form-group"><br>
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
							<div class="col-md-8 col-sm-8 col-xs-12" >
								<select class="form-control primary select2 scale_3" id="preapp_ogd_scale" name="preapp_ogd_scale" style="margin-top:0px; width:100%;" >
								</select>
							</div>
						</div>
					</div>
				</div><br>
				 <div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<input type="hidden" name="depot_bill_unit4" id="depot_bill_unit4">
							  <input type="text" class="form-control primary bill_unit" id="billunit4" name="billunit4"    data-toggle="modal" data-target="#bill_unit_select" readonly>
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace</label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" class="form-control primary depot" id="depot4" name="depot4"    readonly>
						  </div>
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station <a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
						  <input type="hidden" id="station_id5" name="station_id5" class="other">
							<input type="text" class="form-control primary station" id="station5" name="station5"    data-toggle="modal" data-target="#station" readonly>
					
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<select class="form-control primary select2" id="preapp_ogd_group" name="preapp_ogd_group" style="margin-top:0px; width:100%;" >
								<?php echo $group;?>
							</select>
						  </div>
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							  <input type="text" class="form-control primary onlyNumber" id="preapp_ogd_rop" name="preapp_ogd_rop"   placeholder="Enter ROP" />
						  </div>
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-2 ">Remarks</label>
						  <div class="col-md-10">
							 <textarea  rows="4" style="resize:none" class="form-control primary description" id="pwd1_remark" name="pwd1_remark"  placeholder="Enter Remarks" ></textarea>
						  </div>
						</div>
					</div>	
				</div>	
			</div>
					<div class="row" id="pwd">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation</label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary select2" id="preapp_desig" name="preapp_desig" style="margin-top:0px; width:100%;" >
									<option value="" selected disabled>Select Designation</option>
									<?php echo $alldesignations;?>
								</select>
							  </div>
							</div>
						</div>
						<br>
						<div class="col-md-6 col-sm-12 col-xs-12" id="">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary ps_type select2" id="ps_type_4" name="ps_type_2" style="margin-top:0px; width:100%;"  >
										<option value="" selected disabled>Select Pay Scale Type</option>
										<?php echo $pay_scale_type;?>
									</select>
								</div>
							</div>
						</div>
					</div> 
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12 lbl_oth_predesig" Style="display:none">
								<div class="form-group"><br>
								<label class="control-label col-md-4 col-sm-3 col-xs-12 ">Other Designation<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary" id="preapp_other_desig" name="preapp_other_desig" placeholder="Enter Other Designation" />
									</div>
								</div>
							</div> 						
							<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="level_4">
								<div class="form-group"><br>
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary select2 level_4" id="preapp_level" name="preapp_level" style="margin-top:0px; width:100%;">
										<option value="blank" selected></option>
									</select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12" style="display:none;" id="scale_4">
								<div class="form-group"><br>
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2 scale_4" id="preapp_scale" name="preapp_scale" style="margin-top:0px; width:100%;">
									<option value="blank" selected></option> 
									</select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12" id="scale_text_4" style='display:none;'>
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Scale</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary scale_text_4 ps_3" id="preapp_scale_text" name="preapp_scale_text" placeholder="Enter 3rd Pay Rate" />
									</div>
								</div><br><br>
							</div>	
						</div><br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="hidden" name="depot_bill_unit1" id="depot_bill_unit1">
									  <input type="text" class="form-control primary bill_unit readonly" id="billunit1" name="billunit1"    data-toggle="modal" data-target="#bill_unit_select" >
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depot1" name="depot1" readonly>
								  </div>
                                </div>
						    </div>
							
						</div><br>
					 <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station <a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_id6" name="station_id6" class="other">
									<input type="text" class="form-control primary station readonly" id="station6" name="station6"  data-toggle="modal" data-target="#station"  >
							
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary select2" id="preapp_group" name="preapp_group" style="margin-top:0px; width:100%;"  >
											<option value=""disabled  selected>Select Group</option>
											<option value="blank" ></option>
											<?php echo $group;?>
										</select>
									</div>
                                </div>
						    </div>
						</div><br>
			  	        <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<a href="#"data-toggle="modal" data-target="#myModal"style="color:blue">&nbsp;&nbsp;&nbsp;</a></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="preapp_rop" name="preapp_rop"   placeholder="Enter ROP"   />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-2 ">Remarks</label>
								  <div class="col-md-10">
									 <textarea  rows="4" style="resize:none" class="form-control primary description" id="pwd_remark" name="pwd_remark"  placeholder="Enter Remarks" ></textarea>
								  </div>
								</div>
							</div>
						</div><br>
						</div>
<!---------------------------------------------- New Code End 11-1-2018 ---------------------------------------------->
				<div class="form-group">
					<div class="col-sm-2 col-xs-12 pull-right">
						<input type="hidden" id="txtsession" name="txtsession"  class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>"/>
						<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" style="display:none;">
						<input type="submit" id="btn_update" name="btn_update" value="Update"  class="btn btn-success" style="display:none;">
						<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" >
						<br>
					</div>
				</div>
					
            </div>
			</form>
		</div>
	</div>
		        <!--Present Appointment Tab End -->
				<?php include('modal_js_header.php');?>
				<script>
    $(".readonly").keydown(function(e){
        e.preventDefault();
    });
</script>
<script type="text/javascript">

	var pw_exist=<?php echo $pw_exist;?>;
	if(pw_exist>0){
		$("#btn_update").show();
		$("#btnSave").hide();
		
		// fetch present work
		var pre_pf=$("#pre_pf_no").val();
	
			$.ajax({
				type:"POST",
				url:"process.php",
				data:"action=fetch_present_work&pre_pf="+pre_pf,
				success:function(data){
	
					var html = JSON.parse(data);
					 $("#preapp_dept").html(html['preapp_department']);
					  
					$("#preapp_sgd_desig").html(html['sgd_designation']);
					$("#preapp_desig").html(html['preapp_designation']);
					$("#preapp_otherstation").val(html['pre_otherdesign']);
					$("#ps_type_4").html(html['ps_type']);
					if(html['ps_type_a']=='1')
					{
						$("#scale_text_4").show();
						$("#preapp_scale_text").val(html['preapp_scale']);
						$("#level_4").hide();
						$("#scale_4").hide();
					}else if( html['ps_type_a']=='2' || html['ps_type_a']=='3' || html['ps_type_a']=='4'){
						$("#level_4").hide();
						$("#scale_4").show();
					}
					else
					{
						$("#scale_4").hide();
						$("#level_4").show();
					} 
					$("#preapp_scale").html(html['preapp_scale']);
					$("#preapp_group").html(html['preapp_group']);
					$("#station6").val(html['preapp_station']);
					$("#station_id6").val(html['preapp_station']);
					$("#preapp_level").append(html['preapp_level']);
					$("#billunit1").val(html['preapp_billunit']);
					$("#depot_bill_unit1").val(html['preapp_billunit_id']);
					$("#depot1").val(html['preapp_depot']);
					$("#preapp_rop").val(html['preapp_rop']);
					$("#preapp_subtype1").val(html['sgd_dropdwn']);
					if(html['sgd_dropdwn']=='1')
					{	
						$("#show1").show();
						$("#show2").show();
						$("#pwd").hide();
						var val="Yes";
						$("#preapp_subtype1").html("<option value='1' selected>"+val+"</option><option value='2'>No</option>");
						
						$("#preapp_desig").val("");
						$("#preapp_desig").val('blank').trigger('change');
						$("#ps_type_4").val("");
						$("#preapp_otherstation").val("");
						 
						$("#preapp_level").val('blank').trigger('change');
						$("#preapp_scale").val('blank').trigger('change');				
									 
						$("#depot_bill_unit1").val("");			
						$("#billunit1").val("");
						
						$("#station_id6").val("");
						$("#station6").val("");
						
						$("#preapp_rop").val("");	
						$("#preapp_group").val("");
						
						$("#sgd_ps_type_2").val(""); 
						
						$("#sgd_depot_bill_unit1").val(""); 
						$("#depot1").val(""); 
						$("#station_id4").val(""); 
						
						$("#sgd_preapp_group").val(""); 
						
						$("#preapp_ogd_desig").val(""); 
						$("#ogd_ps_type_2").val(""); 
						$("#ogd_depot_bill_unit1").val(""); 
						$("#station_id5").val(""); 
						$("#ogd_preapp_group").val("");
						$("#preapp_ogd_rop").val("");

						}
					else {
							 
						$("#show1").hide();
						$("#show2").hide();
						$("#pwd").show();
						var val="No";
						$("#preapp_subtype1").html("<option value='2' selected>"+val+"</option><option value='1'>Yes</option>");
											
						
						$("#sgd_ps_type_2").val(""); 
						$("#preapp_sgd_other_desig").val(""); 
						$("#preapp_sgd_level").val(""); 
						$("#preapp_sgd_scale").val(""); 
						$("#depot_bill_unit2").val(""); 
						$("#station_id4").val(""); 
						$("#sgd_preapp_group").val(""); 
						$("#billunit2").val(""); 
						$("#depot2").val(""); 
						$("#station4").val("");
					
						
						$("#preapp_ogd_desig").val(""); 
						$("#ogd_ps_type_2").val(""); 
						$("#preapp_ogd_other_desig").val(""); 
						$("#preapp_ogd_level").val(""); 
						$("#preapp_ogd_scale").val(""); 
						$("#depot_bill_unit3").val(""); 
						$("#station_id5").val(""); 
						$("#ogd_preapp_group").val("");
						$("#preapp_ogd_rop").val("");
						$("#billunit3").val(""); 
						$("#depot3").val(""); 
						$("#station5").val(""); 
													
					}
					
					$("#preapp_sgd_other_desig").val(html['presgd_otherdesign']);
					$("#sgd_ps_type_2").html(html['sgd_pst']);
					if(html['sgd_pst_a']=='1'){
						
						$("#preapp_sgd_scale_text").val(html['sgd_scale']);
						$("#scale_text_2").show();
						$("#level_2").hide();
						$("#scale_2").hide();
					}
					else if(html['sgd_pst_a']=='2' || html['sgd_pst_a']=='3' || html['sgd_pst_a']=='4')
					{
						$("#level_2").hide();
						$("#scale_2").show();
					}
					else
					{
						$("#scale_2").hide();
						$("#level_2").show();
					} 
					$("#preapp_sgd_scale").html(html['sgd_scale']);
					$("#preapp_sgd_level").html(html['sgd_level']);
					$("#billunit2").val(html['sgd_billunit']);
					$("#depot_bill_unit2").val(html['sgd_billunit_id']);
					$("#depot2").val(html['sgd_depot']);
					$("#station4").val(html['sgd_station']);
					$("#station_id4").val(html['sgd_station']);
					$("#sgd_preapp_group").html(html['sgd_group']);
					$("#preapp_ogd_desig").html(html['ogd_desig']);
					$("#preapp_ogd_other_desig").val(html['preogd_otherdesign']);
					$("#ogd_ps_type_3").html(html['ogd_pst']);
					if(html['ogd_pst_a']=='1')
					{
						$("#preapp_ogd_scale_text").val(html['ogd_scale']);
						$("#scale_text_3").show();
						$("#level_3").hide();
						$("#scale_3").hide();
					}
					else if(html['ogd_pst_a']=='2' || html['ogd_pst_a']=='3' || html['ogd_pst_a']=='4')
					{
						$("#level_3").hide();
						$("#scale_3").show();
					}
					else
					{
						$("#scale_3").hide();
						$("#level_3").show();
					} 
					$("#preapp_ogd_scale").html(html['ogd_scale']);
					$("#preapp_ogd_level").html(html['ogd_level']);
					$("#billunit4").val(html['ogd_billunit']);
					$("#depot_bill_unit4").val(html['ogd_billunit_id']);
					$("#depot4").val(html['ogd_depot']);
					$("#station5").val(html['ogd_station']);
					$("#station_id5").val(html['ogd_station']);
					$("#preapp_ogd_group").html(html['ogd_group']);
					$("#preapp_ogd_rop").val(html['ogd_rop']);
					$("#pwd1_remark").text(html['pre_remarky']);
					$("#pwd_remark").text(html['pre_remarkn']);	 
						 
				}
			});
		
	}else{
		$("#btnSave").show();
		$("#btn_update").hide();
	}
</script>
 <script>
 $(document).on('change','#preapp_subtype1',function(){
	
	 
 });
 
 
                $(document).on('change','#preapp_subtype1', function () {
			if (this.value == '1') {
					$("#show1").show();
					$("#show2").show();
					$("#pwd").hide();
			
					//$("#preapp_desig").html("<?php //echo $alldesignations?>");
					$("#preapp_desig").val('blank').trigger('change');
					$("#ps_type_4").html("<?php echo $pay_scale_type?>");
					$("#preapp_otherstation").val("");
					 
					$("#preapp_level").val('blank').trigger('change');
					$("#preapp_scale").val('blank').trigger('change');				
								 
					$("#depot_bill_unit1").val("");			
					$("#billunit1").val("");
					
					$("#station_id6").val("");
					$("#station6").val("");
					
					$("#preapp_rop").val("");	
					$("#preapp_group").html("<?php echo $group?>");
					
					$("#preapp_sgd_desig").val('blank').trigger('change');
					$("#sgd_ps_type_2").html("<?php echo $pay_scale_type?>"); 
					
					$("#sgd_depot_bill_unit1").val(""); 
					$("#depot1").val(""); 
					$("#station_id4").val(""); 
					
					$("#sgd_preapp_group").html("<?php echo $group?>");
					
					$("#preapp_ogd_desig").val('blank').trigger('change');
					$("#ogd_ps_type_3").val('blank').trigger('change'); 
					$("#ogd_depot_bill_unit1").val(""); 
					$("#station_id5").val(""); 
					$("#ogd_preapp_group").html("<?php echo $group?>");
					$("#preapp_ogd_rop").val("");
					$("#billunit4").val("");
					$("#depot4").val("");
					$("#depot_bill_unit4").val("");
					$("#preapp_ogd_group").html("<?php echo $group?>");
					$("#pwd1_remark").text("");
					$("#preapp_sgd_level").html(""); 
						//$('#preapp_sgd_desig').attr('required',false);						
					      //  $('#ps_type_2').attr('required',false);	
					
				}
				else {
					 
					$("#show1").hide();
					$("#show2").hide();
					$("#pwd").show();
					 
					$("#sgd_ps_type_2").html("<?php echo $pay_scale_type?>"); 
					$("#preapp_sgd_other_desig").val(""); 
					$("#preapp_sgd_level").html(""); 
					$("#preapp_sgd_scale").html(""); 
					$("#depot_bill_unit2").val(""); 
					$("#station_id4").val(""); 
					$("#sgd_preapp_group").html(""); 
					$("#billunit2").val(""); 
					$("#depot2").val(""); 
					$("#station4").val("");
				
					$("#preapp_ogd_desig").val('blank').trigger('change');
					$("#ogd_ps_type_3").html("<?php echo $pay_scale_type?>"); 
					$("#preapp_ogd_other_desig").val(""); 
					$("#preapp_ogd_level").html(""); 
					$("#preapp_ogd_scale").html(""); 
					$("#depot_bill_unit3").val(""); 
					$("#station_id5").val(""); 
					$("#ogd_preapp_group").html("");
					$("#preapp_ogd_rop").val("");
					$("#billunit3").val(""); 
					$("#depot3").val(""); 
					$("#station5").val(""); 
											
					//$('#preapp_sgd_desig').attr('required',true);						
					//$('#ps_type_2').attr('required',true);						
									
				}
			});
 </script>
<?php
	 if(isset($_SESSION['set_update_pf']))
	{
		echo "<script>$('.common_pf_number').val('".$_SESSION['set_update_pf']."'); </script>";
		//echo "<script>alert('".$_SESSION['same_pf_no']."'); </script>";
	} 
?>						
<script>
$(document).ready(function(){
	
	$("#app_desig").change( function(){
	var x = $(this).val();
	if(x == '2029'){	
		  $(".lbl_oth1").show();
          
	}else{
		 $(".lbl_oth1").hide();
	}	
});	
$(".lbl_reg").show();
$("#preapp_desig").change( function(){
	var x = $(this).val();
	if(x == '2029'){	
		  $(".lbl_oth_predesig").show();
          
	}else{
		 $(".lbl_oth_predesig").hide();
	}	
});
$("#preapp_sgd_desig").change( function(){
	var x = $(this).val();
	if(x == '2029'){	
		  $(".lbl_oth_preapp_sgd_desig").show();
          
	}else{
		 $(".lbl_oth_preapp_sgd_desig").hide();
	}	
});
$("#preapp_ogd_desig").change( function(){
	var x = $(this).val();
	if(x == '2029'){	
		  $(".lbl_oth_preapp_ogd_desig").show();
          
	}else{
		 $(".lbl_oth_preapp_ogd_desig").hide();
	}	
});
});
</script>
<?php include_once('../global/footer.php');?>  
