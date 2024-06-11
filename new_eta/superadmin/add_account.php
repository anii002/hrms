<?php
	$GLOBALS['flag']="1.3";
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
						<a href="#"> Add Accountant / एकाउंटेंट जोड़े </a>
					</li>
				</ul>
													
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i> Add Accountant / एकाउंटेंट जोड़े</span>
					</div>
					
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="control/adminProcess.php?action=AddAcctAdmin" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">कर्मचारी आईडी / PFNO</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-user-circle"></i>
										</span>
										<input type="text" class="form-control" id="empid" name="empid" placeholder="Enter PF Number" required autofocus="true">
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">नाम / Name</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="empname" name="empname" placeholder="Employee Name" readonly="">
										</div>
									</div>
								</div>
								
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">मोबाइल / Mobile</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-phone"></i>
										</span>
										<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile number" readonly="">
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">ई -मेल / E-Mail</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
										</span>
										<input type="email" class="form-control" id="email" name="email" placeholder="Employee Email id" readonly="">
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">पदनाम / Designation</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-user-graduate"></i>
										</span>
										<input type="text" id="design" name="design" placeholder="Employee Designation" class="form-control" readonly="">
										</div>
									</div>
								</div>
								
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">पे लेवल / Pay Level</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-chart-line"></i>
										</span>
										<input type="text" id="paylevel" name="paylevel" class="form-control" placeholder="Employee Pay Level" readonly="">
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
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
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">पासवर्ड / Password</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-unlock-alt"></i>
										</span>
										<input type="text" id="psw" name="psw" class="form-control" readonly placeholder="Set Password">
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">बिल यूनिट / Bill  Unit</label>
									<select class="form-control select2" multiple="multiple" width="100%" tabindex="-1" id="bu" name="bu[]" autofocus="true" required>
			                    		<option value="0" disabled> बिल यूनिट का चयन करेंं / Select Bill Unit</option>
			                    		<?php
			                    			$sql=mysql_query("SELECT billunit as BU FROM `billunit` WHERE au='0107' ORDER BY `BU` ASC");
			                    			while($row = mysql_fetch_array($sql)) {
			                    				echo "<option value='".$row['BU']."'>".$row['BU']."</option>";
			                    			}
			                    		?>
			                    	</select>
									</div>
								</div>
							</div>							
						</div>
						<div class="form-actions right">
							<button type="reset" class="btn default">Cancel</button>
							<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> प्रस्तुत करे / Submit</button>
						</div>
					</form>
					<!-- END FORM-->
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								रजिस्टर अकाउंटेंट / Register Accountant
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body table-responsive">
							<table class="display table-stripped " id="example1">
							<thead>
							<tr>
								<th>अनु क्रमांक<br>ID</th>
								<th>कर्मचारी  आईडी <br>Employee ID</th>
								<th>नाम<br>Name</th>
								<th>मोबाइल<br>Mobile</th>
								<th>उपयोगकर्ता नाम<br>User Name</th>
								<th>विभाग<br>Department</th>
								<th>कार्रवाई / Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								$query_emp = "select employees.*, users.status as user_status, users.username  from employees INNER JOIN users on employees.pfno = users.empid and role='5'  ";
								$result_emp = mysql_query($query_emp);
								$sr=1;
								while($value_emp = mysql_fetch_array($result_emp))
								{
								echo "
								<tr>
								<td>".$sr++."</td>
								<td>".$value_emp['pfno']."</td>
								<td>".$value_emp['name']."</td>
								<td>".$value_emp['mobile']."</td>
								<td>".$value_emp['username']."</td>
								<td>".getdepartment($value_emp['dept'])."</td>
								<td>";
								// <button value='".$value_emp['pfno']."' class='btn btn-primary changerole'>Change Role</button>";
								if($value_emp['user_status']=='0')
								{
								echo "<button value='".$value_emp['pfno']."' class='btn btn-warning activeUser' style='margin-left:10px;'>Active</button></td>";
								}
								else
								{
								echo "<button value='".$value_emp['pfno']."' class='btn btn-danger deactiveUser' style='margin-left:10px;'>Deactive</button></td>";
								}
								echo "</tr>
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
      $.ajax({
        url: 'control/adminProcess.php',
        type: 'POST',
        data: {action: 'fetchEmployee1', id : value},
      })
      .done(function(html) {
        var data = JSON.parse(html);
        if(data==1)
          {
            alert("Already Exists");
            $("#empid").val('');
            $("#empid").focus();
          }
          else if(data.fl==0)
          {
            alert("Employee Not Authorized...");
            $("#empid").val('');
            $("#empid").focus();
          }
          
           else if(data.empid==null)
          {
              alert("PF Number Not Found..");
				// $.jGrowl('PF Number Not Found..', { header: 'Add User' });

          }
          else
          {
            $("#empid").val(data.empid);
            $("#empname").val(data.empname);
            $("#mobile").val(data.mobile);
            $("#design").val(data.designation);
            $("#email").val(data.email);
            $("#paylevel").val(data.level);
            var val = Math.floor(1000 + Math.random() * 9000);
            $("#psw").val(val);
            $("#username").val(data.empid);
          }
      });
    });
    
    $(document).on("click",".activeUser",function(){
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
    $(document).on("click",".deactiveUser",function(){
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
</script>
