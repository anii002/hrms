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
    <title>Print SF 1 FORM</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div style="float: right;">
        <button class="btn btn-danger hide1" onclick="history.go(-1);">Back</button>
        <button class="btn btn-success hide1" id="print_sf">Print</button>
    </div>
    <div class="container print">
        <h3 class="text-center"><strong>STANDARD FORM NO.1</strong></h3>
        <h4 class="text-center"><strong>Standard Form of Order of Suspension</strong></h4>
        <h4 class="text-center"><strong>Rule 5(1) of the RS(D&A) Rules,1968.</strong></h4>
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 pull-right">
                <h5>No <strong><?php echo $frm_fetch['form_no']; ?></strong></h5>
                <h5>Railway <strong><?php echo $frm_fetch['railway_board']; ?></strong></h5>
                <h5>Place of Issue <strong><?php echo $frm_fetch['place_of_issue']; ?></strong></h5>
                <h5>Dated <strong><?php echo $frm_fetch['form_dated']; ?></h5>
            </div>
        </div>
        <div class="row">
            <h3 class="text-center"><b>ORDER</b></h3>
        </div>
        <div class="row">
            <div class="col-md-4 left1" >
                <h5>Where as disciplinary proceeding against </h5>
                <h5> Shri  <strong><?php echo get_emp_name($frm_fetch['emp_id']); ?></strong></h5>
                <h5><strong>(<?php echo get_emp_designation($frm_fetch['emp_id']); ?>)</strong></h5>
                <h5> (Name and Designation of the Railway Servant)is contempled/Pending</h5>
                
            </div>
            <div class="col-md-8 right1">
                <?php
                    if($frm_fetch['inquiry_o_pf']!=null)
                    {?>
                        <h5>Where as a case against </h5>
                <h5>Shri  <strong><?php echo get_emp_name_from_id($frm_fetch['inquiry_o_pf']); ?></strong><h5>
                <h5> <strong>(<?php echo get_emp_desig_from_id($frm_fetch['inquiry_o_pf']); ?>)</h5>
                <h5>(Name and Designation of the Railway Servant)in<br> respect of whom a criminal offence is undder investigation/inquiry/trail.</h5>

                    <?php 
                    }

                    else
                    {
                    ?>
                    <h5>Where as a case against Shri.............................. </h5>
                <h5> ............................................................................</h5>
                <h5> .......................................................................</h5>
                <h5>(Name and Designation of the Railway Servant)in<br> respect of whom a criminal offence is undder investigation/inquiry/trail.</h5>

                    <?php }
                 ?>
                
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-11 pleft1">
            <p class="sf1-text-tabbed">Now,therefore,the undersigned (the authority competent to place the Railway servant)
            </p>
            <p class="text-tabbed">under suspension in term of the Schedules II and III appended to RS(D&A) Rules,1968
            </p>
            <p class="text-tabbed">an authority mentioned in proviso to [Rule 4 of the RS (D&A) Rules ,1968] in exercise of</p>
            <p class="text-tabbed">the powers conferred by Rule 4/proviso to Rule 4 of RS(D&A) Rules, 1968,hereby places</p>
            <p class="text-tabbed">
                the said Shri <strong><?php echo get_emp_name($frm_fetch['emp_id']); ?></strong> under suspension with immediate effect/with effect </p>
                <p class="text-tabbed">from <strong><?php echo ($frm_fetch['effect_from']); ?></strong></p>
                <p class="text-tabbed2">It is further ordered that during the period this order shall remain in force, the said Shri</p>    
                <p class="text-tabbed"><strong><?php echo get_emp_name($frm_fetch['emp_id']); ?></strong>shall not leave the headquaters without obtaining the previous</p>
                <p class="text-tabbed"> permission of the competent authority.</p>
            </div>
            
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
                <h5>(Designation of the suspending authority)</h5>

                    <?php
                    } else {
                    ?>
                <h5>Signature ......................................</h5>
                <h5>Name <strong><?php echo get_emp_name_from_id($frm_fetch['DA_pf']); ?></strong></h5>
                <h5><strong>(<?php echo get_emp_desig_from_id($frm_fetch['DA_pf']); ?>)</strong></h5>
                <h5>(Designation of the suspending authority)</h5>

                <?php } ?>

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
<script type="text/javascript">
    $(document).on("click","#print_sf",function(){
        $(".hide1").hide();
        window.print();
        window.location.reload();
    });
</script>
</html>