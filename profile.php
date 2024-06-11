<?php
require_once 'common/db.php';
require_once 'common/header-without-menu.php';
?>
<div class="container">
    <section class="content-header">
        <h1>Profile</h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>

    <section class="content bggrey">

        <div class="">
            <div class="box">
                <div class="col-md-4">

                    <div class="box-primary">
                        <div class="box-body box-profile">
                            <div class="box-bg">
                                <img src="images/profile/<?php echo $row['image']; ?>" class="img-circle"
                                    alt="User Image">
                                <h3 class="profile-username text-center"><?php echo $row['name']; ?></h3>
                                <!-- <p class="text-muted text-center">Controlling Incharge</p> -->
                                <p>PF Number - <?php echo $row['emp_no']; ?></p>
                            </div>
                            <ul class="list-group list-group-unbordered text-left">
                                <li class="list-group-item">
                                    <i class="fa fa-mobile fa-lg"></i>Mobile No. <a
                                        class="pull-right"><?php echo $row['mobile']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <i class="fa fa-envelope"></i>Email Id <a
                                        class="pull-right"><?php echo $row['emp_email']; ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="box-right">
                        <h4><i class="fa fa-lock"></i> Change Password</h4>
                        <div class="col-md-6">
                            <form role="form" method="POST" action="profile_edit.php?action=password" autocomplete="off"
                                name="pro_form">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="Password">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="Confirm Password">Confirm Password</label>
                                        <input type="password" class="form-control" id="conf_password"
                                            name="conf_password" placeholder="Confirm Password">
                                    </div>

                                </div>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success btn-md">Change Password</button>
                                </div>
                            </form>

                            <form method="POST" action="profile_edit.php?action=image" autocomplete="off"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="Image">Update Profile Photo</label>
                                    <input type="file" id="image" name="image" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-info" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>


<?php require_once 'common/footer.php'; ?>