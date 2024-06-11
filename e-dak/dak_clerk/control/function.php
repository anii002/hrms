<?php

function getrole($id)
{
  global $db_edak;
  $query = "select role_type from role_user where id='$id'";
  $result = mysql_query($query, $db_edak);
  $value = mysql_fetch_array($result);
  return $value['role_type'];
}
function getSection($id)
{
  global $db_edak;
  $query = "SELECT sec_name from tbl_section where sec_id='$id'";
  $result = mysql_query($query, $db_edak);
  $value = mysql_fetch_array($result);
  return $value['sec_name'];
}
function getSectionMarked($id)
{
  global $db_edak;
  $query = "SELECT sec_name from tbl_section,tbl_user where tbl_section.sec_id=tbl_user.section and emp_id='$id'";
  $result = mysql_query($query, $db_edak);
  $value = mysql_fetch_array($result);
  return $value['sec_name'];
}
function getSectionMarkedtopfno($id)
{
  global $db_edak;
  $query = "SELECT emp_id from tbl_section,tbl_user where tbl_section.sec_id=tbl_user.section and sec_id='$id'";
  $result = mysql_query($query, $db_edak);
  $value = mysql_fetch_array($result);
  return $value['emp_id'];
}
function getStatus($id)
{
  global $db_edak;
  $query = "SELECT status from status where id='$id'";
  $result = mysql_query($query, $db_edak);
  $value = mysql_fetch_array($result);
  return $value['status'];
}
function getSource($id)
{
  global $db_edak;
  $query = "SELECT src_name from master_source where id='$id'";
  $result = mysql_query($query, $db_edak);
  $value = mysql_fetch_array($result);
  return $value['src_name'];
}
function getReplied($id)
{
  global $db_edak;
  $query = "SELECT status from replied_status where id='$id'";
  $result = mysql_query($query, $db_edak);
  $value = mysql_fetch_array($result);
  return $value['status'];
}
function designation($id)
{
  global $db_common;
  $query = "select DESIGSHORTDESC from designations where DESIGCODE='$id'";
  $result = mysql_query($query, $db_common);
  $value = mysql_fetch_array($result);
  return $value['DESIGSHORTDESC'];
}
function getdepartment($id)
{
  global $db_common;
  $query = "SELECT `DEPTDESC` FROM `departments` WHERE `DEPTNO`='" . $id . "' ";
  $result = mysql_query($query, $db_common);
  $value = mysql_fetch_array($result);
  return $value['DEPTDESC'];
}
