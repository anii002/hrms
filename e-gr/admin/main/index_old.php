<?php
require_once('Global_Data/header.php');
//error_reporting(0);
// include('config.php');
?>

<div class="right_col" role="main" style="background-image: url('images/small1.png');repeat:repeat;">
    <div class="">
        <div class="row top_tiles">
            <a href="Employee_list.php">
                <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12" style="">
                    <div class="tile-stats" style="background:#2e92c5;box-shadow:2px 3px 4px 2px gray;border:none">
                        <div class="icon"><i class="fa fa-users" style="color:orange"></i></div>
                        <?php
                        $total_emp = mysql_query("select * from resgister_user", $db_common);
                        $emp_total = mysql_num_rows($total_emp);
                        ?>
                        <div class="count para" style="font-size:24px;margin-left:150px;"><?php echo $emp_total; ?>
                        </div>
                        <center>
                            <h4 style="color:white;font-size:24px;">Total Employess</h4>
                        </center>
                        <!--<p class="para">Lorem ipsum psdea itgum rixt.</p>-->
                    </div>
                </div>
            </a>
            <a href="user_list.php">
                <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="tile-stats" style="background:#d87510;box-shadow:2px 3px 4px 2px gray;border:none">
                        <div class="icon"><i class="fa fa-user" style="color:orange"></i></div>
                        <?php
                        $total_user = mysql_query("select * from tbl_user", $db_egr);
                        $user_total = mysql_num_rows($total_user);
                        ?>
                        <div class="count para" style="font-size:24px;margin-left:150px;"><?php echo $user_total; ?>
                        </div>
                        <center>
                            <h4 style="color:white;color:white;font-size:24px;">Total Users</h4>
                        </center>
                        <!--<p class="para">Lorem ipsum psdea itgum rixt.</p>-->
                    </div>
                </div>
            </a>
            <a href="gri_comp.php">
                <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="tile-stats" style="background:#2e92c5;box-shadow:2px 3px 4px 2px gray;border:none">
                        <div class="icon"><i class="fa fa-plus-square-o" style="color:orange"></i></div>
                        <?php
                        $new_griv = mysql_query("select * from tbl_grievance where status='1'", $db_egr);
                        $griv_new = mysql_num_rows($new_griv);
                        ?>
                        <div class="count para" style="font-size:24px;margin-left:150px;"><?php echo $griv_new; ?></div>
                        <center>
                            <h4 style="color:white;font-size:24px;">New Grievances</h4>
                        </center>
                        <!--<p class="para">Lorem ipsum psdea itgum rixt.</p>-->
                    </div>
                </div>
            </a>
            <!-- </div>
			<div class="row top_tiles">-->
            <a href="griv_pending.php">
                <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="tile-stats" style="background:#d87510;box-shadow:2px 3px 4px 2px gray;border:none">
                        <div class="icon"><i class="fa fa-hourglass-start" style="color:orange"></i></div>
                        <?php
                        $pen_griv = mysql_query("select * from tbl_grievance_forward where status='2'", $db_egr);

                        $griv_pen = mysql_num_rows($pen_griv);
                        //mysql_affected_rows();
                        ?>
                        <div class="count para" style="font-size:24px;margin-left:150px;"><?php echo $griv_pen; ?></div>
                        <center>
                            <h4 style="color:white;font-size:24px;">Pending Grievances</h4>
                        </center>
                        <!--<p class="para">Lorem ipsum psdea itgum rixt.</p>-->
                    </div>
                </div>
            </a>
            <a href="closed_griv.php">
                <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="tile-stats" style="background:#2e92c5;box-shadow:2px 3px 4px 2px gray;border:none">
                        <div class="icon"><i class="fa fa-times" style="color:orange"></i></div>
                        <?php
                        $closed_griv = mysql_query("select * from tbl_grievance where status='4'", $db_egr);
                        $closed_pen = mysql_num_rows($closed_griv);
                        ?>
                        <div class="count para" style="font-size:24px;margin-left:150px;"><?php echo $closed_pen; ?>
                        </div>
                        <center>
                            <h4 style="color:white;font-size:24px;">Closed Grievances</h4>
                        </center>
                        <!--<p class="para">Lorem ipsum psdea itgum rixt.</p>-->
                    </div>
                </div>
            </a>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats" style="background:#d87510;box-shadow:2px 3px 4px 2px gray;border:none">
                    <!--#2195c9;-->
                    <div class="icon"><i class="fa fa-area-chart " style="color:orange"></i></div>
                    <?php $t_griv = mysql_query("select * from tbl_grievance", $db_egr);
                    $griv_t = mysql_num_rows($t_griv);
                    ?>
                    <div class="count para" style="font-size:24px;margin-left:150px;"><?php echo $griv_t; ?></div>
                    <center>
                        <h4 style="color:white;font-size:24px;">Total Grievances</h4>
                    </center>
                    <!--<p class="para">Lorem ipsum psdea itgum rixt.</p>-->
                </div>
            </div>
            <!-- </div>-->
            <?php
            if (isset($_SESSION['SESSION_ROLE'])) {
                if ($_SESSION['SESSION_ROLE'] != 3 && !isBA()) {
                    ?>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div>
                            <h2>New Grievance Complaints <small>List</small></h2>
                            <hr>
                            <div class="x_content">
                                <table class="table table-striped table-bordered display" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Employee No</th>
                                            <th>Employee Name</th>
                                            <th>Employee Type</th>
                                            <th>Grievance Ref.No.</th>
                                            <th>Category</th>
                                            <th>Lodge Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                $cnt = 1;
                                                $sql = "Select e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id from $db_common_name.resgister_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id where g.status='1' AND gri_ref_no NOT like 'WEL%' group by g.id ORDER BY g.gri_upload_date DESC ";
                                                $query = mysql_query($sql);
                                                // echo mysql_num_rows($query);
                                                if (mysql_num_rows($query) > 0) {
                                                    while ($rw_data = mysql_fetch_array($query)) {
                                                        // print_r($rw_data);
                                                        $emp_id = $rw_data["emp_no"];
                                                        $emp_name = $rw_data["name"];
                                                        $emp_type = get_type($rw_data["empType"]);
                                                        // $emp_type = $rw_data["emptype"];
                                                        $gri_ref_no = $rw_data["gri_ref_no"];
                                                        $gri_type = get_Cat($rw_data["gri_type"]);
                                                        $gri_upload_date = $rw_data["gri_upload_date"];
                                                        $g_id = $rw_data["id"];
                                                        echo "<tr>";
                                                        echo "<td>$cnt</td>";
                                                        echo "<td>$emp_id</td>";
                                                        echo "<td>$emp_name</td>";
                                                        echo "<td>$emp_type</td>";
                                                        echo "<td>$gri_ref_no</td>";
                                                        echo "<td>$gri_type</td>";
                                                        echo "<td>$gri_upload_date</td>";
                                                        // echo "<td>$forward_to</td>";
                                                        echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
                                            <a  style='width:75px' id='" . $rw_data['id'] . "' href='gri_comp_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'>View</i></a>
                                            </div>
                                            </td>";
                                                        echo "</tr>";
                                                        $cnt++;
                                                    }
                                                }


                                                ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div>
                            <h2>New Grievance Complaints <small>Added by welfare</small></h2>
                            <hr>
                            <div class="x_content">
                                <table class="table table-striped table-bordered display" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Employee No</th>
                                            <th>Employee Name</th>
                                            <th>Mobile number</th>
                                            <th>Grievance Ref.No.</th>
                                            <th>Lodge Date</th>
                                            <th>Forwarded To</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                // function get_uploaded_user($id)
                                                // {
                                                //     global $db_egr;
                                                //     $e_type = '';
                                                //     $fetch_name_sql = mysql_query("select * from tbl_user where user_id='$id'", $db_egr);
                                                //     while ($name_fetch = mysql_fetch_array($fetch_name_sql)) {
                                                //         $e_type = $name_fetch['user_name'];
                                                //     }
                                                //     return $e_type;
                                                // }
                                                $cnt = 1;
                                                // $sql = "Select  e.emp_id,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id, g.uploaded_by, e.emp_mob from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id where g.status='1' AND gri_ref_no like 'WEL%' ORDER BY g.gri_upload_date DESC";
                                                // $sql = "Select e.empno,e.empname,e.emptype,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id from $db_common_name.prmaemp  e INNER JOIN $db_egr_name.tbl_grievance g ON e.empno=g.emp_id where g.status='1' AND gri_ref_no like 'WEL%' ORDER BY g.gri_upload_date DESC";
                                                $sql = "Select e.emp_no,e.name,e.empType,e.mobile,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,g.uploaded_by from $db_common_name.resgister_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id where g.status='1' AND gri_ref_no like 'WEL%' group by g.id ORDER BY g.gri_upload_date DESC ";

                                                $query = mysql_query($sql);
                                                while ($rw_data = mysql_fetch_array($query)) {
                                                    $emp_id = $rw_data["emp_no"];
                                                    $emp_name = $rw_data["name"];
                                                    $emp_mob = $rw_data["mobile"];
                                                    $gri_ref_no = $rw_data["gri_ref_no"];
                                                    $gri_upload_date = $rw_data["gri_upload_date"];
                                                    $g_id = $rw_data["id"];
                                                    $uploaded_by = get_uploaded_user($rw_data["uploaded_by"]);
                                                    echo "<tr>";
                                                    echo "<td>$cnt</td>";
                                                    echo "<td>$emp_id</td>";
                                                    echo "<td>$emp_name</td>";
                                                    echo "<td>$emp_mob</td>";
                                                    echo "<td>$gri_ref_no</td>";
                                                    // echo "<td>$gri_type</td>";
                                                    echo "<td>$gri_upload_date</td>";
                                                    echo "<td>$uploaded_by</td>";
                                                    echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
										<a  style='width:75px' id='" . $rw_data['id'] . "' href='gri_wel_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'>View</i></a>
										</div>
										</td>";
                                                    echo "</tr>";
                                                    $cnt++;
                                                }
                                                ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <?php    }
        } ?>
        </div>
    </div>

    <style>
    .para {
        color: white;
    }
    </style>

    <?php
    require_once('Global_Data/footer.php');
    ?>