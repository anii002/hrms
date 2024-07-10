<?php
require('config.php');
// print_r($_REQUEST);
if (isset($_REQUEST['action'])) {
    switch (strtolower($_REQUEST['action'])) {
        case 'category_report':
            $category = implode(",", (array)$_REQUEST['category']);
            $frm_date = date('Y-m-d', strtotime($_REQUEST['frm_date']));
            $to_date = date('Y-m-d', strtotime($_REQUEST['to_date']));
            $category_array = explode(",", $category);
            $all = '0';
            $in_status = $_POST["rd_radio"];
            $is_display = array();
            if ($in_status == 0) {
                $is_display = ["1", "2", "3", "4"];
            } else
            if ($in_status == 1) {
                $is_display = ["2", "3"];
            }
            if ($in_status == 2) {
                $is_display = ["4"];
            }
            if (in_array($all, $category_array)) {
                $query = "select * from category";
                $rstCategory = mysql_query($query, $db_egr);
                while ($rwCategory = mysql_fetch_array($rstCategory)) {
                    $cat_id = $rwCategory["cat_id"];
                    if (!in_array($cat_id, $category_array)) {
                        array_push($category_array, $cat_id);
                    }
                }
            }
            $sql = "SELECT * FROM tbl_grievance WHERE DATE(`gri_upload_date`) between '" . $frm_date . "' AND '" . $to_date . "' ORDER BY gri_type";
            $rstRecord = mysql_query($sql, $db_egr);
            $Result = array("res" => "fail");
            if (mysql_num_rows($rstRecord) > 0) {
                $sr = 1;
                while ($rwRecords = mysql_fetch_array($rstRecord)) {
                    $gri_type = $rwRecords["gri_type"];
                    $section = $rwRecords["section_id"];
                    if (in_array($gri_type, $category_array)) {
                        // echo "working";
                        extract($rwRecords);
                         $status_name = ($status == 2 || $status == 3) ? "Pending" : "Closed";
                        if ($status_name == "Closed") {
                            if ($status != 4) {
                                $status_name = "New Grievance";
                            }
                        }
                        $reg_date = date("d-m-Y", strtotime($gri_upload_date));
                        $type = getTypeName($gri_type);
                        $target_date = date('d-m-Y', strtotime($gri_target_date));
                        $emp_name = getEmployeeName($emp_id);
                        $emp_desig = getEmployeeDesignation($emp_id);
                        $emp_station = get_emp_station($emp_id);
                         $style="";
                        if (in_array($status, $is_display)) {
                            if ($status == 2 || $status == 3) {
                                $DB_date = date_create(date("Y-m-d", strtotime($gri_upload_date)));
                                $date_difference = date_diff($DB_date, date_create($to_date));
                                $date_gap = $date_difference->format("%a");
                                if ($date_gap == 30 || $date_gap >= 28) {
                                      $style="font-weight: bold;";
                                    // echo "<tr style=\"font-weight: bold;\">";
                                } else {
                                    // echo "<tr>";
                                }
                            }
                        echo "
                        <tr style='$style'>
                            <td>$sr</td>
                            <td>$gri_ref_no / <br>$reg_date</td>
                            <td>$type</td>
                            <td>$emp_name / $emp_desig </td>
                            <td> $emp_station</td>
                            <td>$gri_desc</td>
                            <td>$target_date</td>
                            <td>$status_name</td>
                        </tr>";
                        $sr++;
                        }
                    }
                }
            }
            break;

        /*case 'section_report':
            $associate_array_label = array();
            $associate_array = array();
            $asso_complied_array = array();
            $asso_pending_array = array();
            $asso_more_array = array();
            $section = implode(",", (array)$_REQUEST['section']);
            $frm_date = date('Y-m-d', strtotime($_REQUEST['frm_date']));
            $to_date = date('Y-m-d', strtotime($_REQUEST['to_date']));
            $section_array = explode(",", $section);
            $all = '0';
            if (in_array($all, $section_array)) {
                $query = "select * from tbl_section";
                $rstSection = mysql_query($query, $db_egr);
                while ($rwSection = mysql_fetch_array($rstSection)) {
                    $sec_id = $rwSection["sec_id"];
                    if (!in_array($sec_id, $section_array)) {
                        array_push($section_array, $sec_id);
                    }
                }
            }
            $cnt = 1;
            foreach ($section_array as $key => $value) {
                $section_name = getSectionName($value);
                if ($value == 0) {
                    $section_name = "New Grievances";
                }
                $sql = "SELECT * FROM tbl_grievance WHERE DATE(`gri_upload_date`) between '" . $frm_date . "' AND '" . $to_date . "' and section_id='$value'";
                $rstRecord = mysql_query($sql, $db_egr);
                if (mysql_num_rows($rstRecord) > 0) {
                    if (isBA()) {
                        if (is_valid_section($value)) {
                            echo "<tr><td colspan='5' style='font-size:16px;font-weight: bold; border:1px solid;'>Section : $section_name<td></tr>";
                            while ($rwRecords = mysql_fetch_array($rstRecord)) {
                                extract($rwRecords);
                                $reg_date = date("d-m-Y", strtotime($gri_upload_date));
                                $type = getTypeName($gri_type);
                                $target_date = date('d-m-Y', strtotime($gri_target_date));
                                $emp_name = getEmployeeName($emp_id);
                                $emp_desig = getEmployeeDesignation($emp_id);
                                echo "<tr>
                                <td>$cnt</td>
                                <td>$gri_ref_no / <br>$reg_date</td>
                                <td>$type</td>
                                <td>$emp_name / $emp_desig </td>
                                <td>$gri_desc</td>
                                <td>$target_date</td>                        
                            </tr>";
                                $cnt++;
                            }
                        }
                    } else {
                        if (!is_valid_ba_section($value) || $value == 5) {
                            echo "<tr><td colspan='5' style='font-size:16px;font-weight: bold; border:1px solid;'>Section : $section_name<td></tr>";
                            while ($rwRecords = mysql_fetch_array($rstRecord)) {
                                extract($rwRecords);
                                $reg_date = date("d-m-Y", strtotime($gri_upload_date));
                                $type = getTypeName($gri_type);
                                $target_date = date('d-m-Y', strtotime($gri_target_date));
                                $emp_name = getEmployeeName($emp_id);
                                $emp_desig = getEmployeeDesignation($emp_id);
                                echo "<tr>
                            <td>$cnt</td>
                            <td>$gri_ref_no / <br>$reg_date</td>
                            <td>$type</td>
                            <td>$emp_name / $emp_desig </td>
                            <td>$gri_desc</td>
                            <td>$target_date</td>                        
                        </tr>";
                                $cnt++;
                            }
                        }
                    }
                } else if (!in_array(0, $section_array)) {
                    if (isBA()) {
                        if (is_valid_section($value)) {
                            echo "<tr><td colspan='5' style='font-size:16px;font-weight: bold; border:1px solid;'>Section : $section_name<td></tr>";
                            echo "<tr><td></td><td colspan='4' style='font-weight: bold; border:1px solid #ddd;'>No Record found!<td></tr>";
                        }
                    } else {
                        if (!is_valid_ba_section($value) || $value == 5) {
                            echo "<tr><td colspan='5' style='font-size:16px;font-weight: bold; border:1px solid;'>Section : $section_name<td></tr>";
                            echo "<tr><td></td><td colspan='4' style='font-weight: bold; border:1px solid #ddd;'>No Record found!<td></tr>";
                        }
                    }
                }
            }
            break;*/
            
          case 'section_report':
            $associate_array_label = array();
            $associate_array = array();
            $asso_complied_array = array();
            $asso_pending_array = array();
            $asso_more_array = array();
            $section = implode(",", (array) $_REQUEST['section']);
            $frm_date = date('Y-m-d', strtotime($_REQUEST['frm_date']));
            $to_date = date('Y-m-d', strtotime($_REQUEST['to_date']));
            $section_array = explode(",", $section);
            $all = '0';
            $in_status = $_POST["rd_radio"];
            $is_display = array();
            if ($in_status == 0) {
                $is_display = ["1", "2", "3", "4"];
            } else
            if ($in_status == 1) {
                $is_display = ["2", "3"];
            }
            if ($in_status == 2) {
                $is_display = ["4"];
            }
            if (in_array($all, $section_array)) {
                $query = "select * from tbl_section";
                $rstSection = mysql_query($query, $db_egr);
                while ($rwSection = mysql_fetch_array($rstSection)) {
                    $sec_id = $rwSection["sec_id"];
                    if (!in_array($sec_id, $section_array)) {
                        array_push($section_array, $sec_id);
                    }
                }
            }
            $cnt = 1;
            foreach ($section_array as $key => $value) {
              
                $section_name = getSectionName($value);
                if ($value == 0) {
                   
                    $section_name = "New Grievances";
                    // $sql = "SELECT * FROM tbl_grievance WHERE DATE(`gri_upload_date`) between '" . $frm_date . "' AND '" . $to_date . "' and section_id='$value' and `status`='1'";
                    $sql = "Select e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id where g.status='1'";
                } else {
                    
                    $sql = "SELECT * FROM tbl_grievance WHERE DATE(`gri_upload_date`) between '" . $frm_date . "' AND '" . $to_date . "' and section_id='$value' ";
                }

                $rstRecord = mysql_query($sql, $db_egr);
                if (mysql_num_rows($rstRecord) > 0) {
                    if (isBA()) {
                        // if (is_valid_section($value)) {
                            echo "<tr><td colspan='5' style='font-size:16px;font-weight: bold; border:1px solid;'>Section : $section_name<td></tr>";
                            while ($rwRecords = mysql_fetch_array($rstRecord)) {
                                extract($rwRecords);
                                $reg_date = date("d-m-Y", strtotime($gri_upload_date));
                                $type = getTypeName($gri_type);
                                $target_date = date('d-m-Y', strtotime($gri_target_date));
                                $emp_name = getEmployeeName($emp_id);
                                $emp_desig = getEmployeeDesignation($emp_id);
                                 $emp_station = get_emp_station($emp_id);
                                $status_name = ($status == 2 || $status == 3) ? "Pending" : "Closed";
                                if ($status_name == "Closed") {
                                    if ($status != 4) {
                                        $status_name = "New Grievance";
                                    }
                                }
                                
                                if (in_array($status, $is_display)) {
                                    if ($status == 2 || $status == 3) {
                                        $DB_date = date_create(date("Y-m-d", strtotime($gri_upload_date)));
                                        $date_difference = date_diff($DB_date, date_create($to_date));
                                        $date_gap = $date_difference->format("%a");
                                        if ($date_gap == 30 || $date_gap >= 28) {
                                            echo "<tr style=\"font-weight: bold;\">";
                                        } else {
                                            echo "<tr>";
                                        }
                                    }
                                echo "
                                <td>$cnt</td>
                                <td>$gri_ref_no / <br>$reg_date</td>
                                <td>$type</td>
                                <td>$emp_name / $emp_desig</td>
                                <td>$emp_station</td>
                                <td>$gri_desc</td>
                                <td>$target_date</td>
                                <td>$status_name</td>
                            </tr>";
                                $cnt++;
                                                                }
                            }
                        // }
                    } else {
                        if (!is_valid_ba_section($value)) {
                            echo "<tr><td colspan='5' style='font-size:16px;font-weight: bold; border:1px solid;'>Section : $section_name<td></tr>";
                            while ($rwRecords = mysql_fetch_array($rstRecord)) {
                                extract($rwRecords);
                                $reg_date = date("d-m-Y", strtotime($gri_upload_date));
                                $type = getTypeName($gri_type);
                                $target_date = date('d-m-Y', strtotime($gri_target_date));
                                $emp_name = getEmployeeName($emp_id);
                                $emp_desig = getEmployeeDesignation($emp_id);
                                 $emp_station = get_emp_station($emp_id);
                                $status_name = ($status == 2 || $status == 3) ? "Pending" : "Closed";
                                if ($status_name == "Closed") {
                                    if ($status != 4) {
                                        $status_name = "New Grievance";
                                    }
                                }

                                if (in_array($status, $is_display)) {
                                    if ($status == 2 || $status == 3) {
                                        $DB_date = date_create(date("Y-m-d", strtotime($gri_upload_date)));
                                        $date_difference = date_diff($DB_date, date_create($to_date));
                                        $date_gap = $date_difference->format("%a");
                                        if ($date_gap == 30 || $date_gap >= 28) {
                                            echo "<tr style=\"font-weight: bold;\">";
                                        } else {
                                            echo "<tr>";
                                        }
                                    }
                                echo "<td>$cnt</td>
                            <td>$gri_ref_no / <br>$reg_date</td>
                            <td>$type</td>
                            <td>$emp_name / $emp_desig</td>
                            <td>$emp_station</td>
                            <td>$gri_desc</td>
                            <td>$target_date</td>
                            <td>$status_name</td>
                        </tr>";
                                $cnt++;
                                }
                            }
                        }
                    }
                } else if (!in_array(0, $section_array)) {
                    if (isBA()) {
                        // if (is_valid_section($value)) {
                            echo "<tr><td colspan='5' style='font-size:16px;font-weight: bold; border:1px solid;'>Section : $section_name<td></tr>";
                            echo "<tr><td></td><td colspan='4' style='font-weight: bold; border:1px solid #ddd;'>No Record found!<td></tr>";
                        // }
                    } else {
                        if (!is_valid_ba_section($value)) {
                            echo "<tr><td colspan='5' style='font-size:16px;font-weight: bold; border:1px solid;'>Section : $section_name<td></tr>";
                            echo "<tr><td></td><td colspan='4' style='font-weight: bold; border:1px solid #ddd;'>No Record found!<td></tr>";
                        }
                    }
                }
            }
            break;




        case 'welfare_report':
            $welfare = implode(",", (array)$_REQUEST['welfare']);
            $frm_date = date('Y-m-d', strtotime($_REQUEST['frm_date']));
            $to_date = date('Y-m-d', strtotime($_REQUEST['to_date']));
            $welfare_array = explode(",", $welfare);
            $all = '0';
            if (in_array($all, $welfare_array)) {
                // where role='2'
                $query = "select * from tbl_user ";
                $rstwelfare = mysql_query($query, $db_egr);
                while ($rwwelfare = mysql_fetch_array($rstwelfare)) {
                    $user_role=explode(",",$rwwelfare["role"]);
                    if(in_array('2',$user_role)){
                        $cat_id = $rwwelfare["user_id"];
                        if (!in_array($cat_id, $welfare_array)) {
                            array_push($welfare_array, $cat_id);
                        }
                    }
                }
            }
            foreach ($welfare_array as $key => $value) {
                $sr = 1;
                if ($value != 0) {
                    $username = getUsername($value);
                    echo "<tr><td colspan='5' style='font-size:16px;font-weight: bold; border:1px solid;'>Welfare Inspector : $username<td></tr>";
                    $sql = "SELECT * FROM tbl_grievance WHERE DATE(`gri_upload_date`) between '" . $frm_date . "' AND '" . $to_date . "' and uploaded_by='$value'";
                    $rstRecord = mysql_query($sql, $db_egr);
                    $Result = array("res" => "fail");
                    if (mysql_num_rows($rstRecord) > 0) {
                        while ($rwRecords = mysql_fetch_array($rstRecord)) {
                            $gri_type = $rwRecords["gri_type"];
                            extract($rwRecords);
                            $reg_date = date("d-m-Y", strtotime($gri_upload_date));
                            $type = getTypeName($gri_type);
                            $target_date = date('d-m-Y', strtotime($gri_target_date));
                            $emp_name = getEmployeeName($emp_id);
                            $emp_desig = getEmployeeDesignation($emp_id);
                             $emp_station = get_emp_station($emp_id);
                            echo "<tr>
                                    <td>$sr</td>
                                    <td>$gri_ref_no / <br>$reg_date</td>
                                    <td>$type</td>
                                    <td>$emp_name / $emp_desig / $emp_station</td>
                                    <td>$gri_desc</td>
                                    <td>$target_date</td>                        
                                </tr>";
                            $sr++;
                        }
                    } else {
                        echo "<tr><td></td><td colspan='4' style='font-weight: bold; border:1px solid #ddd;'>No Record found!<td></tr>";
                    }
                }
            }
            break;

        case 'branch_officer_report':
            // print_r($_REQUEST);
            $branchuser = implode(",", (array)$_REQUEST['branchuser']);
            $frm_date = date('Y-m-d', strtotime($_REQUEST['frm_date']));
            $to_date = date('Y-m-d', strtotime($_REQUEST['to_date']));
            $branchuser_array = explode(",", $branchuser);
            $all = '0';
            if (in_array($all, $branchuser_array)) {
                // where role='3'
                $query = "select * from tbl_user ";
                $rstbranchuser = mysql_query($query, $db_egr);
                while ($rwbranchuser = mysql_fetch_array($rstbranchuser)) {
                    $user_role=explode(",",$rwbranchuser["role"]);
                    if(in_array('3',$user_role)){
                        $user_id = $rwbranchuser["user_id"];
                        if (!in_array($user_id, $branchuser_array)) {
                            array_push($branchuser_array, $user_id);
                        }
                    }
                }
            }
            $sr = 1;
            foreach ($branchuser_array as $key => $value) {
                // echo "Key=>" . $key . "Value=>" . $value;
                if ($value == 0) {
                    continue;
                }

                $section_array = explode(',', getSectionIds($value));
                $username = getUsername($value);
                echo "<tr>
                    <td style='font-weight:bold;'>Branch Officer Name :</td>
                    <td colspan='5'>$username</td>
                    </tr>";
                foreach ($section_array as $section_id) {
                    # code...
                    $section_name = getSectionName($section_id);
                    echo "<tr>
                        <td style='font-weight:bold;'>Section : </td>
                        <td colspan='4'>$section_name</td>
                        <td></td>
                        </tr>";

                    $sql = "SELECT * FROM tbl_grievance WHERE DATE(`gri_upload_date`) between '" . $frm_date . "' AND '" . $to_date . "' and section_id='$section_id' ";
                    $rstRecord = mysql_query($sql, $db_egr);
                    $Result = array("res" => "fail");
                    if (mysql_num_rows($rstRecord) > 0) {
                        while ($rwRecords = mysql_fetch_array($rstRecord)) {
                            $gri_type = $rwRecords["gri_type"];
                            extract($rwRecords);
                            $reg_date = date("d-m-Y", strtotime($gri_upload_date));
                            $type = getTypeName($gri_type);
                            $target_date = date('d-m-Y', strtotime($gri_target_date));
                            $emp_name = getEmployeeName($emp_id);
                            $emp_desig = getEmployeeDesignation($emp_id);
                             $emp_station = get_emp_station($emp_id);
                            echo "<tr>
                                        <td>$sr</td>
                                        <td>$gri_ref_no / <br>$reg_date</td>
                                        <td>$type</td>
                                        <td>$emp_name / $emp_desig / $emp_station</td>
                                        <td>$gri_desc</td>
                                        <td>$target_date</td>                        
                                    </tr>";
                            $sr++;
                        }
                    } else {
                        echo "<tr><td></td><td colspan='4' style='font-weight: bold; border:1px solid #ddd;'>No Record found!<td></tr>";
                    }
                }
            }
            break;

        case 'ba_category_report':
            $category = implode(",", (array)$_REQUEST['category']);
            $frm_date = date('Y-m-d', strtotime($_REQUEST['frm_date']));
            $to_date = date('Y-m-d', strtotime($_REQUEST['to_date']));
            $category_array = explode(",", $category);
            $all = '0';
            if (in_array($all, $category_array)) {
                $query = "select * from category";
                $rstCategory = mysql_query($query, $db_egr);
                while ($rwCategory = mysql_fetch_array($rstCategory)) {
                    $cat_id = $rwCategory["cat_id"];
                    if (!in_array($cat_id, $category_array)) {
                        array_push($category_array, $cat_id);
                    }
                }
            }
            $sql = "SELECT * FROM tbl_grievance WHERE DATE(`gri_upload_date`) between '" . $frm_date . "' AND '" . $to_date . "' ORDER BY gri_type";
            $rstRecord = mysql_query($sql, $db_egr);
            $Result = array("res" => "fail");
            if (mysql_num_rows($rstRecord) > 0) {
                $sr = 1;
                while ($rwRecords = mysql_fetch_array($rstRecord)) {
                    $gri_type = $rwRecords["gri_type"];
                    $section = $rwRecords["section_id"];
                    if (in_array($gri_type, $category_array) && is_valid_ba_section($section)) {
                        extract($rwRecords);
                        $reg_date = date("d-m-Y", strtotime($gri_upload_date));
                        $type = getTypeName($gri_type);
                        $target_date = date('d-m-Y', strtotime($gri_target_date));
                        $emp_name = getEmployeeName($emp_id);
                        $emp_desig = getEmployeeDesignation($emp_id);
                         $emp_station = get_emp_station($emp_id);
                        echo "<tr>
                            <td>$sr</td>
                            <td>$gri_ref_no / <br>$reg_date</td>
                            <td>$type</td>
                            <td>$emp_name / $emp_desig / $emp_station</td>
                            <td>$gri_desc</td>
                            <td>$target_date</td>                        
                        </tr>";
                        $sr++;
                    }
                }
            }
            break;

        case 'ba_category_report_sum':
            $associate_array_label = array();
            $associate_array = array();
            $asso_complied_array = array();
            $asso_pending_array = array();
            $asso_more_array = array();
            $category = implode(",", (array)$_REQUEST['category']);
            $frm_date = date('Y-m-d', strtotime($_REQUEST['frm_date']));
            $to_date = date('Y-m-d', strtotime($_REQUEST['to_date']));
            $section_array = explode(",", $category);
            // print_r($section_array);
            if (in_array(0, $section_array)) {
                // echo "done";
                $query = "select * from category";
                $rstCategory = mysql_query($query, $db_egr);
                while ($rwCategory = mysql_fetch_array($rstCategory)) {
                    // print_r($rwCategory);
                    $cat_id = $rwCategory["cat_id"];
                    if (!in_array($cat_id, $section_array)) {
                        array_push($section_array, $cat_id);
                    }
                }
            }
            $array_count = count($section_array);
            for ($i = 0; $i < $array_count; $i++) {
                $associate_array_label[$section_array[$i]] = get_category_name($section_array[$i]);
                $associate_array[$section_array[$i]] = 0;
                $asso_complied_array[$section_array[$i]] = 0;
                $asso_pending_array[$section_array[$i]] = 0;
                $asso_more_array[$section_array[$i]] = 0;
            }

            $grie_sql = "SELECT `gri_type`,`section_id` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "'";
            $result = mysql_query($grie_sql, $db_egr);

            while ($data = mysql_fetch_assoc($result)) {
                for ($i = 0; $i < $array_count; $i++) {
                    if (is_valid_ba_section($data["section_id"])) {
                        if ($section_array[$i] == $data['gri_type']) {
                            $cnt = $associate_array[$section_array[$i]];
                            //echo $section_array[$i];
                            $cnt = $cnt + 1;
                            $associate_array[$section_array[$i]] = $cnt++;
                            // echo $cnt;
                        }
                    }
                }
            }

            $grie_sql = "SELECT `gri_type`,`section_id` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "' AND `status` = '4'";
            $result = mysql_query($grie_sql, $db_egr);

            while ($data = mysql_fetch_assoc($result)) {
                for ($i = 0; $i < $array_count; $i++) {
                    //echo $section_array[1];
                    //if($i <= $array_count-1)
                    // if (is_valid_ba_section($data["section_id"])) {
                        if ($section_array[$i] == $data['gri_type']) {
                            $cnt = $asso_complied_array[$section_array[$i]];
                            //echo $user_id."<br/>";
                            $cnt = $cnt + 1;
                            $asso_complied_array[$section_array[$i]] = $cnt++;
                        }
                    // }
                }
            }

            $grie_sql = "SELECT `gri_type`,`section_id` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "' AND `status`!= '4'";
            $result = mysql_query($grie_sql, $db_egr);

            while ($data = mysql_fetch_assoc($result)) {
                for ($i = 0; $i < $array_count; $i++) {
                    //echo $section_array[1];
                    //if($i <= $array_count-1)
                    // if (is_valid_ba_section($data["section_id"])) {
                        if ($section_array[$i] == $data['gri_type']) {
                            $cnt = $asso_pending_array[$section_array[$i]];
                            //echo $user_id."<br/>";
                            $cnt = $cnt + 1;
                            $asso_pending_array[$section_array[$i]] = $cnt++;
                        }
                    // }
                }
            }

            $grie_sql = "SELECT `gri_type`, `gri_upload_date`,`section_id` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "' AND `status` != '4'";
            $result = mysql_query($grie_sql, $db_egr);

            while ($data = mysql_fetch_assoc($result)) {
                $DB_date = date_create(date("Y-m-d", strtotime($data['gri_upload_date'])));
                $date_difference = date_diff($DB_date, date_create($to_date));
                $date_gap = $date_difference->format("%a");
                if ($date_gap == 30 || $date_gap >= 28) {
                    for ($i = 0; $i < $array_count; $i++) {
                        //echo $section_array[1];
                        //if($i <= $array_count-1)
                        // if (is_valid_ba_section($data["section_id"])) {
                            if ($section_array[$i] == $data['gri_type']) {
                                $cnt = $asso_more_array[$section_array[$i]];
                                //echo $user_id."<br/>";
                                $cnt = $cnt + 1;
                                $asso_more_array[$section_array[$i]] = $cnt++;
                            }
                        // }
                    }
                }
            }

            $data = '';
            $sr_no = 0;
            for ($i = 0; $i < $array_count; $i++) {
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
            $data .= "<tr style='font-size: 15px'>";
            $data .= "<td></td>";
            $data .= "<td>Total</td>";
            $data .= "<td style='text-align:center'>" . array_sum($associate_array) . "</td>";
            $data .= "<td style='text-align:center'>" . array_sum($asso_complied_array) . "</td>";
            $data .= "<td style='text-align:center'>" . array_sum($asso_pending_array) . "</td>";
            $data .= "<td style='text-align:center'>" . array_sum($asso_more_array) . "</td>";
            $data .= "</tr>";
            echo $data;
            break;

        case 'ba_section_report':
            $associate_array_label = array();
            $associate_array = array();
            $asso_complied_array = array();
            $asso_pending_array = array();
            $asso_more_array = array();
            $section = implode(",", (array)$_REQUEST['section']);
            $frm_date = date('Y-m-d', strtotime($_REQUEST['frm_date']));
            $to_date = date('Y-m-d', strtotime($_REQUEST['to_date']));
            $section_array = explode(",", $section);
            $all = '0';
            if (in_array($all, $section_array)) {
                $query = "select * from tbl_section";
                $rstSection = mysql_query($query, $db_egr);
                while ($rwSection = mysql_fetch_array($rstSection)) {
                    $sec_id = $rwSection["sec_id"];
                    if (!in_array($sec_id, $section_array)) {
                        array_push($section_array, $sec_id);
                    }
                }
            }
            $cnt = 1;
            foreach ($section_array as $key => $value) {
                $section_name = getSectionName($value);
                if ($value == 0) {
                    $section_name = "New Grievances";
                }
                $sql = "SELECT * FROM tbl_grievance WHERE DATE(`gri_upload_date`) between '" . $frm_date . "' AND '" . $to_date . "' and section_id='$value'";
                $rstRecord = mysql_query($sql, $db_egr);
                if (mysql_num_rows($rstRecord) > 0) {
                    // if (is_valid_ba_section($value)) {
                        echo "<tr><td colspan='5' style='font-size:16px;font-weight: bold; border:1px solid;'>Section : $section_name<td></tr>";
                        while ($rwRecords = mysql_fetch_array($rstRecord)) {
                            extract($rwRecords);
                            $reg_date = date("d-m-Y", strtotime($gri_upload_date));
                            $type = getTypeName($gri_type);
                            $target_date = date('d-m-Y', strtotime($gri_target_date));
                            $emp_name = getEmployeeName($emp_id);
                            $emp_desig = getEmployeeDesignation($emp_id);
                            echo "<tr>
                            <td>$cnt</td>
                            <td>$gri_ref_no / <br>$reg_date</td>
                            <td>$type</td>
                            <td>$emp_name / $emp_desig </td>
                            <td>$gri_desc</td>
                            <td>$target_date</td>                        
                        </tr>";
                            $cnt++;
                        }
                    // }
                } else if (!in_array(0, $section_array)) {
                    if (is_valid_ba_section($value)) {
                        echo "<tr><td colspan='5' style='font-size:16px;font-weight: bold; border:1px solid;'>Section : $section_name<td></tr>";
                        echo "<tr><td></td><td colspan='4' style='font-weight: bold; border:1px solid #ddd;'>No Record found!<td></tr>";
                    }
                }
            }
            break;

        case 'ba_section_report_sum':
            // print_r($_REQUEST);
            $associate_array_label = array();
            $associate_array = array();
            $asso_complied_array = array();
            $asso_pending_array = array();
            $asso_more_array = array();
            $section = implode(",", (array)$_REQUEST['section']);
            $frm_date = date('Y-m-d', strtotime($_REQUEST['frm_date']));
            $to_date = date('Y-m-d', strtotime($_REQUEST['to_date']));
            $section_array = explode(",", $section);
            if (in_array(0, $section_array)) {
                // echo "done";
                $query = "select * from tbl_section";
                $rstSection = mysql_query($query, $db_egr);
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
                $associate_array_label[$section_array[$i]] = get_section_name($section_array[$i]);
                $associate_array[$section_array[$i]] = 0;
                $asso_complied_array[$section_array[$i]] = 0;
                $asso_pending_array[$section_array[$i]] = 0;
                $asso_more_array[$section_array[$i]] = 0;
                if ($i == 0) {
                    if (in_array(0, $section_array)) {
                        $associate_array_label[$section_array[$i]] = "New Grievances";
                    }
                }
            }

            $grie_sql = "SELECT `uploaded_by`,`section_id` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "'";
            $result = mysql_query($grie_sql, $db_egr);

            while ($data = mysql_fetch_assoc($result)) {
                // $user_id = $data['uploaded_by'];
                // echo mysql_affected_rows();
                // $section_sql = "SELECT `section` FROM `tbl_user` WHERE `user_id` = '" . $user_id . "'";
                // $sql_result = mysql_query($section_sql);
                // while ($sql_data = mysql_fetch_assoc($sql_result)) {
                // 	//?echo $sql_data['section']."<br/>";
                // 	//* welcome
                // 	//! eecho eef
                // 	//todo welcome 

                // }
                for ($i = 0; $i < $array_count; $i++) {
                    //echo $section_array[1];
                    //if($i <= $array_count-1)
                    // if (is_valid_ba_section($data["section_id"])) {
                        if ($section_array[$i] == $data['section_id']) {
                            $cnt = $associate_array[$section_array[$i]];
                            //echo $section_array[$i];
                            $cnt = $cnt + 1;
                            $associate_array[$section_array[$i]] = $cnt++;
                        }
                    // }
                }
            }

            $grie_sql = "SELECT g.id,g.uploaded_by,g.section_id, g.gri_upload_date,g.status,f.user_id FROM tbl_grievance g JOIN tbl_grievance_forward f  ON g.gri_ref_no=f.griv_ref_no WHERE g.gri_upload_date between '" . $frm_date . "' AND '" . $to_date . "' AND g.status=4 group by g.id";
            $result = mysql_query($grie_sql, $db_egr);

            while ($data = mysql_fetch_assoc($result)) {
                // $user_id = $data['uploaded_by'];
                // //echo mysql_affected_rows();
                // $section_sql = "SELECT `section` FROM `tbl_user` WHERE `user_id` = '" . $user_id . "'";
                // $sql_result = mysql_query($section_sql);

                // while ($sql_data = mysql_fetch_assoc($sql_result)) {
                //echo $sql_data['section']."<br/>";
                for ($i = 0; $i < $array_count; $i++) {
                    //echo $section_array[1];
                    //if($i <= $array_count-1)
                    // if (is_valid_ba_section($data["section_id"])) {
                        if ($section_array[$i] == $data['section_id']) {
                            $cnt = $asso_complied_array[$section_array[$i]];
                            //echo $user_id."<br/>";
                            $cnt = $cnt + 1;
                            $asso_complied_array[$section_array[$i]] = $cnt++;
                        }
                    // }
                }
                // }
            }

            $grie_sql = "SELECT g.uploaded_by,g.section_id, g.gri_upload_date,g.status,f.user_id FROM tbl_grievance g JOIN  tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no WHERE g.gri_upload_date between '" . $frm_date . "' AND '" . $to_date . "' AND g.status=1 group by g.id";
            $result = mysql_query($grie_sql, $db_egr);


            while ($data = mysql_fetch_assoc($result)) {
                // $user_id = $data['uploaded_by'];
                // //echo mysql_affected_rows();
                // $section_sql = "SELECT `section` FROM `tbl_user` WHERE `user_id` = '" . $user_id . "'";
                // $sql_result = mysql_query($section_sql);

                // while ($sql_data = mysql_fetch_assoc($sql_result)) {
                //echo $sql_data['section']."<br/>";
                for ($i = 0; $i < $array_count; $i++) {
                    //echo $section_array[1];
                    //if($i <= $array_count-1)
                    // if (is_valid_ba_section($data["section_id"])) {
                        if ($section_array[$i] == $data['section_id']) {
                            $cnt = $asso_pending_array[$section_array[$i]];
                            //echo $user_id."<br/>";
                            $cnt = $cnt + 1;
                            $asso_pending_array[$section_array[$i]] = $cnt++;
                        }
                    // }
                }
                // }
            }

            $grie_sql = "SELECT `uploaded_by`,`section_id`, `gri_upload_date` FROM tbl_grievance WHERE `gri_upload_date` between '" . $frm_date . "' AND '" . $to_date . "' AND `status` != '4'";
            $result = mysql_query($grie_sql, $db_egr);
            while ($data = mysql_fetch_assoc($result)) {
                $user_id = $data['uploaded_by'];
                $DB_date = date_create(date("Y-m-d", strtotime($data['gri_upload_date'])));
                $date_difference = date_diff($DB_date, date_create($to_date));
                $date_gap = $date_difference->format("%a");
                if ($date_gap == 30 || $date_gap >= 28) {
                    //echo mysql_affected_rows();
                    // $section_sql = "SELECT `section` FROM `tbl_user` WHERE `user_id` = '" . $user_id . "'";
                    // $sql_result = mysql_query($section_sql);

                    // while ($sql_data = mysql_fetch_assoc($sql_result)) {
                    //echo $sql_data['section']."<br/>";
                    for ($i = 0; $i < $array_count; $i++) {
                        //echo $section_array[1];
                        //if($i <= $array_count-1)
                        // if (is_valid_ba_section($data["section_id"])) {
                            if ($section_array[$i] == $data['section_id']) {
                                $cnt = $asso_more_array[$section_array[$i]];
                                //echo $user_id."<br/>";
                                $cnt = $cnt + 1;
                                $asso_more_array[$section_array[$i]] = $cnt++;
                            }
                        // }
                    }
                    // }
                }
            }
            //echo $grie_sql;
            $data = '';
            $sr_no = 0;
            for ($i = 0; $i < $array_count; $i++) {
                // if (is_valid_ba_section($section_array[$i])) {
                    $sr_no = $sr_no + 1;
                    $data .= "<tr style='font-size: 15px'>";
                    $data .= "<td>" . $sr_no . "</td>";
                    $data .= "<td>" . $associate_array_label[$section_array[$i]] . "</td>";
                    $data .= "<td style='text-align:center'>" . $associate_array[$section_array[$i]] . "</td>";
                    $data .= "<td style='text-align:center'>" . $asso_complied_array[$section_array[$i]] . "</td>";
                    $data .= "<td style='text-align:center'>" . $asso_pending_array[$section_array[$i]] . "</td>";
                    $data .= "<td style='text-align:center'>" . $asso_more_array[$section_array[$i]] . "</td>";
                    $data .= "</tr>";
                // }
            }
            $data .= "<tr style='font-size: 15px'>";
            $data .= "<td></td>";
            $data .= "<td>Total</td>";
            $data .= "<td style='text-align:center'>" . array_sum($associate_array) . "</td>";
            $data .= "<td style='text-align:center'>" . array_sum($asso_complied_array) . "</td>";
            $data .= "<td style='text-align:center'>" . array_sum($asso_pending_array) . "</td>";
            $data .= "<td style='text-align:center'>" . array_sum($asso_more_array) . "</td>";
            $data .= "</tr>";
            echo $data;
            break;

        
        case 'ba_wise_report':
            // print_r($_REQUEST);
            /**
             * Array ( [user_id] => 1 [user] => Array ( [0] => 0 [1] => 29 ) [frm_date] => 05/01/2019 [to_date] => 07/25/2019 [action] => ba_wise_repot )
             */
            $branchadminuser = implode(",", (array) $_REQUEST['user']);
            $frm_date = date('Y-m-d', strtotime($_REQUEST['frm_date']));
            $to_date = date('Y-m-d', strtotime($_REQUEST['to_date']));
            $branchadminuser_array = explode(",", $branchadminuser);
            $all = '0';
            if (in_array($all, $branchadminuser_array)) {
                $query = "select * from tbl_user";
                $rstbranchuser = mysql_query($query, $db_egr);
                while ($rwbranchuser = mysql_fetch_array($rstbranchuser)) {
                    $role_user = explode(",", $rwbranchuser["role"]);
                    if (in_array('5', $role_user)) {
                        $user_id = $rwbranchuser["user_id"];
                        if (!in_array($user_id, $branchadminuser_array)) {
                            array_push($branchadminuser_array, $user_id);
                        }
                    }
                }
            }
            $sr = 1;
            foreach ($branchadminuser_array as $key => $value) {
                // echo "Key=>" . $key . "Value=>" . $value;
                if ($value == 0) {
                    continue;
                }
                $username = getUsername($value);
                echo "<tr>
                    <td style='font-weight:bold;'>Branch Officer Name :</td>
                    <td colspan='5'>$username</td>
                    </tr>";

                $sql = "SELECT e.`emp_id`,e.`gri_ref_no`,e.`gri_type`,e.`gri_desc`,e.`gri_upload_date`,e.`gri_target_date` FROM `tbl_grievance` e INNER JOIN tbl_grievance_forward e_f ON e.gri_ref_no= e_f.griv_ref_no WHERE e_f.user_id_forwarded='$value' AND e.status IN (2,3)";
                $rstRecord = mysql_query($sql, $db_egr);
                $Result = array("res" => "fail");
                if (mysql_num_rows($rstRecord) > 0) {
                    while ($rwRecords = mysql_fetch_array($rstRecord)) {
                        $gri_type = $rwRecords["gri_type"];
                        extract($rwRecords);
                        $reg_date = date("d-m-Y", strtotime($gri_upload_date));
                        $type = getTypeName($gri_type);
                        $target_date = date('d-m-Y', strtotime($gri_target_date));
                        $emp_name = getEmployeeName($emp_id);
                        $emp_desig = getEmployeeDesignation($emp_id);
                         $emp_station = get_emp_station($emp_id);
                        echo "<tr>
                                        <td>$sr</td>
                                        <td>$gri_ref_no / <br>$reg_date</td>
                                        <td>$type</td>
                                        <td>$emp_name / $emp_desig / $emp_station</td>
                                        <td>$gri_desc</td>
                                        <td>$target_date</td>                        
                                    </tr>";
                        $sr++;
                    }
                } else {
                    echo "<tr><td></td><td colspan='4' style='font-weight: bold; border:1px solid #ddd;'>No Record found!<td></tr>";
                }
            }
            break;

        
        default:
            echo "working";
            break;
    }
}