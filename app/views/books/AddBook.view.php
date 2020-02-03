<?php
$cat = App::get('databaseCat')->listCategories();
require 'app/public/Resources/partials/formheader.view.php'; ?>
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
                                    <?php $i = 1;
                                    foreach ($cat as $row) : ?>
                                        <label for="<?php $row['id'] ?>" class="mr-3">
                                            <input type="checkbox" class="mr-1" value="<?php echo ($row['id']); ?>" name="<?php echo $i ?>">
                                            <?php echo ($row['name']);
                                            $i++;
                                            ?>
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