<?php
include_once('../dbconfig/dbcon.php');
$conn = dbcon();
include('mini_function.php');
include_once('functions.php');

function get_gender_data($gen)
{
	$select = '';
	if ($gen == "M" || $gen == '1') {
		$select = "<option selected value='1'>Male</option><option value='2'>Female</option><option value='3'>Trans-Gender</option>";
	} else if ($gen == "F" || $gen == '2') {
		$select = "<option value='1'>Male</option><option value='2' selected>Female</option><option value='3'>Trans-Gender</option>";
	} else if ($gen == "T" || $gen == '3') {
		$select = "<option value='1'>Male</option><option value='2'>Female</option><option value='3' seleted>Trans-Gender</option>";
	} else {
		$select = "<option selected disabled>SELECT GENDER</option><option value='1'>Male</option><option value='2'>Female</option><option value='3'>Trans-Gender</option>";
	}
	return $select;
}

function get_marital_status($status)
{
	$m_status = '';
	switch ($status) {
		case '1':
			$m_status = '<option disabled hidden selected >SELECR MARITIAL STATUS</option><option value="1" selected>DIVORCED</option><option value="2" >MARRIED</option><option value="3">UNMARRIED</option><option value="4">WIDOWER</option><option value="5">WIDOW</option>';
			break;
		case '2':
			$m_status = '<option disabled hidden>SELECR MARITIAL STATUS</option><option value="1" >DIVORCED</option><option value="2"  selected>MARRIED</option><option value="3" >UNMARRIED</option><option value="4">WIDOWER</option><option value="5">WIDOW</option>';
			break;
		case '3':
			$m_status = '<option disabled hidden>SELECR MARITIAL STATUS</option><option value="1" >DIVORCED</option><option value="2">MARRIED</option><option value="3" selected>UNMARRIED</option><option value="4">WIDOWER</option><option value="5">WIDOW</option>';
			break;
		case '4':
			$m_status = '<option disabled hidden>SELECR MARITIAL STATUS</option><option value="1" >DIVORCED</option><option value="2" >MARRIED</option><option value="3">UNMARRIED</option><option value="4" selected>WIDOWER</option><option value="5">WIDOW</option>';
			break;
		case '5':
			$m_status = '<option disabled hidden>SELECR MARITIAL STATUS</option><option value="1" >DIVORCED</option><option value="2">MARRIED</option><option value="3">UNMARRIED</option><option value="4">WIDOWER</option><option value="5" selected>WIDOW</option>';
			break;
		case 'M':
			$m_status = '<option disabled hidden>SELECR MARITIAL STATUS</option><option value="1">DIVORCED</option><option value="2" selected>MARRIED</option><option value="3">UNMARRIED</option><option value="4">WIDOWER</option><option value="5">WIDOW</option>';
			break;
		case 'U':
			$m_status = '<option disabled hidden>SELECR MARITIAL STATUS</option><option value="1" >DIVORCED</option><option value="2" >MARRIED</option><option value="3" selected>UNMARRIED</option><option value="4">WIDOWER</option><option value="5">WIDOW</option>';
			break;
		default:
			$m_status = '<option selected disabled hidden>SELECR MARITIAL STATUS</option><option value="1" >DIVORCED</option><option value="2">MARRIED</option><option value="3">UNMARRIED</option><option value="4">WIDOWER</option><option value="5">WIDOW</option>';
			break;
	}
	return $m_status;
}

/*function get_state_data($state){
	dbcon();
	$sql = "SELECT * FROM `state`";
	$data = '';
	$result = mysqli_query($sql);

	if($result){
		$data .="<option selected disabled >SELECT STATE</option>";
		while($state_data = mysqli_fetch_array($result)){
			if($state == $state_data['longdesc'] || $state == $state_data['statecode']){
			
				$data .= "<option value='".$state_data['longdesc']."' >".$state_data['longdesc']."</option>";	
			}else{
				$data .= "<option value='".$state_data['longdesc']."'>".$state_data['longdesc']."</option>";
			}
			
		}
	}else{
		$data .='';
	}
	return $data;
}*/

