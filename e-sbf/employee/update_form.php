<?php
$GLOBALS['flag'] = "0";
include_once('common/header.php');
include_once('common/sidebar.php');
include_once('control/function.php');
?>
<link rel="stylesheet" href="../common_print_files/modal.css">
<?php
$ref_id = $_GET['ref'];
$emp_pf = $_SESSION["username"];
$emp = get_emp_info($emp_pf);
$emp_desig = designation($emp['designation']);
$emp_dept = department($emp['department']);
$conn = dbcon();
$form_qry = mysqli_query($conn, "SELECT pay_band,macp_grade_pay FROM tbl_form_details WHERE reference_id = '" . $ref_id . "'");
$form_row = mysqli_fetch_array($form_qry);
?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#.">View Form</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <form id="frm_add_form" method="POST" action="control/adminProcess.php?action=updateData" enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="refernce_id" value="<?php echo $ref_id; ?>">
                        <div class="caption">
                            <i class="fa fa-book"></i> View Form
                        </div>
                </div>
                <div class="portlet-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="hidden" name="txt_emp_pf" id="txt_emp_pf" value="<?php echo $emp_pf; ?>">
                                <p>Employee Name</p>
                            </div>
                            <div class="col-md-2">
                                <p><?php echo $emp['name']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <p>Employee Designation</p>
                            </div>
                            <div class="col-md-2">
                                <p><?php echo $emp_desig; ?></p>
                            </div>
                            <div class="col-md-2">
                                <p>Railway Telephone No.</p>
                            </div>
                            <div class="col-md-2">
                                <p><?php //echo $emp_desig; 
                                    ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <input type="hidden" name="txt_emp_pf" id="txt_emp_pf" value="<?php echo $emp_pf; ?>">
                                <p>Place of work & Office </p>
                            </div>
                            <div class="col-md-2">
                                <p><?php //echo $emp['name']; 
                                    ?></p>
                            </div>
                            <div class="col-md-2">
                                <p>Bill Unit No. </p>
                            </div>
                            <div class="col-md-2">
                                <p><?php echo $emp['bill_unit']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <p>Mobile No.</p>
                            </div>
                            <div class="col-md-2">
                                <p><?php echo $emp['mobile']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <input type="hidden" name="txt_emp_pf" id="txt_emp_pf" value="<?php echo $emp_pf; ?>">
                                <p>Staff No.</p>
                            </div>
                            <div class="col-md-2">
                                <p><?php echo $emp['emp_no']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <p>Date of Appointment</p>
                            </div>
                            <div class="col-md-2">
                                <p><?php echo $emp['doa']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <p>Pay Band</p>
                            </div>
                            <div class="col-md-2">
                                <p><?php echo $form_row['pay_band']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <input type="hidden" name="txt_emp_pf" id="txt_emp_pf" value="<?php echo $emp_pf; ?>">
                                <p>Basic</p>
                            </div>
                            <div class="col-md-2">
                                <p><?php echo $emp['basic_pay']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <p>Grade Pay/Pay Level</p>
                            </div>
                            <div class="col-md-2">
                                <p><?php echo $emp['7th_pay_level']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <p>MACP Grade Pay</p>
                            </div>
                            <div class="col-md-2">
                                <p><?php echo $form_row['macp_grade_pay']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <?php
                       $conn= dbcon();
                        $sql = "SELECT * FROM tbl_form_details WHERE reference_id = '$ref_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                        $sc_id = $row['scheme_id'];
                        $sql_scheme = "SELECT id, scheme_name FROM tbl_master_form WHERE id = '$sc_id'";
                        $result_scheme = mysqli_query($conn,$sql_scheme);
                        $row_scheme = mysqli_fetch_assoc($result_scheme);

                        ?>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Scheme</label>
                                    <input type="text" class="form-control" value="<?php echo $row_scheme['scheme_name']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Under Scheme</label>
                                    <input type="text" class="form-control" value="<?php echo $row['sub_scheme_id']; ?>" readonly>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <?php if (!empty($row['name_of_child_ward'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name of the Child</label>
                                        <input type="text" class="form-control" value="<?php echo $row['name_of_child_ward']; ?>" name="name_of_child">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['boy_girl'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Boy / Girl</label>
                                        <input type="text" class="form-control" value="<?php echo $row['boy_girl']; ?>" name="boy_girl">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['cast'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cast</label>
                                        UR : <input type="radio" name="cast" value="UR" <?php if ($row['cast'] == 'UR') { ?> checked <?php } ?> />
                                        SC : <input type="radio" name="cast" value="SC" <?php if ($row['cast'] == 'SC') { ?> checked <?php } ?> />
                                        ST : <input type="radio" name="cast" value="ST" <?php if ($row['cast'] == 'ST') { ?> checked <?php } ?> />
                                        OBC : <input type="radio" name="cast" value="OBC" <?php if ($row['cast'] == 'OBC') { ?> checked <?php } ?> />
                                        <!-- <input type="text" class="form-control" value="<?php //echo $row['cast']; 
                                                                                            ?>" name="cast"> -->
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['1_or_2_child'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>1st or 2nd Child</label>
                                        1st : <input type="radio" name="nth_child" value="1" <?php if ($row['1_or_2_child'] == '1') { ?> checked <?php } ?> />
                                        2nd : <input type="radio" name="nth_child" value="2" <?php if ($row['1_or_2_child'] == '2') { ?> checked <?php } ?> />
                                        <!-- <input type="text" class="form-control" value="" name="nth_child"> -->
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['name_of_institute'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name of Institute/School/College</label>
                                        <input type="text" class="form-control" value="<?php echo $row['name_of_institute']; ?>" name="name_of_institute">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['name_of_course'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name of the Course</label>
                                        <input type="text" class="form-control" value="<?php echo $row['name_of_course']; ?>" name="name_of_course">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['present_year'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Present Year</label>
                                        1st : <input type="radio" name="present_year" value="1" <?php if ($row['present_year'] == '1') { ?> checked <?php } ?> />
                                        2nd : <input type="radio" name="present_year" value="2" <?php if ($row['present_year'] == '2') { ?> checked <?php } ?> />
                                        3rd : <input type="radio" name="present_year" value="3" <?php if ($row['present_year'] == '3') { ?> checked <?php } ?> />
                                        4th : <input type="radio" name="present_year" value="4" <?php if ($row['present_year'] == '4') { ?> checked <?php } ?> />
                                        <!-- <input type="text" class="form-control" value="" name="present_year"> -->
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['date_of_admission'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date of admission</label>
                                        <input type="date" class="form-control" value="<?php echo $row['date_of_admission']; ?>" name="date_of_admission">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['duration_of_course'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Duration of course</label>
                                        <input type="text" class="form-control" value="<?php echo $row['duration_of_course']; ?>" name="duration_of_course">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['child_resi_rly_hostel'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Whether Child/Ward was Residing Railway Hotel (Compulsory) YES / NO</label>
                                        <input type="text" class="form-control" value="<?php echo $row['child_resi_rly_hostel']; ?>" name="child_resi_rly_hostel">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['last_board_exam_attended'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Board Exam Attended</label>
                                        <input type="text" class="form-control" value="<?php echo $row['last_board_exam_attended']; ?>" name="last_board_exam_attended">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['last_exam_attended_year'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Exam Attended Year</label>
                                        <input type="text" class="form-control" value="<?php echo $row['last_exam_attended_year']; ?>" name="last_board_exam_attended_year">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['last_exam_attended_pers'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Exam Attended Percentage</label>
                                        <input type="text" class="form-control" value="<?php echo $row['last_exam_attended_pers']; ?>" name="last_board_exam_attended_pers">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php
                            if (!empty($row['relationship_with_applicant'])) {
                                $rel = get_rel1($row['relationship_with_applicant']);
                            ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Relationship with Applicant</label>
                                        <select name="relationship_with_applicant" id="" class="form-control" style="" required>
                                            <option value="<?php echo $rel['id']; ?>" selected disabled><?php echo $rel['shortdesc']; ?></option>
                                            <?php
                                            $conn=dbcon();
                                            $query = mysqli_query($conn,"SELECT id,shortdesc FROM unique_relation");
                                            while ($row1 = mysqli_fetch_array($query)) { ?>
                                                <option value="<?php echo $row1['id']; ?>"> <?php echo $row1['shortdesc']; ?></option>
                                            <?php  }
                                            ?>
                                        </select>
                                        <!-- <input type="text" class="form-control" value="<?php //echo $rel; 
                                                                                            ?>" name="relationship_with_applicant"> -->
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['old_case_no'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Old Case No</label>
                                        <input type="text" class="form-control" value="<?php echo $row['old_case_no']; ?>" name="old_case_no">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['course_for_which_schol_fa_sanct'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Course for which the Scholarship/FA was Sanctioned</label>
                                        <input type="text" class="form-control" value="<?php echo $row['course_for_which_schol_fa_sanct']; ?>" name="course_for_which_schol_fa_sanct">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['state_stage_child_failed_atkt'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>State the Stage at which Child/Ward failed or ATKT allowed</label>
                                        <input type="text" class="form-control" value="<?php echo $row['state_stage_child_failed_atkt']; ?>" name="state_stage_child_failed_atkt">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['amt_recv_frm_sbf'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount Received from SBF(If so,year of receipt)</label>
                                        <input type="text" class="form-control" value="<?php echo $row['amt_recv_frm_sbf']; ?>" name="amt_recv_frm_sbf">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['period_for_payment_recv'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Period for which the payment received</label>
                                        <input type="text" class="form-control" value="<?php echo $row['period_for_payment_recv']; ?>" name="period_for_payment_recv">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['period_for_payment_due'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Period for which the payment due</label>
                                        <input type="text" class="form-control" value="<?php echo $row['period_for_payment_due']; ?>" name="period_for_payment_due">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['any_other_bene_sbf_claimed'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Whether in respect of any other similar benefit under SBF has been claimed</label>
                                        <input type="text" class="form-control" value="<?php echo $row['any_other_bene_sbf_claimed']; ?>" name="any_other_bene_sbf_claimed">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['sbf_grant_recv_last_year'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Particular of SBF Grant received In last year</label>
                                        <input type="text" class="form-control" value="<?php echo $row['sbf_grant_recv_last_year']; ?>" name="sbf_grant_recv_last_year">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['fresh_appln'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fresh Application Yes / No</label>
                                        <input type="text" class="form-control" value="<?php echo $row['fresh_appln']; ?>" name="fresh_appln">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['last_appli_year'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last applied in year</label>
                                        <input type="text" class="form-control" value="<?php echo $row['last_appli_year']; ?>" name="last_appli_year">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['enc_money_rec_no'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>(Enclosed) Money receipt No</label>
                                        <input type="text" class="form-control" value="<?php echo $row['enc_money_rec_no']; ?>" name="enc_money_rec_no">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['date'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="text" class="form-control" value="<?php echo $row['date']; ?>" name="date">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['rs'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Rs</label>
                                        <input type="text" class="form-control" value="<?php echo $row['rs']; ?>" name="rs">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['nature_of_leave'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nature Of Leave</label>
                                        <input type="text" class="form-control" value="<?php echo $row['nature_of_leave']; ?>" name="nature_of_leave">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['leave_due_sick_from'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>FROM</label>
                                        <input type="text" class="form-control" value="<?php echo $row['leave_due_sick_from']; ?>" name="leave_due_sick_from">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['leave_due_sick_to'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>TO
                                        </label>
                                        <input type="text" class="form-control" value="<?php echo $row['leave_due_sick_to']; ?>" name="leave_due_sick_to">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['with_pay'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>With Pay</label>
                                        <input type="text" class="form-control" value="<?php echo $row['with_pay']; ?>" name="with_pay">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['with_pay_from'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>With Pay From</label>
                                        <input type="text" class="form-control" value="<?php echo $row['with_pay_from']; ?>" name="with_pay_from">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['with_pay_to'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>With Pay To</label>
                                        <input type="text" class="form-control" value="<?php echo $row['with_pay_to']; ?>" name="with_pay_to">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['half_pay'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Half Pay</label>
                                        <input type="text" class="form-control" value="<?php echo $row['half_pay']; ?>" name="half_pay">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['half_pay_from'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Half Pay From</label>
                                        <input type="text" class="form-control" value="<?php echo $row['half_pay_from']; ?>" name="half_pay_from">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['half_pay_to'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Half Pay To</label>
                                        <input type="text" class="form-control" value="<?php echo $row['half_pay_to']; ?>" name="half_pay_to">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['without_pay'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Without Pay</label>
                                        <input type="text" class="form-control" value="<?php echo $row['without_pay']; ?>" name="without_pay">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['without_pay_from'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Without Pay From</label>
                                        <input type="text" class="form-control" value="<?php echo $row['without_pay_from']; ?>" name="without_pay_from">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['without_pay_to'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Without Pay TO</label>
                                        <input type="text" class="form-control" value="<?php echo $row['without_pay_to']; ?>" name="without_pay_to">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['m89b_certi_no'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>M8&9B, Certificate No</label>
                                        <input type="text" class="form-control" value="<?php echo $row['m89b_certi_no']; ?>" name="m89b_certi_no">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['dated'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Dated</label>
                                        <input type="text" class="form-control" value="<?php echo $row['dated']; ?>" name="dated">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['period'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Period</label>
                                        <input type="text" class="form-control" value="<?php echo $row['period']; ?>" name="period">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['resident_addr'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Residential Address</label>
                                        <input type="text" class="form-control" value="<?php echo $row['resident_addr']; ?>" name="resident_addr">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['date_of_death'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date of Death</label>
                                        <input type="text" class="form-control" value="<?php echo $row['date_of_death']; ?>" name="date_of_death">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['date_of_birth_stud'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date of birth student</label>
                                        <input type="text" class="form-control" value="<?php echo $row['date_of_birth_stud']; ?>" name="date_of_birth_stud">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['addr_of_institute'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Address of institute</label>
                                        <input type="text" class="form-control" value="<?php echo $row['addr_of_institute']; ?>" name="addr_of_institute">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['details_of_other_schol_edu_assist_frm_sbf_or_any'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Details of Other the Scholarships and educational Assistance from SBF or any other source</label>
                                        <input type="text" class="form-control" value="<?php echo $row['details_of_other_schol_edu_assist_frm_sbf_or_any']; ?>" name="details_of_other_school_edu_assist_frm_sbf_or_any">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['rece_finan_aid_frm_othr_src'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Whether in receipt of any Financial Aid from other source Yes/No</label>
                                        <input type="text" class="form-control" value="<?php echo $row['rece_finan_aid_frm_othr_src']; ?>" name="recv_finan_aid_frm_othr_src">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['chld_rece_finan_aid_frm_sbf_par_startng_year'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Whether the child is in receipt of Financial Aid from SBF (So give full particulars stating year of receipt)</label>
                                        <input type="text" class="form-control" value="<?php echo $row['chld_rece_finan_aid_frm_sbf_par_startng_year']; ?>" name="chld_rece_finan_aid_frm_sbf_par_starting_year">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['nature_of_disability'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nature of Disability (Latest certificate from competent authority in original to be attached)</label>
                                        <input type="text" class="form-control" value="<?php echo $row['nature_of_disability']; ?>" name="nature_of_disability">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['name_of_exam_passd'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name of the Exam.Passed</label>
                                        <input type="text" class="form-control" value="<?php echo $row['name_of_exam_passd']; ?>" name="name_of_exam_passd">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['passed_year'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Year in which passed</label>
                                        <input type="text" class="form-control" value="<?php echo $row['passed_year']; ?>" name="passed_year">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['institution'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Institution</label>
                                        <input type="text" class="form-control" value="<?php echo $row['institution']; ?>" name="institution">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['total_marks_fr_exam'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tota marks for the Exam</label>
                                        <input type="text" class="form-control" value="<?php echo $row['total_marks_fr_exam']; ?>" name="total_marks_fr_exam">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['marks_obtained'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Marks Obtained</label>
                                        <input type="text" class="form-control" value="<?php echo $row['marks_obtained']; ?>" name="marks_obtained">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['percentage'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>%age</label>
                                        <input type="text" class="form-control" value="<?php echo $row['percentage']; ?>" name="percentage">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['pos_in_class'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Position in Class</label>
                                        <input type="text" class="form-control" value="<?php echo $row['pos_in_class']; ?>" name="pos_in_class">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="form-group">
                                    <input type="hidden" name="scheme_id" value="<?php echo $row_scheme['id']; ?>">
                                    <label>Upload Document</label>
                                    <input type="file" name="image[]" class="form-control-file imagepdf" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?php
                                $sql_doc = "SELECT id,files FROM tbl_doc WHERE reference_id = '$ref_id'";
                                $result_doc = mysqli_query($conn,$sql_doc);
                                while ($row_doc = mysqli_fetch_assoc($result_doc)) { ?>
                                    <img src="<?php echo 'employee/' . $row_doc['files']; ?>" height="100"><br>
                                    <a href="delete_image.php?id=<?php echo $row_doc['id']; ?>" class="btn btn-danger">Remove</a><br>
                                <?php    }
                                ?>
                            </div>
                        </div>
                        <hr>



                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-success">
                    </div>
                </div>

                </form>
            </div>
        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
    </div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php
include_once('common/footer.php');
?>
<div id="mdlPreview" class="modal modal-width fade modal-scroll mldPreview" data-replace="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="frm_Preview" method="POST">
        <div class="modal-header btn-orange-moon">
            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            <h4 class="modal-title" style="text-align:center">Form Preview</h4>
        </div>
        <div class="modal-body">
            <div class="modalfull" id="mdlbody">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
            </div>
        </div>
    </form>
</div>
</div>
<script>
    $(".imagepdf").on("change", function() {
        var ext = $(this).val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['png', 'jpg', 'jpeg', 'pdf']) == -1) {
            alert('Invalid file type!');
            $(this).val("");
        }
    });
</script>