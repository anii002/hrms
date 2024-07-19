<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include('adminFunction.php');
switch ($_REQUEST['action']) {

  case 'fetch_empid':
    $data = '';
    $query_id = mysqli_query($db_edak,"SELECT emp_id from tbl_user where section='" . $_POST['id'] . "'");
    $fetch_id = mysqli_fetch_array($query_id);
    $data['emp_id'] = $fetch_id['emp_id'];
    echo json_encode($data);
    break;
  case 'add_edak':
    $datet = date('Y-m-d h:i:s');
    $eid = $_POST['eid'];
    $u_dak_no = $_POST['u_dak_no'];
    $gist_letter = mysqli_real_escape_string($db_edak,$_POST['gist_letter']);
    $rd_from = mysqli_real_escape_string($db_edak,$_POST['rd_from']);
    $query_id = mysqli_query($db_edak,"INSERT INTO `tbl_dak`(`unique_dak_no`, `recd_from`, `dt_of_letter`, `gist_of_letter`, `marked_to`, `curr_date`, `source`, `station_id`,`status`, `added_by`) VALUES ('" . $u_dak_no  . "','" . $rd_from . "','" . $_POST['dt_letter'] . "','" . $gist_letter . "','" . $_POST['eid'] . "','" . $_POST['cur_date'] . "','" . $_POST['src'] . "','" . $_POST['station'] . "','1','" . $_SESSION['emp_id'] . "')");

    $dak_forward = mysqli_query($db_edak,"INSERT INTO `tbl_dak_forward`(`unique_dak_no`, `marked_from`, `marked_to`, `station_id`,`forwarded_date`,  `status`) VALUES ('" . $u_dak_no . "','" . $_SESSION['emp_id'] . "','" . $eid . "','" . $_POST['station'] . "','" . $datet . "','1')");

    if ($query_id && $dak_forward) {
      echo "<script>alert('Forwarded Successfully..');window.location='../registered_dak.php';</script>";
    } else {
      echo "<script>alert('Failed');window.location='../registered_dak.php';</script>";
    }
    break;
  case 'completeList':
    //$data = '';
    $fdate = $_POST['fdate'];
    $tdate = $_POST['tdate'];
    echo '<table class="table table-bordered table-hover" id="example1">
    <thead>
      <tr>
        <th style="width: 10px">SR No</th>
        <th style="width: 20px">Unique DAK No.</th>
        <th style="width: 20px">Recd From</th>
        <th style="width: 20px">Dt. Of Letter</th>
        <th style="width: 20px">Gist Of Letter</th>
        <th style="width: 30px">Marked TO</th>
        <th style="width: 30px">Date</th>
        <th style="width: 30px">Acknowledgement</th>
        <th style="width: 30px">Reply</th>
        <th style="width: 30px">Source</th>
        <!-- <th>Action</th> -->

      </tr>
    </thead>
    <tbody>';

    $query_src = "SELECT * from tbl_dak where status='2' and added_by='" . $_SESSION['emp_id'] . "' and curr_date Between '" . $fdate . "' AND '" . $tdate . "' ";
    $result_src = mysqli_query($db_edak,$query_src);
    $sr = 1;
    while ($value_src = mysqli_fetch_array($result_src)) {

      echo "
        <tr>
        <td>" . $sr . "</td>
        <td>" . $value_src['unique_dak_no'] . "</td>
        <td>" . $value_src['recd_from'] . "</td>
        <td>" . $value_src['dt_of_letter'] . "</td>
        <td>" . $value_src['gist_of_letter'] . "</td>
        <td>" . getSectionMarked($value_src['marked_to']) . "</td>
        <td>" . $value_src['curr_date'] . "</td>
        <td> </td>
        <td>" . getReplied($value_src['replied']) . "</td>
        <td>" . getSource($value_src['source']) . "</td>
        
        ";
      $sr++;

      //echo "<a target='_blank'  id='".$value_emp['uploaded_file_path']."' value='".$value_emp['uploaded_file_path']."'>'".$value_emp['uploaded_file_path']."'</a>";

      // echo "<td><button value='".$value_src['id']."' class='btn btn-info active' style='margin-left:10px;'>Forward</button>";
      // echo "<button value='".$value_src['id']."' class='btn btn-info active' style='margin-left:10px;'>Update</button>";
      // echo "<button value='".$value_src['id']."' class='btn btn-danger active' style='margin-left:10px;'>Remove</button></td>";
      echo "</tr>
    ";
    }
    echo '</tbody>
  </table>';

    break;

  case 'update_pending_list':
    $fw_date = date('Y-m-d H:i:s');
    $u_dak_no = $_POST['u_dak_no'];
    $dt_letter = $_POST['dt_letter'];
    $up_date = $_POST['cur_date'];
    $src = $_POST['src'];
    $marked_to = getSectionMarkedtopfno($_POST['marked_to']);
    $marked_from = $_SESSION['emp_id'];
    $gist_letter = mysqli_real_escape_string($db_edak,$_POST['gist_letter']);
    $rd_from = mysqli_real_escape_string($db_edak,$_POST['rd_from']);


    $query_id = mysqli_query($db_edak,"Update tbl_dak set unique_dak_no='" . $u_dak_no . "',dt_of_letter='" . $dt_letter . "',gist_of_letter='" . $gist_letter . "',marked_to='" . $marked_to . "',updated_date='" . $up_date . "',source='" . $src . "' where id='" . $_POST['tbl_dak_id'] . "'");


    $query_id2 = mysqli_query($db_edak,"Update tbl_dak_forward set unique_dak_no='" . $u_dak_no . "',marked_from='" . $marked_from . "',marked_to='" . $marked_to . "',forwarded_date='" . $fw_date . "' where id='" . $_POST['tbl_dak_forward_id'] . "'");


    if ($query_id && $query_id2) {
      echo "<script>alert('Updated Successfully..');window.location='../pending_dak_list.php';</script>";
    } else {
      echo "<script>alert('Failed To Update');window.location='../pending_dak_list.php';</script>";
    }
    break;
  default:
    echo "Invalid option";
    break;
}
