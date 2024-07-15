<?php
date_default_timezone_set("Asia/kolkata");
include('function.php'); 
session_start();
//adminProcee requests

function fetchEmployee1($id)
{
  //global $con;
  dbcon2();
  $query = "select * from register_user where emp_no = '$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
      $data['empid']=$value['emp_no'];
      $data['empname']=$value['name'];
      $data['billunit']=$value['bill_unit'];
      $data['phoneno']=$value['mobile'];
      $data['email2']=$value['emp_email'];
      $data['dept']=getdepartment($value['department']);
      $data['desigcode']=$value['designation'];
      $data['pc7_level']=$value['7th_pay_level'];
      return json_encode($data);

}

function deleteit($id)
{
  global $con;
  dbcon2();
  $query = "delete from tblpdfread where id='$id'";
  $result = mysql_query($query);
  if($result)
    return true;
  else
    return false;
}

function add_file($name_array, $tmp_name_array, $year)
{
  global $con;
  $flag = 0; 
 
  if (!empty($name_array)) 
  { 
       $folder_name = "../../uploads/$year/";
        if (!file_exists($folder_name)) {
             mkdir($folder_name, $year);
        }
      for ($i = 0; $i < count($tmp_name_array); $i++) 
      {
        $temp = explode(".", $name_array[$i]);
        $file_ext = strtolower(end($temp));
        // $expensions = array("pdf", "doc", "docx", "jpg", "jpeg", "png", "txt");
        //$folder_name = "doc/";
        // $folder_name = "../../uploads/2018-2019/";
        // $folder_name1 = "2018-2019/";
        // if (in_array($file_ext, $expensions) == false) 
        // {
        //     return false;
        // }
     
        // $newfilename = rand(10000, 999999) . '.' . $file_ext;
        $file=$folder_name . $name_array[$i];
      
        if (move_uploaded_file($tmp_name_array[$i], $file)) 
        {
              $s = split("_", $name_array[$i]);
              foreach ($s as $key => $value) 
              {
  
                if ($key == 1) 
                {
                      $filename = $value;
                       "<br>filename=>$filename";
                      $pfno = substr_replace($filename, "", -4);
                       "<br>pfno=>$pfno";
                      // $path = "upload/$filename";
                      // echo "<br>path=>$pathname";
                      dbcon2();
                      //echo "insert into tblpdfread(pfno,year,path) values ('$pfno','$year','$file')";
                      $sql_img = mysql_query("insert into tblpdfread(pfno,year,path) values ('$pfno','$year','$file')");
                    if($sql_img)
                    { 
                        $flag++;
                    }
                    else
                    {
                        return false;
                    }
                 }          
                }
          }      
          else
          {
            return false;
          }
      }
      if($flag == 0)
      {
        return false;
      }
      else
      {
        return true; 
      }
}
}
?>
