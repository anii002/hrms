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


function fetch_billunit($code)
{
    $sts=explode(",", $code);
    // print_r($sts);
    $l=count($sts);
    $data=array();
    for($i=0; $i<$l; $i++)
    {
        $query = "select billunit from billunit where billunit='".$sts[$i]."'";
        $result = mysql_query($query);
        while($value = mysql_fetch_array($result))
        {
            array_push($data,$value['billunit']);
        }
    }
    // print_r(data);
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
  // echo $code;
  
    $query = "select stationdesc from station where stationcode='".$code."'";
    $result = mysql_query($query);
    $value = mysql_fetch_array($result);
   
    return $value['stationdesc'];
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

function get_employee($id)
{
$query = mysql_query("select name from employees where pfno='$id'");
$result = mysql_fetch_array($query);
return $result['name'];
}

function getDesignation($id)
{
  $query = "select DESIGSHORTDESC,DESIGLONGDESC from designations where DESIGCODE='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['DESIGSHORTDESC'];
}
function designation($id)
{
  $query = "select * from designation where id='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['designation'];
}
function getdepartment($id)
{
  $query = "SELECT `DEPTDESC` FROM `department` WHERE `DEPTNO`='".$id."' ";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['DEPTDESC'];
}
?>
