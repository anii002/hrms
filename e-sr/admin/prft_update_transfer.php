<?php 
 //session_start();
 // if(!isset($_SESSION['SESS_MEMBER_NAME']))
 // {
	 // echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
 // }
 $_GLOBALS['a'] ='prft';
include_once('../global/header_update.php');
include('create_log.php');
$conn=dbcon();
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
				 <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Transfer </h3>
			<?php 
			$conn=dbcon1();
			$pf_no=$_GET['pf_no'];
			$id=$_GET['id'];
			
			if($pf_no!='trans'){
				$query=mysqli_query($conn,"select * from  prft_transfer_temp where trans_pf_no='$pf_no' and id='$id'");
				$cnt=mysqli_num_rows($query);
				$result=mysqli_fetch_array($query);
			
				$action="Viewed PRFT Transfer single record On SR Entry";
			}else{
				$action="Visited Add Transfer Page On SR Entry";
			}
			 
			$action_on=$_SESSION['set_update_pf'];
			create_log($action,$action_on); 
			 
 			?>			 
					
		<form method="post" action="process_main.php?action=update_prtf_transfer" class="apply_readonly">
				<div class="modal-body">
					<div class="row">
						<div class="row">
						 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="hidden" id="trans_id" name="trans_id">
									<input type="text" class="form-control primary TextNumber common_pf_number" id="tf_pf" name="tf_pf"  value="<?php echo $_SESSION['set_update_pf'];?>"   placeholder="Enter PF No." readonly /> 
									<input type="hidden" value="<?php echo $id; ?>" id="tran_id" name="tran_id">
								  </div>
                                </div>
						    </div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Order Type<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary odrtype2 select2" id="tf_ordertype" name="tf_ordertype" style="width:100%;" >
									<option value="" selected hidden disabled>-- Select Order Type --</option>
									<?php
											$conn=dbcon();
											$sqlDept=mysqli_query($conn,"select * from order_type_transfer");
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
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Office Order No<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary" id="tf_letterno" name="tf_letterno" placeholder="Enter Letter No"  />
								  </div>
                                </div>
						    </div>	 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Office Order Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="ttext" class="form-control primary calender_picker" id="tf_letterdate" name="tf_letterdate"   />
								  </div>
                                </div>
						    </div>
						</div><br>
						
						 <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >With Effect From</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="hidden" name="depot_bill_unitf" id="depot_bill_unitf">
									  <input type="text" class="form-control primary calender_picker" id="bill_unitf" name="bill_unitf">
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Remark</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="hidden" name="depot_bill_unitf" id="depot_bill_unitf">
									  <textarea type="text" class="form-control primary" id="trans_remark" name="trans_remark"></textarea>
								  </div>
                                </div>
						    </div>
							<!--div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit To</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="hidden" name="depot_bill_unit5" id="depot_bill_unit5">
									  <input type="text" class="form-control primary TextNumber bill_unit" id="bill_unit5" name="bill_unit5" placeholder="Bill Unit To"  data-toggle="modal" data-target="#bill_unit_select" readonly>
								  </div>
                                </div>
						    </div-->
						</div><br>
					
						 <div class="row">
						 
						 <div class="row">
							<div class="col-md-6">
								<h4 id="from1"><b style="margin-left:16px">Transfer From</b></h4>
								<h4 style="display:none;" id="from"><b>From</b></h4>
								<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
											<div class="col-md-8 col-sm-8 col-xs-12" >
												<select class="form-control primary select2" id="tran_frm_dept" name="tran_frm_dept" style="width:100%;">
													<option value="" selected hidden disabled>-- Select Department --</option>
													<?php echo $dept;?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
											<div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control primary select2" id="tran_frm_desig" name="tran_frm_desig" style="width:100%;" >
														<option value="" selected hidden disabled>-- Select Designation --</option>
														<?php echo $alldesignations;?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<br>
									 <div class="row">
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="tran_frm_otherdesig" name="tran_frm_otherdesig" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type select2" id="tran_frm_ps_type_m" name="tran_frm_ps_type_m" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											
											<?php
											echo $pay_scale_type;
											?>
										
										</select>
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_m" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2 scale_m" id="tran_frm_scale" name="tran_frm_scale" style="width:100%;">
										<option value="" selected hidden disabled>-- Select Sacle --</option>
							
									</select>
								  </div>
                                </div>
						    </div>
						</div>	
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_m" style='display:none;'>
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary scale_text_m ps_3" id="tran_frm_scale_text" name="tran_frm_scale_text" placeholder="Enter 3rd Pay Rate" />
									</div>
								</div><br>
							</div>
						</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_m">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary select2 level_m" id="tran_frm_level" name="tran_frm_level" style="width:100%;">
										<option value="" selected hidden disabled>-- Select Level --</option>
										 
									</select>
								</div>
							</div>
						</div>
					</div>
						<br>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary select2" id="tran_frm_group" name="tran_frm_group" style="width:100%;" >
									<option value="" selected hidden disabled>-- Select Group --</option>
									 <?php echo $group;?>
								   </select>
							  </div>
							</div>
						</div>
					</div>
						<br>
					<div class="row">
					 <div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
							  <input type="hidden" id="station_ide" name="station_ide" class="other">
								<input type="text" class="form-control primary station" id="statione" name="statione"  data-toggle="modal" data-target="#station" readonly>
							  </div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="text" class="form-control primary TextNumber" id="tran_frm_otherstation" name="tran_frm_otherstation"  placeholder="Enter Station Name"  />
							  </div>
							</div>
						</div>
					</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="tran_frm_rop" name="tran_frm_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" name="depot_bill_unith" id="depot_bill_unith">
											 <input type="text" class="form-control primary bill_unit" id="billunith" name="billunith"  data-toggle="modal" data-target="#bill_unit_select" readonly>
										  </div>
										</div>
									</div>
								</div>
								<br>
								
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depoth" name="depoth" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div>							
			</div>					
			<div class="col-md-6">
				<h4 id="to1"><b>Transfer To</b></h4>
				<h4 style="display:none" id="to"><b>To</b></h4>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<select class="form-control primary select2" id="tran_to_dept" name="tran_to_dept" style="width:100%;"		>
											<option value="" selected hidden disabled>-- Select Department --</option>
												<?php echo $dept;?>
										</select>
									</div>
                                </div>
						    </div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control primary select2" id="tran_to_desig" name="tran_to_desig" style="width:100%;" >
												<option value="" selected hidden disabled>-- Select Designation --</option>
												<?php echo $alldesignations;?>
												</select>
										  </div>
                                </div>
						    </div>
								</div>
								<br>
									 <div class="row">
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="tran_to_otherdesig" name="tran_to_otherdesig" placeholder="Enter Designation" />
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
										<select class="form-control primary ps_type select2" id="tran_to_ps_type_n" name="tran_to_ps_type_n" style="margin-top:0px; width:100%;" >
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
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_n" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2 scale_n" id="tran_to_scale" name="tran_to_scale" style="width:100%;">
									<option value="" selected hidden disabled>-- Select Sacle --</option>
									 
									 </select>
								  </div>
                                </div>
						    </div>
						</div>	
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_n" style='display:none;'>
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary scale_text_n ps_3" id="tran_to_scale_text" name="tran_to_scale_text" placeholder="Enter 3rd Pay Rate" />
									</div>
								</div><br><br>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="level_n" style="display:none;" >
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary select2 level_n" id="tran_to_level" name="tran_to_level" style="width:100%;">
										<option value="" selected hidden disabled>-- Select Level --</option>
										
									   </select>
									</div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary select2" id="tran_to_group" name="tran_to_group" style="width:100%;" >
										<option value="" selected hidden disabled>-- Select Group --</option>
										 <?php echo $group;?>
									   </select>
									</div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_idg" name="station_idg" class="other">
									<input type="text" class="form-control primary station" id="stationg" name="stationg"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="tran_to_otherstation" name="tran_to_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="tran_to_rop" name="tran_to_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" name="depot_bill_unitj" id="depot_bill_unitj">
											 <input type="text" class="form-control primary bill_unit" id="billunitj" name="billunitj"  data-toggle="modal" data-target="#bill_unit_select" readonly>
										  </div>
										</div>
									</div>
								</div>
								<br>
								
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depotj" name="depotj" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div>
					</div>
				</div>	
	<!--Carried Out Code Start-->
					<hr  style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Carried Out<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary return3 select2" id="prtf_rev_carried" name="prtf_rev_carried" style="width:100%;">
									<option value="" selected hidden disabled>-- Select Carried Out --</option>
									<option value="Yes">Carried Out</option>
									<option value="No">Returned</option>
									 </select>
									 
								  </div>
                                </div>
						    </div>
							 
						</div><br>
						<div class="row" id="return3" style="display:none;">
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter NO.</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary acc" id="prtf_rev_acc_ltr_no" name="prtf_rev_acc_ltr_no" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary calender_picker accd" id="prtf_rev_acc_ltr_date" name="prtf_rev_acc_ltr_date" />
									  </div>
									</div>
								</div>	
							</div><br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >WEF Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary calender_picker" id="prtf_rev_carr_wef_date" name="prtf_rev_carr_wef_date" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Remark</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_rev_carr_remark" name="prtf_rev_carr_remark" />
									  </div>
									</div>
								</div>	
							</div>
						
						
						
						</div>
					   <div class="row" id="notreturn3">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >W.E.F Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="text" class="form-control primary calender_picker" id="prtf_rev_wefdate" name="prtf_rev_wefdate"   />
								  </div>
                                </div>
								
						</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date of Incr.</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="text" class="form-control primary calender_picker"  id="prtf_rev_incrdate" name="prtf_rev_incrdate"   />
								  </div>
                                </div>
								
						    </div>
						</div><br>
						   
							<br>
				<div class="form-group">
				<div class="col-sm-3 col-xs-12 pull-right">
					
					<input type="submit" id="btnSave" name="btnSave" value="Update"  class="btn btn-success" />
					<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
					 <a href="prft_update.php?pf=<?php echo $_SESSION['set_update_pf']?>" class="btn btn-primary">Back</a>
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

  <!-- add regular medical modal start-->

