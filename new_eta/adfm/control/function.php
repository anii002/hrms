<?php
function get_dept_shortform($id)
{
  global $conn;
    $sql=mysqli_query($conn, "SELECT shortform FROM `department` WHERE DEPTNO='".$id."' ");
    $row=mysqli_fetch_array($sql);
    return $row['shortform'];
}
function fetch_dept_profile($id)
{
  global $conn;
  //fetch department using id
  $data = "";
  $dept = "select * from department where dept_id='$id'";
  $result = mysqli_query($conn,$dept);
  $value = mysqli_fetch_array($result);
  $data = "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";
  $dept = "select * from department where dept_id <> '$id'";
  $result = mysqli_query($conn,$dept);
  while($value = mysqli_fetch_array($result))
    $data .= "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";
  return $data;
}


function getDesignation($id)
{
  global $conn;
  $query = "select DESIGSHORTDESC,DESIGLONGDESC from designations where DESIGCODE='$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return $value['DESIGSHORTDESC'];
}

function fetch_design_profile($id)
{
  global $conn;
  //fetch designation using id
  $data = "";
  $query = "select * from designation where designation='$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='".$value['designation']."'>".$value['designation']."</option>";
  $query = "select * from designation where designation <> '$id'";
  $result = mysqli_query($conn,$query);
  while($value = mysqli_fetch_array($result))
    $data .= "<option value='".$value['designation']."'>".$value['designation']."</option>";
  return $data;
}

function fetch_pay_level($id)
{
  global $conn;
  $data = "";
  $query = "select * from paylevel where num='$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='".$value['num']."'>".$value['pay_text']."</option>";
  $query = "select * from paylevel where num <> '$id'";
  $result = mysqli_query($conn,$query);
  while($value = mysqli_fetch_array($result))
    $data .= "<option value='".$value['num']."'>".$value['pay_text']."</option>";
  return $data;
}
function fetch_station_profile($id)
{
  global $conn;
  //fetch designation using id
  $data = "";
  $query = "select * from stations where station_id='$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='".$value['station_id']."'>".$value['station_name']."</option>";
  $query = "select * from stations where station_id <> '$id'";
  $result = mysqli_query($conn,$query);
  while($value = mysqli_fetch_array($result))
    $data .= "<option value='".$value['station_id']."'>".$value['station_name']."</option>";
  return $data;
}
function fetch_station($code)
{
  global $conn;
  $query = "select stationcode,stationdesc from station where stationcode='".$code."' ";
  $result = mysqli_query($conn,$query);
  echo mysqli_error($conn);
  $value = mysqli_fetch_array($result);
  return $value['stationdesc'];
}
function fetch_gradepay_profile($id)
{
  global $conn;
  //fetch designation using id
  $data = "";
  $query = "select * from gradepay where id='$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='".$value['id']."'>".$value['gradepay']."</option>";
  $query = "select * from gradepay where id <> '$id'";
  $result = mysqli_query($conn,$query);
  while($value = mysqli_fetch_array($result))
    $data .= "<option value='".$value['id']."'>".$value['gradepay']."</option>";
  return $data;
}
function designation($id)
{
  global $conn;
  $query = "select DESIGLONGDESC from designations where DESIGCODE='".$id."'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return $value['DESIGLONGDESC'];
}
function getdepartment($id)
{
  global $conn;
  $query = "SELECT `DEPTDESC` FROM `department` WHERE `DEPTNO`='".$id."' ";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return $value['DEPTDESC'];
}

function getdepot($id)
{
  global $conn;
  $query = "SELECT `id`,`depot` FROM `depot_master` WHERE depot_master.id='".$id."' AND depot_master.status='1'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return $value['depot'];
}


function getjourneytype($id)
{
  global $conn;
  $query = "SELECT `journey_type` FROM `journey_type_master` WHERE `id`='$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return $value['journey_type'];
}
function getjourneypurpose($id)
{
  global $conn;
  $query = "SELECT `journey_purpose` FROM `journey_purpose_master` WHERE `id`='$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return $value['journey_purpose'];
}
function getobjective($id)
{
  global $conn;
  $query = "SELECT `objective` FROM `taentry_master` WHERE `reference_no`='$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return $value['objective'];
}
function getcardpass($id)
{
  global $conn;
  $query = "SELECT `cardpass` FROM `taentry_master` WHERE `reference_no`='$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return $value['cardpass'];
}

function getrole($id)
{
  global $conn;
    $query=mysqli_query($conn,"SELECT role_desc FROM `roles` WHERE role_id='".$id."' ");
    $row=mysqli_fetch_array($query);
    return $row['role_desc'];
}

 function get_employee($id)
{
  global $conn;
    $query = mysqli_query($conn,"select name from employees where pfno='".$id."' ");
    $result = mysqli_fetch_array($query);
    return $result['name'];
}

?>