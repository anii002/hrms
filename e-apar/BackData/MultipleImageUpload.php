<!--Multiple File Upload Design-->
	<html>
<body>
  <form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file"  name="images[]"  multiple="multiple" accept="image/*" />
  <input type="submit" name="sub" value="Upload!" />
  </form>
</body>
</html>

	<!--Multiple File Upload Code-->
	
	<?php
include('config.php');
error_reporting(0);     
if(isset($_FILES['images']['name'])):
  define ("MAX_SIZE","2000");
  for($i=0; $i<count($_FILES['images']['name']); $i++)  
  {
  $size=filesize($_FILES['images']['tmp_name'][$i]);    
  if($size < (MAX_SIZE*1024)):    
   $path = "uploads/";
   $name = $_FILES['images']['name'][$i];
   $size = $_FILES['images']['size'][$i];
   list($txt, $ext) = explode(".", $name);
   date_default_timezone_set ("Asia/Calcutta"); 
   $currentdate=date("d M Y");  
   $file= time().substr(str_replace(" ", "_", $txt), 0);
   $info = pathinfo($file);
   $filename = $file.".".$ext;
    if(move_uploaded_file($_FILES['images']['tmp_name'][$i], $path.$filename)) :
       $fetch=$db->query("INSERT INTO gallery(image) VALUES('$filename')");
       if($fetch):
         header('Location:index.php');
       else :
         $error ='Data not inserting';
       endif;
    else :
        $error = 'File moving unsuccessful';
    endif;
  else:
     $error = 'You have exceeded the size limit!';
  endif;      
  }
else:
  $error = 'File not found!';
endif;          
?>
<h2><?php echo @$error ?></h2> <a href="index.php">Try Again</a>