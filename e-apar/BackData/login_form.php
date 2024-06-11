              
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p><br>

    <form  id="login_form" method="post" role="form">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="username" id="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row form-group has-feedback">
        <div class="col-xs-8">
          <div class="checkbox icheck" style=" margin-left: 0px">
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
						  }
						  //else if (html == 'true_fieldexecutive'){
							// $.jGrowl(" Welcome to BACHAT GAT SOFT VER.1.0.1.", { header: 'Access Granted' });
							// var delay = 1000;
							// setTimeout(function(){ window.location = 'main/FE/index.php'  }, delay);  
						// }
						 
						else
						{
							$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
						}
						}
					});
					return false;
				});
			});
			</script>
  