<!--Family Tab Start -->
					<?php 
					$_GLOBALS['a'] = 'fam_comp';
					include_once('../global/header1.php');?>
					<div style="padding:50px;border:1px solid black;margin:10px;">
					 <div class="box-header with-border">
					  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Family Composition</h3>
					</div>
					
					<div class="row pull-right" style="margin-right:20px;">
						<a class="btn btn-primary" href="#" id="add_member" name="add_member">+Add Family Member</a>
					</div>
					<br>
					<br>
				<form method="post" action="process_main.php?action=family_compo" class="apply_readonly">
				<div class="modal-body">
				<div class="row" style="margin-top:10px;margin-bottom:10px;">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="fc_pf_main" name="fc_pf_main" class="form-control TextNumber common_pf_number" readonly required>
							  </div>
							</div>
						</div>
					</div>
					<div id="add_member_div" name="add_member_div">
					</div>
					<input type="hidden" name="hidden_fc_count" id="hidden_fc_count">
					<div class="row">
						<h4>1st Family Member</h4>
					</div>
					<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Updation</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="fc_updated_date1" name="fc_updated_date1" class="form-control" value="<?php echo date('d-m-Y');?>" readonly>
								  </div>
                                </div>
						    </div>
							<!--div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Relative ID</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="fc_pf_no1" name="fc_pf_no1" class="form-control TextNumber" required>
								  </div>
                                </div>
						    </div-->
					</div><br>
					
												
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Family Member Name</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="fc_fam_mem_name1" name="fc_fam_mem_name1" class="form-control TextNumber" placeholder="Enter Family Member Name" required>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Member Relation</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<select name="fc_mem_rel1" id="fc_mem_rel1" class="form-control select2" style="margin-top:0px; width:100%;" required>
									<option disabled selected >Select Relation</option>
									<?php
									dbcon();
										$sqlDept=mysql_query("select * from relation");
										while($rwDept=mysql_fetch_array($sqlDept))
										{
										?>
										<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>
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
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Gender</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control select2" name="fc_mem_gender1" id="fc_mem_gender1"  style="margin-top:0px; width:100%;" required>
										<option value="" selected disabled >Select Gender</option>
										<?php
											$sqlreligion=mysql_query("select * from gender");
											while($rwDept=mysql_fetch_array($sqlreligion))
											{
											?>
											<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["gender"]; ?></option>
											<?php
											}
										?>
									</select> 
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group" >
								<label class="control-label col-md-4 col-sm-1 col-xs-12">DOB</label>
								  <div class="col-md-8 col-sm-12 col-xs-12" >
									<input type="text" id="fc_fam_mem_dob1" name="fc_fam_mem_dob1" class="form-control calender_picker" placeholder="Enter Date" required>
								  </div>
                                </div>
							</div>
							
							
						    </div>
							<br><br>
							<div class="row"><div class="col-sm-2 col-xs-12 pull-right">
							 <button  type="submit" class="btn btn-info source" >Save</button>
							 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						   
						</div></div>
					</div><br>
					
						
					</form>
					</div>
					
					<script>
var family_counter=2;
$("#add_member").click(function(){
	//alert("this"); 
	 $.ajax({
		type:"post",
		url:"process.php",
		data:"action=get_family_form&family_counter="+family_counter,
		success:function(data){
		  //alert(data);
		  $("#add_member_div").prepend(data);
		  $("#hidden_fc_count").val(family_counter);
		  family_counter++;
		  //$(".select2").select2();
		  }
	});
	
});
$(document).on("change",".percentage",function(){
	var sum = 0; var amt =0;
	$( ".percentage" ).each(function( index ) {
			amt = 	parseInt($(this).val()) || 0;
		sum = sum + amt;
		if(sum>100)
		{
			alert("Percentage sum must be less than or equal to 100");
			$(this).val("");
		}
});
}); 
$(document).on("change",".percentage2",function(){
	var sum = 0; var amt =0;
	$( ".percentage2" ).each(function( index ) {
			amt = 	parseInt($(this).val()) || 0;
		sum = sum + amt;
		if(sum>100)
		{
			alert("Percentage sum must be less than or equal to 100");
			$(this).val("");
		}
});
}); 
$(document).on("change",".percentage3",function(){
	var sum = 0; var amt =0;
	$( ".percentage3" ).each(function( index ) {
			amt = 	parseInt($(this).val()) || 0;
		sum = sum + amt;
		if(sum>100)
		{
			alert("Percentage sum must be less than or equal to 100");
			$(this).val("");
		}
});
}); 

var pr_min=pro_count-1;
$(".hide_make"+pr_min).hide();
</script>
				<?php  include_once('../global/footer.php');?>
			<!--family Tab End -->