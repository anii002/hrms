<?php
	
	include('main/dbconfig/dbcon.php');	
	dbcon();
	$dir    = 'E:/apar data/CR scan 2015-2016/S&T'."/";
	$copy_dir = 'main/';
	$files1 = scandir($dir);
	$files2 = scandir($copy_dir, 1);

	$file_count = count($files1);
	for($fc=2;$fc<$file_count;$fc++)
	{
		$fetched_emplcode = $files1[$fc];
		
		$query_fetch_employee = "select * from tbl_employee where emplcode like '%$fetched_emplcode%'";
		$resultSet_fetch_employee = mysql_query($query_fetch_employee);
		$count_record = mysql_num_rows($resultSet_fetch_employee);
		
		$employee_result = mysql_fetch_array($resultSet_fetch_employee);
		$emplcode = $employee_result['emplcode'];
		$empname = $employee_result['empname'];
		
		if($count_record==1)
		{
			$year_dir = $dir.$files1[$fc].'/';
			$year = scandir($year_dir);
			 $year_count = count($year);
			 
					$dir_exist = false;
			for($i=2;$i<$year_count;$i++)
			{
				$pictures_dir = $dir .$files1[$fc].'/'.$year[$i].'/';
				$pictures = scandir($pictures_dir);
				$pictures_count = count($pictures);
				if($pictures_count==2)
				{
					echo "No files";
					$query = "INSERT INTO `tbl_upload_trail`(`file_path`, `message`, `emplcode`) VALUES ('','Folder is empty','".$files1[$fc]."')";
					$result = mysql_query($query);
				}
				else
				{
					$incre_count = 0;
					if($dir_exist==false)
							$dir_exist = mkdir($copy_dir.'resources/NAME_PFNO/'.$files1[$fc]);
					mkdir($copy_dir.'resources/NAME_PFNO/'.$files1[$fc].'/'.$year[$i]);
					for($pj=2;$pj<$pictures_count;$pj++)
					{
						$rename = $files1[$fc]."_".$year[$i]."_".$incre_count.".jpeg";
						$file_copied = copy("$dir/$files1[$fc]/$year[$i]/$pictures[$pj]","$copy_dir/resources/NAME_PFNO/".$files1[$fc]."/".$year[$i]."/".$rename."");
						$incre_count++;
						if($file_copied)
						{
							$path = "$copy_dir/resources/NAME_PFNO/".$files1[$fc]."/".$year[$i]."/".$rename."";
							$query = "INSERT INTO `tbl_upload_trail`(`file_path`, `message`, `emplcode`) VALUES ('$path','File uploaded successfully','".$files1[$fc]."')";
							$result = mysql_query($query);
							$query_insert = "INSERT INTO `scanned_img`(`empid`, `empname`, `year`, `image`, `uploadedby`, `uploadeddate`) VALUES ('".$emplcode."', '".$empname."', '".$year[$i]."', '$rename', 'admin',NOW())";
							$insert_result = mysql_query($query_insert);
						}
						else
						{
							$path = "$copy_dir/resources/NAME_PFNO/".$files1[$fc]."/".$year[$i]."/".$rename."";
							$query = "INSERT INTO `tbl_upload_trail`(`file_path`, `message`, `emplcode`) VALUES ('$path',File copy failed','".$files1[$fc]."')";
							$result = mysql_query($query);
						}
					}
				}
			}
		}
		else if($count_record==0)
		{
			$query = "INSERT INTO `tbl_upload_trail`(`file_path`, `message`, `emplcode`) VALUES ('','Record Not found in database','".$files1[$fc]."')";
						$result = mysql_query($query);
		}
		else{
			$query = "INSERT INTO `tbl_upload_trail`(`file_path`, `message`, `emplcode`) VALUES ('','Records are duplicated in database','".$files1[$fc]."')";
			$result = mysql_query($query);
		}
	}
	
	echo "All data uploaded";

?>