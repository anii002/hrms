<?php
include('../dbcon.php');

function fetch_dept_profile($id)
{
    global $conn;
    $data = "";
    
    $deptQuery = "SELECT * FROM department WHERE dept_id='$id'";
    $result = mysqli_query($conn, $deptQuery);
    $value = mysqli_fetch_array($result);
    $data = "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";

    $deptQueryAll = "SELECT * FROM department WHERE dept_id <> '$id'";
    $resultAll = mysqli_query($conn, $deptQueryAll);
    while($value = mysqli_fetch_array($resultAll)) {
        $data .= "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";
    }

    return $data;
}

function fetch_design_profile($id)
{
    global $conn;
    $data = "";
    
    $query = "SELECT * FROM designation WHERE designation='$id'";
    $result = mysqli_query($conn, $query);
    $value = mysqli_fetch_array($result);
    $data = "<option value='".$value['designation']."'>".$value['designation']."</option>";

    $queryAll = "SELECT * FROM designation WHERE designation <> '$id'";
    $resultAll = mysqli_query($conn, $queryAll);
    while($value = mysqli_fetch_array($resultAll)) {
        $data .= "<option value='".$value['designation']."'>".$value['designation']."</option>";
    }

    return $data;
}

function fetch_pay_level($id)
{
    global $conn;
    $data = "";
    
    $query = "SELECT * FROM paylevel WHERE num='$id'";
    $result = mysqli_query($conn, $query);
    $value = mysqli_fetch_array($result);
    $data = "<option value='".$value['num']."'>".$value['pay_text']."</option>";

    $queryAll = "SELECT * FROM paylevel WHERE num <> '$id'";
    $resultAll = mysqli_query($conn, $queryAll);
    while($value = mysqli_fetch_array($resultAll)) {
        $data .= "<option value='".$value['num']."'>".$value['pay_text']."</option>";
    }

    return $data;
}

function fetch_station_profile($id)
{
    global $conn;
    $data = "";
    
    $query = "SELECT * FROM stations WHERE station_id='$id'";
    $result = mysqli_query($conn, $query);
    $value = mysqli_fetch_array($result);
    $data = "<option value='".$value['station_id']."'>".$value['station_name']."</option>";

    $queryAll = "SELECT * FROM stations WHERE station_id <> '$id'";
    $resultAll = mysqli_query($conn, $queryAll);
    while($value = mysqli_fetch_array($resultAll)) {
        $data .= "<option value='".$value['station_id']."'>".$value['station_name']."</option>";
    }

    return $data;
}

function fetch_gradepay_profile($id)
{
    global $conn;
    $data = "";
    
    $query = "SELECT * FROM gradepay WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $value = mysqli_fetch_array($result);
    $data = "<option value='".$value['id']."'>".$value['gradepay']."</option>";

    $queryAll = "SELECT * FROM gradepay WHERE id <> '$id'";
    $resultAll = mysqli_query($conn, $queryAll);
    while($value = mysqli_fetch_array($resultAll)) {
        $data .= "<option value='".$value['id']."'>".$value['gradepay']."</option>";
    }

    return $data;
}

function designation($id)
{
    global $conn;
    
    $query = "SELECT `DESIGLONGDESC` FROM `designations` WHERE `DESIGCODE`='$id'";
    $result = mysqli_query($conn, $query);
    $value = mysqli_fetch_array($result);
    return $value['DESIGLONGDESC'];
}

function getdepartment($id)
{
    global $conn;
    
    $query = "SELECT DEPTDESC FROM department WHERE DEPTNO='$id'";
    $result = mysqli_query($conn, $query);
    $value = mysqli_fetch_array($result);
    return $value['DEPTDESC'];
}

function getdepot($id)
{
    global $conn;
    
    $query = "SELECT `depot` FROM `depot_master` WHERE `id`='$id'";
    $result = mysqli_query($conn, $query);
    $value = mysqli_fetch_array($result);
    return $value['depot'];
}

function getjourneytype($id)
{
    global $conn;
    
    $query = "SELECT `journey_type` FROM `journey_type_master` WHERE `id`='$id'";
    $result = mysqli_query($conn, $query);
    $value = mysqli_fetch_array($result);
    return $value['journey_type'];
}

function getjourneypurpose($id)
{
    global $conn;
    
    $query = "SELECT `journey_purpose` FROM `journey_purpose_master` WHERE `id`='$id'";
    $result = mysqli_query($conn, $query);
    $value = mysqli_fetch_array($result);
    return $value['journey_purpose'];
}

function getobjective($id)
{
    global $conn;
    
    $query = "SELECT `objective` FROM `taentry_master` WHERE `reference_no`='$id'";
    $result = mysqli_query($conn, $query);
    $value = mysqli_fetch_array($result);
    return $value['objective'];
}
?>
