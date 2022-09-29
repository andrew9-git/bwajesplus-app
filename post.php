<?php

include('includes/header.php');
bwajes_plus_header('all-posts', 'Post');

$host = url()[0];
?>
<?php 
    $id = $_SESSION['bwajes_plus_user_data']['id'];

    if(isset($_GET['p']))
    {
        $post_id = $_GET['p'];

        $post = fetch_single_row($post_id, 'posts');
    }
    else
    {
      redirect_to('logout');
    }
?>
    <div class="home-content">
      <div class="post-area">
      <?php afiliate_programme_codes_wrapper($id); ?>
      <?php 
        $user = fetch_single_row($id, 'users');
        if($user['suspended'] != 1)
        {
      ?>
        <div class="card">
        <?php 
        $post = fetch_single_row($post_id, 'posts');
        if($post['suspended'] != 1)
        {
        ?>
            <div class="card-header">
                <div class="info-container">
                    <span class="btn btn-success back" id="back">back</span>
                </div>
                <a href="<?php echo $host.'edit-post/'.$post['id']; ?>" class="btn btn-warning">edit</a> | <a href="#" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Do you really want to delete this post?')){delete_post(<?php echo $post_id ?>);}"><i class="bx bx-trash"></i></a>
            </div>
            <div class="card-body">
              <div style="line-height: 1.625rem; margin: 10px;">
                  <h4>Title:</h4>
                  <div>
                    <?php echo $post['title']; ?>
                  </div>
                  <h4>Description:</h4>
                  <div>
                    <?php echo $post['description']; ?>
                  </div>
                  <h4>Post:</h4>
                  <div>
                    <?php echo $post['post']; ?>
                  </div>
                  <h4>Suspended?</h4>
                  <div>
                    <?php 
                    if($post['suspended'] == 0)
                    {
                        echo 'No';
                    }
                    else
                    {
                        echo 'Yes'; 
                    }
                    ?>
                  </div>
                  <h4>Post category:</h4>
                  <div>
                  <?php 
                    $category_id = $post['category_id'];
                    $post_category = fetch_single_row($category_id, 'post_category');

                    if($post_category)
                    {
                        echo $post_category['category'];
                    }
                    ?>
                  </div>
                  <h4>Post type:</h4>
                  <div>
                  <?php 
                    $type_id = $post['type_id'];
                    $post_type = fetch_single_row($type_id, 'post_type');

                    if($post_type)
                    {
                        echo $post_type['type'];
                    }
                    ?> 
                  </div>
                  <h4>Published?:</h4>
                  <div>
                  <?php 
                    if($post['published'] == 0)
                    {
                        echo 'No';
                    }
                    else
                    {
                        echo 'Yes'; 
                    }
                    ?>
                  </div>
                  <h4>Last updated:</h4>
                  <div>
                    <?php echo date("F jS, Y", strtotime($post['updated_at'])); ?> 
                  </div>
                  <h4>Date created:</h4>
                  <div>
                  <?php echo date("F jS, Y", strtotime($post['created_at'])); ?>  
                  </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo url()[1].'post/'.$post['id'] . '/' . urlencode($post['title']) . '/'; ?>" target="_blank">Check post on online <i class="bx bx-link-external"></i></a>
            </div>
            <?php }
        else
        {
        ?>
        <div class="card">
            <div class="card-header">
                <h4 class="message-head">Your post has been suspended</h4>
            </div>
            <div class="card-body" style="display: flex;justify-content:center;align-items:center;">
                <div class="ad-removal">
                    For more information, or if you think your post was suspended by mistake, please message admin
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
        <?php } ?>
        </div>
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
    <script>
      // document.addEventListener('DOMContentLoaded', () => {

        document.getElementById('back').addEventListener('click', (e) => {
            e.preventDefault();
            window.history.back();
        });

        function delete_post(id='')
        {
          let form_data = new FormData();

          form_data.append('delete-post', id);

          let xhr = new XMLHttpRequest();

          let url = '<?php echo $host.'process-ajax' ?>';
            
          xhr.open('POST', url);

          xhr.onload = function()
          {
            if(this.status == 200)
            {
              let response = xhr.responseText;
              const pattern = /Success!/;
              let regex = pattern.test(response);
              if(regex === true)
              {
                window.history.back();
                
              }
            }
          }
            
            xhr.send(form_data);

        }
      // });
    </script>
<?php

    include('includes/footer.php');
    ckeditor();

?>