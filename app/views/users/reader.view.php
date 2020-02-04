<?php
// session_start();


require 'app/public/Resources/partials/dashboardtop.php';
if ($_SESSION['user_type'] != 'Reader') {
    header('location:/login');
}
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4"><?= 'List of Books Read ' ?></h2>
    <?php $books = App::get('databaseBook')->listBooks(); ?>

    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($books as $row) : ?>
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo ($row['name']); ?></td>
                        <td><?php echo ($row['author']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php
require 'app/public/Resources/partials/dashboardbottom.php';
?>
</div>

<?php
require 'app/public/Resources/partials/dashboardbottom.php';
?>