<?php


require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['empid']))
{
	
	$empid=$_REQUEST['empid'];
	$db->sr_connect();
$selectBiodata=mysql_query("SELECT * FROM lastentry_temp WHERE pf_number='".$empid."'");
$val=mysql_fetch_array($selectBiodata);

	function changeValue($value)
{
    if($value=='')
    {
        return $value='';
    }else
    {
        return $value;
    }
}

	$temp=array();
	
	$temp['pfNumber']=changeValue($val['pf_number']);
	$temp['date_of_join']=changeValue($val['date_of_join']);
	$retire_type=changeValue($val['retire_type']);
	$temp['retire_date']=changeValue($val['retire_date']);
	$temp['retire_designation']=changeValue($val['retire_designation']);
	$temp['department']=changeValue($val['department']);
	$temp['station']=changeValue($val['station']);
	$temp['rop']=changeValue($val['rop']);
	$temp['bill_unit']=changeValue($val['bill_unit']);
	$temp['scale']=changeValue($val['scale']);
	$temp['depot']=changeValue($val['depot']);
	$temp['total_years']=changeValue($val['total_years']);
	$temp['total_months']=changeValue($val['total_months']);
	$temp['total_days']=changeValue($val['total_days']);
	$temp['no_years']=changeValue($val['no_years']);
	$temp['no_months']=changeValue($val['no_months']);
	$temp['no_days']=changeValue($val['no_days']);
	$temp['lap']=changeValue($val['lap']);
	$temp['lhap']=changeValue($val['lhap']);
	$temp['advance_leave']=changeValue($val['advance_leave']);
	$db->sr_new_connect();
	

	
	$SelectretireType=mysql_query("SELECT retirement_type FROM retirement_type WHERE id='".$retire_type."'");
	$resRetireType=mysql_fetch_array($SelectretireType);
	
	$temp['retirement_type']=changeValue($resRetireType['retirement_type']);
	
	
	
	
	array_push($response,$temp);

echo json_encode($response);



}


?>