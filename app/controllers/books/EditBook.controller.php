<?php
if (session_status() == PHP_SESSION_NONE) 
	session_start();

if($_SESSION['user_type']!='Admin')
    header("location:/login");
    
$res = App::get('databaseBook')->fetchCategories($_GET['bid']);
$res->execute();
// foreach ($res as $row) :
// print_r($row);
// endforeach;
$row = $res->fetch(PDO::FETCH_ASSOC);
print_r($row);



require 'app/views/books/EditBook.view.php';