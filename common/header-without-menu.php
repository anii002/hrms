<?php
require_once 'common/db.php';
$conn = createConnection();
if (!isset($_SESSION["UserName"])) {
    echo "<script>window.location.href='index.php';</script>";
}

if ($_SESSION['UserName'] == 'Employee') {
    unset($_SESSION['username']);
    unset($_SESSION['name']);
    unset($_SESSION['dept']);
    unset($_SESSION['id']);
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    unset($_SESSION['empid']);
    unset($_SESSION['desig']);
    unset($_SESSION['billunit']);
    unset($_SESSION['SESSION_ID']);
    unset($_SESSION['SESSION_NAME']);
    unset($_SESSION['SESSION_ROLE']);
    unset($_SESSION['SESSION_USERNAME']);
    unset($_SESSION['userid']);
    unset($_SESSION['user']);
    unset($_SESSION['empname']);
    unset($_SESSION['role']);
    unset($_SESSION['pf_number']);
    unset($_SESSION['unitid']);
    unset($_SESSION['appl_username']);
    unset($_SESSION['ex_emp_pfno']);
    unset($_SESSION['applicant_name']);
    unset($_SESSION['ex_empname']);
    unset($_SESSION['applicant_name']);
    unset($_SESSION['ex_empname']);
    unset($_SESSION['SESS_MEMBER_ID']);
    unset($_SESSION['SESS_ADMIN_FULLNAME']);
    unset($_SESSION['SESS_MEMBER_NAME']);
    unset($_SESSION['SESS_ADMIN_NAME']);
    unset($_SESSION['staff']);
    unset($_SESSION['SESS_USER_ID']);
    unset($_SESSION['SESS_USER_NAME']);
    unset($_SESSION['Department']);
    unset($_SESSION['Access_level']);
    unset($_SESSION['EMP_PF_NO']);
    unset($_SESSION['employee']);
    unset($_SESSION['SESS_EMPLOYEE_ID']);
    unset($_SESSION['SESS_EMPLOYEE_NAME']);
    unset($_SESSION['SESS_YEAR']);
    unset($_SESSION['set_update_pf']);
    unset($_SESSION['same_pf_no']);
}

$id = $_SESSION['user_id'];
$sql = "SELECT * FROM register_user WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
// print_r($row);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HRMS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="description" content="Solapur HRMS">
    <meta name="title" content="HRMS">
    <meta name=”robots” content=”noindex,nofollow”>

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="dist/css/style.css"> -->
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="dist/css/responsive.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/preloader-style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="dist/img/logo1.png">
    <!-- iCheck -->
    <!-- <link rel="stylesheet" href="plugins/iCheck/flat/blue.css"> -->
    <!-- Morris chart -->
    <!-- <link rel="stylesheet" href="plugins/morris/morris.css"> -->
    <!-- jvectormap -->
    <!-- <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->
    <!-- Date Picker -->
    <!-- <link rel="stylesheet" href="plugins/datepicker/datepicker3.css"> -->
    <!-- Daterange picker -->
    <!-- <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css"> -->
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->
    <link href="bootstrap/css/bootstrap-modal.css" rel="stylesheet" type="text/css">
    <!-- Goodgle fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <style type="text/css">
        .btn-orange-moon {
            background: #FF416C;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #FF416C, #FF4B2B);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #FF416C, #FF4B2B);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            color: #fff;
            /*border: 3px solid #eee;*/
        }

        .btn-pos {
            margin-top: 20px !important;
            margin-left: 200px !important;

        }

        .error {
            color: red !important;
        }

        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 0px 0;
            border-radius: 4px;
        }
    </style>

</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg text-left"><b></b>HRMS-RailSathi</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="index.php" class="sidebar-toggle" style="display: none" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="index.php" class="dropdown-toggle" data-toggle="dropdown">
                                <?php if (isset($row['image'])) { ?>
                                    <img src="images/profile/<?php echo $row['image']; ?>" class="user-image" alt="User Image">
                                <?php } else { ?>
                                    <img src="../hrms/images/profile/User_Circle.png" class="user-image" alt="User Image">
                                <?php } ?>
                                <span class="hidden-xs"><?php echo $row['name']; ?></span>
                            </a>
                            <ul class="dropdown-menu profile-dropdown">
                                <!-- User image -->
                                <!--<li class="user-header">
                                    <img src="dist/img/dashboard/imgnot.jpg" class="img-circle" alt="User Image">
                                    <p>
                                        <?php //echo $row['name']; 
                                        ?>
                           
                                    </p>
                                </li>-->


                                <li class="user-footer pull-left">
                                    <div class="">
                                        <a href="dashboard.php" class=""><i class="fa fa-home"></i> Home</a>
                                    </div>
                                    <div class="">
                                        <a href="profile.php" class=""><i class="fa fa-user"></i> Profile</a>
                                    </div>
                                    <div class="">
                                        <a href="Logout.php" class=""><i class="fa fa-sign-out"></i> Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>




        <div class="content-wrapper bgwhite main-header-without">