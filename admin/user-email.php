<?php

include('includes/header.php');
bwajes_plus_header('user-sent-emails', 'User sent email');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
            <div class="info-container">
                <a href="<?php echo $host .'user-sent-emails'; ?>" class="btn btn-success">back</a>
            </div>
          </div>
          <div class="card-body">
            <div style="line-height: 1.625rem; margin: 10px;">
                <h4>Subject:</h4>
                <div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, sint?
                </div>
                <h4>Body:</h4>
                <div>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore, illo maxime deserunt esse itaque doloribus ducimus dolor consequuntur in reprehenderit voluptatem. Exercitationem nostrum ipsa, ratione et aut ullam minus dolore.
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