function get_state_data($state)
{
	$conn=dbcon();
	$data = '';

	if ($state != "") {
		//echo "<script>alert('hello');</script>";
		$sql = mysqli_query($conn,"select * from `state` where longdesc='$state'");
		$cnt = mysqli_num_rows($sql);

		if ($cnt > 0) {
			while ($result = mysqli_fetch_array($sql)) {
				if ($state == $result['longdesc'] || $state == $result['statecode']) {
					$data .= "<option value='" . $result['longdesc'] . "' selected>" . $result['longdesc'] . "</option>";
					$sql1 = mysqli_query($conn,"select * from `state` where longdesc<>'$state'");
					while ($res = mysqli_fetch_array($sql1)) {
						$data .= "<option value='" . $res['longdesc'] . "'>" . $res['longdesc'] . "</option>";
					}
				}
			}
		} else {
			$sql1 = mysqli_query($conn,"select * from `state`");
			$data .= "<option hidden selected>SELECT STATE</option>";
			while ($res = mysqli_fetch_array($sql1)) {
				$data .= "<option value='" . $res['longdesc'] . "'>" . $res['longdesc'] . "</option>";
			}
		}
	} else {
		$sql1 = mysqli_query($conn,"select * from `state`");
		$data .= "<option hidden selected>SELECT STATE</option>";
		while ($res = mysqli_fetch_array($sql1)) {
			$data .= "<option value='" . $res['longdesc'] . "'>" . $res['longdesc'] . "</option>";
		}
	}
	return $data;
}

function get_pincode_data($pincode, $statecode)
{
	$conn=dbcon();
	if (strlen($statecode) == 2) {
		$state_sql = "SELECT * FROM `state` WHERE statecode = '" . $statecode . "'";
		$fetched = mysqli_query($conn,$state_sql);
		while ($fetched_row = mysqli_fetch_assoc($fetched)) {
			$statecode = $fetched_row['longdesc'];
		}
	}
	$sql = "SELECT * FROM `pincode` WHERE `state_u_t` = '" . $statecode . "' GROUP BY `pincode` ASC";
	$data = '';
	$result = mysqli_query($conn,$sql);

	if ($result) {

		while ($pincode_data = mysqli_fetch_array($result)) {
			if ($pincode == $pincode_data['pincode']) {
				$data .= "<option value='" . $pincode_data['pincode'] . "' selected>" . $pincode_data['pincode'] . "</option>";
			} else {
				$data .= "<option value='" . $pincode_data['pincode'] . "'>" . $pincode_data['pincode'] . "</option>";
			}
		}
	} else {
		$data .= '';
	}
	return $data;
}

function get_mark_data($mark_data)
{
	$result = '';
	$v = '';
	$data = explode(",", $mark_data);
	$data_count = count($data);
	if ($data_count >= 0) {
		for ($i = 0; $i < $data_count; $i++) {
			if ($data[$i] != NULL) {
				$v = $i + 1;
				$result .= '<input type="text" class="form-control col-md-6 col-sm-12 col-xs-12" name="bio_mark[' . $v . ']" id="bio_mark_' . $v . '" style="margin-top:20px;" autocomplete="off" value="' . $data[$i] . '">';
			}
		}
	}
	return $result . "$" . $v;
}

function get_reli_data($religion)
{
	$conn=dbcon();
	$sql = "SELECT * FROM `religion`";
	$data = '';
	$result = mysqli_query($conn,$sql);

	if ($result) {
		$data .= "<option selected disabled hidden>SELECT RELIGION</option>";
		while ($religion_data = mysqli_fetch_array($result)) {
			if ($religion == $religion_data['id']) {
				$data .= "<option value='" . $religion_data['id'] . "' selected>" . $religion_data['longdesc'] . "</option>";
			} else {
				$data .= "<option value='" . $religion_data['id'] . "'>" . $religion_data['longdesc'] . "</option>";
			}
		}
	} else {
		$data .= '';
	}
	return $data;
}

function get_community_data($community)
{
	$conn=dbcon();
	$sql = "SELECT * FROM `community`";
	$data = '';
	$result = mysqli_query($conn,$sql);

	if ($result) {
		$data .= "<option selected disabled hidden>SELECT COMMUNITY</option>";
		while ($community_data = mysqli_fetch_array($result)) {
			if ($community == $community_data['id']) {
				$data .= "<option value='" . $community_data['id'] . "' selected>" . $community_data['LONGDESC'] . "</option>";
			} else {
				$data .= "<option value='" . $community_data['id'] . "'>" . $community_data['LONGDESC'] . "</option>";
			}
		}
	} else {
		$data .= '';
	}
	return $data;
}

function get_recruitment_data($recruitment)
{
	$conn=dbcon();
	$sql = "SELECT * FROM `recruitment`";
	$data = '';
	$result = mysqli_query($conn,$sql);

	if ($result) {
		$data .= "<option selected disabled hidden>SELECT RECRUIPTMENT CODE</option>";
		while ($recruitment_data = mysqli_fetch_array($result)) {
			if ($recruitment == $recruitment_data['id']) {
				$data .= "<option value='" . $recruitment_data['id'] . "' selected>" . $recruitment_data['shortdesc'] . "</option>";
			} else {
				$data .= "<option value='" . $recruitment_data['id'] . "'>" . $recruitment_data['shortdesc'] . "</option>";
			}
		}
	} else {
		$data .= '';
	}
	return $data;
}

