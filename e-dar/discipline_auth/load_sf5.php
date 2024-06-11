<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
// echo $emp_pf;
$emp_name = get_emp_name($emp_pf);
$sf5_gm_name = get_emp_name($sf5_gm_pf);
$emp_desig = get_emp_designation($emp_pf);
?>
<link rel="stylesheet" href="print_css/sf_all.css" media="print">
<link rel="stylesheet" href="print_css/common_print.css">
<style>
.sf2-text-tabbed1 {
    text-indent: 15em;
}

.sf2-text-tabbed2 {
    text-indent: 9em;
}
</style>
<div class="padding-20">
    <h3 class="text-center"><strong>STANDARD FORM NO.5</strong></h3>
    <h4 class="text-center"><strong>Standard Form of CHARGE-SHEET</strong></h4>
    <h4 class="text-center"><strong>[Rule 9 of the Railway Servants ( Disciplinary &amp; Appeal) Rules 1968]</strong>
    </h4>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4 " style="float: right;">
            <h5>No :<?php echo $reg_no; ?></h5>
            <h5>Railway :<?php echo $rail_board; ?></h5>
            <h5>Place of Issue :<?php echo $place_of_issue; ?></h5>
            <h5>Dated :<?php echo $dated; ?></h5>
        </div>
    </div>
    <div class="row">
        <h3 class="text-center"><b>MEMORANDUM</b></h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="text-tabbed">1. &pound;&pound; The Presindent/Railway Board/undersinged propose (s) to hold an
                inquiry against Shri/Smt <strong><?php echo $emp_name; ?></strong>
                Under rule 9 of the Railway servant (Disciplinary and Appeal) Rules, 1968 The sustenance of the
                imputations of misconduct or misbehavior in respect of which the inquiry is proposed to be held in set
                out
                in the enclosed statement of articles of charge (Annexure-I). A statement of the imputations of
                misconduct or misbehavior in support of each article of charge is enclosed (Annexure-II ) . A list of
                documents by which and a list of witness by whom, the articles of charge are proposed to be sustained
                are also enclosed. (Annexure-III &amp; IV ) . Further, copies of the documents mentioned in the list of
                documents, as per (Annexure-III ) are enclosed.
            </p>
            <p class="text-tabbed">
                2. &#42;Shri <strong><?php echo $emp_name; ?></strong> is hereby informed and if he so desires,he can
                inspect
                and take extracts from the documents mentioned in the enclosed list of documents (Annexure III)
                at any time during office hours within 10 days of receipt of this memorandum.
                For this purpose he should contact &#42;&#42;<strong><?php echo $sf5_contact; ?></strong> immediately on
                receipt of this memorandum.
            </p>
            <p class="text-tabbed">
                3. Shri/Smt. <strong><?php echo $emp_name; ?></strong> is further informed that he
                may if he so desires, take the assistance of another Railway servant/ an official of Railway Trade
                Union (who satisfies the requirements of rule 9 ( 13 ) of the Railway servant ( Discipline and Appeal)
                Rules 1968 and Note.1 and/or Note.2 there under as the case may be) for inspecting the documents and
                assisting him in presenting his case before the inquiry authority in the event of an oral inquiry being
                held.For this purpose, he should nominate one or more persons in order of preference. Before nominating
                the assisting Railway Servant (s) or Railway Trade Union Official (s)
                Shri/Smt <strong><?php echo $emp_name; ?></strong>
                Should obtain an undertaking from the nominee (s) that he (they) is (are) willing to assist him during
                the disciplinary proceedings. The undertaking should also contain the particulars of other cases(s) if
                any, in which the nominee (s) had already undertaken to assist and the undertaking should be furnished
                to the undersigned/General Manager <strong><?php echo $sf5_gm_name; ?></strong> &pound;
                <strong><?php echo $sf5_amt; ?></strong> Railway alongwith the nomination.
            </p>
            <p class="text-tabbed">
                4. Shri/Smt. <strong><?php echo $emp_name; ?></strong> is hereby directed to
                submit to the undersigned ( through General Manager <strong><?php echo $sf5_gm_name; ?></strong>
                Railway) &pound; a written statement of his defence ( which should reach the General Manager ) &pound;
                within 10 days of receipt of this memorandum, if he does not require to inspect any documents for the
                preparation of his defence, and within Ten days after completion of inspection of documents if he
                desires to inspect documents , and also</p>
            <p class="text-tabbed">
                (a) to state whether he wishes to be heard in person, and</p>
            <p class="text-tabbed pagebreak">(b)to furnish the names and addressed of the witnesses if any, whom he
                wishes to call in
                support of his defence.
            </p>

            <p class="text-tabbed">5. Shri/smt. <strong><?php echo $emp_name; ?></strong> is informed that an inquiry
                will be held in respect of those articles of charge as are not admitted. He should, therefore,
                specifically admit or/ deny each articles of charge.</p>
            <p class="text-tabbed">6. Shri/Smt. <strong><?php echo $emp_name; ?></strong> is further informed that if he
                does not submit his written statement of defence within the period specified in para 5 or does not
                appear in person before the inquiring authority or otherwise fails or refuses to comply with the
                provision of Rule 9 of the Railway Servants (Disciplinary Authority) rules,1968 or the orders/
                directions issued on pursuance of the said rules, the inquiring authority may hold the inquiry ex-
                parte.</p>
            <p class="text-tabbed">
                7.The attention Shri/Smt. <strong><?php echo $emp_name; ?></strong> is invited to Rule 20 of
                the Railway Service (Conduct) Rules 1966, under which no Railway servant shall bring or attempt to
                bring any political or other influence to bear upon any superior authority to further his interest in
                respect of matters pertaining to his service under the Government. If any representation is received on
                his behalf from another person in respect of any matter dealt within these proceedings, it will be
                presumed that,Shri/Smt <strong><?php echo $emp_name; ?></strong>
                Is aware of such a representation and that it has been made at is instance and action will be taken
                against him, for violation of Rule 20 of the Railway Service (Conduct) Rules, 1966.</p>
            <p class="text-tabbed">
                8. The receipt of this memorandum may be acknowledged.</p>
            </p>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pull-right">
                <h5>&copy;&copy;[By order and in the name of the President]</h5>
                <h5 style="text-indent: 9em;">(Signature)</h5>
                <h5 style="text-indent: 3em;">Name and designation of competent</h5>
                <h5 style="text-indent: 10em;">authority</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 pull-left">
                <h5>Encls:</h5>
                <h5>To</h5>
                <h5>Shri.............. (Designation)</h5>
                <h5>........................ (Place)</h5>

            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-6 pull-left">
                <h5>&copy;Copy to:</h5>
                <h5><b>Shri ......................</b> </h5>

                <h5>(Name and designation of the lending authority) for information.</h5>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>

</div>