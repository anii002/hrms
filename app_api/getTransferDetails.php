<?php


require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid']))
{
	
	$empid=$_REQUEST['empid'];
	$db->sr_connect();
$selectBiodata=mysql_query("SELECT * FROM prft_transfer_temp WHERE trans_pf_no='".$empid."'");
$val=mysql_fetch_array($selectBiodata);


	$temp=array();
	
	$temp['pfNumber']=$val['trans_pf_no'];
	$ProOrderType=$val['trans_order_type'];
	$temp['pro_letter_no']=$val['trans_letter_no'];
	$temp['pro_letter_date']=$val['trans_letter_date'];
	$temp['pro_wef']=$val['trans_wef'];
	$pro_frm_dept=$val['trans_frm_dept'];
	$pro_to_dept=$val['trans_to_dept'];
	$pro_frm_desig=$val['trans_frm_desig'];
	$pro_to_desig=$val['trans_to_desig'];
	$pro_frm_othr_desig=$val['trans_frm_othr_desig'];
	$pro_to_othr_desig=$val['trans_to_othr_desig'];
	$pro_frm_scale=$val['trans_frm_scale'];
	$pro_to_scale=$val['trans_to_scale'];
	$temp['pro_frm_level']=$val['trans_frm_level'];
	$temp['pro_to_level']=$val['trans_to_level'];
	$pro_frm_group=$val['trans_frm_group'];
	$pro_to_group=$val['trans_to_group'];
	$pro_frm_station=$val['trans_frm_station'];
	$pro_to_station=$val['trans_to_station'];
	$pro_frm_othr_station=$val['trans_frm_othr_station'];
	$pro_to_othr_station=$val['trans_to_othr_station'];
	$pro_frm_billunit=$val['trans_frm_billunit'];
	$pro_to_billunit=$val['trans_to_billunit'];
	$pro_frm_depot=$val['trans_frm_depot'];
	$pro_to_depot=$val['trans_to_depot'];
	$temp['pro_frm_rop']=$val['trans_frm_rop'];
	$temp['rop_to']=$val['trans_to_rop'];
	$temp['pro_carried_out_type']=$val['trans_carried_out_type'];
	$temp['pro_carri_wef']=$val['trans_carri_wef'];
	$temp['pro_carri_date_of_incr']=$val['trans_carri_date_of_incr'];
	
	$db->sr_new_connect();
	
	$selDept=mysql_query("SELECT DEPTDESC FROM department WHERE id='".$pro_frm_dept."'");
	$resFrmDept=mysql_fetch_array($selDept);
	
	$temp['from_dept']=$resFrmDept['DEPTDESC'];
	
	$selToDept=mysql_query("SELECT DEPTDESC FROM department WHERE id='".$pro_to_dept."' ");
	$resToDept=mysql_fetch_array($selToDept);
	
	$temp['to_dept']=$resToDept['DEPTDESC'];
	
	$selFromDesig=mysql_query("SELECT desigshortdesc FROM designation WHERE id='".$pro_frm_desig."'");
	$resFromDesig=mysql_fetch_array($selFromDesig);
	
	$temp['from_desig']=$resFromDesig['desigshortdesc'];
	
	$selToDesig=mysql_query("SELECT desigshortdesc FROM designation WHERE id='".$pro_to_desig."'");
	$resToDesig=mysql_fetch_array($selToDesig);
	
	$temp['to_desig']=$resToDesig['desigshortdesc'];
	
	$selOtherFromDesig=mysql_query("SELECT desigshortdesc FROM designation WHERE id='".$pro_frm_othr_desig."'");
	$resOtherFromDesig=mysql_fetch_array($selOtherFromDesig);
	
	$temp['from_other_desig']=$resOtherFromDesig['desigshortdesc'];
	
	
	$selOtherToDesig=mysql_query("SELECT desigshortdesc FROM designation WHERE id='".$pro_to_othr_desig."'");
	$resOtherToDesig=mysql_fetch_array($selOtherToDesig);
	
	$temp['to_other_desig']=$resOtherToDesig['desigshortdesc'];
	
	
	
	$selFromScale=mysql_query("SELECT 6_cpc_scale FROM scale WHERE id='".$pro_frm_scale."'");
	$resFromScale=mysql_fetch_array($selFromScale);
	
	$temp['from_scale']=$resFromScale['6_cpc_scale'];
	
	$selToScale=mysql_query("SELECT 6_cpc_scale FROM scale WHERE id='".$pro_to_scale."'");
	$resToScale=mysql_fetch_array($selToScale);
	
	$temp['to_scale']=$resToScale['6_cpc_scale'];
	
	
	$selectFromGroup=mysql_query("SELECT group_col FROM group_col WHERE id='".$pro_frm_group."'");
	$resFromGroupCol=mysql_fetch_array($selectFromGroup);
	
	$temp['from_group']=$resFromGroupCol['group_col'];
	
	
	$selectToGroup=mysql_query("SELECT group_col FROM group_col WHERE id='".$pro_to_group."'");
	$resToGroupCol=mysql_fetch_array($selectToGroup);
	
	$temp['to_group']=$resToGroupCol['group_col'];
	
	
	$selectFromStation=mysql_query("SELECT stationdesc FROM station WHERE id='".$pro_frm_station."'");
	$resFromStation=mysql_fetch_array($selectFromStation);
	
	$temp['from_station']=$resFromStation['stationdesc'];
	
	$selectToStation=mysql_query("SELECT stationdesc FROM station WHERE id='".$pro_to_station."'");
	$resToStation=mysql_fetch_array($selectToStation);
	
	$temp['to_station']=$resToStation['stationdesc'];
	
	$selectFromOtherStation=mysql_query("SELECT stationdesc FROM station WHERE id='".$pro_frm_othr_station."'");
	$resFromOtherStation=mysql_fetch_array($selectFromOtherStation);
	
	$temp['from_other_station']=$resFromOtherStation['stationdesc'];
	
	$selectToOtherStation=mysql_query("SELECT stationdesc FROM station WHERE id='".$pro_to_othr_station."'");
	$resToOtherStation=mysql_fetch_array($selectToOtherStation);
	
	$temp['to_other_station']=$resToOtherStation['stationdesc'];
	
	$selectFromBillUnit=mysql_query("SELECT billunit FROM billunit WHERE id='".$pro_frm_billunit."'");
	$resFromBillUnit=mysql_fetch_array($selectFromBillUnit);
	
	$temp['from_billunit']=$resFromBillUnit['billunit'];
	
	$selectToBillUnit=mysql_query("SELECT billunit FROM billunit WHERE id='".$pro_to_billunit."'");
	$resToBillUnit=mysql_fetch_array($selectToBillUnit);
	
	$temp['to_billunit']=$resToBillUnit['billunit'];
	
	
	
	$selectFromDepot=mysql_query("SELECT DESCRIPTION FROM depot WHERE id='".$pro_frm_depot."'");
	$resFromDepot=mysql_fetch_array($selectFromDepot);
	
	$temp['from_depot']=$resFromDepot['DESCRIPTION'];
	
	
	$selectToDepot=mysql_query("SELECT DESCRIPTION FROM depot WHERE id='".$pro_to_depot."'");
	$resToDepot=mysql_fetch_array($selectToDepot);
	
	$temp['to_depot']=$resFromDepot['DESCRIPTION'];
	
	$selectProOrderType=mysql_query("SELECT type FROM order_type_transfer WHERE id='".$ProOrderType."'");
	$resProOrderType=mysql_fetch_array($selectProOrderType);
	
	$temp['Order_type']=$resProOrderType['type'];
	
	array_push($response,$temp);

echo json_encode($response);
}


?>