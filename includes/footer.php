<?php

function ckeditor($page = '')
{
  $host='http://localhost:9090/bwajesplus-app/';  
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
  <div class="modal" id="account-modal">
    <div class="card">
      <div class="card-header">
        <div class="close" id="account-close">&times;</div>
        <h4 class="message-head">Delete My Account</h4>
      </div>
      <div class="card-body">
        <div class="delete-account-container">
          <div>
            <div class="delete-account-notification-wrapper">
              <i class="bx bx-alarm-exclamation delete-notification"></i> <span class="delete-account-notification-text">Deleting your account will</span>
            </div>
            <div>
              <ul class="delete-account-notification-list">
                <li>Erase your account from bwajes+</li>
                <li>Delete all your posts</li>
              </ul>
            </div>
            <form action="">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="csrf" value="" id="csrf">
                </div>
                <button name="send-mail" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="thanks">This action is irreversible!</div>
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
        <form action="">
          <div class="form-group">
            <label for="email">Email address*</label>
            <input type="email" class="form-control" name="email" value="" id="email" disabled>
          </div>
          <div class="form-group">
            <label for="support">Choose Support Department*</label>
            <select class="form-control" name="support" id="support">
              <option value="null">Select department</option>
              <option value="">General Support</option>
              <option value="">IT Support</option>
              <option value="">Adminstration Support</option>
              <option value="">Billing Support</option>
            </select>
          </div>
          <div class="form-group">
            <label for="title">Title*</label>
            <input type="text" class="form-control" placeholder="Enter title" id="title">
          </div>
          <div class="form-group">
            <label for="message">Message*</label>
            <textarea class="form-control" rows="5" id="message"></textarea>
          </div>
          <button type="submit" name="send-mail" class="btn btn-primary">Send</button>
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
        <form action="">
          <div class="form-group">
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" value="" name="rating"><br>1
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" value="" name="rating"><br>2
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" value="" name="rating"><br>3
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" value="" name="rating"><br>4
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" value="" name="rating"><br>5
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="reason">Why do you rate us the way you did?</label>
            <textarea class="form-control" rows="5" id="reason"></textarea>
          </div>
          <div class="form-group">
            <label for="suggestion">What can we do to serve you better or improve the system?</label>
            <textarea class="form-control" rows="5" id="suggestion"></textarea>
          </div>
          <button type="submit" name="rate-us" class="btn btn-primary">Rate us</button>
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
        });
  </script>
</body>
</html>
<?php
}
?>