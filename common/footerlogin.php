<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/js/select2.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="common/Common.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap-datepicker.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

 <script type="text/javascript">
        $(document).ready(function() {
            $('#pf_no').change(function() {
                var pf_no = $('#pf_no').val();
                $.ajax({
                    url: 'emp_fetch1.php',
                    type: 'POST',
                    data: {pf_no:pf_no},
                    dataType: 'JSON',
                    success:function(data)
                    {
                        // alert(data.birthdate);
                        // console.log(data);
                       // alert(data.deptcode);
                        if(data == "Employee Already Registered")
                        {
                            alert(data);    
                            $('#pf_no').val("");
                            $('#name').val("");
                             $('#mobile').val("");
                             $('#designation').val("none").trigger("change");
                             $('#department').val("none").trigger("change");
                             $('#bill_unit').val("none").trigger("change");
                             $('#station').val("none").trigger("change");
                             $('#basic_pay').val("");
                             $('#pay_level').val("none").trigger("change");
                             $('#dob').val("");
                        }
                        else if(data=="New_User"){

                             $('#name').val("");
                             $('#mobile').val("");
                             $('#designation').val("none").trigger("change");
                             $('#department').val("none").trigger("change");
                             $('#bill_unit').val("none").trigger("change");
                             $('#station').val("none").trigger("change");
                             $('#basic_pay').val("");
                             $('#pay_level').val("none").trigger("change");
                             $('#dob').val("");
                        }
                        else
                        {
                             $('#name').val(data.empname);
                             $('#department').val(data.deptcode).trigger("change");
                             $('#designation').val(data.desigcode).trigger("change");
                             $('#bill_unit').val(data.billunit).trigger("change");
                             $('#pay_level').val(data.pc7_level).trigger("change");   
                             $('#mobile').val(data.mobileno);
                             $('#dob').val(data.birthdate); 
                             $('#station').val(data.stationcode).trigger("change");
                             $('#doa').val(data.rlyjoindate);
                             $('#basic_pay').val(data.payrate);
                             $('#emp_type').val(data.emptype);
                             $('#add1').val(data.permaddress1);
                             $('#add2').val(data.resaddress1);
                             $('#email').val(data.email);
                             $('#aad').val(data.aadhaarno);
                             $('#state').val(data.permstate);
                             $('#city').val(data.permcity);
                             $('#pincode').val(data.permpincode);
                             $('#office').val(data.office);
                             // $('#off_state').val(data.);
                             // $('#off_city').val(data.);
                             // $('#off_add1').val(data.);
                             // $('#off_add2').val(data.);
                             // $('#off_pin').val(data.);
                             $('#community').val(data.community);
                             $('#handi').val(data.handicapflag);
                             $('#gender').val(data.sex);
                        }
                    }
                });

            });
        });
    </script>


    <script type="text/javascript">
       $(document).ready(function() {
        $('.select2').select2();
    });

      $( function() {
    //var mindate="01/01/2019";
    $( ".datepicker" ).datepicker({
     format: "dd/mm/yyyy",
     autoclose:true,
     //minDate: mindate,
     //maxDate: "19/04/2019", 
     changeYear: true,
     changeMonth:true,
});

  } );
    </script>

    <script type="text/javascript">
        function phonenumber(inputtxt) {
    var phoneno = /^[6789]\d{9}$/;
    if ((inputtxt.value.match(phoneno))) {
        return true;
    } else {
        $("#mobile").val("");
        $("#mobile").focus();
        alert("Invalid Mobile number");
        return false;
    }
}
    </script>
    
    <script type="text/javascript">
        $("#doa").on("change", function(){
    var dob=$("#dob").val();
    var doa=$("#doa").val();
    var parts = dob.split("/");
    var s=new Date(parts[2], parts[1] - 1, parts[0]);
    var parts1 = doa.split("/");
    var s1=new Date(parts1[2], parts1[1] - 1, parts1[0]);
    if(s1 < s){
      alert('Date of Appointment should be greater than Date Of Birth');
      $("#doa").val("");
      $("#doa").focus();
    }
  });


       $("#dob").on("change", function(){
    var dob=$("#curDate1").val();
    var doa=$("#dob").val();
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
      $("#dob").val("");
      $("#dob").focus();
    }
  });
    </script>

</body>

</html>