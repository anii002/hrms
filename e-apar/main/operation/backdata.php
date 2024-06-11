<?php
//session_start();
include('../dbconfig/dbcon.php');
		dbcon();
		
			$Flag=$_POST["Flag"];

		 if($Flag=="ShowRecordsUser")
			{
				$sqlUser=mysql_query("select * from tbl_uesr order by userid");
				echo "<table class='table table-striped table-bordered table-hover' id='tbl_uesr'>
						<thead>
							<tr class='odd gradeX'>
								<th style='display:none;><i class='fa fa-fa'></i> User Code</th>
								<th><i class='fa fa-fa'></i>Full Name</th>
								<th><i class='fa fa-fa'></i>User Type</th>
								<th><i class='fa fa-gallary'></i> Department </th>
								<th><i class='fa fa-calendar'></i> Design </th>
								<th><i class='fa fa-calendar'></i> Email </th>
								<th><i class='fa fa-cog'></i> Contact</th>";
						
				while($rwUser=mysql_fetch_array($sqlUser,MYSQL_ASSOC))
				{
					$userid=$rwUser["userid"];
					$fullname=$rwUser["fullname"];
					$usertype=$rwUser["usertype"];
					$username=$rwUser["username"];
					$password=$rwUser["password"];
					$email=$rwUser["email"];
					$dept=$rwUser["dept"];
					$contact=$rwUser["contact"];
					$designation=$rwUser["designation"];
					
					//echo $rwEmployee["registerno"];
					//<button class='btn btn-xs btn-warning' onclick='MarkPending($empid)'>Pending</button>
						echo "<tr class='headings'>	
							<td style='display:none; id='tduserid$userid'>$userid</td>
							<td id='tdfullname$userid'>$fullname</td>
							<td id='tdusertype$userid'>$usertype</td>
							<td id='tddept$userid'>$dept</td>
							<td id='tddesign$userid'>$design</td>
							<td id='tdemail$userid'>$email</td>
							<td id='tdcontact$userid'>$contact</td>";
						 echo "</tr>";
				}
			}else if($Flag=="ShowRecordsEmployee")
			{
			$sqlemployee=mysql_query("select * from tbl_employee order by empid");
				echo "<table class='table table-striped table-bordered table-hover' id='tbl_employee'>
						<thead>
							<tr class='odd gradeX'>
								<th style='display:none;><i class='fa fa-fa'></i> Employee Code</th>
								<th><i class='fa fa-fa'></i></th>
								<th><i class='fa fa-fa'></i>empid</th>
								<th><i class='fa fa-gallary'></i> Name </th>
								<th><i class='fa fa-calendar'></i> design </th>
								<th><i class='fa fa-calendar'></i> station </th>
								<th><i class='fa fa-calendar'></i> pay scale </th>
								<!--<th><i class='fa fa-cog'></i> year</th>
								<th><i class='fa fa-cog'></i> Action</th>-->
							";
							$sql=mysql_query("SELECT * FROM year order by id desc limit 7");
							while($rev = mysql_fetch_array($sql))
							{
							   echo "<th>".$rev['years']."</th>";
							}
							echo"</tr>";
						   echo"</thead>";
				while($rwEmployee=mysql_fetch_array($sqlemployee,MYSQL_ASSOC))
				{
					$empid=$rwEmployee["emplcode"];
					$year=$rwEmployee["year"];
					$emplcode=$rwEmployee["emplcode"];
					$dept=$rwEmployee["dept"];
					$design=$rwEmployee["design"];
					$station=$rwEmployee["station"];
					$payscale=$rwEmployee["payscale"];
					$year=$rwEmployee["year"];
					$uploadfile=$rwEmployee["uploadfile"];
					$empname = $rwEmployee["empname"];
					
					//echo $rwEmployee["registerno"];
					//<button class='btn btn-xs btn-warning' onclick='MarkPending($empid)'>Pending</button>
						echo "<tr class='headings'>	
							<td style='display:none; id='tdempid$empid'>$empid</td>
							<td id='tdempid$empid'><input type='checkbox' /></td>
							<td id='tdemplcode$empid'><a href='show.php?empid=$empid'>$empid</a></td>
							<td id='tddept$empid'>$empname</td>
							<td id='tddesign$empid'>$design</td>
							<td id='tdstation$empid'>$station</td>
							<td id='tdstation$empid'>$payscale</td>";
							
							$sql=mysql_query("SELECT * FROM year order by id desc limit 7");
							while($rev = mysql_fetch_array($sql))
							{
								$sql_query = mysql_query("select * from scanned_apr where empid='".$emplcode."' AND year='".$rev['years']."'");
								$result=mysql_fetch_array($sql_query);
								if($result['image']=="")
								{
							   echo "<td id='tduploadfile$empid'><a href='Modal_Member.php?empid='".$empid."'' data-toggle='modal' data-target='#myModalReason'>NA</a></td>";;
							   }else
								{
								echo "<td><input type='checkbox' name='".$emplcode."' ><label style='color:green;'>AV</label></input></td>";
								}
							}
							
							
					
						 echo "</tr>";
				}
			}
			else
			{
			echo	mysql_error();
			}
?>