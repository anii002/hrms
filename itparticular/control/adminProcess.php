<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include('../dbcon.php');


include('adminFunction.php');
  switch($_REQUEST['action'])
  {

    case 'fetchEmployee1':
        $id = $_REQUEST['id'];
          echo fetchEmployee1($id);
    break;  

   
    
    
    case 'it_perticular':
      $year  = $_POST['year'];

      $name_array = "";
      $tmp_name_array = "";
      $cnt = 0;
      // if ($_FILES['upfile']['error'][0] != 4) {
        $cnt = count($_FILES['upfile']['name']);
        for ($i = 0; $i < $cnt; $i++) {
          $name_array[$i] = $_FILES['upfile']['name'][$i];
          $tmp_name_array[$i] = $_FILES['upfile']['tmp_name'][$i];
        }
      // }
      if (add_file($name_array, $tmp_name_array, $year)) {
         echo "<script>window.location.href='../view_it_perticular.php';alert('Document has been added');</script>";
      } else {
         echo "<script>window.location.href='../add_it_perticular.php';alert('Document Not Inserted');</script>";
      }
    break;
    
      case 'deleteit':
        $delete_id = $_REQUEST['id'];
          if(deleteit($delete_id))
            echo "IT-PERTICULAR Deleted successfully";
          else
            echo "Something went wrong";
    break;

 }
?>
