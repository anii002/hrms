<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
// echo $emp_pf;
$emp_name = get_emp_name($emp_pf);
$emp_desig = get_emp_designation($emp_pf); ?>
<style>
.text-tabbed {
    text-indent: 5em;
}
</style>
<div class="padding-20">
    <h3 class="text-center"><strong>STANDARD FORM NO.1</strong></h3>
    <h4 class="text-center"><strong>Standard Form of Order of Suspension</strong></h4>
    <h4 class="text-center"><strong>Rule 5(1) of the RS(D&A) Rules,1968.</strong></h4>
    <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6 pull-right">
            <h5>No :<?php echo $reg_no; ?></h5>
            <h5>Railway :<?php echo $rail_board; ?></h5>
            <h5>Place of Issue :<?php echo $place_of_issue; ?></h5>
            <h5>Dated :<?php echo $dated; ?></h5>
        </div>
    </div>
    <div class="row">
        <h3 class="text-center"><b>ORDER</b></h3>
    </div>
    <div class="row">
        <div class="col-md-6 ">
            <h5>Where as disciplinary proceeding against </h5>
            <h5> <strong>Shri <?php echo $emp_name; ?></strong></h5>
            <h5> <b>(<?php echo $emp_desig; ?>)</b></h5>
            <h5> (Name and Designation of the Railway Servant)is contempled/Pending</h5>

        </div>
        <div class="col-md-6">
            <h5>Where as a case against Shri.............................. </h5>
            <h5> ............................................................................</h5>
            <h5> .......................................................................</h5>
            <h5>(Name and Designation of the Railway Servant) </h5>
            <h5> in respect of whom a criminal
                offence is under</h5>
            <h5>investigation/inquiry/trail.</h5>

        </div>
    </div>
    <div class="row">
        <div class="col-md-11 pleft1">
            <p class="text-tabbed text-justify">Now,therefore,the undersigned (the authority competent to
                place the Railway servant) under suspension in term of the Schedules II and III
                appended to RS(D&A) Rules,1968 an authority mentioned in proviso to [Rule 4 of the
                RS (D&A) Rules ,1968] in exercise of the powers conferred by Rule 4/proviso to Rule
                4 of RS(D&A) Rules, 1968,hereby places the said <b>Shri
                    <?php echo $emp_name; ?></b> under suspension with immediate effect/with
                effect from <b><?php echo $sf1_effect_form; ?></b>.It is further ordered
                that during the period this order shall remain in force, the said <b>Shri
                    <?php echo $emp_name; ?> </b>shall not leave the headquaters
                without obtaining the previous permission of the competent authority.</p>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 pull-right">
            <h5>Signature ......................................</h5>
            <h5>Name .........................................</h5>
            <h5>.......... ...................................</h5>
            <h5>(Designation of the suspending authority)</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 pull-left">
            <h5>Copy to:</h5>
            <h5><b>Shri <?php echo $emp_name; ?></b> </h5>
            <h5><b>(<?php echo $emp_desig; ?>)</b> </h5>
            <h5>(Name and designation of the suspended Railway Servant)</h5>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <h5>Orders regarding subsistence allowance admissible to him during the period of
                suspension will issue
                separately.</h5>
        </div>
    </div>
</div>