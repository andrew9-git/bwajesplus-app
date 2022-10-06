<?php

include('includes/header.php');
bwajes_plus_header('settings', 'Settings');

$host = url()[0];

?>
<?php

    $id = $_SESSION['bwajes_plus_admin_data']['id'];
    $admin = fetch_single_row($id, 'admin');

    $admin_types = admin_type();
    $country = fetch_countries();
?>
    <div class="home-content">
      <div class="post-area">
      <?php 
        if($admin['suspended'] != 1)
        {
      ?>
        <div class="card">
            <div class="card-header">
                <h4 class="message-head">My Profile</h4>
            </div>
            <div class="card-body">
                <div id="admin-profile-image-for-setting" class="my-profile-image">
                    <?php if($admin['admin_type'] == 1){ ?>
                    <div class="my-profile-image-edit-container">
                      <span id="photo" class="my-profile-image-edit"><i class="bx bx-camera profile"></i></span>
                    </div>
                    <?php } ?>
                </div>
                <form id="update_settings_form" enctype="multipart/form-data">
                <div id="update_settings_messages">
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control form_data_usett" name="admin-id" value="<?php echo $id; ?>">
                </div>
                <div class="form-group">
                  <label for="first-name">First name*</label>
                  <input type="text" class="form-control form_data_usett" name="first-name" value="<?php echo $admin['first_name']; ?>" id="first-name" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?>>
                </div>
                <div class="form-group">
                    <label for="last-name">Last name*</label>
                    <input type="text" class="form-control form_data_usett" name="last-name" value="<?php echo $admin['last_name']; ?>" id="last-name" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?>>
                </div>
                <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" class="form-control form_data_usett" name="email" value="<?php echo $admin['email']; ?>" id="email" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?>>
                </div>
                <div class="form-group">
                    <label for="admin-type">Admin type*</label>
                    <select class="form-control form_data_usett" name="update-admin-type" id="admin-type" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?>>
                      <option value="null">Select type</option>
                      <?php 
                     foreach($admin_types as $admin_type)
                     {
                        ?>
                        <option value="<?php echo $admin_type['id']; ?>" <?php if($admin['admin_type'] == $admin_type['id']){echo 'selected';} ?>><?php echo ucfirst($admin_type['type']); ?></option>
                        <?php 
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gender">Gender*</label>
                    <select class="form-control form_data_usett" name="gender" id="gender" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?>>
                      <option value="S">Select gender</option>
                      <option value="M" <?php if($admin['gender'] == "M"){echo 'selected';} ?>>Male</option>
                      <option value="F" <?php if($admin['gender'] == "F"){echo 'selected';} ?>>Female</option>
                      <option value="N" <?php if($admin['gender'] == "N"){echo 'selected';} ?>>Choose not to say</option>
                    </select>
                </div>
                <div class="form-group">
                    <div>Current admin photo: <?php echo $admin['profile_image'] ?></div>
                    <label for="upload-photo">Admin photo*</label>
                  <input type="file" name="admin-photo" class="form-control" id="upload-photo" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?> accept="image/*">
                </div>
                <div class="form-group">
                    <label for="phone">Phone*</label>
                    <input type="tel" placeholder="+1" class="form-control form_data_usett" value="<?php echo $admin['phone'] ?>" name="phone" id="phone" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?>>
                </div>
                <div class="form-group">
                    <label for="bio">Bio*</label>
                    <textarea class="form-control" name="bio" rows="5" id="bio" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?>><?php echo $admin['bio'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="website">Website*</label>
                    <input type="url" class="form-control form_data_usett" name="website" value="<?php echo $admin['website'] ?>" id="website" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?>>
                </div>
                <div class="form-group">
                    <label for="birth-date">Birth date*</label>
                    <input type="date" class="form-control form_data_usett" name="birth-date" value="<?php echo $admin['birthdate'] ?>" id="birth-date" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?>>
                </div>
                <div class="form-group">
                    <label for="address">Address*</label>
                    <input type="text" class="form-control form_data_usett" name="address" value="<?php echo $admin['address'] ?>" id="address" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?>>
                </div>
                <div class="form-group">
                    <label for="city">City*</label>
                    <input type="text" class="form-control form_data_usett" name="city" value="<?php echo $admin['city'] ?>" id="city" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?>>
                </div>
                <div class="form-group">
                    <label for="state">State*</label>
                    <input type="text" class="form-control form_data_usett" name="state" value="<?php echo $admin['state'] ?>" id="state" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?>>
                </div>
                <div class="form-group">
                    <label for="country">Country*</label>
                    <select class="form-control form_data_usett" name="country" id="country" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?>>
                      <option value="S">Select country</option>
                      <?php $countries = fetch_countries();
                      foreach($countries as $country) {
                      ?>
                      <option value="<?php echo $country['id']; ?>" <?php if($admin['country'] == $country['id']){echo 'selected';} ?>><?php echo $country['country']; ?></option>
                      <?php } ?>
                    </select>
                </div>
                <button name="update-admin" class="btn btn-primary" id="update_settings" <?php if($admin['admin_type'] != 1){echo 'disabled';} ?>>Update</button>
              </form>
            </div>
            <div class="card-footer">
                <!-- <span id="account" class="btn btn-danger delete-my-account">Delete my account</span> -->
                <?php if($admin['admin_type'] == 1){ ?>
                <span style="float: right;" id="password" class="btn btn-success update-my-password">Update my password</span>
                <?php } ?>
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
                    For more information, or if you think your account was suspended by mistake, please contact the organisation
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
        <?php } ?>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', () => {

        let form = document.getElementById('update_settings_form');
        let update_settings_button = document.getElementById('update_settings');
        let update_settings_messages = document.getElementById('update_settings_messages');
        form.addEventListener('submit', update_settings);

        function update_settings(e)
        {
            e.preventDefault();
            update_settings_button.disabled = true;

            let upt_admin_btn_bg_col = update_settings_button.style.backgroundColor;
            let upt_admin_btn_border = update_settings_button.style.border;
            let upt_admin_btn_cursor = update_settings_button.style.cursor;

            if(update_settings_button.disabled == true)
            {
                update_settings_button.style.backgroundColor = 'grey';
                update_settings_button.style.border = 'grey';
                update_settings_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_usett');
            let form_data = new FormData();

            for(let i = 0; i < form_element.length; i++)
            {
                form_data.append(form_element[i].name, form_element[i].value);
            }
            let bio = CKEDITOR.instances['bio'].getData();
            form_data.append('bio', bio);
            form_data.append('admin-photo', document.querySelector('#upload-photo').files[0]);
            
            let xhr = new XMLHttpRequest();

            let url = '<?php echo $host . 'process-ajax' ?>';
            
            xhr.open('POST', url);

            xhr.onload = function()
            {
                if(this.status == 200)
                {
                    update_settings_button.disabled = false;

                    if(update_settings_button.disabled == false)
                    {
                        update_settings_button.style.backgroundColor = upt_admin_btn_bg_col;
                        update_settings_button.style.border = upt_admin_btn_border;
                        update_settings_button.style.cursor = upt_admin_btn_cursor;
                    }

                    let response = xhr.responseText;
                    const pattern = /Success!/;
                    let regex = pattern.test(response);
                    if(regex === true)
                    {
                    form.reset();
                    }
                    update_settings_messages.innerHTML = response;
                
                }
            }
            
            xhr.send(form_data);
        }

        const admin_id = <?php echo $id; ?>;

        setInterval(() => 
        {
        get_admin_profile_image_for_setting(admin_id);
        }, 2000);

        get_admin_profile_image_for_setting(admin_id);
        function get_admin_profile_image_for_setting(admin_id, admin_profile_image_for_setting = '')
        {

        let form_data = new FormData();

        form_data.append('admin_id', admin_id);
        form_data.append('admin_profile_image_for_setting', admin_profile_image_for_setting);
        
        let xhr = new XMLHttpRequest();
        
        xhr.open('POST', 'process-ajax');

        xhr.onload = function()
        {
            if(this.status == 200)
            {
            let response = xhr.responseText;

            const admin_image_div = document.getElementById('admin-profile-image-for-setting');

            admin_image_div.style = response;
            }
        }
        
        xhr.send(form_data);
        }

        let upload_url = '<?php echo $host . 'upload' ?>';

        CKEDITOR.replace('bio',
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
<?php

    include('includes/footer.php');
    ckeditor('settings');

?>