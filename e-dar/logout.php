<script src="../../new_eta/assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>

<script type="text/javascript" src="../../new_eta/assets/global/plugins/js_glow/jquery.jgrowl.js"></script>

<link rel="stylesheet" href="../../new_eta/assets/global/plugins/js_glow/jquery.jgrowl.css" type="text/css" />





<?php

include('dbconfig/dbcon.php');

session_start();

//echo $_SESSION['username'];

if (isset($_SESSION['username'])) {



	session_destroy();

	//$_SESSION['session'] = "Logout!!! Successfully Logged Out";



	echo '<script type="text/javascript">$.jGrowl("Successfully logged out...", { header: "Logout" }); 

	 		var delay = 1000;

            setTimeout(function(){ window.location = "../../index.php" }, delay);           

	      </script>';

} else {

	echo "something wrong";

}



?>