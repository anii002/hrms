<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
// echo $emp_pf;
$emp_name = get_emp_name($emp_pf);
$emp_desig = get_emp_designation($emp_pf); ?>
<style>
.text-tabbed {
    text-indent: 5em;
}
</style>
<div class="padding-20">
    <h3 class="text-center"><strong>STANDARD FORM NO.6</strong></h3>
    <h4 class="text-center"><strong>Standard Form for Refusing Permission to inspect Document</strong></h4>
    <h4 class="text-center"><strong>[Sub-rule (9) (16) RS (D&A) Rules, 1968]</strong></h4>
    <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-6 pull-right">
            <h5>No :<?php echo $reg_no; ?></h5>
            <h5>Railway :<?php echo $rail_board; ?></h5>
            <h5>Place of Issue :<?php echo $place_of_issue; ?></h5>
            <h5>Dated :<?php echo $dated; ?></h5>
        </div>
    </div>
    <div class="row">
        <h3 class="text-center"><b>ORDER</b></h3>
    </div>
    <div class="row">
        <p class="text-tabbed">
            <b>Shri <?php echo $emp_name; ?> </b><b>
                (<?php echo $emp_desig; ?>)</b>
        </p>
        <p class="sf6-text-tabbed1">(Name and Desigantion of the Railway servant.)
        </p>
        <p class="text-tabbed"><b> <?php echo $sf6_subject; ?> </b> has requested permission to inspect and take
            extracts from the records</p>
        <p class="sf6-text-tabbed2"><i>specified below</i> for the purpose of preparing his defence in the inquiry
            pending against him</p>
        <p class="sf6-text-tabbed2">
            in pursuant to Memorandum No<b> <?php echo $sf6_memo_no; ?> </b>dated
            <b><?php echo $sf6_memo_dated_view; ?></b> </p>
        <p class="sf6-text-tabbed2">the undersigned has carefully considered the request and has decided to refuse such
            persmission </p>
        <p class="sf6-text-tabbed2">for the reasons recodred below against each item:</p>
    </div>
    <div class="row">
        <div class="col-md-4 left">
            <h5><i>Description of records</i> </h5>
            <?php
            // var_dump($sf6_desc_rec_array);
            $sf6_desc_rec_array_final = explode(",", $sf6_desc_rec_array);
            foreach ($sf6_desc_rec_array_final as $key => $value) {
                # code...
                $cnt = $key + 1;
                echo "<h5><b>$cnt : $value</b></h5>";
            } ?>

            <!-- <h5> 1. ....................................................</h5>
            <h5> 2. ....................................................</h5>
            <h5> 3. ....................................................</h5>
            <h5> 4. .....................................................</h5>
            <h5> 5. .....................................................</h5> -->
        </div>
        <div class="col-md-8 right">
            <h5><i>Reasons for refusing inspecton or taking extracts</i> </h5>
            <?php $sf6_reason_array;
            $sf6_reason_array_final = explode(",", $sf6_reason_array);
            foreach ($sf6_reason_array_final as $key => $value) {
                # code...
                echo "<h5><b>$value</b></h5>";
            }
            ?>
            <!-- <h5> ............................................................................</h5>
            <h5> .......................................................................</h5>
            <h5> .......................................................................</h5>
            <h5> .........................................................................</h5>
            <h5> .........................................................................</h5> -->
            <h5>Signature ..................................................................</h5>
            <h5>Name ..........................................................................</h5>
            <h5>(Designation of the Inqury Authority)</h5>
        </div>
    </div>
</div>