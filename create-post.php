<?php

include('includes/header.php');
bwajes_plus_header('create-post', 'Create post');

?>
    <?php 
      $id = $_SESSION['bwajes_plus_user_data']['id'];
      $post_categories = post_category();
      $post_types = post_type();
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
          <div class="card-header flex">
          </div>
          <div class="card-body">
            <form id="create_post_form" enctype="multipart/form-data">
              <div id="create_post_messages">
              </div>
                <!-- <div class="form-group">
                    <input type="hidden" class="form-control form_data_post" name="csrf" value="" id="csrf">
                </div> -->
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_post" name="id" value="<?php echo $id; ?>" id="id">
                </div>
                <div class="form-group">
                  <label for="title">Title*</label>
                  <input type="text" class="form-control form_data_post" name="title" id="title">
                </div>
                <div class="form-group">
                  <label for="description">Description*</label>
                  <input type="text" name="description" class="form-control form_data_post" id="description">
                </div>
                <div class="form-group">
                  <label for="category">Category*</label>
                  <select class="form-control form_data_post" name="category" id="category">
                  <option value="S">Select post category</option>
                    <?php 
                     foreach($post_categories as $post_category)
                     {
                    ?>
                    <option value="<?php echo $post_category['id']; ?>"><?php echo $post_category['category']; ?></option>
                    <?php 
                     }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="type">Type*</label>
                    <select class="form-control form_data_post" name="type" id="type">
                    <option value="S">Select post type</option>
                    <?php 
                     foreach($post_types as $post_type)
                     {
                    ?>
                    <option value="<?php echo $post_type['id']; ?>"><?php echo $post_type['type']; ?></option>
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
                  <input type="file" name="cover-photo" class="form-control" id="upload-photo" accept="image/*">
                </div>
                <div class="form-group">
                    <div class="tooltip-container">
                        <div><span>Publish*</span> <i class='bx bx-help-circle tooltip'></i></div>
                        <div class="tooltip">Click "yes" if you want your post to be on the internet or click "no" to do otherwise</div>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input form_data_post" value="1" name="publish" checked> Yes
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input form_data_post" value="0" name="publish"> No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="post">Your post*</label>
                    <textarea class="form-control" name="post" rows="5" id="post"></textarea>
                </div>
                <button type="submit" id="create_post" name="create-post" class="btn btn-primary">Create post</button>
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

        let form = document.getElementById('create_post_form');
        let create_post_button = document.getElementById('create_post');
        let create_post_messages = document.getElementById('create_post_messages');
        form.addEventListener('submit', create_post);

        function create_post(e)
        {
            e.preventDefault();
            create_post_button.disabled = true;

            let crt_post_btn_bg_col = create_post_button.style.backgroundColor;
            let crt_post_btn_border = create_post_button.style.border;
            let crt_post_btn_cursor = create_post_button.style.cursor;

            if(create_post_button.disabled == true)
            {
                create_post_button.style.backgroundColor = 'grey';
                create_post_button.style.border = 'grey';
                create_post_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_post');
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
            form_data.append('cover-photo', document.querySelector('#upload-photo').files[0]);
            let xhr = new XMLHttpRequest();
            
            xhr.open('POST', 'process-create-ajax');
            // const boundary = '---------------------------' + Date.now().toString(16);
            // xhr.setRequestHeader('Content-type', 'multipart/form-data; boundary=' + boundary);

            xhr.onload = function()
            {
                if(this.status == 200)
                {
                    create_post_button.disabled = false;

                    if(create_post_button.disabled == false)
                    {
                        create_post_button.style.backgroundColor = crt_post_btn_bg_col;
                        create_post_button.style.border = crt_post_btn_border;
                        create_post_button.style.cursor = crt_post_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                      form.reset();
                    }
                    create_post_messages.innerHTML = response;
                  
                }
            }
            
            xhr.send(form_data);
        }

        CKEDITOR.replace('post',
        {
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'About,Source,Anchor',
            extraPlugins: 'justify',
            height: 300,
            filebrowserUploadUrl: 'http://localhost:9090/bwajesplus-app/upload',
            filebrowserUploadMethod: 'form'
        });
      });
    </script>
<?php

  include('includes/footer.php');
  ckeditor();

?>