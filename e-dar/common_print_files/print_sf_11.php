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
    <title>Print SF 11 FORM</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_4.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div style="float: right;">
        <button class="btn btn-danger hide1" onclick="history.go(-1);">Back</button>
        <button class="btn btn-success hide1" id="print_sf">Print</button>
    </div>
    <div class="container print">
        <h3 class="text-center"><strong>STANDARD FORM NO.11</strong></h3>
        <h4 class="text-center"><strong>Standard form of Memorandum of charge for imposing Minor penalties</strong></h4>
        <h4 class="text-center"><strong>[Rule 11 of RS(D&A) Rules, 1968]</strong></h4>
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
            <h3 class="text-center"><b>MEMORANDUM</b></h3>
        </div>
        <div class="row">
            <p class="text-tabbed">1. Shri <strong><?php echo $emp_name." (".$emp_desig.")"; ?></strong>

( Name, designation and office in which working )

is hereby informed that the undersigned proposes to take action against him under, Rule
11 of the Railway servants ( Discipline and Appeal) Rules, 1968. A statement of the
imputation of misconduct or misbehavior on which action is proposed to be taken as
mentioned above, is enclosed.
            </p>
            <p class="text-tabbed">2. Shri <strong><?php echo $emp_name;?></strong> is hereby
given an Opportunity to make such representation as he may wish against the proposal.

The representation, if any, should be submitted to the undersigned so as to reach within
ten days of receipt of this Memorandum. 
            </p>
            <p class="text-tabbed">3. If Shri <strong><?php echo $emp_name;?></strong> fails to
submit his representation within the period specified in para 2, it will be presumed that he
has no representation to make and orders will be liable, to be passed against
Shri<strong><?php echo $emp_name;?></strong>ex- parte.
            </p>
            <p class="text-tabbed">4. The receipt of this Memorandum should be acknowledged by
Shri.<strong><?php echo $emp_name;?></strong>.
            </p>
            
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pull-right">
                <h5>Signature ......................................</h5>
                <h5>Name ............................................</h5>
                <h5> .......................................................</h5>
                <h5>(Designation of the competent authority)</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 pull-left">
                <h5>To:</h5>
                <h5>Shri <strong><?php echo $emp_name." (".$emp_desig.")";?></strong> </h5>
                <h5>(Name and designation and office of the Railway Servant)</h5>
            </div>
            <div class="col-md-6"></div>
        </div>
        
        
        
    </div>
</body>
</html>
<script src="../../../new_eta/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).on("click","#print_sf",function(){
        $(".hide1").hide();
        window.print();
        window.location.reload();
    });
</script>