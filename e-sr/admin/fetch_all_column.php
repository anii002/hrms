<?php
require_once('../dbconfig/dbcon.php');

function get_medical_classi($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `medical_classi` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['longdesc'] . "</option>";
		}
		$sql = "SELECT * FROM `medical_classi` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['longdesc'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `medical_classi`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select PME--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['longdesc'] . "</option>";
		}
	}
	return $data;
}

function fetch_all_dept($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `department` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['DEPTDESC'] . "</option>";
		}
		$sql = "SELECT * FROM `department` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['DEPTDESC'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `department`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select department--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['DEPTDESC'] . "</option>";
		}
	}
	return $data;
}

function fetch_all_desig($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `designations` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['desiglongdesc'] . "</option>";
		}
		$sql = "SELECT * FROM `designation` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['desiglongdesc'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `designation`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select designation--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['desiglongdesc'] . "</option>";
		}
	}
	return $data;
}

function fetch_all_group($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `group_col` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['group_col'] . "</option>";
		}
		$sql = "SELECT * FROM `group_col` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['group_col'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `group_col`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select group--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['group_col'] . "</option>";
		}
	}
	return $data;
}

function fetch_all_scale($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {
		$sql = mysqli_query($conn, "select * from `scale` where `6_cpc_scale`='$id'");
		while ($result = mysqli_fetch_array($sql)) {
			$data .= "<option selected value='" . $result['6_cpc_scale'] . "'-'" . $result['gradepay'] . "'>" . $result['6_cpc_scale'] . "-" . $result['gradepay'] . "</option>";
		}

		$sql1 = mysqli_query($conn, "select * from `scale` where `6_cpc_scale`<>'$id'");
		while ($result1 = mysqli_fetch_array($sql1)) {
			$data .= "<option value='" . $result1['6_cpc_scale'] . "'-'" . $result1['gradepay'] . "'>" . $result1['6_cpc_scale'] . "-" . $result1['gradepay'] . "</option>";
		}
	} else {
		$sql = "SELECT distinct(6_cpc_scale) FROM `scale`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select scale--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['6_cpc_scale'] . "'>" . $res['6_cpc_scale'] . "</option>";
		}
	}
	return $data;
}
function fetch_all_level($id)
{
	$conn = dbcon();
	$data = "";

	if (!empty($id)) {
		$sql = "SELECT 7_pc_level FROM `scale` WHERE `7_pc_level` = '" . mysqli_real_escape_string($conn, $id) . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));

		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['7_pc_level'] . "'>" . $res['7_pc_level'] . "</option>";
		}

		$sql1 = "SELECT 7_pc_level FROM `scale` WHERE `7_pc_level` <> '" . mysqli_real_escape_string($conn, $id) . "'";
		$query1 = mysqli_query($conn, $sql1) or trigger_error("Query Failed: " . mysqli_error($conn));

		while ($res1 = mysqli_fetch_array($query1)) {
			$data .= "<option value='" . $res1['7_pc_level'] . "'>" . $res1['7_pc_level'] . "</option>";
		}
	} else {
		$sql2 = "SELECT 7_pc_level FROM `scale`";
		$query2 = mysqli_query($conn, $sql2) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected disabled value=''>--select level--</option>";

		while ($res2 = mysqli_fetch_array($query2)) {
			$data .= "<option value='" . $res2['7_pc_level'] . "'>" . $res2['7_pc_level'] . "</option>";
		}
	}

	return $data;
}

function fetch_all_appo_type($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `appointment_type` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
		$sql = "SELECT * FROM `appointment_type` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `appointment_type`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select appointment_type--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	}
	return $data;
}

function get_all_pme($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `medical_pme_class` WHERE `pme_class` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['pme_class'] . "'>" . $res['pme_class'] . "</option>";
		}
		$sql = "SELECT * FROM `medical_pme_class` WHERE `pme_class` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['pme_class'] . "'>" . $res['pme_class'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `medical_pme_class`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select PME--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['pme_class'] . "'>" . $res['pme_class'] . "</option>";
		}
	}
	return $data;
}

