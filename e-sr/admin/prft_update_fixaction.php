<?php 
 //session_start();
 // if(!isset($_SESSION['SESS_MEMBER_NAME']))
 // {
	 // echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
 // }
 $_GLOBALS['a'] ='prft';
include_once('../global/header_update.php');
$conn=dbcon();
include('create_log.php');

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script src="javascript.js"></script>
<style>
/* .nav-tabs > li > a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
 
.lbl_reg{
  display:none;
} 

.lbl_oth{
  display:none;
}
.lbl_oth1{
  display:none;
}
 */
 
 /*----- Tabs -----*/
.tab {
    width:100%;
    display:inline-block;
}
 
    /*----- Tab Links -----*/
    /* Clearfix */
    .tab-links:after {
        display:block;
        clear:both;
        content:'';
    }
 
    .tab-links li {
        margin:0px 5px;
        float:left;
        list-style:none;
    }
 
        .tab-links a {
            padding:9px 15px;
            display:inline-block;
            border-radius:3px 3px 0px 0px;
            background:#7FB5DA;
            font-size:16px;
            font-weight:600;
            color:#4c4c4c;
            transition:all linear 0.15s;
        }
 
        .tab-links a:hover {
            background:#a7cce5;
            text-decoration:none;
        }
 
    li.active a, li.active a:hover {
        background:#fff;
        color:#4c4c4c;
    }
 
    /*----- Content of Tabs -----*/
    .tab-content {
        padding:15px;
        border-radius:3px;
        box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
        background:#fff;
    }
 
        .tab {
            display:none;
        }
 
        .tab.active {
            display:block;
        }

.nav-tabs > li > a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
 
.lbl_reg{
  display:none;
} 

.lbl_oth{
  display:none;
}
.lbl_oth1{
  display:none;
}
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(Preloader_3.gif) center no-repeat #fff;
}
</style>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
<div class="se-pre-con"></div>
<div class="content-wrapper" style="margin-top: -20px;">
   <section class="content"> 
      <div class="row">
	     <div class="box box-info">
			<div class="box box-warning box-solid">
			      
		<div class="box-body"> 
			 <div class="tab-pane" id="prft">
				 <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Fixaction </h3>
			<?php 
			$conn=dbcon1();
			$pf_no=$_GET['pf_no'];
			$id=$_GET['id'];
			
			
			
			if($pf_no!='fix'){
				
				$query=mysqli_query($conn,"select * from  prft_fixaction_temp where fix_pf_no='$pf_no' and id='$id'");
				$cnt=mysqli_num_rows($query);
				$result=mysqli_fetch_array($query);
			
				$action="Viewed PRFT Fixation single record On SR Entry";
			}else{
				$action="Visited Add Fixation Page On SR Entry";
			}
			 $action_on=$_SESSION['set_update_pf'];
			create_log($action,$action_on); 
			
 			?>			 
					
		<form method="post" action="process_main.php?action=update_prtf_fixation" class="apply_readonly">
				<div class="modal-body">
					<div class="row">
						 <div class="row">
						 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control primary TextNumber common_pf_number" id="fx_pf" name="fx_pf" value="<?php echo $pf_no ?>"  placeholder="Enter PF No."/ readonly> 
									<input type="hidden" value="<?php echo $id; ?>" id="fix_id" name="fix_id">
								  </div>
                                </div>
						    </div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Order Type<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary odrtype select2" id="fx_ordertype" name="fx_ordertype" style="width:100%;" >
									<option value="" selected hidden disabled>-- Select Order Type --</option>
										<?php
											$conn=dbcon();
											$sqlDept=mysqli_query($conn,"select * from  order_type_fixation");
											while($rwDept=mysqli_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["type"]; ?></option>
											<?php
											}
										?>
									 </select>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							  <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter No<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary" id="fx_letterno" name="fx_letterno" placeholder="Enter Letter No"  />
								  </div>
                                </div>
						    </div>	 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="text" class="form-control primary calender_picker" id="fx_letterdate" name="fx_letterdate"   />
								  </div>
                                </div>
						    </div>
						</div><br>
						
						 <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >With Effect From</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									 
									  <input type="text" class="form-control primary calender_picker" id="eff_date" name="eff_date">
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Remark</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<textarea style="resize:none;width:100%" id="fix_remark" name="fix_remark"></textarea>
								  </div>
                                </div>
						    </div>
							 
						</div><br>
							
							
							<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							<div class="col-md-6">
								<h4 id="" ><b>Fixation From</b></h4>
								<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							<div class="row">	
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" > Old Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="fx_rop" name="fx_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
								</div>
								</div>
							<br>
							<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type select2" id="fx_ps_type_e" name="fx_ps_type_e" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<?php
											echo $pay_scale_type;
										?>
										</select>
									</div>
								</div>
							</div>
							</div>
							<br>
							<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_e" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2 scale_e" id="fx_frm_scale" name="fx_frm_scale" style="width:100%;">
										<option value="" disabled selected></option>
									 
									 </select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_e" style='display:none;'>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary scale_text_e ps_3" id="fx_frm_scale_text" name="fx_frm_scale_text" placeholder="Enter 3rd Pay Rate" />
									</div>
								</div><br><br>
							</div>							
							<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_e">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary select2 level_e" id="fx_frm_level" name="fx_frm_level" style="width:100%;">
											<option value="" disabled selected></option>
							 
										</select>
									</div>
                                </div>
						    </div>
							</div>
							</div>
							</div>
							
							<div class="col-md-6">
							<h4 id=""><b>Fixation To</b></h4>
							<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
								<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" > New Rate Of Pay<span 	class=""></span></label>
										<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary onlyNumber" id="fx_new_rop" 	name="fx_new_rop"   placeholder="Enter ROP"  />
										</div>
									</div>
								</div>
								</div><br>
								<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type select2" id="fx_ps_type_p" name="fx_ps_type_p" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<?php
											echo $pay_scale_type;
										?>
										</select>
									</div>
								</div>
							</div>
							</div>
							<br>
							<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_p" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2 scale_p" id="fx_to_scale" name="fx_to_scale" style="width:100%;">
										<option value="" disabled selected></option>
									 
									 </select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_p" style='display:none;'>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary scale_text_p ps_3" id="fx_to_scale_text" name="fx_to_scale_text" placeholder="Enter 3rd Pay Rate" />
									</div>
								</div><br>
							</div>
					
							<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_p">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary select2 level_p" id="fx_to_level" name="fx_to_level" style="width:100%;">
										<option value="" disabled selected></option>
							 
									</select>
								  </div>
                                </div>
						    </div>
							</div>
							
								
							</div>
							
							</div>
					<hr  style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						
