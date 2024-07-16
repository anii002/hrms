<?php
$GLOBALS['flag'] = "1.4";
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
                    <form id="frm_add_form">
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
                                <p><?php echo $emp['railway_tele_phone']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <input type="hidden" name="txt_emp_pf" id="txt_emp_pf" value="<?php echo $emp_pf; ?>">
                                <p>Place of work & Office </p>
                            </div>
                            <div class="col-md-2">
                                <p><?php echo $emp['station']; ?> / <?php echo $emp_dept; ?></p>
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
                        $conn = dbcon();
                        // $sql = "SELECT * FROM tbl_form_details,tbl_form_forward WHERE reference_id = '$ref_id'";
                        $sql = "SELECT * FROM tbl_form_details WHERE reference_id = '$ref_id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $rel = get_rel($row['relationship_with_applicant']);
                        $sc_id = $row['scheme_id'];
                        // st
                        $sub_scheme_id = $row['sub_scheme_id'];
                        $sql_scheme = "SELECT id, scheme_name FROM tbl_master_form WHERE id = '$sc_id'";
                        $result_scheme = mysqli_query($conn, $sql_scheme);
                        $row_scheme = mysqli_fetch_assoc($result_scheme);
                        $sql_doc = "SELECT files FROM tbl_doc WHERE reference_id = '$ref_id'";
                        $result_doc = mysqli_query($conn, $sql_doc);


                        ?>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Scheme</label>
                                    <input type="text" class="form-control" value="<?php echo $row_scheme['scheme_name']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Under Scheme</label>
                                    <input type="text" class="form-control" value="<?php echo $sub_scheme_id; ?>" readonly>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <?php if (!empty($row['name_of_child_ward'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name of the Child</label>
                                        <input type="text" class="form-control" value="<?php echo $row['name_of_child_ward']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['boy_girl'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Boy / Girl</label>
                                        <input type="text" class="form-control" value="<?php echo $row['boy_girl']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['cast'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cast</label>
                                        <input type="text" class="form-control" value="<?php echo $row['cast']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['1_or_2_child'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>1st or 2nd Child</label>
                                        <input type="text" class="form-control" value="<?php echo $row['1_or_2_child']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['name_of_institute'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name of Institute/School/College</label>
                                        <input type="text" class="form-control" value="<?php echo $row['name_of_institute']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['name_of_course'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name of the Course</label>
                                        <input type="text" class="form-control" value="<?php echo $row['name_of_course']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['present_year'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Present Year(ie 2018-19) 1st/ 2nd/ 3rd/ 4th</label>
                                        <input type="text" class="form-control" value="<?php echo $row['present_year']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['date_of_admission'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date of admission</label>
                                        <input type="text" class="form-control" value="<?php echo $row['date_of_admission']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['duration_of_course'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Duration of course</label>
                                        <input type="text" class="form-control" value="<?php echo $row['duration_of_course']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['child_resi_rly_hostel'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Whether Child/Ward was Residing Railway Hotel (Compulsory) YES / NO</label>
                                        <input type="text" class="form-control" value="<?php echo $row['child_resi_rly_hostel']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['last_board_exam_attended'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Board Exam Attended</label>
                                        <input type="text" class="form-control" value="<?php echo $row['last_board_exam_attended']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['last_exam_attended_year'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Exam Attended Year</label>
                                        <input type="text" class="form-control" value="<?php echo $row['last_exam_attended_year']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['last_exam_attended_pers'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Exam Attended Percentage</label>
                                        <input type="text" class="form-control" value="<?php echo $row['last_exam_attended_pers']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['relationship_with_applicant'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Relationship with Applicant</label>
                                        <input type="text" class="form-control" value="<?php echo $rel; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['old_case_no'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Old Case No</label>
                                        <input type="text" class="form-control" value="<?php echo $row['old_case_no']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['course_for_which_schol_fa_sanct'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Course for which the Scholarship/FA was Sanctioned</label>
                                        <input type="text" class="form-control" value="<?php echo $row['course_for_which_schol_fa_sanct']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['state_stage_child_failed_atkt'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>State the Stage at which Child/Ward failed or ATKT allowed</label>
                                        <input type="text" class="form-control" value="<?php echo $row['state_stage_child_failed_atkt']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['amt_recv_frm_sbf'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Amount Received from SBF(If so,year of receipt)</label>
                                        <input type="text" class="form-control" value="<?php echo $row['amt_recv_frm_sbf']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['period_for_payment_recv'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Period for which the payment received</label>
                                        <input type="text" class="form-control" value="<?php echo $row['period_for_payment_recv']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['period_for_payment_due'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Period for which the payment due</label>
                                        <input type="text" class="form-control" value="<?php echo $row['period_for_payment_due']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['any_other_bene_sbf_claimed'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Whether in respect of any other similar benefit under SBF has been claimed</label>
                                        <input type="text" class="form-control" value="<?php echo $row['any_other_bene_sbf_claimed']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['sbf_grant_recv_last_year'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Particular of SBF Grant received In last year</label>
                                        <input type="text" class="form-control" value="<?php echo $row['sbf_grant_recv_last_year']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['fresh_appln'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fresh Application Yes / No</label>
                                        <input type="text" class="form-control" value="<?php echo $row['fresh_appln']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['last_appli_year'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last applied in year</label>
                                        <input type="text" class="form-control" value="<?php echo $row['last_appli_year']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['enc_money_rec_no'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>(Enclosed) Money receipt No</label>
                                        <input type="text" class="form-control" value="<?php echo $row['enc_money_rec_no']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['date'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="text" class="form-control" value="<?php echo date('d-m-Y', strtotime($row['date'])); ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['rs'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Rs</label>
                                        <input type="text" class="form-control" value="<?php echo $row['rs']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['nature_of_leave'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nature of leave</label>
                                        <input type="text" class="form-control" value="<?php echo $row['nature_of_leave']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['leave_due_sick_from'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From</label>
                                        <input type="text" class="form-control" value="<?php echo $row['leave_due_sick_from']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['leave_due_sick_to'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To</label>
                                        <input type="text" class="form-control" value="<?php echo $row['leave_due_sick_to']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['with_pay'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>With Pay</label>
                                        <input type="text" class="form-control" value="<?php echo $row['with_pay']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['with_pay_from'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>FROM</label>
                                        <input type="text" class="form-control" value="<?php echo $row['with_pay_from']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['with_pay_to'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>TO</label>
                                        <input type="text" class="form-control" value="<?php echo $row['with_pay_to']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['half_pay'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Half Pay</label>
                                        <input type="text" class="form-control" value="<?php echo $row['half_pay']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['half_pay_from'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>FROM</label>
                                        <input type="text" class="form-control" value="<?php echo $row['half_pay_from']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['half_pay_to'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>TO</label>
                                        <input type="text" class="form-control" value="<?php echo $row['half_pay_to']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['without_pay'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Without Pay</label>
                                        <input type="text" class="form-control" value="<?php echo $row['without_pay']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['without_pay_from'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>FROM</label>
                                        <input type="text" class="form-control" value="<?php echo $row['without_pay_from']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['without_pay_to'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>TO</label>
                                        <input type="text" class="form-control" value="<?php echo $row['without_pay_to']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['m89b_certi_no'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>M8&9B, Certificate No</label>
                                        <input type="text" class="form-control" value="<?php echo $row['m89b_certi_no']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['dated'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Dated</label>
                                        <input type="text" class="form-control" value="<?php echo $row['dated']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['period'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Period</label>
                                        <input type="text" class="form-control" value="<?php echo $row['period']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['resident_addr'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Residential Address</label>
                                        <input type="text" class="form-control" value="<?php echo $row['resident_addr']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['date_of_death'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date of Death</label>
                                        <input type="text" class="form-control" value="<?php echo date('d-m-Y', strtotime($row['date_of_death'])); ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['date_of_birth_stud'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date of birth student</label>
                                        <input type="text" class="form-control" value="<?php echo $row['date_of_birth_stud']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['addr_of_institute'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Address of institute</label>
                                        <input type="text" class="form-control" value="<?php echo $row['addr_of_institute']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['details_of_other_schol_edu_assist_frm_sbf_or_any'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Details of Other the Scholarships and educational Assistance from SBF or any other source</label>
                                        <input type="text" class="form-control" value="<?php echo $row['details_of_other_schol_edu_assist_frm_sbf_or_any']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['rece_finan_aid_frm_othr_src'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Whether in receipt of any Financial Aid from other source Yes/No</label>
                                        <input type="text" class="form-control" value="<?php echo $row['rece_finan_aid_frm_othr_src']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['chld_rece_finan_aid_frm_sbf_par_startng_year'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Whether the child is in receipt of Financial Aid from SBF (So give full particulars stating year of receipt)</label>
                                        <input type="text" class="form-control" value="<?php echo $row['chld_rece_finan_aid_frm_sbf_par_startng_year']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['nature_of_disability'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nature of Disability (Latest certificate from competent authority in original to be attached)</label>
                                        <input type="text" class="form-control" value="<?php echo $row['nature_of_disability']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['name_of_exam_passd'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name of the Exam.Passed</label>
                                        <input type="text" class="form-control" value="<?php echo $row['name_of_exam_passd']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['passed_year'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Year in which passed</label>
                                        <input type="text" class="form-control" value="<?php echo $row['passed_year']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['institution'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Institution</label>
                                        <input type="text" class="form-control" value="<?php echo $row['institution']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['total_marks_fr_exam'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tota marks for the Exam</label>
                                        <input type="text" class="form-control" value="<?php echo $row['total_marks_fr_exam']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['marks_obtained'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Marks Obtained</label>
                                        <input type="text" class="form-control" value="<?php echo $row['marks_obtained']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['percentage'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>%age</label>
                                        <input type="text" class="form-control" value="<?php echo $row['percentage']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (!empty($row['pos_in_class'])) { ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Position in Class</label>
                                        <input type="text" class="form-control" value="<?php echo $row['pos_in_class']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <?php while ($row_doc = mysqli_fetch_assoc($result_doc)) { ?>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="input-group" style="margin-top: 25px;">
                                            <img src="<?php echo 'employee/' . $row_doc['files']; ?>" class="img-fluid" height="100"><br>
                                            <a class="btn btn-circle green" href="<?php echo 'employee/' . $row_doc['files']; ?>">View Document</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <hr>
                        <!-- <div class="form-actions">
                                <a href="forward_form.php?reference_id=<?php echo $ref_id; ?>" class="btn btn-success" >Forword</a>
                                <a href="print.php?scheme_id=<?php echo $row_scheme['id']; ?>" class="btn green">Print Preview</a>
                            </div> -->

                        <div class="form-actions">
                            <?php
                            $sql = mysqli_query($conn, "SELECT status,rejected FROM tbl_form_details WHERE reference_id = '$ref_id'");
                            $sql_row = mysqli_fetch_array($sql);
                            if ($sql_row['status'] == 0 && $sql_row['rejected'] == 0) { ?>
                                <a href="forward_form.php?reference_id=<?php echo $ref_id; ?>&emp_no=<?php echo $emp_pf; ?>" class="btn btn-success">Forword</a>
                            <?php } ?>
                            <a href="print.php?scheme_id=<?php echo $row_scheme['id']; ?>" class="btn green">Print Preview</a>
                        </div>

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