<?php

	require_once 'common/db.php';
	require_once 'operations/CommonFunctions.php';

	$id = $_SESSION['user_id'];

	$action = $_REQUEST['action'];

	switch ($action) {
		case 'password':
			
			$password = hashPassword($_POST['password']);

			$sql_pass = "UPDATE user_permission SET password = '$password' WHERE id = '$id'";
			$result_pass = mysql_query($sql_pass);

			if($result_pass)
			{
				echo "<script>
				alert('Password Changed Successfully!');
				window.location.href = 'super_admin_dashboard.php';
				</script>";
				
			}
			else
			{
				echo "<script>
				alert('Failed to Change Password. Please Try Again!');
				window.location.href = 'profile1.php';
				</script>";
			}


			break;
		case 'image':
				/*echo "<pre>";
				print_r($_FILES['image']);exit();*/
			if(isset($_FILES['image']))
			{
			    if(!is_dir('images'))
			    {
			        mkdir('images',0777, true);
			    }
			    
			    if(!is_dir('images/profile'))
			    {
			        mkdir('images/profile',0777, true);
			    }
			    
				$image = $_FILES['image']['name'];
				$ext_arr = explode('/', $_FILES['image']['type']);
				$ext = $ext_arr[1];
				$exti = array('jpg','jpeg','png');

				if(in_array($ext, $exti))
				{

			if(move_uploaded_file($_FILES['image']['tmp_name'],'images/profile/'.$image))
			{
						$sql_img = "UPDATE user_permission SET image = '$image' WHERE id = '$id'";
						$result_img = mysql_query($sql_img);

						if($result_img)
						{ 
							echo "<script>
							alert('Profile Image Updated Successfully!');
							window.location.href = 'super_admin_dashboard.php';
							</script>";
						}	
						else
						{	
							echo "<script>
							alert('Profile Image not Updated PLease try Again!');
							window.location.href = 'profile1.php';
							</script>";
						}
			}
			else
			{   
						echo "<script>
						alert('Profile Image not Updated PLease try Again!');
						window.location.href = 'profile1.php';
						</script>";		
			}
					
				}
				else
				{
					echo "<script>
					alert('Invalid Image type!');
					window.location.href = 'profile1.php';
					</script>";			
				}
			}
			else
			{
				echo "<script>
				alert('Please Choose Image!');
				window.location.href = 'profile1.php';
				</script>";	
			}

				break;	
		
		default:
			
			break;
	}

?>