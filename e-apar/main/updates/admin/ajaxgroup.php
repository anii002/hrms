<?php
session_start();
include('../dbconfig/dbcon.php');
		dbcon();
		$Grpname = $_POST['Grpname'];
		$grpdesc = $_POST['grpdesc'];
		$cnt = $_POST['member_cnt'];
		$dept=$_POST['deptn'];
		$sql_insert1 = mysql_query("insert into group_master(group_name,group_desc,member_count,dept_name,createdby,createddate) values('$Grpname','$grpdesc','$cnt','$dept','".$_SESSION['SESS_MEMBER_NAME']."',NOW())");
		
		$sql_select=mysql_query("select * from group_master order by group_id desc LIMIT 1");
		 $result=mysql_fetch_array($sql_select);
		 $id=$result['group_id'];
		
		
		$keys = array_keys($_POST['list']);
			for($i = 0; $i < count($_POST['list']); $i++) {
				
				foreach($_POST['list'][$keys[$i]] as $key => $value) 
				{
					$sql_insert2=mysql_query("insert into group_details(group_id,empid,year) values('$id','".$keys[$i]."','$value')") or die(mysql_error());
					
				}
				
			}
		if($sql_insert1)
		{
			echo "<script>alert('Group created successfully'); window.location='show_group.php'</script>";
		}
?>