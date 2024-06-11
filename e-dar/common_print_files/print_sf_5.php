
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
    <title>Print SF 5 FORM</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_8.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">
    <style type="text/css">
        @media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}
    </style>
</head>

<!-- <body> -->

<body>
    <div style="float: right;">
        <button class="btn btn-danger hide1" onclick="history.go(-1);">Back</button>
        <button class="btn btn-success hide1" id="print_sf">Print</button>
    </div>
    <div class="container print">
        <h3 class="text-center"><strong>STANDARD FORM NO.5</strong></h3>
        <h4 class="text-center"><strong>Standard Form of CHARGE-SHEET</strong></h4>
        <h4 class="text-center"><strong>[Rule 9 of the Railway Servants ( Disciplinary &amp; Appeal) Rules 1968]</strong></h4>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4 pull-right">
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
            <p class="text-tabbed">1. &pound;&pound; The Presindent/Railway Board/undersinged propose (s) to hold an inquiry against Shri/Smt  <strong><?php echo $emp_name; ?></strong>
            Under rule 9 of the Railway servant (Disciplinary and Appeal) Rules, 1968 The sustenance of the
            imputations of misconduct or misbehavior in respect of which the inquiry is proposed to be held in set out
            in the enclosed statement of articles of charge (Annexure-I). A statement of the imputations of
            misconduct or misbehavior in support of each article of charge is enclosed (Annexure-II ) . A list of
            documents by which and a list of witness by whom, the articles of charge are proposed to be sustained
            are also enclosed. (Annexure-III &amp; IV ) . Further, copies of the documents mentioned in the list of
            documents, as per (Annexure-III ) are enclosed.
            </p>
            <p class="text-tabbed">
                2. &#42;Shri <strong><?php echo $emp_name; ?></strong> is hereby informed and if he so desires,he can inspect 
                and take extracts from the documents mentioned in the enclosed list of documents (Annexure III)
                at any time during office hours within 10 days of receipt of this memorandum.
                For this purpose he should contact &#42;&#42; <strong><?php echo $frm_fetch['contact']; ?></strong> immediately on receipt of this memorandum.
            </p>
            <p class="text-tabbed">
            3. Shri/Smt. <strong><?php echo $emp_name; ?></strong> is further informed that he
            may if he so desires, take the assistance of another Railway servant/ an official of Railway Trade
            Union (who satisfies the requirements of rule 9 ( 13 ) of the Railway servant ( Discipline and Appeal)
            Rules 1968 and Note.1 and/or Note.2 there under as the case may be) for inspecting the documents and
            assisting him in presenting his case before the inquiry authority in the event of an oral inquiry being held.For this purpose, he should nominate one or more persons in order of preference. Before nominating the assisting Railway Servant (s) or Railway Trade Union Official (s)
            Shri/Smt <strong><?php echo $emp_name; ?></strong>
            Should obtain an undertaking from the nominee (s) that he (they) is (are) willing to assist him during the disciplinary proceedings. The undertaking should also contain the particulars of other cases(s) if any, in which the nominee (s) had already undertaken to assist and the undertaking should be furnished to the undersigned/General Manager <strong><?php echo get_emp_name($frm_fetch['GM_pf']); ?></strong> &pound; <strong><?php echo $frm_fetch['euro_currency']; ?></strong> Railway alongwith the nomination.
            </p>
            <p class="text-tabbed">
            4. Shri/Smt. <strong><?php echo $emp_name; ?></strong>is hereby directed to
            submit to the undersigned ( through General Manager <strong><?php echo get_emp_name($frm_fetch['GM_pf']); ?></strong> Railway) &pound; a written statement of his defence ( which should reach the General Manager ) &pound; within 10 days of receipt of this memorandum, if he does not require to inspect any documents for the preparation of his defence, and within Ten days after completion of inspection of documents if he desires to inspect documents , and also</p>
            <p class="text-tabbed"> 
            (a) to state whether he wishes to be heard in person, and</p>
            <p class="text-tabbed pagebreak">(b)to furnish the names and addressed of the witnesses if any, whom he wishes to call in
            support of his defence.    
            </p>

            <p class="text-tabbed">5. Shri/smt. <strong><?php echo $emp_name; ?></strong> is informed that an inquiry will be held in respect of those articles of charge as are not admitted. He should, therefore, specifically admit or/ deny each articles of charge.</p>
            <p class="text-tabbed">6. Shri/Smt. <strong><?php echo $emp_name; ?></strong> is further informed that if he does not submit his written statement of defence within the period specified in para 5 or does not appear in person before the inquiring authority or otherwise fails or refuses to comply with the provision of Rule 9 of the Railway Servants (Disciplinary Authority) rules,1968 or the orders/ directions issued on pursuance of the said rules, the inquiring authority may hold the inquiry ex- parte.</p>
            <p class="text-tabbed">
            7.The attention Shri/Smt. <strong><?php echo $emp_name; ?></strong> is invited to Rule 20 of
            the Railway Service (Conduct) Rules 1966, under which no Railway servant shall bring or attempt to
            bring any political or other influence to bear upon any superior authority to further his interest in respect of matters pertaining to his service under the Government. If any representation is received on his behalf from another person in respect of any matter dealt within these proceedings, it will be presumed that,Shri/Smt <strong><?php echo $emp_name; ?></strong>
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
                <h5>(Signature)</h5>
                <h5>Name and designation of competent</h5>
                <h5>authority</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 pull-left">
                <h5>Encls:</h5>
                <h5>To</h5>
                <h5>Shri <strong><?php echo $emp_name." (".$emp_desig.")"; ?></strong> (Designation)</h5>
                <h5><strong><?php echo fetch_emp_place($frm_fetch['emp_id']); ?></strong> (Place)</h5>
                
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
        <div class="col-md-6 pull-left">
            <h5>&copy;Copy to:</h5>
            <h5><b>Shri .................</b> </h5>
            <!-- <h5><b>(<?php //echo $emp_desig; ?>)</b> </h5> -->
            <h5>(Name and designation of the lending authority) for information.</h5>
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