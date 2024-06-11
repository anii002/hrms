<?php 
session_start();
$conn = mysql_connect('localhost','esoluhp6_test','root@123');
mysql_select_db('esoluhp6_sur_railway');
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = "";
if($searchValue != ''){
   $searchQuery = " and (pfno like '%".$searchValue."%' or 
   year like '%".$searchValue."%') ";
}

if($_SESSION['user'] != 'admin'){
   $searchQuery .= " and pfno='".$_SESSION['user']."'";
}

## Total number of records without filtering
$sel = mysql_query("select count(*) from tblpdfread");
$sel = mysql_query("select count(*) as allcount from tblpdfread");
$records = mysql_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysql_query("select count(*) as allcount from tblpdfread WHERE 1 ".$searchQuery);
$records = mysql_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = mysql_query("select * from tblpdfread WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage);
// echo "select * from tblpdfread WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$data = array();
while ($row = mysql_fetch_array($empQuery)) {
  $query = mysql_query("select empname from prmaemp where empno='".$row['pfno']."'");
  $result = mysql_fetch_array($query);
  $data[] = array( 
    "id"=>$row['id'],
    "pfno"=>$row['pfno'],
    "empname"=>$result['empname'],
    "year"=>$row['year'],
    "path"=>$row['path']
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