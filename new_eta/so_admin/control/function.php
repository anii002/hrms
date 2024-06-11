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
function getcardpass($id)
{
  $query = "SELECT `cardpass` FROM `taentry_master` WHERE `reference_no`='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['cardpass'];
}
function getjourneypurpose($id)
{
  $query = "SELECT `journey_purpose` FROM `journey_purpose_master` WHERE `id`='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['journey_purpose'];
}
function getjourneytype($id)
{
  $query = "SELECT `journey_type` FROM `journey_type_master` WHERE `id`='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['journey_type'];
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
function fetch_station1($code)
{
  // echo $code;
  $sts=explode(",", $code);
  $l=count($sts);
    $data=array();
  for($i=0; $i<$l; $i++)
  {
    $query = "select stationcode from station where stationcode='".$sts[$i]."'";
    $result = mysql_query($query);
    while($value = mysql_fetch_array($result))
    {
        array_push($data,$value['stationcode']);
    }
  }
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
function getdepot($id)
{
  $query = "SELECT `depot` FROM `depot_master` WHERE `id`='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['depot'];
}
function getdepartment($id)
{
  $query = "select DEPTDESC from department where DEPTNO='$id'";
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
function getobjective($id)
{
  $query = "SELECT `objective` FROM `taentry_master` WHERE `reference_no`='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['objective'];
}
function get_employee($id)
{
$query = mysql_query("select name from employees where pfno='$id'");
$result = mysql_fetch_array($query);
return $result['name'];
}
function getrole($id)
{
    $query=mysql_query("SELECT role_desc FROM `roles` WHERE role_id='".$id."' ");
    $row=mysql_fetch_array($query);
    return $row['role_desc'];
}

?>
