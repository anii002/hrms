<?php
	require_once 'common/db.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$pf_num = $_POST['pf_no'];
		//echo json_encode($pf_num);exit();
		 $sql_up = "SELECT * FROM user_permission WHERE pf_num = '$pf_num' AND delete_status = 0";
		 $result_up = mysqli_query($conn,$sql_up);
		 $row_up = mysqli_fetch_assoc($result_up);
		 $count_up = mysqli_num_rows($result_up);

		 
		 //echo json_encode($count_up);exit();

		 if($count_up == 0)
		 {
			$sql_reg = "SELECT * FROM register_user WHERE emp_no = '$pf_num'";
			$result_reg = mysqli_query($conn,$sql_reg);
			$row_reg = mysqli_fetch_assoc($result_reg);
			$count_reg = mysqli_num_rows($result_reg);

		 $dept = $row_reg['department'];
         $sql_dept = "SELECT DEPTDESC FROM department WHERE DEPTNO = '$dept'";
         $result_dept = mysqli_query($conn,$sql_dept);
         $row_dept = mysqli_fetch_assoc($result_dept);
         $row_reg['dept'] = $row_dept['DEPTDESC'];

         $desig = $row_reg['designation'];
         $sql_desig = "SELECT DESIGLONGDESC FROM designations WHERE DESIGCODE = '$desig'";
         $result_desig = mysqli_query($conn,$sql_desig);
         $row_desig = mysqli_fetch_assoc($result_desig);
         $row_reg['desig'] = $row_desig['DESIGLONGDESC'];

         $pay = $row_reg['7th_pay_level'];
         $sql_pay = "SELECT pay_text FROM paylevel WHERE num = '$pay'";
         $result_pay = mysqli_query($conn,$sql_pay);
         $row_pay = mysqli_fetch_assoc($result_pay);
         $row_reg['pay_level'] =  $row_pay['pay_text'];

         

			 if($count_reg == 1)
			 {
			 	print_r(json_encode($row_reg));	
			 }
			 else
		 	 {
		 		echo json_encode("User is Not Registered");
		 	 } 	
		 }
		 else
		 {
		 	echo json_encode("Permission Already Given!");
		 }

		
		 

	}


?>