<?php

include('includes/header.php');
bwajes_plus_header('post-category', 'Update post category');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>

<div class="home-content">
      <div class="post-area">
            <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div style="margin: 1rem auto;width: 80%;display: flex;align-items: center;justify-content: flex-end;">
                    <a href="<?php echo $host .'all-categories'; ?>" class="btn btn-success">back</a>
                </div>
                <form action="">
                    <div class="form-group">
                        <label for="category">Category*</label>
                        <input type="text" class="form-control" value="Echo category here" id="category">
                    </div>
                    <button type="submit" name="update-category" class="btn btn-primary">Update</button>
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