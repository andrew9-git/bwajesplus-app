<?php

include('includes/header.php');
bwajes_plus_header('all-admins', 'Register admin');

?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
              <div class="info-container">
                <a href="all-admins" class="btn btn-success">back</a>
              </div>
          </div>
          <div class="card-body">
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
                <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="username">Username*</label>
                    <div class="tooltip-container">
                        <div><i class='bx bx-help-circle tooltip'></i></div>
                        <div class="tooltip">The last id is <?php echo '4'; ?>
                    </div>
                    </div>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="admin-type">Admin type*</label>
                    <select class="form-control" name="admin-type" id="admin-type">
                      <option value="null">Select type</option>
                      <option value="">Basic</option>
                      <option value="">Super</option>
                    </select>
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
                <button name="update-profile" class="btn btn-primary">Register</button>
              </form>
          </div>
          <div class="card-footer">
          </div>
        </div>
      </div>
    </div>

<?php

    include('includes/footer.php');
    ckeditor();

?>