<!--Appointment Tab Start -->
<?php 
$_GLOBALS['a'] = 'initial';
 include_once('../global/header1.php');
 ?>
<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
			<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp; INITIAL APPOINTMENT</span>
					</div>
					<div style="border:1px solid #67809f;padding:30px;">
			<?php
				$ini_exist=0;
				if(isset($_SESSION['same_pf_no']))
				{	
					dbcon1();
					$sql=mysql_query("select * from appointment_temp where app_pf_number='".$_SESSION['same_pf_no']."'");
					//echo "select * from biodata_temp where pf_number='".$_SESSION['same_pf_no']."'".mysql_error();
					$result=mysql_num_rows($sql);
					
					if($result>0)
					{
						$ini_exist=1;
					}
				}
			?>
			<form method="post" action="process_main.php?action=add_appointment" class="apply_readonly" id="initial_app_form">
			
			<div class="modal-body">
				<div class="row">
					 
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number<span class=""></span></label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12">
							 <input type="text" class="form-control primary TextNumber common_pf_number" id="app_pf_no" name="app_pf_no" readonly required/>
						  </div>
						  <div class="col-md-1 col-sm-8 col-xs-12">
							 <!--label><i class="fa fa-check" aria-hidden="true" style="color:green"></i></label--> 
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Type of Initial Appointment</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control select2" id="initial_type" name="initial_type"  required style="width: 100%;">
									<option value="" selected hidden disabled>-- Select Initial Appointment --</option>
									<?php
									dbcon();
									$sqlDept=mysql_query("select * from appointment_type");
									while($rwDept=mysql_fetch_array($sqlDept))
									{
									?>
									<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["type"];?></option>
									<?php
									}
								
									?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Department</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth"style="display:none" >Engagement Department</label>
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<select class="form-control primary select2" id="app_dept" name="app_dept" style="margin-top:0px; width:100%;" required>
							<?php
								dbcon();
								$sqlDept=mysql_query("select * from department");
								if (! $sqlDept){
								   echo 'Database error: ' . mysql_error();
								}
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["DEPTDESC"]; ?></option>
								<?php
								}
							?>
							</select>
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg"> Designation<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth" style="display:none">Engagement Designation<span class=""></span></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<select class="form-control primary select2" id="app_desig" name="app_desig" style="margin-top:0px; width:100%;" required>
							<option value="blank" selected></option>
							<?php
								echo $alldesignations;
								?>
							</select>
						  </div>
						</div>
					</div>
						<script>
							
					</script>
				</div>
				<br>
				<div class="row" style="display:none;">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-2 ">Description</label>
						  <div class="col-md-10">
							 <textarea  rows="4" style="resize:none" class="form-control primary description" id="app_desc" name="app_desc"  placeholder="Enter Description">
							 </textarea>
						  </div>
						</div>
					</div>
				</div><!--br-->
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12 lbl_oth1" >
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 ">Other Designation<span class=""></span></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							 <input type="text" class="form-control primary" id="app_other_desig" name="app_other_desig" placeholder="Enter Other Designation" />
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="appo_date">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Appointment</label>

						  <div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="text" class="form-control primary calender_picker" id="app_date" name="app_date" placeholder="select Date" />
						  </div>
						</div>
					</div>
					
				</div>
				<br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg" >Date Of Regularisation</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth"style="display:none" >Date Of Engagement</label>
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="text" class="form-control primary calender_picker" id="app_datereg" name="app_datereg" placeholder="select Date" />
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Pay Scale TYPE</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth"style="display:none">Engagement Pay Scale TYPE</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary ps_type select2" id="ps_type_1" name="ps_type_1" style="margin-top:0px; width:100%;" required>
									<option value="" selected hidden disabled>-- Select PC Type --</option>
									<?php
											$pay_scale_type="";
											$sqlDept=mysql_query("select * from pay_scale_type");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											$pay_scale_type .= "<option value='".$rwDept["id"]."'>".$rwDept["type"]."</option>";
											}
											echo $pay_scale_type;
										?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<br>	
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Group<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth"style="display:none">Engagement Group<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary select2" id="app_group"  style="margin-top:0px; width:100%;" name="app_group" required>
									<option value=" " selected></option>
									<?php
									$group_col=mysql_query("select * from group_col");
									while($group_colre=mysql_fetch_array($group_col))
									{
									?>
									<option value="<?php echo $group_colre["id"]; ?>"><?php echo $group_colre["group_col"]; ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="level_1" style='display:none;'>
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Level<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth"style="display:none">Engagement Level<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary level_1 select2" id="app_level" style="margin-top:0px; width:100%;"  name="app_level" >
									<option value=" " selected></option>
									 
								</select>
							</div>
						</div><br><br>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="scale_1" style='display:none;'>
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth"style="display:none">Engagement Scale</label>
							<div class="col-md-8 col-sm-8 col-xs-12" >
								<select class="form-control primary select2 scale_1" id="app_scale" name="app_scale" style="margin-top:0px; width:100%;" >
									<option value=" " selected></option>
								</select>
							</div>
						</div><br><br>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="scale_text_1" style='display:none;'>
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth"style="display:none">Engagement Scale</label>
							<div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" class="form-control primary scale_text_1" id="app_scale_text" name="app_scale_text" placeholder="Enter 3rd Pay Rate" />
							</div>
						</div><br><br>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Station<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth"style="display:none">Engagement Station<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="hidden" id="station_id3" name="station_id3" class="other">
								<input type="text" class="form-control primary station" id="station3" name="station3" required data-toggle="modal" data-target="#station" readonly>
									
							</div>
						</div>
					</div>
						
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Rate Of Pay<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth"style="display:none">Engagement Rate Of Pay<span class=""></span></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							  <input type="text" class="form-control primary onlyNumber" id="app_rop" name="app_rop"   placeholder="Enter ROP" required />
						  </div>
						</div>
					</div>	
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Workplace<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth"style="display:none">Engagement  Workplace<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
                                                                <input type="hidden" name="depot_bill_unit3" id="depot_bill_unit3">
								<input type="text" class="form-control primary app_depot depot " id="depot3" name="depot3" required>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Appointment Reference No<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth"style="display:none">Engagement  Reference No<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="text" class="form-control primary" id="app_letterno" name="app_letterno"   placeholder="Enter Letter No" required />
							</div>
                        </div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Appointment Letter Date</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth"style="display:none">Engagement  Letter Date</label>
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="text" class="form-control primary calender_picker" id="app_letterdate" name="app_letterdate" placeholder="Select Date"required />
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-2 lbl_reg">Remarks</label>
						<label class="control-label col-md-2 lbl_oth"style="display:none" >Engagement Remarks</label>
						  <div class="col-md-10">
							 <textarea  rows="4" style="resize:none" class="form-control primary description" id="app_remark" name="app_remark"  placeholder="Enter Remarks" ></textarea>
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-sm-2 col-xs-12 pull-right">
						<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
						<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
						<br>
					</div>
				</div>	
            </div>
			</form>
			</div>
			</div>
			<script>
jQuery(document).ready(function() {
	//$(".hide_make").hide();
	$(document).on("change",".make_modal",function(){
		var cnt=$(this).attr("cnt");
		//alert(cnt);
		var pro_type=$(this).val();
		if(pro_type == '1')
			$(".makemodel"+cnt).show();
		else
			$(".makemodel"+cnt).hide();
		//alert(pro_type);
		$.ajax({
		  type:"post",
		  url:"process.php",
		  data:"action=get_property_item&pro_type="+pro_type,
		  success:function(data){
		  //alert(data);
			$("#pd_item_name").html(data);
		  }
		});
	});
        $("#initial_type").change(function() {

			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			 if($(this).val()== "4" || $(this).val()== "5" || $(this).val()== "6"){
				$(".lbl_oth").hide();
				$(".lbl_reg").show();
				$("#appo_date").show();
		   }else{
				$(".lbl_oth").show();
				$(".lbl_reg").hide();
				$("#appo_date").hide();
			}			
		});
 }); 
</script>
	<?php include_once('all_javascript.php');?> 
		        <!--Appointment Tab End -->