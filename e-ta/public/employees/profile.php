<?php
	require_once("../../global/header.php");
	require_once("../../global/topbar.php");
	require_once("../../global/sidebar.php");
?>
<!--Content page--->
  <div class="content-wrapper" >
    <section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
      <span style="font-size:20px;font-weight:bold;" class="col-sm-8">
        Employee Profile
      </span>
	  <span class="text-right col-sm-4">
	  <button class="btn btn-danger" onclick="history.go(-1);">Back</button>
	  </span>
	  <div class="clearfix"></div>
    </section>
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
			<?php 
				$query = mysql_query("select img from employees where pfno='".$_SESSION['empid']."'");
				$result = mysql_fetch_array($query);
				if($result['img']=="")
				{
			?>
              <img class="profile-user-img img-responsive img-circle" src="../../images/user8-128x128.jpg" alt="User profile picture">
			  <?php 
				}
				else
				{
					echo "<img class='profile-user-img img-responsive img-circle' src='".$result['img']."' alt='User profile picture'>";
				}
				?>
              
              <?php
                $query = "select * from employees where id='".$_SESSION['id']."'";
                $result = mysql_query($query) or die(mysql_error());
                $value = mysql_fetch_array($result);
               ?>
              <h3 class="profile-username text-center"><?php echo $value['name']; ?></h3>

              <p class="text-muted text-center"><?php echo $value['desig']; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Mobile</b> <a class="pull-right"><?php echo $value['mobile']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>E-mail</b> <a class="pull-right"><?php echo $value['desig']; ?></a>
                </li>
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-9">
          <div class="box box-primary" style="padding-top:15px;padding-bottom:10px;padding-right:45px;">
              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="control/adminProcess.php?action=updateUser" method="post">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="fname" value="<?php echo $value['name']; ?>" placeholder="Name" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $value['email']; ?>" placeholder="Email" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputmobile" class="col-sm-2 control-label">mobile</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inputmobile" name="usermobile" value="<?php echo $value['mobile']; ?>" placeholder="Name" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Department</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputmobile" name="mobile" value="<?php echo $value['dept']; ?>" placeholder="Department" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Designation</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputmobile" name="mobile" value="<?php echo $value['desig']; ?>" placeholder="Designation" readonly>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Grade Pay</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputmobile" name="mobile" value="<?php echo $value['gp']; ?>" placeholder="Designation" readonly>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Grade</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputmobile" name="mobile" value="<?php echo $value['grade']; ?>" placeholder="Designation" readonly>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Basic Pay</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputmobile" name="mobile" value="<?php echo $value['bp']; ?>" placeholder="Designation" readonly>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>

        <div class="col-md-offset-3 col-md-9">
          <div class="box box-primary" style="padding-top:15px;padding-bottom:10px;padding-right:45px;">
              <div class="tab-pane" id="settings">

                <form class="form-horizontal" action="control/adminProcess.php?action=changePass" method="post">
                    <h4 style="padding-left:20px;"><b>Change Password</b><br><br></h4>
                  <div class="form-group">
                    <label for="pass" class="col-sm-2 control-label">New Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputName" name="pass" placeholder="New Password" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="confirm" class="col-sm-2 control-label">Confirm Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm New Password" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" style="width:150px;">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
		
		<div class="col-md-offset-3 col-md-9">
          <div class="box box-primary" style="padding-top:15px;padding-bottom:10px;padding-right:45px;">
              <div class="tab-pane" id="settings">

                <form class="form-horizontal" action="control/adminProcess.php?action=changeimg" method="post" enctype="multipart/form-data">
                    <h4 style="padding-left:20px;"><b>Update Profile Photo</b><br><br></h4>
                  <div class="form-group">
                    <label for="pass" class="col-sm-2 control-label"> Profile photo</label>

                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="profile" name="profile" accept="image/*" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" style="width:150px;">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
		
		<div class="col-md-offset-3 col-md-9">
          <div class="box box-primary">
              <div class="tab-pane" id="settings">
			  <div class="alert alert-warning">
			  <strong>Information!</strong> Please contact Administrator for change in profile.
			</div>
              </div>
            </div>
        </div>
		
      </div>
    </section>
  </div>
  <!--Content code end here--->
 <?php
	require_once("../../global/footer.php");
 ?>
