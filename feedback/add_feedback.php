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
						<a href="#"> Add Feedback</a>
					</li>
				</ul>
													
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6 col-xs-6">
						Add Feedback
					</div>
					<!-- <div class="caption col-md-6 text-right backbtn">
						<button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
					</div> -->
					
				</div>
				<div class="portlet-body form">
					<input type="hidden" class="form-control" id="pfno1" name="pfno1" value="<?php echo $_SESSION['user']; ?>">
					<!-- BEGIN FORM-->
					<form action="control/adminProcess.php?action=add_feedback" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">PF No</label>
										<input type="text" class="form-control" id="empid1" name="empid1" placeholder="Enter PF Number" required autofocus="true" readonly="">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Employee Name</label>
										<input type="text" class="form-control" id="empname" name="empname" placeholder="Employee Name" readonly="">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Designation</label>
										<input type="text" id="design" name="design" placeholder="Employee Designation" class="form-control" readonly="">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Department</label>
										<input type="text" id="dept" name="dept" class="form-control" placeholder="Employee Department" readonly="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Please provide your feedback on our website.</label>
										<div class="input-group">
										<textarea rows="5" cols="60" name="feedback" maxlength="140"></textarea>
										</div>
									</div>
								</div>	
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Do you have any other suggestions for improving our website? </label>
										<div class="input-group">
										<textarea rows="5" cols="60" name="suggestion" maxlength="140"></textarea>
										</div>
									</div>
								</div>	
						</div>
						<div class="row">
							<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">Attach Document</label>
											<div class="input-group">
													<input type="file" class="form-control imagepdf" name="attach" id="attach"/>
											</div>
									</div>
								</div>
						</div>
						
						<div class="form-actions right">
							<button type="reset" class="btn default">Cancel</button>
							<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'>Submit</button>
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
          }
          else
          {
            $("#empid1").val(data.empid);
            $("#empname").val(data.empname);
            $("#design").val(data.desigcode);
            $("#dept").val(data.dept);
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
</script>