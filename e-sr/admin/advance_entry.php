<!--advance Tab Start -->
		<?php  
		$_GLOBALS['a'] = 'advance';
		include_once('../global/header1.php');?>
		<div style="padding:50px;border:1px solid black;margin:10px;">
					 <div class="box-header with-border">
								  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Advance</h3>
								</div><br>
			<form action="process_main.php?action=add_advance" method="POST" class="apply_readonly">
				<div class="row">
					<a href="#" class="btn btn-primary pull-right" id="add_mul_adv">+Add Advance</a>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<input type="text" class="form-control primary TextNumber common_pf_number" id="adv_pf" name="adv_pf"  placeholder="Enter PF No"  readonly>
							<input type="hidden" id="adv_count" name="adv_count">
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div id="add_advance">
				</div>
				<br>
				<h3>1st Advance</h3>
				<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
				<div class="modal-body">
					<div class="row">
							<!--div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control primary TextNumber common_pf_number" id="adv_pf" name="adv_pf"  placeholder="Enter PF No"  readonly>
								  </div>
                                </div>
						    </div-->
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Advances Type</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									 
							 <select class="form-control primary select2" id="adv_type1" name="adv_type1" style="width:100%;">
							 <option disabled selected >Select Advances Type</option>
							<?php
								$sqlreligion=mysql_query("select * from advance");
								while($rwDept=mysql_fetch_array($sqlreligion))
								{
								?>
								<option value="<?php echo $rwDept["short_desc"]; ?>"><?php echo $rwDept["long_desc"]; ?></option>
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
									  <input type="text" class="form-control primary" id="adv_letterno1" name="adv_letterno1"   placeholder="Enter Letter No" required />
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									  <input type="text" class="form-control primary calender_picker" id="adv_letterdate1" name="adv_letterdate1" placeholder="Enter date" required  />
								  </div>
                                </div>
						    </div>
						</div><br>
						
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >W.E.F Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									 <input type="text" class="form-control primary calender_picker" id="adv_wefdate1" name="adv_wefdate1" required placeholder="Enter date" />
								  </div>
                                </div>
						    </div>
							
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Amount<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary" id="adv_amount1" name="adv_amount1" placeholder="Enter Amount" required />
								  </div>
                                </div>
						    </div>
						</div><br>
						<h5><b>Recovery Details:</b></h5><hr>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Total Amount</label>
								<label class="control-label col-md-2 col-sm-3 col-xs-12" >Principal</label>
								 <div class="col-md-6 col-sm-8 col-xs-12" >
									 <input type="text" class="form-control primary" id="adv_principle1" name="adv_principle1" placeholder="Enter Principal Amount" />
								  </div> 
                                </div>
						    </div>
							
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Interest<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary" id="adv_interest1" name="adv_interest1" placeholder="Enter Interest" />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >From Date</label>
								 <div class="col-md-8 col-sm-8 col-xs-12" >
									 <input type="text" class="form-control primary calender_picker" id="adv_frmdate1" name="adv_frmdate1" placeholder="Enter date" />
								  </div> 
                                </div>
						    </div>
							
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >To Date<span class=""></span></label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									  <input type="text" class="form-control primary calender_picker" id="adv_todate1" name="adv_todate1" placeholder="Enter date" />
								  </div>
                                </div>
						    </div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-2 ">Remark</label>
								  <div class="col-md-10">
									 <textarea  rows="4"  class="form-control primary description" id="adv_remark1" name="adv_remark1" placeholder="Enter Advances Remark" ></textarea>
								  </div>
                                </div>
						    </div>
						</div><br>
					 
			  	
				<div class="form-group">
				<div class="col-sm-2 col-xs-12 pull-right">
					<input type="hidden" id="txtsession" name="txtsession"  class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>"/>
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
			<script>


var adv_count=2;
$("#add_mul_adv").click(function(){
	$.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_advance&adv_count='+adv_count,
		success:function(html){
			//alert(html);
			$("#add_advance").prepend(html);
			$("#adv_count").val(adv_count);
			adv_count++;
		}
	 });
});


var pr_min=pro_count-1;
$(".hide_make"+pr_min).hide();
</script>
	<?php  include_once('../global/footer.php');?>
			<!--advance Tab End -->