<?php 
$_GLOBALS['a'] ='award';
  include_once('../global/header_update.php');
  
  include('create_log.php');
  
	$action="Visited Award page";
	$action_on=$_SESSION['set_update_pf'];
	create_log($action,$action_on);
  
  ?>
 <!--Bio Tab Start -->
				<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
					<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Award</span>
					</div>
					<div style="border:1px solid #67809f;padding:30px;">
				<div class="box-header with-border">
					<!--<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Awards</h3>-->
				</div>
					 <form method="post" action="process_main.php?action=update_awards" class="apply_readonly">
				<div class="modal-body">
					
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >PF No</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="award_pf_no" name="award_pf_no" class="form-control TextNumber common_pf_number" readonly required>
								<input type="hidden" id="award_count" name="award_count">
							  </div>
							</div>
						</div>
						<div class="col-md-5 col-sm-12 col-xs-12">
							<div class="row">
						<a href="#" class="btn btn-primary pull-right" id="add_mul_award">+Add Award</a>
					</div>	
						</div>
					</div>
					
					<!--input type="hidden" name="hidden_awd_count" id="hidden__count"-->
					<div id="add_award">
					</div>
						<?php
							dbcon1();
							$sql=mysql_query("select * from award_temp where awd_pf_number='".$_SESSION['set_update_pf']."'");
							$count_a=mysql_num_rows($sql);	
                                                      
                                                        if($count_a==0)
							{
								echo "<label class='control-label col-md-4 col-sm-3 col-xs-12' style='font-size:15px;color:red;'>Awards for This Employee Is Not Available</label>";
							}
						
							for($i=1; $i<=$count_a; $i++){
								
								$result=mysql_fetch_array($sql);
			
						?>
						
						<h3><?php echo $i;?> Award</h3>
					<hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'>
					<div class="row">
						<input type="hidden" id="hidden_award_id<?php echo $i;?>" name="hidden_award_id<?php echo $i;?>" value="<?php echo $result['id']?>">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >Year Of Award</label>
							  <div class="col-md-9 col-sm-8 col-xs-12">
								<input type="text" id="award_date<?php echo $i;?>" name="award_date<?php echo $i;?>" class="form-control" value="<?php echo $result['awd_date'];?>" required>
							  </div>
							</div>
						</div>
					</div>
					<br>
					<div class="clearfix"></div> 							
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >Awarded By</label>
							  <div class="col-md-9 col-sm-8 col-xs-12" >
								<select name="award_award_by<?php echo $i;?>" id="award_award_by<?php echo $i;?>" class="form-control select2" style="margin-top:0px; width:100%;" required>
									<?php echo get_all_awarded_by($result['awd_by']);?>
								</select> 
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >Type Of Award</label>
							  <div class="col-md-9 col-sm-8 col-xs-12" >
								<select name="award_type_award<?php echo $i;?>" id="award_type_award<?php echo $i;?>" class="form-control select2" style="width:100%;" required>
									<?php echo get_all_awards($result['awd_type']);?>
								</select> 
							  </div>
							</div>
						</div>
					</div>
					<br>
					<div class='row'>
						<div class='col-md-6 col-sm-12 col-xs-12'>
							<div class='form-group'>
								<label class='control-label col-md-3 col-sm-3 col-xs-12' >Letter No</label>
									<div class='col-md-9 col-sm-8 col-xs-12'>
										<input type='text' id='award_ltr_no<?php echo $i;?>' name='award_ltr_no<?php echo $i;?>' class='form-control ' value="<?php echo $result['letter_no'];?>">
									</div>
							</div>
						</div>
						<div class='col-md-6 col-sm-12 col-xs-12'>
							<div class='form-group'>
								<label class='control-label col-md-3 col-sm-3 col-xs-12' >Letter Date</label>
									<div class='col-md-9 col-sm-8 col-xs-12'>
										<input type='text' id='award_ltr_date<?php echo $i;?>' name='award_ltr_date<?php echo $i;?>' class='form-control calender_picker' value="<?php 
										$dt=substr($result['letter_datetime'],0,10);				
										echo date('d-m-Y', strtotime($dt));
										
										?>">
									</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >Other Award</label>
							  <div class="col-md-9 col-sm-8 col-xs-12" >
								<input type="text" id="award_other_award<?php echo $i;?>" name="award_other_award<?php echo $i;?>" class="form-control TextNumber" placeholder="Enter Other Award" value="<?php echo $result['awd_other'];?>">
							  </div>
							</div>
						</div>							
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-3 col-sm-1 col-xs-12">Award Details</label>
							  <div class="col-md-9 col-sm-12 col-xs-12">
								<textarea   rows="2"  class="form-control primary description" id="award_detail<?php echo $i;?>" name="award_detail<?php echo $i;?>" ><?php echo $result['awd_detail'];?></textarea>
							  </div>
							</div>
						</div>
					</div>			
					<?php }?>
				</div><br>
				<div class="clearfix"></div>
				<br>
				
				<div class="col-sm-2 col-xs-12 pull-right">
					 <button  type="submit" class="btn btn-info source" >Save</button>
					<!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
				</div><br>
					</form>
		        </div>
		        </div>
		       <!--Awards Tab End -->
			   <?php include('modal_js_header.php');?>
<script>
//award code sr update
var award_count=<?php echo $count_a+1;?>;
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
</script>
 
<?php
	 if(isset($_SESSION['set_update_pf']))
	{
		echo "<script>$('.common_pf_number').val('".$_SESSION['set_update_pf']."'); </script>";
	} 
?>						
<?php include_once('../global/footer.php');?>  