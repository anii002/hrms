<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();
include('adminFunction.php');
switch($_REQUEST['action'])
{
  
case 'saveData':
 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
$pf_no 		= $_SESSION['username'];
$scheme_id 	= $_POST['scheme_id'];

if(isset($_POST['sub_scheme_id']))
{
$sub_scheme_id = $_POST['sub_scheme_id'];
}
else
{
$sub_scheme_id = NULL;
}
// $payband 	= $_POST['payband'];
// $macp 		= $_POST['macp'];
$digits = 4;
rand(pow(10, $digits-1), pow(10, $digits)-1);
$reference_id = $pf_no.'/'.$scheme_id.'/'.rand(pow(10, $digits-1), pow(10, $digits)-1).'/'.date('Y');

if(isset($_POST['name_of_child']))
{
$name_of_child = $_POST['name_of_child'];
}
else
{
$name_of_child = NULL;
}
if(isset($_POST['boy_girl']))
{
$boy_girl = $_POST['boy_girl'];
}
else
{
$boy_girl = NULL;
}
if(isset($_POST['cast']))
{
$cast = $_POST['cast'];
}
else
{
$cast = NULL;
}
if(isset($_POST['nth_child']))
{
$nth_child = $_POST['nth_child'];
}
else
{
$nth_child = NULL;
}
if(isset($_POST['name_of_institute']))
{
$name_of_institute = $_POST['name_of_institute'];
}
else
{
$name_of_institute = NULL;
}
if(isset($_POST['name_of_course']))
{
$name_of_course = $_POST['name_of_course'];
}
else
{
$name_of_course = NULL;
}
if(isset($_POST['present_year']))
{
$present_year = $_POST['present_year'];
}
else
{
$present_year = NULL;
}
if(isset($_POST['date_of_admission']))
{
$date_of_admission = $_POST['date_of_admission'];
}
else
{
$date_of_admission = NULL;
}
if(isset($_POST['duration_of_course']))
{
$duration_of_course = $_POST['duration_of_course'];
}
else
{
$duration_of_course = NULL;
}
if(isset($_POST['child_resi_rly_hostel']))
{
$child_resi_rly_hostel = $_POST['child_resi_rly_hostel'];
}
else
{
$child_resi_rly_hostel = NULL;
}
if(isset($_POST['last_board_exam_attended']))
{
$last_board_exam_attended = $_POST['last_board_exam_attended'];
}
else
{
$last_board_exam_attended = NULL;
}
if(isset($_POST['last_board_exam_attended_year']))
{
$last_board_exam_attended_year = $_POST['last_board_exam_attended_year'];
}
else
{
$last_board_exam_attended_year = NULL;
}
if(isset($_POST['last_board_exam_attended_pers']))
{
$last_board_exam_attended_pers = $_POST['last_board_exam_attended_pers'];
}
else
{
$last_board_exam_attended_pers = NULL;
}

if(isset($_POST['relationship_with_applicant']))
{
$relationship_with_applicant = $_POST['relationship_with_applicant'];
}
else
{
$relationship_with_applicant = NULL;
}
if(isset($_POST['old_case_no']))
{
$old_case_no = $_POST['old_case_no'];
}
else
{
$old_case_no = NULL;
}
if(isset($_POST['course_for_which_schol_fa_sanct']))
{
$course_for_which_schol_fa_sanct = $_POST['course_for_which_schol_fa_sanct'];
}
else
{
$course_for_which_schol_fa_sanct = NULL;
}
if(isset($_POST['state_stage_child_failed_atkt']))
{
$state_stage_child_failed_atkt = $_POST['state_stage_child_failed_atkt'];
}
else
{
$state_stage_child_failed_atkt = NULL;
}
if(isset($_POST['amt_recv_frm_sbf']))
{
$amt_recv_frm_sbf = $_POST['amt_recv_frm_sbf'];
}
else
{
$amt_recv_frm_sbf = NULL;
}
if(isset($_POST['period_for_payment_recv']))
{
$period_for_payment_recv = $_POST['period_for_payment_recv'];
}
else
{
$period_for_payment_recv = NULL;
}
if(isset($_POST['period_for_payment_due']))
{
$period_for_payment_due = $_POST['period_for_payment_due'];
}
else
{
$period_for_payment_due = NULL;
}
if(isset($_POST['any_other_bene_sbf_claimed']))
{
$any_other_bene_sbf_claimed = $_POST['any_other_bene_sbf_claimed'];
}
else
{
$any_other_bene_sbf_claimed = NULL;
}

if(isset($_POST['sbf_grant_recv_last_year']))
{
$sbf_grant_recv_last_year = $_POST['sbf_grant_recv_last_year'];
}
else
{
$sbf_grant_recv_last_year = NULL;
}
if(isset($_POST['fresh_appln']))
{
$fresh_appln = $_POST['fresh_appln'];
}
else
{
$fresh_appln = NULL;
}
if(isset($_POST['last_appli_year']))
{
$last_appli_year = $_POST['last_appli_year'];
}
else
{
$last_appli_year = NULL;
}
if(isset($_POST['enc_money_rec_no']))
{
$enc_money_rec_no = $_POST['enc_money_rec_no'];
}
else
{
$enc_money_rec_no = NULL;
}
if(isset($_POST['date']))
{
$date = $_POST['date'];
}
else
{
$date = NULL;
}
if(isset($_POST['rs']))
{
$rs = $_POST['rs'];
}
else
{
$rs = NULL;
}
if(isset($_POST['nature_of_leave']))
{
$nature_of_leave = $_POST['nature_of_leave'];
}
else
{
$nature_of_leave = NULL;
}
if(isset($_POST['leave_due_sick_from']))
{
$leave_due_sick_from = $_POST['leave_due_sick_from'];
}
else
{
$leave_due_sick_from = NULL;
}
if(isset($_POST['leave_due_sick_to']))
{
$leave_due_sick_to = $_POST['leave_due_sick_to'];
}
else
{
$leave_due_sick_to = NULL;
}
if(isset($_POST['with_pay']))
{
$with_pay = $_POST['with_pay'];
}
else
{
$with_pay = NULL;
}
if(isset($_POST['with_pay_from']))
{
$with_pay_from = $_POST['with_pay_from'];
}
else
{
$with_pay_from = NULL;
}
if(isset($_POST['with_pay_to']))
{
$with_pay_to = $_POST['with_pay_to'];
}
else
{
$with_pay_to = NULL;
}
if(isset($_POST['half_pay']))
{
$half_pay = $_POST['half_pay'];
}
else
{
$half_pay = NULL;
}
if(isset($_POST['half_pay_to']))
{
$half_pay_to = $_POST['half_pay_to'];
}
else
{
$half_pay_to = NULL;
}
if(isset($_POST['half_pay_from']))
{
$half_pay_from = $_POST['half_pay_from'];
}
else
{
$half_pay_from = NULL;
}
if(isset($_POST['without_pay']))
{
$without_pay = $_POST['without_pay'];
}
else
{
$without_pay = NULL;
}
if(isset($_POST['without_pay_from']))
{
$without_pay_from = $_POST['without_pay_from'];
}
else
{
$without_pay_from = NULL;
}
if(isset($_POST['without_pay_to']))
{
$without_pay_to = $_POST['without_pay_to'];
}
else
{
$without_pay_to = NULL;
}
if(isset($_POST['m89b_certi_no']))
{
$m89b_certi_no = $_POST['m89b_certi_no'];
}
else
{
$m89b_certi_no = NULL;
}
if(isset($_POST['dated']))
{
$dated = $_POST['dated'];
}
else
{
$dated = NULL;
}

if(isset($_POST['period']))
{
$period = $_POST['period'];
}
else
{
$period = NULL;
}

if(isset($_POST['resident_addr']))
{
$resident_addr = $_POST['resident_addr'];
}
else
{
$resident_addr = NULL;
}
if(isset($_POST['date_of_death']))
{
$date_of_death = $_POST['date_of_death'];
}
else
{
$date_of_death = NULL;
}

if(isset($_POST['date_of_birth_stud']))
{
$date_of_birth_stud = $_POST['date_of_birth_stud'];
}
else
{
$date_of_birth_stud = NULL;
}
if(isset($_POST['addr_of_institute']))
{
$addr_of_institute = $_POST['addr_of_institute'];
}
else
{
$addr_of_institute = NULL;
}
if(isset($_POST['details_of_other_school_edu_assist_frm_sbf_or_any']))
{
$details_of_other_school_edu_assist_frm_sbf_or_any = $_POST['details_of_other_school_edu_assist_frm_sbf_or_any'];
}
else
{
$details_of_other_school_edu_assist_frm_sbf_or_any = NULL;
}
if(isset($_POST['recv_finan_aid_frm_othr_src']))
{
$recv_finan_aid_frm_othr_src = $_POST['recv_finan_aid_frm_othr_src'];
}
else
{
$recv_finan_aid_frm_othr_src = NULL;
}
if(isset($_POST['chld_rece_finan_aid_frm_sbf_par_starting_year']))
{
$chld_rece_finan_aid_frm_sbf_par_starting_year = $_POST['chld_rece_finan_aid_frm_sbf_par_starting_year'];
}
else
{
$chld_rece_finan_aid_frm_sbf_par_starting_year = NULL;
}
if(isset($_POST['nature_of_disability']))
{
$nature_of_disability = $_POST['nature_of_disability'];
}
else
{
$nature_of_disability = NULL;
}
if(isset($_POST['name_of_exam_passd']))
{
$name_of_exam_passd = $_POST['name_of_exam_passd'];
}
else
{
$name_of_exam_passd = NULL;
}
if(isset($_POST['passed_year']))
{
$passed_year = $_POST['passed_year'];
}
else
{
$passed_year = NULL;
}
if(isset($_POST['institution']))
{
$institution = $_POST['institution'];
}
else
{
$institution = NULL;
}
if(isset($_POST['total_marks_fr_exam']))
{
$total_marks_fr_exam = $_POST['total_marks_fr_exam'];
}
else
{
$total_marks_fr_exam = NULL;
}
if(isset($_POST['marks_obtained']))
{
$marks_obtained = $_POST['marks_obtained'];
}
else
{
$marks_obtained = NULL;
}
if(isset($_POST['percentage']))
{
$percentage = $_POST['percentage'];
}
else
{
$percentage = NULL;
}
if(isset($_POST['pos_in_class']))
{
$pos_in_class = $_POST['pos_in_class'];
}
else
{
$pos_in_class = NULL;
}



$created_at = date('Y-m-d H:i:s');
dbcon();
$sql = "INSERT INTO `tbl_form_details`(`reference_id`,`emp_no`, `scheme_id`,`sub_scheme_id`,`name_of_child_ward`, `boy_girl`, `cast`, `1_or_2_child`, `name_of_institute`, `name_of_course`, `present_year`, `date_of_admission`, `duration_of_course`, `child_resi_rly_hostel`, `last_board_exam_attended`, `last_exam_attended_year`, `last_exam_attended_pers`, `relationship_with_applicant`, `old_case_no`, `course_for_which_schol_fa_sanct`, `state_stage_child_failed_atkt`, `amt_recv_frm_sbf`, `period_for_payment_recv`, `period_for_payment_due`, `any_other_bene_sbf_claimed`, `sbf_grant_recv_last_year`, `fresh_appln`, `last_appli_year`, `enc_money_rec_no`, `date`, `rs`, `nature_of_leave`,`leave_due_sick_from`, `leave_due_sick_to`, `with_pay`, `with_pay_from`, `with_pay_to`,`half_pay`, `half_pay_from`, `half_pay_to`,`without_pay`, `without_pay_from`, `without_pay_to`,`m89b_certi_no`, `dated`, `period`, `resident_addr`, `date_of_death`, `date_of_birth_stud`, `addr_of_institute`, `details_of_other_schol_edu_assist_frm_sbf_or_any`, `rece_finan_aid_frm_othr_src`, `chld_rece_finan_aid_frm_sbf_par_startng_year`, `nature_of_disability`, `name_of_exam_passd`, `passed_year`, `institution`,`total_marks_fr_exam`, `marks_obtained`, `percentage`, `pos_in_class`, `status`, `created_at`) VALUES ('$reference_id','$pf_no','$scheme_id','$sub_scheme_id','$name_of_child','$boy_girl','$cast','$nth_child','$name_of_institute','$name_of_course','$present_year','$date_of_admission','$duration_of_course','$child_resi_rly_hostel','$last_board_exam_attended','$last_board_exam_attended_year','$last_board_exam_attended_pers','$relationship_with_applicant','$old_case_no','$course_for_which_schol_fa_sanct','$state_stage_child_failed_atkt','$amt_recv_frm_sbf','$period_for_payment_recv','$period_for_payment_due','$any_other_bene_sbf_claimed','$sbf_grant_recv_last_year','$fresh_appln','$last_appli_year','$enc_money_rec_no','$date','$rs','$nature_of_leave','$leave_due_sick_from','$leave_due_sick_to','$with_pay','$with_pay_from','$with_pay_to','$half_pay','$half_pay_from','$half_pay_to','$without_pay','$without_pay_from','$without_pay_to','$m89b_certi_no','$dated','$period','$resident_addr','$date_of_death','$date_of_birth_stud','$addr_of_institute','$details_of_other_school_edu_assist_frm_sbf_or_any','$recv_finan_aid_frm_othr_src','$chld_rece_finan_aid_frm_sbf_par_starting_year','$nature_of_disability','$name_of_exam_passd','$passed_year','$institution','$total_marks_fr_exam','$marks_obtained','$percentage','$pos_in_class','0','$created_at')";

// echo $sql;
$ins_qry = mysql_query($sql);
// echo mysql_error();
if($ins_qry)
{
//echo "string";exit();
$name_array = "";
$tmp_name_array = "";
$cnt = 0;
//$scheme_id = 1;

$cnt = count($_FILES['upfile']['name']);
//  echo $cnt;exit();
for ($i = 0; $i < $cnt; $i++) 
{

	$name_array[$i] = $pf_no.'_'.$scheme_id.'_'.$_FILES['upfile']['name'][$i];
	$tmp_name_array[$i] = $_FILES['upfile']['tmp_name'][$i];
}

if (add_file($name_array, $tmp_name_array, $reference_id)) 
{

echo "<script>window.location.href='../sub_forms.php';alert('Document has been added');</script>";
} else {
echo "<script>window.location.href='../add_forms.php';alert('Document Not Inserted');</script>";
}
}



}
break;

