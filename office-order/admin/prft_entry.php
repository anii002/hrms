 <?php $_GLOBALS['a'] = 'prft';
	include_once('../global/header1.php'); 
	?>
<script src="javascript.js"></script>
<!--prft Tab Start -->
				<div style="padding:50px;border:1px solid black;margin:10px;">
					<div class="box-header with-border">
								<ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
								<li class="active"><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
								<li class=""><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
								<li class=""><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
								<li class=""><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
								</ul>
					</div>
				<div class="tab-content">
				 <div class="tab-pane active in" id="prft">
				 <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
						
					
		<form method="post" action="process_main.php?action=add_prtf_promotion" class="apply_readonly">
				<div class="modal-body">
				<h3>Promotion</h3><hr>
					<div class="row">	 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12 " >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control primary TextNumber common_pf_number" id="pm_pf" name="pm_pf"  placeholder="Enter PF No." readonly> 
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Order Type<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary odrtype select2" id="pm_ordertype" name="pm_ordertype" style="width:100%;" required >
											<option value="" selected hidden disabled>-- Select Order Type --</option>
											<?php
											dbcon1();
												$sqlDept=mysql_query("select * from promotion_order_type");
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
										<input type="text" class="form-control primary " id="pm_letterno" name="pm_letterno" placeholder="Enter Letter No"  />
									</div>
                                </div>
						    </div>	 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter Date</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="text" class="form-control primary calender_picker" id="pm_letterdate" name="pm_letterdate"   />
									</div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >With Effect From</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary calender_picker" id="pm_wef" name="pm_wef">
									</div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row" id="promoform" style="display:none">
							<div class="col-md-6">
								<h4 id="from1"><b>Promotion From</b></h4>
								<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
											<div class="col-md-8 col-sm-8 col-xs-12" >
												<select class="form-control primary select2" id="pm_frm_dept" name="pm_frm_dept" style="width:100%;"		>
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
												<select class="form-control primary select2" id="pm_frm_desig" name="pm_frm_desig" style="width:100%;" >
												<option value="" selected hidden disabled>-- Select Designation --</option>
												<?php
													echo $alldesignations;
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
									 <input type="text" class="form-control primary" id="pm_frm_otherdesig" name="pm_frm_otherdesig" placeholder="Enter Designation" />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale TYPE</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary ps_type select2" id="pm_frm_ps_type_5" name="pm_frm_ps_type_3" style="margin-top:0px; width:100%;" >
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
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_5" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2 scale_5" id="pm_frm_scale" name="pm_frm_scale" style="width:100%;">
										<option value="" selected hidden disabled>-- Select scale --</option>
							 
									</select>
								  </div>
                                </div>
						    </div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_5" style='display:none;'>
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary scale_text_5" id="pm_frm_scale_text" name="pm_frm_scale_text" placeholder="Enter 3rd Pay Rate" />
									</div>
								</div><br><br>
							</div>
						</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_5">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary select2 level_5" id="pm_frm_level" name="pm_frm_level" style="width:100%;">
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
									<select class="form-control primary select2" id="pm_frm_group" name="pm_frm_group" style="width:100%;" >
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
							  <input type="hidden" id="station_id1" name="station_id1" class="other">
								<input type="text" class="form-control primary station" id="station1" name="station1"  data-toggle="modal" data-target="#station" readonly>
							  </div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="text" class="form-control primary TextNumber" id="pm_frm_otherstation" name="pm_frm_otherstation"  placeholder="Enter Station Name"  />
							  </div>
							</div>
						</div>
					</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="pm_frm_rop" name="pm_frm_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" name="depot_bill_unita" id="depot_bill_unita">
											 <input type="text" class="form-control primary bill_unit" id="billunita" name="billunita"  data-toggle="modal" data-target="#bill_unit_select" readonly>
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
									<input type="text" class="form-control primary depot" id="depota" name="depota" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div>							
			</div>					
			<div class="col-md-6">
				<h4 id="to1"><b>Promotion To</b></h4>
			
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
													<select class="form-control primary select2" id="pm_to_dept" name="pm_to_dept" style="width:100%;"		>
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
												<select class="form-control primary select2" id="pm_to_desig" name="pm_to_desig" style="width:100%;" >
												<option value="" selected hidden disabled>-- Select Designation --</option>
												<?php
													echo $alldesignations;
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
									 <input type="text" class="form-control primary" id="pm_to_otherdesig" name="pm_to_otherdesig" placeholder="Enter Designation" />
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
										<select class="form-control primary ps_type select2" id="pm_to_ps_type_6" name="pm_to_ps_type_3" style="margin-top:0px; width:100%;" >
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
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_6" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2 scale_6" id="pm_to_scale" name="pm_to_scale" style="width:100%;">
									<option value="" selected hidden disabled>-- Select scale --</option>
									
									 </select>
								  </div>
                                </div>
						    </div>
						</div>	
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_6" style='display:none;'>
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary scale_text_6" id="pm_to_scale_text" name="pm_to_scale_text" placeholder="Enter 3rd Pay Rate" />
									</div>
								</div><br><br>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="level_6" style="display:none;" >
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary select2 level_6" id="pm_to_level" name="pm_to_level" style="width:100%;">
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
										<select class="form-control primary select2" id="pm_to_group" name="pm_to_group" style=		"width:100%;" >
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
								  <input type="hidden" id="station_id7" name="station_id7" class="other">
									<input type="text" class="form-control primary station" id="station7" name="station7"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="pm_to_otherstation" name="pm_to_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="pm_to_rop" name="pm_to_rop" placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" name="depot_bill_unit5" id="depot_bill_unit5">
											 <input type="text" class="form-control primary bill_unit" id="billunit5" name="billunit5"  data-toggle="modal" data-target="#bill_unit_select" readonly>
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
									<input type="text" class="form-control primary depot" id="depot5" name="depot5" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div>
					</div>
				</div>	
