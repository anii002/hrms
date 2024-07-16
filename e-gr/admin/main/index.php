<?php
session_start();
require_once('Global_Data/header.php');
//error_reporting(0);
include('config.php');
include('functions.php')

?>

<div class="right_col" role="main" style="background-image: url('images/small1.png')repeat;">
    <div class="">
        <div class="row top_tiles">
            <?php if (isAdmin()) { ?>
                <a href="Employee_list.php">
                    <div class="animated flipInY col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <?php

                            $total_emp = mysqli_query($db_common, "select * from register_user");
                            $emp_total = mysqli_num_rows($total_emp);
                            ?>
                            <div class="count para"><?php echo $emp_total; ?>
                            </div>
                            <!--<h4>Total Employess</h4>-->
                            <h4 class="para">Total Employess</h4>
                        </div>
                    </div>
                </a>
                <a href="user_list.php">
                    <div class="animated flipInY col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-user"></i></div>
                            <?php
                            $total_user = mysqli_query($db_egr, "select * from tbl_user");
                            $user_total = mysqli_num_rows($total_user);
                            ?>
                            <div class="count para"><?php echo $user_total; ?>
                            </div>
                            <h4>Total Users</h4>
                            <!--<p class="para">Lorem ipsum psdea itgum rixt.</p>-->
                        </div>
                    </div>
                </a>
            <?php }
            $href = (isBA() || isBo()) ? "returned_back.php" : "gri_comp.php";
            ?>
            <a href="<?php echo $href; ?>">
                <div class="animated flipInY col-lg-<?php if (isAdmin()) echo 2;
                                                    else echo 3; ?> col-md-2 col-sm-4 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-plus-square-o"></i></div>
                        <?php
                        $current_id = getCurrentUser();
                        // $sql_admin = "select * from tbl_grievance where status='1'";
                        $sql_admin = "Select e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id where g.status='1'";

                        $sql_ba = "Select g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from tbl_grievance g INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where (g.status='3' or g.status='2') and (f.status='2' or f.status='3') and  f.user_id_forwarded='$current_id'  group by g.id order by g.gri_upload_date DESC";
                        $sql = (isBA() || isBo()) ? $sql_ba : $sql_admin;
                        $new_griv = mysqli_query($db_egr, $sql);
                        $griv_new = mysqli_num_rows($new_griv);
                        ?>
                        <div class="count para"><?php echo $griv_new; ?></div>
                        <h4>New Grievances</h4>
                        <!--<p class="para">Lorem ipsum psdea itgum rixt.</p>-->
                    </div>
                </div>
            </a>
            <!-- </div>
			<div class="row top_tiles">-->
            <a href="griv_pending.php">
                <div class="animated flipInY col-lg-<?php if (isAdmin()) echo 2;
                                                    else echo 3; ?> col-md-2 col-sm-4 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-hourglass-start"></i></div>
                        <?php
                        $sql_ba = "Select g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from tbl_grievance g INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='2' and f.status='2' and f.admin_action IN ('1','2','3') and f.user_id='$current_id' group by g.id order by g.gri_upload_date DESC";
                        $sql_admin = "select * from tbl_grievance_forward where status='2'";
                        $sql = (isBA() || isBo()) ? $sql_ba : $sql_admin;
                        $pen_griv = mysqli_query($db_egr, $sql);

                        $griv_pen = mysqli_num_rows($pen_griv);
                        //mysqli_affected_rows();
                        ?>
                        <div class="count para"><?php echo $griv_pen; ?></div>
                        <h4>Pending Grievances</h4>
                        <!--<p class="para">Lorem ipsum psdea itgum rixt.</p>-->
                    </div>
                </div>
            </a>
            <a href="closed_griv.php">
                <div class="animated flipInY col-lg-<?php if (isAdmin()) echo 2;
                                                    else echo 3; ?> col-md-2 col-sm-4 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-times"></i></div>
                        <?php
                        $section = getSectionIds($current_id);
                        $sql_ba = "Select g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from tbl_grievance g INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='4' and f.status='4' and (g.section_id in ($section) OR closedby='$current_id') group by g.id ORDER BY g.gri_upload_date DESC";
                        $sql_admin = "select * from tbl_grievance where status='4'";
                        $sql = (isBA() || isBo()) ? $sql_ba : $sql_admin;
                        $closed_griv = mysqli_query($db_egr, $sql);
                        $closed_pen = mysqli_num_rows($closed_griv);
                        ?>
                        <div class="count para"><?php echo $closed_pen; ?>
                        </div>
                        <h4>Closed Grievances</h4>
                        <!--<p class="para">Lorem ipsum psdea itgum rixt.</p>-->
                    </div>
                </div>
            </a>
            <?php if (isAdmin()) { ?>
                <div class="animated flipInY col-lg-2 col-md-2 col-sm-4 col-xs-12">
                    <div class="tile-stats">
                        <!--#2195c9;-->
                        <div class="icon"><i class="fa fa-area-chart"></i></div>
                        <?php $t_griv = mysqli_query($db_egr, "select * from tbl_grievance");
                        $griv_t = mysqli_num_rows($t_griv);
                        ?>
                        <div class="count para"><?php echo $griv_t; ?></div>
                        <h4>Total Grievances</h4>
                        <!--<p class="para">Lorem ipsum psdea itgum rixt.</p>-->
                    </div>
                </div>
            <?php } ?>
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
                                                $sql = "Select e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id where g.status='1' AND gri_ref_no NOT like 'WEL%' group by g.id ORDER BY g.gri_upload_date DESC ";
                                                $query = mysqli_query($db_egr, $sql);
                                                // echo mysqli_num_rows($query);
                                                if (mysqli_num_rows($query) > 0) {
                                                    while ($rw_data = mysqli_fetch_array($query)) {
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
                                                        echo "<td>
                                                        <div class='btn-group'>
                                                            <a id='" . $rw_data['id'] . "' href='gri_comp_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
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
                                                //     $fetch_name_sql = mysqli_query("select * from tbl_user where user_id='$id'", $db_egr);
                                                //     while ($name_fetch = mysqli_fetch_array($fetch_name_sql)) {
                                                //         $e_type = $name_fetch['user_name'];
                                                //     }
                                                //     return $e_type;
                                                // }
                                                $cnt = 1;
                                                // $sql = "Select  e.emp_id,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id, g.uploaded_by, e.emp_mob from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id where g.status='1' AND gri_ref_no like 'WEL%' ORDER BY g.gri_upload_date DESC";
                                                // $sql = "Select e.empno,e.empname,e.emptype,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id from $db_common_name.prmaemp  e INNER JOIN $db_egr_name.tbl_grievance g ON e.empno=g.emp_id where g.status='1' AND gri_ref_no like 'WEL%' ORDER BY g.gri_upload_date DESC";
                                                $sql = "Select e.emp_no,e.name,e.empType,e.mobile,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,g.uploaded_by from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id where g.status='1' AND gri_ref_no like 'WEL%' group by g.id ORDER BY g.gri_upload_date DESC ";

                                                $query = mysqli_query($db_egr, $sql);
                                                while ($rw_data = mysqli_fetch_array($query)) {
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
                                                    echo "<td><div class='btn-group'>
										<a id='" . $rw_data['id'] . "' href='gri_wel_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'>View</i></a>
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