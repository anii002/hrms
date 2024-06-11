<?php 
session_start();
include('dbconfig/dbcon.php');
//include('public/minifunction.php');
date_default_timezone_set('Etc/UTC');
?>
<!DOCTYPE html>
<html>
<head>
  <title>
    Travelling Allowances Management Module (TAMM)
  </title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="assets/img/logo1.png" rel="icon" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="assets/other/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/other/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/other/plugins/iCheck/square/blue.css">
    <link href='https://fonts.googleapis.com/css?family=PT+Serif:400' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="assets/global/plugins/select2/select2.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/other/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/other/plugins/datepicker/datepicker3.css">

</head>
<style>
body {
  font-family: 'PT', serif !important;
  font-weight: 400; 
  font-size: 17px;
  height: 100%;
}

.grad{
    color: #5543ca;
    background: #5f2c82;
    background: -moz-linear-gradient(left,#5f2c82  0%,#49a09d 100%) !important;
    background: -webkit-linear-gradient(left,#5f2c82  0%,#49a09d 100%) !important;
    background: linear-gradient(to right,#5f2c82  0%,#49a09d  100%) !important;

    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
}


.btn-orange-moon {
    background: #FF416C;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #FF416C, #FF4B2B);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #FF416C, #FF4B2B); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: #fff;
    /*border: 3px solid #eee;*/
}

.btn-purple-moon {
    background: #5543ca;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #5f2c82, #49a09d);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #5f2c82, #49a09d); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: #fff;
    /*border: 3px solid #eee;*/
}

.title {
    font-size: 2.125em;
    line-height: 1.4em;
    letter-spacing: 0;
    font-weight:bold;
    text-transform: none;
    display: inline-block;
}

.form-control{
  border-color: #3c8dbc !important;
}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   opacity: 0.7;
   color: white;
   text-align: left;
}

.hide_get_btn button:focus, .hide_get_btn button.active{
  box-shadow: none !important;
  border: none !important;
  outline: none !important;
}

.select2-selection--single{
    background-color: #fff !important;
    border: 1px solid #3c8dbc !important;
    border-radius: 30px !important;
}
.select2-selection--single .select2-selection__rendered {
    /* size: a5; */
    font-weight: 100 !important;
    color: #444 !important;
    line-height: 28px !important;
    font-size: smaller !important;
    text-align: left !important;
}

@media screen and (max-width: 600px) {
    .login-box-body {
        width: 100% !important;
    }
}
</style>
<body class="login-page">
    
  <div class="row" style="overflow-x: hidden !important;">
    <div class="col-md-12 col-sm-12 col-lg-12">
      <div class="form-group">
        <div class="col-md-12" style="padding: 0px !important;">
          <div class="col-md-6 text-center" style="background: #2b3b55; padding: 50px; height: 100vh">
            <img src="assets/img/logo1.png" style="height:150px; width:150px;"></img><br/>
            <h1 class="card-header" style="color: #fff">CENTRAL RAILWAY</h1>
            <img src="assets/img/separator.png" style="height:10px; width:150px;"></img><br/>
            <h3 class="card-header" style="color: #fff; font-weight: 600">SOLAPUR DIVISION</h3>
            <br/>
            <h3 class="card-header" style="color: #fff; font-weight: 600">TAMM</h3>
            <h4 class="card-header" style="color: #fff; font-weight: 600">Travelling Allowance Management Module</h4>
            <h4 class="card-header" style="color: #fff; font-weight: 600">यात्रा भत्ता प्रभंधन मॉड्युल</h4>
          </div>
          <div class="col-md-6" style="padding: 40px;background: #fff;height: 100vh;overflow-y: auto;">
            <center>
              	  <h5 class="grad title">REGISTER</h5>
               &nbsp;
              <img src="assets/img/register.png" style="height:30px;width:30px;border-bottom-width: 0px;margin-bottom: 16px;"></img>
            <div class="login-box-body" style="width: 65%; padding: 0px !important">
            	<div class="row">
              <form action="public/minifunction.php?action=user_register" method="post" autocomplete="off">
                <input type="hidden" id="curDate" value="<?php echo date('m/d/Y') ?>">
                <input type="hidden" id="curDate1" value="<?php echo date('d/m/Y') ?>">
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control " maxlength="11" minlength="8" style="border-radius: 30px;" id="txtpfno" placeholder="पीएफ नं / PF No." name="txtpfno" autofocus="true" required>
                      <span style="color: #3c8dbc;" class="fa fa-user-circle form-control-feedback"></span>
                    </div> 
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control " style="border-radius: 30px;" id="txtuser" placeholder="प्रयोगकर्ता का नाम / Name" name="txtuser" autofocus="true" required>
                      <span style="color: #3c8dbc;" class="fa fa-user form-control-feedback"></span>
                    </div> 
                    <div class="form-group has-feedback">
                       <select class="form-control select2" id="txtdepartment" name="txtdepartment" autofocus="true" required>
                    		<option value="" selected="" disabled=""> विभाग का चयन करें / Select Department</option>
                    		<?php
                    			$sql=mysql_query("SELECT `DEPTNO`, `DEPTDESC` FROM `department` ORDER BY `DEPTDESC` ASC");
                    			while($row = mysql_fetch_array($sql)) {
                    				echo "<option value='".$row['DEPTNO']."'>".$row['DEPTDESC']."</option>";
                    			}
                    		?>
                       </select>
                    </div> 
                     <div class="form-group has-feedback">
                       <select class="form-control select2" id="txtdesignation" name="txtdesignation" autofocus="true" required>
                    		<option value="" selected="" disabled="">पदनाम का चयन करें / Select Designation</option>
                    		<?php
                    			$sql=mysql_query("SELECT `DESIGCODE`, `DESIGLONGDESC` FROM `designations` ORDER BY DESIGLONGDESC ASC");
                    			while ($row = mysql_fetch_assoc($sql)) {
                    				echo "<option value='".$row['DESIGCODE']."'>".$row['DESIGLONGDESC']."</option>";
                    			}
                    		?>
                       </select>
                    </div> 
                     <div class="form-group has-feedback">
                       <select class="form-control select2" style="border-radius: 30px;" id="txtworkstation" name="txtworkstation" autofocus="true" required>
                    		<option value="" selected="" disabled="">कार्यरत स्टेशन का चयन करें / Select Working Station</option>
                    		<?php
                    			$sql=mysql_query("SELECT stationcode,stationdesc FROM `station` ORDER BY stationdesc ASC");
                    			while ($row = mysql_fetch_assoc($sql)) {
                    				echo "<option value='".$row['stationcode']."'>".$row['stationdesc']."</option>";
                    			}
                    		?>
                       </select>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" style="border-radius: 30px;" id="txtmobile" placeholder="मोबाइल नंबर / Mobile Number" maxlength="10" name="txtmobile" autofocus="true" required onchange="phonenumber(this)">
                      <span style="color: #3c8dbc;" class="fa fa-phone form-control-feedback"></span>
                    </div> 
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" style="border-radius: 30px;" id="txtbasicpay" placeholder="वेतन / मूल वेतन की दर / Rate Of Pay / Basic Pay" name="txtbasicpay" autofocus="true" required>
                      <span style="color: #3c8dbc;" class="fa fa-rupee-sign form-control-feedback"></span>
                    </div>
                     <div class="form-group has-feedback">
                       <select class="form-control select2" style="border-radius: 30px;" id="txtworkdepot" name="txtworkdepot" autofocus="true" required>
                            <option value='' selected disabled>डिपो का चयन करें / Select Working Depot</option>
                       
                       </select>
                    </div> 
                    <div class="form-group has-feedback">
                      <!--input type="text" class="form-control" style="border-radius: 30px;" id="txtlevel" placeholder="स्तर / Level" maxlength="2" name="txtlevel" autofocus="true" onchange="levelnumber(this)" required>
                      <span style="color: #3c8dbc;" class="fa fa-chart-line form-control-feedback"></span-->
                      <select class="form-control select2" id="txtlevel" name="txtlevel" autofocus="true" required>
                    		<option value="" selected="" disabled="">Select स्तर / Level</option>
                    		<option value="1">1</option>
                    		<option value="2">2</option>
                    		<option value="3">3</option>
                    		<option value="4">4</option>
                    		<option value="5">5</option>
                    		<option value="6">6</option>
                    		<option value="7">7</option>
                    		<option value="8">8</option>
                    		<option value="9">9</option>
                    		<option value="10">10</option>
                    		<option value="11">11</option>
                    		<option value="12">12</option>
                    		<option value="13">13</option>
                    		<option value="14">14</option>
                    		<option value="15">15</option>
                    		<option value="16">16</option>
                    		<option value="17">17</option>
                    		<option value="18">18</option>
                      </select>
                    </div> 
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" style="border-radius: 30px;" id="txtdob" placeholder="जन्म की तारीख /  Date Of Birth" name="txtdob"  autofocus="true" required>
                      <!-- <input type="text" id="" value="<?php //echo date('Y-m-d') ?>"> -->
                      <span style="color: #3c8dbc;" class="fa fa-calendar-alt form-control-feedback"></span>
                    </div> 

                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" style="border-radius: 30px;" id="txtappointment" placeholder="नियुक्ति की तारीख /  Appointment Date " name="txtappointment" autofocus="true" required>
                      <span  style="color: #3c8dbc;" class="fa fa-calendar-alt form-control-feedback"></span>
                    </div>

                    <div class="row" style="margin-bottom: 20px;">
                      <!-- /.col -->
                      <div class="col-xs-6 hide_get_btn">
                          <button type="submit" class="btn btn-md btn-primary btn-purple-moon" style="float: left;border-radius: 30px;"> रजिस्टर / Register</button>
                      </div>
                       <div class="col-xs-6">
                          <a href="index.php" class="btn btn-md btn-primary" style="float: right;border-radius: 30px; background-color: #d73925d1;">रद्द करना / Cancel </a>
                      </div>
                      <!-- /.col -->
                    </div>

                </form>
            </div>
            </div>
        </center>
        
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row footer" style=" opacity: 1 !important; margin-left: 0px !important; overflow-x: hidden !important;     z-index: 9;">
    <div class="col-md-12 col-sm-12 col-lg-12">
      <div class="form-group col-md-12">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <div class="">
            <h4 style="color:#fff;font-size:13px; margin: 0 auto; padding-top: 20px" class="text-center">Design and Developed by <a href="http://www.infoigy.com" style="color:#fff" target="_BLANK"> &copy; SALGEM Infoigy Tech Pvt Ltd 2017-18</a></h4>
          </div>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>

</body>
</html>


<script src="assets/other/plugins/jQuery/jquery-3.1.1.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="assets/other/dist/js/bootstrap.min.js"></script>


<script src="assets/other/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="assets/other/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="assets/global/plugins/select2/select2.full.min.js"></script>
<script>
  $(document).ready(function () {
    //Date picker
    $('#txtappointment').datepicker({
      autoclose: true,
      format:"dd/mm/yyyy",
    });
     $('#txtdob').datepicker({
      autoclose: true,
      format:"dd/mm/yyyy",
    });

 }); 
</script>
<script type="text/javascript">

  $(document).ready(function() {
 $(".select2").select2();

  });

  $("#txtappointment").on("change", function(){
    var dob=$("#txtdob").val();
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
    if(s1 < s){
      alert('Date of Appointment should be greater than Date Of Birth');
      $("#txtappointment").val("");
      $("#txtappointment").focus();
    }
  });

   $("#txtdob").on("change", function(){
    var dob=$("#curDate1").val();
    var doa=$("#txtdob").val();
    // alert("curr "+dob);
    // alert("DOB "+doa);
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

    function levelnumber(inputtxt)
    {  
        var phoneno = /^([0-1]){1}([0-5]){1}?$/;            

        if((inputtxt.value.match(phoneno)))  
        {  
            return true;  
        }  
        else  
        {    
            alert("Please Enter Valid Level... "); 
            $('#txtlevel').val("");
            $('#txtlevel').focus();
            return false;  
        }  
    }      

  $(document).on("change","#txtdepartment",function(){
    var deptid=$(this).val(); 
    // alert(deptid);
     $.ajax({
        url: 'public/minifunction.php',
        type: 'POST',
        data: {action: 'getDepot', id : deptid},
        })
       .done(function(data) {
         // alert(data);
         $("#txtworkdepot").html(data);
        });
         
  });
</script>
