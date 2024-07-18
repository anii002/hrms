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
                <a href="grievance_list.php">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-bar-chart"></i></div>
                            <?php
                            $total_emp = mysqli_query( $db_egr,"SELECT count(*) as total FROM `tbl_grievance` WHERE uploaded_by='$cur_us'");
                            $emp_total = mysqli_fetch_array($total_emp);
                            $emp_total_count = $emp_total['total'];
                            ?>
                            <div class="count para">
                                <?php echo $emp_total_count; ?></div>
                            <h4>Total Grievance</h4>
                            <!--p class="para">Lorem ipsum psdea itgum rixt.</p-->
                        </div>
                    </div>
                </a>
                <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats" style="background:#d87510;box-shadow:2px 3px 4px 2px gray;border:none">
                        <div class="icon"><i class="fa fa-plus" style="color:orange"></i></div>
                        <?php
                        // $total_new = mysqli_query("SELECT DISTINCT(griv_ref_no) FROM `tbl_grievance_forward` WHERE user_id_forwarded='$cur_us' and status='2' GROUP BY griv_ref_no", $db_egr);
                        // $new_total = mysqli_num_rows($total_new);
                        ?>
                        <div class="count para" style="font-size:24px;margin-left:100px;"><?php /*echo $new_total;*/ ?>
                        </div>
                        <center>
                            <h4 style="color:white;font-size:24px;">New Grievance</h4>
                        </center>
                        p class="para">Lorem ipsum psdea itgum rixt.</p
                    </div>
                </div> -->
                <a href="grievance_list.php">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-repeat"></i></div>
                            <?php
                            // $sql = "Select  e.emp_id,e.emp_name,e.emp_type,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id INNER JOIN tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='3' and f.status='3' and f.section_action IN ('1','2','3') and f.admin_action is null and user_id='$cur_us'";
                            // echo $sql = "Select e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where (g.status='3' or g.status='2') and (f.status='3' or f.status='2') and f.section_action IN ('1','2','3') and f.admin_action is null and user_id='$cur_us' group by g.id order by g.gri_upload_date DESC";
                            $sql = "select * from tbl_grievance where status in (1,2,3) and uploaded_by='$cur_us'";
                            $total_pend = mysqli_query( $db_egr,$sql);
                            $pend_total = mysqli_num_rows($total_pend);
                            ?>
                            <div class="count para"><?php echo $pend_total; ?>
                            </div>
                            <h4>Pending Grievance</h4>
                            <!--p class="para">Lorem ipsum psdea itgum rixt.</p-->
                        </div>
                    </div>
                </a>
                <a href="closed_grievance_list.php">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-times"></i></div>
                            <?php
                            // $sql = "SELECT DISTINCT(user_id_forwarded),griv_ref_no FROM `tbl_grievance_forward` where griv_ref_no IN(SELECT gri_ref_no FROM tbl_grievance WHERE status='4') AND user_id_forwarded<>'1' AND emp_id<>user_id_forwarded AND user_id_forwarded='$cur_us'";
                            $sql = "SELECT id FROM `tbl_grievance` where status='4' and uploaded_by='$cur_us'";
                            $total_closed = mysqli_query( $db_egr,$sql);
                            $closed_total = mysqli_num_rows($total_closed);
                            ?>
                            <div class="count para">
                                <?php echo $closed_total; ?>
                            </div>
                            <h4>Closed</h4>
                            <!--p class="para">Lorem ipsum psdea itgum rixt.</p-->
                        </div>
                    </div>
                </a>
            </div>


            <!--<div class="row">
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

                                        $cnt = 1;
                                        $sql = "Select  e.emp_no,e.name,e.empType,g.gri_ref_no,g.gri_type,g.gri_upload_date,g.id,f.forwarded_date from $db_common_name.register_user e INNER JOIN $db_egr_name.tbl_grievance g ON e.emp_no=g.emp_id INNER JOIN $db_egr_name.tbl_grievance_forward f ON g.gri_ref_no=f.griv_ref_no where g.status='2' and f.user_id_forwarded='$current_id' group by g.id order by g.gri_upload_date DESC";
                                        $query = mysqli_query( $db_egr,$sql);

                                        while ($rw_data = mysqli_fetch_array($query)) {
                                            $emp_id = $rw_data["emp_no"];
                                            $emp_name = $rw_data["name"];
                                            $emp_type = get_type($rw_data["empType"]);
                                            $gri_ref_no = $rw_data["gri_ref_no"];
                                            $gri_type = get_cat_name($rw_data["gri_type"]);
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
                                            echo "<td><div class='btn-group' style='margin-top:-5px;width: 85px;'>
										<a  style='width:34px' id='" . $rw_data['id'] . "' href='gri_comp_detail.php?g_id=" . $rw_data['id'] . "' class='btn_show_center btn1 btn btn-info' value='" . $rw_data['id'] . "'><i class='fa fa-eye' aria-hidden='true'></i></a>
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
            </div>-->
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