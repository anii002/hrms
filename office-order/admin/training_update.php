<?php 
$_GLOBALS['a'] ='training';
  include_once('../global/header_update.php');?>
 <!--Bio Tab Start -->
				<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
					<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Training Update</span>
					</div>
					<div style="border:1px solid #67809f;padding:30px;">
					 <div class="box-header with-border">
								  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Training</h3>
								</div><BR>
						  <form action="process_main.php?action=update_training" method="POST" class="apply_readonly">
					
					<div class="clearfix"></div>
					
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
							<div class="col-md-5 ">
								<div class="row">
						<a href="#" id="add_mul_training" class="btn btn-primary pull-right">+Add Training</a>
					</div>	
								
							</div>
					</div>
					
					<div id="add_training">
					</div>
					
						<?php
							dbcon1();
							$sql=mysql_query("select * from training_temp where pf_number='".$_SESSION['set_update_pf']."'");
							$count_t=mysql_num_rows($sql);							
							for($i=1;$i<=$count_t;$i++){
								
								$result=mysql_fetch_array($sql);
			
						?>
						<h3><?php echo $i;?> Training</h3>
						<hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'>
					<div class="row">
							<input type="hidden" name="hidden_training<?php echo $i;?>" id="hidden_training<?php echo $i;?>" value="<?php echo $result['id']; ?>">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Training Type</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select name="tr_training_status<?php echo $i;?>" id="tr_training_status<?php echo $i;?>" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<?php echo fetchtraining_type($result['training_type']);?>
									</select> 
								  </div>
                                </div>
						    </div>
						    <div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Institute</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type="text" id="tr_inst<?php echo $i;?>" name="tr_inst<?php echo $i;?>" class="form-control TextNumber" value="<?php echo $result['tr_inst'];?>" > 
									  </div>
									</div>
								</div>

					</div >
						<br/>
					<div class="row">
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select name="tr_dept<?php echo $i;?>" id="tr_dept<?php echo $i;?>" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<?php echo fetch_all_dept($result['tr_dept']);?>
									</select> 
								  </div>
                                </div>
						    </div>
						    <div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<select name="tr_desig<?php echo $i;?>" id="tr_desig<?php echo $i;?>" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<?php echo fetch_all_desig($result['tr_desig']);?>
									</select> 
								  </div>
                                </div>
						    </div>

					</div >
					
					<div class="row" id="schedule_id"><br>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Last Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="tra_last_date<?php echo $i;?>" name="tra_last_date<?php echo $i;?>" class="form-control calender_picker" value="<?php echo date('d-m-Y', strtotime($result['last_date']));?>">
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12"> 
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Due Date</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="tra_due_date<?php echo $i;?>" name="tra_due_date<?php echo $i;?>" class="form-control calender_picker" value="<?php echo date('d-m-Y', strtotime($result['due_date']));?>">
								  </div>
                                </div>
						    </div>
							
						    </div><br>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Training From</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="tra_training_from<?php echo $i;?>" name="tra_training_from<?php echo $i;?>" class="form-control calender_picker" required value="<?php echo date('d-m-Y', strtotime($result['training_from']));
									 
									?>">
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Training To</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="tra_training_to<?php echo $i;?>" name="tra_training_to<?php echo $i;?>" class="form-control calender_picker" required value="<?php echo date('d-m-Y', strtotime($result['training_to']));
									
									?>">
								
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
										<input type="text" id="tr_ltr_no<?php echo $i;?>" name="tr_ltr_no<?php echo $i;?>" class="form-control " value="<?php echo $result['letter_no'];?>" required> 
									  </div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group" >
									<label class="control-label col-md-4 col-sm-1 col-xs-12">Letter Date</label>
									  <div class="col-md-8 col-sm-12 col-xs-12">
										<input type="text" id="tr_ltr_date<?php echo $i;?>" name="tr_ltr_date<?php echo $i;?>" class="form-control calender_picker" value="<?php echo date('d-m-Y', strtotime($result['letter_date']));?>" required>
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
									 <textarea  rows="2"  class="form-control primary description" id="tr_desc<?php echo $i;?>" name="tr_desc<?php echo $i;?>" required><?php echo $result['description'];?></textarea>
								  </div>
                                </div>
							</div>
						</div><br>
					<div class="row" >
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group" >
								<label class="control-label col-md-2 col-sm-1 col-xs-12">Remarks</label>
								  <div class="col-md-10 col-sm-12 col-xs-12">
									<textarea  rows="2"  class="form-control primary description" id="tr_remark<?php echo $i;?>" name="tr_remark<?php echo $i;?>" required><?php echo $result['remarks'];?></textarea>
								  </div>
                                </div>
							</div>
						</div><br>
							<?php }?>
					
					<div class="clearfix"></div>
						<br>
						<div class="col-sm-2 col-xs-12 pull-right">
							 <button  type="submit" class="btn btn-info source" >Save</button>
							 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						   
						</div>
							     <br>						
					
					</form>
					</div>
					</div>
			  <!--Training Tab End -->
				<?php include('modal_js_header.php');?>
<script>
//training sr update

var training_count=<?php echo $count_t+1;?>;
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
</script>
 <script>
$('#tr_training_status').change(function () {
	var value = $(this).val(); 
	//alert(value);
	if (value == 5) {
		$('#schedule_id').show();
	}
	else {
		$('#schedule_id').hide();
	}
});
</script>
<?php
	 if(isset($_SESSION['set_update_pf']))
	{
		echo "<script>$('.common_pf_number').val('".$_SESSION['set_update_pf']."'); </script>";
		//echo "<script>alert('".$_SESSION['same_pf_no']."'); </script>";
	} 
?>
<?php include_once('../global/footer.php');?> 