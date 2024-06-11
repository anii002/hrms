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
    <h3 class="text-center"><strong>STANDARD FORM NO.4</strong></h3>
    <h4 class="text-center"><strong>Standard Form for Order for Revocation of Suspension Order</strong></h4>
    <h4 class="text-center"><strong>[Rule 5(5) (c) of RS (D&A) Rules, 1968]</strong></h4>
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
            <h3 class="text-center"><b>ORDER</b></h3>
        </div>
        <div class="row">
            <p class="text-tabbed">Where as the order placing <strong><?php echo $emp_name; ?></strong></p>
            <p class="sf4-text-tabbed1">(Name and Desigantion of the Railway servant.)
            </p>
            <p class="text-tabbed">under suspension was made/was deemed to have been made by <strong><?php echo $sf4_made_by; ?></strong> on <strong><?php echo $sf4_made_on; ?></strong></p>
            <!-- <p class="sf4-text-tabbed2">....................................</p> -->
            <p class="text-tabbed">Now,therefore, the undersigned (the authority which made or is deemed to have made</p><p class="sf4-text-tabbed2">
                the order of suspension or any other authority to which that authority is subordinate) in</p>
                <p class="sf4-text-tabbed2">exercise of the powers conferred by Clause (c) of sub-rule (5) of Rule 5 of the RS (D&A)</p>
                <p class="sf4-text-tabbed2">Rule, 1968, hereby revokes the said order of suspension with immediate effect with effect </p>
            <p class="sf4-text-tabbed2">from <strong><?php echo $sf4_effect_from; ?></strong></p>
        </div>
   
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 pull-right">
            <h5>Signature ......................................</h5>
            <h5>Name .............................................</h5>
            <h5>.............................................</h5>
            <h5>(Designation of the authority making this order)</h5>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 pull-left">
            <h5>Copy to:</h5>
            <h5>Shri: <strong><?php echo $emp_name; ?></strong> </h5>
            <h5><strong>(<?php echo $emp_desig; ?>)</strong> </h5>
            
            <h5>Address: <strong><?php echo get_emp_address($emp_pf); ?></strong></h5>
        </div>
        <div class="col-md-6"></div>
    </div>
    
</div>