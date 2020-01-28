<?php

$data = Users::GoogleAuth();

$glogin = App::get('database')->GLogin($data->name,$data->email);

 if (isset($glogin)) {
     if ($_SESSION["user_type"] === 'reader') {
         header("location:/user");
     } else {
         header("location:/admin");
     }
 }
