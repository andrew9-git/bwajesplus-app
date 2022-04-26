<?php

include('includes/header.php');
bwajes_plus_header('settings', 'Settings');

?>

    <div class="home-content">
      <div class="post-area">
        <div class="card">
            <div class="card-header">
                <h4 class="message-head">My Profile</h4>
            </div>
            <div class="card-body">
                <div class="my-profile-image" style="background: url('../images/profile.jpg');background-size: cover;background-repeat:no-repeat;background-position: center top;">
                    <div class="my-profile-image-edit-container">
                        <span id="photo" class="my-profile-image-edit"><i class="bx bx-camera profile"></i></span>
                    </div>
                </div>
              <form action="">
                  <div class="form-group">
                      <input type="hidden" class="form-control" name="csrf" value="" id="csrf">
                  </div>
                  <div class="form-group">
                    <label for="first-name">First name*</label>
                    <input type="text" class="form-control" name="first-name" id="first-name">
                  </div>
                  <div class="form-group">
                      <label for="last-name">Last name*</label>
                      <input type="text" class="form-control" name="last-name" id="last-name">
                  </div>
                  <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="radio" class="form-check-input" value="" name="gender"> Male
                      </label>
                  </div>
                  <div class="form-check-inline">
                      <label class="form-check-label">
                          <input type="radio" class="form-check-input" value="" name="gender"> Female
                      </label>
                  </div><br><br>
                  <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="tel" value="+234 " class="form-control" name="phone" id="phone">
                  </div>
                  <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea class="form-control" rows="5" id="bio"></textarea>
                  </div>
                  <div class="form-group">
                      <label for="website">Website</label>
                      <input type="url" class="form-control" name="website" id="website">
                  </div>
                  <div class="form-group">
                      <label for="birth-date">Birth date</label>
                      <input type="date" class="form-control" name="birth-date" id="birth-date">
                  </div>
                  <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" name="address" id="address">
                  </div>
                  <div class="form-group">
                      <label for="city">City</label>
                      <input type="text" class="form-control" name="city" id="city">
                  </div>
                  <div class="form-group">
                      <label for="state">State</label>
                      <input type="text" class="form-control" name="state" id="state">
                  </div>
                  <button type="submit" name="update-profile" class="btn btn-primary">Save</button>
                </form>
            </div>
            <div class="card-footer">
                <!-- <span id="account" class="btn btn-danger delete-my-account">Delete my account</span> -->
                <span style="float: right;" id="password" class="btn btn-success update-my-password">Update my password</span>
            </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        CKEDITOR.replace('bio',
        {
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'About,Source,Anchor'
        });
      });
    </script>
<?php

    include('includes/footer.php');
    ckeditor('settings');

?>