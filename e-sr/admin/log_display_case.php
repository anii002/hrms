<?php
include('create_log.php');
include_once('../dbconfig/dbcon.php');
/* include('mini_function.php');
include('fetch_all_column.php'); */
error_reporting(0);
session_start();
dbcon1();
if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) { 
		case 'create_log':
		
			$form=$_REQUEST['tab'];
			if($form=='biodata')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Biodata tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='medical_tab')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Medical tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='init_appo')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Initial Appointment tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='pres_appo')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Work Appointment tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='prft_tab')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited PRFT tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='penalty_tab')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Penalty tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='increment_tab')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Increment tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='awards_tab')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Awards tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='family_tab')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Family tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='nominee_tab')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='training_tab')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Training tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='advance_tab')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Advance tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='property_tab')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='extra_entry_tab')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Last Entry tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='single_view')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Single View tab On SR view";
				create_log($action,$action_on);
			}elseif($form=='tab_view')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Tab View tab On SR view";
				create_log($action,$action_on);
			}
			//History tab
			//Biodata History tab starts
			elseif($form=='identity_number')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Identity Number History On SR History";
				create_log($action,$action_on);
			}elseif($form=='dob')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Date of Birth History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='mobile_number')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Mobile History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='emp_name')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Employee Name History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='emp_old_name')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Employee Old Name History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='f_h_name')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Father/Husband Name History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='cug')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited CUG Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='aadhar_number')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Aadhar Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='email')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Email History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pan_number')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited PAN Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='present_address')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Address History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pre_statecode')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Address Statecode History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pre_pincode')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Address Pincode History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='permanent_address')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Permanent Address History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='per_statecode')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Permanent Address Statecode History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='per_pincode')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Permanent Address Pincode History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='identification_mark')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Identification Mark History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='religion')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Religion History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='community')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Community History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='caste')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Caste History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='gender')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Gender History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='marrital_status')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Marrital Status History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='recruit_code')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Recruitment Code History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='group_col')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Group History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='education_ini')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Initial Education History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='edu_desc_ini')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Initial Education Description History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='education_sub')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Education on time of Subsequent History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='edu_desc_sub')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Education on time of Subsequent Description History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='bank_name')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Bank Name History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='account_number')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Account Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='micr_number')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Micr Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='ifsc_code')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited IFSC Code History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='reis_no')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited REIS Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='ruid_no')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited RUID Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nps_no')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited PRAN Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='bank_address')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Bank Address History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='preapp_department')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Appointment Department History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='preapp_designation')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Appointment Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pre_otherdesign')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Appointment Other Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='preapp_scale')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Appointment Scale History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='preapp_level')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Appointment Level History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='preapp_group')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Appointment Group History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='preapp_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Appointment Station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='preapp_billunit')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Appointment Billunit History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='preapp_rop')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Appointment ROP History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='preapp_depot')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Appointment Depot History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='preapp_remark')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Appointment Remark History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='sgd_designation')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited substansive grade Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='presgd_otherdesign')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited substansive grade Other Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='sgd_scale')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited substansive grade Scale History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='sgd_level')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited substansive grade Level History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='sgd_group')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited substansive grade Group History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='sgd_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited substansive grade Station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='sgd_billunit')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited substansive grade Billunit History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='sgd_depot')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited substansive grade Depot History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='ogd_desig')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited officiating in higher grade Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='preogd_otherdesign')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited officiating in higher grade Other Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='ogd_scale')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited officiating in higher grade Scale History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='ogd_level')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited officiating in higher grade Level History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='ogd_group')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited officiating in higher grade Group History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='ogd_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited officiating in higher grade Station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='ogd_billunit')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited officiating in higher grade Billunit History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='ogd_depot')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited officiating in higher grade Depot History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='ogd_rop')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited officiating in higher grade ROP History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fmy_updatedate')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Family Update date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fmy_member')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Family Member History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fmy_rel')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Family Relation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fmy_gender')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Family Gender History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fmy_dob')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Family Date of Birth History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='adv_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Advance Type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='adv_letterno')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Advance Letter Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='adv_letterdate')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Advance Letter Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='adv_wefdate')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Advance WEF Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='adv_amount')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Advance Amount History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='adv_principle')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Advance Principle History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='adv_interest')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Advance Interest History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='adv_from')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Advance From History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='adv_to')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Advance To History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='adv_remark')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Advance Remark History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='training_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Training Type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tr_inst')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Training Interest History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tr_dept')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Training Department History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tr_desig')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Training Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='last_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Training Last Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='due_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Training Due Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='training_from')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Training From History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='training_to')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Training To History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='description')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Training Description History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='letter_no')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Training Letter Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='letter_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Training Letter Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='remarks')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Training Remarks History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='awd_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Award Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='awd_by')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Award By History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='awd_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Award Type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='awd_other')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Award Other History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='awd_detail')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Award Detail History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pen_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Penalty Type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pen_issued')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Penalty Issued History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pen_effetcted')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Penalty Effected History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pen_letterno')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Penalty Letter Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pen_letterdate')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Penalty Letter Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pen_chargestatus')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Penalty Charge Status History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pen_chargeref')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Penalty Charge Reference History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pen_from')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Penalty from History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pen_to')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Penalty To History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pen_remark')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Penalty Remark History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property Type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_dop')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property DOP History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_letterdate')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property Letter Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_item')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property Item History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_otheritem')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property other Item History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_make')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property Make History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_location')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property Location History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_regno')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property Reg. Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_area')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property Area History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_surveyno')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property Survey Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_cost')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property Cost History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_source')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property Source History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_sourcetype')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property Source Type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_amount')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property Amount History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_letterno')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property Letter Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_remark')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property Remark History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nom_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee Type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nom_name')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee Name History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nom_rel')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee Relation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nom_otherrel')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee Other Relation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nom_per')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee Percentage History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nom_status')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee Status History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nom_age')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee Age History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nom_dob')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee DOB History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nom_panno')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee PAN Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nom_aadhar')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee Aadhar History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nom_address')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee Address History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nom_conti')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee Contingencies History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nom_subscriber')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee Subscriber History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_order_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion order type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_letter_no')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion Letter Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_letter_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion Letter Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_wef')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion WEF History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_frm_dept')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion From Department History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_frm_desig')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion From Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_frm_othr_desig')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion From Other Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_frm_pay_scale_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion From Pay Scale Type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_frm_scale')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion From Scale History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_frm_level')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion From Level History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_frm_group')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion From Group History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_frm_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion From Station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_frm_othr_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion From other Station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_frm_billunit')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion From Billunit History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_frm_depot')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion From Depot History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_frm_rop')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion To ROP History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_to_dept')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion To Depot History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_to_desig')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion To Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_to_othr_desig')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion To other Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_to_pay_scale_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion To Pay Scale Type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_to_scale')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion To Scale History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_to_level')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion To Level History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_to_group')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion To Group History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_to_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion To Station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_to_othr_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion To other Station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rop_to')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion To ROP History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_to_billunit')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion To Billunit History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_to_depot')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion To Depot History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_carried_out_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion Carried Out type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_carri_wef')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion Carried WEF History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_carri_date_of_incr')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Tab History Promotion  Carried Date of Increment On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_car_re_accept_ltr_no')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion Accept Letter Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_car_re_accept_ltr_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion Promotion carried ref. Accept Letter Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_car_re_wef_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion Carried Ref. WEF Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='pro_car_re_remark')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Promotion Carried ref. Remark History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_order_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion order Type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_letter_no')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion Letter Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_letter_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion Letter Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_wef')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion WEF Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_frm_dept')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion From Department History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_frm_desig')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion From Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_frm_othr_desig')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion From other Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_frm_pay_scale_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion From pay scale type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_frm_scale')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion From Scale History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_frm_level')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion From Level History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_frm_group')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion From Group History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_frm_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion From Station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_frm_othr_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion From other Station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_frm_billunit')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion From Billunit History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_frm_depot')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion From Depot History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_frm_rop')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion From ROP History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_to_dept')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion To Department History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_to_desig')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion To Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_to_othr_desig')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion To other Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_to_pay_scale_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion To History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_to_scale')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion To Scale History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_to_level')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion To Level History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_to_group')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion To Group History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_to_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion To Station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_to_othr_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion To other Station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_to_rop')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion To ROP History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_to_billunit')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion To Billunit History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_to_depot')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion To Depot History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_carried_out_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion Carried out type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_carri_wef')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion Carried WEF History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_carri_date_of_incr')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion Carried date of increment History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_car_re_accept_ltr_no')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion Carried return accept letter number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_car_re_accept_ltr_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion Carried return accept letter date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_car_re_wef_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion Carried return WEF Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='rev_car_re_remark')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Reversion Carried return remark History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_order_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer order Type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_letter_no')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer Letter Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_letter_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer Letter Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_wef')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer Letter WEF History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_frm_dept')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer from Department History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_frm_desig')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer from Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_frm_othr_desig')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer from other designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_frm_pay_scale_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer from pay scale type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_frm_scale')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer from scale History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_frm_level')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer from Level History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_frm_group')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer from Group History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_frm_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer from Station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_frm_othr_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer from other station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_frm_billunit')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer from Billunit History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_frm_depot')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer from Depot History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_frm_rop')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer from ROP History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_to_dept')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer To Department History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_to_desig')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer To Designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_to_othr_desig')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer To other designation History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_to_pay_scale_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer To pay scale type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_to_scale')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer To scale History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_to_level')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer To Level History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_to_group')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer To Group History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_to_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer To Station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_to_othr_station')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer To other Station History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_to_rop')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer To ROP History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_to_billunit')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer To Billunit History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_to_depot')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer To Depot History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_carried_out_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer Carried out type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_carri_wef')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer carried WEF History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_carri_date_of_incr')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer carried date of increment History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_car_re_accept_ltr_no')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer carried ref. accept Letter Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_car_re_accept_ltr_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer carried ref. accept letter Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_car_re_wef_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer carried return WEF Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='tran_car_re_remark')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Transfer Carried return remark History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_order_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation order type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_letter_no')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation Letter Number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_letter_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation Letter Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_wef')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation WEF Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_remark')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation Remark History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_frm_ps_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation from pay scale type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_frm_scale')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation from scale History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_frm_level')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation from Level History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_frm_rop')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation from ROP History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_to_ps_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation to pay scale type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_to_scale')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation to Scale History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fx_to_level')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation to Level History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_to_rop')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation  ROP History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_carried_out_type')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation  carried out type History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_carri_wef')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation  carried WEF History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_carri_date_of_incr')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation  carried date of increment History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_car_re_accept_ltr_no')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation  carried return accept letter number History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_car_re_accept_ltr_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation  carried return accept letter Date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_car_re_wef_date')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation carried return WEF date History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='fix_car_re_remark')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Fixation to carried return remark History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='biodata_hist')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Biodata tab History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='present_work_hist')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Present Work Tab History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='awards_hist')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Award tab History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='penalty_hist')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Penalty tab History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='advance_hist')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Advance tab History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='family_hist')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Family tab History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='training_hist')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Training tab History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='property_hist')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Property tab History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='nominee_hist')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited Nominee tab History tab On SR History";
				create_log($action,$action_on);
			}elseif($form=='prft_hist')
			{
				$action_on=$_SESSION['set_update_pf'];
				$action="Visited PRFT tab History tab On SR History";
				create_log($action,$action_on);
			}
			elseif($form=='print_codepro')
			{
				$action_on=$_REQUEST['pf'];
				$action="PRFT Promotion Printed of PF NO $action_on";
				
				create_log($action,$action_on); 
				//echo 'sadasdas';
			}
			elseif($form=='print_coderev')
			{
				$action_on=$_REQUEST['pf'];
				$action="PRFT Reversion Printed of PF NO $action_on";
				
				create_log($action,$action_on); 
				//echo 'sadasdas';
			}
			elseif($form=='print_codetran')
			{
				$action_on=$_REQUEST['pf'];
				$action="PRFT Transfer Printed of PF NO $action_on";
				
				create_log($action,$action_on); 
				//echo 'sadasdas';
			}
			elseif($form=='print_codefix')
			{
				$action_on=$_REQUEST['pf'];
				$action="PRFT Fixation Printed of PF NO $action_on";
				
				create_log($action,$action_on); 
			}
			
		break;
	}
}
