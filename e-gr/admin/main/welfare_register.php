<?php
require_once('Global_Data/header.php');
error_reporting(0);
include('config.php');
include('functions.php');
?>

	
 <!-- PNotify -->
      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> <i class="fa fa-users"></i>User/Admin Registration</h3><br>
              </div>

              <div class="title_right">
                
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
					<form action="process.php?action=add_welfare" method="POST" class="form-horizontal">
					  <h4 class="bgshades"> Personal Details: </h4>
					  <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >Emp Id/PF No</label>
								  <div class="col-md-8 col-sm-6 col-xs-12">
									<input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="Enter Employee Id Or PF No. Or PPO No." required>
									
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >Emp Name</label>
								  <div class="col-md-8 col-sm-6 col-xs-12">
									<input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter Employee Name" required>
									
								  </div>
                                </div>
						    </div>
					</div>
					    <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Section</label>
								  <div class="col-md-8 col-sm-6 col-xs-12">
									<select name="section" style="width:100%" id="section" class="form-control" required>
									<option disabled selected>----Select Section----</option>
										<?php 
											$fetch_section=mysqli_query($db_egr,"select * from tbl_section");
											while($section_fetch=mysqli_fetch_array($fetch_section))
											{
												echo "<option value='".$section_fetch['sec_id']."'>".$section_fetch['sec_name']."</option>";
											}
											
										?>
									</select>
								  </div>
                                </div>
						    </div>
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" >Department</label>
								  <div class="col-md-8 col-sm-6 col-xs-12">
									<select id="user_dept" name="user_dept" style="width:100%" class="form-control mydept" required>
									<option value="" disabled selected>---Select Department---</option>
									<?php
										$fetch_dept=mysqli_query($db_egr,"select * from  tbl_department");
										while($dept_fetch=mysqli_fetch_array($fetch_dept))
										{
											echo "<option value='".$dept_fetch['dept_id']."'>".$dept_fetch['deptname']."</option>";
										}
									?>
									<!--<option value="Bill">Bill</option>
									<option value="Account">Account</option>-->
									</select>
								  </div>
                                </div>
						    </div>
						</div>
                       	 <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"  >Designation</label>
								  <div class="col-md-8 col-sm-6 col-xs-12">
									<select id="user_desig" name="user_desig" style="width:100%" class="form-control" required>
									<option value="" disabled selected>---Select Designation---</option>
									<?php
										$fetch_des=mysqli_query($db_egr,"select * from  tbl_designation");
										while($des_fetch=mysqli_fetch_array($fetch_des))
										{
											echo "<option value='".$des_fetch['id']."'>".$des_fetch['designation']."</option>";
										}
									?>
									<!--option value="DPO">DPO</option>
									<option value="Sr DPO">Sr DPO</option-->
									</select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"  >Mobile No.</label>
								  <div class="col-md-8 col-sm-6 col-xs-12">
									<input type="text" id="user_mob" name="user_mob" class="form-control" placeholder="Enter Mobile No." onChange="phonenumber(this)">
								  </div>
                                </div>
						    </div>
						</div>			
				        <div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"  >Email Id</label>
								  <div class="col-md-8 col-sm-6 col-xs-12">
									<input type="email" id="user_email" name="user_email" class="form-control" placeholder="Enter Email Address" required>
								  </div>
                                </div>
						    </div>
							
							
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"  >Aadhar No.</label>
								  <div class="col-md-8 col-sm-6 col-xs-12">
									<input type="number" id="user_aadhar" name="user_aadhar" class="form-control" placeholder="Enter Aadhar No." required onChange="adharnumber(this)">
								  </div>
                                </div>
						    </div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"  >Office</label>
								  <div class="col-md-8 col-sm-6 col-xs-12">
								  <select id="user_office" name="user_office" style="width:100%" class="form-control" required>
									<option value="" disabled selected>---Select Office---</option>
								  <?php
									$fetch_office=mysqli_query($db_egr,"select * from tbl_office");
									while($office_fetch=mysqli_fetch_array($fetch_office))
									{
										echo "<option value='".$office_fetch['office_id']."'>".$office_fetch['office_name']."</option>";
									}
								  ?>
								  </select>
									<!--<input type="text" id="user_office" name="user_office" class="form-control" placeholder="Enter Office">-->
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"  >Station</label>
								  <div class="col-md-8 col-sm-6 col-xs-12">
								   <select id="user_station" name="user_station" style="width:100%" class="form-control" required>
								   <option value="" disabled selected>---Select Station---</option>
								   <?php
									$fetch_station=mysqli_query($db_egr,"select * from tbl_station");
									while($station_fetch=mysqli_fetch_array($fetch_station))
									{
										echo "<option value='".$station_fetch['station_id']."'>".$station_fetch['station_name']."</option>";
									}
									?>
										<!--<option value="solpaur">Solapur DRM</option>
										<option value="pune">Pune DRM</option>-->
								  </select>
									<!--<input type="text" id="emp_station" name="emp_station" class="form-control" placeholder="Enter Station">-->
								  </div>
                                </div>
						    </div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"  >User Name</label>
								  <div class="col-md-8 col-sm-6 col-xs-12">
								  <?php
									$six_digit_random_number = mt_rand(100000, 999999);
								  ?>
									<input type="text" id="login_name" name="login_name" class="form-control" value="SUR_<?php echo $six_digit_random_number;?>" required readonly>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"  >Password</label>
								  <div class="col-md-8 col-sm-6 col-xs-12">
									<input type="text" id="login_pass" name="login_pass" class="form-control" value="" required readonly>
								  </div>
                                </div>
						    </div>
						</div>
						<br/>
						<div class="col-sm-7 col-xs-12 pull-right">
							 <button  type="submit" class="btn btn-info source" >Save</button>
							 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						   
						</div>
					</form>
					</div>
                  </div>
              </div>
            </div>
          </div>
        </div>

		
