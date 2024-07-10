<?php
function verify_emp($emp_pf)
{
    // global $db;
    dbcon1();
    $query = "SELECT * FROM `register_user` WHERE `emp_no`='$emp_pf'";
    $rst_emp = mysql_query($query);
    if (mysql_num_rows($rst_emp) > 0) {
        return true;
    } else {
        return false;
    }
}
function designation($id)
{
    // global $db_common;

    dbcon1();
    $query = "SELECT DESIGLONGDESC FROM designations where DESIGCODE = '$id'";
    $result = mysql_query($query);
    $value = mysql_fetch_array($result);
    return $value['DESIGLONGDESC'];
}
function department($id)
{
    // global $db_common;
    dbcon1();
    $query = "SELECT DEPTDESC FROM department WHERE  DEPTNO = '$id'";
    $result = mysql_query($query);
    $value = mysql_fetch_assoc($result);
    return $value['DEPTDESC'];
}
function get_emp_info($emp_pf)
{
    // global $db;
    dbcon1();
    $query = "SELECT * FROM `register_user` WHERE `emp_no`='$emp_pf'";
    $emp_name = "";
    $rst_emp = mysql_query($query);
    if (mysql_num_rows($rst_emp) > 0) {
        $rw_emp = mysql_fetch_assoc($rst_emp);
    }
    return $rw_emp;
}

    function scheme($id)
    {
        dbcon();
        $sql = "SELECT * FROM tbl_form_details WHERE reference_id = '$id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        return $row;
    }

    function get_rel($id)
    {
        dbcon();
        $sql = "SELECT shortdesc FROM unique_relation WHERE id = '$id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        return $row['shortdesc'];   
    }

    function get_rel1($id)
    {
        dbcon();
        $sql = "SELECT id,shortdesc FROM unique_relation WHERE id = '$id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        return $row;   
    }
?>
