<?php


require_once 'DB_connect.php';
$db=new DB_Connect();


$response=array();

$db->selection_calendar_connect();
switch($_REQUEST['req'])
{
	case 'department':
					$dept=$_REQUEST['department'];
					$dept1=str_replace('_',' ',$dept);
					getDeptWiseReport($dept1);
					break;
	case 'category':
					$cat=$_REQUEST['category'];
					$cat1=str_replace('_',' ',$cat);
					getCatWiseReport($cat1);
					break;
	case 'deptCat':
					$dept=$_REQUEST['department'];
					$cat=$_REQUEST['category'];
					$dept1=str_replace('_',' ',$dept);
					$cat1=str_replace('_',' ',$cat);
					getDeptCatWiseReport($dept1,$cat1);
					break;
		
}
function getDeptWiseReport($dept)
{
	global $response;
	//$dept=$_REQUEST['department'];
	//$response=array();
	//$db->selection_calendar_connect();
	$selectDep=mysql_query("SELECT id FROM department WHERE dept='".$dept."'");
	$resDepId=mysql_fetch_array($selectDep);
	
	
	
	
	
	
	
$selectBiodata=mysql_query("SELECT dept,date_of_ass,date_of_noti,date_of_exam,date_of_panel,updated_by,date_time FROM post_schedule WHERE dept='".$resDepId['id']."'");

while($val=mysql_fetch_array($selectBiodata)){


	$temp=array();
	
	$department=$val['dept'];
	$temp['date_of_ass']=$val['date_of_ass'];
	$temp['date_of_noti']=$val['date_of_noti'];
	$temp['date_of_exam']=$val['date_of_exam'];
	$temp['date_of_panel']=$val['date_of_panel'];
	$temp['updated_by']=$val['updated_by'];
	$temp['date_time']=$val['date_time'];
	
	$selectDept=mysql_query("SELECT dept FROM department WHERE id='".$department."'");
	$resDept=mysql_fetch_array($selectDept);
	$temp['dept']=$resDept['dept'];
	
	
	array_push($response,$temp);
}
echo json_encode($response);
}
function getCatWiseReport($cat)
	{
		//
		//$response=array();
		global $response;
	$selectCat=mysql_query("SELECT id FROM category_new WHERE categary='".$cat."'");
	$resCatId=mysql_fetch_array($selectCat);
	//echo $resCatId['id'];
	
		$selectBiodata=mysql_query("SELECT dept,date_of_ass,date_of_noti,date_of_exam,date_of_panel,updated_by,date_time FROM post_schedule WHERE category='".$resCatId['id']."'");
		
while($val=mysql_fetch_array($selectBiodata)){


	$temp=array();
	
	$department=$val['dept'];
	$temp['date_of_ass']=$val['date_of_ass'];
	$temp['date_of_noti']=$val['date_of_noti'];
	$temp['date_of_exam']=$val['date_of_exam'];
	$temp['date_of_panel']=$val['date_of_panel'];
	$temp['updated_by']=$val['updated_by'];
	$temp['date_time']=$val['date_time'];
	
	$selectDept=mysql_query("SELECT dept FROM department WHERE id='".$department."'");
	$resDept=mysql_fetch_array($selectDept);
	$temp['dept']=$resDept['dept'];
	
	
	array_push($response,$temp);
}
echo json_encode($response);
}
function getDeptCatWiseReport($dept,$cat)
{
		
		//$response=array();
		global $response;
		$selectDep=mysql_query("SELECT id FROM department WHERE dept='".$dept."'");
		$resDepId=mysql_fetch_array($selectDep);
	
		
		$selectCat=mysql_query("SELECT id FROM category_new WHERE categary='".$cat."'");
		$resCatId=mysql_fetch_array($selectCat);
		//echo $resCatId['id'];
		
	//	echo $resDepId['id'];
		$selectBiodata=mysql_query("SELECT dept,date_of_ass,date_of_noti,date_of_exam,date_of_panel,updated_by,date_time FROM post_schedule WHERE dept='".$resDepId['id']."' AND category='".$resCatId['id']."'");
			while($val=mysql_fetch_array($selectBiodata)){


				$temp=array();
				
				$department=$val['dept'];
				$temp['date_of_ass']=$val['date_of_ass'];
				$temp['date_of_noti']=$val['date_of_noti'];
				$temp['date_of_exam']=$val['date_of_exam'];
				$temp['date_of_panel']=$val['date_of_panel'];
				$temp['updated_by']=$val['updated_by'];
				$temp['date_time']=$val['date_time'];
				
				$selectDept=mysql_query("SELECT dept FROM department WHERE id='".$department."'");
				$resDept=mysql_fetch_array($selectDept);
				$temp['dept']=$resDept['dept'];
				
				
				array_push($response,$temp);
			}
			echo json_encode($response);
	
}

?>