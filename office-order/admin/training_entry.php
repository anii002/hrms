<?php  

$_GLOBALS['a'] = 'training';
include_once('../global/header1.php');?>
<div style="padding:50px;border:1px solid black;margin:10px;">
					 <div class="box-header with-border">
								  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Training</h3>
								</div><BR>
				<form action="process_main.php?action=add_training" method="POST" class="apply_readonly">
					<div class="row">
						<a href="#" id="add_mul_training" class="btn btn-primary pull-right">+Add Training</a>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="tr_pf_no" name="tr_pf_no" class="form-control TextNumber common_pf_number" placeholder="Enter PF Number" readonly required >
								<input type="hidden" name="training_count" id="training_count">
							  </div>
							</div>
						</div>
					</div>
					<div id="add_training">
					</div>
					<div class="clearfix"></div>
					<br>
					<h3>1st Training</h3>
					<hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'>
					<div class="row">
							<!--div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="tr_pf_no" name="tr_pf_no" class="form-control TextNumber common_pf_number" placeholder="Enter PF Number" readonly required >
								  </div>
                                </div>
						    </div-->
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Training Type</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select name="tr_training_status1" id="tr_training_status1" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<option disabled selected >Select Training Status</option>
										<?php
											$sqlreligion=mysql_query("select * from training_type");
											while($rwDept=mysql_fetch_array($sqlreligion))
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
						    <div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Institute</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="inst1" name="inst1" class="form-control" placeholder="Enter Institute" > 
							  </div>
							</div>
						</div>
					</div>
					<br/>

					<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12">Department</label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<select class="form-control primary select2" id="tr_dept1" name="tr_dept1" style="margin-top:0px; width:100%;" required>
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
						<label class="control-label col-md-4 col-sm-3 col-xs-12"> Designation<span class=""></span></label>
					
						  <div class="col-md-8 col-sm-8 col-xs-12">
							<select class="form-control primary select2" id="tr_desig1" name="tr_desig1" style="margin-top:0px; width:100%;" required>
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
					
					<div class="row" id="schedule_id"><br>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Last Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="tr_training_from1" name="tr_training_from1" class="form-control calender_picker"placeholder="enter date"  >
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12"> 
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Due Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="tr_training_to1" name="tr_training_to1" class="form-control calender_picker" placeholder="enter date" >
								  </div>
                                </div>
						    </div>
							
						    </div><br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Training From</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="tr_training_from1" name="tr_training_from1" class="form-control calender_picker" placeholder="enter date" required>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Training To</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="tr_training_to1" name="tr_training_to1" class="form-control calender_picker" placeholder="enter date" required>
								  </div>
                                </div>
						    </div>
						</div>					
						<div class="clearfix"></div> <br>
						<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter No</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="tr_ltr_no1" name="tr_ltr_no1" class="form-control" placeholder="Enter Letter Number" required> 
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Letter Date</label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								<input type="text" id="tr_ltr_date1" name="tr_ltr_date1" class="form-control calender_picker"  placeholder="enter date" required>
							  </div>
							</div>
						</div>		
					</div>
					<br>
					<div class="row" >
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-2 col-sm-1 col-xs-12">Description</label>
							  <div class="col-md-10 col-sm-12 col-xs-12">
								 <textarea  rows="2"  class="form-control primary description" id="tr_desc1" name="tr_desc1"placeholder="Enter Description" required></textarea>
							  </div>
							</div>
						</div>
					</div><br>
					<div class="row" >
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group" >
								<label class="control-label col-md-2 col-sm-1 col-xs-12">Remarks</label>
								  <div class="col-md-10 col-sm-12 col-xs-12">
									<textarea  rows="2"  class="form-control primary description" id="tr_remark1" name="tr_remark1" placeholder="Enter Remark" ></textarea>
								  </div>
                                </div>
							</div>
						</div><br>
					
					<div class="clearfix"></div>
						<br>
						<div class="col-sm-2 col-xs-12 pull-right">
							 <button  type="submit" class="btn btn-info source" >Save</button>
							 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						   
						</div>
							     <br>						
					
					</form>
					</div>
					<script>
var training_count=2;
$("#add_mul_training").click(function(){
	 $.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_training&training_count='+training_count,
		success:function(html){
			$("#add_training").prepend(html);
			$("#training_count").val(training_count);
			training_count++;
		}
	 });
});



var pr_min=pro_count-1;
$(".hide_make"+pr_min).hide();
</script>
		<?php  include_once('../global/footer.php');?>