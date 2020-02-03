<?php require 'app/public/Resources/partials/formheader.view.php'; ?>
<title>Edit Book</title>

<body>
    <div class="container">
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Edit Book</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group input-group">
                        <input type="text" class="form-control" name="name" value="" required>
                    </div>
                    <div class="form-group input-group">
                        <input type="text" class="form-control" name="author" placeholder="Author" required>
                    </div>
                    <div class="form-group input-group">
                        <input type="text" class="form-control" name="edition" placeholder="Edition" required>
                    </div>
                    <!-- <div class="form-group input-group">
                        <select class="form-control" name="category" required>
                            <option selected>Choose a category</option>
                            <option>Action</option>
                            <option>Romance</option>
                            <option>Modern</option>
                            <option>Myth</option>
                            <option>Comedy</option>
                        </select>
                    </div> -->
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">Add Cover Image</label>
                    </div>

                    <br> <br>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit" name="bookUpdated" value="submit">Update Book</button>
                    </div>
                </form>
            </article>
        </div>
    </div>
    <?php require 'app/public/Resources/partials/footer.view.php'; ?>