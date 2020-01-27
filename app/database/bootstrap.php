<?php

$app =[];

$app['config'] = require 'config.php';
require 'app/database/QueryBuilder.php';
require 'app/core/models/Users.php';
require 'app/database/Connection.php';
require 'app/routes/Router.php';
require 'app/routes/Request.php';

// return new QueryBuilder(Connection::make());
$app['database']= new Users(Connection::make($app['config']['database']));
