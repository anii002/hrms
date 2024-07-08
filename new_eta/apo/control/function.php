<?php
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
  $query = "select * from designation where id='$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return $value['designation'];
}


function get_employee($id)
{
  global $conn;
    $query = mysqli_query($conn,"select name from employees where pfno='$id'");
    $result = mysqli_fetch_array($query);
    return $result['name'];
}
function getdepartment($id)
{
  global $conn;
  $query = "SELECT `DEPTDESC` FROM `department` WHERE `DEPTNO`='".$id."' ";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return $value['DEPTDESC'];
}
function getDesignation($id)
{
  global $conn;
  $query = "select DESIGSHORTDESC,DESIGLONGDESC from designations where DESIGCODE='$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return $value['DESIGSHORTDESC'];
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


function getrole($id)
{
  global $conn;
  if($id==12)
  {
    $role="Control Incharge";
    return $role;
  }
  else if($id==13)
  {
    $role="Control Officer";
    return $role;
  }
  else if($id==11)
  {
    $role="Dept. Admin";
    return $role;
  }
}

function getcardpass($id)
{
  global $conn;
  $query = "SELECT `cardpass` FROM `taentry_master` WHERE `reference_no`='$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_array($result);
  return $value['cardpass'];
}

?>
