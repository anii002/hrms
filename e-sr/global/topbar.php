<?php
error_reporting(0);
 echo $_SESSION['SESSION_ROLE'];
// require_once('../dbconfig/dbcon.php');
 $conn1 = dbcon1();
 ?>

<style>
.dropbtn {
    background-color: #3c8dbc;
    color: white;
    padding: 10px;
    font-size: 14px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    color: white;
    background-color: #3c8dbc;
    min-width: 200px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content a {
    color: white;
    padding: 5px 5px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #617aa980
}

.dropdown:hover .dropdown-content {
    display: block;
    margin-right: 50px;
}

.dropdown:hover .dropbtn {
    background-color: #3c8dbc;
}
</style>
<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <!-- <span class="logo-mini"><b></b></span> -->
        <!-- logo for regular state and mobile devices -->

        <!--link rel="shortcut icon" href="../resources/admin/images.jpg"-->
		<span class="logo-lg" style="color:white ;">
            <!--img src="../resources/admin/Indian_Railway.png"/ height="30" width="50"-->
            SR MODULE
        </span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <!--a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
		</a-->
        <ul class="nav navbar-nav" style="margin-left:10px;">
            <?php if($_SESSION['name']=='guest') {?>
            <!--<li class=""><a href="../index.php" style="">HOME</a></li>-->
            <li>
                <a href="../../dashboard.php">
                    <i class="fas fa-home"></i>Home</a>
            </li>
            <li>
                <a href="../../Logout.php">
                    <i class="fas fa-sign-out-alt"></i> Log Out </a>
            </li>

            <?php }?>
            <?php if($_SESSION['SESSION_ROLE']=='guest'){?>
            <li class="" <?php if($_GLOBALS['a']=='index'){echo 'class="active"';}?>>
                <a href="index.php" style="">HOME</a></li>
            <li>
                <div class="dropdown" style="">
                    <button class="dropbtn" style="font-size:17px;margin-top:3px;">TRANSACTIONS&nbsp;<i
                            class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <!--a href="biodata_update.php">SR-ENTRY/UPDATE</a-->
                        <a href="sr_search.php">SR VIEW</a>
                        <a href="history_search.php">SR HISTORY</a>
                        <a href="print_sr.php">SR BOOK</a>
                    </div>
                </div>
            </li>
            <?php }?>
            <?php  
			   if($_SESSION['SESSION_ROLE']=='superadmin') {?>
            <li class="" 
            <?php if($_GLOBALS['a']=='index'){echo 'class="active"';}?>><a href="index.php"
                    style="">HOME</a></li>
            <li>
                <div class="dropdown" style="">
                    <button class="dropbtn" style="font-size:17px;margin-top:3px;">TRANSACTIONS&nbsp;<i
                            class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="biodata_update.php">SR-ENTRY/UPDATE</a>
                        <a href="sr_search.php">SR VIEW</a>
                        <a href="history_search.php">SR HISTORY</a>
                        <a href="print_sr.php">SR BOOK</a>
                    </div>
                </div>
            </li>

            <li>
                <div class="dropdown" style="">
                    <button class="dropbtn" style="font-size:17px;margin-top:3px;">REPORTS&nbsp;<i
                            class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="reports.php">DEPARTMENT BILLUNIT WISE REPORT</a>
                        <a href="new_report.php">EMP FILLED SR DETAILS</a>
                        <a href="service_status_report.php">SERVICE STATUS REPORT</a>
                    </div>
                </div>
            </li>

            <li>
                <div class="dropdown" style="">
                    <button class="dropbtn" style="font-size:17px;margin-top:3px;">USER MANAGMENT&nbsp;<i
                            class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="user_mgt.php">ADD USER</a>

                    </div>
                </div>
            </li>

            <li>
                <div class="dropdown" style="">
                    <button class="dropbtn" style="font-size:17px;margin-top:3px;">MASTERS&nbsp;<i
                            class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="add_dept.php"><span>Department</span>&nbsp&nbsp&nbsp&nbsp;</a>
                        <a href="add_increment_type.php"><span>Increment Type</span></a>
                        <a href="add_penalty_award.php"><span>Penalty Awarded</span></a>
                        <a href="add_penalty_effected.php"><span></span>Penalty Effected</a>
                        <a href="add_property_source.php"><span>Property Source</span></a>
                        <a href="add_awards.php"><span>Awards</span></a>
                        <a href="add_movable_item.php"><span>Property Item Movable</span></a>
                        <a href="add_inmovable_item.php"><span>Property Item Inmovable</span></a>
                        <a href="community.php"><span>Community</span></a>
                        <a href="add_religion.php"><span>Religion</span></a>
                        <a href="add_recruitment_code.php"><span>Recruitment</span></a>
                    </div>
                </div>
            </li>

            <?php }?>

            <?php if($_SESSION['SESSION_ROLE']=='user') {?>
            <li <?php if($_GLOBALS['a']=='reports'){echo 'class="active"';}?>><a href="reports.php">REPORTS</a></li>
            <li <?php if($_GLOBALS['a']=='report1'){echo 'class="active"';}?>><a href="new_report.php">NEW REPORTS</a>
            </li>
            <li <?php if($_GLOBALS['a']=='find_billunit'){echo 'class="active"';}?>><a href="find_emp_billunit.php">FIND
                    EMP BILLUNIT</a></li>
            <?php }?>
        </ul>


        <div class="navbar-custom-menu">
    <ul class="navbar-nav">
        <li class="nav-item dropdown user-menu">
            <?php
            //session_start();
            if($_SESSION['SESSION_ROLE']=='superadmin'){
                // dbcon();
                $sqladmin = mysqli_query($conn1, "SELECT * FROM tbl_login WHERE role='" . $_SESSION['SESSION_ROLE'] . "'");
            } else {
                // dbcon1();
                $sqladmin = mysqli_query($conn1, "SELECT * FROM user_login WHERE adminid='" . $_SESSION['SESS_MEMBER_ID'] . "'");
            }

            while($rwAdmin = mysqli_fetch_array($sqladmin, MYSQLI_BOTH)) {
                $rwname = $rwAdmin["adminname"];
                //echo "$rwname";
            ?>
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="../plugins/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">
                    <?php echo $rwname;?>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <div class="dropdown-header text-center">
                    <img src="../plugins/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    <p><?php echo $rwname;?></p>
                </div>
                <!-- Menu Footer-->
                <div class="dropdown-footer d-flex justify-content-between">
                    <a href="../admin/frmadminprofile.php" class="btn btn-default btn-flat">Profile</a>
                    <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
            </div>
            <?php
            }
            ?>
        </li>
    </ul>
</div>

    </nav>
</header>