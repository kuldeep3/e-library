<?php
// session_start();
// if (!isset($_SESSION['user_type'])) {
//     header("location: /");
// }
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

<body>
    <div>

    </div>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4">
                <h1><a href="#" class="logo"><?php echo $_SESSION['name']; ?></a></h1>
                <ul class="list-unstyled components mb-5">
                    <!-- <li>
                        <a href="#"><span class="fa fa-home mr-3"></span>Home</a>
                    </li> -->
                    <li>
                        <a href="/books"><span class="fa fa-book mr-3"></span> Books</a>
                    </li>
                    <?php if($_SESSION['user_type'] == 'admin'): ?>
                    <li>
                        <a href="listuser"><span class="fa fa-user mr-3"></span> Readers</a>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a href="/logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
                    </li>

                </ul>
            </div>
        </nav>