case 'forward_form':
$empid = $_REQUEST['empid'];
$ref = $_REQUEST['ref_no'];
$forwardName = $_REQUEST['fdname'];
// $c_otp = $_REQUEST['c_otp'];
$flag='0';
dbcon();

$query1 = "UPDATE `tbl_form_details` SET `status`='1' WHERE `emp_no`='".$empid."' AND `reference_id`='".$ref."' ";
$result1 = mysql_query($query1);
$date=date('Y-m-d H:i:s');
dbcon();

$query = "INSERT into tbl_form_forward(empid,ref_id,forwarded_to,fw_date) values('".$empid."','".$ref."','".$forwardName."','".$date."')";
$result = mysql_query($query);

if($result && $result1)
{
$flag='1';
}
else
{
$flag='0';
}
echo $flag;
break;

case 'updateData':

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$pf_no = $_SESSION['username'];
	$ref_id = $_POST['refernce_id'];
	$scheme_id = $_POST['scheme_id'];
	
if(isset($_POST))
{


if(isset($_POST['name_of_child']))
{
$name_of_child = $_POST['name_of_child'];
}
else
{
$name_of_child = NULL;
}
if(isset($_POST['boy_girl']))
{
$boy_girl = $_POST['boy_girl'];
}
else
{
$boy_girl = NULL;
}
if(isset($_POST['cast']))
{
$cast = $_POST['cast'];
}
else
{
$cast = NULL;
}
if(isset($_POST['nth_child']))
{
$nth_child = $_POST['nth_child'];
}
else
{
$nth_child = NULL;
}
if(isset($_POST['name_of_institute']))
{
$name_of_institute = $_POST['name_of_institute'];
}
else
{
$name_of_institute = NULL;
}
if(isset($_POST['name_of_course']))
{
$name_of_course = $_POST['name_of_course'];
}
else
{
$name_of_course = NULL;
}
if(isset($_POST['present_year']))
{
$present_year = $_POST['present_year'];
}
else
{
$present_year = NULL;
}
if(isset($_POST['date_of_admission']))
{
$date_of_admission = $_POST['date_of_admission'];
}
else
{
$date_of_admission = NULL;
}
if(isset($_POST['duration_of_course']))
{
$duration_of_course = $_POST['duration_of_course'];
}
else
{
$duration_of_course = NULL;
}
if(isset($_POST['child_resi_rly_hostel']))
{
$child_resi_rly_hostel = $_POST['child_resi_rly_hostel'];
}
else
{
$child_resi_rly_hostel = NULL;
}
if(isset($_POST['last_board_exam_attended']))
{
$last_board_exam_attended = $_POST['last_board_exam_attended'];
}
else
{
$last_board_exam_attended = NULL;
}
if(isset($_POST['last_board_exam_attended_year']))
{
$last_board_exam_attended_year = $_POST['last_board_exam_attended_year'];
}
else
{
$last_board_exam_attended_year = NULL;
}
if(isset($_POST['last_board_exam_attended_pers']))
{
$last_board_exam_attended_pers = $_POST['last_board_exam_attended_pers'];
}
else
{
$last_board_exam_attended_pers = NULL;
}
if(isset($_POST['relationship_with_applicant']))
{
$relationship_with_applicant = $_POST['relationship_with_applicant'];
}
else
{
$relationship_with_applicant = NULL;
}
if(isset($_POST['old_case_no']))
{
$old_case_no = $_POST['old_case_no'];
}
else
{
$old_case_no = NULL;
}
if(isset($_POST['course_for_which_schol_fa_sanct']))
{
$course_for_which_schol_fa_sanct = $_POST['course_for_which_schol_fa_sanct'];
}
else
{
$course_for_which_schol_fa_sanct = NULL;
}
if(isset($_POST['state_stage_child_failed_atkt']))
{
$state_stage_child_failed_atkt = $_POST['state_stage_child_failed_atkt'];
}
else
{
$state_stage_child_failed_atkt = NULL;
}
if(isset($_POST['amt_recv_frm_sbf']))
{
$amt_recv_frm_sbf = $_POST['amt_recv_frm_sbf'];
}
else
{
$amt_recv_frm_sbf = NULL;
}
if(isset($_POST['period_for_payment_recv']))
{
$period_for_payment_recv = $_POST['period_for_payment_recv'];
}
else
{
$period_for_payment_recv = NULL;
}
if(isset($_POST['period_for_payment_due']))
{
$period_for_payment_due = $_POST['period_for_payment_due'];
}
else
{
$period_for_payment_due = NULL;
}
if(isset($_POST['any_other_bene_sbf_claimed']))
{
$any_other_bene_sbf_claimed = $_POST['any_other_bene_sbf_claimed'];
}
else
{
$any_other_bene_sbf_claimed = NULL;
}
if(isset($_POST['sbf_grant_recv_last_year']))
{
$sbf_grant_recv_last_year = $_POST['sbf_grant_recv_last_year'];
}
else
{
$sbf_grant_recv_last_year = NULL;
}
if(isset($_POST['fresh_appln']))
{
$fresh_appln = $_POST['fresh_appln'];
}
else
{
$fresh_appln = NULL;
}
if(isset($_POST['last_appli_year']))
{
$last_appli_year = $_POST['last_appli_year'];
}
else
{
$last_appli_year = NULL;
}
if(isset($_POST['enc_money_rec_no']))
{
$enc_money_rec_no = $_POST['enc_money_rec_no'];
}
else
{
$enc_money_rec_no = NULL;
}
if(isset($_POST['date']))
{
$date = $_POST['date'];
}
else
{
$date = NULL;
}
if(isset($_POST['rs']))
{
$rs = $_POST['rs'];
}
else
{
$rs = NULL;
}
if(isset($_POST['nature_of_leave']))
{
$nature_of_leave = $_POST['nature_of_leave'];
}
else
{
$nature_of_leave = NULL;
}
if(isset($_POST['leave_due_sick_from']))
{
$leave_due_sick_from = $_POST['leave_due_sick_from'];
}
else
{
$leave_due_sick_from = NULL;
}
if(isset($_POST['leave_due_sick_to']))
{
$leave_due_sick_to = $_POST['leave_due_sick_to'];
}
else
{
$leave_due_sick_to = NULL;
}
if(isset($_POST['with_pay']))
{
$with_pay = $_POST['with_pay'];
}
else
{
$with_pay = NULL;
}
if(isset($_POST['with_pay_from']))
{
$with_pay_from = $_POST['with_pay_from'];
}
else
{
$with_pay_from = NULL;
}
if(isset($_POST['with_pay_to']))
{
$with_pay_to = $_POST['with_pay_to'];
}
else
{
$with_pay_to = NULL;
}
if(isset($_POST['with_pay_from']))
{
$with_pay_from = $_POST['with_pay_from'];
}
else
{
$with_pay_from = NULL;
}
if(isset($_POST['half_pay']))
{
$half_pay = $_POST['half_pay'];
}
else
{
$half_pay = NULL;
}
if(isset($_POST['half_pay_to']))
{
$half_pay_to = $_POST['half_pay_to'];
}
else
{
$half_pay_to = NULL;
}
if(isset($_POST['half_pay_from']))
{
$half_pay_from = $_POST['half_pay_from'];
}
else
{
$half_pay_from = NULL;
}
if(isset($_POST['without_pay']))
{
$without_pay = $_POST['without_pay'];
}
else
{
$without_pay = NULL;
}
if(isset($_POST['without_pay_from']))
{
$without_pay_from = $_POST['without_pay_from'];
}
else
{
$without_pay_from = NULL;
}
if(isset($_POST['without_pay_to']))
{
$without_pay_to = $_POST['without_pay_to'];
}
else
{
$without_pay_to = NULL;
}
if(isset($_POST['m89b_certi_no']))
{
$m89b_certi_no = $_POST['m89b_certi_no'];
}
else
{
$m89b_certi_no = NULL;
}
if(isset($_POST['dated']))
{
$dated = $_POST['dated'];
}
else
{
$dated = NULL;
}
if(isset($_POST['period']))
{
$period = $_POST['period'];
}
else
{
$period = NULL;
}
if(isset($_POST['resident_addr']))
{
$resident_addr = $_POST['resident_addr'];
}
else
{
$resident_addr = NULL;
}
if(isset($_POST['date_of_death']))
{
$date_of_death = $_POST['date_of_death'];
}
else
{
$date_of_death = NULL;
}
if(isset($_POST['date_of_birth_stud']))
{
$date_of_birth_stud = $_POST['date_of_birth_stud'];
}
else
{
$date_of_birth_stud = NULL;
}
if(isset($_POST['addr_of_institute']))
{
$addr_of_institute = $_POST['addr_of_institute'];
}
else
{
$addr_of_institute = NULL;
}
if(isset($_POST['details_of_other_school_edu_assist_frm_sbf_or_any']))
{
$details_of_other_school_edu_assist_frm_sbf_or_any = $_POST['details_of_other_school_edu_assist_frm_sbf_or_any'];
}
else
{
$details_of_other_school_edu_assist_frm_sbf_or_any = NULL;
}
if(isset($_POST['recv_finan_aid_frm_othr_src']))
{
$recv_finan_aid_frm_othr_src = $_POST['recv_finan_aid_frm_othr_src'];
}
else
{
$recv_finan_aid_frm_othr_src = NULL;
}
if(isset($_POST['chld_rece_finan_aid_frm_sbf_par_starting_year']))
{
$chld_rece_finan_aid_frm_sbf_par_starting_year = $_POST['chld_rece_finan_aid_frm_sbf_par_starting_year'];
}
else
{
$chld_rece_finan_aid_frm_sbf_par_starting_year = NULL;
}
if(isset($_POST['nature_of_disability']))
{
$nature_of_disability = $_POST['nature_of_disability'];
}
else
{
$nature_of_disability = NULL;
}
if(isset($_POST['name_of_exam_passd']))
{
$name_of_exam_passd = $_POST['name_of_exam_passd'];
}
else
{
$name_of_exam_passd = NULL;
}
if(isset($_POST['passed_year']))
{
$passed_year = $_POST['passed_year'];
}
else
{
$passed_year = NULL;
}
if(isset($_POST['institution']))
{
$institution = $_POST['institution'];
}
else
{
$institution = NULL;
}
if(isset($_POST['total_marks_fr_exam']))
{
$total_marks_fr_exam = $_POST['total_marks_fr_exam'];
}
else
{
$total_marks_fr_exam = NULL;
}
if(isset($_POST['marks_obtained']))
{
$marks_obtained = $_POST['marks_obtained'];
}
else
{
$marks_obtained = NULL;
}
if(isset($_POST['percentage']))
{
$percentage = $_POST['percentage'];
}
else
{
$percentage = NULL;
}
if(isset($_POST['pos_in_class']))
{
$pos_in_class = $_POST['pos_in_class'];
}
else
{
$pos_in_class = NULL;
}
$updated_at = date('Y-m-d H:i:s');
dbcon();
 $sql = "UPDATE tbl_form_details SET name_of_child_ward = '$name_of_child', boy_girl = '$boy_girl', cast = '$cast', 1_or_2_child = '$nth_child', name_of_institute = '$name_of_institute', name_of_course = '$name_of_course', present_year = '$present_year', date_of_admission = '$date_of_admission', duration_of_course = '$duration_of_course', child_resi_rly_hostel = '$child_resi_rly_hostel', last_board_exam_attended = '$last_board_exam_attended', last_exam_attended_year = '$last_board_exam_attended_year', last_exam_attended_pers = '$last_board_exam_attended_pers', relationship_with_applicant = '$relationship_with_applicant', old_case_no = '$old_case_no', course_for_which_schol_fa_sanct = '$course_for_which_schol_fa_sanct', state_stage_child_failed_atkt = '$state_stage_child_failed_atkt', amt_recv_frm_sbf = '$amt_recv_frm_sbf', period_for_payment_recv = '$period_for_payment_recv', period_for_payment_due = '$period_for_payment_due', any_other_bene_sbf_claimed = '$any_other_bene_sbf_claimed', sbf_grant_recv_last_year = '$sbf_grant_recv_last_year', fresh_appln = '$fresh_appln', last_appli_year = '$last_appli_year', enc_money_rec_no = '$enc_money_rec_no', `date` = '$date', rs = '$rs', nature_of_leave = '$nature_of_leave', leave_due_sick_from = '$leave_due_sick_from', leave_due_sick_to = '$leave_due_sick_to', with_pay = '$with_pay', with_pay_to = '$with_pay_to', with_pay_from = '$with_pay_from', half_pay = '$half_pay', half_pay_from = '$half_pay_from', half_pay_to = '$half_pay_to', without_pay = '$without_pay', without_pay_from = '$without_pay_from' ,without_pay_to = '$without_pay_to', m89b_certi_no = '$m89b_certi_no', dated = '$dated', period = '$period', resident_addr = '$resident_addr', date_of_death = '$date_of_death', date_of_birth_stud = '$date_of_birth_stud', addr_of_institute = '$addr_of_institute', details_of_other_schol_edu_assist_frm_sbf_or_any = '$details_of_other_school_edu_assist_frm_sbf_or_any', rece_finan_aid_frm_othr_src = '$recv_finan_aid_frm_othr_src', chld_rece_finan_aid_frm_sbf_par_startng_year = '$chld_rece_finan_aid_frm_sbf_par_starting_year', nature_of_disability = '$nature_of_disability', name_of_exam_passd = '$name_of_exam_passd', passed_year = '$passed_year', institution = '$institution',total_marks_fr_exam = '$total_marks_fr_exam', marks_obtained = '$marks_obtained', percentage = '$percentage', pos_in_class = '$pos_in_class', updated_at = '$updated_at' WHERE reference_id = '$ref_id'"; 
 // echo "<pre>";
 // print_r($sql);exit();
$ins_qry = mysql_query($sql);

}
/*print_r($_FILES['image']);exit();*/
if($_FILES['image']['name'][0] != '')
{
  
      $name_array = "";
    $tmp_name_array = "";
    $cnt = 0;
    //$scheme_id = 1;

    $cnt = count($_FILES['image']['name']);
    //  echo $cnt;exit();
    for ($i = 0; $i < $cnt; $i++) {
    $name_array[$i] = $pf_no.'_'.$scheme_id.'_'.$_FILES['image']['name'][$i];
    $tmp_name_array[$i] = $_FILES['image']['tmp_name'][$i];
    }

    add_file1($name_array, $tmp_name_array, $ref_id);

}


    echo "<script>window.location.href='../sub_forms.php';alert('Updated Successfully');</script>";
}
break;

default:
echo "Invalid option";
break;
}
?>