<?php

include('includes/header.php');
bwajes_plus_header('create-post', 'Edit post');

$host = url()[0];
?>
    <?php 
      if(isset($_GET['p']))
      {
        $post_id = $_GET['p'];

        $post = fetch_single_row($post_id, 'posts');
      }
      else
      {
        redirect_to('logout');
      }

      $user_id = $_SESSION['bwajes_plus_user_data']['id'];

      $post_categories = post_category();
      $post_types = post_type();
    ?>
<div class="home-content">
      <div class="post-area">
      <?php afiliate_programme_codes_wrapper($user_id); ?>
      <?php 
        $user = fetch_single_row($user_id, 'users');
        if($user['suspended'] != 1)
        {
      ?>
        <div class="card">
          <div class="card-header flex">
            <div class="info-container">
                <span class="btn btn-success back" id="back">back</span>
              </div>
          </div>
          <div class="card-body">
            <form id="edit_post_form" enctype="multipart/form-data">
              <div id="edit_post_messages">
              </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_edit" name="user-id" value="<?php echo $user_id; ?>" id="user-id">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_edit" name="post-id" value="<?php echo $post['id']; ?>" id="post-id">
                </div>
                <div class="form-group">
                  <label for="title">Title*</label>
                  <input type="text" name="post-title" value="<?php echo $post['title']; ?>" class="form-control form_data_edit" id="title">
                </div>
                <div class="form-group">
                  <label for="description">Description*</label>
                  <input type="text" name="description" value="<?php echo $post['description']; ?>" class="form-control form_data_edit" id="description">
                </div>
                <div class="form-group">
                  <label for="category">Category*</label>
                  <select class="form-control form_data_edit" name="category" id="category">
                  <option value="S">Select post category</option>
                    <?php 
                     foreach($post_categories as $post_category)
                     {
                    ?>
                    <option value="<?php echo $post_category['id']; ?>" <?php if($post_category['id'] == $post['category_id']){echo 'selected';} ?>><?php echo $post_category['category']; ?></option>
                    <?php 
                     }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="type">Type*</label>
                    <select class="form-control form_data_edit" name="type" id="type">
                    <option value="S">Select post type</option>
                    <?php 
                     foreach($post_types as $post_type)
                     {
                    ?>
                    <option value="<?php echo $post_type['id']; ?>" <?php if($post_type['id'] == $post['type_id']){echo 'selected';} ?>><?php echo $post_type['type']; ?></option>
                    <?php 
                     }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="tooltip-container">
                        <div><span>Cover photo for post*</span> <i class='bx bx-help-circle tooltip'></i></div>
                        <div class="tooltip">This is the photo that would be displayed if this post is shared on social media</div>
                    </div>
                    <span>Current cover photo: <?php echo $post['cover_photo'] ?></span>
                  <input type="file" name="cover-photo" class="form-control" id="upload-photo" accept="image/*">
                </div>
                <div class="form-group">
                    <div class="tooltip-container">
                        <div><span>Publish*</span> <i class='bx bx-help-circle tooltip'></i></div>
                        <div class="tooltip">Click "yes" if you want your post to be on the internet or click "no" to do otherwise</div>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input form_data_edit" value="1" name="publish" checked> Yes
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input form_data_edit" value="0" name="publish"> No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="post">Your post*</label>
                    <textarea class="form-control" name="post" rows="5" id="post"><?php echo $post['post']; ?></textarea>
                </div>
                <button type="submit" id="edit_post" name="edit-post" class="btn btn-primary">Edit post</button>
            </form>
          </div>
          <div class="card-footer">
          </div>
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
      document.addEventListener('DOMContentLoaded', () => {

        document.getElementById('back').addEventListener('click', (e) => {
            e.preventDefault();
            window.history.back();
        });

        let form = document.getElementById('edit_post_form');
        let edit_post_button = document.getElementById('edit_post');
        let edit_post_messages = document.getElementById('edit_post_messages');
        form.addEventListener('submit', edit_post);

        function edit_post(e)
        {
            e.preventDefault();
            edit_post_button.disabled = true;

            let edit_post_btn_bg_col = edit_post_button.style.backgroundColor;
            let edit_post_btn_border = edit_post_button.style.border;
            let edit_post_btn_cursor = edit_post_button.style.cursor;

            if(edit_post_button.disabled == true)
            {
                edit_post_button.style.backgroundColor = 'grey';
                edit_post_button.style.border = 'grey';
                edit_post_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_edit');
            let form_data = new FormData();

            for(let i = 0; i < form_element.length; i++)
            {
              if(form_element[i].type == "radio" && form_element[i].name == 'publish')
                {
                  form_data.append(form_element[i].name, document.querySelector('.form-check-input:checked').value);
                }
                else{
                  form_data.append(form_element[i].name, form_element[i].value);
                }
            }
            let post = CKEDITOR.instances['post'].getData();
            
            form_data.append('post', post);
            if(document.querySelector('#upload-photo').files[0])
            {
              form_data.append('cover-photo', document.querySelector('#upload-photo').files[0]);
            }
            // console.log(document.querySelector('.form-check-input:checked').value);
            let xhr = new XMLHttpRequest();

            let url = '<?php echo $host.'process-edit-ajax' ?>';
            
            xhr.open('POST', url);
            // const boundary = '---------------------------' + Date.now().toString(16);
            // xhr.setRequestHeader('Content-type', 'multipart/form-data; boundary=' + boundary);

            xhr.onload = function()
            {
                if(this.status == 200)
                {
                    edit_post_button.disabled = false;

                    if(edit_post_button.disabled == false)
                    {
                        edit_post_button.style.backgroundColor = edit_post_btn_bg_col;
                        edit_post_button.style.border = edit_post_btn_border;
                        edit_post_button.style.cursor = edit_post_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                      form.reset();
                      setInterval(() => {window.history.back();}, 3000);
                      
                    }
                    edit_post_messages.innerHTML = response;
                  
                }
            }
            
            xhr.send(form_data);
        }

        let upload_url = '<?php echo $host.'upload' ?>';

        CKEDITOR.replace('post',
        {
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'About,Source,Anchor',
            extraPlugins: 'justify',
            height: 300,
            filebrowserUploadUrl: upload_url,
            filebrowserUploadMethod: 'form'
        });
      });
    </script>
<?php

    include('includes/footer.php');
    ckeditor();

?>