<!--Carried out-->						
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Carried Out<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary return4 select2" id="fx_carried" name="fx_carried" style="width:100%;">
									<option value="" selected hidden disabled>-- Select Carried Out --</option>
									<option value="Yes">Carried Out</option>
									<option value="No">Returned</option>
									 </select>
									 
								  </div>
                                </div>
						    </div>
							 
						</div><br>
						<div class="row" id="return4" style="display:none;">
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter NO.</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="fx_acc_ltr_no" name="fx_acc_ltr_no" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary calender_picker" id="fx_acc_ltr_date" name="fx_acc_ltr_date" />
									  </div>
									</div>
								</div>	
							</div><br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >WEF Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary calender_picker" id="fx_carr_wef_date" name="fx_carr_wef_date" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Remark</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="fx_carr_remark" name="fx_carr_remark" />
									  </div>
									</div>
								</div>	
							</div>
						
						
						
						</div>
					   <div class="row" id="notreturn4">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >W.E.F Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="text" class="form-control primary calender_picker" id="fx_wefdate" name="fx_wefdate"   />
								  </div>
                                </div>
								
						</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date of Incr.</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="text" class="form-control primary calender_picker" id="fx_incrdate" name="fx_incrdate"   />
								  </div>
                                </div>
								
						    </div>
						</div><br>
						   
							<br>
				<div class="form-group">
				<div class="col-sm-3 col-xs-12 pull-right">
					
					<input type="submit" id="btnSave" name="btnSave" value="Update"  class="btn btn-success" />
					<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
					<a href="sr_update.php?pf=<?php echo $_SESSION['set_update_pf']?>" class="btn btn-primary">Back</a>
					 
					<br>
					<br>
					<br>
				</div>
				</div>
					<div class="col-md-7 col-sm-12 col-xs-12" align="center">
			
		</div>	
			
            </div>
			</form>
		        </div>
        </div>
			
			
		</div>
      </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php include('modal_js_header.php');?>
