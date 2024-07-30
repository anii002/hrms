<?php
$GLOBALS['flag'] = "4";
require_once 'common/db.php';
require_once 'common/header.php';
require_once 'list.php';
?>

<div class="bgwhite">

  <section class="content-header">
    <h1>Employee Registration</h1>
    <ul style="list-style: none; margin-left: 195px; margin-top: -26px;">
      <li>
        <button class="btn btn-danger btn-sm" onclick="window.history.back()">Go Back</button>
      </li>
    </ul>
    <ol class="breadcrumb">
      <li><a href="super_admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Employee Registration</li>
    </ol>
  </section>
  <div class="content userregister">
    <div class="container">
      <div class="wizard">




        <form role="form" method="POST" action="emp_reg.php" autocomplete="off">
          <input type="hidden" id="curDate1" value="<?php echo date('d/m/Y') ?>">
          <div class="row">

            <div class="col-md-3 col-lg-3 col-sm-3 form-group">
              <label>Enter PF Number</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="pf_no" id="pf_no" placeholder="Enter PF Number" required autofocus>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Enter Name</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" onkeydown="this.value=this.value.replace(/[^a-zA-Z ]/g,'');" required>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Department</label>
              <select name="department" id="department" class="form-control select2" required>
                <option value="" selected>Choose Department</option>
                <?php while ($row_dept = mysqli_fetch_assoc($result_dept)) { ?>
                  <option value="<?php echo $row_dept['DEPTNO']; ?>"><?php echo $row_dept['DEPTDESC']; ?></option>
                <?php } ?>
              </select>
            </div>


            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Designation</label>

              <select name="designation" id="designation" class="form-control select2" required>
                <option value="" selected>Choose Designation</option>
                <?php while ($row_desg = mysqli_fetch_assoc($result_desg)) { ?>
                  <option value="<?php echo $row_desg['DESIGCODE']; ?>"><?php echo $row_desg['DESIGLONGDESC']; ?></option>
                <?php } ?>
              </select>

            </div>





          </div>

          <div class="row">

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Bill Unit</label>
              <select name="bill_unit" id="bill_unit" class="form-control select2" required>
                <option value="" selected>Choose Bill Unit</option>
                <?php while ($row_bill = mysqli_fetch_assoc($result_bill)) { ?>
                  <option value="<?php echo $row_bill['billunit']; ?>"><?php echo $row_bill['billunit']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>7th CPC Pay Level</label>
              <select class="form-control select2" name="pay_level" id="pay_level" required>
                <option value="" selected>Choose Pay Level</option>
                <?php while ($row_pay_level = mysqli_fetch_assoc($result_pay_level)) {  ?>
                  <option value="<?php echo $row_pay_level['num']; ?>"><?php echo $row_pay_level['pay_text']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Enter Mobile No.</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile No." required onkeydown="this.value=this.value.replace(/[^0-9]/g,'');" onChange="phonenumber(this);" maxlength="10">
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Date of Birth</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control datepicker" name="dob" id="dob" required>
              </div>
            </div>

          </div>

          <div class="row">
            <input type="hidden" name="station" id="station">
            <input type="hidden" name="doa" id="doa">
            <input type="hidden" name="basic_pay" id="basic_pay">
            <input type="hidden" name="emp_type" id="emp_type">
            <input type="hidden" name="add1" id="add1">
            <input type="hidden" name="add2" id="add2">
            <input type="hidden" name="email" id="email">
            <input type="hidden" name="aad" id="aad">
            <input type="hidden" name="state" id="state">
            <input type="hidden" name="city" id="city">
            <input type="hidden" name="pincode" id="pincode">
            <input type="hidden" name="office" id="office">
            <input type="hidden" name="off_state" id="off_state">
            <input type="hidden" name="off_city" id="off_city">
            <input type="hidden" name="off_add1" id="off_add1">
            <input type="hidden" name="off_add2" id="off_add2">
            <input type="hidden" name="off_pin" id="off_pin">
            <input type="hidden" name="community" id="community">
            <input type="hidden" name="handi" id="handi">
            <input type="hidden" name="gender" id="gender">
          </div>




          <ul class="list-inline pull-right col-md-12 m-t30">
            <li><button type="submit" class="btn btn-success btn-md next-step">Register</button></li>
          </ul>
        </form>
      </div>
    </div>
  </div>

</div>



<aside class="control-sidebar control-sidebar-dark">

  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>

  <div class="tab-content">

    <div class="tab-pane" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript::;">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript::;">
            <i class="menu-icon fa fa-user bg-yellow"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
              <p>New phone +1(800)555-1234</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript::;">
            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
              <p>nora@example.com</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript::;">
            <i class="menu-icon fa fa-file-code-o bg-green"></i>
            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
              <p>Execution time 5 seconds</p>
            </div>
          </a>
        </li>
      </ul>

      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript::;">
            <h4 class="control-sidebar-subheading">
              Custom Template Design
              <span class="label label-danger pull-right">70%</span>
            </h4>
            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript::;">
            <h4 class="control-sidebar-subheading">
              Update Resume
              <span class="label label-success pull-right">95%</span>
            </h4>
            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-success" style="width: 95%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript::;">
            <h4 class="control-sidebar-subheading">
              Laravel Integration
              <span class="label label-warning pull-right">50%</span>
            </h4>
            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript::;">
            <h4 class="control-sidebar-subheading">
              Back End Framework
              <span class="label label-primary pull-right">68%</span>
            </h4>
            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
            </div>
          </a>
        </li>
      </ul>

    </div>
    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
    <div class="tab-pane" id="control-sidebar-settings-tab">
      <form method="post">
        <h3 class="control-sidebar-heading">General Settings</h3>
        <div class="form-group">
          <label class="control-sidebar-subheading">
            Report panel usage
            <input type="checkbox" class="pull-right" checked>
          </label>
          <p>
            Some information about this general settings option
          </p>
        </div>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Allow mail redirect
            <input type="checkbox" class="pull-right" checked>
          </label>
          <p>
            Other sets of options are available
          </p>
        </div>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Expose author name in posts
            <input type="checkbox" class="pull-right" checked>
          </label>
          <p>
            Allow the user to show his name in blog posts
          </p>
        </div>

        <h3 class="control-sidebar-heading">Chat Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Show me as online
            <input type="checkbox" class="pull-right" checked>
          </label>
        </div>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Turn off notifications
            <input type="checkbox" class="pull-right">
          </label>
        </div>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Delete chat history
            <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
          </label>
        </div>
      </form>
    </div>
  </div>
</aside>
<div class="control-sidebar-bg"></div>
</div>
<footer class="main-footer text-center">

  <h5>&copy; Copyright 2019 <a href="http://almsaeedstudio.com">Salgem Infoigy Tech Pvt. Ltd.</a> All rights
    reserved.</h5>
</footer>

<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>

<script src="dist/js/demo.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="bootstrap/js/select2.min.js"></script>

<script>
  $(function() {
    //var mindate="01/01/2019";
    $(".datepicker").datepicker({
      format: "dd/mm/yyyy",
      autoclose: true,
      //minDate: mindate,
      //maxDate: "19/04/2019", 
      changeYear: true,
      changeMonth: true,
    });

  });

  $(document).ready(function() {
    $(".select2").select2();
  });

  $(document).ready(function() {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {

      var $target = $(e.target);

      if ($target.parent().hasClass('disabled')) {
        return false;
      }
    });

    $(".next-step").click(function(e) {

      var $active = $('.wizard .nav-tabs li.active');
      $active.next().removeClass('disabled');
      nextTab($active);

    });
    $(".prev-step").click(function(e) {

      var $active = $('.wizard .nav-tabs li.active');
      prevTab($active);

    });
  });

  function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
  }

  function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
  }


  //according menu

  $(document).ready(function() {
    //Add Inactive Class To All Accordion Headers
    $('.accordion-header').toggleClass('inactive-header');

    //Set The Accordion Content Width
    var contentwidth = $('.accordion-header').width();
    $('.accordion-content').css({});

    //Open The First Accordion Section When Page Loads
    $('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
    $('.accordion-content').first().slideDown().toggleClass('open-content');

    // The Accordion Effect
    $('.accordion-header').click(function() {
      if ($(this).is('.inactive-header')) {
        $('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
        $(this).toggleClass('active-header').toggleClass('inactive-header');
        $(this).next().slideToggle().toggleClass('open-content');
      } else {
        $(this).toggleClass('active-header').toggleClass('inactive-header');
        $(this).next().slideToggle().toggleClass('open-content');
      }
    });

    return false;
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#pf_no').change(function() {
      var pf_no = $('#pf_no').val();
      //alert(pf_no);
      $.ajax({
        url: 'emp_fetch1.php',
        type: 'POST',
        data: {
          pf_no: pf_no
        },
        dataType: 'JSON',
        success: function(data) {

          //  console.log(data.desig);
          console.log(data);

          if (data == "Employee Already Registered") {
            alert(data);
            $('#pf_no').val("").focus();
            $('#name').val("");
            $('#mobile').val("");
            $('#designation').val("").trigger("change");
            $('#department').val("").trigger("change");
            $('#bill_unit').val("").trigger("change");
            $('#station').val("").trigger("change");
            $('#basic_pay').val("");
            $('#pay_level').val("");
            $('#dob').val("");
          } else if (data == "New_User") {
            //$('#pf_no').val("").focus();
            $('#name').val("");
            $('#mobile').val("");
            $('#designation').val("").trigger("change");
            $('#department').val("").trigger("change");
            $('#bill_unit').val("").trigger("change");
            $('#station').val("").trigger("change");
            $('#basic_pay').val("");
            $('#pay_level').val("");
            $('#dob').val("");
          } else {
            $('#name').val(data.empname);
            $('#department').val(data.deptcode).trigger("change");
            $('#designation').val(data.desigcode).trigger("change");
            $('#bill_unit').val(data.billunit).trigger("change");
            $('#pay_level').val(data.pc7_level).trigger("change");
            $('#mobile').val(data.mobileno);
            $('#dob').val(data.birthdate);
            $('#station').val(data.stationcode);
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
  $("#dob").on("change", function() {
    var dob = $("#curDate1").val();
    var doa = $("#dob").val();
    // alert("curr "+dob);
    // alert("DOB "+doa);
    // $('#emp_doa').val(doa);
    var parts = dob.split("/");
    var s = new Date(parts[2], parts[1] - 1, parts[0]);
    var parts1 = doa.split("/");
    var s1 = new Date(parts1[2], parts1[1] - 1, parts1[0]);
    // alert(s);
    // alert(s1);
    if (s1 >= s) {
      alert('Please select valid Date of Birth');
      $("#dob").val("");
      $("#dob").focus();
    }
  });
</script>

</body>

</html>