<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['user_type'] != 'Admin') {
    header('location: /');
}

$stmt = App::get('databaseBook')->selectBook($_GET['book_id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$delete = App::get('databaseBook')->deleteBook($_GET['book_id']);
if ($delete->execute()) {
    $title = $row['image'];
    $file_dir = "app/public/Resources/img/" . $title;
    unlink($file_dir);
    header('location:/books');
    exit;
}
