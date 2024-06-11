<?php
	$GLOBALS['flag']="1.4";
	include('common/header.php');
	include('common/sidebar.php');
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">

			
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-book"></i> Applicant Registration Form 
										</div>
										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="control/adminProcess.php?action=applicant_add" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
											 <input type="hidden" id="curDate" value="<?php echo date('m/d/Y') ?>">
											<div class="form-body">
												<!-- <h3 class="form-section">Add User</h3> -->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Ex-Employees (Parent) PF number</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas  fa-user"></i>
															</span>
															<input type="text" class="form-control" id="empid" name="empid" placeholder="Enter PF Number" required>
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
															<input type="text" class="form-control" id="empname" name="empname" placeholder="Name Of Employee" >
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
															<input type="text" class="form-control" id="department" name="department" placeholder=" ">
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
															<input type="text" class="form-control" id="design" name="design" placeholder=" ">
															</div>
														</div>
													</div>
													<!--/span-->
													
													<!--/span-->
												</div>
												<hr style='border:1px solid blue'>
											
											<h4>&emsp;Applicant Details</h4>
											<hr>
													
													<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Applicant Name </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_name" name="appl_name" placeholder=" ">
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
															<input type="text" class="form-control" id="appl_dob" name="aapl_dob" placeholder=" ">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Gender</label>
															
																<select name="appl_gender" id="appl_gender" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																	<option value="" selected disabled>Select Category</option>
																	<option value="male" >Male</option>
																	<option value="female" >Female</option>
																	
																	<option value="other" >Other</option>
																	  
																</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Mobile Number </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_mobile" name="appl_mobile" placeholder=" " maxlength="10">
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
															<input type="email" class="form-control" id="appl_email" name="appl_email" placeholder=" ">
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">PAN No</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_pan" name="appl_pan" placeholder=" " maxlength="10">
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
															<input type="text" class="form-control" id="appl_aadhar" name="appl_aadhar" placeholder=" " maxlength="12">
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Applicant Qualification </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="appl_qualification" name="appl_qualification" placeholder=" ">
															</div>
														</div>
													</div>
													
													
													
		
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Relation With.</label>
															
																<select name="app_rel" id="app_rel" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																	<option value="" selected disabled>Select Relation </option>
																	<?php
																	$query_emp =mysql_query("select * from Relation");

																	while($value_emp = mysql_fetch_array($query_emp))
																	{
																	echo "<option value='".$value_emp['code']."'>".$value_emp['longdesc']."</option>";
																	}

																	?>
																</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Maritial Status</label>
															
																<select name="appl_maritial_st" id="appl_maritial_st" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																	<option value="" selected disabled>Select Status</option>
																	  <?php
																		 $query_emp =mysql_query("select * from marital_status");
																		
																		 while($value_emp = mysql_fetch_array($query_emp))
																		 {
																		  echo "<option value='".$value_emp['code']."'>".$value_emp['shortdesc']."</option>";
																		}
																	  
																	  ?>
																</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">SC/ST/OBC/Other</label>
															
																<select name="appl_caste" id="appl_caste" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																	<option value="" selected disabled>Select Status</option>
																	<option value="sc">SC</option>  
																	<option value="st">ST</option>  
																	<option value="obc">OBC</option>  
																	<option value="general">Genl.</option>  
																</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Category</label>
															
																<select name="category" id="category" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																	<option value="" selected disabled>Select Category</option>
																	 <?php
																		 $query_emp =mysql_query("select * from category");
																		
																		 while($value_emp = mysql_fetch_array($query_emp))
																		 {
																		  echo "<option value='".$value_emp['id']."'>".$value_emp['case_name']."</option>";
																		}
																	  
																	  ?>
																	  
																</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Upload File </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="file" multiple="multiple" class="form-control" id="file" name="file[]"  placeholder=" ">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Username </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text"  class="form-control" id="username" name="username" placeholder=" " readonly="">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Password<span style="color:red;">*</span>  <small style="color:red;">Password is Date of Birth of Appliacnt without any (/)</small> </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text"  class="form-control" id="password" name="password" placeholder=" " readonly>
															</div>
														</div>
													</div>	
													
												</div>
												<hr>
													<button type='button' class='btn btn-primary pull-right' id='add_member' name='add_member'>  Add Family Member</button>
													<br>
													<br>
													<input type="hidden" name="count" id="count" value="1">
													<!-- <div id='dyn_fam_member' class='row'>
													
													</div> -->
													
												<div class='row'>
														<h4>&emsp;Family Member 1</h4>
													<div class="col-md-6">
													
														<div class="form-group">
															<label class="control-label">Member Name </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="fam_mem_name_1" name="fam_mem_name_1" placeholder=" ">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Mobile No </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="fam_mem_mobno_1" name="fam_mem_mobno_1" placeholder=" " maxlength="10">
															</div>
														</div>
													</div>
												</div>
												<div class='row'>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Pan No </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="fam_mem_panno_1" name="fam_mem_panno_1" placeholder=" " maxlength="10">
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Aadhar No </label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control" id="fam_mem_aadharno_1" name="fam_mem_aadharno_1" placeholder=" " maxlength="12">
															</div>
														</div>
													</div>
												</div>
												<div class='row'>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Relation </label>
															<select name="fam_mem_rel_1" id="fam_mem_rel_1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
											<option value="" selected disabled>Select Status</option>
											  <?php
												 $query_emp =mysql_query("select * from Relation");
												
												 while($value_emp = mysql_fetch_array($query_emp))
												 {
												  echo "<option value='".$value_emp['code']."'>".$value_emp['longdesc']."</option>";
												}
											  
											  ?>
										</select>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Maritial Status</label>
															
																<select name="fam_mem_maritial_st_1" id="fam_mem_maritial_st_1" class="select2me form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
																	<option value="" selected disabled>Select Status</option>
																	  <?php
																		 $query_emp =mysql_query("select * from marital_status");
																		
																		 while($value_emp = mysql_fetch_array($query_emp))
																		 {
																		  echo "<option value='".$value_emp['code']."'>".$value_emp['shortdesc']."</option>";
																		}
																	  
																	  ?>
																</select>
														</div>
													</div>
												</div>
												<div class='row'>	
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member DOB</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control dtpicker" id="fam_mem_dob_1" name="fam_mem_dob_1" placeholder=" ">
															</div>
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Qualifiaction</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control dtpicker" id="fam_mem_qualif_1" name="fam_mem_qualif_1" placeholder=" ">
															</div>
														</div>
													</div>
												</div>
												<div class='row'>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label">Member Employed or Otherwise</label>
															<div class="input-group">
															<span class="input-group-addon">
															<i class="fas fa-envelope"></i>
															</span>
															<input type="text" class="form-control dtpicker" id="fam_mem_employedorother_1" name="fam_mem_employedorother_1" placeholder=" ">
															</div>
														</div>
													</div>
												</div>
												<div  class='row'>
													
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
								<i class="fa fa-globe"></i>Registered User List
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-bordered table-hover" id="example1">
							<thead>
							<tr>
								<th>SR No</th>
								<th>Ex. Employee PFno</th>
								<th>Ex. Employee Name</th>
								<th>Applicant Name</th>
								<th>Category</th>
								<th>Action</th>
								
							</tr>
							</thead>
							<tbody>
								<?php
								$query_emp = "SELECT * FROM `applicant_registration` ";
								$result_emp = mysql_query($query_emp);
								$sr=1;
								while($value_emp = mysql_fetch_array($result_emp))
								{
									$id=$value_emp['id'];
								echo "
								<tr>
								<td>".$sr++."</td>
								<td>".$value_emp['ex_emp_pfno']."</td>
								<td>".$value_emp['ex_empname']."</td>
								<td>".$value_emp['applicant_name']."</td>
								<td>".getcase($value_emp['category'])."</td>
								<td>";
								
								if($value_emp['status']=='0')
								{
								echo "<button value='".$value_emp['ex_emp_pfno']."' class='btn btn-success active' style='margin-left:10px;width:81px'>Active</button>";
								}
								else
								{
								echo "<button value='".$value_emp['ex_emp_pfno']."' class='btn btn-warning deactive' style='margin-left:10px;'>Deactive</button>";
								}
								echo "<button value='".$id."' id='".$value_emp['ex_emp_pfno']."'  class='btn btn-danger remove'>Remove</button></td>";
								
								echo "</tr>";
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
var cnt=1;

$("#add_member").click(function(){
//alert("hello");

cnt=cnt+1;
// alert(cnt);
		 $.ajax({
		type:"post",
		url:"process.php",
		data:"action=get_family_form&cnt="+cnt,
		success:function(data){
		  //alert(data);
		  $("#dyn_fam_member").prepend(data);
		  $("#count").val(cnt);
		
		 // alert(family_counter);
	
		  }
	});
});


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

        	if(html==1)
        	{
        		alert("already registered in Applicant Register list")
        		$('#empid').focus().val('');
        	}
        	else if(data.pf_number==null)
        	{
        		alert("Not Found PF number.....")
        		$('#empid').focus().val('');
        	}
        	else
        	{
        		$("#empid").val(data.pf_number);
	            $("#empname").val(data.emp_name);
	            $("#design").val(data.designation);
	            $("#department").val(data.department);
        	}
           	          
      });
      
    });
