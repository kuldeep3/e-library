<?php session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  if ($_SESSION['user_type'] === 'Reader') {
    header("location: /user");
    exit;
  } elseif ($_SESSION['user_type'] === 'Admin') {
    header("location: /admin");
  }
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="app/public/Resources/Login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/vendor/bootstrap/css/bootstrap.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/vendor/css-hamburgers/hamburgers.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/vendor/select2/select2.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/css/util.css" />
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/css/main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <!--===============================================================================================-->
</head>


<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background: #58B747">
    <a class="navbar-brand" href="#" style="cursor: default;">
        <img src="https://www.boxfordlibrary.org/wordpress/wp-content/uploads/2014/03/elibrary-logo.png" alt="" style="max-width: 80px; max-height:100px;" />
    </a>

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    </ul>
    <div class="form-inline my-2 my-lg-0">
        <a class="txt2 mr-sm-2" href="/" style="color: black; float:right;">
            Go to Login
            <i class="fas fa-long-arrow-alt-right m-l-5" aria-hidden="true"></i>
        </a>
    </div>
</nav>
    <div>
        <div class="container">
            <div class="wrap-login100" style="padding-top: 80px;">
                <div class="login100-pic js-tilt" data-tilt style="padding-top: 50px;">
                    <img src="https://thingstoknow2015.files.wordpress.com/2015/06/cool-question-marks-question-mark-scratch-head1.jpg" alt="IMG" style="max-width: 200px; height:auto;" />
                </div>

                <form method="post" action="/forgotpass" class="login100-form " >
                    <span class="login100-form-title" style="padding-bottom: 50px;">
                        E-Library
                        <p class="text-center">Educate – Captivate – Connect</p>
                    </span>
                    <div class="wrap-input100">
                        <input class="input100" type="text" name="email" placeholder="Email" required />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="reset" type="submit">
                            Get Password Reset Link
                        </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="app/public/Resources/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="app/public/Resources/Login/vendor/bootstrap/js/popper.js"></script>
    <script src="app/public/Resources/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="app/public/Resources/Login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="app/public/Resources/Login/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $(".js-tilt").tilt({
            scale: 1.1
        });
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="app/public/Resources/css/footer.css">
    <footer class="mainfooter" role="contentinfo" style="padding-bottom:50px;">
  <div class="footer-middle">
  <div class="container">
    <div class="row">
    	<div class="col-md-12">
            <ul class="social-network social-circle" style="display:flex; justify-content:space-between;">
             <a href="https://www.facebook.com/warlord74300" target="_blank" class="icoFacebook" title="Facebook"><i class="fab fa-2x fa-facebook"></i></a>
             <a href="https://www.linkedin.com/in/kuldeep-upreti-3629ab145/" target="_blank" class="icoLinkedin" title="Linkedin"><i class="fab fa-2x fa-linkedin"></i></a>
             <a href="https://twitter.com/warlord743" target="_blank" class="icoTwitter" title="Twitter"><i class="fab fa-2x fa-twitter"></i></a>
             <a href="https://github.com/kuldeep3" target="_blank" class="icoGithub" title="Github"><i class="fab fa-2x fa-github"></i></a>
            </ul>				
		</div>
    </div>
  </div>
  </div>
</footer>

</body>
<!-- Footer -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

</html>