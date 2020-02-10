<?php
// session_start();
require 'app/public/Resources/partials/dashboardtop.php';

if ($_SESSION['user_type'] != 'Admin') {
  header('location:/');
}
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
  
  <?php $users = App::get('databaseUser')->listUsers();
  $books = App::get('databaseBook')->listBooks();
  ?>
  <link rel="stylesheet" href="app/public/Resources/css/card.css">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card-counter success">
          <i class="fa fa-book"></i>
          <span class="count-numbers"><?php echo count($books); ?></span>
          <span class="count-name">Available Books</span>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card-counter info">
          <i class="fa fa-users"></i>
          <span class="count-numbers"><?php echo count($users); ?></span>
          <span class="count-name">Total Users</span>
        </div>
      </div>
    </div>
  </div>

  <?php
  require 'app/public/Resources/partials/dashboardbottom.php';
  ?>