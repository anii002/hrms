<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
// echo $emp_pf;
$emp_name = get_emp_name($emp_pf);
$emp_desig = get_emp_designation($emp_pf); ?>
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
    <h3 class="text-center"><strong>STANDARD FORM NO.3</strong></h3>
    <h4 class="text-center"><strong>[Standard Form of Certificate be furnished by Suspended Official</strong></h4>
    <h4 class="text-center"><strong>under Rule2043(2)R-II(Rule 1342(2)1987 ed.)]</strong></h4>
    <br>
     <div class="row">
            
                <p class="text-tabbed"> I, <strong><?php echo $emp_name; ?></strong></p>
                <p class="text-tabbed2"> (Name of the Railway servant)</p>
                <p class="text-tabbed3"> having been placed under suspension by Order No. <strong><?php echo $reg_no; ?></strong> </p>
                <p class="text-tabbed"> dated <strong><?php echo $dated; ?></strong>  while  holding  the  post  of  <strong><?php echo $sf3_holding_post; ?></strong> do  hereby</p>
                <p class="text-tabbed">certify  that  I  have  not  been  employed  in  any  business , profession , or  vocation  for  profile</p>
                <p class="text-tabbed">remuneration/salary.</p>
            
        </div>
    
   
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 pull-right">
            <h5>Signature ......................................</h5>
            <h5>Name of Railway Servant <strong><?php echo $emp_name; ?></strong></h5>
            <h5>Address <strong><?php echo get_emp_address($emp_pf); ?></strong></h5>
            
        </div>
    </div>
    
    
</div>