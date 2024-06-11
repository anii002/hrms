<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '50%' // optional
    });
  });
</script>              
  <div class="login-box-body" style="
    background: #ccc;
">
    <p class="login-box-msg">Sign in to start your session</p><br>

    <form  id="login_form" method="post" role="form" action="login.php">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="username" maxlength="20" id="username" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" maxlength="20" id="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row form-group has-feedback">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
			<button type="submit" data-placement="top" title="Click Here to Sign In" id="signin" name="login" class="btn btn-primary btn-block  btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
				<script type="text/javascript">
				$(document).ready(function(){
				$('#signin').tooltip('show');
				$('#signin').tooltip('hide');
				});
				</script>	
    <!--a href="register.php" class="text-center">Register a new membership</a-->

  </div>
			<script>
			jQuery(document).ready(function(){
			jQuery("#login_form").submit(function(e){			
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "login.php",
						data: formData,
						success: function(html){
						if(html=='true_admin')
						{
							$.jGrowl("Loading File Please Wait......", { sticky: true });
							$.jGrowl(" Welcome to E-APAR", { header: 'Access Granted' });
							var delay = 1000;
							setTimeout(function(){ window.location = 'main/admin/index.php'  }, delay);  
						}else if(html=='true_staff')
						{
							$.jGrowl("Loading File Please Wait......", { sticky: true });
							$.jGrowl(" Welcome to E-APAR", { header: 'Access Granted' });
							var delay = 1000;
							setTimeout(function(){ window.location = 'main/user/index.php'  }, delay);  
						}else
						{
							$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
						}
						}
					});
					return false;
				});
			});
			</script>
  