<?php
  require_once("../../global/ctrl_incharge_header.php");
	require_once("../../global/ctrl_incharge_topbar.php");
	require_once("../../global/ctrl_incharge_sidebar.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span style="font-size:20px;font-weight:bold;" class="col-sm-3">
        User Profile
      </span>
	  <span class="text-right col-sm-9">
	  <button class="btn btn-danger" onclick="history.go(-1);">Back</button>
	  </span>
	  <div class="clearfix"></div>
    </section>
    <section class="content">

      <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php 
				$query = mysql_query("select img from users where empid='".$_SESSION['empid']."'");
				$result = mysql_fetch_array($query);
				if($result['img']=="")
				{
			?>
              <img class="profile-user-img img-responsive img-circle" src="../../images/user8-128x128.jpg" alt="User profile picture">
			  <?php 
				}
				else
				{
					echo "<img class='profile-user-img img-responsive img-circle' src='".$result['img']."' alt='User profile picture' style='height:100px;'>";
				}
				?>
              <?php
                $query = "select * from employees where pfno in (select empid from users where empid='".$_SESSION['empid']."')";
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
                  <b>E-mail</b> <a class="pull-right"><?php echo $value['email']; ?></a>
                </li>
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <div class="col-md-9">
          <div class="box box-primary" style="padding-top:15px;padding-bottom:10px;padding-right:45px;">
              <div class="tab-pane" id="settings">

                <form class="form-horizontal" action="control/adminProcess.php?action=changePass" method="post">
                    <h4 style="padding-left:20px;"><b>Change Password</b><br><br></h4>
                  <div class="form-group">
                    <label for="pass" class="col-sm-2 control-label">Password</label>

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
                      <input type="file" class="form-control" id="profile" name="profile" accept="image/*" required="required" >
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
      </div>
    </section>
  </div>
  <!--Content code end here--->
 <?php
	require_once("../../global/admin_footer.php");
 ?>
