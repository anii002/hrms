<?php
$GLOBALS['flag']="2.3";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
?>
			
			<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">प्रयोगकर्ता पंजीकरण / Add User</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i>प्रयोगकर्ता पंजीकरण / Add User
					</div>
					
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="control/adminProcess.php?action=AddControlAdmin" method="post" enctype="multipart/form-data" autocomplete="off"	 class="horizontal-form">
						<input type="hidden" name="deptid" id="deptid" value="<?php echo $_SESSION['dept']; ?>" />
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">कर्मचारी आईडी / PFNO</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-user-circle"></i>
										</span>
										<input type="text" class="form-control" id="empid" name="empid" placeholder="Enter PF Number" required >
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">नाम / Name</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="empname" name="empname" placeholder="Employee Name" >
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">मोबाइल / Mobile</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-phone"></i>
										</span>
										<input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" onchange="phonenumber(this)" placeholder="Enter Mobile number" >
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">ई -मेल / E-Mail</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
										</span>
										<input type="email" class="form-control" id="email" name="email" onchange="email_valid(this)" placeholder="Employee Email id" >
										</div>
									</div>
								</div>
							</div>
							<!--/row-->
							<!--<div class="row">-->
							<!--	<div class="col-md-6">-->
							<!--		<div class="form-group">-->
							<!--			<label class="control-label">मोबाइल / Mobile</label>-->
							<!--			<div class="input-group">-->
							<!--			<span class="input-group-addon">-->
							<!--			<i class="fa fa-phone"></i>-->
							<!--			</span>-->
							<!--			<input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" onchange="phonenumber(this)" placeholder="Enter Mobile number" >-->
							<!--			</div>-->
							<!--		</div>-->
							<!--	</div>-->
							<!--	<div class="col-md-6">-->
							<!--		<div class="form-group">-->
							<!--			<label class="control-label">ई -मेल / E-Mail</label>-->
							<!--			<div class="input-group">-->
							<!--			<span class="input-group-addon">-->
							<!--			<i class="fas fa-envelope"></i>-->
							<!--			</span>-->
							<!--			<input type="email" class="form-control" id="email" name="email" onchange="email_valid(this)" placeholder="Employee Email id" >-->
							<!--			</div>-->
							<!--		</div>-->
							<!--	</div>-->
							<!--</div>-->
							<!--/row-->
							<div class="row">
								<div class="col-md-3 billunitzindex">
									<div class="form-group">
										<label class="control-label">पदनाम / Designation</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-user-graduate"></i>
										</span>
										<input type="text" id="design" name="design" placeholder="Employee Designation" class="form-control" >
										</div>
									</div>
								</div>
								<div class="col-md-2 billunitzindex">
									<div class="form-group">
										<label class="control-label">पे लेवल / Pay Level</label>
										<select name="paylevel" id="paylevel" class="select2 form-control" tabindex="-1" aria-hidden="true" >
											<!--<option value="" selected></option>-->
												
											<?php
											$query_emp = "SELECT `num` FROM `paylevel`";
											$result_emp = mysqli_query($conn,$query_emp);
											while($value_emp = mysqli_fetch_array($result_emp))
											{
											echo "<option value='".$value_emp['num']."'>".$value_emp['num']."</option>";
											}
											?>	
										</select>
										<!--<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-chart-line"></i>
											</span>
											<select name="paylevel" id="paylevel" class="select2 form-control" tabindex="-1" aria-hidden="true" >											
												//<?php
												//$query_emp = "SELECT `num` FROM `paylevel`";
												//$result_emp = mysqli_query($query_emp);
												//while($value_emp = mysqli_fetch_array($result_emp))
												//{
												//echo "<option value='".$value_emp['num']."'>".$value_emp['num']."</option>";
												//}
												//?>	
											</select>
										</div>-->
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">प्रयोगकर्ता  नाम / UserName</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="far fa-user-circle"></i>
										</span>
										<input type="text" id="username" name="username" class="form-control" readonly placeholder="Set Username">
										</div>
									</div>
								</div>
								<div class="col-md-2 billunitzindex">
									<div class="form-group">
										<label class="control-label">स्टेशन  / Station</label>
										<select name="stationcode[]" id="stationcode" class="select2 form-control" multiple="multiple" tabindex="-1" aria-hidden="true">
											  <option value="" selected disabled>Select Station</option>
											  <option value=""></option>
												<?php
												$query_emp = "select stationcode,stationdesc from station";
												$result_emp = mysqli_query($conn,$query_emp);
												while($value_emp = mysqli_fetch_array($result_emp))
												{
												  echo "<option value='".$value_emp['stationcode']."'>".$value_emp['stationdesc']."</option>";
												}
												?>
										</select>
									</div>
								</div>
								<div class="col-md-2 billunitzindex">
									<div class="form-group">
										<label class="control-label">उपयोगकर्ता  / User</label>
										<select name="role" id="role" class="form-control select2" tabindex="-1" aria-hidden="true" required>
											<option value="" selected disabled>Select User</option>
											<option value="12">Controlling Incharge</option>
											<option value="13">Controlling Officer</option>
										</select>
									</div>
								</div>
							</div>
							<!--/row-->
							<div class="row">
								<!--<div class="col-md-6">-->
								<!--	<div class="form-group">-->
								<!--		<label class="control-label">प्रयोगकर्ता  नाम / UserName</label>-->
								<!--		<div class="input-group">-->
								<!--		<span class="input-group-addon">-->
								<!--		<i class="far fa-user-circle"></i>-->
								<!--		</span>-->
								<!--		<input type="text" id="username" name="username" class="form-control" readonly placeholder="Set Username">-->
								<!--		</div>-->
								<!--	</div>-->
								<!--</div>-->
								<!--/span-->
								<!--<div class="col-md-6">-->
								<!--	<div class="form-group">-->
								<!--		<label class="control-label">पासवर्ड / Password</label>-->
								<!--		<div class="input-group">-->
								<!--		<span class="input-group-addon">-->
								<!--		<i class="fa fa-unlock-alt"></i>-->
								<!--		</span>-->
								<!--		<input type="text" id="psw" name="psw" class="form-control" readonly placeholder="Set Password">-->
								<!--		</div>-->
								<!--	</div>-->
								<!--</div>-->
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								<!--<div class="col-md-4 billunitzindex">-->
								<!--	<div class="form-group">-->
								<!--		<label class="control-label">स्टेशन  / Station</label>-->
								<!--		<select name="stationcode[]" id="stationcode" class="select2 form-control" multiple="multiple" tabindex="-1" aria-hidden="true">-->
								<!--			  <option value="" selected disabled>Select Station</option>-->
								<!--			  <option value=""></option>-->
								                    <?php
								                    //$query_emp = "select stationcode,stationdesc from station";
								                    //$result_emp = mysqli_query($query_emp);
								    				//while($value_emp = mysqli_fetch_array($result_emp))
								                    //{
								                    // echo "<option value='".$value_emp['stationcode']."'>".$value_emp['stationdesc']."</option>";
								                    //}
								                    ?>
								<!--		</select>-->
								<!--	</div>-->
								<!--</div>-->
								<!--<div class="col-md-4 billunitzindex">-->
								<!--	<div class="form-group">-->
								<!--		<label class="control-label">उपयोगकर्ता  / User</label>-->
								<!--		<select name="role" id="role" class="form-control select2" tabindex="-1" aria-hidden="true" required>-->
								<!--			<option value="" selected disabled>Select User</option>-->
								<!--			<option value="12">Controlling Incharge</option>-->
								<!--			<option value="13">Controlling Officer</option>-->
								<!--		</select>-->
								<!--	</div>-->
								<!--</div>-->
							</div>
						</div>
						<div class="form-actions right">
							<button type="button" class="btn default">Cancel</button>
							<button type="submit" class="btn blue submit_btn" id="submit_btn" name='button'><i class="fa fa-check"></i> प्रस्तुत करे / Submit</button>
						</div>
					</form>
					<!-- END FORM-->
				</div>
			</div>
		
			
			
			<div class="row">
				<div class="col-md-12">
					 <div class="portlet box blue">
				        <div class="portlet-title">
				          <div class="caption col-md-6">
				            <b>रजिस्टर प्रयोगकर्ता / Register Users</b>
				          </div>
				          <div class="caption col-md-6 text-right backbtn">
				            <a href="#."></a>
				          </div>
				        </div>
        				<div class="portlet-body form">
            
						  <form method="POST">                    
						    <div class="form-body add-train">
						      <div class="row add-train-title">
						        <div class="col-md-12">
						          <div class="form-group">
						           
						            <div class="portlet-body">
						                <div class="table-scrollable summary-table">
						                <table id="example1" class="table table-hover table-bordered display">
						                  <thead>
						                    <tr class="warning">
						                     	<th>अनु क्रमांक<br>ID</th>
												<th>कर्मचारी  आईडी <br>Employee ID</th>
												<th>नाम<br>Name</th>
												<th>मोबाइल<br>Mobile</th>
												<th>उपयोगकर्ता नाम<br>User Name</th>
												<th>स्टेशन<br>Station code</th>
												<th>भूमिका<br>Role</th>
												<th>कार्रवाई / Action</th>
						                    </tr>                   
						                  </thead>
						                  <tbody>
    		<?php
              $query_emp = "SELECT employees.*, users.status as user_status, users.username ,users.role,users.dept,users.station from employees INNER JOIN users on employees.pfno = users.empid AND users.dept='".$_SESSION['dept']."' AND users.role NOT IN(11) AND users.role IN(12,13)";
              $result_emp = mysqli_query($conn,$query_emp);
              $sr=1;
              while($value_emp = mysqli_fetch_array($result_emp))
              {
                  $r='';
                  $role='';
                echo "
                  <tr>
                  <td>".$sr++."</td>
                    <td>".$value_emp['pfno']."</td>
                    <td>".$value_emp['name']."</td>
                    <td>".$value_emp['mobile']."</td>
                    <td>".$value_emp['username']."</td>
                    <td>".$value_emp['station']."</td>";
                     
                    $role=$value_emp['role'];
                    if($role == '12')
                    {
                        $r="Controlling Incharge";
                    }
                    if($role == '13')
                    {
                        $r="Controlling Officer";
                    }
                    echo "<td>".$r."</td>
                    <td>";
                    // <td><button value='".$value_emp['pfno']."' class='btn btn-primary changerole'>Change Role</button>";
                    if($value_emp['user_status']=='0')
                    {
                      echo "<button value='".$value_emp['pfno']."' role='".$value_emp['role']."' class='btn btn-warning activeUser' style='margin-left:10px;'>Active</button></td>";
                    }
                    else
                    {
                      echo "<button value='".$value_emp['pfno']."' role='".$value_emp['role']."' class='btn btn-danger deactiveUser' style='margin-left:10px;'>Deactive</button> 
                      		
                      		<a id='".$value_emp['pfno']."' data-toggle='modal' href='#updateDetails' style='margin-top: 5px;' class='btn btn-success btn_action' style='margin-left:10px;'>Update</a>
                      		<a id='".$value_emp['pfno']."' role='".$value_emp['role']."' role_name='".$r."' data-toggle='modal' href='#rol_transfer' style='margin-top: 5px;' class='btn btn-primary btn_action_role' style='margin-left:10px;'>Role Transfer</a></td>";
                    }
                    
                    // <a id='".$value_emp['pfno']."' data-toggle='modal' href='#changePass' style='margin-top: 5px;' class='btn btn-warning generatePassword' style='margin-left:10px;'>Generate Password</a>
                  echo "</tr>
                ";
              }
            ?> 
						                  </tbody>
						                </table>
						              </div>
						              <div class="text-right">
						                <!-- <button class="btn yellow">Print</button> -->
						              </div>
						            </div>
						          </div>
						          
						        </div>
						      </div>
						  </div>
						</form>       

        </div>
      </div>
				</div>
			</div>
			
		</div>
	</div>
	
	<div id="changePass" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
		<div class="modal-header btn-orange-moon">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title">Generated Password : <span id="name1" name="name1"></span>	</h4>
		</div>
		<form class="horizontal-form">
			<div class="modal-body">				
				<div class="row">					
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">कर्मचारी आईडी / PFNO</label>
							<div class="input-group">
							<span class="input-group-addon">
							<i class="fa fa-user-circle"></i>
							</span>
							<input type="text" class="form-control" id="pf_no_cp" name="pf_no_cp" readonly>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">New Generated Password</label>
							<div class="input-group">
							<span class="input-group-addon">
							<i class="fa fa-unlock-alt"></i>
							</span>
							<input type="text" class="form-control" id="new_password" name="new_password">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
				<!-- <button type="submit" class="btn blue">Change Password</button> -->
			</div>
		</form>
	</div>
	
	<div id="updateDetails" class="modal fade modal-scroll modalemployeedata" tabindex="-1" data-replace="true">
		<div class="modal-header btn-orange-moon">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title">Employee Data : <span id="emp_name1" name="emp_name1"></span>	</h4>
		</div>
		<form  action="control/adminProcess.php?action=updateEmpData" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
			<!-- -->
		<div class="modal-body">
			<div class="portlet-body form">
					<div class="form-body">
						
						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">कर्मचारी आईडी / PFNO</label>
									<div class="input-group">
										<span >
											<input class="form-control" readonly type="text" id="emp_pfno" name="emp_pfno" />	
										</span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">नाम / Name</label>
									<div class="input-group">
										<span >
											<input class="form-control" readonly type="text" id="emp_name" name="emp_name" />	
										</span>
									</div>
								</div>
							</div>
							
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">मोबाइल / Mobile</label>
									<div class="input-group">
										<span >
											<input class="form-control" maxlength="10" type="text" id="emp_mobile" name="emp_mobile" required />	
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">पदनाम / Designation</label>
										<select name="emp_desig" id="emp_desig" class="select2 form-control" tabindex="-1" aria-hidden="true" >
											  <option value="0">Please Select Desig</option>
												<?php
												$query_emp = "SELECT `DESIGCODE`,`DESIGLONGDESC` FROM `designations`";
												$result_emp = mysqli_query($conn,$query_emp);
												while($value_emp = mysqli_fetch_array($result_emp))
												{
												  echo "<option value='".$value_emp['DESIGCODE']."'>".$value_emp['DESIGLONGDESC']."</option>";
												}
												?>
										</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">स्तर  / Level</label>
									
										<select name="emp_level" id="emp_level" class="select2 form-control" tabindex="-1" aria-hidden="true" >
											  <option value="0" >Please Select Level</option>
												
												<?php
												$query_emp = "SELECT `num` FROM `paylevel`";
												$result_emp = mysqli_query($conn,$query_emp);
												while($value_emp = mysqli_fetch_array($result_emp))
												{
												  echo "<option value='".$value_emp['num']."'>".$value_emp['num']."</option>";
												}
												?>	
										</select>
								</div>
							</div>	
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">स्टेशन  / Station</label>
									
										<select name="emp_station[]" id="emp_station" multiple="multiple" class="select2 form-control" tabindex="-1" aria-hidden="true" >
											  <option value="" >Please Select Station</option>
											   <option value="">All</option>
												<?php
												$query_emp = "select stationcode,stationdesc from station";
												$result_emp = mysqli_query($conn,$query_emp);
												while($value_emp = mysqli_fetch_array($result_emp))
												{
												  echo "<option value='".$value_emp['stationcode']."'>".$value_emp['stationdesc']."</option>";
												}
												?>											
										</select>
									<!-- </div> -->
								</div>
							</div>	

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">उपयोगकर्ता  / User</label>
									
										<select name="emp_role" id="emp_role" class="form-control select2" tabindex="-1" aria-hidden="true" required>
											<option value="0" selected>Select User </option>
											<option value="12">Controlling Incharge</option>
											<option value="13">Controlling Officer</option>
										</select>
								</div>
							</div>
						</div>
						<!--/row-->
							
						</div>
						<!--/row-->
			
			</div>
		</div>
		<div class="modal-footer">
			<!-- <button type="button" data-dismiss="modal" class="btn btn-default">Close</button> -->
			<button type="submit" class="btn blue">Update Details</button>
		</div>
		</form>
	</div>
	
	<div id="rol_transfer" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
		<div class="modal-header btn-orange-moon">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title">Employee Data : <span id="emp_name_head" name="emp_name_head"></span>	</h4>
		</div>
		<form  action="control/adminProcess.php?action=role_transfer" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
			<!-- -->
			<input class="form-control" readonly type="hidden" id="emp_roles" name="emp_roles" />	
		<div class="modal-body">
			<div class="portlet-body form">
					<div class="form-body">
						
						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">कर्मचारी आईडी / PFNO</label>
									<div class="input-group">
										<span >
											<input class="form-control" readonly type="text" id="emp_pfno1" name="emp_pfno1" />	
										</span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">नाम / Name</label>
									<div class="input-group">
										<span >
											<input class="form-control" readonly type="text" id="emp_name_r" name="emp_name_r" />	
										</span>
									</div>
								</div>
							</div>
							
						</div>
                        
                        <div class="row">
							<div class="col-md-6">
								<div class="form-group">
								    <label class="control-label">भूमिका / Role</label>
									<div class="input-group">
										<span >
											<input class="form-control" readonly type="text" id="role_name" name="role_name" />	
										</span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">कर्मचारी नाम / Employee Names</label>
										<select name="transfer_emp_id" id="transfer_emp_id" class="select2 form-control" tabindex="-1" aria-hidden="true" >
											  <option value="0">Please Select Employee</option>
																							
										</select>
								</div>
							</div>
						</div>
						<!--/row-->
							
						</div>
						<!--/row-->
			
			</div>
		</div>
		<div class="modal-footer">
			<!-- <button type="button" data-dismiss="modal" class="btn btn-default">Close</button> -->
			<button type="submit" class="btn blue">Role Transfer</button>
		</div>
		</form>
	</div>
	
