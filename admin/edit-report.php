<?php

include('includes/header.php');
bwajes_plus_header('create-report', 'Edit report');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
            <div class="info-container">
                <a href="<?php echo $host .'all-reports'; ?>" class="btn btn-success">back</a>
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
                <button type="submit" name="update-report" class="btn btn-primary">Update report</button>
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