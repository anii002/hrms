<?php
include("DB_connect.php");
//insi_set('display_errors',1);
//error_reporting(E_ALL);
 $type = "";
 $data = array();
 $db = new DB_Connect();

 $db->feedback_connect();


$doc = $_FILES['doc'];

$date = date('Y-m-d');

$pfNo=$_REQUEST['pfNo'];
$suggestion=$_REQUEST['suggestion'];
$feedback=$_REQUEST['feedback'];
$name = $_POST['name'];
$fileinfo = pathinfo($_FILES['doc']['name']);
$extention= $fileinfo['extension'];
$server_ip = gethostbyname(gethostname());


	$imgPath1=$_FILES['doc']['name'];
	$imgTemp1=$_FILES['doc']['tmp_name'];
// $file_path1 = 'upload/'.$name.'.'.$extention; 

 date_default_timezone_set("Asia/Kolkata");
		$now=Date('d-m-Y');
     
     $dir = "../feedback/control/doc/";
     
     
     
        $file_extension = array("pdf", "doc", "docx", "jpg", "jpeg", "png", "txt");
        $file_size= array();
        $filepath="";
     //echo $_FILES["attach"]["name"];
          if($_FILES["doc"]["name"] != null)
          {
              
              move_uploaded_file($imgTemp1, $dir.$imgPath1);
              
                 
          }
     
    $insert = "INSERT INTO `feedback` (`pfno`, `feedback`, `suggestion`, `status`, `created_date`, `file`) VALUES ('$pfNo', '$feedback', '$suggestion', '0', '$now','$imgPath1')";
     
     
    //  "insert into add_application(pfno,billunit,purpose,created_date,file,remark) values('$pfno','$bill_unit','$purpose','$date','$file_path1','')";
    mysql_query($insert);
     if($insert)
 {
    $data['error'] = true;
    $data['message']  = 'Application Submitted Sucessfully';
    echo json_encode($data);
mysql_close();
 }
  else {
    $data['error'] = false;
    $data['message']  = 'failed to upload document'.mysql_error();
    echo json_encode($data);
mysql_close();
 }



?>

