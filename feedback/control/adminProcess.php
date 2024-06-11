<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();
error_reporting(0);
include('../dbcon.php');


include('adminFunction.php');
  switch($_REQUEST['action'])
  {

    case 'fetch_employee_details':
        $id = $_REQUEST['id'];
          echo fetch_employee_details($id);
    break;  

    case 'add_feedback':
      $empid        = $_POST['empid1'];
      $feedback     = $_POST['feedback'];
      $suggestion   = $_POST['suggestion'];
      $date=date('d/m/Y');
     
        $dir = "doc/";
        $file_extension = array("pdf", "doc", "docx", "jpg", "jpeg", "png", "txt");
        $file_size= array();

        //echo $_FILES["attach"]["name"];
          if($_FILES["attach"]["name"] != null)
          {
            $data = explode(".", $_FILES["attach"]["name"]);
            $file = rand().".".$data[1];
            //$PATH = $dir.$_FILES["attach"]["name"];
            $filepath = $dir.$file;
            // $filepath = $dir.$_FILES["attach"]["name"];
            $ext=explode(".", $file);

            if(in_array($ext[1], $file_extension)) 
            {
              move_uploaded_file($_FILES["attach"]["tmp_name"],$dir.$file);  
            }          
          }

        dbcon2();
         //echo "INSERT INTO `feedback`(`pfno`, `feedback`, `suggestion`,`status`, `created_date`, `file`) VALUES ('$empid','$feedback','$suggestion','0','$date','$filepath')";
         
        // exit();
          $query = mysql_query("INSERT INTO `feedback`(`pfno`, `feedback`, `suggestion`,`status`, `created_date`, `file`) VALUES ('$empid','$feedback','$suggestion','0','$date','$file')");
          echo mysql_error();
          // echo mysql_error();
          if($query)
          {
          echo "<script>alert('Successfully Submitted feedback...');window.location='../view_feedback.php';</script>";
          }
          else
          {
         echo "<script>alert('Failed to Submit...');window.location='../add_feedback.php';</script>";
          }


    break;
    case 'updatefeedback':
        $id = $_REQUEST['id'];
        $reply = $_REQUEST['reply'];
        $date=date('d/m/Y h:i:s');
        $data="0";
        dbcon2();
        $sql=mysql_query("UPDATE `feedback` SET `reply`='".$reply."',`status`='1',`updated_date`='".$date."' WHERE id='".$id."'");
        if($sql)
        {
            $data="1"; 
        }
        else {
             $data="0";
          }
        echo $data;
    break;
  }

?>
