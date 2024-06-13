<?php 
$conn = mysqli_connect("localhost","drmpsurh_test","root@123","drmpsurh_sur_railway");
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$searchValue = $_POST['search']['value']; // Search value
$tbl='register_user';
## Search 
$searchQuery = "";
if($searchValue != ''){
 $searchQuery = " and (emp_no like '%$searchValue%' or name like '%$searchValue%'";

 $dept_query=mysqli_query($conn,"select deptno from department where deptdesc like '%$searchValue%'");
 $depts=mysqli_fetch_all($dept_query);
 $depts=array_column($depts, 0);
 if (!empty($depts)) {
  $searchQuery.=" or department IN(".implode(',', $depts).")";
}

$desg_query=mysqli_query($conn,"select concat(\"'\",desigcode,\"'\") from designations where desiglongdesc like '%$searchValue%'");
$desgs=mysqli_fetch_all($desg_query);
$desgs=array_column($desgs, 0);
if (!empty($desgs)) {
  $searchQuery.=" or designation IN(".implode(',', $desgs).")";
}
$searchQuery.=')';
}

## Total number of records without filtering
$totalRecords = mysqli_fetch_assoc(mysqli_query($conn,"select count(*) as count from $tbl WHERE delete_status=0"))['count'];
## Total number of record with filtering
$totalRecordwithFilter = mysqli_fetch_assoc(mysqli_query($conn,"select count(*) as count from $tbl WHERE delete_status=0".$searchQuery))['count'];

## Fetch records
$query =  mysqli_query($conn,"select id,emp_no,name,department,dob,designation from $tbl WHERE delete_status=0".$searchQuery." limit ".$row.",".$rowperpage);
$result = mysqli_fetch_all($query,MYSQLI_ASSOC);
$data = array();
foreach($result as $row) {
  $dept=mysqli_fetch_assoc(mysqli_query($conn,"select deptdesc from department where deptno='{$row['department']}'"));
  $desg=mysqli_fetch_assoc(mysqli_query($conn,"select desiglongdesc from designations where desigcode='{$row['designation']}'"));
  $data[] = array( 
    "id"=>$row['id'],
    "pf_num"=>$row['emp_no'],
    "name"=>$row['name'],
    "dept"=>$dept['deptdesc'],
    "desg"=>$desg['desiglongdesc'],
    "dob"=>$row['dob']
  );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);