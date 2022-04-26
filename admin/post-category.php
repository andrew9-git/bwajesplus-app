<?php

include('includes/header.php');
bwajes_plus_header('post-category', 'Post category');

?>

<div class="home-content">
      <div class="post-area">
            <div class="card">
            <div class="card-header">
                <h4 class="message-head">Create post categories</h4>
            </div>
            <div class="card-body">
                <div style="margin: 1rem auto;width: 80%;display: flex;align-items: center;justify-content: flex-end;">
                    <a href="all-categories" class="btn btn-success">see categories</a>
                </div>
                <form action="">
                <div class="form-group">
                    <label for="category">Category*</label>
                    <input type="text" class="form-control" placeholder="Enter category" id="category">
                </div>
                <button type="submit" name="create-category" class="btn btn-primary">Create</button>
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
      </div>
    </div>

<?php

    include('includes/footer.php');
    ckeditor();

?>