<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

if ($_SESSION['user_type'] != 'Admin')
    header("location:/");

$book_name = $_POST['name'];
$author_name = $_POST['author'];
$edition = $_POST['edition'];
$bid = $_POST['bid'];
$booknames = ['name', 'author', 'edition'];
$bookvalues = [$book_name, $author_name, $edition];

if (isset($_POST['bookUpdated'])) {
    $stmt = App::get('databaseBook')->selectBook($bid);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $title = $row['image'];
    $file_dir = "app/public/Resources/img/" . $title;
    unlink($file_dir);
    $target_dir = "app/public/Resources/img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        $del = App::get('databaseBook')->deleteAllCategories($bid);
        $del->execute();
        $i = 1;
        $categories = [];
        while ($i++ < 10) {
            if (isset($_POST[$i - 1]))
                array_push($categories, $_POST[$i - 1]);
        }
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = basename($_FILES["image"]["name"]);
            array_push($booknames,'image');
            array_push($bookvalues,$image);
            $book_id = App::get('databaseBook')->updateBook($booknames, $bookvalues, $bid);
            if ($book_id->execute()) {
                $stmt = App::get('databaseBook')->addCategories($bid, $categories);
                header('location:/editbookmsg');
            }

            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