function get_all_appo_type($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `appointment_type` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
		$sql = "SELECT * FROM `appointment_type` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `appointment_type`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select appointment_type--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	}
	return $data;
}

function get_all_pay_scale_type($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `pay_scale_type` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
		$sql = "SELECT * FROM `pay_scale_type` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `pay_scale_type`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='' disabled	>--select pay_scale_type--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	}
	return $data;
}
function get_all_order_type_pro_rev($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `order_type_pro_rev` WHERE `shortdesc` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['shortdesc'] . "'>" . $res['longdesc'] . "</option>";
		}
		$sql = "SELECT * FROM `order_type_pro_rev` WHERE `shortdesc` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['shortdesc'] . "'>" . $res['longdesc'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `order_type_pro_rev`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select order type--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['shortdesc'] . "'>" . $res['longdesc'] . "</option>";
		}
	}
	return $data;
}

function get_all_order_type_transfer($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `order_type_transfer` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
		$sql = "SELECT * FROM `order_type_transfer` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `order_type_transfer`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select order type--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	}
	return $data;
}

function get_all_order_type_fixation($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `order_type_fixation` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
		$sql = "SELECT * FROM `order_type_fixation` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `order_type_fixation`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select order type--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	}
	return $data;
}

function get_all_penalty_type($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `penalty_type` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
		$sql = "SELECT * FROM `penalty_type` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `penalty_type`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select penalty--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	}
	return $data;
}
/* function get_all_penalty_type($id) 
	{
		$conn=dbcon();
		$data = "";
		if (!empty($id)) 
		{
			
			$sql = "SELECT * FROM `penalty_type` WHERE `id` = '".$id."'";
			$query = mysqli_query($sql) or trigger_error("Query Failed: " . mysqli_error($conn));
			while($res=mysqli_fetch_array($query)){
				$data = "<option selected value='".$res['id']."'>".$res['type']."</option>";
			}	
			$sql = "SELECT * FROM `penalty_type` WHERE `id` <> '".$id."'";
			$query = mysqli_query($sql) or trigger_error("Query Failed: " . mysqli_error($conn));
			while($res=mysqli_fetch_array($query)){
				$data .= "<option value='".$res['id']."'>".$res['type']."</option>";
			}	
		}
		return $data;
	} */
function get_all_increment_type($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `increment_type` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['increment_type'] . "</option>";
		}
		$sql = "SELECT * FROM `increment_type` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['increment_type'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `increment_type`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select increment_type--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['increment_type'] . "</option>";
		}
	}
	return $data;
}
function get_all_awarded_by($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `awarded_by` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['awarded_by'] . "</option>";
		}
		$sql = "SELECT * FROM `awarded_by` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['awarded_by'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `awarded_by`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select awarded_by--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['awarded_by'] . "</option>";
		}
	}
	return $data;
}
function get_all_awards($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `awards` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['awards'] . "</option>";
		}
		$sql = "SELECT * FROM `awards` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['awards'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `awards`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select awards--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['awards'] . "</option>";
		}
	}
	return $data;
}
function get_all_advance($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `advance` WHERE `short_desc` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['long_desc'] . "</option>";
		}
		$sql = "SELECT * FROM `advance` WHERE `short_desc` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['long_desc'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `advance`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select advance--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['long_desc'] . "</option>";
		}
	}
	return $data;
}
function get_all_property_type($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `property_type` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
		$sql = "SELECT * FROM `property_type` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `property_type`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select property_type--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	}
	return $data;
}

function get_all_property_item($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `property_item` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['item'] . "</option>";
		}
		$sql = "SELECT * FROM `property_item` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['item'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `property_item`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select property_item--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['item'] . "</option>";
		}
	}
	return $data;
}

