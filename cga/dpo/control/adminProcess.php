<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include('adminFunction.php');
  switch($_REQUEST['action'])
  {
	  case 'changeimg':
		if(changeimg($_FILES["profile"]["name"],$_FILES["profile"]["tmp_name"]))
		{
			echo "<script>alert('Profile photo uploaded successfully');window.location='../profile.php';</script>";
		}
		else
		{
			echo "<script>alert('Failed to upload');window.location='../profile.php';</script>";
		}
	break;
    case 'updateUser':
        $fname = $_REQUEST['fname'];
        $email = $_REQUEST['email'];
        $mobile = $_REQUEST['mobile'];
        $design = $_REQUEST['design'];
        if(updateUser($fname,$email,$mobile,$design))
          echo "<script>alert('User details updated successfully');window.location='../profile.php';</script>";
        else
          echo "<script>alert('User details not updated');window.location='../profile.php';</script>";
    break;
    case 'changePass':
        $pass = $_REQUEST['pass'];
        $confirm = $_REQUEST['confirm'];
        if($pass==$confirm)
        {
          if(changePass($pass,$confirm))
            echo "<script>alert('User Password changed successfully');window.location='../profile.php';</script>";
          else
            echo "<script>alert('User Password not changed');window.location='../profile.php';</script>";
        }
        else {
          echo "<script>alert('Confirm password must match with password');window.location='../profile.php';</script>";
        }
    break;
    case 'submit_dpo':
    dbcon1();
          $date=date('d-m-Y h:i:s');
          $ex_emp_pfno=$_POST['ex_emp_pfno'];
          $appl_username=$_POST['username'];
          $fw_to_pf=$_POST['fw_to_pfno'];
          $fw_tbl_id=$_POST['fw_tbl_id'];

          $update="UPDATE `forward_application` SET hold_status='0',drm_approve='0' , depart_time='".$date."' where ex_emp_pfno='".$ex_emp_pfno."' AND id='".$fw_tbl_id."' ";
          $re_update=mysql_query($update);

          $sql=mysql_query("SELECT pf_number,unit_id from login where pf_number='".$fw_to_pf."' and role='7'");
           $sql_login=mysql_fetch_array($sql);

            $query="INSERT INTO `forward_application`( `ex_emp_pfno`, `applicant_username`, `forward_to_u`, `forward_to_pfno`, `forward_from_u`, `forward_from_pfno`, `arrived_time`, `depart_time`, `hold_status`, `return_status`,`rcc_note_status`,`drm_approve`) VALUES('".$ex_emp_pfno."','".$appl_username."','".$sql_login['unit_id']."','".$sql_login['pf_number']."','".$_SESSION['unitid']."','".$_SESSION['pf_number']."','".$date."','','1','','','1')";
           $result=mysql_query($query);


          if($re_update)
          {
              echo "<script>alert('submitted Successfully');window.location='../list.php';</script>";
            //echo "ssss";
          }
          else
          {
            echo "<script>alert('Failed');window.location='../list.php';</script>";
            //echo "ffff";
          }
      break;

  
    case 'FetchEmployee':
        $id = $_REQUEST['id'];
          echo FetchEmployee($id);
    break;
    case 'fetchEmployee1':
        $id = $_REQUEST['id'];
          echo fetchEmployee1($id);
    break;
    case 'concern_wi':
          $data=0;
          dbcon1();
             $sql=mysql_query("UPDATE nomination_note set status=1,dpo_remark='".$_POST['remark']."',concern_wi='".$_POST['wi_pfno']."' where ex_emp_pfno='".$_POST['ex_emp_pfno']."' and category='".$_POST['case']."'");
            //echo mysql_error();
          //$res=mysql_query($sql);
          if($sql)
          {
             $data=1;
          }
          else
          {
             $data=0;
          }
          echo $data;
      break;
  
    
      case 'fw_to_rcc':
          $date=date('d-m-Y h:i:s');
          $ex_emp_pfno=$_POST['ex_emp_pfno'];
          $appl_username=$_POST['username'];
          $fw_to_pf=$_POST['fw_to_pfno'];
          $fw_tbl_id=$_POST['fw_tbl_id'];

          dbcon1();

          $update="UPDATE `forward_application` SET hold_status='0',dak_status='0' , depart_time='".$date."' where ex_emp_pfno='".$ex_emp_pfno."' AND id='".$fw_tbl_id."' ";
          $re_update=mysql_query($update);


          $sql=mysql_query("SELECT unit_id from login where pf_number='".$fw_to_pf."'");
          $value=mysql_fetch_array($sql);

          $fw_to_unitid=$value['unit_id'];


          $query="INSERT INTO `forward_application`( `ex_emp_pfno`, `applicant_username`, `forward_to_u`, `forward_to_pfno`, `forward_from_u`, `forward_from_pfno`, `arrived_time`, `depart_time`,`dak_status`,`hold_status`, `return_status`,`rcc_note_status`,`drm_approve`,`cc_status`,`remark`,`rejected_by`) VALUES('".$ex_emp_pfno."','".$appl_username."','".$fw_to_unitid."','".$fw_to_pf."','".$_SESSION['unitid']."','".$_SESSION['pf_number']."','".$date."','".$date."','0','1','','1','','','','')";
          $result=mysql_query($query);

          echo mysql_error();          

          if($result && $re_update)
          {
              echo "<script>alert('Forwarded  Successfully');window.location='../nomi_note_app.php';</script>";
            //echo "ssss";
          }
          else
          {
            echo "<script>alert('Failed to Forward ');window.location='../nomi_note_app.php';</script>";
            //echo "ffff";
          }
        break;
      case 'fw_to_srDpo':
        dbcon1();
          $date=date('d-m-Y h:i:s');
          $ex_emp_pfno=$_POST['ex_emp_pfno'];
          $appl_username=$_POST['username'];
          $fw_to_pf=$_POST['fw_to_pfno'];
          $fw_tbl_id=$_POST['fw_tbl_id'];



          $update="UPDATE `forward_application` SET hold_status='0' , depart_time='".$date."' where ex_emp_pfno='".$ex_emp_pfno."' AND id='".$fw_tbl_id."' ";
          $re_update=mysql_query($update);


          $sql=mysql_query("SELECT unit_id from login where pf_number='".$fw_to_pf."'");
          $value=mysql_fetch_array($sql);

          $fw_to_unitid=$value['unit_id'];


          $query="INSERT INTO `forward_application`( `ex_emp_pfno`, `applicant_username`, `forward_to_u`, `forward_to_pfno`, `forward_from_u`, `forward_from_pfno`, `arrived_time`, `depart_time`, `hold_status`, `return_status`,`rcc_note_status`,`drm_approve`,`cc_status`,`remark`) VALUES('".$ex_emp_pfno."','".$appl_username."','".$fw_to_unitid."','".$fw_to_pf."','".$_SESSION['unitid']."','".$_SESSION['pf_number']."','".$date."','','1','','','','','".$_POST['remark']."')";
          $result=mysql_query($query);

          

          if($result && $re_update)
          {
              echo "<script>alert('Forwarded  Successfully');window.location='../rcc_pending_app.php';</script>";
            //echo "ssss";
          }
          else
          {
            echo "<script>alert('Failed to Forward ');window.location='../rcc_pending_app.php';</script>";
            //echo "ffff";
          }
        break;
        //   case 'fw_to_drm':
        //   $date=date('d-m-Y h:i:s');
        //   $ex_emp_pfno=$_POST['ex_emp_pfno'];
        //   $appl_username=$_POST['username'];
        //   $fw_to_pf=$_POST['fw_to_pfno'];
        //   $fw_tbl_id=$_POST['fw_tbl_id'];



        //   echo "<br>".$update="UPDATE `forward_application` SET hold_status='0' , depart_time='".$date."',dpo_approve='0' where ex_emp_pfno='".$ex_emp_pfno."' AND id='".$fw_tbl_id."' ";
        //   $re_update=mysql_query($update);


        //   $sql=mysql_query("SELECT unit_id from login where pf_number='".$fw_to_pf."'");
        //   $value=mysql_fetch_array($sql);

        //   echo "<br>".$fw_to_unitid=$value['unit_id'];


        //   echo "<br>".$query="INSERT INTO `forward_application`( `ex_emp_pfno`, `applicant_username`, `forward_to_u`, `forward_to_pfno`, `forward_from_u`, `forward_from_pfno`, `arrived_time`, `depart_time`, `hold_status`, `return_status`,`rcc_approve`,`dpo_approve`) VALUES('".$ex_emp_pfno."','".$appl_username."','".$fw_to_unitid."','".$fw_to_pf."','".$_SESSION['unitid']."','".$_SESSION['pf_number']."','".$date."','".$date."','1','','','')";
        //   $result=mysql_query($query);

          

        //   if($result && $re_update)
        //   {
        //       echo "<script>alert('Forwarded  Successfully');window.location='../rcc_pending_app.php';</script>";
        //     //echo "ssss";
        //   }
        //   else
        //   {
        //     echo "<script>alert('Failed to Forward ');window.location='../rcc_pending_app.php';</script>";
        //     //echo "ffff";
        //   }
        // break;
        case 'reject':
          dbcon1();
                  $date=date('d-m-Y h:i:s');
                  $ex_emp_pfno=$_POST['ex_emp_pfno'];
                  $fw_tbl_id=$_POST['fw_tbl_id'];
                  //$fw_to_pfno=$_POST['fw_to_pfno'];
                  $rcc=$_SESSION['pf_number'].",".$_SESSION['role'];

                  $update=mysql_query("UPDATE `forward_application` SET depart_time='".$date."',return_status='1',remark='".$_POST['remark']."',rejected_by='".$rcc."' where ex_emp_pfno='".$ex_emp_pfno."' AND id='".$fw_tbl_id."'  ");
                  // $re_update=mysql_query($update);

                  if($update)
                  {
                  echo "<script>alert('Rejected  Successfully');window.location='../rcc_returned_list.php';</script>";
                  //echo "ssss";
                  }
                  else
                  {
                  echo "<script>alert('Failed ');window.location='../rcc_returned_list.php';</script>";
                  //echo "ffff";
                  }
              break;
  
    case 'activeUser':
      $active = '1';
      $pfno = $_REQUEST['id'];
      if(activeUser($pfno,$active))
            echo "User Activated successfully";
          else
            echo "Something went wrong";
    break;
    case 'deactiveUser':
      $active = '0';
      $pfno = $_REQUEST['id'];
      if(deactiveUser($pfno,$active))
            echo "User Deactivated successfully";
          else
            echo "Something went wrong";
    break;
    case 'reports':
        //echo $_POST['year']."--".$_POST['month'];

        $mon=$_POST['month'];
        $year=$_POST['year'];
        echo '<div class="table-responsive">
                                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="DataTables_Table_22" role="grid" aria-describedby="DataTables_Table_1_info">
                                     <thead>
                                      <tr>
                                            <th style="font-weight: bold;">Sr.no.</th>
                                            <th style="font-weight: bold;">Ex. Employee PFno</th>
                                            <th style="font-weight: bold;">Ex. Employee Name</th>
                                            <th style="font-weight: bold;">Applicant Name</th>
                                            <th style="font-weight: bold;">Category</th>
                                            
                                            
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>';
                                    dbcon1();
                                 $sql=("SELECT ex_empname,applicant_name,forward_application.ex_emp_pfno,category  FROM forward_application,applicant_registration WHERE forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and dak_status=0 and hold_status=1 and rcc_note_status=1 and drm_approve=1 and cc_status=1 and  arrived_time LIKE '%-".$mon."-".$_POST['year']."%' ");
                                $result=mysql_query($sql);
                                $sr=0;
                                while ($row=mysql_fetch_array($result)) {
                                    $sr++;
                                          echo "<tr>"; 
                                          echo "<td>".$sr."</td>"; 
                                          echo "<td>".$row['ex_emp_pfno']."</td>";  
                                          echo "<td>".$row['ex_empname']."</td>";  
                                          echo "<td>".$row['applicant_name']."</td>";
                                          echo "<td>".getcase($row['category'])."</td>";

                                          
                                }
                                echo "</tbody>
                                      </table>
                                      </div></div>";
                      
      break;
  

    default:
      echo "Invalid option";
    break;
	
	
	
	
  }
 ?>
