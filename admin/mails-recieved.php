<?php

include('includes/header.php');
bwajes_plus_header('admin-sent-emails', 'All mails recieved');
$host='http://localhost:9090/bwajesplus-app/admin/';
?>

<div class="home-content">
      <div class="post-area">
        <div class="card">
          <div class="card-header">
            <div style="display: flex;align-items:center;justify-content:space-between">
              <a href="<?php echo $host .'all-users-open-rates'; ?>" class="btn btn-success">back</a>
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
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Date recieved</th>
                  <th>Date opened</th>
                  <th>How long?</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>No money? No problem</td>
                    <td>opened</td>
                    <td>Sept. 28, 2021 10:00:00</td>
                    <td>Sept. 29, 2021 10:00:00</td>
                    <td>1 day</td>
                </tr>
                <tr>
                    <td>No money? No problem</td>
                    <td>Not opened</td>
                    <td>Sept. 28, 2021 10:00:00</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>No money? No problem</td>
                    <td>opened</td>
                    <td>Sept. 28, 2021 10:00:00</td>
                    <td>Sept. 29, 2021 10:00:00</td>
                    <td>1 day</td>
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