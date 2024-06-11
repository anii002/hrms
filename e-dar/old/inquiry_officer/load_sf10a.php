<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
//echo $cnt;
$emp_name = get_emp_name($emp_pf);
$emp_desig = get_emp_designation($emp_pf); 

$sf10a_appting_auth_name = get_emp_name($sf10a_appting_auth);
$sf10a_appting_auth_desig = get_emp_designation($sf10a_appting_auth); 

$sf10a_io_name = get_emp_name($sf10a_io);
$sf10a_io_desig = get_emp_designation($sf10a_io); 


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
    <h3 class="text-center"><strong>STANDARD FORM NO.10-A</strong></h3>
    <h4 class="text-center"><strong>Standard Form for appointment of Enquiring Authority in common
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
            <p class="text-tabbed">WHEREAS common proceedings have been ordered against the said Railway servants in
                terms of Rule 13 of the Railway Servants ( Discipline and Appeal ) Rules, 1968 vide Order No
                <strong><?php echo $sf10a_order_no; ?></strong> dated  <strong><?php echo $sf10a_order_dated; ?></strong> appointing <strong><?php echo $sf10a_appting_auth_name."(".$sf10a_appting_auth_desig.")"; ?></strong> (Name
                and Designation of the authority) to function as the disciplinary authority for the purpose of the
                common proceedings.
            </p>
            <p class="text-tabbed">WHEREAS an inquiry in accordance with Rule 9 and Rule 10 or Rule 11 of the Railway
                Servants (Disciplinary and Appeal) Rules, 1968 is being held against the Railway servants specified in
                the margin. </p>
            <p class="text-tabbed">AND WHEREAS the President/Railway Board/the undersigned considers that an Inquiring
                Officer should be appointed to inquire into the charges framed against the said Railway servants.
            </p>
            <p class="text-tabbed">NOW, THEREFORE, the *President/Railway Board/the undersigned in exercise of the
                powers conferred bu sub-rule 2 of Rule 9 of the Railway Servants ( Discipline and Appeal ) Rules ,1968
                hereby appoint(s) Shri <strong><?php echo $sf10a_io_name."(".$sf10a_io_desig.")"; ?></strong>  (Name and designation of the Inquiry Officer) as the
                Inquiry Authority to inquire into the charges framed against the said Railway Servants.
            </p>
        </div>
        <div class="row">
            <div class="col-md-6"> * By order and in the name of President</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>To</p>
                <p>1 <strong><?php echo $emp_name." (".$emp_desig.")"; ?></strong> The accused</p>
                <p> Rly. servants</p>
                <p>2. Presenting Officer</p>
                <p>3. Inquiring Authority with relevant documents.</p>
                <p>**4. The C.V.C </p>
                <p> [Introduced vide Railway Board's Letter No.E(D&A) 76 RG 6-57,dated 14.8.78(NR 7094 ); NF/DAC 333, SC 145/78 ] </p>
            </div>
            <div class="col-md-6 pull-right middel-page">
                <p>Disciplinary Authority / </p>
                <p>*Authority competent to authenticate </p>
                <p>order in the name of the Presidet/Secretary,</p>
                <p>Railway Board.</p>
            </div>
        </div>

        
</div>