</script>
<script>
  $(function() {
        
     $('#fam_mem_dob_1').datepicker({
     	format:'dd/mm/yyyy',
      autoclose: true
    });
     $('#appl_dob').datepicker({
     	format:'dd/mm/yyyy',
      autoclose: true
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
            data: {action: 'activeApplicant', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="registration.php";
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
            data: {action: 'deactiveApplicant', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="registration.php";
          });
        }
    });



    $(document).on("click",".remove",function(){
      var value = $(this).attr("value");
      var pf = $(this).attr("id");
      //alert(value);
      
      $.ajax({
        url: 'control/adminProcess.php',
        type: 'POST',
        data:"action=removeApplicant&id="+value+"&pf="+pf,
        success:function(data){
        	//alert(data);
        	if(data==1)
        	{
        		alert("Applicant Removed Succeessfully");
        		window.location="registration.php";
        	}
    //     	
        	else
        	{
        		alert("Failed");	
        	}
        }


      });
     });

   $(document).on('change','#empid',function(){
   	var pf_number=$("#empid").val();
   		//alert(pf_number);
   	var a=$("#username").val("APPL_"+pf_number);
});
   $(document).on('change','#appl_dob',function(){
   	var myStr =$("#appl_dob").val();
			var newStr = myStr.split('/');
			var dob=newStr[0]+newStr[1]+newStr[2];
			//alert(dob);
            $("#password").val(dob);

   });



document.getElementById("file").onchange = function(){  // on selecting file(s)
    for(var file in this.files){ // loop over all files
        if(isNaN(file) === false){  // if it is actually a file and not any other property
            if(this.files[file].type !== "application/pdf" && this.files[file].type !== "image/jpeg" && this.files[file].type !== "image/png"){ // if NOT PDF!!
                alert('Please select PDF files only.');
                $("#file").val('');
                return false;
            }
        }
    }
    var oFile = document.getElementById("file").files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>
    	for(var file in this.files)
    	{
    		if(isNaN(file)===false)
    		{
    			if (this.files[file].size > 2097152) // 2 mb for bytes.
            	{
                	alert("Please check selected any of the file size is greater 2mb!..  please select file under 2mb!");
                	$("#file").val('');
                	return;
            	}

    		}
    	}
    // alert('Yay!! All selected files are in PDF format.');
    // return true;
}

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

 $(document).on("change","#empid",function(){
      var newVal = $(this).val().replace(/[^0-9]/g,'');
      if(newVal == '')
          $("#empid").focus();          
      $(this).val(newVal);
  }); 
</script>