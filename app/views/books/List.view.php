<?php
// var_dump(App::get('databaseUser')->fetchBooks('56'));
// die();
require 'app/public/Resources/partials/dashboardtop.php';
?>

<link rel="stylesheet" href="app/public/Resources/css/search.css">
<script>
    function myFunction() {
        var input, filter, cards, cardContainer, h5, title, i;
        input = document.getElementById("myFilter");
        filter = input.value.toUpperCase();
        cardContainer = document.getElementById("mybooks");
        cards = cardContainer.getElementsByClassName("card");
        for (i = 0; i < cards.length; i++) {
            title = cards[i].querySelector(".card-body h5.card-title");
            if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    }
</script>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <?php if ($_SESSION['user_type'] == 'Admin') : ?>
        <form action="" method="post">
            <button type="submit" class="btn btn-outline-primary" name="addbook" style="float: right;">Add Book</button>
        </form>
    <?php endif; ?>
    <?php if ($_SESSION['user_type'] == 'Reader') : ?>
        <div class="searchbar" style="float: right;">
            <input class="search_input" type="text" onkeyup="myFunction()" placeholder="Search by Book name..." id="myFilter">
            <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
        </div>
    <?php endif; ?>
    <h2 class="mb-4">Available Books</h2>

    <div class="card-deck" id="mybooks">
        <?php $books = App::get('databaseBook')->listBooks();
        $bookss = App::get('databaseBook')->listBookss();
        $uid = $_SESSION['id'];
        $i = -1;
        foreach ($books as $row) :
            $i++;
        ?>
            <div class="card-column">
                <br>
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
                            <a href="/delete?book_id=<?php echo $row['id'] ?>" class="card-link" style="color: red;">Delete</a>
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
        die(); ?>
    </div>
</div>

<?php
require 'app/public/Resources/partials/dashboardbottom.php';
?>