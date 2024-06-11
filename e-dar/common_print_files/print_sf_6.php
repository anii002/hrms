
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
    <title>Print SF 6 FORM</title>
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
        <h3 class="text-center"><strong>STANDARD FORM NO.6</strong></h3>
        <h4 class="text-center"><strong>Standard Form for Refusing Permission to inspect Document</strong></h4>
        <h4 class="text-center"><strong>[Sub-rule (9) (16)  RS (D&A) Rules, 1968]</strong></h4>
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
            <p class="text-tabbed">Shri <strong><?php echo get_emp_name($frm_fetch['emp_id'])." (".$emp_desig.")"; ?></strong>
            </p>
            <p class="sf6-text-tabbed1">(Name and Desigantion of the Railway servant.)
            </p>
            <p class="text-tabbed"><strong><?php echo get_emp_name($frm_fetch['sf6_subject']); ?></strong> has requested permission to inspect and take extracts from the records</p>
            <p class="sf6-text-tabbed2"><i>specified below</i> for the purpose of preparing his defence in the inquiry pending against him</p>
            <p class="sf6-text-tabbed2">
                in pursuant to Memorandum No <strong><?php echo get_emp_name($frm_fetch['sf6_memo_no']); ?></strong> dated <strong><?php echo get_emp_name($frm_fetch['sf6_memo_dated']); ?></strong> the </p>
                <p class="sf6-text-tabbed2"> undersigned has carefully considered the request and has decided to refuse such persmission </p>
                <p class="sf6-text-tabbed2">for the reasons recodred below against ech item:</p>
        </div>
        <div class="row">
            <div class="col-md-4 left" >
                 <h5><i>Description of records</i> </h5>
                <?php
                    $sr=0;
                    $data=json_decode($frm_fetch['sf6_desc_recds_reasons']);
                    foreach ($data as $key => $value) {
                        //var_dump($value->desc);
                        $sr++;
                          echo " <h5>".$sr.". ".$value->desc."</h5>";
                      }  
                ?>

            </div>
            <div class="col-md-8 right">
                <h5><i>Reasons for refusing inspecton or taking extracts</i> </h5>
               <?php
                    $sr=0;
                    $data=json_decode($frm_fetch['sf6_desc_recds_reasons']);
                    foreach ($data as $key => $value) {
                        //var_dump($value->desc);
                        $sr++;
                          echo " <h5>".$sr.". ".$value->reason."</h5>";
                      }  
                ?>
                <br>
                 <?php
                    if($frm_fetch['inquiry_o_pf']==null)
                    {?>
                <h5>Signature ......................................</h5>
                <h5>Name .........................................</h5>
                <h5>.......... ...................................</h5>
                <h5>(Designation of the Inqury Authority)</h5>

                    <?php
                    } else {
                    ?>
                <h5>Signature ......................................</h5>
                <h5>Name <strong><?php echo get_emp_name_from_id($frm_fetch['inquiry_o_pf']); ?></strong></h5>
                <h5><strong>(<?php echo get_emp_desig_from_id($frm_fetch['inquiry_o_pf']); ?>)</strong></h5>
                <h5>(Designation of the Inqury Authority)</h5>

                <?php } ?>
                <!-- <h5>Signature ..................................................................</h5>
                <h5>Name ..........................................................................</h5>
                <h5>(Designation of the Inqury Authority)</h5> -->
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