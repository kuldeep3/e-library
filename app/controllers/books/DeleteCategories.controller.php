<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['user_type'] != 'Admin') {
    header('location: /');
}

$delete = App::get('databaseCat')->deleteCat($_GET['id']);
$delete->execute();
header('location:/categories');