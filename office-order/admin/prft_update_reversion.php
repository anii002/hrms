<?php 
// session_start();
 // if(!isset($_SESSION['SESS_MEMBER_NAME']))
 // {
	 // echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
 // }
$_GLOBALS['a'] ='prft';
include_once('../global/header_update.php');
dbcon();
?>
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
				 <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Reversion </h3>
			<?php 
			dbcon1();
			$pf_no=$_GET['pf_no'];
			$id=$_GET['id'];
			
			if($pf_no!='rev'){
				$query=mysql_query("select * from  prft_reversion_temp where rev_pf_no='$pf_no' and id='$id'");
				$cnt=mysql_num_rows($query);
				$result=mysql_fetch_array($query);
			}
			 
 			?>			 
					
		<form method="post" action="process_main.php?action=update_prtf_reversion" class="apply_readonly">
				<div class="modal-body">
				 
					<div class="row">
						 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control primary TextNumber common_pf_number" id="rev_pf" name="rev_pf"  value="<?php echo $_SESSION['set_update_pf'];?>" placeholder="Enter PF No."readonly /> 
									<input type="hidden" value="<?php echo $id; ?>" id="rev_id" name="rev_id">
								  </div>
                                </div>
						    </div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Order Type<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary odrtype1 select2" id="rev_ordertype" name="rev_ordertype" style="width:100%;" >
									<option value="blank" selected disabled hidden>Select Order Type</option>
										<?php
										         dbcon();
												$sqlDept=mysql_query("select * from reversion_order_type");
												while($rwDept=mysql_fetch_array($sqlDept))
												{
												?>
												<option value="<?php echo $rwDept["descri"]; ?>"><?php echo $rwDept["descri"]; ?></option>
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
									  <input type="text" class="form-control primary" id="rev_letterno" name="rev_letterno" placeholder="Enter Letter No"  />
								  </div>
                                </div>
						    </div>	 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="text" class="form-control primary calender_picker" id="rev_letterdate" name="rev_letterdate"   />
								  </div>
                                </div>
						    </div>
						</div><br>
						
						 <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >With Effect From</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="text" class="form-control primary calender_picker" id="rev_wef" name="rev_wef">
								  </div>
                                </div>
						    </div>
						</div><br>
						
<!--Reversion Code Start -->
						<div class="row" id="revform" style="display:none">
								<div class="col-md-6">
								<h4 id="from2"><b>Reversion From</b></h4>
							 
								<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
											<div class="col-md-8 col-sm-8 col-xs-12" >
												<select class="form-control primary select2" id="rev_frm_dept" name="rev_frm_dept" style="width:100%;">
													<option value="" selected hidden disabled>-- Select Department --</option>
													<?php
														$sqlDept=mysql_query("select * from department");
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
								</div>
								<br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control primary select2" id="rev_frm_desig" name="rev_frm_desig" style="width:100%;" >
													<option value="" selected hidden disabled>-- Select Designation --</option>
												<?php
													$sqlDept=mysql_query("select * from designation");
													while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
													<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="rev_frm_otherdesig" name="rev_frm_otherdesig" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
							
							
							
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type select2" id="rev_frm_ps_type_9" name="rev_frm_ps_type_3" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<?php echo $pay_scale_type ;?>
										</select>
									</div>
								</div>
							</div>
								
								</div><br>
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_9" style="display:none">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2 scale_9" id="rev_frm_scale" name="rev_frm_scale" style="width:100%;">
										<option value="" selected hidden disabled>-- Select scale --</option>
									 
									 </select>
								  </div>
                                </div>
						    </div>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_9" style='display:none;'>
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
										<div class="col-md-8 col-sm-8 col-xs-12" >
											<input type="text" class="form-control primary scale_text_9" id="rev_frm_scale_text" name="rev_frm_scale_text" placeholder="Enter 3rd Pay Rate" />
										</div>
									</div><br><br>
								</div>
							</div>
						 
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12" id="level_9" style="display:none">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary select2 level_9" id="rev_frm_level" name="rev_frm_level" style="width:100%;">
										<option value="" selected hidden disabled>-- Select Level --</option>
							 
									</select>
								  </div>
                                </div>
						    </div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary select2" id="rev_frm_group" name="rev_frm_group" style=		"width:100%;" >
											<option value="" selected hidden disabled>-- Select Group --</option>
											 <?php
												$sqlDept=mysql_query("select * from group_col");
												while($rwDept=mysql_fetch_array($sqlDept))
												{
												?>
												<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_ida" name="station_ida" class="other">
									<input type="text" class="form-control primary station" id="stationa" name="stationa"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="rev_frm_otherstation" name="rev_frm_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="rev_frm_rop" name="rev_frm_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" name="depot_bill_unitb" id="depot_bill_unitb">
											 <input type="text" class="form-control primary bill_unit" id="billunitb" name="billunitb"  data-toggle="modal" data-target="#bill_unit_select" readonly>
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
									<input type="text" class="form-control primary depot" id="depotb" name="depotb" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div>							
			</div>
								
								
			<div class="col-md-6">
				<h4 id="to2"><b>Reversion To</b></h4>
				 
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
										<div class="col-md-8 col-sm-8 col-xs-12" >
											<select class="form-control primary select2" id="rev_to_dept" name="rev_to_dept" style="width:100%;">
												<option value="" selected hidden disabled>-- Select Department --</option>
													<?php
													$sqlDept=mysql_query("select * from department");
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
						</div>
								<br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control primary select2" id="rev_to_desig" name="rev_to_desig" style="width:100%;" >
													<option value="" selected hidden disabled>-- Select Designation --</option>
												<?php
													$sqlDept=mysql_query("select * from designation");
													while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
													<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="rev_to_otherdesig" name="rev_to_otherdesig" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
							
							
							
						</div><br>
						<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type select2" id="rev_to_ps_type_a" name="rev_to_ps_type_3" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<?php echo $pay_scale_type ;?>
										</select>
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_a" style="display:none">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2 scale_a" id="rev_to_scale" name="rev_to_scale" style="width:100%;">
										<option value="" selected hidden disabled>-- Select scale --</option>
							
									</select>
								  </div>
                                </div>
						    </div>
						</div>	
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_a" style='display:none;'>
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary scale_text_a" id="rev_to_scale_text" name="rev_to_scale_text" placeholder="Enter 3rd Pay Rate" />
									</div>
								</div><br><br>
							</div>
						</div>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12" id="level_a" style="display:none">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary select2 level_a" id="rev_to_level" name="rev_to_level" style="width:100%;">
										<option value="" selected hidden disabled>-- Select Level --</option>
									</select>
								  </div>
                                </div>
						    </div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary select2" id="rev_to_group" name="rev_to_group" style="width:100%;" >
											<option value="" selected hidden disabled>-- Select Group --</option>
										 <?php
											$sqlDept=mysql_query("select * from group_col");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_idb" name="station_idb" class="other">
									<input type="text" class="form-control primary station" id="stationb" name="stationb"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="rev_to_otherstation" name="rev_to_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="rev_to_rop" name="rev_to_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" name="depot_bill_unitc" id="depot_bill_unitc">
											 <input type="text" class="form-control primary bill_unit" id="billunitc" name="billunitc"  data-toggle="modal" data-target="#bill_unit_select" readonly>
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
									<input type="text" class="form-control primary depot" id="depotc" name="depotc" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div>
					</div>
				</div>	
<!--Deputation Code-->
						<div class="row" id="deputation_tb1" style="display:none">
								<div class="col-md-6">
								<h4 id="from1"><b>Deputation From</b></h4>
								 
								<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
													<select class="form-control primary select2" id="re_de_dept" name="re_de_dept" style="width:100%;"		>
														<option value="" selected hidden disabled>-- Select Department --</option>
													<?php
													$sqlDept=mysql_query("select * from department");
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
								</div>
								<br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control primary select2" id="re_de_desig" name="re_de_desig" style="width:100%;" >
													<option value="" selected hidden disabled>-- Select Designation --</option>
												<?php
													$sqlDept=mysql_query("select * from designation");
													while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
													<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="re_de_otherdesig" name="re_de_otherdesig" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type select2" id="re_de_ps_type_b" name="re_de_ps_type_3" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<?php echo $pay_scale_type;?>
										</select>
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_b" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2 scale_b" id="re_de_scale" name="re_de_scale" style="width:100%;">
										<option value="" selected hidden disabled>-- Select scale --</option>
									
									 </select>
								  </div>
                                </div>
						    </div>
						</div>	
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_b" style='display:none;'>
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary scale_text_b" id="re_de_scale_text" name="re_de_scale_text" placeholder="Enter 3rd Pay Rate" />
									</div>
								</div><br>
							</div>
						</div>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_b">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary select2 level_b" id="re_de_level" name="re_de_level" style="width:100%;">
										<option value="" selected hidden disabled>-- Select Level --</option>
							 
									</select>
								  </div>
                                </div>
						    </div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary select2" id="re_de_group" name="re_de_group" style=		"width:100%;" >
											<option value="" selected hidden disabled>-- Select Group --</option>
										 <?php
											$sqlDept=mysql_query("select * from group_col");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_idc" name="station_idc" class="other">
									<input type="text" class="form-control primary station" id="stationc" name="stationc"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="re_de_otherstation" name="re_de_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="re_de_rop" name="re_de_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" name="depot_bill_unitd" id="depot_bill_unitd">
											 <input type="text" class="form-control primary bill_unit" id="billunitd" name="billunitd"  data-toggle="modal" data-target="#bill_unit_select" readonly>
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
									<input type="text" class="form-control primary depot" id="depotd" name="depotd" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div>							
			</div>
								
								
			<div class="col-md-6">
				<h4 id="to1"><b>Deputation To</b></h4>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary depot" id="re_de_to_dept" name="re_de_to_dept" >
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
												<input type="text" class="form-control primary depot" id="re_de_to_desc" name="re_de_to_desc" >
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
									 <input type="text" class="form-control primary depot" id="re_de_to_other" name="re_de_to_other" >
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale / Level</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary depot" id="re_de_to_ps" name="re_de_to_ps" >
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
										<input type="text" class="form-control primary depot" id="re_de_to_grp" name="re_de_to_grp" >
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Place<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="text" class="form-control primary depot" id="re_de_to_place" name="re_de_to_place" >
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary depot" id="re_de_to_rop" name="re_de_to_rop" >
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="text" class="form-control primary depot" id="re_de_to_bill_unit" name="re_de_to_bill_unit" >
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
									<input type="text" class="form-control primary depot" id="re_de_to_deopt" name="re_de_to_deopt" >
								  </div>
                                </div>
						    </div>
							 
						</div>
					</div>
				</div>	

<!--Deputation Code End-->
<!--Reparation Code Start--->

				<div class="row" id="reparation_tb1" style="display:none">
								<div class="col-md-6">
				<h4 id="to1"><b>Reparation To</b></h4>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary depot" id="rep_to_dept" name="rep_to_dept" >
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
												<input type="text" class="form-control primary depot" id="rep_to_desc" name="rep_to_desc" >
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
									 <input type="text" class="form-control primary depot" id="rep_to_oth_desc" name="rep_to_oth_desc" >
								  </div>
                                </div>
						    </div>
							
							
							
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale / Level</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary" id="rep_to_ps_level" name="rep_to_ps_level" >
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary depot" id="rep_to_grp" name="rep_to_grp" >
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Place<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="text" class="form-control primary depot" id="rep_to_place" name="rep_to_place" >
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary depot" id="rep_to_rop" name="rep_to_rop" >
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="text" class="form-control primary depot" id="rep_to_bill_unit" name="rep_to_bill_unit" >
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
									<input type="text" class="form-control primary depot" id="rep_to_deopt" name="rep_to_deopt" >
								  </div>
                                </div>
						    </div>
							 
						</div>
					</div>
					<div class="col-md-6">
						<h4 id="from1"><b>Reparation From</b></h4>
					 
						<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
										<div class="col-md-8 col-sm-8 col-xs-12" >
											<select class="form-control primary select2" id="rep_from_dept" name="rep_from_dept" style="width:100%;"		>
												<option value="" selected hidden disabled>-- Select Department --</option>
											<?php
												$sqlDept=mysql_query("select * from department");
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
						</div>
								<br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
												<select class="form-control primary select2" id="rep_from_desg" name="rep_from_desg" style="width:100%;" >
													<option value="" selected hidden disabled>-- Select Designation --</option>
												<?php
													$sqlDept=mysql_query("select * from designation");
													while($rwDept=mysql_fetch_array($sqlDept))
													{
													?>
													<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desiglongdesc"];?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Designation<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary" id="rep_from_oth_desg" name="rep_from_oth_desg" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type select2" id="rep_from_ps_type_c" name="rep_from_ps_type_3" style="margin-top:0px; width:100%;" >
											<option value="" selected hidden disabled>-- Select PC Type --</option>
											<?php echo $pay_scale_type ;?>
										</select>
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_c" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2 scale_c" id="rep_from_scale" name="rep_from_scale" style="width:100%;">
										<option value="" selected hidden disabled>-- Select scale --</option>
							 
									</select>
								  </div>
                                </div>
						    </div>
						</div>	
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_c" style='display:none;'>
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary scale_text_c" id="rep_from_scale_text" name="rep_from_scale_text" placeholder="Enter 3rd Pay Rate" />
									</div>
								</div><br><br>
							</div>
						</div>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_c">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary select2 level_c" id="rep_from_level" name="rep_from_level" style="width:100%;">
										<option value="" selected hidden disabled>-- Select Level --</option>
									</select>
								  </div>
                                </div>
						    </div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary select2" id="rep_from_group" name="rep_from_group" style="width:100%;" >
											<option value="" selected hidden disabled>-- Select Group --</option>
										 <?php
											$sqlDept=mysql_query("select * from group_col");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["group_col"]; ?></option>
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
						 <div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_idd" name="station_idd" class="other">
									<input type="text" class="form-control primary station" id="stationd" name="stationd"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="rep_from_otherstation" name="rep_from_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="rep_from_rop" name="rep_from_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" name="depot_bill_unite" id="depot_bill_unite">
											 <input type="text" class="form-control primary bill_unit" id="billunite" name="billunite"  data-toggle="modal" data-target="#bill_unit_select" readonly>
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
									<input type="text" class="form-control primary depot" id="depote" name="depote" readonly>
								  </div>
                                </div>
						    </div>
						</div>							
					</div>
				</div>	
<!--Reparation Code end--->

						<hr  style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Carried Out<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary return2" id="rep_from_rev_carried" name="rep_from_rev_carried" style="width:100%;">
									<option value="" selected disabled>-- Select Carried Out --</option>
									<option value="Yes">Carried Out</option>
									<option value="No">Returned</option>
									 </select>
									 
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row" id="return2" style="display:none;">
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter NO.</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_rev_acc_ltr_no" name="prtf_rev_acc_ltr_no" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary calender_picker" id="prtf_rev_acc_ltr_date" name="prtf_rev_acc_ltr_date" />
									  </div>
									</div>
								</div>	
							</div><br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >WEF Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary calender_picker" id="rev_carr_wef_date" name="rev_carr_wef_date" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Remark</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="rev_carr_remark" name="rev_carr_remark" />
									  </div>
									</div>
								</div>	
							</div>
						
						
						
						</div>
					   <div class="row" id="notreturn2">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >W.E.F Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="text" class="form-control primary calender_picker" id="rep_rev_wefdate" name="rep_rev_wefdate"   />
								  </div>
                                </div>
								
						</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date of Incr.</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="text" class="form-control primary calender_picker" id="rep_rev_incrdate" name="rep_rev_incrdate"   />
								  </div>
                                </div>
								
						    </div>
						</div><br>
						   
							<br>
				<div class="form-group">
				<div class="col-sm-2 col-xs-12 pull-right">
					
					<input type="submit" id="btnSave" name="btnSave" value="Update"  class="btn btn-success" />
					<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
					 
					<br>
					<br>
					<br>
				</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12" align="center">
			<a href="prft_update.php?pf=<?php echo $_SESSION['set_update_pf']?>" class="btn btn-primary">Back</a>
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
	// PRFT 
		  
	var rev='<?php echo $pf_no;?>';
	if(rev!='rev'){
		
		var prft_pf_no = '<?php echo "".$pf_no;?>';
	var prft_id='<?php echo "".$id;?>';
	
	$.ajax({
	type:"post",
	url:"process_main.php",
	data:"action=get_prft_reversion2&prft_pf_no="+prft_pf_no+"&prft_id="+prft_id,
	success:function(data){
			
			//alert(data);
		var arr=JSON.parse(data);
		//alert(arr);
		//alert(arr['rev_ordertype']);
			  
			if(arr['rev_order_type']=='Under DAR' || arr['rev_order_type']=='Own Request'|| arr['rev_order_type']=='Medically Decategories')
			{
				$("#revform").show();	
				
				$('#rev_ordertype').val(arr['rev_order_type']).trigger('change');
				$("#rev_letterno").val(arr['rev_letter_no']);
				$('#rev_letterdate').val(arr['rev_letter_date']);
				$('#rev_wef').val(arr['rev_wef']);
				$('#rev_frm_dept').val(arr['rev_frm_dept']).trigger('change');
				$('#rev_frm_desig').val(arr['rev_frm_desig']).trigger('change');
				$('#rev_frm_otherdesig').val(arr['rev_frm_othr_desig']);
				$('#rev_frm_ps_type_9').html(arr['rev_frm_pay_scale_type']);
				
				 
				$('#rev_frm_scale').html(arr['rev_frm_scale']);
				$('#rev_frm_scale_text').val(arr['rev_frm_scale']);
				$('#rev_frm_level').html(arr['rev_frm_level']);
				
				
				$('#rev_frm_group').val(arr['rev_frm_group']).trigger('change');
				$('#stationa').val(arr['rev_frm_station']);
                $('#station_ida').val(arr['rev_frm_station']);
				//alert(arr['rev_frm_othr_station']);
				$('#rev_frm_otherstation').val(arr['rev_frm_othr_station']);
				$('#rev_frm_rop').val(arr['rev_frm_rop']);
	
				$('#billunitb').val(arr['rev_frm_billunit']);
                $('#depot_bill_unitb').val(arr['rev_frm_billunit_value']);
				$('#depotb').val(arr['rev_frm_depot']);
				
				$('#rev_to_dept').val(arr['rev_to_dept']).trigger('change');
				$('#rev_to_desig').val(arr['rev_to_desig']).trigger('change');
				$('#rev_to_otherdesig').val(arr['rev_to_othr_desig']);
				$('#rev_to_ps_type_a').html(arr['rev_to_pay_scale_type']);
				
				
				$('#rev_to_scale').html(arr['rev_to_scale']);
				$('#rev_to_scale_text').val(arr['rev_to_scale']);
				$('#rev_to_level').html(arr['rev_to_level']);
				
				$('#rev_to_group').val(arr['rev_to_group']).trigger('change');
				$('#stationb').val(arr['rev_to_station']);
                $('#station_idb').val(arr['rev_to_station']);
				$('#rev_to_otherstation').val(arr['rev_to_othr_station']);
				$('#rev_to_rop').val(arr['rev_to_rop']);
				$('#billunitc').val(arr['rev_to_billunit']);
	
                $('#depot_bill_unitc').val(arr['rev_to_billunit_value']);
				$('#depotc').val(arr['rev_to_depot']);
				
				if(arr['frm_ps_value']=="5")
				{
					$("#level_9").show();
					
				}else if(arr['frm_ps_value']=="1")
				{
					$("#scale_text_9").show();
				}
				else{
					$("#scale_9").show();
				}
				
				if(arr['to_ps_type']=="5")
				{
					$("#level_a").show();
				}else if(arr['to_ps_type']=="1")
				{
					$("#scale_text_a").show();
				}
				else{
					$("#scale_a").show();
				}
			}
			
			else if(arr['rev_order_type']=='Deputation')
			{
				
				$("#deputation_tb1").show();
				$('#rev_ordertype').val(arr['rev_order_type']).trigger('change');
				$("#rev_letterno").val(arr['rev_letter_no']);
				$('#rev_letterdate').val(arr['rev_letter_date']);
				$('#rev_wef').val(arr['rev_wef']);
				
				$('#re_de_dept').val(arr['rev_frm_dept']).trigger('change');
				$('#re_de_desig').val(arr['rev_frm_desig']).trigger('change');
				$('#re_de_otherdesig').val(arr['rev_frm_othr_desig']);
				 
				$('#re_de_ps_type_b').html(arr['rev_frm_pay_scale_type']);
				 
				$('#re_de_scale').html(arr['rev_frm_scale']);
				$('#re_de_scale_text').html(arr['rev_frm_scale']);
				$('#re_de_level').html(arr['rev_frm_level']);
				
				//alert(arr['rev_frm_level']);
				
				$('#re_de_group').val(arr['rev_frm_group']).trigger('change');
				$('#stationc').val(arr['rev_frm_station']);
                $('#station_idc').val(arr['rev_frm_station']);
				$('#re_de_otherstation').val(arr['rev_frm_othr_station']);
				$('#re_de_rop').val(arr['rev_frm_rop']);
				$('#billunitd').val(arr['rev_frm_billunit']);
				
                $('#depot_bill_unitd').val(arr['rev_frm_billunit_value']);
				$('#depotd').val(arr['rev_frm_depot']);
				
				$('#re_de_to_dept').val(arr['rev_to_dept']);
				$('#re_de_to_desc').val(arr['rev_to_desig']);
				$('#re_de_to_other').val(arr['rev_to_othr_desig']);				
				$('#re_de_to_ps').val(arr['to_ps_type']);				
				$('#re_de_to_grp').val(arr['rev_to_group']);
				$('#re_de_to_place').val(arr['rev_to_station']);
				 
			    
				$('#re_de_to_rop').val(arr['rev_to_rop']);
				$('#re_de_to_bill_unit').val(arr['rev_to_billunit']);
				$('#re_de_to_deopt').val(arr['rev_to_depot']);
				/* $('#rev_carr_wef_date').val(arr['rev_carri_wef']);
				$('#prtf_rev_acc_ltr_date').val(arr['rev_car_re_accept_ltr_date']); */
				//alert(arr['frm_ps_value']);
				
				if(arr['frm_ps_value']=="5")
					{
						$("#level_b").show();
						
					}else if(arr['frm_ps_value']=="1"){
						$("#scale_text_b").show();
						$(".scale_text_b").val(arr['rev_frm_scale']);
					}
					else{
						$("#scale_b").show();
					}
			}
			else 
			{
				 
				$("#reparation_tb13").show();
				$('#rev_ordertype').val(arr['rev_order_type']).trigger('change');
				$("#rev_letterno").val(arr['rev_letter_no']);
				$('#rev_letterdate').val(arr['rev_letter_date']);
				$('#rev_wef').val(arr['rev_wef']);
				
				$('#rep_to_dept').val(arr['rev_to_dept']);
				$('#rep_to_desc').val(arr['rev_to_desig']);
				$('#rep_to_oth_desc').val(arr['rev_to_othr_desig']);				
				$('#rep_to_grp').val(arr['rev_to_group']);
				$('#rep_to_place').val(arr['rev_to_station']);
				$('#rep_to_ps_level').val(arr['to_ps_type']);
				$('#rep_to_rop').val(arr['rev_to_rop']);
				$('#rep_to_bill_unit').val(arr['rev_to_billunit_value']);
				$('#rep_to_deopt').val(arr['rev_to_depot']);
				
				
				$('#rep_from_dept').val(arr['rev_frm_dept']).trigger('change');
				$('#rep_from_desg').val(arr['rev_frm_desig']).trigger('change');
				$('#rep_from_oth_desg').val(arr['rev_frm_othr_desig']);
				$('#rep_from_ps_type_c').html(arr['rev_frm_pay_scale_type']);
				$('#rep_from_scale').html(arr['rev_frm_scale']);
				$('#rep_from_scale_text').val(arr['rev_frm_scale']);
				$('#rep_from_level').html(arr['rev_frm_level'])
				$('#rep_from_group').val(arr['rev_frm_group']).trigger('change');
				$('#stationd').val(arr['rev_frm_station']);
				$('#station_idd').val(arr['rev_frm_station']);
				$('#rep_from_otherstation').val(arr['rev_frm_othr_station']);
				$('#rep_from_rop').val(arr['rev_frm_rop']);
				$('#depot_bill_unite').val(arr['rev_frm_billunit_value']);
				$('#billunite').val(arr['rev_frm_billunit']);
				$('#depote').val(arr['rev_frm_depot']);
				
				if(arr['frm_ps_value']=="5")
					{
						$("#level_c").show();
					}else if(arr['frm_ps_value']=="1")
					{
						$("#scale_text_c").show();
					}
					else
					{
						$("#scale_c").show();
					}
			} 
			
		if(arr['rev_carried_out_type'] == 'No')
		  {
			 
			$("#return2").show();
			$("#notreturn2").hide();
			
			$('#prtf_rev_acc_ltr_date').val(arr['rev_car_re_accept_ltr_date']);
			$('#rev_carr_wef_date').val(arr['rev_car_re_wef_date']);
			
			//alert(arr['rev_car_re_accept_ltr_date']);
			//alert(arr['rev_car_re_wef_date']);
		  }
		  else{
			  
			  $("#return2").hide();
			  $("#notreturn2").show();
			  
			  $('#rep_rev_wefdate').val(arr['rev_carri_wef']);
			  $('#rep_rev_incrdate').val(arr['rev_carri_date_of_incr']);
		  }
           	$('#rep_from_rev_carried').val(arr['rev_carried_out_type']).trigger('change');
			
          // 	$('#rep_rev_wefdate').val(arr['rev_carri_wef']);
          // 	$('#rep_rev_incrdate').val(arr['rev_carri_date_of_incr']);
			
           	$('#prtf_rev_acc_ltr_no').val(arr['rev_car_re_accept_ltr_no']);
           //	$('#prtf_rev_acc_ltr_date').val(arr['rev_car_re_accept_ltr_date']);
           //	$('#rev_carr_wef_date').val(arr['rev_carri_wef']);
           	$('#rev_carr_remark').val(arr['rev_car_re_remark']);
	  }
    });
		
	}
	
 
</script>
 
<?php include_once('../global/footer.php');?>  
<script>
 $('#rep_from_rev_carried').on('change', function() {
		  if ($(this).val() == 'Yes')
		  {
			   $("#return2").hide();
			  $("#notreturn1").show(); 
			$("#prtf_rev_acc_ltr_no").val('');
			$("#prtf_rev_acc_ltr_date").val('');
			$("#rev_carr_wef_date").val('');
			$("#rev_carr_remark").val('');
		  }
		  else{
			$("#return2").show();
			$("#notreturn2").hide();
			  	$('#rep_rev_wefdate').val('');
       	        $('#rep_rev_incrdate').val('');
		  }
		   
		});
 </script>