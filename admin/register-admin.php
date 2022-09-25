<?php

include('includes/header.php');
bwajes_plus_header('all-admins', 'Register admin');

$id = $_SESSION['admin_data']['id'];

$admin = fetch_single_row($id, 'admin');
?>
<?php 
    $id = $_SESSION['admin_data']['id'];

    $admin = fetch_single_row($id, 'admin');

    if($admin['admin_type'] != 1)
    {
        redirect_to('logout');
    }

    $admin_types = admin_type();
    $admin = fetch_single_row($id, 'admin');
?>
<div class="home-content">
      <div class="post-area">
      <?php 
        if($admin['suspended'] != 1)
        {
      ?>
        <div class="card">
          <div class="card-header">
              <div class="info-container">
                <a href="all-admins" class="btn btn-success">back</a>
              </div>
          </div>
          <div class="card-body">
            <form id="register_admin_form" enctype="multipart/form-data">
                <div id="register_admin_messages">
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control form_data_reg" name="registered-by" value="<?php echo $admin['id']; ?>">
                </div>
                <div class="form-group">
                  <label for="first-name">First name*</label>
                  <input type="text" class="form-control form_data_reg" name="first-name" id="first-name">
                </div>
                <div class="form-group">
                    <label for="last-name">Last name*</label>
                    <input type="text" class="form-control form_data_reg" name="last-name" id="last-name">
                </div>
                <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" class="form-control form_data_reg" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="admin-type">Admin type*</label>
                    <select class="form-control form_data_reg" name="admin-type" id="admin-type">
                      <option value="S">Select type</option>
                      <?php 
                     foreach($admin_types as $admin_type)
                     {
                        ?>
                        <option value="<?php echo $admin_type['id']; ?>"><?php echo ucfirst($admin_type['type']); ?></option>
                        <?php 
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gender">Gender*</label>
                    <select class="form-control form_data_reg" name="gender" id="gender">
                      <option value="S">Select gender</option>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                      <option value="N">Choose not to say</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="upload-photo">Admin photo*</label>
                  <input type="file" name="admin-photo" class="form-control" id="upload-photo" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="phone">Phone*</label>
                    <input type="tel" placeholder="+1" class="form-control form_data_reg" name="phone" id="phone">
                </div>
                <div class="form-group">
                    <label for="bio">Bio*</label>
                    <textarea class="form-control" name="bio" rows="5" id="bio"></textarea>
                </div>
                <div class="form-group">
                    <label for="website">Website*</label>
                    <input type="url" class="form-control form_data_reg" name="website" id="website">
                </div>
                <div class="form-group">
                    <label for="birth-date">Birth date*</label>
                    <input type="date" class="form-control form_data_reg" name="birth-date" id="birth-date">
                </div>
                <div class="form-group">
                    <label for="address">Address*</label>
                    <input type="text" class="form-control form_data_reg" name="address" id="address">
                </div>
                <div class="form-group">
                    <label for="city">City*</label>
                    <input type="text" class="form-control form_data_reg" name="city" id="city">
                </div>
                <div class="form-group">
                    <label for="state">State*</label>
                    <input type="text" class="form-control form_data_reg" name="state" id="state">
                </div>
                <div class="form-group">
                    <label for="country">Country*</label>
                    <select class="form-control form_data_reg" name="country" id="country">
                      <option value="S">Select country</option>
                      <?php $countries = fetch_countries();
                      foreach($countries as $country) {
                      ?>
                      <option value="<?php echo $country['id']; ?>"><?php echo $country['country']; ?></option>
                      <?php } ?>
                    </select>
                </div>
                <button name="register-admin" class="btn btn-primary" id="register_admin">Register</button>
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

            let form = document.getElementById('register_admin_form');
            let register_admin_button = document.getElementById('register_admin');
            let register_admin_messages = document.getElementById('register_admin_messages');
            form.addEventListener('submit', register_admin);

            function register_admin(e)
            {
                e.preventDefault();
                register_admin_button.disabled = true;

                let reg_admin_btn_bg_col = register_admin_button.style.backgroundColor;
                let reg_admin_btn_border = register_admin_button.style.border;
                let reg_admin_btn_cursor = register_admin_button.style.cursor;

                if(register_admin_button.disabled == true)
                {
                    register_admin_button.style.backgroundColor = 'grey';
                    register_admin_button.style.border = 'grey';
                    register_admin_button.style.cursor = 'not-allowed';
                }

                let form_element = document.getElementsByClassName('form_data_reg');
                let form_data = new FormData();

                for(let i = 0; i < form_element.length; i++)
                {
                    form_data.append(form_element[i].name, form_element[i].value);
                }
                let bio = CKEDITOR.instances['bio'].getData();
                form_data.append('bio', bio);
                form_data.append('admin-photo', document.querySelector('#upload-photo').files[0]);
                
                let xhr = new XMLHttpRequest();
                
                xhr.open('POST', 'process-ajax');

                xhr.onload = function()
                {
                    if(this.status == 200)
                    {
                        register_admin_button.disabled = false;

                        if(register_admin_button.disabled == false)
                        {
                            register_admin_button.style.backgroundColor = reg_admin_btn_bg_col;
                            register_admin_button.style.border = reg_admin_btn_border;
                            register_admin_button.style.cursor = reg_admin_btn_cursor;
                        }

                        let response = xhr.responseText;
                        const pattern = /Success!/;
                        let regex = pattern.test(response);
                        if(regex === true)
                        {
                        form.reset();
                        }
                        register_admin_messages.innerHTML = response;
                    
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