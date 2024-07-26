 <?php 
 $_GLOBALS['a'] ='initial';
  include_once('../global/header_update.php');
  
  include('create_log.php');
  
	$action="Visited Initial Appointment page";
	$action_on=$_SESSION['set_update_pf'];
	create_log($action,$action_on);
  ?>
 <!--Bio Tab Start -->
	<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
		<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Initial Appointment</span>
		</div>
			<div style="border:1px solid #67809f;padding:30px;">
				<div class="box-header with-border">
				<!--<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Initial Appointment </h3>-->
			</div>
			
			<form method="post" action="process_main.php?action=update_appointment">
			
			<div class="modal-body">
				<div class="row">
					 <?php
						$init_exist=0;
						$conn=dbcon1();
						$sql=mysqli_query($conn,"select * from appointment_temp where app_pf_number='".$_SESSION['set_update_pf']."'");
						$result=mysqli_num_rows($sql);
						if($result>0){
							$init_exist=1;
						}
					 ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number<span class=""></span></label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12">
							 <input type="text" class="form-control primary TextNumber" value="<?php echo $_SESSION['set_update_pf'];?>" id="app_pf_no" name="app_pf_no" readonly />
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
								<select class="form-control select2" id="initial_type" name="initial_type" style="margin-top:0px; width:100%;" required>
									<option value="" selected disabled>SELECT TYPE</option>
									<option value="blank" ></option>
									<?php echo $appo_type;?>
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
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth" >Engagement Department</label>
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<select class="form-control primary select2" id="app_dept" name="app_dept" style="margin-top:0px; width:100%;" required>
								<option value="" selected disabled>Select Department</option>
								<option value="blank" ></option>
								<?php echo $dept;?>
							</select>
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg"> Designation.<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Designation.<span class=""></span></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<select class="form-control primary select2" id="app_desig" name="app_desig" style="margin-top:0px; width:100%;" required>
								<option value="" selected disabled>Select Designation.</option>
								<option value="blank"></option>
								<?php echo $alldesignations;?>
							</select>
						  </div>
						</div>
					</div>
				</div>
				<br>
				 
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
							  <input type="text" class="form-control primary calender_picker readonly" id="app_date" name="app_date" >
						  </div>
						</div>
					</div>
					
				</div>
				<br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg" >Date Of Regularisation</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth" >Date Of Engagement</label>
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="text" class="form-control primary calender_picker_future_date_disabled readonly" id="app_datereg" name="app_datereg" />
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Pay Scale TYPE</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Pay Scale TYPE</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary ps_type select2" id="ps_type_1" name="ps_type_1" style="margin-top:0px; width:100%;" required>
									<option value=""disabled selected>Select Pay Scale Type</option>
									<option value="blank" ></option>
									<?php echo $pay_scale_type;?>
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
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Group<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary select2" id="app_group"  style="margin-top:0px; width:100%;" name="app_group" required>
									<option value="" disabled selected>Select Group</option>
									<option value="blank"></option>
									<?php echo $group;?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="level_1" style='display:none;'>
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Level<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Level<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary level_1 select2" id="app_level" style="margin-top:0px; width:100%;"  name="app_level" >
									 <option value="" selected disabled>Select Level</option>
								</select>
							</div>
						</div><br><br>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="scale_1" style='display:none;'>
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Scale</label>
							<div class="col-md-8 col-sm-8 col-xs-12" >
								<select class="form-control primary select2 scale_1" id="app_scale" name="app_scale" style="margin-top:0px; width:100%;" >
									<option value="" selected disabled>Select Scale</option>
								</select>
							</div>
						</div><br><br>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="scale_text_1" style='display:none;'>
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Scale</label>
							<div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" class="form-control primary scale_text_1 ps_3 " id="app_scale_text" name="app_scale_text" placeholder="Enter 3rd Pay Rate" >
							</div>
						</div><br><br>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Station<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Station<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="hidden" id="station_id3" name="station_id3" class="other">
								<input type="text" class="form-control primary station" id="station3" name="station3"    data-toggle="modal" data-target="#station" readonly>
									
							</div>
						</div>
					</div>	
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Rate Of Pay<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Rate Of Pay<span class=""></span></label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
							  <input type="text" class="form-control primary onlyNumber" id="app_rop" name="app_rop"   placeholder="Enter ROP" required   />
						  </div>
						</div>
					</div>	
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Workplace<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement Workplace<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="hidden" id="depot_bill_unit3" name="depot_bill_unit3">
								<input type="text" class="form-control primary app_depot depot bill_unit" id="depot3" name="depot3"    readonly data-toggle="modal" data-target="#bill_unit_select">
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Appointment Reference No<span class=""></span></label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement  Reference No<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="text" class="form-control primary" id="app_letterno" name="app_letterno"   placeholder="Enter Letter No"    />
							</div>
                        </div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Appointment Letter Date</label>
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_oth">Engagement  Letter Date</label>
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="text" class="form-control primary calender_picker_future_date_disabled readonly" id="app_letterdate" name="app_letterdate"    />
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-2 lbl_reg">Remarks</label>
						<label class="control-label col-md-2 lbl_oth" >Engagement Remarks</label>
						  <div class="col-md-10">
							 <textarea  rows="4" style="resize:none" class="form-control primary description" id="app_remark" name="app_remark"  placeholder="Enter Remarks" ></textarea>
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-sm-2 col-xs-12 pull-right">
						<input type="submit" id="btn_save" name="btn_save" value="Save"  class="btn btn-primary" style="display:none;" />
						<input type="submit" id="btn_update" name="btn_update" value="Update"  class="btn btn-primary" style="display:none;"/>
						<!--input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />-->
						<br>
					</div>
				</div>	
            </div>
			</form>
			</div>
	</div>
		        <!--Appointment Tab End -->
				<?php include('modal_js_header.php');?>
				
