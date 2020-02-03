<?php

$router->define([
    '' => 'app/controllers/auth/Signup.controller.php',
    'login' => 'app/controllers/auth/Login.controller.php',
    'gmail' => 'app/controllers/auth/GmailAuth.controller.php',
    'activation' => 'app/controllers/auth/Verification.controller.php',
    'admin' => 'app/views/users/admin.view.php',
    'user' => 'app/views/users/reader.view.php',
    'logout' => 'app/controllers/auth/Logout.controller.php',
    'books' => 'app/controllers/books/Books.controller.php',
    'addBook' => 'app/views/books/AddBook.view.php',
    'listuser' => 'app/views/users/List.view.php',
    'edit' => 'app/views/books/EditBook.view.php'
]);
// $router->post('' , 'app/controllers/auth/Signup.controller.php');
// $router->get('login', 'app/controllers/auth/Login.controller.php');
