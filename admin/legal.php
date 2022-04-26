<?php

include('includes/header.php');
bwajes_plus_header('legal', 'Legal');

?>

<div class="home-content">
      <div class="post-area">
            <div class="card">
            <div class="card-header">
                <h4 class="message-head">Legality of app usage by users</h4>
            </div>
            <div class="card-body">
                <div style="margin: 1rem auto;width: 80%;display: flex;align-items: center;justify-content: flex-end;">
                    <a href="all-legals" class="btn btn-success">see legals</a>
                </div>
                <form action="">
                <div class="form-group">
                    <label for="name">Name*</label>
                    <input type="text" class="form-control" placeholder="Enter name" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="content">Content*</label>
                    <textarea class="form-control" rows="5" id="content" name="content"></textarea>
                </div>
                <button type="submit" name="create-legal" class="btn btn-primary">Create</button>
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