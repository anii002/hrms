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

    case 'fetchEmployee2':
        $id = $_REQUEST['id'];
          echo fetchEmployee2($id);
    break; 

    case 'fetchuser':
        $id = $_REQUEST['id'];
          echo fetchuser($id);
    break;

    case 'fetchuseremp':
        $id = $_REQUEST['id'];
          echo fetchuseremp($id);
    break;  
    
    case 'fetch_employee_details':
        $id = $_REQUEST['id'];
          echo fetch_employee_details($id);
    break;
    
    case 'add_application':
      $empid       = $_POST['empid1'];
      $purpose     = $_POST['purpose'];
      $user        = $_POST['user'];
      $billunit    = $_POST['billunit'];
      $description = $_POST['description'];
      $date = date('Y-m-d H:i:s');
     
        $dir = "doc/";
        $file_extension = array('jpg','png','gif','pdf');
        $file_size= array();

        //echo $_FILES["attach"]["name"];

         $data = explode(".", $_FILES["attach"]["name"]);
         $file = rand().".".$data[1];
         //$PATH = $dir.$_FILES["attach"]["name"];
        $filepath = $dir.$file;
         $ext=explode(".", $file);

        //   if(in_array($ext[1], $file_extension)) 
        //   {
                 if(move_uploaded_file($_FILES["attach"]["tmp_name"],$dir.$file))
                  {
            
                     dbcon3();
                      $query = mysql_query("INSERT INTO `add_application`(`pfno`,`billunit`,`purpose`, `created_date`, `file`, `description`) VALUES ('$empid','$billunit','$purpose','$date','$filepath','$description')");
                      $query_fetch = mysql_query("SELECT application_id FROM add_application ORDER BY application_id DESC");
                      $row_appli = mysql_fetch_array($query_fetch);
                      dbcon3();
                      $query_forward = mysql_query("INSERT INTO `forward_appl`(`appli_id`, `pfno`, `forwarded_to`, `forward_status`, `arrived_at_admin`, `admin_status`) VALUES ('".$row_appli['application_id']."','$empid','$user','1','$date','0')");
                      echo mysql_error();
                      if($query && $query_forward)
                      {
                      echo "<script>alert('successfully forwarded to Admin...');window.location='../view_application.php';</script>";
                      }
                      else
                      {
                      echo "<script>alert('Failed to Forward...');window.location='../add_application.php';</script>";
                      }
                
                  }
                 else
                   {
                      echo  "<script>alert('Failed To Upload DOC...');window.location='../add_application.php';</script>";
                   } 
          // }
           
    break;

    case 'add_purpose':
    $purpose =  $_POST['purpose'];
    // $station  = $_POST['station'];
    dbcon3();
    $query = mysql_query("INSERT INTO `purpose`(`purpose`) VALUES ('$purpose')");
    if($query)
    {
      echo "<script>alert('Subject Added Successfully...');window.location='../add_purpose.php';</script>";
    }
    else
    {
      echo "<script>alert('Not Added Successfully...');window.location='../add_purpose.php';</script>";
    }
    // echo mysql_error();
    break;

    case 'update_purpose':
          $id          = $_REQUEST['purpose_id'];
          $purpose     = $_REQUEST['purpose'];
          // $station     = $_REQUEST['station'];

            if(update_purpose($id,$purpose))
            {
              echo "<script>alert('Subject details updated successfully');window.location='../add_purpose.php';</script>";
            }
            else
            {
              echo "<script>alert('Subject details not updated');window.location='../add_purpose.php';</script>";
            }
    break;

    case 'deletepurpose':
        $delete_id = $_REQUEST['id'];
          if(deletepurpose($delete_id))
            echo "Subject Deleted successfully";
          else
            echo "Something went wrong";
    break;

   // case 'update_application':
   //    $id   = $_POST['application_id'];
   //    $purpose = $_POST['purpose'];
   //    $date = date('Y-m-d H:i:s');
     
   //      $dir = "doc/";
   //      $file_extension = array('jpg','png','gif','pdf');
   //      $file_size= array();

   //      //echo $_FILES["attach"]["name"];

   //       $data = explode(".", $_FILES["attach"]["name"]);
   //       $file = rand().".".$data[1];
   //       //$PATH = $dir.$_FILES["attach"]["name"];
   //      $filepath = $dir.$file;
   //       $ext=explode(".", $file);

   //         if(in_array($ext[1], $file_extension)) 
   //         {
   //               if(move_uploaded_file($_FILES["attach"]["tmp_name"],$dir.$file))
   //                {
            
   //                   dbcon3();
   //                    $query = mysql_query("UPDATE `add_application` SET `purpose`='$purpose',`created_date`='$date',`file`='$filepath' WHERE application_id = '$id'");
   //                    // echo mysql_error();
   //                    if($query)
   //                    {
   //                    echo "<script>alert('Applicaiton Updated Successfully...');window.location='../view_application.php';</script>";
   //                    }
   //                    else
   //                    {
   //                    echo "<script>alert('Not Updated Successfully...');window.location='../view_application.php';</script>";
   //                    }
                
   //                }
   //               else
   //                 {
   //                    echo  "<script>alert('Failed To Upload DOC...');window.location='../view_application.php';</script>";
   //                 } 
   //         }
   //         else
   //         {
   //            echo  "<script>alert('Invalid Format...');window.location='../view_application.php';</script>";
   //         }
   //  break;
    case 'forward_clerk':
          // $application_id = $_POST['app_id'];
        // print_r($_REQUEST);
          $user           = $_POST['user'];
          $application_id  = $_REQUEST['app_id'];
          // print_r($application_id);
          $date = date('Y-m-d H:i:s');
          $application_ids = explode(",", $application_id);
          // print_r($application_ids);

          dbcon3();
          foreach ($application_ids as $key => $value) {
            # code...
            $query = mysql_query("UPDATE `forward_appl` SET admin_status='1',`forwarded_to_clerk`='$user',`arrived_time`='$date',`clerk_status`='0' WHERE appli_id = '$value'");
          // echo mysql_error();
                      if($query)
                      {
                        echo "successfully forwarded to BillUnit Clerk...";
                      }
                      else
                      {
                        echo "Failed to Forward...";
                      }
          }
           
    break;
    case 'forward_cos':
          $empid          = $_POST['empid'];
          $application_id = $_POST['application_id'];
          $user           = $_POST['user'];
          $remark         = $_POST['remark'];
          $date = date('Y-m-d H:i:s');

          dbcon3();
          $query_remark = mysql_query("UPDATE `add_application` SET `remark`='$remark' WHERE application_id = '$application_id'");
          dbcon3();
          $query = mysql_query("UPDATE `forward_appl` SET `clerk_status`='1',`approved_time`='$date',`forwarded_to_cos`='$user',`cos_status`='0' WHERE appli_id = '$application_id'");
          echo mysql_error();
                      if($query && $query_remark)
                      {
                      echo "<script>alert('successfully forwarded to Chief OS...');window.location='../approved_application.php';</script>";
                      }
                      else
                      {
                      echo "<script>alert('Failed to Forward...');window.location='../pending_application.php';</script>";
                      }
    break;
    case 'cos_close':
          // $empid          = $_POST['empid'];
          $application_id = $_POST['application_id'];
        
          $date = date('Y-m-d H:i:s');

          dbcon3();
          $query = mysql_query("UPDATE `forward_appl` SET `cos_status`='1',`cos_approved_time`='$date' WHERE appli_id = '$application_id'");
          echo mysql_error();
                      if($query)
                      {
                      echo "<script>alert('successfully Closed...');window.location='../approved_application_cos.php';</script>";
                      }
                      else
                      {
                      echo "<script>alert('Failed to Close...');window.location='../pending_application_cos.php';</script>";
                      }
    break;

     case 'deleteapplication':
        $delete_id = $_REQUEST['id'];
          if(deleteapplication($delete_id))
            echo "Applicaiton Deleted successfully";
          else
            echo "Something went wrong";
    break;

    // case 'add_user':
    // $empid        =  $_POST['empid'];
    // // $department   =  $_POST['department'];
    // $designation  =  $_POST['designation'];
    // $deptno       =  $_POST['deptno'];
    // $designo      =  $_POST['designo'];
    // // $bu           = implode(",",$_POST['bill_unit']);
    // // $dob       =  $_POST['dob'];
    // $dob          =   explode("/", $_POST['dob']);
    // $pass=$dob[0].$dob[1].$dob[2];
    // $hashPassword =  hashPassword($pass,SALT1,SALT2);
    // $role         =  $_POST['role'];
    // $station      = $_POST['station'];
    // dbcon3();
    // $query = mysql_query("INSERT INTO `add_user`(`user_pfno`, `user_dept_no`, `user_desig`, `user_role`, `user_station`, `status`, `user_psw`) VALUES ('$empid','$deptno','$designo','$role','$station','0','$hashPassword')");
    // if($query)
    // {
    //   echo "<script>alert('User Added Successfully...');window.location='../add_user.php';</script>";
    // }
    // else
    // {
    //   echo "<script>alert('Not Added Successfully...');window.location='../add_user.php';</script>";
    // }
    //  // echo mysql_error();
    // break;

     case 'deleteuser':
         $delete_id = $_REQUEST['id'];
           if(deleteuser($delete_id))
             echo "User Deleted successfully";
           else
             echo "Something went wrong";
     break;
     
      case 'update_user':
       $id         = $_POST['user_id1'];
       $bu         = implode(",",$_POST['billunit']);
       $role       = $_POST['role'];
       $description       = $_POST['description'];
            
      dbcon3();
        $query = mysql_query("UPDATE `add_user` SET `user_bu`='$bu',`user_role`='$role',`office_description`='$description' WHERE user_id = '$id'");
        echo mysql_error();
        if($query)
        {
        echo "<script>alert('User Updated Successfully...');window.location='../add_user.php';</script>";
        }
        else
        {
        echo "<script>alert('Not Updated Successfully...');window.location='../add_user.php';</script>";
        }
    break;
    
    case 'add_user':
    $empid        =  $_POST['empid'];
    $description  =  $_POST['description'];
    $designation  =  $_POST['designation'];
    $deptno       =  $_POST['deptno'];
    $designo      =  $_POST['designo'];
    // $bu           = implode(",",$_POST['bill_unit']);
    // $dob       =  $_POST['dob'];
    $dob          =   explode("/", $_POST['dob']);
    $pass=$dob[0].$dob[1].$dob[2];
    $hashPassword =  hashPassword($pass,SALT1,SALT2);
    $role         =  $_POST['role'];
    $station      = $_POST['station'];
    dbcon3();
    $query = mysql_query("INSERT INTO `add_user`(`user_pfno`, `user_dept_no`, `user_desig`, `user_role`, `user_station`, `status`, `user_psw`, `office_description`) VALUES ('$empid','$deptno','$designo','$role','$station','0','$hashPassword','$description')");

    dbcon2();
    $user_p_query = "SELECT pf_num,e_app from user_permission WHERE pf_num='" . $empid . "' ";
    $user_p_result = mysql_query($user_p_query);
    $user_p_cnt = mysql_num_rows($user_p_result);

    if ($user_p_cnt > 1) 
    {
      $user_p_rows = mysql_fetch_array($user_p_result);
      $eapp_rows = $user_p_rows['e_app'];
      $eapp_rows = ",.$role.";
      dbcon2();
      $sql_up = "UPDATE user_permission SET e_app ='" . $eapp_rows . "' WHERE pf_num='" . $empid . "' ";
      $result_up = mysql_query($sql_up);
    } 
    else 
    {
      dbcon2();
      $sql_up = "INSERT INTO user_permission (pf_num, e_app) VALUES ('" . $empid . "', '" . $role . "')";
      $result_up = mysql_query($sql_up);
    }

    if($query)
    {
      echo "<script>alert('User Added Successfully...');window.location='../add_user.php';</script>";
    }
    else
    {
      echo "<script>alert('Not Added Successfully...');window.location='../add_user.php';</script>";
    }
     // echo mysql_error();
    break;
    
    case 'sectionWiseSummaryReport':

    $associate_array_label = array();
    $associate_array = array();
    $asso_complied_array = array();
    $asso_pending_array = array();
    $asso_more_array = array();

    $section = implode(",", (array)$_REQUEST['section_wise']);
    $frm_date = $_REQUEST['frm_date'];
    $to_date = $_REQUEST['to_date'];
    $section_array = explode(",", $section);

    if (in_array(0, $section_array)) {
      // echo "done";
      dbcon3();
      $query = "select * from tbl_section";
      $rstSection = mysql_query($query);
      while ($rwSection = mysql_fetch_array($rstSection)) {
        // print_r($rwSection);
        $sec_id = $rwSection["sec_id"];
        if (!in_array($sec_id, $section_array)) {
          array_push($section_array, $sec_id);
        }
      }
       // print_r($section_array);
    }

    $array_count = count($section_array);
    for ($i = 0; $i < $array_count; $i++) {
      $associate_array_label[$section_array[$i]] = getSection($section_array[$i]);
      $associate_array[$section_array[$i]] = 0;
      $asso_complied_array[$section_array[$i]] = 0;
      $asso_pending_array[$section_array[$i]] = 0;
      $asso_more_array[$section_array[$i]] = 0;
      if ($i == 0) {
        if (in_array(0, $section_array)) {
          //$associate_array_label[$section_array[$i]] = "Temp";
        }
      }
    }
    
    // $grie_sql = "SELECT `curr_date`,`section` FROM tbl_dak,tbl_user WHERE tbl_dak.marked_to=tbl_user.emp_id and `curr_date` between '" . $frm_date . "' AND '" . $to_date . "'";
    // $result = mysql_query($grie_sql, $db_edak);

    dbcon3();
      $appln_sql = "SELECT tbl_section.sec_id FROM add_application,add_user,forward_appl,tbl_section WHERE forward_appl.forwarded_to_clerk = add_user.user_pfno AND add_application.application_id = forward_appl.appli_id AND add_application.created_date LIKE '%$frm_date%' AND add_application.created_date LIKE '%$to_date%' AND add_user.office_description = tbl_section.sec_name";

    $result = mysql_query($appln_sql);

    while ($data = mysql_fetch_assoc($result)) {
          // print_r($data);
      for ($i = 0; $i < $array_count; $i++) {
          // print_r($data['office_description']);
         // exit();
        // echo $section_array[1];
        //if($i <= $array_count-1)
        //if (is_valid_ba_section($data["section"])) {
        // print_r($section_array[$i]);
        if ($section_array[$i] == $data['sec_id']) {
           // print_r($data['sec_id']);
          $cnt = $associate_array[$section_array[$i]];
          // echo $section_array[$i];

          $cnt = $cnt + 1;
          $associate_array[$section_array[$i]] = $cnt++;
          // print_r($associate_array[$section_array[$i]]);
        }
        //}
      }
    }
    // $grie_sql = "SELECT tbl_dak.id,tbl_dak.curr_date,tbl_user.section, tbl_dak.status,tbl_dak_forward.marked_to FROM tbl_dak,tbl_dak_forward,tbl_user WHERE tbl_dak.unique_dak_no=tbl_dak_forward.unique_dak_no and tbl_dak.marked_to=tbl_user.emp_id and tbl_dak.curr_date between '" . $frm_date . "' AND '" . $to_date . "' AND tbl_dak.status=2 group by tbl_dak.id";
    // $result = mysql_query($grie_sql, $db_edak);
    dbcon3();
   $approve_sql = "SELECT tbl_section.sec_id FROM add_application,add_user,forward_appl,tbl_section WHERE forward_appl.forwarded_to_cos = add_user.user_pfno AND add_application.application_id = forward_appl.appli_id AND add_application.created_date LIKE '%$frm_date%' AND add_application.created_date LIKE '%$to_date%' AND add_user.office_description = tbl_section.sec_name AND forward_appl.cos_status = 1";
    $result = mysql_query($approve_sql);

    while ($data = mysql_fetch_assoc($result)) {

      for ($i = 0; $i < $array_count; $i++) {
        //echo $section_array[1];
        //if($i <= $array_count-1)
        //if (is_valid_ba_section($data["section"])) {
        if ($section_array[$i] == $data['sec_id']) {
          $cnt = $asso_complied_array[$section_array[$i]];
          //echo $user_id."<br/>";
          $cnt = $cnt + 1;
          $asso_complied_array[$section_array[$i]] = $cnt++;
        }
        //}
      }
      // }
    }

    // $grie_sql = "SELECT tbl_dak.id,tbl_dak.curr_date,tbl_user.section, tbl_dak.status,tbl_dak_forward.marked_to FROM tbl_dak,tbl_dak_forward,tbl_user WHERE tbl_dak.unique_dak_no=tbl_dak_forward.unique_dak_no and tbl_dak.marked_to=tbl_user.emp_id and tbl_dak.curr_date between '" . $frm_date . "' AND '" . $to_date . "' AND tbl_dak.status=1 group by tbl_dak.id";
    // $result = mysql_query($grie_sql, $db_edak);

     dbcon3();
      $pending_sql = "SELECT tbl_section.sec_id,forward_appl.clerk_status,forward_appl.cos_status FROM add_application,add_user,forward_appl,tbl_section WHERE (forward_appl.forwarded_to_cos = add_user.user_pfno OR forward_appl.forwarded_to_clerk = add_user.user_pfno) AND add_application.application_id = forward_appl.appli_id AND add_application.created_date LIKE '%$frm_date%' AND add_application.created_date LIKE '%$to_date%' AND add_user.office_description = tbl_section.sec_name AND (forward_appl.cos_status = 0 OR forward_appl.clerk_status = 0)";
    $result = mysql_query($pending_sql);

    while ($data = mysql_fetch_assoc($result)) {
             for ($i = 0; $i < $array_count; $i++) {
        //echo $section_array[1];
        //if($i <= $array_count-1)
        //if (is_valid_ba_section($data["section_id"])) {
        if ($section_array[$i] == $data['sec_id']) {
          $cnt = $asso_pending_array[$section_array[$i]];
          //echo $user_id."<br/>";
          $cnt = $cnt + 1;
          $asso_pending_array[$section_array[$i]] = $cnt++;
        }
        //}
       }
     
    }

    // $grie_sql = "SELECT `added_by`,`section`, `curr_date` FROM tbl_dak,tbl_user WHERE tbl_dak.marked_to=tbl_user.emp_id and `curr_date` between '" . $frm_date . "' AND '" . $to_date . "' AND tbl_dak.status != '2'";
    // $result = mysql_query($grie_sql, $db_edak);

    dbcon3();
    // $perfom_sql = "SELECT `description`, `created_date` FROM add_application,add_user,forward_appl WHERE forward_appl.forwarded_to=add_user.user_pfno and add_application.application_id = forward_appl.appli_id and `created_date` between '" . $frm_date . "' AND '" . $to_date . "' AND forward_appl.clerk_status != '1'";
    // $result = mysql_query($perfom_sql);

    $perfom_sql = "SELECT tbl_section.sec_id,add_application.created_date FROM add_application,add_user,forward_appl,tbl_section WHERE (forward_appl.forwarded_to_cos = add_user.user_pfno OR forward_appl.forwarded_to_clerk = add_user.user_pfno) AND add_application.application_id = forward_appl.appli_id AND add_application.created_date LIKE '%$frm_date%' AND add_application.created_date LIKE '%$to_date%' AND add_user.office_description = tbl_section.sec_name AND (forward_appl.cos_status = 0 OR forward_appl.clerk_status = 0)";
    $result = mysql_query($perfom_sql);

    while ($data = mysql_fetch_assoc($result)) {
      // $user_id = $data['added_by'];
      $DB_date = date_create(date("Y-m-d", strtotime($data['created_date'])));
      $date_difference = date_diff($DB_date, date_create($to_date));
      $date_gap = $date_difference->format("%a");
      if ($date_gap == 30 || $date_gap >= 28) {

        for ($i = 0; $i < $array_count; $i++) {
          //echo $section_array[1];
          //if($i <= $array_count-1)
          //if (is_valid_ba_section($data["section_id"])) {
          if ($section_array[$i] == $data['sec_id']) {
            // $cnt = $asso_more_array[$section_array[$i]];
            //echo $user_id."<br/>";
            // $cnt = $cnt + 1;
            $percentage = ($asso_complied_array[$section_array[$i]] / $associate_array[$section_array[$i]]) * 100;
            $final_per = ($percentage);
            echo "<br>final_per:$final_per";
            $asso_more_array[$section_array[$i]] = $final_per;
          }
          //}
        }
        // }
      }
    }

    $data = '';
    $sr_no = 0;
    for ($i = 0; $i < $array_count; $i++) {
      //if (is_valid_ba_section($section_array[$i])) {
      if ($associate_array[$section_array[$i]] != 0) {
        $percentage = ($asso_complied_array[$section_array[$i]] / $associate_array[$section_array[$i]]) * 100;
        $final_per = round($percentage, 2);
        // echo "<br>final_per:$final_per";
        $asso_more_array[$section_array[$i]] = $final_per;
      }
      if (in_array(0, $section_array)) {
        if ($i != 0) {
          $sr_no = $sr_no + 1;
          $data .= "<tr style='font-size: 15px'>";
          $data .= "<td>" . $sr_no . "</td>";
          $data .= "<td>" . $associate_array_label[$section_array[$i]] . "</td>";
          $data .= "<td style='text-align:center'>" . $associate_array[$section_array[$i]] . "</td>";
          $data .= "<td style='text-align:center'>" . $asso_complied_array[$section_array[$i]] . "</td>";
          $data .= "<td style='text-align:center'>" . $asso_pending_array[$section_array[$i]] . "</td>";
          $data .= "<td style='text-align:center'>" . $asso_more_array[$section_array[$i]] . "</td>";
          $data .= "</tr>";
        }
      } else {
        $sr_no = $sr_no + 1;
        $data .= "<tr style='font-size: 15px'>";
        $data .= "<td>" . $sr_no . "</td>";
        $data .= "<td>" . $associate_array_label[$section_array[$i]] . "</td>";
        $data .= "<td style='text-align:center'>" . $associate_array[$section_array[$i]] . "</td>";
        $data .= "<td style='text-align:center'>" . $asso_complied_array[$section_array[$i]] . "</td>";
        $data .= "<td style='text-align:center'>" . $asso_pending_array[$section_array[$i]] . "</td>";
        $data .= "<td style='text-align:center'>" . $asso_more_array[$section_array[$i]] . "</td>";
        $data .= "</tr>";
      }
    }
    $avg_per = array_sum($asso_more_array) / count($asso_more_array);
    $data .= "<tr style='font-size: 15px'>";
    $data .= "<td></td>";
    $data .= "<td>Total</td>";
    $data .= "<td style='text-align:center'>" . array_sum($associate_array) . "</td>";
    $data .= "<td style='text-align:center'>" . array_sum($asso_complied_array) . "</td>";
    $data .= "<td style='text-align:center'>" . array_sum($asso_pending_array) . "</td>";
    $data .= "<td style='text-align:center'>" . round($avg_per, 2) . "</td>";
    $data .= "</tr>";
    echo $data;
    break;

    case 'section_report':
    $associate_array_label = array();
    $associate_array = array();
    $asso_complied_array = array();
    $asso_pending_array = array();
    $asso_more_array = array();

    $section = implode(",", (array)$_REQUEST['section_wise']);
    $frm_date = $_REQUEST['frm_date'];
    $to_date = $_REQUEST['to_date'];

    $section_array = explode(",", $section);
    $all = '0';

    if (in_array($all, $section_array)) {
      dbcon3();
      $query = "select * from tbl_section";
      $rstSection = mysql_query($query);
      while ($rwSection = mysql_fetch_array($rstSection)) {
        $sec_id = $rwSection["sec_id"];
        if (!in_array($sec_id, $section_array)) {
          array_push($section_array, $sec_id);
        }
      }
    }
    $cnt = 1;
    foreach ($section_array as $key => $value) {
      // echo $value; exit();
      $section_name = getSection($value);
      if ($value == 0) {
        $section_name = "New Section";
      }
      // $sql = "SELECT * FROM tbl_dak,tbl_user WHERE tbl_dak.marked_to=tbl_user.emp_id and curr_date between '" . $frm_date . "' AND '" . $to_date . "' and section='$value'";
      // $rstRecord = mysql_query($sql, $db_edak);
      dbcon2();
      dbcon3();
       $sql = "SELECT *,add_application.created_date FROM `forward_appl`,add_user,add_application,drmpsurh_sur_railway.register_user WHERE forward_appl.forwarded_to_clerk = add_user.user_pfno AND add_application.application_id = forward_appl.appli_id AND add_user.office_description = '$section_name' AND add_application.pfno = register_user.emp_no AND add_application.created_date LIKE '%$frm_date%' AND add_application.created_date LIKE '%$to_date%'";
      $rstRecord = mysql_query($sql);
      if (mysql_num_rows($rstRecord) > 0) {
        //if (isBA()) {
        //if (is_valid_section($value)) {
        //echo "<tr><td colspan='8'  style='font-size:16px;font-weight: bold'>Section : $section_name<td>              </tr>";
        echo '<tr>
        <td colspan="8" style="font-size:16px;font-weight: bold">Section:  ' . $section_name . '</td>
        <td style="display: none"></td>
        <td style="display: none"></td>
        <td style="display: none"></td>
        <td style="display: none"></td>
        <td style="display: none"></td>
        <td style="display: none"></td>
        <td style="display: none"></td>
        <td style="display: none"></td>
        <td style="display: none"></td>
        
    </tr>';
        while ($rwRecords = mysql_fetch_array($rstRecord)) {
          extract($rwRecords);

          echo "<tr>
                                <td>$cnt</td>
                                <td>$pfno</td>
                                <td>$name</td>
                                <td>$billunit</td>
                                <td>$purpose</td>
                                <td>$created_date</td>
                                <td>$description</td>
                                <td>$office_description</td>";
          if ($cos_status == 0) {
            echo "<td class='text text-danger'>Pending</td>";
          } else {
            echo "<td class='text text-success'>Complete</td>";
          }
          echo "</tr>";
          $cnt++;
        }
      } else if (!in_array(0, $section_array)) {
        echo "<tr><td colspan='5' style='font-size:16px;font-weight: bold; border:1px solid;'>Section : $section_name<td></tr>";
        echo "<tr><td></td><td colspan='4' style='font-weight: bold; border:1px solid #ddd;'>No Record found!<td></tr>";
        //}
      }
    }
    break;

 }
?>
