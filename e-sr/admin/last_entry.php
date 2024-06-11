 <!--Last Tab Start -->
					<?php
					$_GLOBALS['a'] = 'last_entry';
					include_once('../global/header1.php');?>
					<div style="padding:50px;border:1px solid black;margin:10px;">
					 <div class="box-header with-border">
								  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Last Entry</h3>
								</div><br>
									 <form action="process_main.php?action=add_lastentry" method="POST" class="apply_readonly">
					
					<div class="clearfix"></div>
					
					<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="le_pf_no" name="le_pf_no" class="form-control TextNumber common_pf_number" placeholder="Enter PF Number" required readonly >
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date of Joining</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="le_doj" name="le_doj" class="form-control TextNumber calender_picker" readonly placeholder="Select Date">
								  </div>
                                </div>
						    </div>
					</div >
					<br>
					<div class="row" id="schedule_id">
						<div class="col-md-6 col-sm-12 col-xs-12"> 
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Retirement Type</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="le_retiredment_type" id="le_retiredment_type" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<option selected disabled>Select Retirement Type</option>
											<?php
												dbcon();
												$sqlretired=mysql_query("select * from  retirement_type");
												while($rwDept=mysql_fetch_array($sqlretired))
												{
												?>
												<option value="<?php echo $rwDept["id"]; ?>">
												   <?php echo $rwDept["retirement_type"]; ?></option>
												<?php
												}
											?>
									</select> 
								  </div>
                                </div>
					    </div>
					
					
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Retirement</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="tr_training_from" name="tr_training_from" class="form-control calender_picker">
								  </div>
                                </div>
						    </div>
						
							
						    </div><br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12">Designation On Retirement</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="le_des_retitr" name="le_des_retitr" class="form-control TextNumber" readonly>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="le_dept" name="le_dept" class="form-control" readonly>
								  </div>
                                </div>
						    </div>
							
						    </div>
						
					<div class="clearfix"></div> <br>
						<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Station</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="hidden" id="station_idh" name="station_idh">
										<input type="text" id="stationh" name="stationh" class="form-control station"  readonly> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">ROP</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="le_rop" name="le_rop" class="form-control" readonly>
									  </div>
									</div>
								</div>		
					</div>
					<br>
					<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Bill Unit</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="le_billunit" name="le_billunit" class="form-control TextNumber"  readonly> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Scale/Level</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="le_scale_level" name="le_scale_level" class="form-control" readonly>
									  </div>
									</div>
								</div>		
					</div>
					<br>
					<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Depot</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="le_depot" name="le_depot" class="form-control TextNumber"  readonly> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Employee Category</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="le_emp_cat" name="le_emp_cat" class="form-control" readonly>
									  </div>
									</div>
								</div>		
					</div>
					<br>
					<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Total Service</label>
									  <div class="col-md-3 col-sm-8 col-xs-12" >
										<input type="text" id="le_total_year" name="le_total_year" class="form-control TextNumber" placeholder="Years" > 
									  </div>
									  <div class="col-md-3 col-sm-8 col-xs-12" >
										<input type="text" id="le_total_month" name="le_total_month" class="form-control TextNumber" placeholder="Months"  > 
									  </div>
									  <div class="col-md-2 col-sm-8 col-xs-12" >
										<input type="text" id="le_total_day" name="le_total_day" class="form-control TextNumber" placeholder="days"  > 
									  </div>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >NO Qualification Service</label>
									  <div class="col-md-3 col-sm-8 col-xs-12" >
										<input type="text" id="le_total_year" name="le_total_year" class="form-control TextNumber" placeholder="Years" > 
									  </div>
									  <div class="col-md-3 col-sm-8 col-xs-12" >
										<input type="text" id="le_total_month" name="le_total_month" class="form-control TextNumber" placeholder="Months"  > 
									  </div>
									  <div class="col-md-2 col-sm-8 col-xs-12" >
										<input type="text" id="le_total_day" name="le_total_day" class="form-control TextNumber" placeholder="days"  > 
									  </div>
									</div>
								</div>
					</div>
					<br>
							<hr ></hr>
					<h3>Leave Balance</h3>
					<hr ></hr>
						<div class="row">
								<div class="col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >LAP</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="le_lap" name="le_lap" class="form-control TextNumber"  readonly> 
									  </div>
									</div>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">LHAP</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="le_lhap" name="le_lhap" class="form-control" readonly>
									  </div>
									</div>
								</div>
								<div class="col-md-4 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Advance Leaves</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="le_advance" name="le_advance" class="form-control" readonly>
									  </div>
									</div>
								</div>		
					</div>
					<br>
					<div class="clearfix"></div>
						<br>
						<div class="col-sm-2 col-xs-12 pull-right">
							 <button  type="submit" class="btn btn-info source" >Save</button>
							 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						   
						</div>
							     <br>						
					
					</form>
					</div>
					 
			  <!--Last Tab End --><?php  include_once('../global/footer.php');?>