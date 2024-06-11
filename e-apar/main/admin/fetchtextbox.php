<?php
include("../dbconfig/dbcon.php");
dbcon();

$variable = ($_REQUEST["var1"] <> "") ? trim($_REQUEST["var1"]) : "";
if ($variable <> "")
 {
 

    
?>
<style>
.primary
{
	 box-shadow: none;
	border-color: rgba(60, 141, 188, 0.53);
}
</style>


	
						<div class="col-md-4 col-sm-4">
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-diamond"></i></div>
							<input type="text" class="form-control primary" name="txtinterity" id="txtinterity">
						</div><br>
						</div>
						
<?php
 }
 ?>