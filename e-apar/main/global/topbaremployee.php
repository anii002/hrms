<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg text-left">
            <!--<img src="../resources/admin/Indian_Railway.png" height="30" width="50">-->
            e - APAR
        </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <ul class="loginas pull-left">
                    <li><a class="btn btn-info" data-toggle="modal" onClick="modu('apar')" href="#" data-target="#myModal"><i class="fas fa-sign-in-alt"></i> Login As</a></li>
                </ul>
                <li class="dropdown user user-menu">
                    <?php
                    // session_start();
                    include('../dbconfig/dbcon.php'); // include your database connection file
                    $conn = dbcon(); // assuming dbcon() returns a mysqli connection

                    if (isset($_SESSION['EMP_PF_NO'])) {
                        $stmt = $conn->prepare("SELECT empname FROM tbl_employee WHERE emplcode = ?");
                        $stmt->bind_param("s", $_SESSION['EMP_PF_NO']);
                        $stmt->execute();
                        $stmt->bind_result($rwname);
                        $stmt->fetch();
                        $stmt->close();
                    }
                    ?>

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php 
                        if(isset($_SESSION['profile_image'])) {
                        ?>
                            <img src="../../../../images/profile/ <?php echo $_SESSION['profile_image']; ?>" class="user-image" alt="User Image">
                        <?php } else { ?>
                            <img src="../plugins/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <?php } ?>
                        <span class="hidden-xs"><?php echo isset($rwname) ? $rwname : ''; ?></span>
                    </a>

                    <ul class="dropdown-menu profile-dropdown">
                        <li class="user-footer pull-left">
                            <div class="">
                                <a href="../../../../index.php" class="">
                                    <i class="fa fa-home text-info"></i> 
                                    <span class="text-info">Home</span>
                                </a>
                            </div>
                            <div class="">
                                <a href="../../../../profile.php" class=""><i class="fa fa-user text-info"></i> <span class="text-info"> Change Profile </span></a>
                            </div>
                            <div class="">
                                <a href="../../../../Logout.php" class=""><i class="fa fa-sign-out text-info"></i><span class="text-info"> Sign out </span></a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="row">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header btn-orange-moon">
                    <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                    <h4 class="modal-title" style="text-align:center">Login As</h4>
                </div>
                <div class="modal-body">
                    <form action="../../../../redi_module.php" method="POST" class="horizontal-form">
                        <div class="">
                            <div class="row">
                                <div id="rad"></div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-success">Go!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
