<?php
			
			include("../dbconfig/dbcon.php");
			dbcon();
			
			
			if(isset($_GET["rwempid"]) && ($_GET["assignid"]))
			{
				$getempid = $_GET["rwempid"];
				$getuserid = $_GET["assignid"];
				
				//echo $getempid. " " .$getuserid;
				
				$sqldeleteuser = mysql_query("delete from assignto_tbl where emp_id='$getempid' AND assignedid= '$getuserid'");
				if($sqldeleteuser)
				{
					echo "<script>alert('$getempid Deleted Successfully');window.location='show_group.php';</script>";
				}else
				{
					echo mysql_error();
				}
			}
?>