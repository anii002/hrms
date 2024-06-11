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
    <title>Print SF 4 FORM</title>
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
        <h3 class="text-center"><strong>STANDARD FORM NO.4</strong></h3>
        <h4 class="text-center"><strong>Standard Form for Order for Revocation of Suspension Order</strong></h4>
        <h4 class="text-center"><strong>[Rule 5(5) (c) of RS (D&A) Rules, 1968]</strong></h4>
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
            <p class="text-tabbed">Whereas the order placing Shri <strong><?php echo get_emp_name($frm_fetch['emp_id'])." (".get_emp_designation($frm_fetch['emp_id']).")"; ?></strong>
            </p>
            <p class="sf4-text-tabbed1">(Name and Desigantion of the Railway servant.)
            </p>
            <p class="text-tabbed">under suspension was made/was deemed to have been made by <strong><?php echo ($frm_fetch['made_by']); ?></strong> on </p>
            <p class="sf4-text-tabbed2"><strong><?php echo ($frm_fetch['made_on']); ?></strong></p>
            <p class="text-tabbed">Now,therefore, the undersigned (the authority which made or is deemed to have made</p><p class="sf4-text-tabbed2">
                the order of suspension or any other authority to which that authority is subordinate) in</p>
                <p class="sf4-text-tabbed2">exercise of the powers conferred by Clause (c) of sub-rule (5) of Rule 5 of the RS (D&A)</p>
                <p class="sf4-text-tabbed2">Rule, 1968, hereby revokes the said order of suspension with immediate effect with effect </p>
            <p class="sf4-text-tabbed2">from <strong><?php echo ($frm_fetch['effect_from']); ?></strong></p>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pull-right">
                 <?php
                    if($frm_fetch['DA_pf']==null)
                    {?>
                <h5>Signature ......................................</h5>
                <h5>Name .........................................</h5>
                <h5>.......... ...................................</h5>
                <h5>(Designation of the authority making this order)</h5>

                    <?php
                    } else {
                    ?>
                <h5>Signature ......................................</h5>
                <h5>Name <strong><?php echo get_emp_name_from_id($frm_fetch['DA_pf']); ?></strong></h5>
                <h5><strong>(<?php echo get_emp_desig_from_id($frm_fetch['DA_pf']); ?>)</strong></h5>
                <h5>(Designation of the authority making this order)</h5>

                <?php } ?>

                
                <!-- <h5>Signature ......................................</h5>
                <h5>Name ............................................</h5>
                <h5> .......................................................</h5>
                <h5>(Designation of the authority making this order)</h5> -->
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
        
            <div class="col-md-12 ">
                <h5>Address <strong><?php echo get_emp_address($frm_fetch['emp_id']); ?></strong></h5>
                
            </div>
        </div>
        
        
    </div>
</body>
<script src="../../../new_eta/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).on("click","#print_sf",function(){
        $(".hide1").hide();
        window.print();
        window.location.reload();
    });
</script>
</html>