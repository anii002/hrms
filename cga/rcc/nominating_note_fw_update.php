<?php
	$GLOBALS['flag']="2.2";
	include('common/header.php');
	include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="portlet box blue btnz">
						<div class="portlet-title">
							<div class="caption btnboom">
											<i class="fa fa-book"></i>  Application Form 
										</div>
						</div>

						<div class="portlet-body form">
							<form action="control/adminProcess.php?action=update_nomi" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
											 <input type="hidden" name="category" value="<?php echo $_GET['case']; ?>">
												<input type="hidden" name="pid" value="<?php echo $_GET['id']; ?>">
							

							<div class="tabbable-line ">
								<ul class="nav nav-tabs btnboom">
									<li class="active">
										<a href="#tab_15_1" data-toggle="tab">
										DAK form report </a>
									</li>
									
									<li>
										<a href="#tab_15_2" data-toggle="tab">
										namination note </a>
									</li>
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane active h" id="tab_15_1">
										<div class="form-body">
												<!-- <h3 class="form-section">Add User</h3> -->
												<?php 
													dbcon2();
													$sql=mysql_query("SELECT * From drmpsurh_sur_railway.resgister_user where emp_no='".$_GET['ex_emp_pfno']."'");
													$res=mysql_fetch_array($sql);
													echo mysql_error();

												?>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Ex-Employees (Parent) PF number</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas  fa-user"></i>
															</span>
															<input type="text" class="form-control" id="empid" name="empid" value="<?php echo $res['emp_no']; ?>" readonly="">
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Employee Name</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas  fa-user"></i>
															</span>
															<input type="text" class="form-control" id="empname" name="empname" value="<?php echo $res['name']; ?>" readonly="">
															</div>
														</div>
													</div>
													
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Department </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="department" name="department" value="<?php echo getdepartment($res['department']); ?>" readonly="">
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Designation </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="design" name="design" value="<?php echo designation($res['designation']); ?>" readonly="">
															</div>
														</div>
													</div>
													<!--/span-->
													
													<!--/span-->
												</div>
												<hr style='border:1px solid blue'>
											
											<h4>&emsp;Applicant Details</h4>
											<hr>
													<?php 
													dbcon1();
													$sql1=mysql_query("SELECT * From drmpsurh_cga.applicant_registration where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
													$res1=mysql_fetch_array($sql1);
													//echo mysql_error();

												?>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Applicant Name </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control onlyText" id="appl_name" name="appl_name" value="<?php echo $res1['applicant_name']; ?>"  >
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Date Of Birth </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_dob" name="aapl_dob" value="<?php echo $res1['applicant_dob']; ?>" >
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Gender</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<!-- <input type="text" class="form-control" id="" name="aapl_gender" value="<?php //echo getgender($res1['applicant_gender']); ?>" > -->
															<select name="gender" id="appl_gender" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" >
															<option value="<?php echo ($res1['id']); ?>" selected ><?php echo getgender($res1['applicant_gender']); ?></option>
															<?php
															dbcon2();
															$query_emp =mysql_query("SELECT * from gender");

															while($value_emp = mysql_fetch_array($query_emp))
															{
															echo "<option value='".$value_emp['id']."'>".$value_emp['gender']."</option>";
															}

															?>
														</select>
															</div>
																
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Mobile Number </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_mobile" name="mobile" value="<?php echo $res1['applicant_mobno']; ?>" maxlength="10" onchange="phonenumber(this)">
															</div>
														</div>
													</div>
												</div>
												
												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Category</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="" name="" value="<?php echo getcase($res1['category']); ?>" readonly >
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">E-Mail </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="email" class="form-control" id="appl_email" name="email" value="<?php echo $res1['applicant_emailid']; ?>" onchange="email_valid(this)" >
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">PAN No</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_pan" name="pan" style="text-transform: uppercase;" value="<?php echo $res1['applicant_panno']; ?>" onchange="pannumber(this)"    maxlength="10">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Aadhar No </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_aadhar" name="aadhar" value="<?php echo $res1['applicant_aadharno']; ?>" onchange="adharnumber(this)"  maxlength="12">
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Applicant Qualification </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control description" id="appl_qualification" name="qualification" value="<?php echo $res1['applicant_qualifiaction']; ?>" maxlength="35">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">SC/ST/OBC/Other</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															
															<select name="caste" id="caste" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																	<option value="<?php echo $res1['caste']; ?>" selected ><?php echo $res1['caste']; ?></option>
																	<option value="SC">SC</option>  
																	<option value="ST">ST</option>  
																	<option value="OBC">OBC</option>  
																	<option value="General(UR)">Genl.(UR)</option>  
																</select>
															</div>
														</div>
													</div>
												</div>
												<hr>
												<div class="row">
													
													<div style="margin-left: 25px" class="table-responsive"	>
															<table class="table table-bordered table-striped" style="width: 85%;">
																<tr>
																	<th>Sr.NO.</th>
																	<th>File Name</th>
																	<th>Action</th>
																</tr>
																<tbody>
																	<?php
																	dbcon1();
																	$query=mysql_query("SELECT * from upload_doc where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
																	$sr=0;
																		while($row=mysql_fetch_array($query)) 
																		{

																			$sr++;
																			echo "<tr>
																			<td>$sr</td>
																			<td><a href='../uploadFiles/".$_GET['ex_emp_pfno']."/".$row['file_path']."' target='_blank'>".$row['file_path']."</a></td>
																			<td ><a data-id='".$row['id']."' class='btn blue btnn' data-toggle='modal' href='#basic_up'>Update Doc </a></td>
																			</tr>
																			";
																		}
																	?>
																</tbody>
															</table>
														</div>
												</div>
											</div>
									</div>



									<div class="tab-pane h" id="tab_15_2">
										
										<div class="form-body">
												<!-- <h3 class="form-section">Add User</h3> -->
												<div class="row">
													<?php
														dbcon1();
														$sql=mysql_query("SELECT * from nomination_note where ex_emp_pfno='".$_GET['ex_emp_pfno']."'");
														$res=mysql_fetch_array($sql);

													 ?>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">P/Rect Dt:-</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas  fa-calendar-alt"></i>
															</span>
															<input type="text" class="form-control ddate" style="border-radius: 30px;" id="date" placeholder="Select Date" name="date"  value="<?php echo $res['date'];?>"  >
                      
															</div>
														</div>
													</div>
													
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Subject</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-pencil-alt"></i>
															</span>
															<textarea class="form-control" rows="3" name="subject"><?php echo $res['subject'];?></textarea>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Ref</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-pencil-alt"></i>
															</span>
															<textarea class="form-control" rows="3" name="ref"><?php echo $res['ref'];?></textarea>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label"></label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-pencil-alt"></i>
															</span>
																<textarea class="form-control" rows="4" name="para1" required=""><?php echo $res['parag1'];?></textarea>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label"></label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-pencil-alt"></i>
															</span>
																<textarea class="form-control" rows="4" name="para2"><?php echo $res['parag2'];?></textarea>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-9">
														<div class="form-group">
															<label class="control-label"></label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-pencil-alt"></i>
															</span>
																<textarea class="form-control" rows="4" name="last_para" required=""><?php echo $res['last_parag'];?></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>

									</div>


									<div class="form-actions right">
												
												<button type="submit" class="btn blue" >Update</button>
												&nbsp;
												
												<!-- <button onclick="print_button()" class="btn green btnhide">Print</button> -->
												<button type="button" class="btn default" onclick="history.go(-1);">Cancel</button>
									</div>

								</div>
							</div>
						
					</form>
				</div>
			</div>	
		</div>	
	</div>
<?php
	include 'common/footer.php';
?>

<div class="modal fade" id="basic_up" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="control/adminProcess.php?action=update_Doc" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form" >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Forward To </h4>
				</div>
				<div class="modal-body">
					 <input type="hidden" id="ex_emp_pfno" name="ex_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>" >
					 <input type="hidden" id="tble_id" name="tble_id" value="" >
					 <!-- <input type="hidden" id="username" name="username" value="<?php echo $_GET['username']; ?>"> -->
					 <!-- <input type="hidden" id="fw_tbl_id" name="fw_tbl_id" value="<?php echo $_GET['id']; ?>"> -->

					 <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Upload Verified Documents / Files<span style="color:red;">*</span>  <small style="color:red;">documents(in pdf format)</small> </label>
								<div class="input-group">
								<span class="input-group-addon">
								<i class="fas fa-envelope"></i>
								</span>
								<input type="file" multiple="multiple" class="form-control" id="file" name="file" accept="application/pdf"  placeholder=" ">
								</div><br>
								<button type="submit" class="btn blue">Update</button>	
							</div>
						</div>
						
						
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn blue">Save changes</button> -->
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
$(document).on('click','.btnn',function(){
	var id=$(this).attr("data-id");
	//alert(id);
	$("#tble_id").val(id);
});

    $(function() {
        
     $('.ddate').datepicker({
      autoclose: true,
      format:'dd/mm/yyyy'
    });
     $('#appl_dob').datepicker({
      autoclose: true,
      format:'dd/mm/yyyy'
    });

  });
    function print_button()
   {
      $(".main-footer").hide();
      
      $(".btnboom").hide();
      $(".right").hide();
      $(".print3").show();
      $(".btnhide").hide(); 
      //$(".btnz").attr("border","0");
      $(".btnz").css("border", "0");
      window.print();
     
      
	 window.location.reload();
   }
    $(function() {
        
     $('#appl_dob').datepicker({
     	format:'dd/mm/yyyy',
      autoclose: true
    });

 }); 


    $(".onlyText").on("input change paste", function() {

        var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');

        $(this).val(newVal);

    
    });

    $(document).on("input change paste", ".description", function() {

        var newVal = $(this).val().replace(/[^a-zA-Z0-9\s,-.\/\\_]/g, '');

        $(this).val(newVal);

    });

        function pannumber(inputtxt)
        {  
              var phoneno = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;  
              
             
               if((inputtxt.value.match(phoneno)))  
                {  
                    return true;  
                    
                }  
              else  
                {    
                    alert("Please enter in proper format... "); 
                    $('#appl_pan').val("");
                    $('#appl_pan').focus();
                    return false;  
                }  
        }
        function adharnumber(inputtxt)  
        {  
              var phoneno = /^\d{12}$/;  
              if((inputtxt.value.match(phoneno)))  
                {  
                    //$(".span_id7").text("");
                   
                    return true;  
                }  
              else  
                {  
                    //$(".span_id7").text("Adhar Card number must be of 12 digits");
                    alert("Adhar Card number must be of 12 digits"); 
                    $("#appl_aadhar").val("");
                    $("#appl_aadhar").focus();
                    return false;  
                }  
        }
          function phonenumber(inputtxt)  
    {  
    
      var phoneno = /^[6789]\d{9}$/;  
      if((inputtxt.value.match(phoneno)))  
      {  
        return true;  
        }  
        else  
        {  
        $("#appl_mobile").val("");
         $("#appl_mobile").focus();
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
            $("#appl_email").focus();                  
            return false;  
        }  
    }

    $(document).on("change","#appl_name",function(){
      var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');
      if(newVal == '')
      {
      	 	$("#appl_name").focus();  
        	$(this).val(newVal);
        	alert("Enter Alphabets only");
      }
        
        
  });

    $("#txtdob").on("change", function(){
    var dob=$("#curDate").val();
    var doa=$("#txtdob").val();
    // alert("curr "+dob);
    // alert("Appointment "+doa);
    // $('#emp_doa').val(doa);
    var parts = dob.split("/");
    var s=new Date(parts[2], parts[1] - 1, parts[0]);
    var parts1 = doa.split("/");
    var s1=new Date(parts1[2], parts1[1] - 1, parts1[0]);
    // alert(s);
    // alert(s1);
    if(s1 >= s){
      alert('Please select valid Date of Birth');
      $("#txtdob").val("");
      $("#txtdob").focus();
    }
  });
</script>