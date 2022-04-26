<?php

include('includes/header.php');
bwajes_plus_header('all-affiliates', 'Edit affiliate programme');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
            <div class="info-container">
                <a href="<?php echo $host .'all-affiliates'; ?>" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
            <form action="">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="csrf" value="" id="csrf">
                </div>
                <div class="form-group">
                  <label for="affiliate-url">Affiliate url*</label>
                  <input type="text" class="form-control" name="affiliate-url" id="affiliate-url">
                </div>
                <div class="form-group">
                    <label for="company-name">Company's name*</label>
                    <input type="text" class="form-control" name="company-name" id="company-name">
                  </div>
                <button type="submit" name="edit-affiliate" class="btn btn-primary">Edit affiliate programme</button>
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