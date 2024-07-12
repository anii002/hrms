<?php
function fetch_dept_profile($id)
{
  $con=dbcon2();
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
  $con=dbcon2();
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
 $con=dbcon1();
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
function fetch_gradepay_profile($id)
{
  //fetch designation using id
  $data = "";
  $query = "select * from gradepay where id='$id'";
  $result = mysqli_query($con,$query);
  $value = mysqli_fetch_array($result);
  $data = "<option value='".$value['id']."'>".$value['gradepay']."</option>";
  $query = "select * from gradepay where id <> '$id'";
  $result = mysqli_query($con,$query);
  while($value = mysqli_fetch_array($result))
    $data .= "<option value='".$value['id']."'>".$value['gradepay']."</option>";
  return $data;
}
function designation($id)
{
  $con=dbcon2();
  $query = "SELECT * from designations where DESIGCODE='$id'";
  $result = mysqli_query($con,$query);
  $value = mysqli_fetch_array($result);
  return $value['DESIGLONGDESC'];
}
function getdepartment($id)
{
  $con=dbcon2();
  $query = "SELECT * from departments where DEPTNO='$id'";
  $result = mysqli_query($con,$query);
  $value = mysqli_fetch_array($result);
  return $value['DEPTDESC'];
}
function getrole($id)
{
 $con=dbcon1();
  $query = "SELECT * from master_role where role_shortname='$id'";
  $result = mysqli_query($con,$query);
  $value = mysqli_fetch_array($result);
  return $value['role_name'];
}
?>