<script type="text/javascript">

	$(".lbl_oth").hide();
			   $(".lbl_reg").show();
			    $("#appo_date").show();
				
	var init_e=<?php echo $init_exist?>;
	
	if(init_e >= 1){
		$("#btn_update").show();
		$("#btn_save").hide();
		
		//fetch appointment
	var pf_number='<?php echo "".$_SESSION['set_update_pf'];?>';
		   
	$.ajax({
			type:'POST',
			url:'process.php',
			data:'action=get_appointment_data&pf_number='+pf_number,
			success:function(data){
			   //alert(data);
			var ddd=data;
			var arr2=ddd.split('$');
			/* var dt=arr2[3];
			// var newdate = dt.split("/").reverse().join("-");
			 
			 var rdt=arr2[4];
			 var newdate1 = rdt.split("/").reverse().join("-");
			 
			  var lrdt=arr2[15];
			 var newdate2 = lrdt.split("/").reverse().join("-"); */
			 
			
			 
			$("#app_dept").html(arr2[0]);
			$("#app_desig").html("<option selected>"+arr2[1]+"</option>");
			if(arr2[3]=='0000-00-00')
			{
			$('#app_date').val("");	
			}
			else{
			$('#app_date').val(arr2[3]);
			}
			//alert(arr2[3]);
			//alert(arr2[4]);
			if(arr2[4]=='0000-00-00')
			{
			$('#app_datereg').val("");
			}
			else{
			$('#app_datereg').val(arr2[4]);
			}
			if(arr2[20]=='1'){
				$("#scale_text_1").show();
				//alert(arr2[6]);
				$("#app_scale_text").val(arr2[6]);
			}else if(arr2[20]=='2' || arr2[20]=='3' || arr2[20]=='4')
			{
				$("#scale_1").show();
				$("#level_1").hide(); 
			}else{
				$("#scale_1").hide();
				$("#level_1").show(); 
			}
		    $("#ps_type_1").html("<option selected>"+arr2[5]+"</option>");
		     $("#app_scale").html(arr2[6]);
		     $("#app_level").html(arr2[7]);
		     $("#app_group").html(arr2[8]);
			 $("#station3").val(arr2[9]);
			 $("#app_rop").val(arr2[12]);
			 $("#depot3").val(arr2[13]);
			 $("#app_letterno").val(arr2[14]);
			 if(arr2[15]=='0000-00-00')
			 {
				 $("#app_letterdate").val("");
			 }
			 else{
			 $("#app_letterdate").val(arr2[15]);}
			 $("#app_remark").val(arr2[16]);
			  $("#station_id3").val(arr2[18]);
			  $("#depot_bill_unit3").val(arr2[19]);
			  $("#initial_type").html(arr2[17]);
			 // alert(arr2[21]);
			  if(arr2[21]!="4"){
				   $(".lbl_oth").show();
			   $(".lbl_reg").hide();
			   $("#appo_date").hide();
			  }else{
				  $(".lbl_oth").hide();
			   $(".lbl_reg").show();
			  }
			}
		});
	}else{
		$("#btn_save").show();
		$("#btn_update").hide();
	}
	
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
</script>
 <script>
 jQuery(document).ready(function() {
	 
	
	//$(".hide_make").hide();
	$("#pd_pro_type").change(function(){
		var pro_type=$(this).val();
		if(pro_type == '1')
			$(".hide_make").show();
		else
			$(".hide_make").hide();
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
		
		$('#initial_type').on('change', function() {
				var type=$(this).attr("id");
				var got_type=type.slice(-1);
				 if($(this).val()!= "4"){
			   $(".lbl_oth").show();
			   $(".lbl_reg").hide();
			   $("#appo_date").hide();
				
				} 
	else{
		  $(".lbl_oth").hide();
			   $(".lbl_reg").show();
			    $("#appo_date").show();
		}			
	});
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
	 $(".choose_name").change(function(){
		 var name=$(this).val();
		  $("#middle_name").show();
		  $("#apply_name").text('');
		  if(name=='Married')
		  {
			$("#apply_name").append("Husband Name");
		  }else{
			  $("#apply_name").append("Father Name");
		  }
	 }); 
</script>
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
});
</script>
<?php include_once('../global/footer.php');?>  