<script type="text/javascript">

    $(document).on('focus', '.select2', function() {
        $(this).siblings('select').select2('open');
    });
    $('#fx_ordertype').on('select2:close', function (e)
    {
       $("#fx_letterno").focus();
    });
    $('#fx_ps_type_e').on('select2:close', function (e)
    {
       $("#fx_frm_scale").focus();
    });
    $('#fx_frm_scale').on('select2:close', function (e)
    {
       $("#fx_new_rop").focus();
    });
    $('#fx_frm_level').on('select2:close', function (e)
    {
       $("#fx_new_rop").focus();
    });
    $('#fx_ps_type_p').on('select2:close', function (e)
    {
       $("#fx_carried").focus();
    });
    $('#fx_carried').on('select2:close', function (e)
    {
       $("#fx_wefdate").focus();
    });
		
	var fix='<?php echo $pf_no ?>';
	if(fix!='fix'){
		var prft_pf_no = '<?php echo "".$pf_no;?>';
		var prft_id='<?php echo "".$id;?>';

		$.ajax({
		type:"post",
		url:"process_main.php",
		data:"action=get_prft_fixtion&prft_pf_no="+prft_pf_no+"&prft_id="+prft_id,
		success:function(data){

			var html = JSON.parse(data);

			if(html['pay_scale_to']=="5")
			{
				$("#level_e").show();
			}else if(html['pay_scale_to']=="1")
			{
				$("#scale_text_e").show();
			}
			else
			{
				$("#scale_e").show();
			}

			if(html['pay_scale_frm']=="5")
			{
				$("#level_p").show();
			}else if(html['pay_scale_frm']=="1")
			{
				$("#scale_text_p").show();
			}
			else
			{
				$("#scale_p").show();
			}
				
				if(html['fix_carried_out_type']=='No')
				{
					$("#notreturn4").hide();
					$("#return4").show();
				}
				else
				{
					$("#return4").hide();
					$("#notreturn4").show();
				}

				$('#fx_ordertype').html("<option selected>"+html['fix_order_type']+"</option>");
				$("#fx_letterno").val(html['fix_letter_no']);
				$('#fx_letterdate').val(html['fix_letter_date']);
				$('#eff_date').val(html['fix_wef']);
				$('#fix_remark').val(html['fix_remark']);

				//$('#fx_rop').val(html['fix_frm_rop']);
				//$('#fx_ps_type_e').html("<option selected>"+html['fix_frm_ps_type']+"</option>");
				
				$('#fx_frm_scale').html(html['fix_frm_scale']);
				$('#fx_frm_scale_text').val(html['fix_frm_scale']);
				//$('#fx_frm_level').html(html['fix_frm_level']);
				if(html['pay_scale_to']=='1'||html['pay_scale_to']=='2'||html['pay_scale_to']=='3'||html['pay_scale_to']=='4')
				{
					//$('#fx_frm_level').html("");
				}else{
					$('#fx_frm_scale').html("");
					$('#fx_frm_scale_text').val("");
				}
				$('#fx_new_rop').val(html['fix_to_rop']);
				$('#fx_ps_type_p').html("<option selected>"+html['fix_to_ps_type']+"</option>");
				$('#fx_to_scale').html(html['fix_to_scale']);
				$('#fx_to_scale_text').val(html['fix_to_scale']);
				$('#fx_to_level').html(html['fix_to_level']);
				if(html['pay_scale_frm']=='1'||html['pay_scale_frm']=='2'||html['pay_scale_frm']=='3'||html['pay_scale_frm']=='4')
				{
					$('#fx_to_level').html("");
				}else{
					$('#fx_to_scale').html("");
				$('#fx_to_scale_text').val("");
				}
				
				$('#fx_carried').html("<option selected>"+html['fix_carried_out_type']+"</option>");

				if(html['fix_carried_out_type']=="No")
					$('#fx_carried').html("<option value='No' selected>Returned</option><option value='Yes'>Carried out</option>");
				else
					$('#fx_carried').html("<option value='Yes' selected>Carried out</option><option value='No'>Returned</option>");
				
				$('#fx_acc_ltr_no').val(html['fix_car_re_accept_ltr_no']);
				$('#fx_acc_ltr_date').val(html['fix_car_re_accept_ltr_date']);
				$('#fx_carr_wef_date').val(html['fix_car_re_wef_date']);
				$('#fx_carr_remark').val(html['fix_car_re_remark']);			   


				$('#fx_wefdate').val(html['fix_carri_wef']);			   
				$('#fx_incrdate').val(html['fix_carri_date_of_incr']);
		   
		  }
		});
	}else{
		var pf='<?php echo $_SESSION['set_update_pf'];?>';
		// alert(pf);
		$.ajax({
			type: "POST",
			url: "process.php",
			data: "action=get_present_work_detail&prft_pf_no="+pf,
			success: function(html) 
			{
				var data=JSON.parse(html);

			
				
				if(data['ps_type_id']=="5")
				{
					$("#level_e").show();
				}else if(data['ps_type_id']=="1")
				{
					$("#scale_text_e").show();
				}
				else
				{
					$("#scale_e").show();
				}
				

				//$('#fx_rop').val(data['preapp_rop']);
				//$('#fx_ps_type_e').html("<option value='"+data['ps_type_id']+"'>"+data['ps_type']+"</option>");
				
				$('#fx_frm_scale').html("<option value='"+data['preapp_scale']+"'>"+data['preapp_scale']+"</option>");
				$('#fx_frm_scale_text').val(data['preapp_scale']);
				//$('#fx_frm_level').html("<option value='"+data['preapp_level']+"'>"+data['preapp_level']+"</option>");
				if(data['ps_type_id']=='1'||data['ps_type_id']=='2'||data['ps_type_id']=='3'||data['ps_type_id']=='4')
				{
				//	$('#fx_frm_level').html("");
				}else{
					$('#fx_frm_scale').html("");
					$('#fx_frm_scale_text').val("");
				}

				
							
				/* if(data['ps_type_id']=="5")
						{
							$("#level_m").show();
						}else if(data['ps_type_id']=="1"){
							$("#scale_text_m").show();
						}
						else
						{
							$("#scale_m").show();
						}


						$('#tran_frm_dept').html("<option value='"+data['preapp_department_id']+"'>"+data['preapp_department']+"</option>");
						$('#tran_frm_desig').html("<option value='"+data['preapp_designation_id']+"'>"+data['preapp_designation']+"</option>");
						$('#tran_frm_otherdesig').val(data['pre_otherdesign']);
						$('#tran_frm_ps_type_m').html("<option value='"+data['ps_type_id']+"'>"+data['ps_type']+"</option>");
						
						$('#tran_frm_scale_text').val(data['preapp_scale']);
						$('#tran_frm_scale').html("<option value='"+data['preapp_scale']+"'>"+data['preapp_scale']+"</option>");

						$('#tran_frm_level').html("<option value='"+data['preapp_level']+"'>"+data['preapp_level']+"</option>");

						$('#tran_frm_group').html("<option value='"+data['preapp_group_id']+"'>"+data['preapp_group']+"</option>");
						$('#statione').val(data['preapp_station']);
			
						$('#tran_frm_rop').val(data['preapp_rop']);
						$('#billunith').val(data['preapp_billunit']);
						$('#depot_bill_unith').val(data['preapp_billunit_id']);
						$('#depoth').val(data['preapp_depot']);
						$('#station_ide').val(data['preapp_station']); */
			}
		});
	} 
	
 
</script>
<?php include_once('../global/footer.php');?>  
 
<script>
 $('#fx_carried').on('change', function() {
	 
		  if ($(this).val() == 'Yes')
		  {
			   $("#return4").hide();
			  $("#notreturn4").show(); 
			$("#fx_acc_ltr_no").val('');
			$("#fx_acc_ltr_date").val('');
			$("#fx_carr_wef_date").val('');
			$("#fx_carr_remark").val('');
		  }
		  else{
			$("#return4").show();
			$("#notreturn4").hide();
			  	$('#fx_wefdate').val('');
       	        $('#fx_incrdate').val('');
		  }
		   
		});
  

 </script>
  