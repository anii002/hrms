 <?php 
$_GLOBALS['a'] ='penalty';
  include_once('../global/header_update.php');?>
 <!--Bio Tab Start -->
				<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
					<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Penalty Update</span>
					</div>
					<div style="border:1px solid #67809f;padding:30px;">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Penalty</h3>
			</div>
			<br>
			<form method="post" action="process_main.php?action=update_penalty" class="apply_readonly">
				<div class="clearfix"></div>
					<div class="row">					
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="penalty_pf_no" name="penalty_pf_no" class="form-control TextNumber common_pf_number" readonly required>
								<input type="hidden" id="penalty_count" name="penalty_count">
							  </div>
							</div>
						</div>	
						<div class="col-md-6 col-sm-12 col-xs-12 ">
							<div class="row pull-right" style="margin-right:20px;">
						<a class="btn btn-primary" href="#" id="add_mul_penalty" name="add_mul_penalty">+Add Penalty</a>
					</div>
						</div>
					</div>
					<br>
					
					<div id="add_penalty">	
					</div>
					<?php
						dbcon1();
						$sql=mysql_query("select * from penalty_temp where pen_pf_number='".$_SESSION['set_update_pf']."'");
						$count_pe=mysql_num_rows($sql);							
						for($i=1;$i<=$count_pe;$i++){
							
							$result=mysql_fetch_array($sql);
		
					?>
						<h3><?php echo $i;?> Penalty</h3>
						<hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'>
					<div class="row">
						<input type="hidden" id="hidden_penalty_id<?php echo $i;?>" name="hidden_penalty_id<?php echo $i;?>" value="<?php echo $result['id']?>">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Penalty Type</label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<select name="p_type<?php echo $i;?>" id="p_type<?php echo $i;?>" class="form-control select2" style="margin-top:0px; width:100%;" required>
									<?php echo get_all_penalty_type($result['pen_type']);?>
								</select> 
							  </div>
							</div>
						</div>
					</div>
					<br>
					<div class="clearfix"></div> 
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Penalty Issued</label>
								  <div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="pen_awarded<?php echo $i;?>" name="pen_awarded<?php echo $i;?>" class="form-control calender_picker" value="<?php echo date('d-m-Y', strtotime($result['pen_issued'])); ?>">
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Penalty Effected</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="pen_eff<?php echo $i;?>" name="pen_eff<?php echo $i;?>" class="form-control calender_picker" value="<?php echo date('d-m-Y', strtotime($result['pen_effetcted'])); ?>">
								  </div>
                                </div>
						    </div>
							
					</div><br>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter No</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="l_no<?php echo $i;?>" name="l_no<?php echo $i;?>" class="form-control " placeholder="Enter Letter No" value="<?php echo $result['pen_letterno'];?>" required>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Letter Date</label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="ltr_date<?php echo $i;?>" name="ltr_date<?php echo $i;?>" class="form-control calender_picker" placeholder="Enter Date" value="<?php echo date('d-m-Y', strtotime($result['pen_letterdate'])); ?>" required>
							  </div>
							</div>
						</div>
					</div><br>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >ChargeSheet Status</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<select name="chrg_stat<?php echo $i;?>" id="chrg_stat<?php echo $i;?>" class="form-control select2" style="margin-top:0px; width:100%;"  >
									<?php echo get_chargesheet($result['pen_chargestatus']);?>
								</select> 
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >ChargeSheet Reference</label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="pen_chrg_ref_no<?php echo $i;?>" name="pen_chrg_ref_no<?php echo $i;?>" class="form-control" value="<?php echo $result['pen_chargeref'];?>" required>
							  </div>
							</div>
						</div>
					</div><br>		
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >From Date</label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="f_date<?php echo $i;?>" name="f_date<?php echo $i;?>" class="form-control calender_picker" placeholder="Enter Letter No" value="<?php echo date('d-m-Y', strtotime($result['pen_from'])); ?>" required>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >To Date</label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="t_date<?php echo $i;?>" name="t_date<?php echo $i;?>" class="form-control calender_picker" placeholder="Enter Letter No" value="<?php echo date('d-m-Y', strtotime($result['pen_to'])); ?>" required>
							  </div>
							</div>
						</div>	
					</div><br>	
					<div class="row"></div>
						
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-2 ">Remark</label>
							  <div class="col-md-10">
								 <textarea  style="resize:none" rows="4" cols="20" class="form-control primary description" id="penalty_remark<?php echo $i;?>" name="penalty_remark<?php echo $i;?>"  required><?php echo $result['pen_remark'];?></textarea>
							  </div>
							</div>
						</div>
					</div>
			<br>
					<?php }?>
					<div class="col-sm-2 col-xs-12 pull-right">
						<button  type="submit" class="btn btn-info source" >Save</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
					<br>
			</form>
		</div>
		</div>
		       <!--Penalty Tab End -->
			   <?php include('modal_js_header.php');?>
<script>
// penalty form
var penalty_count=<?php echo $count_pe+1;?>;
$("#add_mul_penalty").click(function(){
	 $.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_penalty&penalty_count='+penalty_count,
		success:function(html){
			$("#add_penalty").prepend(html);
			$("#penalty_count").val(penalty_count);
			penalty_count++;
		}
	 });
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