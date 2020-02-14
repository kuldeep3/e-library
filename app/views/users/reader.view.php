<?php
// session_start();


require 'app/public/Resources/partials/dashboardtop.php';
if ($_SESSION['user_type'] != 'Reader') {
    header('location:/');
}
?>

<div id="content" class="p-4 p-md-5 pt-5">

    <?php
    $books = App::get('databaseBook')->listBooks();
    $uid = $_SESSION['id'];
    $stmt = App::get('databaseUser')->fetchBooks($uid);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>
    <link rel="stylesheet" href="app/public/Resources/css/card.css">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="/books">
                    <div class="card-counter success">
                        <i class="fa fa-book"></i>
                        <span class="count-numbers"><?php echo count($books); ?></span>
                        <span class="count-name">Available Books</span>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="/read">
                    <div class="card-counter info">
                        <i class="fa fa-book"></i>
                        <span class="count-numbers"><?php echo count($res); ?></span>
                        <span class="count-name">Books Read</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <?php
    require 'app/public/Resources/partials/dashboardbottom.php';
    ?>