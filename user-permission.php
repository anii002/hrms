<?php

	require_once 'common/db.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{				
// echo "<pre>";
// print_r($_POST);exit();
		$pf_num = $_POST['pf_no'];

			$sql_fetch = "SELECT * FROM user_permission WHERE pf_num = '$pf_num' AND delete_status = 0";

			$result_fetch = mysql_query($sql_fetch);
			$count = mysql_num_rows($result_fetch);

			if($count == 0)
			{
				$sql_fetch1 = "SELECT * FROM register_user WHERE emp_no = '$pf_num' AND delete_status = 0";
				$result_fetch1 = mysql_query($sql_fetch1);
				$row = mysql_fetch_assoc($result_fetch1);

				$name = $row['name'];
				$password = $row['password'];
				if(isset($_POST['e_gr']))
				{
					$e_gr = implode(',', $_POST['e_gr']);	
				}
				else
				{	
					$e_gr = NULL;
				}

				if(isset($_POST['tamm']))
				{
					$tamm = implode(',', $_POST['tamm']);
				}
				else
				{
					$tamm = NULL;
				}

				if(isset($_POST['eims']))
				{
					$eims = implode(',', $_POST['eims']);
				}
				else
				{
					$eims = NULL;
				}

				if(isset($_POST['cga']))
				{
					$cga = implode(',', $_POST['cga']);
				}
				else
				{
					$cga = NULL;	
				}

				if(isset($_POST['itp']))
				{
					$itp = implode(',', $_POST['itp']);
				}
				else
				{
					$itp = NULL;	
				}
				
				if(isset($_POST['app']))
                {
                    $app = implode(',', $_POST['app']);
                }
                else
                {
                    $app = NULL;	
                }

                if(isset($_POST['frm']))
                {
                    $frm = implode(',', $_POST['frm']);
                }
                else
                {
                    $frm = NULL;	
                }

				
				if(isset($_POST['sar']))
				{
					$sar = implode(',', $_POST['sar']);
				}
				else
				{
					$sar = NULL;	
				}
				
				if (isset($_POST['apar'])) 
				{
					$spar = implode(',', $_POST['apar']);
				}
				else
				{
					$apar = NULL;
				}
				
				if (isset($_POST['dak'])) 
				{
					$dak = implode(',', $_POST['dak']);
				}
				else
				{
					$dak = NULL;
				}

				if (isset($_POST['feed'])) 
				{
					$feed = implode(',', $_POST['feed']);
				}
				else
				{
					$feed = NULL;
				}

				if (isset($_POST['sbf'])) 
				{
					$sbf = implode(',', $_POST['sbf']);
				}
				else
				{
					$sbf = NULL;
				}

				if (isset($_POST['dar'])) 
				{
					$dar = implode(',', $_POST['dar']);
				}
				else
				{
					$dar = NULL;
				}


$sql = "INSERT INTO user_permission (pf_num, name, password, tamm, e_grievance, cga, e_notification, it_form, e_app, forms, e_sar, e_apar, e_dak, feedback, sbf, dar) VALUES ('$pf_num','$name','$password', '$tamm', '$e_gr', '$cga', '$eims', '$itp', '$app', '$frm', '$sar', '$apar', '$dak', '$feed', '$sbf', '$dar') ";

	//echo $sql;exit();
				$result = mysql_query($sql);

				if($result)
				{
					echo "<script>alert('User Permission Created Successfully')</script>";
					echo "<script>window.location.href = 'show-user.php'</script>";
				}
				else
				{
					echo "<script>alert('Fail to create User Permission')</script>";
					echo "<script>window.location.href = 'super_admin_dashboard.php'</script>";	
				}	
			}
			else
			{
				echo "<script>alert('User Permission already Created')</script>";
				echo "<script>window.location.href = 'super_admin_dashboard.php'</script>";	
			}
			
			


				

				


				
	}




?>