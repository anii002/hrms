<?php
function designation($id)
{
  dbcon();
  $query = "SELECT `DESIGLONGDESC` FROM `designations` WHERE `DESIGCODE`='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['DESIGLONGDESC'];
}
function getdepartment($id)
{
  dbcon();
  $query = "select DEPTDESC from department where DEPTNO='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['DEPTDESC'];
}
?>
