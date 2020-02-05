<?php
// session_start();
require 'app/public/Resources/partials/dashboardtop.php';

if ($_SESSION['user_type'] != 'Admin') {
  header('location:/');
}
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
  <h2 class="mb-4"><?= 'Welcome '  ?></h2>
  <?php $users = App::get('databaseUser')->listUsers();
  $books = App::get('databaseBook')->listBooks();
  ?>
 <div class="card-group">
  <div class="card">
    <img class="card-img-top" src="https://networknuts.net/wp-content/uploads/2019/11/zahir-accounting-software-have-more-than-60.000-users.png" alt="Card image cap" style="width: 200px;">
    <div class="card-body">
      <h1 class="card-title"><?php echo count($users); ?></h1>
      <p class="card-text">Available Users</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="https://pngimg.com/uploads/book/book_PNG2105.png" alt="Card image cap" style="width: 200px;">
    <div class="card-body">
      <h1 class="card-title"><?php echo count($books); ?></h1>
      <p class="card-text">Available Books.</p>
    </div>
  </div>
</div>

<?php
require 'app/public/Resources/partials/dashboardbottom.php';
?>