
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
    <title>Print SF 3 FORM</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_3.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div style="float: right;">
        <button class="btn btn-danger hide1" onclick="history.go(-1);">Back</button>
        <button class="btn btn-success hide1" id="print_sf">Print</button>
    </div>
    <div class="container print">
        <h3 class="text-center"><strong>STANDARD FORM NO.3</strong></h3>
        <h4 class="text-center"><strong>[Standard Form of Certificate be furnished by Suspended Official</strong></h4>
        <h4 class="text-center"><strong>under Rule2043(2)R-II(Rule 1342(2)1987 ed.)]</strong></h4><br>
        <div class="row">
            
                <p class="text-tabbed"> I, <strong><?php echo get_emp_name($frm_fetch['emp_id'])." (".get_emp_designation($frm_fetch['emp_id']).")"; ?></strong></p>
                <p class="text-tabbed2"> (Name of the Railway servant)</p>
                <p class="text-tabbed3"> having been placed under suspension by Order No. <strong><?php echo ($frm_fetch['form_no']); ?></strong></p>
                <p class="text-tabbed"> dated <strong><?php echo ($frm_fetch['form_dated']); ?></strong>  while  holding  the  post  of  <strong><?php echo ($frm_fetch['holding_post']); ?></strong> do  hereby</p>
                <p class="text-tabbed">certify  that  I  have  not  been  employed  in  any  business , profession , or  vocation  for  profile</p>
                <p class="text-tabbed">remuneration/salary.</p>
            
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pull-right">
                <h5>Signature ......................................</h5>
                <h5>Name of Railway servant <strong><?php echo $emp_name ?></strong></h5>
                <h5>Address <strong><?php echo get_emp_address($frm_fetch['emp_id']); ?></strong></h5>
                
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