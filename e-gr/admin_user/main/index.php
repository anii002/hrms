<?php
require_once('Global_Data/header.php');
error_reporting(0);
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <div class="right_col" role="main">
        <div class="">
            <?php
            $cur_us = $_SESSION['SESSION_ID'];
            ?>
            <div class="row top_tiles">

                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <?php
                        $total_emp = mysqli_query($db_egr,"SELECT DISTINCT(griv_ref_no) FROM `tbl_grievance_forward` WHERE user_id='$cur_us' GROUP BY griv_ref_no");
                        $emp_total = mysqli_num_rows($total_emp);
                        ?>
                        <div class="count para">
                            <?php echo $emp_total; ?>
                        </div>
                        <h4>Total Grievance</h4>
                        <!--<p class="para">Total Grievance</p>-->
                    </div>
                </div>
                <a href="new_grievance.php">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-plus"></i></div>
                            <?php
                            // echo $sql = "SELECT DISTINCT(griv_ref_no) FROM `tbl_grievance_forward` WHERE user_id_forwarded='$cur_us' and status='2' GROUP BY griv_ref_no";
                            $sql = "Select g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from tbl_grievance g INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='2' and f.status='2' and f.user_id_forwarded='$cur_us'  and f.griv_ref_no not like 'WEL%' group by g.id order by g.gri_upload_date DESC";
                            // AND g.gri_ref_no NOT LIKE 'WEL%'
                            $total_new = mysqli_query($db_egr,$sql);
                            $new_total = mysqli_num_rows($total_new);

                            ?>
                            <div class="count para"><?php echo $new_total; ?>
                            </div>
                            <h4>New Grievance</h4>
                            <!--p class="para">Lorem ipsum psdea itgum rixt.</p-->
                        </div>
                    </div>
                </a>
                <a href="griv_pending.php">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-repeat"></i></div>
                            <?php
                            $sql = "Select e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='3' and f.status='3' and f.section_action IN ('1','2','3') and f.admin_action is null and user_id='$cur_us' group by g.id order by g.gri_upload_date DESC";
                            $total_pend = mysqli_query($db_egr,$sql);
                            $pend_total = mysqli_num_rows($total_pend);
                            ?>
                            <div class="count para"><?php echo $pend_total; ?>
                            </div>
                            <h4>Pending Grievance</h4>
                            <!--p class="para">Lorem ipsum psdea itgum rixt.</p-->
                        </div>
                    </div>
                </a>
                <a href="griv_closed.php">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-times"></i></div>
                            <?php
                            $total_closed = mysqli_query($db_egr,"SELECT DISTINCT(user_id_forwarded),griv_ref_no FROM `tbl_grievance_forward` where griv_ref_no IN(SELECT gri_ref_no FROM tbl_grievance WHERE status='4') AND user_id_forwarded<>'1' AND emp_id<>user_id_forwarded AND user_id_forwarded='$cur_us'");
                            $closed_total = mysqli_num_rows($total_closed);
                            ?>
                            <div class="count para">
                                <?php echo $closed_total; ?>
                            </div>
                            <h4>Closed</h4>
                            <!--p class="para">Lorem ipsum psdea itgum rixt.</p-->
                        </div>
                    </div>
            </div>
            </a>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div>
                            <h2>Complaints <small>List</small></h2>
                            <hr>
                            <div class="x_content">
                                <table class="table table-striped table-bordered display" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Emp No</th>
                                            <th>Emp Name</th>
                                            <th>Emp Type</th>
                                            <th>Griv.Ref. No.</th>
                                            <th>Griv. Type</th>
                                            <th>Lodge Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        function get_Cat($type)
                                        {
                                            global $db_egr;
                                            $fetch_cat = mysqli_query($db_egr,"select cat_name from category where cat_id='" . $type . "'");
                                            while ($cat_get = mysqli_fetch_assoc($fetch_cat)) {
                                                $cat_names = $cat_get['cat_name'];
                                            }
                                            return ($cat_names);
                                        }
                                        $current_id = $_SESSION['SESSION_ID'];
                                        function get_type($emp_type)
                                        {
                                            global $db_egr;
                                            $fetch_cat = mysqli_query($db_egr,"select * from emp_type where id='$emp_type'");
                                            while ($cat_fetch = mysqli_fetch_array($fetch_cat)) {
                                                $e_type = $cat_fetch['type'];
                                            }
                                            return $e_type;
                                        }
                                        $cnt = 1;
                                        // $sql="Select  e.emp_id,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='2' and f.user_id_forwarded='$current_id' AND g.gri_ref_no NOT LIKE 'WEL%' limit 1";
                                        $sql = "Select  e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='2' and f.user_id_forwarded='$current_id' AND g.gri_ref_no NOT LIKE 'WEL%' group by g.id order by g.gri_upload_date DESC limit 1";
                                        $query = mysqli_query($db_egr,$sql);

                                        while ($rw_data = mysqli_fetch_array($query)) {
                                            $emp_id = $rw_data["emp_no"];
                                            $emp_name = $rw_data["name"];
                                            $emp_type = get_type($rw_data["empType"]);
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
                                            echo "<td><div class='btn-group'>
    										<a id='" . $rw_data['id'] . "' href='gri_comp_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
    										</div>
										</td>";
                                            echo "</tr>";
                                            $cnt++;
                                        }
                                        ?>

                                    </tbody>
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
                                            <th>Uploaded By</th>
                                            <th>Pending With</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        function get_uploaded_user($id)
                                        {
                                            global $db_egr;
                                            $e_type = '';
                                            $fetch_name_sql = mysqli_query($db_egr,"select * from tbl_user where user_id='$id'");
                                            while ($name_fetch = mysqli_fetch_array($fetch_name_sql)) {
                                                $e_type = $name_fetch['user_name'];
                                            }
                                            return $e_type;
                                        }
                                        $cnt = 1;
                                        // $sql = "Select f.user_id_forwarded, e.emp_id,e.emp_name,e.emp_mob,e.emp_type,g.gri_ref_no,g.gri_type, g.uploaded_by, g.gri_upload_date,g.id,f.forwarded_date from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='2' and f.user_id_forwarded='$current_id' AND g.gri_ref_no LIKE 'WEL%'";
                                        $sql = "Select f.user_id_forwarded, e.emp_no,e.name,e.mobile,e.empType,g.gri_ref_no,g.gri_type, g.uploaded_by, g.gri_upload_date,g.id,f.forwarded_date from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='2' and f.user_id_forwarded='$current_id' AND g.gri_ref_no LIKE 'WEL%' group by g.id order by g.gri_upload_date DESC limit 1";
                                        $query = mysqli_query($db_egr,$sql);
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
                                            echo "<td>" . get_uploaded_user($rw_data['user_id_forwarded']) . "</td>";
                                            echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
										<a  style='width:34px' id='" . $rw_data['id'] . "' href='gri_compwel_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
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
        </div>
    </div>
</head>
<style>
    .para {
        color: white;
    }
</style>

</html>
<?php
require_once('Global_Data/footer.php');
?>