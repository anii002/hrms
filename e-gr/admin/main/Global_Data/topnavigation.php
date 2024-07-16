<?php
// session_start(); // Start the session

// Check if $_SESSION['SESSION_NAME'] is set, otherwise initialize to 'Guest'
$session_name = isset($_SESSION['SESSION_NAME']) ? ucwords($_SESSION['SESSION_NAME']) : 'Guest';

// Check if $_SESSION['profile_image'] is set, otherwise use default image path
$profile_image = isset($_SESSION['profile_image']) ? $_SESSION['profile_image'] : 'img.png';
?>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="../../../../images/profile/<?php echo $profile_image; ?>" alt="Profile Image">
                        <?php echo $session_name; ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="../../../../index.php"><i class="fa fa-home pull-right"></i> Home</a></li>
                        <li><a href="../../../../profile.php"><i class="fa fa-user pull-right"></i> Profile</a></li>
                        <li><a href="../../../../Logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                        <li><a data-toggle="modal" onClick="modu('e_gr')" href="#" data-target="#myModal"><i class="fa fa-sign-in pull-right"></i> Login as</a></li>
                        <!--
        <li><a href="change_password.php" style="font-family:Cambria; font-size:14px;"><i class="fa fa-pencil-square-o pull-right"></i> Change Password</a></li>
        -->
                    </ul>
                </li>
                <script>
                    (function() {
                        $(document).ready(function() {
                            $('#navbox-trigger').click(function() {
                                return $('#navigation-bar').toggleClass('navbox-open');
                            });
                            return $(document).on('click', function(e) {
                                var $target;
                                $target = $(e.target);
                                if (!$target.closest('.navbox').length && !$target.closest(
                                        '#navbox-trigger').length) {
                                    return $('#navigation-bar').removeClass('navbox-open');
                                }
                            });
                        });
                    }.call(this));
                </script>

            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->

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
                                <div id="rad">
                                </div>
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