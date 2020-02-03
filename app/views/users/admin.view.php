<?php
// session_start();
require 'app/public/Resources/partials/dashboardtop.php';

if ($_SESSION['user_type'] != 'Admin') {
    header('location:/login');
}
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4"><?= 'Welcome '  ?></h2>

</div>

<?php
require 'app/public/Resources/partials/dashboardbottom.php';
?>