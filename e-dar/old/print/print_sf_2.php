<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
// echo $emp_pf;
$sql=mysql_query("SELECT * from  tbl_form_details where id='".$_GET['id']."'",$db_edar);
$frm_fetch=mysql_fetch_array($sql);
$emp_name = get_emp_name($frm_fetch['emp_id']);
$emp_desig = get_emp_designation($frm_fetch['emp_id']); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print SF 2 FORM</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <h3 class="text-center"><strong>STANDARD FORM NO.2</strong></h3>
        <h4 class="text-center"><strong>[Standard Form for Deeming Railway servant under Suspension Rule 5(2) of RS</strong></h4>
        <h4 class="text-center"><strong> (D&A) Rules,1968]</strong></h4>
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 pull-right">
                <h5>No <strong><?php echo $frm_fetch['form_no']; ?></strong></h5>
                <h5>Railway <strong><?php echo $frm_fetch['railway_board']; ?></strong></h5>
                <h5>Place of Issue <strong><?php echo $frm_fetch['place_of_issue']; ?></strong></h5>
                <h5>Dated <strong><?php echo $frm_fetch['form_dated']; ?></strong></h5>
            </div>
        </div>
        <div class="row">
            <h3 class="text-center"><b>ORDER</b></h3>
        </div>
        <div class="row">
            <p class="text-tabbed">Whereas case against Shri <strong><?php echo get_emp_name($frm_fetch['emp_id']); ?></strong>
            </p>
            <p class="sf4-text-tabbed1">(Name and Designation of the Railway servant.)
            </p>
            <p class="sf2-text-tabbed">In respect of a criminal offence is under investigation.</p>
            <p class="sf2-text-tabbed">And where as the said Shri <strong><?php echo get_emp_name($frm_fetch['emp_id']); ?></strong> was </p>
            <p class="text-tabbed">detained in custody on <strong><?php echo ($frm_fetch['custody_on']); ?></strong> for a period exceeding forty-eight hours.</p>
            <p class="sf2-text-tabbed">
                Now , therefore the said Shri <strong><?php echo get_emp_name($frm_fetch['emp_id']); ?></strong></p>
                <p class="text-tabbed">is deemed to have been suspended with effect from the date of detention i.e. the </p>
            <p class="text-tabbed"><strong><?php echo ($frm_fetch['date_of_detention']); ?></strong> in terms of Rule 5(2) of (D&A) Rules, 1968 and <b>shall remain</b></p>
            <p class="text-tabbed"><b>under suspension until further orders.</b></p>
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
                <h5>Shri <strong><?php echo get_emp_name($frm_fetch['emp_id'])." (".get_emp_designation($frm_fetch['emp_id']).")"; ?></strong> </h5>
                <h5>(Name and designation of the suspended Railway Servant)</h5>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-9">
            <h5>Orders regarding subsistence allowance admissible to him during the period of suspension will issue separately.</h5>
        </div>
        </div>
        
    </div>
</body>
<script src="../../../new_eta/assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>