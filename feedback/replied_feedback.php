<?php
	$GLOBALS['flag']="4.92";
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
						<a href="#"> View Replied Feedback</a>
					</li>
				</ul>
													
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6 col-xs-6">
						View Replied Feedback
					</div>
					<div class="caption col-md-6 text-right backbtn">
						<button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
					</div>
					
				</div>
				<div class="portlet-body form">
					<?php
						dbcon2();
						$query = mysql_query("SELECT * FROM feedback WHERE id = '".$_GET['id']."'");
						$row = mysql_fetch_array($query);
					?>
					<input type="hidden" class="form-control" id="pfno1" name="pfno1" value="<?php echo $row['pfno']; ?>">
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
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Please provide your feedback on our website.</label>
										<div class="input-group">
										<textarea rows="5" cols="50" name="feedback" readonly=""><?php echo $row['feedback'];?></textarea>
										</div>
									</div>
								</div>	
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Do you have any other suggestions for improving our website? </label>
										<div class="input-group">
										<textarea rows="5" cols="50" name="suggestion" readonly=""><?php echo $row['suggestion'];?></textarea>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Reply</label>
										<div class="input-group">
										<textarea rows="5" cols="50" name="reply" readonly=""><?php echo $row['reply'];?></textarea>
										</div>
									</div>
								</div>	
						</div>
						<?php
						if($row['file'] != null)
						{ 
						?>
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">View Uploaded File</label>
									<div class="form-group">
										<a class="btn btn-circle blue" href="<?php echo 'control/'.$row['file'];?>">View File</a>
									</div>
								</div>
						</div>
						<?php
						}
						?>
						<div class="form-actions right">
							<!-- <button type="reset" class="btn default">Cancel</button>
							<button type="submit" class="btn blue submit_btn" id='submit_btn' name='button'>Submit</button> -->
							<!-- <a id='<?php echo $row['id'];?>' class='btn btn-primary action_btn'>Submit</a> -->
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
</script>