<?php
if (isset($_POST['addbook'])) {
    header('location:/addBook');
}
require 'app/views/books/List.view.php';
