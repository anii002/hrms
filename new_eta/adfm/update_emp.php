<?php
$GLOBALS['flag']="4.9";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');

$query = "select * from employees where pfno = '".$_SESSION['empid']."'";
$result = mysql_query($query);
$value = mysql_fetch_array($result);
$billunit=$value['BU'];
$empid=$value['pfno'];
$panno=$value['panno'];
$empname=$value['name'];
$designation=designation($value['desig']);
$station=fetch_station($value['station']);
$mobile=$value['mobile'];
$email=$value['email'];
$catg=$value['catg'];
$dept=getdepartment($value['dept']);
$depot_id=getdepot($value['depot_id']);
$bp=$value['bp'];
$gp=$value['gp'];
$bdate=$value['bdate'];

$var=$bdate;
$d=str_replace('-','/', $var);
$BIRTHDATE1=date('d/m/Y',strtotime($d));

$apdate=$value['apdate'];

$var1=$apdate;
$d1=str_replace('-','/', $var1);
$RLYJOINDATE1=date('d/m/Y',strtotime($d1));

$level=$value['level'];
?>
			
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">कर्मचारी को अद्ययावत करें / Update Employee Details</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i>कर्मचारी को अद्ययावत करें  / Update Employee Details
					</div>
					
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="control/adminProcess.php?action=updateEmployee" method="post" enctype="multipart/form-data" autocomplete="off"	 class="horizontal-form">
						<input type="hidden" name="deptid" id="deptid" value="<?php echo $_SESSION['dept']; ?>" />
						<input type="hidden" id="curDate" name="curDate" value="<?php echo date('d/m/Y') ?>">
						<input type="hidden" id="txtpfno" name="txtpfno" value="<?php echo $_SESSION['empid'];  ?>">
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">

								<div class="col-md-4 billunitzindex">
									<div class="form-group">
										<label class="control-label">बिल युनिट  / Bill Unit</label>
											<select name="billunit" id="billunit" class="select2 form-control" tabindex="-1" aria-hidden="true">
												  <!-- <option value="" disabled>Select Bill Unit</option> -->
												  <option value='<?php echo $billunit; ?>' selected><?php echo $billunit; ?> </option>
													<?php
													$query_emp = "SELECT `billunit` FROM `billunit`";
													$result_emp = mysql_query($query_emp);
													while($value_emp = mysql_fetch_array($result_emp))
													{
													  echo "<option value='".$value_emp['billunit']."'>".$value_emp['billunit']."</option>";
													}
													?>	
											</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">पैन नं / PAN No.</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-id-card" aria-hidden="true"></i>
										</span>
										<input type="text" class="form-control" id="panno" name="panno" placeholder="Employee PAN No." maxlength="10" onchange="pannumber(this)" value="<?php echo $panno; ?>">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">नाम / Name</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="txtuser" name="txtuser" placeholder="Employee Name" value="<?php echo $empname; ?>" >
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">

								
								<div class="col-md-4 billunitzindex">
									<div class="form-group">
										<label class="control-label">पदनाम / Designation</label>
											<select name="designcode" id="designcode" class="select2 form-control" tabindex="-1" aria-hidden="true" >
												  <option value="<?php echo $value['desig']; ?>" selected><?php echo $designation; ?></option>
													<?php
													$query_emp = "SELECT `DESIGCODE`,`DESIGLONGDESC` FROM `designations`";
													$result_emp = mysql_query($query_emp);
													while($value_emp = mysql_fetch_array($result_emp))
													{
													  echo "<option value='".$value_emp['DESIGCODE']."'>".$value_emp['DESIGLONGDESC']."</option>";
													}
													?>
											</select>
									</div>
								</div>
								<div class="col-md-4 billunitzindex">
									<div class="form-group">
										<label class="control-label">स्टेशन  / Station</label>
										
											<select name="stationcode" id="stationcode" class="select2 form-control" tabindex="-1" aria-hidden="true" >
												  <option value="<?php echo $value['station']; ?>" ><?php echo $station; ?></option>
													<?php
													$query_emp = "select stationcode,stationdesc from station";
													$result_emp = mysql_query($query_emp);
													while($value_emp = mysql_fetch_array($result_emp))
													{
													  echo "<option value='".$value_emp['stationcode']."'>".$value_emp['stationdesc']."</option>";
													}
													?>											
											</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">मोबाइल / Mobile</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-phone"></i>
										</span>
										<input type="text" class="form-control" id="txtmobile" name="txtmobile" placeholder="Enter Mobile number" maxlength="10" value="<?php echo $mobile; ?>" onchange="phonenumber(this)">
										</div>
									</div>
								</div>
								
							</div>
							<!--/row-->
							<div class="row">
								
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">ई -मेल / E-Mail</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
										</span>
										<input type="email" class="form-control" id="email" name="email" placeholder="Employee Email id" onchange="email_valid(this)" value="<?php echo $email; ?>">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">वर्ग / Category</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-user-graduate"></i>
										</span>
										<input type="text" id="category" name="category" placeholder="Employee Category" class="form-control" value="<?php echo $catg; ?>">
										</div>
									</div>
								</div>
								<div class="col-md-4 billunitzindex">
									<div class="form-group">
										<label class="control-label">विभाग  / Department</label>
										
											<select name="deptcode" id="deptcode" class="select2 form-control" tabindex="-1" aria-hidden="true" >
												  <option value="<?php echo $value['dept']; ?>" selected><?php echo $dept; ?></option>
													<?php
													$query_emp = "SELECT `DEPTNO`, `DEPTDESC` FROM `department`";
													$result_emp = mysql_query($query_emp);
													while($value_emp = mysql_fetch_array($result_emp))
													{
													  echo "<option value='".$value_emp['DEPTNO']."'>".$value_emp['DEPTDESC']."</option>";
													}
													?>
											</select>
									</div>
								</div>
							</div>
							<div class="row">
								
								<div class="col-md-4 billunitzindex">
									<div class="form-group">
										<label class="control-label">डिपो  / Depot</label>
										
										<div id="workdepot"></div>
											<!--<select name="workdepot" id="workdepot" class="select2 form-control" tabindex="-1" aria-hidden="true" >-->
											<!--	  <option value="<?php echo $value['depot_id']; ?>" selected ><?php echo $depot_id; ?></option>-->
											<!--</select>-->
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">मूल वेतन / Basic Pay</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-inr" aria-hidden="true"></i>
										</span>
										<input type="text" id="txtbasicpay" name="txtbasicpay" placeholder="Employee Basic Pay" value="<?php echo $bp; ?>" class="form-control" >
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">ग्रेड पे / Grade Pay</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-inr" aria-hidden="true"></i>
										</span>
										<input type="text" id="txtgradepay" name="txtgradepay" placeholder="Employee Grade Pay" value="<?php echo $gp; ?>" class="form-control" >
										</div>
									</div>
								</div>
							</div>
							<!--/row-->
							<div class="row">
								
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">जन्म तारीख / Birth Date</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
										</span>
										<input type="text" id="txtdob" name="txtdob" placeholder="Employee Birth Date" class="form-control datepicker" value="<?php echo $BIRTHDATE1; ?>">
										</div>
									</div>									
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">नियुक्ति की तारीख / Appointment Date</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
										</span>
										<input type="text" id="txtappointment" name="txtappointment" placeholder="Employee Birth Date" class="form-control datepicker" value="<?php echo $RLYJOINDATE1; ?>">
										</div>
									</div>									
								</div>
								<div class="col-md-4 billunitzindex">
									<div class="form-group">
										<label class="control-label">स्तर  / Level</label>
										
											<select name="level" id="level" class="select2 form-control" tabindex="-1" aria-hidden="true" >
												  <option value="<?php echo $level; ?>" selected><?php echo $level; ?></option>
													
													<?php
													$query_emp = "SELECT `num` FROM `paylevel`";
													$result_emp = mysql_query($query_emp);
													while($value_emp = mysql_fetch_array($result_emp))
													{
													  echo "<option value='".$value_emp['num']."'>".$value_emp['num']."</option>";
													}
													?>	
											</select>
									</div>
								</div>
							
							</div>
								
							</div>
							<!--/row-->
							<!-- <div class="row">
								
						</div> -->
						<div class="form-actions right">
							<!-- <button type="reset" class="btn default">Cancel</button> -->
							<button type="submit" class="btn blue submit_btn" id="submit_btn" name='button'><i class="fa fa-check"></i> प्रस्तुत करे / Submit</button>
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

  $("#txtappointment").on("change", function(){
    var dob=$("#curDate").val();
    var doa=$("#txtappointment").val();
    // alert("curr "+dob);
    // alert("Appointment "+doa);
    // $('#emp_doa').val(doa);
    var parts = dob.split("/");
    var s=new Date(parts[2], parts[1] - 1, parts[0]);
    var parts1 = doa.split("/");
    var s1=new Date(parts1[2], parts1[1] - 1, parts1[0]);
    // alert(s);
    // alert(s1);
    if(s1 > s){
      alert('Date of Appointment should be less than Today Date');
      $("#txtappointment").val("");
      $("#txtappointment").focus();
    }
  });

   $("#txtdob").on("change", function(){
    var dob=$("#curDate").val();
    var doa=$("#txtdob").val();
    // alert("curr "+dob);
    // alert("DOB "+doa);
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


   $(document).on("change","#txtpfno",function(){
      var newVal = $(this).val().replace(/[^0-9]/g,'');
      if(newVal == '')
          $("#txtpfno").focus();          
      $(this).val(newVal);
  }); 

  $(document).on("change","#txtbasicpay",function(){
      var newVal = $(this).val().replace(/[^0-9]/g, '');
      if(newVal == '')
          $("#txtbasicpay").focus();  
        $(this).val(newVal);
  }); 

  $(document).on("change","#txtgradepay",function(){
      var newVal = $(this).val().replace(/[^0-9]/g, '');
      if(newVal == '')
          $("#txtgradepay").focus();  
        $(this).val(newVal);
  }); 

  $(document).on("change","#txtlevel",function(){
      var newVal = $(this).val().replace(/[^0-9]/g, '');
      if(newVal == '')
          $("#txtlevel").focus();  
        $(this).val(newVal);
  }); 

  $(document).on("change","#txtuser",function(){
      var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');
      if(newVal == '')
          $("#txtuser").focus();  
        $(this).val(newVal);
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
        $("#txtmobile").val("");
         $("#txtmobile").focus();
        alert("Invalid Mobile number");  
        
        return false;  
        }  
    }

    function pannumber(inputtxt)
	{  
		var phoneno = /^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/;  	      

		if((inputtxt.value.match(phoneno)))  
		{  
			return true;  
		}  
		else  
		{    
			alert("Please Enter PAN No. Format... "); 
			$('#panno').val("");
			$('#panno').focus();
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

  $(document).on("change","#deptcode",function(){
    var deptid=$(this).val(); 
    // alert(deptid);
    // console.log(deptid);
     $.ajax({
        url: '../public/minifunction.php',
        type: 'POST',
        data: {action: 'getDepot', id : deptid},
        })
       .done(function(data) {
          // alert(data);
        //   console.log(data);
         $("#workdepot").html(data);
         $("#workdepot").focus();
        });
         
  });
  
  
  $(document).ready(function(){
    var deptid=$("#deptcode").val(); 
    // alert(deptid);
    // console.log(deptid);
     $.ajax({
        url: '../public/minifunction.php',
        type: 'POST',
        data: {action: 'getDepot', id : deptid},
        })
       .done(function(data) {
          // alert(data);
        //   console.log(data);
         $("#workdepot").html(data);
         $("#workdepot").focus();
        });
         
  });
    
  $( function() {
   $( ".datepicker" ).datepicker({
     dateFormat: "dd/mm/yy",  
     changeYear: true,
     changeMonth:true,
    });
  } );    
</script>
