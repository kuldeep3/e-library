<?php

require 'app/public/Resources/partials/dashboardtop.php';
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
<form action="" method="post">
        <button type="submit" class="btn btn-outline-primary" name="addbook" style="float: right;">Add Book</button>
    </form>
    <h2 class="mb-4">Books List</h2>
    
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                Title
            </h5>
            <p class="card-text">
                text
            </p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                edition
            </li>
        </ul>
    </div>

</div>

<?php
require 'app/public/Resources/partials/dashboardbottom.php';
?>