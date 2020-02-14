<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title><?php echo ($_SESSION['user_type']); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="app/public/Resources/css/style1.css">
    <noscript>
        <style>
            #myfilter {
                display: none;
            }
        </style>
    </noscript>
</head>
<nav class="navbar navbar-expand-lg navbar-light" style="background: #58B747">
    <?php if ($_SESSION['user_type'] == 'Admin') : ?>
        <a class="navbar-brand" href="admin" style="cursor: default;">
            <img src="https://www.boxfordlibrary.org/wordpress/wp-content/uploads/2014/03/elibrary-logo.png" alt="" style="max-width: 80px; max-height:100px;">
        </a>
    <?php endif; ?>
    <?php if ($_SESSION['user_type'] == 'Reader') : ?>
        <a class="navbar-brand" href="user" style="cursor: default;">
            <img src="https://www.boxfordlibrary.org/wordpress/wp-content/uploads/2014/03/elibrary-logo.png" alt="" style="max-width: 80px; max-height:100px;">
        </a>
    <?php endif; ?>


    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    </ul>
    <div class="form-inline my-2 my-lg-0">
        <?php if ($_SESSION['user_type'] == 'Admin') : ?>
            <a class="txt2 mr-sm-2" href="/addBook" style="color: black; float:right;">
                Add Book
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        <?php endif; ?>
        <?php if ($_SESSION['user_type'] == 'Reader') : ?>

            <link rel="stylesheet" href="app/public/Resources/css/placeholder.css">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="myFilter" onkeyup="myFunction()">
        <?php endif; ?>
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
                    <?php if ($_SESSION['user_type'] == 'Reader') : ?>
                        <li>
                            <a href="read"><span class="fa fa-check mr-3" style="color: black;"></span>Books Read</a>
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
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script>
            $('#back-to-top').fadeIn();
            $(document).ready(function() {
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 50) {
                        $('#back-to-top').fadeIn();
                    } else {
                        $('#back-to-top').fadeOut();
                    }
                });

                $('#back-to-top').click(function() {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 400);
                    return false;
                });
            });
        </script>
        <script src="app/public/Resources/js/popper.js"></script>
        <script src="app/public/Resources/js/bootstrap.min.js"></script>
        <script src="app/public/Resources/js/main.js"></script>
        <?php if ($_SESSION['user_type'] == 'Reader') : ?>

            <script>
                function myFunction() {
                    var input, filter, cards, cardContainer, h5, title, i;
                    input = document.getElementById("myFilter");
                    filter = input.value.toUpperCase();
                    cardContainer = document.getElementById("mybooks");
                    cards = cardContainer.getElementsByClassName("card");
                    group = cardContainer.getElementsByClassName("card-group");
                    for (i = 0; i < cards.length; i++) {
                        title = cards[i].querySelector(".card-body h5.card-title");
                        if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                            cards[i].style.display = "";
                            group[i].style.display = "";
                        } else {
                            cards[i].style.display = "none";
                            group[i].style.display = "none";
                        }
                    }
                }
            </script>
        <?php endif; ?>
        <!-- Page Content  -->

        <div id="content" class="p-4 p-md-5 pt-5">

            <?php if ($_SESSION['user_type'] == 'Reader') : ?>
                <!-- <div class="searchbar" style="float: right;">
                    <input class="search_input" type="text" onkeyup="myFunction()" placeholder="Search by Book name..." id="myFilter">
                    <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
                </div> -->
            <?php endif; ?>
            <h2 class="mb-4"></h2>
            <div class="card-deck" id="mybooks">

                <?php $books = App::get('databaseBook')->listBooks();
                $bookss = App::get('databaseBook')->listBookss();
                $uid = $_SESSION['id'];
                $i = -1;
                $j = 0;
                foreach ($books as $row) :
                    $i++;
                ?>
                    <div class="card-group" style="padding: 10px 0;">
                        <br> <br>
                        <div class="card" style="width: 12rem;">
                            <img class="card-img-top" src="app/public/Resources/img/<?= $row['image'] ?>" alt="">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo ($row['name']);
                                    ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo ($row['author']); ?>
                                </p>
                                <p class="card-text">

                                    <?php
                                    foreach ($bookss[$i] as $key) :
                                        $cat_name = $key['category_id'];
                                        $stmt = App::get('databaseBook')->catName($cat_name);  ?>
                                        <span class="badge badge-dark" style="cursor: pointer;">
                                            <?php
                                            echo $stmt['name'];
                                            ?>
                                        </span>
                                    <?php endforeach;
                                    ?>
                                </p>
                                <?php if ($_SESSION['user_type'] == 'Admin') :  ?>
                                    <a href="/edit?bid=<?php echo $row['id'] ?>" class="card-link" style="color: green;">Edit</a>
                                    <a type="button" data-toggle="modal" data-target="#deleteModal<?= $j ?>" class="card-link" style="color: red;">Delete</a>
                                    <div class="modal fade" id="deleteModal<?= $j ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger">
                                                        <a href="/delete?book_id=<?php echo $row['id'] ?>" style="color: white;">Yes</a>
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <? $j++; ?>
                                <?php endif; ?>
                                <?php if ($_SESSION['user_type'] == 'Reader') :  ?>
                                    <?php $booksRead = App::get('databaseUser')->fetchBooks($uid);
                                    $booksRead->execute();
                                    $ch = $booksRead->fetchAll(PDO::FETCH_ASSOC);
                                    $check = null;
                                    $bid = $row['id'];
                                    foreach ($ch as $key) {
                                        if (in_array($bid, $key)) {
                                            $check = 'checked';
                                        }
                                    }
                                    $link = "/readbook?bid=" . $bid;
                                    $lnk = "/unreadbook?bid=" . $bid;
                                    ?>

                                    <div class="form-check">
                                        <?php if (!$check) : ?>
                                            <input onclick='window.location.href = "<?= $link ?>"' class="form-check-input" <?php echo $check; ?> type="checkbox" id="<?php echo $row['id']; ?>">
                                            <label for="<?php echo $row['id']; ?>" class="white-text form-check-label">Mark As Read</label>
                                        <?php else : ?>
                                            <input onclick='window.location.href = "<?= $lnk ?>"' class="form-check-input" <?php echo $check; ?> type="checkbox" id="<?php echo $row['id']; ?>">
                                            <label for="<?php echo $row['id']; ?>" class="white-text form-check-label">Mark As Read</label>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
                ?>

            </div>
        </div>
    </div>
    <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fa fa-chevron-up"></i></a>
</body>


</html>