<?php
include('../dbconfig/dbcon.php');
		dbcon();
		
			
// if($Flag=="Save")
		// {
			$year=$_POST["cmbyear"];
			$empname=$_POST["txtempname"];
			$empcode=$_POST["txtempcode"];
			$dept=$_POST["cmbdept"];
			$designation=$_POST["cmbdesignation"];
			$station=$_POST["cmbstation"];
			$payscale=$_POST["txtpayscale"];
			$interity=$_POST["txtinterity"];
			$substantive=$_POST["txtsubstantive"];
			// $interity=$_POST["txtinterity"];
			$stsc=$_POST["txtstsc"];
			$session=$_POST["txtsession"];
					
					//mkdir("../resources/".$empcode."_".$year);
					if(isset($_FILES['txtfileappr']['tmp_name']))
					{
					$file = addslashes(file_get_contents($_FILES['txtfileappr']['tmp_name']));
					$file = addslashes($_FILES['txtfileappr']['name']);
					$file = getimagesize($_FILES['txtfileappr']['tmp_name']);

					move_uploaded_file($_FILES["txtfileappr"]["tmp_name"], "../resources/NAME_PFNO/" . $_FILES["txtfileappr"]["name"]);
					$file = "/" . $_FILES["txtfileappr"]["name"];
					}
					else
					{
						$file="";
					}
					
					
					if(mysql_query("insert into tbl_employee (year,emplcode,dept,design,station,payscale,integrity,empname,substantive,stsc,uploadfile,createdby,createddate)
						values ('$year','$empcode','$dept','$designation','$station','$payscale','$interity','$empname','$substantive','$stsc','$file','$session',NOW())") && mysql_query("insert into scanned_apr(year,empid,image,createddate) values('$year','$empcode','$file',NOW())"))
					{
						echo "<script>
						alert('Record Added Successfully!!!!');
						window.location='frmaddemployee.php';
						</script>";
					}
					else
					{
						echo mysql_error();
					}
		//}
?>