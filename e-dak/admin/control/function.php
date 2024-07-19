<?php

function getrole($id)
{
  global $db_edak;
  $query = "select role_type from role_user where id='$id'";
  $result = mysqli_query($db_edak,$query);
  $value = mysqli_fetch_array($result);
  return $value['role_type'];
}
function getSection($id)
{
  global $db_edak;
  $query = "SELECT sec_name from tbl_section where sec_id='$id'";
  $result = mysqli_query($db_edak,$query);
  $value = mysqli_fetch_array($result);
  return $value['sec_name'];
}
function getSectionMarked($id)
{
    global $db_edak;
    $query = "SELECT sec_name 
              FROM tbl_section 
              JOIN tbl_user ON tbl_section.sec_id = tbl_user.section 
              WHERE emp_id = '$id'";

    $result = mysqli_query($db_edak, $query);

    // Check if the query was successful
    if (!$result) {
        // Log or handle query error
        return "Query Error: " . mysqli_error($db_edak);
    }

    // Check if any rows were returned
    if ($value = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        return $value['sec_name'];
    } else {
        // Return a default value or message if no results are found
        return "Section Not Found";
    }
}

function getStatus($id)
{
  global $db_edak;
  $query = "SELECT status from status where id='$id'";
  $result = mysqli_query($db_edak,$query);
  $value = mysqli_fetch_array($result);
  return $value['status'];
}
function getSource($id)
{
  global $db_edak;
  $query = "SELECT src_name from master_source where id='$id'";
  $result = mysqli_query($db_edak,$query);
  $value = mysqli_fetch_array($result);
  return $value['src_name'];
}
function getReplied($id)
{
  global $db_edak;
  $query = "SELECT status from replied_status where id='$id'";
  $result = mysqli_query($db_edak,$query);
  $value = mysqli_fetch_array($result);
  return $value['status'];
}

function designation($id)
{
  global $db_common;
  $query = "select DESIGSHORTDESC from designations where DESIGCODE='$id'";
  $result = mysqli_query($db_common,$query);
  $value = mysqli_fetch_array($result);
  return $value['DESIGSHORTDESC'];
}
function getdepartment($id)
{
  global $db_common;
  $query = "SELECT `DEPTDESC` FROM `departments` WHERE `DEPTNO`='" . $id . "' ";
  $result = mysqli_query($db_common,$query);
  $value = mysqli_fetch_array($result);
  return $value['DEPTDESC'];
}
