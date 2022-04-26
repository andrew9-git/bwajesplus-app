<?php

include('includes/header.php');
bwajes_plus_header('dashboard', 'Dashboard');

?>

    <div class="home-content">
      <div class="post-area">
            <!-- suspended user should not see content on this page
            add a tooltip with a message of why they've been suspended -->
        <div class="card">
          <div class="card-header flex">
            <a href="create-post.php" class="btn btn-primary create-post">create post</a>
            <span class="btn btn-warning no-post">no posts yet</span>
          </div>
          <div class="card-body">
            <img src="images/no-post.gif" class="loading-post-gif" />
          </div>
          <div class="card-footer">
          <div class="btn btn-secondary last-login">last visited: 2021</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header flex">
            <a href="create-post.php" class="btn btn-primary create-post">create post</a>
            <a href="all-posts.php" class="btn btn-success all-post">See all posts</a>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>See post</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>John</td>
                  <td>Doe</td>
                  <td><a href="post.php?pid=idWithPhp"><i class="bx bx-link-external"></i></a></td>
                </tr>
                <tr>
                  <td>Mary</td>
                  <td>Moe</td>
                  <td><a href="post.php?pid=idWithPhp"><i class="bx bx-link-external"></i></a></td>
                </tr>
                <tr>
                  <td>July</td>
                  <td>Dooley</td>
                  <td><a href="post.php?pid=idWithPhp"><i class="bx bx-link-external"></i></a></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <div class="btn btn-secondary last-login">last visited: 2021</div>
          </div>
        </div>
      </div>
    </div>

<?php

    include('includes/footer.php');
    ckeditor();

?>