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
  dbcon2();
  $query = "select * from designations where DESIGCODE='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['DESIGLONGDESC'];
}
function getdepartment($id)
{
  dbcon2();
  $query = "select * from departments where DEPTNO='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['DEPTDESC'];
}
function getrole($id)
{
  dbcon1();
  $query = "select * from master_role where id='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['role_name'];
}
function getcase($id)
{
  dbcon1();
  $query = "select * from category where id='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['case_name'];
}

function getScaleCode($id)
{
  dbcon1();
  $query =mysql_query("select * from gradepay where gradepay='$id'");
  $res=mysql_fetch_array($query);
  $sql="select * from paylevel where num='".$res['id']."'";
  $result =mysql_query($sql);
  $value = mysql_fetch_array($result);
  return $value['pay_text'];
}
function getMaritailStatus($id)
{
  dbcon2();
  $query_emp =mysql_query("select * from marital_status where code='".$id."'");
  $value_emp = mysql_fetch_array($query_emp);
  return $value_emp['shortdesc'];
 
}
function getRelation($id)
{
  dbcon1();
  $query_emp =mysql_query("select * from relation where code='".$id."'");
  $value_emp = mysql_fetch_array($query_emp);
  return $value_emp['shortdesc'];
 
}
function getName($id)
{
  dbcon2();
  $query_emp =mysql_query("SELECT name from register_user where emp_no='".$id."'");
  $value_emp = mysql_fetch_array($query_emp);
  return $value_emp['name'];
 
}
?>
