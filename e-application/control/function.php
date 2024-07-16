<?php
function fetch_dept_profile($id)
{
  $conn = dbcon2();
  //fetch department using id
  $data = "";
  $dept = "select * from department where dept_id='$id'";
  $result = mysqli_query($conn, $dept);
  $value = mysqli_fetch_array($result);
  $data = "<option value='" . $value['dept_id'] . "'>" . $value['deptname'] . "</option>";
  $dept = "select * from department where dept_id <> '$id'";
  $result = mysqli_query($conn, $dept);
  while ($value = mysqli_fetch_array($result))
    $data .= "<option value='" . $value['dept_id'] . "'>" . $value['deptname'] . "</option>";
  return $data;
}

function fetch_design_profile($id)
{
  $conn = dbcon2();
  //fetch designation using id
  $data = "";
  $query = "select * from designations where designations='$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='" . $value['designations'] . "'>" . $value['designations'] . "</option>";
  $query = "select * from designations where designations <> '$id'";
  $result = mysqli_query($conn, $query);
  while ($value = mysqli_fetch_array($result))
    $data .= "<option value='" . $value['designations'] . "'>" . $value['designations'] . "</option>";
  return $data;
}

function fetch_pay_level($id)
{
  $conn = dbcon2();
  $data = "";
  $query = "select * from paylevel where num='$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='" . $value['num'] . "'>" . $value['pay_text'] . "</option>";
  $query = "select * from paylevel where num <> '$id'";
  $result = mysqli_query($conn, $query);
  while ($value = mysqli_fetch_array($result))
    $data .= "<option value='" . $value['num'] . "'>" . $value['pay_text'] . "</option>";
  return $data;
}
function fetch_station_profile($id)
{
  $conn = dbcon2();
  //fetch designation using id
  $data = "";
  $query = "select * from station where station_id='$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='" . $value['station_id'] . "'>" . $value['station_name'] . "</option>";
  $query = "select * from station where station_id <> '$id'";
  $result = mysqli_query($conn, $query);
  while ($value = mysqli_fetch_array($result))
    $data .= "<option value='" . $value['station_id'] . "'>" . $value['station_name'] . "</option>";
  return $data;
}
function fetch_station($code)
{
  $conn = dbcon2();
  $query = "SELECT `stationdesc` FROM `station` WHERE `stationcode`='$code'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  return $value['stationdesc'];
}
function fetch_gradepay_profile($id)
{
  $conn = dbcon3();
  //fetch designation using id
  $data = "";
  $query = "select * from gradepay where id='$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='" . $value['id'] . "'>" . $value['gradepay'] . "</option>";
  $query = "select * from gradepay where id <> '$id'";
  $result = mysqli_query($conn, $query);
  while ($value = mysqli_fetch_array($result))
    $data .= "<option value='" . $value['id'] . "'>" . $value['gradepay'] . "</option>";
  return $data;
}
function designation($id)
{
  $conn = dbcon2();
  $query = "SELECT `DESIGLONGDESC` FROM `designations` WHERE `DESIGCODE`='$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  return $value['DESIGLONGDESC'];
}
function getdepartment($id)
{
  $conn = dbcon2();
  $query = "select DEPTDESC from department where DEPTNO='$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  return $value['DEPTDESC'];
}
function getdepot($id)
{
  $query = "SELECT `depot` FROM `depot_master` WHERE `id`='$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  return $value['depot'];
}
function getjourneytype($id)
{
  $query = "SELECT `journey_type` FROM `journey_type_master` WHERE `id`='$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  return $value['journey_type'];
}
function getjourneypurpose($id)
{
  $query = "SELECT `journey_purpose` FROM `journey_purpose_master` WHERE `id`='$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  return $value['journey_purpose'];
}
function getobjective($id)
{
  $query = "SELECT `objective` FROM `taentry_master` WHERE `reference_no`='$id'";
  $result = mysqli_query($conn, $query);
  $value = mysqli_fetch_array($result);
  return $value['objective'];
}
