<?php
  require_once("../../global/pemployee_header.php");
  require_once("../../global/pemployee_topbar.php");
  require_once("../../global/pemployee_sidebar.php");
?>

<!--Content page--->
  <div class="content-wrapper" >
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        Employee Profile
        </span>
        <span style="float: right">
        <button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
      </span>
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
                    <label for="inputDeptartment" class="col-sm-2 control-label">Department</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputDeptartment" name="mobile" value="<?php echo $value['dept']; ?>" placeholder="Department" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputDesignation" class="col-sm-2 control-label">Designation</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputDesignation" name="mobile" value="<?php echo $value['desig']; ?>" placeholder="Designation" readonly>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="inputGradPay" class="col-sm-2 control-label">Grade Pay</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputGradPay" name="mobile" value="<?php echo $value['gp']; ?>" placeholder="Designation" readonly>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="inputGrad" class="col-sm-2 control-label">Grade</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputGrad" name="mobile" value="<?php echo $value['grade']; ?>" placeholder="Designation" readonly>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="inputBasicPay" class="col-sm-2 control-label">Basic Pay</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputBasicPay" name="mobile" value="<?php echo $value['bp']; ?>" placeholder="Designation" readonly>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>

        <div class="col-md-offset-3 col-md-9">
          <div class="box box-primary" style="padding-top:15px;padding-bottom:10px;padding-right:45px;">
              <div class="tab-pane" id="settings">

                <form class="form-horizontal">
                    <h4 style="padding-left:20px;"><b>Change Password</b><br><br></h4>
                  <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">New Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="pass" name="pass" placeholder="New Password" required="required">
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
                      <button type="button" class="btn btn-success btn_action" style="width:150px;">Submit</button>
                      <!-- <button type="button" class="btn btn-default btn_action" data-toggle="modal" data-target="#modal_default">Submit</button> -->
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

 <div class="modal fade" id="modal_default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                    <?php
                    if(isset($_SESSION['empid']))
                    {
                    ?>
                    <form action="" method="post">
                   
                      <center>

                          <div class="form-group has-feedback  "style="width: 250px">
                          <input type="password"  class="form-control" placeholder="Enter OTP" name="getotp" required="required">
                          <span class="glyphicon glyphicon-lock form-control-feedback"></span><br>
                          </div>

                      </center>
                   
                    
                      <div class="row ">
                          <div class="col-xs-4">
                          </div>
                          <div class="col-xs-4">
                          <center>
                            <button type="submit" name='btnotp' class="btn btn-danger">Validate OTP</button>
                          </center>
                          </div>
                          <div class="col-xs-4">
                          </div>
                      <!-- /.col -->
                      </div>
                    </form>
                    <?php 
                    }
                    ?>
              </div>
             <!--  <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div> -->
            </div>
            <!-- /.modal-content -->
         </div>
          <!-- /.modal-dialog -->
  </div>
        <!-- /.modal -->

<?php 
  if(isset($_REQUEST['btnotp']))
  {
    $query_select = mysql_query("select * from tbl_otp where empid='".$_SESSION['empid']."' order by id DESC limit 1");
    $result = mysql_fetch_array($query_select);
    if($result['otp']==$_REQUEST['getotp'])
    {
      $_SESSION['otp_match']="success";
      $query_select = mysql_query("delete from tbl_otp where empid='".$_SESSION['empid']."' and otp='".$result['otp']."'");
      $updated = mysql_query("update employees set psw='".hashPassword($_SESSION['pass'],SALT1,SALT2)."' where pfno='".$_SESSION['empid']."'");
      echo "<script>alert('OTP has been matched successfully!!! Please login with new password');window.location='../../index.php';</script>";
    }
    else{
      $_SESSION['otp_match']="failed";
      echo "<script>alert('OTP has not been matched!!!');window.location='profile.php';</script>";
    }
  }
?>

<script >
  
$(document).on('click','.btn_action',function(){

  var newpwd=$("#pass").val();
  var cpwd=$("#confirm").val();
  // alert(newpwd);
  // alert(cpwd);

$.ajax({
    type:"post",
    url:"control/adminProcess.php",
    data:"action=changePass&pass="+newpwd+"&confirm="+cpwd,
    success:function(data){
        //alert(data);
        if(data != 0)
        {
          alert("OTP has been sent on your registered mobile "+data);
          $("#modal_default").modal('toggle');  
          $("#modal_default").modal('show');  
        }
        else
        {
          alert("Confirm password must match with password");
        }
        
    }
});


});

</script>