<!--Deputation Code start-->
				<div class="row" id="deputation_tb" style="display:none">
					<div class="col-md-6">
						<h4 id="from1"><b>Deputation From</b></h4>
						 
						<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<select class="form-control primary select2" id="dp_frm_dept" name="dp_frm_dept" style="width:100%;"		>
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
										<select class="form-control primary select2" id="dp_frm_desig" name="dp_frm_desig" style="width:100%;" >
											<option value="" selected hidden disabled>-- Select Designation --</option>
											<?php
												echo $alldesignations;
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
										<input type="text" class="form-control primary" id="dp_frm_otherdesig" name="dp_frm_otherdesig" placeholder="Enter Designation" />
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
										<select class="form-control primary ps_type select2" id="dp_frm_ps_type_7" name="dp_frm_ps_type_3" style="margin-top:0px; width:100%;" >
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
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_7" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<select class="form-control primary select2 scale_7" id="dp_frm_scale" name="dp_frm_scale" style="width:100%;">
											<option value="" selected hidden disabled>-- Select scale --</option>
										</select>
									</div>
                                </div>
						    </div>
						</div>	
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_7" style='display:none;'>
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary scale_text_7" id="dp_frm_scale_text" name="dp_frm_scale_text" placeholder="Enter 3rd Pay Rate" />
									</div>
								</div><br><br>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_7">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary select2 level_7" id="dp_frm_level" name="dp_frm_level" style="width:100%;">
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
										<select class="form-control primary select2" id="dp_frm_group" name="dp_frm_group" style=		"width:100%;" >
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
										<input type="hidden" id="station_id8" name="station_id8" class="other">
										<input type="text" class="form-control primary station" id="station8" name="station8"  data-toggle="modal" data-target="#station" readonly>
									</div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary TextNumber" id="dp_frm_otherstation" name="dp_frm_otherstation"  placeholder="Enter Station Name"  />
									</div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary onlyNumber" id="dp_frm_rop" name="dp_frm_rop"   placeholder="Enter ROP"  />
									</div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" name="depot_bill_unit6" id="depot_bill_unit6">
									 <input type="text" class="form-control primary bill_unit" id="billunit6" name="billunit6"  data-toggle="modal" data-target="#bill_unit_select" readonly>
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
									<input type="text" class="form-control primary depot" id="depot6" name="depot6" readonly>
								  </div>
                                </div>
						    </div> 
						</div>							
					</div>
								
