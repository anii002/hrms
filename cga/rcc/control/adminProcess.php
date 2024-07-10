<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include('adminFunction.php');
switch ($_REQUEST['action']) {
  case 'changeimg':
    if (changeimg($_FILES["profile"]["name"], $_FILES["profile"]["tmp_name"])) {
      echo "<script>alert('Profile photo uploaded successfully');window.location='../profile.php';</script>";
    } else {
      echo "<script>alert('Failed to upload');window.location='../profile.php';</script>";
    }
    break;
  case 'updateUser':
    $fname = $_REQUEST['fname'];
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['mobile'];
    $design = $_REQUEST['design'];
    if (updateUser($fname, $email, $mobile, $design))
      echo "<script>alert('User details updated successfully');window.location='../profile.php';</script>";
    else
      echo "<script>alert('User details not updated');window.location='../profile.php';</script>";
    break;
  case 'changePass':
    $pass = $_REQUEST['pass'];
    $confirm = $_REQUEST['confirm'];
    if ($pass == $confirm) {
      if (changePass($pass, $confirm))
        echo "<script>alert('User Password changed successfully');window.location='../profile.php';</script>";
      else
        echo "<script>alert('User Password not changed');window.location='../profile.php';</script>";
    } else {
      echo "<script>alert('Confirm password must match with password');window.location='../profile.php';</script>";
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
  case 'update_nomi':
    $con = dbcon1();
    $sql = "UPDATE applicant_registration set applicant_dob='" . $_POST['aapl_dob'] . "',applicant_name='" . $_POST['appl_name'] . "',applicant_mobno='" . $_POST['mobile'] . "',applicant_gender='" . $_POST['gender'] . "',applicant_emailid='" . $_POST['email'] . "',applicant_panno='" . $_POST['pan'] . "',applicant_aadharno='" . $_POST['aadhar'] . "',applicant_qualifiaction='" . $_POST['qualification'] . "',caste='" . $_POST['caste'] . "' where ex_emp_pfno='" . $_POST['empid'] . "' ";
    $result = mysqli_query($con, $sql);

    $sql1 = "UPDATE nomination_note set `date`='" . $_POST['date'] . "',subject='" . $_POST['subject'] . "',ref='" . $_POST['ref'] . "',parag1='" . $_POST['para1'] . "',parag2='" . $_POST['para2'] . "',last_parag='" . $_POST['last_para'] . "' where ex_emp_pfno='" . $_POST['empid'] . "' ";
    $result1 = mysqli_query($con, $sql1);
    if ($result && $result1) {
      echo "<script>alert('Updated..');window.location='../dak_pending_app.php';</script>";
    } else {
      echo "<script>alert('Failed..');window.location='../dak_pending_app.php';</script>";
    }
    break;
  case 'basic_details':
    $con = dbcon1();
    $sql = "UPDATE applicant_registration set applicant_emailid='" . $_POST['email'] . "',applicant_panno='" . $_POST['pan'] . "',applicant_aadharno='" . $_POST['aadhar'] . "',applicant_qualifiaction='" . $_POST['qualification'] . "',caste='" . $_POST['appl_caste'] . "' where ex_emp_pfno='" . $_POST['empid'] . "' ";
    $result = mysqli_query($con, $sql);

    $sql1 = "INSERT INTO `nomination_note`(`ex_emp_pfno`, `category`, `date`, `subject`, `ref`, `parag1`, `parag2`, `last_parag`, `dpo_remark`, `concern_WI`) VALUES('" . $_POST['empid'] . "','" . $_POST['category'] . "','" . $_POST['date'] . "','" . $_POST['subject'] . "','" . $_POST['ref'] . "','" . $_POST['para1'] . "','" . $_POST['para2'] . "','" . $_POST['last_para'] . "','','')";
    $result1 = mysqli_query($con, $sql1);

    $sql3 = mysqli_query($con, "UPDATE forward_application set rcc_note_status='1' where ex_emp_pfno='" . $_POST['empid'] . "'");

    $date = date("d-m-Y h:i:sa");
    $total = count($_FILES['file']['name']);
    $date2 = date('h:i:s');
    $date2 = explode(':', $date2);
    $date2 = $date2[0] . $date2[1] . $date2[2];
    // Loop through each file
    for ($i = 0; $i < $total; $i++) {
      //Get the temp file path
      $tmpFilePath = $_FILES['file']['tmp_name'][$i];
      $names = $_FILES['file']['name'][$i];
      $ex_emp_pf = $_POST['empid'];
      //Make sure we have a file path
      //Setup our new file path
      $dir = $date2 . "_" . $names;

      $folder_name = "../../uploadFiles/";

      if (is_dir($folder_name . $ex_emp_pf)) {
      } else {
        mkdir($folder_name . $ex_emp_pf);
      }
      $folder_name = "../../uploadFiles/" . $ex_emp_pf . "/" . $dir;

      //Upload the file into the temp dir
      if (move_uploaded_file($tmpFilePath, $folder_name)) {

        $sql2 = ("INSERT INTO `upload_doc`(`ex_emp_pfno`, `file_path`, `created_at`) VALUES('" . $ex_emp_pf . "','" . $dir . "','" . $date . "')");
        $result2 = mysqli_query($con,$sql2);
      } else {
        echo "<script>alert('Failed To Registerd..');window.location='../dak_pending_app.php';</script>";
      }
    }
    if ($result2 && $result1 && $result && $sql3) {
      echo "<script>alert('Submitted..');window.location='../dak_pending_app.php';</script>";
    } else {
      echo "<script>alert('Failed To Registerd..');window.location='../dak_pending_app.php';</script>";
    }

    break;

  case 'update_Doc':
    dbcon1();
    $ex_emp_pfno = $_POST['ex_emp_pfno'];
    $tble_id = $_POST['tble_id'];

    $six = mt_rand(100000, 999999);
    //Get the temp file path
    $tmpFilePath = $_FILES['file']['tmp_name'];
    $names = $_FILES['file']['name'];
    //Make sure we have a file path
    //Setup our new file path
    $dir = $six . "_" . $names;
    // $newFilePath = "../../verified_documts/".$dir;
    $folder_name = "../../uploadFiles/";

    if (is_dir($folder_name . $ex_emp_pfno)) {
    } else {
      mkdir($folder_name . $ex_emp_pfno);
    }
    $folder_name = "../../uploadFiles/" . $ex_emp_pfno . "/" . $dir;
    //Upload the file into the temp dir

    $qu = mysqli_query($con,"SELECT * from upload_doc where id='" . $tble_id . "'");
    $res = mysqli_fetch_array($qu);

    echo "<br>" . $folder_name1 = "../../uploadFiles/" . $ex_emp_pfno . "/" . $res['file_path'];
    echo mysqli_error($con);
    if (file_exists($folder_name1)) {
      unlink($folder_name1);
      if (move_uploaded_file($tmpFilePath, $folder_name)) {

        $sql2 = mysqli_query($con,"UPDATE `upload_doc` set `file_path`='" . $dir . "' where ex_emp_pfno='" . $ex_emp_pfno . "' and id='" . $tble_id . "' ");
        $result2 = mysqli_query($con,$sql2);

        echo "<script>alert('Updated Successfully...');window.location='../dak_pending_app.php';</script>";
      }
    } else {
      echo "<script>alert('Failed To upload documents..');window.location='../dak_pending_app.php';</script>";
    }




    break;


  case 'medicalCase_Data_ins':
    $serial_no = $_POST['sr_no'];
    $md_app_d = $_POST['md_app_d'];
    $subject = $_POST['subject'];
    $empno = $_POST['pf_num'];
    //echo "<br>".$a=mysqli_real_escape_string($_POST['last_common_details']);
    //echo "<p>".nl2br($_POST['last_common_details'])."</p><br>";
    //echo nl2br("You will find the \n newlines in this string \r\n on the browser window.");
    $con=dbcon1();
    $sql = ($con,"INSERT INTO `common_heading_details`( `ex_emp_pfno`, `category`, `date`, `number`, `subject`) VALUES ('" . $empno . "','" . $_POST['category'] . "','" . $md_app_d . "','" . $serial_no . "','" . $subject . "')");
    $sqll = mysqli_query($sql);
    if ($sqll) {
      $con=dbcon2();
      $query = mysqli_query($con,"UPDATE register_user set date_of_md='" . $_POST['date_of_md'] . "',date_of_vr='" . $_POST['date_of_vr'] . "' where emp_no='" . $empno . "' ");


      $con=dbcon1();
      $queryM2 = mysqli_query($con,"UPDATE `applicant_registration` SET `applicant_name`='" . $_POST['applicant_name'] . "',`applicant_dob`='" . $_POST['applicant_dob'] . "',`applicant_mobno`='" . $_POST['mobile'] . "',`applicant_emailid`='" . $_POST['appl_email'] . "',`applicant_panno`='" . $_POST['pan'] . "',`applicant_aadharno`='" . $_POST['aadhar'] . "',`applicant_gender`='" . $_POST['appl_gender'] . "',`applicant_qualifiaction`='" . $_POST['education'] . "',`mariatial_status`='" . $_POST['maritial_status'] . "',`permanent_address`='" . $_POST['permanent_address'] . "',`identification_mark1`='" . $_POST['identfi_1'] . "',`identification_mark2`='" . $_POST['identfi_2'] . "',`caste`='" . $_POST['appl_caste'] . "',`relation_with`='" . $_POST['app_rel'] . "' WHERE ex_emp_pfno='" . $empno . "'");
      $cnt = $_POST['count'];
      for ($i = 1; $i <= $cnt; $i++) {
        $queryM3 = mysqli_query($con,"UPDATE `emp_family_tbl` SET `member_name`='" . $_POST['m_name_' . $i] . "',`member_mobileno`='" . $_POST['m_mob_' . $i] . "',`member_panno`='" . $_POST['m_pan_' . $i] . "',`member_aadharno`='" . $_POST['m_aadhar_' . $i] . "',`member_relation`='" . $_POST['m_rel_' . $i] . "',`marital_status`='" . $_POST['m_mstatus_' . $i] . "',`member_dob`='" . $_POST['m_date_' . $i] . "',`member_qualifiaction`='" . $_POST['m_edu_' . $i] . "',`employed_or_other`='" . $_POST['m_employedornot_' . $i] . "' WHERE id='" . $_POST['fmly_id_' . $i] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");
      }


      $query2 = mysqli_query($con,"UPDATE forward_application set rcc_note_status=1 where id='" . $_POST['pid'] . "' ");

      $query3 = mysqli_query($con,"INSERT INTO `medicalcase_form`(`ex_emp_pfno`, `category_id`, `a_i`, `a_ii`, `a_iii`, `b`, `c`, `vii`, `last_common_details`) VALUES ('" . $empno . "','" . $_POST['category'] . "','" . $_POST['ai'] . "','" . $_POST['aii'] . "','" . $_POST['aiii'] . "','" . $_POST['b'] . "','" . $_POST['c'] . "','" . $_POST['vii'] . "','" . $_POST['last_common_details'] . "')");


      echo mysqli_error($con);
      echo "<script>alert('Approved successfully..');window.location='../rcc_pending_app.php';</script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../rcc_pending_app.php';</script>";
    }

    break;
  case 'missingData_ins':
    $date = date('d-m-Y h:i:s');
    $con=dbcon1();
    $sql = mysqli_query($con,"INSERT INTO `common_heading_details`( `ex_emp_pfno`, `category`, `date`, `number`, `subject`) VALUES ('" . $_POST['pf_num'] . "','" . $_POST['category'] . "','" . $_POST['date'] . "','" . $_POST['sr_no'] . "','" . $_POST['subject'] . "')");

    if ($sql) {
      $sql1 = mysqli_query($con,"INSERT INTO `fetch_category_data`(`ex_emp_pfno`, `category_id`, `06`, `07`, `08`, `09`, `10`, `last_common`, `created_at`) VALUES ('" . $_POST['pf_num'] . "','" . $_POST['category'] . "','" . mysqli_real_escape_string($_POST['six']) . "','" . mysqli_real_escape_string($_POST['seven']) . "','" . mysqli_real_escape_string($_POST['eight']) . "','" . mysqli_real_escape_string($_POST['nine']) . "','" . mysqli_real_escape_string($_POST['ten']) . "','" . mysqli_real_escape_string($_POST['last_common']) . "','" . $date . "')");

      $sql2 = mysqli_query($con,"INSERT INTO `financial_position_of_ex_emp`(`ex_emp_pfno`, `category`, `income_from_fmly_pension`, `expected_income`, `total_income`, `immovable property`, `his_own_houseornot`) VALUES ('" . $_POST['pf_num'] . "','" . $_POST['category'] . "','" . $_POST['income_fp'] . "','" . $_POST['expected_income'] . "','" . $_POST['total_income'] . "','" . $_POST['immovable_property'] . "','" . $_POST['emp_house'] . "')");

      //$sql3=mysqli_query("UPDATE settlement SET provident_fund='".$_POST['provident_fund']."',dcrg='".$_POST['dcrg']."',ngis_lumpsum='".$_POST['ngis_lumps']."',ngis_saving_fund='".$_POST['ngis_saving_fund']."',leave_sal='".$_POST['leave_sal']."',deposit_linked_inssurance='".$_POST['deposit_ins']."',fmly_pension='".$_POST['family_pension']."' where ex_emp_pfno='".$_POST['pf_num']."' and category='".$_POST['category']."' ");
      $sql3 = mysqli_query($con,"INSERT INTO `settlement`(`ex_emp_pfno`, `category`, `provident_fund`, `dcrg`, `ngis_lumpsum`, `ngis_saving_fund`, `leave_sal`, `deposit_linked_inssurance`,fmly_pension) VALUES ('" . $_POST['pf_num'] . "','" . $_POST['category'] . "','" . $_POST['provident_fund'] . "','" . $_POST['dcrg'] . "','" . $_POST['ngis_lumps'] . "','" . $_POST['ngis_saving_fund'] . "','" . $_POST['family_pension'] . "','" . $_POST['deposit_ins'] . "','" . $_POST['family_pension'] . "')");

      $queryM2 = mysqli_query($con,"UPDATE `applicant_registration` SET `applicant_name`='" . $_POST['applicant_name'] . "',`applicant_dob`='" . $_POST['applicant_dob'] . "',`applicant_mobno`='" . $_POST['mobile'] . "',`applicant_emailid`='" . $_POST['appl_email'] . "',`applicant_panno`='" . $_POST['pan'] . "',`applicant_aadharno`='" . $_POST['aadhar'] . "',`applicant_gender`='" . $_POST['appl_gender'] . "',`applicant_qualifiaction`='" . $_POST['education'] . "',`mariatial_status`='" . $_POST['maritial_status'] . "',`permanent_address`='" . $_POST['permanent_address'] . "',`identification_mark1`='" . $_POST['identfi_1'] . "',`identification_mark2`='" . $_POST['identfi_2'] . "',`caste`='" . $_POST['appl_caste'] . "',`relation_with`='" . $_POST['app_rel'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "'");
      $cnt = $_POST['count'];
      for ($i = 1; $i <= $cnt; $i++) {
        $queryM3 = mysqli_query($con,"UPDATE `emp_family_tbl` SET `member_name`='" . $_POST['m_name_' . $i] . "',`member_mobileno`='" . $_POST['m_mob_' . $i] . "',`member_panno`='" . $_POST['m_pan_' . $i] . "',`member_aadharno`='" . $_POST['m_aadhar_' . $i] . "',`member_relation`='" . $_POST['m_rel_' . $i] . "',`marital_status`='" . $_POST['m_mstatus_' . $i] . "',`member_dob`='" . $_POST['m_date_' . $i] . "',`member_qualifiaction`='" . $_POST['m_edu_' . $i] . "',`employed_or_other`='" . $_POST['m_employedornot_' . $i] . "' WHERE id='" . $_POST['fmly_id_' . $i] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");
      }

      $con=dbcon2();
      $query = mysqli_query($con,"UPDATE register_user SET date_of_missing='" . $_POST['txtdom'] . "' where emp_no='" . $_POST['pf_num'] . "'");

      echo mysqli_error($con);



      $con=dbcon1();
      $query2 = mysqli_query($con,"UPDATE drmpsurh_cga.forward_application set rcc_note_status=1 where id='" . $_POST['pid'] . "' ");
      echo mysqli_error($con);
      echo "<script>alert('Submitted successfully..');window.location='../rcc_pending_app.php';</script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../rcc_pending_app.php';</script>";
    }
    break;

  case 'deathData_ins':
    $con=dbcon1();
    $date = date('d-m-Y h:i:s');
    // echo $_POST['six'];
    $con=dbcon1();
    $sql = mysqli_query($con,"INSERT INTO `common_heading_details`( `ex_emp_pfno`, `category`, `date`, `number`, `subject`) VALUES ('" . $_POST['pf_num'] . "','" . $_POST['category'] . "','" . $_POST['date'] . "','" . $_POST['sr_no'] . "','" . $_POST['subject'] . "')");

    if ($sql) {
      $sql1 = mysqli_query($con,"INSERT INTO `fetch_category_data`(`ex_emp_pfno`, `category_id`, `06`, `07`, `08`, `09`, `10`, `last_common`, `created_at`) VALUES ('" . $_POST['pf_num'] . "','" . $_POST['category'] . "','" . mysqli_real_escape_string($_POST['six']) . "','" . mysqli_real_escape_string($_POST['seven']) . "','" . mysqli_real_escape_string($_POST['eight']) . "','" . mysqli_real_escape_string($_POST['nine']) . "','" . mysqli_real_escape_string($_POST['ten']) . "','" . mysqli_real_escape_string($_POST['last_common']) . "','" . $date . "')");

      $sql2 = mysqli_query($con,"INSERT INTO `financial_position_of_ex_emp`(`ex_emp_pfno`, `category`, `income_from_fmly_pension`, `expected_income`, `total_income`, `immovable property`, `his_own_houseornot`) VALUES ('" . $_POST['pf_num'] . "','" . $_POST['category'] . "','" . $_POST['income_fp'] . "','" . $_POST['expected_income'] . "','" . $_POST['total_income'] . "','" . $_POST['immovable_property'] . "','" . $_POST['emp_house'] . "')");


      //$sql3=mysqli_query("UPDATE settlement SET provident_fund='".$_POST['provident_fund']."',dcrg='".$_POST['dcrg']."',ngis_lumpsum='".$_POST['ngis_lumps']."',ngis_saving_fund='".$_POST['ngis_saving_fund']."',leave_sal='".$_POST['leave_sal']."',deposit_linked_inssurance='".$_POST['deposit_ins']."',fmly_pension='".$_POST['family_pension']."' where ex_emp_pfno='".$_POST['pf_num']."' and category='".$_POST['category']."' ");
      $sql3 = mysqli_query($con,"INSERT INTO `settlement`(`ex_emp_pfno`, `category`, `provident_fund`, `dcrg`, `ngis_lumpsum`, `ngis_saving_fund`, `leave_sal`, `deposit_linked_inssurance`,fmly_pension) VALUES ('" . $_POST['pf_num'] . "','" . $_POST['category'] . "','" . $_POST['provident_fund'] . "','" . $_POST['dcrg'] . "','" . $_POST['ngis_lumps'] . "','" . $_POST['ngis_saving_fund'] . "','" . $_POST['family_pension'] . "','" . $_POST['deposit_ins'] . "','" . $_POST['family_pension'] . "')");

      $queryM2 = mysqli_query($con,"UPDATE `applicant_registration` SET `applicant_name`='" . $_POST['applicant_name'] . "',`applicant_dob`='" . $_POST['applicant_dob'] . "',`applicant_mobno`='" . $_POST['mobile'] . "',`applicant_emailid`='" . $_POST['appl_email'] . "',`applicant_panno`='" . $_POST['pan'] . "',`applicant_aadharno`='" . $_POST['aadhar'] . "',`applicant_gender`='" . $_POST['appl_gender'] . "',`applicant_qualifiaction`='" . $_POST['education'] . "',`mariatial_status`='" . $_POST['maritial_status'] . "',`permanent_address`='" . $_POST['permanent_address'] . "',`identification_mark1`='" . $_POST['identfi_1'] . "',`identification_mark2`='" . $_POST['identfi_2'] . "',`caste`='" . $_POST['appl_caste'] . "',`relation_with`='" . $_POST['app_rel'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "'");
      $cnt = $_POST['count'];
      for ($i = 1; $i <= $cnt; $i++) {
        $queryM3 = mysqli_query($con,"UPDATE `emp_family_tbl` SET `member_name`='" . $_POST['m_name_' . $i] . "',`member_mobileno`='" . $_POST['m_mob_' . $i] . "',`member_panno`='" . $_POST['m_pan_' . $i] . "',`member_aadharno`='" . $_POST['m_aadhar_' . $i] . "',`member_relation`='" . $_POST['m_rel_' . $i] . "',`marital_status`='" . $_POST['m_mstatus_' . $i] . "',`member_dob`='" . $_POST['m_date_' . $i] . "',`member_qualifiaction`='" . $_POST['m_edu_' . $i] . "',`employed_or_other`='" . $_POST['m_employedornot_' . $i] . "' WHERE id='" . $_POST['fmly_id_' . $i] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");
      }



      $query2 = mysqli_query($con,"UPDATE forward_application set rcc_note_status=1 where id='" . $_POST['pid'] . "' ");

      $con=dbcon2();
      $query = mysqli_query($con,"UPDATE register_user set date_of_expiry='" . $_POST['txtdoe'] . "' where emp_no='" . $_POST['pf_num'] . "' ");

      echo mysqli_error($con);
      echo "<script>alert('Submitted successfully..');window.location='../rcc_pending_app.php';</script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../rcc_pending_app.php';</script>";
    }

    break;
  case 'miniorcase_data':

    $date = date('d-m-Y h:i:s');
    // echo $_POST['six'];
    $con=dbcon1();
    $sql = mysqli_query($con,"INSERT INTO `common_heading_details`( `ex_emp_pfno`, `category`, `date`, `number`, `subject`) VALUES ('" . $_POST['pf_num'] . "','" . $_POST['category'] . "','" . $_POST['date'] . "','" . $_POST['sr_no'] . "','" . mysqli_real_escape_string($_POST['subject']) . "')");

    if ($sql) {
      $sql1 = mysqli_query($con,"INSERT INTO `fetch_category_data`(`ex_emp_pfno`, `category_id`, `06`, `07`, `08`, `09`, `10`, `last_common`, `created_at`) VALUES ('" . $_POST['pf_num'] . "','" . $_POST['category'] . "','" . mysqli_real_escape_string($_POST['six']) . "','" . mysqli_real_escape_string($_POST['seven']) . "','" . mysqli_real_escape_string($_POST['eight']) . "','" . mysqli_real_escape_string($_POST['nine']) . "','','" . mysqli_real_escape_string($_POST['last_common']) . "','" . $date . "')");

      $sql2 = mysqli_query($con,"INSERT INTO `financial_position_of_ex_emp`(`ex_emp_pfno`, `category`, `income_from_fmly_pension`, `expected_income`, `total_income`, `immovable property`, `his_own_houseornot`) VALUES ('" . $_POST['pf_num'] . "','" . $_POST['category'] . "','" . $_POST['income_fp'] . "','" . $_POST['expected_income'] . "','" . $_POST['total_income'] . "','" . $_POST['immovable_property'] . "','" . $_POST['emp_house'] . "')");


      // $sql3=mysqli_query("UPDATE settlement SET provident_fund='".$_POST['provident_fund']."',dcrg='".$_POST['dcrg']."',ngis_lumpsum='".$_POST['ngis_lumps']."',ngis_saving_fund='".$_POST['ngis_saving_fund']."',leave_sal='".$_POST['leave_sal']."',deposit_linked_inssurance='".$_POST['deposit_ins']."',fmly_pension='".$_POST['family_pension']."' where ex_emp_pfno='".$_POST['pf_num']."' and category='".$_POST['category']."' ");
      $sql3 = mysqli_query($con,"INSERT INTO `settlement`(`ex_emp_pfno`, `category`, `provident_fund`, `dcrg`, `ngis_lumpsum`, `ngis_saving_fund`, `leave_sal`, `deposit_linked_inssurance`,fmly_pension) VALUES ('" . $_POST['pf_num'] . "','" . $_POST['category'] . "','" . $_POST['provident_fund'] . "','" . $_POST['dcrg'] . "','" . $_POST['ngis_lumps'] . "','" . $_POST['ngis_saving_fund'] . "','" . $_POST['family_pension'] . "','" . $_POST['deposit_ins'] . "','" . $_POST['family_pension'] . "')");

      $queryM2 = mysqli_query($con,"UPDATE `applicant_registration` SET `applicant_name`='" . $_POST['applicant_name'] . "',`applicant_dob`='" . $_POST['applicant_dob'] . "',`applicant_mobno`='" . $_POST['mobile'] . "',`applicant_emailid`='" . $_POST['appl_email'] . "',`applicant_panno`='" . $_POST['pan'] . "',`applicant_aadharno`='" . $_POST['aadhar'] . "',`applicant_gender`='" . $_POST['appl_gender'] . "',`applicant_qualifiaction`='" . $_POST['education'] . "',`mariatial_status`='" . $_POST['maritial_status'] . "',`permanent_address`='" . $_POST['permanent_address'] . "',`identification_mark1`='" . $_POST['identfi_1'] . "',`identification_mark2`='" . $_POST['identfi_2'] . "',`caste`='" . $_POST['appl_caste'] . "',`relation_with`='" . $_POST['app_rel'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "'");
      $cnt = $_POST['count'];
      for ($i = 1; $i <= $cnt; $i++) {
        $queryM3 = mysqli_query($con,"UPDATE `emp_family_tbl` SET `member_name`='" . $_POST['m_name_' . $i] . "',`member_mobileno`='" . $_POST['m_mob_' . $i] . "',`member_panno`='" . $_POST['m_pan_' . $i] . "',`member_aadharno`='" . $_POST['m_aadhar_' . $i] . "',`member_relation`='" . $_POST['m_rel_' . $i] . "',`marital_status`='" . $_POST['m_mstatus_' . $i] . "',`member_dob`='" . $_POST['m_date_' . $i] . "',`member_qualifiaction`='" . $_POST['m_edu_' . $i] . "',`employed_or_other`='" . $_POST['m_employedornot_' . $i] . "' WHERE id='" . $_POST['fmly_id_' . $i] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");
      }
      $con=dbcon2();
      $query = mysqli_query($con,"UPDATE register_user set date_of_med_decat='" . $_POST['vtxtdomd'] . "',date_of_retd='" . $_POST['txtdor'] . "' where emp_no='" . $_POST['pf_num'] . "' ");


      $con=dbcon1();
      $query2 = mysqli_query($con,"UPDATE forward_application set rcc_note_status=1 where id='" . $_POST['pid'] . "' ");
      echo mysqli_error();
      echo "<script>alert('Submitted successfully..');window.location='../rcc_pending_app.php';</script>";
    } else {
      echo "<script>alert('Something went wrong');window.location='../rcc_pending_app.php';</script>";
    }

    break;

  case 'allcase_fw':
    $date = date('d-m-Y h:i:s');
    $ex_emp_pfno = $_POST['ex_emp_pfno'];
    $appl_username = $_POST['username'];
    $fw_to_pf = $_POST['fw_to_pfno'];
    $fw_tbl_id = $_POST['fw_tbl_id'];


    $con=dbcon1();
    $update = "UPDATE `forward_application` SET hold_status='0' , depart_time='" . $date . "',rcc_note_status='0' where ex_emp_pfno='" . $ex_emp_pfno . "' AND id='" . $fw_tbl_id . "' ";
    $re_update = mysqli_query($con,$update);


    $sql = mysqli_query($con,"SELECT unit_id from login where pf_number='" . $fw_to_pf . "'");
    $value = mysqli_fetch_array($sql);

    $fw_to_unitid = $value['unit_id'];


    $query = "INSERT INTO `forward_application`( `ex_emp_pfno`, `applicant_username`, `forward_to_u`, `forward_to_pfno`, `forward_from_u`, `forward_from_pfno`, `arrived_time`, `depart_time`, `hold_status`, `return_status`,`rcc_note_status`,`drm_approve`) VALUES('" . $ex_emp_pfno . "','" . $appl_username . "','" . $fw_to_unitid . "','" . $fw_to_pf . "','" . $_SESSION['unitid'] . "','" . $_SESSION['pf_number'] . "','" . $date . "','','1','','','')";
    $result = mysqli_query($con,$query);



    if ($result && $re_update) {
      echo "<script>alert('Forwarded  Successfully');window.location='../rcc_approved_list.php';</script>";
      //echo "ssss";
    } else {
      echo "<script>alert('Failed to Forward ');window.location='../rcc_approved_list.php';</script>";
      //echo "ffff";
    }
    break;
  case 'fw_cc':
    $date = date('d-m-Y h:i:s');
    $ex_emp_pfno = $_POST['ex_emp_pfno'];
    $fw_tbl_id = $_POST['fw_tbl_id'];

    $con=dbcon1();
    $update = "UPDATE `forward_application` SET depart_time='" . $date . "',rcc_note_status='1' where ex_emp_pfno='" . $ex_emp_pfno . "' AND id='" . $fw_tbl_id . "' ";
    $re_update = mysqli_query($con,$update);

    if ($re_update) {
      echo "<script>alert('Forwarded  Successfully');window.location='../rcc_fw_to_cc.php';</script>";
      //echo "ssss";
    } else {
      echo "<script>alert('Failed to Forward ');window.location='../rcc_fw_to_cc.php';</script>";
      //echo "ffff";
    }
    break;

  case 'nomination_note_fw':

    $date = date('d-m-Y h:i:s');
    $ex_emp_pfno = $_POST['ex_emp_pfno'];
    $appl_username = $_POST['username'];
    $fw_to_pf = $_POST['fw_to_pfno'];
    $fw_tbl_id = $_POST['fw_tbl_id'];


    $con=dbcon1();
    $update = "UPDATE `forward_application` SET dak_status='0' , depart_time='" . $date . "',rcc_note_status='0' where ex_emp_pfno='" . $ex_emp_pfno . "' AND id='" . $fw_tbl_id . "' ";
    $re_update = mysqli_query($con,$update);


    $sql = mysqli_query($con,"SELECT unit_id from login where pf_number='" . $fw_to_pf . "'");
    $value = mysqli_fetch_array($sql);

    $fw_to_unitid = $value['unit_id'];


    $query = "INSERT INTO `forward_application`( `ex_emp_pfno`, `applicant_username`, `forward_to_u`, `forward_to_pfno`, `forward_from_u`, `forward_from_pfno`, `arrived_time`, `depart_time`,`dak_status`, `hold_status`, `return_status`,`rcc_note_status`,`drm_approve`,`cc_status`,`remark`,`rejected_by`) VALUES('" . $ex_emp_pfno . "','" . $appl_username . "','" . $fw_to_unitid . "','" . $fw_to_pf . "','" . $_SESSION['unitid'] . "','" . $_SESSION['pf_number'] . "','" . $date . "','','1','1','','','','','','')";
    $result = mysqli_query($query);



    if ($result && $re_update) {
      echo "<script>alert('Forwarded  Successfully');window.location='../dak_pending_app.php';</script>";
      //echo "ssss";
    } else {
      echo "<script>alert('Failed to Forward ');window.location='../dak_pending_app.php';</script>";
      //echo "ffff";
    }
    break;
  case 'nomiFW_wi':

    $date = date('d-m-Y h:i:s');
    $ex_emp_pfno = $_POST['ex_emp_pfno'];
    $appl_username = $_POST['username'];
    $fw_to_pf = $_POST['fw_to_pfno'];
    $fw_tbl_id = $_POST['fw_tbl_id'];


    $con=dbcon1();
    $update = "UPDATE `forward_application` SET hold_status='0' , depart_time='" . $date . "',rcc_note_status='0' where ex_emp_pfno='" . $ex_emp_pfno . "' AND id='" . $fw_tbl_id . "' ";
    $re_update = mysqli_query($con,$update);


    $sql = mysqli_query($con,"SELECT unit_id from login where pf_number='" . $fw_to_pf . "'");
    $value = mysqli_fetch_array($sql);

    $fw_to_unitid = $value['unit_id'];


    $query = "INSERT INTO `forward_application`( `ex_emp_pfno`, `applicant_username`, `forward_to_u`, `forward_to_pfno`, `forward_from_u`, `forward_from_pfno`, `arrived_time`, `depart_time`,`dak_status`, `hold_status`, `return_status`,`rcc_note_status`,`drm_approve`,`cc_status`,`remark`,`rejected_by`) VALUES('" . $ex_emp_pfno . "','" . $appl_username . "','" . $fw_to_unitid . "','" . $fw_to_pf . "','" . $_SESSION['unitid'] . "','" . $_SESSION['pf_number'] . "','" . $date . "','','','1','','','','','','')";
    $result = mysqli_query($con,$query);



    if ($result && $re_update) {
      echo "<script>alert('Forwarded  Successfully');window.location='../dak_pending_app.php';</script>";
      //echo "ssss";
    } else {
      echo "<script>alert('Failed to Forward ');window.location='../dak_pending_app.php';</script>";
      //echo "ffff";
    }
    break;
  case 'rejected_app_update':
    $date = date('d-m-Y h:i:s');
    $ex_emp_pfno = $_POST['ex_emp_pfno'];
    $appl_username = $_POST['username'];
    $fw_to_pf = $_POST['fw_to_pfno'];
    $fw_tbl_id = $_POST['fw_tbl_id'];

    $con=dbcon1();

    echo "<br>" . $update = "UPDATE `forward_application` SET hold_status='0' , depart_time='" . $date . "' where ex_emp_pfno='" . $ex_emp_pfno . "' AND id='" . $fw_tbl_id . "' ";
    $re_update = mysqli_query($con,$update);


    $sql = mysqli_query($con,"SELECT unit_id from login where pf_number='" . $fw_to_pf . "'");
    $value = mysqli_fetch_array($sql);

    $fw_to_unitid = $value['unit_id'];


    echo "<br>" . $query = "INSERT INTO `forward_application`( `ex_emp_pfno`, `applicant_username`, `forward_to_u`, `forward_to_pfno`, `forward_from_u`, `forward_from_pfno`, `arrived_time`, `depart_time`, `hold_status`, `return_status`,`rcc_note_status`,`drm_approve`,`cc_status`,`remark`,`rejected_by`) VALUES('" . $ex_emp_pfno . "','" . $appl_username . "','" . $fw_to_unitid . "','" . $fw_to_pf . "','" . $_SESSION['unitid'] . "','" . $_SESSION['pf_number'] . "','" . $date . "','" . $date . "','1','','','','','','')";
    $result = mysqli_query($query);



    if ($result && $re_update) {
      echo "<script>alert('Forwarded  Successfully');window.location='../rcc_returned_list.php';</script>";
      //echo "ssss";
    } else {
      echo "<script>alert('Failed to Forward ');window.location='../rcc_returned_list.php';</script>";
      //echo "ffff";
    }
    break;

  case 'update_Doc':
    $ex_emp_pfno = $_POST['ex_emp_pfno'];
    $tble_id = $_POST['tble_id'];

    $six = mt_rand(100000, 999999);
    //Get the temp file path
    $tmpFilePath = $_FILES['file']['tmp_name'];
    $names = $_FILES['file']['name'];
    //Make sure we have a file path
    //Setup our new file path
    $dir = $six . "_" . $names;
    // $newFilePath = "../../verified_documts/".$dir;
    $folder_name = "../../verified_documts/";

    if (is_dir($folder_name . $ex_emp_pfno)) {
    } else {
      mkdir($folder_name . $ex_emp_pfno);
    }
    $folder_name = "../../verified_documts/" . $ex_emp_pfno . "/" . $dir;
    //Upload the file into the temp dir
    $con=dbcon1();
    $qu = mysqli_query($con,"SELECT * from verified_docmts where id='" . $tble_id . "'");
    $res = mysqli_fetch_array($qu);

    $folder_name1 = "../../verified_documts/" . $ex_emp_pfno . "/" . $res['file_path'];
    if (file_exists($folder_name1)) {
      unlink($folder_name1);
      if (move_uploaded_file($tmpFilePath, $folder_name)) {

        $sql2 = mysqli_query($con,"UPDATE `verified_docmts` set `file_path`='" . $dir . "' where ex_emp_pfno='" . $ex_emp_pfno . "' and id='" . $tble_id . "' ");
        //$result2=mysqli_query($sql2);
        echo mysqli_error($con);
        echo "<script>alert('Updated Successfully...');window.location='../rcc_pending_app.php';</script>";
      }
    } else {
      echo "<script>alert('Failed To upload documents..');window.location='../rcc_pending_app.php';</script>";
    }




    break;

  case 'update_allCases':
    //Wi form update code..
    if ($_POST['case'] == 1) {
      $con=dbcon2();
      echo "<br>" . $queryD = mysqli_query($con,"UPDATE register_user SET date_of_expiry='" . $_POST['expiry_date'] . "'  where emp_no='" . $_POST['pf_num'] . "'");
      $con=dbcon1();
      echo "<br>" . $queryD1 = mysqli_query($con,"UPDATE common_heading_details set `date`='" . $_POST['date'] . "',`number`='" . $_POST['sr_no'] . "',`subject`='" . $_POST['subject'] . "'  where id='" . $_POST['c_h_d'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");



      echo "<br>" . $queryD2 = mysqli_query($con,"UPDATE `financial_position_of_ex_emp` SET `income_from_fmly_pension`='" . $_POST['income_fp'] . "',`expected_income`='" . $_POST['expected_income'] . "',`total_income`='" . $_POST['total_income'] . "',`immovable property`='" . $_POST['immovable_property'] . "',`his_own_houseornot`='" . $_POST['emp_house'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "' and id='" . $_POST['fp_id'] . "' ");


      echo "<br>" . $queryD3 = mysqli_query($con,"UPDATE `settlement` SET `provident_fund`='" . $_POST['provident_fund'] . "',`dcrg`='" . $_POST['dcrg'] . "',`ngis_lumpsum`='" . $_POST['ngis_lumps'] . "',`ngis_saving_fund`='" . $_POST['ngis_saving_fund'] . "',`leave_sal`='" . $_POST['leave_sal'] . "',`deposit_linked_inssurance`='" . $_POST['deposit_ins'] . "',`fmly_pension`='" . $_POST['family_pension'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "' AND id='" . $_POST['s_id'] . "'");

      echo "<br>" . $queryD4 = mysqli_query($con,"UPDATE `fetch_category_data` SET `06`='" . $_POST['six'] . "',`07`='" . $_POST['seven'] . "',`08`='" . $_POST['eight'] . "',`09`='" . $_POST['nine'] . "',`10`='" . $_POST['ten'] . "',`last_common`='" . ($_POST['last']) . "' WHERE id='" . $_POST['fetch_id'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "' ");
    } else if ($_POST['case'] == 2) {
      $con=dbcon2();
      echo "<br>" . $query = mysqli_query($con,"UPDATE register_user SET date_of_missing='" . $_POST['missing_date'] . "' where emp_no='" . $_POST['pf_num'] . "'");
      dbcon1();
      echo "<br>" . $queryM = mysqli_query($con,"UPDATE common_heading_details set `date`='" . $_POST['date'] . "',`number`='" . $_POST['sr_no'] . "',`subject`='" . $_POST['subject'] . "'  where id='" . $_POST['c_h_d_missing'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");



      echo "<br>" . $queryM2 = mysqli_query($con,"UPDATE `financial_position_of_ex_emp` SET `income_from_fmly_pension`='" . $_POST['income_fp'] . "',`expected_income`='" . $_POST['expected_income'] . "',`total_income`='" . $_POST['total_income'] . "',`immovable property`='" . $_POST['immovable_property'] . "',`his_own_houseornot`='" . $_POST['emp_house'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "' and id='" . $_POST['fp_id'] . "' ");


      echo "<br>" . $queryM3 = mysqli_query($con,"UPDATE `settlement` SET `provident_fund`='" . $_POST['provident_fund'] . "',`dcrg`='" . $_POST['dcrg'] . "',`ngis_lumpsum`='" . $_POST['ngis_lumps'] . "',`ngis_saving_fund`='" . $_POST['ngis_saving_fund'] . "',`leave_sal`='" . $_POST['leave_sal'] . "',`deposit_linked_inssurance`='" . $_POST['deposit_ins'] . "',`fmly_pension`='" . $_POST['family_pension'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "' AND id='" . $_POST['s_id'] . "'");

      echo "<br>" . $queryM4 = mysqli_query($con,"UPDATE `fetch_category_data` SET `06`='" . $_POST['six'] . "',`07`='" . $_POST['seven'] . "',`08`='" . $_POST['eight'] . "',`09`='" . $_POST['nine'] . "',`10`='" . $_POST['ten'] . "',`last_common`='" . mysqli_real_escape_string($_POST['last']) . "' WHERE id='" . $_POST['fetch_id'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "' ");
    } else if ($_POST['case'] == 3) {
      $con=dbcon2();
      echo "<br>" . $query = mysqli_query($con,"UPDATE register_user SET date_of_md='" . $_POST['date_of_md'] . "',date_of_vr='" . $_POST['date_of_vr'] . "'  where emp_no='" . $_POST['pf_num'] . "'");
      $con=dbcon1();
      echo "<br>" . $queryMed = mysqli_query($con,"UPDATE common_heading_details set `date`='" . $_POST['md_app_d'] . "',`number`='" . $_POST['sr_no'] . "',`subject`='" . $_POST['subject'] . "'  where id='" . $_POST['m_idd'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");



      echo "<br>" . $queryMed2 = mysqli_query($con,"UPDATE `medicalcase_form` SET `a_i`='" . $_POST['ai'] . "',`a_ii`='" . $_POST['aii'] . "',`a_iii`='" . $_POST['aiii'] . "',`b`='" . $_POST['b'] . "',`c`='" . $_POST['c'] . "',`vii`='" . $_POST['vii'] . "',`last_common_details`='" . $_POST['last_common_details'] . "' WHERE id='" . $_POST['idd'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");
    } else if ($_POST['case'] == 4) {
      $con=dbcon2();
      echo "<br>" . $query = mysqli_query($con,"UPDATE register_user SET date_of_med_decat='" . $_POST['vtxtdomd'] . "',date_of_retd='" . $_POST['txtdor'] . "'  where emp_no='" . $_POST['pf_num'] . "'");
      dbcon1();
      echo "<br>" . $queryMi = mysqli_query($con,"UPDATE common_heading_details set `date`='" . $_POST['date'] . "',`number`='" . $_POST['sr_no'] . "',`subject`='" . $_POST['subject'] . "'  where id='" . $_POST['mi_idd'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");


      echo "<br>" . $queryMi2 = mysqli_query($con,"UPDATE `financial_position_of_ex_emp` SET `income_from_fmly_pension`='" . $_POST['income_fp'] . "',`expected_income`='" . $_POST['expected_income'] . "',`total_income`='" . $_POST['total_income'] . "',`immovable property`='" . $_POST['immovable_property'] . "',`his_own_houseornot`='" . $_POST['emp_house'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "' and id='" . $_POST['fp_id'] . "' ");


      echo "<br>" . $queryMi3 = mysqli_query($con,"UPDATE `settlement` SET `provident_fund`='" . $_POST['provident_fund'] . "',`dcrg`='" . $_POST['dcrg'] . "',`ngis_lumpsum`='" . $_POST['ngis_lumps'] . "',`ngis_saving_fund`='" . $_POST['ngis_saving_fund'] . "',`leave_sal`='" . $_POST['leave_sal'] . "',`deposit_linked_inssurance`='" . $_POST['deposit_ins'] . "',`fmly_pension`='" . $_POST['family_pension'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "' AND id='" . $_POST['s_id'] . "'");

      echo "<br>" . $queryMi4 = mysqli_query($con,"UPDATE `fetch_category_data` SET `06`='" . $_POST['six'] . "',`07`='" . $_POST['seven'] . "',`08`='" . $_POST['eight'] . "',`09`='" . $_POST['nine'] . "',`last_common`='" . ($_POST['last_common']) . "' WHERE id='" . $_POST['ids'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "' ");
    }
    echo "<br>" . $queryc1 = mysqli_query($con,"UPDATE `applicant_registration` SET `applicant_name`='" . $_POST['applicant_name'] . "',`applicant_dob`='" . $_POST['applicant_dob'] . "',`applicant_mobno`='" . $_POST['mobile'] . "',`applicant_emailid`='" . $_POST['appl_email'] . "',`applicant_panno`='" . $_POST['pan'] . "',`applicant_aadharno`='" . $_POST['aadhar'] . "',`applicant_gender`='" . $_POST['appl_gender'] . "',`applicant_qualifiaction`='" . $_POST['education'] . "',`mariatial_status`='" . $_POST['maritial_status'] . "',`permanent_address`='" . $_POST['permanent_address'] . "',`identification_mark1`='" . $_POST['identfi_1'] . "',`identification_mark2`='" . $_POST['identfi_2'] . "',`caste`='" . $_POST['appl_caste'] . "',`relation_with`='" . $_POST['app_rel'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "'");

    $cnt = $_POST['count'];
    for ($i = 1; $i <= $cnt; $i++) {

      echo "<br>" . $queryc2 = mysqli_query($con,"UPDATE `emp_family_tbl` SET `member_name`='" . $_POST['m_name_' . $i] . "',`member_mobileno`='" . $_POST['m_mob_' . $i] . "',`member_panno`='" . $_POST['m_pan_' . $i] . "',`member_aadharno`='" . $_POST['m_aadhar_' . $i] . "',`member_relation`='" . $_POST['m_rel_' . $i] . "',`marital_status`='" . $_POST['m_mstatus_' . $i] . "',`member_dob`='" . $_POST['m_date_' . $i] . "',`member_qualifiaction`='" . $_POST['m_edu_' . $i] . "',`employed_or_other`='" . $_POST['m_employedornot_' . $i] . "' WHERE id='" . $_POST['fmly_id_' . $i] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");
    }
    echo "<br>" . $sql4 = mysqli_query($con,"UPDATE `service_particulars` SET `death_is_dueto_accident_on_duty`='" . $_POST['due_to_accident'] . "',`priority_no`='" . $_POST['priority_no'] . "',`cause_of_death/reason`='" . $_POST['cause_death/medical'] . "',`period_sickness`='" . $_POST['period_sickness'] . "',`total_service`='" . $_POST['total_service'] . "',`alter_job_offered`='" . $_POST['alt_job_offered'] . "',`alter_apptmt_emolumt_offered`='" . $_POST['apptmt_emolumt'] . "',`before_bp`='" . $_POST['before_bp'] . "',`before_da`='" . $_POST['before_da'] . "',`before_hra`='" . $_POST['before_hra'] . "',`before_cca`='" . $_POST['before_cca'] . "',`before_others`='" . $_POST['before_others'] . "',`after_bp`='" . $_POST['after_bp'] . "',`after_da`='" . $_POST['after_da'] . "',`after_hra`='" . $_POST['after_hra'] . "',`after_cca`='" . $_POST['after_cca'] . "',`after_others`='" . $_POST['after_others'] . "',`drop_in_emolumt`='" . $_POST['drop_in_emlmt'] . "',`not_accepting_alter_appmt`='" . $_POST['not_accepting_alter'] . "',`service_trminated/compulsory_retd`='" . $_POST['service_terminated/compulsory_retd'] . "',`cl_sub_n_reason`='" . $_POST['cl/sub_reasons'] . "',`eligible_group`='" . $_POST['eligible_group'] . "',`date_of_receipt_appl`='" . $_POST['date_of_receipt'] . "',`widow_remarried`='" . $_POST['widow_remarried'] . "',`widow_applied_apptmt`='" . $_POST['widow_applied_appmt'] . "',`not_apply_for_apptmt`='" . $_POST['not_apply_appmt'] . "',`minor_at_time_death`='" . $_POST['attained_majority'] . "',`warranting_time_limit`='" . $_POST['warranting_time_limit'] . "',`relaxation_age_req`='" . $_POST['relaxation_age_req'] . "',`date_filled_n_report_submitted`='" . $_POST['filled_n_report_submit'] . "',`other_particulars_considered`='" . $_POST['other_particulars'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "'");

    echo "<br>" . $sql5 = mysqli_query($con,"UPDATE `wi_settlement` SET `pf`='" . $_POST['pf2'] . "',`dcrg`='" . $_POST['dcrg2'] . "' ,`gis`='" . $_POST['gis2'] . "',`il`='" . $_POST['il2'] . "',`le`='" . $_POST['le2'] . "',`wca`='" . $_POST['wca2'] . "',`others`='" . $_POST['other2'] . "',family_pension='" . $_POST['family_pension2'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "' and id='" . $_POST['sd_id'] . "'");


    if ($sql4 && $queryc1 && $queryc2 && $sql5) {
      echo "<script>alert('Updated Successfully...');window.location='../rcc_approved_list.php';</script>";
    } else {
      echo "<script>alert('Failed..');window.location='../rcc_approved_list.php';</script>";
    }
    echo mysqli_error($con);

    break;

  case 'reject':
    $date = date('d-m-Y h:i:s');
    $ex_emp_pfno = $_POST['ex_emp_pfno'];
    $fw_tbl_id = $_POST['fw_tbl_id'];
    //$fw_to_pfno=$_POST['fw_to_pfno'];
    $rcc = $_SESSION['pf_number'] . "," . $_SESSION['role'];
    $con=dbcon1();
    $update = mysqli_query($con,"UPDATE `forward_application` SET depart_time='" . $date . "',return_status='1',remark='" . $_POST['remark'] . "',rejected_by='" . $rcc . "',hold_status=0 where ex_emp_pfno='" . $ex_emp_pfno . "' AND id='" . $fw_tbl_id . "'  ");
    // $re_update=mysqli_query($update);

    if ($update) {
      echo "<script>alert('Rejected  Successfully');window.location='../rcc_forworded_list.php';</script>";
      //echo "ssss";
    } else {
      echo "<script>alert('Failed ');window.location='../rcc_forworded_list.php';</script>";
      //echo "ffff";
    }
    break;

  case 'r_update_allCases':
    //Wi form update code..
    $data1 = 0;
    $data2 = 0;
    $data3 = 0;
    $data4 = 0;
    if ($_POST['case'] == 1) {
      $con=dbcon2();
      echo "<br>" . $queryD = mysqli_query($con,"UPDATE register_user SET date_of_expiry='" . $_POST['expiry_date'] . "'  where emp_no='" . $_POST['pf_num'] . "'");
      $con=dbcon1();
      echo "<br>" . $queryD1 = mysqli_query($con,"UPDATE common_heading_details set `date`='" . $_POST['date'] . "',`number`='" . $_POST['sr_no'] . "',`subject`='" . $_POST['subject'] . "'  where id='" . $_POST['c_h_d'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");



      echo "<br>" . $queryD2 = mysqli_query($con,"UPDATE `financial_position_of_ex_emp` SET `income_from_fmly_pension`='" . $_POST['income_fp'] . "',`expected_income`='" . $_POST['expected_income'] . "',`total_income`='" . $_POST['total_income'] . "',`immovable property`='" . $_POST['immovable_property'] . "',`his_own_houseornot`='" . $_POST['emp_house'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "' and id='" . $_POST['fp_id'] . "' ");


      echo "<br>" . $queryD3 = mysqli_query($con,"UPDATE `settlement` SET `provident_fund`='" . $_POST['provident_fund'] . "',`dcrg`='" . $_POST['dcrg'] . "',`ngis_lumpsum`='" . $_POST['ngis_lumps'] . "',`ngis_saving_fund`='" . $_POST['ngis_saving_fund'] . "',`leave_sal`='" . $_POST['leave_sal'] . "',`deposit_linked_inssurance`='" . $_POST['deposit_ins'] . "',`fmly_pension`='" . $_POST['family_pension'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "' AND id='" . $_POST['s_id'] . "'");

      echo "<br>" . $queryD4 = mysqli_query($con,"UPDATE `fetch_category_data` SET `06`='" . $_POST['six'] . "',`07`='" . $_POST['seven'] . "',`08`='" . $_POST['eight'] . "',`09`='" . $_POST['nine'] . "',`10`='" . $_POST['ten'] . "',`last_common`='" . ($_POST['last']) . "' WHERE id='" . $_POST['fetch_id'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "' ");
    } else if ($_POST['case'] == 2) {
      dbcon2();
      echo "<br>" . $query = mysqli_query($con,"UPDATE register_user SET date_of_missing='" . $_POST['missing_date'] . "' where emp_no='" . $_POST['pf_num'] . "'");
      $con=dbcon1();
      echo "<br>" . $queryM = mysqli_query($con,"UPDATE common_heading_details set `date`='" . $_POST['date'] . "',`number`='" . $_POST['sr_no'] . "',`subject`='" . $_POST['subject'] . "'  where id='" . $_POST['c_h_d_missing'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");



      echo "<br>" . $queryM2 = mysqli_query($con,"UPDATE `financial_position_of_ex_emp` SET `income_from_fmly_pension`='" . $_POST['income_fp'] . "',`expected_income`='" . $_POST['expected_income'] . "',`total_income`='" . $_POST['total_income'] . "',`immovable property`='" . $_POST['immovable_property'] . "',`his_own_houseornot`='" . $_POST['emp_house'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "' and id='" . $_POST['fp_id'] . "' ");


      echo "<br>" . $queryM3 = mysqli_query($con,"UPDATE `settlement` SET `provident_fund`='" . $_POST['provident_fund'] . "',`dcrg`='" . $_POST['dcrg'] . "',`ngis_lumpsum`='" . $_POST['ngis_lumps'] . "',`ngis_saving_fund`='" . $_POST['ngis_saving_fund'] . "',`leave_sal`='" . $_POST['leave_sal'] . "',`deposit_linked_inssurance`='" . $_POST['deposit_ins'] . "',`fmly_pension`='" . $_POST['family_pension'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "' AND id='" . $_POST['s_id'] . "'");

      echo "<br>" . $queryM4 = mysqli_query($con,"UPDATE `fetch_category_data` SET `06`='" . $_POST['six'] . "',`07`='" . $_POST['seven'] . "',`08`='" . $_POST['eight'] . "',`09`='" . $_POST['nine'] . "',`10`='" . $_POST['ten'] . "',`last_common`='" . mysqli_real_escape_string($_POST['last']) . "' WHERE id='" . $_POST['fetch_id'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "' ");
    } else if ($_POST['case'] == 3) {
      $con=dbcon2();
      echo "<br>" . $query = mysqli_query($con,"UPDATE register_user SET date_of_md='" . $_POST['date_of_md'] . "',date_of_vr='" . $_POST['date_of_vr'] . "'  where emp_no='" . $_POST['pf_num'] . "'");
      $con=dbcon1();
      echo "<br>" . $queryMed = mysqli_query($con,"UPDATE common_heading_details set `date`='" . $_POST['md_app_d'] . "',`number`='" . $_POST['sr_no'] . "',`subject`='" . $_POST['subject'] . "'  where id='" . $_POST['m_idd'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");



      echo "<br>" . $queryMed2 = mysqli_query($con,"UPDATE `medicalcase_form` SET `a_i`='" . $_POST['ai'] . "',`a_ii`='" . $_POST['aii'] . "',`a_iii`='" . $_POST['aiii'] . "',`b`='" . $_POST['b'] . "',`c`='" . $_POST['c'] . "',`vii`='" . $_POST['vii'] . "',`last_common_details`='" . $_POST['last_common_details'] . "' WHERE id='" . $_POST['idd'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");
      if ($query && $queryMed && $queryMed2) {
        $data3 = 1;
      }
    } else if ($_POST['case'] == 4) {
      $con=dbcon2();
      echo "<br>" . $query = mysqli_query($con,"UPDATE register_user SET date_of_med_decat='" . $_POST['vtxtdomd'] . "',date_of_retd='" . $_POST['txtdor'] . "'  where emp_no='" . $_POST['pf_num'] . "'");
      $con= dbcon1();
      echo "<br>" . $queryMi = mysqli_query($con,"UPDATE common_heading_details set `date`='" . $_POST['date'] . "',`number`='" . $_POST['sr_no'] . "',`subject`='" . $_POST['subject'] . "'  where id='" . $_POST['mi_idd'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");


      echo "<br>" . $queryMi2 = mysqli_query($con,"UPDATE `financial_position_of_ex_emp` SET `income_from_fmly_pension`='" . $_POST['income_fp'] . "',`expected_income`='" . $_POST['expected_income'] . "',`total_income`='" . $_POST['total_income'] . "',`immovable property`='" . $_POST['immovable_property'] . "',`his_own_houseornot`='" . $_POST['emp_house'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "' and id='" . $_POST['fp_id'] . "' ");


      echo "<br>" . $queryMi3 = mysqli_query($con,"UPDATE `settlement` SET `provident_fund`='" . $_POST['provident_fund'] . "',`dcrg`='" . $_POST['dcrg'] . "',`ngis_lumpsum`='" . $_POST['ngis_lumps'] . "',`ngis_saving_fund`='" . $_POST['ngis_saving_fund'] . "',`leave_sal`='" . $_POST['leave_sal'] . "',`deposit_linked_inssurance`='" . $_POST['deposit_ins'] . "',`fmly_pension`='" . $_POST['family_pension'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "' AND id='" . $_POST['s_id'] . "'");

      echo "<br>" . $queryMi4 = mysqli_query($con,"UPDATE `fetch_category_data` SET `06`='" . $_POST['six'] . "',`07`='" . $_POST['seven'] . "',`08`='" . $_POST['eight'] . "',`09`='" . $_POST['nine'] . "',`last_common`='" . ($_POST['last_common']) . "' WHERE id='" . $_POST['ids'] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "' ");
    }
    echo "<br>" . $queryc1 = mysqli_query($con,"UPDATE `applicant_registration` SET `applicant_name`='" . $_POST['applicant_name'] . "',`applicant_dob`='" . $_POST['applicant_dob'] . "',`applicant_mobno`='" . $_POST['mobile'] . "',`applicant_emailid`='" . $_POST['appl_email'] . "',`applicant_panno`='" . $_POST['pan'] . "',`applicant_aadharno`='" . $_POST['aadhar'] . "',`applicant_gender`='" . $_POST['appl_gender'] . "',`applicant_qualifiaction`='" . $_POST['education'] . "',`mariatial_status`='" . $_POST['maritial_status'] . "',`permanent_address`='" . $_POST['permanent_address'] . "',`identification_mark1`='" . $_POST['identfi_1'] . "',`identification_mark2`='" . $_POST['identfi_2'] . "',`caste`='" . $_POST['appl_caste'] . "',`relation_with`='" . $_POST['app_rel'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "'");

    $cnt = $_POST['count'];
    for ($i = 1; $i <= $cnt; $i++) {

      echo "<br>" . $queryc2 = mysqli_query($con,"UPDATE `emp_family_tbl` SET `member_name`='" . $_POST['m_name_' . $i] . "',`member_mobileno`='" . $_POST['m_mob_' . $i] . "',`member_panno`='" . $_POST['m_pan_' . $i] . "',`member_aadharno`='" . $_POST['m_aadhar_' . $i] . "',`member_relation`='" . $_POST['m_rel_' . $i] . "',`marital_status`='" . $_POST['m_mstatus_' . $i] . "',`member_dob`='" . $_POST['m_date_' . $i] . "',`member_qualifiaction`='" . $_POST['m_edu_' . $i] . "',`employed_or_other`='" . $_POST['m_employedornot_' . $i] . "' WHERE id='" . $_POST['fmly_id_' . $i] . "' and ex_emp_pfno='" . $_POST['pf_num'] . "'");
    }
    echo "<br>" . $sql4 = mysqli_query($con,"UPDATE `service_particulars` SET `death_is_dueto_accident_on_duty`='" . $_POST['due_to_accident'] . "',`priority_no`='" . $_POST['priority_no'] . "',`cause_of_death/reason`='" . $_POST['cause_death/medical'] . "',`period_sickness`='" . $_POST['period_sickness'] . "',`total_service`='" . $_POST['total_service'] . "',`alter_job_offered`='" . $_POST['alt_job_offered'] . "',`alter_apptmt_emolumt_offered`='" . $_POST['apptmt_emolumt'] . "',`before_bp`='" . $_POST['before_bp'] . "',`before_da`='" . $_POST['before_da'] . "',`before_hra`='" . $_POST['before_hra'] . "',`before_cca`='" . $_POST['before_cca'] . "',`before_others`='" . $_POST['before_others'] . "',`after_bp`='" . $_POST['after_bp'] . "',`after_da`='" . $_POST['after_da'] . "',`after_hra`='" . $_POST['after_hra'] . "',`after_cca`='" . $_POST['after_cca'] . "',`after_others`='" . $_POST['after_others'] . "',`drop_in_emolumt`='" . $_POST['drop_in_emlmt'] . "',`not_accepting_alter_appmt`='" . $_POST['not_accepting_alter'] . "',`service_trminated/compulsory_retd`='" . $_POST['service_terminated/compulsory_retd'] . "',`cl_sub_n_reason`='" . $_POST['cl/sub_reasons'] . "',`eligible_group`='" . $_POST['eligible_group'] . "',`date_of_receipt_appl`='" . $_POST['date_of_receipt'] . "',`widow_remarried`='" . $_POST['widow_remarried'] . "',`widow_applied_apptmt`='" . $_POST['widow_applied_appmt'] . "',`not_apply_for_apptmt`='" . $_POST['not_apply_appmt'] . "',`minor_at_time_death`='" . $_POST['attained_majority'] . "',`warranting_time_limit`='" . $_POST['warranting_time_limit'] . "',`relaxation_age_req`='" . $_POST['relaxation_age_req'] . "',`date_filled_n_report_submitted`='" . $_POST['filled_n_report_submit'] . "',`other_particulars_considered`='" . $_POST['other_particulars'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "'");

    echo "<br>" . $sql5 = mysqli_query($con,"UPDATE `wi_settlement` SET `pf`='" . $_POST['pf'] . "',`dcrg`='" . $_POST['dcrg1'] . "' ,`gis`='" . $_POST['gis'] . "',`il`='" . $_POST['il'] . "',`le`='" . $_POST['le'] . "',`wca`='" . $_POST['wca'] . "',`others`='" . $_POST['other'] . "',family_pension='" . $_POST['family_pension1'] . "' WHERE ex_emp_pfno='" . $_POST['pf_num'] . "' and id='" . $_POST['ss_id'] . "'");


    if ($sql4 && $queryc1 && $queryc2 && $sql5) {
      echo "<script>alert('Updated Successfully...');window.location='../rcc_returned_list.php';</script>";
    } else {
      echo "<script>alert('Failed..');window.location='../rcc_returned_list.php';</script>";
    }
    echo mysqli_error();

    break;


  case 'activeApplicant':

    $active = '1';
    $pfno = $_REQUEST['id'];
    if (activeUser($pfno, $active))
      echo "Applicant Activated successfully";
    else
      echo "Something went wrong";
    break;
  case 'deactiveApplicant':
    $active = '0';
    $pfno = $_REQUEST['id'];
    if (deactiveUser($pfno, $active))
      echo "Applicant Deactivated successfully";
    else
      echo "Something went wrong";
    break;



  default:
    echo "Invalid option";
    break;
}