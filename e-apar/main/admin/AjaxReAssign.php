<?php

include("../dbconfig/dbcon.php");
dbcon();


//echo $_POST["GRP"];
if(!isset($_POST['year_list']))
		{
			echo "<script>alert('Please select year'); window.location='frmaddmoreemp.php'</script>";
		}else
		{
			
				$grpid = $_POST["GRP"];
				//echo $grpid;
				 $keys = array_keys($_POST['year_list']);
			for($i = 0; $i < count($_POST['year_list']); $i++) {
				//echo $keys[$i];
				$k=$keys[$i];
				
				
				foreach($_POST['year_list'][$keys[$i]] as $key => $value) 
				{
					echo "<input type='hidden' name='list[$k][]' id='txtyear' value='". $value ."' style='border:0px;' size='8px' readonly/> |  ";
					$sql = mysql_query("insert into group_details (group_id,empid,year) values('$grpid',".$keys[$i].",'$value')");
					
					if($sql)
					{
						echo "<script>alert('Employee added successfully.......');window.location='show_group.php';</script>";
					}else
					{
						echo mysql_error();
					}
				}
				$k++;
				
			}
		
			
		}
?>