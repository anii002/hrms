<!--medical Tab Start -->
				 <div class="tab-pane" id="medical">
				 <div class="box-header with-border">
							  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Medical </h3>
							</div>
					 <form method="post">
				<div class="modal-body">
					<div class="row">
						<?php $six_digit = mt_rand(100000, 999999);?>
						<input type="hidden" name="hidden_app_trans" id="hidden_app_trans" value="SUR_APP_<?php echo $six_digit;?>">
						
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									 <input type="text" class="form-control primary TextNumber" id="medi_pf_no" name="medi_pf_no" placeholder="Enter PF Number" required/>
								  </div>
                                </div>
						    </div>
							<input type="button" id="show" name="show" value="More.."  class="btn btn-primary" />
							
						</div><br>
						<div class="table-responsive">
							<table class="table table-bordered"  style="width:100%" id="tbl_id">
								<tbody>
								<tr>
									<td><label class="control-label labelhed" >Employee Name<span class=""></span></label></td>
									<td><label class="control-label labelhdata">value</label></td>
									<td><label class="control-label labelhed" >SR NO</label></td>
									<td><label class="labelhdata labelhdata">Value </label></td>
								</tr>
								<tr>
									<td><label class="control-label labelhed" >Gender</label></td>
									<td><label class="control-label labelhdata">Value</label></td>
									<td><label class="control-label labelhed" >DOB</label></td>
									<td><label class="control-label labelhdata">Value</label></td>
								</tr>
								<tr>
									<td><input type="button" id="close" name="close" value="Close"  class="btn btn-danger" /></td>
								</tr>
								 
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Category</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="medi_cat" id="medi_cat" class="form-control" style="margin-top:0px; width:100%;" required>
										<option disabled selected >Select Category</option>
										<?php
												$sqlreligion=mysql_query("select * from medical_code");
												while($rwDept=mysql_fetch_array($sqlreligion))
												{
												?>
												<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["SHORTDESC"]; ?>/<?php echo $rwDept["LONGDESC"]; ?></option>
												<?php
												}
											
											?>
									</select> 
								  </div>
                                </div>
						    </div>
							
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Certificate No </label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="medi_cer_no" name="medi_cer_no" class="form-control" placeholder="Enter If any" required>
								  </div>
                                </div>
						    </div>
							
					</div><br>	
					<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Certificate Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="date" id="med_cer_date" name="med_cer_date" class="form-control" placeholder="Enter If any" >
								  </div>
                                </div>
						    </div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group" >
								<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference Date</label>
								  <div class="col-md-8 col-sm-12 col-xs-12">
									<input type="date" id="med_ref_date" name="med_ref_date" class="form-control"  >
								  </div>
                                </div>
							</div>
							
							
					</div><br>
					<div class="row" >
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group" >
								<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference </label>
								  <div class="col-md-8 col-sm-12 col-xs-12">
									 <textarea  rows="2" style="resize:none;" class="form-control primary" id="med_ref" name="med_ref"  placeholder="Enter Medical Reference" ></textarea>
								  </div>
                                </div>
							</div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Remarks</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<textarea  rows="2" style="resize:none;" class="form-control primary" id="med_remark" name="med_remark"  placeholder="Enter Medical Remarks" ></textarea>
								  </div>
                                </div>
						    </div>
							
							
							
						</div>
						 
				</div><br>
				<div class="form-group">
				<div class="col-sm-2 col-xs-1 pull-right">
					<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
					<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
					 
					<br>
					<br>
					<br>
				</div>
				</div>
					
           
			</form>
		        </div>
				 
		        <!--medical Tab End -->
<script>
$(document).ready(function()
{
    $("#tbl_id").hide();
    $("#show").click(function()
    {
        $("#tbl_id").show();
        //return false;           
    });
	$("#close").click(function()
    {
        $("#tbl_id").hide();
        //return false;           
    });

});
</script>