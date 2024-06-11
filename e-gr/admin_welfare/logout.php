<?php
session_start();
session_destroy();
session_start();
$_SESSION['logout']="You're successfully logged out!!!";
echo "<script>window.location='index.php'</script>";

?>