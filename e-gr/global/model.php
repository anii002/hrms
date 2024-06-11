<?php
require('config.php');
?>
<!-- Sign in Start -->
<div class="modal " tabindex="-1" role="dialog" id="sign-in">
    <div class="modal-dialog" role="document">
        <div class="modal-content loginmodel">
            <form method="post" action="login.php">
                <div class="modal-header">
                    <h3 class="modal-title">Login</h3>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
                </div>
                <div class="modal-body">
                    <div class="main-div">
                        <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                                required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <input type="checkbox" id="remember-me" tabindex='-1'>
                                <label for="remember-me"> Remember
                                    me</label>
                            </div>
                            <div class="forgot text-right col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <a href="#" tabindex='-1'>Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="login" id="login">Login</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
        </div>
        </form>
    </div>
</div>
<!-- Sign in Ends -->

<!-- Start: Feedback Form
================================== -->

<div class="modal " tabindex="-1" role="dialog" id="feedback">
    <div class="modal-dialog" role="document">
        <div class="modal-content loginmodel">
            <form method="POST" class="single-form" action="process.php?action=add_feedback"
                enctype="multipart/form-data">
                <div class="modal-header">
                    <h3 class="modal-title">Feedback</h3>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <?php
                    if (isset($_SESSION['user'])) {
                        $current = $_SESSION['user'];
                        //echo "<script>alert('$current');</script>";
                        $sql_fetch = mysql_query("select * from resgister_user where emp_no='$current'", $db_common);

                        $fetch = mysql_fetch_array($sql_fetch);
                        $emp_name = $fetch['name'];
                        $emp_email = $fetch['emp_email'];
                        $emp_mob_no = $fetch['mobile'];
                        $emp_id = $fetch["emp_no"];
                    }
                    ?>
                    <div class="main-div">
                        <div class="form-group">
                            <input name="fed_pf" id="fed_pf" class="form-control" type="text"
                                value="<?php echo $emp_id; ?>" placeholder="PF No*" required>
                        </div>
                        <div class="form-group">
                            <input name="fed_name" id="fed_name" class="form-control" type="text"
                                value="<?php echo $emp_name; ?>" placeholder="Name*" required>
                        </div>
                        <div class="form-group">
                            <input name="fed_email" id="fed_email" value="<?php echo $emp_email; ?>"
                                class="contact-email form-control" type="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input name="fed_mobile" value="<?php echo $emp_mob_no; ?>" id="fed_mobile"
                                class=" form-control" type="text" placeholder="Mobile Number*" required>

                        </div>
                        <div class="form-group">
                            <textarea name="fed_remark" id="fed_remark" class="form-control" placeholder="Feedback*"
                                style="resize:none" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="fed_save" id="fed_save">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
        </div>
        </form>
    </div>
</div>

<!-- Sign IN form Old -->
<!--<div id="feedback" class="sign-form modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content loginmodel">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <form method="POST" class="single-form" action="process.php?action=feedback" enctype="multipart/form-data">
                <?php
                if (isset($_SESSION['user'])) {
                    $current = $_SESSION['user'];
                    //echo "<script>alert('$current');</script>";
                    $sql_fetch = mysql_query("select * from employee where emp_id='$current'");

                    $fetch = mysql_fetch_array($sql_fetch);
                    $emp_name = $fetch['emp_name'];
                    $emp_email = $fetch['emp_email'];
                    $emp_mob_no = $fetch['emp_mob'];
                }
                ?>

                <div class="col-xs-12 text-center">
                    <h2 class="section-heading p-b-30">Feedback</h2>
                </div>
                <div class="col-xs-12">
                    Subject
                    <input name="fed_name" id="fed_name" class="form-control" type="text"
                        value="<?php echo $emp_name; ?>" placeholder="Name*" required>
                </div>
                <div class="col-xs-6">
                    Email
                    <input name="fed_email" id="fed_email" value="<?php echo $emp_email; ?>"
                        class="contact-email form-control" type="email" placeholder="Email">
                </div>
                <div class="col-xs-6">
                    Subject
                    <input name="fed_mobile" value="<?php echo $emp_mob_no; ?>" id="fed_mobile" class=" form-control"
                        type="text" placeholder="Mobile Number*" required>
                </div>
                <div class="col-xs-12">
                    Subject
                    <textarea name="fed_remark" id="fed_remark" class="form-control" placeholder="Feedback*"
                        style="resize:none" required></textarea>
                </div>
                div class="col-xs-12">
                            <div class="checkbox">
                                <input type="checkbox" id="remember-me">
                                <label for="remember-me">Remember me</label>
                            </div>
                        </div
                Subject Button
                <div class="btn-form text-center col-xs-12">
                    <button type="" name="fed_save" id="fed_save" class="btn btn-fill"
                        style="border-radius:5px;">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>
End: Sign In Form
        ================================== -->




<!-- Start: Sign Out Form
        ================================== -->
<div id="status" class="sign-form modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content p-t-30 p-b-30" style="width:1300px;margin-left:-200px;
">
            <!-- Modal Close Button -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <form method="POST" class="single-form" action="process.php?action=search">
            </button>

            <div class="col-xs-12 text-center">
                <h2 class="section-heading p-b-30">Grievance Status</h2>
            </div>
            <div class="col-xs-12">
                <!-- First Name -->
                <input name="text" class="contact-first-name form-control" type="text"
                    placeholder="Enter 6 Digit Number" required="">
            </div>
            <div class="btn-form text-center col-xs-12">
                <button class="btn btn-fill" name="searchbtn">Search</button>
            </div>
            </form>
        </div><!-- End: .modal-content -->
    </div><!-- End: .modal-dialog -->
</div><!-- End: .modal -->
<!-- End: Sign Out Form
        ================================== -->