<?php
//session_start();
include('../dbconfig/dbcon.php');
		dbcon();
		
			$Flag=$_POST["Flag"];

		 if($Flag=="ShowRecordsUser")
			{
				$sqlemployee=mysql_query("select * from tbl_user order by userid");
				echo "<table class='table table-striped table-bordered table-hover' id='tbl_user'>
						<thead>
							<tr class='odd gradeX'>
								<th style='display:none;><i class='fa fa-fa'></i>Full name</th>
								<th><i class='fa fa-fa'></i> Usertype</th>
								<th><i class='fa fa-gallary'></i> Username </th>
								<th><i class='fa fa-calendar'></i> Email </th>
								<th><i class='fa fa-calendar'></i> Depart </th>
								<th><i class='fa fa-calendar'></i> Contact </th>
								<th><i class='fa fa-cog'></i> createdby</th>
							</tr>
						</thead>";
				while($rwEmployee=mysql_fetch_array($sqlemployee,MYSQL_ASSOC))
				{
					$fullname=$rwEmployee["fullname"];
					$usertype=$rwEmployee["usertype"];
					$username=$rwEmployee["username"];
					$email=$rwEmployee["email"];
					$dept=$rwEmployee["dept"];
					$contact=$rwEmployee["contact"];
					$createdby=$rwEmployee["createdby"];
					$userid = $rwEmployee["userid"];
					
					//echo $rwEmployee["registerno"];
					//<button class='btn btn-xs btn-warning' onclick='MarkPending($empid)'>Pending</button>
						echo "<tr class='headings'>	
							<td style='display:none; id='tdempid$userid'>$fullname</td>
							<td id='tdemplcode$userid'>$usertype</td>
							<td id='tddept$userid'>$username</td>
							<td id='tddesign$userid'>$email</td>
							<td id='tdstation$userid'>$dept</td>
							<td id='tdpayscale$userid'>$contact</td>
							<td id='tdpayscale$userid'>$createdby</td>";
							
							
				}
			}
			else
			{
			
			}
?>