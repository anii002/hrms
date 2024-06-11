<?php
function getdepartment($id)
{
  dbcon2();
  $query = "select DEPTDESC from department where DEPTNO='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['DEPTDESC'];
}
?>
