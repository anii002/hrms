<?php
//session_start();
include('../dbconfig/dbcon.php');
		dbcon();
		
			$Flag=$_POST["Flag"];

		 if($Flag=="ShowRecordsUser")
			{
				$sqlemployee=mysql_query("select * from tbl_user order by userid desc");
				echo "<table class='table table-striped table-bordered table-hover' id='tbl_user'>
						<thead>
							<tr class='odd gradeX'>
								<th>Full name</th>
								<th> Usertype</th>
								<th> Username </th>
								<th> Email </th>
								<th> Depart </th>
								<th> Contact </th>
								<th> createdby</th>
							</tr>
						</thead>";
				while($rwEmployee=mysql_fetch_array($sqlemployee,MYSQL_ASSOC))
				{
					$fullname=$rwEmployee["fullname"];
					$usertype=$rwEmployee["accesslevel"];
					$username=$rwEmployee["username"];
					$email=$rwEmployee["email"];
					$dept=$rwEmployee["dept"];
					$contact=$rwEmployee["contact"];
					$createdby=$rwEmployee["createdby"];
					$userid = $rwEmployee["userid"];
					
					echo "<tr class='headings'>	
							<td id='tdempid$userid'>$fullname</td>
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
				echo mysql_error();
			
			}
?>