function get_all_property_source($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `property_source` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['property_source'] . "</option>";
		}
		$sql = "SELECT * FROM `property_source` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['property_source'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `property_source`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select property_source--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['property_source'] . "</option>";
		}
	}
	return $data;
}
function fetchtraining_type($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {

		$sql = "SELECT * FROM `training_type` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
		$sql = "SELECT * FROM `training_type` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `training_type`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select type--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['type'] . "</option>";
		}
	}
	return $data;
}

function get_chargesheet($id)
{
	$conn = dbcon();
	$data = "<option value=''></option>";
	if (!empty($id)) {

		$sql_status = mysqli_query($conn, "select * from charge_sheet_status where id='$id'");
		while ($status_sql = mysqli_fetch_array($sql_status)) {
			$data .= "<option value='" . $status_sql['id'] . "' selected>" . $status_sql['charge_sheet_status'] . "</option>";
		}

		$sql_status = mysqli_query($conn, "select * from charge_sheet_status where id<>'$id'");
		while ($status_sql = mysqli_fetch_array($sql_status)) {
			$data .= "<option value='" . $status_sql['id'] . "'>" . $status_sql['charge_sheet_status'] . "</option>";
		}
	}
	return $data;
}

function get_all_scale($id, $value)
{
	$conn = dbcon();
	$data = "";
	if ($value == '2' || $value == '3') {
		$sql = mysqli_query($conn, "select * from `scale` where `pay_scale_type`='$value' AND 6_cpc_scale='$id'");
		while ($result = mysqli_fetch_array($sql)) {
			$data .= "<option value='" . $result['6_cpc_scale'] . "'>" . $result['6_cpc_scale'] . "</option>";
		}
		$sql = mysqli_query($conn, "select * from `scale` where `pay_scale_type`='$value' AND 6_cpc_scale<>'$id'");
		while ($result = mysqli_fetch_array($sql)) {
			$data .= "<option value='" . $result['6_cpc_scale'] . "'>" . $result['6_cpc_scale'] . "</option>";
		}
	} else if ($value == '4') {
		$str = "";
		$array = explode("-", $id);
		$len = count($array);
		$leng = $len - 1;
		for ($i = 0; $i < $leng; $i++) {
			if ($i == 0)
				$str .= $array[$i];
			else
				$str .= "-" . $array[$i];
		}
		$sql = mysqli_query($conn, "select * from `scale` where `pay_scale_type`='$value' AND 6_cpc_scale='" . $str . "' AND gradepay='" . $array[$leng] . "'");
		while ($result = mysqli_fetch_array($sql)) {
			$data .= "<option selected value='" . $result['6_cpc_scale'] . "-" . $result['gradepay'] . "'>" . $result['6_cpc_scale'] . "-" . $result['gradepay'] . " </option>";
		}
		$sql = mysqli_query($conn, "select * from `scale` where `pay_scale_type`='$value' AND 6_cpc_scale<>'" . $array[0] . "' AND gradepay<>'" . $array[$leng] . "'");
		while ($result = mysqli_fetch_array($sql)) {
			$data .= "<option value='" . $result['6_cpc_scale'] . "-" . $result['gradepay'] . "'>" . $result['6_cpc_scale'] . "-" . $result['gradepay'] . " </option>";
		}
	} else if ($value == '5') {
		$sql = mysqli_query($conn, "select * from `scale` 7_pc_level='$id'");
		//echo "select * from `scale` 7_pc_level='$id'".mysqli_error($conn);
		while ($result = mysqli_fetch_array($sql)) {
			$data .= "<option selected value='" . $result['7_pc_level'] . "'>" . $result['7_pc_level'] . "</option>";
		}
		$sql = mysqli_query($conn, "select * from `scale` where 7_pc_level<>'$id'");
		//echo "select * from `scale` where 7_pc_level<>'$id'".mysqli_error($conn);
		while ($result = mysqli_fetch_array($sql)) {
			$data .= "<option value='" . $result['7_pc_level'] . "'>" . $result['7_pc_level'] . "</option>";
		}
	} else if ($value == '1') {
		$data = $id;
	} else {
		$data = "";
	}

	return $data;
}


