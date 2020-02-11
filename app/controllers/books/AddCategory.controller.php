<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

if ($_SESSION['user_type'] != 'Admin')
    header("location:/");

if (isset($_POST['categoryAdded'])) {
    App::get('databaseCat')->addCategory();
    header('location:/categories');
}