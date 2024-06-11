<?php
include_once('../common_files/common_functions.php');
include_once("../dbconfig/dbcon.php");
//echo $cnt;
 $emp_name = get_emp_name($emp_pf);
$emp_desig = get_emp_designation($emp_pf); 


//print_r($sf10_add_emp);
?>
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
.text-tab{
            text-indent: 8em;
        }
</style>
<div class="padding-20">
    <h3 class="text-center"><strong>STANDARD FORM NO.11 (b)</strong></h3>
    <h4 class="text-center"><strong>Standard form of Charge-sheet for Initiation of Minor Penalty Proceedings (In cases where Disciplinary Authority</strong></h4>
    <h4 class="text-center"><strong>decides to hold the inquiry under Rule 11 (1) (b)/ 11 (2) of 
Railway Servants (Discipline and Appeal) Rules, 1968.</strong></h4>
    <br>
     <div class="row">
        <div class="col-md-4">
            <h5>No :<?php echo $reg_no; ?></h5>
            <h5>(Name of Railway Administration):<?php echo $rail_board; ?></h5>
            <h5>Place of Issue :<?php echo $place_of_issue; ?></h5>
            <h5>Dated :<?php echo $dated; ?></h5>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
    <div class="row">
        <h3 class="text-center"><b>MEMORANDUM</b></h3>
    </div>
            <div class="row">
                <p class="text-tabbed">In continuation of Memorandum No <strong><?php echo $sf11b_mem_no ?></strong> dated <strong><?php echo $sf11b_mem_dated; ?></strong> issued to Shri <strong><?php echo $emp_name ?></strong> under Rule 11 of the Railway Servants (Discipline 
and Appeal) Rules, 1968. 
                ............................................................................
            </p>
            <p class="text-tabbed">After careful consideration of the explanation given by Shri <strong><?php echo $emp_name; ?></strong> with reference to Memorandum No <strong><?php echo $sf11b_mem_no ?></strong> dated <strong><?php  echo $sf11b_mem_dated ?></strong> issued to him under Rule 11 of the Railway Servants (Discipline and Appeal) Rules, 1968. <strong><?php echo $sf11b_subject; ?></strong>the *President/Railway Board/undersigned is/are of the opinion that it is necessary to hold an inquiry against Shri  <strong><?php echo get_emp_name($sf11b_io); ?></strong> under Rule 11(1) (b)/Rule 11 (2) of the Railway Servants (Discipline and Appeal) Rules, 1968. The substance of the imputations of misconduct or misbehaviour in respect of which the inquiry is proposed to be held is set out in the enclosed statement of articles of charge (Annexure I). A statement of the imputations of misconduct or misbehaviour in support of each article of charge, is enclosed (Annexure II). A list ofdocuments by which, and a list of witnesses by 
whom the anicles of charges, are proposed to be sustained, are also enclosed (Annexure III & IV). *Further copies of documents mentioned in the list of documents, as per Annexure III are enclosed. 
            </p>
            <!-- <p class="text-tabbed">The undersigned has, therefore, dropped the proceedings already initiated under rule 9 of the said rules and has decided to initiate proceeding under Rule 11(1) of the said rule 
                on the article(s) of charges(s) already communicated to Shri.....................
                vide this office Memorandum no..........dated....................
            </p> -->
            <p class="text-tabbed">
               2. Shri <strong><?php echo $emp_name ?></strong> is here by informed that if he so desires, he can inspect and take extracts from the documents mentioned in the enclosed list ofdocuments (Annexure III) at any time during office hours within seven days of receipt of this memorandum. For this purpose he should contact** <strong><?php echo $sf11b_contact ?></strong> immediately on receipt of this Memorandum.
                
            </p>
            <p class="text-tabbed" >
               3. Shri <strong><?php echo $emp_name ?></strong>is further informed that he may, if he so desires, take the assistance of any other Railway servant/an official of Railway Trade Union (who satisfies the requirements of Rule 9 (13) of Railway Servants (Discipline and Appeal) Rules, 1968 and Note I and or Note 2 there under as the case may be), for inspecting the documents and assisting him in presenting his case before the Inquiring Authority in the event ofan oral inquiry being held. For this purpose, he should nominate one or more persons in order of preference. Before nominating the assisting Railway servant (s) or Railway Trade Union Official (s) Shri <strong><?php echo $emp_name ?></strong>
               should obtain an undertaking from the nominee (s) that he (they) is (are) willing to assist him during the disciplinary proceedings. The undertaking should also contain the particulars of other case (s), if any in which the nominee (s) had already undertaken to assist and the undertaking should be furnished to the undersigned/General Manager + .Railway alongwith the nomination. 

            </p>
        </div>
        <div class="row" style="page-break-before: always;">
            <p class="text-tabbed">
                4. Shri <strong><?php echo $emp_name; ?></strong> is hereby directed to to the undersigned (through General Manager <strong><?php echo get_emp_name($sf11b_gm_pf); ?></strong> Railway) + written statement of defence (which should reach the said General Manager) + within ten days of receipt of this Memorandum, if he does not require to inspect any documents for the preparation of his defence, and within ten days after completion of inspection of documents if he desires to inspect documents and also,
            </p>
            <p class="text-tabbed">
                (a) to state whether he wishes to be heard in person; and 
            </p>
            <p class="text-tabbed">
                (b) to furnish the names and addresses of the witnesses if any, he wishes to call in support of his defence.
            </p>
            <p class="text-tabbed">
                5. Shri <strong><?php echo $emp_name; ?></strong>  is informed that an inquiry will be held only in respect of 
                those articles of charge as are not admitted. He should, therefore, specifically admit or deny each article of charge.
            </p>
            <p class="text-tabbed">
                6. Shri <strong><?php echo $emp_name; ?></strong> is further informed that if he does not submit his statement of defence within the period specified in para 4 or does not appear in person before the inquiring authority or fails or refuses to comply with the provisions of Rules 9 and 11 of the Railway Servants (Discipline and Appeal) Rules, 1968 or the orders/directions issued in pursuance of the said rule, the inquiring authority may hold the inquiry ex parte. 
            </p>
            <p class="text-tabbed">
                7. The attention of Shri <strong><?php echo $emp_name; ?></strong> is invited to Rule 20 of the Railway Services (Conduct) Rules, 1966, under which no Railway servant shall bring or attempt to bring any political or other influence to bear upon any superior authority to further his interest in respect of matters pertaining to his service under the Government. If any representation is received on his behalf from another person in respect of any matter dealt within these proceedings, it will be presumed that Shri <strong><?php echo $emp_name; ?></strong> is aware of such a representation and that it has been made at his instance and action will be taken against him for violation of Rule 20 of the Railway Services (Conduct) Rules, 1966.
            </p>
            <p class="text-tabbed">
                8. The receipt of this Memorandum may be acknowledged.
            </p>
        </div>
       <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pull-right">
                <h5>&copy;&copy;[By order and in the name of the President]</h5>
                <h5>(Signature)</h5>
                <h5>Name and designation of competent authority</h5>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 pull-left">
                <h5>Encls:</h5>
                <h5>To</h5>
                <h5>Shri <strong><?php echo $emp_name; ?></strong> </h5>
                <h5><strong><?php echo $emp_desig; ?></strong> (Designation)</h5>
                <h5>................................. (Place)</h5>
                
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
        <div class="col-md-6 pull-left">
            <h5>&copy;Copy to:</h5>
            <h5><b>Shri <strong><?php echo get_emp_name($sf11b_io)." (".get_emp_designation($sf11b_io).")"; ?></strong></b> </h5>
            <!-- <h5><b>(<?php //echo $emp_desig; ?>)</b> </h5> -->
            <h5>(Name and designation of the lending authority) for information.</h5>
        </div>
        <div class="col-md-6"></div>
    </div>
        
        
</div>