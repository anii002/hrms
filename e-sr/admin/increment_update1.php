 <?php 
$_GLOBALS['a'] ='increment';
  include_once('../global/header_update.php');
  
  include('create_log.php');
  
	$action="Visited Increment page";
	$action_on=$_SESSION['set_update_pf'];
	create_log($action,$action_on);
  
  ?>

 <!--Bio Tab Start -->
		<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
			<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Increment</span>
			</div>
			<div style="border:1px solid #67809f;padding:30px;">
				 <div class="box-header with-border">
					  <!--<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Increment </h3>-->
					</div>
				<form method="post" action="process_main1.php?action=update_increment" class="apply_readonly" id="frm_increment">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" class="form-control primary TextNumber common_pf_number" id="incr_pf" name="incr_pf" readonly required />
							  </div>
							</div>
						</div>
						
				</div><br>
			</div>
		<hr style="height:1px;color:#f39c12;background-color:#f39c12;">
		<div class="row">
		<a class="btn btn-primary pull-right" id="incr_add_row" name="incr_add_row">Add Row</a>
		<input type="hidden" id="row_count" name="row_count" >
		</div><br>
			<div class="row">
				<div class="table-responsive"> 
					<table class="table" style="border-collapse:collapse width:100%" border="1" >
						<tr>
							<th width="2%">Sr No</th>
							<th width="15%">Increment Type</th>
							<th width="15%" >Pay Scale Type</th>
							<th width="30%">Pay Scale/Level</th>
							<th width="10%">Rate Of Pay</th>
							<th width="15%">Increment Date</th>
							<th width="30%">Reason</th>
							<th width="30%">Action</th>
						</tr>
						<tbody id="ad_row_incr">
						<?php
							$cnt=1;
							dbcon1();
							$sql=mysql_query("select * from increment_temp where incr_pf_number='".$_SESSION['set_update_pf']."'");
							
							$i_count=mysql_num_rows($sql);
							for($i=1;$i<=$i_count;$i++){
								$result=mysql_fetch_array($sql);
								// print_r($result);
						?>
							<input type="hidden" id="incr_hidden_id<?php echo $i;?>" name="incr_hidden_id<?php echo $i;?>" value="<?php echo $result['id']; ?>">
							<tr id='tr_<?php echo $cnt; ?>' data-id='<?php echo $result["id"]; ?>'>
								<td><?php echo $cnt; ?></td>
								<td>
									<select class="form-control primary select2 incr_type" id="incr_type<?php echo $i;?>" name="incr_type<?php echo $i;?>" style="width:100%;" required tabindex="1">
										
										<?php
											echo get_all_increment_type($result['incr_type']);
										?>
									</select>	
								</td>
								<td>
									<?php
										$pay_scale_type="";
									$sqlDept=mysql_query("select * from pay_scale_type");
									while($rwDept=mysql_fetch_array($sqlDept))
									{
									$pay_scale_type .= "<option value='".$rwDept["id"]."'>".$rwDept["type"]."</option>";
									}
									?>
									<select class="form-control primary ps_type_addnew_row select2" id="ps_type_row_<?php echo $i;?>" name="ps_type_row_<?php echo $i;?>" num="<?php echo $i;?>" style="margin-top:0px; width:100%;" required tabindex="2">
										<?php
											echo get_all_pay_scale_type($result['ps_type']);
										?>
									</select>
								</td>
								<td>
								
								<div class="col-md-12 col-sm-12 col-xs-12" id="scale_row_<?php echo $i;?>" <?php if($result['ps_type']==2||$result['ps_type']==3||$result['ps_type']==4){echo "style=''";}else{echo "style='display:none'";}?>>
									<div class="form-group">
										<div class="col-md-12 col-sm-8 col-xs-12" >
											<select class="form-control primary select2 scale_drop_<?php echo $i;?>" num="<?php echo $i;?>" id="scale_drop_<?php echo $i;?>" name="scale_drop_<?php echo $i;?>" style="width:100%;"  >
											
												<?php echo get_all_scale($result['incr_scale'],$result['ps_type']);?>
											
											</select>
										</div>
									</div>
								</div>
								
								<div class="col-md-12 col-sm-12 col-xs-12" id="scale_text_row_<?php echo $i;?>" <?php if($result['ps_type']==1){echo "style=''";}else{echo "style='display:none'";}?>>
									<div class="form-group">
										<div class="col-md-12 col-sm-8 col-xs-12" >
											<input type="text" class="form-control primary scale_text_row_<?php echo $i;?> ps_3" id="scale_drop_text_<?php echo $i;?>" name="scale_drop_text_<?php echo $i;?>" value="<?php echo $result['incr_scale'];?>" placeholder="Enter 3rd Pay Rate" / tabindex="3">
										</div>
									</div><br>
								</div>
								 
								<div class="col-md-12 col-sm-12 col-xs-12" id="level_row_<?php echo $i;?>" <?php if($result['ps_type']==5){echo "style=''";}else{echo "style='display:none'";}?>>
									<div class="form-group">
									  <div class="col-md-12 col-sm-8 col-xs-12">
										<select class="form-control primary select2 level_drop_<?php echo $i;?>" num="<?php echo $i;?>" id="level_drop_<?php echo $i;?>" name="level_drop_<?php echo $i;?>" style="width:100%;" >
											
											<?php
											echo fetch_all_level($result['incr_level']);?>
										
										</select>
									  </div>
									</div>
								</div>
					</td>
					<td><input type="text" class="onlyNumber" style="width:100%" id="incr_add_row_rop<?php echo $i;?>" name="incr_add_row_rop<?php echo $i;?>" value="<?php echo $result['incr_rop'];?>" tabindex="4"></td>
					<td>
						<input type="text" class="form-control primary calender_picker" id="incr_date<?php echo $i;?>" name="incr_date<?php echo $i;?>" value="<?php echo date('d-m-Y', strtotime($result['incr_date']));?>" required tabindex="5"/></td>
					<td><textarea tabindex="6" style="resize:none;width:100%" class="description clsreason" id="incr_row_reason<?php echo $i;?>" placeholder="enter reason" name="incr_row_reason<?php echo $i;?>"><?php echo $result['incr_remark'];?></textarea></td>					
					<td><button class="btn btn-danger" onClick="deleterow(<?php echo $result["id"]; ?>);">Delete Row</button></td>
						<?php $cnt++; }?>
				</tr>
			</tbody>							
		</table>	
	</div>	
		<br>
		<div class="form-group">
		<div class="col-sm-2 col-xs-12 pull-right">
		    <input type="hidden" id="row_cnt" name="row_cnt" value="<?php echo $cnt;?>">
			<input type="hidden" id="txtsession" name="txtsession"  class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>"/>
			<input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
			<!--<input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />-->
		</div>
		</div>
	</div>
	</form>
			</div>	
		</div>	
			    <!--Increment Tab End -->
				<?php include('modal_js_header.php');?>
 <script>
 
		$(document).on('change','.ps_type_addnew_row', function() {
			//debugger;
			var type=$(this).attr("num");
			//var got_type=type.slice(-1);
			var value=$(this).val();
			if($(this).val() == '1')
			{
				$("#scale_text_row_"+type).show();
				$("#level_row_"+type).hide();
				$("#scale_row_"+type).hide();
			
			}else if($(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
			{
				$.ajax({
				  type:"post",
				  url:"process.php",
				  data:"action=get_scale_all&value="+value,
				  success:function(data){
				 // alert(data);
				  $(".scale_drop_"+type).html(data);
				  }
				});
				$("#scale_row_"+type).show();
				$("#scale_text_row_"+type).hide();
				$("#level_row_"+type).hide();
			}else if($(this).val() == '5')
			{
				$.ajax({
				  type:"post",
				  url:"process.php",
				  data:"action=get_scale_all&value="+value,
				  success:function(data){
				 // alert(data);
				  $(".level_drop_"+type).html(data);
				  }
				});
				$("#level_row_"+type).show();
				$("#scale_row_"+type).hide();
				$("#scale_text_row_"+type).hide();
			}else{
			  $("#level_row_"+type).hide();
			  $("#scale_row_"+type).hide();
			  $("#scale_text_row_"+type).hide();
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
<style>
    .test-select2{
        color:red;
        
    }
    .my-container{
        background: red;
    }
</style>
<script>
// $('select').select2().data('select2').$dropdown.addClass('my-container');
var ad=<?php echo $i_count;?>;
var cnt=<?php echo $i_count;?>;
$("#incr_add_row").click(function(){
	//debugger;
	ad++;
	cnt++;
	var add_new_row="<tr id='tr_"+ad+"'><td>"+ad+"</td><td><select class='form-control primary incr_type select2' id='incr_type"+ad+"' name='incr_type"+ad+"' style='width:100%;' required><option value='blank' selected tabindex=1 autofocus>-- Select Type --</option><option value='blank' ></option><?php $sqlDept=mysql_query('select * from increment_type');while($rwDept=mysql_fetch_array($sqlDept)){echo "<option value=' ".$rwDept["id"]."'> ".$rwDept["increment_type"]."</option>";}?></select></td><td><select class='form-control primary ps_type_addnew_row select2' id='ps_type_row_"+ad+"' name='ps_type_row_"+ad+"' style='margin-top:0px; width:100%;' num='"+ad+"' required tabindex=2><option value='' selected hidden disabled>-- Select PC Type --</option><?php echo $pay_scale_type;?></select></td><td><div class='col-md-12 col-sm-12 col-xs-12' id='scale_row_"+ad+"' num='"+ad+"' style='display:none;'><div class='form-group'> <div class='col-md-12 col-sm-8 col-xs-12'><select class='form-control primary select2 scale_drop_"+ad+"' id='scale_drop_"+ad+"' name='scale_drop_"+ad+"' style='width:100%;'></select></div></div></div><div class='col-md-12 col-sm-12 col-xs-12' id='scale_text_row_"+ad+"' style='display:none;'><div class='form-group'><div class='col-md-12 col-sm-12 col-xs-12'><input type='text' class='form-control ps_3 primary scale_text_row_"+ad+"'  id='scale_drop_text_"+ad+"' name='scale_drop_text_"+ad+"' placeholder='Enter 3rd Pay Rate' tabindex=3/></div></div><br></div><div class='col-md-12 col-sm-12 col-xs-12' id='level_row_"+ad+"' num='"+ad+"' style='display:none;'><div class='form-group'><div class='col-md-12 col-sm-8 col-xs-12'><select class='form-control primary select2 level_drop_"+ad+"' id='level_drop_"+ad+"' name='level_drop_"+ad+"' style='width:100%;'></select></div></div></div></td><td><input type='text' style='width:100%' class='onlyNumber' id='incr_add_row_rop_"+ad+"' placeholder='enter rop' name='incr_add_row_rop"+ad+"' tabindex=4></td><td><input type='text' class='form-control primary calender_picker'placeholder='enter date' id='incr_date"+ad+"' name='incr_date"+ad+"' required tabindex=5/></td><td><textarea style='resize:none;width:100%' id='incr_row_reason_"+ad+"' name='incr_row_reason"+ad+"' placeholder='enter reason' class='clsreason description' tabindex=6> </textarea></td><td></td></tr>";
// 	<button class='btn btn-danger' onClick='deleterow("+ad+");'>Delete Row</button>
	
	$("#ad_row_incr").append(add_new_row);
	$("#row_count").val(ad);
	$("#row_cnt").val(cnt);
// 	$(".select2").select2();
    $('.select2').select2({
        theme: 'default test-select2'
    });
	$('.calender_picker').datepicker({
			format:'dd-mm-yyyy',
			autoclose:true,
			forceParse:false
// 			mask:true
		}).inputmask('dd-mm-yyyy', {
    placeholder: 'dd-mm-yyyy',
    showMaskOnHover: true,
    showMaskOnFocus: true
    });
});
</script>
<script>
function deleterow($id){
    // alert($id);
    if(confirm("Are you sure?")){
        $.post("process_main1.php",{"action":"delete_row_increment","id":$id},function(data){
            // alert(data);
            if(data=="true"){
                alert("Row Deleted Successfully!");
                // window.location.reload();
                document.location.reload();
            }
        });    
    }
    
    // $("#tr_"+$id).remove();
    // cnt--;
    // $("#row_cnt").val(cnt);
    
}
$(".incr_type").on("change",function(e){
//   alert("w"); 
    // alert($(this).attr("id"));
    
    // var value = $("this option:selected").html();
    // $("#mySelect option:selected").html();
    var select_id=$(this).attr("id");
    // console.log(select_id);
    var v=$("#"+select_id+" option:selected").html();
    // console.log(v);
  $(this).parent().parent().find("td .clsreason").val(v);
//   id.val("a");
//   alert(id);
//   console.log(id);
});
$("#incr_remove_row").click(function(){
	//debugger;
	var ad1=<?php echo $i_count;?>;
	$("#ad_row_incr").children().last().remove();;
	$("#row_count").val(ad1);
	
});
</script>
<?php include_once('../global/footer.php');?>  
<script src="select2/select2-tab-fix.js"> </script>
<script>
// alert("w");
$('.select2').select2();
$('.calender_picker').datepicker({
			format:'dd-mm-yyyy',
			autoclose:true,
			forceParse:false
// 			mask:true
		}).inputmask('dd-mm-yyyy', {
    placeholder: 'dd-mm-yyyy',
    showMaskOnHover: true,
    showMaskOnFocus: true
    });
$(document).on('submit','#frm_increment',function(e){
    // e.preventDefault();
    // alert("working");
    $("#ad_row_incr tr").each(function(e){
        console.log($(this).attr("id"));
            console.log($(this).attr("data-id"));
        /*if($(this).attr("data-id")){
        }*/
    });  
 });
</script>