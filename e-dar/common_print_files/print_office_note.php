<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
// echo $emp_pf;
if (isset($_GET["emp_pf"]) && isset($_GET["office_id"])) {
    $emp_pf = $_GET["emp_pf"];
    $office_id = $_GET["office_id"];
    $emp_name = get_emp_name($emp_pf);
    $emp_desig = get_emp_designation($emp_pf);
    $emp_station = get_emp_station($emp_pf);
    $emp_dob = date("d-m-Y", strtotime(get_emp_dob($emp_pf)));
    $emp_doa = date("d-m-Y", strtotime(get_emp_doa($emp_pf)));
    $sql_office_note = "SELECT * FROM `tbl_officer_note` WHERE `emp_pf`='$emp_pf' AND `id`='$office_id'";
    $rst_office_note = mysql_query($sql_office_note, $db_edar);
    if (mysql_num_rows($rst_office_note) > 0) {
        $rw_office_note = mysql_fetch_assoc($rst_office_note);
        // print_r($rw_office_note);
        /**
Array ( [id] => 1 [emp_pf] => 00512206892 [form_no] => SUR/01 [form_reference_id] => 2 [railway_board] => Central [place_of_issue] => Solapur [form_dated] => 2019-07-24 [for_details] => Something Goes Here!!!. [penality_type] => 1 [penalty_memo_1] => 1 [ack_2] => 2 [reply_to_memo_3] => 3 to 6 [order_of_ap_4] => 7 [enquiry_from_5] => 8 [findings_of_eo_6] => 9 [defence_7] => 10 [eo_8] => 11 [rate_of_pay_9] => 4500 [grade_10] => 4500 [nxt_increment_date] => 2019-08-02 00:00:00 [suspension_from] => 2019-07-01 [suspension_to] => 2019-09-01 [total_days] => 61 [appointing_authority] => SR.DPO/SUR [imposing_penalty] => SR.DPO/SUR [memo_even_dated] => 2019-07-24 [guilty] => 12 [created_date] => 2019-07-17 10:54:27 [created_by] => 3 )  
Office Note
         */
        extract($rw_office_note);
        $dated = date("d-m-Y", strtotime($form_dated));
        $memo_even_dated = date("d-m-Y", strtotime($memo_even_dated));
        $inc_eleven = date("d-m-Y", strtotime($nxt_increment_date));
        $suspension_from = date("d-m-Y", strtotime($suspension_from));
        $suspension_to = date("d-m-Y", strtotime($suspension_to));

        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Office Note</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<body>
    <style>
    .text-tabbed {
        text-indent: 5em;
    }

    @media print {
        .text-tabbed {
            text-indent: 5em;
        }
    }
    </style>

    <div style="float: right;">
        <button class="btn btn-danger hide1" onclick="history.go(-1);">Back</button>
        <button class="btn btn-success hide1" id="print_sf">Print</button>
    </div>

    <div class="padding-20">
        <h3 class="text-center"><strong><u>Office Note</u></strong></h3>
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 pull-right">
                <h5>No : <b><?php echo $form_no; ?></b></h5>
                <h5>Railway : <b><?php echo $railway_board; ?></b></h5>
                <h5>Place of Issue : <b><?php echo $place_of_issue; ?></b></h5>
                <h5>Dated : <b><?php echo $dated; ?></b></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <p class="text-tabbed text-justify">
                    Major penalty memo of even No. dated <b><?php echo $memo_even_dated; ?></b> issued to Design &
                    station <b><?php echo $emp_desig; ?> / <?php echo $emp_station; ?></b>
                    for <b><?php echo $for_details; ?></b>
                </p>
            </div>
        </div>
        <div class="row">
            <p>
                <h5 class="text-center">-***-</h5>
            </p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-justify text-tabbed"> Desciplinary procedure followed in the case is as under :- </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 left1">
                <p class="text-tabbed">1. The Major penalty memo.</p>
                <p class="text-tabbed">2. Acknowledgement.</p>
                <p class="text-tabbed">3. Reply to Memorandum.</p>
                <p class="text-tabbed">4. Order of Appointment of E.O.</p>
                <p class="text-tabbed">5. Enquiry proceedings from</p>
                <p class="text-tabbed">6. Findings of E.O.</p>
                <p class="text-tabbed">7. Defence Plea is at</p>
                <p class="text-tabbed">8. E.O. held the D.E. guilty/not</p>
                <p class="text-tabbed"> 9. Guilty, vide findings at</p>
                <p class="text-tabbed"> The next stage is to issue final orders.</p>
            </div>
            <div class="col-md-6 right1">
                <p class="text-tabbed">: P <b><?php echo $penalty_memo_1; ?></b></p>
                <p class="text-tabbed"> :P <b><?php echo $ack_2; ?></b></p>
                <p class="text-tabbed">: P <b><?php echo $reply_to_memo_3; ?></b></p>
                <p class="text-tabbed">: P <b><?php echo $order_of_ap_4; ?></b></p>
                <p class="text-tabbed">: P <b><?php echo $enquiry_from_5; ?></b></p>
                <p class="text-tabbed">: P <b><?php echo $findings_of_eo_6; ?></b></p>
                <p class="text-tabbed">: P <b><?php echo $defence_7; ?></b></p>
                <p class="text-tabbed">: P <b><?php echo $eo_8; ?></b></p>
                <p class="text-tabbed">: P <b><?php echo $guilty; ?></b></p>
                <p></p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <p class="text-justify text-tabbed"> The service particulars of the Delinquent Employee
                    Are as under :-</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-tabbed">10. Name: <b> <?php echo $emp_name; ?> </b></p>
                <p class="text-tabbed">11. Designation & Station <b><?php echo "$emp_desig/$emp_station"; ?> </b></p>
                <p class="text-tabbed">12. Rate of Pay Rs. <b><?php echo $rate_of_pay_9; ?></b></p>
                <p class="text-tabbed">13. Grade Rs. <b><?php echo $grade_10; ?></b></p>
                <p class="text-tabbed">14. Date Of Birth <b><?php echo $emp_dob; ?></b></p>
                <p class="text-tabbed">15. Date Of Appointment <b><?php echo $emp_doa; ?></b></p>
                <p class="text-tabbed">16. Next increment normally due on :- <b><?php echo $inc_eleven; ?></b></p>
                <p class="text-tabbed">The Delinquent Employee was kept under Suspension</p>
                <p class="text-tabbed"> From <b><?php echo $suspension_from; ?></b> to
                    <b><?php echo $suspension_to; ?></b> total days <b><?php echo $total_days; ?></b></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-tabbed">Delegation of Power's for imposing penalty is <b><?php echo $imposing_penalty; ?>
                    </b></p>
                <p class="text-tabbed">Appointing Authority <b><?php echo $appointing_authority; ?></b></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-justify text-tabbed"> Kindly instruct in reference to Para ll of above.</p>
            </div>
        </div>
        <div class="row pull-right">
            <div class="col-md-12 ">
                <p class="text-justify text-tabbed"> Ch.OS(P)/SUR</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-justify text-tabbed"> As about Appointing Authority :</p>
            </div>
        </div>
    </div>

    <?php
        }
    }
    ?>
</body>
<script src="../../../new_eta/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).on("click", "#print_sf", function() {
    $(".hide1").hide();
    window.print();
    window.location.reload();
});
</script>

</html>