<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
// echo $emp_pf;
$emp_name = get_emp_name($emp_pf);
$emp_desig = get_emp_designation($emp_pf);
$emp_station = get_emp_station($emp_pf);
$emp_dob = date("d-m-Y", strtotime(get_emp_dob($emp_pf)));
$emp_doa = date("d-m-Y", strtotime(get_emp_doa($emp_pf)));
?>
<style>
.text-tabbed {
    text-indent: 5em;
}
</style>
<div class="padding-20">
    <h3 class="text-center"><strong><u>Office Note</u></strong></h3>
    <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6 pull-right">
            <h5>No : <b><?php echo $reg_no; ?></b></h5>
            <h5>Railway : <b><?php echo $rail_board; ?></b></h5>
            <h5>Place of Issue : <b><?php echo $place_of_issue; ?></b></h5>
            <h5>Dated : <b><?php echo $dated; ?></b></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <p class="text-tabbed text-justify">
                Major penalty memo of even No. dated <b><?php echo $memo_even_dated; ?></b> issued to Design &
                station <b><?php echo $emp_desig; ?> / <?php echo $emp_station; ?></b>
                for <b><?php echo $for_text; ?></b>
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
        <div class="col-md-4">
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
        <div class="col-md-6">
            <p class="text-tabbed">: P <b><?php echo $memo_one; ?></b></p>
            <p class="text-tabbed"> :P <b><?php echo $ack_two; ?></b></p>
            <p class="text-tabbed">: P <b><?php echo $reply_three; ?></b></p>
            <p class="text-tabbed">: P <b><?php echo $apoint_four; ?></b></p>
            <p class="text-tabbed">: P <b><?php echo $enquiry_five; ?></b></p>
            <p class="text-tabbed">: P <b><?php echo $finding_six; ?></b></p>
            <p class="text-tabbed">: P <b><?php echo $defence_seven; ?></b></p>
            <p class="text-tabbed">: P <b><?php echo $eo_eight; ?></b></p>
            <p class="text-tabbed">: P <b><?php echo $guilty_text; ?></b></p>
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
            <p class="text-tabbed">12. Rate of Pay Rs. <b><?php echo $rate_nine; ?></b></p>
            <p class="text-tabbed">13. Grade Rs. <b><?php echo $grade_ten; ?></b></p>
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
            <p class="text-tabbed">Appointing Authority <b><?php echo $apponting_auth; ?></b></p>
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