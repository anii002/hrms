<?php
session_start();
unset($_SESSION['UserId']);
unset($_SESSION['UserName']);
session_destroy();
echo "<script>window.location='index.php';</script>";