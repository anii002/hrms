<?php
require_once 'common/db.php';

session_start();

if (!isset($_SESSION["UserName"])) {
    echo "<script>window.location.href='index.php';</script>";
    exit;
}

$id = $_SESSION['user_id'];

$sql = "SELECT * FROM user_permission WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HRMS</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-modal-bs3patch.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-modal.css">
    <link rel="stylesheet" href="bootstrap/css/datepicker3.css">
    <link rel="stylesheet" href="bootstrap/css/select2.min.css">
    <link rel="stylesheet" href="bootstrap/css/preloader-style.css">
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <link rel="icon" type="image/png" sizes="16x16" href="dist/img/logo1.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <style type="text/css">
    .btn-orange-moon {
        background: #FF416C;
        background: -webkit-linear-gradient(to right, #FF416C, #FF4B2B);
    }

    .error {
        color: red !important;
    }
    </style>
</head>

<body class="hold-transition skin-green sidebar-collapse sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="super_admin_dashboard.php" class="logo">
                <span class="logo-mini"></span>
                <span class="logo-lg"><b>HRMS</b></span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="super_admin_dashboard.php" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/profile/<?php echo htmlspecialchars($row['image']); ?>"
                                    class="user-image" alt="User Image">
                                <span class="hidden-xs">Super Admin</span>
                            </a>
                            <ul class="dropdown-menu profile-dropdown">
                                <li class="user-footer pull-left">
                                    <div><a href="super_admin_dashboard.php"><i class="fa fa-home"></i> Home</a></div>
                                    <div><a href="profile1.php"><i class="fa fa-user"></i> Profile</a></div>
                                    <div><a href="Logout.php"><i class="fa fa-sign-out"></i> Sign out</a></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="images/profile/<?php echo isset($row['image']) ? htmlspecialchars($row['image']) : '02th-egg-person.jpg'; ?>"
                            class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo htmlspecialchars($row['name']); ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <ul class="sidebar-menu">
                    <li class="<?php echo ($GLOBALS['flag'] == '1') ? 'treeview active' : 'treeview'; ?>">
                        <a href="super_admin_dashboard.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="<?php echo ($GLOBALS['flag'] == '2') ? 'treeview active' : 'treeview'; ?>">
                        <a href="user-registration.php">
                            <i class="fa fa-user"></i> <span>Add User Permission</span>
                        </a>
                    </li>
                    <li class="<?php echo ($GLOBALS['flag'] == '3') ? 'treeview active' : 'treeview'; ?>">
                        <a href="show-user.php">
                            <i class="fa fa-user"></i> <span>Update User Permission</span>
                        </a>
                    </li>
                    <li class="<?php echo ($GLOBALS['flag'] == '4') ? 'treeview active' : 'treeview'; ?>">
                        <a href="employee.php">
                            <i class="fa fa-user"></i> <span>New Employee Registration</span>
                        </a>
                    </li>
                    <li class="<?php echo ($GLOBALS['flag'] == '5') ? 'treeview active' : 'treeview'; ?>">
                        <a href="display-emp.php">
                            <i class="fa fa-user"></i> <span>Update Employee Details</span>
                        </a>
                    </li>
                    <li>
                        <a href="VirtaulQuery/" target="_blank">
                            <i class="fa fa-user"></i> <span>Query Builder</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>

        <div class="content-wrapper bgwhite">
            <!-- Your content here -->
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>