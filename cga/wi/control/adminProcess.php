<?php
date_default_timezone_set("Asia/kolkata");
$date=date("d-m-Y h:i:sa" );
$date1=date("d-m-Y" );

include('adminFunction.php');
  switch($_REQUEST['action'])
  {

    case 'forward_application':
          
          $fw_to=$_POST['fw_to_pfno'];

          $ex_emp_pfno=$_POST['ex_emp_pfno'];
          $appl_username=$_POST['username'];
          $fw_to_pf=$_POST['fw_to_pfno'];
          
          //$fw_tbl_id=$_POST['fw_tbl_id'];
          dbcon1();
          $sql=mysql_query("SELECT unit_id from login where pf_number='".$fw_to_pf."'");
          $value=mysql_fetch_array($sql);

          $fw_to_unitid=$value['unit_id'];

          $query="INSERT INTO `forward_application`( `ex_emp_pfno`, `applicant_username`, `forward_to_u`, `forward_to_pfno`, `forward_from_u`, `forward_from_pfno`, `arrived_time`, `depart_time`, `hold_status`, `return_status`,`rcc_note_status`,`drm_approve`) VALUES('".$ex_emp_pfno."','".$appl_username."','".$fw_to_unitid."','".$fw_to_pf."','".$_SESSION['unitid']."','".$_SESSION['pf_number']."','".$date."','','1','','','')";
          $result=mysql_query($query);

          $qu="UPDATE `applicant_registration` SET fw_status='1' where ex_emp_pfno='".$ex_emp_pfno."' AND username='".$appl_username."'";
          $result1=mysql_query($qu);

          if($result && $result1)
          {
              echo "<script>alert('Forwarded  Successfully');window.location='../wi_pending_app.php';</script>";
            //echo "ssss";
          }
          else
          {
            echo "<script>alert('Failed to Forward ');window.location='../wi_pending_app.php';</script>";
            //echo "ffff";
          }



      break;


    case 'pending_fw_application':
          $ex_emp_pfno=$_POST['ex_emp_pfno'];
          $appl_username=$_POST['username'];
          $fw_to_pf=$_POST['fw_to_pfno'];
          $fw_tbl_id=$_POST['fw_tbl_id'];

          dbcon1();

          $update="UPDATE `forward_application` SET hold_status='0', depart_time='".$date."' where ex_emp_pfno='".$ex_emp_pfno."' AND id='".$fw_tbl_id."' ";
          $re_update=mysql_query($update);


          $sql=mysql_query("SELECT unit_id from login where pf_number='".$fw_to_pf."'");
          $value=mysql_fetch_array($sql);

          $fw_to_unitid=$value['unit_id'];


          $query="INSERT INTO `forward_application`( `ex_emp_pfno`, `applicant_username`, `forward_to_u`, `forward_to_pfno`, `forward_from_u`, `forward_from_pfno`, `arrived_time`, `depart_time`, `hold_status`, `return_status`,`rcc_note_status`,`drm_approve`) VALUES('".$ex_emp_pfno."','".$appl_username."','".$fw_to_unitid."','".$fw_to_pf."','".$_SESSION['unitid']."','".$_SESSION['pf_number']."','".$date."','','1','','','')";
          $result=mysql_query($query);

          

          if($result && $re_update)
          {
              echo "<script>alert('Forwarded  Successfully');window.location='../wi_pending_app.php';</script>";
            //echo "ssss";
          }
          else
          {
            echo "<script>alert('Failed to Forward ');window.location='../wi_pending_app.php';</script>";
            //echo "ffff";
          }
      break;

    // case 'forward_application':
    //       $ex_emp_pfno=$_POST['ex_emp_pfno'];
    //       $appl_username=$_POST['username'];
    //       $fw_to=$_POST['fw_to_pfno'];
    //       $idd=$_POST['fw_tbl_id'];

    //       $qu="UPDATE `applicant_registration` SET fw_status='1' where ex_emp_pfno='".$ex_emp_pfno."' AND id='".$idd."'";
    //       $result1=mysql_query($qu);

    //       $sql=mysql_query("SELECT unit_id from login where pf_number='".$fw_to."'");
    //       $value=mysql_fetch_array($sql);

    //       $fw_to_unitid=$value['unit_id'];

    //       $query="INSERT INTO `forward_application`( `ex_emp_pfno`, `applicant_username`, `forward_to_u`, `forward_to_pfno`, `forward_from_u`, `forward_from_pfno`, `arrived_time`, `depart_time`, `hold_status`, `return_status`) VALUES('".$ex_emp_pfno."','".$appl_username."','".$fw_to_unitid."','".$fw_to."','".$_SESSION['unitid']."','".$_SESSION['pf_number']."','".$date."','".$date."','2','')";
    //       $result=mysql_query($query);

          

    //       if($result && $result1)
    //       {
    //           echo "<script>alert('Forwarded  Successfully');window.location='../wi_forworded_list.php';</script>";
    //         //echo "ssss";
    //       }
    //       else
    //       {
    //         echo "<script>alert('Failed to Forward ');window.location='../wi_forworded_list.php';</script>";
    //         //echo "ffff";
    //       }



    //   break;

    case 'applicant_add':
      

      $ex_emp_pf=$_POST['empid'];  
      $ex_empname=$_POST['empname'];  
      $ex_department=$_POST['department'];  
      $ex_design=$_POST['design'];  
      $appl_name=$_POST['appl_name'];  
      $aapl_dob=$_POST['aapl_dob'];  
      $appl_mobile=$_POST['appl_mobile'];  
      $appl_email=$_POST['appl_email'];  
      $appl_pan=$_POST['appl_pan'];  
      $appl_aadhar=$_POST['appl_aadhar'];  
      $appl_qualification=$_POST['appl_qualification'];  
      $appl_maritial_st=$_POST['appl_maritial_st'];  
      $category=$_POST['category'];
      $appl_gender=$_POST['appl_gender'];
      $password=$_POST['password'];
      $username=$_POST['username'];

      dbcon1();
      $sql1=("INSERT INTO `applicant_registration`(`ex_emp_pfno`, `ex_empname`, `ex_empdept`, `ex_empdesig`, `applicant_name`, `applicant_dob`, `applicant_mobno`, `applicant_emailid`, `applicant_panno`, `applicant_aadharno`, `username`, `psw`, `applicant_gender`, `applicant_qualifiaction`, `mariatial_status`,`permanent_address`,`identification_mark1`,`identification_mark2`, `category`, `caste`, `eligible_category`, `status`, `fw_status`, `created_at`,`relation_with`,`added_by`,`remark`) VALUES('".$ex_emp_pf."','".$ex_empname."','".$ex_department."','".$ex_design."','".$appl_name."','".$aapl_dob."','".$appl_mobile."','".$appl_email."','".$appl_pan."','".$appl_aadhar."','".$username."','".hashPassword($password,SALT1,SALT2)."','".$appl_gender."','".$appl_qualification."','".$appl_maritial_st."','".$_POST['p_address']."','".$_POST['ident_mark1']."','".$_POST['ident_mark2']."','".$category."','".$_POST['appl_caste']."','','0','0','".$date."','".$_POST['app_rel']."','".$_SESSION['unitid']."','".$_POST['remark']."')");
        
        $result1=mysql_query($sql1); 

      $count=$_POST['count'];
      for($j=1;$j<=$count;$j++)
      {
        //echo "...........".$j;
        $fam_mem_name=$_POST['fam_mem_name_'.$j];
        $fam_mem_mobno=$_POST['fam_mem_mobno_'.$j];
        $fam_mem_panno=$_POST['fam_mem_panno_'.$j];
        $fam_mem_aadharno=$_POST['fam_mem_aadharno_'.$j];
        $fam_mem_rel=$_POST['fam_mem_rel_'.$j];
        $fam_mem_dob=$_POST['fam_mem_dob_'.$j];
        $fam_mem_qualif=$_POST['fam_mem_qualif_'.$j];
        $fam_mem_employedorother=$_POST['fam_mem_employedorother_'.$j];
        $fam_mem_maritial_st=$_POST['fam_mem_maritial_st_'.$j];
        
        $sql3=("INSERT INTO `emp_family_tbl`(`ex_emp_pfno`, `member_name`, `member_mobileno`, `member_panno`, `member_aadharno`, `member_relation`,`marital_status`, `member_dob`, `member_qualifiaction`, `employed_or_other`, `created_at`) VALUES('".$ex_emp_pf."','".$fam_mem_name."','".$fam_mem_mobno."','".$fam_mem_panno."','".$fam_mem_aadharno."','".$fam_mem_rel."','".$fam_mem_maritial_st."','".$fam_mem_dob."','".$fam_mem_qualif."','".$fam_mem_employedorother."','".$date."')");

          $result3=mysql_query($sql3);
      }

      $total = count($_FILES['file']['name']);
      $date2=date('h:i:s');
      $date2=explode(':', $date2);
      $date2=$date2[0].$date2[1].$date2[2];
      // Loop through each file
      for( $i=0 ; $i < $total ; $i++ ) 
      {
        //Get the temp file path
        $tmpFilePath = $_FILES['file']['tmp_name'][$i];
        $names = $_FILES['file']['name'][$i];
        //Make sure we have a file path
            //Setup our new file path
            $dir = $date2."_".$names;
            
            $folder_name="../../uploadFiles/";
            
            if(is_dir($folder_name.$ex_emp_pf)){
            
            }else{
            mkdir($folder_name.$ex_emp_pf);
            }
            $folder_name="../../uploadFiles/".$ex_emp_pf."/".$dir;

            //Upload the file into the temp dir
            if(move_uploaded_file($tmpFilePath, $folder_name)) 
            {

              $sql2=("INSERT INTO `upload_doc`(`ex_emp_pfno`, `file_path`, `created_at`) VALUES('".$ex_emp_pf."','".$dir."','".$date."')");
              $result2=mysql_query($sql2);
            }
            
            else
            {
              echo "<script>alert('Failed To Registerd..');window.location='../registration.php';</script>";
            }
          
        
      }  

       if($result3 && $result2 && $result1)
              {
                  echo "<script>alert('Applicant Registerd Successfully');window.location='../registration.php';</script>";
                //echo "ssss";
              }
              else
              {
                echo "<script>alert('Failed to register ');window.location='../registration.php';</script>";
                //echo "ffff";
              }
      
      break;

    //   case 'fetch_employee_pdetails':
        
    //     $data=[];
    //     $sql=mysql_query("select * from emp_data where pf_number='$pf_number'");
    //     $res=mysql_fetch_array($sql);
    //     $data['pf_number']=$res['pf_number'];
    //     $data['emp_name']=$res['emp_name'];
    //     $data['designation']=designation($res['designation']);
    //     $data['department']=getdepartment($res['department']);
  

    // echo $data;

    //     break;
    case 'service_particulars':
              dbcon1();
              $daata=explode("/", $_POST['password']);
                $password=$daata[0].$daata[1].$daata[2];
                $sq=mysql_query("UPDATE `applicant_registration` SET `applicant_name`='".$_POST['appl_name']."',`applicant_dob`='".$_POST['aapl_dob']."',`applicant_mobno`='".$_POST['appl_mobile']."',`applicant_emailid`='".$_POST['appl_email']."',`applicant_panno`='".$_POST['appl_pan']."',`applicant_aadharno`='".$_POST['appl_aadhar']."',`applicant_gender`='".$_POST['appl_gender']."',`applicant_qualifiaction`='".$_POST['appl_qualification']."',`mariatial_status`='".$_POST['appl_mstatus']."',`caste`='".$_POST['caste']."',`relation_with`='".$_POST['relation']."',status_add_data=1,permanent_address='".$_POST['p_address']."',identification_mark1='".$_POST['ident_mark1']."',identification_mark2='".$_POST['ident_mark2']."' where ex_emp_pfno='".$_POST['p_emp_pfno']."' and username='".$_POST['p_username']."'");

              
        //echo "<br>";
       if($sq)
        {
          dbcon2();
              if($_POST['case']==1)
              {
                $query=mysql_query("UPDATE drmpsurh_sur_railway.resgister_user SET date_of_expiry='".$_POST['expiry_date']."'  where emp_no='".$_POST['p_emp_pfno']."'");
              }
              else if($_POST['case']==2)
              {
                $query=mysql_query("UPDATE drmpsurh_sur_railway.resgister_user SET date_of_missing='".$_POST['missing_date']."' where emp_no='".$_POST['p_emp_pfno']."'");
              }
              else if($_POST['case']==3)
              {
                $query=mysql_query("UPDATE drmpsurh_sur_railway.resgister_user SET date_of_md='".$_POST['date_of_md']."',date_of_vr='".$_POST['date_of_vr']."'  where emp_no='".$_POST['p_emp_pfno']."'");
              }
              else if($_POST['case']==4)
              {
                $query=mysql_query("UPDATE drmpsurh_sur_railway.resgister_user SET date_of_med_decat='".$_POST['txtdomd']."',date_of_retd='".$_POST['txtdor']."'  where emp_no='".$_POST['p_emp_pfno']."'");
              }
              echo mysql_error();
              //echo "<br>";
            
              dbcon1();
            $sql=mysql_query("INSERT INTO `service_particulars`(`ex_emp_pfno`, `death_is_dueto_accident_on_duty`, `priority_no`, `cause_of_death/reason`, `period_sickness`, `total_service`, `alter_job_offered`, `alter_apptmt_emolumt_offered`, `before_bp`, `before_da`, `before_hra`, `before_cca`, `before_others`, `after_bp`, `after_da`, `after_hra`, `after_cca`, `after_others`, `drop_in_emolumt`, `not_accepting_alter_appmt`, `service_trminated/compulsory_retd`, `cl_sub_n_reason`, `eligible_group`,`date_of_receipt_appl`, `widow_remarried`, `widow_applied_apptmt`, `not_apply_for_apptmt`, `minor_at_time_death`, `warranting_time_limit`, `relaxation_age_req`, `date_filled_n_report_submitted`, `other_particulars_considered`) VALUES ('".$_POST['p_emp_pfno']."','".mysql_real_escape_string($_POST['due_to_accident'])."','".$_POST['priority_no']."','".mysql_real_escape_string($_POST['cause_death/medical'])."','".$_POST['period_sickness']."','".$_POST['total_service']."','".mysql_real_escape_string($_POST['alt_job_offered'])."','".mysql_real_escape_string($_POST['apptmt_emolumt'])."','".$_POST['before_bp']."','".$_POST['before_da']."','".$_POST['before_hra']."','".$_POST['before_cca']."','".$_POST['before_others']."','".$_POST['after_bp']."','".$_POST['after_da']."','".$_POST['after_hra']."','".$_POST['after_cca']."','".$_POST['after_others']."','".mysql_real_escape_string($_POST['drop_in_emlmt'])."','".mysql_real_escape_string($_POST['not_accepting_alter'])."','".$_POST['service_terminated/compulsory_retd']."','".$_POST['cl/sub_reasons']."','".$_POST['eligible_group']."','".$_POST['date_of_receipt']."','".$_POST['widow_remarried']."','".$_POST['widow_applied_appmt']."','".$_POST['not_apply_appmt']."','".$_POST['attained_majority']."','".$_POST['warranting_time_limit']."','".$_POST['relaxation_age_req']."','".$_POST['filled_n_report_submit']."','".$_POST['other_particulars']."')");
            
            //echo "<br>";
            $sql1=mysql_query("INSERT INTO `wi_settlement`(`ex_emp_pfno`, `category`, `pf`, `dcrg`, `gis`, `il`, `le`, `wca`, `others`,`family_pension`,`twenty_one`) VALUES ('".$_POST['p_emp_pfno']."','".$_POST['case']."','".$_POST['pf']."','".$_POST['dcrg']."','".$_POST['gis']."','".$_POST['il']."','".$_POST['le']."','".$_POST['wca']."','".$_POST['other']."','".$_POST['family_pension']."','".$_POST['twenty_one']."')");
            //echo "<br>";
             $count=$_POST['count'];
      for($j=1;$j<=$count;$j++)
      {
        //echo "...........".$j;
        $fam_mem_name=$_POST['fam_mem_name_'.$j];
        $fam_mem_mobno=$_POST['fam_mem_mobno_'.$j];
        $fam_mem_panno=$_POST['fam_mem_panno_'.$j];
        $fam_mem_aadharno=$_POST['fam_mem_aadharno_'.$j];
        $fam_mem_rel=$_POST['fam_mem_rel_'.$j];
        $fam_mem_dob=$_POST['fam_mem_dob_'.$j];
        $fam_mem_qualif=$_POST['fam_mem_qualif_'.$j];
        $fam_mem_employedorother=$_POST['fam_mem_employedorother_'.$j];
        $fam_mem_maritial_st=$_POST['fam_mem_maritial_st_'.$j];
        
        $sql33=("INSERT INTO `emp_family_tbl`(`ex_emp_pfno`, `member_name`, `member_mobileno`, `member_panno`, `member_aadharno`, `member_relation`,`marital_status`, `member_dob`, `member_qualifiaction`, `employed_or_other`, `created_at`) VALUES('".$_POST['p_emp_pfno']."','".$fam_mem_name."','".$fam_mem_mobno."','".$fam_mem_panno."','".$fam_mem_aadharno."','".$fam_mem_rel."','".$fam_mem_maritial_st."','".$fam_mem_dob."','".$fam_mem_qualif."','".$fam_mem_employedorother."','".$date."')");

          $result33=mysql_query($sql33);
      }
      //echo "<br>";
      $total = count($_FILES['file']['name']);
      $six = mt_rand(100000, 999999);
      $ex_emp_pf=$_POST['p_emp_pfno'];

      // Loop through each file
      for( $i=0 ; $i < $total ; $i++ ) 
      {
        //Get the temp file path
        $tmpFilePath = $_FILES['file']['tmp_name'][$i];
        $names = $_FILES['file']['name'][$i];
        //Make sure we have a file path
            //Setup our new file path
            $dir = $six."_".$names;
           // $newFilePath = "../../verified_documts/".$dir;
            $folder_name="../../verified_documts/";
            
            if(is_dir($folder_name.$ex_emp_pf)){
            
            }else{
            mkdir($folder_name.$ex_emp_pf);
            }
            $folder_name="../../verified_documts/".$ex_emp_pf."/".$dir;

            

            //Upload the file into the temp dir
            if(move_uploaded_file($tmpFilePath, $folder_name)) 
            {

              $sql2=("INSERT INTO `verified_docmts`(`ex_emp_pfno`, `file_path`, `created_date`) VALUES('".$_POST['p_emp_pfno']."','".$dir."','".$date."')");
              $result2=mysql_query($sql2);
              echo mysql_error();
            }
            
            else
            {
              echo "<script>alert('Failed To upload documens..');window.location='../wi_pending_app.php';</script>";
            }
          
        
            }  
          
           echo "<script>alert('Successfully submitted.');window.location='../wi_pending_app.php';</script>";
          //echo "ssss";
        }
        else
        {
          echo "<script>alert('Failed ');window.location='../wi_pending_app.php';</script>";
          //echo "ffff";
        }
      break;

      case 'upDate_service_particulars':
            dbcon2();
            if($_POST['case']==1)
              {
                $query=mysql_query("UPDATE drmpsurh_sur_railway.prmaemp SET date_of_expiry='".$_POST['expiry_date']."'  where empno='".$_POST['p_emp_pfno']."'");
              }
              else if($_POST['case']==2)
              {
                $query=mysql_query("UPDATE drmpsurh_sur_railway.prmaemp SET date_of_missing='".$_POST['missing_date']."' where empno='".$_POST['p_emp_pfno']."'");
              }
              else if($_POST['case']==3)
              {
                $query=mysql_query("UPDATE drmpsurh_sur_railway.prmaemp SET date_of_md='".$_POST['date_of_md']."',date_of_vr='".$_POST['date_of_vr']."'  where empno='".$_POST['p_emp_pfno']."'");
              }
              else if($_POST['case']==4)
              {
                $query=mysql_query("UPDATE drmpsurh_sur_railway.prmaemp SET date_of_med_decat='".$_POST['txtdomd']."',date_of_retd='".$_POST['txtdor']."'  where empno='".$_POST['p_emp_pfno']."'");
              }
              echo mysql_error();

            

            dbcon1();

            $sql=mysql_query("UPDATE `service_particulars` SET `death_is_dueto_accident_on_duty`='".$_POST['due_to_accident']."',`priority_no`='".$_POST['priority_no']."',`cause_of_death/reason`='".$_POST['cause_death/medical']."',`period_sickness`='".$_POST['period_sickness']."',`total_service`='".$_POST['total_service']."',`alter_job_offered`='".$_POST['alt_job_offered']."',`alter_apptmt_emolumt_offered`='".$_POST['apptmt_emolumt']."',`before_bp`='".$_POST['before_bp']."',`before_da`='".$_POST['before_da']."',`before_hra`='".$_POST['before_hra']."',`before_cca`='".$_POST['before_cca']."',`before_others`='".$_POST['before_others']."',`after_bp`='".$_POST['after_bp']."',`after_da`='".$_POST['after_da']."',`after_hra`='".$_POST['after_hra']."',`after_cca`='".$_POST['after_cca']."',`after_others`='".$_POST['after_others']."',`drop_in_emolumt`='".$_POST['drop_in_emlmt']."',`not_accepting_alter_appmt`='".$_POST['not_accepting_alter']."',`service_trminated/compulsory_retd`='".$_POST['service_terminated/compulsory_retd']."',`cl_sub_n_reason`='".$_POST['cl/sub_reasons']."',`eligible_group`='".$_POST['eligible_group']."',`date_of_receipt_appl`='".$_POST['date_of_receipt']."',`widow_remarried`='".$_POST['widow_remarried']."',`widow_applied_apptmt`='".$_POST['widow_applied_appmt']."',`not_apply_for_apptmt`='".$_POST['not_apply_appmt']."',`minor_at_time_death`='".$_POST['attained_majority']."',`warranting_time_limit`='".$_POST['warranting_time_limit']."',`relaxation_age_req`='".$_POST['relaxation_age_req']."',`date_filled_n_report_submitted`='".$_POST['filled_n_report_submit']."',`other_particulars_considered`='".$_POST['other_particulars']."' WHERE ex_emp_pfno='".$_POST['p_emp_pfno']."'");

            $sql1=mysql_query("UPDATE `wi_settlement` SET `pf`='".$_POST['pf']."',`dcrg`='".$_POST['dcrg']."',`family_pension`='".$_POST['family_pension']."',`gis`='".$_POST['gis']."',`il`='".$_POST['il']."',`le`='".$_POST['le']."',`wca`='".$_POST['wca']."',`others`='".$_POST['other']."' WHERE ex_emp_pfno='".$_POST['p_emp_pfno']."'");


       if($query && $sql && $sql1 )
              {
                
                 echo "<script>alert('Successfully submitted.');window.location='../wi_pending_app.php';</script>";
                //echo "ssss";
              }
              else
              {
                echo "<script>alert('Failed ');window.location='../wi_pending_app.php';</script>";
                //echo "ffff";
              }
        
        break;
        case 'update_Doc':
        dbcon1();
              $ex_emp_pfno=$_POST['ex_emp_pfno'];
              $tble_id=$_POST['tble_id'];
        
              $six = mt_rand(100000, 999999);
              //Get the temp file path
              $tmpFilePath = $_FILES['file']['tmp_name'];
              $names = $_FILES['file']['name'];
              //Make sure we have a file path
                  //Setup our new file path
              $dir = $six."_".$names;
              // $newFilePath = "../../verified_documts/".$dir;
              $folder_name="../../verified_documts/";
            
              if(is_dir($folder_name.$ex_emp_pfno)){
            
              }else{
              mkdir($folder_name.$ex_emp_pfno);
              }
              $folder_name="../../verified_documts/".$ex_emp_pfno."/".$dir;
              //Upload the file into the temp dir

            $qu=mysql_query("SELECT * from verified_docmts where id='".$tble_id."'");
            $res=mysql_fetch_array($qu);

           $folder_name1="../../verified_documts/".$ex_emp_pfno."/".$res['file_path'];
            if(file_exists($folder_name1))
            {
              unlink($folder_name1);
              if(move_uploaded_file($tmpFilePath, $folder_name)) 
              {

                $sql2=mysql_query("UPDATE `verified_docmts` set `file_path`='".$dir."' where ex_emp_pfno='".$ex_emp_pfno."' and id='".$tble_id."' ");
                //$result2=mysql_query($sql2);
                echo mysql_error();
                echo "<script>alert('Updated Successfully...');window.location='../wi_pending_app.php';</script>";
              }
            }
            else
            {
              echo "<script>alert('Failed To upload documents..');window.location='../wi_pending_app.php';</script>";
            }
          
        
      

          break;
          case 'reject':
            dbcon1();
                  $date=date('d-m-Y h:i:s');
                  $ex_emp_pfno=$_POST['ex_emp_pfno'];
                  $fw_tbl_id=$_POST['fw_tbl_id'];
                  //$fw_to_pfno=$_POST['fw_to_pfno'];
                  $rcc=$_SESSION['pf_number'].",".$_SESSION['role'];

                  $update=mysql_query("UPDATE `forward_application` SET depart_time='".$date."',return_status='1',remark='".$_POST['remark']."',rejected_by='".$rcc."',hold_status=0 where ex_emp_pfno='".$ex_emp_pfno."' AND id='".$fw_tbl_id."'  ");
                  // $re_update=mysql_query($update);

                  if($update)
                  {
                  echo "<script>alert('Rejected  Successfully');window.location='../pending_from_dec.php';</script>";
                  //echo "ssss";
                  }
                  else
                  {
                  echo "<script>alert('Failed ');window.location='../pending_from_dec.php';</script>";
                  //echo "ffff";
                  }
              break;
    case 'update_applicant':
        dbcon1();
      echo "<br>".$sql=mysql_query("UPDATE `applicant_registration` SET `applicant_name`='".$_POST['appl_name']."',`applicant_dob`='".$_POST['aapl_dob']."',`applicant_mobno`='".$_POST['appl_mobile']."',`applicant_emailid`='".$_POST['appl_email']."',`applicant_panno`='".$_POST['appl_pan']."',`applicant_aadharno`='".$_POST['appl_aadhar']."',`applicant_gender`='".$_POST['appl_gender']."',`applicant_qualifiaction`='".$_POST['appl_qualification']."',`mariatial_status`='".$_POST['appl_mstatus']."',`category`='".$_POST['category']."',`caste`='".$_POST['caste']."',`relation_with`='".$_POST['relation']."' where ex_emp_pfno='".$_POST['p_emp_pfno']."' and username='".$_POST['p_username']."'");

      $cnt=$_POST['cnt'];
      //$file_cnt=$_POST['sr'];
      if($sql)
      {
        for($i=1;$i<=$cnt;$i++)
          {
            echo "<br>".$sql1=mysql_query("UPDATE `emp_family_tbl` SET `member_name`='".$_POST['fam_mem_name_'.$i]."',`member_mobileno`='".$_POST['fam_mem_mobno_'.$i]."',`member_panno`='".$_POST['fam_mem_panno_'.$i]."',`member_aadharno`='".$_POST['fam_mem_aadharno_'.$i]."',`member_relation`='".$_POST['fam_mem_rel_'.$i]."',`member_dob`='".$_POST['fam_mem_dob_'.$i]."',`member_qualifiaction`='".$_POST['fam_mem_qualif_'.$i]."',`employed_or_other`='".$_POST['fam_mem_employedorother_'.$i]."',created_at='".$date."' WHERE ex_emp_pfno='".$_POST['p_emp_pfno']."' and id='".$_POST['emp_fly_id_'.$i]."' ");
          }  

          echo "<script>alert('Applicantion Updated Successfully');window.location='../registration.php';</script>";
      }
      else
      {
        echo "<script>alert('Failed...');window.location='../registration.php';</script>";
      }
      




      break;


    case 'fetch_employee_details':
          
          $id=$_POST['id'];
          $data=[];
          $data=get_employee_details($id);
          echo json_encode($data);
    break;
    
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
    
    case 'removeApplicant':
        dbcon1();
          $data=0;
          $sql="DELETE from drmpsurh_cga.applicant_registration where id='".$_POST['id']."' AND ex_emp_pfno='".$_POST['pf']."' ";
          $result=mysql_query($sql);
          if(mysql_affected_rows() >= 0)
          {
            $sql1="DELETE from emp_family_tbl where ex_emp_pfno='".$_POST['pf']."' ";
             $res = mysql_query($sql1);
             $sql2="DELETE from upload_doc where ex_emp_pfno='".$_POST['pf']."' ";
             $res2 = mysql_query($sql2);
              $data=1;
          }
          else
          {
            $data=0;
          }
          echo $data;
      break;


    case 'activeApplicant':

      $active = '1';
      $pfno = $_REQUEST['id'];
      if(activeUser($pfno,$active))
            echo "Applicant Activated successfully";
          else
            echo "Something went wrong";
    break;
    case 'deactiveApplicant':
      $active = '0';
      $pfno = $_REQUEST['id'];
      if(deactiveUser($pfno,$active))
            echo "Applicant Deactivated successfully";
          else
            echo "Something went wrong";
    break;

  
    default:
      echo "Invalid option";
    break;
	
	
	
	
  }
 ?>
