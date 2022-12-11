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

      if($post == false)
      {
        redirect_to($host.'logout');
      }
    }
    else
    {
      redirect_to($host.'logout');
    }

    if($id != $post['user_id'])
    {
      redirect_to($host.'logout');
    }

    $end_date = paypal($id)['end_date'];
?>
    <div class="home-content">
      <div class="post-area">
      <?php afiliate_programme_codes_wrapper($id, $end_date); ?>
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
              <div id="toggle-comments" style="cursor: pointer;color:crimson"><i><b>Toggle comments</b></i></div><br>
              <div class="post-form" id="post-form">
                <h4>Leave a comment</h4>
                <form id="comment_form" style="margin: 0; width: 100%;">
                    <div id="comment_messages">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form_data_cmt" name="comment-id" id="comment-id" value="0">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form_data_cmt" name="post-id" id="post-id" value="<?php echo $post_id; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form_data_cmt" name="user-id" id="user-id" value="<?php echo $user['id']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="comment-email" class="form-control form_data_cmt" id="email" value="<?php echo $user['email']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="website" class="form-control form_data_cmt" value="<?php echo url()[1].'post/'.$post_id; ?>" id="website">
                    </div>
                    <div class="form-group">
                        <label for="comments">Comments*</label>
                        <textarea class="form-control form_data_cmt" name="comments" rows="5" id="comments"></textarea>
                    </div>
                    <button id="comment-button" style="color: #fff;background-color: #28a745;border-color: #28a745;" class="form-control btn">Comment</button>
                </form><br>
                <div id="display_comment"></div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo url()[1].'post/'.$post['id'] . '/' . urlencode($post['title']); ?>" target="_blank">Check post on online <i class="bx bx-link-external"></i></a>
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

        let form_1 = document.getElementById('comment_form');
        let comment_button = document.getElementById('comment-button');
        let comment_messages = document.getElementById('comment_messages');
        form_1.addEventListener('submit', comment);

        function comment(e)
        {
            e.preventDefault();
            comment_button.disabled = true;

            let cmt_btn_bg_col = comment_button.style.backgroundColor;
            let cmt_btn_border = comment_button.style.border;
            let cmt_btn_cursor = comment_button.style.cursor;

            if(comment_button.disabled == true)
            {
                comment_button.style.backgroundColor = 'grey';
                comment_button.style.border = 'grey';
                comment_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_cmt');
            let form_data = new FormData();

            for(let i = 0; i < form_element.length; i++)
            {
              form_data.append(form_element[i].name, form_element[i].value);                
            }
            
            let xhr = new XMLHttpRequest();

            let url = '<?php echo $host.'process-ajax' ?>';
            
            xhr.open('POST', url);

            xhr.onload = function()
            {
                if(this.status == 200)
                {
                    comment_button.disabled = false;

                    if(comment_button.disabled == false)
                    {
                        comment_button.style.backgroundColor = cmt_btn_bg_col;
                        comment_button.style.border = cmt_btn_border;
                        comment_button.style.cursor = cmt_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /comment/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                        form_1.reset();
                        load_comment();
                    }
                    comment_messages.innerHTML = response;
                
                }
            }
            
            xhr.send(form_data);
        }

        load_comment();

        function load_comment()
        {
          let form_data = new FormData();
          let post_id = <?php echo $post_id ?>;

          form_data.append('load-comments', '');
          form_data.append('post-id', post_id);
          
          let xhr = new XMLHttpRequest();

          let url = '<?php echo $host.'process-ajax' ?>';
          
          xhr.open('POST', url);

          xhr.onload = function()
          {
              if(this.status == 200)
              {
                  let response = xhr.responseText;
                  document.getElementById('display_comment').innerHTML = response;
              }
          }
          
          xhr.send(form_data);
        }

        document.addEventListener('click', (e) => {
            const pattern = /reply/;
            let regex = pattern.test(e.target.getAttribute('class'));
            if(regex === true)
            {
                let comment_id = e.target.getAttribute("id");
                document.getElementById('comment-id').value = comment_id;
                document.getElementById('comments').focus();
            }
        });

        let toggle_comments = document.getElementById('toggle-comments');
        let post_form = document.getElementById('post-form');

        toggle_comments.addEventListener('click', () => {
          post_form.classList.toggle('toggle-comments');

        });

      // });
    </script>
<?php

    include('includes/footer.php');
    ckeditor();

?>