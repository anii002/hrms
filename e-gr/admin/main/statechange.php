<?php
//Include database configuration file
include('config.php');

if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
    $query = mysql_query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC");
    
    //Count total number of rows
    $rowCount = mysql_num_rows($query);
    
    //Display cities list
    if($rowCount > 0){
        echo '<option readonly disabled>Select city</option>';
        while($row = mysql_fetch_assoc($query)){ 
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>