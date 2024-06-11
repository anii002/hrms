<?php
include("../dbconfig/dbcon.php");
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		 $id = $_POST['id'];
// 		 $payband = $_POST['payband'];
// 		 $macp = $_POST['macp'];

		// exit();

		if($id == 3)
{ ?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data" id="case3">
		<input type="hidden" name="scheme_id" value="3">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">OLD CASE NO(as sanctioned for earlier)(mandatory *)</label>
		  		<input type="text" name="old_case_no" id="old_case_no" class="form-control" autocomplete="off" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Name of the Child:</label>
				<input type="text" name="name_of_child" class="form-control" autocomplete="off" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-check">
				<label class="form-check-label">CAST: </label>
				<input type="radio" name="cast" value="UR" class="form-check-input">UR
				<input type="radio" name="cast" value="SC" class="form-check-input">SC
				<input type="radio" name="cast" value="ST" class="form-check-input">ST
				<input type="radio" name="cast" value="OBC" class="form-check-input">OBC
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-check">
				<label class="form-check-label">1st or 2nd Child: </label>
				<input type="radio" name="nth_child" value="1" class="form-check-input">1st
				<input type="radio" name="nth_child" value="2" class="form-check-input">2nd
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Relationship with applicant:</label>
				<select name="relationship_with_applicant" id="" class="form-control" style="" required>
					<option value="0" selected disabled>Select Relationship</option>
					<?php
					dbcon();
					$query = mysql_query("SELECT id,shortdesc FROM unique_relation");
					while($row = mysql_fetch_array($query))
					{
					echo "<option value='".$row['id']."'>".$row['shortdesc']."</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Name of Institute/School/College:</label>
				<input type="text" name="name_of_institute" class="form-control" autocomplete="off" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Name of the Course:</label>
				<input type="text" name="name_of_course" class="form-control" autocomplete="off" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-check">
				<label class="form-check-label">Present Year</label>
				<input type="radio" name="present_year" value="1" class="form-check-input">1st
				<input type="radio" name="present_year" value="2" class="form-check-input">2nd
				<input type="radio" name="present_year" value="3" class="form-check-input">3rd
				<input type="radio" name="present_year" value="4" class="form-check-input">4th
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Date of Admission:</label>
				<input type="date" name="date_of_admission" class="form-control datepicker" autocomplete="off" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Duration of the Course:</label>
				<input type="text" name="duration_of_course" class="form-control" autocomplete="off" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Whether in respect of any other similar benefit under SBF
				has been claimed.</label>
				<input type="text" name="any_other_bene_sbf_claimed" class="form-control" autocomplete="off" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Particular of SBF Grant received in last year.</label>
				<input type="text" name="sbf_grant_recv_last_year" class="form-control" autocomplete="off" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Whether Child/Ward was Residing Railway Hostel(Compulsory)Yes/NO:</label>
				<input type="text" name="child_resi_rly_hostel" class="form-control" autocomplete="off" required="">
			</div>
		</div>
		<div class="form-actions" id="flupload">
			<div class="form-group">
				<label class="control-label">Attach Document(Current Academic Year Bonafide Certificate,Last Year All Semester Marksheet)</label>
				<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
				<span style="color: #FF0000;" id="file_error"></span>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
	</form>
</div>
<?php
	}
	if($id == 1)
{ ?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data">
		<input type="hidden" name="scheme_id" value="1">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		 <div class="col-md-4">
			<div class="form-group">
				<label class="form-label">Select Scheme</label>
				<select name="sub_scheme_id" id="" class="form-control" style="" required>
					<option value="0" selected>Select Scheme</option>
					<option value="Fresh">Fresh</option>
					<option value="Continuation">Continuation</option>
					<option value="Girl Child">Girl Child</option>
					<option value="Male Child">Male Child</option>
				</select>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-label">Name of the Child/Ward:</label>
				<input type="text" name="name_of_child" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-check">
				<label class="form-check-label">CAST: </label>
				<input type="radio" name="cast" value="UR" class="form-check-input">UR
				<input type="radio" name="cast" value="SC" class="form-check-input">SC
				<input type="radio" name="cast" value="ST" class="form-check-input">ST
				<input type="radio" name="cast" value="OBC" class="form-check-input">OBC
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-check">
				<label class="form-check-label">1st or 2nd Child: </label>
				<input type="radio" name="nth_child" value="1" class="form-check-input">1st
				<input type="radio" name="nth_child" value="2" class="form-check-input">2nd
			</div>
		</div>

		<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">BOY/GIRL</label>
					<input type="text" class="form-control" name="boy_girl" required="" autocomplete="off">
				</div>
			</div>

		<div class="col-md-4">
			<div class="form-group">
				<label class="form-label">Relationship with applicant:</label>
				<select name="relationship_with_applicant" id="" class="form-control" style="" required>
					<option value="0" selected disabled>Select Relationship</option>
					<?php
					dbcon();
					$query = mysql_query("SELECT id,shortdesc FROM unique_relation");
					while($row = mysql_fetch_array($query))
					{
					echo "<option value='".$row['id']."'>".$row['shortdesc']."</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-label">Name of Institute/School/College:</label>
				<input type="text" name="name_of_institute" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-label">Name of the Course:</label>
				<input type="text" name="name_of_course" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-check">
				<label class="form-check-label">Present Year</label>
				<input type="radio" name="present_year" value="1" class="form-check-input">1st
				<input type="radio" name="present_year" value="2" class="form-check-input">2nd
				<input type="radio" name="present_year" value="3" class="form-check-input">3rd
				<input type="radio" name="present_year" value="4" class="form-check-input">4th
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-label">Date of Admission:</label>
				<input type="date" name="date_of_admission" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-label">Duration of the Course:</label>
				<input type="text" name="duration_of_course" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-label">Whether Child/Ward was Residing Railway Hostel(Compulsory)Yes/NO:</label>
				<input type="text" name="child_resi_rly_hostel" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-label">State the last Board Exam.</label>
				<input type="text" name="last_board_exam_attended" class="form-control" placeholder="HSC/SSC" required="" autocomplete="off">
				<input type="text" name="last_board_exam_attended_year" class="form-control" placeholder="Year" required="" autocomplete="off">
				<input type="text" name="last_board_exam_attended_pers" class="form-control" placeholder="Percentage" required="" autocomplete="off">
			</div>
		</div>
		<div class="form-actions" id="flupload">
			<div class="form-group">
				<label class="control-label">Attach Document(Current Academic Year Bonafide Certificate,Last Year All Semester Marksheet)</label>
				<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
				<span style="color: #FF0000;" id="file_error"></span>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
	</form>
</div>
<?php }
		if($id == 2)
{ ?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data" id="case12">
		<input type="hidden" name="scheme_id" value="2">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		<div class="row">
		    <div class="col-md-4">
			<div class="form-group">
				<label class="form-label">Select Scheme</label>
				<select name="sub_scheme_id" id="" class="form-control" style="" required>
					<option value="0" selected>Select Scheme</option>
					<option value="SSC">SSC</option>
					<option value="HSC">HSC</option>
					<option value="Graduate">Graduate</option>
					<option value="Post Graduate">Post Graduate</option>
				</select>
			</div>
		</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Name of the Student:</label>
					<input type="text" name="name_of_child" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-check">
					<label class="form-check-label">Date of Birth of the Student:</label>
					<input type="date" name="date_of_birth_stud" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Relationship with applicant:</label>
					<select name="relationship_with_applicant" id="" class="form-control" style="" required>
						<option value="0" selected disabled>Select Relationship</option>
						<?php
						dbcon();
						$query = mysql_query("SELECT id,shortdesc FROM unique_relation");
						while($row = mysql_fetch_array($query))
						{
						echo "<option value='".$row['id']."'>".$row['shortdesc']."</option>";
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Name and Address of the Institution of which Studying:</label>
					<input type="text" name="name_of_institute" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Particular of Class/Course Studing:</label>
					<input type="text" name="name_of_course" class="form-control" autocomplete="off" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Duration of the Course:</label>
					<input type="text" name="duration_of_course" class="form-control" autocomplete="off" required="">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Scholastic record of the Student (to be supported by copies of certificate/mark sheet duly verified by Principal of School/College)</label>
					<input type="text" name="name_of_exam_passd" class="form-control" placeholder="Name of the Exam.Passed" autocomplete="off" required="">
					<input type="text" name="passed_year" class="form-control" placeholder="Year in which passed" autocomplete="off" required="">
					<input type="text" name="institution" class="form-control" placeholder="Institution" autocomplete="off" required="">
					<input type="text" name="total_marks_fr_exam" class="form-control" placeholder="Total marks for the exam" autocomplete="off" required="" id="tot_mrks">
					<input type="text" name="marks_obtained" class="form-control" placeholder="marks Obtained" autocomplete="off" required="" id="mrks_obt">
					<input type="text" name="percentage" class="form-control" placeholder="Percentage%" autocomplete="off" required="" id="per_mrks" readonly>
					<input type="text" name="pos_in_class" class="form-control" placeholder="Position in Class" autocomplete="off" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Details of Other the Scholarship and educational Assistance from SBF or any other sources:</label>
					<input type="text" name="details_of_other_schol_edu_assist_frm_sbf_or_any" class="form-control" autocomplete="off" required="">
				</div>
			</div>
			<div class="form-actions col-md-4" id="flupload">
				<div class="form-group">
					<label class="control-label">Attach Document(SSC Marksheet, Copy of Payslip)</label>
					<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
					<span style="color: #FF0000;" id="file_error"></span>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
	</form>
</div>
<?php
}
if($id == 4)
{ ?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data" id="case4">
		<input type="hidden" name="scheme_id" value="4">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">OLD CASE NO(as sanctioned for earlier)(mandatory *)</label>
				<input type="text" name="old_case_no" class="form-control" autocomplete="off" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Name of the Child/Ward BOY:</label>
				<input type="text" name="name_of_child" class="form-control" autocomplete="off" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-check">
				<label class="form-check-label">CAST: </label>
				<input type="radio" name="cast" value="UR" class="form-check-input">UR
				<input type="radio" name="cast" value="SC" class="form-check-input">SC
				<input type="radio" name="cast" value="ST" class="form-check-input">ST
				<input type="radio" name="cast" value="OBC" class="form-check-input">OBC
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-check">
				<label class="form-check-label">1st or 2nd Child: </label>
				<input type="radio" name="nth_child" value="1" class="form-check-input">1st
				<input type="radio" name="nth_child" value="2" class="form-check-input">2nd
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Relationship with applicant:</label>
				<select name="relationship_with_applicant" id="" class="form-control" style="" required>
					<option value="0" selected disabled>Select Relationship</option>
					<?php
					dbcon();
					$query = mysql_query("SELECT id,shortdesc FROM unique_relation");
					while($row = mysql_fetch_array($query))
					{
					echo "<option value='".$row['id']."'>".$row['shortdesc']."</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Name of Institute/School/College:</label>
				<input type="text" name="name_of_institute" class="form-control" autocomplete="off" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Name of the Course:</label>
				<input type="text" name="name_of_course" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-check">
				<label class="form-check-label">Present Year</label>
				<input type="radio" name="present_year" value="1" class="form-check-input">1st
				<input type="radio" name="present_year" value="2" class="form-check-input">2nd
				<input type="radio" name="present_year" value="3" class="form-check-input">3rd
				<input type="radio" name="present_year" value="4" class="form-check-input">4th
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Date of Admission:</label>
				<input type="date" name="date_of_admission" class="form-control" autocomplete="off" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Duration of the Course:</label>
				<input type="text" name="duration_of_course" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Whether in respect of any other similar benefit under SBF
				has been claimed.</label>
				<input type="text" name="any_other_bene_sbf_claimed" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Particular of SBF Grant received in last year.</label>
				<input type="text" name="sbf_grant_recv_last_year" class="form-control" autocomplete="off" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-label">Whether Child/Ward was Residing Railway Hostel(Compulsory)Yes/NO:</label>
				<input type="text" name="child_resi_rly_hostel" class="form-control" autocomplete="off" required="">
			</div>
		</div>
		<div class="form-actions" id="flupload">
			<div class="form-group">
				<label class="control-label">Attach Document(Current Academic Year Bonafide Certificate,Last Year All Semester Marksheet)</label>
				<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
				<span style="color: #FF0000;" id="file_error"></span>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
	</form>
</div>
<?php
		}
		if($id == 12)
{?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data" id="case12">
		<input type="hidden" name="scheme_id" value="12">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Name of the Student:</label>
					<input type="text" name="name_of_child" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-check">
					<label class="form-check-label">Date of Birth of the Student:</label>
					<input type="date" name="date_of_birth_stud" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Relationship with applicant:</label>
					<select name="relationship_with_applicant" id="" class="form-control" style="" required>
						<option value="0" selected disabled>Select Relationship</option>
						<?php
						dbcon();
						$query = mysql_query("SELECT id,shortdesc FROM unique_relation");
						while($row = mysql_fetch_array($query))
						{
						echo "<option value='".$row['id']."'>".$row['shortdesc']."</option>";
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Name and Address of the Institution of which Studying:</label>
					<input type="text" name="name_of_institute" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Particular of Class/Course Studing:</label>
					<input type="text" name="name_of_course" class="form-control" autocomplete="off" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Duration of the Course:</label>
					<input type="text" name="duration_of_course" class="form-control" autocomplete="off" required="">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Scholastic record of the Student (to be supported by copies of certificate/mark sheet duly verified by Principal of School/College)</label>
					<input type="text" name="name_of_exam_passd" class="form-control" placeholder="Name of the Exam.Passed" autocomplete="off" required="">
					<input type="text" name="passed_year" class="form-control" placeholder="Year in which passed" autocomplete="off" required="">
					<input type="text" name="institution" class="form-control" placeholder="Institution" autocomplete="off" required="">
					<input type="text" name="total_marks_fr_exam" class="form-control" placeholder="Total marks for the exam" autocomplete="off" required="" id="tot_mrks">
					<input type="text" name="marks_obtained" class="form-control" placeholder="marks Obtained" autocomplete="off" required="" id="mrks_obt">
					<input type="text" name="percentage" class="form-control" placeholder="Percentage%" autocomplete="off" required="" id="per_mrks" readonly>
					<input type="text" name="pos_in_class" class="form-control" placeholder="Position in Class" autocomplete="off" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Details of Other the Scholarship and educational Assistance from SBF or any other sources:</label>
					<input type="text" name="details_of_other_schol_edu_assist_frm_sbf_or_any" class="form-control" autocomplete="off" required="">
				</div>
			</div>
			<div class="form-actions col-md-4" id="flupload">
				<div class="form-group">
					<label class="control-label">Attach Document(SSC Marksheet, Copy of Payslip)</label>
					<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
					<span style="color: #FF0000;" id="file_error"></span>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
	</form>
</div>
<?php
	}
	if($id == 13)
{?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data" id="case13">
		<input type="hidden" name="scheme_id" value="13">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Name of the Student:</label>
					<input type="text" name="name_of_child" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-check">
					<label class="form-check-label">Date of Birth of the Student:</label>
					<input type="date" name="date_of_birth_stud" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Relationship with applicant:</label>
					<select name="relationship_with_applicant" id="" class="form-control" style="" required>
						<option value="0" selected disabled>Select Relationship</option>
						<?php
						dbcon();
						$query = mysql_query("SELECT id,shortdesc FROM unique_relation");
						while($row = mysql_fetch_array($query))
						{
						echo "<option value='".$row['id']."'>".$row['shortdesc']."</option>";
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Name and Address of the Institution of which Studying:</label>
					<input type="text" name="name_of_institute" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Particular of Class/Course Studing:</label>
					<input type="text" name="name_of_course" class="form-control" autocomplete="off" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Duration of the Course:</label>
					<input type="text" name="duration_of_course" class="form-control" autocomplete="off" required="">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Scholastic record of the Student (to be supported by copies of certificate/mark sheet duly verified by Principal of School/College)</label>
					<input type="text" name="name_of_exam_passd" class="form-control" placeholder="Name of the Exam.Passed" autocomplete="off" required="">
					<input type="text" name="passed_year" class="form-control" placeholder="Year in which passed" autocomplete="off" required="">
					<input type="text" name="institution" class="form-control" placeholder="Institution" autocomplete="off" required="">
					<input type="text" name="total_marks_fr_exam" class="form-control" placeholder="Total marks for the exam" autocomplete="off" required="" id="tot_mrks1">
					<input type="text" name="marks_obtained" class="form-control" placeholder="marks Obtained" autocomplete="off" required="" id="mrks_obt1">
					<input type="text" name="percentage" class="form-control" placeholder="Percentage%" autocomplete="off" required="" id="per_mrks1" readonly>
					<input type="text" name="pos_in_class" class="form-control" placeholder="Position in Class" autocomplete="off" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Details of Other the Scholarship and educational Assistance from SBF or any other sources:</label>
					<input type="text" name="details_of_other_schol_edu_assist_frm_sbf_or_any" class="form-control" autocomplete="off" required="">
				</div>
			</div>
			<div class="form-actions col-md-4" id="flupload">
				<div class="form-group">
					<label class="control-label">Attach Document(HSC Marksheet, Copy of Payslip)</label>
					<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
					<span style="color: #FF0000;" id="file_error"></span>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
	</form>
</div>
<?php
	}
	if($id == 14)
{?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data" id="case14">
		<input type="hidden" name="scheme_id" value="14">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Name of the Student:</label>
					<input type="text" name="name_of_child" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-check">
					<label class="form-check-label">Date of Birth of the Student:</label>
					<input type="date" name="date_of_birth_stud" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Relationship with applicant:</label>
					<select name="relationship_with_applicant" id="" class="form-control" style="" required>
						<option value="0" selected disabled>Select Relationship</option>
						<?php
						dbcon();
						$query = mysql_query("SELECT id,shortdesc FROM unique_relation");
						while($row = mysql_fetch_array($query))
						{
						echo "<option value='".$row['id']."'>".$row['shortdesc']."</option>";
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Name and Address of the Institution of which Studying:</label>
					<input type="text" name="name_of_institute" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Particular of Class/Course Studing:</label>
					<input type="text" name="name_of_course" class="form-control" autocomplete="off" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Duration of the Course:</label>
					<input type="text" name="duration_of_course" class="form-control" autocomplete="off" required="">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Scholastic record of the Student (to be supported by copies of certificate/mark sheet duly verified by Principal of School/College)</label>
					<input type="text" name="name_of_exam_passd" class="form-control" placeholder="Name of the Exam.Passed" autocomplete="off" required="">
					<input type="text" name="passed_year" class="form-control" placeholder="Year in which passed" autocomplete="off" required="">
					<input type="text" name="institution" class="form-control" placeholder="Institution" autocomplete="off" required="">
					<input type="text" name="total_marks_fr_exam" class="form-control" placeholder="Total marks for the exam" autocomplete="off" required="" id="tot_mrks2">
					<input type="text" name="marks_obtained" class="form-control" placeholder="marks Obtained" autocomplete="off" required="" id="mrks_obt2">
					<input type="text" name="percentage" class="form-control" placeholder="Percentage%" autocomplete="off" required="" id="per_mrks2" readonly>
					<input type="text" name="pos_in_class" class="form-control" placeholder="Position in Class" autocomplete="off" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Details of Other the Scholarship and educational Assistance from SBF or any other sources:</label>
					<input type="text" name="details_of_other_schol_edu_assist_frm_sbf_or_any" class="form-control" autocomplete="off" required="">
				</div>
			</div>
			<div class="form-actions col-md-4" id="flupload">
				<div class="form-group">
					<label class="control-label">Attach Document(BA/B.Com/B.Sc Marksheet, Copy of Payslip)</label>
					<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
					<span style="color: #FF0000;" id="file_error"></span>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
	</form>
</div>
<?php
	}
	if($id == 15)
{?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data" id="case15">
		<input type="hidden" name="scheme_id" value="15">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Name of the Student:</label>
					<input type="text" name="name_of_child" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-check">
					<label class="form-check-label">Date of Birth of the Student:</label>
					<input type="date" name="date_of_birth_stud" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Relationship with applicant:</label>
					<select name="relationship_with_applicant" id="" class="form-control" style="" required>
						<option value="0" selected disabled>Select Relationship</option>
						<?php
						dbcon();
						$query = mysql_query("SELECT id,shortdesc FROM unique_relation");
						while($row = mysql_fetch_array($query))
						{
						echo "<option value='".$row['id']."'>".$row['shortdesc']."</option>";
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Name and Address of the Institution of which Studying:</label>
					<input type="text" name="name_of_institute" class="form-control" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Particular of Class/Course Studing:</label>
					<input type="text" name="name_of_course" class="form-control" autocomplete="off" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Duration of the Course:</label>
					<input type="text" name="duration_of_course" class="form-control" autocomplete="off" required="">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Scholastic record of the Student (to be supported by copies of certificate/mark sheet duly verified by Principal of School/College)</label>
					<input type="text" name="name_of_exam_passd" class="form-control" placeholder="Name of the Exam.Passed" autocomplete="off" required="">
					<input type="text" name="passed_year" class="form-control" placeholder="Year in which passed" autocomplete="off" required="">
					<input type="text" name="institution" class="form-control" placeholder="Institution" autocomplete="off" required="">
					<input type="text" name="total_marks_fr_exam" class="form-control" placeholder="Total marks for the exam" autocomplete="off" required="" id="tot_mrks3">
					<input type="text" name="marks_obtained" class="form-control" placeholder="marks Obtained" autocomplete="off" required="" id="mrks_obt3">
					<input type="text" name="percentage" class="form-control" placeholder="Percentage%" autocomplete="off" required="" id="per_mrks3" readonly>
					<input type="text" name="pos_in_class" class="form-control" placeholder="Position in Class" autocomplete="off" required="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Details of Other the Scholarship and educational Assistance from SBF or any other sources:</label>
					<input type="text" name="details_of_other_schol_edu_assist_frm_sbf_or_any" class="form-control" autocomplete="off" required="">
				</div>
			</div>
			<div class="form-actions col-md-4" id="flupload">
				<div class="form-group">
					<label class="control-label">Attach Document(MA,M.Com,M.Sc Marksheet, Copy of Payslip)</label>
					<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
					<span style="color: #FF0000;" id="file_error"></span>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
	</form>
</div>
<?php
	}
	if($id == 5)
{ ?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data" id="case5">
		<input type="hidden" name="scheme_id" value="5">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		<?php 
// 		if($macp == 48 || $macp == 100)
// 		{
// 			echo "<b>"."This Scheme Not For You..."."</b>";
// 		}
// 		else { 
		?>
			<div class="col-md-6">
			<div class="form-group">
				<label class="form-control-label" for="freshapplication">
					Fresh Application Yes/ No
				</label>
				<input class="form-control" type="text" name="fresh_appln" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label class="form-control-label" for="lastappliedinyear">
					Last applied in year
				</label>
				<input class="form-control" type="text" name="last_appli_year" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="receipt">
					(Enclosed) Money Receipt No.
				</label>
				<input type="text" name="enc_money_rec_no" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="receipt">
					Date
				</label>
				<input type="date" name="date" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="receipt">
					Rs.
				</label>
				<input type="text" name="rs" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="form-actions" id="flupload">
			<div class="form-group">
				<label class="control-label">Attach Document(Original Money Receipt of Sept, Copy of Payslip)</label>
				<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
				<span style="color: #FF0000;" id="file_error"></span>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
		<?php //} ?>
	</form>
</div>
<?php	}
if($id == 6)
{ ?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data" id="case6">
		<input type="hidden" name="scheme_id" value="6">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="receipt">
					(Enclosed) Money Receipt No.
				</label>
				<input type="text" name="enc_money_rec_no" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="receipt">
					Date
				</label>
				<input type="date" name="date" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="receipt">
					Rs.
				</label>
				<input type="text" name="rs" class="form-control" required="" autocomplete="off">
			</div>
		</div>
		<div class="form-actions" id="flupload">
			<div class="form-group">
				<label class="control-label">Attach Document(Money Receipt of Dentures, Certificate from private treating doctor, Payslip of Railway Employee)</label>
				<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
				<span style="color: #FF0000;" id="file_error"></span>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
	</form>
</div>
<?php }
		if($id == 7)
		{
?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data">
		<input type="hidden" name="scheme_id" value="7">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">Nature of Leave</label>
				<input type="text" class="form-control" name="nature_of_leave" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">From</label>
				<input type="text" class="form-control" name="leave_due_sick_from" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">To</label>
				<input type="text" class="form-control" name="leave_due_sick_to" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">With Pay</label>
				<input type="text" class="form-control" name="with_pay" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">From</label>
				<input type="text" class="form-control" name="with_pay_from" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">To</label>
				<input type="text" class="form-control" name="with_pay_to" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">Half Pay</label>
				<input type="text" class="form-control" name="half_pay" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">From</label>
				<input type="text" class="form-control" name="half_pay_from" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">To</label>
				<input type="text" class="form-control" name="half_pay_to" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">Without Pay</label>
				<input type="text" class="form-control" name="without_pay" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">From</label>
				<input type="text" class="form-control" name="without_pay_from" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">To</label>
				<input type="text" class="form-control" name="without_pay_to" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">M8&9B, Certificate No.</label>
				<input type="text" class="form-control" name="m89b_certi_no" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">Dated</label>
				<input type="text" class="form-control" name="dated" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">Period</label>
				<input type="text" class="form-control" name="period" required="" autocomplete="off">
			</div>
		</div>
		<div class="form-actions" id="flupload">
			<div class="form-group">
				<label class="control-label">Attach Document(Copy of Railway Sick Certificate, Copy of Payslip of without pay period)</label>
				<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
				<span style="color: #FF0000;" id="file_error"></span>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
	</form>
</div>
<?php	}
if($id == 8)
{ ?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data" id="case8">
		<input type="hidden" name="scheme_id" value="8">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">(Enclosed) Money Receipt No</label>
				<input type="text" class="form-control" name="enc_money_rec_no" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">Date</label>
				<input type="date" class="form-control" name="date" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">Rs</label>
				<input type="text" class="form-control" name="rs" required="" autocomplete="off">
			</div>
		</div>
		<div class="form-actions" id="flupload">
			<div class="form-group">
				<label class="control-label">Attach Document(Handicap Certificate, Quatation)</label>
				<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
				<span style="color: #FF0000;" id="file_error"></span>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
	</form>
</div>
<?php	}
if($id == 10)
{ ?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data">
		<input type="hidden" name="scheme_id" value="10">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">Residential Address</label>
				<textarea class="form-control" rows="4" cols="50" name="resident_addr" required="" autocomplete="off"></textarea>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">Date of Death (Attach Copy of Death Certificate)</label>
				<input type="date" class="form-control" name="date_of_death" required="" autocomplete="off">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">Name of Child</label>
				<input type="text" class="form-control" name="name_of_child" required="" autocomplete="off">
			</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-control-label" for="">Name of School (Attach Bonafide Certificate)</label>
				<input type="text" class="form-control" name="name_of_institute" required="" autocomplete="off">
			</div>
		</div>
		<div class="form-actions" id="flupload">
			<div class="form-group">
				<label class="control-label">Attach Document</label>
				<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
				<span style="color: #FF0000;" id="file_error"></span>
			</div>
		</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
	</form>
</div>
<?php }
		if($id == 11)
{ ?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data" id="case11">
		<input type="hidden" name="scheme_id" value="11">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">Name of the Child/Ward</label>
					<input type="text" class="form-control" name="name_of_child" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">BOY/GIRL</label>
					<input type="text" class="form-control" name="boy_girl" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-check">
					<label class="form-check-label">CAST: </label>
					<input type="radio" name="cast" value="UR" class="form-check-input">UR
					<input type="radio" name="cast" value="SC" class="form-check-input">SC
					<input type="radio" name="cast" value="ST" class="form-check-input">ST
					<input type="radio" name="cast" value="OBC" class="form-check-input">OBC
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-check">
					<label class="form-check-label">1st or 2nd Child: </label>
					<input type="radio" name="nth_child" value="1" class="form-check-input">1st
					<input type="radio" name="nth_child" value="2" class="form-check-input">2nd
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Relationship with applicant:</label>
					<select name="relationship_with_applicant" id="" class="form-control" style="" required>
						<option value="0" selected disabled>Select Relationship</option>
						<?php
						dbcon();
						$query = mysql_query("SELECT id,shortdesc FROM unique_relation");
						while($row = mysql_fetch_array($query))
						{
						echo "<option value='".$row['id']."'>".$row['shortdesc']."</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">Name of Institute/School/College</label>
					<input type="text" class="form-control" name="name_of_institute" required="" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">Name of the Course</label>
					<input type="text" class="form-control" name="name_of_course" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">Present Year(ie 2018-19) (1st/ 2nd/ 3rd/ 4th)</label>
					<input type="text" class="form-control" name="present_year" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">Date of Admission</label>
					<input type="date" class="form-control" name="date_of_admission" required="" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">Duration of the course</label>
					<input type="text" class="form-control" name="duration_of_course" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">Whether Child/Ward was Residing Railway Hostel (Compulsory) YES/NO</label>
					<input type="text" class="form-control" name="child_resi_rly_hostel" required="" autocomplete="off">
				</div>
			</div>
			<div class="form-actions" id="flupload">
				<div class="form-group">
					<label class="control-label">Attach Document(Bonafide Certificate, Handicap Certificate)</label>
					<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
					<span style="color: #FF0000;" id="file_error"></span>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
	</form>
</div>
<?php }
		if($id == 16)
{ ?>
<div class="container-fluid">
	<form method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/form-data">
		<input type="hidden" name="scheme_id" value="16">
		<!--<input type="hidden" name="payband" value="<?php //echo $_POST['payband'];?>">-->
		<!--<input type="hidden" name="macp" value="<?php //echo $_POST['macp'];?>">-->
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">Name of the Child/Ward BOY / GIRL</label>
					<input type="text" class="form-control" name="name_of_child" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">Date of Birth of the Child</label>
					<input type="date" class="form-control" name="date_of_birth_stud" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-label">Relationship with applicant:</label>
					<select name="relationship_with_applicant" id="" class="form-control" style="" required>
						<option value="0" selected disabled>Select Relationship</option>
						<?php
						dbcon();
						$query = mysql_query("SELECT id,shortdesc FROM unique_relation");
						while($row = mysql_fetch_array($query))
						{
						echo "<option value='".$row['id']."'>".$row['shortdesc']."</option>";
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">
						Name and address of Institution where training for occuptional skills is being imparted (as distinct from academics course for which there are separate educational Scholarship schemes)
					</label>
					<input type="text" class="form-control" name="name_of_institute" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">
						Whether in receipt of any Financial Aid from other source Yes/No
					</label>
					<input type="text" class="form-control" name="rece_finan_aid_frm_othr_src" required="" autocomplete="off">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">
						Whether the child is in receipt of Financial Aid from SBF (So give full particulars stating year of receipt)
					</label>
					<input type="text" class="form-control" name="chld_rece_finan_aid_frm_sbf_par_startng_year" required="" autocomplete="off">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="form-control-label">
						Nature of Disability (Latest certificate from competent authority in original to be attached)
					</label>
					<input type="text" class="form-control" name="nature_of_disability" required="" autocomplete="off">
				</div>
			</div>
			<div class="form-actions" id="flupload">
				<div class="form-group">
					<label class="control-label">Attach Document(Copy of Handicap Certificate issued by Civil Surgeon)</label>
					<input type="file" id="upfile" name="upfile[]" class="imagepdf" multiple required="">
					<span style="color: #FF0000;" id="file_error"></span>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<input type="submit" value="Save" id="btn_preview" class="btn btn-success">
			<input type="reset" value="Cancel" id="btn_preview" class="btn btn-danger">
		</div>
	</form>
</div>
<?php }
	}
?>
<script>
	$(".imagepdf").on("change", function(){
    var ext = $(this).val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['png','jpg','jpeg','pdf']) == -1) {
            alert('Invalid file type!');
            $(this).val("");
        }
    });
</script>

<script>
    $(function() {

	$('#case3').validate({

		rules: {
			old_case_no: {
				required: true,
				digits: true
				
			},
			name_of_child: {
			    required: true,
			    alpha: true
			},
			name_of_institute: {
			    required: true,
			    alpha: true
			},
			name_of_course: {
			    required: true,
			    alpha: true
			},
			duration_of_course: {
			    required: true,
			    digits: true
			},
			any_other_bene_sbf_claimed: {
			     required: true,
			    alpha: true
			},
			child_resi_rly_hostel: {
			    required: true,
			    alpha: true
			}
			

		},
		messages: {
			old_case_no: {
				required: "Enter Old Case No",
				digits: "Old Case No should consist only digits"
				
			},
			name_of_child: {
			    required: "Enter Child Name",
				alpha: "Child Name should consist only alphabetical characters"
			},
			name_of_institute: {
			     required: "Enter Institute Name",
				alpha: "Institute Name should consist only alphabetical characters"
			},
			name_of_course: {
			    required: "Enter Course Name",
				alpha: "Course Name should consist only alphabetical characters"
			},
			duration_of_course: {
			    required: "Enter Duration of Course",
				digits: "Duration of Course should consist only digit"
			},
			any_other_bene_sbf_claimed: {
			     required: "Enter Any Other Benefit SBF Claimed",
				alpha: "Benefit SBF Claimed should consist only alphabetical characters"
			},
			child_resi_rly_hostel: {
			     required: "Enter Is Any Child Residing Railway Hostel(Yes/No)",
				alpha: "Any Child Residing Railway Hostel should consist only alphabetical characters"
			}
		},
		submitHandler: function(form) {
			form.submit();
		}

	});


	/* Jquery Validation methods start */
$.validator.addMethod("alpha", function(value, element) {
		return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
	});

	/* Jquery Validation methods end */


});


$(function() {

	$('#case4').validate({

		rules: {
			old_case_no: {
				required: true,
				digits: true
				
			},
			name_of_child: {
			    required: true,
			    alpha: true
			},
			name_of_institute: {
			    required: true,
			    alpha: true
			},
			name_of_course: {
			    required: true,
			    alpha: true
			},
			duration_of_course: {
			    required: true,
			    digits: true
			},
			any_other_bene_sbf_claimed: {
			     required: true,
			    alpha: true
			},
			child_resi_rly_hostel: {
			    required: true,
			    alpha: true
			}

		},
		messages: {
			old_case_no: {
				required: "Enter Old Case No",
				digits: "Old Case No should consist only digits"
				
			},
			name_of_child: {
			    required: "Enter Child Name",
				alpha: "Child Name should consist only alphabetical characters"
			},
			name_of_institute: {
			     required: "Enter Institute Name",
				alpha: "Institute Name should consist only alphabetical characters"
			},
			name_of_course: {
			    required: "Enter Course Name",
				alpha: "Course Name should consist only alphabetical characters"
			},
			duration_of_course: {
			    required: "Enter Duration of Course",
				digits: "Duration of Course should consist only digit"
			},
			any_other_bene_sbf_claimed: {
			     required: "Enter Any Other Benefit SBF Claimed",
				alpha: "Benefit SBF Claimed should consist only alphabetical characters"
			},
			child_resi_rly_hostel: {
			     required: "Enter Is Any Child Residing Railway Hostel(Yes/No)",
				alpha: "Any Child Residing Railway Hostel should consist only alphabetical characters"
			}
		},
		submitHandler: function(form) {
			form.submit();
		}

	});


	/* Jquery Validation methods start */
$.validator.addMethod("alpha", function(value, element) {
		return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
	});

	/* Jquery Validation methods end */


});


$(function() {

	$('#case12').validate({

		rules: {
			name_of_child: {
				required: true,
				alpha: true
				
			},
			name_of_institute: {
			    required: true
			},
			duration_of_course: {
			    required: true,
			    digits: true
			},
			name_of_exam_passd: {
			    required: true,
				alpha: true
			},
			passed_year: {
			    required: true,
			    digits: true
			},
			institution: {
			    required: true,
				alpha: true
			},
			total_marks_fr_exam: {
			     required: true,
			    digits: true
			},
			marks_obtained: {
			    required: true,
			    digits: true
			},
			pos_in_class: {
			     required: true,
			    digits: true
			},
			details_of_other_schol_edu_assist_frm_sbf_or_any: {
			    required: true
			}
		

		},
		messages: {
		
			name_of_child: {
			    required: "Enter Child Name",
				alpha: "Child Name should consist only alphabetical characters"
			},
			name_of_institute: {
			    required: "Enter Institute Name"
			},
			duration_of_course: {
			    required: "Enter Duration of Course",
				digits: "Duration of Course should consist only digit"
			},
			name_of_exam_passd: {
			    required: "Enter Name of Exam Passed",
				alpha: "Name of Exam Passed should consist only alphabetical characters"
			},
			passed_year: {
			    required: "Enter Year of Passing",
				digits: "Year of Passing should consist only digits"
			},
			institution: {
			     required: "Enter Institution Name",
				alpha: "Institution Name should consist only alphabetical characters"
			},
			total_marks_fr_exam: {
			     required: "Enter Total Marks",
				digits: "Total Marks should consist only digits"
			},
			marks_obtained: {
			    required: "Enter Marks Obtained",
				digits: "Marks Obtained should consist only digits"
			},
			pos_in_class: {
			     required: "Enter Position in Class",
				digits: "Position in Class should consist only digit"
			},
			details_of_other_schol_edu_assist_frm_sbf_or_any: {
			     required: "Enter Details of Other School Education Assist from SBF",
			}
		},
		submitHandler: function(form) {
			form.submit();
		}

	});


	/* Jquery Validation methods start */
$.validator.addMethod("alpha", function(value, element) {
		return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
	});

	/* Jquery Validation methods end */


});


$(function() {

	$('#case13').validate({

		rules: {
			name_of_child: {
				required: true,
				alpha: true
				
			},
			name_of_institute: {
			    required: true
			},
			duration_of_course: {
			    required: true,
			    digits: true
			},
			name_of_exam_passd: {
			    required: true,
				alpha: true
			},
			passed_year: {
			    required: true,
			    digits: true
			},
			institution: {
			    required: true,
				alpha: true
			},
			total_marks_fr_exam: {
			     required: true,
			    digits: true
			},
			marks_obtained: {
			    required: true,
			    digits: true
			},
			pos_in_class: {
			     required: true,
			    digits: true
			},
			details_of_other_schol_edu_assist_frm_sbf_or_any: {
			    required: true
			}
		

		},
		messages: {
		
			name_of_child: {
			    required: "Enter Child Name",
				alpha: "Child Name should consist only alphabetical characters"
			},
			name_of_institute: {
			    required: "Enter Institute Name"
			},
			duration_of_course: {
			    required: "Enter Duration of Course",
				digits: "Duration of Course should consist only digit"
			},
			name_of_exam_passd: {
			    required: "Enter Name of Exam Passed",
				alpha: "Name of Exam Passed should consist only alphabetical characters"
			},
			passed_year: {
			    required: "Enter Year of Passing",
				digits: "Year of Passing should consist only digits"
			},
			institution: {
			     required: "Enter Institution Name",
				alpha: "Institution Name should consist only alphabetical characters"
			},
			total_marks_fr_exam: {
			     required: "Enter Total Marks",
				digits: "Total Marks should consist only digits"
			},
			marks_obtained: {
			    required: "Enter Marks Obtained",
				digits: "Marks Obtained should consist only digits"
			},
			pos_in_class: {
			     required: "Enter Position in Class",
				digits: "Position in Class should consist only digit"
			},
			details_of_other_schol_edu_assist_frm_sbf_or_any: {
			     required: "Enter Details of Other School Education Assist from SBF",
			}
		},
		submitHandler: function(form) {
			form.submit();
		}

	});


	/* Jquery Validation methods start */
$.validator.addMethod("alpha", function(value, element) {
		return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
	});

	/* Jquery Validation methods end */


});



$(function() {

	$('#case14').validate({

		rules: {
			name_of_child: {
				required: true,
				alpha: true
				
			},
			name_of_institute: {
			    required: true
			},
			duration_of_course: {
			    required: true,
			    digits: true
			},
			name_of_exam_passd: {
			    required: true,
				alpha: true
			},
			passed_year: {
			    required: true,
			    digits: true
			},
			institution: {
			    required: true,
				alpha: true
			},
			total_marks_fr_exam: {
			     required: true,
			    digits: true
			},
			marks_obtained: {
			    required: true,
			    digits: true
			},
			pos_in_class: {
			     required: true,
			    digits: true
			},
			details_of_other_schol_edu_assist_frm_sbf_or_any: {
			    required: true
			}
		

		},
		messages: {
		
			name_of_child: {
			    required: "Enter Child Name",
				alpha: "Child Name should consist only alphabetical characters"
			},
			name_of_institute: {
			    required: "Enter Institute Name"
			},
			duration_of_course: {
			    required: "Enter Duration of Course",
				digits: "Duration of Course should consist only digit"
			},
			name_of_exam_passd: {
			    required: "Enter Name of Exam Passed",
				alpha: "Name of Exam Passed should consist only alphabetical characters"
			},
			passed_year: {
			    required: "Enter Year of Passing",
				digits: "Year of Passing should consist only digits"
			},
			institution: {
			     required: "Enter Institution Name",
				alpha: "Institution Name should consist only alphabetical characters"
			},
			total_marks_fr_exam: {
			     required: "Enter Total Marks",
				digits: "Total Marks should consist only digits"
			},
			marks_obtained: {
			    required: "Enter Marks Obtained",
				digits: "Marks Obtained should consist only digits"
			},
			pos_in_class: {
			     required: "Enter Position in Class",
				digits: "Position in Class should consist only digit"
			},
			details_of_other_schol_edu_assist_frm_sbf_or_any: {
			     required: "Enter Details of Other School Education Assist from SBF",
			}
		},
		submitHandler: function(form) {
			form.submit();
		}

	});


	/* Jquery Validation methods start */
$.validator.addMethod("alpha", function(value, element) {
		return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
	});

	/* Jquery Validation methods end */


});


$(function() {

	$('#case15').validate({

		rules: {
			name_of_child: {
				required: true,
				alpha: true
				
			},
			name_of_institute: {
			    required: true
			},
			duration_of_course: {
			    required: true,
			    digits: true
			},
			name_of_exam_passd: {
			    required: true,
				alpha: true
			},
			passed_year: {
			    required: true,
			    digits: true
			},
			institution: {
			    required: true,
				alpha: true
			},
			total_marks_fr_exam: {
			     required: true,
			    digits: true
			},
			marks_obtained: {
			    required: true,
			    digits: true
			},
			pos_in_class: {
			     required: true,
			    digits: true
			},
			details_of_other_schol_edu_assist_frm_sbf_or_any: {
			    required: true
			}
		

		},
		messages: {
		
			name_of_child: {
			    required: "Enter Child Name",
				alpha: "Child Name should consist only alphabetical characters"
			},
			name_of_institute: {
			    required: "Enter Institute Name"
			},
			duration_of_course: {
			    required: "Enter Duration of Course",
				digits: "Duration of Course should consist only digit"
			},
			name_of_exam_passd: {
			    required: "Enter Name of Exam Passed",
				alpha: "Name of Exam Passed should consist only alphabetical characters"
			},
			passed_year: {
			    required: "Enter Year of Passing",
				digits: "Year of Passing should consist only digits"
			},
			institution: {
			     required: "Enter Institution Name",
				alpha: "Institution Name should consist only alphabetical characters"
			},
			total_marks_fr_exam: {
			     required: "Enter Total Marks",
				digits: "Total Marks should consist only digits"
			},
			marks_obtained: {
			    required: "Enter Marks Obtained",
				digits: "Marks Obtained should consist only digits"
			},
			pos_in_class: {
			     required: "Enter Position in Class",
				digits: "Position in Class should consist only digit"
			},
			details_of_other_schol_edu_assist_frm_sbf_or_any: {
			     required: "Enter Details of Other School Education Assist from SBF",
			}
		},
		submitHandler: function(form) {
			form.submit();
		}

	});


	/* Jquery Validation methods start */
$.validator.addMethod("alpha", function(value, element) {
		return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
	});

	/* Jquery Validation methods end */


});



$(function() {

	$('#case6').validate({

		rules: {
			enc_money_rec_no: {
				required: true
				
				
			},
			rs: {
			    required: true,
			    digits: true
			}
		

		},
		messages: {
		
			enc_money_rec_no: {
			    required: "Enter Money Receipt No"
				
			},
			rs: {
			    required: "Enter Amount",
			    digits: "Amount should consist only digits"
			}
			
		},
		submitHandler: function(form) {
			form.submit();
		}

	});


	/* Jquery Validation methods start */
$.validator.addMethod("alpha", function(value, element) {
		return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
	});

	/* Jquery Validation methods end */


});


$(function() {

	$('#case8').validate({

		rules: {
			enc_money_rec_no: {
				required: true
				
				
			},
			rs: {
			    required: true,
			    digits: true
			}
		

		},
		messages: {
		
			enc_money_rec_no: {
			    required: "Enter Money Receipt No"
				
			},
			rs: {
			    required: "Enter Amount",
			    digits: "Amount should consist only digits"
			}
			
		},
		submitHandler: function(form) {
			form.submit();
		}

	});


	/* Jquery Validation methods start */
$.validator.addMethod("alpha", function(value, element) {
		return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
	});

	/* Jquery Validation methods end */


});


$(function() {

	$('#case5').validate({

		rules: {
		    fresh_appln: {
		        required: true,
		        alpha: true
		    },
		    last_appli_year: {
		      required: true,
		      digits: true
		    },
			enc_money_rec_no: {
				required: true
			},
			rs: {
			    required: true,
			    digits: true
			}
		

		},
		messages: {
		    fresh_appln: {
		        required: "Enter Fresh Application No(Yes/No)",
		        alpha: "Fresh Application No should consist only alphabets"
		    },
		    last_appli_year: {
		        required: "Enter the Last Applied Year",
		        digits: "Last Applied Year should consist only digits"
		    },
			enc_money_rec_no: {
			    required: "Enter Money Receipt No"
				
			},
			rs: {
			    required: "Enter Amount",
			    digits: "Amount should consist only digits"
			}
			
		},
		submitHandler: function(form) {
			form.submit();
		}

	});


	/* Jquery Validation methods start */
$.validator.addMethod("alpha", function(value, element) {
		return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
	});

	/* Jquery Validation methods end */


});
</script>

<script>
    $('#mrks_obt').change(function(){
        var id = $(this).val();
        var id1 = $('#tot_mrks').val();
        if(id > id1){
            alert('Marks obtained should be less than Total Marks');
            $('#mrks_obt').val("");
        }
        else{
            var a = (id/id1)*100;
             $('#per_mrks').val(a);
        }
       
        
    })
    
    
    $('#mrks_obt1').change(function(){
        var id = $(this).val();
        var id1 = $('#tot_mrks1').val();
        if(id > id1){
            alert('Marks obtained should be less than Total Marks');
            $('#mrks_obt1').val("");
        }
            else{
                var a = (id/id1)*100;
                $('#per_mrks1').val(a);
            }
        
        
    })
    
     $('#mrks_obt2').change(function(){
        var id = $(this).val();
        var id1 = $('#tot_mrks2').val();
        if(id > id1){
            alert('Marks obtained should be less than Total Marks');
            $('#mrks_obt2').val("");
        }
        else{
            var a = (id/id1)*100;
            $('#per_mrks2').val(a);
        }
        
        
    })
    
     $('#mrks_obt3').change(function(){
        var id = $(this).val();
        var id1 = $('#tot_mrks3').val();
        if(id > id1){
            alert('Marks obtained should be less than Total Marks');
            $('#mrks_obt3').val("");
        }
        else{
            var a = (id/id1)*100;
          $('#per_mrks3').val(a);
        }
        
        
    })
</script>