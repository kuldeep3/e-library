<?php session_start();
if (isset($_GET['time'])) {
    $time = $_GET['time'];
    $curr_time = time();
    $res = $curr_time - $time;
    var_dump($res);
    if ($res > 81600) {
         header('location:/timeout');
    }

    $hash = $_GET['hash'];
    $email = $_GET['email'];

    $_SESSION["hash"] = $hash;
    $_SESSION["email"] = $email;
} else {
    $hash = $_SESSION["hash"];
    $email = $_SESSION["email"];
}


// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
//     if ($_SESSION['user_type'] === 'Reader') {
//         header("location: /user");
//         exit;
//     } elseif ($_SESSION['user_type'] === 'Admin') {
//         header("location: /admin");
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset Password</title>
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
    <link rel="stylesheet" href="app/public/Resources/css/center.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <!--===============================================================================================-->
</head>


<body style="position: relative;">
    <nav class="navbar navbar-expand-lg navbar-light" style="background: #58B747">
        <a class="navbar-brand" href="#" style="cursor: default;">
            <img src="https://www.boxfordlibrary.org/wordpress/wp-content/uploads/2014/03/elibrary-logo.png" alt="" style="max-width: 80px; max-height:100px;" />
        </a>

        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        </ul>
        <div class="form-inline my-2 my-lg-0">
        </div>
    </nav>
    <div>
        <div class="container child">
            <div class="wrap-login100" style="padding-top: 0px;">
                <div class="login100-pic js-tilt" data-tilt style="padding-top: 30px;">
                    <img src="https://020d13fa7c48c40440d5-a88a62c1a4dcaad00c12f3cc1645d040.ssl.cf5.rackcdn.com/images/mac-crm-small-business-platform-for-apple-business-market-gro-crm-account-management-system.png" alt="IMG" />
                </div>

                <form method="post" action="/resetpass" class="login100-form " style="padding-top: 0px;">
                    <span class="login100-form-title" style="padding-bottom: 50px;">
                        E-Library
                        <p class="text-center">Educate – Captivate – Connect</p>
                    </span>
                    <div class="wrap-input100">
                        <input class="input100" type="password" name="password" placeholder="Password" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" type="password" name="verify_password" placeholder="Verify Password" />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <?php
                    if (isset($_SESSION["err"])) { ?>
                        <div class="alert alert-danger" role="alert" style="border-radius: 30px;">
                            <? $err = $_SESSION["err"];
                            echo $err;
                            unset($_SESSION["err"]); ?>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    <?php }
                    ?>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="change" type="submit">
                            Change Password
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
    <footer class="mainfooter fixed-bottom" role="contentinfo">
        <div class="footer-middle" style="padding-top: 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="social-network social-circle" style="display:flex; justify-content:space-between; margin:1rem 0;">
                            <a href="https://www.facebook.com/warlord74300" target="_blank" class="icoFacebook" title="Facebook"><i class="fab fa-1x fa-facebook"></i></a>
                            <a href="https://www.linkedin.com/in/kuldeep-upreti-3629ab145/" target="_blank" class="icoLinkedin" title="Linkedin"><i class="fab fa-1x fa-linkedin"></i></a>
                            <a href="https://twitter.com/warlord743" target="_blank" class="icoTwitter" title="Twitter"><i class="fab fa-1x fa-twitter"></i></a>
                            <a href="https://github.com/kuldeep3" target="_blank" class="icoGithub" title="Github"><i class="fab fa-1x fa-github"></i></a>
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