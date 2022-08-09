<?php

include('includes/header.php');
bwajes_plus_header('settings', 'Settings');

?>
<?php
  $id = $_SESSION['user_data']['id'];
  $first_name = $_SESSION['user_data']['first_name'];
  $last_name = $_SESSION['user_data']['last_name'];
  $email = $_SESSION['user_data']['email'];

  $host = url();
  $user = fetch_single_row($id, 'users');
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
          <div class="card-header">
              <h4 class="message-head">My Profile</h4>
          </div>
          <div class="card-body">
              <div id="user-profile-image-for-setting" class="my-profile-image">
                  <div class="my-profile-image-edit-container">
                      <span id="photo" class="my-profile-image-edit"><i class="bx bx-camera profile"></i></span>
                  </div>
              </div>
            <form id="settings_form">
              <div id="settings_messages">
              </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="user-id" value="<?php echo $id; ?>" id="user-id">
                </div>
                <div class="form-group">
                  <label for="first-name">First name*</label>
                  <input type="text" class="form-control form_data" name="first-name" id="first-name" value="<?php echo $first_name; ?>">
                </div>
                <div class="form-group">
                    <label for="last-name">Last name*</label>
                    <input type="text" class="form-control form_data" name="last-name" id="last-name" value="<?php echo $last_name; ?>">
                </div>
                <div class="form-group">
                <label for="brand-name">Business/Brand name*</label>
                <input type="text" class="form-control form_data" name="brand-name" id="brand-name" value="<?php echo $user['business_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="gender">Gender*</label>
                    <select class="form-control form_data" name="gender" id="gender">
                      <option value="S">Select gender</option>
                      <option value="M" <?php if($user['gender'] == 'M'){echo 'selected';} ?>>Male</option>
                      <option value="F" <?php if($user['gender'] == 'F'){echo 'selected';} ?>>Female</option>
                      <option value="N" <?php if($user['gender'] == 'N'){echo 'selected';} ?>>Choose not to say</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control form_data" name="phone" id="phone" value="<?php if($user['phone'] != NULL){ echo $user['phone']; } ?>">
                </div>
                <div class="form-group">
                  <label for="bio">Bio</label>
                  <textarea name="bio" class="form-control form_data" rows="5" id="bio"><?php if($user['bio'] != NULL){ echo $user['bio']; } ?></textarea>
                </div>
                <div class="form-group publish" id="public-bio">
                  <div class="tooltip-container">
                      <div><span>Publish</span> <i class='bx bx-help-circle tooltip'></i></div>
                      <div class="tooltip">Publish to make your bio "public"</div>
                  </div>
                  <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="radio" class="form-check-input form_data" value="1" name="public" checked> Yes
                      </label>
                  </div>
                  <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="radio" class="form-check-input form_data" value="0" name="public"> No
                      </label>
                  </div>
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control form_data" name="website" id="website" value="<?php if($user['website'] != NULL){ echo $user['website']; } ?>">
                </div>
                <div class="form-group">
                    <label for="birth-date">Birth date</label>
                    <input type="date" class="form-control form_data" name="birth-date" id="birth-date" value="<?php if($user['birthdate'] != NULL){ echo $user['birthdate']; } ?>">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control form_data" name="address" id="address" value="<?php if($user['address'] != NULL){ echo $user['address']; } ?>">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control form_data" name="city" id="city" value="<?php if($user['city'] != NULL){ echo $user['city']; } ?>">
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control form_data" name="state" id="state" value="<?php if($user['state'] != NULL){ echo $user['state']; } ?>">
                </div>
                <div class="form-group">
                    <label for="country">country</label>
                    <input type="text" class="form-control form_data" name="country" id="country" value="<?php if($user['country'] != NULL){ echo $user['country']; } ?>">
                </div>
                <button name="update-profile" class="btn btn-primary" id="settings">Save</button>
              </form>
          </div>
          <div class="card-footer">
            <span style="float: right;" id="password" class="btn btn-success update-my-password">Update my password</span>
          </div>
        </div><br>
        <div class="card">
          <div class="card-header">
            <h4 class="message-head">Community Guidelines and Legal Policies</h4>
          </div>
          <div class="card-body">
            <div class="accordion">
              <div class="accordion-item">
                <div class="accordion-item-header">
                  Terms of Service
                </div>
                <div class="accordion-item-body">
                  <div class="accordion-item-body-content">
                    Web Development broadly refers to the tasks associated with developing functional websites and applications for the Internet. The web development process includes web design, web content development, client-side/server-side scripting and network security configuration, among other tasks.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <div class="accordion-item-header">
                  Data Policy
                </div>
                <div class="accordion-item-body">
                  <div class="accordion-item-body-content">
                    HTML, aka HyperText Markup Language, is the dominant markup language for creating websites and anything that can be viewed in a web browser.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <div class="accordion-item-header">
                  Content Policy
                </div>
                <div class="accordion-item-body">
                  <div class="accordion-item-body-content">
                    HTML, aka HyperText Markup Language, is the dominant markup language for creating websites and anything that can be viewed in a web browser.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <div class="accordion-item-header">
                  Cookies Policy
                </div>
                <div class="accordion-item-body">
                  <div class="accordion-item-body-content">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente, dolorum.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <div class="accordion-item-header">
                  Community Guidelines
                </div>
                <div class="accordion-item-body">
                  <div class="accordion-item-body-content">
                    HTTP, aka HyperText Transfer Protocol, is the underlying protocol used by the World Wide Web and this protocol defines how messages are formatted and transmitted, and what actions Web servers and browsers should take in response to various commands.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <span style="float: right;" id="account" class="btn btn-danger delete-my-account">Delete my account</span>
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

    //ajax request for updating user's settings

    let form = document.getElementById('settings_form');
    let settings_button = document.getElementById('settings');
    let settings_messages = document.getElementById('settings_messages');
    form.addEventListener('submit', settings);

    function settings(e)
    {
      e.preventDefault();
      settings_button.disabled = true;

      let settings_btn_bg_col = settings_button.style.backgroundColor;
      let settings_btn_border = settings_button.style.border;
      let settings_btn_cursor = settings_button.style.cursor;

      if(settings_button.disabled == true)
      {
          settings_button.style.backgroundColor = 'grey';
          settings_button.style.border = 'grey';
          settings_button.style.cursor = 'not-allowed';
      }

      let form_element = document.getElementsByClassName('form_data');

      let form_data = new FormData();

      for(let i = 0; i < form_element.length; i++)
      {
        if(form_element[i].type == "radio" && form_element[i].name == 'public')
        {
          form_data.append(form_element[i].name, document.querySelector('.form-check-input:checked').value);
        }
        else{
          form_data.append(form_element[i].name, form_element[i].value);
        }   
      }

      let xhr = new XMLHttpRequest();
      
      xhr.open('POST', 'process-settings-ajax');

      xhr.onload = function()
      {
        if(this.status == 200)
        {
            settings_button.disabled = false;

            if(settings_button.disabled == false)
            {
                settings_button.style.backgroundColor = settings_btn_bg_col;
                settings_button.style.border = settings_btn_border;
                settings_button.style.cursor = settings_btn_cursor;
            }

            let response = xhr.responseText;
            const pattern = /updated/;
            let regex = pattern.test(response);
            if(regex === true)
            {
              form.reset();
            }
            settings_messages.innerHTML = response;
          
        }
      }
      
      xhr.send(form_data);
    }

      CKEDITOR.replace('bio',
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
  <script>
    document.addEventListener('DOMContentLoaded', () => {

      let form = document.getElementById('profile_image_form');
      let profile_image_button = document.getElementById('profile_image');
      let profile_image_messages = document.getElementById('profile_image_messages');
      form.addEventListener('submit', profile_image);

      function profile_image(e)
      {
        e.preventDefault();
        profile_image_button.disabled = true;

        let pro_img_btn_bg_col = profile_image_button.style.backgroundColor;
        let pro_img_btn_border = profile_image_button.style.border;
        let pro_img_btn_cursor = profile_image_button.style.cursor;

        if(profile_image_button.disabled == true)
        {
            profile_image_button.style.backgroundColor = 'grey';
            profile_image_button.style.border = 'grey';
            profile_image_button.style.cursor = 'not-allowed';
        }

        let form_element = document.getElementsByClassName('form_data_profile_image');
        let form_data = new FormData();

        form_data.append(form_element[0].name, form_element[0].value);
        form_data.append('profile-image', document.querySelector('#prof-image').files[0]);

        let xhr = new XMLHttpRequest();
        
        xhr.open('POST', 'process-ajax');
        // const boundary = '---------------------------' + Date.now().toString(16);
        // xhr.setRequestHeader('Content-type', 'multipart/form-data; boundary=' + boundary);

        xhr.onload = function()
        {
            if(this.status == 200)
            {
                profile_image_button.disabled = false;

                if(profile_image_button.disabled == false)
                {
                    profile_image_button.style.backgroundColor = pro_img_btn_bg_col;
                    profile_image_button.style.border = pro_img_btn_border;
                    profile_image_button.style.cursor = pro_img_btn_cursor;
                }

                let response = xhr.responseText;
                const pattern = /Success!/;
                let regex = pattern.test(response);
                if(regex === true)
                {
                  form.reset();
                  const photoModal = document.querySelector("#photo-modal");
                  setTimeout(() => {photoModal.style.display = 'none';}, 2000);
                }
                profile_image_messages.innerHTML = response;
              
            }
        }
        
        xhr.send(form_data);
      }
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {

      let form = document.getElementById('update_password_form');
      let update_password_button = document.getElementById('update_password');
      let update_password_messages = document.getElementById('update_password_messages');
      form.addEventListener('submit', update_password);

      function update_password(e)
      {
        e.preventDefault();
        update_password_button.disabled = true;

        let upt_pass_btn_bg_col = update_password_button.style.backgroundColor;
        let upt_pass_btn_border = update_password_button.style.border;
        let upt_pass_btn_cursor = update_password_button.style.cursor;

        if(update_password_button.disabled == true)
        {
            update_password_button.style.backgroundColor = 'grey';
            update_password_button.style.border = 'grey';
            update_password_button.style.cursor = 'not-allowed';
        }

        let form_element = document.getElementsByClassName('form_data_update_password');

        let form_data = new FormData();

        for(let i = 0; i < form_element.length; i++)
        {
          form_data.append(form_element[i].name, form_element[i].value);          
        }

        let xhr = new XMLHttpRequest();
        
        xhr.open('POST', 'process-ajax');
        // const boundary = '---------------------------' + Date.now().toString(16);
        // xhr.setRequestHeader('Content-type', 'multipart/form-data; boundary=' + boundary);

        xhr.onload = function()
        {
            if(this.status == 200)
            {
                update_password_button.disabled = false;

                if(update_password_button.disabled == false)
                {
                    update_password_button.style.backgroundColor = upt_pass_btn_bg_col;
                    update_password_button.style.border = upt_pass_btn_border;
                    update_password_button.style.cursor = upt_pass_btn_cursor;
                }

                let response = xhr.responseText;
                const pattern = /Success!/;
                let regex = pattern.test(response);
                if(regex === true)
                {
                  form.reset();
                  const passwordModal = document.querySelector("#password-modal");
                  setTimeout(() => {passwordModal.style.display = 'none';}, 2000);
                }
                update_password_messages.innerHTML = response;
              
            }
        }
        
        xhr.send(form_data);
      }
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {

      let form = document.getElementById('delete_user_form');
      let delete_user_button = document.getElementById('delete_user');
      let delete_user_messages = document.getElementById('delete_user_messages');
      form.addEventListener('submit', delete_user);

      function delete_user(e)
      {
        e.preventDefault();
        delete_user_button.disabled = true;

        let del_usr_btn_bg_col = delete_user_button.style.backgroundColor;
        let del_usr_btn_border = delete_user_button.style.border;
        let del_usr_btn_cursor = delete_user_button.style.cursor;

        if(delete_user_button.disabled == true)
        {
            delete_user_button.style.backgroundColor = 'grey';
            delete_user_button.style.border = 'grey';
            delete_user_button.style.cursor = 'not-allowed';
        }

        let form_element = document.getElementsByClassName('form_data_delete');

        let form_data = new FormData();

        for(let i = 0; i < form_element.length; i++)
        {
          form_data.append(form_element[i].name, form_element[i].value);          
        }

        let xhr = new XMLHttpRequest();
        
        xhr.open('POST', 'process-ajax');
        // const boundary = '---------------------------' + Date.now().toString(16);
        // xhr.setRequestHeader('Content-type', 'multipart/form-data; boundary=' + boundary);

        xhr.onload = function()
        {
            if(this.status == 200)
            {
                delete_user_button.disabled = false;

                if(delete_user_button.disabled == false)
                {
                    delete_user_button.style.backgroundColor = del_usr_btn_bg_col;
                    delete_user_button.style.border = del_usr_btn_border;
                    delete_user_button.style.cursor = del_usr_btn_cursor;
                }

                let response = xhr.responseText;
                const pattern = /Success!/;
                let regex = pattern.test(response);
                if(regex === true)
                {
                  form.reset();
                  let url = 'http://localhost:9090/bwajes/register';
                  window.location.href = url;
                }
                delete_user_messages.innerHTML = response;
              
            }
        }
        
        xhr.send(form_data);
      }
    });
  </script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        
      //ajax request for getting user's profile image

      const user_id = <?php echo $id; ?>;

      setInterval(() => 
      {
        get_user_profile_image_for_setting(user_id);
      }, 2000);
      
      get_user_profile_image_for_setting(user_id);
      function get_user_profile_image_for_setting(user_id, user_profile_image_for_setting = '')
      {

        let form_data = new FormData();

        form_data.append('user_id', user_id);
        form_data.append('user_profile_image_for_setting', user_profile_image_for_setting);
        
        let xhr = new XMLHttpRequest();
        
        xhr.open('POST', 'http://localhost:9090/bwajesplus-app/process-ajax');

        xhr.onload = function()
        {
          if(this.status == 200)
          {
            let response = xhr.responseText;

            const user_image_div = document.getElementById('user-profile-image-for-setting');

            user_image_div.style = response;
          }
        }
        
        xhr.send(form_data);
      }

    });
  </script>
<?php

    include('includes/footer.php');
    ckeditor('settings');

?>