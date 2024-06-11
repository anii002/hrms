 <?php 
$_GLOBALS['a'] ='online_office_order';
  include_once('../global/header_update.php');?>

	
 <!--Bio Tab Start -->
		<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
			<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Online Office Orders</span>
			</div>
			<div style="border:1px solid #67809f;padding:30px;">
				 <div class="box-header with-border">
					  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Online Office Orders </h3>
					</div>
				<form method="post" action="process_main.php?action=office_order">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-5 col-sm-3 col-xs-12" >Office Order For</label>
							  <div class="col-md-7 col-sm-8 col-xs-12" >
								<select class="form-control primary select2" id="o_o_for" name="o_o_for">
									<option selected disabled>Select Office Order For</option>
									<?php echo $odr_type; ?>
								</select>	
							  </div>
							</div>
					</div>
				
				</div><br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-5 col-sm-3 col-xs-12" >Department For Office Order </label>
							  <div class="col-md-7 col-sm-8 col-xs-12" >
								<select class="form-control primary select2" id="o_dept" name="o_dept">
								<option selected disabled>Select Department</option>
								<?php echo $dept;?>
									</select>	
							  </div>
							</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-5 col-sm-3 col-xs-12" >Designation For Office Order </label>
							  <div class="col-md-7 col-sm-8 col-xs-12" >
								<select class="form-control primary select2" id="o_desig" name="o_desig">
								<option selected disabled>Select Designation</option>
								<?php echo $alldesignations;?>
									</select>	
							  </div>
							</div>
					</div>
						
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-5 col-sm-3 col-xs-12" >Office Order No</label>
							  <div class="col-md-7 col-sm-8 col-xs-12" >
								<input type="text" class="form-control " id="o_order_no" name="o_order_no"/>	
							  </div>
							</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-5 col-sm-3 col-xs-12" >Date</label>
							  <div class="col-md-7 col-sm-8 col-xs-12" >
								<input type="text" class="form-control primary calender_picker" id="o_order_date" name="o_order_date"  />
							  </div>
							</div>
					</div>
				</div><br>
				<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-2 ">Subject</label>
								  <div class="col-md-10">
									 <textarea  rows="2" style="resize:none" class="form-control  description" id="o_order_sub" name="o_order_sub"  placeholder="Enter Subject" ></textarea>
								  </div>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-2 ">Description</label>
								  <div class="col-md-10">
									 <textarea  rows="2" style="resize:none" class="form-control  description" id="o_order_descp" name="o_order_descp"  placeholder="Enter Description" ></textarea>
								  </div>
								</div>
							</div>
						</div>
			</div>
		<hr style="height:1px;color:#f39c12;background-color:#f39c12;">
		<div class="row">
		<a class="btn btn-primary pull-right" id="incr_add_row" name="incr_add_row">Add Row</a>
		<input type="hidden" id="row_count" name="row_count">
		</div><br>
			<div class="row">
		
		
				<div class="table-responsive"> 
					<table class="table" style="border-collapse:collapse width:100%" border="1" >
						<tr>
							<th width="12.5%" style="border-top: 1px solid #000000;">PF No</th>
							<th width="12.5%" style="border-top: 1px solid #000000;">Name</th>
							<th width="12.5%" style="border-top: 1px solid #000000;">Present Designation</th>
							<th width="12.5%" style="border-top: 1px solid #000000;">Present Ps_Type</th>
							<th width="12.5%"style="border-top: 1px solid #000000;">Present Pay Scale</th>
							<th width="12.5%"style="border-top: 1px solid #000000;">Future Designation</th>
							<th width="12.5%"style="border-top: 1px solid #000000;">Future Ps_Type</th>
							<th width="12.5%"style="border-top: 1px solid #000000;">Future Pay Scale</th>
							<!--th width="12%">Remarks</th-->
						</tr>
						<tbody id="ad_row_incr">	
												<?php $i_count=1;?>
							<tr>
								<td width='10%'><input type="text" class="form-control primary getpfnum" id="o_order_emp_pf_1" name="o_order_emp_pf_1" placeholder='Enter PF No' num='1' /></td>
								
								<td><input type="text" class="form-control primary" id="o_order_emp_name_1" name="o_order_emp_name_1" readonly  /></td>
								<td>	
									<!--select class="form-control primary select2" id="o_order_present_desig_1" name="o_order_present_desig_1">
									<!--option selected disabled>Select Designation</option-->
										<?php //echo $alldesignations;?>
									<!--/select-->	
									<input type="text"  class="form-control primary" id="o_order_present_desig_1" name="o_order_present_desig_1" readonly>
								</td>
								
								<td>
									<!--select class="form-control primary select2 ps_type_addnew_row" id="o_order_old_ps_type_1" name="o_order_old_ps_type_1" num1="1" p_type="old">
										<option selected disabled>Select Ps_Type</option>
										<?php// echo $pay_scale_type;?>
									</select-->		
							<input type="text"  class="form-control primary" id="o_order_old_ps_type_1" name="o_order_old_ps_type_1" readonly>									
								</td>
								<td>
								<div style="display:none;" id="old_scale_1">
									
									</div>
									<div  id="old_level_1">
										<input type="text" class="form-control primary" id='o_order_old_level_1' name='o_order_old_level_1' readonly>
								</div>
								<div style="display:none;" id="old_scale3_1">
									<input type="text" name="o_order_old_3scale_1"  id="o_order_old_3scale_1" class="form-control old_scale3_1"/>
								</div>									
								
								</td>
								<td>
									<select class="form-control primary select2" id="o_order_new_desig_1" name="o_order_new_desig_1">
									<option selected disabled>Select Designation</option>
										<?php echo $alldesignations;?>
									</select>
								</td>
								<td>
								<select class="form-control primary select2 ps_type_addnew_row" id="o_order_new_ps_type_1" name="o_order_new_ps_type_1" num2="1" p_type="new">
								<option selected disabled>Select Type</option>
										<?php echo $pay_scale_type;?>
									</select>
								</td>
								<td>
									<div style="display:none;" id="new_scale_1">
									<select class="form-control primary select2 new_scale_1" id="o_order_new_ps_1" name="o_order_new_ps_1" >
										
									</select>
									</div>
									<div style="display:none;" id="new_level_1">
									<select class="form-control primary select2  new_level_1" id="o_order_new_level_1" name="o_order_new_level_1" >
									
									</select>
									</div>
									<div style="display:none;" id="new_scale3_1">
										<input type="text" name="o_order_new_3scale_1"  id="o_order_new_3scale_1" class="form-control new_scale3_1" />
								</div>
									
									
								</td>
								<!--td>
									<textarea  style="resize:none" class="form-control  description" id="o_order_remark_1" name="o_order_remark_1"  placeholder="Enter Description" ></textarea>
								</td-->
							</tr>
							<tr><td style='border-bottom: 1px solid black;'><label>Description</label></td><td colspan='7'style='border-bottom: 1px solid black;'><textarea  style="resize:none" class="form-control  description" id="o_order_remark_1" name="o_order_remark_1"  placeholder="Enter Description" ></textarea></td></tr>
						</tbody>							
		</table>	
	</div>	
						<br>
				<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-2 ">Long Description</label>
								  <div class="col-md-10">
									 <textarea  rows="4"class="form-control  description" id="o_long_desc" name="o_long_desc"  placeholder="Enter Long Description" ></textarea>
								  </div>
								</div>
							</div>
						</div>
		<br>
		<div class="form-group">
		<div class="col-sm-2 col-xs-12 pull-right">
		
			<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
			<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
			 
			<br>
			<br>
			<br>
		</div>
		</div>
			
	</div>
	</form>
	<hr style="height:1px;color:#f39c12;background-color:#f39c12;">
	<div class="row">
	<h3>Generated Orders</h3>
			<div class="table-responsive">
				<table id="office_order_tbl" class="table table-striped">
					<thead>
						<tr>
							<th>Sr NO</th>
							<th>Order For</th>
							<th>Office Order Department</th>
							<th>Designation</th>
							<th>Generated Date</th>
							<th>Action</th>
						</tr>
					</thead>
						<tbody>
							<?php dbcon1();
								$sql=mysql_query('SELECT distinct(count),`office_order_dept`,`order_type`,`office_order_desig`,`date_time` FROM `online_office_order` ');
								$srno=0;
								
								while($fetch=mysql_fetch_array($sql))
								{
									$or_type=get_order_type($fetch['order_type']);
								$srno++;	
								echo "<tr>";
								echo "<td style='padding:5px;'>$srno</td>";
								echo "<td style='padding:5px;'>$or_type</td>";
								echo "<td style='padding:5px;'>".get_designation($fetch['office_order_desig'])."</td>";
								echo "<td style='padding:5px;'>".get_department($fetch['office_order_dept'])."</td>";
								echo "<td style='padding:5px;'>".date('d-m-Y', strtotime($fetch['date_time']))."</td>";
								echo "<td style='padding:5px;'><a href='view_office_order.php?dt=".$fetch['count']."' class='btn btn-primary'>View</a></td>";
								echo "</tr>";
								}
							?>
						</tbody>
					<tfoot></tfoot>
				</table>
			</div>
			
				<script>
					$(function () {
					$('#office_order_tbl').DataTable()

					})
				</script>
			
			</div>
			</div>	
		</div>	
		


			    <!--Increment Tab End -->
				<?php include('modal_js_header.php');?>
				
 <script>
		$(document).on('change','.ps_type_addnew_row', function() {
			debugger;
			// var type=$(this).attr("num");
			var id_var=$(this).attr("p_type");
			//alert(id_var);
			if(id_var=="old")
			{
				var type=$(this).attr("num1");
				var value=$(this).val();
			if($(this).val() == '1')
			{
				$("#old_scale3_"+type).show();
				$("#old_level_"+type).hide();
				$("#old_scale_"+type).hide();
			
			}else if($(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
			{
				$.ajax({
				  type:"post",
				  url:"process.php",
				  data:"action=get_scale_all&value="+value,
				  success:function(data){
				 // alert(data);
				  $(".old_scale_"+type).html(data);
				  }
				});
				$("#old_scale_"+type).show();
			 $("#old_scale3_"+type).hide();
				$("#old_level_"+type).hide();
			}else if($(this).val() == '5')
			{
				$.ajax({
				  type:"post",
				  url:"process.php",
				  data:"action=get_scale_all&value="+value,
				  success:function(data){
				 // alert(data);
				  $(".old_level_"+type).html(data);
				  }
				});
				$("#old_level_"+type).show();
				$("#old_scale_"+type).hide();
				 $("#old_scale3_"+type).hide();
			}else{
			  $("#old_level_"+type).hide();
			  $("#old_scale_"+type).hide();
			  $("old_scale3_"+type).hide();
			}
				
				
			}
			else
			{
				debugger;
				var value=$(this).val();
				var type=$(this).attr("num2");
				debugger;
			if($(this).val() == '1')
			{
				$("#new_scale3_"+type).show();
				$("#new_scale_"+type).hide();
				$("#new_level_"+type).hide();
			
			}else if($(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
			{
				$.ajax({
				  type:"post",
				  url:"process.php",
				  data:"action=get_scale_all&value="+value,
				  success:function(data){
				 // alert(data);
				  $(".new_scale_"+type).html(data);
				  }
				});
				$("#new_scale_"+type).show();
				$("#new_scale3_"+type).hide();
				$("#new_level_"+type).hide();
			}else if($(this).val() == '5')
			{
				$.ajax({
				  type:"post",
				  url:"process.php",
				  data:"action=get_scale_all&value="+value,
				  success:function(data){
				 // alert(data);
				  $(".new_level_"+type).html(data);
				  }
				});
				$("#new_level_"+type).show();
				$("#new_scale_"+type).hide();
				$("#new_scale3_"+type).hide();
			}else{
			  $("#new_level_"+type).hide();
			  $("#new_scale_"+type).hide();
			  $("#new_scale3_"+type).hide();
			}
				
			}
			
		});
</script>
<script>
$(document).on('change','.getpfnum', function() {
	var val=$(this).val();
	var id=$(this).attr('num');
	// alert(id);
			$.ajax({
				  type:"post",
				  url:"process.php",
				  data:"action=get_office_pfdata&value="+val,
				  success:function(html){
					  // alert(html);
				  var arr=JSON.parse(html);
				  // alert(id);
				  // alert(arr);
				  $("#o_order_emp_name_"+id).val(arr['emp_name']);	
				  $("#o_order_present_desig_"+id).val(arr['preapp_designation']);	
				  $("#o_order_old_ps_type_"+id).val(arr['ps_type']);
						if(arr['preapp_scale']=='')
						{
							$("#o_order_old_level_"+id).val(arr['preapp_level']);	
						}
						else
						{
							$("#o_order_old_level_"+id).val(arr['preapp_scale']);	
						}
				  // alert(o_order_old_level);
				  }
				});
});

</script>


		

<script>
var ad=<?php echo $i_count;?>;
$("#incr_add_row").click(function(){
//alert('gkogkg');



	ad++;
       var desig=<?php echo json_encode($alldesignations);?>;
       //console.log();
	var add_new_row="<tr><td width='10%'><input type='text' class='form-control primary getpfnum' placeholder='Enter PF No' id='o_order_emp_pf_"+ad+"' name='o_order_emp_pf_"+ad+"'  num='"+ad+"'/></td><td><input readonly type='text' class='form-control primary' id='o_order_emp_name_"+ad+"' name='o_order_emp_name_"+ad+"'/></td><td><input  class='form-control primary'readonly type='text' id='o_order_present_desig_"+ad+"' name='o_order_present_desig_"+ad+"'/></td><td><input type='text' class='form-control primary' id='o_order_old_ps_type_"+ad+"' name='o_order_old_ps_type_"+ad+"' readonly/></td><td><input type='text' class='form-control primary' readonly id='o_order_old_level_"+ad+"' name='o_order_old_level_"+ad+"'/></td><td><select class='form-control primary select2' id='o_order_new_desig_"+ad+"' name='o_order_new_desig_"+ad+"'><option selected disabled>Select Designation</option>"+desig+"</select></td><td><select class='form-control primary select2 ps_type_addnew_row' id='o_order_new_ps_type_"+ad+"' name='o_order_new_ps_type_"+ad+"' num2='"+ad+"' p_type='new'><option selected disabled> Select Ps_Type</option><?php echo $pay_scale_type;?></select></td><td><div style='display:none;' id='new_scale_"+ad+"'><select class='form-control primary select2 new_scale_"+ad+"' id='o_order_new_ps_"+ad+"' name='o_order_new_ps_"+ad+"'></select></div><div style='display:none' id='new_level_"+ad+"'><select class='form-control primary select2  new_level_"+ad+"' id='o_order_new_level_"+ad+"' name='o_order_new_level_"+ad+"'></select></div><div style='display:none' id='new_scale3_"+ad+"'><input type='text' name='o_order_new_3scale_"+ad+"' id='o_order_new_3scale_"+ad+"'class='form-control new_scale3_"+ad+"'/></div></td></tr><tr><td style='border-bottom: 1px solid black;'><label>Description</label></td><td colspan='7' style='border-bottom: 1px solid black;'><textarea  style='resize:none'class='form-control description' id='o_order_remark_"+ad+"' name='o_order_remark_"+ad+"'  placeholder='Enter Description'></textarea></td></tr>";
	$("#ad_row_incr").append(add_new_row);
	$("#row_count").val(ad);
	$(".select2").select2();
	$('.calender_picker').datepicker({
			format:'dd-mm-yyyy',
			autoclose:true,
			forceParse:false
		});
	
});
</script>
<?php include_once('../global/footer.php');?>  




