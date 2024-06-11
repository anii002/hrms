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
  $query = "select * from designation where id='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  $data = "<option value='".$value['id']."'>".$value['designation']."</option>";
  $query = "select * from designation where id <> '$id'";
  $result = mysql_query($query);
  while($value = mysql_fetch_array($result))
    $data .= "<option value='".$value['id']."'>".$value['designation']."</option>";
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
function employee($id)
{
  $query = "select name from employees where pfno='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['name'];
}
?>
