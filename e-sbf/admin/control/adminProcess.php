<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include('adminFunction.php');
  switch($_REQUEST['action'])
  {
	  
    case 'fetchEmployee1':
        $id = $_REQUEST['id'];
          echo fetchEmployee1($id);
    break;

    case 'add_user':
    $empid        =  $_POST['empid'];
    // $department   =  $_POST['department'];
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
    dbcon();
    $query = mysql_query("INSERT INTO `add_user`(`user_pfno`, `user_dept_no`, `user_desig`, `user_role`, `user_station`, `status`, `user_psw`) VALUES ('$empid','$deptno','$designo','$role','$station','0','$hashPassword')");

    dbcon1();
    $user_p_query = "SELECT pf_num,sbf from user_permission WHERE pf_num='" . $empid . "' ";
    $user_p_result = mysql_query($user_p_query);
    $user_p_cnt = mysql_num_rows($user_p_result);

    if ($user_p_cnt > 1) 
    {
      $user_p_rows = mysql_fetch_array($user_p_result);
      $eapp_rows = $user_p_rows['sbf'];
      $eapp_rows = ",.$role.";
      dbcon1();
      $sql_up = "UPDATE user_permission SET sbf ='" . $eapp_rows . "' WHERE pf_num='" . $empid . "' ";
      $result_up = mysql_query($sql_up);
    } 
    else 
    {
      dbcon1();
      $sql_up = "INSERT INTO user_permission (pf_num, sbf) VALUES ('" . $empid . "', '" . $role . "')";
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

    default:
      echo "Invalid option";
    break;

    case 'deleteuser':
        $delete_id = $_REQUEST['id'];
          if(deleteuser($delete_id))
            echo "User Deleted successfully";
          else
            echo "Something went wrong";
    break;

    case 'update_user':
      $id         = $_POST['user_id1'];
      // $bu         = implode(",",$_POST['billunit']);
      $role       = $_POST['role'];
            
       dbcon();
        $query = mysql_query("UPDATE `add_user` SET `user_role`='$role' WHERE user_id = '$id'");
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

    case 'fetchuser':
        $id = $_REQUEST['id'];
          echo fetchuser($id);
    break;
    
    case 'get_data':
                dbcon();
                $id = $_POST['id'];
                //print_r($id);exit();
                $sql = "SELECT emp_no, name_of_child_ward, name_of_course, date_of_birth_stud, present_year, created_at  FROM tbl_form_details WHERE scheme_id = '$id'";
                $result = mysql_query($sql);
                $i = 1;

                while($row = mysql_fetch_assoc($result))
                    {
                        $emp = get_emp($row['emp_no']);
                        $des = get_designation($emp['designation']);
                        $station = get_station($emp['station']);
                        ?>
                    <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo date('d-M-Y', strtotime($row['created_at'])); ?></td>
                <td><?php echo $row['emp_no']; ?></td>
                <td><?php echo $emp['name']; ?></td>
                <td><?php echo $des; ?></td>
                <td><?php echo $station; ?></td>
                <td><?php echo $row['name_of_child_ward']; ?></td>
                <td><?php echo $row['name_of_course']; ?></td>
                <td><?php echo $row['date_of_birth_stud']; ?></td>
                <td><?php echo $row['present_year']; ?></td>
                    </tr>          
                    
    <?php                    
                    }
                    
    break;

    default:
      echo "Invalid option";
    break;
  }
 ?>
