<?php

include('includes/header.php');
bwajes_plus_header('users-statistics', 'User statistics');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>

<div class="home-content">
      <div class="post-area">
        <div class="info-container">
            <a href="<?php echo $host .'users-statistics'; ?>" class="btn btn-success">back</a>
        </div>
        <div class="card">
            <div class="card-header">
              <form action="">
                  <div class="form-wrapper">
                      <div class="form-group">
                          <input type="hidden" class="form-control" name="csrf" value="" id="csrf">
                      </div>
                      <div class="search-button-wrapper">
                          <div class="form-group">
                              <input type="search" class="form-control" placeholder="search here..." name="search" id="search">
                          </div>
                          <div class="form-group">
                              <button name="filter" class="btn btn-primary">filter</button>
                          </div>
                      </div>
                  </div>
              </form>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Browser</th>
                    <th>OS</th>
                    <th>Device name</th>
                    <th>Last visited</th>
                    <th>Last login</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Chrome</td>
                    <td>Windows 11</td>
                    <td>Samsung</td>
                    <td>12, Sept., 2021 12:00:00</td>
                    <td>14, Sept., 2021 12:00:00</td>
                  </tr>
                  <tr>
                    <td>Mozila firefox</td>
                    <td>Linux</td>
                    <td>Dell</td>
                    <td>12, Sept., 2021 12:00:00</td>
                    <td>14, Sept., 2021 12:00:00</td>
                  </tr>
                  <tr>
                    <td>Mozila firefox</td>
                    <td>Linux</td>
                    <td>Dell</td>
                    <td>12, Sept., 2021 12:00:00</td>
                    <td>14, Sept., 2021 12:00:00</td>
                  </tr>
                </tbody>
              </table>
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