<?php

include('includes/header.php');
bwajes_plus_header('admin-sent-emails', 'Admin sent email');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>

    <div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
            <div class="info-container">
                <a href="<?php echo $host .'admin-sent-emails'; ?>" class="btn btn-success">back</a>
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
                <h4>Number of users sent to:</h4>
                <div>
                    20
                </div>
                <h4>Number of users that opened mail:</h4>
                <div>
                    4
                </div>
                <h4>Open rate:</h4>
                <div>
                    20.00%
                </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="<?php echo $host .'mail-opened-users/4'; ?>" class="btn btn-primary">see users that opened mail</a>
          </div>
        </div>
      </div>
    </div>

<?php

    include('includes/footer.php');
    ckeditor();

?>