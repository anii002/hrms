<?php
function designation($id)
{
  $conn = dbcon1();
  $query = "SELECT `DESIGLONGDESC` FROM `designations` WHERE `DESIGCODE`='$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  return $value['DESIGLONGDESC'];
}
function getdepartment($id)
{
  $conn = dbcon1();
  $query = "select DEPTDESC from department where DEPTNO='$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  return $value['DEPTDESC'];
}
