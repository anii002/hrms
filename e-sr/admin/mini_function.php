<?php
require_once('../dbconfig/dbcon.php');

error_reporting(0);

function bill_depot1($id) 
{
	$conn = dbcon();
	if (!empty($id)) 
	{
		$sql = "SELECT * FROM `billunit` WHERE `id` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if($res = $result->fetch_assoc()) {
			return $res['billunit'] . "&nbsp;" . $res['deopt'];
		}
	}
	return $id;
}

function bill_depot($id) 
{
	$conn = dbcon();
	if (!empty($id)) 
	{
		$sql = "SELECT * FROM `billunit` WHERE `billunit` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if($res = $result->fetch_assoc()) {
			return $res['billunit'] . "&nbsp;" . $res['deopt'];
		}
	}
	return $id;
}

function bill_id($id) 
{
	$conn = dbcon();
	if (!empty($id)) 
	{
		$sql = "SELECT * FROM `billunit` WHERE `id` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if($res = $result->fetch_assoc()) {
			return $res['id'];
		}
	}
	return $id;
}

function bill_to_id($id) 
{
 $conn = dbcon1();

	if (!empty($id)) 
	{
		$sql = "SELECT * FROM `billunit` WHERE `billunit` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if($res = $result->fetch_assoc()) {
			return $res['id'];
		}
	}
	return $id;
}
	


function get_religion($id) 
{
	$conn = dbcon();
	if (!empty($id)) 
	{
		$sql = "SELECT * FROM `religion` WHERE `id` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['longdesc'];
		}
	}
	return $id;
}

function get_community($id)
{
	$conn = dbcon();
	if (!empty($id))
	{
		$sql = "SELECT * FROM `community` WHERE `id` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['LONGDESC'];
		}
	}
	return $id;
}

function get_depot($id) 
{
	$conn = dbcon();
	if (!empty($id))
	{
		$sql = "SELECT * FROM `billunit` WHERE `id` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['deopt'];
		}
	}
	return $id;
}

function get_ps($id) 
{
	if($id == 1)
		return 'Scale';
	else
		return 'Level';
}

function get_gender($id)
{
	$conn = dbcon();
	if (!empty($id))
	{
		$sql = "SELECT * FROM gender WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['gender'];
		}
	}
	return $id;
}

function get_group($id)
{
	$conn = dbcon();
	if (!empty($id))
	{
		$sql = "SELECT * FROM group_col WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['group_col'];
		}
	}
	return $id;
}

function get_department($id) 
{
	$conn = dbcon();
	if (!empty($id)) 
	{
		$sql = "SELECT * FROM `department` WHERE `id` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['DEPTDESC'];
		}
	}
	return $id;
}

function get_designation($id)
{
	$conn = dbcon();
	if (!empty($id))
	{
		$sql = "SELECT * FROM `designation` WHERE `id` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['desiglongdesc'];
		}
	}
	return $id;
}

function get_appointment_type($id)
{
	$conn = dbcon();
	if (!empty($id))
	{
		$sql = "SELECT * FROM `appointment_type` WHERE `id` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['type'];
		}
	}
	return $id;
}

function get_medi_category($id)
{
	$conn = dbcon();
	if (!empty($id)) {
		$sql = "SELECT * FROM `medical_classi` WHERE `id` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['longdesc'];
		}
	}
	return $id;
}

function get_station($id) 
{
	$conn = dbcon();
	if (!empty($id)) {
		$sql = "SELECT * FROM `station` WHERE `stationcode` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['stationdesc'];
		}
	}
	return $id;
}

function get_billunit($id) 
{
	$conn = dbcon();
	if (!empty($id)) {
		$sql = "SELECT * FROM `billunit` WHERE `id` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['billunit'];
		}
	}
	return $id;
}

function get_prtf_type($id)
{
	$conn = dbcon();
	if (!empty($id)) {
		$sql = "SELECT * FROM `prtf_type` WHERE `id` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['prtf_type'];
		}
	}
	return $id;
}

function get_advance($id) 
{
	$conn = dbcon();
	if (!empty($id)) {
		$sql = "SELECT * FROM `advance` WHERE `id` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['long_desc'];
		}
	}
	return $id;
}

function get_relation($id) 
{
	$conn = dbcon();
	if (!empty($id)) {
		$sql = "SELECT * FROM `relation` WHERE `code` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['longdesc'];
		}
	}
	return $id;
}

