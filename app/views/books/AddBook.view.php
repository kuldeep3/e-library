<?php
// Check if image file is a actual image or fake image
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
        App::get('databaseBook')->addBook();
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            header('location:/books');
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<?php $cat = App::get('databaseCat')->listCategories();
?>

<?php require 'app/public/Resources/partials/formheader.view.php'; ?>
<title>Add Book</title>

<body>
    <div class="container">
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Add Book</h4>
                <form action='' method="POST" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="book_name">Book Name:</label>
                                <input type="text" class="form-control" id="book_name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="author_name">Author Name:</label>
                                <input type="text" class="form-control" id="author_name" name="author">
                            </div>
                            <div class="form-group">
                                <label for="book_edition">Edition:</label>
                                <input type="text" class="form-control" id="book_edition" name="edition">
                            </div>
                            <div class="form-group">Book Categories:
                                <div class="input-group">
                                    <?php foreach ($cat as $row) : ?>
                                        <label for="<?php $row['id'] ?>" class="mr-3">
                                            <input type="checkbox" class="mr-1" name="name">
                                            <?php echo ($row['name']); ?>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Add Cover Image</label>
                            </div>

                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit" name="bookAdded" value="submit">Add Book</button>
                        </div>
                    </div>
                </form>
                <!-- <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group input-group">
                        <input type="text" class="form-control" name="name" placeholder="Book Name" required>
                    </div>
                    <div class="form-group input-group">
                        <input type="text" class="form-control" name="author" placeholder="Author" required>
                    </div>
                    <div class="form-group input-group">
                        <input type="text" class="form-control" name="edition" placeholder="Edition" required>
                    </div>
                    Book Categories:
                    <div class="form group input-group">
                        <label for="cid1" class="form-control">Non Fiction
                            <input type="checkbox" name="cid1" id="cid1" value="24">
                        </label>

                        <label for="cid1" class="form-control">Non Fiction
                            <input type="checkbox" name="cid1" id="cid1" value="24">
                        </label>

                        <label for="cid1" class="form-control">Non Fiction
                            <input type="checkbox" name="cid1" id="cid1" value="24">
                        </label>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">Add Cover Image</label>
                    </div>

                    <br> <br>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit" name="bookAdded" value="submit">Add Book</button>
                    </div>
                </form> -->
            </article>
        </div>
    </div>
    <?php require 'app/public/Resources/partials/footer.view.php'; ?>