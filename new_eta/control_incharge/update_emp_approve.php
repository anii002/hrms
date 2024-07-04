<?php
$GLOBALS['flag']="4.9";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');

$query = "select * from employees where pfno = '".$_GET['empid']."'";
$result = mysqli_query($conn,$query);
$value = mysqli_fetch_array($result);
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


$query1 = "select * from employees_update where pfno = '".$_GET['empid']."' order by id desc limit 1";
$result1 = mysqli_query($conn,$query1);
$value1 = mysqli_fetch_array($result1);
$billunit1=$value1['BU'];
$empid1=$value1['pfno'];
$panno1=$value1['panno'];
$empname1=$value1['name'];
$designation1=designation($value1['desig']);
$station1=fetch_station($value1['station']);
$mobile1=$value1['mobile'];
$email1=$value1['email'];
$catg1=$value1['catg'];
$dept1=getdepartment($value1['dept']);
$depot_id1=getdepot($value1['depot_id']);
$bp1=$value1['bp'];
$gp1=$value1['gp'];
$bdate1=$value1['bdate'];

$var1=$bdate1;
$d1=str_replace('-','/', $var1);
$BIRTHDATE11=date('d/m/Y',strtotime($d1));

$apdate1=$value1['apdate'];

$var11=$apdate1;
$d11=str_replace('-','/', $var11);
$RLYJOINDATE11=date('d/m/Y',strtotime($d11));

