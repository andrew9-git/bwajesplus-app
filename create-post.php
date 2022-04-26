<?php

include('includes/header.php');
bwajes_plus_header('create-post', 'Create post');

?>

    <div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header flex">
          </div>
          <div class="card-body">
            <form action="" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="csrf" value="" id="csrf">
                </div>
                <div class="form-group">
                  <label for="title">Title*</label>
                  <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group">
                  <label for="description">Brief description*</label>
                  <input type="text" class="form-control" rows="5" id="description">
                </div>
                <div class="form-group">
                  <label for="category">Category*</label>
                  <select class="form-control" name="category" id="category">
                    <option value="">Health</option>
                    <option value="">Wealth</option>
                    <option value="">Lifestyle</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="type">Type*</label>
                    <select class="form-control" name="type" id="type">
                      <option value="">Blog</option>
                      <option value="">Write up</option>
                      <option value="">Article</option>
                      <option value="">Journal</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="keywords">Keywords*</label>
                  <input type="text" class="form-control" name="keywords" id="keywords" placeholder="e.g health tech science etc">
                </div>
                <div class="form-group">
                    <div class="tooltip-container">
                        <div><span>Cover photo for post*</span> <i class='bx bx-help-circle tooltip'></i></div>
                        <div class="tooltip">This is the photo that would be displayed if this post is shared on social media</div>
                    </div>
                  <input type="file" class="form-control" id="upload-photo">
                </div>
                <div class="form-group">
                    <div class="tooltip-container">
                        <div><span>Publish*</span> <i class='bx bx-help-circle tooltip'></i></div>
                        <div class="tooltip">Click "yes" if you want your post to be on the internet or click "no" to do otherwise</div>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="" name="publish"> Yes
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="" name="publish"> No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="post">Your post*</label>
                    <textarea class="form-control" rows="5" id="post"></textarea>
                </div>
                <button type="submit" name="create-post" class="btn btn-primary">Create post</button>
            </form>
          </div>
          <div class="card-footer">
          </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        CKEDITOR.replace('post',
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