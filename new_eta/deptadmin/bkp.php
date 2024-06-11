<?php
include('../dbconfig/dbcon.php');

$abc = mysql_query("SELECT * FROM `tasummarydetails` WHERE month = '11' AND year = '2020' AND is_summary_generated = '1' AND summary_id = '0'");
$abcd = mysql_num_rows($abc);
while($row = mysql_fetch_array($abc)){
    
$res = "UPDATE tasummarydetails SET summary_id = '17181' WHERE id = '".$row['id']."'";
$res1 = mysql_query($res);
if($res === true){
    echo "<pre>";
    echo "success";
}
else{
    echo "<pre>";
    echo "false";
}
}
exit();

?>