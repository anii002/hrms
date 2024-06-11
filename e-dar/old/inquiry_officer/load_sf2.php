<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
// echo $emp_pf;
$emp_name = get_emp_name($emp_pf);
$emp_desig = get_emp_designation($emp_pf); ?>
<link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">
<style>
.sf2-text-tabbed1 {
        text-indent: 15em;
    }
.sf2-text-tabbed2 {
        text-indent: 9em;
    }
</style>
<div class="padding-20">
    <h3 class="text-center"><strong>STANDARD FORM NO.2</strong></h3>
    <h4 class="text-center"><strong>[Standard Form for Deeming Railway servant under Suspension Rule 5(2) of RS</strong></h4>
    <h4 class="text-center"><strong>(D&A) Rules,1968]</strong></h4>
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
        <div class="col-md-12">
            <p class="text-tabbed">Where as case against   <strong>Shri <?php echo $emp_name; ?></strong>  <b>(<?php echo $emp_desig; ?>)</b> </p>

            <p class="sf2-text-tabbed1">(Name and Designation of the Railway servant.)</p>
            <p class="sf2-text-tabbed2">In respect of a criminal offence is under investigation.</p>
            <p class="sf2-text-tabbed2">And where as the said <strong>Shri <?php echo $emp_name; ?></strong>was </p>
            <p class="text-tabbed">detained in custody on <strong> <?php echo $sf2_custody_on; ?></strong> for a period exceeding forty-eight hours.</p>
            <p class="sf2-text-tabbed2">Now , therefore the said <strong>Shri <?php echo $emp_name; ?></strong></p>
                <p class="text-tabbed">is deemed to have been suspended with effect from the date of detention i.e. the </p>
            <p class="text-tabbed"> <strong><?php echo $sf2_date_of_detention; ?></strong> in terms of Rule 5(2) of (D&A) Rules, 1968 and <b>shall remain</b></p>
            <p class="text-tabbed"><b>under suspension until further orders.</b></p>
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