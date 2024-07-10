<?php
function fetch_dept_profile($id)
{
  //fetch department using id
  dbcon2();
  $data = "";
  $dept = "SELECT * from drmpsurh_cga.department where dept_id='$id'";
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
  dbcon2();
  $data = "";
  $query = "SELECT * from drmpsurh_cga.designation where designation='$id'";
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
  dbcon1();
  $data = "";
  $query = "SELECT * from drmpsurh_cga.paylevel where num='$id'";
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
  $query = "SELECT * from drmpsurh_cga.stations where station_id='$id'";
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
  dbcon1();
  $data = "";
  $query = "SELECT * from drmpsurh_cga.gradepay where id='$id'";
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
  $query = "SELECT * from drmpsurh_sur_railway.designations where DESIGCODE='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['DESIGLONGDESC'];
}
function getdepartment($id)
{
  dbcon2();
  $query = "SELECT * from drmpsurh_sur_railway.departments where DEPTNO='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['DEPTDESC'];
}
function getrole($id)
{
  dbcon1();
  $query = "SELECT * from drmpsurh_cga.master_role where id='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['role_name'];
}
function getcase($id)
{
  dbcon1();
  $query = "SELECT * from drmpsurh_cga.category where id='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['case_name'];
}
function getMaritailStatus($id)
{
  dbcon2();
  $query_emp =mysql_query("SELECT * from marital_status where code='".$id."'");
  $value_emp = mysql_fetch_array($query_emp);
  return $value_emp['shortdesc'];
 
}
function getRelation($id)
{
  dbcon1();
  $query_emp =mysql_query("SELECT * from drmpsurh_cga.relation where code='".$id."'");
  $value_emp = mysql_fetch_array($query_emp);
  return $value_emp['shortdesc'];
 
}
function getGender($id)
{
  dbcon2();
  $query_emp =mysql_query("SELECT * from gender where id='".$id."'");
  $value_emp = mysql_fetch_array($query_emp);
  return $value_emp['gender'];
 
}
function getName($id)
{
  dbcon2();
  $query_emp =mysql_query("SELECT name from register_user where emp_no='".$id."'");
  $value_emp = mysql_fetch_array($query_emp);
  return $value_emp['name'];
 
}
?>
