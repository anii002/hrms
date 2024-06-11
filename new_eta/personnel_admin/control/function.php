<?php
function get_dept_shortform($id)
{
    $sql=mysql_query("SELECT shortform FROM `department` WHERE DEPTNO='".$id."' ");
    $row=mysql_fetch_array($sql);
    return $row['shortform'];
}
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
  $query = "select * from designation where id='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['designation'];
}


function get_employee($id)
{
    $query = mysql_query("select name from employees where pfno='$id'");
    $result = mysql_fetch_array($query);
    return $result['name'];
}
function getdepartment($id)
{
  $query = "SELECT `DEPTDESC` FROM `department` WHERE `DEPTNO`='".$id."' ";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['DEPTDESC'];
}
function getDesignation($id)
{
  $query = "select DESIGSHORTDESC,DESIGLONGDESC from designations where DESIGCODE='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['DESIGSHORTDESC'];
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


function getrole($id)
{
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
  $query = "SELECT `cardpass` FROM `taentry_master` WHERE `reference_no`='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['cardpass'];
}

?>