function get_nom_type($id) 
{
	$conn = dbcon();
	if (!empty($id)) {
		$sql = "SELECT * FROM `nomination_type` WHERE `id` = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['nomination_type'];
		}
	}
	return $id;
}
	
	
function got_mr($mr)
{
	$conn = dbcon();
	if (!empty($mr)) {
		$sql = "SELECT * FROM marital_status WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $mr);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($fetch_mr = $result->fetch_assoc()) {
			return $fetch_mr['shortdesc'];
		}
	}
	return $mr;
}

function got_award($mr)
{
	$conn = dbcon();
	if (!empty($mr)) {
		$sql = "SELECT * FROM awards WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $mr);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($fetch_mr = $result->fetch_assoc()) {
			return $fetch_mr['awards'];
		}
	}
	return $mr;
}

function fetch_user($user)
{
	$conn = dbcon();
	if (!empty($user)) {
		$sql = "SELECT * FROM tbl_login WHERE adminid = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $user);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['username'];
		}
	}
	return $user;
}

function fetch_user_name($user)
{
	$conn = dbcon();
	if (!empty($user)) {
		$sql = "SELECT * FROM tbl_login WHERE adminid = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $user);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['adminname'];
		}
	}
	return $user;
}

function get_recruitment_code($user)
{
	$conn = dbcon();
	if (!empty($user)) {
		$sql = "SELECT * FROM recruitment WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $user);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['shortdesc'];
		}
	}
	return $user;
}

function get_initial_edu($user)
{
	$conn = dbcon();
	$data = explode(",", $user);
	$edu = "";

	foreach ($data as $out) {
		$sql = "SELECT education FROM education WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $out);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			$edu .= " " . $res['education'];
		}
	}
	return $edu;
}

function get_source_typ($src)
{
	$conn = dbcon();
	$data = explode(",", $src);
	$edu = "";

	foreach ($data as $out) {
		$sql = "SELECT property_source FROM property_source WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $out);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			$edu .= " " . $res['property_source'] . "<br>";
		}
	}
	return $edu;
}

function get_sub_edu($user)
{
	$conn = dbcon();
	$data = explode(",", $user);
	$edu = "";

	foreach ($data as $out) {
		$sql = "SELECT education FROM education WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $out);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			$edu .= " " . $res['education'];
		}
	}
	return $edu;
}

function get_pme($mr)
{
	$conn = dbcon();
	if (!empty($mr)) {
		$sql = "SELECT * FROM medical_pme_class WHERE short_desc = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $mr);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['short_desc'];
		}
	}
	return $mr;
}

function get_appo_type($mr)
{
	$conn = dbcon();
	if (!empty($mr)) {
		$sql = "SELECT * FROM appointment_type WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $mr);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['type'];
		}
	}
	return $mr;
}

function get_pay_scale_type($mr)
{
	$conn = dbcon();
	if (!empty($mr)) {
		$sql = "SELECT * FROM pay_scale_type WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $mr);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['type'];
		}
	}
	return $mr;
}

function get_order_type_pro_rev($mr)
{
	$conn = dbcon();
	if (!empty($mr)) {
		$sql = "SELECT * FROM order_type_pro_rev WHERE shortdesc = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $mr);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['longdesc'];
		}
	}
	return $mr;
}

function get_order_type_transfer($mr)
{
	$conn = dbcon();
	if (!empty($mr)) {
		$sql = "SELECT * FROM order_type_transfer WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $mr);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['type'];
		}
	}
	return $mr;
}

function get_order_type_fixation($mr)
{
	$conn = dbcon();
	if (!empty($mr)) {
		$sql = "SELECT * FROM order_type_fixation WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $mr);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['type'];
		}
	}
	return $mr;
}

function get_penalty_type($mr)
{
	$conn = dbcon();
	if (!empty($mr)) {
		$sql = "SELECT * FROM penalty_type WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $mr);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($res = $result->fetch_assoc()) {
			return $res['type'];
		}
	}
	return $mr;
}
	
function get_increment_type($mr)
{
    $conn = dbcon();
    if (!empty($mr)) {
        $sql = "SELECT increment_type FROM increment_type WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mr);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($fetch_mr = $result->fetch_assoc()) {
            return $fetch_mr['increment_type'];
        }
    }
    return $mr;
}

function get_awarded_by($mr)
{
    $conn = dbcon();
    if (!empty($mr)) {
        $sql = "SELECT awarded_by FROM awarded_by WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mr);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($fetch_mr = $result->fetch_assoc()) {
            return $fetch_mr['awarded_by'];
        }
    }
    return $mr;
}

