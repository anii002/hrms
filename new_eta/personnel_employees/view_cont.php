<?php
$GLOBALS['flag'] = "5.10";
include('common/header.php');
include('common/sidebar.php');
?>
<style type="text/css" media="screen">
  .box.box-info {
    border-top-color: white;
  }

  .table-bordered>thead>tr>th,
  .table-bordered>tbody>tr>th,
  .table-bordered>tfoot>tr>th,
  .table-bordered>thead>tr>td,
  .table-bordered>tbody>tr>td,
  .table-bordered>tfoot>tr>td {
    border: 2px solid black;
  }

  .table-bordered {
    border: 1px solid #1f1e1e;
  }

  #info1 {
    display: none;
    page-break-after: always;
  }

  #info2 {
    display: none;
  }

  #info3 {
    display: none;
  }

  #info4 {
    display: none;
  }

  @media print {
    #info1 {
      display: block;
    }

    #info1 {
      display: block;
    }

    #info2 {
      display: block;
    }

    #info3 {
      display: block;
    }

    #info4 {
      display: block;
    }

    .box {
      background-color: white;
      border: none;
    }

    #getback {
      display: none;
    }

    #track {
      display: none;
    }
  }
</style>
<style>
  @media print {
    .content {
      background: #fff !important;
    }

    .content-wrapper {
      background: #fff !important;
    }
  }
