<?php
 include "DB_connect.php";
 include "DB_function.php";
 $emp_id = $_POST['emp_id'];
  mysql_close();
 $db = new DB_Connect();
 $db->eApplication_connect();
 
  $db_func = new DB_Function();

 
$form_details= $db_func->fetch_form($emp_id);
 
 echo json_encode($form_details);
 
?>