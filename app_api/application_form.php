<?php
include("DB_connect.php");
//insi_set('display_errors',1);
//error_reporting(E_ALL);
 $type = "";
 $data = array();
 $db = new DB_Connect();

 $db->eApplication_connect();

$pfno = $_POST['pfno'];
$bill_unit = $_POST['bill_unit'];
$purpose = $_POST['purpose'];
$doc = $_FILES['doc'];

$date = date('Y-m-d');

$name = $_POST['name'];
$fileinfo = pathinfo($_FILES['doc']['name']);
$extention= $fileinfo['extension'];
$server_ip = gethostbyname(gethostname());


$file_path1 = 'upload/'.$name.'.'.$extention; 

  if(move_uploaded_file($_FILES['doc']['tmp_name'],$file_path1))
 {
    $insert = "insert into add_application(pfno,billunit,purpose,created_date,file,remark) values('$pfno','$bill_unit','$purpose','$date','$file_path1','')";
    mysql_query($insert);
    $data['sucess'] = true;
    $data['messages']  = 'Application Submitted Sucessfully';
 }
  else {
    $data['sucess'] = false;
    $data['messages']  = 'failed to upload document';
 }

echo json_encode($data);
mysql_close();

?>

