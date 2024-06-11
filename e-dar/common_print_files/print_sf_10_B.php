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
    <title>Print SF 10 B FORM</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_8.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div style="float: right;">
        <button class="btn btn-danger hide1" onclick="history.go(-1);">Back</button>
        <button class="btn btn-success hide1" id="print_sf">Print</button>
    </div>
    <div class="container print">
        <h3 class="text-center"><strong>STANDARD FORM NO.10-B</strong></h3>
        <h4 class="text-center"><strong>Standard Form for appointment of Presenting Officer in common
                proceedings</strong></h4>
        <h4 class="text-center"><strong>[Rule 13 of RS (D&A) Rules, 1968]</strong></h4>
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 pull-right">
                <h5>No <strong><?php echo $frm_fetch['form_no']; ?></strong></h5>
                <h5>(Name of Railway Administration) <strong><?php echo $frm_fetch['railway_board']; ?></strong></h5>
                <h5>Place of Issue <strong><?php echo $frm_fetch['place_of_issue']; ?></strong></h5>
                <h5>Dated <strong><?php echo $frm_fetch['form_dated']; ?></strong></h5>
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
                No <strong><?php echo $frm_fetch['sf10aorb_order_no']; ?></strong> dated <strong><?php echo $frm_fetch['sf10aorb_dated']; ?></strong> appointing <strong><?php echo get_emp_name($frm_fetch['sf10aorb_appoinitng_DA'])." (".get_emp_designation($frm_fetch['sf10aorb_appoinitng_DA']).")"; ?></strong>(Name
                and Designation of the authority) to function as the disciplinary authority for the purpose of the
                common proceedings.
            </p>
            <p class="text-tabbed">WHEREAS an inquiry in accordance with Rule 9 and Rule 10 or Rule 11 of the Railway Servants (Disciplinary and Appeal) Rules, 1968 is being held against the Railway servants specified in the margin. </p>
            <p class="text-tabbed">AND WHEREAS the *President/Railway Board/the undersigned considers it necessary to appoint a Presenting Officer to present the case in supprot of the articles of charge against
            the said Railway servants before the Inquiry Authority.
            </p>
            <p class="text-tabbed">NOW, THEREFORE, the *President/Railway Board/the undersigned in exercise of the
                powers conferred by sub-rule 9(c) of the said Rule 9 of the Railway Servants ( Discipline and Appeal ) Rules ,1968 hereby appoint(s) Shri <strong><?php echo get_emp_name($frm_fetch['presenting_officer_pf'])." (".get_emp_designation($frm_fetch['presenting_officer_pf']).")"; ?></strong> (Name and designation of the Presenting Officer) to present the case in support of the articles of charges against said  Railway Servants before the Inquiry Authority.
            </p>
            <p class="text-tabbed">Shri <strong><?php //echo $frm_fetch['']; ?></strong> is also authorised to nominate during his temporary non-availability any other CBI/Railway official not below his rank for representing the case before the Inquiry Officer on his behalf and on behalf of the disciplinary authority for examination,cross-examination and re-examination as  well as for argument etc.
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