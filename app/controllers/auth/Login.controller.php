<?php

if (isset($_POST['login'])) {
    App::get('databaseUser')->verifyUser($_POST['email']);
} else {
    return 'please try again later';
}
