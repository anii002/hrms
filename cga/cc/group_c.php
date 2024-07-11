<?php
$GLOBALS['flag'] = "1.9";
include('common/header.php');
include('common/sidebar.php');
?>
<style type="text/css" media="screen">
  @media print {
    .btnhide {
      display: none !important;
      display: block;
    }
</style>

<div class="page-content-wrapper">
  <div class="page-content">
    <!-- <h1>ecefce</h1> -->
    <div class="portlet box blue btnz">
      <div class="portlet-title">
        <div class="caption btnboom">
          <i class="fa fa-book "></i>
          <p></p>
        </div>
      </div>
      <div class="portlet-body form">
        <div class="" id="info1" style="border-top:px solid black;padding:10px;">
          <div class="row">
            <label class="" style="font-size:16px;margin-top:25px;margin-left: 40px;">Central Railway</label>
            <label align="right" style="font-size:14px;margin-top:25px;margin-left: 70%;"><b>Solapur Division</b></label>
          </div>
          <div class="row">
            <?php
            $date = date('d/m/Y')
            ?>


            <label style="font-size:14px;margin-top:15px;margin-left: 80%;"><b>Date:<?php
                                                                                    $con = dbcon1();
                                                                                    $sql = mysqli_query($con, "SELECT screening_sheet.*,applicant_registration.*,screening_sheet.remark from applicant_registration,screening_sheet where screening_sheet.ex_emp_pfno=applicant_registration.ex_emp_pfno and screening_sheet.ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
                                                                                    $res = mysqli_fetch_array($sql);
                                                                                    if ($res['ss_status'] == 1) {
                                                                                      echo $res['curDate'];
                                                                                    } else {
                                                                                      echo $date . '<form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form" id="frm_id">';
                                                                                    }
                                                                                    ?></b></label>
          </div>
          <br><br>
          <div class="row text-center">
            <label align="" style="font-size:16px;margin-left:20px;"><b>COMPASSIONATE APPOINTMENT - SCREENING FOR GROUP-'C' CATEGORY-Date of screening -<?php
                                                                                                                                                        if ($res['ss_status'] == 1) {
                                                                                                                                                          echo $res['date_of_screening'];
                                                                                                                                                        } else {
                                                                                                                                                        ?> <input type="text" id="appl_dob" name="aapl_dob" required=""><?php } ?></b></label>
          </div>
          <div class="row text-center">
            <label align="" style="font-size:16px;margin-left:20px;"><b>ASSESMENT SHEET</b></label>
          </div>
        </div>
        <!-- BEGIN FORM-->
        <input type="hidden" name="curDate" id="curDate" value="<?php echo $date; ?>">
        <input type="hidden" id="pid" name="pid" value="<?php echo $_GET['id']; ?>">
        <input type="hidden" id="p_emp_pfno" name="p_emp_pfno" value="<?php echo $_GET['ex_emp_pfno']; ?>">
        <input type="hidden" id="group" name="group" value="<?php echo $_GET['group']; ?>">

        <div class="form-body">
          <!-- <h3 class="form-section">Add User</h3> -->
          <div class="row">
            <div style="margin-left: 25px" class="table-responsive">
              <table border="1" style="width: 85%;">

              </table>
            </div>
          </div>

          <table class="table table-bordered table-striped" style="width: 100%;">
            <thead>
              <th>Sr No.</th>
              <th>Name of the <br>Candidate</th>
              <th>Name, Design, Stn etc.,<br>of Ex.Employee</th>
              <th>Caste</th>
              <th>Date of Birth</th>
              <th>Education</th>
              <th>AB<br>Code<br>No</th>
              <th>Marks<br>out of<br>100</th>
              <th>Remarks</th>
            </thead>
            <tbody>
              <?php
              $con = dbcon1();
              $con = dbcon2();
              $sql1 = mysqli_query($con, "SELECT applicant_name,applicant_dob,caste,applicant_qualifiaction,name,designation,station from drmpsurh_cga.applicant_registration,drmpsurh_sur_railway.register_user where applicant_registration.ex_emp_pfno=register_user.emp_no and applicant_registration.ex_emp_pfno='" . $_GET['ex_emp_pfno'] . "'");
              $res1 = mysqli_fetch_array($sql1);

              ?>
              <tr>
                <td>1</td>
                <td><?php echo $res1['applicant_name']; ?></td>
                <td><?php echo $res1['name'] . " ," . designation($res1['designation']) . " ," . $res1['station']; ?></td>
                <td><?php echo $res1['caste'] ?></td>
                <td><?php echo $res1['applicant_dob'] ?></td>
                <td><?php echo $res1['applicant_qualifiaction'] ?></td>
                <td>
                  <?php
                  if ($res['ss_status'] == 1) {
                    echo $res['ab_code_no'];
                  } else {
                    echo '<input type="text" class="TextNumber" name="ab_code" id="ab_code" required>';
                  }
                  ?></td>
                <td>
                  <?php
                  if ($res['ss_status'] == 1) {
                    echo $res['marks_obtained'];
                  } else {
                    echo '<input type="text" class="onlyNumber" name="total_marks" id="total_marks" required>';
                  }
                  ?></td>
                <td>
                  <?php
                  if ($res['ss_status'] == 1) {
                    echo $res['remark'];
                  } else {
                    echo '<textarea name="remark" id="remark1" required></textarea>';
                  }
                  ?>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
        <div class="form-actions right">
          <?php
          if ($res['ss_status'] != 1) {
            echo '<button type="submit" class="btn blue submit_btn btnhide" >Submit </button>';
          }
          ?>

          <!-- <a class='btn blue btnn' data-toggle='modal' href='#basic'>Forward To </a> -->
          <button onclick="print_button()" class="btn green btnhide">Print</button>
          &nbsp;
          <button type="button" class="btn default btnhide" onclick="history.go(-1);">Cancel</button>
        </div>
      </div>
      </form>
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
  $(function() {

    //  $('#fam_mem_dob_1').datepicker({
    //  	format:'dd/mm/yyyy',
    //   autoclose: true
    // });
    $('#appl_dob').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });

  });

  function print_button() {
    // $(".main-footer").hide();
    $(".right").hide();
    $(".btnboom").hide();
    // $("#info").hide();
    $(".btnhide").hide();
    $(".btnz").css("border", "0");
    window.print();

    window.location.reload();
  }


  $(document).ready(function() {
    $("#frm_id").submit(function(e) {
      e.preventDefault();

      if ($.trim($('#remark1').val()) == '') {
        alert('Input can not be blank..');
      } else {
        var group = $("#group").val();
        var p_emp_pfno = $("#p_emp_pfno").val();
        var curDate = $("#curDate").val();
        var remark = $("#remark1").val();
        var pid = $("#pid").val();
        var ab_code = $("#ab_code").val();
        var total_marks = $("#total_marks").val();
        var appl_dob = $("#appl_dob").val();

        $.ajax({
          type: "post",
          url: "control/adminProcess.php",
          data: "action=submit_ss&group=" + group + "&p_emp_pfno=" + p_emp_pfno + "&curDate=" + curDate + "&remark=" + remark + "&pid=" + pid + "&total_marks=" + total_marks + "&ab_code=" + ab_code + "&appl_dob=" + appl_dob,
          success: function(data) {
            //alert(data);
            if (data == 1) {
              alert("Submitted Successfully....");
              window.location = "recevied_application.php";
            } else {
              alert("Failed....");
              window.location = "recevied_application.php";
            }
          }
        })



      }
    });
  });

  $(document).on("change", "#total_marks", function() {
    var t_mark = $(this).val();
    if (t_mark > 100) {
      alert("Total marks should less than 100...");
      $("#total_marks").val('').focus();
    }
  });

  $(document).on("input change paste", ".onlyNumber", function() {

    var newVal = $(this).val().replace(/[^0-9]*$/g, '');

    $(this).val(newVal);

  });

  $(document).on("input change paste", ".TextNumber", function() {

    var newVal = $(this).val().replace(/[^a-zA-Z0-9\s]/g, '');

    $(this).val(newVal);

  });
</script>