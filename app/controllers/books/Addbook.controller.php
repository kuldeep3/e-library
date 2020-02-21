    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if ($_SESSION['user_type'] != 'Admin') {
        header("location:/");
    }

    if (isset($_POST['bookAdded'])) {
        $target_dir = "app/public/Resources/img/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            $err = "File is not an image";
            $_SESSION["err"] = $err;
            header('location:/addBook');
        }
        if (file_exists($target_file)) {
            $uploadOk = 0;
            $err = "Sorry, file already exists";
            $_SESSION["err"] = $err;
            header('location:/addBook');
        }
        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            $uploadOk = 0;
            $err = "File must be less than 500KB";
            $_SESSION["err"] = $err;
            header('location:/addBook');
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $uploadOk = 0;
            $err = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
            $_SESSION["err"] = $err;
            header('location:/addBook');
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $err = "Sorry, your file was not uploaded";
            $_SESSION["err"] = $err;
            header('location:/addBook');
        } else {
            $i = 1;
            $categories = [];
            while ($i++ < 10) {
                if (isset($_POST[$i - 1]))
                    array_push($categories, $_POST[$i - 1]);
            }

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

                if ($book_id = App::get('databaseBook')->addBook()) {
                    $stmt = App::get('databaseBook')->addCategories($book_id, $categories);
                    header('location:/bookaddedmsg');
                }
            } else {
                $err = "Sorry, there was an error uploading your file";
                $_SESSION["err"] = $err;
                header('location:/addBook');
            }
        }
    }
    ?>