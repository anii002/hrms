<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
// echo $sf8_presenting_officer_pf;
$emp_name = get_emp_name($emp_pf);
$inquiry_officer_name = get_emp_name($inquiry_officer_pf);
$sf8_presenting_officer_name = get_emp_name($sf8_presenting_officer_pf);
$emp_desig = get_emp_designation($emp_pf);
$io_desig = get_emp_designation($inquiry_officer_pf);
$po_desig = get_emp_designation($sf8_presenting_officer_pf);
?>
<link rel="stylesheet" href="print_css/sf_all.css" media="print">
<link rel="stylesheet" href="print_css/common_print.css">
<style>
.text-tabbed {
    text-indent: 05em;
}

.text-tabbed2 {
    text-indent: 09em;
}

.text-tabbed3 {
    text-indent: 06em;
}
</style>
<div class="padding-20">
    <h3 class="text-center"><strong>STANDARD FORM NO.8</strong></h3>
    <h4 class="text-center"><strong>Form for appointment of Presenting Officer</strong></h4>
    <h4 class="text-center"><strong>[Sub-rule (9) (iv) (c) of Rule 9 of RS (D&A) Rules, 1968]</strong></h4>
    <br>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4 " style="float: right;">
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
        <p class="text-tabbed">Whereas a inquiry under Rule 9 of the Railway Servants (Discipline and Appeal) Rules,
            1968 is being held against Shri <strong> <?php echo $emp_name; ?></strong>
        </p>
        <p class="text-tabbed">And whereas the undersigned considers it necessary to appoint a person to present the
            case in support of the charges before the Inquiring Autority.
        </p>
        <p class="text-tabbed">Now, therefore, the undersigned in exercise of the powers conferred by Sub-rule 9(iv)
            (c) of Rule 9 of the RS (D&A) Rules, 1968 hereby appoints Shri <strong>
                <?php echo $sf8_presenting_officer_name; ?></strong> as Presenting Officer to
            present the case in support of the charges before the Inquiring Autority.</p>
        <p class="text-tabbed">Shri <strong> <?php echo $inquiry_officer_name; ?></strong> is also authorised to
            appoint, during his <b>temporary
                non-availability</b> any other CBI/Railway Official not below his rank for representing the case
            before the Inquiry Officer on his behalf and on behalf of the disciplinary authority for examination,
            cross examination as well as the arguments etc.</p>
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 pull-right">
            <h5>Signature ......................................</h5>
            <h5>Name .................................</h5>
            <h5>(Designation of the Disciplinary Authority)</h5>
            <h5>Dated ...................................</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 pull-left">
            <h5>Copy forwarded for information to:</h5>
            <h5>Shri: <strong> <?php echo $emp_name; ?>(<strong> <?php echo $emp_desig; ?></strong>)</strong> </h5>
            <h5>(Name and designation of the Railway Servant)</h5>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 pull-right">
            <h5>Signature ...................................</h5>
            <h5>Name :<strong> <?php echo $emp_name; ?></strong>(<strong> <?php echo $emp_desig; ?></strong>)</h5>
            <h5 class="text-center">(Designation)</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 pull-left">
            <h5>No <strong> <?php echo $reg_no; ?></strong></h5>
            <h5>Copy forwarded for information to:</h5>
            <h5>1. Shri: <strong> <?php echo $inquiry_officer_name; ?></strong>(<strong>
                    <?php echo $io_desig; ?></strong>)</h5>
            <h5>(Name and designation of the Inquiry Officer)</h5>
            <h5>2. Shri:<strong> <?php echo $sf8_presenting_officer_name; ?></strong>(<strong>
                    <?php echo $po_desig; ?></strong>) </h5>
            <h5>(Name and designation of the Presenitng Officer)</h5>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 pull-right">
            <h5>Signature ...................................</h5>
            <h5>Name ...................................</h5>
            <h5 class="text-center">(Designation)</h5>
        </div>
    </div>




</div>