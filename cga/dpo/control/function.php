<?php
function fetch_dept_profile($id)
{
    $con = dbcon2(); // Assuming dbcon2() is your mysqli connection function
    $data = "";
    
    $deptQuery = "SELECT * FROM department WHERE dept_id='$id'";
    $result = mysqli_query($con, $deptQuery);
    $value = mysqli_fetch_array($result);
    $data .= "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";
    
    $deptQueryAll = "SELECT * FROM department WHERE dept_id <> '$id'";
    $resultAll = mysqli_query($con, $deptQueryAll);
    while ($value = mysqli_fetch_array($resultAll)) {
        $data .= "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";
    }
    
    mysqli_close($con);
    
    return $data;
}

function fetch_design_profile($id)
{
    $con = dbcon2(); // Assuming dbcon2() is your mysqli connection function
    $data = "";
    
    $query = "SELECT * FROM designation WHERE designation='$id'";
    $result = mysqli_query($con, $query);
    $value = mysqli_fetch_array($result);
    $data .= "<option value='".$value['designation']."'>".$value['designation']."</option>";
    
    $queryAll = "SELECT * FROM designation WHERE designation <> '$id'";
    $resultAll = mysqli_query($con, $queryAll);
    while ($value = mysqli_fetch_array($resultAll)) {
        $data .= "<option value='".$value['designation']."'>".$value['designation']."</option>";
    }
    
    mysqli_close($con);
    
    return $data;
}


function fetch_pay_level($id)
{
    $con = dbcon1(); // Assuming dbcon1() is your mysqli connection function
    $data = "";
    
    $query = "SELECT * FROM paylevel WHERE num='$id'";
    $result = mysqli_query($con, $query);
    $value = mysqli_fetch_array($result);
    $data .= "<option value='".$value['num']."'>".$value['pay_text']."</option>";
    
    $queryAll = "SELECT * FROM paylevel WHERE num <> '$id'";
    $resultAll = mysqli_query($con, $queryAll);
    while ($value = mysqli_fetch_array($resultAll)) {
        $data .= "<option value='".$value['num']."'>".$value['pay_text']."</option>";
    }
    
    mysqli_close($con);
    
    return $data;
}

function fetch_station_profile($id)
{
    $con = dbcon2(); // Assuming dbcon2() is your mysqli connection function
    $data = "";
    
    $query = "SELECT * FROM stations WHERE station_id='$id'";
    $result = mysqli_query($con, $query);
    $value = mysqli_fetch_array($result);
    $data .= "<option value='".$value['station_id']."'>".$value['station_name']."</option>";
    
    $queryAll = "SELECT * FROM stations WHERE station_id <> '$id'";
    $resultAll = mysqli_query($con, $queryAll);
    while ($value = mysqli_fetch_array($resultAll)) {
        $data .= "<option value='".$value['station_id']."'>".$value['station_name']."</option>";
    }
    
    mysqli_close($con);
    
    return $data;
}

function fetch_gradepay_profile($id)
{
    $con = dbcon1(); // Assuming dbcon1() is your mysqli connection function
    $data = "";
    
    $query = "SELECT * FROM gradepay WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $value = mysqli_fetch_array($result);
    $data .= "<option value='".$value['id']."'>".$value['gradepay']."</option>";
    
    $queryAll = "SELECT * FROM gradepay WHERE id <> '$id'";
    $resultAll = mysqli_query($con, $queryAll);
    while ($value = mysqli_fetch_array($resultAll)) {
        $data .= "<option value='".$value['id']."'>".$value['gradepay']."</option>";
    }
    
    mysqli_close($con);
    
    return $data;
}

function designation($id)
{
    $con = dbcon2(); // Assuming dbcon2() is your mysqli connection function
    
    $query = "SELECT * FROM designations WHERE DESIGCODE='$id'";
    $result = mysqli_query($con, $query);
    $value = mysqli_fetch_array($result);
    
    mysqli_close($con);
    
    return $value['DESIGLONGDESC'];
}

function getdepartment($id)
{
    $con = dbcon2(); // Assuming dbcon2() is your mysqli connection function
    
    $query = "SELECT * FROM departments WHERE DEPTNO='$id'";
    $result = mysqli_query($con, $query);
    $value = mysqli_fetch_array($result);
    
    mysqli_close($con);
    
    return $value['DEPTDESC'];
}

function getrole($id)
{
    $con = dbcon1(); // Assuming dbcon1() is your mysqli connection function
    
    $query = "SELECT * FROM master_role WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $value = mysqli_fetch_array($result);
    
    mysqli_close($con);
    
    return $value['role_name'];
}

function getcase($id)
{
    $con = dbcon1(); // Assuming dbcon1() is your mysqli connection function
    $query = "SELECT * FROM category WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $value = mysqli_fetch_array($result);
    mysqli_close($con);
    
    if ($value) {
        return $value['case_name'];
    } else {
        return ""; // Handle case where no result is found
    }
}


function getScaleCode($id)
{
    $con = dbcon1(); // Assuming dbcon1() is your mysqli connection function
    $query = "SELECT * FROM gradepay WHERE gradepay='$id'";
    $result = mysqli_query($con, $query);
    $res = mysqli_fetch_array($result);
    
    if ($res) {
        $sql = "SELECT * FROM paylevel WHERE num='" . $res['id'] . "'";
        $result = mysqli_query($con, $sql);
        $value = mysqli_fetch_array($result);
        mysqli_close($con);
        return $value['pay_text'];
    } else {
        mysqli_close($con);
        return ""; // Handle case where no result is found
    }
}

function getMaritailStatus($id)
{
    $con = dbcon2(); // Assuming dbcon2() is your mysqli connection function
    $query = "SELECT * FROM marital_status WHERE code='$id'";
    $result = mysqli_query($con, $query);
    $value_emp = mysqli_fetch_array($result);
    mysqli_close($con);
    
    if ($value_emp) {
        return $value_emp['shortdesc'];
    } else {
        return ""; // Handle case where no result is found
    }
}

function getRelation($id)
{
    $con = dbcon1(); // Assuming dbcon1() is your mysqli connection function
    $query = "SELECT * FROM relation WHERE code='$id'";
    $result = mysqli_query($con, $query);
    $value_emp = mysqli_fetch_array($result);
    mysqli_close($con);
    return $value_emp['shortdesc'];
}

function getGender($id)
{
    $con = dbcon2(); // Assuming dbcon2() is your mysqli connection function
    $query = "SELECT * FROM gender WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $value_emp = mysqli_fetch_array($result);
    mysqli_close($con);
    return $value_emp['gender'];
}

function getName($id) {
    $con = dbcon2(); // Assuming dbcon2() returns the mysqli connection object

    $query_emp = "SELECT name FROM register_user WHERE emp_no='$id'";
    $result_emp = mysqli_query($con, $query_emp);

    if (!$result_emp) {
        die('Error: ' . mysqli_error($con)); // Handle query error gracefully
    }

    $value_emp = mysqli_fetch_array($result_emp);
    return ($value_emp) ? $value_emp['name'] : "User not found";
}

?>