<!--Deputation from end-->								
<!--Deputation to start-->								
			<div class="col-md-6">
				<h4 id="to1"><b>Deputation To</b></h4>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary depot" id="dp_to_dept" name="dp_to_dept" >
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
												<input type="text" class="form-control primary depot" id="dp_to_desig" name="dp_to_desig" >
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
									 <input type="text" class="form-control primary depot" id="dp_to_othr_desig" name="dp_to_othr_desig" >
								  </div>
                                </div>
						    </div>
							
							
							
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale / Level</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary depot" id="dp_to_pay_scale_level" name="dp_to_pay_scale_level" >
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary depot" id="dp_to_grp" name="dp_to_grp" >
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
								  <input type="text" class="form-control primary depot" id="dp_to_place" name="dp_to_place" >
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary depot" id="dp_to_rop" name="dp_to_rop" >
								  </div>
                                </div>
						    </div>
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
										  <div class="col-md-8 col-sm-8 col-xs-12">
										  <input type="hidden" class="form-control primary depot" id="depot_bill_unit7" name="depot_bill_unit7" >
										  <input type="text" class="form-control primary depot" id="billunit7" name="billunit7" >
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
									<input type="text" class="form-control primary depot" id="depot7" name="depot7" >
								  </div>
                                </div>
						    </div>
							 
						</div>
					</div>
				</div>	

