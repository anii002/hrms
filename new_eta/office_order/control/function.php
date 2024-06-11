<?php
function fetch_dept_profile($id)
{
  //fetch department using id
  $data = "";
  $dept = "select * from department where dept_id='$id'";
  $result = mysql_query($dept);
  $value = mysql_fetch_array($result);
  $data = "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";
  $dept = "select * from department where dept_id <> '$id'";
  $result = mysql_query($dept);
  while($value = mysql_fetch_array($result))
    $data .= "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";
  return $data;
}

function fetch_design_profile($id)
{
  //fetch designation using id
  $data = "";
  $query = "select * from designation where designation='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  $data = "<option value='".$value['designation']."'>".$value['designation']."</option>";
  $query = "select * from designation where designation <> '$id'";
  $result = mysql_query($query);
  while($value = mysql_fetch_array($result))
    $data .= "<option value='".$value['designation']."'>".$value['designation']."</option>";
  return $data;
}

function fetch_pay_level($id)
{
  $data = "";
  $query = "select * from paylevel where num='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  $data = "<option value='".$value['num']."'>".$value['pay_text']."</option>";
  $query = "select * from paylevel where num <> '$id'";
  $result = mysql_query($query);
  while($value = mysql_fetch_array($result))
    $data .= "<option value='".$value['num']."'>".$value['pay_text']."</option>";
  return $data;
}
function fetch_station_profile($id)
{
  //fetch designation using id
  $data = "";
  $query = "select * from stations where station_id='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  $data = "<option value='".$value['station_id']."'>".$value['station_name']."</option>";
  $query = "select * from stations where station_id <> '$id'";
  $result = mysql_query($query);
  while($value = mysql_fetch_array($result))
    $data .= "<option value='".$value['station_id']."'>".$value['station_name']."</option>";
  return $data;
}
function fetch_station($code)
{
  $query = "SELECT `stationdesc` FROM `station` WHERE `stationcode`='$code'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['stationdesc'];
}
function fetch_gradepay_profile($id)
{
  //fetch designation using id
  $data = "";
  $query = "select * from gradepay where id='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  $data = "<option value='".$value['id']."'>".$value['gradepay']."</option>";
  $query = "select * from gradepay where id <> '$id'";
  $result = mysql_query($query);
  while($value = mysql_fetch_array($result))
    $data .= "<option value='".$value['id']."'>".$value['gradepay']."</option>";
  return $data;
}
function designation($id)
{
  $query = "SELECT `DESIGLONGDESC` FROM `designations` WHERE `DESIGCODE`='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['DESIGLONGDESC'];
}
function getdepartment($id)
{
  $query = "select DEPTDESC from department where DEPTNO='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['DEPTDESC'];
}
function getdepot($id)
{
  $query = "SELECT `depot` FROM `depot_master` WHERE `id`='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['depot'];
}
function getjourneytype($id)
{
  $query = "SELECT `journey_type` FROM `journey_type_master` WHERE `id`='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['journey_type'];
}
function getjourneypurpose($id)
{
  $query = "SELECT `journey_purpose` FROM `journey_purpose_master` WHERE `id`='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['journey_purpose'];
}
function getobjective($id)
{
  $query = "SELECT `objective` FROM `taentry_master` WHERE `reference_no`='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['objective'];
}
?>
