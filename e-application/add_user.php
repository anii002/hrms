<?php
	$GLOBALS['flag']="4.91";
	include('common/header.php');
	include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="dashboard.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"> Add User</a>
					</li>
				</ul>								
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6 col-xs-6">
						Add User
					</div>
					<!-- <div class="caption col-md-6 text-right backbtn">
						<button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
					</div> -->
					
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="control/adminProcess.php?action=add_user" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
						<div class="form-body">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">कर्मचारी आईडी / PFNO</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-user-circle"></i>
										</span>
										<input type="text" class="form-control" id="empid" name="empid" placeholder="Enter PF Number" required autofocus="true">
										<!-- <input type="hidden" class="form-control" id="dob" name="dob"> -->
										<input type="hidden" class="form-control" id="deptno" name="deptno">
										<input type="hidden" class="form-control" id="designo" name="designo">
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Employee Name</label>
										<input type="text" id="empname" name="empname" class="form-control" placeholder="Employee Name" readonly="">
									</div>
								</div>	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Date Of Birth</label>
										<input type="text" class="form-control" id="dob" name="dob" placeholder="Date Of Birth" readonly="">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Department</label>
													<input type="text" id="dept" name="department" class="form-control" placeholder="Employee Department" readonly="">
									</div>
								</div>
								<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Designation</label>
											<div class="input-group">
											<span class="input-group-addon">
											<i class="fas fa-user-graduate"></i>
											</span>
											<input type="text" class="form-control" id="design" name="designation" placeholder="Employee Designation" readonly="">
											</div>
										</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Station</label>
										<input type="text" class="form-control" id="station" name="station" placeholder="Employee Station" readonly="">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">User</label>
											<select class="form-control select2" style="width: 100%;" tabindex="-1" id="role" name="role" autofocus="true" required>
			                    				<option value="" selected="" disabled="">Select User</option>
			                    				<option value="1">Billunit Clerk</option>
			                    				<option value="2">Chief OS</option>
			                    			</select>
									</div>
								</div>
								<!-- <div class="col-md-3">
									<div class="form-group">
											<div class="input-group">
												<label class="control-label">Office Description</label>
												<textarea rows="4" cols="30" name="description" required=""></textarea>
											</div>
									</div>
								</div> -->
								<!-- <div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Bill Unit</label>
										<select class="form-control select2" style="width: 100%;" tabindex="-1" id="bill_unit" name="bill_unit[]" autofocus="true" multiple="multiple" required>
			                    		<option value="" selected="selected" disabled="disabled">Select Bill Unit</option>
			                    		<?php
			                    	// 	dbcon2();
			                    	// 	$query = mysql_query("SELECT billunit FROM billunit where au='0107' ORDER BY `billunit` ASC");
			                    	// 	while($row = mysql_fetch_array($query))
			                    	// 	{
			                    	// 		echo "<option value='".$row['billunit']."'>".$row['billunit']."</option>";
			                    	// 	}
			                    		?>
			                    	</select>
									</div>
								</div> -->
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Office Description</label>
										<select class="form-control select2" style="width: 100%;" tabindex="-1" name="description" autofocus="true" required>
			                    		<option value="" selected="selected" disabled="disabled">Select Office Description</option>
			                    		<?php
			                    		dbcon3();
			                    		$query = mysql_query("SELECT sec_name FROM tbl_section");
			                    		while($row = mysql_fetch_array($query))
			                    		{
			                    			echo "<option value='".$row['sec_name']."'>".$row['sec_name']."</option>";
			                    		}
			                    		?>
			                    	</select>
									</div>
								</div>
							</div>	
							<div class="row">
							
								<div class="row">
								
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
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>रजिस्टर प्रयोगकर्ता / Register Users
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body table-responsive">
							<table class="display table-stripped " id="example1">
							<thead>
							<tr>
								<th>ID</th>
								<th>Employee ID</th>
								<th>नाम<br>Name</th>
								<th>विभाग<br>Department</th>
								<th>Role</th>
								<th>Office Description</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								dbcon3();
								$query = mysql_query("SELECT * FROM `add_user` WHERE user_role IN ('1' ,'2') ORDER BY user_id DESC");
								$sr=1;
								while($row = mysql_fetch_array($query))
								{
									dbcon2();
									$query_emp = "SELECT name FROM register_user WHERE emp_no = '".$row['user_pfno']."'";
									
									$result_emp = mysql_query($query_emp);
									
									while($value_emp = mysql_fetch_array($result_emp))
									{
										dbcon2();
									 	$qry = mysql_query("SELECT DEPTDESC FROM department WHERE DEPTNO = '".$row['user_dept_no']."'");
									 	while($row2 = mysql_fetch_array($qry))
									 	{?>
									 		<tr>
									 			<td><?php echo $sr; ?></td>
									 			<td><?php echo $row['user_pfno']; ?></td>
									 			<td><?php echo $value_emp['name'] ?></td>
									 			<td><?php echo $row2['DEPTDESC']; ?></td>
									 			<?php
									 			if($row['user_role'] == 1)
									 			{
									 				$tmp = 'Billunit Clerk';
									 			}
									 			else
									 			{
									 				$tmp = 'Chief OS';
									 			}
									 			?>
									 			<td><?php echo $tmp; ?></td>
									 			<td><?php echo $row['office_description']; ?></td>
									 			<td>
													<a class="btn btn-circle blue" href="update_user.php?user_id=<?php echo $row['user_id'];?>">Update</a>
													<button class="btn btn-circle red deleteuser"  value="<?php echo $row['user_id'];?>">Delete</button>
												</td>
									 		</tr>
									<?php
									$sr++;
										}
									}
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
        data: {action: 'fetchEmployee1', id : value},
      })
      .done(function(html) {
        var data = JSON.parse(html);
       // alert(data);
        if(data==1)
          {
             alert("Already Exists");
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
            $("#mobile").val(data.phoneno);
            $("#design").val(data.desigcode);
            $("#email").val(data.email2);
            $("#paylevel").val(data.pc7_level);
            $("#dept").val(data.dept);
            $("#station").val(data.station);
            $("#office").val(data.office);
            $("#dob").val(data.dob);
            $("#deptno").val(data.deptno);
            $("#designo").val(data.designo);
          }
      });
    });
    $(document).on('click','.deleteuser',function(){
    	var id=$(this).val();
    	// alert(id);
    	var result = confirm("Confirm!!! Proceed for User delete?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'deleteuser', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="add_user.php";
          });
        }
    });
</script>
