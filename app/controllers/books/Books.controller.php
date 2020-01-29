<?php

require 'app/views/books/List.view.php';
if (isset($_POST['addbook'])) {
    header('location:/addBook');
}