<!--Deputation Code End-->
<!--Reparation Code Start--->

				<div class="row" id="reparation_tb" style="display:none">
								<div class="col-md-6">
				<h4 id="to1"><b>Reptriation From</b></h4>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary depot" id="re_to_dept" name="re_to_dept" >
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
												<input type="text" class="form-control primary depot" id="re_to_desig" name="re_to_desig" >
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
									 <input type="text" class="form-control primary depot" id="re_to_otr_desig" name="re_to_otr_desig" >
								  </div>
                                </div>
						    </div>
							
							
							
						</div><br>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12" id="">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Pay Scale / Level</label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary depot" id="re_to_pay_scale" name="re_to_pay_scale" >
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12" >Group<span class=""></span></label>
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input type="text" class="form-control primary depot" id="re_to_group" name="re_to_group" >
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
								  <input type="text" class="form-control primary depot" id="re_to_place" name="re_to_place" >
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
						
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary depot" id="re_to_rop" name="re_to_rop" >
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="depot_bill_unit8" name="depot_bill_unit8" >
								  <input type="text" class="form-control primary depot" id="billunit8" name="billunit8" >
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
									<input type="text" class="form-control primary depot" id="depot8" name="depot8">
								  </div>
                                </div>
						    </div> 
						</div>
					</div>	
					<div class="col-md-6">
						<h4 id="from1"><b>Reptriation To</b></h4>
					 
						<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<select class="form-control primary select2" id="re_frm_dept" name="re_frm_dept" style="width:100%;">
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
										<select class="form-control primary select2" id="re_frm_desig" name="re_frm_desig" style="width:100%;" >
										<option value="" selected hidden disabled>-- Select Designation --</option>
										<?php
											echo $alldesignations;
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
									 <input type="text" class="form-control primary" id="re_frm_otherdesig" name="re_frm_otherdesig" placeholder="Enter Designation" />
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
										<select class="form-control primary ps_type select2" id="re_frm_ps_type_8" name="re_frm_ps_type_3" style="margin-top:0px; width:100%;" >
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
						<div class="col-md-12 col-sm-12 col-xs-12" id="scale_8" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2 scale_8" id="re_frm_scale" name="re_frm_scale" style="width:100%;">
										<option value="" selected hidden disabled>-- Select scale --</option>
							 
									</select>
								  </div>
                                </div>
						    </div>
						</div>	
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_8" style='display:none;'>
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
									<div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" class="form-control primary scale_text_8" id="re_frm_scale_text" name="re_frm_scale_text" placeholder="Enter 3rd Pay Rate" />
									</div>
								</div><br><br>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_8">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary select2 level_8" id="re_frm_level" name="re_frm_level" style="width:100%;">
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
										<select class="form-control primary select2" id="re_frm_group" name="re_frm_group" style=		"width:100%;" >
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
								  <input type="hidden" id="station_id9" name="station_id9" class="other">
									<input type="text" class="form-control primary station" id="station9" name="station9"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="re_frm_otherstation" name="re_frm_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Rate Of Pay<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary onlyNumber" id="re_frm_rop" name="re_frm_rop"   placeholder="Enter ROP"  />
								  </div>
                                </div>
						    </div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" name="depot_bill_unit9" id="depot_bill_unit9">
									 <input type="text" class="form-control primary bill_unit" id="billunit9" name="billunit9"  data-toggle="modal" data-target="#bill_unit_select" readonly>
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
									<input type="text" class="form-control primary depot" id="depot9" name="depot9" readonly>
								  </div>
                                </div>
						    </div> 
						</div>							
					</div>			
				</div>	
			<!--Reparation Code end--->
					
				<!--Carried Out Code Start-->
						<hr  style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Carried Out<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary return1 select2" id="prtf_carried" name="prtf_carried" style="width:100%;">
									<option value="" selected hidden disabled>-- Select Carried Out --</option>
									<option value="Yes">Carried Out</option>
									<option value="No">Returned</option>
									 </select>
									 
								  </div>
                                </div>
						    </div>
							 
						</div><br>
						<div class="row" id="return" style="display:none;">
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter NO.</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_acc_ltr_no" name="prtf_acc_ltr_no" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary calender_picker" id="prtf_acc_ltr_date" name="prtf_acc_ltr_date" />
									  </div>
									</div>
								</div>	
							</div><br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >WEF Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary calender_picker" id="prtf_carr_wef_date" name="prtf_carr_wef_date" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Remark</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary" id="prtf_carr_remark" name="prtf_carr_remark" />
									  </div>
									</div>
								</div>	
							</div>
						
						
						
						</div>
					   <div class="row" id="notreturn">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >W.E.F Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="text" class="form-control primary calender_picker" id="prtf_wefdate" name="prtf_wefdate"   />
								  </div>
                                </div>
								
						</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date of Incr.</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="text" class="form-control primary calender_picker" id="prtf_incrdate" name="prtf_incrdate"   />
								  </div>
                                </div>
								
						    </div>
						</div><br>
						   
						
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
				
				
		<div class="tab-pane" id="rever">
			<h3 class="box-title">
			<i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
			
			<div class="box-body">
		<form method="post" action="process_main.php?action=add_prtf_reversion" class="apply_readonly">
				<div class="modal-body">
				<h3>Reversion</h3><hr>
					<div class="row">
						 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control primary TextNumber common_pf_number" id="rev_pf" name="rev_pf"  placeholder="Enter PF No." readonly> 
								  </div>
                                </div>
						    </div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Order Type<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select class="form-control primary odrtype1 select2" id="rev_ordertype" name="rev_ordertype" style="width:100%;" >
									<option value="" selected hidden disabled>-- Select Order Type --</option>
									<?php
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
								<h4 style="display:none;" id="from3"><b>From</b></h4>
								<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
													<select class="form-control primary select2" id="rev_frm_dept" name="rev_frm_dept" style="width:100%;"		>
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
													echo $alldesignations;
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
											<?php
											echo $pay_scale_type;
										   ?>
										</select>
									</div>
								</div>
							</div>
						</div><br>
						
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_9" style="display:none;">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Scale</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2 scale_9" id="rev_frm_scale" name="rev_frm_scale" style="width:100%;">
										<option value="" selected hidden disabled>-- Select scale --</option>
									 
									 </select>
								  </div>
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
							<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_9">
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
				<h4 style="display:none" id="to3"><b>To</b></h4>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
												<div class="col-md-8 col-sm-8 col-xs-12" >
													<select class="form-control primary select2" id="rev_to_dept" name="rev_to_dept" style="width:100%;"		>
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
													echo $alldesignations;
												
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
											<?php
											echo $pay_scale_type;
										?>
										</select>
									</div>
								</div>
							</div>
								
								</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12" id="scale_a" style="display:none;">
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
							<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_a">
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
										<select class="form-control primary select2" id="rev_to_group" name="rev_to_group" style=		"width:100%;" >
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
								<h4 style="display:none;" id="from"><b>From</b></h4>
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
													echo $alldesignations;
												
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
											<?php
											echo $pay_scale_type;
										?>
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
									</div><br><br>
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
				<h4 id="to1"><b>Reptriation From</b></h4>
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
						<h4 id="from1"><b>Reptriation To</b></h4>
						<!--h4 style="display:none;" id="from"><b>From</b></h4-->
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
													echo $alldesignations;
												
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
											<?php
											echo $pay_scale_type;
										?>
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
									<select class="form-control primary return2 select2" id="rep_from_rev_carried" name="rep_from_rev_carried" style="width:100%;">
									<option value="" selected hidden disabled>-- Select Carried Out --</option>
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
					
					<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
					<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
					 
					<br>
					<br>
					<br>
				</div>
				</div>
					
			
            </div>
			</form>
            </div>
		</div>
		
		 


