<?php
function verify_emp($emp_pf)
{
    // global $db;
    $conn=dbcon1();
    $query = "SELECT * FROM `register_user` WHERE `emp_no`='$emp_pf'";
    $rst_emp = mysqli_query($conn,$query);
    if (mysqli_num_rows($rst_emp) > 0) {
        return true;
    } else {
        return false;
    }
}
function designation($id)
{
    // global $db_common;

    $conn=dbcon1();
    $query = "SELECT DESIGLONGDESC FROM designations where DESIGCODE = '$id'";
    $result = mysqli_query($conn,$query);
    $value = mysqli_fetch_array($result);
    return $value['DESIGLONGDESC'];
}
function department($id)
{
    // global $db_common;
    $conn=dbcon1();
    $query = "SELECT DEPTDESC FROM department WHERE  DEPTNO = '$id'";
    $result = mysqli_query($conn,$query);
    $value = mysqli_fetch_assoc($result);
    return $value['DEPTDESC'];
}
function get_emp_info($emp_pf)
{
    // global $db;
    $conn=dbcon1();
    $query = "SELECT * FROM `register_user` WHERE `emp_no`='$emp_pf'";
    $emp_name = "";
    $rst_emp = mysqli_query($conn,$query);
    if (mysqli_num_rows($rst_emp) > 0) {
        $rw_emp = mysqli_fetch_assoc($rst_emp);
    }
    return $rw_emp;
}

    function scheme($id)
    {
        $conn=dbcon();
        $sql = "SELECT * FROM tbl_form_details WHERE reference_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function get_rel($id)
    {
        $conn = dbcon();
        $sql = "SELECT shortdesc FROM unique_relation WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                return $row['shortdesc'];
            } else {
                return null; // or handle the case where no row is found
            }
        } else {
            // Handle query failure
            return null;
        }
    }
    

    function get_rel1($id)
    {
        $conn=dbcon();
        $sql = "SELECT id,shortdesc FROM unique_relation WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        return $row;   
    }
?>
