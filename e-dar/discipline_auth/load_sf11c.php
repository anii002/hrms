<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
//echo $cnt;
 $emp_name = get_emp_name($emp_pf);
$emp_desig = get_emp_designation($emp_pf); 


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
.text-tab{
            text-indent: 8em;
        }
</style>
<div class="padding-20">
    <h3 class="text-center"><strong>STANDARD FORM NO.11 (c)</strong></h3>
    <h4 class="text-center"><strong>Standard form for taking Disciplinary Action under Rule 9(9)(a)(iv) of the Railway</strong></h4>
    <h4 class="text-center"><strong>Servants (Discipline and Appeal) Rules,1968.</strong></h4>
    <br>
    <div class="row">
            <div class="col-md-6 pull-left">
                <h5>No <?php echo $reg_no; ?></h5>
            </div>
            <div class="col-md-6 pull-right">
                <h5>Dated <?php echo $dated; ?></h5>
            </div>
        </div>
     
    <div class="row">
        <h3 class="text-center"><b>MEMORANDUM</b></h3>
    </div>
            <div class="row">
                <p class="text-tabbed">Where as the article(s) of charge (s) was/were communicated to Shri <strong><?php echo $emp_name; ?></strong> under this office Memorandum No <strong><?php echo $sf11c_mem_no; ?></strong> Dated <strong><?php echo $sf11c_mem_dated; ?></strong> and 
            </p>
            <p class="text-tabbed">Where as a written statement of defence was submitted by him, on <strong><?php echo $sf11c_on; ?></strong>
            Now therefore, the underdesigned has caarefully considered the said written statement of
            defence and holds ,without prejudice to his right to impose any of the minor penalties not
            attracting the provision of sub-rule(2) of Rule 11 of Railway Servants (Discipline and Appeal) Rules,
            1968 that the imposition of major penalty including the minor penalty attracting the provision 
            of sub-rule (2) of Rules 11 of the said rules,is not necessary. 
            </p>
            <p class="text-tabbed">The undersigned has, therefore, dropped the proceedings already initiated under rule 9 of the said rules and has decided to initiate proceeding under Rule 11(1) of the said rule 
                on the article(s) of charges(s) already communicated to Shri <strong><?php echo $emp_name; ?></strong>
                vide this office Memorandum no <strong><?php echo $sf11c_mem_no; ?></strong> dated <strong><?php echo $sf11c_mem_dated; ?></strong>
            </p>
            <p class="text-tabbed">
                Shri <strong><?php echo $emp_name; ?></strong> is here by given an opportunity to make such
                representation as he may wish to make against the proposal to take action against him under
                Rule 11(1) of the Railway Servants (Discipline & Appeal) Rules,1968. The representation 
                if any,should be submitted to the undersigned * (through the General Manager <strong><?php echo get_emp_name($sf11c_gm_pf); ?></strong> Railway so as to reach the said General Manager) within 10 days of the receipt of this Memorandum.
                
            </p>
            <p class="text-tabbed">
                If Shri <strong><?php echo $emp_name; ?></strong>fails to submit his representation within the period specified above,
                it will be presumed that he has no representation to make and orders will be liable to passed 
                against Shri <strong><?php echo $emp_name; ?></strong><i>ex parte</i>.
            </p>
            <p class="text-tabbed">
                The receipt of this Memorandum should be acknowledged by Shri <strong><?php echo $emp_name; ?></strong>%(By order and in the same of the President).
            </p>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pull-right">
                <h5 class="text-tab">(Signature)</h5>
                <h5>(Name and Designation of the competent authority)</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 pull-left">
                <h5>To:</h5>
                <h5>Shri <strong><?php echo $emp_name." (".$emp_desig.")"; ?></strong> </h5>
                <h5>(Name,designation and office of the Railway Servant)</h5>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <p class="text-tabbed">
                <b>Comments of the Author---With the issue of orders by Board to impose minor penalty
                direct, Form 11(c),has become redundant.</b>
            </p>
        </div>     
</div>