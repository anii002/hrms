<?php
require('config.php');
// if (!isset($_SESSION['SESSION_ROLE'])) {
//     echo "<script>alert('Unauthorized Access');window.location='../../../../index.php'</script>";
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="Global_Data/images/icon.png" sizes="16x16" style="border-radius: 50px;" id="logo" type="image/png" media="print">

    <!-- Select2 -->
    <link rel="stylesheet" href="select2/select2.min.css">
    <link rel="icon" type="image/png" href="../../../dist/img/logo1.png">
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <title media="screen"> E-Grievance </title>

    <?php
    //error_reporting(0);
    // require_once('Documents_Model.php');
    require_once('StyleSheet.php');

    ?>
    <style>
        .right_col {
            min-height: 780px;
        }

        html {
            font-family: cambria;
            font-size: 12px;
        }
    </style>
    <style>
        /* Paste this css to your style sheet file or under head tag */
        /* This only works with JavaScript, 
		if it's not present, don't show loader */
        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(vendors/bgLoad.gif) center no-repeat #fff;
        }
    </style>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
        });
    </script>
</head>
<!--body class="nav-md"-->

<body class="nav-md">

    <div class="se-pre-con"></div>
    <div class="container body">
        <div class="main_container">
            <?php

            require('sidebar.php');
            require('topnavigation.php');
            ?>