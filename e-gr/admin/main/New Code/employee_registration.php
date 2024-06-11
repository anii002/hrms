<?php
require_once('Global_Data/header.php');
error_reporting(0);
?>

	
 <!-- PNotify -->
      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> <i class="fa fa-users"></i>&nbsp Employee</h3><br>
              </div>

              <div class="title_right">
                
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
					<form action="process.php?action=add_employee" method="POST" class="form-horizontal" id="">
					  <h4 class="bgshades"> Personal Details: </h4>
					  <div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">Employee Type</label>
								  <div class="col-md-8">
									<select id="emp_type" name="emp_type" class="form-control">
									<option value="" disabled selected>Select Employee</option>
									<option value="Service Employee">Service Employee</option>
									<option value="Pensioner Employee">Pensioner Employee</option>
									</select>
								  </div>
                                </div>
						    </div>
						 
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">Emp Id/PF No</label>
								  <div class="col-md-8">
									<input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="Enter Employee Id Or PF No. Or PPO No.">
									
								  </div>
                                </div>
						    </div>
						    </div>
					    <div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">Emp Name</label>
								  <div class="col-md-8">
									<input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Enter Employee Name">
									
								  </div>
                                </div>
						    </div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">Department</label>
								  <div class="col-md-8">
									<select id="emp_dept" name="emp_dept" class="form-control mydept">
									<option value="" disabled selected>Select Department</option>
									<option value="Bill">Bill</option>
									<option value="Account">Account</option>
									</select>
								  </div>
                                </div>
						    </div>
						</div>
                       	 <div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">Designation</label>
								  <div class="col-md-8">
									<select id="emp_desig" name="emp_desig" class="form-control">
									<option value="" disabled selected>Select Designation</option>
									<option value="DPO">DPO</option>
									<option value="Sr DPO">Sr DPO</option>
									</select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">Mobile No.</label>
								  <div class="col-md-8">
									<input type="text" id="emp_mob" name="emp_mob" class="form-control" placeholder="Enter Mobile No.">
								  </div>
                                </div>
						    </div>
						</div>			
				        <div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">Email Id</label>
								  <div class="col-md-8">
									<input type="text" id="emp_email" name="emp_email" class="form-control" placeholder="Enter Email Address">
								  </div>
                                </div>
						    </div>
							
							
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">Aadhar No.</label>
								  <div class="col-md-8">
									<input type="text" id="emp_aadhar" name="emp_aadhar" class="form-control" placeholder="Enter Aadhar No.">
								  </div>
                                </div>
						    </div>
						</div>
						<h4 class="bgshades">Personal Address: </h4>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">Address 1</label>
								  <div class="col-md-8">
									<textarea rows="3" cols="30" id="emp_address1" name="emp_address1" class="form-control" placeholder="Enter Address"></textarea>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">Address 2</label>
								  <div class="col-md-8">
									<textarea rows="3" cols="30" id="emp_address2" name="emp_address2" class="form-control" placeholder="Enter Address"></textarea>
								  </div>
                                </div>
						    </div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">State</label>
								  <div class="col-md-8">
									<?php   
									$query = mysql_query("SELECT * FROM states WHERE status = 1 AND country_id=100 ORDER BY state_name ASC"); 
									$rowCount = mysql_num_rows($query);
									?>
									<select name="emp_state" id="emp_state" class="form-control" style="margin-top:0px;">
										<option >Select State</option>
										<?php
										if($rowCount > 0){
											while($row = mysql_fetch_assoc($query)){ 
												echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';
											}
										}else{
											echo '<option value="">State not available</option>';
										}
										?>
									</select> 
								  </div>
                                </div>
						    </div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">City</label>
								  <div class="col-md-8">
									<select name="emp_city" id="emp_city" class="form-control" style="margin-top:0px;">
										<option  disabled>Select state first</option>
									</select>
								  </div>
                                </div>
						    </div>
						</div>	
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">Pincode</label>
								  <div class="col-md-8">
									<input type="text" id="emp_pincode" name="emp_pincode" class="form-control" placeholder="Enter Pincode">
								  </div>
                                </div>
						    </div>
							</div>						
						<h4 class="bgshades"> Office Address: </h4>
						<div class="row">	
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">Address 1</label>
								  <div class="col-md-8">
									<textarea rows="3" cols="30" id="office_emp_address1" name="office_emp_address1" class="form-control" placeholder="Enter Address"></textarea>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">Address 2</label>
								  <div class="col-md-8">
									<textarea rows="3" cols="30" id="office_emp_address2" name="office_emp_address2" class="form-control" placeholder="Enter Address"></textarea>
								  </div>
                                </div>
						    </div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">State</label>
								  <div class="col-md-8">
									<?php   
									$query = mysql_query("SELECT * FROM states WHERE status = 1 AND country_id=100 ORDER BY state_name ASC"); 
									$rowCount = mysql_num_rows($query);
									?>
									<select name="office_emp_state" id="office_emp_state" class="form-control" style="margin-top:0px;">
										<option >Select State</option>
										<?php
										if($rowCount > 0){
											while($row = mysql_fetch_assoc($query)){ 
												echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';
											}
										}else{
											echo '<option value="">State not available</option>';
										}
										?>
									</select>
								  </div>
                                </div>
						    </div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">City</label>
								  <div class="col-md-8">
									<select name="office_emp_city" id="office_emp_city" class="form-control" style="margin-top:0px;">
										<option  disabled>Select state first</option>
									</select>
								  </div>
                                </div>
						    </div>
						</div>		
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label col-md-4" style="margin-left: -50px;">Pincode</label>
								  <div class="col-md-8">
									<input type="text" id="office_emp_pincode" name="office_emp_pincode" class="form-control" placeholder="Enter Pincode">
								  </div>
                                </div>
						    </div>
							</div>
						<br>
						<div style="margin-left:850px;">
							 <button  type="submit" class="btn btn-info source" >Save</button>
							 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						   
						</div>
					</form>
					</div>

                  </div>
				  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div>
                    <h2>Employee <small>List</small></h2><hr>
                 <div class="x_content">
					<table  class="table table-striped table-bordered display" style="width:100%;"> 
                      <thead>
                         <tr>
							<th>Sr.No</th>
							<th>Type</th>
							<th>ID/PF.No</th>
							<th>Name</th>
							<th>Department</th>
							<th>Designation</th>
							<th>Moblile No.</th>
						 </tr>
					  </thead>
                      <tbody>
		               <?php
					   $cnt=1;
					   $query=mysql_query("Select * from employee where delete_status=1 Limit 50");
					   while($rw_data=mysql_fetch_assoc($query)){
						   $emp_type=$rw_data["emp_type"];
						   $emp_id=$rw_data["emp_id"];
						   $emp_name=$rw_data["emp_name"];
						   $emp_dept=$rw_data["emp_dept"];
						   $emp_desig=$rw_data["emp_desig"];
						   $emp_mob=$rw_data["emp_mob"];
						   echo "<tr>";
						   echo "<td>$cnt</td>";
						   echo "<td>$emp_type</td>";
						   echo "<td>$emp_id</td>";
						   echo "<td>$emp_name</td>";
						   echo "<td>$emp_dept</td>";
						   echo "<td>$emp_desig</td>";
						   echo "<td>$emp_mob</td>";
						      echo "</tr>";
							  $cnt++;
					   }
					   ?>
                           
                         </tbody>
                    </table>
                  </div>             
				  </div>
              </div>

              
            </div>
          </div>
              </div>
            </div>
          </div>
        </div>

		
<?php
require_once('Global_Data/footer.php');
?>
<script src="select2/jquery.js"> </script>
<link href="select2/select2.min.css" rel="stylesheet"/>
<script src="select2/select2.min.js"> </script>
<script>
$("#emp_dept").select2();
$("#emp_desig").select2();
$("#emp_state").select2();
$("#emp_city").select2();
$("#office_emp_state").select2();
$("#office_emp_city").select2();
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
</script>
<script>
		$(document).ready(function() { 
		debugger;
			$("#emp_dept").select2(); 
			$("#emp_state").select2(); 
		});
	</script>

