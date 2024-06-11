<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include('adminFunction.php');
  switch($_REQUEST['action'])
  {
	  case 'forward_form':
            $empid = $_REQUEST['empid'];
            $emp_no = $_REQUEST['emp_no'];
            $ref = $_REQUEST['ref_no'];
            $forwardName = $_REQUEST['fdname'];
            // $c_otp = $_REQUEST['c_otp'];

            $flag='0';
            dbcon();
            
            $query1 = "UPDATE `tbl_form_forward` SET `fw_status`='1' WHERE `ref_id`='".$ref."' AND forwarded_to='".$empid."'";
            $result1 = mysql_query($query1);

            $date=date('Y-m-d H:i:s');
            dbcon();
            
           $query = "INSERT into tbl_form_forward(empid,ref_id,forwarded_to,fw_date) values('".$emp_no."','".$ref."','".$forwardName."','".$date."')";
            $result = mysql_query($query);
                    
            if($result && $result1)
            {
                $flag='1';
            }
            else
            {
                $flag='0';
            }
            echo $flag;

    break;

    case 'reject_form':
            $empid_session = $_POST['empid_session'];
            $emp_no = $_POST['txt_emp_pf'];
            $ref = $_POST['ref_no'];

            dbcon();
            
             $query1 = "UPDATE `tbl_form_details` SET `rejected`='1', `rejected_by`='".$empid_session."' WHERE `reference_id`='".$ref."' AND emp_no='".$emp_no."'";
            
            $result1 = mysql_query($query1);

                    
            if($result1)
            {
                echo "<script>alert('Successfully Rejected');window.location='../rej_form.php';</script>";
            }
            else
            {
                echo "<script>alert('Something Went Wrong');window.location='../rej_form.php';</script>";
            }
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
