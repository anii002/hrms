<?php
function fetch_dept_profile($id)
{
  //fetch department using id
  $data = "";
  $dept = "select * from department where dept_id='$id'";
  $result = mysqli_query($con,$dept);
  $value = mysqli_fetch_array($result);
  $data = "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";
  $dept = "select * from department where dept_id <> '$id'";
  $result = mysqli_query($con,$dept);
  while($value = mysqli_fetch_array($result))
    $data .= "<option value='".$value['dept_id']."'>".$value['deptname']."</option>";
  return $data;
}
function fetch_design_profile($id)
{
  //fetch designation using id
  $data = "";
  $query = "select * from designation where designation='$id'";
  $result = mysqli_query($con,$query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='".$value['designation']."'>".$value['designation']."</option>";
  $query = "select * from designation where designation <> '$id'";
  $result = mysqli_query($con,$query);
  while($value = mysqli_fetch_array($result))
    $data .= "<option value='".$value['designation']."'>".$value['designation']."</option>";
  return $data;
}

function fetch_pay_level($id)
{
  $data = "";
  $query = "select * from paylevel where num='$id'";
  $result = mysqli_query($con,$query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='".$value['num']."'>".$value['pay_text']."</option>";
  $query = "select * from paylevel where num <> '$id'";
  $result = mysqli_query($con,$query);
  while($value = mysqli_fetch_array($result))
    $data .= "<option value='".$value['num']."'>".$value['pay_text']."</option>";
  return $data;
}
function fetch_station_profile($id)
{
  //fetch designation using id
  $data = "";
  $query = "select * from stations where station_id='$id'";
  $result = mysqli_query($con,$query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='".$value['station_id']."'>".$value['station_name']."</option>";
  $query = "select * from stations where station_id <> '$id'";
  $result = mysqli_query($con,$query);
  while($value = mysqli_fetch_array($result))
    $data .= "<option value='".$value['station_id']."'>".$value['station_name']."</option>";
  return $data;
}
function fetch_gradepay_profile($id)
{
  //fetch designation using id
  $data = "";
  $query = "select * from gradepay where id='$id'";
  $result = mysqli_query($con,$query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='".$value['id']."'>".$value['gradepay']."</option>";
  $query = "select * from gradepay where id <> '$id'";
  $result = mysqli_query($query);
  while($value = mysqli_fetch_array($result))
    $data .= "<option value='".$value['id']."'>".$value['gradepay']."</option>";
  return $data;
}
function designation($id)
{
  $query = "select * from designations where DESIGCODE='$id'";
  $result = mysqli_query($con,$query);
  $value = mysqli_fetch_array($result);
  return $value['DESIGLONGDESC'];
}
function getdepartment($id)
{
  $query = "select * from departments where DEPTNO='$id'";
  $result = mysqli_query($con,$query);
  $value = mysqli_fetch_array($result);
  return $value['DEPTDESC'];
}
function getrole($id)
{
  $query = "select * from master_role where id='$id'";
  $result = mysqli_query($con,$query);
  $value = mysqli_fetch_array($result);
  return $value['role_name'];
}
function getcase($id)
{
  $query = "select * from category where id='$id'";
  $result = mysqli_query($query);
  $value = mysqli_fetch_array($result);
  return $value['case_name'];
}

function getScaleCode($id)
{
  $query =mysqli_query($con,"select * from gradepay where gradepay='$id'");
  $res=mysqli_fetch_array($query);
  $sql="select * from paylevel where num='".$res['id']."'";
  $result =mysqli_query($sql);
  $value = mysqli_fetch_array($result);
  return $value['pay_text'];
}
function getMaritailStatus($id)
{
  $query_emp =mysqli_query($con,"select * from marital_status where code='".$id."'");
  $value_emp = mysqli_fetch_array($query_emp);
  return $value_emp['shortdesc'];
 
}
function getRelation($id)
{
  $query_emp =mysqli_query($con,"select * from relation where code='".$id."'");
  $value_emp = mysqli_fetch_array($query_emp);
  return $value_emp['shortdesc'];
 
}
?>