<?php
require_once('Global_Data/footer.php');
?>
<link href="select2/select2.min.css" rel="stylesheet"/>
<script src="select2/select2.min.js"> </script>
<script>
$("#emp_dept").select2();
$("#user_desig").select2();
$("#emp_state").select2();
$("#emp_city").select2();
$("#office_emp_state").select2();
$("#office_emp_city").select2();
$("#user_office").select2();
$("#user_station").select2();
$("#section").select2();
$("#user_dept").select2();


</script>
<script>


 $('#emp_state').on('change',function(){
        var stateID = $(this).val();
		//alert(stateID);
        if(stateID){
            $.ajax({
                type:'POST',
                url:'statechange.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#emp_city').html(html);
                }
            }); 
        }else{
            $('#emp_city').html('<option value="">Select state first</option>'); 
        }
    });	
	$('#office_emp_state').on('change',function(){
        var stateID = $(this).val();
		//alert(stateID);
        if(stateID){
            $.ajax({
                type:'POST',
                url:'statechange.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#office_emp_city').html(html);
                }
            }); 
        }else{
            $('#office_emp_city').html('<option value="">Select state first</option>'); 
        }
    });	
		
		var login_pass=$("#login_name").val();
		//alert(login_pass);
		$("#login_pass").val(login_pass);
		
		function phonenumber(inputtxt)  
		{  
		  var phoneno = /^\d{10}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
			  return true;  
				}  
			  else  
				{  
				alert("Mobile number must be integer and 10 digits");  
				$("#user_mob").val("");
				return false;  
				}  
		}
		function adharnumber(inputtxt)  
		{  
		  var phoneno = /^\d{12}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
			  return true;  
				}  
			  else  
				{  
				alert("Adhar Card number must be integer and 12 digits"); 
				$("#user_aadhar").val("");
				return false;  
				}  
		}

</script>
