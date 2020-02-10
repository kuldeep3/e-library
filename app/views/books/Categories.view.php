<?php
// session_start();
require 'app/public/Resources/partials/dashboardtop.php';

if ($_SESSION['user_type'] != 'Admin') {
    header('location:/');
}
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
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
    <form action="" method="post">
        <button type="submit" class="btn btn-outline-primary" name="addbook" style="float: right;">Add Category</button>
    </form>
    <h2 class="mb-4"><?= 'Categories List '  ?></h2>

    <?php $categories = App::get('databaseCat')->listCategories();

    ?>


    <div class="table-responsive">
        <table class="table" id="myTable">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created On</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $j = 0;
                foreach ($categories as $row) : ?>
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo ($row['name']); ?></td>
                        <td><?php echo ($row['modified_at']); ?></td>
                        <td><a type="button" data-toggle="modal" data-target="#deleteModal<?= $j ?>" class="card-link" style="color: red;">Delete</a>
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
                                                <a href="/deletecategories?id=<?php echo $row['id']; ?>" style="color: white;">Yes</a>
                                            </button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><a type="button" data-toggle="modal" data-target="#editModal<?= $j ?>" class="card-link" style="color: red;">Delete</a>
                            <div class="modal fade" id="editModal<?= $j ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

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
                                                <a href="/deleteuser?id=<?php echo $row['id']; ?>" style="color: white;">Yes</a>
                                            </button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php
                    $j++;
                endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

</div>
<script>
    $(document).ready(function() {
        $('#myTable').dataTable();
    });
</script>


</body>


</html>