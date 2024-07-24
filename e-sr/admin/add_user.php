<?php 
// $_GLOBALS['a'] ='biodata';
  include_once('../global/header_update.php');
  include_once('../dbconfig/dbocn.php');
  
	// include('create_log.php');
  
	// $action="Visited Biodata page";
	// $action_on=$_SESSION['set_update_pf'];
	// create_log($action,$action_on);
	
	
  ?>

<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
			<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp; User Managment</span>
			</div>
			<div style="border:1px solid #67809f;padding:30px;">
			<form action='process.php?action=save_user' method='post'>
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp; ADD USER</h3>
				</div><br>				
				<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group bio">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="bio_pf_no" name="bio_pf_no" class="form-control form-text TextNumber nospace getpfnum" placeholder="Enter PF Number" maxlength="11" num='1'  required />
									<span class="help-block bio_pf_no"></span>
								  </div>
								</div>
							</div>
							
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group ">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Name</label>
							 <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="emp_name1" name="emp_name1" class="form-control getnum"  readonly />
								
							 </div>
						</div>
					</div>
			</div>
				<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group bio">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<input type='text' class='form-control' id='emp_dept' name='emp_dept' readonly />
									  </div>
									</div>
								</div>
								
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group old_pf">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation</label>
								 <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type='text' class='form-control' id='emp_desig' name='emp_desig' readonly />
								 </div>
							</div>
						</div>
				</div><br>
				<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group bio">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >User Type</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<select class="form-control primary select2" id="emp_usertype" name="emp_usertype" style="margin-top:0px; width:100%;" required>
								<option selected disabled value="">Select User Type</option>
								<option value="user">Bill Unit Clerk</option>
								
								
							</select>
								  </div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group bio">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Enter User Name </label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="emp_username" name="emp_username" class="form-control form-text" readonly>
									
								  </div>
								</div>
							</div>
			</div><br>
			<div class="row">
					<!--<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group old_pf">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Enter Password<br><small style='color:red'>(Password is aadhar Number of employee)</small></label>
							 <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="password" id="emp_pass" name="emp_pass" class="form-control form-text " placeholder="Enter Password"  readonly >
								
							 </div>
							 
						</div>
					</div>-->
								<!--div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group bio">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >Set Billunits</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<select class="form-control primary select2" multiple='true' id="billunit_id" name="billunit_id[]" style="margin-top:0px; width:100%;" > 
										
										<?php //echo $allbillunit;?>
									</select>
									  </div>
									</div>
								</div-->
			</div>
		
			
				<!--div class="row">
					<center><b>OR</b></center><br>
				</div-->
				
				<hr>
				<h4>Assign Billunit</h4>
				<hr>
				
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group old_pf">
							<label class="control-label col-md-12 col-sm-3 col-xs-12" >Department</label>
							 <div class="col-md-8 col-sm-8 col-xs-12" >
								<select class="form-control primary select2" id="search_dept" name="search_dept" style="width:100%;" required>
									<option value="" selected hidden disabled>-- Select Department --</option>
									<?php
										$sqlDept=mysqli_query($conn,"select * from department");
									while($rwDept=mysqli_fetch_array($sqlDept))
										{
										?>
									<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["DEPTDESC"]; ?></option>
									<?php
									}
						
									?>
								</select>
							</div>
							
						</div>
					</div>
					
			
				
				
				</div>
				<br>
			<div class="row" id='search_data1' >	
				<div id='search_data'></div>	
			<input type='hidden' id='text_approve' name='text_approve[]'/>
			<input type='hidden' id='text_approve1' name='text_approve1[]'/>
			</div>
						<!--div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group bio">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >From Billunits</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<select class="form-control primary select2" id="frm_bill_unit" name="frm_bill_unit" style="margin-top:0px; width:100%;" > 
										<option selected disabled>Select Billunit</option>
										<?php //echo $allbillunit;?>
									</select>
									  </div>
									</div>
								</div>
								
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="form-group bio">
									<label class="control-label col-md-4 col-sm-3 col-xs-12" >To Billunits</label>
									  <div class="col-md-8 col-sm-8 col-xs-12" >
										<select class="form-control primary select2" id="to_bill_unit" name="to_bill_unit" style="margin-top:0px; width:100%;" > 
										<option selected disabled>Select Billunit</option>
										<?php //echo $allbillunit;?>
									</select>
									  </div>
									</div>
								</div>
						</div-->
		
			
			<br>
			<div class="col-sm-6 col-xs-12 pull-right">
					<center>
						 <button  type="submit"  class="btn btn-primary source"  name="bio_saveBtn" id="bio_saveBtn">Save</button>
						  <button  type="submit" class="btn btn-danger source" name="bio_updateBTN" id="bio_updateBTN">Cancel</button>
						 <button type="button" class="btn btn-danger"  style="display:none;" data-dismiss="modal">Close</button></center>
			</div>
					
					<br>
				
				
				</form>
			</div>
