<?php
session_start();
if ($_SESSION['user_type'] != 'reader') {
    header('location:/login');
}

require 'app/public/Resources/partials/dashboardtop.php';
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4"><?= 'Welcome ' ?></h2>

</div>

<?php
require 'app/public/Resources/partials/dashboardbottom.php';
?>