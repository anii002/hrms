<?php


require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid']))
{
	
	$empid=$_REQUEST['empid'];
	$db->sr_connect();
$selectBiodata=mysql_query("SELECT * FROM prft_reversion_temp WHERE rev_pf_no='".$empid."'");
$val=mysql_fetch_array($selectBiodata);


	$temp=array();
	
	$temp['pfNumber']=$val['rev_pf_no'];
	$revOrderType=$val['rev_order_type'];
	$temp['rev_letter_no']=$val['rev_letter_no'];
	$temp['rev_letter_date']=$val['rev_letter_date'];
	$temp['rev_wef']=$val['rev_wef'];
	$rev_frm_dept=$val['rev_frm_dept'];
	$rev_to_dept=$val['rev_to_dept'];
	$rev_frm_desig=$val['rev_frm_desig'];
	$rev_to_desig=$val['rev_to_desig'];
	$rev_frm_othr_desig=$val['rev_frm_othr_desig'];
	$rev_to_othr_desig=$val['rev_to_othr_desig'];
	$rev_frm_scale=$val['rev_frm_scale'];
	$rev_to_scale=$val['rev_to_scale'];
	$temp['rev_frm_level']=$val['rev_frm_level'];
	$temp['rev_to_level']=$val['rev_to_level'];
	$rev_frm_group=$val['rev_frm_group'];
	$rev_to_group=$val['rev_to_group'];
	$rev_frm_station=$val['rev_frm_station'];
	$rev_to_station=$val['rev_to_station'];
	$rev_frm_othr_station=$val['rev_frm_othr_station'];
	$rev_to_othr_station=$val['rev_to_othr_station'];
	$rev_frm_billunit=$val['rev_frm_billunit'];
	$rev_to_billunit=$val['rev_to_billunit'];
	$rev_frm_depot=$val['rev_frm_depot'];
	$rev_to_depot=$val['rev_to_depot'];
	$temp['rev_frm_rop']=$val['rev_frm_rop'];
	$temp['rop_to']=$val['rev_to_rop'];
	$temp['rev_carried_out_type']=$val['rev_carried_out_type'];
	$temp['rev_carri_wef']=$val['rev_carri_wef'];
	$temp['rev_carri_date_of_incr']=$val['rev_carri_date_of_incr'];
	
	$db->sr_new_connect();
	
	$selDept=mysql_query("SELECT DEPTDESC FROM department WHERE id='".$rev_frm_dept."'");
	$resFrmDept=mysql_fetch_array($selDept);
	
	$temp['from_dept']=$resFrmDept['DEPTDESC'];
	
	$selToDept=mysql_query("SELECT DEPTDESC FROM department WHERE id='".$rev_to_dept."' ");
	$resToDept=mysql_fetch_array($selToDept);
	
	$temp['to_dept']=$resToDept['DEPTDESC'];
	
	$selFromDesig=mysql_query("SELECT desigshortdesc FROM designation WHERE id='".$rev_frm_desig."'");
	$resFromDesig=mysql_fetch_array($selFromDesig);
	
	$temp['from_desig']=$resFromDesig['desigshortdesc'];
	
	$selToDesig=mysql_query("SELECT desigshortdesc FROM designation WHERE id='".$rev_to_desig."'");
	$resToDesig=mysql_fetch_array($selToDesig);
	
	$temp['to_desig']=$resToDesig['desigshortdesc'];
	
	$selOtherFromDesig=mysql_query("SELECT desigshortdesc FROM designation WHERE id='".$rev_frm_othr_desig."'");
	$resOtherFromDesig=mysql_fetch_array($selOtherFromDesig);
	
	$temp['from_other_desig']=$resOtherFromDesig['desigshortdesc'];
	
	
	$selOtherToDesig=mysql_query("SELECT desigshortdesc FROM designation WHERE id='".$rev_to_othr_desig."'");
	$resOtherToDesig=mysql_fetch_array($selOtherToDesig);
	
	$temp['to_other_desig']=$resOtherToDesig['desigshortdesc'];
	
	
	
	$selFromScale=mysql_query("SELECT 6_cpc_scale FROM scale WHERE id='".$rev_frm_scale."'");
	$resFromScale=mysql_fetch_array($selFromScale);
	
	$temp['from_scale']=$resFromScale['6_cpc_scale'];
	
	$selToScale=mysql_query("SELECT 6_cpc_scale FROM scale WHERE id='".$rev_to_scale."'");
	$resToScale=mysql_fetch_array($selToScale);
	
	$temp['to_scale']=$resToScale['6_cpc_scale'];
	
	
	$selectFromGroup=mysql_query("SELECT group_col FROM group_col WHERE id='".$rev_frm_group."'");
	$resFromGroupCol=mysql_fetch_array($selectFromGroup);
	
	$temp['from_group']=$resFromGroupCol['group_col'];
	
	
	$selectToGroup=mysql_query("SELECT group_col FROM group_col WHERE id='".$rev_to_group."'");
	$resToGroupCol=mysql_fetch_array($selectToGroup);
	
	$temp['to_group']=$resToGroupCol['group_col'];
	
	
	$selectFromStation=mysql_query("SELECT stationdesc FROM station WHERE id='".$rev_frm_station."'");
	$resFromStation=mysql_fetch_array($selectFromStation);
	
	$temp['from_station']=$resFromStation['stationdesc'];
	
	$selectToStation=mysql_query("SELECT stationdesc FROM station WHERE id='".$rev_to_station."'");
	$resToStation=mysql_fetch_array($selectToStation);
	
	$temp['to_station']=$resToStation['stationdesc'];
	
	$selectFromOtherStation=mysql_query("SELECT stationdesc FROM station WHERE id='".$rev_frm_othr_station."'");
	$resFromOtherStation=mysql_fetch_array($selectFromOtherStation);
	
	$temp['from_other_station']=$resFromOtherStation['stationdesc'];
	
	$selectToOtherStation=mysql_query("SELECT stationdesc FROM station WHERE id='".$rev_to_othr_station."'");
	$resToOtherStation=mysql_fetch_array($selectToOtherStation);
	
	$temp['to_other_station']=$resToOtherStation['stationdesc'];
	
	$selectFromBillUnit=mysql_query("SELECT billunit FROM billunit WHERE id='".$rev_frm_billunit."'");
	$resFromBillUnit=mysql_fetch_array($selectFromBillUnit);
	
	$temp['from_billunit']=$resFromBillUnit['billunit'];
	
	$selectToBillUnit=mysql_query("SELECT billunit FROM billunit WHERE id='".$rev_to_billunit."'");
	$resToBillUnit=mysql_fetch_array($selectToBillUnit);
	
	$temp['to_billunit']=$resToBillUnit['billunit'];
	
	
	
	$selectFromDepot=mysql_query("SELECT DESCRIPTION FROM depot WHERE id='".$rev_frm_depot."'");
	$resFromDepot=mysql_fetch_array($selectFromDepot);
	
	$temp['from_depot']=$resFromDepot['DESCRIPTION'];
	
	
	$selectToDepot=mysql_query("SELECT DESCRIPTION FROM depot WHERE id='".$rev_to_depot."'");
	$resToDepot=mysql_fetch_array($selectToDepot);
	
	$temp['to_depot']=$resFromDepot['DESCRIPTION'];
	
	$selectrevOrderType=mysql_query("SELECT descri FROM reversion_order_type WHERE id='".$revOrderType."'");
	$resrevOrderType=mysql_fetch_array($selectrevOrderType);
	
	$temp['Order_type']=$resrevOrderType['descri'];
	
	array_push($response,$temp);

echo json_encode($response);
}


?>