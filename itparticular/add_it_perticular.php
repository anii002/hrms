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
						<a href="#"> Add IT_PARTICULAR</a>
					</li>
				</ul>
													
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i> Add IT_PARTICULAR 
					</div>
					
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="control/adminProcess.php?action=it_perticular" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<!-- <div class="row">
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
							</div>
					
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
							</div>
				
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
							</div>-->
						
							<div class="row">	
								<!-- <div class="col-md-4">
									<div class="form-group">
										<label class="control-label">विभाग / Department</label>
			                    	<input type="text" id="dept" name="dept" class="form-control" placeholder="Employee Department" readonly="">
									</div>
								</div>-->
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Year</label>
										<select class="form-control select2" data-placeholder="Select a YEAR" name="year" id="year" style="width: 100%" required="required">
                            				<option value='0' disabled>Select a Year</option> 
					                        <?php 
					                        $firstYear = (int)date('Y');
					                        // $secondYear = (int)date('Y');
					                        $lastYear = $firstYear - 5;
					                            for($i=$firstYear;$i>=$lastYear;$i--)
					                            {
					                            	$secondYear = $i - 1;
					                                echo '<option value='.$secondYear.'-'.$i.'>'.$secondYear.'-'.$i.'</option>';
					                            }
					                        ?>                                                      
					                    </select>
									</div>
								</div>	
							
								<!--<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Attach Document</label>
											<input type="file" class="form-control imagepdf" name="attach" id="attach" required/>
									</div>
								</div>-->
								<div class="col-md-4" id="flupload">
									<div class="form-group">
										<label class="control-label">Attach Document</label>
                                		<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple>
                                		<span style="color: #FF0000;" id="file_error"></span>
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
          //alert(html);
         var data = JSON.parse(html);
        // alert(data.empid);
    //     alert(data);
        if(data==1)
          {
            alert("Already Exists");
            $("#empid").val('');
            $("#empid").focus();
          }
          else if(data.fl==0)
          {
            alert("Employee not register in HRMS module");
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
