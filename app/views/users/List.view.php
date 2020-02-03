<?php
// session_start();
require 'app/public/Resources/partials/dashboardtop.php';

if ($_SESSION['user_type'] != 'Admin') {
    header('location:/login');
}
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4"><?= 'Reader List '  ?></h2>
    <?php $users = App::get('databaseUser')->listUsers(); ?>

    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Type</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach ($users as $row) : ?>
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo ($row['name']); ?></td>
                        <td><?php echo ($row['email']); ?></td>
                        <td><?php echo ($row['user_type']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php
require 'app/public/Resources/partials/dashboardbottom.php';
?>