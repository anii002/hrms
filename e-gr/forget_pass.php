<!DOCTYPE html>
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en-US"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->

<?php include_once('global/header.php');
include_once('global/model.php');
?>

<!-- Start: Header Section
        ================================ -->
<section class="header-section-1 bg-image-1 header-js" id="search"
    style='background-image: url("images/small1.png");background-repeat:repeat;'>
    <div class="overlay-color img-responsive">
        <input type="hidden" id="hidden_id" name="hidden_id">
        <div class="container img-responsive responsive ">
            <div class="row section-separator"
                style="padding-top:150px;background-image: url('images/small1.png');background-repeat:repeat;'">
                <div class="col-md-12 col-sm-12">
                    <form method="post" class="single-form" action="" enctype="multipart/form-data">
                        <center>
                            <h5 style="font-size:24px;">Grievance Form</h5>
                        </center>
                        <hr>
                        <div class="row">
                            <input type="hidden" value='<?php echo $_SESSION['SESSION_ID']; ?>' name="user_id"
                                id="user_id" />
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <!-- First Name -->
                                    <label>Emp No/ PF No</label>
                                </div>
                                <div class="col-md-4">
                                    <!-- First Name -->
                                    <input name="pf_no" id="pf_no" class=" form-control" type="text">
                                </div>
                                <div class="col-md-2">
                                    <!-- First Name -->
                                    <label>Enter Username</label>
                                </div>
                                <div class="col-md-4">
                                    <!-- First Name -->
                                    <input type="text" name="user_name" id="user_name" class="form-control">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <!-- First Name -->
                                        <label>New Password</label>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- First Name -->
                                        <input name="user_password" id="user_password" class="form-control"
                                            type="password">
                                    </div>
                                    <div class="col-md-2">
                                        <!-- First Name -->
                                        <label>Confirm Password</label>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- First Name -->
                                        <input name="cnf_password" id="cnf_password" class="form-control"
                                            type="password">
                                        <span style="color:red" id="warning"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-form text-center col-xs-12">
                                <button type="button" class="btn btn-fill" id="change_pss"
                                    style="background-color:#428bca;">Save</button>
                                <a href="index.php" class="btn btn-fill" style="background-color:#d9534f;"
                                    data-dismiss="modal">Close</a>
                            </div>


                        </div>
                    </form>


                </div> <!-- End: .part-1 -->
            </div> <!-- End: .row -->

        </div> <!-- End: .container -->
    </div> <!-- End: .overlay-color -->
</section>
<!-- End: Header Section
		
		
        ================================ -->

<?php include_once('global/footer.php') ?>
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
        var pf_no = $("#pf_no").val();
        var username = $("#user_name").val();
        var password = $("#user_password").val();
        var cnf_password = $("cnf_password").val();
        if (que == 1) {

            $.ajax({
                type: 'POST',
                url: 'change_user.php',
                data: 'pf_no=' + pf_no + "&user_name=" + username,
                success: function(html) {
                    debugger;
                    // alert(html);
                    if (html == 1) {
                        alert('Your OTP is send successfully to your Mobile number');
                        $("#myModal").modal('show');
                        $("#request_password").val(password);
                        $("#fetch_user_id").val(pf_no);
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