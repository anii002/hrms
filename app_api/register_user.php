<?php 

/*
  @author Dishank Kadam
 
 */

require_once 'DB_function.php'; 
require_once 'DB_connect.php';
$db=new DB_Connect();
$db1 = new DB_Function(); 

// json response array
$response = array("error" => FALSE); 

if (isset($_REQUEST['name']) && isset($_REQUEST['pfNo'])&&isset($_REQUEST['desig']) &&isset($_REQUEST['mobile'])&&isset($_REQUEST['dept'])&&isset($_REQUEST['billunit'])&&isset($_REQUEST['station'])
&&isset($_REQUEST['dob'])&&isset($_REQUEST['doa'])&&isset($_REQUEST['basicpay'])&&isset($_REQUEST['seventhpay'])&&isset($_REQUEST['pass'])&&isset($_REQUEST['empType'])) { 


    // receiving the post params
    $name = $_REQUEST['name']; 
    $pfno = $_REQUEST['pfNo']; 
    $desig = $_REQUEST['desig']; 
	$mobile_no=$_REQUEST['mobile'];
	$dept=$_REQUEST['dept'];
	$billunit=$_REQUEST['billunit'];
	$station=$_REQUEST['station'];
	$dob=$_REQUEST['dob'];
	$doa=$_REQUEST['doa'];
	$basicpay=$_REQUEST['basicpay'];
	$seventhpay=$_REQUEST['seventhpay'];
	$pass=$_REQUEST['pass'];
	$empType=$_REQUEST['empType'];
	
	
	
// 	$db->pension_connect1();
	
    // check if user is already existed with the same email
    if($db1->isUserExisted($pfno))
	{
		//user Already Existed
		$response["error"]=TRUE;
		$response["error_msg"]="User Already Existed with PF No: ".$pfno;
		echo json_encode($response);
	}else
		{ 
		    
		    $db->hrms_sur_connect();
				$selectDesig=mysql_query("SELECT DESIGCODE FROM designations WHERE DESIGLONGDESC='".$desig."'");
											$resDesig=mysql_fetch_array($selectDesig);
											
											$desig=$resDesig['DESIGCODE'];
											
											$selectDept=mysql_query("SELECT DEPTNO FROM department WHERE DEPTDESC='".$dept."'");
											$resDept=mysql_fetch_array($selectDept);
											
											$dept=$resDept['DEPTNO'];
											
											
                                            $selectStation=mysql_query("SELECT stationcode FROM station WHERE stationdesc='".$station."'");
											$resStation=mysql_fetch_array($selectStation);
											
							           		$station=$resStation['stationcode'];
							           		
							           				  //  $db->hrms_connect();

				// create a new user
				$user = $db1->storeUser($name,$pfno,$mobile_no,$desig,$dept, $billunit,$station,$dob,$doa,$basicpay,$seventhpay,$pass,$empType);
				$response["error"] = FALSE; 
					$response["error_msg"]="Registration Successfull...";
					echo json_encode($response); 
				if ($user) { 
					$response["error"] = FALSE; 
					$response["error_msg"]="Registration Successfull...";
					echo json_encode($response); 
				// 	$db->sendEmail($name,$email,$password); 
					// user stored successfully
					
				// 	$response["uid"] = $user["unique_id"]; 
				// 	$response["user"]["username"] = $user["username"]; 
				// 	$response["user"]["email_id"] = $user["email_id"]; 
				// 	$response["user"]["created_at"] = $user["created_at"]; 
					//$response["user"]["updated_at"] = $user["updated_at"]; 
					
				}
					else { 
						// user failed to store
						$response["error"] = TRUE; 
						$response["error_msg"] = "Unknown error occurred in registration!"; 
						echo json_encode($response); 
					} 
    } 
}  else { 
    $response["error"] = TRUE; 
    $response["error_msg"] = "Required parameters (name, email or password) is missing!"; 
    echo json_encode($response); 
} 
?>

