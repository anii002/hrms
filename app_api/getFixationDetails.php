<?php


require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid']))
{
	
	$empid=$_REQUEST['empid'];
	$db->sr_connect();
$selectBiodata=mysql_query("SELECT * FROM prft_fixation_temp WHERE fix_pf_no='".$empid."'");
$val=mysql_fetch_array($selectBiodata);


	$temp=array();
	
	$temp['pfNumber']=$val['fix_pf_no'];
	$revOrderType=$val['fix_order_type'];
	$temp['pro_letter_no']=$val['fix_letter_no'];
	$temp['pro_letter_date']=$val['fix_letter_date'];
	$temp['pro_wef']=$val['fix_wef'];
	
	$rev_frm_scale=$val['fix_frm_ps_type'];
	$rev_to_scale=$val['fix_to_ps_type'];
	$temp['pro_frm_level']=$val['fix_frm_level'];
	$temp['pro_to_level']=$val['fx_to_level'];
	$temp['pro_frm_scale']=$val['fix_frm_scale'];
	$temp['pro_to_scale']=$val['fix_to_scale'];
	
	
	
	$temp['pro_frm_rop']=$val['fix_frm_rop'];
	$temp['rop_to']=$val['fix_to_rop'];
	$temp['pro_carried_out_type']=$val['fix_carried_out_type'];
	$temp['pro_carri_wef']=$val['fix_carri_wef'];
	$temp['pro_carri_date_of_incr']=$val['fix_carri_date_of_incr'];
	
	$db->sr_new_connect();
	
	
	
	
	
	$selFromScale=mysql_query("SELECT type FROM pay_scale_type WHERE id='".$rev_frm_scale."'");
	$resFromScale=mysql_fetch_array($selFromScale);
	
	$temp['from_scale']=$resFromScale['type'];
	
	$selToScale=mysql_query("SELECT type FROM pay_scale_type WHERE id='".$rev_to_scale."'");
	$resToScale=mysql_fetch_array($selToScale);
	
	$temp['to_scale']=$resToScale['type'];
	
	
	
	
	
	
	
	
	
	
	
	$selectrevOrderType=mysql_query("SELECT type FROM order_type_fixation WHERE id='".$revOrderType."'");
	$resrevOrderType=mysql_fetch_array($selectrevOrderType);
	
	$temp['Order_type']=$resrevOrderType['type'];
	
	array_push($response,$temp);

echo json_encode($response);
}


?>