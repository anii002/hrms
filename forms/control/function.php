<?php
function fetch_dept_profile($id)
{
  $con1 = dbcon1();

  //fetch department using id
  $data = "";
  $dept = "select * from department where dept_id='$id'";
  $result = mysqli_query($con1, $dept);
  $value = mysqli_fetch_array($result);
  $data = "<option value='" . $value['dept_id'] . "'>" . $value['deptname'] . "</option>";
  $dept = "select * from department where dept_id <> '$id'";
  $result = mysqli_query($con1, $dept);
  while ($value = mysqli_fetch_array($result))
    $data .= "<option value='" . $value['dept_id'] . "'>" . $value['deptname'] . "</option>";
  return $data;
}

function fetch_design_profile($id)
{
  $con1 = dbcon1();
  //fetch designation using id
  $data = "";
  $query = "select * from designation where designation='$id'";
  $result = mysqli_query($con1, $query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='" . $value['designation'] . "'>" . $value['designation'] . "</option>";
  $query = "select * from designation where designation <> '$id'";
  $result = mysqli_query($con1, $query);
  while ($value = mysqli_fetch_array($result))
    $data .= "<option value='" . $value['designation'] . "'>" . $value['designation'] . "</option>";
  return $data;
}

function fetch_pay_level($id)
{
  $con1 = dbcon1();
  $data = "";
  $query = "select * from paylevel where num='$id'";
  $result = mysqli_query($con1, $query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='" . $value['num'] . "'>" . $value['pay_text'] . "</option>";
  $query = "select * from paylevel where num <> '$id'";
  $result = mysqli_query($con1, $query);
  while ($value = mysqli_fetch_array($result))
    $data .= "<option value='" . $value['num'] . "'>" . $value['pay_text'] . "</option>";
  return $data;
}
function fetch_station_profile($id)
{
  $con1 = dbcon1();
  //fetch designation using id
  $data = "";
  $query = "select * from stations where station_id='$id'";
  $result = mysqli_query($con1, $query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='" . $value['station_id'] . "'>" . $value['station_name'] . "</option>";
  $query = "select * from stations where station_id <> '$id'";
  $result = mysqli_query($con1, $query);
  while ($value = mysqli_fetch_array($result))
    $data .= "<option value='" . $value['station_id'] . "'>" . $value['station_name'] . "</option>";
  return $data;
}
function fetch_station($code)
{
  $con1 = dbcon1();
  $query = "SELECT `stationdesc` FROM `station` WHERE `stationcode`='$code'";
  $result = mysqli_query($con1, $query);
  $value = mysqli_fetch_array($result);
  return $value['stationdesc'];
}
function fetch_gradepay_profile($id)
{
  $con1 = dbcon1();
  //fetch designation using id
  $data = "";
  $query = "select * from gradepay where id='$id'";
  $result = mysqli_query($con1, $query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='" . $value['id'] . "'>" . $value['gradepay'] . "</option>";
  $query = "select * from gradepay where id <> '$id'";
  $result = mysqli_query($con1, $query);
  while ($value = mysqli_fetch_array($result))
    $data .= "<option value='" . $value['id'] . "'>" . $value['gradepay'] . "</option>";
  return $data;
}
function designation($id)
{
  $con = dbcon2();
  $query = "SELECT `DESIGLONGDESC` FROM `designations` WHERE `DESIGCODE`='$id'";
  $result = mysqli_query($con, $query);
  $value = mysqli_fetch_array($result);
  return $value['DESIGLONGDESC'];
}
function getdepartment($id)
{
  $con = dbcon2();
  $query = "select DEPTDESC from department where DEPTNO='$id'";
  $result = mysqli_query($con, $query);
  $value = mysqli_fetch_array($result);
  return $value['DEPTDESC'];
}
function getdepot($id)
{
  $con1 = dbcon1();
  $query = "SELECT `depot` FROM `depot_master` WHERE `id`='$id'";
  $result = mysqli_query($con1, $query);
  $value = mysqli_fetch_array($result);
  return $value['depot'];
}
function getjourneytype($id)
{
  $con1 = dbcon1();
  $query = "SELECT `journey_type` FROM `journey_type_master` WHERE `id`='$id'";
  $result = mysqli_query($con1, $query);
  $value = mysqli_fetch_array($result);
  return $value['journey_type'];
}
function getjourneypurpose($id)
{
  $con1 = dbcon1();
  $query = "SELECT `journey_purpose` FROM `journey_purpose_master` WHERE `id`='$id'";
  $result = mysqli_query($con1, $query);
  $value = mysqli_fetch_array($result);
  return $value['journey_purpose'];
}
function getobjective($id)
{
  $con1 = dbcon1();
  $query = "SELECT `objective` FROM `taentry_master` WHERE `reference_no`='$id'";
  $result = mysqli_query($con1, $query);
  $value = mysqli_fetch_array($result);
  return $value['objective'];
}
