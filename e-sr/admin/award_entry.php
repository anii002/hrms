 <!--Awards Tab Start -->
				<?php  
			$_GLOBALS['a'] = 'award';
				include_once('../global/header1.php');?>
				<div style="padding:50px;border:1px solid black;margin:10px;">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Awards</h3>
				</div>
					 <form method="post" action="process_main.php?action=add_awards" class="apply_readonly">
				<div class="modal-body">
					<div class="row">
						<a href="#" class="btn btn-primary pull-right" id="add_mul_award">+Add Award</a>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >PF No</label>
							  <div class="col-md-9 col-sm-8 col-xs-12" >
								<input type="text" id="award_pf_no" name="award_pf_no" class="form-control TextNumber common_pf_number" readonly required>
								<input type="hidden" id="award_count" name="award_count">
							  </div>
							</div>
						</div>
					</div>
					<br>
					<div id="add_award">
					</div>
					<br>
				<h3>1st Award</h3>
					<div class="clearfix"></div>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
					  <div class="row">
							<!--div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-9 col-sm-8 col-xs-12" >
									<input type="text" id="award_pf_no" name="award_pf_no" class="form-control TextNumber common_pf_number" readonly required>
								  </div>
                                </div>
						    </div-->
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >Date Of Award</label>
								  <div class="col-md-9 col-sm-8 col-xs-12">
									<input type="text" id="award_date1" name="award_date1" class="form-control calender_picker" placeholder="Enter Date"required>
								  </div>
                                </div>
						    </div>
					</div><br>
					<div class="clearfix"></div> 
												
					<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >Awarded By</label>
								  <div class="col-md-9 col-sm-8 col-xs-12" >
									<select name="award_award_by1" id="award_award_by1" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<option disabled selected >Select Awarded By</option>
										 <?php
											$sqlDept=mysql_query("select * from awarded_by");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["awarded_by"]; ?></option>
											<?php
											}
										?>
									</select> 
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >Type Of Award</label>
								  <div class="col-md-9 col-sm-8 col-xs-12" >
									<select name="award_type_award1" id="award_type_award1" class="form-control select2" style="width:100%;" required>
										<option disabled selected >Select Award Type</option>
										 <?php
										 dbcon();
											$sqlDept=mysql_query("select * from awards");
											while($rwDept=mysql_fetch_array($sqlDept))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["awards"]; ?></option>
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
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >Letter No</label>
								  <div class="col-md-9 col-sm-8 col-xs-12" >
									<input type="text" id="award_ltr_no1" name="award_ltr_no1" class="form-control description" placeholder="Eenter Letter Number"  required>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >Letter Date</label>
								  <div class="col-md-9 col-sm-8 col-xs-12">
									<input type="text" id="award_ltr_date1" name="award_ltr_date1" class="form-control calender_picker" placeholder="Enter Date" required>
								  </div>
                                </div>
						    </div>
					</div><br>
							<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >Other Award</label>
								  <div class="col-md-9 col-sm-8 col-xs-12" >
									<input type="text" id="award_other_award1" name="award_other_award1" class="form-control TextNumber" placeholder="Enter Other Award" >
								  </div>
                                </div>
						    </div>
						    
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group" >
								<label class="control-label col-md-3 col-sm-1 col-xs-12">Award Details</label>
								  <div class="col-md-9 col-sm-12 col-xs-12">
									<textarea  rows="2"  class="form-control primary description" id="award_detail1" name="award_detail1" placeholder="Enter Award Details" required></textarea>
								  </div>
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
					</form>
					</div>
					<script>



var award_count=2;
$("#add_mul_award").click(function(){
	$.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_award&award_count='+award_count,
		success:function(html){
			//alert(html);
			$("#add_award").prepend(html);
			$("#award_count").val(award_count);
			award_count++;
		}
	 });
});



var pr_min=pro_count-1;
$(".hide_make"+pr_min).hide();
</script>		
		      <?php  include_once('../global/footer.php');?>
		       <!--Awards Tab End -->