<div class="tab-pane" id="trans">
		<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
			
			<h3>Transfer</h3>
			<div class="box-body">
					<form method="post" action="process_main.php?action=add_prtf_transfer" class="apply_readonly">
				<div class="modal-body">
					<div class="row">
						<div class="row">
						 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control primary TextNumber common_pf_number" id="tf_pf" name="tf_pf"  placeholder="Enter PF No."readonly> 
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

											$sqlDept=mysql_query("select * from order_type_transfer");
											while($rwDept=mysql_fetch_array($sqlDept))
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
									  <input type="text" class="form-control primary" id="tf_letterno" name="tf_letterno" placeholder="Enter Letter No"  />
								  </div>
                                </div>
						    </div>	 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="text" class="form-control primary calender_picker" id="tf_letterdate" name="tf_letterdate"   />
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
								<h4 id="from1"><b>Transfer From</b></h4>
								<h4 style="display:none;" id="from"><b>From</b></h4>
								<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
											<div class="col-md-8 col-sm-8 col-xs-12" >
												<select class="form-control primary select2" id="tran_frm_dept" name="tran_frm_dept" style="width:100%;"		>
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
												<select class="form-control primary select2" id="tran_frm_desig" name="tran_frm_desig" style="width:100%;" >
														<option value="" selected hidden disabled>-- Select Designation --</option>
																<?php
														echo $alldesignations;
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
										<input type="text" class="form-control primary scale_text_m" id="tran_frm_scale_text" name="tran_frm_scale_text" placeholder="Enter 3rd Pay Rate" />
									</div>
								</div><br><br>
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
												<select class="form-control primary select2" id="tran_to_desig" name="tran_to_desig" style="width:100%;" >
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
										<input type="text" class="form-control primary scale_text_n" id="tran_to_scale_text" name="tran_to_scale_text" placeholder="Enter 3rd Pay Rate" />
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
										<select class="form-control primary select2" id="tran_to_group" name="tran_to_group" style=		"width:100%;" >
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
										  <input type="text" class="form-control primary" id="prtf_rev_acc_ltr_no1" name="prtf_rev_acc_ltr_no" />
									  </div>
									</div>
								</div>	
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Acceptance Letter Date</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										  <input type="text" class="form-control primary calender_picker" id="prtf_rev_acc_ltr_date1" name="prtf_rev_acc_ltr_date" />
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
									  <input type="text" class="form-control primary calender_picker" id="prtf_rev_incrdate" name="prtf_rev_incrdate"   />
								  </div>
                                </div>
								
						    </div>
						</div><br>
						   
							<br>
				<div class="form-group">
				<div class="col-sm-2 col-xs-12 pull-right">
					
					<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
					<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
					 
					<br>
					<br>
					<br>
				</div>
				</div>
							<br>
				
					
			
            </div>
			</form>
            </div>
		</div>
		</div>
		</div>
		
