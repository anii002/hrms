<?php

include('../dbconfig/dbcon.php');
$conn = dbcon();


$emp_id = ($_REQUEST["empcode"] <> "") ? trim($_REQUEST["empcode"]) : "";
$year = ($_REQUEST["txtyear"] <> "") ? trim($_REQUEST["txtyear"]) : "";
//if ($emp_id <> "")
//{

$emp_id = $_POST["empcode"];
$year = $_POST["txtyear"];
//$employeeid=$_POST["empcode"];
/* echo $emp_id." | ";
	echo $year;
    */     ?>

<div class="row">
	<div class="clearfix"></div><br>
	<label class="col-md-4">&nbsp;&nbsp;&nbsp;APAR REPORT :</label>
	<div class="clearfix"></div><br>
	<div class="col-md-8">
		<div class="input-group">

			<?php {
				// $sqlscapr=mysql_query("select * from tbl_employee where emplcode='$emp_id'");
				// while($rwYear=mysql_fetch_array($sqlscapr))
				// {
				// $rwempid=$rwYear["empid"];
				// $year=$rwYear["year"];
				//echo "$year";

				$sqlEAPAR = mysqli_query($conn, "select * from scanned_img where empid='$emp_id' AND year='$year'");
				while ($rwEAPAR = mysqli_fetch_array($sqlEAPAR, MYSQLI_ASSOC)) {

					$file = $rwEAPAR["image"];
					//$file=$rwEAPAR["empname"];
					//echo $file;
					if ($file != "/") {

			?>
						<a href="../resources/NAME_PFNO/<?php print $rwEAPAR["image"]; ?>" target="_blank"> <img src="../resources/NAME_PFNO/<?php print $rwEAPAR["image"]; ?>" style="width:250px;height:250px;" alt="Image Not Found">&nbsp;&nbsp;&nbsp;</a>
			<?php
					} else {
						$file = "";
					}
				}
			}
			?>
		</div><br>
	</div>
</div>

<?php
//}
?>