</style>
<?php
if (isset($_REQUEST['ref'])) {
  $empl_query = mysqli_query($conn,"select * from master_cont where reference_no='" . $_REQUEST['ref'] . "'");
  $empl_id_result = mysqli_fetch_array($empl_query);
  $empl_id = $empl_id_result['empid'];

  $emp_query = mysqli_query($conn,"select * from employees where pfno='" . $empl_id . "'");
  $emp_result = mysqli_fetch_array($emp_query);
  $years = ["1" => "January", "2" => "February", "3" => "March", "4" => "April", "5" => "May", "6" => "June", "7" => "July", "8" => "August", "9" => "September", "10" => "October", "11" => "November", "12" => "December"];
  $expl = explode(",", $empl_id_result['month']);
?>
  <div class="" id="info1">
    <div class="row text-center">
      <label class="" style="font-size:14px"><b>यात्रा भत्ता जर्नल/TRAVELLING ALLOWANCE JOURNAL</b></label>
      <div style="position:absolute;left:845px;top:5px;font-size:12px;" class="cls_005">
        <span class="cls_005"> जी.ए.31 एस आर सी /जी 1677</span>
      </div>
      <div style="position:absolute;left:855px;top:20px;font-size:10px;" class="cls_005">
        <span class="cls_005">जी.69 एफ / जी 69 एफ / ए </span>
      </div>
      <div style="position:absolute;left:835px;top:25px;font-size:8px;" class="cls_005">
        <span class="cls_005">____________________________________</span>
      </div>
      <div style="position:absolute;left:860px;top:32px;font-size:12px;" class="cls_005">
        <span class="cls_005">GA 31 SRC/G 1677</span>
      </div>
      <div style="position:absolute;left:875px;top:45px;font-size:10px;" class="cls_005">
        <span class="cls_005">G 69 F/G 69 F/A </span>
      </div>
    </div>
    <div class="row">
      <label align="left" style="font-size:13px;margin-left:20px;">मध्य रेल/CENTRAL RAILWAY</label>
    </div>
    <div class="row text-center">
      <label class="" style="font-size:13px;font-weight:100;">नियम जिससे शामिल हे /Rules by Which governed &nbsp;
        <span style="border-bottom:1px solid black"><b></b></span>
      </label>
    </div>
    <div class="row">
      <label class="" style="font-size:13px;font-weight:100;margin-left:20px; white-space: normal; width: auto">शाखा/Branch &nbsp;
        <span style="border-bottom:1px solid black;"><b><?php echo $emp_result['dept']; ?></b></span>&nbsp;&nbsp;&nbsp;&nbsp;मंडल/जिला/Divison/Dist.&nbsp;&nbsp;
        <span style="border-bottom:1px solid black"><b>SR. DFM's OFFICE</b></span>&nbsp;&nbsp;&nbsp;मुख्यालय / Headquarters at&nbsp;
        <span style="border-bottom:1px solid black"><b>SUR</b></span>&nbsp;&nbsp; द्वारा किये गये कार्यो का जर्नल, जिनके बारे मैं &nbsp;
        <span style="border-bottom:1px solid black"><b>
            <?php
            foreach ($expl as $val) {
              echo $years[$val] . ", ";
            }
            echo " - " . $empl_id_result['ContYear'];
            ?>
          </b></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; के लिये भत्ता मांगा गया हें|
      </label><br />
      <label class="" style="font-size:13px;font-weight:100;margin-left:20px;">
        Journal of duties performed by &nbsp;<span style="border-bottom:1px solid black"><b>
            <?php echo $emp_result['name']; ?></b></span>&nbsp;&nbsp;&nbsp;&nbsp;for which allowance for&nbsp;&nbsp;
        <span style="border-bottom:1px solid black"><b>
            <?php
            foreach ($expl as $val) {
              echo $years[$val] . ", ";
            }
            echo " - " . $empl_id_result['ContYear'];
            ?>

          </b></span> &nbsp;&nbsp; is claimed.
      </label>
      <label style="font-size:13px;font-weight:100;margin-left:20px;">पदनाम /Designation&nbsp;&nbsp;&nbsp;
        <span style="border-bottom:1px solid black"><b><?php echo $emp_result['desig']; ?></b></span>&nbsp;&nbsp;&nbsp;वेतन/Pay &nbsp;&nbsp;&nbsp;
        <span style="border-bottom:1px solid black"><b><?php echo $emp_result['bp']; ?></b></span>&nbsp;
      </label>
    </div>
    <div class="row"> </div>
  </div>
<?php } ?>
<?php
$years = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
$query = "SELECT * FROM `master_cont` INNER JOIN `add_cont` ON `master_cont`.reference_no = `add_cont`.reference_no WHERE `add_cont`.`set_no` = '" . $_REQUEST['id'] . "' AND add_cont.reference_no = '" . $_REQUEST['ref'] . "'";
$result = mysqli_query($conn,$query);
$value = mysqli_fetch_array($result);
$expl = explode(",", $value['month']);
foreach ($expl as $val) {
  //echo $years[$val-1].", ";
}
//echo " - ".date('Y', strtotime($value['cont_date']));
//echo " - ".date_format("%Y");
?>
<div class="page-content-wrapper">
  <div class="page-content">

    <div class="page-bar">
      <ul class="page-breadcrumb">
        <li>
          <i class="fa fa-home"></i>
          <a href="index.php">Home / मुख पृष्ठ</a>
          <i class="fa fa-angle-right"></i>
        </li>
        <li>
          <a href="#">फुटकर बिल / View Contingency Form</a>
        </li>
      </ul>

    </div>

    <form class="form-horizontal " name="TAForm" action="add_cont_ajax.php" method="post" enctype="multipart/form-data">
      <!-- <h1>ecefce</h1> -->
      <div class="portlet box blue" id="settings">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-book"></i>फुटकर बिल / View Contingency
          </div>
        </div>

        <div class="portlet-body table-responsive">


          <table class="table table-inverse " style="font-size: 15px" id="" border="1">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Date</th>
                <th>From</th>
                <th>To</th>
                <th>KM Rate</th>
                <th>KM</th>
                <th>Amount</th>
                <th>Objective</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result = mysqli_query($conn,$query);
              $cnt = 1;
              $sum = 0;
              while ($value = mysqli_fetch_array($result)) {
                echo "
										<tr>
										<td>$cnt</td>
										<td>" . $value['cont_date'] . "</td>
										<td>" . $value['from_place'] . "</td>
										<td>" . $value['to_place'] . "</td>
										<td>" . $value['rate'] . "</td>
										<td>" . $value['kms'] . "</td>
										<td>" . $value['amount'] . "</td>
										<td>" . $value['objective'] . "</td>
										<td></td>
										</tr>
      								";
                $cnt++;
                $sum = $sum + (int)$value['amount'];
              }
              echo "<tr><td colspan='6' class='text-right' style='text-align:right'><b>Total</b></td><td colspan='3'>$sum</td></tr>";
              ?>


            </tbody>
          </table>
          <div id="info2">
            <div class="row" style="border-top:1px solid black;page-break-before:always;">
              <div style="padding-left:35px;padding-right:30px;margin-top:20px;">
                <p style="text-align:justify;font-size:9px;"> मैं प्रमाणित करता हूँ कि उपर्युक्त _______________________ उस अवधि के दौरान, जिसके लिये इस बिल मैं भत्ता माँगा गया है रेलवे के कार्य से ड्यूटी पर मुख्यलय स्टेशन से बाहर गया था। इस अधिकारी ने रेलमार्ग /समुद्रमार्ग /सड़क-वाहन /वायुमार्ग की और इसे मुफ्त पास या सरकारी स्थानीय निधि या भारत सरकार के खर्च पर यात्रा करने की सुविधा दी गयी/नहीं दी गयी थी। <br>
                  मैं प्रमाणित करता हूं कि ड्यूटी पास की गयी यात्रा तथा विराम के बारे मैं जिसके लिए इस बिल मैं यात्रा भत्ता/दैनिक भत्ता मांगा गया हैं,किसी भी स्त्रोत से कोई यात्रा भत्ता या अन्य पारिश्रमिक नहीं लिया गया हैं। </p>
                <p style="text-align:justify;font-size:9px;margin-top:-11px;">
                  I hereby certify that the above mentioned _______________________ was absent on duty from his headquater's station during the period charged for in this bill on railway business and that the officer performed the journey by Rail/Sea/Road/Air and was allowed free pass or locomotion at the expenses of Government local fund or Govt. of India.<br>
                  I certify that no TA/DA or any other remuneration has been drawn from any other source in respect of the journey performed on duty pass and also for the halts for which TA/DA has been claimed in this bill.
                </p>
              </div>
            </div>
          </div>
          <div id="info3">
            <div class="row" style="margin-top:15px;">
              <div style="padding-right:30px;padding-left:30px;">
                <div class="pull-left">___________________________________</div>
                <div class="pull-left" style="margin-top:25px;font-size:10px;margin-left:-180px;">प्रति हस्ताक्षरित/Countersigned</div>
              </div>
              <div style="padding-right:30px;padding-left:30px;margin-left:350px;">
                <div class="pull-left">___________________________________</div>
                <div class="pull-left" style="margin-top:25px;font-size:10px;margin-left:-180px;">कार्यालय प्रमुख /Head Of Office</div>
              </div>
              <div style="padding-right:30px;padding-left:30px;margin-left:800px;margin-top:-5px;">
                <div class="pull-right" style="margin-left:180px;">__________________________________</div>
                <div class="" style="margin-top:5px;font-size:10px;">भत्ता मांगने वाले अधिकारी का हस्ताक्षर <br>Signature of officer/Claiming T.A</div>
              </div>
            </div>
          </div>
          <div id="info4">
            <div class="row" style="margin-top:15px;">
              <div style="padding-left:35px;padding-right:30px;">
                <div style="font-size:10px;">टिप्पणी :- किसी एक रेलवे से दूसरी रेलवे पर स्तानंन्तरण होने पर यात्रा भत्ता बिल पर यह प्रमाणित किया जाना चाहिये कि मुफ्त पास या सरकारी खर्च पर यात्रा करने की सुविधा दी गयी या नहीं। </div>
                <div style="font-size:10px;">Note :- On transfer from one Railway to another,certificate whether or not a free pass or not a free pass or Locomotion at Government expenses was allowed or not should be recorded on T.A Bills. </div>
              </div>
            </div>
          </div>
          <div class="row">
            <input type="button" value="Print" class="hide_print btn btn-success pull-right" style="margin-right:45px; width: 150px;" onclick="print_button()">
            <a href='tracking_cont.php?id=<?php echo $_REQUEST['ref'] ?>' id='track' class='btn btn-primary pull-right' style='margin-right:10px;'>Track</a>
            <?php
            $query_select = "select forward_status from master_cont where reference_no ='" . $_REQUEST['ref'] . "' AND forward_status = '0'";
            $result_select = mysqli_query($conn,$query_select);
            $value_select = mysqli_fetch_array($result_select);
            $t = (int)$value_select['forward_status'];
            if (mysqli_affected_rows($conn) > 0) {
              //echo $value_select['forward_status']; 
              echo '<input type="button" value="Forward" class="hide_print btn btn-primary pull-right" data-toggle="modal" data-target="#forward" style="margin-right:45px; width: 150px;" >';
            } else {

              $sql = "SELECT * FROM bill_forward WHERE reference_id = '" . $_REQUEST['ref'] . "' ORDER BY id DESC LIMIT 1";
              $res = mysqli_query($conn,$sql);
              //echo mysqli_affected_rows();
              while ($row = mysqli_fetch_array($res)) {
                //  echo $row['hold_status'];
                if ($row['admin_approve'] != '1' && $row['admin_aaproved'] = '0000-00-00 00:00:00') {
                  echo "<button id='getback' type='button' class='btn btn-primary pull-right' style='margin-right:10px;' value='" . $_REQUEST['ref'] . "'>Get Back</button>";
                }
              }
            }
            ?>
          </div>

        </div>
    </form>

  </div>
