<?php
	require_once 'common/db.php';
	$pf_num = $_SESSION['pf_num'];
	$sql_reg = "SELECT * FROM register_user WHERE emp_no = '$pf_num'";
	$result_reg = mysqli_query($conn, $sql_reg);
	$row = mysqli_fetch_assoc($result_reg);

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	  if(!empty($_POST))
	  {
	     
		if(isset($_POST['tamm']))
		{
			unset($_SESSION['role']);
			unset($_SESSION['username']);
			unset($_SESSION['name']);
			unset($_SESSION['dept']);
			unset($_SESSION['id']);
			unset($_SESSION['admin_id']);
			unset($_SESSION['admin_name']);
		    unset($_SESSION['empid']);
			unset($_SESSION['desig']);
			unset($_SESSION['billunit']);

			if($_POST['tamm'] == 0)
			{
				//echo "0";exit();
				$_SESSION['role'] = 0;
				$_SESSION['username']=$row['name'];
				$_SESSION['name']=$row['name'];
				$_SESSION['dept']=$row['department'];
				$_SESSION['id']=$row['id'];
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_name']=$row['name'];
			    $_SESSION['empid']=$row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];

				echo "<script>
				window.location.href = '../new_eta/superadmin/index.php';
				</script>";
			}

			if($_POST['tamm'] == 1)
			{
				$_SESSION['role'] = 1;
				$_SESSION['username']=$row['name'];
				$_SESSION['name']=$row['name'];
				$_SESSION['dept']=$row['department'];
				$_SESSION['id']=$row['id'];
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_name']=$row['name'];
			    $_SESSION['empid']=$row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];
				echo "<script>
				window.location.href = '../new_eta/superaccount/index.php';
				</script>";
			}

			if($_POST['tamm'] == 11)
			{
				$_SESSION['role'] = 11;
				$_SESSION['username']=$row['name'];
				$_SESSION['name']=$row['name'];
				$_SESSION['dept']=$row['department'];
				$_SESSION['id']=$row['id'];
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_name']=$row['name'];
			    $_SESSION['empid']=$row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];
				echo "<script>
				window.location.href = '../new_eta/deptadmin/index.php';
				</script>";
			}

			if($_POST['tamm'] == 12)
			{
				$_SESSION['role'] = 12;
				$_SESSION['username']=$row['name'];
				$_SESSION['name']=$row['name'];
				$_SESSION['dept']=$row['department'];
				$_SESSION['id']=$row['id'];
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_name']=$row['name'];
			    $_SESSION['empid']=$row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];
				echo "<script>
				window.location.href = '../new_eta/control_incharge/index.php';
				</script>";
			}

			if($_POST['tamm'] == 13)
			{
				$_SESSION['role'] = 13;
				$_SESSION['username']=$row['name'];
				$_SESSION['name']=$row['name'];
				$_SESSION['dept']=$row['department'];
				$_SESSION['id']=$row['id'];
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_name']=$row['name'];
			    $_SESSION['empid']=$row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];
				echo "<script>
				window.location.href = '../new_eta/control_officer/index.php';
				</script>";
			}

			if($_POST['tamm'] == 5)
			{
				$_SESSION['role'] = 5;
				$_SESSION['username']=$row['name'];
				$_SESSION['name']=$row['name'];
				$_SESSION['dept']=$row['department'];
				$_SESSION['id']=$row['id'];
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_name']=$row['name'];
			    $_SESSION['empid']=$row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];
				echo "<script>
				window.location.href = '../new_eta/estclerk/index.php';
				</script>";
			}

			if($_POST['tamm'] == 4)
			{
				$_SESSION['role'] = 4;
				$_SESSION['username']=$row['name'];
				$_SESSION['name']=$row['name'];
				$_SESSION['dept']=$row['department'];
				$_SESSION['id']=$row['id'];
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_name']=$row['name'];
			    $_SESSION['empid']=$row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];
				echo "<script>
				window.location.href = '../new_eta/personnel_employees/index.php';
				</script>";
			}
			
			if($_POST['tamm'] == 14)
			{
				$_SESSION['role'] = 14;
				$_SESSION['username']=$row['name'];
				$_SESSION['name']=$row['name'];
				$_SESSION['dept']=$row['department'];
				$_SESSION['id']=$row['id'];
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_name']=$row['name'];
			    $_SESSION['empid']=$row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];
				echo "<script>
				window.location.href = '../new_eta/personnel_admin/index.php';
				</script>";
			}
			
			
			if ($_POST['tamm'] == 15) {
				$_SESSION['role'] = 15;
				$_SESSION['username'] = $row['name'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['dept'] = $row['department'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['admin_id'] = $row['id'];
				$_SESSION['admin_name'] = $row['name'];
				$_SESSION['empid'] = $row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];

				echo "<script>
				window.location.href = '../new_eta/branch_officer/index.php';
				</script>";
			}

			if ($_POST['tamm'] == 16) {
				$_SESSION['role'] = 16;
				$_SESSION['username'] = $row['name'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['dept'] = $row['department'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['admin_id'] = $row['id'];
				$_SESSION['admin_name'] = $row['name'];
				$_SESSION['empid'] = $row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];

				echo "<script>
				window.location.href = '../new_eta/personnel_clerk/index.php';
				</script>";
			}


			if ($_POST['tamm'] == 17) {
				$_SESSION['role'] = 17;
				$_SESSION['username'] = $row['name'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['dept'] = $row['department'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['admin_id'] = $row['id'];
				$_SESSION['admin_name'] = $row['name'];
				$_SESSION['empid'] = $row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];

				echo "<script>
				window.location.href = '../new_eta/apo/index.php';
					</script>";
			}
			
			// Account Flow Start
			if($_POST['tamm'] == 21)
			{
				$_SESSION['role'] = 21;
				$_SESSION['username']=$row['name'];
				$_SESSION['name']=$row['name'];
				$_SESSION['dept']=$row['department'];
				$_SESSION['id']=$row['id'];
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_name']=$row['name'];
			    $_SESSION['empid']=$row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];
				echo "<script>
				window.location.href = '../new_eta/account_employees/index.php';
				</script>";
			}
			
			if($_POST['tamm'] == 22)
			{
				$_SESSION['role'] = 22;
				$_SESSION['username']=$row['name'];
				$_SESSION['name']=$row['name'];
				$_SESSION['dept']=$row['department'];
				$_SESSION['id']=$row['id'];
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_name']=$row['name'];
			    $_SESSION['empid']=$row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];
				echo "<script>
				window.location.href = '../new_eta/section_officer/index.php';
				</script>";
			}
			
			if($_POST['tamm'] == 23)
			{
				$_SESSION['role'] = 23;
				$_SESSION['username']=$row['name'];
				$_SESSION['name']=$row['name'];
				$_SESSION['dept']=$row['department'];
				$_SESSION['id']=$row['id'];
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_name']=$row['name'];
			    $_SESSION['empid']=$row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];
				echo "<script>
				window.location.href = '../new_eta/so_admin/index.php';
				</script>";
			}
		if($_POST['tamm'] == 24)
			{
				$_SESSION['role'] = 24;
				$_SESSION['username']=$row['name'];
				$_SESSION['name']=$row['name'];
				$_SESSION['dept']=$row['department'];
				$_SESSION['id']=$row['id'];
				$_SESSION['admin_id']=$row['id'];
				$_SESSION['admin_name']=$row['name'];
			    $_SESSION['empid']=$row['emp_no'];
				$_SESSION['desig'] = $row['designation'];
				$_SESSION['billunit'] = $row['bill_unit'];
				echo "<script>
				window.location.href = '../new_eta/adfm/index.php';
				</script>";
			}

		}
		
		if(isset($_POST['e_gr']))
		{
			mysqli_connect('localhost', 'root', '');
			if(mysqli_select_db($conn ,'drmpsurh_e_gr'))
			{
				//echo "Connected";
			}
			else
			{
				//echo "Not Connected";
			}

				$sql_egr_user = "SELECT user_id,section FROM tbl_user WHERE emp_id = '$pf_num' and status='active'";
				$result_egr_user = mysqli_query($conn, $sql_egr_user);
				// print_r($result_egr_user);
				$row_egr_user = mysqli_fetch_assoc($result_egr_user);

			unset($_SESSION['user']);
			unset($_SESSION['empname']);
			unset($_SESSION['SESSION_ID']);
			unset($_SESSION['SESSION_NAME']);
			unset($_SESSION['SESSION_ROLE']);
			unset($_SESSION['SESSION_USERNAME']);
		    unset($_SESSION['userid']);
			unset($_SESSION['SESSION_SECTION']);
			unset($_SESSION['billunit']);


			if($_POST['e_gr'] == 0)
			{
				// $_SESSION['SESSION_ID'] = $row['id'];
				$_SESSION['SESSION_ID'] = $row_egr_user['user_id'];
				$_SESSION['SESSION_NAME'] = $row['name'];
				$_SESSION['SESSION_ROLE'] = 'admin';
				$_SESSION['SESSION_USERNAME'] = $row['name'];
				$_SESSION['userid'] = 'Administrator';
				echo "<script>window.location.href='../e-gr/admin/main/index.php';</script>";
			}

			if($_POST['e_gr'] == 1)
			{
				// $_SESSION['SESSION_ID'] = $row['id'];
				$_SESSION['SESSION_ID'] = $row_egr_user['user_id'];
				$_SESSION['SESSION_NAME'] = $row['name'];
				$_SESSION['SESSION_ROLE'] = 1;
				$_SESSION['SESSION_USERNAME'] = $row['name'];
				$_SESSION['SESSION_SECTION'] = $row_egr_user['section'];
				$_SESSION['userid'] = "Administrator";
				echo "<script>window.location.href='../e-gr/admin_user/main/index.php';</script>";
			}

			if($_POST['e_gr'] == 2)
			{
				// $_SESSION['SESSION_ID'] = $row['id'];
				$_SESSION['SESSION_ID'] = $row_egr_user['user_id'];
				$_SESSION['SESSION_NAME'] = $row['name'];
				$_SESSION['SESSION_ROLE'] = 2;
				$_SESSION['SESSION_USERNAME'] = $row['name'];
				$_SESSION['SESSION_SECTION'] = $row_egr_user['section'];
				$_SESSION['userid'] = "Administrator";
				echo "<script>window.location.href='../e-gr/admin_welfare/main/index.php';</script>";
			}

			if($_POST['e_gr'] == 3)
			{
				// $_SESSION['SESSION_ID'] = $row['id'];
				$_SESSION['SESSION_ID'] = $row_egr_user['user_id'];
				$_SESSION['SESSION_NAME'] = $row['name'];
				$_SESSION['SESSION_ROLE'] = 3;
				$_SESSION['SESSION_USERNAME'] = $row['name'];
				$_SESSION['SESSION_SECTION'] = $row_egr_user['section'];
				$_SESSION['userid'] = "Administrator";
				echo "<script>window.location.href='../e-gr/admin/main/index.php';</script>";
			}

			if($_POST['e_gr'] == 4)
			{
				$_SESSION['user'] = $row['emp_no'];
				$_SESSION['empname'] = $row['name'];
				echo "<script>window.location.href='../e-gr/index.php';</script>";
			}


			if($_POST['e_gr'] == 5)
			{
				// $_SESSION['SESSION_ID'] = $row['id'];
				$_SESSION['SESSION_ID'] = $row_egr_user['user_id'];
				$_SESSION['SESSION_NAME'] = $row['name'];
				$_SESSION['SESSION_ROLE'] = 5;
				$_SESSION['SESSION_USERNAME'] = $row['name'];
				$_SESSION['SESSION_SECTION'] = $row_egr_user['section'];
				$_SESSION['userid'] = "Administrator";
				echo "<script>window.location.href='../e-gr/admin/main/index.php';</script>";
			}


		}

		if (isset($_POST['eims'])) 
		{
			unset($_SESSION['user']);

			if ($_POST['eims'] == 0) 
			{
				$_SESSION['user'] = 'admin';
				echo "<script>window.location.href='./eims/dashboard.php';</script>";
			}

			if ($_POST['eims'] == 1) 
			{
				$_SESSION['user'] = $row['emp_no'];
				echo "<script>window.location.href='./eims/dashboard.php';</script>";
			}

			if ($_POST['eims'] == 2) 
			{
				$_SESSION['user'] = $row['emp_no'];
				echo "<script>window.location.href='./eims/emp_dashboard.php';</script>";
			}
		}


		if (isset($_POST['cga'])) 
		{

			mysqli_connect('localhost', 'root', '');
			if(mysqli_select_db($conn, 'drmpsurh_cga'))
			{
				//echo "Connected";
			}
			else
			{
				//echo "Not Connected";
			}
			// exit();
			    if($_POST['cga'] == 1)
				{
					$pf_num = 'superadmin';
				}
				$sql_cga = "SELECT * FROM login WHERE username = '$pf_num'";
				$result_cga = mysqli_query($conn, $sql_cga);
				$row_cga = mysqli_fetch_assoc($result_cga);
				$count_cga = mysqli_num_rows($result_cga);
	            
	           // print_r($row_cga);
                //exit();
			unset($_SESSION['username']);
			unset($_SESSION['role']);
			unset($_SESSION['pf_number']);
			unset($_SESSION['unitid']);
			unset($_SESSION['dept']);
			unset($_SESSION['admin_id']);
			unset($_SESSION['appl_username']);
			unset($_SESSION['ex_emp_pfno']);
			unset($_SESSION['applicant_name']);
			unset($_SESSION['ex_empname']);
		

			if ($_POST['cga'] == 1) 
			{
			    if($count_cga !=0 )
		        {	
    				$_SESSION['username'] = 'superadmin';
    				$_SESSION['role'] = $row_cga['role'];
    				$_SESSION['pf_number'] = $row_cga['pf_number'];
    				$_SESSION['unitid'] = $row_cga['unit_id'];
    				$_SESSION['dept'] = $row_cga['dept'];
    			    $_SESSION['admin_id'] = $row_cga['id'];
    
    				echo "<script>window.location.href='../cga/superadmin/index.php';</script>";
		        }
		        else
		        {
    				echo "<script>
    				alert('Your Login is restricted! Please Contact to Administrator');
    				window.location.href='index.php';
    				</script>";
		        }
			}

			if ($_POST['cga'] == 2) 
			{
			    if($count_cga !=0 )
		        {
    				$_SESSION['username'] = $row_cga['username'];
    				$_SESSION['role'] = $row_cga['role'];
    				$_SESSION['pf_number'] = $row_cga['pf_number'];
    				$_SESSION['unitid'] = $row_cga['unit_id'];
    				$_SESSION['dept'] = $row_cga['dept'];
    			    $_SESSION['admin_id'] = $row_cga['id'];
    
    				echo "<script>window.location.href='../cga/drm/index.php';</script>";
		        }
		        else
		        {
    				echo "<script>
    				alert('Your Login is restricted! Please Contact to Administrator');
    				window.location.href='index.php';
    				</script>";
		        }
			}

			if ($_POST['cga'] == 3) 
			{
			    if($count_cga !=0 )
		        {
    				$_SESSION['username'] = $row_cga['username'];
    				$_SESSION['role'] = $row_cga['role'];
    				$_SESSION['pf_number'] = $row_cga['pf_number'];
    				$_SESSION['unitid'] = $row_cga['unit_id'];
    				$_SESSION['dept'] = $row_cga['dept'];
    			    $_SESSION['admin_id'] = $row_cga['id'];
    
    				echo "<script>window.location.href='../cga/sr_dpo/index.php';</script>";
			    }
			    else
		        {
    				echo "<script>
    				alert('Your Login is restricted! Please Contact to Administrator');
    				window.location.href='index.php';
    				</script>";
		        }
			}

			if ($_POST['cga'] == 4) 
			{
			    if($count_cga !=0 )
		        {
    				$_SESSION['username'] = $row_cga['username'];
    				$_SESSION['role'] = $row_cga['role'];
    				$_SESSION['pf_number'] = $row_cga['pf_number'];
    				$_SESSION['unitid'] = $row_cga['unit_id'];
    				$_SESSION['dept'] = $row_cga['dept'];
    			    $_SESSION['admin_id'] = $row_cga['id'];
    
    				echo "<script>window.location.href='../cga/dpo/index.php';</script>";
		        }
		        else
		        {
    				echo "<script>
    				alert('Your Login is restricted! Please Contact to Administrator');
    				window.location.href='index.php';
    				</script>";
		        }
			}

			if ($_POST['cga'] == 5) 
			{
			    if($count_cga !=0 )
		        {
    				$_SESSION['username'] = $row_cga['username'];
    				$_SESSION['role'] = $row_cga['role'];
    				$_SESSION['pf_number'] = $row_cga['pf_number'];
    				$_SESSION['unitid'] = $row_cga['unit_id'];
    				$_SESSION['dept'] = $row_cga['dept'];
    			    $_SESSION['admin_id'] = $row_cga['id'];
    
    				echo "<script>window.location.href='../cga/wi/index.php';</script>";
		        }
		        else
		        {
    				echo "<script>
    				alert('Your Login is restricted! Please Contact to Administrator');
    				window.location.href='index.php';
    				</script>";
		        }
			}

			if ($_POST['cga'] == 6) 
			{
			    if($count_cga !=0 )
		        {
    				$_SESSION['username'] = $row_cga['username'];
    				$_SESSION['role'] = $row_cga['role'];
    				$_SESSION['pf_number'] = $row_cga['pf_number'];
    				$_SESSION['unitid'] = $row_cga['unit_id'];
    				$_SESSION['dept'] = $row_cga['dept'];
    			    $_SESSION['admin_id'] = $row_cga['id'];
    
    				echo "<script>window.location.href='../cga/cc/index.php';</script>";
		        }
		        else
		        {
    				echo "<script>
    				alert('Your Login is restricted! Please Contact to Administrator');
    				window.location.href='index.php';
    				</script>";
		        }
			}

			if ($_POST['cga'] == 7) 
			{
			    if($count_cga !=0 )
		        {
    				$_SESSION['username'] = $row_cga['username'];
    				$_SESSION['role'] = $row_cga['role'];
    				$_SESSION['pf_number'] = $row_cga['pf_number'];
    				$_SESSION['unitid'] = $row_cga['unit_id'];
    				$_SESSION['dept'] = $row_cga['dept'];
    			    $_SESSION['admin_id'] = $row_cga['id'];
    
    				echo "<script>window.location.href='../cga/rcc/index.php';</script>";
		        }
		        else
		        {
    				echo "<script>
    				alert('Your Login is restricted! Please Contact to Administrator');
    				window.location.href='index.php';
    				</script>";
		        }
			}

			if ($_POST['cga'] == 8) 
			{
			    if($count_cga !=0 )
		        {
    				$_SESSION['username'] = $row_cga['username'];
    				$_SESSION['role'] = $row_cga['role'];
    				$_SESSION['pf_number'] = $row_cga['pf_number'];
    				$_SESSION['unitid'] = $row_cga['unit_id'];
    				$_SESSION['dept'] = $row_cga['dept'];
    			    $_SESSION['admin_id'] = $row_cga['id'];
    
    				echo "<script>window.location.href='../cga/dec/index.php';</script>";
		        }
		        else
		        {
    				echo "<script>
    				alert('Your Login is restricted! Please Contact to Administrator');
    				window.location.href='index.php';
    				</script>";
		        }
			}

			if ($_POST['cga'] == 0) 
			{
				//echo "in";exit();
                
				$sql_cga1 = "SELECT username, ex_emp_pfno, applicant_name, ex_empname, status FROM applicant_registration WHERE username = '$pf_num'";
				$result_cga1 = mysqli_query($conn, $sql_cga1);
				$row_cga1 = mysqli_fetch_assoc($result_cga1);
				//print_r($row_cga1);
                //exit();
				if($row_cga1['status'] == 1)
				{
					$_SESSION['appl_username'] = $row_cga1['username'];
					$_SESSION['ex_emp_pfno'] = $row_cga1['ex_emp_pfno'];
					$_SESSION['applicant_name'] = $row_cga1['applicant_name'];
					$_SESSION['ex_empname'] = $row_cga1['ex_empname'];

					echo "<script>window.location.href='../cga/applicant/index.php';</script>";	
				}
				else
				{
				    //exit();
					echo "<script>
					alert('Your Login is restricted! Please Contact to Recruitment Cell Clerk');
					window.location.href='index.php';
					</script>";
				}				
			}	
		}

		if(isset($_POST['itp']))
		{
			unset($_SESSION['user']);

			if($_POST['itp'] == 0)
			{
				$_SESSION['user'] = 'admin';
				echo "<script>window.location.href='../it particular/dashboard.php';</script>";
			}

			if($_POST['itp'] == 1)
			{
				$_SESSION['user'] = $pf_num;
				echo "<script>window.location.href='../it particular/dashboard.php';</script>";
			}			
		}
		
		if(isset($_POST['sar']))
		{
		    
			unset($_SESSION['id']);
			unset($_SESSION['SESS_MEMBER_ID']);
			unset($_SESSION['SESS_ADMIN_FULLNAME']);
			unset($_SESSION['SESSION_ROLE']);
			unset($_SESSION['SESS_MEMBER_NAME']);
			unset($_SESSION['SESS_ADMIN_NAME']);
			unset($_SESSION['set_update_pf']);
			unset($_SESSION['same_pf_no']);

			if($_POST['sar'] == 0)
			{
			    
			    mysqli_connect('localhost', 'root', '');
    			if(mysqli_select_db($conn, 'drmpsurh_sr'))
    			{
    				//echo "Connected";
    			}
    			else
    			{
    				//echo "Not Connected";
    			}
			    //exit();
			    $_SESSION['id'] = 1;
    			$_SESSION['SESS_MEMBER_ID'] = 1;
    			$_SESSION['SESS_ADMIN_FULLNAME'] = 'Admin';
    			$_SESSION['SESSION_ROLE'] = 'superadmin';
    			$_SESSION['SESS_MEMBER_NAME'] = 'drmsr';
    			$_SESSION['SESS_ADMIN_NAME'] = 'drmsr';
    			/*$_SESSION['set_update_pf']='';
    			$_SESSION['same_pf_no']='';*/
    			echo "<script>window.location.href='e-sr/admin/index.php';</script>";
			}

			

			if ($_POST['sar'] == 1) {
				
				// Create the connection to the database
				$conn = new mysqli('localhost', 'root', '', 'drmpsurh_sr');
				
				// Check the connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
			
				// Define the SQL query
				$pf_num = $_SESSION['pf_num']; // Assuming $pf_num is stored in the session
				$sql_sar = "SELECT * FROM user_login WHERE pf_no = '$pf_num' AND act_deact = '0'";
			
				// Execute the query
				$result_sar = $conn->query($sql_sar);
			
				if ($result_sar && $result_sar->num_rows > 0) {
					$row_sar = $result_sar->fetch_assoc();
					
					// Store the results in session variables
					$_SESSION['id'] = $row_sar['adminid'];
					$_SESSION['SESS_MEMBER_ID'] = $row_sar['adminid'];
					$_SESSION['SESS_ADMIN_FULLNAME'] = $row_sar['adminname'];		
					$_SESSION['SESSION_ROLE'] = $row_sar['role'];
					$_SESSION['SESS_MEMBER_NAME'] = $row_sar['username'];
					$_SESSION['SESS_ADMIN_NAME'] = $row_sar['username'];
					$_SESSION['set_update_pf'] = '';
					$_SESSION['same_pf_no'] = '';
			
					// Redirect to the admin index page
					echo "<script>window.location.href='e-sr/admin/index.php';</script>";
				} else {
					// Handle the case where no results are found
					echo "<script>alert('User not found or inactive.');</script>";
				}
			
				// Close the connection
				$conn->close();
			}
			
			
			
			if($_POST['sar'] == 2)
			{
				$_SESSION['user'] = $pf_num;
				$_SESSION['id']=$row['id'];
			    $_SESSION['name']='guest';
				echo "<script>window.location.href='e-sr/admin/display_sr_tab.php?pf=".$pf_num."';</script>";
			}
		}
		
		if(isset($_POST['forms']))
		{
			//unset($_SESSION['user']);

			if($_POST['forms'] == 0)
			{
				$_SESSION['user'] = 'admin';
				echo "<script>window.location.href='../forms/dashboard.php';</script>";
			}
			
			if($_POST['forms'] == 1)
			{
				$_SESSION['user'] = 'employee';
				echo "<script>window.location.href='../forms/dashboard.php';</script>";
			}
		}
		
		
		if(isset($_POST['apar']))
		{
		    /*print_r($_POST['apar']);exit();*/
			unset($_SESSION['id']);
			unset($_SESSION['SESS_MEMBER_ID']);
			unset($_SESSION['SESS_ADMIN_FULLNAME']);
			unset($_SESSION['SESS_MEMBER_NAME']);
			unset($_SESSION['SESS_ADMIN_NAME']);
			unset($_SESSION['staff']);
			unset($_SESSION['SESS_USER_ID']); 
			unset($_SESSION['SESS_USER_NAME']);
			unset($_SESSION['Department']);
			unset($_SESSION['Access_level']);
			unset($_SESSION['EMP_PF_NO']);
			unset($_SESSION['employee']);
			unset($_SESSION['SESS_EMPLOYEE_ID']);
			unset($_SESSION['SESS_EMPLOYEE_NAME']);
			unset($_SESSION['SESS_YEAR']);

			if($_POST['apar'] == 0)
			{
			
				$_SESSION['id'] = 1;
				$_SESSION['SESS_MEMBER_ID'] = 1;
				$_SESSION['SESS_ADMIN_FULLNAME'] = 'Chandra Mohiyar';
				$_SESSION['SESS_MEMBER_NAME'] = 'admin';
				$_SESSION['SESS_ADMIN_NAME'] = 'admin';

			echo "<script>window.location.href='../e-apar/main/admin/index.php';</script>";
				
			}

			if($_POST['apar'] == 1)
			{
				mysqli_connect('localhost','root','');
				if(mysqli_select_db($conn,'drmpsurh_eapar'))
				{
					//echo "Connected";
				}
				else
				{
					//echo "Not Connected";
				}
				//exit();
				$sql_usr = "SELECT * FROM tbl_user WHERE username = '$pf_num' AND accesslevel = 'Admin'";
				$result_usr = mysqli_query($conn ,$sql_usr);
				$row_usr = mysqli_fetch_assoc($result_usr);	

				$_SESSION['staff'] = $row_usr['userid'];
				$_SESSION['SESS_USER_ID'] = $row_usr['userid'];
				$_SESSION['SESS_USER_NAME'] = $row_usr['fullname'];
				$_SESSION['SESS_MEMBER_NAME'] = $row_usr['username'];
				$_SESSION['Department'] = $row_usr['dept'];
				$_SESSION['Access_level'] = $row_usr['accesslevel'];
				echo "<script>window.location.href='../e-apar/main/user/index.php';</script>";
			}
			
			if($_POST['apar'] == 2)
			{
			    
				mysqli_connect('localhost','root','');
				if(mysqli_select_db($conn,'drmpsurh_eapar'))
				{
					//echo "Connected";
				}
				else
				{
					//echo "Not Connected";
				}
				//exit();
				$sql_usr = "SELECT * FROM tbl_user WHERE username = '$pf_num' AND accesslevel = 'Office general'";
				/*echo $sql_usr;exit();*/
				$result_usr = mysqli_query($conn, $sql_usr);
				$row_usr = mysqli_fetch_assoc($result_usr);	
                /*echo "<pre>";
                print_r($row_usr);exit();*/
				$_SESSION['staff'] = $row_usr['userid'];
				$_SESSION['SESS_USER_ID'] = $row_usr['userid'];
				$_SESSION['SESS_USER_NAME'] = $row_usr['fullname'];
				$_SESSION['SESS_MEMBER_NAME'] = $row_usr['username'];
				$_SESSION['Department'] = $row_usr['dept'];
				$_SESSION['Access_level'] = $row_usr['accesslevel'];

				echo "<script>window.location.href='../e-apar/main/user/index.php';</script>";
			}
			
			if($_POST['apar'] == 3)
			{
				mysqli_connect('localhost','root','');
				if(mysqli_select_db($conn,'drmpsurh_eapar'))
				{
					//echo "Connected";
				}
				else
				{
					//echo "Not Connected";
				}
				//exit();
				$sql_usr = "SELECT * FROM tbl_user WHERE username = '$pf_num' AND accesslevel = 'Officer Departmental'";
				$result_usr = mysqli_query($conn, $sql_usr);
				$row_usr = mysqli_fetch_assoc($result_usr);	
				$_SESSION['staff'] = $row_usr['userid'];
				$_SESSION['SESS_USER_ID'] = $row_usr['userid'];
				$_SESSION['SESS_USER_NAME'] = $row_usr['fullname'];
				$_SESSION['SESS_MEMBER_NAME'] = $row_usr['username'];
				$_SESSION['Department'] = $row_usr['dept'];
				$_SESSION['Access_level'] = $row_usr['accesslevel'];

				echo "<script>window.location.href='../e-apar/main/user/index.php';</script>";
			}
			
			if($_POST['apar'] == 4)
			{
				mysqli_connect('localhost','root','');
				if(mysqli_select_db($conn ,'drmpsurh_eapar'))
				{
					//echo "Connected";
				}
				else
				{
					//echo "Not Connected";
				}
				//exit();
				$sql_usr = "SELECT * FROM tbl_user WHERE username = '$pf_num' AND accesslevel = 'Cadder Cheif Office Superitendent'";
				$result_usr = mysqli_query($conn, $sql_usr);
				$row_usr = mysqli_fetch_assoc($result_usr);	
				$_SESSION['staff'] = $row_usr['userid'];
				$_SESSION['SESS_USER_ID'] = $row_usr['userid'];
				$_SESSION['SESS_USER_NAME'] = $row_usr['fullname'];
				$_SESSION['SESS_MEMBER_NAME'] = $row_usr['username'];
				$_SESSION['Department'] = $row_usr['dept'];
				$_SESSION['Access_level'] = $row_usr['accesslevel'];
				echo "<script>window.location.href='../e-apar/main/user/index.php';</script>";
			}
			
			if($_POST['apar'] == 5)
			{
				mysqli_connect('localhost','root','');
				if(mysqli_select_db($conn ,'drmpsurh_eapar'))
				{
					//echo "Connected";
				}
				else
				{
					//echo "Not Connected";
				}
				//exit();
				$sql_usr = "SELECT * FROM tbl_user WHERE username = '$pf_num' AND accesslevel = 'Techinical'";
				$result_usr = mysqli_query($conn ,$sql_usr);
				$row_usr = mysqli_fetch_assoc($result_usr);	
				$_SESSION['staff'] = $row_usr['userid'];
				$_SESSION['SESS_USER_ID'] = $row_usr['userid'];
				$_SESSION['SESS_USER_NAME'] = $row_usr['fullname'];
				$_SESSION['SESS_MEMBER_NAME'] = $row_usr['username'];
				$_SESSION['Department'] = $row_usr['dept'];
				$_SESSION['Access_level'] = $row_usr['accesslevel'];

				echo "<script>window.location.href='../e-apar/main/user/index.php';</script>";
			}

			if($_POST['apar'] == 6)
			{
				mysqli_connect('localhost','root','');
				if(mysqli_select_db($conn, 'drmpsurh_eapar'))
				{
					//echo "Connected";
				}
				else
				{
					//echo "Not Connected";
				}

				//exit();
				$sql_emp = "SELECT * FROM tbl_employee WHERE username = '$pf_num'";
				$result_emp = mysqli_query($conn, $sql_emp);
				$row_emp = mysqli_fetch_assoc($result_emp);
				$_SESSION['EMP_PF_NO'] = $row_emp['emplcode'];
				$_SESSION['employee'] = $row_emp['empid'];
				$_SESSION['SESS_EMPLOYEE_ID'] = $row_emp['empid'];
				$_SESSION['SESS_EMPLOYEE_NAME'] = $row_emp['empname'];
				$_SESSION['SESS_MEMBER_NAME'] = $row_emp['username'];
				$_SESSION['EMP_PF_NO'] = $row_emp['emplcode'];
				$_SESSION['SESS_YEAR'] = $row_emp['year'];
				$_SESSION['Access_level'] = "none";
				echo "<script>window.location.href='../e-apar/main/user/frmemployeedetails.php';</script>";
			}			
		}
		
		// e-application
		if (isset($_POST['e_app'])) 
		{
			unset($_SESSION['user']);
			unset($_SESSION['user_role']);
			if ($_POST['e_app'] == 0) 
			{
			    $_SESSION['user'] = $pf_num;
				$_SESSION['user_role'] = 'admin';
				/*echo "<pre>";
				print_r($_SESSION);exit();*/
				echo "<script>window.location.href='../e-application/dashboard.php';</script>";
			}
			if ($_POST['e_app'] == 1) 
			{
			    $_SESSION['user'] = $pf_num;
				$_SESSION['user_role'] = 1;
				/*echo "<pre>";
				print_r($_SESSION);exit();*/
				echo "<script>window.location.href='../e-application/dashboard.php';</script>";
			}
			if ($_POST['e_app'] == 2) 
			{
			    $_SESSION['user'] = $pf_num;
				$_SESSION['user_role'] = 2;
				/*echo "<pre>";
				print_r($_SESSION);exit();*/
				echo "<script>window.location.href='../e-application/dashboard.php';</script>";
			}
			if ($_POST['e_app'] == 3) 
			{
			    $_SESSION['user'] = $pf_num;
				$_SESSION['user_role'] = 3;
				/*echo "<pre>";
				print_r($_SESSION);exit();*/
				echo "<script>window.location.href='../e-application/dashboard.php';</script>";
			}
		}
		
				if(isset($_POST['dak']))
		{
			unset($_SESSION['role']);
			unset($_SESSION['admin_username']);
		    unset($_SESSION['emp_id']);
			unset($_SESSION['section']);
			unset($_SESSION['dept']);
			unset($_SESSION['desig']);
			mysqli_connect('localhost','root','');
			if(mysqli_select_db($conn , 'drmpsurh_e_dak'))
			{
				//echo "Connected";
			}
			else
			{
				//echo "Not Connected";
			}
			//exit();

			$sql_dak = "SELECT * FROM tbl_user WHERE emp_id = '$pf_num'";
			$result_dak = mysqli_query($conn , $sql_dak);
			$row_dak = mysqli_fetch_assoc($result_dak);

			if($_POST['dak'] == 0)
			{
				$_SESSION['role'] = 0;
				$_SESSION['admin_username'] = 'admin';
				$_SESSION['emp_id'] = $pf_num;
				$_SESSION['dept'] = $row_dak['user_dept'];
				$_SESSION['desig'] = $row_dak['user_desg'];
			    echo "<script>window.location.href='../e-dak/admin/index.php';</script>";
			}

			if($_POST['dak'] == 1)
			{
				$_SESSION['role'] = 1;
				$_SESSION['admin_username'] = $pf_num;
				$_SESSION['emp_id'] = $pf_num;
				$_SESSION['section'] = $row_dak['section'];
				$_SESSION['dept'] = $row_dak['user_dept'];
				$_SESSION['desig'] = $row_dak['user_desg'];
			    echo "<script>window.location.href='../e-dak/dak_clerk/index.php';</script>";
			}

			if($_POST['dak'] == 2)
			{
				$_SESSION['role'] = 0;
				$_SESSION['admin_username'] = $pf_num;
				$_SESSION['emp_id'] = $pf_num;
				$_SESSION['section'] = $row_dak['section'];
				$_SESSION['dept'] = $row_dak['user_dept'];
				$_SESSION['desig'] = $row_dak['user_desg'];
			    echo "<script>window.location.href='../e-dak/section_user/index.php';</script>";
			}

		}
		
		
		if(isset($_POST['feed']))
		{
			unset($_SESSION['user']);
			unset($_SESSION['user_role']);
			if($_POST['feed'] == 0)
			{
				$_SESSION['user'] = $pf_num;
				$_SESSION['user_role'] = 'admin';
			    echo "<script>window.location.href='../feedback/dashboard.php';</script>";
			}

			if($_POST['feed'] == 3)
			{
				$_SESSION['user'] = $pf_num;
				$_SESSION['user_role'] = 3;
			    echo "<script>window.location.href='../feedback/dashboard.php';</script>";
			}

			

		}

		if(isset($_POST['sbf']))
		{
			unset($_SESSION['username']);
			unset($_SESSION['user_role']);
			unset($_SESSION['dept']);


			if($_POST['sbf'] == 0)
			{
				$_SESSION['username'] = $pf_num;
				$_SESSION['dept']=$row['department'];
				$_SESSION['user_role'] = 'admin';
			    echo "<script>window.location.href='../e-sbf/admin/index.php';</script>";
			}

			if($_POST['sbf'] == 1)
			{
				$_SESSION['username'] = $pf_num;
				$_SESSION['dept']=$row['department'];
				$_SESSION['user_role'] = 1;
			    echo "<script>window.location.href='../e-sbf/control_incharge/index.php';</script>";
			}

			if($_POST['sbf'] == 2)
			{
				$_SESSION['username'] = $pf_num;
				$_SESSION['dept']=$row['department'];
				$_SESSION['user_role'] = 2;
			    echo "<script>window.location.href='../e-sbf/sbf_section/index.php';</script>";
			}

			if($_POST['sbf'] == 3)
			{
				$_SESSION['username'] = $pf_num;
				$_SESSION['dept']=$row['department'];
				$_SESSION['user_role'] = 3;
			    echo "<script>window.location.href='../e-sbf/csbf_section/index.php';</script>";
			}


			if($_POST['sbf'] == 4)
			{
				$ap_date = $row['doa'];

				$current_date = date("Y-m-d");

				 $one_year_date = date("Y-m-d",strtotime("+1 year",strtotime($ap_date)));
				if($current_date > $one_year_date)
				{
					$_SESSION['username'] = $pf_num;
					$_SESSION['dept']=$row['department'];
					$_SESSION['user_role'] = 4;
			    	echo "<script>window.location.href='../e-sbf/employee/index.php';</script>";
				}
				else
				{
					echo "<script>
						alert('You cant access');
						window.location.href = 'index.php';
						</script>";
				}

				
			}

		}



		if(isset($_POST['dar']))
		{
			unset($_SESSION['role']); 
			unset($_SESSION['username']);
			unset($_SESSION['emp_id']); 
			unset($_SESSION["id"]);


			mysqli_connect('localhost','root','');

			if(mysqli_select_db($conn ,'drmpsurh_e_dar'))
			{
				//echo "Connected";
			}
			else
			{
				//echo "Not Connected";
			}
			//exit();

			$sql_dar = "SELECT * FROM tbl_user WHERE emp_id = '$pf_num'";
			$result_dar = mysqli_query($conn ,$sql_dar);
			$row_dar = mysqli_fetch_assoc($result_dar);


			if($_POST['dar'] == 1)
			{
				$_SESSION['role'] = 1;
				$_SESSION['username'] = $pf_num;
				$_SESSION['emp_id'] = $pf_num;
				$_SESSION["id"] = $row_dar["id"];

			    echo "<script>window.location.href='../e-dar/admin/index.php';</script>";
			}

			if($_POST['dar'] == 2)
			{
				$_SESSION['role'] = 2;
				$_SESSION['username'] = $pf_num;
				$_SESSION['emp_id'] = $pf_num;
				$_SESSION["id"] = $row_dar["id"];

			    echo "<script>window.location.href='../e-dar/clerk/index.php';</script>";
			}

			if($_POST['dar'] == 3)
			{
				$_SESSION['role'] = 3;
				$_SESSION['username'] = $pf_num;
				$_SESSION['emp_id'] = $pf_num;
				$_SESSION["id"] = $row_dar["id"];

			    echo "<script>window.location.href='../e-dar/discipline_auth/index.php';</script>";
			}

			if($_POST['dar'] == 4)
			{
				$_SESSION['role'] = 4;
				$_SESSION['username'] = $pf_num;
				$_SESSION['emp_id'] = $pf_num;
				$_SESSION["id"] = $row_dar["id"];

			    echo "<script>window.location.href='../e-dar/inquiry_officer/index.php';</script>";
			}


			if($_POST['dar'] == 7)
			{
				
				$_SESSION['role'] = 7;
				$_SESSION['username'] = $pf_num;
				$_SESSION['emp_id'] = $pf_num;
				$_SESSION["id"] = $row_dar["id"];
			    echo "<script>window.location.href='../e-dar/employee/index.php';</script>";	
			}
		}
	  }
	  else
	  {
		echo "<script>
		alert('Please Select atleast one option!');
		window.location.href = 'index.php';
		</script>";
	  }

	}
?>