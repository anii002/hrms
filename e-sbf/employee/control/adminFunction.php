<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();
session_start();
include("../../dbconfig/dbcon.php");
include("function.php");

function add_file($name_array, $tmp_name_array, $reference_id)
{
//print_r($name_array);exit();
  
 $pf_no = $_SESSION['username'];

  if (!empty($name_array)) 
  { 
    if(!dir('../../uploads/'))
    {
      mkdir('../../uploads/', 0777, true);
    }

    if(!dir('../../uploads/'.$pf_no))
    {
      mkdir('../../uploads/'.$pf_no, 0777, true);
    }

    $path = "../../uploads/$pf_no/";
    $created_at = date('Y-m-d H:i:s');
   /* echo "<pre>";
print_r($name_array);exit();*/
      for ($i = 0; $i < count($tmp_name_array); $i++) 
      {
      $file = $path.$name_array[$i];
      
        if (move_uploaded_file($tmp_name_array[$i], $path.$file)) 
        {        
          $conn=dbcon();
        
          $sql_img = mysqli_query($conn,"INSERT INTO tbl_doc(reference_id, files, created_at) VALUES('$reference_id', '$file', '$created_at')");       
        }      
          
      }
        if($sql_img)
        { 
            return true;
        }
        else
        {
            return false;
        }
      
}
}

function add_file1($name_array, $tmp_name_array, $reference_id)
{
//print_r($reference_id);exit();
  
 $pf_no = $_SESSION['username'];

  if (!empty($name_array)) 
  { 
    if(!dir('../../uploads/'))
    {
      mkdir('../../uploads/', 0777, true);
    }

    if(!dir('../../uploads/'.$pf_no))
    {
      mkdir('../../uploads/'.$pf_no, 0777, true);
    }

    $path = "../../uploads/$pf_no/";
    $created_at = date('Y-m-d H:i:s');
   /* echo "<pre>";
print_r($name_array);exit();*/
      for ($i = 0; $i < count($tmp_name_array); $i++) 
      {
      $file = $path.$name_array[$i];

        if (move_uploaded_file($tmp_name_array[$i], $path.$file)) 
        {        
          $conn=dbcon();
        
          $sql_img = mysqli_query($conn,"INSERT INTO tbl_doc (reference_id, files) VALUES ('$reference_id', '$file')");       
        }      
          
      }
        if($sql_img)
        { 
            return true;
        }
        else
        {
            return false;
        }
      
}
}



?>
