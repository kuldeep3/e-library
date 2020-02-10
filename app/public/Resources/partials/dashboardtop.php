<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title><?php echo ($_SESSION['user_type']); ?> Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="app/public/Resources/css/style1.css">
</head>
<nav class="navbar navbar-expand-lg navbar-light" style="background: #58B747">
    <a class="navbar-brand" href="#" style="cursor: default;">
        <img src="https://www.boxfordlibrary.org/wordpress/wp-content/uploads/2014/03/elibrary-logo.png" alt="" style="max-width: 80px; max-height:100px;">
    </a>

    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    </ul>
    <div class="form-inline my-2 my-lg-0">
    </div>
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
                <?php if ($_SESSION['user_type'] == 'Admin') : ?>
                    <h1><a href="/admin" class="logo"><?php echo $_SESSION['name']; ?></a></h1>
                <?php endif; ?>
                <?php if ($_SESSION['user_type'] == 'Reader') : ?>
                    <h1><a href="/user" class="logo"><?php echo $_SESSION['name']; ?></a></h1>
                <?php endif; ?>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="/books"><span class="fa fa-book mr-3" style="color: black;"></span> Books</a>
                    </li>
                    <?php if ($_SESSION['user_type'] == 'Admin') : ?>
                        <li>
                            <a href="listuser"><span class="fa fa-user mr-3" style="color: black;"></span> Readers</a>
                        </li>
                        <li>
                            <a href="categories"><span class="fa fa-database mr-3" style="color: black;"></span> Categories</a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a type="button" data-toggle="modal" data-target="#logoutModal" style="color: rgba(207, 0, 15, 1)"><span class="fa fa-sign-out mr-3" style="color: red;"></span> Logout</a>
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Logout Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p style="color: black;">Are you sure you want to logout?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger">
                                            <a href="/logout" style="color: white; padding:0px;">Yes</a>
                                        </button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>