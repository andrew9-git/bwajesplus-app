<?php

include('includes/header.php');
bwajes_plus_header('create-report', 'Create report');

?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
            <div class="info-container">
                <a href="all-reports" class="btn btn-success">see all reports</a>
            </div>
          </div>
          <div class="card-body">
            <form action="">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="csrf" value="" id="csrf">
                </div>
                <div class="form-group">
                  <label for="report">Report*</label>
                  <input type="text" class="form-control" name="report" id="report">
                </div>
                <button type="submit" name="create-report" class="btn btn-primary">Create report</button>
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