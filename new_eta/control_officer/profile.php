<?php
$GLOBALS['flag']="1.3";
include('common/header.php');
include('common/sidebar.php'); 
include('control/function.php');
?>

<div class="page-content-wrapper">
    <div class="page-content">

        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.html">Home / मुख पृष्ठ</a>
                    <i class="fa fa-angle-right"></i>
                </li>

                <li>
                    <a href="#"> Profile / </a>
                </li>
            </ul>

        </div>


        <!-- BEGIN PAGE CONTENT-->
        <div class="row margin-top-20">
            <div class="col-md-12">
                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="profile-sidebar">
                    <!-- PORTLET MAIN -->
                    <div class="portlet light profile-sidebar-portlet">
                        <!-- SIDEBAR USERPIC -->

                        <div class="profile-userpic">
                            <?php 
				$query = mysqli_query($conn, "select img from users where empid='".$_SESSION['empid']."'");
				$result = mysqli_fetch_array($query);
				if($result['img']=="")
				{
					?>
                            <img src="../assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive"
                                alt="">
                            <?php 
					}
					else
					{
						echo "<img class='img-responsive' src='".$result['img']."' alt='User profile picture'>";
					}
					?>
                            <?php
	                $query = "select dept from employees where pfno in (select empid from users where empid='".$_SESSION['empid']."')";
	                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	                $value = mysqli_fetch_array($result);
	               ?>
                        </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name">
                                <?php echo $_SESSION['admin_name']; ?>
                            </div>
                            <div class="profile-usertitle-job">
                                CONTROLLING OFFICER
                            </div>
                            <div class="profile-usertitle-job btn-orange-moon ">
                                (<?php echo getdepartment($value['dept']); ?>)
                            </div>
                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                        <!-- SIDEBAR BUTTONS -->
                        <div class="profile-userbuttons">

                        </div>
                        <!-- END SIDEBAR BUTTONS -->
                        <!-- SIDEBAR MENU -->
                        <?php
								$query = mysqli_query($conn, "select mobile,email from employees where pfno='".$_SESSION['empid']."'");
								$result = mysqli_fetch_array($query);
							?>
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li class="active">
                                    <i class="fa fa-mobile"></i>Mobile :
                                    <?php 
										if($result['mobile']=='')
											echo "-";
										else 
											echo $result['mobile'];
										?>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-square"></i>Email ID :
                                    <?php 
										if($result['email']=='')
											echo "-";
										else 
											echo $result['email'];
										?>
                                </li>

                            </ul>
                        </div>
                        <!-- END MENU -->
                    </div>
                    <!-- END PORTLET MAIN -->
                    <!-- PORTLET MAIN -->

                    <!-- END PORTLET MAIN -->
                </div>
                <!-- END BEGIN PROFILE SIDEBAR -->
                <!-- BEGIN PROFILE CONTENT -->
                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light bg-inverse">

                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->

                                    <div class="form-body">
                                        <h4 class="caption-subject font-red-sunglo bold uppercase form-section">Change
                                            Password</h4>

                                        <form class="form-horizontal"
                                            action="control/adminProcess.php?action=changePass" method="post">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">New Password</label>
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-unlock-alt"></i>
                                                            </span>
                                                            <input type="password" class="form-control" id="inputName"
                                                                name="pass" placeholder="New Password"
                                                                required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Confirm Password</label>
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-unlock-alt"></i>
                                                            </span>
                                                            <input type="password" class="form-control" id="confirm"
                                                                name="confirm" placeholder="Confirm New Password"
                                                                required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div align="center">
                                                    <button type="reset" class="btn default">Cancel</button>
                                                    <button type="submit" class="btn blue"><i class="fa fa-check"></i>
                                                        Submit</button>
                                                </div>

                                        </form>

                                        <h4 class="caption-subject font-red-sunglo bold uppercase form-section">Update
                                            Profile Photo </h4>

                                        <form class="form-horizontal" action="control/adminProcess.php?action=changeimg"
                                            method="post" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <div class="col-lg-6">
                                                        <span class="btn green fileinput-button">

                                                            <input type="file" id="profile" name="profile"
                                                                accept="image/*" required="required">
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-4">

                                                        <button type="submit" class="btn blue start">
                                                            <i class="fa fa-upload"></i>

                                                            Update Profile
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>

                                        </form>

                                        <!--/row-->

                                    </div>
                                </div>

                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
</div>










</div>
</div>



<?php
include 'common/footer.php';
?>