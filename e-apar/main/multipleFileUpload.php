 $path = "imageuploads/";
     for($i=0; $i<count($_FILES['file']['name']); $i++){
     $extension = explode('.', basename( $_FILES['file']['name'][$i]));
     $path = $path . md5(uniqid()) . "." . $extension[count($extension)-1]; 

      if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $path )) {
      //insert query 
         echo "uploaded successfully";
          } else{
        echo "Error in Upload";
       }
   }
   
   
   
   
   
   <form method="post" enctype="multipart/form-data"  action="">  
    <input type="file" name="files[]" id="files" multiple />  
    <br /><br />
    <button type="submit">Upload selected files</button>  
PHP Code

foreach ($_FILES["files"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $name = $_FILES["files"]["name"][$key];
            move_uploaded_file($_FILES["files"]["tmp_name"][$key], "" . $_FILES['files']['name'][$key]);
            $sql = "INSERT INTO `test`(`image`) VALUES ('" . $name . "')";
            $result = mysqli_query($connection, $sql);
            echo "The file " . basename($_FILES['multiple_uploaded_files']['name']) . " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    }