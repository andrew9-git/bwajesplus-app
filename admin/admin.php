<?php

include('includes/header.php');
bwajes_plus_header('all-admins', 'Admin');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>
<?php
    if(isset($_GET['a']))
    {
        $get_admin_id = $_GET['a'];
        $admin_info = fetch_single_row($get_admin_id, 'admin');
    }
    else
    {
      redirect_to('logout');
    }

    $id = $_SESSION['admin_data']['id'];
?>
<div class="home-content">
      <div class="post-area">
        <div class="card">
            <div class="card-header">
                <div class="info-container">
                    <a href="<?php echo $host .'all-admins'; ?>" class="btn btn-success">back</a>
                </div>
                <!-- Using if statement to show either suspend or activate button -->
                <?php if($admin_info['suspended'] == 0){ ?>
                <span style="cursor: pointer;" class="btn btn-warning" onclick="event.preventDefault();if(confirm('Do you really want to suspend this admin?')){document.getElementById('form-suspend-<?php echo $get_admin_id; ?>').submit();}">suspend</span><?php } ?>
                <?php if($admin_info['suspended'] == 1){ ?><span style="cursor: pointer;" class="btn btn-success" onclick="event.preventDefault();if(confirm('Do you really want to activate this admin?')){document.getElementById('form-activate-<?php echo $get_admin_id; ?>').submit();}">activate</span> 
                <?php } ?><!-- | <a href="#" class="btn btn-danger" onclick="event.preventDefault();if(confirm('Do you really want to delete this admin?')){document.getElementById('form-delete-aid').submit();}"><i class="bx bx-trash"></i></a>-->

                <form method="post" action="<?php echo $host . 'admin/' . $get_admin_id; ?>" style="display: none;" id="form-suspend-<?php echo $get_admin_id; ?>">
                <input type="hidden" value="<?php echo $get_admin_id; ?>" name="suspend-admin">
                </form>
                <form method="post" action="<?php echo $host . 'admin/' . $get_admin_id; ?>" style="display: none;" id="form-activate-<?php echo $get_admin_id; ?>">
                    <input type="hidden" value="<?php echo $get_admin_id; ?>" name="activate-admin">
                </form>
                <!-- Admin should not be deleted only suspended so that it won't affect admin that sent emails in the email section of the app-->

                <!-- <form method="post" action="" style="display: none;" id="form-delete-id">
                    <input type="hidden" value="" name="csrf">
                    <input type="hidden" value="aid" name="delete-admin">
                </form> -->
            </div>
            <div class="card-body">
              <div style="line-height: 1.625rem; margin: 10px;">
                <h4>First Name:</h4>
                <div>
                    <?php if(isset($admin_info['first_name'])){echo $admin_info['first_name'];} ?>
                </div>
                <h4>Last Name:</h4>
                <div>
                    <?php if(isset($admin_info['last_name'])){echo $admin_info['last_name'];} ?>
                </div>
                <h4>Username:</h4>
                <div>
                    <?php if(isset($admin_info['username'])){echo $admin_info['username'];} ?>
                </div>
                <h4>Email:</h4>
                <div>
                    <?php if(isset($admin_info['email'])){echo $admin_info['email'];} ?>
                </div>
                <h4>Admin type:</h4>
                <div>
                    <?php if(isset($admin_info['admin_type'])){
                         if($admin_info['admin_type'] == 1)
                         {
                            echo 'Super';
                         }
                         elseif($admin_info['admin_type'] == 2)
                         {
                            echo 'Basic';
                         }
                        } ?>
                </div>
                <h4>Gender:</h4>
                <div>
                    <?php if(isset($admin_info['gender'])){
                        if($admin_info['gender'] == "M")
                        {
                            echo "Male";
                        }
                        elseif($admin_info['gender'] == "F")
                        {
                            echo "Female";
                        }
                        elseif($admin_info['gender'] == "N")
                        {
                            echo "Chose not to say";
                        }
                    
                    }?>
                </div>
                <h4>Phone:</h4>
                <div>
                    <?php if(isset($admin_info['phone'])){echo $admin_info['phone'];} ?>
                </div>
                <h4>Bio:</h4>
                <div>
                    <?php if(isset($admin_info['bio'])){echo $admin_info['bio'];} ?>
                </div>
                <h4>Website:</h4>
                <div>
                    <?php if(isset($admin_info['website'])){echo $admin_info['website'];} ?>
                </div>
                <h4>Age:</h4>
                <div>
                    <?php if(isset($admin_info['birthdate'])){
                        $date1 = new DateTime($admin_info['birthdate']);
                        $date2 = new DateTime(date('Y-m-d'));
                        $interval = $date1->diff($date2);
                        $years = $interval->y;
                
                        if($years > 1)
                        {
                            $age = $years . " years old";
                        }
                        else
                        {
                            $age = $years . " year old";
                        }
                        echo $age;
                    } ?>
                </div>
                <h4>Address:</h4>
                <div>
                    <?php if(isset($admin_info['address'])){echo "<address>".$admin_info['address']. "</address>";} ?>
                </div>
                <h4>City:</h4>
                <div>
                    <?php if(isset($admin_info['city'])){echo $admin_info['city'];} ?>
                </div>
                <h4>State:</h4>
                <div>
                    <?php if(isset($admin_info['state'])){echo $admin_info['state'];} ?>
                </div>
                <h4>Country:</h4>
                <div>
                    <?php if(isset($admin_info['country'])){echo fetch_single_row($admin_info['country'], 'countries')['country'];} ?>
                </div>
                <h4>Date registered:</h4>
                <div>
                    <?php if(isset($admin_info['created_at'])){echo date("F jS, Y", strtotime($admin_info['created_at']));} ?>
                </div>
                <h4>Date updated:</h4>
                <div>
                    <?php if(isset($admin_info['updated_at'])){echo date("F jS, Y", strtotime($admin_info['updated_at']));} ?>
                </div>
                <h4>Registered by:</h4>
                <div>
                    <?php 
                    if(isset($admin_info['registered_by']))
                    {
                      $registered_by = fetch_single_row($admin_info['registered_by'], 'admin');
                      echo ucfirst($registered_by['first_name']) . ' ' . ucfirst($registered_by['last_name']);
                    } 
                  ?>
                </div>
                <h4>Updated by:</h4>
                <div>
                    <?php 
                    if(isset($admin_info['updated_by']))
                    {
                      $updated_by = fetch_single_row($admin_info['updated_by'], 'admin');
                      echo ucfirst($updated_by['first_name']) . ' ' . ucfirst($updated_by['last_name']);
                    } 
                  ?>
                </div>
            </div>
            </div>
            <div class="card-footer">
            <span style="float: right;" id="generate-password" class="btn btn-success update-my-password">Generate password</span>
            </div>
        </div>
      </div>
    </div>
    <div class="modal" id="generate-password-modal">
    <div class="card">
      <div class="card-header">
        <div class="close" id="generate-password-close">&times;</div>
        <h4 class="message-head">Generate New Password For <?php echo ucfirst($admin_info['first_name']); ?></h4>
      </div>
      <div class="card-body">
        <form id="generate_password_form">
          <div id="generate_password_messages">
          </div>
          <div class="form-group">
              <input type="hidden" class="form-control form_data_generate_password" name="generate-id" value="<?php echo $get_admin_id; ?>" id="generate-id">
          </div>
          <div class="form-group">
              <input type="hidden" class="form-control form_data_generate_password" name="admin-id" value="<?php echo $id; ?>" id="admin-id">
          </div>
          <button name="generate-password" id="generate_password" class="btn btn-primary">Generate</button>
      </form>
      </div>
      <div class="card-footer">
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', () => {

        //generate password

        const generatePassword = document.querySelector("#generate-password");
        const generatePasswordModal = document.querySelector("#generate-password-modal");
        const closeGeneratePassword = document.querySelector("#generate-password-close");

        generatePassword.addEventListener('click', (e) => {
            e.preventDefault();
            generatePasswordModal.style.display = 'block';
        });

        closeGeneratePassword.addEventListener('click', () => {
            generatePasswordModal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if(e.target == generatePasswordModal)
            {
                generatePasswordModal.style.display = 'none';
            }
            else
            {
                return false;
            }
        });

        //ajax request for generating new password for admin

        let form = document.getElementById('generate_password_form');
        let generate_password_button = document.getElementById('generate_password');
        let generate_password_messages = document.getElementById('generate_password_messages');
        form.addEventListener('submit', generate_password);

        function generate_password(e)
        {
            e.preventDefault();
            generate_password_button.disabled = true;

            let gen_pass_btn_bg_col = generate_password_button.style.backgroundColor;
            let gen_pass_btn_border = generate_password_button.style.border;
            let gen_pass_btn_cursor = generate_password_button.style.cursor;

            if(generate_password_button.disabled == true)
            {
                generate_password_button.style.backgroundColor = 'grey';
                generate_password_button.style.border = 'grey';
                generate_password_button.style.cursor = 'not-allowed';
            }

            let form_element = document.getElementsByClassName('form_data_generate_password');
            let form_data = new FormData();

            for(let i = 0; i < form_element.length; i++)
            {
                form_data.append(form_element[i].name, form_element[i].value);          
            }
            let xhr = new XMLHttpRequest();
            
            xhr.open('POST', 'http://localhost:9090/bwajesplus-app/admin/process-ajax');

            xhr.onload = function()
            {
                if(this.status == 200)
                {
                    generate_password_button.disabled = false;

                    if(generate_password_button.disabled == false)
                    {
                        generate_password_button.style.backgroundColor = gen_pass_btn_bg_col;
                        generate_password_button.style.border = gen_pass_btn_border;
                        generate_password_button.style.cursor = gen_pass_btn_cursor;
                    }

                    let response = xhr.responseText;
                    // const pattern = /messaging/;
                    // let regex = pattern.test(response);
                    // if(regex === true)
                    // {

                    // }
                    console.log(response);
                    generate_password_messages.innerHTML = response;
                
                }
            }
            
            xhr.send(form_data);
        }


    });
  </script>
  <?php
      if(isset($_POST['suspend-admin']))
      {
        $get_admin_id = $_POST['suspend-admin'];
        $executed = suspend_admin($get_admin_id);
        if($executed)
        {
          $url = $host . 'admin/' . $get_admin_id;
          redirect_to($url);
        }
      }

      if(isset($_POST['activate-admin']))
      {
        $get_admin_id = $_POST['activate-admin'];
        $executed = activate_admin($get_admin_id);
        if($executed)
        {
          $url = $host . 'admin/' . $get_admin_id;
          redirect_to($url);
        }
      }
    ?>
<?php

    include('includes/footer.php');
    ckeditor();

?>