function get_pro_source($src, $amt, $cnt)
{
	$conn = dbcon();
	$v = '';
	$sql = "SELECT * FROM `property_source`";
	$data = '';

	$src_data = explode(",", $src);
	$src_count = count($src_data);

	$amt_desc = explode(",", $amt);
	$amt_count = count($amt_desc);
	if ($src_count > 0) {
		for ($i = 0; $i < $src_count; $i++) {
			if ($src_data[$i] != NULL) {
				$v = $i + 1;
				$data .= "<br><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Source Type</label><div class='col-md-8 col-sm-8 col-xs-12' ><select name='pd_sourcr_type" . $cnt . "[" . $v . "]' id='pd_sourcr_type" . $cnt . "' class='form-control select2' style='margin-top:0px; width:100%;' required><option disabled selected >Select Source Type</option>";

				$result = mysqli_query($conn, $sql);
				if ($result) {
					while ($education_data = mysqli_fetch_array($result)) {
						if ($src_data[$i] == $education_data['id']) {
							$data .= "<option value='" . $education_data['id'] . "' selected>" . $education_data['property_source'] . "</option>";
						} else {
							$data .= "<option value='" . $education_data['id'] . "'>" . $education_data['property_source'] . "</option>";
						}
					}

					$data .= "</select></div></div></div>";
					$data .= "<div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group' ><label class='control-label col-md-4 col-sm-1 col-xs-12'>Amount</label><div class='col-md-8 col-sm-12 col-xs-12'><input type='text' id='pd_source_amt" . $cnt . "' name='pd_source_amt" . $cnt . "[" . $v . "]' class='form-control TextNumber' value='" . $amt_desc[$i] . "' required></div></div></div><br>";
				} else {
					$data .= '';
				}
			}
		}
	}
	//$data .= $v;
	return $data;
}

function get_all_relation($id)
{
	$conn = dbcon();
	$data = '';

	if (!empty($id)) {
		$sql = mysqli_query($conn, "select * from relation where code='$id'");
		//echo "select * from relation where id='$id'".mysqli_error($conn);
		while ($result = mysqli_fetch_array($sql)) {
			$data .= "<option value='" . $result['code'] . "'>" . $result['longdesc'] . "</option>";
		}
		$sql1 = mysqli_query($conn, "select * from relation where code<>'$id'");
		//echo "select * from relation where id<>'$id'".mysqli_error($conn);
		while ($result1 = mysqli_fetch_array($sql1)) {
			$data .= "<option value='" . $result1['code'] . "'>" . $result1['longdesc'] . "</option>";
		}
	} else {
		$sql = mysqli_query($conn, "select * from relation");
		//echo "select * from relation".mysqli_error($conn);
		while ($result = mysqli_fetch_array($sql)) {
			$data .= "<option value='" . $result['code'] . "'>" . $result['longdesc'] . "</option>";
		}
	}
	return $data;
}

function get_family_member($id, $pf)
{
	$conn = dbcon1();
	$data = '';
	if (!empty($id) and !empty($pf)) {
		$sql = mysqli_query($conn, "select * from family_temp where emp_pf='$pf' and id='$id'");
		//echo "select * from family_temp where emp_pf='$pf' and id='$id'".mysqli_error($conn);
		while ($result = mysqli_fetch_array($sql)) {
			$data = "<option value='" . $result['id'] . "' selected>" . $result['fmy_member'] . "</option>";
		}
		$sql = mysqli_query($conn, "select * from family_temp where emp_pf='$pf'");
		//echo "select * from family_temp where emp_pf='$pf'".mysqli_error($conn);
		while ($result = mysqli_fetch_array($sql)) {
			$data .= "<option value='" . $result['id'] . "'>" . $result['fmy_member'] . "</option>";
		}
	} else {
		$sql = mysqli_query($conn, "select * from family_temp where emp_pf='$pf'");
		//echo "select * from family_temp where emp_pf='$pf'".mysqli_error($conn);
		while ($result = mysqli_fetch_array($sql)) {
			$data .= "<option value='" . $result['id'] . "'>" . $result['fmy_member'] . "</option>";
		}
	}
	return $data;
}

