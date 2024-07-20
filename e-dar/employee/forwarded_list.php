<?php
$GLOBALS['flag'] = "1.5";
include_once('../common_files/header.php');
// include_once('../common_files/sidebar.php');
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- 
			<h3 class="page-title">
			Dashboard / डॅशबोर्ड<small>reports & statistics</small>
			</h3> -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Forwarded List</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Forwarded List
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-bordered table-stripped table-responsive" id="example1">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Employee Name</th>
                                <th>To </th>
                                <th>View Form</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            //echo "SELECT tbl_form_forward.id,tbl_form_forward.form_reference_id,tbl_form_forward.emp_pf,tbl_form_forward.approved_date,tbl_form_forward.fw_from,fw_to,form_id from tbl_form_forward where tbl_form_forward.status='3' and  tbl_form_forward.current_role='3' and ack_id is NULL  and fw_to='".$_SESSION['emp_id']."' and form_reference_id in(SELECT form_ref_id from  tbl_form_master_entry where emp_pf='".$_SESSION['emp_id']."' and current_status='3' ) order by form_reference_id desc";

                            $sql = mysqli_query($db_edar,"SELECT tbl_form_forward.id,tbl_form_forward.form_reference_id,tbl_form_forward.emp_pf,tbl_form_forward.approved_date,tbl_form_forward.fw_from,fw_to,form_id from tbl_form_forward where tbl_form_forward.status='5' and  tbl_form_forward.current_role='7' and fw_from='" . $_SESSION['emp_id'] . "' and form_reference_id in(SELECT form_ref_id from  tbl_form_master_entry where emp_pf='" . $_SESSION['emp_id'] . "' and current_status in(5,7,8,10,11)) order by form_reference_id desc");

                            $sr = 0;
                            while ($row = mysqli_fetch_array($sql)) {

                                $fw_date = $row['approved_date'];

                                $current_date = date_create(date('d-m-Y'));
                                $start_date = date('Y-m-d', strtotime($fw_date));
                                $enddate = date_create(date('d-m-Y', strtotime('+10 days', strtotime($fw_date))));
                                $interval = date_diff($current_date, $enddate);



                                $sr++;
                                echo "<tr>";
                                echo "<td>" . $sr . "</td>";
                                echo "<td>" . get_emp_name($row['emp_pf']) . "</td>";

                                echo "<td>" . get_emp_name_from_id($row['fw_to']) . " (" . get_emp_desig_from_id($row['fw_to']) . ")</td>";

                                echo "<td><a href='view.php?emp_pf=" . $row['emp_pf'] . "&reference_id=" . $row['form_reference_id'] . "&type_id=1' class='btn btn-info' >View</a></td>";

                                echo "</tr>";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
    </div>
</div>

<?php
include_once('../common_files/footer.php');
?>