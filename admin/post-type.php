<?php

include('includes/header.php');
bwajes_plus_header('post-type', 'Post type');

?>

<div class="home-content">
      <div class="post-area">
            <div class="card">
            <div class="card-header">
                <h4 class="message-head">Create post types</h4>
            </div>
            <div class="card-body">
                <div style="margin: 1rem auto;width: 80%;display: flex;align-items: center;justify-content: flex-end;">
                    <a href="all-types" class="btn btn-success">see types</a>
                </div>
                <form action="">
                <div class="form-group">
                    <label for="type">Type*</label>
                    <input type="text" class="form-control" placeholder="Enter type" id="type">
                </div>
                <button type="submit" name="create-type" class="btn btn-primary">Create</button>
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