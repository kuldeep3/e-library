<?php

$hash = $_GET['hash'];
$id = $_GET['id'];

$results = App::get('databaseUser')->activate($id, $hash);
if (isset($results)) {
   header('location:/activated');
} else {
    header('location:404');
}
