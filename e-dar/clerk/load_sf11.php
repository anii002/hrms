<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
// echo $emp_pf;
$emp_name = get_emp_name($emp_pf);
$emp_desig = get_emp_designation($emp_pf); ?>
<link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">
<style>
.text-tabbed {
    text-indent: 05em;
}
/*sf4 */
.sf4-text-tabbed1 {
        text-indent: 15em;
    }
.sf4-text-tabbed2 {
        text-indent:3em;
    }
    .text-tabbed2 {
    text-indent: 09em;
}
.text-tabbed3 {
    text-indent: 06em;
}
</style>
<div class="padding-20">
    <h3 class="text-center"><strong>STANDARD FORM NO.11</strong></h3>
    <h4 class="text-center"><strong>Standard form of Memorandum of charge for imposing Minor penalties</strong></h4>
    <h4 class="text-center"><strong>[Rule 11 of RS(D&A) Rules, 1968]</strong></h4>
    <br>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4 " style="float: right;">
            <h5>No :<strong><?php echo $reg_no; ?></strong></h5>
            <h5>Railway :<strong><?php echo $rail_board; ?></strong></h5>
            <h5>Place of Issue :<strong><?php echo $place_of_issue; ?></strong></h5>
            <h5>Dated :<strong><?php echo $dated; ?></strong></h5>
        </div>
    </div>
    <div class="row">
            <h3 class="text-center"><b>MEMORANDUM</b></h3>
        </div>
        <div class="row">
            <p class="text-tabbed">1. Shri <strong><?php echo $emp_name."  (".$emp_desig.")"; ?></strong>( Name, designation and office in which working )

is hereby informed that the undersigned proposes to take action against him under, Rule
11 of the Railway servants ( Discipline and Appeal) Rules, 1968. A statement of the
imputation of misconduct or misbehavior on which action is proposed to be taken as
mentioned above, is enclosed.
            </p>
            <p class="text-tabbed">2. Shri <strong><?php echo $emp_name; ?></strong> is hereby
given an Opportunity to make such representation as he may wish against the proposal.

The representation, if any, should be submitted to the undersigned so as to reach within
ten days of receipt of this Memorandum. 
            </p>
            <p class="text-tabbed">3. If Shri <strong><?php echo $emp_name; ?></strong> fails to
submit his representation within the period specified in para 2, it will be presumed that he
has no representation to make and orders will be liable, to be passed against
Shri <strong><?php echo $emp_name; ?></strong> ex- parte.
            </p>
            <p class="text-tabbed">4. The receipt of this Memorandum should be acknowledged by
Shri.<strong><?php echo $emp_name; ?></strong>.
            </p>

        </div>
   
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 pull-right">
            <h5>Signature ......................................</h5>
            <h5>Name .............................................</h5>
            <h5>.............................................</h5>
            <h5>(Designation of the competent authority)</h5>
            
        </div>
    </div>
    <div class="row">
            <div class="col-md-6 pull-left">
                <h5>To:</h5>
                <h5>Shri <strong><?php echo $emp_name; ?></strong>(<strong><?php echo $emp_desig; ?></strong>) </h5>
                <h5> </h5>
                <h5>(Name and designation and office of the Railway Servant)</h5>
            </div>
            <div class="col-md-6"></div>
        </div>
    
    
</div>