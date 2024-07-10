<?php
include_once('../dbconfig/dbcon.php');


if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) {

		case 'get_family_form':
			$cnt = $_POST['cnt'];
			$data = "";

			$data = "<h4>&emsp;Family Member $cnt</h4><div class='row'><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Name</label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control' id='fam_mem_name_$cnt' name='fam_mem_name_$cnt' placeholder=' '></div></div></div><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Mobile No</label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control' id='fam_mem_mobno_$cnt' name='fam_mem_mobno_$cnt' placeholder=' '></div></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Pan No</label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control' id='fam_mem_panno_$cnt' name='fam_mem_panno_$cnt' placeholder=' '></div></div></div><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Aadhar No </label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control' id='fam_mem_aadharno_$cnt' name='fam_mem_aadharno_$cnt' placeholder=' '></div></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Relation </label><select name='fam_mem_rel_$cnt' id='fam_mem_rel_$cnt' class='select2me form-control' style='width: 100%;' tabindex='-1' aria-hidden='true'><option value='' selected disabled>Select Status</option>";
			$con = dbcon1();
			$query_emp = mysqli_query($con,'SELECT * from relation');
			while ($value_emp = mysqli_fetch_array($query_emp)) {
				$data .= "<option value='" . $value_emp['code'] . "'>" . $value_emp['longdesc'] . "</option>";
			}
			$data .= "</select></div></div><div class='col-md-6'><div class='form-group'><label class='control-label'>Maritial Status </label><select name='fam_mem_maritial_st_$cnt' id='fam_mem_maritial_st_$cnt' class='select2me form-control' style='width: 100%;' tabindex='-1' aria-hidden='true'><option value='' selected disabled>Select Status</option>";

			$query_emp = mysqli_query($con,'SELECT * from marital_status');

			while ($value_emp = mysqli_fetch_array($query_emp)) {
				$data .= "<option value='" . $value_emp['code'] . "'>" . $value_emp['shortdesc'] . "</option>";
			}
			$data .= "</select></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='control-label'>Member DOB</label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control calender_picker_dyn$cnt' id='fam_mem_dob_$cnt' name='fam_mem_dob_$cnt' placeholder=' '></div></div></div><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Qualifiaction</label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control dtpicker' id='fam_mem_qualif_$cnt' name='fam_mem_qualif_$cnt' placeholder=''></div></div></div></div><div class='row'><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Employed or Otherwise</label>
		<div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control dtpicker' id='fam_mem_employedorother_$cnt' name='fam_mem_employedorother_$cnt' placeholder=''></div></div></div></div><hr>";

			$data .= "<script>$('.calender_picker_dyn$cnt').datepicker({format:'dd/mm/yyyy',autoclose:true,forceParse:false});</script>";

			echo $data;
			break;
	}
}
