<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse">

            <ul class="page-sidebar-menu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <!-- <span style="color: white;padding-left: 10px;margin-top: 5px">MENU</span> -->
                    <div class="sidebar-toggler hamberger-menu">
                        <i class="fas fa-bars"></i>
                    </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>

                <?php
                if ($GLOBALS['flag'] == "1.1") {
                    ?>
                <li class="active">
                    <?php } else { ?>
                <li>
                    <?php } ?>
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        <span class="title">Dashboard / डॅशबोर्ड</span>
                        <span class="selected"></span>
                        <!-- <span class="arrow open"></span> -->
                    </a>
                </li>
                <!-- ........................... Clerk Start ................................. -->
                <li>
                    <?php
                    if ($GLOBALS['flag'] == "1.2" || $GLOBALS['flag'] == "1.3" || $GLOBALS['flag'] == "1.4") {
                        ?>
                    <a class="menu-toggle waves-effect waves-block toggled">
                        <?php
                        } else {
                            ?>
                        <a class="menu-toggle waves-effect waves-block">
                            <?php
                            } ?>
                            <!-- <a href="javascript:;"> -->
                            <i class="fa fa-user-plus"></i>
                            <span class="title">Clerk</span>
                            <!-- <span class="arrow "></span> -->
                        </a>
                        <ul class="sub-menu">
                            <?php
                            if ($GLOBALS['flag'] == "1.2") {
                                ?>
                            <li class="active">
                                <?php } else { ?>
                            <li>
                                <?php } ?>
                                <a href="pending_froms.php">
                                    <i class="fa fa-user-plus"></i>
                                    <span class="title">Pending Forms List</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <?php
                            if ($GLOBALS['flag'] == "1.3") {
                                ?>
                            <li class="active">
                                <?php } else { ?>
                            <li>
                                <?php } ?>
                                <a href="accepted_forms_list.php">
                                    <i class="fa fa-user-plus"></i>
                                    <span class="title">Accepted Forms List</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <?php
                            if ($GLOBALS['flag'] == "1.4") {
                                ?>
                            <li class="active">
                                <?php } else { ?>
                            <li>
                                <?php } ?>
                                <a href="rejected_forms_list.php">
                                    <i class="fa fa-user-plus"></i>
                                    <span class="title">Rejected Forms List </span>
                                    <span class="selected"></span>
                                </a>
                            </li>

                        </ul>
                </li>
                <!-- .............................Clerk End...................................... -->

                <!-- ........................... IO ................................. -->
                <li>
                    <?php
                    if ($GLOBALS['flag'] == "1.6" || $GLOBALS['flag'] == "1.7" || $GLOBALS['flag'] == "1.8") {
                        ?>
                    <a class="menu-toggle waves-effect waves-block toggled">
                        <?php
                        } else {
                            ?>
                        <a class="menu-toggle waves-effect waves-block">
                            <?php
                            } ?>
                            <!-- <a href="javascript:;"> -->
                            <i class="fa fa-user-plus"></i>
                            <span class="title">Inquiry Officer</span>
                            <!-- <span class="arrow "></span> -->
                        </a>
                        <ul class="sub-menu">
                            <?php
                            if ($GLOBALS['flag'] == "1.6") {
                                ?>
                            <li class="active">
                                <?php } else { ?>
                            <li>
                                <?php } ?>
                                <a href="forwarded_to_io_list.php">
                                    <i class="fa fa-user-plus"></i>
                                    <span class="title">Forwarded to Inquiry Officer</span>
                                    <span class="selected"></span>
                                </a>
                            </li>

                            <?php
                            if ($GLOBALS['flag'] == "1.7") {
                                ?>
                            <li class="active">
                                <?php } else { ?>
                            <li>
                                <?php } ?>
                                <a href="received_from_io_list.php">
                                    <i class="fa fa-user-plus"></i>
                                    <span class="title">Received From Inquiry Officer </span>
                                    <span class="selected"></span>
                                </a>
                            </li>

                            <?php
                            if ($GLOBALS['flag'] == "1.8") {
                                ?>
                            <li class="active">
                                <?php } else { ?>
                            <li>
                                <?php } ?>
                                <a href="accept_list_from_io.php">
                                    <i class="fa fa-user-plus"></i>
                                    <span class="title">Accepted From Inquiry Officer List </span>
                                    <span class="selected"></span>
                                </a>
                            </li>


                            <?php
                            if ($GLOBALS['flag'] == "1.9") {
                                ?>
                            <li class="active">
                                <?php } else { ?>
                            <li>
                                <?php } ?>
                                <a href="rejected_list_to_io.php">
                                    <i class="fa fa-user-plus"></i>
                                    <span class="title">Rejected From Inquiry Officer List </span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                        </ul>
                </li>
                <!-- .............................IO End...................................... -->

                <!-- ........................... EMP ................................. -->
                <li>
                    <?php
                    if ($GLOBALS['flag'] == "1.9" || $GLOBALS['flag'] == "2.0") {
                        ?>
                    <a class="menu-toggle waves-effect waves-block toggled">
                        <?php
                        } else {
                            ?>
                        <a class="menu-toggle waves-effect waves-block">
                            <?php
                            } ?>
                            <!-- <a href="javascript:;"> -->
                            <i class="fa fa-user-plus"></i>
                            <span class="title">Employee</span>
                            <!-- <span class="arrow "></span> -->
                        </a>
                        <ul class="sub-menu">
                            <?php
                            if ($GLOBALS['flag'] == "1.9") {
                                ?>
                            <li class="active">
                                <?php } else { ?>
                            <li>
                                <?php } ?>
                                <a href="emp_replied_list.php">
                                    <i class="fa fa-user-plus"></i>
                                    <span class="title">Replied </span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <?php
                            if ($GLOBALS['flag'] == "2.0") {
                                ?>
                            <li class="active">
                                <?php } else { ?>
                            <li>
                                <?php } ?>
                                <a href="emp_not_replied_list.php">
                                    <i class="fa fa-user-plus"></i>
                                    <span class="title">Not Replied </span>
                                    <span class="selected"></span>
                                </a>
                            </li>

                        </ul>
                </li>
                <!-- .............................EMP End...................................... -->

                <?php
                if ($GLOBALS['flag'] == "1.5") {
                    ?>
                <li class="active">
                    <?php } else { ?>
                <li>
                    <?php } ?>
                    <a href="closed_form_list.php">
                        <i class="fa fa-user-plus"></i>
                        <span class="title">Closed Forms List </span>
                        <span class="selected"></span>
                    </a>
                </li>

            </ul>
            </li>


        </div>
    </div>

    <!-- END SIDEBAR -->