<!-- bill unit modal ends----------->
<?php include('modal_js_header.php');?>
<script type="text/javascript">
    
    $(document).on('focus', '.select2', function() {
        $(this).siblings('select').select2('open');
    });
    $('#tf_ordertype').on('select2:close', function (e)
    {
       $("#tf_letterno").focus();
    });
    $('#tran_frm_dept').on('select2:close', function (e)
    {
       $("#tran_frm_desig").focus();
    });
    $('#tran_frm_desig').on('select2:close', function (e)
    {
       $("#tran_frm_otherdesig").focus();
    });
    $('#tran_frm_ps_type_m').on('select2:close', function (e)
    {
       $("#tran_frm_group").focus();
    });
    $('#tran_frm_group').on('select2:close', function (e)
    {
       $("#statione").focus();
    });
    $('#tran_to_dept').on('select2:close', function (e)
    {
       $("#tran_to_desig").focus();
    });
    $('#tran_to_desig').on('select2:close', function (e)
    {
       $("#tran_to_otherdesig").focus();
    });
    $('#tran_to_ps_type_n').on('select2:close', function (e)
    {
       $("#tran_to_group").focus();
    });
    $('#tran_to_group').on('select2:close', function (e)
    {
       $("#stationg").focus();
    });
    $('#prtf_rev_carried').on('select2:close', function (e)
    {
       $("#prtf_rev_wefdate").focus();
    });
		//debugger;
		var trans='<?php echo $pf_no?>';
		//alert(trans);
		if(trans!=='trans')
		{
			var prft_pf_no = '<?php echo "".$pf_no;?>';
			var prft_id='<?php echo "".$id;?>';
			//alert(prft_id);
			$("#trans_id").val(prft_id);
			
			$.ajax({
			type:"post",
			url:"process_main.php",
			data:"action=get_prft_transfer&prft_pf_no="+prft_pf_no+"&prft_id="+prft_id,
			success:function(data){
			  
						var html = JSON.parse(data);
							  
						if(html['payscaletype']=="5")
						{
							$("#level_m").show();
						}else if(html['payscaletype']=="1"){
							$("#scale_text_m").show();
						}
						else
						{
							$("#scale_m").show();
						}

						if(html['payscaletypeto']=="5")
						{
							$("#level_n").show();
						}else if(html['payscaletype']=="1")
						{
							$("#scale_text_n").show();
						}
						else
						{
							$("#scale_n").show();
						}
							
							if(html['trans_carried_out_type']=='No')
							{
								$("#notreturn3").hide();
								$("#return3").show();
							}
							else
							{
								$("#return3").hide();
								$("#notreturn3").show();
							}
							$('#tf_ordertype').html("<option selected>"+html['trans_order_type']+"</option>");
							$("#tf_letterno").val(html['trans_letter_no']);
							$('#tf_letterdate').val(html['trans_letter_date']);
							$('#bill_unitf').val(html['trans_wef']);

							$('#tran_frm_dept').html("<option selected>"+html['trans_frm_dept']+"</option>");
							$('#tran_frm_desig').html("<option selected>"+html['trans_frm_desig']+"</option>");
							$('#tran_frm_otherdesig').val(html['trans_frm_othr_desig']);
							$('#tran_frm_ps_type_m').html("<option selected>"+html['trans_frm_pay_scale_type']+"</option>");
							
							$('#tran_frm_scale_text').val(html['trans_frm_scale']);
							$('#tran_frm_scale').html(html['trans_frm_scale']);

							$('#tran_frm_level').html(html['trans_frm_level']);

							$('#tran_frm_group').html(html['trans_frm_group']);
							$('#statione').val(html['trans_frm_station']);
							$('#tran_frm_otherstation').val(html['trans_frm_othr_station']);
							$('#tran_frm_rop').val(html['trans_frm_rop']);
							$('#billunith').val(html['trans_frm_billunit']);
							$('#depot_bill_unith').val(html['trans_to_billunit2']);
							$('#depoth').val(html['trans_frm_depot']);
							$('#station_ide').val(html['stationto']);
							$('#depot_bill_unith').val(html['trans_frm_bill']);

							$('#tran_to_dept').html("<option selected>"+html['trans_to_dept']+"</option>");
							$('#tran_to_desig').html("<option selected>"+html['trans_to_desig']+"</option>");
							$('#tran_to_otherdesig').val(html['trans_to_othr_desig']);
							$('#tran_to_ps_type_n').html("<option selected>"+html['trans_to_pay_scale_type']+"</option>");
						
							$('#tran_to_scale').html(html['trans_to_scale']);
							$('#tran_to_scale_text').val(html['trans_to_scale']);
							$('#tran_to_level').html(html['trans_to_level']);
							$('#tran_to_group').html(html['trans_to_group']);
							$('#stationg').val(html['trans_to_station']);
							$('#tran_to_otherstation').val(html['trans_to_othr_station']);
							$('#tran_to_rop').val(html['trans_to_rop']);
							$('#billunitj').val(html['trans_to_billunit']);
							$('#depotj').val(html['trans_to_depot']);
							$('#station_idg').val(html['stationfrm']);
							$('#depot_bill_unitj').val(html['trans_to_bill']);


							$('#prtf_rev_carried').html("<option selected>"+html['trans_carried_out_type']+"</option>");
							if(html['trans_carried_out_type']=="No")
								$('#prtf_rev_carried').html("<option value='No' selected>Returned</option><option value='Yes'>Carried out</option>");
							else
								$('#prtf_rev_carried').html("<option value='Yes' selected>Carried out</option><option value='No'>Returned</option>");

							$('.acc').val(html['trans_car_re_accept_ltr_no']);
							$('.accd').val(html['trans_car_re_accept_ltr_date']);
							//alert(html['trans_car_re_accept_ltr_date']);
							$('#prtf_rev_carr_wef_date').val(html['trans_car_re_wef_date']);
							$('#prtf_rev_carr_remark').val(html['trans_car_re_remark']);
							
							//Yes					
							$('#prtf_rev_wefdate').val(html['trans_carri_wef']);
							$('#prtf_rev_incrdate').val(html['trans_carri_date_of_incr']);
							$("#trans_remark").html(html['trans_remark']);
					}
				});
			} 
