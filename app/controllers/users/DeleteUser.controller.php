<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['user_type'] != 'Admin') {
    header('location: /');
}
$stmt = App::get('databaseUser')->selectUser($_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$delete = App::get('databaseUser')->deleteUser($_GET['id']);
if ($row['user_type'] == 'Reader') {
    $delete->execute();
    header('location:/listuser');
    exit;
} else {
    echo "Sorry! cannot delete Admin";
    header('location:/listuser');
}
