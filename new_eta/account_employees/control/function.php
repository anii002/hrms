<?php

// Assuming $conn is your MySQLi connection object

function get_employee($id)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT name FROM employees WHERE pfno='".$id."'");
    $result = mysqli_fetch_array($query);
    return ($result) ? $result['name'] : null;
}

function get_dept_shortform($id)
{
    global $conn;
    $sql = mysqli_query($conn, "SELECT shortform FROM `department` WHERE DEPTNO='".$id."'");
    $row = mysqli_fetch_array($sql);
    return ($row) ? $row['shortform'] : null;
}

function fetch_dept_profile($id)
{
    global $conn;
    $data = "";
    $dept_query = mysqli_query($conn, "SELECT * FROM department WHERE dept_id='$id'");
    $value = mysqli_fetch_array($dept_query);
    if ($value) {
        $data = "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";
    }

    $dept_query_all = mysqli_query($conn, "SELECT * FROM department WHERE dept_id <> '$id'");
    while ($value = mysqli_fetch_array($dept_query_all)) {
        $data .= "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";
    }
    return $data;
}

function fetch_design_profile($id)
{
    global $conn;
    $data = "";
    $query = mysqli_query($conn, "SELECT * FROM designation WHERE designation='$id'");
    $value = mysqli_fetch_array($query);
    if ($value) {
        $data = "<option value='".$value['designation']."'>".$value['designation']."</option>";
    }

    $query_all = mysqli_query($conn, "SELECT * FROM designation WHERE designation <> '$id'");
    while ($value = mysqli_fetch_array($query_all)) {
        $data .= "<option value='".$value['designation']."'>".$value['designation']."</option>";
    }
    return $data;
}

function fetch_pay_level($id)
{
    global $conn;
    $data = "";
    $query = mysqli_query($conn, "SELECT * FROM paylevel WHERE num='$id'");
    $value = mysqli_fetch_array($query);
    if ($value) {
        $data = "<option value='".$value['num']."'>".$value['pay_text']."</option>";
    }

    $query_all = mysqli_query($conn, "SELECT * FROM paylevel WHERE num <> '$id'");
    while ($value = mysqli_fetch_array($query_all)) {
        $data .= "<option value='".$value['num']."'>".$value['pay_text']."</option>";
    }
    return $data;
}

function fetch_station_profile($id)
{
    global $conn;
    $data = "";
    $query = mysqli_query($conn, "SELECT * FROM stations WHERE station_id='$id'");
    $value = mysqli_fetch_array($query);
    if ($value) {
        $data = "<option value='".$value['station_id']."'>".$value['station_name']."</option>";
    }

    $query_all = mysqli_query($conn, "SELECT * FROM stations WHERE station_id <> '$id'");
    while ($value = mysqli_fetch_array($query_all)) {
        $data .= "<option value='".$value['station_id']."'>".$value['station_name']."</option>";
    }
    return $data;
}

function fetch_station($code)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT `stationdesc` FROM `station` WHERE `stationcode`='$code'");
    $value = mysqli_fetch_array($query);
    return ($value) ? $value['stationdesc'] : null;
}

function fetch_gradepay_profile($id)
{
    global $conn;
    $data = "";
    $query = mysqli_query($conn, "SELECT * FROM gradepay WHERE id='$id'");
    $value = mysqli_fetch_array($query);
    if ($value) {
        $data = "<option value='".$value['id']."'>".$value['gradepay']."</option>";
    }

    $query_all = mysqli_query($conn, "SELECT * FROM gradepay WHERE id <> '$id'");
    while ($value = mysqli_fetch_array($query_all)) {
        $data .= "<option value='".$value['id']."'>".$value['gradepay']."</option>";
    }
    return $data;
}

function designation($id)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT `DESIGLONGDESC` FROM `designations` WHERE `DESIGCODE`='$id'");
    $value = mysqli_fetch_array($query);
    return ($value) ? $value['DESIGLONGDESC'] : null;
}

function getdepartment($id)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT DEPTDESC FROM department WHERE DEPTNO='$id'");
    $value = mysqli_fetch_array($query);
    return ($value) ? $value['DEPTDESC'] : null;
}

function getdepot($id)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT `depot` FROM `depot_master` WHERE `id`='$id'");
    $value = mysqli_fetch_array($query);
    return ($value) ? $value['depot'] : null;
}

function getjourneytype($id)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT `journey_type` FROM `journey_type_master` WHERE `id`='$id'");
    $value = mysqli_fetch_array($query);
    return ($value) ? $value['journey_type'] : null;
}

function getjourneypurpose($id)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT `journey_purpose` FROM `journey_purpose_master` WHERE `id`='$id'");
    $value = mysqli_fetch_array($query);
    return ($value) ? $value['journey_purpose'] : null;
}

function getobjective($id)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT `objective` FROM `taentry_master` WHERE `reference_no`='$id'");
    $value = mysqli_fetch_array($query);
    return ($value) ? $value['objective'] : null;
}

function getcardpass($id)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT `cardpass` FROM `taentry_master` WHERE `reference_no`='$id'");
    $value = mysqli_fetch_array($query);
    return ($value) ? $value['cardpass'] : null;
}

function getrole($id)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT role_desc FROM `roles` WHERE role_id='".$id."'");
    $row = mysqli_fetch_array($query);
    return ($row) ? $row['role_desc'] : null;
}

function getEmpName($id)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT name FROM `employees` WHERE pfno='$id'");
    $value = mysqli_fetch_array($query);
    return ($value) ? $value['name'] : null;
}

?>