$level1=$value1['level'];
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
						<!--<p><?php echo $query; ?></p>-->
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
	    <div class="row">
	        <div class="col-md-6">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i>कर्मचारी पुराने विवरण / Old Employee Details
					</div>
					
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form class="horizontal-form">
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">बिल युनिट  / Bill Unit</label>
											
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="txtuser" name="txtuser" placeholder="Employee Name" value="<?php echo $billunit; ?>" readonly >
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">पैन नं / PAN No.</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-id-card" aria-hidden="true"></i>
										</span>
										<input type="text" class="form-control" id="panno" name="panno" placeholder="Employee PAN No." maxlength="10" onchange="pannumber(this)" value="<?php echo $panno; ?>" readonly> 
										</div>
									</div>
								</div>
								
							</div>
							<!--/row-->
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">नाम / Name</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" readonly class="form-control" id="txtuser" name="txtuser" placeholder="Employee Name" value="<?php echo $empname; ?>" readonlt>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">पदनाम / Designation</label>
											
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="txtuser" name="txtuser" placeholder="Employee Name" value="<?php echo $designation; ?>" readonly>
										</div>
									</div>
								</div>
							</div>
								
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">स्टेशन  / Station</label>
										
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="txtuser" name="txtuser" placeholder="Employee Name" value="<?php echo $station; ?>" readonly>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">मोबाइल / Mobile</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-phone"></i>
										</span>
										<input type="text" class="form-control" id="txtmobile" name="txtmobile" placeholder="Enter Mobile number" maxlength="10" value="<?php echo $mobile; ?>" readonly>
										</div>
									</div>
								</div>
								
							</div>
							<!--/row-->
							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">ई -मेल / E-Mail</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
										</span>
										<input type="email" class="form-control" id="email" name="email" placeholder="Employee Email id" onchange="email_valid(this)" value="<?php echo $email; ?>" readonly>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">वर्ग / Category</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-user-graduate"></i>
										</span>
										<input type="text" id="category" name="category" placeholder="Employee Category" class="form-control" value="<?php echo $catg; ?>" readonly>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">विभाग  / Department</label>
										
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="txtuser" name="txtuser" placeholder="Employee Name" value="<?php echo $dept; ?>" readonly>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">डिपो  / Depot</label>
										
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="txtuser" name="txtuser" placeholder="Employee Name" value="<?php echo $depot_id; ?>" readonly>
										</div>
									</div>
								</div>
							</div>
								
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">मूल वेतन / Basic Pay</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-inr" aria-hidden="true"></i>
										</span>
										<input type="text" id="txtbasicpay" name="txtbasicpay" placeholder="Employee Basic Pay" value="<?php echo $bp; ?>" class="form-control" readonly>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">ग्रेड पे / Grade Pay</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-inr" aria-hidden="true"></i>
										</span>
										<input type="text" id="txtgradepay" name="txtgradepay" placeholder="Employee Grade Pay" value="<?php echo $gp; ?>" class="form-control" readonly>
										</div>
									</div>
								</div>
							</div>
							<!--/row-->
							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">जन्म तारीख / Birth Date</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
										</span>
										<input type="text" id="txtdob" name="txtdob" placeholder="Employee Birth Date" class="form-control " value="<?php echo $BIRTHDATE1; ?>" readonly>
										</div>
									</div>									
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">नियुक्ति की तारीख / Appointment Date</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
										</span>
										<input type="text" id="txtappointment" name="txtappointment" placeholder="Employee Birth Date" class="form-control " value="<?php echo $RLYJOINDATE1; ?>" readonly>
										</div>
									</div>									
								</div>
							
							</div>
								
							<div class="row">
							    
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">स्तर  / Level</label>
										
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="txtuser" name="txtuser" placeholder="Employee Name" value="<?php echo $level; ?>" readonly>
										</div>
									</div>
								</div>
							</div>
							</div>
							<!--/row-->
					</form>
					<!-- END FORM-->
				</div>
			</div>
			</div>
			
			
			
			
			
			<div class="col-md-6">
			<div class="portlet box red">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i>कर्मचारी नए विवरण / New Employee Details
					</div>
					
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="control/adminProcess.php?action=updateEmpData" method="post" class="horizontal-form">
					    <input type="hidden" id="txtpfno" name="txtpfno" value="<?php echo $empid1; ?>">
    					<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">
    					<input type="hidden" id="designation_id" name="designation_id" value="<?php echo $value1['desig']; ?>">
    					<input type="hidden" id="station_id" name="station_id" value="<?php echo $value1['station']; ?>">
    					<input type="hidden" id="dept_id" name="dept_id" value="<?php echo $value1['dept']; ?>">
    					<input type="hidden" id="depot_id1" name="depot_id1" value="<?php echo $value1['depot_id']; ?>">
					    
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">बिल युनिट  / Bill Unit</label>
										
										<?php
										    if($billunit == $billunit1){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" readonly class="form-control" id="billunit" name="billunit" placeholder="Employee Name" value="<?php echo $billunit1; ?>" readonly >
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">पैन नं / PAN No.</label>
										
										<?php
										    if($panno == $panno1){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fa fa-id-card" aria-hidden="true"></i>
										</span>
										<input type="text" class="form-control" id="panno" name="panno" placeholder="Employee PAN No." value="<?php echo $panno1; ?>" readonly> 
										</div>
									</div>
								</div>
								
							</div>
							<!--/row-->
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">नाम / Name</label>
										
										
										<?php
										    if($empname == $empname1){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" readonly class="form-control" id="name" name="name" placeholder="Employee Name" value="<?php echo $empname1; ?>" readonlt>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">पदनाम / Designation</label>
											
										<?php
										    if($designation == $designation1){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="designation" name="designation" placeholder="Employee Name" value="<?php echo $designation1; ?>" readonly>
										</div>
									</div>
								</div>
							</div>
								
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">स्टेशन  / Station</label>
										
										<?php
										    if($station == $station1){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="station" name="station" placeholder="Employee Name" value="<?php echo $station1; ?>" readonly>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">मोबाइल / Mobile</label>
										
										<?php
										    if($mobile == $mobile1){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fa fa-phone"></i>
										</span>
										<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile number" value="<?php echo $mobile1; ?>" readonly>
										</div>
									</div>
								</div>
								
							</div>
							<!--/row-->
							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">ई -मेल / E-Mail</label>
										
										<?php
										    if($email == $email1){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fas fa-envelope"></i>
										</span>
										<input type="email" class="form-control" id="email" name="email" placeholder="Employee Email id" value="<?php echo $email1; ?>" readonly>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">वर्ग / Category</label>
										
										<?php
										    if($catg == $catg1){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fas fa-user-graduate"></i>
										</span>
										<input type="text" id="catgdept" name="catgdept" placeholder="Employee Category" class="form-control" value="<?php echo $catg1; ?>" readonly>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">विभाग  / Department</label>
										
										<?php
										    if($dept == $dept1){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="dept" name="dept" placeholder="Employee Name" value="<?php echo $dept1; ?>" readonly>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">डिपो  / Depot</label>
										
										<?php
										    if($depot_id == $depot_id1){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="depot" name="depot" placeholder="Employee Name" value="<?php echo $depot_id1; ?>" readonly>
										</div>
									</div>
								</div>
							</div>
								
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">मूल वेतन / Basic Pay</label>
										
										<?php
										    if($bp == $bp1){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fa fa-inr" aria-hidden="true"></i>
										</span>
										<input type="text" id="bp" name="bp" placeholder="Employee Basic Pay" value="<?php echo $bp1; ?>" class="form-control" readonly>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">ग्रेड पे / Grade Pay</label>
										
										<?php
										    if($gp == $gp1){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fa fa-inr" aria-hidden="true"></i>
										</span>
										<input type="text" id="gp" name="gp" placeholder="Employee Grade Pay" value="<?php echo $gp1; ?>" class="form-control" readonly>
										</div>
									</div>
								</div>
							</div>
							<!--/row-->
							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">जन्म तारीख / Birth Date</label>
										
										<?php
										    if($BIRTHDATE1 == $BIRTHDATE11){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
										</span>
										<input type="text" id="bdate" name="bdate" placeholder="Employee Birth Date" class="form-control" value="<?php echo $BIRTHDATE11; ?>" readonly>
										</div>
									</div>									
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">नियुक्ति की तारीख / Appointment Date</label>
										
										<?php
										    if($RLYJOINDATE1 == $RLYJOINDATE11){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
										</span>
										<input type="text" id="apdate" name="apdate" placeholder="Employee Birth Date" class="form-control" value="<?php echo $RLYJOINDATE11; ?>" readonly>
										</div>
									</div>									
								</div>
							
							</div>
								
							<div class="row">
							    
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">स्तर  / Level</label>
										
										<?php
										    if($level == $level1){
										        echo '<div class="input-group">';
										    }
										    else
										    {
										        echo '<div class="input-group" style="border-style: dashed;border-color: red;">';
										    }
										
										?>
										<span class="input-group-addon">
										<i class="fas  fa-user"></i>
										</span>
										<input type="text" class="form-control" id="level" name="level" placeholder="Employee Name" value="<?php echo $level1; ?>" readonly>
										</div>
									</div>
								</div>
							</div>
							</div>
							<!--/row-->
							<div class="row">
            		    <div class="col-md-4"></div>
            		    <div class="col-md-4">
            				<center>
                				<div >
                					<button type="submit" class="btn blue">Approve</button>
                				</div>
                			</center>
            			</div>
            			<br>
            			<br>
            			<br>
            			<div class="col-md-4"></div>
            		</div>	
					</form>
					<!-- END FORM-->
					
				</div>
			</div>
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
    //   debugger;
    var deptid=$(this).val(); 
     //alert(deptid);
     $.ajax({
        url: '../public/minifunction.php',
        type: 'POST',
        data: {action: 'getDepot', id : deptid},
        })
       .done(function(data) {
         //  alert(data);
         $("#txtworkdepot").html(data);
    });
         
  });
    
 $( function() {
        $( ".datepicker" ).datepicker({
        dateFormat: "dd/mm/yy",  
        changeYear: true,
        changeMonth:true,
        });
    });    
</script>