function get_all_nom_type($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {
		$sql = "SELECT * FROM `nominee_order_type` WHERE `order_type` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['order_type'] . "'>" . $res['order_type'] . "</option>";
		}
		$sql = "SELECT * FROM `nominee_order_type` WHERE `order_type` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['order_type'] . "'>" . $res['order_type'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `nominee_order_type`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select property_type--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['order_type'] . "'>" . $res['order_type'] . "</option>";
		}
	}
	return $data;
}

function fetch_retirement_type($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {
		$sql = "SELECT * FROM `retirement_type` WHERE `id` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['retirement_type'] . "</option>";
		}
		$sql = "SELECT * FROM `retirement_type` WHERE `id` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['retirement_type'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `retirement_type`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select property_type--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['retirement_type'] . "</option>";
		}
	}
	return $data;
}

function get_last_dues($type, $amt)
{
	$data = '';

	$src_data = explode(",", $type);
	$src_count = count($src_data);

	$amt_desc = explode(",", $amt);
	$amt_count = count($amt_desc);
	if ($src_count > 0) {
		for ($i = 0; $i < $src_count; $i++) {
			if ($src_data[$i] != NULL) {


				$data .= "<div class='col-md-12' style='margin-top:20px;' id='add_due_1'><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Type of Due</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='due_type_1' value='" . $src_data[$i] . "' name='due_type[0]' class='form-control TextNumber'></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12'>Amount of Due</label><div class='col-md-8 col-sm-8 col-xs-12'><input type='text' id='due_amt_1' value='" . $amt_desc[$i] . "' name='due_amt[0]' class='form-control TextNumber'></div></div></div></div>";
			} else {
				$data .= '';
			}
		}
	}

	return $data;
}


function fetch_all_sub_penalty_type($id)
{
	$conn = dbcon();
	$data = "";
	if (!empty($id)) {
		$sql = "SELECT * FROM `major_minor_penalty` WHERE `penalty_type` = '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data = "<option selected value='" . $res['id'] . "'>" . $res['penalty_name'] . "</option>";
		}
		$sql = "SELECT * FROM `major_minor_penalty` WHERE `penalty_type` <> '" . $id . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['penalty_name'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `major_minor_penalty`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank'>--select property_type--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['penalty_name'] . "</option>";
		}
	}
	return $data;
}

function fetch_all_saved_sub_penalty_type($p_sub, $p_type)
{
	$conn = dbcon();
	$data = "";
	if (!empty($p_sub)) {
		$sql = "SELECT * FROM `major_minor_penalty` WHERE `id` = '" . $p_sub . "'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option selected value='" . $res['id'] . "'>" . $res['penalty_name'] . "</option>";
		}

		$sql = "SELECT * FROM `major_minor_penalty` WHERE `penalty_type` = '" . $p_type . "' and id <> '$p_sub'";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['penalty_name'] . "</option>";
		}
	} else {
		$sql = "SELECT * FROM `major_minor_penalty`";
		$query = mysqli_query($conn, $sql) or trigger_error("Query Failed: " . mysqli_error($conn));
		$data = "<option selected value='blank' selected disabled hidden>--select Penalty Sub Type--</option>";
		while ($res = mysqli_fetch_array($query)) {
			$data .= "<option value='" . $res['id'] . "'>" . $res['penalty_name'] . "</option>";
		}
	}
	return $data;
}
