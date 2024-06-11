<?php
include_once('../dbconfig/dbcon.php');


 if (isset($_REQUEST['action'])) {
	switch (strtolower($_REQUEST['action'])) { 
	
	case 'get_family_form':
	$cnt=$_POST['cnt'];
	$data="";
	
	$data="<h4>&emsp;Family Member $cnt</h4><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Name</label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control' id='fam_mem_name_$cnt' name='fam_mem_name_$cnt' placeholder=' '></div></div></div><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Mobile No</label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control' id='fam_mem_mobno_$cnt' name='fam_mem_mobno_$cnt' placeholder=' '></div></div></div><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Pan No</label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control' id='fam_mem_panno_$cnt' name='fam_mem_panno_$cnt' placeholder=' '></div></div></div><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Aadhar No </label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control' id='fam_mem_aadharno_$cnt' name='fam_mem_aadharno_$cnt' placeholder=' '></div></div></div><div class='col-md-6'><div class='form-group'><label class='control-label'>Member Relation </label><select name='fam_mem_rel_$cnt' id='fam_mem_rel_$cnt' class='select2me form-control' style='width: 100%;' tabindex='-1' aria-hidden='true' required><option value='' selected disabled>Select Status</option>";
		$query_emp =mysql_query('select * from Relation');
	 while($value_emp = mysql_fetch_array($query_emp))
		 {
		$data.="<option value='".$value_emp['code']."'>".$value_emp['longdesc']."</option>";
		 }									
	$data.="</select></div></div><div class='col-md-6'><div class='form-group'><label class='control-label'>Member DOB</label><div class='input-group'><span class='input-group-addon'><i class='fas fa-envelope'></i></span><input type='text' class='form-control calender_picker_dyn$cnt' id='fam_mem_dob_$cnt' name='fam_mem_dob_$cnt' placeholder=' '></div></div></div><hr style='border:1px solid gray'>";
	
	$data.="<script>$('.calender_picker_dyn$cnt').datepicker({format:'dd-mm-yyyy',autoclose:true,forceParse:false});$('.select2_dyn$cnt').select2();</script>";
	
	echo $data;
	break;
	
	
	

	
	
	
	
	
	
	
	
	
	}
}?>