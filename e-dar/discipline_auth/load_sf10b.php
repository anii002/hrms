<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
//echo $cnt;
$emp_name = get_emp_name($emp_pf);
$emp_desig = get_emp_designation($emp_pf); 

$sf10b_appting_auth_name = get_emp_name($sf10b_appting_auth);
$sf10b_appting_auth_desig = get_emp_designation($sf10b_appting_auth); 

$sf10b_po_name = get_emp_name($sf10b_po);
$sf10b_po_desig = get_emp_designation($sf10b_po); 


//print_r($sf10_add_emp);
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
    <h3 class="text-center"><strong>STANDARD FORM NO.10-B</strong></h3>
    <h4 class="text-center"><strong>Standard Form for appointment of Presenting Officer in common
                proceedings</strong></h4>
    <h4 class="text-center"><strong>[Rule 13 of RS (D&A) Rules, 1968]</strong></h4>
    <br>
     <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4 " style="float: right;">
            <h5>No :<?php echo $reg_no; ?></h5>
            <h5>(Name of Railway Administration):<?php echo $rail_board; ?></h5>
            <h5>Place of Issue :<?php echo $place_of_issue; ?></h5>
            <h5>Dated :<?php echo $dated; ?></h5>
        </div>
    </div>
    <div class="row">
        <h3 class="text-center"><b>ORDER</b></h3>
    </div>
            <div class="row">
                <p class="text-tabbed">WHEREAS the Railway servants specified in the margin are jointly concerned in a
                disciplinary case.
            </p>
            <p class="text-tabbed">WHEREAS common proceedings have been ordered against the said Railway servants in terms of Rule 13 of the Railway Servants ( Discipline and Appeal ) Rules, 1968 vide Order 
                No  <strong><?php echo $sf10b_order_no; ?></strong> dated  <strong><?php echo $sf10b_order_dated; ?></strong> appointing <strong><?php echo $sf10b_appting_auth_name."(".$sf10b_appting_auth_desig.")"; ?></strong>(Name
                and Designation of the authority) to function as the disciplinary authority for the purpose of the
                common proceedings.
            </p>
            <p class="text-tabbed">WHEREAS an inquiry in accordance with Rule 9 and Rule 10 or Rule 11 of the Railway Servants (Disciplinary and Appeal) Rules, 1968 is being held against the Railway servants specified in the margin. </p>
            <p class="text-tabbed">AND WHEREAS the *President/Railway Board/the undersigned considers it necessary to appoint a Presenting Officer to present the case in supprot of the articles of charge against
            the said Railway servants before the Inquiry Authority.
            </p>
            <p class="text-tabbed">NOW, THEREFORE, the *President/Railway Board/the undersigned in exercise of the
                powers conferred by sub-rule 9(c) of the said Rule 9 of the Railway Servants ( Discipline and Appeal ) Rules ,1968 hereby appoint(s) Shri <strong><?php echo $sf10b_po_name."(".$sf10b_po_desig.")"; ?></strong> (Name and designation of the Presenting Officer) to present the case in support of the articles of charges against said  Railway Servants before the Inquiry Authority.
            </p>
            <p class="text-tabbed">Shri <strong><?php echo $emp_name."(".$emp_desig.")"; ?></strong> is also authorised to nominate during his temporary non-availability any other CBI/Railway official not below his rank for representing the case before the Inquiry Officer on his behalf and on behalf of the disciplinary authority for examination,cross-examination and re-examination as  well as for argument etc.
            </p>
            

        </div>
        <div class="row">
            <div class="col-md-6"> * By order and in the name of President</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6 pull-right middel-page">
                <p>Disciplinary Authority / </p>
                <p>*Authority competent to authenticate </p>
                <p>order in the name of the Presidet/Secretary,</p>
                <p>Railway Board.</p>
            </div>
        </div>
        <div class="row">
        <div class="col-md-6 pull-left">
            <h5>Copy to:</h5>
            <h5>1. Accused Officer</h5>
            <h5>**2. Central Bureau of Investigation.</h5>
            <h5>**3. Central Vigilance Commission</h5>
            <h5>4. Inquiry Officer</h5>
            <h5>5. Presenting Officer</h5>
        </div>
        <div class="col-md-6">
        </div>
            
        </div>

        
</div>