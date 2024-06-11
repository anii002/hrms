<?php
session_start();
require_once '../dbconfig/dbcon.php';
require_once 'control/function.php';

$pf_no = $_SESSION['username'];
$sch_id = $_GET['scheme_id'];
$emp_pf = $_GET['emp_pf'];
	
	 $emp = get_emp_info($emp_pf);
     $emp_desig = designation($emp['designation']);
     $emp_dept = department($emp['department']);
     $scheme_form = scheme($sch_id);
     // print_r($scheme_form);
     $rel = get_rel($scheme_form['relationship_with_applicant']);


    /* echo "<pre>";
     print_r($scheme_form);exit();*/
	
	if($sch_id == 4)
	{ ?>
		<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :Male Child</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
            <!-- <h3 class="" style="float: right;"><strong>CSBF</strong></h3> -->
        </div>
            <div class="row">
                <h4 class="col-md-6" style="float: left;">Scheme:&nbsp;&nbsp;&nbsp;<strong>Male Child</strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>CSBF<br>APPENDIX 'C'1</strong></h4>
                <!-- <h3 class="" style="float: right;"><strong>APPENDIX 'A'</strong></h3> -->
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right; border: solid 2px;">
                <h5><strong>OLD CASE NO: <b><?php echo $scheme_form['old_case_no']; ?></b> </strong></h5>
                <h5>(as sanctioned for earlier)</h5>
            </div>
            </div>
        <h4 class="text-center">Scholarship for Higher Tech./Professional Education of Male Child</h4>
        <h5 class="text-center"><strong>(Non Gazetted Staff in Pay Level upto 4(Old GP upto Rs.2400 @ Rs.18000/- p.a )</strong></h5>
        <h4 class="text-center"><strong>(Last Date of Submission 15/10/2018)</strong></h4>
        <div class="row">
            <div class="col-md-12" >
                <h5>Name of Employee: <b><?php echo $emp['name']; ?></b>  </h5>
            </div>
            <div class="col-md-12" >
                <h5>Designation: <b><?php echo $emp_desig; ?></b> Railway Telephone No.___________________________</h5>
            </div>
            <div class="col-md-12" >
                <h5>Place of work & Office___________________________Bill Unit No: <b><?php echo $emp['bill_unit']; ?></b> Mobile No: <b><?php echo $emp['mobile']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Staff No: <b><?php echo $emp['emp_no']; ?></b> Date of Appointment <b><?php echo $emp['doa']; ?></b>  Rly. Phone No.______________</h5>
            </div>
            <div class="col-md-12" >
                <h5>Pay Band<b><?php echo $scheme_form['pay_band']; ?></b> Basic: <b><?php echo $emp['basic_pay']; ?></b> Grade Pay /Pay Level: <b><?php echo $emp['7th_pay_level']; ?></b> MACPGrade Pay<b><?php echo $scheme_form['macp_grade_pay']; ?></b></h5>
            </div>
            <div class="col-md-12" >
                <h5>Name of the Child/Ward BOY: <b><?php echo $scheme_form['name_of_child_ward']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>CAST = UR / SC / ST / OBC: <b><?php echo $scheme_form['cast']; ?></b> 1st or 2nd Child: <b><?php echo $scheme_form['1_or_2_child']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Relationship with applicant(Daughter/Dependent brother): <b><?php echo $rel; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Name of Institute/School/College: <b><?php echo $scheme_form['name_of_institute']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Name of the Course: <b><?php echo $scheme_form['name_of_course']; ?></b> Present Year <strong>(ie 2018-19)</strong>( 1st/ 2nd/ 3rd/ 4th ): <b><?php echo $scheme_form['present_year']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Date of Admission: <b><?php echo $scheme_form['date_of_admission']; ?></b> Duration of the course: <b><?php echo $scheme_form['duration_of_course']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5> Whether in respect of any other similar benefit under SBF has been claimed: <b><?php echo $scheme_form['any_other_bene_sbf_claimed']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Particular of SBF Grant received In last year i.e. 2017-2018: <b><?php echo $scheme_form['sbf_grant_recv_last_year']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>Whether Child/Ward was Residing Railway Hostel (Compulsory)   YES / NO: <b><?php echo $scheme_form['child_resi_rly_hostel']; ?></b> </strong></h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>* I declare that my, son/daughter/ dependent brother/sister are not employed for whom the scholarship is applied. Further I declare that my child/ward is not in receipt of any other Scholarship / Concession from any other source and I had not applied for more than two children.</strong></h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>* If it is subsequently revealed that the information provided is not true or that I had not disclosed any information relating to my child/ward, I will be liable for disciplinary action and Administration reserve the right to recover the Scholarship amount already paid to me and also cancel the Scholarship awarded.</strong></h5>
            </div>
            <div class="col-md-12" >
                <h5>Date & Place :___________________________</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: left;">
                    <h5>Forwarded vide Memo No.</h5>
                </div>
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature of the Applicant</strong></h5>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>To,</h5>
                        <h5>The Secretary, Staff Benefit Fund Committee __________ (HQ/Div/W.Shop) for further process. It is certified that the particulars stated against item above have been verified and found correct.</h5>
                    </div>
                    <div class="col-md-6" style="float: right;">
                        <h5><strong>(Signature of forwarding Officer)<br>Stamp of Office</strong></h5>
                    </div>
                </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>
<?php	}

	if($sch_id == 1)
	{
	?>

	<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :FRESH</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
            <!-- <h3 class="" style="float: right;"><strong>CSBF</strong></h3> -->
        </div>
            <div class="row">
                <h4 class="col-md-6" style="float: left;">Scheme:&nbsp;&nbsp;&nbsp;<strong>FRESH</strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>CSBF<br>APPENDIX 'A'</strong></h4>
                <!-- <h3 class="" style="float: right;"><strong>APPENDIX 'A'</strong></h3> -->
            </div>
        <h4 class="text-center">SCHOLARSHIP FOR HIGHER TECHNICAL/PROFESSIONAL EDUCATION</h4>
        <h5 class="text-center"><strong>(Non Gazetted Staff in Pay Level 5 & Above(Old GP of Rs.2800 & Above @ Rs.18000/- p.a )</strong></h5>
        <h4 class="text-center"><strong>(Last Date of Submission 15/10/2018)</strong></h4>
        <div class="row">
            <div class="">
            </div>
            <div class="col-md-12">
                <h5>To,</h5>
                <h5>The Secretary,</h5>
                <h5>Staff Benefit Fund Committee,</h5>
                <h5>HQ ________ /Div.___________/ W.Shop__________</h5>
            </div>
        </div>
        <!-- <div class="row">
            <h3 class="text-center"><b>ORDER</b></h3>
        </div> -->
        <div class="row">
            <div class="col-md-12" >
                <h5>Name of Employee : <b><?php echo $emp['name']; ?></b></h5>
            </div>
            <div class="col-md-12" >
                <h5>Designation : <b><?php echo $emp_desig; ?></b>  Railway Telephone No.___________________________</h5>
            </div>
            <div class="col-md-12" >
                <h5>Place of work & Office___________________________Bill Unit No : <b><?php echo $emp['bill_unit']; ?></b> Mobile No : <b><?php echo $emp['mobile']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Staff No : (Compulsory)  <b><?php echo $emp['emp_no']; ?></b> Date  of  Appointment: <b><?php echo $emp['doa']; ?></b></h5>
            </div>
            <div class="col-md-12" >
                <h5>Pay Band:<b><?php echo $scheme_form['pay_band']; ?></b> Basic : <b><?php echo $emp['basic_pay']; ?></b> Grade Pay /Pay Level: <b><?php echo $emp['7th_pay_level']; ?></b> MACPGrade Pay:<b><?php echo $scheme_form['macp_grade_pay']; ?></b></h5>
            </div>
            <div class="col-md-12" >
                <h5>Name of the Child/Ward : <b><?php echo $scheme_form['name_of_child_ward']; ?></b>  BOY / GIRL: <b><?php echo $scheme_form['boy_girl']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>CAST = UR / SC / ST / OBC : <b><?php echo $scheme_form['cast']; ?></b> 1st or 2nd Child: <b><?php echo $scheme_form['1_or_2_child']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Relationship with applicant(Son/Daughter/Dependent brother/ Sister): <b><?php echo $rel; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Name of Institute/School/College: <b><?php echo $scheme_form['name_of_institute']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5> Name of the Course : <b><?php echo $scheme_form['name_of_course']; ?></b> Present Year (ie 2018-19)( 1st/ 2nd/ 3rd/ 4th ): <b><?php echo $scheme_form['present_year']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Date of Admission: <b><?php echo $scheme_form['date_of_admission']; ?></b> Duration of the course : <b><?php echo $scheme_form['duration_of_course']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Whether Child/Ward was Residing Railway Hostel (Compulsory)   YES / NO: <b><?php echo $scheme_form['child_resi_rly_hostel']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>State the last Board Exam. Attended  HSC /SSC : <b><?php echo $scheme_form['last_board_exam_attended']; ?></b>  Year : <b><?php echo $scheme_form['last_exam_attended_year']; ?></b> % : <b><?php echo $scheme_form['last_exam_attended_pers']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>* I declare that my, son/daughter/ dependent brother/sister are not employed for whom the scholarship is applied. Further I declare that my child/ward is not in receipt of any other Scholarship / Concession from any other source and I had not applied for more than two children.</strong></h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>* If it is subsequently revealed that the information provided is not true or that I had not disclosed any information relating to my child/ward, I will be liable for disciplinary action and Administration reserve the right to recover the Scholarship amount already paid to me and also cancel the Scholarship awarded.</strong></h5>
            </div>
            <div class="col-md-12" >
                <h5>Date & Place :___________________________</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: left;">
                    <h5>Forwarded vide Memo No.</h5>
                </div>
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature of the Applicant</strong></h5>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>To,</h5>
                        <h5>The Secretary, Staff Benefit Fund Committee __________ (HQ/Div/W.Shop) for further process. It is certified that the particulars stated against item above have been verified and found correct.</h5>
                    </div>
                    <div class="col-md-6" style="float: right;">
                        <h5><strong>(Signature of forwarding Officer)<br>Stamp of Office</strong></h5>
                    </div>
                </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>

<?php }
	if($sch_id == 2)
	{ ?>


		<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :CONTINUATION</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
            <!-- <h3 class="" style="float: right;"><strong>CSBF</strong></h3> -->
        </div>
            <div class="row">
                <h4 class="col-md-6" style="float: left;">Scheme:&nbsp;&nbsp;&nbsp;<strong>CONTINUATION</strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>CSBF<br>APPENDIX 'B'</strong></h4>
                <!-- <h3 class="" style="float: right;"><strong>APPENDIX 'A'</strong></h3> -->
            </div>
        <h4 class="text-center">CONTINUATION SCHOLARSHIP / FINANCIAL ASSISTANCE TECHNICAL EDUCATION</h4>
        <h5 class="text-center"><strong>(Non Gazetted Staff in Pay Level 5 & Above(Old GP of Rs.2800 & Above @ Rs.18000/- p.a )</strong></h5>
        <h4 class="text-center"><strong>(Last Date of Submission 15/10/2018)</strong></h4>
        <div class="row">
            <!-- <div class="">
            </div> -->
            <div class="col-md-6" style="float: left;">
                <h5>To,</h5>
                <h5>The Secretary,</h5>
                <h5>Staff Benefit Fund Committee,</h5>
                <h5>HQ ________ /Div.___________/ W.Shop__________</h5>
            </div>
            <div class="col-md-6" style="float: right; border: solid 2px;">
                <h5><strong>OLD CASE NO <b><?php echo $scheme_form['old_case_no']; ?></b> </strong></h5>
                <h5>(as sanctioned for Scholarship / Financial Assistance earlier)</h5>
            </div>
        </div>
        <!-- <div class="row">
            <h3 class="text-center"><b>ORDER</b></h3>
        </div> -->
        <div class="row">
            <div class="col-md-12" >
                <h5><strong>Name of Employee: <b><?php echo $emp['name']; ?></b> </strong></h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>Designation :</strong> <?php echo $emp_desig; ?> Railway Telephone No.___________________________</h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>Place of work & Office</strong> ___________________________Bill Unit No: <b><?php echo $emp['bill_unit']; ?></b> Mobile No: <b><?php echo $emp['mobile']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Staff No: <strong>(Compulsory)</strong>  <?php echo $emp['emp_no']; ?> Date  of  Appointment: <b><?php echo $emp['doa']; ?></b></h5>
            </div>
            <div class="col-md-12" >
                <h5>Pay Band:<b><?php echo $scheme_form['pay_band']; ?></b>Basic: <b><?php echo $emp['basic_pay']; ?></b> Grade Pay /Pay Level: <b><?php echo $emp['7th_pay_level']; ?></b> MACPGrade Pay:<b><?php echo $scheme_form['macp_grade_pay']; ?></b></h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>Name of the Child/Ward:</strong> <b><?php echo $scheme_form['name_of_child_ward']; ?></b> BOY / GIRL: <b><?php echo $scheme_form['boy_girl']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>CAST:</strong> = UR / SC / ST / OBC <b><?php echo $scheme_form['cast']; ?></b> 1st or 2nd Child <b><?php echo $scheme_form['1_or_2_child']; ?></b> </h5> 
            </div>
            <div class="col-md-12" >
                <h5><strong>Relationship with applicant(Son/Daughter/Dependent brother/ Sister): <b><?php echo $rel; ?></b> </strong></h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>Name of Institute/School/College: <b><?php echo $scheme_form['name_of_institute']; ?></b></strong></h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>Name of the Course:</strong><b><?php echo $scheme_form['name_of_course']; ?></b> Present Year <strong>(ie 2018-19)</strong>( 1st/ 2nd/ 3rd/ 4th ): <b><?php echo $scheme_form['present_year']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Date of Admission: <b><?php echo $scheme_form['date_of_admission']; ?></b> <strong>Duration of the course:</strong> <b><?php echo $scheme_form['duration_of_course']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Course for which the Scholarship/FA was Sanctioned: <b><?php echo $scheme_form['course_for_which_schol_fa_sanct']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>State the stage at which Child/Ward failed or ATKT allowed: <b><?php echo $scheme_form['state_stage_child_failed_atkt']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Amount Received from SBF(If so,year of receipt): <b><?php echo $scheme_form['amt_recv_frm_sbf']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Period for which the payment received: <b><?php echo $scheme_form['period_for_payment_recv']; ?></b> Period for which the payment due: <b><?php echo $scheme_form['period_for_payment_due']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>Whether Child/Ward was Residing Railway Hostel (Compulsory)   YES / NO: <b><?php echo $scheme_form['child_resi_rly_hostel']; ?></b> </strong></h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>* I declare that my, son/daughter/ dependent brother/sister are not employed for whom the scholarship is applied. Further I declare that my child/ward is not in receipt of any other Scholarship / Concession from any other source and I had not applied for more than two children.</strong></h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>* If it is subsequently revealed that the information provided is not true or that I had not disclosed any information relating to my child/ward, I will be liable for disciplinary action and Administration reserve the right to recover the Scholarship amount already paid to me and also cancel the Scholarship awarded.</strong></h5>
            </div>
            <div class="col-md-12" >
                <h5>Date & Place :___________________________</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: left;">
                    <h5>Forwarded vide Memo No.</h5>
                </div>
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature of the Applicant</strong></h5>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>To,</h5>
                        <h5>The Secretary, Staff Benefit Fund Committee __________ (HQ/Div/W.Shop) for further process. It is certified that the particulars stated against item above have been verified and found correct.</h5>
                    </div>
                    <div class="col-md-6" style="float: right;">
                        <h5><strong>(Signature of forwarding Officer)<br>Stamp of Office</strong></h5>
                    </div>
                </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>

<?php }
	if($sch_id == 3)
	{
	?>
	
	<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :Girl Child</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
            <!-- <h3 class="" style="float: right;"><strong>CSBF</strong></h3> -->
        </div>
            <div class="row">
                <h4 class="col-md-6" style="float: left;">Scheme:&nbsp;&nbsp;&nbsp;<strong>Girl Child</strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>CSBF<br>APPENDIX 'C'</strong></h4>
                <!-- <h3 class="" style="float: right;"><strong>APPENDIX 'A'</strong></h3> -->
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right; border: solid 2px;">
                <h5><strong>OLD CASE NO: <b><?php echo $scheme_form['old_case_no']; ?></b> </strong></h5>
                <h5>(as sanctioned for earlier)</h5>
            </div>
            </div>
        <h4 class="text-center">Scholarship for Higher Tech./Professional Education of GIRL Child</h4>
        <h5 class="text-center"><strong>(Non Gazetted Staff in Pay Level upto 4(Old GP upto Rs.2400 @ Rs.18000/- p.a )</strong></h5>
        <h4 class="text-center"><strong>(Last Date of Submission 15/10/2018)</strong></h4>
        <div class="row">
            <div class="col-md-12" >
                <h5>Name of Employee: <b><?php echo $emp['name']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Designation : <b><?php echo $emp_desig; ?></b> Railway Telephone No.___________________________</h5>
            </div>
            <div class="col-md-12" >
                <h5>Place of work & Office___________________________Bill Unit No: <b><?php echo $emp['bill_unit']; ?></b> Mobile No: <b><?php echo $emp['mobile']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Staff No: <b><?php echo $emp['emp_no']; ?></b> Date of Appointment: <b><?php echo $emp['doa']; ?></b>  Rly. Phone No.______________</h5>
            </div>
            <div class="col-md-12" >
                <h5>Pay Band:<b><?php echo $scheme_form['pay_band']; ?></b> Basic: <b><?php echo $emp['basic_pay']; ?></b> Grade Pay /Pay Level: <b><?php echo $emp['7th_pay_level']; ?></b> MACPGrade Pay:<b><?php echo $scheme_form['macp_grade_pay']; ?></b></h5>
            </div>
            <div class="col-md-12" >
                <h5>Name of the Child:  <b><?php echo $scheme_form['name_of_child_ward']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>CAST = UR / SC / ST / OBC: <b><?php echo $scheme_form['cast']; ?></b> 1st or 2nd Child: <b><?php echo $scheme_form['1_or_2_child']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Relationship with applicant(Daughter/Dependent Sister): <b><?php echo $rel; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Name of Institute/School/College: <b><?php echo $scheme_form['name_of_institute']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Name of the Course: <b><?php echo $scheme_form['name_of_course']; ?></b> Present Year <strong>(ie 2018-19)</strong>( 1st/ 2nd/ 3rd/ 4th ): <b><?php echo $scheme_form['present_year']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Date of Admission: <b><?php echo $scheme_form['date_of_admission']; ?></b> Duration of the course: <b><?php echo $scheme_form['duration_of_course']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5> Whether in respect of any other similar benefit under SBF has been claimed: <b><?php echo $scheme_form['any_other_bene_sbf_claimed']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Particular of SBF Grant received In last year i.e. 2017-2018: <b><?php echo $scheme_form['sbf_grant_recv_last_year']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>Whether Child/Ward was Residing Railway Hostel (Compulsory)   YES / NO: <b><?php echo $scheme_form['child_resi_rly_hostel']; ?></b> </strong></h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>* I declare that my, son/daughter/ dependent brother/sister are not employed for whom the scholarship is applied. Further I declare that my child/ward is not in receipt of any other Scholarship / Concession from any other source and I had not applied for more than two children.</strong></h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>* If it is subsequently revealed that the information provided is not true or that I had not disclosed any information relating to my child/ward, I will be liable for disciplinary action and Administration reserve the right to recover the Scholarship amount already paid to me and also cancel the Scholarship awarded.</strong></h5>
            </div>
            <div class="col-md-12" >
                <h5>Date & Place :___________________________</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: left;">
                    <h5>Forwarded vide Memo No.</h5>
                </div>
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature of the Applicant</strong></h5>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>To,</h5>
                        <h5>The Secretary, Staff Benefit Fund Committee __________ (HQ/Div/W.Shop) for further process. It is certified that the particulars stated against item above have been verified and found correct.</h5>
                    </div>
                    <div class="col-md-6" style="float: right;">
                        <h5><strong>(Signature of forwarding Officer)<br>Stamp of Office</strong></h5>
                    </div>
                </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>

	<?php
	}

	if($sch_id == 5)
	{
	?>

	<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :Spectacles</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
            <!-- <h3 class="" style="float: right;"><strong>CSBF</strong></h3> -->
        </div>
            <div class="row">
                <h4 class="col-md-6" style="float: left;">Scheme:&nbsp;&nbsp;&nbsp;<strong>Spectacles</strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>CSBF<br>APPENDIX 'E'</strong></h4>
            </div>
        <h4 class="text-center">{Staff Pay Level upto 7 (Old GP Rs. 4600 including MACP) @ Rs. 2,500}</h4>
        <div class="row">
            <div class="col-md-6" style="float: left;">
                <h5>To,</h5>
                <h5>The Secretary,</h5>
                <h5>Staff Benefit Fund Committee,</h5>
                <h5>HQ ________ /Div.___________/ W.Shop__________</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>I hereby apply for the re-imbursement of the cost of spectacles purchased by me. I have not claimed any reimbursement of the cost of spectacles from the Staff Benefit Fund during the last 3 (Three) years.</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" >
                <h5>Name of Employee: <b><?php echo $emp['name']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Designation : <b><?php echo $emp_desig; ?></b> Railway Telephone No.___________________________</h5>
            </div>
            <div class="col-md-12" >
                <h5>Place of work & Office___________________________Bill Unit No:  <b><?php echo $emp['bill_unit']; ?></b> Mobile No: <b><?php echo $emp['mobile']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>Staff No(P.F No.):</strong> <b><?php echo $emp['emp_no'];; ?></b>  Date of Appointment:  <b><?php echo $emp['doa']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Pay Band:<b><?php echo $scheme_form['pay_band']; ?></b> Basic: <b><?php echo $emp['basic_pay']; ?></b> <strong>Grade Pay /Pay Level:</strong> <b><?php echo $emp['7th_pay_level']; ?></b> <strong>MACPGrade Pay</strong>:<b><?php echo $scheme_form['macp_grade_pay']; ?></b></h5>
            </div>
            <div class="col-md-12" >
                <h5>Fresh Application Yes / No: <b><?php echo $scheme_form['fresh_appln']; ?></b> Last applied in year: <b><?php echo $scheme_form['last_appli_year']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>(Enclosed) Money Receipt No: <b><?php echo $scheme_form['enc_money_rec_no']; ?></b> Date: <b><?php echo $scheme_form['date']; ?></b> Rs: <b><?php echo $scheme_form['rs']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5> I declare that the statements made by me are true and if found incorrect, I will liable to be taken up under DAR.</h5>
            </div>
            <div class="col-md-12" >
                <h5>Date & Place :___________________________</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature of the Applicant</strong></h5>
                </div>
            </div>
            <div class="col-md-12" >
                <h5> As per the Service Register maintained, the applicant has received his / her last payment for reimbursement for  the cost of Spectacles on <strong>(date)</strong> ___________________ which has already crossed the period of    03 (Three)  years. Necessary entry to the effect will be made in the Service Register after receipt of the Grant.</h5>
            </div>
            <div class="col-md-12" >
                <h5>Date :___________________________</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature and Stamp of Bills Officer</strong></h5>
                </div>
            </div>
            <div class="col-md-12" >
                <h5>Forwarded and certified that spectacles are necessary for the above employee.</h5>
            </div><br>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Astt. District Medical Officer/DMO</strong></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: left;">
                    <h5>Forwarded vide Memo No.</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>To,</h5>
                    <h5>The Secretary, Staff Benefit Fund Committee __________ (HQ/Div/W.Shop) for further process. It is certified that the particulars stated against item above have been verified and found correct.</h5>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>(Signature of forwarding Officer)<br>Stamp of Office</strong></h5>
                </div>
            </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>

	<?php
	}	

	if($sch_id == 6)
	{
	?>	
		<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :Dentures</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
            <!-- <h3 class="" style="float: right;"><strong>CSBF</strong></h3> -->
        </div>
            <div class="row">
                <h4 class="col-md-6" style="float: left;">Scheme:&nbsp;&nbsp;&nbsp;<strong>Dentures</strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>CSBF<br>APPENDIX 'F'</strong></h4>
            </div>
        <h4 class="text-center"><strong>{Staff Pay Level upto 7 (Old GP Rs. 4600 including MACP) }</strong></h4>
        <h5 class="text-center">( Half set i.e. 2 teeth & above of either side Rs. 7500/- Full set Rs.15,000/-)</h5>
        <h5 class="text-center">(Granted once in entire Service)</h5>
        <div class="row">
            <div class="col-md-6" style="float: left;">
                <h5>To,</h5>
                <h5>The Secretary,</h5>
                <h5>Staff Benefit Fund Committee,</h5>
                <h5>HQ ________ /Div.___________/ W.Shop__________</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>I hereby apply for the re-imbursement of the cost of dentures purchased by me. I have not claimed any reimbursement of the cost of dentures from the Staff Benefit Fund during my service as on date.</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" >
                <h5>Name of Employee: <b><?php echo $emp['name']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Designation : <b><?php echo $emp_desig; ?></b> Railway Telephone No.___________________________</h5>
            </div>
            <div class="col-md-12" >
                <h5>Place of work & Office___________________________Bill Unit No: <b><?php echo $emp['bill_unit']; ?></b> Mobile No: <b><?php echo $emp['mobile']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>Staff No(P.F No.):</strong> <b><?php echo $emp['emp_no']; ?></b> Date of Appointment: <b><?php echo $emp['doa']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Pay Band:<b><?php echo $scheme_form['pay_band']; ?></b>Basic: <b><?php echo $emp['basic_pay']; ?></b>  <strong>Grade Pay /Pay Level:</strong> <b><?php echo $emp['7th_pay_level']; ?></b> <strong>MACPGrade Pay</strong>:<b><?php echo $scheme_form['macp_grade_pay']; ?></b></h5>
            </div>
            <div class="col-md-12" >
                <h5>(Enclosed) Money Receipt No: <b><?php echo $scheme_form['enc_money_rec_no']; ?></b> Date:  <b><?php echo $scheme_form['date']; ?></b> Rs: <b><?php echo $scheme_form['rs']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5> I declare that the statements made by me are true and if found incorrect, I will liable to be taken up under DAR.</h5>
            </div>
            <div class="col-md-12" >
                <h5>Date & Place :___________________________</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature of the Applicant</strong></h5>
                </div>
            </div>
            <div class="col-md-12" >
                <h5> As per the Service Register maintained, the applicant has never applied for reimbursing the cost of dentures as on date. Necessary entry to the effect will be made in the Service Register after receipt of the Grant.</h5>
            </div>
            <div class="col-md-12" >
                <h5>Date :___________________________</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature and Stamp of Bills Officer</strong></h5>
                </div>
            </div>
            <div class="col-md-12" >
                <h5>Forwarded and certified that  <strong>Half /Full set </strong>of Dentures are necessary for the above employee.</h5>
            </div><br>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Astt. District Medical Officer/DMO</strong></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: left;">
                    <h5>Forwarded vide Memo No.</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>To,</h5>
                    <h5>The Secretary, Staff Benefit Fund Committee __________ (HQ/Div/W.Shop) for further process. It is certified that the particulars stated against item above have been verified and found correct.</h5>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>(Signature of forwarding Officer)<br>Stamp of Office</strong></h5>
                </div>
            </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>
<?php }

	if($sch_id == 7)
	{
	?>

	<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :Maintenance</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
            <!-- <h3 class="" style="float: right;"><strong>CSBF</strong></h3> -->
        </div>
            <div class="row">
                <h4 class="col-md-6" style="float: left;">Scheme:&nbsp;&nbsp;&nbsp;<strong>Maintenance</strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>CSBF<br>APPENDIX 'G'</strong></h4>
            </div>
        <h4 class="text-center"><strong>{Staff Pay Level upto 7 (Old GP Rs. 4600 including MACP) }
            & attach unemployment certificate in case of medically de-categorised staff)
        </strong></h4>
        <h5 class="text-center"><strong>@ Rs. 15,000/- p.m. </strong>to Railway employees suffering from Cancer, HIV, Thalesamia, Sickle Cell, Paralysis and Kidney failure as well as for amputation of Upper and Lower Limbs leading more than 40% PPD. 
        </h5>
        <h5 class="text-center"><strong>(Grant will not be considered if employee getting compensation under WCA ).</strong></h5>
        <h5 class="text-center"><strong>@ Rs. 10,000/- p.m.</strong> to Railway employees suffering from diseases other than those mentioned above.</h5>
        <div class="row">
            <div class="col-md-6" style="float: left;">
                <h5><strong>To,</strong></h5>
                <h5><strong>The Secretary,</strong></h5>
                <h5><strong>Staff Benefit Fund Committee,</strong></h5>
                <h5><strong>HQ ________ /Div.___________/ W.Shop__________</strong></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>I have been placed on sick from ______________________ and without pay from ____________________
                    Please therefore sanction Maintenance grant in my favour.</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" >
                <h5>Name of Employee: <b><?php echo $emp['name']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Designation : <b><?php echo $emp_desig; ?></b> Railway Telephone No.___________________________</h5>
            </div>
            <div class="col-md-12" >
                <h5>Place of work & Office___________________________Bill Unit No: <b><?php echo $emp['bill_unit']; ?></b> Mobile No: <b><?php echo $emp['mobile']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Staff No: <b><?php echo $emp['emp_no']; ?></b> Date of Appointment: <b><?php echo $emp['doa']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Pay Band:<b><?php echo $scheme_form['pay_band']; ?></b> Basic: <b><?php echo $emp['basic_pay']; ?></b>  <strong>Grade Pay /Pay Level:</strong> <b><?php echo $emp['7th_pay_level']; ?></b>  <strong>MACPGrade Pay</strong>:<b><?php echo $scheme_form['macp_grade_pay']; ?></b></h5>
            </div>
            <div class="col-md-12" >
                <h5>I declare that the statements made by me are true and if found incorrect, I will liable to be taken up under DAR.</h5>
            </div>
            <div class="col-md-12" >
                <h5>Date & Place :___________________________</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature of the Applicant</strong></h5>
                </div>
            </div>
            <div class="col-md-12" >
                <h5> Leave due to sickness treated as under Nature of Leave: <b><?php echo $scheme_form['nature_of_leave']; ?></b>  From:  <b><?php echo $scheme_form['leave_due_sick_from']; ?></b>  To: <b><?php echo $scheme_form['leave_due_sick_to']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5> With Pay : <b><?php echo $scheme_form['with_pay']; ?></b>  </h5>
            </div>
            <div class="col-md-12" >
                <h5> Half Pay : <b><?php echo $scheme_form['half_pay']; ?></b>  </h5>
            </div>
            <div class="col-md-12" >
                <h5> Without Pay : <b><?php echo $scheme_form['without_pay']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5> M8&9B, Certificate No: <?php echo $scheme_form['m89b_certi_no']; ?>  Dated: <?php echo $scheme_form['dated']; ?>  Period: <?php echo $scheme_form['period']; ?> </h5>
            </div>
            <div class="col-md-12" >
                <h5> Forwarded and it is certified that the particulars of leave account given above are correct. He/She has already been paid maintenance grant for the period from ____________ to ___________ vide sanction letter No.__________________ dated __________________.</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature of Departmental Bills Officer</strong></h5>
                </div>
            </div>
            <div class="col-md-12" >
                <h5>Recommended & certify that the party is on the sick list from _____________________.
                    Nature of illness:<br>
                    (1) Cancer, HIV, Thalesamia, Sickle Cell, Paralysis, Kidney failure.<br>
                    (2) Patients suffering from TB admitted in BEL-Air Sanatorium at Panchgani<br>
                    (3) Paralysis/Leprosy/Insanity/Brain Tumour.<br>
                    (4) For amputation of Upper and Lower Limbs<br>
                    (5) Other diseases than above.</h5> 
                </h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Astt. District Medical Officer/DMO</strong></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>Sanctioned for Rs.___________________ P.M. for the period from _____________  to  ______________.</h5>
                    <h5>Forwarded vide Memo No.</h5>
                    <h5>The Secretary, Staff Benefit Fund Committee _________ (HQ/Div/W/Shop) for further process.  It is certified
                    that the particulars stated above have been verified and found correct.</h5>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>(Signature of forwarding Officer)<br>Stamp of Office</strong></h5>
                </div>
            </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>

<?php	}

	if($sch_id == 8)
	{ ?>

		<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :Prosthetics (Artificial Limb)</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
            <!-- <h3 class="" style="float: right;"><strong>CSBF</strong></h3> -->
        </div>
            <div class="row">
                <h4 class="col-md-6" style="float: left;">Scheme:&nbsp;&nbsp;&nbsp;<strong>Prosthetics (Artificial Limb)</strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>CSBF<br>APPENDIX 'H'</strong></h4>
            </div>
        <h4 class="text-center"><strong>{Staff Pay Level upto 7 (Old GP Rs. 4600 including MACP) @ Rs. 30,000}</strong></h4>
        <div class="row">
            <div class="col-md-6" style="float: left;">
                <h5>To,</h5>
                <h5>The Secretary,</h5>
                <h5>Staff Benefit Fund Committee,</h5>
                <h5>HQ ________ /Div.___________/ W.Shop__________</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>I hereby apply for the re-imbursement of  the cost  of Prosthetics purchased by me.  I have not  claimed any
                Re -imbursement of the cost of Prosthetics purchased from the Staff Benefit Fund during my service as on date.</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" >
                <h5>Name of Employee: <b><?php echo $emp['name']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Designation : <b><?php echo $emp_desig; ?></b> Railway Telephone No.___________________________</h5>
            </div>
            <div class="col-md-12" >
                <h5>Place of work & Office___________________________Bill Unit No : <b><?php echo $emp['bill_unit']; ?></b> Mobile No : <b><?php echo $emp['mobile']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Staff No : <b><?php echo $emp['emp_no']; ?></b>  Date of Appointment : <b><?php echo $emp['doa']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Pay Band:<b><?php echo $scheme_form['pay_band']; ?></b> Basic : <b><?php echo $emp['basic_pay']; ?></b> <strong>Grade Pay /Pay Level : </strong> <b><?php echo $emp['7th_pay_level']; ?></b>  <strong>MACPGrade Pay</strong>:<b><?php echo $scheme_form['macp_grade_pay']; ?></b></h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>(Enclosed)</strong> Money Receipt No : <b><?php echo $scheme_form['enc_money_rec_no']; ?></b> Date : <b><?php echo $scheme_form['date']; ?></b>  Rs : <b><?php echo $scheme_form['rs']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5> I declare that the statements made by me are true and if found incorrect, I will liable to be taken up under DAR.</h5>
            </div>
            <div class="col-md-12" >
                <h5>Date & Place :___________________________</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature of the Applicant</strong></h5>
                </div>
            </div>
            <div class="col-md-12" >
                <h5>As per the Service Register maintained, the applicant has never applied for reimbursing the cost of
                Prosthetics as on date.  Necessary entry to the effect will be made in the Service Register after receipt of 
                the Grant.</h5>
            </div>
            <div class="col-md-12" >
                <h5>Date :___________________________</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature and Stamp of Bills Officer</strong></h5>
                </div>
            </div>
            <div class="col-md-12" >
                <h5>Forwarded and certified that set of Prosthetics are necessary for the above employee.</h5>
            </div><br>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Astt. District Medical Officer/DMO</strong></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: left;">
                    <h5>Forwarded vide Memo No.</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>To,</h5>
                    <h5>The Secretary, Staff Benefit Fund Committee __________ (HQ/Div/W.Shop) for further process. It is certified that the particulars stated against item above have been verified and found correct.</h5>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5><strong>(Signature of forwarding Officer)<br>Stamp of Office</strong></h5>
                </div>
            </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>

<?php }

	if($sch_id == 10)
	{
	?>

	<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :Financial Aid to families of Deceased Railway Employee</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
            <!-- <h3 class="" style="float: right;"><strong>CSBF</strong></h3> -->
        </div>
            <div class="row">
                <h4 class="col-md-6" style="float: left;">Scheme:&nbsp;&nbsp;&nbsp;<strong>Financial Aid to families of Deceased Railway Employee</strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>APPENDIX 'I'</strong></h4>
            </div>
        <h4 class="text-center">{Staff Pay Level up to 7 (Old GP Rs. 4600 including MACP)}</h4>
        <h5 class="text-center"><strong>@ Rs.18,000/- p.a each for two Children)</strong></h5>
        <h4 class="text-center"><strong>@ Rs. 18000 /- </strong>per child per annum to maximum two children in a family studying in Std. I to XII or till the child attains 18 years whichever is earlier or till any member in the family gets appointment on Compassionate grounds (excluded cases which are disputed).</h4>
        <div class="row">
            <div class="col-md-6" style="float: left;">
                <h5><strong>To,</strong></h5>
                <h5><strong>The Secretary,</strong></h5>
                <h5><strong>Staff Benefit Fund Committee,</strong></h5>
                <h5><strong>HQ ________ /Div.___________/ W.Shop__________</strong></h5>
            </div>
        </div>
        <div class="row col-md-12">
            <h5>I hereby apply for the Educational Assistance to the ward of deceased employee. I state hereunder that neither I nor any of my child/ward has not been appointed on compassionate ground</h5>
            <h5>The statements made by me below are true and the amount received in this respect will be refunded, if the statements are found incorrect.</h5>
        </div>
        <div class="row">
            <div class="right1" style="float: right;">
                <h5>Yours faithfully,</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="float: left;">
                <h5>Station:_____________</h5>
                <h5>Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/2019</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" >
                <h5>Name of Deceased Employee: <b><?php echo $emp['name']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Designation : <b><?php echo $emp_desig; ?></b> Railway Telephone No.___________________________</h5>
            </div>
            <div class="col-md-12" >
                <h5>Place of work & Office___________________________Bill Unit No : <b><?php echo $emp['bill_unit']; ?></b> Mobile No : <b><?php echo $emp['mobile']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Staff No : <b><?php echo $emp['emp_no']; ?></b> Date  of  Appointment : <b><?php echo $emp['doa']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Pay Band:<b><?php echo $scheme_form['pay_band']; ?></b> Basic : <b><?php echo $emp['basic_pay']; ?></b>  <strong>Grade Pay /Pay Level : <b><?php echo $emp['7th_pay_level']; ?></b>  MACPGrade Pay:<b><?php echo $scheme_form['macp_grade_pay']; ?></b></strong></h5>
            </div>
            <div class="col-md-12" >
                <h5>Residential Address : <b><?php echo $scheme_form['resident_addr']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Date of Death : <b><?php echo $scheme_form['date_of_death']; ?></b> <strong>(Attach Copy of Death Certificate)</strong></h5>
            </div>
            <div class="col-md-12" >
                <h5>Name of Child : <b><?php echo $scheme_form['name_of_child_ward']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Name of School : <b><?php echo $scheme_form['name_of_institute']; ?></b> (Attach Bonafide Certificate)</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: left;">
                    <h5>Forwarded vide Memo No.</h5>
                </div>
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature of the Applicant</strong></h5>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>To,</h5>
                        <h5>The Secretary, Staff Benefit Fund Committee __________ (HQ/Div/W.Shop) for further process. It is certified that the particulars stated against item above have been verified and found correct.</h5>
                    </div>
                    <div class="col-md-6" style="float: right;">
                        <h5><strong>(Signature of forwarding Officer)<br>Stamp of Office</strong></h5>
                    </div>
                </div>
                <div class="col-md-12" >
                <h5><strong>Note : </strong>Concerned S&WI will certify that the widow / ward is not appointed on Comp. Ground yet and she /he is fulfilling all the terms / conditions above. He will also assist widow to fill-up the form & guide her. The first grant under this head should commence from the next academic year from the death of the deceased because for the current academic year Children Education allowance is admissible to the child till the academic year.</h5>
            </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>
	
<?php }

	if($sch_id == 11)
	{ ?>

		<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :Cash Award to Non – Gazetted Staff’s Girl Child</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
            <!-- <h3 class="" style="float: right;"><strong>CSBF</strong></h3> -->
        </div>
            <div class="row">
                <h4 class="col-md-6" style="float: left;">Scheme:&nbsp;&nbsp;&nbsp;<strong>Cash Award to Non – Gazetted Staff’s Girl Child</strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>CSBF<br>APPENDIX 'J'</strong></h4>
                <!-- <h3 class="" style="float: right;"><strong>APPENDIX 'A'</strong></h3> -->
            </div>
        <h4 class="text-center">Cash Award to Non – Gazetted Staff’s Girl Child</h4>
        <h5 class="text-center">SCHOLARSHIP FOR HIGHER TECHNICAL/PROFESSIONAL EDUCATION For Non – Gazetted  employees whose girl child is physically / mentally challenged and studying higher education in any streams of Technical / Professional Education @ Rs. 25,000/- p.a.</h5>
        <h4 class="text-center"><strong>(Last Date of Submission 15/10/2018)</strong></h4>
        <div class="row">
            <!-- <div class="">
            </div> -->
            <div class="col-md-6" style="float: left;">
                <h5>To,</h5>
                <h5>The Secretary,</h5>
                <h5>Staff Benefit Fund Committee,</h5>
                <h5>HQ ________ /Div.___________/ W.Shop__________</h5>
            </div>
        </div>
        <!-- <div class="row">
            <h3 class="text-center"><b>ORDER</b></h3>
        </div> -->
        <div class="row">
            <div class="col-md-12" >
                <h5>Name of Employee : <b><?php echo $emp['name']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Designation : <b><?php echo $emp_desig; ?></b> Railway Telephone No.___________________________</h5>
            </div>
            <div class="col-md-12" >
                <h5>Place of work & Office ___________________________Bill Unit No : <b><?php echo $emp['bill_unit']; ?></b> Mobile No : <b><?php echo $emp['mobile']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Staff No : <b><?php echo $emp['emp_no']; ?></b> Date  of  Appointment :  <b><?php echo $emp['doa']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Pay Band:<b><?php echo $scheme_form['pay_band']; ?></b> Basic : <b><?php echo $emp['basic_pay']; ?></b>  <strong>Grade Pay /Pay Level : </strong> <b><?php echo $emp['7th_pay_level']; ?></b>  <strong>MACPGrade Pay</strong>:<b><?php echo $scheme_form['macp_grade_pay']; ?></b></h5>
            </div>
            <div class="col-md-12" >
                <h5><strong>Name of the Child/Ward : </strong> <b><?php echo $scheme_form['name_of_child_ward']; ?></b> BOY / GIRL : <b><?php echo $scheme_form['boy_girl']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>CAST = UR / SC / ST / OBC : <b><?php echo $scheme_form['cast']; ?></b> 1st or 2nd Child : <b><?php echo $scheme_form['1_or_2_child']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Relationship with applicant(Son/Daughter/Dependent brother/ Sister) : <b><?php echo $rel; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Name of Institute/School/College : <b><?php echo $scheme_form['name_of_institute']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Name of the Course : <b><?php echo $scheme_form['name_of_course']; ?></b> <strong>Present Year (ie 2018-19)</strong>( 1st/ 2nd/ 3rd/ 4th ) <b><?php echo $scheme_form['']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Date of Admission : <b><?php echo $scheme_form['date_of_admission']; ?></b> Duration of the course <b><?php echo $scheme_form['duration_of_course']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Whether Child/Ward was Residing Railway Hostel : <strong>(Compulsory)</strong> YES / NO <b><?php echo $scheme_form['child_resi_rly_hostel']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>* I declare that my, son/daughter/ dependent brother/sister are not employed for whom the scholarship is applied. Further I declare that my child/ward is not in receipt of any other Scholarship / Concession from any other source and I had not applied for more than two children.</h5>
            </div>
            <div class="col-md-12" >
                <h5>* If it is subsequently revealed that the information provided is not true or that I had not disclosed any information relating to my child/ward, I will be liable for disciplinary action and Administration reserve the right to recover the amount already paid to me.
                </h5>
            </div>
            <div class="col-md-12" >
                <h5>Date & Place :___________________________</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: left;">
                    <h5>Forwarded vide Memo No.</h5>
                </div>
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature of the Applicant</strong></h5>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>To,</h5>
                        <h5>The Secretary, Staff Benefit Fund Committee __________ (HQ/Div/W.Shop) for further process. It is certified that the particulars stated against item above have been verified and found correct.</h5>
                    </div>
                    <div class="col-md-6" style="float: right;">
                        <h5><strong>(Signature of forwarding Officer)<br>Stamp of Office</strong></h5>
                    </div>
                </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>

<?php }	

	if($sch_id == 14)
	{ ?> 

			<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :Cash Award Scheme from SBF for wards of Railway employees for out 
                        Standing   performance in academic year 2017-18 
                        (BA, B.Com, B.Sc with 65% and above only)
    </title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
        </div>
            <div class="row">
                <!-- <h4 class="col-md-6" style="float: left;">Scheme:&nbsp;&nbsp;&nbsp;<strong>Cash Award Scheme from SBF for wards of Railway employees for out Standing   performance in academic year 2017-18 </strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>CSBF</strong></h4> -->
                <!-- <h3 class="" style="float: right;"><strong>APPENDIX 'A'</strong></h3> -->
            </div>
            <h4 class="text-center"><strong>(Last Date of Submission 15/10/2018)</strong></h4>
            <h4 class="text-center"><strong>Cash Award Scheme from SBF for wards of Railway employees for out 
                        Standing   performance in academic year 2017-18</strong></h4>
            <h5 class="text-center"><strong>( BA, B.Com, B.Sc with 65% and above only.)</strong></h5>
        <div class="row">
            <div class="col-md-12" >
                <h5>1.  Name of Employee :  <b> <?php echo $emp['name']; ?> </b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>2.  Designation : <b> <?php echo $emp_desig; ?> </b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>3.  Date of Appointment : <b> <?php echo $emp['doa']; ?> </b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>4.  Pay Band & Grade Pay/Pay Level : <b> <?php echo $emp['7th_pay_level']; ?> </b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>5.  Basic Pay(Encl.Payslip) : <b> <?php echo $emp['basic_pay']; ?> </b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>6.  <strong>RUID or Employees No</strong> : <b> <?php echo $emp['emp_no']; ?> </b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>7.  Name of the Student : <b> <?php echo $scheme_form['name_of_child_ward']; ?> </b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>8.  Date of Birth of the Student : <b> <?php echo $scheme_form['date_of_birth_stud']; ?> </b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>9.  Relationship with the applicant : <b> <?php echo $rel; ?> </b>  </h5>
            </div>
            <div class="col-md-12" >
                <h5>10.  Name and Address of the 
                        Institution of Which Studying : <b>  <?php echo $scheme_form['name_of_institute'];  echo $scheme_form['addr_of_institute']; ?> </b> 
                </h5>
            </div>
            <div class="col-md-12" >
                <h5>11. Particular of Class/Course Studing : <b> <?php echo $scheme_form['name_of_course']; ?> </b>  </h5>
            </div>
            <div class="col-md-12" >
                <h5>12. Duration of the Course : <b> <?php echo $scheme_form['duration_of_course']; ?> </b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>13.  Scholastic record of the Student ( to be supported by copies of certificate/mark sheet duly verified by Principal of School/College)</h5>
            </div>
            <div class="row col-md-12">
                <table style="width: 100%;" border="1">
                    <thead>
                        <th>Name of the <br>Exam.Passed</th>
                        <th>Year in which <br>passed</th>
                        <th>Institution</th>
                        <th>Total marks for <br>the Exam.</th>
                        <th>Marks <br>Obtained</th>
                        <th>%age</th>
                        <th>Position in <br>Class</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b><?php echo $scheme_form['name_of_exam_passd']; ?></b></td>
                            <td><b><?php echo $scheme_form['passed_year']; ?></b></td>
                            <td><b><?php echo $scheme_form['institution']; ?></b></td>
                            <td><b><?php echo $scheme_form['total_marks_fr_exam']; ?></b></td>
                            <td><b><?php echo $scheme_form['marks_obtained']; ?></b></td>
                            <td><b><?php echo $scheme_form['percentage']; ?></b></td>
                            <td><b><?php echo $scheme_form['pos_in_class']; ?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" >
                <h5>14. Details of Other the Scholarships and educational Assistance from SBF or any other source : <b> <?php echo $scheme_form['details_of_other_schol_edu_assist_frm_sbf_or_any']; ?> </b>
                </h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5>Signature of the Applicant</h5>
                    <h5>Railway Phone No/Mobile No : <b> <?php echo $emp['mobile']; ?> </b> </h5>
                </div>
            </div>
            <div class="row col-md-12">
                <h5>Forwarded to the Secretary, Staff Benefit Fund Committee, in________________ Zone/PU/Division/Workshop</h5>
            </div>
                <div class="row">
                    <div class="" style="float: right;">
                        <h5>Signature________________________</h5>
                        <h5>Designation _____________________</h5>
                        <h5>Department______________________</h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Date:_______________</h5>
                </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>

<?php }
		if($sch_id == 12)
		{ ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :Cash Award Scheme from SBF for wards of Railway employees for out 
                        Standing   performance in academic year 2017-18 
                        (SSC with 90% and above only)
    </title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
        </div>
            <div class="row">
                <!-- <h4 class="col-md-6" style="float: left;">Scheme:&nbsp;&nbsp;&nbsp;<strong>Cash Award Scheme from SBF for wards of Railway employees for out Standing   performance in academic year 2017-18 </strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>CSBF</strong></h4> -->
                <!-- <h3 class="" style="float: right;"><strong>APPENDIX 'A'</strong></h3> -->
            </div>
            <h4 class="text-center"><strong>(Last Date of Submission 15/10/2018)</strong></h4>
            <h4 class="text-center"><strong>Cash Award Scheme from SBF for wards of Railway employees for out 
                        Standing   performance in academic year 2017-18</strong></h4>
            <h5 class="text-center"><strong>( SSC with 90% and above only.)</strong></h5>
        <div class="row">
            <div class="col-md-12" >
                <h5>1.  Name of Employee : <b><?php echo $emp['name']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>2.  Designation : <b><?php echo $emp_desig; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>3.  Date of Appointment : <b><?php echo $emp['doa']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>4.  Pay Band & Grade Pay/Pay Level : <b><?php echo $emp['7th_pay_level']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>5.  Basic Pay(Encl.Payslip) : <b><?php echo $emp['basic_pay']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>6.  <strong>RUID or Employees No</strong> : <b><?php echo $emp['emp_no']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>7.  Name of the Student : <b><?php echo $scheme_form['name_of_child_ward']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>8.  Date of Birth of the Student : <b><?php echo $scheme_form['date_of_birth_stud']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>9.  Relationship with the applicant : <b><?php echo $rel; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>10.  Name and Address of the 
                        Institution of Which Studying : <b><?php echo $scheme_form['name_of_institute'];  echo $scheme_form['addr_of_institute']; ?></b> 
                </h5>
            </div>
            <div class="col-md-12" >
                <h5>11. Particular of Class/Course Studing : <b><?php echo $scheme_form['name_of_course']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>12. Duration of the Course : <b><?php echo $scheme_form['duration_of_course']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>13.  Scholastic record of the Student ( to be supported by copies of certificate/mark sheet duly verified by Principal of School/College)</h5>
            </div>
            <div class="row col-md-12">
                <table style="width: 100%;" border="1">
                    <thead>
                        <th>Name of the <br>Exam.Passed</th>
                        <th>Year in which <br>passed</th>
                        <th>Institution</th>
                        <th>Total marks for <br>the Exam.</th>
                        <th>Marks <br>Obtained</th>
                        <th>%age</th>
                        <th>Position in <br>Class</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b><?php echo $scheme_form['name_of_exam_passd']; ?></b></td>
                            <td><b><?php echo $scheme_form['passed_year']; ?></b></td>
                            <td><b><?php echo $scheme_form['institution']; ?></b></td>
                            <td><b><?php echo $scheme_form['total_marks_fr_exam']; ?></b></td>
                            <td><b><?php echo $scheme_form['marks_obtained']; ?></b></td>
                            <td><b><?php echo $scheme_form['percentage']; ?></b></td>
                            <td><b><?php echo $scheme_form['pos_in_class']; ?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" >
                <h5>14. Details of Other the Scholarships and educational Assistance from SBF or any other source : <b><?php echo $scheme_form['details_of_other_schol_edu_assist_frm_sbf_or_any']; ?></b>
                </h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5>Signature of the Applicant</h5>
                    <h5>Railway Phone No/Mobile No : <b><?php echo $emp['mobile']; ?></b> </h5>
                </div>
            </div>
            <div class="row col-md-12">
                <h5>Forwarded to the Secretary, Staff Benefit Fund Committee, in________________ Zone/PU/Division/Workshop</h5>
            </div>
                <div class="row">
                    <div class="" style="float: right;">
                        <h5>Signature________________________</h5>
                        <h5>Designation _____________________</h5>
                        <h5>Department______________________</h5>
                    </div>
                </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>

	<?php	}

	if($sch_id == 13)
	{ ?>


		<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :Cash Award Scheme from SBF for wards of Railway employees for out 
                        Standing   performance in academic year 2017-18 
    </title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
        </div>
            <div class="row">
                <!-- <h4 class="col-md-6" style="float: left;">Scheme:&nbsp;&nbsp;&nbsp;<strong>Cash Award Scheme from SBF for wards of Railway employees for out Standing   performance in academic year 2017-18 </strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>CSBF</strong></h4> -->
                <!-- <h3 class="" style="float: right;"><strong>APPENDIX 'A'</strong></h3> -->
            </div>
            <h4 class="text-center"><strong>(Last Date of Submission 15/10/2018)</strong></h4>
            <h4 class="text-center"><strong>Cash Award Scheme from SBF for wards of Railway employees for out 
                        Standing   performance in academic year 2017-18</strong></h4>
            <h5 class="text-center"><strong>( HSC with 85% and above only.)</strong></h5>
        <div class="row">
            <div class="col-md-12" >
                <h5>1.  Name of Employee : <b><?php echo $emp['name']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>2.  Designation : <b><?php echo $emp_desig; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>3.  Date of Appointment : <b><?php echo $emp['doa']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>4.  Pay Band & Grade Pay/Pay Level : <b><?php echo $emp['7th_pay_level']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>5.  Basic Pay(Encl.Payslip) : <b><?php echo $emp['basic_pay']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>6.  <strong>RUID or Employees No</strong> : <b><?php echo $emp['emp_no']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>7.  Name of the Student : <b><?php echo $scheme_form['name_of_child_ward']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>8.  Date of Birth of the Student : <b><?php echo $scheme_form['date_of_birth_stud']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>9.  Relationship with the applicant : <b><?php echo $rel; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>10.  Name and Address of the 
                        Institution of Which Studying : <b><?php echo $scheme_form['name_of_institute'];  echo $scheme_form['addr_of_institute']; ?></b>
                </h5>
            </div>
            <div class="col-md-12" >
                <h5>11. Particular of Class/Course Studing : <b><?php echo $scheme_form['name_of_course']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>12. Duration of the Course : <b><?php echo $scheme_form['duration_of_course']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>13.  Scholastic record of the Student ( to be supported by copies of certificate/mark sheet duly verified by Principal of School/College)</h5>
            </div>
            <div class="row col-md-12">
                <table style="width: 100%;" border="1">
                    <thead>
                        <th>Name of the <br>Exam.Passed</th>
                        <th>Year in which <br>passed</th>
                        <th>Institution</th>
                        <th>Total marks for <br>the Exam.</th>
                        <th>Marks <br>Obtained</th>
                        <th>%age</th>
                        <th>Position in <br>Class</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b><?php echo $scheme_form['name_of_exam_passd']; ?></b></td>
                            <td><b><?php echo $scheme_form['passed_year']; ?></b></td>
                            <td><b><?php echo $scheme_form['institution']; ?></b></td>
                            <td><b><?php echo $scheme_form['total_marks_fr_exam']; ?></b></td>
                            <td><b><?php echo $scheme_form['marks_obtained']; ?></b></td>
                            <td><b><?php echo $scheme_form['percentage']; ?></b></td>
                            <td><b><?php echo $scheme_form['pos_in_class']; ?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" >
                <h5>14. Details of Other the Scholarships and educational Assistance from SBF or any other source : <b><?php echo $scheme_form['details_of_other_schol_edu_assist_frm_sbf_or_any']; ?></b>
                </h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5>Signature of the Applicant</h5>
                    <h5>Railway Phone No/Mobile No : <b><?php echo $emp['mobile']; ?></b></h5>
                </div>
            </div>
            <div class="row col-md-12">
                <h5>Forwarded to the Secretary, Staff Benefit Fund Committee, in________________ Zone/PU/Division/Workshop</h5>
            </div>
                <div class="row">
                    <div class="" style="float: right;">
                        <h5>Signature________________________</h5>
                        <h5>Designation _____________________</h5>
                        <h5>Department______________________</h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Date:_______________</h5>
                </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>

<?php }

	if($sch_id == 15)
	{ ?>


		<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :Cash Award Scheme from SBF for wards of Railway employees for out 
                        Standing   performance in academic year 2017-18 
    </title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
        </div>
            <div class="row">
                <!-- <h4 class="col-md-6" style="float: left;">Scheme:&nbsp;&nbsp;&nbsp;<strong>Cash Award Scheme from SBF for wards of Railway employees for out Standing   performance in academic year 2017-18 </strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>CSBF</strong></h4> -->
                <!-- <h3 class="" style="float: right;"><strong>APPENDIX 'A'</strong></h3> -->
            </div>
            <h4 class="text-center"><strong>(Last Date of Submission 15/10/2018)</strong></h4>
            <h4 class="text-center"><strong>Cash Award Scheme from SBF for wards of Railway employees for out 
                        Standing   performance in academic year 2017-18</strong></h4>
            <h5 class="text-center"><strong>( MA, M.Com, M.Sc with 60% and above only.)</strong></h5>
        <div class="row">
            <div class="col-md-12" >
                <h5>1.  Name of Employee : <b><?php echo $emp['name']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>2.  Designation : <b><?php echo $emp_desig; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>3.  Date of Appointment : <b><?php echo $emp['doa']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>4.  Pay Band & Grade Pay/Pay Level : <b><?php echo $emp['7th_pay_level']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>5.  Basic Pay(Encl.Payslip) : <b><?php echo $emp['basic_pay']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>6.  <strong>RUID or Employees No</strong> : <b><?php echo $emp['emp_no']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>7.  Name of the Student : <b><?php echo $scheme_form['name_of_child_ward']; ?></b>  </h5>
            </div>
            <div class="col-md-12" >
                <h5>8.  Date of Birth of the Student : <b><?php echo $scheme_form['date_of_birth_stud']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>9.  Relationship with the applicant : <b><?php echo $rel; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>10.  Name and Address of the 
                        Institution of Which Studying : <b><?php echo $scheme_form['name_of_institute'];   echo $scheme_form['addr_of_institute']; ?></b>
                </h5>
            </div>
            <div class="col-md-12" >
                <h5>11. Particular of Class/Course Studing : <b><?php echo $scheme_form['name_of_course']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>12. Duration of the Course : <b><?php echo $scheme_form['duration_of_course']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>13.  Scholastic record of the Student ( to be supported by copies of certificate/mark sheet duly verified by Principal of School/College)</h5>
            </div>
            <div class="row col-md-12">
                <table style="width: 100%;" border="1">
                    <thead>
                        <th>Name of the <br>Exam.Passed</th>
                        <th>Year in which <br>passed</th>
                        <th>Institution</th>
                        <th>Total marks for <br>the Exam.</th>
                        <th>Marks <br>Obtained</th>
                        <th>%age</th>
                        <th>Position in <br>Class</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b><?php echo $scheme_form['name_of_exam_passd']; ?></b></td>
                            <td><b><?php echo $scheme_form['passed_year']; ?></b></td>
                            <td><b><?php echo $scheme_form['institution']; ?></b></td>
                            <td><b><?php echo $scheme_form['total_marks_fr_exam']; ?></b></td>
                            <td><b><?php echo $scheme_form['marks_obtained']; ?></b></td>
                            <td><b><?php echo $scheme_form['percentage']; ?></b></td>
                            <td><b><?php echo $scheme_form['pos_in_class']; ?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12" >
                <h5>14. Details of Other the Scholarships and educational Assistance from SBF or any other source : <b><?php echo $scheme_form['details_of_other_schol_edu_assist_frm_sbf_or_any']; ?></b>
                </h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: right;">
                    <h5>Signature of the Applicant</h5>
                    <h5>Railway Phone No/Mobile No : <b><?php echo $emp['mobile']; ?></b></h5>
                </div>
            </div>
            <div class="row col-md-12">
                <h5>Forwarded to the Secretary, Staff Benefit Fund Committee, in________________ Zone/PU/Division/Workshop</h5>
            </div>
                <div class="row">
                    <div class="" style="float: right;">
                        <h5>Signature________________________</h5>
                        <h5>Designation _____________________</h5>
                        <h5>Department______________________</h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Date:_______________</h5>
                </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>

<?php }

		if($sch_id == 16)
		{ ?>

	<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scheme :Development of Occupational Skills</title>
    <link href="../../../new_eta/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="print_css/sf_all.css" media="print">
    <link rel="stylesheet" href="print_css/common_print.css">

</head>

<!-- <body> -->

<body>
    <div class="container print">
        <div class="row">
            <h3 class="text-center"><strong>2018-2019</strong></h3>
            <!-- <h3 class="" style="float: right;"><strong>CSBF</strong></h3> -->
        </div>
            <div class="row">
                <h4 class="col-md-6" style="float: left;"><strong>SBF</strong></h4>
                <h4 class="col-md-6" style="float: right;"><strong>APPENDIX 'D'</strong></h4>
                <!-- <h3 class="" style="float: right;"><strong>APPENDIX 'A'</strong></h3> -->
            </div>
        <h4 class="text-center">
            <h5>Scheme:1)Development of Occupational Skills of Physically/Mentally Challenged wards of Railway employees.</h5>
            <h5>2)Annual Maintenance grant to such wards who are completely blind(100%)or bed-ridden with paralytic amputation of both legs muscular dystrophy cerebral paisy or spastics(40% & above)</h5>
        <h4 class="text-center"><strong>(Last Date of Submission 15/10/2018)</strong></h4>
        <div class="row">
            <!-- <div class="">
            </div> -->
            <div class="col-md-6" style="float: left;">
                <h5>To,</h5>
                <h5>The Secretary,</h5>
                <h5>Staff Benefit Fund Committee,</h5>
                <h5>HQ ________ /Div.___________/ W.Shop__________</h5>
            </div>
        </div>
        <div class="row col-md-12" >
                <h5>I hereby apply for financial aid in favour of my son/daughter/dependent brother/sister as per the condition enumerated below</h5>
        </div>
        <div class="row">
            <div class="col-md-12" >
                <h5>Name of Employee : <b><?php echo $emp['name']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Designation : <b><?php echo $emp_desig; ?></b> Railway Telephone No.___________________________</h5>
            </div>
            <div class="col-md-12" >
                <h5>Place of work & Office___________________________Bill Unit No : <b><?php echo $emp['bill_unit']; ?></b> Mobile No : <b><?php echo $emp['mobile']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Staff No : <b><?php echo $emp['emp_no']; ?></b>  Date  of  Appointment : <b><?php echo $emp['doa']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Pay Band(Level) : :<b><?php echo $scheme_form['pay_band']; ?></b><b><?php echo $emp['7th_pay_level']; ?></b>  Basic : <b><?php echo $emp['basic_pay']; ?></b>  Grade Pay(Old)_________ MACPGrade Pay:<b><?php echo $scheme_form['macp_grade_pay']; ?></b></h5>
            </div>
            <div class="col-md-12" >
                <h5>Name of the Child/Ward BOY / GIRL : <b><?php echo $scheme_form['name_of_child_ward']; ?></b> Date of Birth of the Child : <b><?php echo $scheme_form['date_of_birth_stud']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Relationship with applicant(Son/Daughter/Dependent brother/ Sister) : <b><?php echo $rel; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Name and address of the institution where training for Occupational Skills is being imparted(as distinct from academic course for which there are separate educational Scholarship schemes) : <b><?php echo $scheme_form['name_of_institute'];   echo $scheme_form['addr_of_institute']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Whether in receipt of any financial Aid from other sources Yes/No : <b><?php echo $scheme_form['rece_finan_aid_frm_othr_src']; ?></b> </h5>
            </div>
            <div class="col-md-12" >
                <h5>Whether the child is in receipt of Financial Aid from SBF()</h5>
            </div>
            <div class="col-md-12" >
                <h5>Nature of disability : <b><?php echo $scheme_form['nature_of_disability  ']; ?></b> <br>
                (Latest certificate from competent authority in original to be attached)</h5>
            </div>
            <div class="col-md-12" >
                <h5>Reimbursement of fees upto Rs.18,000/- p.a. paid to any institution for development of occupational skills of physically/mentally challenged wards of railway employees. Claim will be made in this format and will be accompanied with receipt of the fees paid. It is to be noted that occupational skill courses are different than normal degree/diploma courses for which a separate scheme of educational scholarship/cash award is already in force.<br>
                    An annual grant of Rs.18,000/- for such children who are completely blind or bedridden due to affliction with diseases like paralysis, muscular dystrophy amputation of both legs, mental attendance.Applications should be accompanied with doctors report.<br>
                    This form should not be used for purchase of wheel chair or other equipments and devices.<br><br>
                if any information provided by me is false, I will be liable for DAR and Amount will be recovered from me.</h5>
            </div>
            <div class="col-md-12" >
                <h5>Date & Place :___________________________</h5>
            </div>
            <div class="row">
                <div class="col-md-6" style="float: left;">
                    <h5>Forwarded vide Memo No.</h5>
                </div>
                <div class="col-md-6" style="float: right;">
                    <h5><strong>Signature of the Applicant</strong></h5>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>To,</h5>
                        <h5>The Secretary, Staff Benefit Fund Committee __________ (HQ/Div/W.Shop) for further process. It is certified that the particulars stated against item above have been verified and found correct.</h5>
                    </div>
                    <div class="col-md-6" style="float: right;">
                        <h5><strong>(Signature of forwarding Officer)<br>Stamp of Office</strong></h5>
                    </div>
                </div>
                <div class="row">
                    <h5>Encl:- 1) Fee Receipt in Original<br>
                    2) Disability certificate in the case of disabled ward including mentally challenged<br>
                    3) Doctor's report in the case of diseases like paralysis or muscular </h5>
                </div>
        </div> 
    </div>
</body>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

</html>			

   <?php }
?>