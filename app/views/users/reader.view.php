<?php
// session_start();


require 'app/public/Resources/partials/dashboardtop.php';
if ($_SESSION['user_type'] != 'Reader') {
    header('location:/');
}
?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"> -->
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
    <h2 class="mb-4"><?= 'List of Books Read ' ?></h2>
    <?php
    $uid = $_SESSION['id'];
    $stmt = App::get('databaseUser')->fetchBooks($uid);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>

    <div class="table-responsive">
        <table class="table" id="myTable">
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
                foreach ($res as $key) :
                    $books = App::get('databaseBook')->selectBook($key['book_id']);
                    $books->execute();
                    $readBook = $books->fetchAll(PDO::FETCH_ASSOC);

                ?>
                    <?php

                    foreach ($readBook as $row) : ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo ($row['name']); ?></td>
                            <td><?php echo ($row['author']); ?></td>
                        </tr>
                <?php endforeach;
                endforeach;
                ?>
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