function get_awards($mr)
{
    $conn = dbcon();
    if (!empty($mr)) {
        $sql = "SELECT awards FROM awards WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mr);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($fetch_mr = $result->fetch_assoc()) {
            return $fetch_mr['awards'];
        }
    }
    return $mr;
}

function get_property_type($mr)
{
    $conn = dbcon();
    if (!empty($mr)) {
        $sql = "SELECT type FROM property_type WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mr);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($fetch_mr = $result->fetch_assoc()) {
            return $fetch_mr['type'];
        }
    }
    return $mr;
}

function get_property_item($mr)
{
    $conn = dbcon();
    if (!empty($mr)) {
        $sql = "SELECT item FROM property_item WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mr);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($fetch_mr = $result->fetch_assoc()) {
            return $fetch_mr['item'];
        }
    }
    return $mr;
}

function get_property_source($mr)
{
    $conn = dbcon();
    if (!empty($mr)) {
        $sql = "SELECT property_source FROM property_source WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mr);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($fetch_mr = $result->fetch_assoc()) {
            return $fetch_mr['property_source'];
        }
    }
    return $mr;
}

function get_training_type($mr)
{
    $conn = dbcon();
    if (!empty($mr)) {
        $sql = "SELECT type FROM training_type WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mr);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($fetch_mr = $result->fetch_assoc()) {
            return $fetch_mr['type'];
        }
    }
    return $mr;
}

function get_charge_sheet_status($mr)
{
    $conn = dbcon();
    if (!empty($mr)) {
        $sql = "SELECT charge_sheet_status FROM charge_sheet_status WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mr);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($fetch_mr = $result->fetch_assoc()) {
            return $fetch_mr['charge_sheet_status'];
        }
    }
    return $mr;
}

function get_emp_name($mr)
{
    $conn = dbcon1();
    if (!empty($mr)) {
        $sql = "SELECT emp_name FROM biodata_temp WHERE pf_number = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mr);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($fetch_mr = $result->fetch_assoc()) {
            return $fetch_mr['emp_name'];
        }
    }
    return $mr;
}

function get_billunit_report($mr)
{
    $conn = dbcon();
    if (!empty($mr)) {
        $sql = "SELECT id FROM billunit WHERE billunit = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mr);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($f = $result->fetch_assoc()) {
            return $f['id'];
        }
    }
    return $mr;
}
	
function get_fam_name($id)
{
    $conn1 = dbcon1();
    if (!empty($id)) {
        $sql = "SELECT fmy_member FROM family_temp WHERE id = ?";
        $stmt = $conn1->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($res = $result->fetch_assoc()) {
            return $res['fmy_member'];
        }
    }
    return $id;
}

function get_retirement_type($id)
{
    $conn = dbcon();
    if (!empty($id)) {
        $sql = "SELECT retirement_type FROM retirement_type WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($res = $result->fetch_assoc()) {
            return $res['retirement_type'];
        }
    }
    return $id;
}

function get_pf_designation($pf)
{
    $conn1 = dbcon1();
    $sql = "SELECT preapp_designation FROM present_work_temp WHERE preapp_pf_number = ?";
    $stmt = $conn1->prepare($sql);
    $stmt->bind_param("s", $pf);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($res = $result->fetch_assoc()) {
        return get_designation($res['preapp_designation']);
    }
    return null;
}

function get_pf_aadhar($pf)
{
    $conn1 = dbcon1();
    $sql = "SELECT aadhar_number FROM biodata_temp WHERE pf_number = ?";
    $stmt = $conn1->prepare($sql);
    $stmt->bind_param("s", $pf);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($res = $result->fetch_assoc()) {
        return $res['aadhar_number'];
    }
    return null;
}

function get_pf_department($pf)
{
    $conn1 = dbcon1();
    $sql = "SELECT preapp_department FROM present_work_temp WHERE preapp_pf_number = ?";
    $stmt = $conn1->prepare($sql);
    $stmt->bind_param("s", $pf);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($res = $result->fetch_assoc()) {
        return $res['preapp_department'];
    }
    return null;
}

function get_pf_billunit($billunit)
{
    $conn1 = dbcon1();
    $sql = "SELECT preapp_billunit FROM present_work_temp WHERE preapp_pf_number = ?";
    $stmt = $conn1->prepare($sql);
    $stmt->bind_param("s", $billunit);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($res = $result->fetch_assoc()) {
        return $res['preapp_billunit'];
    }
    return null;
}

?>