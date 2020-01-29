<?php

$hash = $_GET['hash'];
$id = $_GET['id'];

$results = App::get('databaseUser')->activate($id, $hash);
if (isset($results)) {
    echo "<script>window.setTimeout(function() {
        alert('Account have been verified');
    window.location='/login';},0);</script>";
} else {
    echo "Please verify your account";
}
