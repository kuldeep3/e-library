<?php

$router->define([
    '' => 'app/views/auth/Login.view.php',
    'signup' => 'app/views/auth/Signup.view.php',
    'gmail' => 'app/controllers/auth/GmailAuth.controller.php',
    'activation' => 'app/controllers/auth/Verification.controller.php',
    'admin' => 'app/views/users/admin.view.php',
    'user' => 'app/views/users/reader.view.php',
    'logout' => 'app/controllers/auth/Logout.controller.php',
    'books' => 'app/controllers/books/Books.controller.php',
    'addBook' => 'app/views/books/AddBook.view.php',
    'listuser' => 'app/views/users/List.view.php',
    'edit' => 'app/views/books/EditBook.view.php',
    'delete' => 'app/controllers/books/DeleteBook.controller.php',
    'deleteuser' => 'app/controllers/users/DeleteUser.controller.php',
    'login' => 'app/controllers/auth/Login.controller.php',
    'signed' => 'app/controllers/auth/Signup.controller.php',
    'AddBook' => 'app/controllers/books/Addbook.controller.php',
    'editbook' => 'app/controllers/books/EditBook.controller.php'
]);
// $router->post('' , 'app/controllers/auth/Signup.controller.php');
// $router->get('login', 'app/controllers/auth/Login.controller.php');
