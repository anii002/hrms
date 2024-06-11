 <?php 
include_once('../global/loginheader.php'); 
 
?>
 <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
      <div class="panel">
        <div class="panel-body">
          <div class="brand">
            <img class="brand-img" height="100px;" width="100px" src="assets/images/logo1.png" alt="...">
            <h2 class="brand-text font-size:18px">e-PF </h2>
          </div>
          <form method="post" action="#">
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="username" id="username" />
              <label class="floating-label">Username</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="password" class="form-control" name="password" id="password" />
              <label class="floating-label">Password</label>
            </div>
            <!--div class="form-group clearfix">
              <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg float-left">
                <input type="checkbox" id="inputCheckbox" name="remember">
                <label for="inputCheckbox">Remember me</label>
              </div>
              <a class="float-right" href="forgot-password.html">Forgot password?</a>
            </div-->
            <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Sign in</button>
          </form>
          <p>Design & Developed by <br> <a href="#" style="color:orange">SALGEM Infoigytech</a> Pvt Ltd.© 2018</p>
        </div>
      </div>

      
    </div>
  </div>

