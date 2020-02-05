<?php
// session_start();
require 'app/public/Resources/partials/dashboardtop.php';

if ($_SESSION['user_type'] != 'Admin') {
    header('location:/');
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
<script src="app/public/Resources/js/jquery.min.js"></script>
<script src="app/public/Resources/js/popper.js"></script>
<script src="app/public/Resources/js/bootstrap.min.js"></script>
<script src="app/public/Resources/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4"><?= 'Reader List '  ?></h2>
    <?php $users = App::get('databaseUser')->listUsers();
    ?>


    <div class="table-responsive">
        <table class="table" id="myTable">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Created On</th>
                    <th scope="col">Action</th>
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
                        <td><?php echo ($row['created_at']); ?></td>
                        <td><a href="/deleteuser?id=<?php echo $row['id']; ?>" class="card-link" style="color: red;">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

</div>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>


</body>


</html>