<?php
$cat = App::get('databaseCat')->listCategories(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Book</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="app/public/Resources/Login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/css/util.css">
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--===============================================================================================-->
</head>
<nav class="navbar navbar-expand-lg navbar-light" style="background: #58B747">
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->
    <a class="navbar-brand" href="#">
        <img src="https://www.boxfordlibrary.org/wordpress/wp-content/uploads/2014/03/elibrary-logo.png" alt="" style="max-width: 80px; max-height:100px;">
    </a>



    <!-- <div class="collapse navbar-collapse" id="navbarTogglerDemo03"> -->
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <!-- <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li> -->
    </ul>
    <div class="form-inline my-2 my-lg-0">
        <!-- <a class="txt2 mr-sm-2" href="/signup" style="color: black; float:right;">
            New to e-Library
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
        </a> -->
        <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="background:grey;">Search</button> -->
    </div>
    <!-- </div> -->
</nav>

<body>

    <div class="limiter">
        <div class="container">
            <div class="wrap-login100" style="padding-top: 80px;">
                <div class="login100-pic js-tilt" data-tilt style="padding-top: 50px;">
                    <img src="app/public/Resources/Login/images/books.png" alt="IMG" style="max-width: 200px; height:auto;">
                </div>

                <form method="post" class="login100-form" enctype="multipart/form-data" style="float: right;">
                    <!-- <span class="login100-form-title" style="padding-bottom: 50px;">
                        E-Library
                        <p class="text-center">Educate – Captivate – Connect</p>
                    </span> -->
                    <div class="wrap-input100">
                        <input class="input100" type="text" name="name" placeholder="Book Name" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="text" name="author" placeholder="Author Name" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" type="text" name="edition" placeholder="Edition" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100">
                        <div class="input100" style="padding-top: 15px;"> <span style="color: #999999; cursor:default;">Book Categories</span>
                            <span class="symbol-input100"">
                                <i class="fa fa-file" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <?php $i = 1;
                    foreach ($cat as $row) : ?>
                        <label for=" <?php $row['id'] ?>">
                            <input type="checkbox" class="mr-1" value="<?php echo ($row['id']); ?>" name="<?php echo $i ?>">
                            <?php
                            echo ($row['name']);
                            $i++;
                            ?>
                        </label>
                    <?php
                    endforeach;
                    ?>
                    <div class="wrap-input100">
                        <input class="input100 my" type="file" name="image" style="padding-top: 10px;" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-file" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="bookAdded" value="submit">
                            Add Book
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
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
<footer class="page-footer fixed-bottom" style="background: #58B747; ">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:

    </div>
    <!-- Copyright -->

</footer>

</html>









<?php
// require 'app/public/Resources/partials/formheader.view.php'; 
?>
<!-- <title>Add Book</title>

<body>
    <div class="container">
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Add Book</h4>
                <form action='' method="POST" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="book_name">Book Name:</label>
                                <input type="text" class="form-control" id="book_name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="author_name">Author Name:</label>
                                <input type="text" class="form-control" id="author_name" name="author">
                            </div>
                            <div class="form-group">
                                <label for="book_edition">Edition:</label>
                                <input type="text" class="form-control" id="book_edition" name="edition">
                            </div>
                            <div class="form-group">Book Categories:
                                <div class="input-group"> -->
<?php
// $i = 1;
// foreach ($cat as $row) : 
?>
<!-- <label for=" -->
<?php
// $row['id'] 
?>
<!-- " class="mr-3"> -->
<!-- <input type="checkbox" class="mr-1" value=" -->
<?php
//  echo ($row['id']); 
?>
<!-- " name=" -->
<?php
//  echo $i 
?>
<!-- "> -->
<?php
//  echo ($row['name']);
// $i++;
?>
<!-- </label> -->
<?php
// endforeach; 
?>
<!-- </div>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Add Cover Image</label>
                            </div>

                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit" name="bookAdded" value="submit">Add Book</button>
                        </div>
                    </div>
                </form> -->
<?php
// require 'app/public/Resources/partials/footer.view.php'; 
?>