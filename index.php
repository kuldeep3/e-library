<?php

require 'app/database/bootstrap.php';



require Router::load('app/routes/Routes.php')
    ->direct(Request::uri());