</div>
<?php include_once('../global/footer.php');?>  

<script>
$(document).on('change','#search_dept', function() {
	var a=$(this).val();
	//alert(a);
				$.ajax({
				  type:"post",
				  url:"process.php",
				  data:"action=get_billunit_search&search="+a,
				  success:function(html){
					//alert(html);
					$("#search_data").html(html);
				  }
				});
});			
 // $(document).on("click", ".bill_unit_chkbox", function(){
	
	// debugger;
	// var a=$(this).attr('attr');
	// var bill=[];
	// document.getElementById("demo").innerHTML = bill;
	// while()
	// {}
	// if(a!=""){
		// alert(a);
		// a += ",";
		// bill.push(a);
	// }
	// else{
		// alert('Unchecked');
	// }
	// bill.toString();
	// if($("#text_approve").val()!=""){
		// $("#text_approve").val("#" +bill);
	// }else{
		// $("#text_approve").val(bill);
	// }
  // $("#text_approve").val(bill);
//alert(bill);

// });


$(document).on("click", ".check", function(){
	debugger;
	var sThisVal = $("#text_approve").val();
	if(this.checked){
		if(sThisVal != ''){
		
		}
		sThisVal += ",";
       sThisVal += this.id; 
	   $("#text_approve").val(sThisVal);
  	}
	else
	{
		sThisVal1=","+this.id;
		//alert(sThisVal);
		var aaa= sThisVal.replace(sThisVal1,'');
		//alert(aaa);
		$("#text_approve").val(aaa);
		//sThisVal -= aaa;
		
	}
	
	
  	// $('input:checkbox.check').each(function () {
        // if(this.checked)
       		// $('.forward_modal').removeAttr("disabled", "disabled");
       	// else
   			// $('.forward_modal').attr("disabled", "disabled");
  	// });
  	
});

</script>	

<script>
$(document).on('change','.getpfnum', function() {
	var val=$(this).val();
	var id=$(this).attr('num');
	 // alert(val);
			$.ajax({
				  type:"post",
				  url:"process.php",
				  data:"action=get_predata&val3="+val,
				  success:function(html){
					 // alert(html);
				  var arr=JSON.parse(html);
				$("#emp_name1").val(arr['emp_name']);	
				$("#emp_pass").val(arr['aadhar_number']);	
				$("#emp_username").val(arr['pf_number']);	
				$("#emp_dept").val(arr['preapp_department']);	
				$("#emp_desig").val(arr['preapp_designation']);	
				 
				  }
				});
});


$(document).on("click", ".check-all", function(){
	
	var cnt=0;
	var array1 = [];
	var demo='';
	if(this.checked){
		//$('input:checkbox.check').attr("checked", "checked");
		$('input:checkbox.check').each(function () {
			$(this).attr("checked", "checked");
			cnt++;
				demo = $(this).attr("id");
				
				array1.push(demo);    
				
				});
				alert(array1.toString(cnt));
				$("#text_approve1").val(array1.toString(cnt));
			

// alert(demo);
	}else{
		//$('input:checkbox.check').removeAttr("checked", "checked");
		$('input:checkbox.check').each(function () {
			$(this).removeAttr("checked", "checked");
		});
		// $('#search_data').load(window.location.href + "#search_data1");
	}
});
</script>

