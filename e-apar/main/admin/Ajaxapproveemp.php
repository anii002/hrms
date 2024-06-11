<?php

	include("../dbconfig/dbcon.php");
	dbcon();
								if(isset($_GET["btnSubmit"]))
								{
								foreach($_GET['check_list'] as $v)
								{
								//echo $v;
							$sql_query=mysql_query("update tbl_employee set approvedstatus='1' where emplcode='$v'");
							if($sql_query)
							{
								echo "<script>alert('Employees List Approved. Employees will get Approved SMS Shortly ...!');window.location='frmapproveemp.php';</script>";
							}
								}
								
								}
								else
								{
									$getemp = $_GET['emppf'];
									$sql_query=mysql_query("update tbl_employee set approvedstatus='1' where emplcode='$getemp'");
									if($sql_query)
									{
										echo "<script>alert('Employees List Approved. Employees will get Approved SMS Shortly ...!');window.location='frmapproveemp.php';</script>";
									}
								}
?>