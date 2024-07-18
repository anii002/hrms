<?php
require_once('Global_Data/header.php');
error_reporting(0);
?>


<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main" style="background-image: url('images/small1.png');repeat:repeat;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3> <i class="fa fa-users"></i>&emsp;Change Password</h3><br>
            </div>

            <div class="title_right">

            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <form action="" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" value='<?php echo $_SESSION['SESSION_ID']; ?>' name="user_id"
                                id="user_id" />
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Your Registered Mobile
                                            No</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <?php
                                            $sql = "SELECT user_mob FROM tbl_user WHERE user_id = '" . $_SESSION['SESSION_ID'] . "'";
                                            $result = mysqli_query($db_egr,$sql);
                                            $data = mysqli_fetch_array($result);
                                            ?>
                                            <label class="control-label"><?php echo $data['user_mob']; ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">New Password</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="password" class="form-control" id="user_password"
                                                name="user_password" placeholder="Enter Password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Confirm
                                            Password</label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="password" class="form-control" id="cnf_password"
                                                name="cnf_password" placeholder="Confirm Password" required>
                                            <span style="color:red" id="warning"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="col-sm-7 col-xs-12 pull-right">
                                <button type="button" class="btn btn-info source" id="change_pss">Save</button>
                                <a href="index.php" class="btn btn-danger" data-dismiss="modal">Close</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Enter OTP Here</h4>
            </div>
            <div class="modal-body">
                <form action="process.php?action=submit_change_password" method="POST" accept-charset="utf-8">
                    <input type="number" id="typed_otp" name="typed_otp" class="form-control" placeholder="Enter OTP">
                    <input type="hidden" class="form-control" id="request_password" name="request_password">
                    <input type="hidden" value='<?php echo $_SESSION['SESSION_ID']; ?>' name="fetch_user_id"
                        id="fetch_user_id" />
            </div>
            <div class="modal-footer">
                <input type="submit" name="submit_btn" value="Submit" class="btn-info btn">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>

        <script>
        $(document).ready(function() {
            var que = '';
            $(document).on("change", "#cnf_password", function() {
                var password = $("#user_password").val();
                var cnf_password = $(this).val();
                if (password == cnf_password) {
                    que = 1;
                    $("#warning").html("");
                } else {
                    que = 0;
                }
            });
            $('#change_pss').on('click', function() {
                var user_id = $("#user_id").val();
                var password = $("#user_password").val();
                var cnf_password = $("cnf_password").val();
                if (que == 1) {

                    $.ajax({
                        type: 'POST',
                        url: 'change_user.php',
                        data: 'user_id=' + user_id,
                        success: function(html) {
                            // debugger;
                            //alert(html);
                            if (html == 1) {
                                alert(
                                    'Your OTP is send successfully to your Mobile number'
                                );
                                $("#myModal").modal();
                                $("#request_password").val(password);
                            } else {
                                alert('Password change failed. Please try again.');
                            }
                        }
                    });
                } else {
                    $("#warning").html("Password didnt match");
                    alert("Please enter correct password or password didnt match.")
                }
            });
        });
        </script>
        <?php
        require_once('Global_Data/footer.php');
        ?>