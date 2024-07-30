<?php
$GLOBALS['flag'] = "0";
require_once 'common/db.php';
require_once 'common/header.php';
require_once 'list.php';

$id = $_GET['id'];
$sql = "SELECT * FROM register_user WHERE id = '$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
// echo "<pre>";
// print_r($row);exit();


?>

<div class="bgwhite">

  <section class="content-header">
    <h1>Edit Employee Details</h1>
    <ul style="list-style: none; margin-left: 180px; margin-top: -26px;">
      <li>
        <button class="btn btn-danger btn-sm" onclick="window.history.back()">Go Back</button>
      </li>
    </ul>
    <ol class="breadcrumb">
      <li><a href="super_admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit Employee Details</li>
    </ol>
  </section>
  <div class="content userregister">
    <div class="container">
      <div class="wizard">




        <form role="form" method="POST" action="update-emp.php" autocomplete="off">

          <div class="row">

            <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>" />
            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>PF Number</label>
              <input type="text" class="form-control" name="pf_no" id="pf_no" value="<?php echo $row['emp_no']; ?>" placeholder="Enter Pf Number" />
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>" placeholder="Enter Name" onkeydown="this.value=this.value.replace(/[^a-zA-Z ]/g,'');" />
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Department</label>
              <select name="department" id="department" class="form-control select2" required>
                <?php
                $dept = $row['department'];
                $sql_dept1 = "SELECT DEPTNO, DEPTDESC FROM department WHERE DEPTNO = '$dept'";
                $result_dept1 = mysqli_query($conn,$sql_dept1);
                $row_dept1 = mysqli_fetch_assoc($result_dept1);
                ?>
                <option value="<?php echo $row_dept1['DEPTNO']; ?>">
                  <?php echo $row_dept1['DEPTDESC']; ?></option>
                <?php while ($row_dept = mysqli_fetch_assoc($result_dept)) { ?>
                  <option value="<?php echo $row_dept['DEPTNO']; ?>"><?php echo $row_dept['DEPTDESC']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>


            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Designation</label>
              <select name="designation" id="designation" class="form-control select2" required>
                <?php
                $desig = $row['designation'];
                $sql_desig = "SELECT DESIGCODE, DESIGLONGDESC FROM designations WHERE DESIGCODE = '$desig'";
                $result_desig = mysqli_query($conn,$sql_desig);
                $row_desig = mysqli_fetch_assoc($result_desig);
                ?>
                <option value="<?php echo $row_desig['DESIGCODE']; ?>">
                  <?php echo $row_desig['DESIGLONGDESC']; ?></option>
                <?php while ($row_desg = mysqli_fetch_assoc($result_desg)) { ?>
                  <option value="<?php echo $row_desg['DESIGCODE']; ?>">
                    <?php echo $row_desg['DESIGLONGDESC']; ?></option>
                <?php } ?>
              </select>
            </div>

          </div>

          <div class="row">

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Bill Unit</label>
              <select name="bill_unit" id="bill_unit" class="form-control select2" required>
                <option value="<?php echo $row['bill_unit']; ?>"><?php echo $row['bill_unit']; ?>
                </option>
                <?php while ($row_bill = mysqli_fetch_assoc($result_bill)) { ?>
                  <option value="<?php echo $row_bill['billunit']; ?>">
                    <?php echo $row_bill['billunit']; ?></option>
                <?php } ?>
              </select>
            </div>

            <?php
            $pay = $row['7th_pay_level'];
            $sql_pay = "SELECT num, pay_text FROM paylevel WHERE num = '$pay'";
            $result_pay = mysqli_query($conn,$sql_pay);
            $row_pay = mysqli_fetch_assoc($result_pay);
            ?>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>7th CPC Pay Level</label>
              <select class="form-control select2" name="pay_level" id="pay_level">
                <option value="<?php echo $row_pay['num']; ?>"><?php echo $row_pay['pay_text']; ?>
                </option>
                <?php while ($row_pay_level = mysqli_fetch_assoc($result_pay_level)) {  ?>
                  <option value="<?php echo $row_pay_level['num']; ?>">
                    <?php echo $row_pay_level['pay_text']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Mobile No.</label>
              <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>" placeholder="Enter Mobile No" onkeydown="this.value=this.value.replace(/[^0-9]/g,'');" onChange="phonenumber(this);" maxlength="10" />
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Date of Birth</label>

              <input type="text" class="form-control datepicker" name="dob" id="dob" value="<?php echo $row['dob']; ?>" placeholder="Enter Date of Birth" />

            </div>

          </div>

          <div class="row">

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Station</label>
              <select name="station" id="station" class="form-control select2" required>
                <?php
                $station = $row['station'];
                $sql_station1 = "SELECT stationcode, stationdesc FROM station WHERE stationcode = '$station'";
                $result_station1 = mysqli_query($conn,$sql_station1);
                $row_station1 = mysqli_fetch_assoc($result_station1);
                ?>
                <option value="<?php echo $row_station1['stationcode']; ?>">
                  <?php echo $row_station1['stationdesc']; ?></option>
                <?php while ($row_station = mysqli_fetch_assoc($result_station)) { ?>
                  <option value="<?php echo $row_station['stationcode']; ?>">
                    <?php echo $row_station['stationdesc']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Date of Appointment</label>
              <input type="text" class="form-control datepicker" name="doa" id="doa" value="<?php echo $row['doa']; ?>" placeholder="Enter Date of Appointment" />
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Basic Pay</label>
              <input type="text" class="form-control" name="basic_pay" id="basic_pay" value="<?php echo $row['basic_pay']; ?>" placeholder="Enter Basic Pay" />
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Employee Type</label>
              <select class="form-control" name="emp_type" id="emp_type">
                <option value="<?php echo $row['empType']; ?>"><?php echo $row['empType']; ?></option>
                <option value="serving">Serving</option>
                <option value="pensioner">Pensioner</option>
              </select>
            </div>

          </div>

          <div class="row">

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Address 1</label>
              <textarea class="form-control" name="add1" id="add1" placeholder="Enter Address 1"><?php echo $row['emp_address1']; ?></textarea>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Address 2</label>
              <textarea class="form-control" name="add2" id="add2" placeholder="Enter Address 2"><?php echo $row['emp_address2']; ?></textarea>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Email Address</label>
              <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['emp_email']; ?>" placeholder="Enter Email Address" />
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Aadhar Number</label>
              <input type="text" class="form-control" name="aadhar" id="aadhar" value="<?php echo $row['emp_aadhar']; ?>" placeholder="Enter Aadhar Number" />
            </div>

          </div>

          <div class="row">

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>State</label>
              <input type="text" class="form-control" name="state" id="state" value="<?php echo $row['emp_state']; ?>" placeholder="Enter State" />
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>City</label>
              <input type="text" class="form-control" name="city" id="city" value="<?php echo $row['emp_city']; ?>" placeholder="Enter City" />
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Pincode</label>
              <input type="text" class="form-control" name="pin" id="pin" value="<?php echo $row['emp_pincode']; ?>" placeholder="Enter Pincode" />
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Office</label>
              <input type="text" class="form-control" name="office" id="office" value="<?php echo $row['office']; ?>" placeholder="Enter Office" />
            </div>

          </div>

          <div class="row">

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Office State</label>
              <input type="text" class="form-control" name="off_state" id="off_state" value="<?php echo $row['office_emp_state']; ?>" placeholder="Enter Office State" />
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Office City</label>
              <input type="text" class="form-control" name="off_city" id="off_city" value="<?php echo $row['office_emp_city']; ?>" placeholder="Enter Office City" />
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Office Address 1</label>
              <textarea class="form-control" name="off_add1" id="off_add1" placeholder="Enter Office Address 1"><?php echo $row['office_emp_address1']; ?></textarea>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Office Address 2</label>
              <textarea class="form-control" name="off_add2" id="off_add2" placeholder="Enter Office Address 2"><?php echo $row['office_emp_address2']; ?></textarea>
            </div>

          </div>

          <div class="row">

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Office Pincode</label>
              <input type="text" class="form-control" name="off_pin" id="off_pin" value="<?php echo $row['office_emp_pincode']; ?>" placeholder="Enter Office Pincode" />
            </div>

            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Community</label>
              <input type="text" class="form-control" name="community" id="community" value="<?php echo $row['community']; ?>" placeholder="Enter Community" />
            </div>

            <?php
            if ($row['handicap_status'] == 'Y') {
              $name = 'Yes';
            } else {
              $name = 'No';
            }
            ?>
            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Handicap Status</label>
              <select class="form-control" name="handi" id="handi">
                <option value="<?php echo $row['handicap_status']; ?>"><?php echo $name; ?></option>
              </select>
            </div>

            <?php
            if ($row['gender'] == 'M') {
              $name = 'Male';
            } elseif ($row['gender'] == 'F') {
              $name = 'Female';
            } elseif ($row['gender'] == 'TG') {
              $name = 'Trans-Gender';
            }
            ?>
            <div class="col-md-3 col-lg-3 col-sm-12 form-group">
              <label>Gender</label>
              <select class="form-control" name="gender" id="gender">
                <option value="<?php echo $row['gender']; ?>"><?php echo $name; ?></option>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="TG">Trans-Gender</option>
              </select>

            </div>



          </div>




          <ul class="list-inline pull-right col-md-12 m-t30">
            <li><button type="submit" class="btn btn-success btn-md next-step">Update</button></li>
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
  $(document).ready(function() {
    $(".select2").select2();
  });

  $(function() {
    //var mindate="01/01/2019";
    $(".datepicker").datepicker({
      format: "dd/mm/yyyy",
      //minDate: mindate,
      //maxDate: "19/04/2019", 
      changeYear: true,
      changeMonth: true,
    });

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
        $('.active-header').toggleClass('active-header').toggleClass('inactive-header').next()
          .slideToggle().toggleClass('open-content');
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
          //alert(data);
          if (data == "Employee Already Registered") {
            alert(data);
            $('#name').val("");
            $('#mobile').val("");
            $('#designation').val("none").trigger("change");
            $('#department').val("none").trigger("change");
            $('#bill_unit').val("none").trigger("change");
            $('#station').val("none").trigger("change");
            $('#basic_pay').val("");
            $('#pay_level').val("");
            $('#dob').val("");
          } else if (data == "New_User") {

            $('#name').val("");
            $('#mobile').val("");
            $('#designation').val("none").trigger("change");
            $('#department').val("none").trigger("change");
            $('#bill_unit').val("none").trigger("change");
            $('#station').val("none").trigger("change");
            $('#basic_pay').val("");
            $('#pay_level').val("");
            $('#dob').val("");
          } else {
            $('#name').val(data.name);
            $('#mobile').val(data.mobile);
            $('#designation').val(data.desig);
            $('#department').val(data.dept);
            $('#bill_unit').val(data.BU);
            $('#station').val(data.station);
            $('#basic_pay').val(data.bp);
            $('#pay_level').val(data.level);
            $('#dob').val(data.bdate);
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

</body>

</html>