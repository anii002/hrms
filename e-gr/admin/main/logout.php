<?php
session_start();
echo "<script>window.location='/../main/index.php'</script>";
session_destroy();
 session_start();
$_SESSION['logout']="You're successfully logged out!!!"; 
echo "<script>window.location='../../../index.php'</script>";

?>