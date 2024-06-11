<?php

	include('../dbconfig/dbcon.php');
	dbcon(); 
	
$country_id = ($_REQUEST["txtyear"] <> "") ? trim($_REQUEST["txtyear"]) : "";
if ($country_id <> "")
 {
 
	$country_id=$_POST["txtyear"];
		//echo $_POST["txtyear"];
        ?>
		
		<div class="row">
			<label class="col-md-4">&nbsp;&nbsp;&nbsp;User Type :</label>
					<div class="col-md-8">
					<div class="input-group">
						 <?php 
						  $sqlscapr=mysql_query("select * from tbl_employee where year='$country_id'");
						while($rwYear=mysql_fetch_array($sqlscapr))
						{
						$rwempid=$rwYear["empid"];
						$rwempcode=$rwYear["emplcode"];
						
						$sqlEAPAR=mysql_query("select * from scanned_apr where empid='$rwempcode'");
							while($rwEAPAR=mysql_fetch_array($sqlEAPAR,MYSQL_ASSOC))
						{
					?>
					<img src="../resources/NAME_PFNO/<?php print $rwEAPAR["image"]; ?>" style="width:100px;height:100px;">&nbsp;&nbsp;&nbsp;
						<?php
						}
						}
						?>
					</div><br>
					</div>
		</div>
					
					
					
     
        <?php
    }
?>