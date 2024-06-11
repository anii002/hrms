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
    <title>Print SF 8 FORM</title>
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
        <h3 class="text-center"><strong>STANDARD FORM NO.8</strong></h3>
        <h4 class="text-center"><strong>Form for appointment of Presenting Officer</strong></h4>
        <h4 class="text-center"><strong>[Sub-rule (9) (iv) (c) of Rule 9 of RS (D&A) Rules, 1968]</strong></h4>
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
            <p class="text-tabbed">Whereas a inquiry under Rule 9 of the Railway Servants (Discipline and Appeal) Rules,
                1968 is being held against Shri <strong><?php echo $emp_name; ?></strong>
            </p>
            <p class="text-tabbed">And whereas the undersigned considers it necessary to appoint a person to present the
                case in support of the charges before the Inquiring Autority.
            </p>
            <p class="text-tabbed">Now, therefore, the undersigned in exercise of the powers conferred by Sub-rule 9(iv)
                (c) of Rule 9 of the RS (D&A) Rules, 1968 hereby appoints Shri <strong><?php echo get_emp_name($frm_fetch['presenting_officer_pf'])." (".get_emp_designation($frm_fetch['presenting_officer_pf']).")"; ?></strong> as Presenting Officer to
                present the case in support of the charges before the Inquiring Autority.</p>
            <p class="text-tabbed">Shri <strong><?php echo get_emp_name($frm_fetch['inquiry_o_pf'])." (".get_emp_designation($frm_fetch['inquiry_o_pf']).")"; ?></strong>   is also authorised to appoint, during his <b>temporary
                    non-availability</b> any other CBI/Railway Official not below his rank for representing the case
                before the Inquiry Officer on his behalf and on behalf of the disciplinary authority for examination,
                cross examination as well as the arguments etc.</p>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pull-right">
                <?php
                    if($frm_fetch['DA_pf']==null)
                    {?>
                <h5>Signature ......................................</h5>
                <h5>Name .........................................</h5>
                <h5>(Designation of the Disciplinary Authority)</h5>
                <h5>Dated ...................................</h5>
                    <?php
                
                    } else {
                    ?>
                <h5>Signature ......................................</h5>
                <h5>Name <strong><?php echo get_emp_name_from_id($frm_fetch['DA_pf']); ?></strong></h5>
                <h5><strong>(<?php echo get_emp_desig_from_id($frm_fetch['DA_pf']); ?>)</strong></h5>
                <h5>(Designation of the Disciplinary Authority)</h5>
                <h5>Dated .<strong><?php echo $frm_fetch['DA_dated']; ?></strong></h5>

                <?php } ?>

                <!-- <h5>Signature ......................................</h5>
                <h5>Name ...........................................</h5>
                <h5>(Designation of the Disciplinary Authority)</h5>
                <h5>Dated ...................................</h5> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 pull-left">
                <h5>Copy forwarded for information to:</h5>
                <h5>Shri <strong><?php echo $emp_name." (".$emp_desig.")"; ?></strong> </h5>
                <h5>(Name and designation of the Railway Servant)</h5>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pull-right">
                <h5>Signature ...................................</h5>
                <h5>Name <strong><?php echo $emp_name." (".$emp_desig.")"; ?></strong></h5>
                <h5 class="text-center">(Designation)</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 pull-left">
                <h5>No <strong> <?php echo $frm_fetch['form_no']; ?></strong></h5>
                <h5>Copy forwarded for information to:</h5>
                <h5>1. Shri: <strong> <?php echo get_emp_name($frm_fetch['inquiry_o_pf']); ?></strong>(<strong> <?php echo get_emp_designation($frm_fetch['inquiry_o_pf']); ?></strong>)</h5>
                <h5>(Name and designation of the Inquiry Officer)</h5>
                <h5>2. Shri:<strong> <?php echo get_emp_name($frm_fetch['presenting_officer_pf']); ?></strong>(<strong> <?php echo get_emp_designation($frm_fetch['presenting_officer_pf']); ?></strong>)  </h5>
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
    <script src="../../../new_eta/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).on("click","#print_sf",function(){
        
        $(".hide1").hide();
        window.print();
        window.location.reload();
    });
</script>
</body>

</html>