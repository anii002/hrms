<?php


require_once 'DB_connect.php';
$db=new DB_Connect();
$response=array();
if(isset($_REQUEST['department'])&&isset($_REQUEST['doa']))
{
	$db->selection_calendar_connect();
	$dept=$_REQUEST['department'];
	$dept1=str_replace('_',' ',$dept);
	$selectDep=mysql_query("SELECT id FROM department WHERE dept='".$dept."'");
	$resDepId=mysql_fetch_array($selectDep);
	$doa=$_REQUEST['doa'];
$selectReport=mysql_query("SELECT * FROM post_schedule WHERE dept='".$resDepId['id']."' AND date_of_ass='".$doa."'");
$val=mysql_fetch_array($selectReport	);


	$temp=array();
	$department=$val['dept'];
	$temp['date_of_ass']=$val['date_of_ass'];
	$temp['date_of_noti']=$val['date_of_noti'];
	$temp['date_of_exam']=$val['date_of_exam'];
	$temp['date_of_panel']=$val['date_of_panel'];
	$temp['updated_by']=$val['updated_by'];
	$temp['date_time']=$val['date_time'];
	$category=$val['category'];
	$level_of_pay=$val['level_of_pay'];
	$mode_of_filling=$val['mode_of_filling'];
	$temp['ss']=$val['ss'];
	$temp['mor']=$val['mor'];
	$temp['vac']=$val['vac'];
	$temp['vac_in_hg']=$val['vac_in_hg'];
	$temp['utrg']=$val['utrg'];
	$temp['netvac']=$val['netvac'];
	$temp['completed_ass_date']=$val['completed_ass_date'];
	$temp['completed_date_of_noti']=$val['completed_date_of_noti'];
	$temp['notification_ref']=$val['notification_ref'];
	$temp['completed_date_exam']=$val['completed_date_exam'];
	$temp['completed_date_panel']=$val['completed_date_panel'];
	$temp['panel_ref']=$val['panel_ref'];
	$temp['action_plan']=$val['action_plan'];
	
	$selectLevel=mysql_query("SELECT level FROM seventh WHERE id='".$level_of_pay."'");
	$resLevel=mysql_fetch_array($selectLevel);
	$temp['level_of_pay']=$resLevel['level'];
	
	$selectCat=mysql_query("SELECT categary FROM category_new WHERE id='".$category."'");
	$resCatId=mysql_fetch_array($selectCat);
	$temp['category']=$resCatId['categary'];
	
	$selectMOF=mysql_query("SELECT mode_of_fill FROM mode_of_fill WHERE id='".$mode_of_filling."'");
	$resMOF=mysql_fetch_array($selectMOF);
	$temp['mode_of_fill']=$resMOF['mode_of_fill'];
	
	$selectDept=mysql_query("SELECT dept FROM department WHERE id='".$department."'");
	$resDept=mysql_fetch_array($selectDept);
	$temp['dept']=$resDept['dept'];
	
	
	
	
	array_push($response,$temp);

echo json_encode($response);
}


?>