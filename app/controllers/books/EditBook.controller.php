<?php
if (session_status() == PHP_SESSION_NONE) 
	session_start();

if($_SESSION['user_type']!='Admin')
    header("location:/login");
    
// $res = App::get('databaseBook')->fetchCategories($_GET['bid']);
// $res->execute();
// $row = $res->fetch(PDO::FETCH_ASSOC);
// var_dump($row);



require 'app/views/books/EditBook.view.php';