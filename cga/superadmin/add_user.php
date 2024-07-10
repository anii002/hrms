<?php
	$GLOBALS['flag']="1.2";
	include('common/header.php');
	include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">			
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i> Add User
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="control/adminProcess.php?action=add_user" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
						<input type="hidden" id="unit_id" name="unit_id">
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">PF NO</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="empid" name="empid" placeholder="Enter PF Number" required>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Name</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="empname" name="empname" placeholder="Employee Name" readonly="">
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label">Mobile</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-phone"></i>
										</span>
										<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile number" readonly="">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">E-Mail</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
										</span>
										<input type="email" class="form-control" id="email" name="email" placeholder="Employee Email id" readonly="">
										</div>
									</div>
								</div>
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label">Designation</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
										</span>
										<input type="text" id="design" name="design" placeholder="Employee Designation" class="form-control" readonly="">
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Pay Level</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
										</span>
										<input type="text" id="paylevel" name="paylevel" class="form-control" placeholder="Employee Pay Level" readonly="">
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">User Name</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-user"></i>
										</span>
										<input type="text" id="username" name="username" class="form-control" readonly placeholder="Set Username">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label"> Password<span style="color:red;">*</span>  <small style="color:red;">Password is Date of Birth of Employee without any (/)</small></label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
										</span>
										<input type="text" id="psw" name="psw" class="form-control" readonly placeholder="Set Password">
										</div>
									</div>
								</div>
							</div>
							<!--/row-->
						
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Department</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
										</span>
										<input type="text" id="deptt" name="deptt" class="form-control" readonly placeholder="">
										<input type="hidden" id="deptt1" name="deptt1" class="form-control" readonly placeholder="">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Role</label>
                    					<select name="role" id="role" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                    						<option value="" selected disabled>Select Role</option>
                    						  <?php
                    						  dbcon1();
                    							 $query_emp =mysql_query("SELECT * from master_role");
                    							
                    							 while($value_emp = mysql_fetch_array($query_emp))
                    							 {
                    							  echo "<option value='".$value_emp['role_shortname']."'>".$value_emp['role_name']."</option>";
                    							}
                    						  
                    						  ?>
                    					</select>			
									</div>
								</div>
							</div>	
						</div>
						<div class="form-actions right">
							<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> Submit</button>&nbsp;
							<button type="button" class="btn default">Cancel</button>
						</div>
					</form>
					<!-- END FORM-->
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Register Users
							</div>
						</div>
						<div class="portlet-body table-responsive">
							<table class="table table-bordered table-hover" id="example1">
							<thead>
							<tr>
								<th>ID</th>
								<th>Employee ID</th>
								<th>Name</th>
								<th>User Name</th>
								<th>ROLE</th>
								<th>Department</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
								 <?php
								 
								dbcon1();
								dbcon2(); 
								$query_emp = "SELECT register_user.*, login.status as user_status, login.username,login.role,dept,login.id as idd  from drmpsurh_sur_railway.register_user,drmpsurh_cga.login where register_user.emp_no = login.pf_number and role not in(1) ";
								$result_emp = mysql_query($query_emp);
								$sr=1;
								echo mysql_error();
								
								while($value_emp = mysql_fetch_array($result_emp))
								{
								echo "
								<tr>
								<td>".$sr++."</td>
								<td>".$value_emp['emp_no']."</td>
								<td>".$value_emp['name']."</td>
								
								<td>".$value_emp['username']."</td>
								<td>".getrole($value_emp['role'])."</td>
								<td>".getdepartment($value_emp['dept'])."</td>
								<td>";
								// <button value='".$value_emp['pfno']."' class='btn btn-primary changerole'>Change Role</button>";
								if($value_emp['user_status']=='0')
								{
								echo "<button value='".$value_emp['emp_no']."' class='btn btn-success active' style='margin-left:10px;width:82px'>Active</button>";
								}
								else
								{
								echo "<button value='".$value_emp['emp_no']."' class='btn btn-warning deactive' style='margin-left:10px;'>Deactive</button>";
								}
								echo "<button id='".$value_emp['idd']."' value='".$value_emp['emp_no']."' class='btn btn-danger remove' style='margin-left:10px;'>Remove</button></td></tr>
								";
								}
								?> 

							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			
		</div>
	</div>
<?php
	include 'common/footer.php';
?>
<script>
    $(document).on("change","#empid",function(){
      var value = $('#empid').val();
      //alert(value);
      $.ajax({
        url: 'control/adminProcess.php',
        type: 'POST',
        data: {action: 'fetch_employee_details', id : value},
      })
      .done(function(html) {
      	//alert(html);
        var data = JSON.parse(html);
        // if(html==1)
        // 	{
        // // 		alert("already registered in Applicant Register list")
        // // 		$('#empid').focus().val('');
        // 	}
        // 	else if(data.pf_number==null)
        // 	{
        // 		alert("Not Found PF number.....")
        // 		$('#empid').focus().val('');
        // 	}
        // 	else
        	{
           	$("#empid").val(data.pf_number);
            $("#empname").val(data.emp_name);
            $("#design").val(data.designation);
            $("#paylevel").val(data.scale);
            $("#deptt").val(data.dept);
            $("#deptt1").val(data.dept1);
            $("#mobile").val(data.mobile);
            $("#username").val(data.pf_number);
            
            $("#psw").val(data.dob);
        }
            
          
      });
      
    });


    
    $(document).on("click",".active",function(){
        var id = $(this).val();
        var result = confirm("Confirm!!! Proceed for user activation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'activeUser', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="add_user.php";
          });
        }
    });
    $(document).on("click",".deactive",function(){
        var id = $(this).val();
        var result = confirm("Confirm!!! Proceed for user deactivation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'deactiveUser', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="add_user.php";
          });
        }
    });

    $(document).on('click','.remove',function(){
    	var id=$(this).attr("id");
    	var pf=$(this).attr("value");
    	//alert(pf);
    	var result = confirm("Confirm!!! Proceed for Remove User..?");
        if(result == true)
        {
    	$.ajax({
    		type:"post",
    		url:"control/adminProcess.php",
    		data:"action=removeUser&id="+id+"&pf="+pf,
    		success:function(data){
    			//alert(data);
    			if(data==1)
    			{
    				alert("successfully Removed...");
    				window.location="add_user.php";
    			}
    			else
    			{
    				alert("Failed");
    			}
    		}
    	});
        }
    });


    var unit_id=Math.floor(Math.random()*90000) + 10000;
    
    $("#unit_id").val(unit_id);

</script>
