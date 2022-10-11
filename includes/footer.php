<?php

function ckeditor($page = '')
{
  $host = url()[0];  
?>
</section>
<?php 
    $id = $_SESSION['bwajes_plus_user_data']['id'];
    $email = $_SESSION['bwajes_plus_user_data']['email'];
    $first_name = $_SESSION['bwajes_plus_user_data']['first_name'];
    $last_name = $_SESSION['bwajes_plus_user_data']['last_name'];
    $user = fetch_single_row($id, 'users');

    $agreement = paypal($id)['agreement'];
?>
<?php
    if($page === 'settings')
    {?>
    <div class="modal" id="photo-modal">
    <div class="card">
      <div class="card-header">
        <div class="close" id="photo-close">&times;</div>
        <h4 class="message-head">Upload photo</h4>
      </div>
      <div class="card-body">
        <form id="profile_image_form" enctype="multipart/form-data">
          <div id="profile_image_messages">
          </div>
            <div class="form-group">
                <input type="hidden" class="form-control form_data_profile_image" name="user-id-profile-image" value="<?php echo $id; ?>" id="user-id">
            </div>
            <div class="form-group">
                <input type="file" accept="image/*" name="profile-image" class="form-control" id="prof-image">
            </div>
            <button name="send-mail" id="profile_image" class="btn btn-primary">Upload</button>
        </form>
      </div>
      <div class="card-footer">
        <div class="thanks">The accepted file type is jpeg, jpg and png</div>
      </div>
    </div>
  </div>
  <div class="modal" id="password-modal">
    <div class="card">
      <div class="card-header">
        <div class="close" id="password-close">&times;</div>
        <h4 class="message-head">Update My Password</h4>
      </div>
      <div class="card-body">
        <form id="update_password_form">
          <div id="update_password_messages">
          </div>
          <div class="form-group">
              <input type="hidden" class="form-control form_data_update_password" name="user-id" value="<?php echo $id; ?>" id="user-id">
          </div>
          <div class="form-group">
              <input type="hidden" class="form-control form_data_update_password" name="user-email" value="<?php echo $email; ?>" id="user-email">
          </div>
          <div class="form-group">
            <label for="old-password">Password*</label>
            <input type="password" class="form-control form_data_update_password" name="old-password" id="old-password">
          </div>
          <div class="form-group">
            <label for="new-password">New password*</label>
            <input type="password" class="form-control form_data_update_password" name="new-password" id="new-password">
          </div>
          <div class="form-group">
            <label for="confirm-new-password">Confirm new password*</label>
            <input type="password" class="form-control form_data_update_password" name="confirm-new-password" id="confirm-new-password">
          </div>
          <button name="update-password" id="update_password" class="btn btn-primary">Update</button>
      </form>
      </div>
      <div class="card-footer">
      </div>
    </div>
  </div>
  <div class="modal" id="account-modal">
    <div class="card">
      <div class="card-header">
        <div class="close" id="account-close">&times;</div>
        <h4 class="message-head">Delete My Account</h4>
      </div>
      <div class="card-body">
        <div class="delete-account-container">
          <div>
            <?php  $count = db_row_count($id, 'user_id', 'payment_subscriptions', 'int');if($count > 0){ ?>
            <?php if($agreement->getState() == 'Cancelled'){ ?>
            <div class="delete-account-notification-wrapper">
              <i class="bx bx-alarm-exclamation delete-notification"></i> <span class="delete-account-notification-text">Deleting your account will</span>
            </div>
            <div>
              <ul class="delete-account-notification-list">
                <li>Erase your account from bwajes+</li>
                <li>Delete all your posts</li>
              </ul>
            </div>
            <form id="delete_user_form">
                <div id="delete_user_messages">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-id" value="<?php echo $id; ?>" id="delete-user-id">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-first-name" value="<?php echo $first_name; ?>" id="delete-user-first-name">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-last-name" value="<?php echo $last_name; ?>" id="delete-user-last-name">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-email" value="<?php echo $email; ?>" id="delete-user-email">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-gender" value="<?php echo $user['gender']; ?>" id="delete-user-gender">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-phone" value="<?php echo $user['phone']; ?>" id="delete-user-phone">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-website" value="<?php echo $user['website']; ?>" id="delete-user-website">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-birth-date" value="<?php echo $user['birthdate']; ?>" id="delete-user-birth-date">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-address" value="<?php echo $user['address']; ?>" id="delete-user-address">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-city" value="<?php echo $user['city']; ?>" id="delete-user-city">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-state" value="<?php echo $user['state']; ?>" id="delete-user-state">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-country" value="<?php echo $user['country']; ?>" id="delete-user-country">
                </div>
                <button name="send-mail" id="delete_user" class="btn btn-danger">Delete</button>
            </form>
            <?php }elseif($agreement->getState() == 'Active'){ ?>
            <div class="card-body" style="display: flex;justify-content:center;align-items:center;">
                <div class="ad-removal">
                    You need to cancel your subscription before you can delete your account
                </div>
            </div>
            <?php } ?>
            <?php }else{ ?>
            <div class="delete-account-notification-wrapper">
              <i class="bx bx-alarm-exclamation delete-notification"></i> <span class="delete-account-notification-text">Deleting your account will</span>
            </div>
            <div>
              <ul class="delete-account-notification-list">
                <li>Erase your account from bwajes+</li>
                <li>Delete all your posts</li>
              </ul>
            </div>
            <form id="delete_user_form">
                <div id="delete_user_messages">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-id" value="<?php echo $id; ?>" id="delete-user-id">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-first-name" value="<?php echo $first_name; ?>" id="delete-user-first-name">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-last-name" value="<?php echo $last_name; ?>" id="delete-user-last-name">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-email" value="<?php echo $email; ?>" id="delete-user-email">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-gender" value="<?php echo $user['gender']; ?>" id="delete-user-gender">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-phone" value="<?php echo $user['phone']; ?>" id="delete-user-phone">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-website" value="<?php echo $user['website']; ?>" id="delete-user-website">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-birth-date" value="<?php echo $user['birthdate']; ?>" id="delete-user-birth-date">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-address" value="<?php echo $user['address']; ?>" id="delete-user-address">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-city" value="<?php echo $user['city']; ?>" id="delete-user-city">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-state" value="<?php echo $user['state']; ?>" id="delete-user-state">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control form_data_delete" name="delete-user-country" value="<?php echo $user['country']; ?>" id="delete-user-country">
                </div>
                <button name="send-mail" id="delete_user" class="btn btn-danger">Delete</button>
            </form>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="thanks"><b>This action is irreversible!<b></div>
      </div>
    </div>
  </div>
<?php } ?>
  <div class="modal" id="message-modal">
    <div class="card">
      <div class="card-header">
        <div class="close" id="message-close">&times;</div>
        <h4 class="message-head">Messaging Support</h4>
      </div>
      <div class="card-body">
        <form id="message_support_form">
          <div id="message_support_messages">
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control form_data" name="user-id" value="<?php echo $id ?>" id="user-id">
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control form_data" name="first-name" value="<?php echo $first_name ?>" id="first-name">
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control form_data" name="last-name" value="<?php echo $last_name ?>" id="last-name">
          </div>
          <div class="form-group">
            <label for="email">Email address*</label>
            <input type="email" class="form-control form_data" name="email" value="<?php echo $email ?>" id="email" disabled>
          </div>
          <div class="form-group">
            <label for="support">Choose Support Department*</label>
            <select class="form-control form_data" name="department" id="department">
              <option value="S">Select department</option>
              <option value="support@bwajes-plus.andadel.com">General Support</option>
              <option value="it@bwajes-plus.andadel.com">IT Support</option>
              <option value="admin@bwajes-plus.andadel.com">Adminstration Support</option>
              <option value="billing@bwajes-plus.andadel.com">Billing Support</option>
            </select>
          </div>
          <div class="form-group">
            <label for="title">Title*</label>
            <input type="text" name="title" class="form-control form_data" placeholder="Enter title" id="title">
          </div>
          <div class="form-group">
            <label for="message">Message*</label>
            <textarea class="form-control form_data" name="message" rows="5" id="message"></textarea>
          </div>
          <button name="send-mail" id="send_message_support" class="btn btn-primary">Send</button>
        </form>
      </div>
      <div class="card-footer">
        <div class="thanks">Thanks for taking out of your precious time to message us</div>
      </div>
    </div>
  </div>
  <div class="modal" id="rate-modal">
    <div class="card">
      <div class="card-header">
        <div class="close" id="rate-close">&times;</div>
        <h4 class="message-head">Rate us</h4>
      </div>
      <div class="card-body">
        <form id="rate_us_form">
          <div id="rate_us_messages">
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control form_data_rating" name="user-id" value="<?php echo $id ?>" id="user-id">
          </div>
          <div class="form-group">
            <?php 
              for($i = 1; $i <= 5; $i++)
              {
            ?>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" value="<?php echo $i; ?>" name="rating"><br><?php echo $i; ?>
              </label>
            </div>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="reason">Why do you rate us the way you did?</label>
            <textarea class="form-control form_data_rating" rows="5" name="reason" id="reason"></textarea>
          </div>
          <div class="form-group">
            <label for="suggestion">What can we do to serve you better or improve the system?</label>
            <textarea class="form-control form_data_rating" name="suggestion" rows="5" id="suggestion"></textarea>
          </div>
          <button name="rate-us" id="rate_us" class="btn btn-primary">Rate us</button>
        </form>
      </div>
      <div class="card-footer">
        <div class="thanks">Thanks for taking out of your precious time to rate us</div>
      </div>
    </div>
  </div>
  <script src="<?php echo $host .'assets/js/script.js'; ?>"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const photo = document.querySelector("#photo");
      const photoModal = document.querySelector("#photo-modal");
      const closePhoto = document.querySelector("#photo-close");

      if(photo)
      {
        photo.addEventListener('click', (e) => {
            e.preventDefault();
            photoModal.style.display = 'block';
        });

        closePhoto.addEventListener('click', () => {
            photoModal.style.display = 'none';
        });
      }

      const account = document.querySelector("#account");
      const accountModal = document.querySelector("#account-modal");
      const closeAcount = document.querySelector("#account-close");

      if(account)
      {
        account.addEventListener('click', (e) => {
            e.preventDefault();
            accountModal.style.display = 'block';
        });

        closeAcount.addEventListener('click', () => {
            accountModal.style.display = 'none';
        });
      }

      //update password

      const password = document.querySelector("#password");
      const passwordModal = document.querySelector("#password-modal");
      const closePassword = document.querySelector("#password-close");

      if(password)
      {
        password.addEventListener('click', (e) => {
            e.preventDefault();
            passwordModal.style.display = 'block';
        });

        closePassword.addEventListener('click', () => {
            passwordModal.style.display = 'none';
        });
      }

      window.addEventListener('click', (e) => {
          if(e.target == photoModal)
          {
          photoModal.style.display = 'none';
          }
          else if(e.target == accountModal)
          {
          accountModal.style.display = 'none';
          }
          else if(e.target == passwordModal)
          {
          passwordModal.style.display = 'none';
          }
          else
          {
          return false;
          }
      });
  
      const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

      accordionItemHeaders.forEach(accordionItemHeader => {
          accordionItemHeader.addEventListener("click", event => {
          
          // Uncomment in case you only want to allow for the display of only one collapsed item at a time!
          
          const currentlyActiveAccordionItemHeader = document.querySelector(".accordion-item-header.active");
          if(currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader!==accordionItemHeader) {
              currentlyActiveAccordionItemHeader.classList.toggle("active");
              currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
          }

          accordionItemHeader.classList.toggle("active");
          const accordionItemBody = accordionItemHeader.nextElementSibling;
          if(accordionItemHeader.classList.contains("active")) {
              accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
          }
          else {
              accordionItemBody.style.maxHeight = 0;
          }
          
          });
      });

      //closable div
      let bar = document.getElementById('Bar');

      if(bar)
      {
        let hide_times = document.getElementById('hide-times');

        hide_times.addEventListener('click', () => {
            // bar.style.display = "none";
            bar.remove();
        });
      }

      let bar_msg = document.getElementById('Bar-msg');

      if(bar_msg)
      {
        let hide_times_msg = document.getElementById('hide-times-msg');

        hide_times_msg.addEventListener('click', () => {
            // bar.style.display = "none";
            bar_msg.remove();
        });
      }

      //ajax request for sending mail to bwajes+

      let form = document.getElementById('message_support_form');
      let message_support_button = document.getElementById('send_message_support');
      let message_support_messages = document.getElementById('message_support_messages');
      form.addEventListener('submit', message_support);

      function message_support(e)
      {
        e.preventDefault();
        message_support_button.disabled = true;

        let msg_support_btn_bg_col = message_support_button.style.backgroundColor;
        let msg_support_btn_border = message_support_button.style.border;
        let msg_support_btn_cursor = message_support_button.style.cursor;

        if(message_support_button.disabled == true)
        {
            message_support_button.style.backgroundColor = 'grey';
            message_support_button.style.border = 'grey';
            message_support_button.style.cursor = 'not-allowed';
        }

        let form_element = document.getElementsByClassName('form_data');
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
                message_support_button.disabled = false;

                if(message_support_button.disabled == false)
                {
                    message_support_button.style.backgroundColor = msg_support_btn_bg_col;
                    message_support_button.style.border = msg_support_btn_border;
                    message_support_button.style.cursor = msg_support_btn_cursor;
                }

                let response = xhr.responseText;
                const pattern = /messaging/;
                let regex = pattern.test(response);
                if(regex === true)
                {
                  form.reset();
                  const messageModal = document.querySelector("#message-modal");
                  setTimeout(() => {messageModal.style.display = 'none';}, 2000);
                }
                message_support_messages.innerHTML = response;
              
            }
        }
        
        xhr.send(form_data);
      }


    });
  </script>
  <script>
      document.addEventListener('DOMContentLoaded', () => {
      //ajax request for rating bwajes+

      let form = document.getElementById('rate_us_form');
      let rate_us_button = document.getElementById('rate_us');
      let rate_us_messages = document.getElementById('rate_us_messages');
      form.addEventListener('submit', rate_us);

      function rate_us(e)
      {
        e.preventDefault();
        rate_us_button.disabled = true;

        let rate_us_btn_bg_col = rate_us_button.style.backgroundColor;
        let rate_us_btn_border = rate_us_button.style.border;
        let rate_us_btn_cursor = rate_us_button.style.cursor;

        if(rate_us_button.disabled == true)
        {
            rate_us_button.style.backgroundColor = 'grey';
            rate_us_button.style.border = 'grey';
            rate_us_button.style.cursor = 'not-allowed';
        }

        let form_element_1 = document.getElementsByClassName('form_data_rating');
        let form_element_2 = document.getElementsByName('rating');

        let form_data = new FormData();

        for(let i = 0; i < form_element_1.length; i++)
        {
          form_data.append(form_element_1[i].name, form_element_1[i].value);   
        }     

        for(let i = 0; i < form_element_2.length; i++)
        {
          if(form_element_2[i].checked == true)
          {
            form_data.append(form_element_2[i].name, form_element_2[i].value);   
          }
        } 

        let xhr = new XMLHttpRequest();

        let url_1 = '<?php echo $host.'process-ajax' ?>';
        
        xhr.open('POST', url_1);

        xhr.onload = function()
        {
          if(this.status == 200)
          {
              rate_us_button.disabled = false;

              if(rate_us_button.disabled == false)
              {
                  rate_us_button.style.backgroundColor = rate_us_btn_bg_col;
                  rate_us_button.style.border = rate_us_btn_border;
                  rate_us_button.style.cursor = rate_us_btn_cursor;
              }

              let response = xhr.responseText;
              const pattern = /rating/;
              let regex = pattern.test(response);
              if(regex === true)
              {
                form.reset();
                const rateModal = document.querySelector("#rate-modal");
                setTimeout(() => {rateModal.style.display = 'none';}, 2000);
              }
              rate_us_messages.innerHTML = response;
            
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
          get_user_profile_image(user_id);
        }, 2000);

      get_user_profile_image(user_id);

      function get_user_profile_image(user_id, user_profile_image = '')
      {

        let form_data = new FormData();

        form_data.append('user_id', user_id);
        form_data.append('user_profile_image', user_profile_image);
        
        let xhr = new XMLHttpRequest();

        let url_2 = '<?php echo $host.'process-ajax' ?>';
        
        xhr.open('POST', url_2);

        xhr.onload = function()
        {
          if(this.status == 200)
          {
            let response = xhr.responseText;

            const user_image_div = document.getElementById('user-profile-image');

            user_image_div.innerHTML = response;
          }
        }
        
        xhr.send(form_data);
      }

    });
  </script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        
      //ajax request to load unseen notification

      const user_id = <?php echo $id; ?>;

      function load_unseen_notification(user_id, view_notification = '')
      {

        let form_data = new FormData();

        form_data.append('user_id', user_id);
        form_data.append('view_notification', view_notification);
        
        let xhr = new XMLHttpRequest();

        let url_3 = '<?php echo $host.'process-ajax' ?>';
        
        xhr.open('POST', url_3);

        xhr.onload = function()
        {
          if(this.status == 200)
          {
            let response = JSON.parse(xhr.responseText);
            document.getElementById('notify_ul').innerHTML = response.notification;

            if(response.unseen_notification > 0)
            {
              document.getElementById('notify_number').innerHTML = response.unseen_notification;
            }
            else if(response.unseen_notification == 0)
            {
              document.getElementById('notify_number').style.display = 'none';
            }
          }
        }
        
        xhr.send(form_data);
      }

 
      load_unseen_notification(user_id);

      let bell_notify = document.getElementById('notify_bell');

      bell_notify.addEventListener('click', () => {
        document.getElementById('notify_number').innerHTML = '';
        load_unseen_notification(user_id,'yes');
      });

      setInterval(function(){ 
        load_unseen_notification(user_id);
      }, 5000);

    });
  </script>
</body>
</html>
<?php
}

ob_end_flush();

?>