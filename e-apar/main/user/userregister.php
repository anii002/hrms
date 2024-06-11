<?php
include("../global/header.php");
?>
<body style="background-color:#222D32;">
<div class="register-box">
  <div class="register-logo">
   <a  class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b></b></span>
		<!-- logo for regular state and mobile devices -->
		
		<!--link rel="shortcut icon" href="../resources/admin/images.jpg"--><span class="logo-lg" style="color:white ;">
		<img src="../resources/admin/Indian_Railway.png"/ height="30" width="50">
		<b>E</b> - APAR</span>
	</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
	<div class="clearfix"></div>
    <form action="Ajaxontimechange.php" method="post" enctype="multipart/form-data" role="form" >
	
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="txtusername" id="txtusername">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Old Password" id="txtoldpass" name="txtoldpass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="txtpass" id="txtpass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" name="txtnewpass" id="txtnewpass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Change Password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.form-box -->
</div>
</body>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<?php
//include("../global/footer.php");
?>
