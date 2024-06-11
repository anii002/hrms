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
    <link href="images/logo1.png" rel="icon" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link href='https://fonts.googleapis.com/css?family=PT+Serif:400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">

</head>
<style>
body {
  font-family: 'PT', serif !important;
  font-weight: 400; 
  font-size: 17px;
  height: 100%;
}
.form-control{
  border-color: #2b3b55 !important;
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
            <img src="logo.png" style="height:150px; width:150px;"></img><br/>
            <h1 class="card-header" style="color: #fff">CENTRAL RAILWAY</h1>
            <img src="separator.png" style="height:10px; width:150px;"></img><br/>
            <h3 class="card-header" style="color: #fff; font-weight: 600">SOLAPUR DIVISION</h3>
            <br/>
            <h3 class="card-header" style="color: #fff; font-weight: 600">TAMM</h3>
            <h4 class="card-header" style="color: #fff; font-weight: 600">Travelling Allowance Management Module</h4>
            <h4 class="card-header" style="color: #fff; font-weight: 600">यात्रा भत्ता प्रभंधन मॉड्युल</h4>
          </div>
          <div class="col-md-6" style="padding: 40px;background: #fff;height: 100vh;overflow-y: auto;">
            <center>
              	 <input type="button" value="REGISTER" class="btn btn-lg btn-primary form-contrl" style="width: 20vh; cursor: default;background: #2b3b55; margin-bottom: 10px;" />
            <div class="login-box-body" style="width: 65%; padding: 0px !important">
            	<div class="row">
              <form action="public/minifunction.php?action=user_register" method="post" autocomplete="off">
                <input type="hidden" id="curDate" value="<?php echo date('m/d/Y') ?>">
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control " maxlength="12" style="border-radius: 10px;" id="txtpfno" placeholder="पीएफ नं / PF No." name="txtpfno" autofocus="true" required="required">
                      <span class="fa fa-user form-control-feedback"></span>
                    </div> 
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control " style="border-radius: 10px;" id="txtuser" placeholder="प्रयोगकर्ता का नाम / Name" name="txtuser" autofocus="true" required="required">
                      <span class="fa fa-user form-control-feedback"></span>
                    </div> 
                    <div class="form-group has-feedback">
                       <select class="form-control" style="border-radius: 10px;" id="txtdepartment" name="txtdepartment" autofocus="true" required="required">
                    		<option value="" selected="" disabled=""> विभाग का चयन करें / Select Department</option>
                    		<?php
                    			$sql=mysql_query("SELECT * FROM `department` ORDER BY deptname ASC");
                          //echo "<script> alert('SELECT * FROM `department` ORDER BY deptname ASC'); </script>";
                    			while($row = mysql_fetch_array($sql)) {
                    				echo "<option value='".$row['deptname']."'>".$row['deptname']."</option>";
                    			}
                    		?>
                       </select>
                    </div> 
                     <div class="form-group has-feedback">
                       <select class="form-control" style="border-radius: 10px;" id="txtdesignation" name="txtdesignation" autofocus="true" required="required">
                    		<option value="" selected="" disabled="">पदनाम का चयन करें / Select Designation</option>
                    		<?php
                    			$sql=mysql_query("SELECT * FROM `designation` ORDER BY designation ASC");
                    			while ($row = mysql_fetch_assoc($sql)) {
                    				echo "<option value='".$row['designation']."'>".$row['designation']."</option>";
                    			}
                    		?>
                       </select>
                    </div> 
                     <div class="form-group has-feedback">
                       <select class="form-control" style="border-radius: 10px;" id="txtworkstation" name="txtworkstation" autofocus="true" required="required">
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
                      <input type="text" class="form-control" style="border-radius: 10px;" id="txtmobile" placeholder="मोबाइल नंबर / Mobile Number" maxlength="10" name="txtmobile" autofocus="true" required="required" onchange="phonenumber(this)">
                      <span class="fa fa-phone form-control-feedback"></span>
                    </div> 
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" style="border-radius: 10px;" id="txtbasicpay" placeholder="वेतन / मूल वेतन की दर / Rate Of Pay / Basic Pay" name="txtbasicpay" autofocus="true" required="required">
                      <span class="fa fa-rupee-sign form-control-feedback"></span>
                    </div>
                     <div class="form-group has-feedback">
                       <select class="form-control" style="border-radius: 10px;" id="txtworkdepot" name="txtworkdepot" autofocus="true" required="required">
                            <option value='' selected disabled>डिपो का चयन करें / Select Working Depot</option>
                       
                       </select>
                    </div> 
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" style="border-radius: 10px;" id="txtlevel" placeholder="स्तर / Level" name="txtlevel" autofocus="true" required="required">
                      <span class="fa fa-chart-line form-control-feedback"></span>
                    </div> 
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" style="border-radius: 10px;" id="txtdob" placeholder="जन्म की तारीख /  Date Of Birth" name="txtdob"  autofocus="true" required="required">
                      <!-- <input type="text" id="" value="<?php //echo date('Y-m-d') ?>"> -->
                      <span class="fa fa-calendar-alt form-control-feedback"></span>
                    </div> 

                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" style="border-radius: 10px;" id="txtappointment" placeholder="नियुक्ति की तारीख /  Appointment Date " name="txtappointment" autofocus="true" required="required">
                      <span class="fa fa-calendar-alt form-control-feedback"></span>
                    </div>

                     

                    <div class="row" style="margin-bottom: 20px;">
                      <!-- /.col -->
                      <div class="col-xs-6">
                          <button type="submit" class="btn btn-md btn-primary" style="background: #2b3b55; float: left"> रजिस्टर / Register</button>
                      </div>
                       <div class="col-xs-6">
                          <a href="index.php" class="btn btn-md btn-primary" style="background: red; float: right">रद्द करना / Cancel </a>
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
  <div class="row footer" style=" opacity: 1 !important; margin-left: 0px !important; overflow-x: hidden !important">
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


<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/js/bootstrap.min.js"></script>


<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->

<script>
  $(function () {
    //Initialize Select2 Elements
 

    //Date picker
    $('#txtappointment').datepicker({
      autoclose: true
    });
     $('#txtdob').datepicker({
      autoclose: true
    });

 }); 
</script>
<script type="text/javascript">

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
    if(s1 < s){
      alert('Date of Appointment should be greater than Today Date');
      $("#txtappointment").val("");
      $("#txtappointment").focus();
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

  $(document).on("change","#txtdepartment",function(){
    var deptid=$(this).val(); 
    //alert(deptid);
     $.ajax({
        url: 'public/minifunction.php',
        type: 'POST',
        data: {action: 'getDepot', id : deptid},
        })
       .done(function(data) {
      //    alert(data);
         $("#txtworkdepot").html(data);
        });
         
  });
</script>