</div>
</div>
<div class="alert alert-info alert-dismissable" id="alert_message" style="display: none;"></div>
<?php
include 'common/footer.php';
?>
<div class="modal fade" id="forward" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Forward Claimed Contigency Bill</h4>
      </div>
      <form action='control/adminProcess.php?action=forward_bill' method="post">
        <div class="modal-body">
          <input type="hidden" name="empid" value="<?php echo $_SESSION['empid']; ?>">
          <input type="hidden" name="ref" value="<?php echo $_REQUEST['ref']; ?>">
          <div class="form-group">

            <div class="col-xs-7">

              <select name="forwardName" class="form-control select2 required" style="width: 100%" required>
                <option readonly value=''>Select User</option>
                <?php

                $query_emp = mysqli_query($conn,"SELECT department.dept_id as id  FROM `employees` ,department WHERE department.deptname=employees.dept AND pfno='" . $_SESSION['empid'] . "' ");
                $resu1 = mysqli_fetch_array($query_emp);
                $dptid = $resu1['id'];
                $sql_user = mysqli_query($conn,"SELECT * from users where dept='" . $dptid . "' AND role='12' ");
                // echo $did="SELECT * from users where dept='".$resu1['dept']."' and role='12' ";
                while ($resu = mysqli_fetch_assoc($sql_user)) {
                  $query = "SELECT * FROM employees where pfno='" . $resu['empid'] . "'";
                  $did .= "SELECT * FROM employees where pfno='" . $resu['empid'] . "'";

                  $result = mysqli_query($conn,$query);
                  while ($value = mysqli_fetch_assoc($result)) {
                    // $did.=$value['pfno'];
                    echo "<option value='" . $value['pfno'] . "'>" . $value['name'] . "  (" . $value['desig'] . ")</option>";
                  }
                }
                ?>
              </select>
            </div>
          </div><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn default" data-dismiss="modal">Close</button>
          <button type="button" class="btn blue">Forward</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
  function print_button() {
    $(".main-footer").hide();
    $(".box-header").hide();
    $(".hide_print").hide();
    $("#info").hide();
    $("#getback").hide();
    $("#track").hide();

    window.print();
    $(".main-footer").show();
    $(".box-header").show();
    $(".hide_print").show();
    $("#info").show();
    $("#info2").show();
    $("#info3").show();
    $("#info4").show();
    window.location.reload();
  }
  $(document).on("click", "#getback", function() {
    var check = confirm("Are you sure, you want to get back this forwarded Contingency Bill");
    var id = $(this).val();
    if (check) {
      $.ajax({
          url: 'control/adminProcess.php?action=getbackclaimedcont',
          type: 'POST',
          data: {
            id: id
          },
        })
        .done(function(html) {
          if (html == "true") {
            alert('Please check unclaimed Contingency list');
            window.location = 'show_unclaimed_cont.php';
          } else {
            alert("Claim can not get back");
          }
        });

    }
  });
</script>