<?php

function ckeditor($page = '')
{

  $hostname='http://localhost:9090/bwajesplus-app/';
  
?>
<?php 
    $id = $_SESSION['admin_data']['id'];
    $username = $_SESSION['admin_data']['username'];
    $first_name = $_SESSION['admin_data']['first_name'];
    $last_name = $_SESSION['admin_data']['last_name'];
?>
</section>
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
        <form action="" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" class="form-control" name="csrf" value="" id="csrf">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" id="upload-photo">
            </div>
            <button type="submit" name="send-mail" class="btn btn-primary">Upload</button>
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
        <h4 class="message-head">Update My password</h4>
      </div>
      <div class="card-body">
        <form action="">
          <div class="form-group">
              <input type="hidden" class="form-control" name="csrf" value="" id="csrf">
          </div>
          <div class="form-group">
            <label for="old-password">Old password*</label>
            <input type="password" class="form-control" name="old-password" id="old-password">
          </div>
          <div class="form-group">
            <label for="new-password">New password*</label>
            <input type="password" class="form-control" name="new-password" id="new-password">
          </div>
          <div class="form-group">
            <label for="confirm-new-password">Confirm new password*</label>
            <input type="password" class="form-control" name="confirm-new-password" id="confirm-new-password">
          </div>
          <button type="submit" name="update-password" class="btn btn-primary">Update</button>
      </form>
      </div>
      <div class="card-footer">
      </div>
    </div>
  </div>
<?php } ?>
</section>
  <div class="modal" id="rate-modal">
    <div class="card">
      <div class="card-header">
        <div class="close" id="rate-close">&times;</div>
        <h4 class="message-head">About</h4>
      </div>
      <div class="card-body">
        <div style="margin: 10px auto;display:flex;align-items:center;justify-content:center;">
          <p>Bwajes+ v1.0.0 is a product of Andadel</p>
        </div>
      </div>
      <div class="card-footer">
      </div>
    </div>
  </div>

  <script src="<?php echo $hostname .'assets/js/admin.js'; ?>">
  </script>
  <script>
        document.addEventListener('DOMContentLoaded', () => {
            const photo = document.querySelector("#photo");
            const photoModal = document.querySelector("#photo-modal");
            const closePhoto = document.querySelector("#photo-close");

            if(photo)
            {
              photo.addEventListener('click', (e) => {
                  e.preventDefault();
                  console.log('photo clicked');
                  photoModal.style.display = 'block';
              });
  
              closePhoto.addEventListener('click', () => {
                  photoModal.style.display = 'none';
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
        });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        
      //ajax request to load unseen notification

      function load_unseen_notification(view_notification = '')
      {

        let form_data = new FormData();

        form_data.append('view_notification', view_notification);
        
        let xhr = new XMLHttpRequest();
        
        xhr.open('POST', 'http://localhost:9090/bwajesplus-app/admin/process-ajax');

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

 
      load_unseen_notification();

      let bell_notify = document.getElementById('notify_bell');

      bell_notify.addEventListener('click', () => {
        document.getElementById('notify_number').innerHTML = '';
        load_unseen_notification('yes');
      });

      setInterval(function(){ 
        load_unseen_notification();
      }, 5000);

    });
  </script>
</body>
</html>
<?php
}

ob_end_flush();

?>