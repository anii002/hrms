<?php
	$GLOBALS['flag']="1.2";
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
						<a href="#"> Add Application</a>
					</li>
				</ul>
													
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6 col-xs-6">
						Add Application
					</div>
					<!-- <div class="caption col-md-6 text-right backbtn">
						<button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
					</div> -->
					
				</div>
				<div class="portlet-body form">
					<input type="hidden" class="form-control" id="pfno1" name="pfno1" value="<?php echo $_SESSION['user']; ?>">
					<!-- BEGIN FORM-->
					<form action="control/adminProcess.php?action=add_application" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
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
										<input type="hidden" class="form-control" id="billunit" name="billunit">
										<input type="text" class="form-control" id="empid1" name="empid1" placeholder="Enter PF Number" required autofocus="true" readonly="">
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-3">
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
							<!--/row-->
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">मोबाइल / Mobile</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-phone"></i>
										</span>
										<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Employee Mobile number" readonly="">
										</div>
									</div>
								</div>
								<!--/span-->
								<!-- <div class="col-md-3">
									<div class="form-group">
										<label class="control-label">ई -मेल / E-Mail</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
										</span>
										<input type="email" class="form-control" id="email" name="email" placeholder="Employee Email id" readonly="">
										</div>
									</div>
								</div> -->
								<div class="col-md-3">
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
							</div>
							<!--/row-->
							<div class="row">
								
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">विभाग / Department</label>
			                    	<input type="text" id="dept" name="dept" class="form-control" placeholder="Employee Department" readonly="">
									</div>
								</div>
							<!--/row-->
							<!--/row-->	
								<!-- <div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Aadhar Number</label>
										<input type="text" id="aadhar" name="aadhar_num" class="form-control" placeholder="Employee Aadhar Number" readonly="">
									</div>
								</div> -->	
								<!-- <div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Office</label>
													<input type="text" id="office" name="office" class="form-control" placeholder="Employee Office" readonly="">
									</div>
								</div> -->
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Station</label>
										<input type="text" id="station" name="station" class="form-control" placeholder="Employee Station" readonly="">
									</div>
								</div>	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Attach Document</label>
											<div class="input-group">
													<input type="file" class="form-control imagepdf" name="attach" id="attach" required/>
											</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Subject</label>
									<select class="form-control select2" style="width: 100%;" tabindex="-1" id="purpose" name="purpose" autofocus="true" required>
			                    		<option value="" selected="" disabled="">Select Subject</option>
			                    		<?php
			                    			$conn=dbcon3();
			                    			$sql=mysqli_query($conn,"SELECT `purpose` FROM `purpose`");
			                    			while($row = mysqli_fetch_array($sql)) {
			                    				echo "<option value='".$row['purpose']."'>".$row['purpose']."</option>";
			                    			}
			                    		?>
			                    	</select>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
											<div class="input-group">
												<label class="control-label">Description</label>
												<textarea rows="4" cols="50" name="description" required=""></textarea>
											</div>
									</div>
								</div>
							</div>
							<div class="row">	
								<div class="col-md-3">
									<div class="form-group">
										<!-- <label class="control-label">User</label> -->
										<?php
										$conn=dbcon3();
										$query = mysqli_query($conn,"SELECT user_pfno FROM add_user WHERE user_role = 'admin' ");
										$row = mysqli_fetch_array($query);
										?>
										<input type="hidden" id="user" name="user" class="form-control" value="<?php echo $row['user_pfno']; ?>" readonly="">
										<!-- <input type="text" id="name" name="name" class="form-control" readonly="">
										<select class="form-control select2" style="width: 100%;" tabindex="-1" id="user" name="user" autofocus="true" required>
			                    		<option value="" selected="" disabled="">Select User</option>
			                    		
			                    	</select> -->
									</div>
								</div>
							</div>							
						</div>
						
						<div class="form-actions right">
							<button type="reset" class="btn default">Cancel</button>
							<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i>Forward</button>
						</div>
					</form>
					<!-- END FORM-->
				</div>
			</div>

			
			
		</div>
	</div>
	
	
<?php
	include 'common/footer.php';
?>
<script>
    $(document).ready(function(){
      var value = $('#pfno1').val();
      //alert(value);
      $.ajax({
        url: 'control/adminProcess.php',
        type: 'POST',
        data: {action: 'fetch_employee_details', id : value},
      })
      .done(function(html) {
        var data = JSON.parse(html);
        //alert(data);
        // if(data==1)
        //   {
        //     alert("Error");
        //     $("#empid").val('');
        //     $("#empid").focus();
        //   }
        //    else 
        if(data.empid==null)
          {
              alert("PF Number Not Found..");
				// $.jGrowl('PF Number Not Found..', { header: 'Add User' });

          }
          else
          {
            $("#empid1").val(data.empid);
            $("#empname").val(data.empname);
            $("#mobile").val(data.phoneno);
            $("#design").val(data.desigcode);
            $("#email").val(data.email2);
            $("#paylevel").val(data.pc7_level);
            $("#dept").val(data.dept);
            $("#office").val(data.office);
            $("#station").val(data.station);
            $("#billunit").val(data.billunit);
          }
      });
    });
     $(".imagepdf").on("change", function(){
		var ext = $(this).val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['png','jpg','jpeg','pdf']) == -1) {
			alert('Invalid file type!');
			$(this).val("");
		}
	});

    //   $(document).ready(function(){
    //   var value = $('#pfno1').val();
    //   //alert(value);
    //   $.ajax({
    //     url: 'control/adminProcess.php',
    //     type: 'POST',
    //     data: {action: 'fetchuseremp', id : value},
    //   })
    //   .done(function(html) {
    //   	  alert(html);
    //      var data = JSON.parse(html);
    //      //alert(data);
    //     if(data==1)
    //       {
    //           alert("BillUnit Not Match...");
    //       }
    //       else
    //       {
    //         $("#emp_no").val(data.emp_no);
    //         $("#name").val(data.name);
    //       }
    //   });
    // });
</script>
