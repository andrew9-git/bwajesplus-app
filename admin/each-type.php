<?php

include('includes/header.php');
bwajes_plus_header('post-type', 'Each post type');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
            <div class="info-container">
                <a href="<?php echo $host .'all-types'; ?>" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
            <div style="line-height: 1.625rem; margin: 10px;">
                <h4>Type:</h4>
                <div>
                    Lorem
                </div>
                <h4>Date created:</h4>
                <div>
                    Lorem
                </div>
                <h4>Last updated:</h4>
                <div>
                    Sept. 7, 2021
                </div>
                <h4>Created by:</h4>
                <div>
                    Andrew Adelodun
                </div>
                <h4>Updated by:</h4>
                <div>
                    Andrew Adelodun
                </div>
            </div>
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