<?php
	include 'common/footer.php';
?>
<script>
    
    $(document).on("click",".btn_action",function(){
      var value = $(this).attr('id');
      // alert(value);
      $.ajax({
        url: 'control/adminProcess.php',
        type: 'POST',
        data: {action: 'fetchEmployeeUpdated', id : value},
      })
      .done(function(html) {
        // alert(html);
        var data = JSON.parse(html);
        // alert(data.desig);
        $("#emp_pfno").val(data.pfno);
        $("#emp_name").val(data.name);
        $("#emp_name1").val(data.name);
        $("#emp_mobile").val(data.mobile);
        $("#emp_desig").val(data.desig_id).trigger("change");
        $("#emp_station").val(data.station).trigger("change");
        $("#emp_level").val(data.level).trigger("change");
        $("#emp_role").val(data.role).trigger("change");
        // $("#dept").val(data.dept);
      });
      
    });
    
    $(document).on("click",".btn_action_role",function(){ 
      var value = $(this).attr('id');
      var role = $(this).attr('role');
      var role_name = $(this).attr('role_name');
      
       $("#emp_roles").val(role);
      // alert(value);
      $.ajax({
        url: 'control/adminProcess.php',
        type: 'POST',
        data: {action: 'fetchEmployeeUpdated', id : value},
      })
      .done(function(html) {
        // alert(html);
        var data = JSON.parse(html);
        // console.log(data);
        $("#emp_pfno1").val(data.pfno);
        $("#emp_name_r").val(data.name);
        $("#emp_name_head").html(data.name);
        $("#role_name").val(role_name);
        $("#transfer_emp_id").html(data.option);
      });
      
    });
    
    $(document).on("change","#empid",function(){
      var value = $("#empid").val();
      $.ajax({
        url: 'control/adminProcess.php',
        type: 'POST',
        data: {action: 'fetchEmployee1', id : value},
      })
      .done(function(html) {
          var data = JSON.parse(html);
         // alert(data);
          //alert(data.f1);
          if(data==1)
          {
              alert("Already Exists");
              $("#empid").val('');
            $("#empid").focus();
            
          }
        //   else if(data.fl==0)
        //   {
        //       alert("Employee not authorized..");
        //       $("#empid").val('');
        //     $("#empid").focus();
            
        //   }
           else if(data.empid==null)
          {
              alert("PF Number Not Found..");
                $("#empid").val('');
            $("#empid").focus();
          }
          else
          {
            $("#empid").val(data.empid);
            $("#empname").val(data.empname);
            $("#mobile").val(data.mobile);
            $("#design").val(data.designation);
            $("#email").val(data.email);
            $("#paylevel").val(data.level).trigger("change");
            var val = Math.floor(1000 + Math.random() * 9000);
            $("#psw").val(val);
            $("#username").val(data.empid);
                          
          }
        
      });
      
    });
    
    
    $(document).on("click",".activeUser",function(e){
        e.preventDefault();
        var id = $(this).val();
        var role = $(this).attr('role');
        // alert(id);
        var result = confirm("Confirm!!! proceed for user activation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'activeUser', id : id, role: role},
          })
          .done(function(html) {
            alert(html);
            window.location="add_user.php";
          });
        }
    });
    $(document).on("click",".deactiveUser",function(e){
        e.preventDefault();
        var id = $(this).val();
        var role = $(this).attr('role');
        // alert(id);
        var result = confirm("Confirm!!! proceed for user deactivation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'deactiveUser', id : id, role:role},
          })
          .done(function(html) {
            alert(html);
            window.location="add_user.php";
          });
        }
    });
    
    
    
    $(document).on("click",".generatePassword",function(){
    	var pf=$(this).attr('id');
    	$("#pf_no_cp").val(pf);
    	// alert(pf);
		$.ajax({
			url: 'control/adminProcess.php',
			type: 'POST',
			data: {action: 'generatePassword', id : pf},
		})
		.done(function(html) {
// 			alert(html);
			if(html != 0){
        		$("#new_password").val(html);
			}
			else
			{
				alert("Password Not Generated.");
			}
		});

    });
    
    
    function phonenumber(inputtxt)  
    {  
    
      var phoneno = /^[6789]\d{9}$/;  
      if((inputtxt.value.match(phoneno)))  
      {  
        return true;  
        }  
        else  
        {  
        $("#mobile").val("");
         $("#mobile").focus();
        alert("Invalid Mobile number");  
        
        return false;  
        }  
    }
    
    function email_valid(inputtxt)  
    {  
        var phoneno = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
        if((inputtxt.value.match(phoneno)))  
        {  
            return true;  
        }  
      	else  
        {  
            alert("Enter Valid Email Address");
            // $("#email").val("");                  
            $("#email").focus();                  
            return false;  
        }  
    }
    
</script>
