<?php

include('includes/header.php');
bwajes_plus_header('dashboard', 'Dashboard');

?>
    <?php 
      $id = $_SESSION['user_data']['id'];
      $user_statistics = fetch_single_row($id, 'user_statistics', 'user_id');
    ?>
    <div class="home-content">
      <div class="post-area">
      <?php
            $last_logout = $user_statistics['last_logout'];
            if($last_logout == NULL || $last_logout === "" || empty($last_logout))
            {
              echo '<div class="ShowHide" style="background-color: #ccc;" id="Bar-msg">
              <div id="left" style="color: #111;"><div style="margin-top:4%;"><h4>
              Welcome '.$_SESSION['user_data']['first_name'].'! Thanks for joining the bwajes+ family</h4></div>
              </div>
              <div id="right">
                <a href="#" id="hide-times-msg">X</a>
              </div>
            </div><br>';  
            }

            afiliate_programme_codes_wrapper($id);

          ?>
            <!-- suspended user should not see content on this page
            add a tooltip with a message of why they've been suspended -->
          <?php 
          $user = fetch_single_row($id, 'users');
          if($user['suspended'] != 1)
          {
          ?>
        <?php 
          $posts_count = db_row_count($id, 'user_id', 'posts', 'int');
          if($posts_count > 0)
          {
        ?>  
        <div class="card">
          <div class="card-header flex">
            <a href="all-posts" class="btn btn-success all-post">See all posts</a>
          </div>
          <?php

            $count = profile_progress($id)[0];
            if($count != 100)
            {
              echo profile_progress($id)[1];
            }

          ?>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th width="40%">Title</th>
                  <th width="55%">Description</th>
                  <th width="5%">See post</th>
                </tr>
              </thead>
              <tbody>
                <?php $dashboard_posts = posts_to_show_in_dashboard($id); 
                foreach($dashboard_posts as $dashboard_post)
                { ?>
                <tr>
                  <td><?php echo $dashboard_post['title']; ?></td>
                  <td><?php echo $dashboard_post['description']; ?></td>
                  <td><a href="post/<?php echo $dashboard_post['id']; ?>"><i class="bx bx-link-external"></i></a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <div class="btn btn-secondary last-login">last visited: <?php if(isset($user_statistics)){
              if($last_logout == NULL || $last_logout === "" || empty($last_logout))
              {
                echo date("F jS, Y");
              }
              else
              {
                echo date("F jS, Y", strtotime($user_statistics['last_logout']));
              }
              } ?></div>
          </div>
        </div>
        <?php 
          }
          else
          {
        ?> 
        <div class="card">
          <div class="card-header flex">
            <a href="create-post" class="btn btn-primary create-post">create post</a>
            <span class="btn btn-warning no-post">no posts yet</span>
          </div>
          <?php

            $count = profile_progress($id)[0];
            if($count != 100)
            {
              echo profile_progress($id)[1];
            }

          ?>
          <div class="card-body">
            <img src="images/no-post.gif" class="loading-post-gif" />
          </div>
          <div class="card-footer">
          <div class="btn btn-secondary last-login">last visited: <?php if(isset($user_statistics)){
            if($last_logout == NULL || $last_logout === "" || empty($last_logout))
            {
              echo date("F jS, Y");
            }
            else
            {
              echo date("F jS, Y", strtotime($user_statistics['last_logout']));
            }
            } ?></div>
          </div>
        </div>
        <?php 
          }
        ?>
        <?php }
        else
        {
        ?>
        <div class="card">
            <div class="card-header">
                <h4 class="message-head">Your account has been suspended</h4>
            </div>
            <div class="card-body" style="display: flex;justify-content:center;align-items:center;">
                <div class="ad-removal">
                    For more information, or if you think your account was suspended by mistake, please message admin
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
        <?php } ?>
      </div>
    </div>

<?php

    include('includes/footer.php');
    ckeditor();

?>