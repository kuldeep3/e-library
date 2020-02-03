<?php

require 'app/public/Resources/partials/dashboardtop.php';
?>

<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <?php if ($_SESSION['user_type'] == 'Admin') : ?>
        <form action="" method="post">
            <button type="submit" class="btn btn-outline-primary" name="addbook" style="float: right;">Add Book</button>
        </form>
    <?php endif; ?>
    <h2 class="mb-4">Books List</h2>
    <div class="card-deck">
        <?php $books = App::get('databaseBook')->listBooks();
        foreach ($books as $row) :
        ?>

            <div class="card-column">
                <br>
                <div class="card" style="width: 12rem;">
                    <img class="card-img-top" src="app/public/Resources/img/<?= $row['image'] ?>" alt="" style="max-height: 20em;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo ($row['name']);
                            ?>
                        </h5>
                        <p class="card-text">
                            <?php echo ($row['author']); ?>
                        </p>
                        <?php if ($_SESSION['user_type'] == 'Admin') :  ?>
                            <a href="/edit" class="card-link" style="color: green;">Edit</a>
                            <a href="/delete" class="card-link" style="color: red;">Delete</a>
                        <?php endif; ?>
                        <?php if ($_SESSION['user_type'] == 'Reader') :  ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkbox624">
                                <label for="checkbox624" class="white-text form-check-label">Mark As Read</label>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
require 'app/public/Resources/partials/dashboardbottom.php';
?>