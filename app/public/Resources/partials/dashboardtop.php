<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title><?php echo($_SESSION['user_type']); ?> Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="app/public/Resources/css/style1.css">

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
        
        <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="background:grey;">Search</button> -->
    </div>
    <!-- </div> -->
</nav>

<body>
    <div>

    </div>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" style="background: #58B747;">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4">
                <?php if($_SESSION['user_type'] == 'Admin'): ?>
                <h1><a href="/admin" class="logo"><?php echo $_SESSION['name']; ?></a></h1>
                <?php endif; ?>
                <?php if($_SESSION['user_type'] == 'Reader'): ?>
                <h1><a href="/user" class="logo"><?php echo $_SESSION['name']; ?></a></h1>
                <?php endif; ?>
                <ul class="list-unstyled components mb-5">
                    <!-- <li>
                        <a href="#"><span class="fa fa-home mr-3"></span>Home</a>
                    </li> -->
                    <li>
                        <a href="/books"><span class="fa fa-book mr-3" style="color: black;"></span> Books</a>
                    </li>
                    <?php if($_SESSION['user_type'] == 'Admin'): ?>
                    <li>
                        <a href="listuser"><span class="fa fa-user mr-3" style="color: black;"></span> Readers</a>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a href="/logout" style="color: rgba(207, 0, 15, 1)" ><span class="fa fa-sign-out mr-3" style="color: red;"></span> Logout</a>
                    </li>

                </ul>
            </div>
        </nav>
