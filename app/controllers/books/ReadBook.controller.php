<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

if ($_SESSION['user_type'] != 'Reader')
    header("location:/");
if (isset($_SESSION['id'])) {
    $uid = $_SESSION['id'];
    if (isset($_GET['bid'])) {
        $bid = $_GET['bid'];
        var_dump(App::get('databaseUser')->readBook($uid,$bid));
        header('location:/books');
    }
}

