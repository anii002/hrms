<!--Peoperty Tab Start -->
					<?php 
$_GLOBALS['a'] = 'property';

					include_once('../global/header1.php');?>
					<div style="padding:50px;border:1px solid black;margin:10px;">
					 <div class="box-header with-border">
								  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Property</h3>
								</div><br>
					<form  action="process_main.php?action=add_property" method="POST" class="apply_readonly">
					<div class="row">
						<a href="#" class="btn btn-primary pull-right" id="add_mul_pro">+Add Property</a>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="pd_pf_no" name="pd_pf_no" class="form-control TextNumber common_pf_number" placeholder="Enter PF Number" readonly required>
								<input type="hidden" name="pro_count" id="pro_count">
							  </div>
							</div>
						</div>
					</div>
					<br>
					<div id="add_property">
					</div>
					<br>
					<h3>1st Property</h3>
					<div class="clearfix"></div>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
					<div class="row">
							<!--div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="pd_pf_no" name="pd_pf_no" class="form-control TextNumber common_pf_number" placeholder="Enter PF Number" readonly required>
								  </div>
                                </div>
						    </div-->
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Property Type</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select name="pd_pro_type1" id="pd_pro_type1" class="form-control property select2" style="margin-top:0px; width:100%;" required>
										<option disabled selected >Select Property Type</option>
										<?php
											$sqlreligion=mysql_query("select * from property_type");
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
					</div><br>
					<div class="clearfix"></div> 						
					<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Item</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="pd_item_name1" id="pd_item_name1" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<option disabled selected >Select Item Type</option>
										<?php
											/* $sqlreligion=mysql_query("select * from  property_item");
											while($rwDept=mysql_fetch_array($sqlreligion))
											{
											?>
											<!--<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["item"]; ?></option>-->
											<?php
											} */
										?>
									</select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Other Item</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="pd_othr_item_name1" name="pd_othr_item_name1" class="form-control TextNumber">
								  </div>
                                </div>
						    </div>
								
						    </div>
						
							<br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12 hide_make1">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Make/Model</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="pd_make_model1" name="pd_make_model1" class="form-control TextNumber"placeholder="Enter Make/Modal"> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Date of Purchase</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="pd_dop1" name="pd_dop1" class="form-control calender_picker" required>
									  </div>
									</div>
								</div>			
						    </div>
							<br>
							<div class="row" id="prop_detail1_1">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Location</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="pd_location1" name="pd_location1" class="form-control TextNumber"placeholder="Enter Location" > 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Registration No</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="pd_reg_no1" name="pd_reg_no1" class="form-control TextNumber" placeholder="Enter Registration No" >
									  </div>
									</div>
								</div>			
						    </div>
							<br>
							<div class="row" id="prop_detail2_1">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Area</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="pd_area1" name="pd_area1" class="form-control TextNumber" placeholder="Enter Area" > 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Survey Number</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="pd_sur_no1" name="pd_sur_no1" class="form-control"  placeholder="Enter Survey No" >
									  </div>
									</div>
								</div>			
						    </div>
							<br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Total Cost</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="pd_total_cost1" name="pd_total_cost1" class="form-control onlyNumber"placeholder="Enter Total Cost" required> 
									  </div>
									</div>
								</div>
								<!--div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Source</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="pd_source1" name="pd_source1" class="form-control TextNumber" placeholder="Enter Source" >
									  </div>
									</div>
								</div-->			
						    </div>
							<br>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12">Source of Amount/Source Type</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<button class="btn btn-primary add_source" type="button" id="add_source1">+ADD</button>
										<button class="btn btn-danger remove_source" type="button" id="remove_source1">-REMOVE</button>
									  </div>
									</div>
								</div>			
						    </div>
							<div class="row" id="add_source_div1">
							</div>
							<br>
							<!--div class="row">
								<!--div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Source Type</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<select name="pd_sourcr_type1" id="pd_sourcr_type1" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<option disabled selected >Select Source Type</option>
										<?php
											/* $sqlreligion=mysql_query("select * from property_source");
											while($rwDept=mysql_fetch_array($sqlreligion))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["property_source"]; ?></option>
											<?php
											} */
										?>
									</select> 
										
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Amount</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="pd_source_amt1" name="pd_source_amt1" class="form-control TextNumber" placeholder="Enter Source Amount" required>
									  </div>
									</div>
								</div>			
						    </div-->
							<br>
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter No</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="pd_letter_no1" name="pd_letter_no1" class="form-control"placeholder="Enter Letter Number" required> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Letter Date</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="pd_letter_date1" name="pd_letter_date1" class="form-control calender_picker" required>
									  </div>
									</div>
								</div>			
						    </div><br>
							 
							<div class="row" >
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group" >
								<label class="control-label col-md-2 col-sm-1 col-xs-12">Remarks</label>
								  <div class="col-md-10 col-sm-12 col-xs-12">
									 
									 <textarea  rows="2" style="resize:none"  class="form-control primary description" id="prop_remark1" name="prop_remark1" placeholder="Enter  Remark" ></textarea>
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
					</form>
					</div>
					
					<script>
var pro_count=2;
$("#add_mul_pro").click(function(){
	$.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_property&pro_count='+pro_count,
		success:function(html){
			//alert(html);
			$("#add_property").prepend(html);
			$("#pro_count").val(pro_count);
			pro_count++;
		}
	 });
});
var pr_min=pro_count-1;
$(".hide_make"+pr_min).hide();
</script>
			<?php  include_once('../global/footer.php');?>
			  <!--property Tab End -->