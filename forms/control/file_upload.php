<?php
	$dir = "images/";
	
	$errors     = array();
    $maxsize    = 2097152;
    $acceptable = array(
        'application/pdf',
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'
    );
	
	// $fname=$_FILES["img1"]["name"];
	
	if(isset($_FILES["img1"]["name"]))
	{	
		if(($_FILES["img1"]["size"] >= $maxsize) || ($_FILES["img1"]["size"] == 0))
		{
			$errors[] = 'File too large. File must be less than 2 megabytes.';
			//header("location:img_load.php");
		}
		
		if((!in_array($_FILES["img1"]["type"],$acceptable)) && (!empty($_FILES["img1"]["type"])))
		{
			$errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
			
		}
		
		 if(count($errors) === 0)
		{
			//changing file name on the time of uploading file
			$data = explode(".", $_FILES["img1"]["name"]);
			$file = rand().".".$data[1];
			
			//upload file
			if(move_uploaded_file($_FILES["img1"]["tmp_name"],$dir.$file)){
				 $PATH = $dir.$_FILES["img1"]["name"];
				echo '<script>alert("successfully");window.location="img_load.php";</script>';
			}
			else
			{
				echo "Error to upload file";
			}
		}
		else
		{
			foreach($errors as $error) {
				echo '<script>alert("'.$error.'");window.location="img_load.php";</script>';
			}
		}
	}
	else{
		echo "something wrong to exit~!";
	}
?>
