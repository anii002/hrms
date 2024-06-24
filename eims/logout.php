
<script src="../new_eta/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="../new_eta/assets/global/plugins/js_glow/jquery.jgrowl.js"></script>
<link rel="stylesheet" href="../new_eta/assets/global/plugins/js_glow/jquery.jgrowl.css" type="text/css"/>


<?php
	
	session_start();
	
	// if(!isset($_SESSION['user']))
	// {
	// 	echo "HI";
	// }
	// else
	// {
	// 	session_destroy();
	// 	echo '<script type="text/javascript">$.jGrowl("Successfully logged out...", { header: "Logout" }); 
	//  		var delay = 1000;
 //            setTimeout(function(){ window.location = "index.php" }, delay);           
	//       </script>';

	// }

// 
// 
	// // echo $_SESSION['user')];
	if(isset($_SESSION['user']))
	{
		
		session_destroy();
		// unset($_SESSION['user']);
		
		
	 	echo '<script type="text/javascript">$.jGrowl("Successfully logged out...", { header: "Logout" }); 
	 		var delay = 1000;
            setTimeout(function(){ window.location = "login.php" }, delay);           
	      </script>';
	      
	}else{
		echo '<script type="text/javascript">$.jGrowl("Session timout...", { header: "Logout" }); 
	 		var delay = 1000;
            setTimeout(function(){ window.location = "login.php" }, delay);           
	      </script>';
	}
	
?>
