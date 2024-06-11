<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include('adminFunction.php');


switch ($_REQUEST['action']) {
  case 'add_src':
    $ins_src = mysql_query("INSERT into master_source (src_name,created_by) values('" . $_POST['src_name'] . "','" . $_SESSION['role'] . "')", $db_edak);
    if ($ins_src) {
      echo "<script>alert('Inserted Successfully');window.location='../master_src.php';</script>";
    } else {
      echo "<script>alert('Failed');window.location='../master_src.php';</script>";
    }
    break;
  case 'update_src':
    $update_src = mysql_query("UPDATE master_source set src_name='" . $_POST['src_name'] . "' where id='" . $_POST['fid'] . "' ", $db_edak);
    if ($update_src) {
      echo "<script>alert('Updated Successfully');window.location='../master_src.php';</script>";
    } else {
      echo "<script>alert('Failed');window.location='../master_src.php';</script>";
    }
    break;


  case 'removeSRC':

    $sql = "DELETE from master_source where id='" . $_POST['id'] . "' ";
    $result = mysql_query($sql, $db_edak);
    if ($result) {
      $data = 1;
    } else {
      $data = 0;
    }
    echo $data;
    break;

  case 'add_section':
    $ins_src = mysql_query("INSERT into tbl_section (sec_name,created_by) values('" . $_POST['sec_name'] . "','" . $_SESSION['role'] . "')", $db_edak);
    if ($ins_src) {
      echo "<script>alert('Inserted Successfully');window.location='../master_section.php';</script>";
    } else {
      echo "<script>alert('Failed');window.location='../master_section.php';</script>";
    }
    break;

  case 'update_section':
    $update_src = mysql_query("UPDATE tbl_section set sec_name='" . $_POST['sec_name'] . "' where sec_id='" . $_POST['fid'] . "' ", $db_edak);
    if ($update_src) {
      echo "<script>alert('Updated Successfully');window.location='../master_section.php';</script>";
    } else {
      echo "<script>alert('Failed');window.location='../master_section.php';</script>";
    }
    break;


  case 'removeSec':

    $sql = "DELETE from tbl_section where sec_id='" . $_POST['id'] . "' ";
    $result = mysql_query($sql, $db_edak);
    if ($result) {
      $data = 1;
    } else {
      $data = 0;
    }
    echo $data;
    break;

  case 'fetch_employee_details':

    $id = $_POST['id'];
    $data = [];
    $data = get_employee_details($id);
    echo json_encode($data);
    break;

  case 'add_user':

    $section = isset($_POST['section']) ? $_POST['section'] : "";
    echo $result = add_user($_POST['empid'], $_POST['design1'], $_POST['dept1'], $_POST['role'], $section, $_POST['dob']);
    
    // if ($result == '1') {
    //   echo "<script>alert('Added User Successfully');window.location='../master_marked.php';</script>";
    // } else {
    //   echo "<script>alert('Failed');window.location='../master_marked.php';</script>";
    // }

    break;
  case 'removeUser':
    $data = '';
    $username = $_POST['pf'];

    $fetch_role = mysql_query("SELECT role From tbl_user where id='" . $_POST['id'] . "' AND  emp_id='" . $_POST['pf'] . "'", $db_edak);
    $ress = mysql_fetch_array($fetch_role);
    $role = $ress['role'];

    $sql2 = '';
    $sql3 = '';

    $sql_in = "SELECT pf_num,e_dak from user_permission where pf_num='$username'";
    $sql = mysql_query($sql_in, $db_common);
    $row_usr = mysql_fetch_array($sql);
    $user_perm = explode(",", $row_usr["e_dak"]);
    //print_r($user_perm);
    if (($key = array_search($role, $user_perm)) !== false) {
      unset($user_perm[$key]);
      //print_r($user_perm);
      $cgaa = implode(",", $user_perm);
      $sql2 = mysql_query("UPDATE user_permission set e_dak='$cgaa' where pf_num='" . $_POST['pf'] . "'", $db_common);

      $sql3 = mysql_query("DELETE from tbl_user where id='" . $_POST['id'] . "' AND  emp_id='" . $_POST['pf'] . "'", $db_edak);
    }
    //echo mysql_error();
    if ($sql2 && $sql3) {
      $data = 1;
    } else {
      $data = 0;
    }

    echo $data;

    break;
  case 'update_sec_usr':
    $pf_num = $_POST['pf_num'];
    $role = $_POST['role_up'];
    $sql_in = "SELECT pf_num,e_dak from user_permission where pf_num='$pf_num'";
    $sql = mysql_query($sql_in, $db_common);
    //var_dump($sql);
    $row_usr = mysql_fetch_array($sql);
    $user_perm = explode(",", $row_usr["e_dak"]);
    //print_r($user_perm);
    if (in_array("$role", $user_perm)) {
      $updd = ("UPDATE user_permission set e_dak='$role' where pf_num='$pf_num'");
      $ss = mysql_query($updd, $db_common);
    } elseif (!in_array(",", $user_perm)) {
      array_push($user_perm, $role);
      $user_perm = (count($user_perm) > 1) ? implode(",", $user_perm) : 1;
      //print_r($user_perm);
      $upd = ("UPDATE user_permission set e_dak='$user_perm' where pf_num='$pf_num'");
      $s = mysql_query($upd, $db_common);
    }
    if ($role == 1) {
      $update_src = mysql_query("UPDATE tbl_user set section='',role='" . $_POST['role_up'] . "' where id='" . $_POST['fid'] . "' ", $db_edak);
    } else {
      $update_src = mysql_query("UPDATE tbl_user set section='" . $_POST['section_up'] . "',role='" . $_POST['role_up'] . "' where id='" . $_POST['fid'] . "' ", $db_edak);
    }

    echo mysql_error();
    if ($update_src) {
      echo "<script>alert('Updated Successfully');window.location='../master_marked.php';</script>";
    } else {
      echo "<script>alert('Failed');window.location='../master_marked.php';</script>";
    }
    break;

  case 'completeListBySrc':
    echo '<table class="table table-bordered table-hover" id="example1">
  <thead>
    <tr>
    <th>SR No</th>
    <th>Marked To</th>
    <th>Total</th>
    <th>Replied</th>
    <th>Pending</th>
    </tr>
  </thead>
  <tbody>';

    $query_src = "SELECT marked_to from tbl_dak where  source='" . $_POST['src'] . "' group by marked_to ";
    $result_src = mysql_query($query_src, $db_edak);


    $sr = 1;
    while ($value_src = mysql_fetch_array($result_src)) {

      $sql_src = mysql_query("SELECT count(status) as pending,id from tbl_dak where source='" . $_POST['src'] . "' and `status`='1' and  marked_to='" . $value_src['marked_to'] . "' group by marked_to ", $db_edak);
      $fetch_src = mysql_fetch_array($sql_src);

      $sql_src = mysql_query("SELECT count(id) as total_id,id from tbl_dak where source='" . $_POST['src'] . "'  and  marked_to='" . $value_src['marked_to'] . "' group by marked_to ", $db_edak);
      $fetch_m = mysql_fetch_array($sql_src);

      $total = $fetch_m['total_id'];
      $pending = $fetch_src['pending'];
      $repleid = $total - $pending;
      echo "
        <tr>
        <td>" . $sr++ . "</td>";
      echo "<td>" . getSectionMarked($value_src['marked_to']) . "</td>";
      echo "<td>" . $total . "</td>
        <td>" . $repleid . "</td>";
      if ($pending == '') {
        echo "<td>0</td>";
      } else {
        echo "<td>" . $pending . "</td>";
      }

      echo "</tr>";
    }
    echo '</tbody>
          </table>';

    break;

  case 'completeListBySection':
    echo '<table class=" table table-bordered table-hover" id="example1">
  <thead>
    <tr>
    <th>SR No</th>
    <th>Marked To</th>
    <th>Total</th>
    <th>Replied</th>
    <th>Pending</th>
    </tr>
  </thead>
  <tbody>';
    $sql = mysql_query("SELECT emp_id from tbl_user  where  section='" . $_POST['section'] . "'", $db_edak);
    $sql_fetch = mysql_fetch_array($sql);

    $query_src = "SELECT count(id) as  total_id,marked_to from  tbl_dak where  marked_to ='"  . $sql_fetch['emp_id'] . "' ";
    $result_src = mysql_query($query_src, $db_edak);

    $sql_status  = mysql_query("SELECT count(status) as pending from tbl_dak  where  marked_to='"  . $sql_fetch['emp_id'] . "' and `status` ='1' ", $db_edak);
    $sql_fetch_s = mysql_fetch_array($sql_status);


    $sr = 1;
    while ($value_src = mysql_fetch_array($result_src)) {
      $total = $value_src['total_id'];
      //echo "<br>" . $replied = $sql_fetch_r['replied'];
      $pending1 = $sql_fetch_s['pending'];

      $replied = $total - $pending1;

      echo  "
          <tr>
           <td>" . $sr++ . "</td>";
      if ($value_src['marked_to'] == '') {
        echo "<td>" . getSectionMarked($sql_fetch['emp_id']) . "</td>";
      } else {
        echo "<td>" . getSectionMarked($value_src['marked_to']) . "</td>";
      }
      // "<td>" . getSectionMarked($value_src['marked_to']) . "</td>
      echo "<td>"  . $total . " </td>
        <td> " .  $replied . " </td>
        <td> " . $pending1 . " </td>
        ";


      echo " </tr>
        ";
    }
    echo '</tbody>
</table>';

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
      $query = "SELECT * from tbl_section ORDER BY `tbl_section`.`sec_name` ASC";
      $rstSection = mysql_query($query, $db_edak);
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

    $grie_sql = "SELECT `curr_date`,`section` FROM tbl_dak,tbl_user WHERE tbl_dak.marked_to=tbl_user.emp_id and `curr_date` between '" . $frm_date . "' AND '" . $to_date . "'";
    $result = mysql_query($grie_sql, $db_edak);

    while ($data = mysql_fetch_assoc($result)) {

      for ($i = 0; $i < $array_count; $i++) {
        //echo $section_array[1];
        //if($i <= $array_count-1)
        //if (is_valid_ba_section($data["section"])) {
        if ($section_array[$i] == $data['section']) {
          $cnt = $associate_array[$section_array[$i]];
          //echo $section_array[$i];
          $cnt = $cnt + 1;
          $associate_array[$section_array[$i]] = $cnt++;
        }
        //}
      }
    }

    $grie_sql = "SELECT tbl_dak.id,tbl_dak.curr_date,tbl_user.section, tbl_dak.status,tbl_dak_forward.marked_to FROM tbl_dak,tbl_dak_forward,tbl_user WHERE tbl_dak.unique_dak_no=tbl_dak_forward.unique_dak_no and tbl_dak.marked_to=tbl_user.emp_id and tbl_dak.curr_date between '" . $frm_date . "' AND '" . $to_date . "' AND tbl_dak.status=2 group by tbl_dak.id";
    $result = mysql_query($grie_sql, $db_edak);

    while ($data = mysql_fetch_assoc($result)) {

      for ($i = 0; $i < $array_count; $i++) {
        //echo $section_array[1];
        //if($i <= $array_count-1)
        //if (is_valid_ba_section($data["section"])) {
        if ($section_array[$i] == $data['section']) {
          $cnt = $asso_complied_array[$section_array[$i]];
          //echo $user_id."<br/>";
          $cnt = $cnt + 1;
          $asso_complied_array[$section_array[$i]] = $cnt++;
        }
        //}
      }
      // }
    }

    $grie_sql = "SELECT tbl_dak.id,tbl_dak.curr_date,tbl_user.section, tbl_dak.status,tbl_dak_forward.marked_to FROM tbl_dak,tbl_dak_forward,tbl_user WHERE tbl_dak.unique_dak_no=tbl_dak_forward.unique_dak_no and tbl_dak.marked_to=tbl_user.emp_id and tbl_dak.curr_date between '" . $frm_date . "' AND '" . $to_date . "' AND tbl_dak.status=1 group by tbl_dak.id";
    $result = mysql_query($grie_sql, $db_edak);


    while ($data = mysql_fetch_assoc($result)) {

      for ($i = 0; $i < $array_count; $i++) {
        //echo $section_array[1];
        //if($i <= $array_count-1)
        //if (is_valid_ba_section($data["section_id"])) {
        if ($section_array[$i] == $data['section']) {
          $cnt = $asso_pending_array[$section_array[$i]];
          //echo $user_id."<br/>";
          $cnt = $cnt + 1;
          $asso_pending_array[$section_array[$i]] = $cnt++;
        }
        //}
      }
      // }
    }

    $grie_sql = "SELECT `added_by`,`section`, `curr_date` FROM tbl_dak,tbl_user WHERE tbl_dak.marked_to=tbl_user.emp_id and `curr_date` between '" . $frm_date . "' AND '" . $to_date . "' AND tbl_dak.status != '2'";
    $result = mysql_query($grie_sql, $db_edak);
    while ($data = mysql_fetch_assoc($result)) {
      $user_id = $data['added_by'];
      $DB_date = date_create(date("Y-m-d", strtotime($data['curr_date'])));
      $date_difference = date_diff($DB_date, date_create($to_date));
      $date_gap = $date_difference->format("%a");
      if ($date_gap == 30 || $date_gap >= 28) {

        for ($i = 0; $i < $array_count; $i++) {
          //echo $section_array[1];
          //if($i <= $array_count-1)
          //if (is_valid_ba_section($data["section_id"])) {
          if ($section_array[$i] == $data['section']) {
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
      $query = "SELECT * from tbl_section ORDER BY `tbl_section`.`sec_name` ASC";
      $rstSection = mysql_query($query, $db_edak);
      while ($rwSection = mysql_fetch_array($rstSection)) {
        $sec_id = $rwSection["sec_id"];
        if (!in_array($sec_id, $section_array)) {
          array_push($section_array, $sec_id);
        }
      }
    }
    $cnt = 1;
    foreach ($section_array as $key => $value) {
      $section_name = getSection($value);
      if ($value == 0) {
        $section_name = "New Section";
      }
      $sql = "SELECT * FROM tbl_dak,tbl_user WHERE tbl_dak.marked_to=tbl_user.emp_id and curr_date between '" . $frm_date . "' AND '" . $to_date . "' and section='$value'";
      $rstRecord = mysql_query($sql, $db_edak);
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
        
    </tr>';
        while ($rwRecords = mysql_fetch_array($rstRecord)) {
          extract($rwRecords);

          echo "<tr>
                                <td>$cnt</td>
                                <td>$unique_dak_no</td>
                                <td>$recd_from</td>
                                <td>$dt_of_letter</td>
                                <td>$gist_of_letter</td>
                                <td> $section_name </td> 
                                <td>$curr_date</td>";
          if ($replied == 0) {
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

  case 'srcWiseSummaryReport':

    $associate_array_label = array();
    $associate_array = array();
    $asso_complied_array = array();
    $asso_pending_array = array();
    $asso_more_array = array();
    $section = implode(",", (array)$_REQUEST['src_wise']);
    $frm_date = $_REQUEST['frm_date'];
    $to_date = $_REQUEST['to_date'];
    $section_array = explode(",", $section);
    if (in_array(0, $section_array)) {
      // echo "done";
      echo $query = "select * from master_source";
      $rstSection = mysql_query($query, $db_edak);
      while ($rwSection = mysql_fetch_array($rstSection)) {
        // print_r($rwSection);
        $sec_id = $rwSection["id"];
        if (!in_array($sec_id, $section_array)) {
          array_push($section_array, $sec_id);
        }
      }
      // print_r($section_array);
    }

    $array_count = count($section_array);
    for ($i = 0; $i < $array_count; $i++) {
      $associate_array_label[$section_array[$i]] = getSource($section_array[$i]);
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

    $grie_sql = "SELECT `curr_date`,`source` FROM tbl_dak WHERE  `curr_date` between '" . $frm_date . "' AND '" . $to_date . "'";
    $result = mysql_query($grie_sql, $db_edak);

    while ($data = mysql_fetch_assoc($result)) {

      for ($i = 0; $i < $array_count; $i++) {
        //echo $section_array[1];
        //if($i <= $array_count-1)
        //if (is_valid_ba_section($data["section"])) {
        if ($section_array[$i] == $data['source']) {
          $cnt = $associate_array[$section_array[$i]];
          //echo $section_array[$i];
          $cnt = $cnt + 1;
          $associate_array[$section_array[$i]] = $cnt++;
        }
        //}
      }
    }

    $grie_sql = "SELECT tbl_dak.id,tbl_dak.curr_date,tbl_dak.source, tbl_dak.status,tbl_dak_forward.marked_to FROM tbl_dak,tbl_dak_forward WHERE tbl_dak.unique_dak_no=tbl_dak_forward.unique_dak_no and tbl_dak.curr_date between '" . $frm_date . "' AND '" . $to_date . "' AND tbl_dak.status=2 group by tbl_dak.id";
    $result = mysql_query($grie_sql, $db_edak);

    while ($data = mysql_fetch_assoc($result)) {

      for ($i = 0; $i < $array_count; $i++) {
        //echo $section_array[1];
        //if($i <= $array_count-1)
        //if (is_valid_ba_section($data["section"])) {
        if ($section_array[$i] == $data['source']) {
          $cnt = $asso_complied_array[$section_array[$i]];
          //echo $user_id."<br/>";
          $cnt = $cnt + 1;
          $asso_complied_array[$section_array[$i]] = $cnt++;
        }
        //}
      }
      // }
    }

    $grie_sql = "SELECT tbl_dak.id,tbl_dak.curr_date,tbl_dak.source, tbl_dak.status,tbl_dak_forward.marked_to FROM tbl_dak,tbl_dak_forward WHERE tbl_dak.unique_dak_no=tbl_dak_forward.unique_dak_no  and tbl_dak.curr_date between '" . $frm_date . "' AND '" . $to_date . "' AND tbl_dak.status=1 group by tbl_dak.id";
    $result = mysql_query($grie_sql, $db_edak);


    while ($data = mysql_fetch_assoc($result)) {

      for ($i = 0; $i < $array_count; $i++) {
        //echo $section_array[1];
        //if($i <= $array_count-1)
        //if (is_valid_ba_section($data["section_id"])) {
        if ($section_array[$i] == $data['source']) {
          $cnt = $asso_pending_array[$section_array[$i]];
          //echo $user_id."<br/>";
          $cnt = $cnt + 1;
          $asso_pending_array[$section_array[$i]] = $cnt++;
        }
        //}
      }
      // }
    }

    $grie_sql = "SELECT `added_by`,`source`, `curr_date` FROM tbl_dak WHERE  `curr_date` between '" . $frm_date . "' AND '" . $to_date . "' AND tbl_dak.status != '2'";
    $result = mysql_query($grie_sql, $db_edak);
    while ($data = mysql_fetch_assoc($result)) {
      $user_id = $data['added_by'];
      $DB_date = date_create(date("Y-m-d", strtotime($data['curr_date'])));
      $date_difference = date_diff($DB_date, date_create($to_date));
      $date_gap = $date_difference->format("%a");
      if ($date_gap == 30 || $date_gap >= 28) {

        for ($i = 0; $i < $array_count; $i++) {
          //echo $section_array[1];
          //if($i <= $array_count-1)
          //if (is_valid_ba_section($data["section_id"])) {
          if ($section_array[$i] == $data['source']) {
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

  case 'srcWiseReport':
    $associate_array_label = array();
    $associate_array = array();
    $asso_complied_array = array();
    $asso_pending_array = array();
    $asso_more_array = array();
    $section = implode(",", (array)$_REQUEST['src_wise']);
    $frm_date = $_REQUEST['frm_date'];
    $to_date = $_REQUEST['to_date'];
    $section_array = explode(",", $section);
    $all = '0';
    if (in_array($all, $section_array)) {
      $query = "select * from master_source";
      $rstSection = mysql_query($query, $db_edak);
      while ($rwSection = mysql_fetch_array($rstSection)) {
        $sec_id = $rwSection["id"];
        if (!in_array($sec_id, $section_array)) {
          array_push($section_array, $sec_id);
        }
      }
    }
    $cnt = 1;
    foreach ($section_array as $key => $value) {
      $section_name = getSource($value);
      if ($value == 0) {
        $section_name = "New Section";
      }
      $sql = "SELECT * FROM tbl_dak,tbl_user WHERE tbl_dak.marked_to=tbl_user.emp_id and curr_date between '" . $frm_date . "' AND '" . $to_date . "' and source='$value'";
      $rstRecord = mysql_query($sql, $db_edak);
      if (mysql_num_rows($rstRecord) > 0) {
        //if (isBA()) {
        //if (is_valid_section($value)) {
        //echo "<tr><td colspan='8'  style='font-size:16px;font-weight: bold'>Section : $section_name<td>              </tr>";
        echo '<tr>
        <td colspan="8" style="font-size:16px;font-weight: bold;text-align: center; ">Section:  ' . $section_name . '</td>
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
                                <td>$unique_dak_no</td>
                                <td>$recd_from</td>
                                <td>$dt_of_letter</td>
                                <td>$gist_of_letter</td>
                                <td> " . getSectionMarked($marked_to) . " </td> 
                                <td>$curr_date</td>";
          if ($replied == 0) {
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


  default:
    echo " Invalid option";
    break;
}