function get_group_data($group)
{
	$conn=dbcon();
	$sql = "SELECT * FROM `group_col`";
	$data = '';
	$result = mysqli_query($conn,$sql);

	if ($result) {
		$data .= "<option selected disabled hidden>SELECT GROUP</option>";
		while ($group_data = mysqli_fetch_array($result)) {
			if ($group == $group_data['id']) {
				$data .= "<option value='" . $group_data['id'] . "' selected>" . $group_data['group_col'] . "</option>";
			} else {
				$data .= "<option value='" . $group_data['id'] . "'>" . $group_data['group_col'] . "</option>";
			}
		}
	} else {
		$data .= '';
	}
	return $data;
}

function get_iniEduction($education, $description)
{
	$conn=dbcon();
	$v = '';
	$sql = "SELECT * FROM `education`";
	$data = '';


	$edu_data = explode(",", $education);
	$data_count = count($edu_data);

	$edu_description = explode(",", $description);
	$desc_count = count($edu_description);
	if ($data_count > 0) {
		for ($i = 0; $i < $data_count; $i++) {
			if ($edu_data[$i] != NULL) {
				$v = $i + 1;
				$data .= "<div class='form-group' id='" . $v . "'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Edu. Qual.</label><div class='col-md-8 col-sm-12 col-xs-12' id='edu_main_info'><select name='edu_pri_info[" . $v . "]' id='edu_pri_info_" . $v . "' class='form-control' style='margin-top:0px; width:100%;' required><option value='blank' selected></option>";

				//$data .= "<div class='form-group' id='".$v."'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Educational Qualification</label><div class='col-md-8 col-sm-12 col-xs-12' id='edu_main_info'><select name='edu_pri_info[".$v."]' id='edu_pri_info_".$v."' class='form-control' style='margin-top:0px; width:100%;' required><option value='blank'></option>";
				$result = mysqli_query($conn,$sql);
				if ($result) {
					while ($education_data = mysqli_fetch_array($result)) {
						if ($edu_data[$i] == $education_data['id']) {
							$data .= "<option value='" . $education_data['id'] . "' selected>" . $education_data['education'] . "</option>";
						} else {
							$data .= "<option value='" . $education_data['id'] . "'>" . $education_data['education'] . "</option>";
						}
					}

					$data .= "</select></div></div>";
					$data .= "@<div class='form-group' id='desc_" . $v . "'>";
					$data .= "<input type='text' class='form-control col-md-12 col-sm-12 col-xs-12' name='bio_edu_ini[" . $v . "]' id='bio_edu_ini" . $v . "' placeholder='Description' value='" . $edu_description[$i] . "'></div>@";
				} else {
					$data .= '';
				}
			}
		}
	}
	$data .= "$" . $v;
	return $data;
}

function get_subEduction($education, $description)
{
	$conn=dbcon();
	$v = '';
	$sql = "SELECT * FROM `education`";
	$data = '';


	$edu_data = explode(",", $education);
	$data_count = count($edu_data);

	$edu_description = explode(",", $description);
	$desc_count = count($edu_description);
	if ($data_count > 0) {
		for ($i = 0; $i < $data_count; $i++) {
			if ($edu_data[$i] != NULL) {
				$v = $i + 1;
				$data .= "<div class='form-group' id='sub_" . $v . "'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Edu. Qual.</label><div class=col-md-8 col-sm-12 col-xs-12' id='edu_main_info'><select name='edu_pri_info_sub[" . $v . "]' id='edu_pri_info_sub" . $v . "' class='form-control' style='margin-top:0px; width:100%;' required><option value='blank'></option>";
				$result = mysqli_query($conn,$sql);
				if ($result) {
					while ($education_data = mysqli_fetch_array($result)) {
						if ($edu_data[$i] == $education_data['id']) {
							$data .= "<option value='" . $education_data['id'] . "' selected>" . $education_data['education'] . "</option>";
						} else {
							$data .= "<option value='" . $education_data['id'] . "'>" . $education_data['education'] . "</option>";
						}
					}

					$data .= "</select></div></div>@<div class='form-group' id='sub_desc_" . $v . "'>";
					$data .= "<input type='text' class='form-control col-md-12 col-sm-12 col-xs-12' name='bio_edu_sub[" . $v . "]' id='bio_edu_sub" . $v . "' placeholder='Description' value='" . $edu_description[$i] . "'></div>@";
				} else {
					$data .= '';
				}
			}
		}
	}
	$data .= "$" . $v;
	return $data;
}
