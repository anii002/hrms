<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <div class="sidebar-toggler hamberger-menu">
                    <i class="fas fa-bars"></i>
                </div>
            </li>

            <!-- Dashboard / डॅशबोर्ड -->
            <li <?php echo ($GLOBALS['flag'] == "5.1") ? 'class="start active"' : ''; ?>>
                <a href="emp_dashboard.php">
                    <i class="fas fa-home"></i>
                    <span class="title">Dashboard / डॅशबोर्ड</span>
                </a>
            </li>

            <!-- Office Order -->
            <li <?php echo ($GLOBALS['flag'] == "4.91") ? 'class="start active"' : ''; ?>>
                <a href="office_order1.php">
                    <i class="fas fa-angle-double-right"></i>
                    <span class="title">Office Order</span>
                </a>
            </li>

            <!-- Example of another menu item -->
            <li <?php echo ($GLOBALS['flag'] == "4.92") ? 'class="start active"' : ''; ?>>
                <a href="seniority1.php">
                    <i class="fas fa-angle-double-right"></i>
                    <span class="title">Seniority</span>
                </a>
            </li>

            <!-- Add more menu items as needed -->
            <li <?php echo ($GLOBALS['flag'] == "4.93") ? 'class="start active"' : ''; ?>>
                <a href="attendance.php">
                    <i class="fas fa-angle-double-right"></i>
                    <span class="title">Attendance</span>
                </a>
            </li>

            <li <?php echo ($GLOBALS['flag'] == "4.94") ? 'class="start active"' : ''; ?>>
                <a href="payroll.php">
                    <i class="fas fa-angle-double-right"></i>
                    <span class="title">Payroll</span>
                </a>
            </li>

            <!-- Example with dropdown submenu -->
            <li class="heading">
                <h3 class="uppercase">Reports</h3>
            </li>
            <li <?php echo ($GLOBALS['flag'] == "4.95") ? 'class="start active"' : ''; ?>>
                <a href="monthly_reports.php">
                    <i class="fas fa-angle-double-right"></i>
                    <span class="title">Monthly Reports</span>
                </a>
            </li>
            <li <?php echo ($GLOBALS['flag'] == "4.96") ? 'class="start active"' : ''; ?>>
                <a href="yearly_reports.php">
                    <i class="fas fa-angle-double-right"></i>
                    <span class="title">Yearly Reports</span>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- END SIDEBAR -->

    <!-- END SIDEBAR -->
</div>
<!-- END CONTAINER -->
