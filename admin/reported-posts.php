<?php

include('includes/header.php');
bwajes_plus_header('reported-posts', 'Reported posts');

?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header" style="text-align: center;">
            <h4 class="message-head">click on post title to see a post's report(s)</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Post title</th>
                  <th>Number of Reports</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="reports-about-post.php?pid=id" class="title">Science and God</a></td>
                  <td>5</td>
                </tr>
                <tr>
                  <td><a href="reports-about-post.php?pid=id" class="title">How to be a millionaire</a></td>
                  <td>3</td>
                </tr>
                <tr>
                  <td><a href="reports-about-post.php?pid=id" class="title">World economies</a></td>
                  <td>9</td>
                </tr>
              </tbody>
            </table>
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