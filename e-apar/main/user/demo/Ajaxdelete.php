<?php
		
		if(isset($_POST["btnYear"]))
		{
			$getid=$_GET["id"];
			
			if(mysql_query("delete from scanned_img where id='$getid'"))
			{
				echo "<script>alert('Employee APAR Deleted Successfully.....!'); window.location='frmshowemployee.php'</script>";
			}
			
		}
?>
