<?php

$data = Users::GoogleAuth();
$glogin = App::get('database')->GLogin($data->name, $data->email);
// session_start();
// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
//     if ($_SESSION['user_type'] === 'reader') {
//         header("location: /user");
//         exit;
//     } elseif ($_SESSION['user_type'] === 'admin') {
//         header("location: /admin");
//     } else {
//         header("location : /");
//     }
// }
// var_dump($glogin);
// die();
//  if ($glogin) {

    // if ($row["user_type"] === 'reader') {
    //       header("location: /user");
    //  } else {
    //      header("location: /admin");
    //  }
 //}

