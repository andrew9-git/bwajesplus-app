<?php

include('includes/header.php');
bwajes_plus_header('all-admins', 'Update admin');

$host='http://localhost:9090/bwajesplus-app/admin/';
?>
<?php

  $id = $_SESSION['bwajes_plus_admin_data']['id'];

  $admin = fetch_single_row($id, 'admin');

  if($admin['admin_type'] != 1)
  {
    redirect_to($host . 'logout');
  }

    if(isset($_GET['a']))
    {
        $admin_id = $_GET['a'];
        $admin = fetch_single_row($admin_id, 'admin');
    }
    else
    {
      redirect_to('logout');
    }

    $admin_types = admin_type();
    $country = fetch_countries();
?>
<div class="home-content">
      <div class="post-area">
      <?php 
        $admin_info = fetch_single_row($id, 'admin');
        if($admin_info['suspended'] != 1)
        {
      ?>
        <div class="card">
          <div class="card-header">
              <div class="info-container">
                <a href="<?php echo $host."all-admins"; ?>" class="btn btn-success">back</a>
              </div>
          </div>
          <div class="card-body">
            <form id="update_admin_form" enctype="multipart/form-data">
                <div id="update_admin_messages">
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control form_data_ureg" name="updated-by" value="<?php echo $id; ?>">
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control form_data_ureg" name="admin-id" value="<?php echo $admin['id']; ?>">
                </div>
                <div class="form-group">
                  <label for="first-name">First name*</label>
                  <input type="text" class="form-control form_data_ureg" name="first-name" value="<?php echo $admin['first_name']; ?>" id="first-name">
                </div>
                <div class="form-group">
                    <label for="last-name">Last name*</label>
                    <input type="text" class="form-control form_data_ureg" name="last-name" value="<?php echo $admin['last_name']; ?>" id="last-name">
                </div>
                <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" class="form-control form_data_ureg" name="email" value="<?php echo $admin['email']; ?>" id="email">
                </div>
                <div class="form-group">
                    <label for="admin-type">Admin type*</label>
                    <select class="form-control form_data_ureg" name="edit-admin-type" id="admin-type">
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
                    <select class="form-control form_data_ureg" name="gender" id="gender">
                      <option value="S">Select gender</option>
                      <option value="M" <?php if($admin['gender'] == "M"){echo 'selected';} ?>>Male</option>
                      <option value="F" <?php if($admin['gender'] == "F"){echo 'selected';} ?>>Female</option>
                      <option value="N" <?php if($admin['gender'] == "N"){echo 'selected';} ?>>Choose not to say</option>
                    </select>
                </div>
                <div class="form-group">
                    <div>Current admin photo: <?php echo $admin['profile_image'] ?></div>
                    <label for="upload-photo">Admin photo*</label>
                  <input type="file" name="admin-photo" class="form-control" id="upload-photo" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="phone">Phone*</label>
                    <input type="tel" placeholder="+1" class="form-control form_data_ureg" value="<?php echo $admin['phone'] ?>" name="phone" id="phone">
                </div>
                <div class="form-group">
                    <label for="bio">Bio*</label>
                    <textarea class="form-control" name="bio" rows="5" id="bio"><?php echo $admin['bio'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="website">Website*</label>
                    <input type="url" class="form-control form_data_ureg" name="website" value="<?php echo $admin['website'] ?>" id="website">
                </div>
                <div class="form-group">
                    <label for="birth-date">Birth date*</label>
                    <input type="date" class="form-control form_data_ureg" name="birth-date" value="<?php echo $admin['birthdate'] ?>" id="birth-date">
                </div>
                <div class="form-group">
                    <label for="address">Address*</label>
                    <input type="text" class="form-control form_data_ureg" name="address" value="<?php echo $admin['address'] ?>" id="address">
                </div>
                <div class="form-group">
                    <label for="city">City*</label>
                    <input type="text" class="form-control form_data_ureg" name="city" value="<?php echo $admin['city'] ?>" id="city">
                </div>
                <div class="form-group">
                    <label for="state">State*</label>
                    <input type="text" class="form-control form_data_ureg" name="state" value="<?php echo $admin['state'] ?>" id="state">
                </div>
                <div class="form-group">
                    <label for="country">Country*</label>
                    <select class="form-control form_data_ureg" name="country" id="country">
                      <option value="S">Select country</option>
                      <?php $countries = fetch_countries();
                      foreach($countries as $country) {
                      ?>
                      <option value="<?php echo $country['id']; ?>" <?php if($admin['country'] == $country['id']){echo 'selected';} ?>><?php echo $country['country']; ?></option>
                      <?php } ?>
                    </select>
                </div>
                <button name="update-admin" class="btn btn-primary" id="update_admin">Update</button>
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

            let form = document.getElementById('update_admin_form');
            let update_admin_button = document.getElementById('update_admin');
            let update_admin_messages = document.getElementById('update_admin_messages');
            form.addEventListener('submit', update_admin);

            function update_admin(e)
            {
                e.preventDefault();
                update_admin_button.disabled = true;

                let upt_admin_btn_bg_col = update_admin_button.style.backgroundColor;
                let upt_admin_btn_border = update_admin_button.style.border;
                let upt_admin_btn_cursor = update_admin_button.style.cursor;

                if(update_admin_button.disabled == true)
                {
                    update_admin_button.style.backgroundColor = 'grey';
                    update_admin_button.style.border = 'grey';
                    update_admin_button.style.cursor = 'not-allowed';
                }

                let form_element = document.getElementsByClassName('form_data_ureg');
                let form_data = new FormData();

                for(let i = 0; i < form_element.length; i++)
                {
                    form_data.append(form_element[i].name, form_element[i].value);
                }
                let bio = CKEDITOR.instances['bio'].getData();
                form_data.append('bio', bio);
                form_data.append('admin-photo', document.querySelector('#upload-photo').files[0]);
                
                let xhr = new XMLHttpRequest();
                
                xhr.open('POST', 'http://localhost:9090/bwajesplus-app/admin/process-ajax');

                xhr.onload = function()
                {
                    if(this.status == 200)
                    {
                        update_admin_button.disabled = false;

                        if(update_admin_button.disabled == false)
                        {
                            update_admin_button.style.backgroundColor = upt_admin_btn_bg_col;
                            update_admin_button.style.border = upt_admin_btn_border;
                            update_admin_button.style.cursor = upt_admin_btn_cursor;
                        }

                        let response = xhr.responseText;
                        const pattern = /Success!/;
                        let regex = pattern.test(response);
                        if(regex === true)
                        {
                        form.reset();
                        }
                        update_admin_messages.innerHTML = response;
                    
                    }
                }
                
                xhr.send(form_data);
            }

        });
    </script>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        CKEDITOR.replace('bio',
        {
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'About,Source,Anchor',
            extraPlugins: 'justify',
            height: 300,
            filebrowserUploadUrl: 'http://localhost:9090/bwajesplus-app/admin/upload',
            filebrowserUploadMethod: 'form'
        });
      });
    </script>
<?php

    include('includes/footer.php');
    ckeditor();

?>