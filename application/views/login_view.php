<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MMOPILOT - LOGIN PAGE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?= base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url()?>assets/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="login-page" style="background: lightgrey;">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow" style="border-radius: 10px;">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center bg-info">
                <div class="content">
                  <div class="logo">
                    <h3>TASK MMOPILOT LOGIN PAGE</h3>
                  </div>
                  <p>*Please login with your account</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6">
              <div class="form d-flex align-items-center bg-white text-dark">
                <div class="content">
                  <form method="post" class="form-validate mb-4" action="<?= base_url(); ?>index.php/login/cek_login">
                    <div class="form-group">
                      <label for="login-username" class="label-material text-dark"> <span class="fa fa-user"></span>&nbsp Username</label>
                      <input id="login-username" type="text" name="email" required data-msg="Please enter your Valid email" placeholder="Enter username / email" class="form-control" style="border-radius: 10px;">
                    </div>
                    <div class="form-group">
                      <label for="login-password" class="label-material text-dark"><span class="fa fa-key"></span>&nbsp Password</label>
                      <input id="login-password" type="password" name="password" required data-msg="Please enter your password" placeholder="Enter password" class="form-control" style="border-radius: 10px;">

                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-dark col-12" style="border-radius: 20px;">Login</button>
                  <!-- </form><a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="register.html" class="signup">Signup</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?= base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?= base_url()?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url()?>assets/js/front.js"></script>
  </body>
</html>