<!--- Fixation Tab Start-->
		

<div class="tab-pane" id="fix">
		<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>		
			<h3>Fixation</h3><hr>
			<div class="box-body">
					<form method="post" action="process_main.php?action=add_prtf_fixation" class="apply_readonly">
				<div class="modal-body">
					<div class="row">
						 <div class="row">
						 
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control primary TextNumber common_pf_number" id="fx_pf" name="fx_pf"  placeholder="Enter PF No."/ readonly> 
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
											$sqlDept=mysql_query("select * from  order_type_fixation");
											while($rwDept=mysql_fetch_array($sqlDept))
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
											<option value="blank" selected></option>
										 
										 </select>
									  </div>
									</div>
								</div>
								
								<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_e" style='display:none;'>
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
										<div class="col-md-8 col-sm-8 col-xs-12" >
											<input type="text" class="form-control primary scale_text_e" id="fx_frm_scale_text" name="fx_frm_scale_text" placeholder="Enter 3rd Pay Rate" />
										</div>
									</div><br><br>
								</div>
						
								<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_e">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
									  <div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary select2 level_e" id="fx_frm_level" name="fx_frm_level" style="width:100%;">
											<option value="blank" selected></option>
								 
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
											<option value="blank" selected></option>
										 
										 </select>
									  </div>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_p" style='display:none;'>
									<div class="form-group">
										<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Scale</label>
										<div class="col-md-8 col-sm-8 col-xs-12" >
											<input type="text" class="form-control primary scale_text_p" id="fx_to_scale_text" name="fx_to_scale_text" placeholder="Enter 3rd Pay Rate" />
										</div>
									</div><br><br>
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12" style="display:none;" id="level_p">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Level<span class=""></span></label>
									  <div class="col-md-8 col-sm-8 col-xs-12">
										<select class="form-control primary select2 level_p" id="fx_to_level" name="fx_to_level" style="width:100%;">
											<option value="blank" selected></option>
								 
										</select>
									  </div>
									</div>
								</div>
							</div>
							</div>
							
							</div>
						<!--div class="row">
						 <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" id="station_idf" name="station_idf" class="other">
									<input type="text" class="form-control primary station" id="stationf" name="stationf"  data-toggle="modal" data-target="#station" readonly>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Station<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary TextNumber" id="fx_otherstation" name="fx_otherstation"  placeholder="Enter Station Name"  />
								  </div>
                                </div>
						    </div>
							
						</div><br-->
						<!--div class="row">
						
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
								  <input type="hidden" name="depot_bill_uniti" id="depot_bill_uniti">
									 <input type="text" class="form-control primary bill_unit" id="billuniti" name="billuniti"  data-toggle="modal" data-target="#bill_unit_select" readonly>
								  </div>
                                </div>
						    </div>
						</div><br-->
						<!--div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot/Workplace<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control primary depot" id="depoti" name="depoti" readonly>
								  </div>
                                </div>
						    </div>
							 
						</div--><hr  style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						
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
				<div class="col-sm-2 col-xs-12 pull-right">
					
					<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
					<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
					 
					<br>
					<br>
					<br>
				</div>
				</div>
					
			
            </div>
			</form>
            </div>
		</div>	
		</div>	
		</div>	
			<?php include_once('../global/footer.php');?> 
	<!--- Fixation Tab End-->

		       <!--prft Tab End -->