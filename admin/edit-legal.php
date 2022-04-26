<?php

include('includes/header.php');
bwajes_plus_header('legal', 'Update legal');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div style="margin: 1rem auto;width: 80%;display: flex;align-items: center;justify-content: flex-end;">
                    <a href="<?php echo $host .'all-legals'; ?>" class="btn btn-success">back</a>
                </div>
                <form action="">
                <div class="form-group">
                    <label for="name">Name*</label>
                    <input type="text" class="form-control" value="Echo name here" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="content">Content*</label>
                    <textarea class="form-control" rows="5" id="content" name="content">Echo content here</textarea>
                </div>
                <button type="submit" name="update-legal" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="card-footer">
            </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        CKEDITOR.replace('content',
        {
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'About,Source,Anchor'
        });
      });
    </script>
<?php

    include('includes/footer.php');
    ckeditor();

?>