</script>
<?php include_once('../global/footer.php'); ?>  
<script>
$('#prtf_rev_carried').on('change', function() {
	 
		  if ($(this).val() == 'Yes')
		  {
			   $("#return3").hide();
			  $("#notreturn3").show(); 
			$("#prtf_rev_acc_ltr_no").val('');
			$("#prtf_rev_acc_ltr_date").val('');
			$("#prtf_rev_carr_wef_date").val('');
			$("#prtf_rev_carr_remark").val('');
		  }
		  else{
			$("#return3").show();
			$("#notreturn3").hide();
			  	$('#prtf_rev_wefdate').val('');
       	        $('#prtf_rev_incrdate').val('');
		  }
		});
 </script>
 <script>
 $('#tran_frm_dept').on("change",function(){
	   var $value=$(this).val();
	   $("#tran_to_dept").val($value).trigger('change');
	});
	$('#tran_frm_desig').on("change",function(){
	   var $value=$(this).val();
	   $("#tran_to_desig").val($value).trigger('change');
	});
	$('#tran_frm_otherdesig').on("change",function(){
	   var $value=$(this).val();
	   $("#tran_to_otherdesig").val($value);
	});
	$('#tran_frm_ps_type_m').on("change",function(){
	   var $value=$(this).val();
	   $("#tran_to_ps_type_n").val($value).trigger('change');
	});
	$('#tran_frm_group').on("change",function(){
	   var $value=$(this).val();
	   $("#tran_to_group").val($value).trigger('change');
	});
	$('#tran_frm_scale_text').on("change",function(){
	   var $value=$(this).val();
	   $("#tran_to_scale_text").val($value);
	});
	$('#tran_frm_otherstation').on("change",function(){
	   var $value=$(this).val();
	   $("#tran_to_otherstation").val($value);
	});
	$('#tran_frm_rop').on("change",function(){
	   var $value=$(this).val();
	   $("#tran_to_rop").val($value);
	});
		
	$('#tran_frm_scale').on("change",function(){
	   var $value=$(this).val();
	   $("#tran_to_scale").val($value).trigger('change');;
	});
	
	$('#tran_frm_level').on("change",function(){
	   var $value=$(this).val();
	   $("#tran_to_level").val($value).trigger('change');;
	});
 </script>
  